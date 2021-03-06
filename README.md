# JS and CSS Minifier

## Description
With this plugin, you can minify you js's and css's via PHP providing input and output path's.
Also you can minify and merge all your code in one file.
This scripts are using Andy Chilton API's.

### Dashboard example
You can find dashboard example [https://github.com/DanRotaru/Minifier-JS-CSS/tree/master/minify](https://github.com/DanRotaru/Minifier-JS-CSS/tree/master/minify)

## Setup
```php
require "minifier.class.php";
```
## Minify one file

```php
// Minify JS code
Minifier::minifyFile("/public/js/app.js", "/public/js/app.min.js");

// Minify CSS code
Minifier::minifyFile("/public/css/app.css", "/public/css/app.min.css");

```

## Minify all files by extension
You also can minify all files by extension, you can minify all and merge them in one.
Ex: You have 4 files: header.js, main.js, function.js, footer.js
You can minify all and merge them in one: **all.js**
In output will be created minified file all.js that will contain all these files.
```php
// Minify all files with .js extension from directory /public/js/components/ into file /public/js/all.js
Minifier::minifyDir("/public/js/components", "/public/js/all.js");

// Minify all files with .css extension from directory /public/css/components/ into file /public/css/all.css
Minifier::minifyDir("/public/css/components/", "/public/css/all.css");

```
![minifyAllFiles](https://i.ibb.co/ZhqTV34/screen.png)

## Also you can only generate minified output
```php
// Get file content
$content = file_get_contents("/public/js/app.js");

// Get minified content get($content, $language = "js" || "css")
$minfied = Minifier::get($content, "js");

echo $minfied;

```

## Requirements
* PHP Web Server

## License
Released under the [MIT license](http://www.opensource.org/licenses/MIT).

Created by [DanRotaru](https://t.me/danrotaru).
