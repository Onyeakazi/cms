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

                    if(isset($_GET['p_id'])){
                        $the_post_id = $_GET['p_id'];
                        $the_post_author = $_GET['author'];
                    }


                $query = "SELECT * FROM posts WHERE post_author = '{$the_post_author}'";
                $select_all_posts_query = mysqli_query($connection,$query);

                        while($row = mysqli_fetch_assoc($select_all_posts_query)){
                            $post_title = $row['post_title'];
                            $post_author = $row['post_user'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_content = $row['post_content'];


                        ?>
                        
                                    <h1 class="page-header my-5">
                                            Page heading
                                        <small>Secondary Text</small>
                                    </h1>
                                <!-- Featured blog post-->
                                <header class=" mb-4">
                                    <div class="container">
                                    
                                        <div class="text-center">
                                            <h1 class="fw-bolder"><a href=""><?php echo $post_title ?></a></h1>
                                            <p class="lead">All Post by<?php echo $post_author ?></p>
                                        <div class="small text-muted"><?php echo $post_date ?></div>
                                        </div>
                                    </div>
                                </header>
                                <div class="card mb-4">
                                    <a href="#!"><img class="card-img-top" src="images/<?php echo $post_image;?>" alt="..." /></a>
                                    <div class="card-body">
                                        <p class="card-text"><?php echo $post_content ?></p>
                                    </div>
                                </div>

                       <?php } ?>



              <?php 
              if(isset($_POST['create_comment'])){
                $the_post_id = $_GET['p_id'];

                $comment_user = $_POST['comment_user'];
                $comment_email = $_POST['comment_email'];
                $comment_content = $_POST['comment_content'];

                if(!empty($comment_author) && !empty($comment_email) && !empty($comment_content)){

                    $query = "INSERT INTO comments (comment_post_id,comment_user,comment_email,comment_content,comment_status,comment_date)";
                    $query .= "VALUES ($the_post_id, '{$comment_user}','{$comment_email}','{$comment_content}','unapproved',now())";
        
                    $create_comment_query = mysqli_query($connection, $query);
        
                        if(!$create_comment_query){
                            die('QUERY FAILED' . mysqli_error($connection));
                        }
        
                        $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id = $the_post_id ";
                        $update_comment_count = mysqli_query($connection, $query);
        
        
                      }else{
                        echo "<script>alert('Field cannot be empty')</script>";
                      }

                }

           
              
              
              ?>         
                
                </div>
                <!-- Side widgets-->
                <?php include "include/sidebar.php"; ?>


            </div>
        </div>


<?php include "include/footer.php"; ?>


