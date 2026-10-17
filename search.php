<?php
session_start();
if (!isset($_GET['key']) || empty($_GET['key'])){
  header("Location: first.php");
   exit;
}


$key = $_GET['key'];
include "db_con.php";

include "func-novel.php";
$novels = search_novels($conn, $key);

include "func-author.php";
$authors = get_all_author($conn);

include "func-category.php";
$categories = get_all_categories($conn);





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novels Site</title>
    <!-- bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- bootstrap 5 -->
    <link href= https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js>
    <link rel="stylesheet" href="style.css">
    <style>
  

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
 .pdf-list {
 width: 80%;
}
.card {
 width: 21rem;
 margin-top:15px;
margin-right:9px;
}
.category .list-group {
 width: 200px;
 margin-top:15px;
 margin-left:60px;
}
.nd {
 text-decoration: none;
}
</style>
</head>
<body>
<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <div class="container-fluid">
		    <a class="navbar-brand" href="first.php">
        <img src="aboutimg.jpg"  width="60px" height="50px"> </a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" 
		         id="navbarSupportedContent">
		      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		        <li class="nav-item">
		          <a class="nav-link active" 
		             aria-current="page" 
		             href="first.php">Store</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" 
		             href="contactus.php">Contact Us</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" 
		             href="aboutus.php">About Us</a>
		        </li>
		        <li class="nav-item">
		          <?php if (isset($_SESSION['user_id'])) {?>
		          	<a class="nav-link" 
		             href="login.php">Admin</a>
		          <?php }else{ ?>
		          <a class="nav-link" 
		             href="login.php">Login</a>
		          <?php } ?>

		        </li>
		      </ul>
		    </div>
		  </div>
		</nav>

     
        <br>
        <div class="" style="

width:50%; max-width: 100rem" role="alert">
        Search result for <b><?=$key?></b> 
        </div>
        <div class= "d-flex pt-3">

        <?php if ($novels == 0){ ?>
          <div class="alert alert-warning p-4 text-center p-3 pdf-list" style="

width:50%; max-width: 100rem" role="alert">
          <img src="empty-search.png" width="100">
          <br>
     The key <b>"<?=$key?>"</b> There is novel
</div>

        
        <?php }else{?>
          <div class="pdf-list d-flex flex-wrap">
            <?php foreach($novels as $novel) { ?>
            <div class="card m-9">
              <img src="uploads/cover/<?=$novel['cover']?>" 
              class="card-img-top">
              <div class="card-body">
                <h5 class="card-title"><?=$novel['title']?></h5>

                <p class="card-text">
                 <br> <i><b>By:
                    <?php foreach($authors as $author) { 
                      if ($author['id'] == $novel['author_id']){
                        echo $author['name'];
                        break;
                      }
                      
                      ?>
                   

                    <?php } ?>
                  <br> </b></i>

                  <?=$novel['description']?>
                  <br><i><b>Category:
                    <?php foreach($categories as $category) { 
                      if ($category['id'] == $novel['category_id']){
                        echo $category['name'];
                        break;
                      }
                      
                      ?>
                   

                    <?php } ?>
                  <br> </b></i>
                  
                
                </p>
                <a href="uploads/files/<?=$novel['file']?>"
                class="btn btn-success">Open
                </a>
                <a href="uploads/files/<?=$novel['file']?>"
                class="btn btn-success"
                download="<?=$novel['title']?>">Download
                </a>
              </div>

            </div>
            <?php } ?>

        </div>
        <?php } ?>
        </div>
  
</body>
</html>