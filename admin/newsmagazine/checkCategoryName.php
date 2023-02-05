<?php
$categoryName=$_POST['categoryName'];
$conn=mysqli_connect('localhost','root',' ','news-magazine');
$sql="select * from category where name='$categoryName' limit 1";
$var=$conn->query($sql);


if($var->num_rows==1){
    echo "Already taken";
}else{
    echo "success";
}
?>