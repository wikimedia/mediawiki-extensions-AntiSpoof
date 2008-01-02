<?php

$wgAntiSpoofMessages = array();
$wgAntiSpoofMessages['en'] = array(
	'antispoof-name-conflict' => 'The name "$1" is too similar to the existing account "$2". Please choose another name.',
	'antispoof-name-illegal'  => 'The name "$1" is not allowed to prevent confusing or spoofed usernames: $2. Please choose another name.',
	'antispoof-badtype'       => 'Bad data type',
	'antispoof-empty'         => 'Empty string',
	'antispoof-blacklisted'   => 'Contains blacklisted character',
	'antispoof-combining'     => 'Begins with combining mark',
	'antispoof-unassigned'    => 'Contains unassigned or deprecated character',
	'antispoof-noletters'     => 'Does not contain any letters',
	'antispoof-mixedscripts'  => 'Contains incompatible mixed scripts',
	'antispoof-tooshort'      => 'Canonicalized name too short',
);
$wgAntiSpoofMessages['ar'] = array(
	'antispoof-name-conflict' => 'الاسم "$1" مشابه للغاية للحساب الموجود حاليا باسم "$2". من فضلك اختر اسما آخر.',
	'antispoof-name-illegal'  => 'الاسم "$1" غير مسموح به لمنع الخلط وانتحال أسماء المستخدمين: $2. اختر اسم آخر من فضلك.',
	'antispoof-badtype'       => 'نوع بيانات خاطئ',
	'antispoof-empty'         => 'سلسلة فارغة',
	'antispoof-blacklisted'   => 'يحتوي على حروف ممنوع استخدامها',
	'antispoof-combining'     => 'ابدأ بخلط العلامة',
	'antispoof-unassigned'    => 'يحتوي الرمز غير مخصص أو غير المقبول',
	'antispoof-noletters'     => 'لا يحتوي أية حروف',
	'antispoof-mixedscripts'  => 'يحتوي خلطا بين حروف غير متوافقة',
	'antispoof-tooshort'      => 'الاسم المستخدم قصير جدا',
);

/** Asturian (Asturianu)
 * @author SPQRobin
 */
$wgAntiSpoofMessages['ast'] = array(
	'antispoof-name-conflict' => 'El nome "$1" ye demasiao asemeyáu a la cuenta esistente "$2". Por favor, escueyi otru nome.',
	'antispoof-name-illegal'  => 'El nome "$1" nun ta permitíu pa evitar nomes d\\\'usuariu confusos o paródicos: $2. Por favor, escueyi otru nome.',
	'antispoof-badtype'       => 'Triba de datos incorreuta',
	'antispoof-empty'         => 'Testu vaciu',
	'antispoof-blacklisted'   => 'Contién un caráuter prohibíu',
	'antispoof-combining'     => 'Empecipia con una marca combinada',
	'antispoof-unassigned'    => 'Contién un caráuter non asignáu o obsoletu',
	'antispoof-noletters'     => 'Nun contién nenguna lletra',
	'antispoof-mixedscripts'  => 'Contién munchos scripts incompatibles',
	'antispoof-tooshort'      => 'Nome canónicu demasiao curtiu',
);

$wgAntiSpoofMessages['bcl'] = array(
	'antispoof-name-conflict' => 'An pangaran na "$1" kaagid na marhay sa yaon nang account "$2". Paki pilî tabî nin ibang pangaran.',
	'antispoof-name-illegal'  => 'An parágamit na "$1" dai tinotogotan tangarig maibitaran an pagparibong o pag-arog sa "$2". Paki pilî tabî nin ibang pangaran.',
	'antispoof-blacklisted'   => 'Igwang blacklisted na karakter',
	'antispoof-combining'     => 'Nagpopoon sa nagsasalak na marka',
	'antispoof-unassigned'    => 'Igwang dai naka-assign o deprecated na karakter',
	'antispoof-noletters'     => 'Mayong nakakaag na mga letra',
	'antispoof-mixedscripts'  => 'Igwang dai angay na mga halong script',
);

/** Bulgarian (Български)
 * @author Spiritia
 * @author Borislav
 */
$wgAntiSpoofMessages['bg'] = array(
	'antispoof-name-conflict' => 'Името „$1“ е твърде сходно с вече съществуващата сметка „$2“. Моля, изберете друго име!',
	'antispoof-name-illegal'  => 'Името „$1“ не е разрешено за защита от объркване или злоупотреби с имена: $2. Моля, изберете друго име!',
	'antispoof-empty'         => 'Празен низ',
	'antispoof-noletters'     => 'Не съдържа букви',
);


$wgAntiSpoofMessages['bn'] = array(
	'antispoof-name-conflict' => '"$1" নামটি বিদ্যমান "$2" অ্যাকাউন্টের সাথে হুবুহু মিলে যাচ্ছে। দয়া করে অন্য নাম পছন্দ করুন।',
	'antispoof-name-illegal'  => '"$1" নামটি, বিভ্রান্তিকর বা ধাপ্পাবাজ ব্যবহারকারী নাম: $2 কে রোধ করার অনুমতি নাই। দয়া করে অন্য নাম পছন্দ করুন।',
	'antispoof-badtype'       => 'তথ্যের ধরণ ঠিক নাই',
	'antispoof-empty'         => 'খালি স্ট্রিং',
	'antispoof-blacklisted'   => 'নিষিদ্ধ বর্ণ বা অক্ষর রয়েছে',
	'antispoof-noletters'     => 'কোন অক্ষর বা বর্ণ নাই',
);

$wgAntiSpoofMessages['br'] = array(
	'antispoof-name-conflict' => 'Re heñvel eo an anv "$1" ouzh hini ar gont "$2" zo anezhi dija. Dibabit un anv all mar plij.',
	'antispoof-name-illegal'  => 'N\'eo ket aotreet ober gant an anv "$1" kuit da gemmeskañ gant un anv all pe da implijout an anv : $2. Grit gant un anv all mar plij.',
	'antispoof-badtype'       => 'Seurt roadennoù fall',
	'antispoof-empty'         => 'Neudennad goullo',
	'antispoof-blacklisted'   => 'Arouezennoù berzet zo e-barzh',
	'antispoof-combining'     => 'Kregiñ a ra gant ur merk kenaozet',
	'antispoof-unassigned'    => 'Un arouezenn dispredet pe dispisaet zo e-barzh',
	'antispoof-noletters'     => 'Lizherenn ebet e-barzh',
	'antispoof-mixedscripts'  => 'Meur a skript digenglotus zo e-barzh',
	'antispoof-tooshort'      => 'Anv kanonek re verr',
);

$wgAntiSpoofMessages['ca'] = array(
	'antispoof-name-conflict' => 'El nom «$1» és massa semblant al ja existent «$2». Si us plau, escolliu-ne un de nou.',
	'antispoof-name-illegal'  => 'No està permès usar el nom «$1» per evitar confusions o falsificacions amb els noms d\'usuari: $2. Si us plau, escolliu un altre nom d\'usuari.',
	'antispoof-badtype'       => 'Tipus de dades incorrecte',
	'antispoof-empty'         => 'Cadena buida',
	'antispoof-blacklisted'   => 'Conté caràcters no permesos',
	'antispoof-combining'     => 'Comença amb un caràcter combinatori',
	'antispoof-unassigned'    => 'Conté caràcters invàlids o obsolets',
	'antispoof-noletters'     => 'No conté cap lletra',
	'antispoof-mixedscripts'  => 'Conté una mescla incompatible d\'escriptures',
	'antispoof-tooshort'      => 'Nom canònic massa curt',
);

