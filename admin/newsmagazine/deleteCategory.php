<?php

$id=$_GET['id'];


include('../class/category.class.php');


$categoryObject= new Category();


$categoryObject->set('id',$id);



$status=$categoryObject->delete();

session_start();
if($status =="success"){
    $_SESSION['message']="Category deleted successfully";
    header('location:listCategory.php');
}else{
    $_SESSION['message']=" Failed to Delete Category";
    header('location:listCategory.php');

}

?>