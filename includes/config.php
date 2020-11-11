<?php
$db=mysqli_connect("localhost","root","","blogcms");
if(!$db)
die("connection error");
$catagories=mysqli_query($db,"select * from catagories");

while($row=mysqli_fetch_assoc($catagories))
{
        echo $row['text'];
        
}?>
