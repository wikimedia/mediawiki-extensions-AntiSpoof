<?php
/**
 * AntiSpoof.php
 * Username spoofing prevention for MediaWiki
 * Version 0.04
 *
 * Copyright (C) Neil Harris 2006
 * Python->PHP conversion by Brion Vibber <brion@pobox.com>
 *
 * 2006-06-30 Handles non-CJK scripts as per UTR #39 + my extensions
 * 2006-07-01 Now handles Simplified <-> Traditional Chinese rules, as
 *            per JET Guidelines for Internationalized Domain Names,
 *            and the ICANN language registry values for .cn
 * 2006-09-14 Now handles 'rn' etc better, and uses stdin for input
 * 2006-09-18 Added exception handling for nasty cases, eg BiDi violations
 * 2006-09-19 Converted to PHP for easier integration into a MW extension
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301
 * USA
 */

use UtfNormal\Utils;
use UtfNormal\Validator;
use Wikimedia\Equivset\Equivset;

class AntiSpoof {
	/**
	 * Define script tag codes for various Unicode codepoint ranges
	 * If it does not have a code here, it does not have a script assignment
	 * NB: Braille is not in this list since it is a transliteration system, not a script;
	 * this does not disadvantage blind people, who will use Braille input/output methods
	 * and not raw Braille...
	 * NB: Middle dot is included in SCRIPT_LATIN for use in Catalan
	 * NB: All scripts described by the Unicode Consortium as "Other Scripts" or "Ancient Scripts"
	 * are commented out: these are either not in modern use, or only used for specialized
	 * religious purposes, or only of literary interest
	 */
	private static $script_ranges = [
		[ 0x0020, 0x002F,
			"SCRIPT_ASCII_PUNCTUATION" ], // ASCII Punctuation 1, Hyphen, ASCII Punctuation 2
		[ 0x0030, 0x0039, "SCRIPT_ASCII_DIGITS" ], // ASCII Digits
		[ 0x003A, 0x0040, "SCRIPT_ASCII_PUNCTUATION" ], // Colon, ASCII Punctuation 3
		[ 0x0041, 0x005A, "SCRIPT_LATIN" ], // ASCII Uppercase
		[ 0x005B, 0x0060,
			"SCRIPT_ASCII_PUNCTUATION" ], // ASCII Punctuation 4, Underscore, ASCII Punctuation 5
		[ 0x0061, 0x007A, "SCRIPT_LATIN" ], // ASCII Lowercase
		[ 0x007B, 0x007E, "SCRIPT_ASCII_PUNCTUATION" ], // ASCII Punctuation 5
		[ 0x00B7, 0x00B7, "SCRIPT_LATIN" ], // Middle Dot
		[ 0x00C0, 0x00D6, "SCRIPT_LATIN" ], // Latin-1 Letters 1
		[ 0x00D8, 0x00F6, "SCRIPT_LATIN" ], // Latin-1 Letters 2
		[ 0x00F8, 0x02AF,
			"SCRIPT_LATIN" ], // Latin-1 Letters 3, Latin Extended-A, Latin Extended-B, IPA Extensions
		[ 0x0300, 0x036F, "SCRIPT_COMBINING_MARKS" ], // Combining Diacritical Marks
		[ 0x0370, 0x03E1, "SCRIPT_GREEK" ], // Greek and Coptic (Greek)
		[ 0x03E2, 0x03EF, "SCRIPT_COPTIC_EXTRAS" ], // Greek and Coptic (Coptic-unique)
		[ 0x03F0, 0x03FF, "SCRIPT_GREEK" ], // Greek and Coptic (Greek)
		[ 0x0400, 0x052F, "SCRIPT_CYRILLIC" ], // Cyrillic, Cyrillic Supplement
		[ 0x0530, 0x058F, "SCRIPT_ARMENIAN" ], // Armenian
		[ 0x0590, 0x05FF, "SCRIPT_HEBREW" ], // Hebrew
		[ 0x0600, 0x06FF, "SCRIPT_ARABIC" ], // Arabic
		[ 0x0700, 0x074F, "SCRIPT_SYRIAC" ], // Syriac
		[ 0x0750, 0x077F, "SCRIPT_ARABIC" ], // Arabic Supplement
		[ 0x0780, 0x07BF, "SCRIPT_THAANA" ], // Thaana
		[ 0x0900, 0x097F, "SCRIPT_DEVANAGARI" ], // Devanagari
		[ 0x0980, 0x09FF, "SCRIPT_BENGALI" ], // Bengali
		[ 0x0A00, 0x0A7F, "SCRIPT_GURMUKHI" ], // Gurmukhi
		[ 0x0A80, 0x0AFF, "SCRIPT_GUJARATI" ], // Gujarati
		[ 0x0B00, 0x0B7F, "SCRIPT_ORIYA" ], // Oriya
		[ 0x0B80, 0x0BFF, "SCRIPT_TAMIL" ], // Tamil
		[ 0x0C00, 0x0C7F, "SCRIPT_TELUGU" ], // Telugu
		[ 0x0C80, 0x0CFF, "SCRIPT_KANNADA" ], // Kannada
		[ 0x0D00, 0x0D7F, "SCRIPT_MALAYALAM" ], // Malayalam
		[ 0x0D80, 0x0DFF, "SCRIPT_SINHALA" ], // Sinhala
		[ 0x0E00, 0x0E7F, "SCRIPT_THAI" ], // Thai
		[ 0x0E80, 0x0EFF, "SCRIPT_LAO" ], // Lao
		[ 0x0F00, 0x0FFF, "SCRIPT_TIBETAN" ], // Tibetan
		[ 0x1000, 0x109F, "SCRIPT_MYANMAR" ], // Myanmar
		[ 0x10A0, 0x10FF, "SCRIPT_GEORGIAN" ], // Georgian
		[ 0x1100, 0x11FF, "SCRIPT_HANGUL" ], // Hangul Jamo
		[ 0x1200, 0x139F, "SCRIPT_ETHIOPIC" ], // Ethiopic, Ethiopic Supplement
		[ 0x13A0, 0x13FF, "SCRIPT_CHEROKEE" ], // Cherokee
		[ 0x1400, 0x167F, "SCRIPT_CANADIAN_ABORIGINAL" ], // Unified Canadian Aboriginal Syllabics
		// [ 0x1680, 0x169F, "SCRIPT_OGHAM" ], // Ogham
		// [ 0x16A0, 0x16FF, "SCRIPT_RUNIC" ], // Runic
		[ 0x1700, 0x171F, "SCRIPT_TAGALOG" ], // Tagalog
		[ 0x1720, 0x173F, "SCRIPT_HANUNOO" ], // Hanunoo
		[ 0x1740, 0x175F, "SCRIPT_BUHID" ], // Buhid
		[ 0x1760, 0x177F, "SCRIPT_TAGBANWA" ], // Tagbanwa
		[ 0x1780, 0x17FF, "SCRIPT_KHMER" ], // Khmer
		[ 0x1800, 0x18AF, "SCRIPT_MONGOLIAN" ], // Mongolian
		[ 0x1900, 0x194F, "SCRIPT_LIMBU" ], // Limbu
		[ 0x1950, 0x197F, "SCRIPT_TAI_LE" ], // Tai Le
		[ 0x1980, 0x19DF, "SCRIPT_NEW_TAI_LUE" ], // New Tai Lue
		[ 0x1A00, 0x1A1F, "SCRIPT_BUGINESE" ], // Buginese
		[ 0x1E00, 0x1EFF, "SCRIPT_LATIN" ], // Latin Extended Additional
		[ 0x1F00, 0x1FFF, "SCRIPT_GREEK" ], // Greek Extended
		// [ 0x2C00, 0x2C5F, "SCRIPT_GLAGOLITIC" ], // Glagolitic
		[ 0x2C80, 0x2CFF, "SCRIPT_COPTIC" ], // Coptic
		[ 0x2D00, 0x2D2F, "SCRIPT_GEORGIAN" ], // Georgian Supplement
		[ 0x2D30, 0x2D7F, "SCRIPT_TIFINAGH" ], // Tifinagh
		[ 0x2D80, 0x2DDF, "SCRIPT_ETHIOPIC" ], // Ethiopic Extended
		[ 0x2E80, 0x2FDF, "SCRIPT_DEPRECATED" ], // CJK Radicals Supplement, Kangxi Radicals
		[ 0x3040, 0x309F, "SCRIPT_HIRAGANA" ], // Hiragana
		[ 0x30A0, 0x30FF, "SCRIPT_KATAKANA" ], // Katakana
		[ 0x3100, 0x312F, "SCRIPT_BOPOMOFO" ], // Bopomofo
		[ 0x3130, 0x318F, "SCRIPT_HANGUL" ], // Hangul Compatibility Jamo
		[ 0x31A0, 0x31BF, "SCRIPT_BOPOMOFO" ], // Bopomofo Extended
		[ 0x3400, 0x4DBF, "SCRIPT_HAN" ], // CJK Unified Ideographs Extension A
		[ 0x4E00, 0x9FFF, "SCRIPT_HAN" ], // CJK Unified Ideographs
		[ 0xA000, 0xA4CF, "SCRIPT_YI" ], // Yi Syllables, Yi Radicals
		[ 0xA800, 0xA82F, "SCRIPT_SYLOTI_NAGRI" ], // Syloti Nagri
		[ 0xAC00, 0xD7AF, "SCRIPT_HANGUL" ], // Hangul Syllables
		[ 0xF900, 0xFAFF, "SCRIPT_DEPRECATED" ], // CJK Compatibility Ideographs
		// [ 0x10000, 0x100FF, "SCRIPT_LINEAR_B" ], // Linear B Syllabary, Linear B Ideograms
		// [ 0x10140, 0x1018F, "SCRIPT_GREEK" ], // Ancient Greek Numbers
		// [ 0x10300, 0x1032F, "SCRIPT_OLD_ITALIC" ], // Old Italic
		[ 0x10330, 0x1034F, "SCRIPT_GOTHIC" ], // Gothic
		// [ 0x10380, 0x1039F, "SCRIPT_UGARITIC" ], // Ugaritic
		// [ 0x103A0, 0x103DF, "SCRIPT_OLD_PERSIAN" ], // Old Persian
		// [ 0x10400, 0x1044F, "SCRIPT_DESERET" ], // Deseret
		// [ 0x10450, 0x1047F, "SCRIPT_SHAVIAN" ], // Shavian
		// [ 0x10480, 0x104AF, "SCRIPT_OSMANYA" ], // Osmanya
		// [ 0x10800, 0x1083F, "SCRIPT_CYPRIOT" ], // Cypriot Syllabary
		[ 0x10A00, 0x10A5F, "SCRIPT_KHAROSHTHI" ], // Kharoshthi
		[ 0x20000, 0x2A6DF, "SCRIPT_HAN" ], // CJK Unified Ideographs Extension B
		[ 0x2F800, 0x2FA1F, "SCRIPT_DEPRECATED" ] // CJK Compatibility Ideographs Supplement
	];

