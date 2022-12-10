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
            <h3 class="page-header"><i class="fa fa-laptop"></i>
              Welcome to Admin Dashboard
              <small>Author</small>
            </h3>
          </div>
        </div>

        <div class="col-xs-6">


          <?php insert_categories(); ?>



          <form action="" method="post">
            <div class="form-group has-success">
              <label for="cat-title">Add Category</label>
              <input type="text" class="form-control" name="cat_title">
            </div>
            <div class="form-group">
              <input  class="btn btn-success" type="submit" name="submit" value="Add Category">
            </div>
          </form>

          <?php ///UPDATE AND INCLUDE QUERY
          if(isset($_GET['edit'])){
            $cat_id = $_GET['edit'];

            include "include/update_categories.php";
          }
          ?>


        </div>

        <div class="col-xs-6">

                

          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Id</th>
                <th>Category Title</th>
              </tr>
            </thead>
            <tbody>


<?php findAllCategories(); ?>

   
<?php deleteCategories(); ?>


            </tbody>
          </table>
        </div>

       
       


      </section>


<?php include "include/footer.php"; ?>