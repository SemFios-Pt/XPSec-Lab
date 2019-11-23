<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Resources/hmbct.png" />
    <title>XPSec Lab - Sql Injection</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../assets/css/prism.css">
    <link rel="stylesheet" href="../assets/css/hack.css?t=1490883343124">
    <link rel="stylesheet" href="../assets/css/dark.css?t=1490883343124">
    <link rel="stylesheet" href="../assets/css/site.css?t=1490883343124">
    <link rel="stylesheet" href="../assets/css/site-dark.css?t=1490883343124">
  </head>
     <body class="hack dark">
    <div class="main container">
      <p><a href="sqlmainpage.html">&laquo; Voltar</a></p>
<pre> __   _______   _____             _           _     
 \ \ / /  __ \ / ____|           | |         | |    
  \ V /| |__) | (___   ___  ___  | |     __ _| |__  
   &gt; &lt; |  ___/ \___ \ / _ \/ __| | |    / _` | '_ \ 
  / . \| |     ____) |  __/ (__  | |___| (_| | |_) |
 /_/ \_\_|    |_____/ \___|\___| |______\__,_|_.__/ 
                                   xpsecsecurity.com                
                                                    </pre>
      <h2>XPSec Lab</h2>
      <p>Sql Injection - Level 4</p>
<hr>
    </div>
<center>
	<form class="form" action="<?php $_SERVER['PHP_SELF']; ?>" method=get" >
		<p>Insira o número do livro para a consuta.</p>
    <label for="username">Número:</label>
    <input id="username" type="text" name="number" placeholder="" class="form-control">
<br><br>
		<input type="submit" name="submit" class="btn btn-primary btn-block" value="Submit">
<br>
	</form>
	</div>
	<!--Admin password is in the secret table. I hope, anyone doesn't see it.-->
<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "1ccb8097d0e9ce9f154608be60224c7c";
	// Create connection
	$conn = new mysqli($servername, $username, $password,$db);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	//echo "Connected successfully";
	$source = "";
	if(isset($_GET["submit"])){
		$number = $_GET['number'];
		$query = "SELECT bookname,authorname FROM books WHERE number = '$number'";
		$result = mysqli_query($conn,$query);
		$row = @mysqli_num_rows($result);
		if($row > 0){
			echo "<pre>O livro existe!</pre>";
		}else{
			echo "Não encontrado!";
		}
	}

?> 
</body>
</html>