	/**
	 * @var Equivset
	 */
	private static $equivset;

	public static function getEquivSet() {
		if ( !self::$equivset ) {
			self::$equivset = new Equivset();
		}

		return self::$equivset;
	}

	/**
	 * @param int $ch
	 * @return string
	 */
	private static function getScriptCode( $ch ) {
		# Linear search: binary chop would be faster...
		foreach ( self::$script_ranges as $range ) {
			if ( $ch >= $range[0] && $ch <= $range[1] ) {
				return $range[2];
			}
		}
		# Otherwise...
		return "SCRIPT_UNASSIGNED";
	}

	/**
	 * @param array $aList
	 * @param array $bList
	 * @return bool
	 */
	private static function isSubsetOf( $aList, $bList ) {
		return count( array_diff( $aList, $bList ) ) == 0;
	}

	/**
	 * Is this an allowed script mixture?
	 *
	 * @param array $scriptList
	 * @return bool
	 */
	private static function isAllowedScriptCombination( $scriptList ) {
		$allowedScriptCombinations = [
			[ "SCRIPT_COPTIC", "SCRIPT_COPTIC_EXTRAS" ], # Coptic, using old Greek chars
			[ "SCRIPT_GREEK", "SCRIPT_COPTIC_EXTRAS" ], # Coptic, using new Coptic chars
			[ "SCRIPT_HAN", "SCRIPT_BOPOMOFO" ], # Chinese
			[ "SCRIPT_HAN", "SCRIPT_HANGUL" ], # Korean
			[ "SCRIPT_HAN", "SCRIPT_KATAKANA", "SCRIPT_HIRAGANA" ] # Japanese
		];
		foreach ( $allowedScriptCombinations as $allowedCombo ) {
			if ( self::isSubsetOf( $scriptList, $allowedCombo ) ) {
				return true;
			}
		}
		return false;
	}