$wgAntiSpoofMessages['cdo'] = array(
	'antispoof-name-conflict' => '"$1" gì miàng ké̤ṳk ī-gĭng cé̤ṳ-cháh gì dióng-hô̤ "$2" kák chiông lāu. Chiāng uâng 1 ciáh miàng.',
);

$wgAntiSpoofMessages['co'] = array(
	'antispoof-badtype'       => 'Tipu gattivu di dati',
);

$wgAntiSpoofMessages['cs'] = array(
	'antispoof-name-conflict' => 'Uživatelské jméno "$1" je příliš podobné existujícímu účtu "$2". Prosím, vyberte si jiné jméno.',
	'antispoof-name-illegal'  => 'Uživatelské jméno "$1" není povoleno vytvořit, aby se nepletlo nebo nesloužilo k napodobování uživatelského jména: $2. Prosím, vyberte si jiné jméno.',
	'antispoof-badtype'       => 'Špatný datový typ',
	'antispoof-empty'         => 'Prázdný řetězec',
	'antispoof-blacklisted'   => 'Obsahuje zakázaný znak',
	'antispoof-combining'     => 'Začíná na diakritický znak',
	'antispoof-unassigned'    => 'Obsahuje nepřiřazený nebo zavržený znak',
	'antispoof-noletters'     => 'Neobsahuje žádné písmeno',
	'antispoof-mixedscripts'  => 'Obsahuje nepřípustnou kombinaci druhů písem',
	'antispoof-tooshort'      => 'Kanonikalizované jméno je příliš krátké',
);

$wgAntiSpoofMessages['de'] = array(
	'antispoof-name-conflict' => 'Der gewünschte Benutzername „$1“ ist dem bereits vorhandenen Benutzernamen „$2“ zu ähnlich. Bitte einen anderen Benutzernamen wählen.',
	'antispoof-name-illegal'  => 'Der gewünschte Benutzername „$1“ ist nicht erlaubt. Grund: $2<br />Bitte einen anderen Benutzernamen wählen.',
	'antispoof-badtype'       => 'Ungültiger Datentyp',
	'antispoof-empty'         => 'Leeres Feld',
	'antispoof-blacklisted'   => 'Es sind unerlaubte Zeichen enthalten.',
	'antispoof-combining'     => 'Kombinationszeichen zu Beginn.',
	'antispoof-unassigned'    => 'Es sind nicht zugeordnete oder unerwünschte Zeichen enthalten.',
	'antispoof-noletters'     => 'Es sind keine Buchstaben enthalten.',
	'antispoof-mixedscripts'  => 'Es sind Zeichen unterschiedlicher Schriftsysteme enthalten.',
	'antispoof-tooshort'      => 'Der kanonisierte Name ist zu kurz.',
);

$wgAntiSpoofMessages['el'] = array(
	'antispoof-name-conflict' => 'Το όνομα "$1" είναι πολύ παρόμοιο με τον υπάρχοντα λογαριασμό "$2". Παρακαλώ διαλέξτε ένα άλλο όνομα.',
	'antispoof-name-illegal'  => 'Το όνομα "$1" δεν επιτρέπεται, για την αποτροπή συγκεχυμένων ή απατηλών ονομάτων χρηστών: $2. Παρακαλώ διαλέξτε ένα άλλο όνομα.',
	'antispoof-badtype'       => 'Εσφαλμένος τύπος δεδομένων',
	'antispoof-empty'         => 'Κενή συμβολοσειρά',
	'antispoof-blacklisted'   => 'Περιέχει χαρακτήρα στη «μαύρη λίστα»',
	'antispoof-combining'     => 'Ξεκινάει με συνδυαστικό σημάδι',
	'antispoof-unassigned'    => 'Περιέχει μη καταχωρημένο χαρακτήρα ή χαρακτήρα του οποίου η χρήση αποθαρρύνεται',
	'antispoof-noletters'     => 'Δεν περιέχει καθόλου γράμματα',
	'antispoof-mixedscripts'  => 'Περιέχει ανεμιγμένους ασύμβατους χαρακτήρες γραπτού κειμένου',
	'antispoof-tooshort'      => 'Κανονικοποιημένο όνομα πολύ μικρό',
);

$wgAntiSpoofMessages['eo'] = array(
	'antispoof-name-conflict' => 'La nomo "$1" estas tro simila al la ekzistanta konto "$2". Bonvolu elekti alian nomon.',
	'antispoof-blacklisted'   => 'Enhavas literojn el nigra listo',
	'antispoof-noletters'     => 'Ne enhavas iujn literojn',
	'antispoof-mixedscripts'  => 'Enhavas nekompatibilajn miksajn skriptojn',
);

$wgAntiSpoofMessages['es'] = array(
	'antispoof-name-conflict' => 'El nombre "$1" es demasiado parecido a la cuenta "$2", ya existente. Por favor, elige otro nombre.',
	'antispoof-name-illegal'  => 'Con el fin de evitar nombres confusos y suplantaciones no se permite registrar el nombre de usuario "$1": $2. Por favor, escoja otro nombre.',
);

$wgAntiSpoofMessages['eu'] = array(
	'antispoof-name-conflict' => '"$1" izena dagoeneko existitzen den "$2" kontuaren oso antzekoa da. Beste izen bat aukeratu mesedez.',
	'antispoof-name-illegal'  => '"$1" izena ez dago onartuta gaizkiulertuak saihesteko: $2. Beste izen bat hautatu mesedez.',
	'antispoof-badtype'       => 'Datu mota ezegokia',
	'antispoof-empty'         => 'Kate hutsa',
	'antispoof-noletters'     => 'Ez dauka letrarik',
);

$wgAntiSpoofMessages['ext'] = array(
	'antispoof-name-conflict' => 'El nombri "$1" es mu paiciu al de la cuenta "$2" (ya desistenti). Pol favol, lihi otru nombri.',
);

$wgAntiSpoofMessages['fi'] = array(
	'antispoof-name-conflict' => 'Tunnus ”$1” on liian samankaltainen tunnuksen ”$2” kanssa. Valitse toinen tunnus.',
	'antispoof-name-illegal'  => 'Tunnusta ”$1” ei sallita, koska $2. Hämäävien tai huijaustarkoitukseen sopivien tunnusten luonti on estetty. Valitse toinen tunnus.',
	'antispoof-badtype'       => 'se on virheellistä tietotyyppiä',
	'antispoof-empty'         => 'se on tyhjä',
	'antispoof-blacklisted'   => 'se sisältää kielletyn merkin',
	'antispoof-combining'     => 'se alkaa yhdistyvällä merkillä',
	'antispoof-unassigned'    => 'se sisältää määräämättömiä tai käytöstä poistuvia merkkejä',
	'antispoof-noletters'     => 'se ei sisällä kirjaimia',
	'antispoof-mixedscripts'  => 'se sisältää yhteensopimattomia kirjoitusjärjestelmiä',
	'antispoof-tooshort'      => 'sen kanonisoitu muoto on liian lyhyt',
);

