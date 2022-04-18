<?php

//include constants.php file here 
include('../config/constants.php');

//get the id of the admin who we want to delete 
$id=$_GET['id'];


//2.create sql querry to delete admin
$sql="DELETE FROM tbl_admin where id=$id";


//execute the query
$res=mysqli_query($conn,$sql);

//check whether query executed succefully
 if($res==TRUE){
     //query executed succesfully and admin deleted 
     //echo "Admin deleted"
     //create session variable to display message
     $_SESSION['delete']="Admin Deleted succesfully";
     //redirect to manage admin page
     header('location:'.SITEURL.'admin/manage-admin.php');
 }
 else{
     //failed to delete admin
     // echo "failed to add admin"
     $_SESSION['delete']="failed to delete admin .try later ";
     header('location:'.SITEURL.'admin/manage-admin.php');
 }


//3.redirect to manage admin page with message 


?>