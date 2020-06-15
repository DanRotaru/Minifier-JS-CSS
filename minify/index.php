<?php
$mainFolder = 'minify';

include $_SERVER['DOCUMENT_ROOT'].'/'.$mainFolder.'/files.php';
if(isset($_GET['i'])){
    if(empty($_GET['i'])) die("Please, choose a file!");

    require $_SERVER['DOCUMENT_ROOT'].'/'.$mainFolder.'/minifier.class.php';
    require $_SERVER['DOCUMENT_ROOT'].'/'.$mainFolder.'/files.php';

    //Shortcuts
    for($i = 0; $i <= count($myFiles); $i++){
        if(!empty($myFiles[$i][0]) && !empty($myFiles[$i][2])){
            if($_GET['i'] == $myFiles[$i][2]){

                $_GET['i'] = $myFiles[$i][0];
                $_GET['o'] = $myFiles[$i][2];
                
                if(empty(pathinfo($_GET['i'], PATHINFO_EXTENSION))){
                    if(Minifier::minifyDir($_GET['i'], $_GET['o'])){
                        echo('Folder '.$_GET['i'].' was successfully minified to `'.$myFiles[$i][1].'`');
                        exit;
                    }
                }
                else{
                    if(Minifier::minifyFile($_GET['i'], $_GET['o'])){
                        echo('File `'.$_GET['i'].'` was successfully minified to `'.$myFiles[$i][1].'`');
                        exit;
                    }
                }
            }
        }
    }
    if(empty(pathinfo($_GET['i'], PATHINFO_EXTENSION))){
        if(Minifier::minifyDir($_GET['i'], $_GET['o'])){
			echo('Folder '.$_GET['i'].' was successfully minified to `'.$_GET['o'].'`');
			exit;
		}
    }
    else{
        if(Minifier::minifyFile($_GET['i'], $_GET['o'])){
			echo('File `'.$_GET['i'].'` was successfully minified to `'.$_GET['o'].'`');
			exit;
		}
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minifier</title>
    <link rel="shortcut icon" href="https://cdn4.iconfinder.com/data/icons/gradient-ui-1/512/success-24.png" />
    <style>@import url(https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap);body{margin:20px;font-family:'Calibri Light','Courier New',Courier,monospace;font-family:'Roboto Slab',sans-serif;font-size:15px;background:#16171b;color:#fff}a{color:#00bcd4;cursor:pointer;text-decoration:underline}.card{background:#202125;box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);box-shadow:0 3px 6px rgba(0,0,0,.013),0 3px 6px rgba(0,0,0,.13);padding:10px;border-radius:6px;margin:30px auto}.card .title{opacity:.7;margin:5px 0 20px 10px}#t b{font-weight:400;color:#ff0}.item{display:flex;justify-content:space-between;padding:5px}.item div{color:#01b075}h{width:100%;height:2px;background:#202125;margin:20px 0;display:block}.err{color:#f44336}.links{text-align:center;word-break: break-all}.links a{color:#fff;opacity:.5;transition:.2s ease;margin-left:10px}.links a:hover{opacity:1}.git{background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='%23fff' d='M12,2A10,10 0 0,0 2,12C2,16.42 4.87,20.17 8.84,21.5C9.34,21.58 9.5,21.27 9.5,21C9.5,20.77 9.5,20.14 9.5,19.31C6.73,19.91 6.14,17.97 6.14,17.97C5.68,16.81 5.03,16.5 5.03,16.5C4.12,15.88 5.1,15.9 5.1,15.9C6.1,15.97 6.63,16.93 6.63,16.93C7.5,18.45 8.97,18 9.54,17.76C9.63,17.11 9.89,16.67 10.17,16.42C7.95,16.17 5.62,15.31 5.62,11.5C5.62,10.39 6,9.5 6.65,8.79C6.55,8.54 6.2,7.5 6.75,6.15C6.75,6.15 7.59,5.88 9.5,7.17C10.29,6.95 11.15,6.84 12,6.84C12.85,6.84 13.71,6.95 14.5,7.17C16.41,5.88 17.25,6.15 17.25,6.15C17.8,7.5 17.45,8.54 17.35,8.79C18,9.5 18.38,10.39 18.38,11.5C18.38,15.32 16.04,16.16 13.81,16.41C14.17,16.72 14.5,17.33 14.5,18.26C14.5,19.6 14.5,20.68 14.5,21C14.5,21.27 14.66,21.59 15.17,21.5C19.14,20.16 22,16.42 22,12A10,10 0 0,0 12,2Z'%3E%3C/path%3E%3C/svg%3E");background-size:25px;width:25px;height:25px;position:absolute;right:10px;top:10px;text-decoration:none}@media (min-width:750px){.card{width:60%}}</style>
</head>
<body>
    <h1>File minification!</h1>
    <div id="t"></div>
    <div id="r"></div>
    <h></h>
    <div class="links">
        <?php
            for($i = 0; $i <= count($myFiles); $i++){
                if(!empty($myFiles[$i][0]) && !empty($myFiles[$i][2])) echo '<a onclick="minify(\''.$myFiles[$i][2].'\')">'.$myFiles[$i][2].'</a>';
            }
        ?>
    </div>
    <div class="card">
        <div class="title">Minify Content</div>
        <div class="files">
            <div class="item head">
                File name
                <div class="right">Output</div>
            </div>
            <?php
            for($i = 0; $i <= count($myFiles); $i++){
                if(!empty($myFiles[$i][0])){
                    echo '
                    <div class="item">
                        <a title="Minify" onclick="minify(\''.$myFiles[$i][0].'\',\''.$myFiles[$i][1].'\')">'.$myFiles[$i][0].'</a>
                        <div>'.$myFiles[$i][1].'</div>
                    </div>
                    ';
                }
            }
            ?>
        </div>
    </div>
    <div class="card">
        <div class="title">Last file updates</div>
        <div class="files">
            <div class="item head">
                File name
                <div class="right">Last updated</div>
            </div>
            <?php
            for($i = 0; $i <= count($myFiles); $i++){
                if(!empty($myFiles[$i][1])){
                    echo '
                    <div class="item">
                        <a title="Open" href="'.$myFiles[$i][1].'" target="_blank">'.$myFiles[$i][1].'</a>
                        <div>'.date("d.m.y H:i:s", filectime($_SERVER['DOCUMENT_ROOT'].$myFiles[$i][1])).'</div>
                    </div>
                    ';
                }
            }
            ?>
        </div>
    </div>
    <a href="https://github.com/DanRotaru/Minifier-JS-CSS" target="_blank" class="git"></a>
    <script>
        var startTime, check = 0, t = 0, s = 0, timer;
        function minify(from, to){
            let url = '?i='+from+'&o='+to;
            //response time
            startTime = new Date().getTime();
            timer = setInterval(function(){
                check = (new Date().getTime() - startTime - s) / 1000;
                document.querySelector("#t").innerHTML = `Execution time: <b>${check.toFixed(3)}s</b>.`;
            }, 1);

            document.querySelector("#r").innerHTML = '';
            let ajax = new XMLHttpRequest();
            ajax.open("GET", url, true);
            ajax.onreadystatechange = function (oEvent) {  
                if (ajax.readyState === 4) {  
                    if (ajax.status === 200) {
                        clearInterval(timer);
                        let res = ajax.responseText;
                        res = res.replace(/\`(.*?)\`/gmi, '<a href="$1" target="_blank">$1</a>');
                        document.querySelector("#r").innerHTML = res;  
                    } else {
                        clearInterval(timer);
                        document.querySelector("#r").innerHTML = `<span class="err">Bad request!</span>`;
                    }
                }
            };
            ajax.send(null); 
        }
    </script>
</body>
</html>