	/**
	 * Convert string into array of Unicode code points as integers
	 * @param string $str
	 * @return int[]
	 */
	private static function stringToList( $str ) {
		$ar = [];
		if ( !preg_match_all( '/./us', $str, $ar ) ) {
			return [];
		}
		$out = [];
		foreach ( $ar[0] as $char ) {
			$out[] = Utils::utf8ToCodepoint( $char );
		}
		return $out;
	}

	/**
	 * @param array $list
	 * @return string
	 */
	private static function listToString( $list ) {
		$out = '';
		foreach ( $list as $cp ) {
			$out .= Utils::codepointToUtf8( $cp );
		}
		return $out;
	}

	/**
	 * @param array $a_list
	 * @return string
	 */
	private static function hardjoin( $a_list ) {
		return implode( '', $a_list );
	}

	/**
	 * @param string $testName
	 * @return string
	 */
	public static function normalizeString( $testName ) {
		return self::getEquivSet()->normalize( $testName );
	}

	/**
	 * @param int[] $text
	 * @param string $script
	 * @return int[]
	 */
	private static function stripScript( array $text, $script ) {
		$scripts = array_map( [ __CLASS__, 'getScriptCode' ], $text );
		$out = [];
		foreach ( $text as $index => $char ) {
			if ( $scripts[$index] !== $script ) {
				$out[] = $char;
			}
		}
		return $out;
	}

