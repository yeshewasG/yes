<?php include("includes/header.php"); ?>

<br>
<div class="blog-post">
    <h2 class="blog-post-title">Search Result</h2>
    <?php


    if (is_null($_GET['search'])) {?>
      <div class="blog-post">
      <h1>Opps No Result Found</h1>
    </div>
   <?Php } else {
        if (isset($_GET['search'])) {

            $search = mysqli_real_escape_string($db, $_GET['search']);
            $posts = mysqli_query($db, "select * from post where keywords like'$search'");
            while ($row = mysqli_fetch_assoc($posts)) { ?>
                <div class="blog-post">
                    <h2 class="blog-post-title"><a href="single.php?post=<?php echo $row['id'] ?>"><?php echo $row['title'] ?></a></h2>
                    <p class="blog-post-meta"><?php echo $row['date'] ?> <a href="#"><?php echo $row['author'] ?></a></p>
                    <?php $body=$row['body'];
            echo substr($body,0,400).".....";?>
            <a href="single.php?post=<?php echo $row['id']?>" class="btn btn-primary">Read more</a>
            
           <?php
            }
        }
        
    } ?>
     


                </div><!-- /.blog-post -->
</div>

<?php include("includes/sidebar.php"); ?>
<?php include("includes/footer.php"); ?>