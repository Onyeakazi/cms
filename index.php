<?php include "include/db.php"; ?>
<?php include "include/header.php"; ?>


        <!-- Responsive navbar-->
        <?php include "include/navigation.php"; ?>
        
        
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">

                <?php 
                $per_page = 2;
                if(isset($_GET['page'])){

                    $page = $_GET['page'];

                } else {

                    $page = "";

                }

                if($page == "" || $page == 1) {
                    $page_1 = 0;
                } else {
                    $page_1 = ($page * $per_page) - $per_page;
                }


                if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin' ){

                    $post_query_count = "SELECT * FROM posts";

                } else {

                    $post_query_count = "SELECT * FROM posts WHERE post_status = 'published'";
                }

                $find_count = mysqli_query($connection, $post_query_count);
                $count = mysqli_num_rows($find_count);

                if($count < 1 ){
                    
                    echo "<h1 class='text-center'>NO POST AVAILABLE</h1>";

                } else{


                $count = $count / $per_page;

                $query = "SELECT * FROM posts LIMIT $page_1,$per_page";
                $select_all_posts_query = mysqli_query($connection,$query);

                        while($row = mysqli_fetch_assoc($select_all_posts_query)){
                            $post_id = $row['post_id'];
                            $post_title = $row['post_title'];
                            $post_author = $row['post_author'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_content = substr($row['post_content'],0,100);
                            $post_status = $row['post_status'];
                        
                        ?>
                        
                                <!-- Featured blog post-->
                                <header class="p-5 mb-0">
                                    <div class="container">
                                    
                                        <div class="text-center">
                                            <h1 class="fw-bolder"><a href="post/<?php echo $post_id ?>"><?php echo $post_title ?></a></h1>
                                            <p class="lead"> by <a href="author_posts.php?author=<?php echo $post_author ?>&p_id=<?php echo $post_id; ?>"><?php echo $post_author ?></a></p>
                                        <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                                        </div>
                                    </div>
                                </header>
                                <div class="card mb-4">

                                    <a href="post/<?php echo $post_id ?>"><img class="card-img-top" src="images/<?php echo $post_image;?>" alt="..." /></a>
                                    <div class="card-body">
                                        <p class="card-text"><?php echo $post_content ?></p>
                                        <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id ?>">Read more →</a>
                                    </div>
                                </div>

                       <?php }  }  ?>
                        
                </div>
                <!-- Side widgets-->
                <?php include "include/sidebar.php"; ?>

            </div>
        </div>

        <ul class="pagination m-5">

        <?php 
        for($i =1; $i <= $count; $i++) {
            echo "<li class='page-item'><a class='page-link active' href='index.php?page={$i}'>{$i}</a></li>";
        }
        
        ?>
           
        </ul>

<?php include "include/footer.php"; ?>
