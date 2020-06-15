<?php
/*
    [
        "filename || folder" => from initial path [ex: "/public/js/index.js" || "/public/js/user_scripts/"],
        "Minify File Name" => output file (also using initial file path) [ex: "/public/js/index.min.js" || "/public/js/user_scripts.js"]
        "shortcut" => display or not to index page (if is empty or not), 
    ]
*/
$myFiles = [
    ["/minify/js/index.js", "/minify/js/index.min.js", "js"],
    ["/minify/css/index.css", "/minify/css/index.min.css", "css"],

    ["/minify/js/user_scripts/", "/minify/js/user_scripts.js", "user_js_scripts"],
    ["/minify/css/user_scripts/", "/minify/css/user_scripts.css", "user_css_scripts"]
];

