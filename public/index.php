<?php

// Autologin:
//   Note: During development, when auth is not implemented yet ,
//       pages are displayed on url like:
//       http://localhost/?page=login
//       http://localhost/?page=allboards

// Change visible page based on $_PORT variable content.

//require '../vendor/autoload.php';

/*
=========== SESSION START ===========
*/

session_start();

if (isset($_POST['at-field-username_and_email']) && isset($_POST['at-field-password'])) {
    if ($_POST['at-field-username_and_email'] == 'test' && $_POST['at-field-password'] == 'test') {
        $_SESSION["user"] = "test";
    }
    /*
    else {
        session_unset();
        session_destroy();
    }
    */
}

/*
=========== SESSION END ===========
*/

/*
=========== SETTINGS START ===========
*/

include_once('../settings.php');

/*
=========== SETTINGS END ===========
*/


/*
=========== TRANSLATIONS START ===========
 Translations start:
 1) Check browser language
 2) If translation exists, load translation from JSON file
*/

 if (!empty( $_SERVER[ 'HTTP_ACCEPT_LANGUAGE' ] ) ) {
   $langs = explode( ',', $_SERVER['HTTP_ACCEPT_LANGUAGE'] );
   if (!empty($langs[ 0 ])) {
     $lang = $langs[ 0 ];
     // If browser language is ascii:
     if (mb_detect_encoding($lang, 'ASCII', true)) {
       // If length of browser language code if 5, like fi-FI
       if (strlen($lang) == 5) {
         // Format language to first 2 lowercase, then - , then 2 last uppercase, like fi-FI
         $lang = strtolower(substr($lang, 0, 2)) . "-" . strtoupper(substr($lang, 3, 2));
         // Short name of language
         $langshort = substr($lang, 0, 2);
         // If it's same language in another country, keep those language names same
         switch ($lang) {
           case "ar-EG":
           case "zh-CN":
           case "zh-HK":
           case "zh-TW":
           case "en-GB":
           case "de-CH":
           case "pt-BR":
           case "es-AR":
           case "es-LA":
           case "es-CL":
           case "es-MX":
           case "es-PY":
           case "es-PE":
             break;
           default:
             // Otherwise, it's same as short langage name.
             $lang = $langshort;
         }
       } else if (strlen($lang) == 2) {
         $lang = strtolower($lang);
         switch ($lang) {
           case "ar":
           case "hy":
           case "eu":
           case "br":
           case "bg":
           case "ca":
           case "hr":
           case "cs":
           case "da":
           case "nl":
           case "en":
           case "eo":
           case "fi":
           case "fr":
           case "gl":
           case "ka":
           case "de":
           case "el":
           case "he":
           case "hu":
           case "hi":
           case "ig":
           case "id":
           case "it":
           case "ja":
           case "km":
           case "ko":
           case "lv":
           case "mk":
           case "mn":
           case "nb":
           case "oc":
           case "fa":
           case "pa":
           case "pl":
           case "pt":
           case "ro":
           case "ru":
           case "sr":
           case "sk":
           case "sl":
           case "es":
           case "sv":
           case "sw":
           case "ta":
           case "th":
           case "tr":
           case "uk":
           case "vi":
             break;
           default:
             $lang="en";
         }
       } else {
         // In case of language name not 2 or 5 characters, only es-LA has non-ASCII language name
         $lang = "es-LA";
       }
     } else {
       // Only es-LA has non-ASCII language name
       $lang = "es-LA";
    }
   } else {
     if (isset($defaultLang)) {
       $lang = $defaultLang;
     } else {
       $lang = 'en';
     }
   }
} else {
    if (isset($defaultLang)) {
    $lang = $defaultLang;
    } else {
    $lang = 'en';
    }
}


// User language
$langjson = file_get_contents('i18n/' . $lang . '.i18n.json');
$langtranslate = json_decode($langjson, true);

// English language
$enlangjson = file_get_contents('i18n/en.i18n.json');
$enlangtranslate = json_decode($enlangjson, true);


function translate($text) {
  global $langjson, $langtranslate, $enlangjson, $enlangtranslate;
  // If translation exists, return it
  if ($langtranslate[$text]) {
    echo $langtranslate[$text];
  // If only English translation exists, return it
  } else if (isset($enlangtranslate[$text])) {
    echo $enlangtranslate[$text];
  // If no translation exists, return translation string
  } else {
    echo $text;
  }
}

/*
=========== TRANSLATIONS END ===========
*/

/*
=========== PAGE START ===========
*/

$page = substr($_SERVER['REQUEST_URI'], 1);
$page = str_replace("index.php/", "", $page);

// If page is not set, show sign-in
if ($page == "") {
  $page = "sign-in";
}

/*
=========== PAGE END ===========
*/


/*
=========== DEBUG START ===========
*/

$debug = false;
if ($debug) {
  // Error reporting: ALL
  ini_set('error_reporting', E_ALL);
}

