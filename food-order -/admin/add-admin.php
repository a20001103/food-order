<?php include ('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" name="Full_Name" placeholder ="Enter your name"></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" name="username" placeholder="your username">
                    </td>
                </tr>
                <tr>
                    <td>password:</td>
                    <td>
                        <input type="password" name="password" placeholder="enter password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">

                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>



<?php include ('partials/footer.php'); ?> 


<?php 
// process the value from form and save it in database
// check whether the button is clicked or not

if(isset($_POST['submit']))
{
    //button clicked
     // echo"Button clicked";

    // get the data from form
     $Full_Name =$_POST['Full_Name'];
      $username =$_POST['username'];
    $password =md5($_POST['password']); //encryption with md5


// 2. sql query to save the data into database
$sql ="INSERT INTO tbl_admin SET
full_name='$Full_Name',
username='$username',
password='$password'

";

// 3. execute querry and save in database
$res= mysqli_query($conn,$sql) or die(mysql_error());


//4.check whether (query is executed) data is inserted or not and display appropriate message
if($res=TRUE)
{
    //data inserted
   // echo" data inserted";
   //create a session variable to display message
$_SESSION['add'] ="Admin Added Succesfully";
// redirect page to MANAGE admin
 header("location:".SITEURL.'admin/manage-admin.php');
}
else{
    //failed to insert the data
   // echo" failed to insert ";
   //create a session variable to display message
$_SESSION['add'] ="Failed to Add Admin";
// redirect page to MANAGE admin
 header("location:".SITEURL.'admin/manage-admin.php');
}
 


}
?>