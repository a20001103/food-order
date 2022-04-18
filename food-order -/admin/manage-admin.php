<?php include ('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>MANAGE ADMIN</h1>
        <br />

   <?php  
   if(isset($_SESSION['add']))
   {
       echo $_SESSION['add']; //display session message
       unset($_SESSION['add']); //removing session message
   }
   if(isset($_SESSION['delete']))
   {
       echo $_SESSION['delete']; //display session message
       unset($_SESSION['delete']); //removing session message
   }
   
   
   
   
   ?>



 <!-- button to add admin -->
        <a href="add-admin.php" class="btn-primary">Add Admin</a>
        <br /> <br /> <br />
        <table class="tbl-full">
    <tr>
        <th>S.N</th>
        <th>Full name</th>
        <th>Username</th>
        <th>Actions</th>
    </tr>

    <?php 
    
    //query to get all admin
    $sql ="SELECT * FROM tbl_admin";
    //execute the query
    $res=mysqli_query($conn,$sql);

    //check whether the querry is executed or not 
    if($res==TRUE)
    {
        //count rows to check whether we have data in database or not
        $count = mysqli_num_rows($res);
        $sn=1;   // create a variable and assign the value of id to it 

        //check the num of rows
        if($count>0)
        {
            //we have data in database
            while($rows=mysqli_fetch_assoc($res))
            {
                //using while loop to get all the data from database
                // and while loop will run as long as we have data in database

                // get individual data
                $id=$rows['id'];
                $full_name=$rows['full_name'];
                $username=$rows['username'];
                //display the values in table
                ?>
              <tr>
                <th><?php  echo $sn++?></th>
                  <th><?php  echo $full_name?></th>
                    <th><?php  echo $username?></th>
                <th>
            <a href="#" class="btn-secondary">Update Admin</a>
            <a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id;?>" class="btn-danger">Delete Admin</a>
        </th>
    </tr>

            <?php
            }
        }
        else{
            // we do not have data in database
        }
    }
    
    
    ?>

   
</table>
    </div>
</div>

<?php include ('partials/footer.php'); ?>