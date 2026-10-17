<?php
session_start();
if (isset($_SESSION['user_id'])&&
  isset($_SESSION['user_email'])){
    include "db_con.php";
    
    include "func-category.php";
    $categories = get_all_categories($conn);

    include "func-author.php";
    $authors = get_all_author($conn);

     if (isset($_GET['title']))
     {
      $title = $_GET['title'];
     }else $title = '';

     if (isset($_GET['desc']))
     {
      $desc = $_GET['desc'];
     }else $desc = '';

     if (isset($_GET['category_id']))
     {
      $category_id = $_GET['category_id'];
     }else $category_id = 0;

     if (isset($_GET['author_id']))
     {
      $author_id = $_GET['author_id'];
     }else $author_id = 0;

  ?>
    
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Novels</title>
    <!-- bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- bootstrap 5 -->
    <link href= https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js>
    <style>

  .main_navbar{
    
    background-image: linear-gradient(to right,#62c3de,#27353e);
    height:55px;

  }
  ul{
   
   display:inline-block;
   color: white;    
   font-size: 17px;
   margin-top:9px;
 }
 a{
  
   text-decoration: none;
   /* color: black; */
   color: white;
 }
  .h4{
    margin-right:11px;
    
  }

</style>
</head>
<body>
<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <div class="container-fluid">
		    <a class="navbar-brand" href="admin.php">Admin</a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" 
		         id="navbarSupportedContent">
		      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		        <li class="nav-item">
		          <a class="nav-link" 
		             aria-current="page" 
		             href="first.php">Store</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link active" 
		             href="add-novels.php">Add novels</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" 
		             href="add-category.php">Add Category</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link " 
		             href="add-author.php">Add Author</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" 
		             href="logout.php">Logout</a>
		        </li>
		      </ul>
		    </div>
		  </div>
		</nav>


    
      </ul> 
      <div class="d-flex justify-content-center align-items-upper" 
    style="min-height:50vh;">
      <form action="add-novels1.php" 
      method="post" 
      enctype="multipart/form-data"
      
      
      class="shadow p-4 rounded mt-3" 
      style="width:70%; max-width:150rem;">
      <h1 class="text-center pb-9 display-4 fs-3">
        Add Novels

    </h1>

    <?php if (isset($_GET['error'])) { ?>
    <div class="alert alert-danger" role="alert">
    <?=htmlspecialchars($_GET['error']); ?>
</div>
<?php } ?>
<?php if (isset($_GET['success'])) { ?>
    <div class="alert alert-success" role="alert">
    <?=htmlspecialchars($_GET['success']); ?>
</div>
<?php } ?>
    <div class="mb-3">
    <label  class="form-label">Novels Title</label>
    <input type="text" class="form-control" 
    value="<?=$title?>" name="novels_title" >
</div>
    <div class="mb-3">
    <label  class="form-label">Novels Description</label>
    <input type="text" class="form-control" 
    value="<?=$desc?>"
     name="novels_description" >
    </div>
    <div class="mb-3">
    <label  class="form-label">Novels Author</label>
    <select  name="novels_author" class="form-control" >
      <option value="0">
        Select Author
      </option>
      <?php
      if ($authors == 0){

      }else{
      foreach ($authors as $author){ 

      if ($author_id == $author['id']){

      
      ?>
      <option 
      selected
      value="<?=$author['id']?>">
     <?=$author['name']?>
      </option>
                
             <?php }else {?>
              <option 
            value="<?=$author['id']?>">
     <?=$author['name']?>
      </option>

             <?php }} } ?>
    </select>
    </div>

    <div class="mb-3">
    <label  class="form-label">Novels Category</label>
      <select  name="novels_category" class="form-control" >
      <option value="0">
        Select category
      </option>
      <?php
      if ($categories == 0){

      }else{
        foreach ($categories as $category){ 

          if ($category_id == $category['id']){
    
          
          ?>
          <option 
          selected
          value="<?=$category['id']?>">
         <?=$category['name']?>
          </option>
                    
                 <?php }else {?>
                  <option 
                value="<?=$category['id']?>">
         <?=$category['name']?>
          </option>
    
                 <?php }} } ?>
    </select>
    </div>

    <div class="mb-3">
    <label  class="form-label">Novels Cover</label>
    <input type="file" class="form-control"  name="novels_cover" >
   </div>
    <div class="mb-3">
    <label  class="form-label">File</label>
    <input type="file" class="form-control"  name="file" >
    </div>

   
<button type="submit" class="btn btn-primary">Add Novels</button>









</form>
</div>

      


  </div>
</body>
</html>

<?php }else{
    header("Location: login.php");
    exit;

} ?>