# JS and CSS Minifier

## Description
With this plugin, you can minify you js's and css's via PHP providing input and output path's.
Also you can minify and unite all your code in one file.
This scripts are using Andy Chilton API's.

## Setup
```php
require "minifier.class.php";
```
## Minify one file

```php
// Minify JS code
Minifier::minifyFile("public/js/app.js", "public/js/app.min.js");

// Minify CSS code
Minifier::minifyFile("public/css/app.css", "public/css/app.min.css");

```

## Minify all files by extension
You also can minify all files by extension, you can minify all and unite them in one.
Ex: You have 4 files: header.js, main.js, function.js, footer.js
You can minify all and unite them in one: **all.js**
In output will be created minified file all.js that will contain all these files.
```php
// Minify all files with .js extension from directory /public/js/
Minifier::minifyDir("public/js/all.js", "/public/js/");

// Minify all files with .css extension from directory /public/css/
Minifier::minifyDir("public/css/all.css", "/public/css/");

```

## Also you can only generate minified output
```php
// Get file content
$content = file_get_contents("public/js/app.js");

// Get minified content get($content, $language = "js" || "css")
$minfied = Minifier::get($content, "js");

echo $minfied;

```

## Requirements
* PHP Web Server

## License
Released under the [MIT license](http://www.opensource.org/licenses/MIT).

Created by [DanRotaru](https://t.me/danrotaru).
