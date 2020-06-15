# Dashbard Example

Here you can see dashboard example
![dashboard](https://i.ibb.co/p3WGtHf/image.png)

## Setup
Setup is very simple:
1) Open "index.php" and edit $mainFolder variable to your folder path
2) Add, remove files in "files.php": 
["filename or folder", "output filename", "shortcut (if you want to add it to dashboard)"]
```php
$myFiles = [
    ["/minify/js/index.js", "/minify/js/index.min.js", "js"],
    ["/minify/css/index.css", "/minify/css/index.min.css", "css"],

    ["/minify/js/user_scripts/", "/minify/js/user_scripts.js", "user_js_scripts"],
    ["/minify/css/user_scripts/", "/minify/css/user_scripts.css", "user_css_scripts"]
];
``
