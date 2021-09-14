# Usage

The following code will prepare a CAPTCHA image and keep the code in a session variable for later use:

```
<?php
session_start();
include("simple-php-captcha.php");
$_SESSION['captcha'] = simple_php_captcha();
?>
```
After the call to simple_php_captcha() above, $_SESSION['captcha'] will be something like this:

```
Array
(
    [code] => eJNcH
    [image_src] => /testes/captcha/captcha.php?_CAPTCHA&t=0.82636800+1631631484
)
```
To display the CAPTCHA image, create an HTML <img> using $_SESSION['captcha']['image_src'] as the src attribute.

```
<?php
  echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code">';
?>
```
![captcha](https://user-images.githubusercontent.com/397983/133282815-5adabced-1ec6-47d3-8160-a8f578d03cf6.png)

To verify the CAPTCHA value on the next page load (or in an AJAX request), test against $_SESSION['captcha']['code']. You can use strtolower() or strtoupper() to perform a case-insensitive match.

# Configuration

Configuration is easy and all values are optional. To specify one or more options, do this:

```
<?php

$_SESSION['captcha'] = simple_php_captcha( array(
    'min_length' => 5,
    'max_length' => 5,
    'backgrounds' => array(image.png', ...),
    'fonts' => array('font.ttf', ...),
    'characters' => 'ABCDEFGHJKLMNPRSTUVWXYZabcdefghjkmnprstuvwxyz23456789',
    'min_font_size' => 28,
    'max_font_size' => 28,
    'color' => '#666',
    'angle_min' => 0,
    'angle_max' => 10,
    'shadow' => true,
    'shadow_color' => '#fff',
    'shadow_offset_x' => -1,
    'shadow_offset_y' => 1
));

?>
```

# Notes
* Important! Make sure you call session_start() before calling the simple_php_captcha() function
* Requires PHP GD2 library
* Backgound images must be in PNG format
* Fonts must be either TTF or OTF
* Backgrounds and fonts must be specified using their full paths (tip: use $_SERVER['DOCUMENT_ROOT'] . '/' . [path-to-file])
* Angles should not exceed approximately 15 degrees, as the text will sometimes appear outside of the viewable area
* Creates a function called simple_php_captcha() in the global namespace
* Uses the $_SESSION['simple-php-captcha'] session variable

