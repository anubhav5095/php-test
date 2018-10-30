<html>
<head>
  <title>Webpage</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script>
  function showUser(){
      function getUser() {
        if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
        } else {  // code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function() {
          if (this.readyState==4 && this.status==200) {
            document.getElementById("poll").innerHTML=this.responseText;
          }
        }
        xmlhttp.open("GET","getuser.php?q="+int,true);
        xmlhttp.send();
      }    
  }

</script>
</head>
<body>

<div class="container" style="">
          <br>
            <h3 class="text-center" style="background-color: #f0f0f0;">SELECT DATA</h3><br>
          <div class="jumbotron1">
          
          <form>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Name :</label>
            <div class="col-sm-6">
              <input type="name" name="name" class="form-control" id="inputname" placeholder="" required>
              <script>
                var name=document.getElementById('inputname').value;
              </script>
            </div>
              <button type="submit" name="select" onclick="showUser(<script> name.value;</script>)" class="btn btn-success" style="float: right;">Select</button>              
          </form>


            <div class="col-sm-6">
              <br>
              <form>
                  <button type="submit" name="selectall" class="btn btn-info" style="float: right;">Select All</button>
             </form>            
           </div>
        </div>
</div>

</body>
</html>