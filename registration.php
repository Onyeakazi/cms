<?php include "include/db.php"; ?>
<?php include "include/header.php"; ?>

<?php 
if(isset($_POST['submit'])){
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

// if(username_exists($username)) {

//   $message = "user exists";
// }





  if(!empty($username) && !empty($email) && !empty($password)){

    $username = mysqli_real_escape_string($connection, $username);
    $email = mysqli_real_escape_string($connection, $email);
    $password = mysqli_real_escape_string($connection, $password);
  
    $query = "SELECT randSalt FROM users";
    $select_randsalt_query = mysqli_query($connection, $query);
  
    if(!$select_randsalt_query){
      die("QUERY FIELD" . mysqli_error($connection));
    }

    $row = mysqli_fetch_array($select_randsalt_query);

    $salt = $row['randSalt'];

    $password = crypt($password, $salt);



    $query = "INSERT INTO users (username, user_email, user_password, user_role) ";
  $query .= "VALUES('{$username}','{$email}','{$password}','subcriber' )";
  $register_user_query = mysqli_query($connection, $query);
  if(!$register_user_query) {
    die("QUERY FAILED ". mysqli_error($connection) . ' ' . mysqli_erron($connection));
  }

   $message = "Registration has been submitted";

  }else{
    $message = "Fields cannot be empty";
  
}

}else{
  $message = "";
}



?>

        <!-- Responsive navbar-->
        <?php include "include/navigation.php"; ?>

      <div class="container">
        <section id="login">
          <div class="container">
            <div class="row  align-content-center">
              <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                  <h1 class="mt-5">Registration</h1>
                  <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                    <h6 class="text-center"><?php echo $message;?></h6>
                    <div class="form-group">
                      <label for="username" class="sr-only">Username</label>
                      <input type="text" name="username" id="username" class="form-control" placeholder="Enter your username">
                    </div>

                    <div class="form-group">
                      <label for="email" class="sr-only">Email</label>
                      <input type="email" name="email" id="email" class="form-control" placeholder="example@gmail.com">
                    </div>

                    <div class="form-group">
                      <label for="password" class="sr-only">Password</label>
                      <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                    </div>
                    
                    <input type="submit" name="submit" id="btn-login" class="btn btn-primary btn-lg m-3" value="Register">
                  </form>
                </div>
              </div>
          </div>
        </section>
      </div>

      
  
    
   



<?php include "include/footer.php"; ?>