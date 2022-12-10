<?php include "include/db.php"; ?>
<?php include "include/header.php"; ?>

        <!-- Responsive navbar-->
        <?php include "include/navigation.php"; ?>
        
        <!-- Page header with logo and tagline-->
        
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">

                <?php 


                if(isset($_POST['submit'])){
                  $search = $_POST['submit'];

                  $query ="SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
                  $search_query = mysqli_query($connection, $query);

                  if(!$search_query){
                    die("QUERY FAILED" . mysqli_error($connection));
                  }
                }

                $count = mysqli_num_rows($search_query);

                if($count == 0){
                    echo "<h1>NO RESULT</h1>";
                }else{
    
                            while($row = mysqli_fetch_assoc($search_query)){
                                $post_title = $row['post_title'];
                                $post_author = $row['post_author'];
                                $post_date = $row['post_date'];
                                $post_image = $row['post_image'];
                                $post_content = $row['post_content'];
    
    
                            ?>
            
                                    <!-- Featured blog post-->
                                    <header class=" border-bottom mb-4">
                                        <div class="container">
                                        
                                            <div class="text-center my-5">
                                                <h1 class="fw-bolder"><?php echo $post_title ?></h1>
                                                <p class="lead mb-0">by <?php echo $post_author ?></p>
                                            <div class="small text-muted"><?php echo $post_date ?></div>
                                            </div>
                                        </div>
                                    </header>
                                    <div class="card mb-4">
                                        <a href="#!"><img class="card-img-top" src="images/<?php echo $post_image;?>" alt="..." /></a>
                                        <div class="card-body">
                                            <p class="card-text"><?php echo $post_content ?></p>
                                            <a class="btn btn-primary" href="#!">Read more →</a>
                                        </div>
                                    </div>
    
                           <?php } 
                }
                ?>
                
                </div>
                <!-- Side widgets-->
                <?php include "include/sidebar.php"; ?>


            </div>
        </div>


<?php include "include/footer.php"; ?>


