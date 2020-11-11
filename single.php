<?php include("includes/header.php");
if (isset($_GET['post'])) {
  $id = mysqli_real_escape_string($db, $_GET['post']);
  $posts = mysqli_query($db, "select * from post where id='$id'");
  $coments = mysqli_query($db, "select * from coment");


  if (isset($_POST['name'])) {
    $name = mysqli_real_escape_string($db, $_POST['name']);
  }
  if (isset($_POST['website'])) {
    $website = mysqli_real_escape_string($db, $_POST['website']);
  }
  if (isset($_POST['coment'])) {
    $coment = mysqli_real_escape_string($db, $_POST['coment']);
  }

  mysqli_query($db,"insert into coment(name,website,coment) values('$name','$website','$coment')");
	




} ?>

<br>
<?php while ($row = mysqli_fetch_assoc($posts)) { ?>
  <div class="blog-post">
    <h2 class="blog-post-title"><a href="single.php?post=<?php echo $row['id'] ?>"><?php echo $row['title'] ?></a></h2>
    <p class="blog-post-meta"><?php echo $row['date'] ?> <a href="#"><?php echo $row['author'] ?></a></p>
  <?php echo $row['body'];
} ?>

  </div><!-- /.blog-post -->

  <blockquote>comment</blockquote>
  <div class="comment-area">
    <form method="post">
      <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="name">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Website</label>
        <input type="Website" name="website" class="form-control" id="exampleInputEmail1" placeholder="Website(optional)">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Comment</label>
        <textarea cols="40" rows="10" name="coment" class="form-control" placeholder="comment"></textarea>
      </div>
      <button type="submit" name="post_comment" class="btn btn-primary">Post Comment</button>
    </form>
    <br>
    <hr>
    <div class="comment">
      <div class="comment-head">
      <?php while ($row = mysqli_fetch_assoc($coments)) { ?>
        <a href=""><?php echo $row['name'] ?></a>
        <img width="50" height="50" src="img/noimage.jpg" />
      </div>
      <p><?php echo $row['coment'] ?></p>
      <?php } ?>

    </div>
    <div class="comment">
      <div class="comment-head">
        <a href="">yeshewas</a><button class="btn btn-info btn-xs">Admin</button>
        <img width="50" height="50" src="img/noimage.jpg" />
      </div>
      <p>this is comment</p>

    </div>
  </div>

  <?php include("includes/sidebar.php"); ?>
  <?php include("includes/footer.php"); ?>