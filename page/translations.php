<?php

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
           case "ar-DZ":
           case "ar-EG":
           case "az-AZ":
           case "az-LA":
           case "cs-CZ":
           case "cy-GB":
           case "de-AT":
           case "de-CH":
           case "el-BR":
           case "en-DE":
           case "en-GB":
           case "en-IT":
           case "en-MY":
           case "en-YS":
           case "ast-ES":
           case "es-AR":
           case "es-CL":
           case "es-LA":
           case "es-MX":
           case "es-PE":
           case "es-PY":
           case "et-EE":
           case "fa-IR":
           case "fr-BE":
           case "fr-CA":
           case "fr-CH":
           case "fy-NL":
           case "gl-ES":
           case "gu-IN":
           case "he-IL":
           case "hi-IN":
           case "ja-Hira":
           case "ja-JP":
           case "ko-KR":
           case "ms-MY":
           case "nl-NL":
           case "pl-PL":
           case "pt-BR":
           case "ru-UA":
           case "ua-UA":
           case "uz-AR":
           case "uz-LA":
           case "uz-UZ":
           case "ve-CC":
           case "ve-PP":
           case "vi-VN":
           case "vl-SS":
           case "wa-RR":
           case "zh-CN":
           case "zh-HK":
           case "zh-TW":
           case "zu-ZA":
             break;
           default:
             // Otherwise, it's same as short langage name.
             $lang = $langshort;
         }
       } else if (strlen($lang) == 3) {
         switch ($lang) {
           case "ary":
           case "zgh":
             break;
         }
       } else if (strlen($lang) == 2) {
         $lang = strtolower($lang);         
         switch ($lang) {
           case "ar":
           case "az":
           case "bg":
           case "br":
           case "ca":
           case "cs":
           case "cy":
           case "da":
           case "de":
           case "el":
           case "en":
           case "eo":
           case "es":
           case "eu":
           case "fa":
           case "fi":
           case "fr":
           case "fy":
           case "gl":
           case "he":
           case "hi":
           case "hr":
           case "hu":
           case "hy":
           case "id":
           case "ig":
           case "it":
           case "ja":
           case "ka":
           case "km":
           case "ko":
           case "lt":
           case "lv":
           case "mk":
           case "mn":
           case "ms":
           case "nb":
           case "nl":
           case "oc":
           case "pa":
           case "pl":
           case "pt":
           case "ro":
           case "ru":
           case "sr":
           case "sk":
           case "sl":
           case "st":
           case "sv":
           case "sw":
           case "ta":
           case "th":
           case "tr":
           case "ua":
           case "uk":
           case "ve":
           case "vi":
           case "vo":
           case "wa":
           case "wo":
           case "xh":
           case "yi":
           case "yo":
           case "zu":
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

/*
=========== RTL START ===========
*/

$rtllist = array("ar-DZ", "ar-EG", "ar", "ary", "fa", "he-IL", "he");

if (in_array($lang, $rtllist)) {
  $rtl = true;
} else {
  $rtl = false;
}

/*
=========== RTL END ===========
*/

// Language list and RTL info, not used yet. Instead, above RTL code in use.
//$langlistjson = file_get_contents('languages.json');
//$langlisttranslate = json_decode($langlistjson, true);

// User language
$langjson = file_get_contents('i18n/' . $lang . '.i18n.json');
$langtranslate = json_decode($langjson, true);

// English language
$enlangjson = file_get_contents('i18n/en.i18n.json');
$enlangtranslate = json_decode($enlangjson, true);


function translate($text) {
  global $langjson, $langtranslate, $enlangjson, $enlangtranslate;
  // If translation exists, return it
  if (isset($langtranslate[$text])) {
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

?>