	/*
	 * Helper function for checkUnicodeStringStatus: Return an error on a bad character.
	 * @todo I would like to show Unicode character name, but it is not clear how to get it.
	 * @param string $msgId message identifier.
	 * @param int $point codepoint of the bad character.
	 * @return Status
	 */
	private static function badCharErr( $msgId, $point ) {
		$symbol = Utils::codepointToUtf8( $point );
		// Combining marks are combined with the previous character. If abusing character is a
		// combining mark, prepend it with space to show them correctly.
		if ( self::getScriptCode( $point ) == "SCRIPT_COMBINING_MARKS" ) {
			$symbol = ' ' . $symbol;
		}
		$code = sprintf( 'U+%04X', $point );
		if ( preg_match( '/\A\p{C}\z/u', $symbol ) ) {
			$char = wfMessage( 'antispoof-bad-char-non-printable', $code );
		} else {
			$char = wfMessage( 'antispoof-bad-char', $symbol, $code );
		}
		return Status::newFatal( wfMessage( $msgId, $char ) );
	}

	/**
	 * @param string $testName
	 * @return array
	 * @deprecated 1.35 Use checkUnicodeStringStatus instead
	 */
	public static function checkUnicodeString( $testName ) {
		$status = self::checkUnicodeStringStatus( $testName );
		if ( $status->isOK() ) {
			return [ "OK", $status->getValue() ];
		}
		return [ "ERROR", $status->getMessage()->text() ];
	}

