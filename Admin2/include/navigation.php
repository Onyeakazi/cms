
    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="index.php" class="logo">Berry <span class="lite">Admin</span></a>
      <!--logo end-->

      <div class="nav search-row" id="top_menu">
        <!--  search form start -->
        <ul class="nav top-menu">
          <li>
            <form class="navbar-form">
              <input class="form-control" placeholder="Search" type="text">
            </form>
          </li>
        </ul>
        <!--  search form end -->
      </div>

      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

          <!-- task notificatoin start -->

          <li><a href="">Users Online: <?php echo users_online(); ?></a></li>

          <li><a href="../index.php">Home Site</a></li>


          <!-- user login dropdown start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                <?php 
                if(isset($_SESSION['username'])){
                  echo $_SESSION['username'];
                }
                
                ?>
                            <span class="profile-ava">
                                <img alt="" src="">
                            </span>

                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li class="eborder-top">
                <a href="#"><i class="icon_profile"></i> My Profile</a>
              </li>
              <li>
                <a href="../include/logout.php"><i class="icon_key_alt"></i> Log Out</a>
              </li>
            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>

    
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="active">
            <a class="" href="index.php">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Posts</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="posts.php">Veiw All Posts</a></li>
              <li><a class="" href="posts.php?source=add_post">Add Post</a></li>
            </ul>
          </li>
          <li class="sub-menu">
          <a class="" href="categories.php">
                          <i class="icon_desktop"></i>
                          <span>Categories</span>
                          
                      </a>
            
          </li>
          <li>
            <a class="" href="comments.php">
                          <i class="icon_genius"></i>
                          <span>Comments</span>
                      </a>
          </li>
         
          

          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_table"></i>
                          <span>Users</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="./users.php">View All Users</a></li>
              <li><a class="" href="./users.php?source=add_user">Add User</a></li>
            </ul>
          </li>

          <li>
            <a class="" href="profile.php">
                          <i class="icon_genius"></i>
                          <span>Profile</span>
                      </a>
          </li>

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->