
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Select</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <style>
    td{
      text-align: center;
    }
  
    .jumbotron1 {
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
<div class="container" style="">
  <br>
    <h3 class="text-center" style="background-color: #f0f0f0;">SELECT DATA</h3><br>
  <div class="jumbotron1">


<form method="post" action="select.php" style="width: 100%;">

 <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Name :</label>
    <div class="col-sm-6">
      <input type="name" name="name" class="form-control" id="inputname" placeholder="" required>
    </div>
      <button type="submit" name="select" class="btn btn-success" style="float: right;">Select</button>

  </div>
<br>
</form>
<form action="select.php" method="post">
  <div class="form-group row">
    <div class="col-sm-5">
      <button type="submit" name="selectall" class="btn btn-info" style="float: right;">Select All</button>
    </div>    
  </div>
</form>
</div>
</div>

<div id="tabel_all" class="jumbotron1">
<?php 
include 'connect.php';
if (isset($_POST['selectall'])) 
{
  echo "<h2>All selected </h2>";
  # code...
  $quer="SELECT * FROM `details` WHERE 1";
  $result=mysqli_query($conn, $quer);
  if($result->num_rows > 0)
	{?>
    <table class="table table-bordered">
       <thead class="table-dark" >
         <tr class="text-center">
           <td>
             Name
           </td>
           <td>
             Phone
           </td>
           <td>
             Mail
           </td>
         </tr>
       </thead> <?php
    while($row=mysqli_fetch_assoc($result))
    {
    ?>
       <tbody>
         <tr>
           <td>
             <?php echo $row['name'];?>
           </td>
           <td>
             <?php echo $row['phone'];?>
           </td>
           <td>
             <?php echo $row['mail'];?>
           </td>
         </tr>
    
	   <?php
    }?>
       </tbody>
      </table>
      <?php 
  }
	else 
	{
    	echo "Error: " . $quer . "<br>" . mysqli_error($conn);
	}
}
?>
</div>

<div class="jumbotron1">
<?php
if(isset($_POST['select']))
{
  echo "<h2>Selected with Contraints </h2>";
$name=$_POST['name'];
$quer="SELECT * FROM `details` WHERE name='$name'";
  $result=mysqli_query($conn, $quer);
  if($result->num_rows > 0)
  {?>
    <table class="table table-bordered">
       <thead class="table-dark" >
         <tr class="text-center">
           <td>
             Name
           </td>
           <td>
             Phone
           </td>
           <td>
             Mail
           </td>
         </tr>
       </thead> <?php
    while($row=mysqli_fetch_assoc($result))
    {
    ?>
       <tbody>
         <tr>
           <td>
             <?php echo $row['name'];?>
           </td>
           <td>
             <?php echo $row['phone'];?>
           </td>
           <td>
             <?php echo $row['mail'];?>
           </td>
         </tr>
    
     <?php
    }?>
       </tbody>
      </table>
      <?php 

  }
  else 
  {
      echo "Error: " . $quer . "<br>" . mysqli_error($conn);
  }

}
?>
</div>
</body>
</html>