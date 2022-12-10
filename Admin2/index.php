

<?php include "include/header.php" ?>


<?php 


?>


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

              <small style="color:black;"><?php echo $_SESSION['username'] ?></small>
            </h3>
            
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box blue-bg" style="border-radius:10px;">
              <i class="fa fa-file-text"></i>

          <?php 
          $query = "SELECT * FROM posts";
          $select_all_post = mysqli_query($connection, $query);
          $post_counts = mysqli_num_rows($select_all_post);

          echo "<div class='count'>{$post_counts}</div>";
          
          ?>

              <div class="title">Posts</div>
              <a href="posts.php" style="color:blue; background-color:white; padding:2px; border-radius:6px;font-size:20px; font-weight:300">View Details</a>
            </div>
            
            <!--/.info-box-->
             
            </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" >
            <div class="info-box brown-bg" style="border-radius:10px;">
              <i class="fa fa-comment"></i>

              <?php 
          $query = "SELECT * FROM comments";
          $select_all_comments = mysqli_query($connection, $query);
          $comment_counts = mysqli_num_rows($select_all_comments);

          echo "<div class='count'>{$comment_counts}</div>";
          
          ?>
              
              <div class="title">Comments</div>
              <a href="comment.php" style="color:brown;background-color:white; padding:2px; border-radius:6px;font-size:20px; font-weight:300">View Details</a>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box dark-bg" style="border-radius:10px;">
              <i class="fa fa-user"></i>

              <?php 
          $query = "SELECT * FROM users";
          $select_all_users = mysqli_query($connection, $query);
          $user_counts = mysqli_num_rows($select_all_users);

          echo "<div class='count'>{$user_counts}</div>";
          
          ?>
              <div class="title">Users</div>
              <a href="./users.php" style="color:black;background-color:white; padding:2px; border-radius:6px;font-size:20px; font-weight:300">View Details</a>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box green-bg" style="border-radius:10px;">
              <i class="fa fa-list"></i>

              <?php 
          $query = "SELECT * FROM categories";
          $select_all_categories = mysqli_query($connection, $query);
          $category_counts = mysqli_num_rows($select_all_categories);

          echo "<div class='count'>{$category_counts}</div>";
          
          ?>
              <div class="title">Categories</div>
              <a href="categories.php" style="color:green;background-color:white; padding:2px; border-radius:6px;font-size:20px; font-weight:300">View Details</a>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

        </div>
        <!--/.row-->



        <?php 
        $query = "SELECT * FROM posts WHERE post_status = 'published' ";
        $select_all_published_posts = mysqli_query($connection, $query);
        $post_published_count = mysqli_num_rows($select_all_published_posts);


        $query = "SELECT * FROM posts WHERE post_status = 'draft' ";
        $select_all_draft_posts = mysqli_query($connection, $query);
        $post_draft_count = mysqli_num_rows($select_all_draft_posts);

        $query = "SELECT * FROM comments WHERE comment_status = 'unapproved' ";
        $unapproved_comments_query = mysqli_query($connection, $query);
        $unapproved_comment_count = mysqli_num_rows($unapproved_comments_query);

        $query = "SELECT * FROM users WHERE user_role = 'subscriber' ";
        $select_all_subscribers = mysqli_query($connection, $query);
        $subscriber_count = mysqli_num_rows($select_all_subscribers);
        
        
        
        ?> 




        <script type="text/javascript" ></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],


              <?php
              
              $element_text = ['All Posts', 'Active Posts', 'Draft Posts', 'Comments', 'Pending Comments', 'Users', 'Subscribers', 'Categories'];
              $element_count = [$post_count,$post_published_count, $post_draft_count, $comment_count, $unapproved_comment_count, $user_count, $subscriber_count, $category_count];


              for($i =0;$i < 8; $i++) {
                echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
              }

              ?>

              
              ['Posts', 2],
              ['Draft', 5],
              ['Comments', 2],
              ['Users', 3],
              ['Categories', 5],
              

              
              
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

    <div id="columnchart_material" style="width: 100%; height: 500px;"></div>

      </section>

      

<?php include "include/footer.php"; ?>