<?php

/*
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

$langjson = file_get_contents('i18n/' . $lang . '.i18n.json');

$translate = json_decode($langjson, true);

/*
  Translations end.
*/

?>

