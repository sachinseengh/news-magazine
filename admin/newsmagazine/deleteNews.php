<?php

$id=$_GET['id'];


include('../class/news.class.php');


$categoryObject= new News();


$categoryObject->set('id',$id);



$status=$categoryObject->delete();

session_start();
if($status =="success"){
    $_SESSION['message']="News deleted successfully";
    header('location:listNews.php');
}else{
    $_SESSION['message']=" Failed to Delete News";
    header('location:listNews.php');

}

?>