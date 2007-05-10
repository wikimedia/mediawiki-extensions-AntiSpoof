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
	'antispoof-name-conflict' => 'الاسم "$1" مشابه للغاية للحساب الموجود حاليا باسم "$2". اختر اسم آخر من فضلك.',
	'antispoof-name-illegal'  => 'الاسم "$1" غير مسموح به لمنع الخلط وانتحال أسماء المستخدمين: $2. اختر اسم آخر من فضلك.',
	'antispoof-badtype'       => 'نوع بيانات خاطئ',
	'antispoof-empty'         => 'سلسلة فارغة',
	'antispoof-blacklisted'   => 'يحتوي على حروف ممنوع استخدامها',
	'antispoof-noletters'     => 'لا يحتوي أية حروف',
);
$wgAntiSpoofMessages['cs'] = array(
	'antispoof-name-conflict' => 'Uživatelské jméno "$1" je příliš podobné existujícímu účtu "$2". Prosím, vyberte si jiné jméno.',
	'antispoof-name-illegal'  => 'Uživatelské jméno "$1" není povoleno vytvořit, aby se nepletlo nebo nesloužilo k napodobování uživatelského jména: $2. Prosím, vyberte si jiné jméno.',
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
$wgAntiSpoofMessages['fi'] = array(
	'antispoof-name-conflict' => 'Tunnus ”$1” on liian samankaltainen tunnuksen ”$2” kanssa. Valitse toinen tunnus.',
	'antispoof-name-illegal'  => 'Tunnusta ”$1” ei sallita, koska $2. Hämäävien tai huijaustarkoitukseen sopivien tunnusten luonti on estetty. Valitse toinen tunnus.',
	'antispoof-badtype'       => 'se on virheellistä tietotyyppiä',
	'antispoof-empty'         => 'se on tyhjä',
	'antispoof-blacklisted'   => 'se sisältää kielletyn merkin',
	'antispoof-combining'     => 'se alkaa yhdistyvällä merkillä',
	'antispoof-unassigned'    => 'se sisältää määrämättömiä tai käytöstä poistuvia merkkejä',
	'antispoof-noletters'     => 'se ei sisällä kirjaimia',
	'antispoof-mixedscripts'  => 'se sisältää yhteensopimattomia kirjoitusjärjestelmiä',
	'antispoof-tooshort'      => 'sen kanonisoitu muoto on liian lyhyt',
);
$wgAntiSpoofMessages['fr'] = array(
	'antispoof-name-conflict' => 'Le nom « $1 » ressemble trop au compte existant « $2 ». Veuillez choisir un autre nom.',
	'antispoof-name-illegal'  => 'Le nom « $1 » n’est pas autorisé pour empêcher de confondre ou d’utiliser le nom « $2 ». Veuillez choisir un autre nom.',
	'antispoof-badtype'       => 'Mauvais type de données',
	'antispoof-empty'         => 'Chaîne vide',
	'antispoof-blacklisted'   => 'Contient un caractère interdit',
	'antispoof-combining'     => 'Commence avec une marque combinée',
	'antispoof-unassigned'    => 'Contient un caractère non assigné ou obsolète',
	'antispoof-noletters'     => 'Ne contient aucune lettre',
	'antispoof-mixedscripts'  => 'Contient plusieurs scripts incompatibles',
	'antispoof-tooshort'      => 'Nom canonique trop court',
);
$wgAntiSpoofMessages['he'] = array(
	'antispoof-name-conflict' => 'שם המשתמש "$1" שבחרתם דומה מדי לשם המשתמש הקיים "$2". אנא בחרו שם משתמש אחר.',
	'antispoof-name-illegal'  => 'לא ניתן לבחור את שם המשתמש "$1" כדי למנוע שמות משתמש מבלבלים: $2. אנא בחרו שם משתמש אחר.',
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
$wgAntiSpoofMessages['kk-kz'] = array(
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
$wgAntiSpoofMessages['kk-tr'] = array(
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
$wgAntiSpoofMessages['kk-cn'] = array(
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
$wgAntiSpoofMessages['kk'] = $wgAntiSpoofMessages['kk-kz'];
$wgAntiSpoofMessages['ksh'] = array(
	'antispoof-name-conflict' => 'Dä Name „$1“ es „$2“ zoo ähnlich, un künnt met em verwähßelt weede. Dä Name „$2“ jitt et ald. Sök Der jet anders als Dinge Name us.',
	'antispoof-name-illegal'  => 'Dä Name „$1“ es nit möchlich, domet mer kein nohjemahte Name krije, un keine Durjenein met Schrefte: $2. Sök Der jet anders als Dinge Name us.',
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
$wgAntiSpoofMessages['nl'] = array(
	'antispoof-name-conflict' => 'De naam "$1" lijkt te veel op de bestaande gebruiker "$2". Kies alstublieft een andere naam.',
	'antispoof-name-illegal'  => 'De naam "$1" is niet toegestaan om verwarring of gefingeerde gebruikersnamen te voorkomen: $2. Kies alstublieft een andere naam.',
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
$wgAntiSpoofMessages['pt'] = array(
	'antispoof-name-conflict' => 'O nome "$1" é muito similar com o "$2", já existente. Por gentileza, escolha outro nome.',
	'antispoof-name-illegal'  => 'O nome "$1" não é permitido, para prevenir que seja confundido com outro (ou que seja feito algum trocadilho): já existe $2. Por gentileza, escolha outro nome.',
	'antispoof-badtype'       => 'Formato de dados incorreto',
	'antispoof-empty'         => 'Linha vazia',
	'antispoof-blacklisted'   => 'Contém caracteres proibidos',
	'antispoof-combining'     => 'Inicia com um caractere de combinação',
	'antispoof-unassigned'    => 'Contém caracteres não reconhecidos ou depreciados',
	'antispoof-noletters'     => 'Não inclui nenhuma letra',
	'antispoof-mixedscripts'  => 'Contém scripts de escrita incompatíveis mesclados',
	'antispoof-tooshort'      => 'Nome muito curto',
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
$wgAntiSpoofMessages['uk'] = array(
	'antispoof-name-conflict' => "Ім'я «$1» занадто схоже на вже зареєстрований обліковий запис «$2». Будь ласка, виберіть інше ім'я",
	'antispoof-name-illegal'  => "Не дозволене використання імені «$1» з метою запобігання плутанню з занадто схожими на нього іменами: $2. Будь ласка, виберіть інше ім'я.",
);
$wgAntiSpoofMessages['zh-cn'] = array(
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
$wgAntiSpoofMessages['zh-tw'] = array(
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
$wgAntiSpoofMessages['zh-yue'] = array(
	'antispoof-name-conflict' => '呢個名"$1"同現有嘅戶口"$2"大過接近。請揀過另一個名。',
	'antispoof-name-illegal'  => '呢個名"$1"唔畀用，以預防同用戶名"$2"混淆。請揀過另一個名。',
	'antispoof-badtype'       => '錯誤嘅資料類型',
	'antispoof-empty'         => '空白字串',
	'antispoof-blacklisted'   => '包含響黑名單度嘅字元',
	'antispoof-combining'     => '以結合標記開始',
	'antispoof-unassigned'    => '包含未指定或者唔再用嘅字元',
	'antispoof-noletters'     => '唔包含任何字元',
	'antispoof-mixedscripts'  => '包含唔相容混合嘅指令碼',
	'antispoof-tooshort'      => '合符標準嘅名太短',
);
$wgAntiSpoofMessages['zh-hk'] = $wgAntiSpoofMessages['zh-tw'];
$wgAntiSpoofMessages['zh-sg'] = $wgAntiSpoofMessages['zh-cn'];

?>