if ($debug) {

  $indicesServer = array('PHP_SELF',
    'argv',
    'argc',
    'GATEWAY_INTERFACE',
    'SERVER_ADDR',
    'SERVER_NAME',
    'SERVER_SOFTWARE',
    'SERVER_PROTOCOL',
    'REQUEST_METHOD',
    'REQUEST_TIME',
    'REQUEST_TIME_FLOAT',
    'QUERY_STRING',
    'DOCUMENT_ROOT',
    'HTTP_ACCEPT',
    'HTTP_ACCEPT_CHARSET',
    'HTTP_ACCEPT_ENCODING',
    'HTTP_ACCEPT_LANGUAGE',
    'HTTP_CONNECTION',
    'HTTP_HOST',
    'HTTP_REFERER',
    'HTTP_USER_AGENT',
    'HTTPS',
    'REMOTE_ADDR',
    'REMOTE_HOST',
    'REMOTE_PORT',
    'REMOTE_USER',
    'REDIRECT_REMOTE_USER',
    'SCRIPT_FILENAME',
    'SERVER_ADMIN',
    'SERVER_PORT',
    'SERVER_SIGNATURE',
    'PATH_TRANSLATED',
    'SCRIPT_NAME',
    'REQUEST_URI',
    'PHP_AUTH_DIGEST',
    'PHP_AUTH_USER',
    'PHP_AUTH_PW',
    'AUTH_TYPE',
    'PATH_INFO',
    'ORIG_PATH_INFO') ;

  echo '<table cellpadding="10">' ;
  foreach ($indicesServer as $arg) {
    if (isset($_SERVER[$arg])) {
        echo '<tr><td>'.$arg.'</td><td>' . $_SERVER[$arg] . '</td></tr>' ;
    }
    else {
        echo '<tr><td>'.$arg.'</td><td>-</td></tr>' ;
    }
  }
  echo '</table>' ;

}

/*
=========== DEBUG END ===========
*/

/*
=========== HEADER START ===========
*/

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php
if ($lang="he" or $lang="ar") {
  ?>dir="rtl"<?php
}
?> lang="<?php echo $lang; ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo htmlentities($productName); ?></title>
    <meta name="robots" content="noindex,nofollow">
    <meta name="viewport" content="maximum-scale=1.0,width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo urlencode($shortcutIcon); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo urlencode($appleTouchIcon180x180); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo urlencode($favicon32x32); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo urlencode($favicon16x16); ?>">
    <link rel="manifest" href="<?php echo urlencode($manifest); ?>">
    <link rel="mask-icon" href="<?php echo urlencode($maskIcon); ?>" color="#<?php echo strip_tags($maskIconColor); ?>">
    <meta name="apple-mobile-web-app-title" content="<?php echo htmlentities($productName); ?>">
    <meta name="application-name" content="<?php echo htmlentities($productName); ?>">
    <meta name="msapplication-TileColor" content="#<?php echo strip_tags($msapplicationTileColor); ?>">
    <meta name="theme-color" content="#<?php echo strip_tags($themeColor); ?>">

    <style type="text/css">
        #drop_file_zone {
            background-color: #EEE;
            border: #999 5px dashed;
            width: 290px;
            height: 200px;
            padding: 8px;
            font-size: 18px;
        }
        #drag_upload_file {
            width:50%;
            margin:0 auto;
        }
        #drag_upload_file p {
            text-align: center;
        }
        #drag_upload_file #selectfile {
            display: none;
        }
        font-family: <?php echo strip_tags($font); ?>;
        background-color: #<?php echo strip_tags($bgColor); ?>;

    </style>

<?php
/*

<link rel="stylesheet" type="text/css" href="css/minimal.css">


    <noscript>
    <link rel="stylesheet" type="text/css" href="css/minimal.css">
    </noscript>

<script type="text/javascript" src="js/style.js">
    </script>

*/
?>
</head>

<body>

<?php

// <body background="img/background.jpg">
?>

<br>
<a href="/allpages" bgcolor="white">All Pages</a>

<?php 
//echo f(substr($_SERVER['REQUEST_URI'], 0, 11) === "/project/b/") {

//echo $_SERVER['REQUEST_URI'];
//echo "&nbsp;";
//echo substr($_SERVER['REQUEST_URI'], 1);
echo "&nbsp; / &nbsp;";
echo $page;

//echo "&nbsp; SubUrl: ";
//echo $subUrl;

?>
<br>

</a>

<br>

<?php

/*
=========== HEADER END ===========
*/

/*
=========== UPLOAD START ===========
*/

// onlyupload

if (isset($_FILES["fileToUpload"]["name"])) {
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  // Check if image file is a actual image or fake image
  /*
  if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }
  }
  */

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
    die();
}

// dragupload

if (isset($_FILES['file']['name'])) {

  /*
  $arr_file_types = ['image/png', 'image/gif', 'image/jpg', 'image/jpeg'];

  if (!(in_array($_FILES['file']['type'], $arr_file_types))) {
      echo "false";
      return;
  }
  */

  if (!file_exists('uploads')) {
    mkdir('uploads', 0777);
  }

  $filename = time().'_'.$_FILES['file']['name'];

  move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/'.$filename);

  echo 'uploads/'.$filename;
  die();
}

/*
=========== UPLOAD END ===========
*/

/*
=========== SIGN-IN PART 1 START ===========
*/

