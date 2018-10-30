
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Insert</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <style>
    .jumbotron1{
  width: 60%;
  margin:0px;
}
.jumbotron1 form{
 margin-left: 70px;
 
}
.jumbotron1 {
  margin: auto;
  position: ;
  top: 0; left: 0; bottom: 0; right: 0;

}

  </style>
</head>

<body>
<br>
<div class="container" style="">
    <h3 class="text-center" style="background-color: #f0f0f0;">INSERT DATA</h3><br>
  <div class="jumbotron1">


  <form method="post" action="insert.php" style="width: 100%;">

 <div class="form-group row">
    <label for="inputPassword3" class="col-sm-3 col-form-label">Name :</label>
    <div class="col-sm-6">
      <input type="name" name="name" class="form-control" id="inputname" placeholder="" required>
    </div>
  </div>

 <div class="form-group row">
    <label for="inputPassword3" class="col-sm-3 col-form-label">Phone :</label>
    <div class="col-sm-6">
      <input type="text" name="phone" class="form-control" id="inputphone" placeholder="" maxlength="10" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-3 col-form-label">Email :</label>
    <div class="col-sm-6">
      <input type="email" name="mail" class="form-control" id="inputmail" placeholder="" required>
    </div>
  </div>

 

<br>
  <div class="form-group row">
    <div class="col-sm-5">
      <button type="submit" name="submit" class="btn btn-success" style="float: right;">Insert</button>
    </div>
  </div>
</form>
</div>
</div>
</body>
</html>


<?php 
include 'connect.php';

$name=$phone=$mail="";

if(isset($_POST['submit']))
{
  $name=test_input($_POST['name']);
  $phone=test_input($_POST['phone']);
  $mail=test_input($_POST['mail']);
  $quer="INSERT INTO `details`(`name`, `phone`, `mail`) VALUES ('$name','$phone','$mail')";
  
	if (mysqli_query($conn, $quer)) 
	{
	?><div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> New Record inserted successfully.
</div>
	<?php
	} 
	else 
	{
    	echo "Error: " . $quer . "<br>" . mysqli_error($conn);
	}


}

//function for removing white space and special chars
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