$wgAntiSpoofMessages['fr'] = array(
	'antispoof-name-conflict' => 'Le nom d\'utilisateur « $1 » ressemble trop au nom existant « $2 ». Veuillez choisir un autre nom.',
	'antispoof-name-illegal'  => 'Le nom d\'utilisateur « $1 » n’est pas autorisé pour empêcher de confondre ou d’utiliser le nom « $2 ». Veuillez choisir un autre nom.',
	'antispoof-badtype'       => 'Mauvais type de données',
	'antispoof-empty'         => 'Chaîne vide',
	'antispoof-blacklisted'   => 'Contient un caractère interdit',
	'antispoof-combining'     => 'Commence avec une marque combinée',
	'antispoof-unassigned'    => 'Contient un caractère non assigné ou obsolète',
	'antispoof-noletters'     => 'Ne contient aucune lettre',
	'antispoof-mixedscripts'  => 'Contient plusieurs scripts incompatibles',
	'antispoof-tooshort'      => 'Nom canonique trop court',
);

$wgAntiSpoofMessages['frc'] = array(
	'antispoof-name-conflict' => 'Le nom "$1" ressemble trop au compte "$2".  Choisissez donc un autre nom.',
	'antispoof-name-illegal'  => 'Le nom "$1" est pas permit pour empêcher de confondre ou d\'user le nom "$2".  Choisissez donc un autre nom.',
	'antispoof-badtype'       => 'Mauvaise qualité d\'information',
	'antispoof-empty'         => 'Chaîne vide',
	'antispoof-blacklisted'   => 'Contient un caractère pas permit',
	'antispoof-combining'     => 'Commence avec une marque combinée',
	'antispoof-unassigned'    => 'Contient un caractère pas assigné ou désapprouvé',
	'antispoof-noletters'     => 'Contient pas de lettres',
	'antispoof-mixedscripts'  => 'Contient plusieurs scripts qui s\'adonnont pas',
	'antispoof-tooshort'      => 'Le nom choisi est trop court',
);

/** Franco-Provençal (Arpetan)
 * @author ChrisPtDe
 */
$wgAntiSpoofMessages['frp'] = array(
	'antispoof-name-conflict' => 'Lo nom d’utilisator « $1 » ressemble trop u compto ègzistent « $2 ». Volyéd chouèsir/cièrdre un ôtro nom.',
	'antispoof-name-illegal'  => 'Lo nom d’utilisator « $1 » est pas ôtorisâ por empachiér de confondre ou d’utilisar lo nom « $2 ». Volyéd chouèsir/cièrdre un ôtro nom.',
	'antispoof-badtype'       => 'Môvés tipo de balyês',
	'antispoof-empty'         => 'Chêna voueda',
	'antispoof-blacklisted'   => 'Contint un caractèro dèfendu.',
	'antispoof-combining'     => 'Comence avouéc una mârca combinâ.',
	'antispoof-unassigned'    => 'Contint un caractèro pas assignê ou pas més utilisâ.',
	'antispoof-noletters'     => 'Contint gins de lètra.',
	'antispoof-mixedscripts'  => 'Contint plusiors scripts que vont pas avouéc.',
	'antispoof-tooshort'      => 'Nom canonico trop côrt',
);

$wgAntiSpoofMessages['gl'] = array(
	'antispoof-name-conflict' => 'O nome escollido "$1" é moi parecido a "$2", un usuario que xa existe. Por favor escolla outro nome de usuario.',
	'antispoof-name-illegal'  => 'O nome "$1" non está permitido para evitar confusións ou enganos cos seguintes nomes de usuario: $2. Por favor escolla outro nome.',
	'antispoof-badtype'       => 'Tipo de datos incorrecto',
	'antispoof-empty'         => 'Cadea baleira',
	'antispoof-blacklisted'   => 'Inclúe un carácter prohibido',
	'antispoof-combining'     => 'Principia cun carácter de combinación',
	'antispoof-unassigned'    => 'Contén un carácter sen asignar ou desaconsellado',
	'antispoof-noletters'     => 'Non contén ningunha letra',
	'antispoof-mixedscripts'  => 'Contén guións mesturados incompatíbeis',
	'antispoof-tooshort'      => 'Nome curto de máis',
);

/** Gujarati (ગુજરાતી) */
$wgAntiSpoofMessages['gu'] = array(
	'antispoof-noletters' => 'આમાં એકપણ અક્ષર નથી',
);

$wgAntiSpoofMessages['hak'] = array(
	'antispoof-name-conflict' => 'Yung-fu-miàng "$1" lâu yung-fu-miàng "$2" ko-thu siông-khiun. Chhiáng sṳ́-yung khì-thâ ke yung-fu-miàng.',
	'antispoof-name-illegal'  => 'Yung-fu-miàng "$1" yi-lâu Yung-fu-miàng "$2" fun-chha̍p, yí-kîn pûn kim-chṳ́ sṳ́-yung. Chhiáng sṳ́-yung khì-thâ ke yung-fu-miàng.',
	'antispoof-badtype'       => 'Chho-ngu ke chṳ̂-liau lui-hìn',
	'antispoof-empty'         => 'Khûng-pha̍k sṳ-chhon',
	'antispoof-blacklisted'   => 'Pâu-hàm chhai het-miàng-tân song ke sṳ-ngièn',
	'antispoof-combining'     => 'Chhut-yì kiet-ha̍p phêu-ki khôi-sṳ́',
	'antispoof-unassigned'    => 'Pâu-hàm mò chṳ́-thin fe̍t-he put-chai sṳ́-yung ke sṳ-ngièn',
	'antispoof-noletters'     => 'Mò pâu-hàm ngim-hò sṳ-ngièn',
	'antispoof-mixedscripts'  => 'Pâu-hàm mò siong-yùng fun-ha̍p ke chṳ́-lin',
	'antispoof-tooshort'      => 'Ha̍p-fù phêu-chún ke miàng-chhṳ̂n thai-tón',
);

$wgAntiSpoofMessages['he'] = array(
	'antispoof-name-conflict' => 'שם המשתמש "$1" שבחרתם דומה מדי לשם המשתמש הקיים "$2". אנא בחרו שם משתמש אחר.',
	'antispoof-name-illegal'  => 'לא ניתן לבחור את שם המשתמש "$1" כדי למנוע שמות משתמש מבלבלים: $2. אנא בחרו שם משתמש אחר.',
);

$wgAntiSpoofMessages['hr'] = array(
	'antispoof-name-conflict' => 'Ime "$1" je preslično postojećem suradničkom imenu "$2". Molimo izaberite drugo ime/nadimak.',
	'antispoof-name-illegal'  => 'Ime "$1" nije dozvoljeno da se spriječi moguća zamjena suradničkih nadimaka: $2. Molimo izaberite drugo ime/nadimak.',
	'antispoof-badtype'       => 'Krivi tip podataka',
	'antispoof-empty'         => 'Prazan string',
	'antispoof-blacklisted'   => 'Sadrži nedozvoljeno slovo (karakter)',
	'antispoof-combining'     => 'Počinje s znakom spajanja',
	'antispoof-unassigned'    => 'Sadrži nedodijeljen ili zastarjeli znak (karakter)',
	'antispoof-noletters'     => 'Prekratko',
	'antispoof-mixedscripts'  => 'Nekompatibilna pisma',
	'antispoof-tooshort'      => 'Prekratko ime',
);

