
                <div class="col-lg-4 my-5">

                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <form action="search.php" method="post">
                        <div class="card-body">
                            <div class="input-group">
                                <input name="search" class="form-control" type="text" aria-label="Enter search term..." aria-describedby="button-search" />
                                <button name="submit" class="btn btn-primary" id="button-search" type="submit">Go!</button>
                            </div>
                        </div>
                        </form>
                    </div>

                    <!-- Login-->
                    <div class="card mb-4">

                    <?php if(isset($_SESSION['user_role'])): ?>

                        <h1>Logged in as <?php echo $_SESSION['username']?></h1>

                    <?php else: ?>

                        <div class="card-header">Login</div>
                        <form action="include/login.php" method="post">
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <input name="username" class="form-control" type="text" placeholder="Enter Your Username">
                            </div>
                            <div class="input-group">
                                <input name="password" class="form-control" type="password" placeholder="Enter Password">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" name="login" type="submit">Submit
                                    </button>
                                </span>
                            </div>
                        </div>
                        </form>

                    <?php endif; ?>


                        
                    </div>


                    <!-- Categories widget-->
                    <div class="card mb-4 p-2">

                        <?php 
                        $query = "SELECT * FROM categories";
                        $select_categories_sidebar = mysqli_query($connection,$query);
                        ?>

                            <h4 class="p-2">Blog Catergories</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        
                                                <?php
                                        while($row = mysqli_fetch_assoc($select_categories_sidebar)){
                                            $cat_title = $row['cat_title'];
                                            $cat_id = $row['cat_id'];
                
                                            echo " <li><a href='category.php?category= $cat_id'>{$cat_title}</a></li> ";
                                        }

                                        ?>
                                    </div>
                                </div>

                                   

                            

                        
                    </div>
                    <!-- Side widget-->
                    <?php include "widget.php"; ?>
                </div>