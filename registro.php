<html>
<head>
<title>Agencia de Viajes::PERSEN</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<link rel="stylesheet" type="text/css" href="css/registro.css">
	<script src="http://code.jquery.com/jquery-latest.js"></script>
</head>

<body>
    <header>

		<div class="slider">
			<ul>
				<li>
  					<img src="slider/slider1.jpg" alt="">
 				</li>
				<li>
  					<img src="slider/slider2.jpg" alt="">
				</li>
				<li>
  					<img src="slider/slider3.jpg" alt="">
				</li>

			</ul>
		</div>

	</header>
<?php

		require 'conectar_bd.php';
	$host= 'localhost';
	$basedatos= 'usuarios';
	$usuario= 'root';
	$contrasena= '';
        try
        {
            $conectar = new PDO('mysql:host='.$host.';dbname='.$basedatos, $usuario, $contrasena);

        	$usuario=$_POST["username"];
			$password=password_hash($_POST['password'],PASSWORD_BCRYPT);


			$trn_date = date("Y-m-d");

			$stmt=$conectar->prepare("INSERT INTO usuarios (usuario,password,registro) VALUES ('$usuario','$password','$trn_date')");


            if($stmt->execute()){
               echo 'creacion exitosa';
            }else
            {
                echo 'error al crear ';
            }


        }catch(PDOException $e)
        {
         echo 'Fallo al guardar '.$e->getMessage()."<br/>";
         die();
     }
?>

	<section>
		<div class="registro-box">
				<img class="avatar" src="pics/Logo.png" alt="logo de fastz">
				<h1>Bienvenido</h1>
					<form method="post">
						<label for="username">Username</label>
						<input type="text" placeholder="Enter username" name="username">

						<label for="password">Password</label>
						<input type="password" placeholder="Enter Password" name="password">

						<input type="submit" name="registro" value="Registrese">

								<a>Registrado</a>
					</form>
			</div>
	</section>



<SCRIPT LANGUAGE="javascript">
//location.href = "index.html";
</SCRIPT>

</body>
</html>
