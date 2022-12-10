<?php include "include/db.php"; ?>
<?php include "include/header.php"; ?>

<?php 




if(isset($_POST['submit'])){

  $to      = "chiemenagodswill97@gmail.com";
  $subject = wordwrap($_POST['subject'], 70) ;
  $body    = $_POST['body'];
  $header    = "From: " .$_POST['email'];


  mail($to, $subject, $msg,$header );

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
                  <h1 class="mt-5">Contact</h1>
                  <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                    

                    <div class="form-group">
                      <label for="email" class="sr-only">Email</label>
                      <input type="email" name="email" id="email" class="form-control" placeholder="Enter Your Email">
                    </div>

                    <div class="form-group">
                      <label for="text" class="sr-only">Subject</label>
                      <input type="text" name="subject" id="email" class="form-control mb-3" placeholder="Enter Your Subject">
                    </div>

                    <div class="form-group">
                      
                    <textarea name="body" class="form-control" id="body" cols="50" rows="10"></textarea>
                    </div>
                    
                    <input type="submit" name="submit" id="btn-login" class="btn btn-primary btn-lg m-3" value="Submit">
                  </form>
                </div>
              </div>
          </div>
        </section>
      </div>

      
  
    
   



<?php include "include/footer.php"; ?>