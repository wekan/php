# 2021-05-24 v0.01 Wekan-php release

Missing:
- webp screenshots
- Not implemented yet: actual login with checking username and password
- Other pages

This release adds the following new features:

- `index.php` Login page
  - Implemented:
    - Browser support with HTML4 and with minimal formatting: Lynx, Netsurf, WinXP IE6, Amiga m68k AWeb and IBrowse
    - Translations: Detect browser language, load that language JSON translation, translate login page
    - Hide Logo
    - Custom:
      - Product Name
      - Meta tags
        - Manifest
        - Icons
        - Icon Colors
        - Theme Color
      - Font
      - Backgroud Color
      - Login Logo
        - Image URL
        - Image Width
        - Image Height
        - Link URL
      - Text Below Login Logo
      - Top Left Corner Logo
        - Image URL
        - Image Width
        - Image Height
        - Link URL
      - Custom URL Schemes
    - `debug = true`
      - PHP INI error reporting all
      - Showing all PHP server and browser variables
  - `install-php-deps.sh` install script for PHP 7 (or 8) dependencies on Ubuntu based distros
  - `mongo.php` making database query to Snap Meteor Wekan MongoDB database
  - `register.html` only HTML/CSS for register page that has not been yet added to `index.php`
  - Optional. Note: `index.php` does not have this by default, it has only minimal formatting.
    - `style.css`: All of Meteor Wekan CSS, without login.css
    - `login.css`: minimal Meteor Wekan style CSS.
