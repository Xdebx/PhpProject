<?php
session_start();
if (!isset($_SESSION['emp_id']))
{
 require ('../includes/login_functions.inc.php');
 header ("location: ../Employee/login.php");
}
else { ?>
<?php
$page_title = 'Edit Employee';
include "../includes/config.php";
include "../includes/header1.php";
$result = mysqli_query( $conn,"SELECT * FROM Employee where emp_id = ". $_GET['emp_id']);
$row = mysqli_fetch_array($result);
//print_r($row);
?>
<div class="container">
<h2><center>Update Employee</center></h2>
<link rel="stylesheet" type="text/css" href="../Includes/Home.css">
<center><form method="POST" action="update.php" enctype="multipart/form-data">
<div class="form-group">
<label for="employeeid" class="control-label">Employee ID</label>
<input type='text' class="form-control " id='employeeid' name='emp_id' value="<?php echo $_GET['emp_id']; ?>">
</div>
<div class="form-group">
<label for="fname" class="control-label">First Name</label>
<input type="text" class="form-control " id="fname" name="fname" value="<?php echo $row['fname'];?>">
</div>
<div class="form-group">
<label for="email" class="control-label">Email Address</label>
<input type="text" class="form-control " id="email" name="email" value="<?php echo $row['email'];?>">
</div>

<div class="form-group">
<label for="password" class="control-label">Password</label>
<input type="text" class="form-control " id="password" name="password" value="<?php echo $row['password'];?>">
</div>
<div class="form-group"> 
    <label for="imgpath" class="control-label">Select image to upload:</label>
    <input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
 </div>
 <div>
  <div class="form-group"> 
    <label for="imgpath" class="control-label">image</label>
    <?php echo "<img border=\"0\" src=\"".$row['img_emp']."\" width=\"250\" alt=\"item Name\" height=\"250\">" ?>;
 </div>
<div>
<button type="submit" name="submit" class="btn btn-primary" value="update">Update</button>
<a href="../includes/Home.html" class="btn btn-default" role="button">Cancel</a>
</div>
</div>
</form>
</center>
</div>
<?php
mysqli_free_result($result);
mysqli_close( $conn );
?>
</body>
</html>
<?php } ?>