$wgAntiSpoofMessages['hsb'] = array(
	'antispoof-name-conflict' => 'Požadane wužiwarske mjeno „$1” je hižo eksistowacemu wužiwarskemu mjenu „$2” přepodobne. Prošu wubjer druhe wužiwarske mjeno.',
	'antispoof-name-illegal'  => 'Požadane wužiwarske mjeno „$1” njeje dowolene. Přičina: $2<br />Prošu wubjer druhe wužiwarske mjeno.',
	'antispoof-badtype'       => 'Njepłaćiwy datowy typ',
	'antispoof-empty'         => 'Prózdne polo',
	'antispoof-blacklisted'   => 'Su njedowolene znamješka wobsahowane.',
	'antispoof-combining'     => 'Započina so z kombinaciskim znamješkom.',
	'antispoof-unassigned'    => 'Su njepřirjadowane abo njewitane znamješka wobsahowane.',
	'antispoof-noletters'     => 'Njejsu pismiki wobsahowane.',
	'antispoof-mixedscripts'  => 'Su znamješka rozdźělnych njekompatibelnych pismow wobsahowane',
	'antispoof-tooshort'      => 'Kanonizowane mjeno je překrótke.',
);
$wgAntiSpoofMessages['hu'] = array(
	'antispoof-name-conflict' => 'A név, „$1”, túl hasonló egy már meglévő azonosítóhoz („$2”). Kérlek válassz másikat.',
	'antispoof-name-illegal'  => 'A név, „$1”, nem engedélyezett a zavaró vagy becsapó felhasználónevek megelőzése érdekében: $2.',
	'antispoof-badtype'       => 'Hibás adattípus',
	'antispoof-empty'         => 'Üres szöveg',
	'antispoof-blacklisted'   => 'Nem használható karaktert tartalmaz',
	'antispoof-combining'     => 'Összekapcsoló jellel kezdődik',
	'antispoof-unassigned'    => 'Még nem kijelölt vagy nem használt karaktert tartalmaz',
	'antispoof-noletters'     => 'Nem tartalmaz egyetlen betűt sem',
	'antispoof-mixedscripts'  => 'Összeférhetetlen kevert szöveget tartalmaz',
	'antispoof-tooshort'      => 'A kanonizált változat túl rövid',
);
$wgAntiSpoofMessages['id'] = array(
	'antispoof-name-conflict' => 'Nama "$1" terlalu mirip dengan akun "$2" yang sudah ada. Harap pilih nama lain.',
	'antispoof-name-illegal'  => 'Nama "$1" tidak diijinkan untuk mencegah kebingungan atau penipuan nama: $2. Harap pilih nama lain.',
	'antispoof-badtype'       => 'Tipe data salah',
	'antispoof-empty'         => 'Data kosong',
	'antispoof-blacklisted'   => 'Mengandung karakter yang tak diizinkan',
	'antispoof-combining'     => 'Dimulai dengan tanda kombinasi',
	'antispoof-unassigned'    => 'Mengandung karakter yang tak diberikan atau tak digunakan lagi',
	'antispoof-noletters'     => 'Tidak mengandung huruf apapun',
	'antispoof-mixedscripts'  => 'Mengandung skrip gabungan yang tak kompatibel',
	'antispoof-tooshort'      => 'Nama kanonikalisasi terlalu pendek',
);
$wgAntiSpoofMessages['is'] = array(
	'antispoof-name-conflict' => 'Notandanafnið „$1“ er of líkt notandanafninu „$2“. Gerðu svo vel og veldu annað.',
	'antispoof-name-illegal'  => 'Nafnið „$1“ er ekki leyft til að koma í veg fyrir ruglandi eða skopstæld notendanöfn: „$2“. Gerðu svo vel og veldu annað nafn.',
	'antispoof-badtype'       => 'Lélegt gagnatag',
	'antispoof-empty'         => 'Tómur strengur',
	'antispoof-blacklisted'   => 'Inniheldur bönnuð rittákn',
	'antispoof-combining'     => 'Byrjar á samsetningartákni',
	'antispoof-unassigned'    => 'Inniheldur óúthlutað eða úrelt tákn',
	'antispoof-noletters'     => 'Inniheldur enga stafi',
	'antispoof-mixedscripts'  => 'Inniheldur ósamhæfðar skriftur',
	'antispoof-tooshort'      => 'Nafn of stutt',
);
$wgAntiSpoofMessages['it'] = array(
	'antispoof-name-conflict' => 'Il nome utente "$1" è troppo simile all\'utente "$2", già registrato. Scegliere un altro nome.',
	'antispoof-name-illegal'  => 'Il nome utente "$1" non è consentito, per evitare confusione o utilizzi fraudolenti: $2. Scegliere un altro nome.',
	'antispoof-badtype'       => 'Tipo di dati errato',
	'antispoof-empty'         => 'Stringa vuota',
	'antispoof-blacklisted'   => 'Uso di caratteri non consentiti',
	'antispoof-combining'     => 'Primo carattere di combinazione',
	'antispoof-unassigned'    => 'Uso di caratteri non assegnati o deprecati',
	'antispoof-noletters'     => 'Assenza di lettere',
	'antispoof-mixedscripts'  => 'Combinazione di sistemi di scrittura non compatibili',
	'antispoof-tooshort'      => 'Nome in forma canonica troppo corto',
);
$wgAntiSpoofMessages['ja'] = array(
	'antispoof-name-conflict' => '指定した名前 "$1" は既に存在しているアカウント "$2" と類似しているため使用できません。別の名前を使用してください。',
	'antispoof-name-illegal'  => '指定した名前 "$1" は成りすまし防止のため使用できません: $2。別の名前を使用してください。',
	'antispoof-badtype'       => 'データタイプが異常です。',
	'antispoof-empty'         => '文字列が空です',
	'antispoof-blacklisted'   => '許可されていない文字が含まれています。',
	'antispoof-combining'     => '結合記号で開始しています',
	'antispoof-unassigned'    => '廃止予定の未割り当て文字が含まれています',
	'antispoof-noletters'     => '文字を含んでいません',
	'antispoof-mixedscripts'  => '互換性のない文字列の混合を含んでいます',
	'antispoof-tooshort'      => '正規化した名前が短すぎます',
);

/** Georgian (ქართული)
 * @author Alsandro
 */
$wgAntiSpoofMessages['ka'] = array(
	'antispoof-name-conflict' => 'სახელი "$1" ძალიან მსგავსია უკვე არსებული ანგარიშის "$2". გთხოვთ სხვა სახელი აირჩიოთ.',
	'antispoof-badtype'       => 'არასწორი მონაცემთა ტიპი',
);

