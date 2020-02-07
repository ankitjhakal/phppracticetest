<!-- check user successfully logged or not if not then use forgotpassword button -->
<?php



if(isset($_POST['forgotpassword']))
{
  header('location:ques.php');
}

 else{
include('connection.php');
mysqli_select_db($conn, "mysql1");
$query="SELECT * FROM logindb";
if($res=mysqli_query($conn,$query))
{
while($row=mysqli_fetch_array($res))
{
if($_POST['username']==$row[0])
 {
  if($_POST['password']==$row[1])
  {
    echo "successfully login";
  }
  else
  {
    echo "wrong password";
    include('logintest.php');
  }
 }
}
}
else {
  echo "connection error";
}
}
/*
$check = "select * from student";
$cur_user=null;
//check if user name is set or not if set then set session user1 variable
if(isset($_POST['username']))
{
  $cur_user=$_POST['username'];
  //check current user exists or not
  if(array_key_exists($cur_user,$check))
  {
    if($check[$cur_user]==base64_encode($_POST['password']))
    {
      echo "successfully login";
    }
  }
}
else {
    echo "<h2>Incorrect details</h2>";
  include('logintest.php');
}

*/
 ?>
