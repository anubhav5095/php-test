
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Delete</title>
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
  #table_all{
    
  }
  </style>
}
</head>

<body>
<div class="container" style="">
  <br>
    <h3 class="text-center" style="background-color: #f0f0f0;">DELETE DATA</h3><br>
  <div class="jumbotron1">

    <form method="post" action="delete.php">

    <div class="form-group row">
      <label for="inputPassword3" class="col-sm-2 col-form-label">Mail :</label>
    <div class="col-sm-6">
      <input type="name" name="mail" class="form-control" id="inputname" placeholder="" required>
    </div>
      <button type="submit" name="delete" class="btn btn-danger" style="float: right;">Delete</button>
    </div>
    <br>
    </form>

  </div>
</div>

<div id="tabel_all" class="jumbotron1">
<?php 
include 'connect.php';

if(isset($_POST['delete']))
{

  $Mail=$_POST['mail'];
  $quer="DELETE FROM `details` WHERE mail='$Mail'";
  $result=mysqli_query($conn, $quer);
  if($result)
  {
    ?><div class="alert alert-warning">
        <strong>Success!</strong> New Record added successfully.
     </div>;
  }
  <?php
  else 
  {
      echo "Error: " . $quer . "<br>" . mysqli_error($conn);
  }
}
?>
</div>
</body>
</html>