	/**
	 * TODO: does too much in one routine, refactor...
	 * @param string $testName
	 * @return Status
	 * @since 1.32
	 */
	public static function checkUnicodeStringStatus( $testName ) {
		global $wgAntiSpoofBlacklist;

		// Start with some sanity checking
		if ( !is_array( $wgAntiSpoofBlacklist ) ) {
			throw new MWException( '$wgAntiSpoofBlacklist should be an array!' );
		}
		if ( !is_string( $testName ) ) {
			return Status::newFatal( 'antispoof-badtype' );
		}

		if ( strlen( $testName ) == 0 ) {
			return Status::newFatal( 'antispoof-empty' );
		}

		foreach ( self::stringToList( $testName ) as $char ) {
			if ( in_array( $char, $wgAntiSpoofBlacklist ) ) {
				return self::badCharErr( 'antispoof-blacklisted', $char );
			}
		}

		// Perform Unicode _compatibility_ decomposition
		$testName = Validator::toNFKD( $testName );
		$testChars = self::stringToList( $testName );

		// Be paranoid: check again, just in case Unicode normalization code changes...
		foreach ( $testChars as $char ) {
			if ( in_array( $char, $wgAntiSpoofBlacklist ) ) {
				return self::badCharErr( 'antispoof-blacklisted', $char );
			}
		}

		// Check for this: should not happen in any valid Unicode string
		if ( self::getScriptCode( $testChars[0] ) == "SCRIPT_COMBINING_MARKS" ) {
			return self::badCharErr( 'antispoof-combining', $testChars[0] );
		}

		// Strip all combining characters in order to crudely strip accents
		// Note: NFKD normalization should have decomposed all accented chars earlier
		$testChars = self::stripScript( $testChars, "SCRIPT_COMBINING_MARKS" );

		$testScripts = array_map( [ __CLASS__, 'getScriptCode' ], $testChars );
		$unassigned = array_search( "SCRIPT_UNASSIGNED", $testScripts );
		if ( $unassigned !== false ) {
			return self::badCharErr( 'antispoof-unassigned', $testChars[$unassigned] );
		}
		$deprecated = array_search( "SCRIPT_DEPRECATED", $testScripts );
		if ( $deprecated !== false ) {
			return self::badCharErr( 'antispoof-deprecated', $testChars[$deprecated] );
		}
		$testScripts = array_unique( $testScripts );

		// We don't mind ASCII punctuation or digits
		$testScripts = array_diff( $testScripts,
			[ "SCRIPT_ASCII_PUNCTUATION", "SCRIPT_ASCII_DIGITS" ] );

		if ( !$testScripts ) {
			return Status::newFatal( 'antispoof-noletters' );
		}

		if ( count( $testScripts ) > 1 && !self::isAllowedScriptCombination( $testScripts ) ) {
			return Status::newFatal( 'antispoof-mixedscripts' );
		}

		// At this point, we should probably check for BiDi violations if they aren't
		// caught above...

		// Squeeze out all punctuation chars
		// TODO: almost the same code occurs twice, refactor into own routine
		$testChars = self::stripScript( $testChars, "SCRIPT_ASCII_PUNCTUATION" );

		$testName = self::listToString( $testChars );

		// Replace characters in confusables set with equivalence chars
		$testName = self::normalizeString( $testName );

		// Do very simple sequence processing: "vv" -> "w", "rn" -> "m"...
		// Not exhaustive, but ups the ante...
		// Do this _after_ canonicalization: looks weird, but needed for consistency
		$testName = str_replace( 'VV', 'W', $testName );
		$testName = str_replace( 'RN', 'M', $testName );

		// Remove all remaining spaces, just in case any have snuck through...
		$testName = self::hardjoin( explode( " ", $testName ) );

		// Reduce repeated char sequences to single character
		// BUG: TODO: implement this

		if ( strlen( $testName ) < 1 ) {
			return Status::newFatal( 'antispoof-tooshort' );
		}

		// Don't ASCIIfy: we assume we are UTF-8 capable on output

		// Prepend version string, for futureproofing if this algorithm changes
		$testName = "v2:" . $testName;

		// And return the canonical version of the name
		return Status::newGood( $testName );
	}
}
