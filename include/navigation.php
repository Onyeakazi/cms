<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="/cms">BERRY BLOG</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">


                            <?php 
                            $query = "SELECT * FROM categories";
                            $select_all_categories_query = mysqli_query($connection,$query);

                            while($row = mysqli_fetch_assoc($select_all_categories_query)){
                                $cat_title = $row['cat_title'];
                                $cat_id = $row['cat_id'];

                                $category_class = '';
                                $registration_class = '';

                               $pageName = basename($_SERVER['PHP_SELF']);

                               $registration = 'registration.php';

                               if(isset($_GET['category']) && $_GET['category'] == $cat_id) {

                                $category_class = 'active';
                               } elseif ($pageName == $registration) {

                                $registration = 'active';
                               }

                                echo " <li class='$category_class'><a style='text-decoration:none;color:white;' href='/cms/category/{$cat_id}'>{$cat_title}</a></li> ...";
                            }
                            
                            ?>
                        
                        <li class="nav-item"><a class="nav-link" href="/cms/admin2" style="color:white; margin-top: -8px;">Admin</a></li>

                        <li class="nav-item <?php echo $registration_class; ?>"><a class="nav-link" style="color:white; margin-top: -8px;" href="/cms/registration">Registration</a></li>

                        <li class="nav-item"><a class="nav-link" style="color:white; margin-top: -8px;" href="/cms/contact">Contact</a></li>


                        <?php 

                         if(isset($_SESSION['user_role'])){

                            if(isset($_GET['p_id'])){

                                $the_post_id = $_GET['p_id'];

                                echo "<li><a href='/cms/admin/posts.php?source=edit_post&p_id={$the_post_id}'>Edit Post</a></li>";
                            }
                         }

                         ?>


                    </ul>
                </div>
            </div>
        </nav>