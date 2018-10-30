<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Webpage</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <style>
    .jumbotron1{
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
#tab{
  margin: auto;
  position: ;
  top: 0; left: 0; bottom: 0; right: 0;
 width: 80%;
}


  </style>
</head>

<body>
<br>
<div class="container" style="">

<div class="row">
  <!--insert form-->
    <div class="col-sm-6">
      <div class="container">
        <h3 class="text-center" style="background-color: #f0f0f0;">INSERT DATA</h3><br>
        <div class="jumbotron1">
          
        <form method="post" action="webpage.php" style="width: 100%;">
       <div class="form-group row">
          <label for="inputPassword3" class="col-sm-3 col-form-label">Name :</label>
          <div class="col-sm-5">
            <input type="name" name="name" class="form-control" id="inputname" placeholder="" required>
          </div>
        </div>

       <div class="form-group row">
          <label for="inputPassword3" class="col-sm-3 col-form-label">Phone :</label>
          <div class="col-sm-5">
            <input type="text" name="phone" class="form-control" id="inputphone" placeholder="" maxlength="10" required>
          </div>
        </div>

        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-3 col-form-label">Email :</label>
          <div class="col-sm-5">
            <input type="email" name="mail" class="form-control" id="inputmail" placeholder="" required>
          </div>
        </div>

      <br>
        <div class="form-group row">
          <div class="col-sm-5">
            <button type="submit" name="submit" onclick="insert" class="btn btn-success" style="float: right;">Insert</button>
          </div>
        </div>
      </form>
      </div>
      <div class="tab">
          <?php
                          //insert backend
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
                }   //end of function


                //function for removing white space and special chars
                function test_input($data) {
                  $data = trim($data);
                  $data = stripslashes($data);
                  $data = htmlspecialchars($data);
                  return $data;
                }
              ?>

          </div>
      </div>
    </div>
<!--delete form-->
    <div class="col-sm-6">
      <div class="container" style="">
    
        <h3 class="text-center" style="background-color: #f0f0f0;">DELETE DATA</h3><br>
        
        <div class="jumbotron1">
            <form method="post" action="webpage.php">
            <div class="form-group row">
              <label for="inputPassword3" class="col-sm-3 col-form-label">Mail :</label>
            <div class="col-sm-5">
              <input type="name" name="mail" class="form-control" id="inputname" placeholder="" required>
            </div><br>
            <div class="form-group row">
                <div class="col-sm-5">
                    <button type="submit" name="delete" class="btn btn-danger" style="">Delete</button>
                </div>
            </div>
            </form>
        </div>
        <div id="tab">
            <?php 
            //delete backend
            if(isset($_POST['delete']))
            {

              $Mail=$_POST['mail'];
              $quer="DELETE FROM `details` WHERE mail='$Mail'";
              $result=mysqli_query($conn, $quer);
              if($result)
              {
                ?><div class="alert alert-danger alert-dismissible">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Success!</strong>Record Deleted successfully.
                </div>
              <?php
              }
              
              else 
              {
                  echo "Error: " . $quer . "<br>" . mysqli_error($conn);
              }
            }
            ?>
        </div>

      </div>
    </div>

</div>

</div>
<hr>

  <div class="container">
    <div class="row">
    <div class="col-sm-12">
        <div class="container" style="">
          <br>
            <h3 class="text-center" style="background-color: #f0f0f0;">SELECT DATA</h3><br>
          <div class="jumbotron1">
          
          <form method="post" action="webpage.php" style="">
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Name :</label>
            <div class="col-sm-6">
              <input type="name" name="name" class="form-control" id="inputname" placeholder="" required>
            </div>
              <button type="submit" name="select" class="btn btn-success" style="float: right;">Select</button>              
          </form>


            <div class="col-sm-6">
              <br>
              <form action="webpage.php" method="post">
                  <button type="submit" name="selectall" class="btn btn-info" style="float: right;">Select All</button>
             </form>            
           </div>
        </div>
      <br>
              <?php
              if (isset($_POST['selectall'])) 
              {
                
                $quer="SELECT * FROM `details` WHERE 1";
                $result=mysqli_query($conn, $quer);
                if($result->num_rows > 0)
                {?>

                  <table id="tab" class="table table-bordered">
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
             
              <?php
                    if(isset($_POST['select']))
                    {
                      
                    $name=$_POST['name'];
                    $quer="SELECT * FROM `details` WHERE name='$name'";
                      $result=mysqli_query($conn, $quer);
                      if($result->num_rows > 0)
                      {?>
                        <table class="table table-bordered" id="tab">
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
 <!--select form-->
  </div>


  </div>
  </div>
  <footer class="dark">
    
  </footer>
</body>
</html>
    

  


