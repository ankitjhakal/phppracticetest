<!-- validation for reset password -->
<?php
include('connection.php');
//this is the reset password script
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    { $username=$_POST['username'];
      $prique = $_POST['prique'];
      $prians = $_POST['prians'];
      $newpwd= $_POST['newpwd'];
      $resetpwd=$_POST['resetpwd'];
      if($newpwd!=$resetpwd)
      {
        echo "Please enter same password in both fields ";
        include('ques.php');
      }
//check is user exist in database and private question is correct or not.
   else
    {
      mysqli_select_db($conn, "mysql1");
      $query="SELECT * FROM logindb";

      if($res=mysqli_query($conn,$query))
      {
      while($row=mysqli_fetch_array($res))
      {
        if($username==$row[0])
        {
          if($prique==$row[2] && $prians==$row[3] )
            {
              $q = "UPDATE logindb SET `password` = '$resetpwd'WHERE username = '$username' ";
              mysqli_query($conn, $q);
              echo "password reset successfully";
            }
         else
           {
            echo "Please submit correct answer";
            include('ques.php');
           }
        }
      }
    }
  }
}
?>




​
