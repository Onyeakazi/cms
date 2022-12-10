<?php include "include/header.php" ?>


<?php 

// if(!is_admin($_SESSION['username'])){
//   header("Location: index.php");
// }


?>



  <!-- container section start -->
  <section id="container" class="">
  <?php include "include/navigation.php" ?>
    <!--header end-->

   

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">

          </div>
        </div>

       <?php 
       if(isset($_GET['source'])){
        $source = $_GET['source'];

       }else{

        $source = '';
       }

       switch($source){

        case 'add_user';
        include "include/add_user.php";
        break;

        case 'edit_user';
        include "include/edit_user.php";
        break;

        case '200';
        echo "NICE 200";
        break;

        default;
        include "include/view_all_users.php";
        break;
       }
       
       ?>
       


      </section>


<?php include "include/footer.php"; ?>