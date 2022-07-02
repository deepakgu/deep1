<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action ="<?php echo base_url().'index.php/auth/login' ?>" method="post" name=" login" id="login">


    <?php
    $msg=$this->session->flashdata('msg');
    echo $msg;
    if($msg !="")
    {
      echo $msg;
    }
    ?>
    <div class="alert alert_danger">
      <?php
      ?>
  </div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Name</label>
  <input type="name" class="form-control" name="name"></div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Email</label>
  <input type="name" class="form-control" name="email" ><br>

  <button type="submit" class="btn btn-primary">login</button>
</div> 
</form>
</body>
</html>