if ($page == "sign-in") {

?>

  <center>

<?php
  
  if ($hideLogo != true) {
  
      // Login logo link URL start
      if (!empty($loginLogoLinkUrl)) {
        echo '<a href="' . urlencode($loginLogoLinkUrl) . '">';
      }
  
      // Login logo image URL
      if (!empty($loginLogoImageUrl)) {
        echo '<img src="' . urlencode($loginLogoImageUrl) . '" alt="' . 
        htmlentities($productName) .
        '" width="' . strip_tags($loginLogoImageWidth) .
        '" height="' . strip_tags($loginLogoImageHeight) . '">';
      }
  
      // Login logo link URL end
      if (!empty($loginLogoLinkUrl)) {
        echo "</a>";
      }
  
  }
  
  ?>
          <br /><br />
  
  <?php
  // <table width="80%" border="0" margin="0" padding="0">
  ?>
  
          <table>
              <tr>
                  <td>
                      <h1>
                          <?php translate("log-in"); ?>
                      </h1>
                      <form role="form" id="at-pwd-form" novalidate="" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
  
                          <div class="at-form-authentication">
                              <label for="select-authentication"><?php translate("authentication-method"); ?></label>
                              <select class="select-authentication">
                                  <option value="password"><?php translate("password"); ?></option>
                              </select>
                          </div>
                          <br />
                          <div class="at-input">
                              <label for="at-field-username_and_email"><?php translate("username");
echo " ";
translate("or");
echo " ";
translate("email");
?></label><br />
                              <input type="text" id="at-field-username_and_email" name="at-field-username_and_email" placeholder="" autocapitalize="none" autocorrect="off">
                          </div>
                          <br />
                          <div class="at-input"><label for="at-field-password"><?php translate("password"); ?></label><br />
                              <input type="password" id="at-field-password" name="at-field-password" placeholder="" autocapitalize="none" autocorrect="off">
                          </div>
                          <br />
<?php

/*
=========== SIGN-IN PART 1 END ===========
*/

/*
=========== SIGN-UP PART 1 START ===========
*/

} else if ($page == "sign-up") {

?>

  <center>

<?php

if ($hideLogo != true) {

    // Login logo link URL start
    if (!empty($loginLogoLinkUrl)) {
      echo '<a href="' . urlencode($loginLogoLinkUrl) . '">';
    }

    // Login logo image URL
    if (!empty($loginLogoImageUrl)) {
      echo '<img src="' . urlencode($loginLogoImageUrl) . '" alt="' . 
      htmlentities($productName) .
      '" width="' . strip_tags($loginLogoImageWidth) .
      '" height="' . strip_tags($loginLogoImageHeight) . '">';
    }

    // Login logo link URL end
    if (!empty($loginLogoLinkUrl)) {
      echo "</a>";
    }

}

?>
        <br /><br />

<?php
// <table width="80%" border="0" margin="0" padding="0">
?>

        <table>
            <tr>
                <td>
                    <h1>
                        <?php translate("sign-up"); ?>
                    </h1>

                    <section class="auth-dialog">
    <div class="at-form">
        <div class="at-title">
    <h3><?php translate("signupPopup-title"); ?></h3>
  </div>
      
  <div class="at-pwd-form"><div class="at-form-authentication" style="display: none;">
  <label><?php translate("authentication-method"); ?></label>
  <br>

<select class="select-authentication"><option value="password"><?php translate("password"); ?></option></select></div>
    <form role="form" id="at-pwd-form" novalidate="" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

    <div class="at-input">
      <label for="at-field-username">
        <?php translate("username"); ?>
      </label>
      <br>
    <input type="text" id="at-field-username" name="at-field-username" placeholder="<?php translate("username"); ?>" autocapitalize="none" autocorrect="off">
  </div>
  <br>
    <div class="at-input">
      <label for="at-field-email">
        <?php translate("email"); ?>
      </label>
      <br>
    <input type="text" id="at-field-email" name="at-field-email" placeholder="<?php translate("email"); ?>" autocapitalize="none" autocorrect="off">
  </div>
  <br>
    <div class="at-input">
      <label for="at-field-password">
      <?php translate("password"); ?>
      </label>
      <br>
    <input type="password" id="at-field-password" name="at-field-password" placeholder="<?php translate("password"); ?>" autocapitalize="none" autocorrect="off">
  </div>
  <br>
    <div class="at-input">
      <label for="at-field-password_again">
        <?php translate("password-again"); ?>
      </label>
      <br>
    <input type="password" id="at-field-password_again" name="at-field-password_again" placeholder="<?php translate("password-again"); ?>" autocapitalize="none" autocorrect="off">
  </div>
  <br>
    <div class="at-input" id="invitationcode" style="display: none;">
    <label for="at-field-code">
        <?php translate("invitation-code"); ?>
    </label>
    <br>
   <input id="at-field-invitationcode" type="text" name="at-field-invitationcode" placeholder="<?php translate("invitation-code"); ?>">
   </div>

    <br />
<?php

/*
=========== SIGN-UP PART 1 END ===========
*/

/*
=========== SELECT-LANG START ===========
*/

} else if ($page == "sign-up" or $page == "sign-in") {
  
?>


                          <div class="at-select-lang">
                              <p>
                                  <select class="select-lang">
                                      <option <?php if ($lang=="ar" ) {echo 'selected="selected"' ;}; ?> value="ar">Arabic / العربية</option>
                                      <option <?php if ($lang=="ar-EG" ) {echo 'selected="selected"' ;}; ?> value="ar-EG">Arabic (Egypt) /مَصرى</option>
                                      <option <?php if ($lang=="hy" ) {echo 'selected="selected"' ;}; ?> value="hy">Armenian / Հայերեն</option>
                                      <option <?php if ($lang=="eu" ) {echo 'selected="selected"' ;}; ?> value="eu">Basque / Euskara</option>
                                      <option <?php if ($lang=="br" ) {echo 'selected="selected"' ;}; ?> value="br">Breton / Brezhoneg</option>
                                      <option <?php if ($lang=="bg" ) {echo 'selected="selected"' ;}; ?> value="bg">Bulgarian / Български</option>
                                      <option <?php if ($lang=="ca" ) {echo 'selected="selected"' ;}; ?> value="ca">Catalan / Català</option>
                                      <option <?php if ($lang=="zh-CN" ) {echo 'selected="selected"' ;}; ?> value="zh-CN">Chinese (China) / 简体中文</option>
                                      <option <?php if ($lang=="zh-HK" ) {echo 'selected="selected"' ;}; ?> value="zh-HK">Chinese (Hong Kong) / 繁体中文（香港)</option>
                                      <option <?php if ($lang=="zh-TW" ) {echo 'selected="selected"' ;}; ?> value="zh-TW">Chinese (Taiwan) / 繁體中文（台灣)</option>
                                      <option <?php if ($lang=="hr" ) {echo 'selected="selected"' ;}; ?> value="hr">Croatian / Hrvatski</option>
                                      <option <?php if ($lang=="cs" ) {echo 'selected="selected"' ;}; ?> value="cs">Czech / čeština‎</option>
                                      <option <?php if ($lang=="da" ) {echo 'selected="selected"' ;}; ?> value="da">Danish / Dansk</option>
                                      <option <?php if ($lang=="nl" ) {echo 'selected="selected"' ;}; ?> value="nl">Dutch / Nederlands</option>
                                      <option <?php if ($lang=="en" ) {echo 'selected="selected"' ;}; ?> value="en">English</option>
                                      <option <?php if ($lang=="en-GB" ) {echo 'selected="selected"' ;}; ?> value="en-GB">English (UK)</option>
                                      <option <?php if ($lang=="eo" ) {echo 'selected="selected"' ;}; ?> value="eo">Esperanto</option>
                                      <option <?php if ($lang=="fi" ) {echo 'selected="selected"' ;}; ?> value="fi">Finnish / Suomi</option>
                                      <option <?php if ($lang=="fr" ) {echo 'selected="selected"' ;}; ?> value="fr">French / Français</option>
                                      <option <?php if ($lang=="gl" ) {echo 'selected="selected"' ;}; ?> value="gl">Galician / Galego</option>
                                      <option <?php if ($lang=="ka" ) {echo 'selected="selected"' ;}; ?> value="ka">Georgian / ქართული</option>
                                      <option <?php if ($lang=="de" ) {echo 'selected="selected"' ;}; ?> value="de">German (Germany) / Deutsch</option>
                                      <option <?php if ($lang=="de-CH" ) {echo 'selected="selected"' ;}; ?> value="de-CH">German (Switzerland) / Deutsch (Schweiz)</option>
                                      <option <?php if ($lang=="el" ) {echo 'selected="selected"' ;}; ?> value="el">Greek / Ελληνικά</option>
                                      <option <?php if ($lang=="he" ) {echo 'selected="selected"' ;}; ?> value="he">Hebrew / עברית</option>
                                      <option <?php if ($lang=="hu" ) {echo 'selected="selected"' ;}; ?> value="hu">Hungarian / Magyar</option>
                                      <option <?php if ($lang=="hi" ) {echo 'selected="selected"' ;}; ?> value="hi">Hindi / हिन्दी</option>
                                      <option <?php if ($lang=="ig" ) {echo 'selected="selected"' ;}; ?> value="ig">Igbo</option>
                                      <option <?php if ($lang=="id" ) {echo 'selected="selected"' ;}; ?> value="id">Indonesian / Bahasa Indonesia</option>
                                      <option <?php if ($lang=="it" ) {echo 'selected="selected"' ;}; ?> value="it">Italian / Italiano</option>
                                      <option <?php if ($lang=="ja" ) {echo 'selected="selected"' ;}; ?> value="ja">Japanese / 日本語</option>
                                      <option <?php if ($lang=="km" ) {echo 'selected="selected"' ;}; ?> value="km">Khmer / ភាសាខ្មែរ</option>
                                      <option <?php if ($lang=="ko" ) {echo 'selected="selected"' ;}; ?> value="ko">Korean / 한국어</option>
                                      <option <?php if ($lang=="lv" ) {echo 'selected="selected"' ;}; ?> value="lv">Latvian / Latviešu</option>
                                      <option <?php if ($lang=="lt" ) {echo 'selected="selected"' ;}; ?> value="lt">Lithuanian / Lietuvių kalba</option>
                                      <option <?php if ($lang=="mk" ) {echo 'selected="selected"' ;}; ?> value="mk">Macedonian / македонски јазик</option>
                                      <option <?php if ($lang=="mn" ) {echo 'selected="selected"' ;}; ?> value="mn">Mongolian / Монгол</option>
                                      <option <?php if ($lang=="nb" ) {echo 'selected="selected"' ;}; ?> value="nb">Norwegian Bokmål / Norsk bokmål</option>
                                      <option <?php if ($lang=="oc" ) {echo 'selected="selected"' ;}; ?> value="oc">Occitan (post 1500)</option>
                                      <option <?php if ($lang=="fa" ) {echo 'selected="selected"' ;}; ?> value="fa">Persian / فارسی</option>
                                      <option <?php if ($lang=="fa-IR" ) {echo 'selected="selected"' ;}; ?> value="fa-IR">Persian (Iran) / فارسی/پارسی (ایران‎)</option>
                                      <option <?php if ($lang=="pa" ) {echo 'selected="selected"' ;}; ?> value="pa">Panjabi (Punjabi) /  ਪੰਜਾਬੀ</option>
                                      <option <?php if ($lang=="pl" ) {echo 'selected="selected"' ;}; ?> value="pl">Polish / Polski</option>
                                      <option <?php if ($lang=="pt" ) {echo 'selected="selected"' ;}; ?> value="pt">Portuguese (Portugal) / Português</option>
                                      <option <?php if ($lang=="pt-BR" ) {echo 'selected="selected"' ;}; ?> value="pt-BR">Portuguese (Brazil) / Português do Brasil</option>
                                      <option <?php if ($lang=="ro" ) {echo 'selected="selected"' ;}; ?> value="ro">Romanian / Română</option>
                                      <option <?php if ($lang=="ru" ) {echo 'selected="selected"' ;}; ?> value="ru">Russian / Русский</option>
                                      <option <?php if ($lang=="sr" ) {echo 'selected="selected"' ;}; ?> value="sr">Serbian / Српски језик</option>
                                      <option <?php if ($lang=="sk" ) {echo 'selected="selected"' ;}; ?> value="sk">Slovak / Slovenčina</option>
                                      <option <?php if ($lang=="sl" ) {echo 'selected="selected"' ;}; ?> value="sl">Slovenian / slovenščina</option>
                                      <option <?php if ($lang=="es" ) {echo 'selected="selected"' ;}; ?> value="es">Spanish (Spain) / español</option>
                                      <option <?php if ($lang=="es-LA" ) {echo 'selected="selected"' ;}; ?> value="es-LA">Spanish (Latin America) / español de América Latina</option>
                                      <option <?php if ($lang=="es-AR" ) {echo 'selected="selected"' ;}; ?> value="es-AR">Spanish (Argentina) / español de Argentina</option>
                                      <option <?php if ($lang=="es-CL" ) {echo 'selected="selected"' ;}; ?> value="es-CL">Spanish (Chile) / español de Chile</option>
                                      <option <?php if ($lang=="es-MX" ) {echo 'selected="selected"' ;}; ?> value="es-MX">Spanish (Mexico) / español de México</option>
                                      <option <?php if ($lang=="es-PY" ) {echo 'selected="selected"' ;}; ?> value="es-PY">Spanish (Paraguay) / español de Paraguayo</option>
                                      <option <?php if ($lang=="es-PE" ) {echo 'selected="selected"' ;}; ?> value="es-PE">Spanish (Peru) / español de Perú</option>
                                      <option <?php if ($lang=="sv" ) {echo 'selected="selected"' ;}; ?> value="sv">Swedish / Svenska</option>
                                      <option <?php if ($lang=="sw" ) {echo 'selected="selected"' ;}; ?> value="sw">Swahili / Kiswahili</option>
                                      <option <?php if ($lang=="ta" ) {echo 'selected="selected"' ;}; ?> value="ta">Tamil / தமிழ்</option>
                                      <option <?php if ($lang=="th" ) {echo 'selected="selected"' ;}; ?> value="th">Thai / ไทย</option>
                                      <option <?php if ($lang=="tr" ) {echo 'selected="selected"' ;}; ?> value="tr">Turkish / Türkçe</option>
                                      <option <?php if ($lang=="uk" ) {echo 'selected="selected"' ;}; ?> value="uk">Ukrainian / Українська</option>
                                      <option <?php if ($lang=="vi" ) {echo 'selected="selected"' ;}; ?> value="vi">Vietnamese / Tiếng Việt</option>
                                  </select>
                              </p>
                          </div>
