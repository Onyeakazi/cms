<?php include "include/header.php" ?>



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

        case 'add_post';
        include "include/add_post.php";
        break;

        case 'edit_post';
        include "include/edit_post.php";
        break;

        case '200';
        echo "NICE 200";
        break;

        default;
        include "include/view_all_posts.php";
        break;
       }
       
       ?>
       


      </section>


<?php include "include/footer.php"; ?>