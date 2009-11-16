<?php

require_once ( getenv('MW_INSTALL_PATH') !== false
        ? getenv('MW_INSTALL_PATH')."/maintenance/commandLine.inc"
        : dirname( __FILE__ ) . '/../../maintenance/commandLine.inc' );

$dir = dirname( __FILE__ );

$endl = '
';

$lines = file( "$dir/equivset.in" );
if ( !$lines ) {
	print "Unable to open equivset.in\n";
	exit( 1 );
}

$setsFile = fopen( "$dir/equivset.txt", 'w' );
if ( !$setsFile ) {
	print "Unable to open equivset.txt for writing\n";
	exit( 1 );
}

fwrite( $setsFile, <<<EOT
# This file is generated by generateEquivset.php
# It shows sets of equivalent characters, one set per line, with characters
# separated by whitespace. This file is not used by MediaWiki, rather it is
# intended as a human-readable version of equivset.php, for debugging and
# review purposes.

EOT
);

$outputFile = fopen( "$dir/equivset.php", 'w' );
if ( !$outputFile ) {
	print "Unable to open equivset.php for writing\n";
	exit( 1 );
}
fwrite( $outputFile, "<?" . "php$endl" . <<<EOT
# This file is generated by generateEquivset.php
# It contains a map of characters, encoded in UTF-8, such that running strtr()
# on a string with this map will cause confusable characters to be reduced to
# a canonical representation. The same array is also available in serialized
# form, in equivset.ser.

EOT
);

$serializedFile = fopen( "$dir/equivset.ser", 'w' );
if ( !$serializedFile ) {
	print "Unable to open equivset.ser for writing\n";
	exit( 1 );
}

# \s matches \xa0 in non-unicode mode, which is not what we want
# So we need to make our own whitespace class
$sp = '[\ \t]';

$lineNum = 0;
$setsByChar = array();
$sets = array();
foreach ( $lines as $line ) {
	++$lineNum;
	$line = trim( $line );

	# Filter comments
	if ( !$line || $line[0] == '#' ) {
		continue;
	}

	# Process line
	if ( !preg_match(
"/^(?P<hexleft> [A-F0-9]+) $sp+ (?P<charleft> .+?) $sp+ => $sp+ (?:(?P<hexright> [A-F0-9]+) $sp+|) (?P<charright> .+?) $sp* (?: \#.*|) $ /x", $line, $m ) )
	{
		print "Error: invalid entry at line $lineNum: $line\n";
		continue;
	}
	$error = false;
	if ( codepointToUtf8( hexdec( $m['hexleft'] ) ) != $m['charleft'] ) {
		$actual = utf8ToCodepoint( $m['charleft'] );
		if ( $actual === false ) {
			print "Bytes: " . strlen( $m['charleft'] ) . "\n";
			print bin2hex( $line ) . "\n";
			$hexForm = bin2hex( $m['charleft'] );
			print "Invalid UTF-8 character \"{$m['charleft']}\" ($hexForm) at line $lineNum: $line\n";
		} else {
			print "Error: left number ({$m['hexleft']}) does not match left character ($actual) " .
				"at line $lineNum: $line\n";
		}
		$error = true;
	}
	if ( !empty( $m['hexright'] ) && codepointToUtf8( hexdec( $m['hexright'] ) ) != $m['charright'] ) {
		$actual = utf8ToCodepoint( $m['charright'] );
		if ( $actual === false ) {
			$hexForm = bin2hex( $m['charright'] );
			print "Invalid UTF-8 character \"{$m['charleft']}\" ($hexForm) at line $lineNum: $line\n";
		} else {
			print "Error: right number ({$m['hexright']}) does not match right character ($actual) " .
				"at line $lineNum: $line\n";
		}
		$error = true;
	}
	if ( $error ) {
		continue;
	}

	# Find the set for the right character, add a new one if necessary
	if ( isset( $setsByChar[$m['charright']] ) ) {
		$setName = $setsByChar[$m['charright']];
	} else {
		# New set
		$setName = $m['charright'];
		$sets[$setName] = array( $m['charright'] );
		$setsByChar[$setName] = $setName;
	}

	# Add the left character to the set
	$sets[$setName][] = $m['charleft'];
	$setsByChar[$m['charleft']] = $setName;
}

# Sets output
foreach ( $sets as $setName => $members ) {
	fwrite( $setsFile, implode( ' ', $members ) . $endl );
}

# Map output
$output = var_export( $setsByChar, true );
$output = str_replace( "\n", $endl, $output );
fwrite( $outputFile, '$equivset = ' . "$output;$endl" );

# Serialized codepoint map
$codepointMap = array();
foreach ( $setsByChar as $char => $setName ) {
	$codepointMap[ utf8ToCodepoint( $char ) ] = utf8ToCodepoint( $setName );
}
fwrite( $serializedFile, serialize( $codepointMap ) );

fclose( $setsFile );
fclose( $outputFile );
fclose( $serializedFile );
