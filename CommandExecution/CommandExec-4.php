<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Resources/hmbct.png" />
    <title>XPSec Lab - Command Execution</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../assets/css/prism.css">
    <link rel="stylesheet" href="../assets/css/hack.css?t=1490883343124">
    <link rel="stylesheet" href="../assets/css/dark.css?t=1490883343124">
    <link rel="stylesheet" href="../assets/css/site.css?t=1490883343124">
    <link rel="stylesheet" href="../assets/css/site-dark.css?t=1490883343124">
  </head>
     <body class="hack dark">
    <div class="main container">
      <p><a href="commandexec.html">&laquo; Voltar</a></p>
<pre> __   _______   _____             _           _     
 \ \ / /  __ \ / ____|           | |         | |    
  \ V /| |__) | (___   ___  ___  | |     __ _| |__  
   &gt; &lt; |  ___/ \___ \ / _ \/ __| | |    / _` | '_ \ 
  / . \| |     ____) |  __/ (__  | |___| (_| | |_) |
 /_/ \_\_|    |_____/ \___|\___| |______\__,_|_.__/ 
                                   xpsecsecurity.com                
                                                    </pre>
      <h2>XPSec Lab</h2>
      <p>Command Execution - Level 4</p>
<hr>
    </div>
<center>
    </div>
    <form class="form" action="CommandExec-4.php" method="$_GET">
      <p>Qual a chave secreta?</p>
<label for="username">Chave:</label>
<input id="username" name="typeBox" class="form-control" type="text"><br><br>
<button class="btn btn-primary btn-block" type="submit" >Submit</button><br>
    </form>
  </div>
    <?php
    if(!file_exists(".hidden")){
      mkdir(".hidden");
      exec("echo \"flag:secret\" > .hidden/log4.txt");
      if(strtoupper(substr(PHP_OS, 0, 3)) === 'WIN'){
        exec("attrib +h .hidden");
      }
    }
    if(isset($_GET["typeBox"])){
      $target =$_GET["typeBox"];
      $substitutions = array(
        '&&'=>'',
        '& ' => '',
        '&& ' => '',
        ';'  => '',
        '|' => '',
        '-'  => '',
        '$'  => '',
        '('  => '',
        ')'  => '',
        '`'  => '',
        '||' => ''
      );
      $target = str_replace(array_keys($substitutions),$substitutions,$target);
      echo shell_exec($target);
      if($_GET["typeBox"] == "secret")
        echo "Você realmente achou a chave secreta!";
    }

    ?>
  </div>
  </body>
</html>
