<!DOCTYPE html>
<html>
<head>
<style>

#tab{
  margin: auto;
  position: ;
  top: 0; left: 0; bottom: 0; right: 0;
 width: 80%;
}

</head>
<body>

<?php
$q = intval($_GET['q']);
echo "string";
$con = mysqli_connect('localhost','root','','details');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
echo "hey";

    $quer="SELECT * FROM `details` WHERE name='$q'";
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

    mysqli_close($con);
?>
</body>
</html>