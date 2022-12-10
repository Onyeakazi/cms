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
                    

                $view_query = "UPDATE posts SET post_views_count = post_views_count + 1 WHERE post_id = $the_post_id ";
                $send_query = mysqli_query($connection, $view_query);


                if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin' ){

                    $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";

                } else {

                    $query = "SELECT * FROM posts WHERE post_id = $the_post_id AND post_status = 'published' ";
                }

                
                $select_all_posts_query = mysqli_query($connection,$query);

                if(mysqli_num_rows($select_all_posts_query) < 1) {

                    echo "<h1 class='text-center'>NO POST AVAILABLE</h1>";

                } else{ 

                        while($row = mysqli_fetch_assoc($select_all_posts_query)){
                            $post_title = $row['post_title'];
                            $post_author = $row['post_author'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_content = $row['post_content'];


                        ?>
                        
                                    <h1 class="page-header my-5">
                                            Posts
                                    </h1>
                                <!-- Featured blog post-->
                                <header class=" mb-5">
                                    <div class="container">
                                    
                                        <div class="text-center">
                                            <h1 class="fw-bolder"><a href=""><?php echo $post_title ?></a></h1>
                                            <p class="lead">by <a href="#"><?php echo $post_author ?></a></p>
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

                       <?php } 
                    
                    
                    
                    ?>



              <?php 
              if(isset($_POST['create_comment'])){
                $the_post_id = $_GET['p_id'];

                $comment_author = $_POST['comment_author'];
                $comment_email = $_POST['comment_email'];
                $comment_content = $_POST['comment_content'];

                if(!empty($comment_author) && !empty($comment_email) && !empty($comment_content)){

                    $query = "INSERT INTO comments (comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date)";
                    $query .= "VALUES ($the_post_id, '{$comment_author}','{$comment_email}','{$comment_content}','unapproved',now())";
        
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

        <section class="mb-5">
            <div class="card bg-light mb-5">
                <div class="card-body">
                    <!-- Comment form-->
                    <h4>Leave a Comment</h4>
                    <form class="mb-4" action="" method="post">
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" class="form-control mb-2" name="comment_author">
                        </div>
                        <div class="form-group">
                        <label for="email">Email</label>
                            <input type="email" class="form-control mb-2" name="comment_email">
                        </div>
                        <div class="form-group">
                        <label for="comment">Your Comment</label>
                            <textarea class="form-control" name="comment_content" rows="3" placeholder="Join the discussion and leave a comment!"></textarea>
                        </div>
                        <button  class="btn btn-primary mt-3" name="create_comment">Submit</button>
                    </form>
                </div>
            </div>
            <!-- Comment with nested comments-->
            <?php 
                            $query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
                            $query .= "AND comment_status = 'approved' ";
                            $query .= "ORDER BY comment_id DESC ";
                            $select_comment_query = mysqli_query($connection, $query);
                            if(!$select_comment_query){

                                die('QUERY FAILED' . mysqli_error($connection));
                            }
                            while($row = mysqli_fetch_array($select_comment_query)){
                                $comment_date = $row['comment_date'];
                                $comment_content = $row['comment_content'];
                                $comment_author = $row['comment_author'];

                                ?>
                            
                                
                            <div class="d-flex mb-4">
                                <!-- Parent comment-->
                                <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                <div class="ms-3">
                                    <h4><?php echo $comment_author; ?>
                                        <small><?php echo $comment_date; ?></small>
                                    </h4> 

                                    <?php echo $comment_content; ?>
                                    
                                </div>
                            </div>

                            <?php } } }else {

                        header("Location: index.php");
                    }
                    ?>
                            
        </section>

                        
               
                
                
                </div>
                <!-- Side widgets-->
                <?php include "include/sidebar.php"; ?>


            </div>
        </div>


<?php include "include/footer.php"; ?>


