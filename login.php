<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- bootstrap 5 -->
    <link href= https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center" 
    style="min-height:100vh;">

<form class="p-5 rouned shadow"  
    style="max-width:30rem; width:100%" 
    method="POST" action="auth.php">

    <?php 
    //  echo password_hash("12345",PASSWORD_DEFAULT);
    ?>
    
    <h1 class="text-center display-4 pb-5" >LOGIN</h1>
    <?php if (isset($_GET['error'])) { ?>
    <div class="alert alert-danger" role="alert">
    <?=htmlspecialchars($_GET['error']); ?>
</div>
<?php } ?>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control"  name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
  <a href="first.php">Store</a>
  
</form>
</div>
      
</body>
</html>