<?php

/*
=========== SELECT-LANG END ===========
*/

/*
=========== SIGN-IN PART 2 START ===========
*/

} else if ($page == "sign-in") {

?>

                          <input type="submit" name="login" class="at-btn submit" id="at-btn" value="<?php translate("log-in"); ?>">
                      </form>
  
                      <br />
  
                      <div class="at-signup-link">
                          <p><a href="/sign-up" id="at-signUp" class="at-link at-signup"><?php translate("registration"); ?></a></p>
                      </div>
  
                      <div class="at-pwd-link">
                      <p><a href="/forgot-password" id="at-forgotPwd" class="at-link at-pwd"><?php translate("forgot-password"); ?></a></p>
                      </div>
  
                  </td>
              </tr>
          </table>
      </center>
  
<?php

/*
=========== SIGN-IN PART 2 END ===========
*/

/*
=========== SIGN-UP PART 2 START ===========
*/

} else if ($page == "sign-up") {

?>

                        <input type="submit" name="register" class="at-btn submit" id="at-btn" value="<?php translate("register"); ?>">
                    </form>

                    <br>
        <div class="at-signin-link">
    <p>

    <br>

    <?php translate("if-you-already-have-an-account"); ?>
      <a href="/sign-in" id="at-signIn" class="at-link at-signin">
        <?php translate("log-in"); ?></a>
    </p>

    <div class="at-pwd-link">
      <p><a href="/forgot-password" id="at-forgotPwd" class="at-link at-pwd"><?php translate("forgot-password"); ?></a></p>
    </div>

  </div>
    </div>
                           

                </td>
            </tr>
        </table>
    </center>

<?php

/*
=========== SIGN-UP PART 2 END ===========
*/

/*
=========== FORGOT PASSWORD START ===========
*/

} else if ($page == "forgotpassword") {

/*
=========== FORGOT PASSWORD END ===========
*/

/*
=========== ALL BOARDS START ===========
*/

} else if ($page == "allboards") {

?>

    <div class="navigation">
        <div style="float: left; text-align: left;">
            <img src="logo-header.png" alt="">
            <span class="allBoards"><a href="/"><img src="img/home.png"><?php translate("all-boards"); ?></a></span>
            <span class="current empty">Star a board to add a shortcut in this bar.</span>
        </div>
        <div style="float: right; text-align: right;">
            <span><a class="notifications-drawer-toggle fa fa-bell" href="#">Notifications</a></span>
            <span><?php echo $_SESSION["user"]; ?></span>
        </div>
    </div>
    <div style="position:absolute; top: 50px;">
            <h1><?php translate("my-boards"); ?></h1>

 <div style="text-align: center; min-height: 100px; border: 1px solid black; padding: 2px; border-radius: 10px 10px 10px 10px;"><br /><br /><?php translate("add-board"); ?></a></div>

 <div style="min-height: 100px; border: 1px solid black; padding: 2px; border-radius: 10px 10px 10px 10px;">hep hei<br>joojojoj jodsjfdo fjsodf fjdos<br>jijdijgsidji<br>okfodskfso</div>

 <div class="minicard">hep hei<br>joojojoj jodsjfdo fjsodf fjdos<br>jijdijgsidji<br>okfodskfso</div>

</div>
<div class="dates">
<div class="date"><a class="js-edit-date card-date start-date current" title="Alkaa tiistai, 7. tammikuuta 2020, klo 09.00" href="#" aria-label="Alkaa tiistai, 7. tammikuuta 2020, klo 09.00"><time datetime="2020-01-07T07:00:00.000Z">7.1.2020</time></a></div>
<div class="date"><a class="js-edit-date card-date due-date long-overdue" title="Erääntyy torstai, 30. tammikuuta 2020, klo 15.00" href="#" aria-label="Erääntyy torstai, 30. tammikuuta 2020, klo 15.00"><time datetime="2020-01-30T13:00:00.000Z">30.1.2020</time></a></div>

<div class="date"><a class="js-edit-time card-time card-label-green" title="Käytetty aika 3 tuntia" href="#" aria-label="Käytetty aika 3 tuntia">3</a></div></div>
<div class="minicard-custom-fields"></div>



<div class="badges">
<div class="badge badge-state-image-only" title="Testing checklists etc with Wekan, The Open Source Trello-like kanban https://wekan.github.io"><span class="badge-icon fa fa-align-left"></span></div>
<div class="badge badge-state-image-only" title="Cool?"><span class="badge-icon fa fa-thumbs-up text-green"></span>
<span class="badge-text">1</span>
<span class="badge-icon fa fa-thumbs-down"></span>
<span class="badge-text">0</span></div>
<div class="badge badge-state-image-only" title="true"><span class="badge-icon fa fa-check text-green"></span>
</div>
<div class="badge"><span class="badge-icon fa fa-paperclip"></span>
<span class="badge-text">1</span></div>
<div class="badge"><span class="badge-icon fa fa-check-square-o"></span>
<span class="badge-text check-list-text">1/3</span></div>

</div></div></a>

<a class="open-minicard-composer js-card-composer js-open-inlined-form" title="Lisää kortti listan loppuun" href="#" aria-label="Lisää kortti listan loppuun"><i class="fa fa-plus"></i></a></div>



<script>
function allowDrop(ev) {ev.preventDefault();}
function drag(ev) {ev.dataTransfer.setData("text/html", ev.target.id);}
function drop(ev) {
ev.preventDefault();
var data = ev.dataTransfer.getData("text/html");
ev.target.appendChild(document.getElementById(data));
}
</script>
<p>Drag the javatpoint image into the rectangle:</p>
<div id="div1" style="width:350px;height:100px;padding:10px;border:1px solid #aaaaaa;"
ondrop="drop(event)" ondragover="allowDrop(event)" droppable="true"></div>
<br>
<img id="drag1" src="Square44x44Logo.scale-100.png" alt="javatpoint image"
draggable="true" ondragstart="drag(event)"/>

<?php

/*
=========== ALL BOARDS END ===========
*/

/*
=========== BOARD START ===========
*/

} else if ($page == "board") {

?>

<table style="text-align: left; width: 100%;" border="1" cellpadding="2" cellspacing="8">

  <tbody>
    <tr>
      <td colspan="5" rowspan="1" valign="top" bgcolor="blue"><font color="white">Logo <a href="board.html">All
Boards</a> Star a board to add a shortcut
in this bar.&nbsp; +</font>
      </td>
      <td bgcolor="white"><br>
      </td>
    </tr>
    <tr>
      <td colspan="5" rowspan="1" valign="top" bgcolor="white"><font color="black">Wekan -
Open Source kanban board with MIT license * Public Muted Filter
Rules
Search Swimlanes Multi-Selection<br></font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Sidebar</font></td>
    </tr>
    <tr>
      <td colspan="5" rowspan="1" bgcolor="darkgreen" align="center"><font color="white">Swimlane 1 with green background color</font>
      </td>
      <td colspan="1" rowspan="15" bgcolor="white" align="left" valign="top">
<form action="board.html">
<input type="submit" value="Board Settings">
</form>
<br>

<b>Organizations</b>
<form action="board.html">
<input type="submit" value="+Add">
</form>
</font>
<br>

<b>Members</b><br>
xet7
<form action="board.html">
<input type="submit" value="+Add">
</form>
<br>

<b>Labels</b>
<form action="board.html">
<input type="submit" value="+Add">
</form>
<br>
      <br>
<form action="board.html">
<input type="submit" value="Hide minicard label text">
</form>
<br>
      <br>
      </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="blue"><font color="white">List
with custom color as underline (1/2)</font>
      </td>
      <td align="left" valign="top" bgcolor="blue"><font color="white">Todo</font>
      </td>
      <td align="left" valign="top" bgcolor="blue"><font color="white">Doing</font>
      </td>
      <td align="left" valign="top" bgcolor="blue"><font color="white">Done</font>
      </td>
      <td align="left" valign="top" bgcolor="blue"><font color="white">
<form action="board.html">
<input type="submit" value="+Add List">
</form>
</font>
      </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="white"><font color="black"># Card
1 <img src="openmoji/2764.png" alt="heart" width="30" height="30"> <img src="openmoji/1F44D.png" alt="thumbsup" width="30" height="30"> <img src="openmoji/1F4AF.png" alt="100 points" width="30" height="30"></font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Something</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Yes Sir
I can boogie</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">The big
task</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black"></font>
      </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 2</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Maybe</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black"></font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black"></font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black"></font>
      </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 3</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Probably</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black"></font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black"></font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black"></font>
      </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 4</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black"></font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black"></font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black"></font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black"></font>
      </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 5</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 6</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 7</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 8</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 9</font>
      </td>
    </tr>
    <tr align="center">
      <td colspan="5" rowspan="1" align="cente" valign="top" bgcolor="orange"><font color="black">Swimlane
2 with custom orange color</font><br>
      </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="blue"><font color="white">List some</font>
      </td>
      <td align="left" valign="top" bgcolor="blue"><font color="white">Todo</font>
      </td>
      <td align="left" valign="top" bgcolor="blue"><font color="white">Doing</font>
      </td>
      <td align="left" valign="top" bgcolor="blue"><font color="white">Done</font>
      </td>
      <td align="left" valign="top" bgcolor="blue"><font color="white">
<form action="board.html">
<input type="submit" value="+Add List">
</form>
</font>
</font>
      </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 10</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 11</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 12</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 13</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 14</font>
      </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 15</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 16</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 17</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 18</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 19</font>
      </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 20</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 21</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 22</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 23</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 24</font>
      </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 25</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 26</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 27</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 28</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 29</font>
      </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 30</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 31</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 32</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 33</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 34</font>
      </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 35</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 36</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 37</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 38</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 39</font>
      </td>
    </tr>
  </tbody>
</table>

<br>

<br>

<?php


/*
=========== BOARD END ===========
*/

} else if ($page == "boardsettings") {
} else if ($page == "swimlane") {
} else if ($page == "swimlanesettings") {
} else if ($page == "card") {
} else if ($page == "cardsettings") {
} else if ($page == "searchallboards") {
} else if ($page == "mycards") {
} else if ($page == "calendar") {
} else if ($page == "gantt") {  
} else if ($page == "adminpanel") {

/*
=========== ALL PAGES START ===========
*/

} else if ($page == "allpages") {

?>
  <center>
  <h1></h1>
<?php

    // Login logo image URL
    if (!empty($loginLogoImageUrl)) {
      echo '<img src="' . urlencode($loginLogoImageUrl) . '" alt="' .
      htmlentities($productName) .
      '" width="' . strip_tags($loginLogoImageWidth) .
      '" height="' . strip_tags($loginLogoImageHeight) . '">';
    }

?>

<br>
<br>

<section class="auth-layout">
  <section class="auth-dialog">
    <div class="at-form">
        <h3>
          <a class="button-link" href="/sign-in"><?php translate("log-in"); ?></a><br /><br />
          <a class="button-link" href="/sign-up"><?php translate("register"); ?></a><br /><br />
          <a class="button-link" href="/allboards"><?php translate("all-boards"); ?></a><br /><br />
          <a class="button-link" href="/myboards"><?php translate("my-boards"); ?></a><br /><br />
          <a class="button-link" href="/board"><?php translate("board"); ?></a><br /><br />
          <a class="button-link" href="/newticket"><?php translate("tickets"); ?></a><br /><br />
          <a class="button-link" href="/mongo">Mongo</a><br /><br />
          <a class="button-link" href="/dragupload">dragupload if JS, onlyupload if no JS</a><br /><br />
        </h3>
    </div>
  </section>
</section>

  </center>

<?php

/*
=========== ALL PAGES END ===========
*/

/*
=========== NEW TICKET START ===========
*/

} else if ($page == "newticket") {

?>

<h1><?php translate("help-request"); ?></h1>

<form role="form" id="at-pwd-form" novalidate="" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

<table border="0" padding="20" spacing="20">
  <tr>
    <td valign="top"><?php translate("type"); ?>
    </td>
    <td valign="top">
      <form>
      <select name = "type">
      <option value = "type1" selected>Type 1</option>
      <option value = "type2">Type 2</option>
      </select>
    </td>
  </tr>
  <tr>
    <td valign="top">
       <label for="subject"><?php translate("subject"); ?></label>
    </td>
    <td valign="top">
       <input type="text" id="subject" name="subject" placeholder="" autocapitalize="none" autocorrect="off">
    </td>
  </tr>
  <tr>
    <td valign="top">
       <label for="details"><?php translate("details"); ?></label>
    </td>
    <td valign="top">
       <textarea id="details" name="details" rows="10" cols="50" placeholder="" autocapitalize="none" autocorrect="off">
       </textarea>
    </td>
  </tr>
  <tr>
    <td valign="top">
       <label for="carbon-copy"><?php translate("carbon-copy"); ?></label>
    </td>
    <td valign="top">
       <input type="text" id="carbon-copy" name="carbon-copy" placeholder="" autocapitalize="none" autocorrect="off">
    </td>
  </tr>
  <tr>
    <td valign="top">
      <br />
      <br />
      <input type="submit" name="login" class="at-btn submit" id="at-btn" value="<?php translate("save"); ?>">
      </form>
    </td>
    <td valign="top">
    </td>
  </tr>
</table>

<?php

/*
=========== NEW TICKET END ===========
*/

/*
=========== MONGO START ===========
*/

} else if ($page == "mongo") {

?>

<pre>

<?php

require_once '../vendor/autoload.php';
require_once '../vendor/mongodb/mongodb/src/functions.php';

$collection = (new MongoDB\Client("mongodb://127.0.0.1:27017/wekan"))->wekan->users;

//$cursor = $collection->find([],['limit'=>5]);

//var_dump($cursor);

$result = $collection->findOne();

print_r($result);

//foreach ($result as $entry) {
//    echo $entry['_id'], ': ', $entry['name'], "\n";
//}

?>

</pre>

<?php

/*
=========== MONGO END ===========
*/

/*
=========== DRAGUPLOAD START ===========
*/

} else if ($page == "dragupload") {

?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
<div id="drop_file_zone" ondrop="upload_file(event)" ondragover="return false">
    <div id="drag_upload_file">
        <p>Drop file here to upload</p>
        <p>or</p>
        <p><input type="button" value="Select File" onclick="file_explorer();" /></p>
        <input type="file" id="selectfile" />
    </div>
</div>
<div class="img-content"></div>

</form>

<script>
var fileobj;
function upload_file(e) {
    e.preventDefault();
    fileobj = e.dataTransfer.files[0];
    ajax_file_upload(fileobj);
}

<?php
/* One file drag upload, works. */
?>

function file_explorer() {
    document.getElementById('selectfile').click();
    document.getElementById('selectfile').onchange = function() {
        fileobj = document.getElementById('selectfile').files[0];
        ajax_file_upload(fileobj);
    };
}

<?php
/* Multi file drag upload, does not work:
function file_explorer() {
    document.getElementById('selectfile').click();
    document.getElementById('selectfile').onchange = function() {
       const files = document.querySelector(‘[type=file]’).files;
       for (i = 0; i < files.length; i++) {
          fileobj = document.getElementById('selectfile').files[i];
          ajax_file_upload(fileobj);
       }
   };
}
*/

/* Multi file drag upload, this also does not work:
function file_explorer(e) {
   e.preventDefault();
   for (i = 0; i < e.dataTransfer.files.length; i++) {
      fileobj = e.dataTransfer.files[i];
      ajax_file_upload(fileobj);
   }
}
*/
?>

function ajax_file_upload(file_obj) {
    if(file_obj != undefined) {
        var form_data = new FormData();                  
        form_data.append('file', file_obj);
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>", true);
        xhttp.onload = function(event) {
            oOutput = document.querySelector('.img-content');
            if (xhttp.status == 200) {
                // oOutput.innerHTML = "<img src='"+ this.responseText +"' alt='The Image' />";
                oOutput.innerHTML = "Upload done.";
            } else {
                oOutput.innerHTML = "Error " + xhttp.status + " occurred when trying to upload your file.";
            }
        }
 
        xhttp.send(form_data);
    }
}
</script>

<hr>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

<?php

/*
=========== DRAGUPLOAD END ===========
*/

}

?>

</body>

</html>
