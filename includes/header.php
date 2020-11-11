<?php
include ("includes/db.php");
$catagories=mysqli_query($db,"select * from catagories");
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Blog CMS</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    
    <link href="css/blog.css" rel="stylesheet">

    
  </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
            <?php if(isset($_GET['catagory'])) {?>
            <a class="blog-nav-item" href="index.php">Home</a>
            <?Php } else{?>
            <a class="blog-nav-item active" href="index.php">Home</a>  
            <?php } ?>



    <?php while($row=mysqli_fetch_assoc($catagories)){?>
        <?php if(isset($_GET['catagory']) && $row['id']==$_GET['catagory']) {?>
    <a class="blog-nav-item active" href="index.php?catagory=<?php echo $row['id']?>"><?php echo $row['text']?></a>
    <?Php } else{?>
    <a class="blog-nav-item" href="index.php?catagory=<?php echo $row['id']?>"><?php echo $row['text']?></a>
  
    <?php }}?>


          </nav>
      </div>
    </div>

    <div class="container">

      

      <div class="row">

        <div class="col-sm-8 blog-main">