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

                if(isset($_GET['category'])){
                    $post_category_id = $_GET['category'];

                    if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin' ){

                        $query = "SELECT * FROM posts WHERE post_category_id = $post_category_id";
    
                    } else {
    
                        $query = "SELECT * FROM posts WHERE post_category_id = $post_category_id AND post_status= 'published'";
                    }

                $select_all_posts_query = mysqli_query($connection,$query);

                if(mysqli_num_rows($select_all_posts_query) < 1) {

                    echo "<h1 class='text-center'>NO POST AVAILABLE</h1>";

                } else{


                        while($row = mysqli_fetch_assoc($select_all_posts_query)){
                            $post_id = $row['post_id'];
                            $post_title = $row['post_title'];
                            $post_author = $row['post_author'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_content = substr($row['post_content'],0,100);


                        ?>
                        
                                    <h1 class="page-header my-5">
                                            Page heading
                                        <small>Secondary Text</small>
                                    </h1>
                                <!-- Featured blog post-->
                                <header class=" mb-4">
                                    <div class="container">
                                    
                                        <div class="text-center">
                                            <h1 class="fw-bolder"><a href="post/<?php echo $post_id ?>"><?php echo $post_title ?></a></h1>
                                            <p class="lead">by <a href="index.php"><?php echo $post_author ?></a></p>
                                        <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                                        </div>
                                    </div>
                                </header>
                                <div class="card mb-4">
                                    <a href="#!"><img class="card-img-top" src="../images/<?php echo $post_image;?>" alt="..." /></a>
                                    <div class="card-body">
                                        <p class="card-text"><?php echo $post_content ?></p>
                                        <a class="btn btn-primary" href="#!">Read more →</a>
                                    </div>
                                </div>

                       <?php } } }else{

                        header("Location: index.php");

                        }?>
                        
                </div>
                <!-- Side widgets-->
                <?php include "include/sidebar.php"; ?>


            </div>
        </div>


<?php include "include/footer.php"; ?>