$wgAntiSpoofMessages['kk-cyrl'] = array(
	'antispoof-name-conflict' => '«$1» атауы бар «$2» тіркелгіге тым ұқсас. Басқа атау таңдаңыз.',
	'antispoof-name-illegal'  => 'Қатысушы аты шатақтауын немесе қалжындауын бөгеу үшін «$1» атауы рұқсат етілмейді: $2. Басқа атау таңдаңыз.',
	'antispoof-badtype'       => 'Жарамсыз дерек түрі',
	'antispoof-empty'         => 'Бос жол',
	'antispoof-blacklisted'   => 'Қара тізімге кірген әріп бар',
	'antispoof-combining'     => 'Құрамды белгімен басталған',
	'antispoof-unassigned'    => 'Тағайындалмаған немесе тыйылған әріп бар',
	'antispoof-noletters'     => 'Ішінде ешбір әріп жоқ',
	'antispoof-mixedscripts'  => 'Ішінде сиыспайтын аралас жазу түрлері бар',
	'antispoof-tooshort'      => 'Ережеленген атауы тым қысқа',
);
$wgAntiSpoofMessages['kk-latn'] = array(
	'antispoof-name-conflict' => '«$1» atawı bar «$2» tirkelgige tım uqsas. Basqa ataw tañdañız.',
	'antispoof-name-illegal'  => 'Qatıswşı atı şataqtawın nemese qaljındawın bögew üşin «$1» atawı ruqsat etilmeýdi: $2. Basqa ataw tañdañız.',
	'antispoof-badtype'       => 'Jaramsız derek türi',
	'antispoof-empty'         => 'Bos jol',
	'antispoof-blacklisted'   => 'Qara tizimge kirgen ärip bar',
	'antispoof-combining'     => 'Quramdı belgimen bastalğan',
	'antispoof-unassigned'    => 'Tağaýındalmağan nemese tıýılğan ärip bar',
	'antispoof-noletters'     => 'İşinde eşbir ärip joq',
	'antispoof-mixedscripts'  => 'İşinde sïıspaýtın aralas jazw türleri bar',
	'antispoof-tooshort'      => 'Erejelengen atawı tım qısqa',
);
$wgAntiSpoofMessages['kk-arab'] = array(
	'antispoof-name-conflict' => '«$1» اتاۋى بار «$2» تٸركەلگٸگە تىم ۇقساس. باسقا اتاۋ تاڭداڭىز.',
	'antispoof-name-illegal'  => 'قاتىسۋشى اتى شاتاقتاۋىن نەمەسە قالجىنداۋىن بٶگەۋ ٷشٸن «$1» اتاۋى رۇقسات ەتٸلمەيدٸ: $2. باسقا اتاۋ تاڭداڭىز.',
	'antispoof-badtype'       => 'جارامسىز دەرەك تٷرٸ',
	'antispoof-empty'         => 'بوس جول',
	'antispoof-blacklisted'   => 'قارا تٸزٸمگە كٸرگەن ٵرٸپ بار',
	'antispoof-combining'     => 'قۇرامدى بەلگٸمەن باستالعان',
	'antispoof-unassigned'    => 'تاعايىندالماعان نەمەسە تىيىلعان ٵرٸپ بار',
	'antispoof-noletters'     => 'ٸشٸندە ەشبٸر ٵرٸپ جوق',
	'antispoof-mixedscripts'  => 'ٸشٸندە سيىسپايتىن ارالاس جازۋ تٷرلەرٸ بار',
	'antispoof-tooshort'      => 'ەرەجەلەنگەن اتاۋى تىم قىسقا',
);
$wgAntiSpoofMessages['ko'] = array(
	'antispoof-name-conflict' => '‘$1’ 사용자는 ‘$2’ 사용자와 이름이 너무 비슷합니다. 다른 이름으로 가입해주세요.',
	'antispoof-name-illegal'  => '‘$1’ 사용자 이름은 다음의 이유로 인해 가입이 금지되었습니다: $2. 다른 이름으로 가입해주세요.',
	'antispoof-empty'         => '빈 문자열',
);
$wgAntiSpoofMessages['ksh'] = array(
	'antispoof-name-conflict' => 'Dä Name „$1“ es „$2“ zoo ähnlich, un künnt met em verwähßelt weede. Dä Name „$2“ jitt et ald. Sök Der jet anders als Dinge Name us.',
	'antispoof-name-illegal'  => 'Dä Name „$1“ es nit möchlich, domet mer kein nohjemahte Name krije, un keine Durjenein met Schrefte: $2. Sök Der jet anders als Dinge Name us.',
);
$wgAntiSpoofMessages['la'] = array(
	'antispoof-name-conflict' => 'Nomen "$1" est nimis simile rationi "$2". Selige nomen alterum.',
	'antispoof-name-illegal'  => 'Non licet uti nomine "$1" ad nominum usorum simulationem prohibendam: $2. Selige nomen alterum.',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$wgAntiSpoofMessages['lb'] = array(
	'antispoof-name-conflict' => 'De gewënschte Benotzernumm "$1" ass dem Bemnotzernumm "$2" deen et scho gëtt ze ähnlech. Sicht iech w.e.g. een anere Benotzernumm.',
	'antispoof-name-illegal'  => 'De gewënschte Benotzernumm "$1" ass net erlaabt. Grond: $2<br \\>
Sicht iech w.e.g. een anere Benotzernumm.',
	'antispoof-badtype'       => 'Ongültegt Fichiers-Format (bad data type)',
	'antispoof-empty'         => 'Eidelt Feld',
	'antispoof-blacklisted'   => 'Et si verbueden Zeechen (Caractèren) dran.',
	'antispoof-combining'     => 'Fänkt mat engem Kombinatiounszeechen un.',
	'antispoof-unassigned'    => 'Et sinn nët zougeuerdent oder onerwéinschten Zeechen (Caractèren) dran.',
	'antispoof-noletters'     => 'Et si keng Buchstawen dran.',
	'antispoof-tooshort'      => 'De kanoniséierten Numm ass ze kuerz.',
);

$wgAntiSpoofMessages['lt'] = array(
	'antispoof-name-conflict' => 'Vardas "$1" yra per daug panašus į jau esančią paskyrą "$2". Prašome pasirinkti kitą vardą.',
	'antispoof-name-illegal'  => 'Vardas "$1" neleidžiamas, kad būtų apsisaugota nuo apgaulingų ar parodijuotų naudotojų vardų: $2. Prašome pasirinkti kitą vardą.',
	'antispoof-badtype'       => 'Blogas duomenų tipas',
	'antispoof-empty'         => 'Tuščias tekstas',
	'antispoof-blacklisted'   => 'Turi uždraustų simbolių',
	'antispoof-combining'     => 'Prasideda kombinavimo ženklu',
	'antispoof-unassigned'    => 'Yra nepaskirtų arba nebenaudotinų simbolių',
	'antispoof-noletters'     => 'Nėra nei vienos raidės',
	'antispoof-mixedscripts'  => 'Turi nepalaikomų įvairių rašmenų',
	'antispoof-tooshort'      => 'Kanonizuotas vardas per trumpas',
);
$wgAntiSpoofMessages['lo'] = array(
	'antispoof-name-conflict' => 'ຊື່ "$1" ຄ້າຍຄືກັບ ບັນຊີ "$2" ທີ່ມີຢູ່ແລ້ວ ໂພດ. ກະລຸນາ ເລືອກ ຊື່ອື່ນ.',
	'antispoof-name-illegal'  => 'ບໍ່ສາມາດອະນຸຍາດ ຊື່ "$1" ໄດ້ ເພີ່ມຫຼີກລ້ຽງ ການສັບສົນ ກັບ : $2. ກະລຸນາເລືອກຊື່ອື່ນ.',
	'antispoof-badtype'       => 'ປະເພດ ຂໍ້ມູນ ບໍ່ຖືກຕ້ອງ',
	'antispoof-empty'         => 'ບໍ່ມີໂຕໜັງສື',
	'antispoof-blacklisted'   => 'ມີໂຕໜັງສືໃນບັນຊີດຳ',
	'antispoof-combining'     => 'ເລີ່ມຕົ້ນດ້ວຍເຄື່ອງໝາຍປະສົມ',
	'antispoof-noletters'     => 'ບໍ່ມີໂຕໜັງສື',
	'antispoof-mixedscripts'  => 'ມີສະກຣິບປະປົນແບບບໍ່ຖືກຕ້ອງ',
	'antispoof-tooshort'      => 'ຊື່ຫຍໍ້ສັ້ນໂພດ',
);

$wgAntiSpoofMessages['nl'] = array(
	'antispoof-name-conflict' => 'De naam "$1" lijkt te veel op de bestaande gebruiker "$2". Kies alstublieft een andere naam.',
	'antispoof-name-illegal'  => 'De naam "$1" is niet toegestaan om verwarring of gefingeerde gebruikersnamen te voorkomen: $2. Kies alstublieft een andere naam.',
	'antispoof-badtype'       => 'Verkeerd datatype',
	'antispoof-empty'         => 'Lege string',
	'antispoof-blacklisted'   => 'Bevat verboden karakter',
	'antispoof-combining'     => 'Begint met een gecombineerd merkteken',
	'antispoof-unassigned'    => 'Bevat niet toegewezen of verouderd karakter',
	'antispoof-noletters'     => 'Bevat geen letters',
	'antispoof-mixedscripts'  => 'Bevat niet compatibele schriften',
	'antispoof-tooshort'      => 'Afgekorte naam te kort',
);
$wgAntiSpoofMessages['no'] = array(
	'antispoof-name-conflict' => 'Navnet «$1» er for likt den eksisterende kontoen «$2». Vennligst velg et annet navn.',
	'antispoof-name-illegal'  => 'Navnet «$1» er ikke tillatt for å forhindre forvirrende eller forfalskende brukernavn: $2. Vennligst velg et annet navn.',
	'antispoof-badtype'       => 'Ugyldig datatype',
	'antispoof-empty'         => 'Tom streng',
	'antispoof-blacklisted'   => 'Inneholder svartelistede tegn',
	'antispoof-combining'     => 'Begynner med kombinasjonstegn',
	'antispoof-unassigned'    => 'Inneholder ugyldig eller foreldet tegn.',
	'antispoof-noletters'     => 'Inneholder ingen bokstaver',
	'antispoof-mixedscripts'  => 'Inneholder blanding av skriftsystemer',
	'antispoof-tooshort'      => 'Navnet er for kort',
);
$wgAntiSpoofMessages['oc'] = array(
	'antispoof-name-conflict' => 'Lo nom « $1 » ressembla tròp al compte existent « $2 ». Causissètz un autre nom.',
	'antispoof-name-illegal'  => 'Lo nom « $1 » es pas autorizat per empachar de confondre o d’utilizar lo nom « $2 ». Causissètz un autre nom.',
	'antispoof-badtype'       => 'Marrit tipe de donadas',
	'antispoof-empty'         => 'Cadena voida',
	'antispoof-blacklisted'   => 'Conten un caractèr interdich',
	'antispoof-combining'     => 'Comença amb una marca combinada',
	'antispoof-unassigned'    => 'Conten un caractèr non assignat o obsolèt',
	'antispoof-noletters'     => 'Conten pas cap de letra',
	'antispoof-mixedscripts'  => 'Conten mantun escript incompatible',
	'antispoof-tooshort'      => 'Nom canonic tròp cort',
);
$wgAntiSpoofMessages['pl'] = array(
	'antispoof-name-conflict' => 'Nazwa "$1" jest zbyt podobna do nazwy innego użytkownika ($2). Proszę wybrać inną nazwę konta.',
	'antispoof-name-illegal'  => 'Nazwa "$1" nie może być użyta ze względu na podobieństwo do nazwy innego użytkownika ($2). Proszę wybrać inną nazwę.',
	'antispoof-badtype'       => 'Zły typ danych',
	'antispoof-empty'         => 'Pusty napis',
	'antispoof-blacklisted'   => 'Zawiera znak z czarnej listy',
	'antispoof-combining'     => 'Zaczyna się od łącznika',
	'antispoof-unassigned'    => 'Zawiera nieprzypisany lub wycofany znak',
	'antispoof-noletters'     => 'Nie zawiera liter',
	'antispoof-mixedscripts'  => 'Zawiera przemieszane znaki niezgodnych ze sobą pism',
	'antispoof-tooshort'      => 'Zbyt krótka nazwa użytkownika',
);
$wgAntiSpoofMessages['pms'] = array(
	'antispoof-name-conflict' => 'Lë stranòm "$1" a-j ësmija tròp a "$2", che a-i é già. Për piasì, ch\'as në sërna n\'àotr.',
	'antispoof-name-illegal'  => 'Lë stranòm "$1" as peul nen dovresse për evité confusion e/ò che cheidun as fassa passé për: $2. Për piasì, ch\'as në sërna n\'àotr.',
	'antispoof-badtype'       => 'Sòrt ëd dat nen bon-a',
	'antispoof-empty'         => 'Espression veujda',
	'antispoof-blacklisted'   => 'A-i é ëd caràter ch\'as peulo pa dovresse',
	'antispoof-combining'     => 'As anandia con na combinassion',
	'antispoof-unassigned'    => 'A son dovrasse dij caràter nen assignà, ò pura ch\'as dovrìo pì nen dovresse',
	'antispoof-noletters'     => 'A l\'ha pa gnun caràter',
	'antispoof-mixedscripts'  => 'Combinassion ëd sistema dë scritura ch\'as peulo pa butesse ansema',
	'antispoof-tooshort'      => 'Butà an forma canònica lë stranòm a resta esagerà curt',
);
$wgAntiSpoofMessages['pt'] = array(
	'antispoof-name-conflict' => 'O nome "$1" é muito similar a "$2", já existente. Por favor, escolha outro nome.',
	'antispoof-name-illegal'  => 'O nome "$1" não é permitido para prevenir que seja confundido com outro (ou que seja feito algum trocadilho): já existe $2. Por favor, escolha outro nome.',
	'antispoof-badtype'       => 'Formato de dados incorreto',
	'antispoof-empty'         => 'Linha vazia',
	'antispoof-blacklisted'   => 'Contém caracteres proibidos',
	'antispoof-combining'     => 'Inicia com um caractere de combinação',
	'antispoof-unassigned'    => 'Contém caracteres não reconhecidos ou depreciados',
	'antispoof-noletters'     => 'Não inclui nenhuma letra',
	'antispoof-mixedscripts'  => 'Contém scripts de escrita incompatíveis mesclados',
	'antispoof-tooshort'      => 'Nome muito curto',
);
$wgAntiSpoofMessages['ro'] = array(
	'antispoof-name-conflict' => 'Numele "$1" este prea asemănător cu un cont deja existent, "$2". Vă rugăm să alegeţi alt nume.',
	'antispoof-name-illegal'  => 'Numele "$1" nu este permis pentru a preveni confuziile cu numele: $2. Vă rugăm să alegeţi alt nume de utilizator.',
	'antispoof-badtype'       => 'Tip de date greşit',
	'antispoof-empty'         => 'Şir vid',
	'antispoof-noletters'     => 'Nu conţine nici o literă',
);
$wgAntiSpoofMessages['ru'] = array(
	'antispoof-name-conflict' => 'Имя «$1» похоже на уже существующую учётную запись «$2». Пожалуйста, выберите другое имя.',
	'antispoof-name-illegal'  => 'Имя «$1» не разрешено использовать во избежание спутывания с именами: $2. Пожалуйста, выберите другое имя.',
	'antispoof-badtype'       => 'Ошибочный тип данных',
	'antispoof-empty'         => 'Пустая строка',
	'antispoof-blacklisted'   => 'Содержит символы из запрещённого списка',
	'antispoof-combining'     => 'Начинатся с модифицирующего символа',
	'antispoof-unassigned'    => 'Сожержит неопределённый или неподдерживаемый символ',
	'antispoof-noletters'     => 'Не содержит букв',
	'antispoof-mixedscripts'  => 'Используются несовместимые системы письменности',
	'antispoof-tooshort'      => 'Каноническое имя слишком короткое',
);
$wgAntiSpoofMessages['sah'] = array(
	'antispoof-name-conflict' => '"$1" диэн ааты "$2" диэн киһи бэлиэр ылбыт, онон атын аатта толкуйдаа.',
	'antispoof-name-illegal'  => '"$1" диэн аат $2 диэн ааттары кытта буккулубаттарын туһугар бобуллар. Онон атын ааты толкуйдаа.',
	'antispoof-badtype'       => 'Сыыһа тииптээх дааннайдар',
	'antispoof-empty'         => 'Кураанах устуруока',
	'antispoof-blacklisted'   => 'Бобуллубут бэлиэлэр бааллар',
	'antispoof-combining'     => 'Уларытар бэлиэттэн саҕаланар',
	'antispoof-unassigned'    => 'Биллибэт эбэтэр өйөммөт бэлиэлэр бааллар',
	'antispoof-noletters'     => 'Биир даҕаны буукуба суох',
	'antispoof-mixedscripts'  => 'Сөп түбэһиспэт атын-атын суруктарынан суруллубут',
	'antispoof-tooshort'      => 'Каноннаммыт тыл наһаа кылгас',
);

$wgAntiSpoofMessages['scn'] = array(
	'antispoof-name-conflict' => 'Lu nomu utenti "$1" è troppu simili a l\'utenti "$2", già arriggistratu. Scegghiri n\'àutru nomu.',
	'antispoof-name-illegal'  => 'Lu nomu utenti "$1" nun è cunzintitu, pi evitari confusioni o utilizzi illeciti: $2. Scegghiri n\'àutru nomu.',
	'antispoof-badtype'       => 'Tipu di dati erratu',
	'antispoof-empty'         => 'Stringa vacanti',
	'antispoof-blacklisted'   => 'Usu di carattiri nun cunzintiti',
	'antispoof-combining'     => 'Primu carattiri di cumminazzioni',
	'antispoof-unassigned'    => 'Cunteni carattiri nun assignati o dipricati',
	'antispoof-noletters'     => 'Nun cunteni nudda lìttira',
	'antispoof-mixedscripts'  => 'Cumminazzioni di sistemi di scrittura nun cumpatibbili',
	'antispoof-tooshort'      => 'Nomu \'n forma canonica troppu curtu',
);

$wgAntiSpoofMessages['sk'] = array(
	'antispoof-name-conflict' => 'Meno "$1" je príliš podobné názvu existujúceho účtu "$2". Zvoľte si prosím iné.',
	'antispoof-name-illegal'  => 'Meno "$1" nie je povolené, aby sa zabránilo náhodnému alebo zámernému pomýleniu mien používateľov: $2. Zvoľte si prosím iné meno.',
	'antispoof-badtype'       => 'Nesprávny typ dát',
	'antispoof-empty'         => 'Prázdny reťazec',
	'antispoof-blacklisted'   => 'Obsahuje znak zo zoznamu zakázaných',
	'antispoof-combining'     => 'Začína kombinačným znakom',
	'antispoof-unassigned'    => 'Obsahuje nepriradený alebo zastaralý znak',
	'antispoof-noletters'     => 'Neobsahuje žiadne písmená',
	'antispoof-mixedscripts'  => 'Obsahuje nekompatibilné zmiešané písma',
	'antispoof-tooshort'      => 'Meno prevedené do kanonického tvaru je príliš krátke',
);

$wgAntiSpoofMessages['sr-ec'] = array(
	'antispoof-name-conflict' => 'Име "$1" је превише слично већ постојећем налогу "$2". Молимо изаберите неко друго име.',
	'antispoof-name-illegal'  => 'Име "$1" није дозвољено како би се спречиле забуне или лажирања корисничких имена: $2. Молимо изаберите неко друго име.',
);

$wgAntiSpoofMessages['sr-el'] = array(
	'antispoof-name-conflict' => 'Ime "$1" je previše slično već postojećem nalogu "$2". Molimo izaberite neko drugo ime.',
	'antispoof-name-illegal'  => 'Ime "$1" nije dozvoljeno kako bi se sprečile zabune ili lažiranja korisničkih imena: $2. Molimo izaberite neko drugo ime.',
);

/** Seeltersk (Seeltersk)
 * @author Pyt
 */
$wgAntiSpoofMessages['stq'] = array(
	'antispoof-name-conflict' => 'Die wonskede Benutsernoome „$1“ glieket dän al bestoundende Benutsernoome „$2“ tou fuul. Wääl n uur Noome.',
	'antispoof-name-illegal'  => 'Die wonskede Benutsernoome „$1“ is nit ferlööwed. Gruund: $2<br />Wääl n uur Benutsernoome.',
	'antispoof-badtype'       => 'Ungultigen Doatentyp',
	'antispoof-empty'         => 'Loos Fäild',
	'antispoof-blacklisted'   => 'Änthaalt nit tousteene Teekene.',
	'antispoof-combining'     => 'Kombinationsteeken toun Ounfang.',
	'antispoof-unassigned'    => 'Änthaalt nit tou-oardnede of nit wonskede Teekene.',
	'antispoof-noletters'     => 'Änthaalt neen Bouksteeuwe.',
	'antispoof-mixedscripts'  => 'Änthaalt Teekene fon uunglieke Schriftsysteme.',
	'antispoof-tooshort'      => 'Die kanonisierde Noome is tou kuut.',
);

$wgAntiSpoofMessages['su'] = array(
	'antispoof-name-conflict' => 'Landihan "$1" mirip teuing jeung "$2" nu geus tiheula aya. Mangga pilih landihan séjén.',
	'antispoof-name-illegal'  => 'Landihan "$1" teu diwenangkeun ngarah teu pahili jeung landihan: $2. Mangga pilih landihan séjén.',
	'antispoof-badtype'       => 'Tipeu datana awon',
	'antispoof-empty'         => 'String kosong',
	'antispoof-blacklisted'   => 'Ngandung karakter nu dicaram',
	'antispoof-combining'     => 'Dimimitian ku tanda gabungan',
	'antispoof-unassigned'    => 'Ngandung karakter nu teu dipaké ayawa teu didaptar',
	'antispoof-noletters'     => 'Kosong',
	'antispoof-mixedscripts'  => 'Ngandung tulisan campuran nu teu kompatibel',
	'antispoof-tooshort'      => 'Landihan kanonikna pondok teuing',
);

$wgAntiSpoofMessages['sv'] = array(
	'antispoof-name-conflict' => 'Namnet "$1" är för likt det existerande kontot "$2". Välj ett annat namn istället.',
	'antispoof-name-illegal'  => 'För att förhindra förvirrande eller felaktiga användarnamn, så är namnet "$1" inte tillåtet. Anledning: $2. Välj ett annat namn istället.',
	'antispoof-badtype'       => 'Felaktig datatyp',
	'antispoof-empty'         => 'Tom sträng',
	'antispoof-blacklisted'   => 'Innehåller otillåtna tecken',
	'antispoof-combining'     => 'Börjar med ett kombinationstecken',
	'antispoof-unassigned'    => 'Innehåller obsoleta eller icke-tilldelade tecken',
	'antispoof-noletters'     => 'Innehåller inga bokstäver',
	'antispoof-mixedscripts'  => 'Innehåller tecken från flera inkompatibla skriftsystem',
	'antispoof-tooshort'      => 'Det kanoniserade namnet är för kort',
);

$wgAntiSpoofMessages['tg'] = array(
	'antispoof-noletters'     => 'Ягон ҳарфҳо надорад',
);

/** Tonga (faka-Tonga)
 * @author SPQRobin
 * @author Tauʻolunga
 */
$wgAntiSpoofMessages['to'] = array(
	'antispoof-name-conflict' => 'Ko e hingoa "$1" ʻoku fuʻu tatau ia ki he hingoa kau-ki-ai "$2" ʻoku moʻui. Fakamolemole fili ha hingoa kehe.',
	'antispoof-name-illegal'  => 'Ko e hingoa "$1" ʻoku ʻikai ngofua ia koeʻuhi ko e "$2" ʻoku loi. Fakamolemole fili ha hingoa kehe.',
	'antispoof-empty'         => 'ʻOtutohi maha',
);

$wgAntiSpoofMessages['tr'] = array(
	'antispoof-name-conflict' => 'Seçtiğiniz kullanıcı adı olan "$1", mevcut "$2" hesabıyla benzerlik göstermektedir. Lütfen başka bir kullanıcı adı seçiniz.',
	'antispoof-name-illegal'  => '$2 hesabıyla karışmaması için "$1" ismine izin verilmemektedir. Lütfen başka bir kullanıcı adı seçiniz.',
);

$wgAntiSpoofMessages['uk'] = array(
	'antispoof-name-conflict' => "Ім'я «$1» занадто схоже на вже зареєстрований обліковий запис «$2». Будь ласка, виберіть інше ім'я",
	'antispoof-name-illegal'  => "Не дозволене використання імені «$1» з метою запобігання плутанню з занадто схожими на нього іменами: $2. Будь ласка, виберіть інше ім'я.",
);

/** Volapük (Volapük)
 * @author Malafaya
 */
$wgAntiSpoofMessages['vo'] = array(
	'antispoof-empty'     => 'Vödem vagik',
	'antispoof-noletters' => 'No ninädon tonatis alseimik',
);

$wgAntiSpoofMessages['yue'] = array(
	'antispoof-name-conflict' => '呢個名"$1"太似現有戶口"$2"。請揀過個名。',
	'antispoof-name-illegal'  => '呢個名"$1"唔畀用，以預防撈亂或者冒充："$2"。請揀過個名。',
	'antispoof-badtype'       => '錯誤嘅資料類型',
	'antispoof-empty'         => '空白字串',
	'antispoof-blacklisted'   => '有列響黑名單度嘅字元',
	'antispoof-combining'     => '以結合標記開始',
	'antispoof-unassigned'    => '包含未指定或者唔再用嘅字元',
	'antispoof-noletters'     => '唔包含任何字元',
	'antispoof-mixedscripts'  => '包含唔相容嘅混合碼',
	'antispoof-tooshort'      => '正規化嘅名太短',
);

$wgAntiSpoofMessages['zh-hans'] = array(
	'antispoof-name-conflict' => '用户名"$1"与用户名"$2"过于相近。请使用其他用户名。',
	'antispoof-name-illegal'  => '用户名"$1"易与用户名"$2"混淆，已被禁止使用。请使用其他用户名。',
	'antispoof-badtype'       => '错误的数据类型',
	'antispoof-empty'         => '空白字串',
	'antispoof-blacklisted'   => '包含在黑名单上的字元',
	'antispoof-combining'     => '以结合标记开始',
	'antispoof-unassigned'    => '包含未指定或不再使用的字元',
	'antispoof-noletters'     => '不包含任何字元',
	'antispoof-mixedscripts'  => '包含不相容混合的脚本',
	'antispoof-tooshort'      => '合符标准的名称太短',
);

$wgAntiSpoofMessages['zh-hant'] = array(
	'antispoof-name-conflict' => '用戶名"$1"與用戶名"$2"過於相近。請使用其他用戶名。',
	'antispoof-name-illegal'  => '用戶名"$1"易與用戶名"$2"混淆，已被禁止使用。請使用其他用戶名。',
	'antispoof-badtype'       => '錯誤的資料類型',
	'antispoof-empty'         => '空白字串',
	'antispoof-blacklisted'   => '包含在黑名單上的字元',
	'antispoof-combining'     => '以結合標記開始',
	'antispoof-unassigned'    => '包含未指定或不再使用的字元',
	'antispoof-noletters'     => '不包含任何字元',
	'antispoof-mixedscripts'  => '包含不相容混合的指令碼',
	'antispoof-tooshort'      => '合符標準的名稱太短',
);

# Kazakh fallbacks
$wgAntiSpoofMessages['kk-kz'] = $wgAntiSpoofMessages['kk-cyrl'];
$wgAntiSpoofMessages['kk-tr'] = $wgAntiSpoofMessages['kk-latn'];
$wgAntiSpoofMessages['kk-cn'] = $wgAntiSpoofMessages['kk-arab'];
$wgAntiSpoofMessages['kk'] = $wgAntiSpoofMessages['kk-cyrl'];

# Chinese fallbacks
$wgAntiSpoofMessages['zh'] = $wgAntiSpoofMessages['zh-hans'];
$wgAntiSpoofMessages['zh-cn'] = $wgAntiSpoofMessages['zh-hans'];
$wgAntiSpoofMessages['zh-hk'] = $wgAntiSpoofMessages['zh-hant'];
$wgAntiSpoofMessages['zh-sg'] = $wgAntiSpoofMessages['zh-hans'];
$wgAntiSpoofMessages['zh-tw'] = $wgAntiSpoofMessages['zh-hant'];
$wgAntiSpoofMessages['zh-yue'] = $wgAntiSpoofMessages['yue'];
