<?php
/*session_start();
include("conectar_bd.php");
 try
 {
     $cont=0;
      $conectar = new PDO('mysql:host='.$host.';dbname='.$basedatos, $usuario, $contrasena);
      $conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $query = "SELECT * FROM user WHERE email = :username AND password = :password";
                $statement = $conectar->prepare($query);
                $statement->execute(
                     array(
                          'email'     =>     $_POST["username"],
                          'password'     =>     $_POST["password"]
                     )
                );
              while($registro=$statement->fetch(PDO::FETCH_ASSOC)){
                  if(password_verify($password,$registro['password'])){
                      $cont++;
                  }
              }

            if($cont>0){
                  $_SESSION["email"] = $_POST["username"];

                     header("location:acceso.php");
               }   else
                {
                     echo "Usuario No regiatrado";

            }
              $statement->closeCursor();
      }

 catch(PDOException $error)
 {
      $message = $error->getMessage();
 }
*/

/*session_start();

if(isset($_SESSION["email"])){
    header('Location: acceso.html');

}
require 'conectar_bd.php';

if(!empty($_POST['username']) && !empty($_POST['password'])){
    $records=$conectar->prepare('SELECT * FROM user WHERE email=:username');
    $records=bindParam(':email',$_POST['username']);
    $records->execute();
    $results=$records->fetch(PDO::FETCH_ASSOC);

    $message='';

    if(count($results)>0 && password_verify($_POST['password'],$results['password'])){
        $_SESSION['email']=$results['email'];
        header('Location: acceso.html');
    }else{
        $message='No tiene credenciales';
    }

}*/

require('conectar_bd.php');

session_start();

if(isset($_SESSION["usuario"])){
   header("Location: acceso.php");
}

if(!empty($_POST))
{
  $usuario=mysqli_real_escape_string($mysqli,$_POST['username']);
  $password=mysqli_real_escape_string($mysqli,$_POST['password']);
  $error='';

  $sha1_pass=sha1($password);

  $sql="SELECT * FROM user WHERE email='$usuario' AND password='$sha1_pass'";

  $result=$mysqli->query($sql);
  $rows=$result->num_rows;

if($rows>0){
  $row=$result->fetch_assoc();
  $_SESSION['email']=$row['email'];

  header("location:persen/acceso.php");

}else{
  $error="EL NOMBRE SON INCORRECTO";
}

}
?>
