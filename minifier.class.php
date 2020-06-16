<?php
/*
   +-----------------------------------------------------------------------+
   | JavaScript & CSS Minifier PHP Class                                   |
   +-----------------------------------------------------------------------+
   | Copyright (c) 2020                                                    |
   | Authors: DanRotaru < https://t.me/danrotaru >                         |
   | Github: https://github.com/DanRotaru/Minifier-JS-CSS/                 |
   | Version: 1.0.0                                                        |
   +-----------------------------------------------------------------------+
*/

class Minifier {
    public static function get($content, $lang = "js"){
        /* 
            DEFAULT STATE: Minify JavaScript content
            FORMAT LANGS: js || css
        */

        if($lang == "js") $url = "https://javascript-minifier.com/raw";
        else $url = "https://cssminifier.com/raw";

        $postdata = array('http' => array(
            'method'  => 'POST',
            'header'  => 'Content-type: application/x-www-form-urlencoded',
            'content' => http_build_query( array('input' => $content) ) ) );
        return file_get_contents($url, false, stream_context_create($postdata));
    }

    public static function minifyFile($filename, $saveToFile){
        /*
            DEFAULT STATE: Minify JavaScript file
            DESCRIPTION: Function to minify file
        */

        $filename = $_SERVER['DOCUMENT_ROOT'].$filename;
        $saveToFile = $_SERVER['DOCUMENT_ROOT'].$saveToFile;
        
        if(!file_exists($filename)) die("File ".$filename." doesn't exist!");
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $fp = fopen($saveToFile, 'w');
        fwrite($fp, self::get(file_get_contents($filename), $ext));
        fclose($fp);
        return 1;
    }

    public static function minifyDir($dirName, $saveToFile){
        /* 
            DEFAULT STATE: Get all files by extension and minify it
            $dirName => /dirExample/
            $ext => "js" || "css"
        */

        $saveToFile = $_SERVER['DOCUMENT_ROOT'].$saveToFile;
        
        
        $ext = pathinfo($saveToFile, PATHINFO_EXTENSION);


        //Message that will be shown to top file
        $msg = ' APP CREATED BY DanRotaru ';
        $msg = '/* '.$msg.' */';
        if(!empty($msg)) $res1 = $msg."\n\n";

        
        $files = scandir($_SERVER['DOCUMENT_ROOT'].$dirName);
        // return $files;

        $res = '';
        foreach($files as $filename){
            if(strpos($filename,'.'.$ext) && $filename !== basename($saveToFile)){
                $res .= file_get_contents($_SERVER['DOCUMENT_ROOT'].$dirName.$filename);
            }
        }

        $res1 .= self::get($res, $ext);
        $fp = fopen($saveToFile, 'w');fwrite($fp, $res1);fclose($fp);

        return true;
    }
}
