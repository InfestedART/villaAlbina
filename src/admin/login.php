<!DOCTYPE html>
<?php
   include('config.php');
   session_start();

   $error = "";
   $user_alert = $pass_alert = false;

   if(isset($_POST['submit'])) {      

      if(!empty(trim($_POST['password']))) {
         $password = trim($_POST['password']); 
      } else {
         $error = "Introduzca su contraseña";
         $pass_alert = true;
      }

      if(!empty(trim($_POST['usuario']))) {
         $usuario = trim($_POST['usuario']); 
      } else {
         $error = "Introduzca nombre de usuario";
         $user_alert = true;
      }

      if(!$pass_alert &&  !$user_alert) {         
         $sql = "SELECT  username, password FROM usuarios WHERE username = :username";

         if($stmt = $conn->prepare($sql)) {
            $stmt->bindParam(":username", $usuario, PDO::PARAM_STR);

            if($stmt->execute()){
               if($stmt->rowCount() == 1){
                  if($row = $stmt->fetch()){                     
                     $hashed_password = $row["password"];
                     echo $password." == ".$hashed_password;
                     echo "<br /> 1 ".password_verify($password, $hashed_password);

                     if(password_verify($password, $hashed_password)) {         
                         session_start();                         
                         $_SESSION["loggedin"] = true;
                         $_SESSION["username"] = $username;
                         header("location: cpanel.php");
                     } else {
                        $error = "Contraseña o Nombre de usuario incorrectos - pass";
                     }
                  }
               } else {
                  $error = "Contraseña o Nombre de usuario incorrectos - user?";
               }
            }
         }
      }
   }
?>

<head>
	<meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="">
   <meta name="author" content="">

   <title>Espacio Simon I Patiño</title>

   <link rel="stylesheet" href="css/bootstrap.css" />
   <link rel="stylesheet" href="css/style.css" />
</head>

<body>
	<div class='container'>
      <div class='row justify-content-md-center'>
         <div class='col-md-5'>
            <div class='card p-4 mt-5'>
               <h3>INGRESAR</h3>
               <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                  <span class='error'><?php echo "$error"; ?></span>
                  <div class='form-group'>
                     <label>Nombre de Usuario</label>
                     <input class="form-control <?php echo $user_alert ? 'alert' : '' ?>" type='text' name="usuario" />               
                  </div>
                  <div class='form-group'>
                     <label>Contraseña</label>
                     <input  class="form-control  <?php echo $pass_alert ? 'alert' : '' ?>" type="password"  name="password" />          
                  </div>
                  <div class="form-group">
                     <input class="btn btn-primary" type='submit' name='submit' value='INGRESAR' />
                  </div>
               </form>
            </div>
         </div>
      </div>

	<div />
</body>

</html>