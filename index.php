<?php include ("includes/header.php"); 

if(isset($_GET['catagory'])){
    $catagory=mysqli_real_escape_string($db,$_GET['catagory']);
    $posts=mysqli_query($db,"select * from post where category='$catagory'");?>

    <?Php } else{
        $posts=mysqli_query($db,"select * from post");?>
  
    <?php }?>
       
        <div class="blog-header">
        <h1 class="blog-title">BLog CMS</h1>
        <p class="lead blog-description">The official example template of creating a blog with Bootstrap.</p>
      </div>
      <?php while($row=mysqli_fetch_assoc($posts)){?>
            
           

          <div class="blog-post">
            <h2 class="blog-post-title"><a href="single.php?post=<?php echo $row['id']?>"><?php echo $row['title']?></a></h2>
            <p class="blog-post-meta"><?php echo $row['date']?> <a href="#"><?php echo $row['author']?></a></p>
            <?php $body=$row['body'];
            echo substr($body,0,400)."....."
            
            ?>
          <a href="single.php?post=<?php echo $row['id']?>" class="btn btn-primary">Read more</a>
          </div><!-- /.blog-post -->
          <?Php }?>
         


        

<?php include ("includes/sidebar.php"); ?>
<?php include ("includes/footer.php"); ?>
