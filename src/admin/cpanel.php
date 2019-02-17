<!DOCTYPE html>
<?php
   include('../api/config.php');
   session_start();

   if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
       header("location: index.php");
       exit;
   }

   $error = "";

   if($_SERVER["REQUEST_METHOD"] == "POST") {       
      $usuario = trim($_POST['usuario']); 
      $todo_ok = false;
      $sql = "SELECT username FROM usuarios WHERE username = :username";      

      if($stmt = $conn->prepare($sql)) {
         $stmt->bindParam(":username", $usuario, PDO::PARAM_STR);

         if($stmt->execute()){
            if($stmt->rowCount() == 1){
               $error = "username ".$usuario." already taken";
            } else {
               $password = trim($_POST['password']); 
               $confirm_password = trim($_POST['confirm_password']); 

               if ($password == $confirm_password) {
                  $todo_ok = true;
               } else {
                  $error = "passwords are different";
               }
            }
         }
      }

      unset($stmt);

      if ($todo_ok) {
         $sql = "INSERT into usuarios (username, password) VALUES (:username, :password)";

         if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $usuario, PDO::PARAM_STR);
            $stmt->bindParam(":password", $hashed_password, PDO::PARAM_STR);
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            if($stmt->execute()){
               $error = "Usuario creado exitosamente";            
            } else{
               $error = "Algo salio mal, por favor vuela a intentar";
            }
            
         }
      }
   }
?>

<?php include "templates/header.php"; ?>

   <div class='admin-header'>
      <div>CPANEL</div>
      <div>Welcome</div>
   </div>

   <div class='admin-sidebar'>
      <a href=#> Usuarios </a>
   </div>

   <div class='container admin-container'>
      <div  class='row justify-content-md-center'>
         <div class='card col-md-6 p-4 mt-5'>
            <h3>NUEVO USUARIO</h3>
            <form id='newUser_form' method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
               <span  id='newUser_alert' class='error'><?php echo "$error"; ?></span>
               <div class='form-group'>
                  <label>Nombre de Usuario</label>
                  <input
                     id='newUser_username'
                     class="form-control <?php echo $user_alert ? 'alert' : '' ?>"
                     type='text'
                     name="usuario"
                  /> 
               </div>
               <div class='form-group'>
                  <label>Contraseña</label>
                  <input 
                     id='newUser_password'
                     class="form-control <?php echo $pass_alert ? 'alert' : '' ?>"
                     type="password" 
                     name="password"
                  />
               </div>
               <div class='form-group'>
                  <label>Confirmar Contraseña</label>
                  <input 
                     id='newUser_confirmPass'
                     class="form-control <?php echo $pass_alert ? 'alert' : '' ?>"
                     type="password" 
                     name="confirm_password"
                  />
               </div>
               <div class="form-group">
                  <button type="button" id='newUser_btn' class="btn btn-primary">INGRESAR</button>
               </div>
            </form>
         </div>
      </div>
      <div id='test'>
      </div>
   </div>

   <script src="js/app.js"></script>
<?php include "templates/footer.php"; ?>