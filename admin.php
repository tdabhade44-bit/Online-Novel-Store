
<?php
session_start();
if (isset($_SESSION['user_id'])&&
  isset($_SESSION['user_email'])){
    include "db_con.php";

    include "func-novel.php";
    $novels = get_all_novels($conn);

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
    <title>ADMIN</title>
    <!-- bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- bootstrap 5 -->
    <link href= https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js>
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
  .h4{
    margin-top:8px;
    margin-right:11px;
    margin-left:15px;
    
  }

</style>
</head>
<body><div class="container">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <div class="container-fluid">
		    <a class="navbar-brand" href="admin.php">
        <img src="aboutimg.jpg"  width="60px" height="50px"> </a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" 
		         id="navbarSupportedContent">
		      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
		          <a class="nav-link " 
		             aria-current="page" 
		             href="admin.php">Admin</a>
		        </li>
            <a class="nav-link" 
		             aria-current="page" 
		             href="first.php">Store</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" 
		             href="add-novels.php">Add Novels</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" 
		             href="add-category.php">Add Category</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" 
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



  
<form action="search.php"
method="get"
style="
margin-left:11px;
width:100%; max-width: 30rem">

<div class="input-group my-5">
  <input type="text" class="form-control" 
  name="key" placeholder="Search Novels...." aria-label="Search Novels..."
   aria-describedby="basic-addon2">
  <button class="input-group-text btn btn-primary" id="basic-addon2">Search</button>
</div>
</form>




<div class ="mt-5"></div>

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
  
      <?php if ($novels == 0) { ?>
        <div class="alert alert-warning p-5 text-center" role="alert">
          <img src="empty.jpg" width="100">
          <br>
          There is no novels in database
</div>
      <?php }else {?>

        
      
      <h4> All Novels</h4> <br>
      <table class="table table-bordered shadow"  >
        <thead>
          <tr>
          <tr>
            <th> #</th>
            <th>Title</th>
            <th>Author</th>
            <th>Description</th>
            <th>Category</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 0; 
          foreach ($novels as $novel) { 
            $i++;
            ?>
            <tr>
          <td><?=$i?></td>
          <td>
          <img  width="100" src="uploads/cover/<?=$novel['cover']?>" >
          <a class="link-dark d-block
                    text-right" 
          href= "uploads/files/<?=$novel['file']?>" >
          <?=$novel['title']?>
          </a>
          </td>

          <td>
            <?php if ($authors == 0){
              echo "undefined";}else{
              foreach ($authors as $author){
                if ($author['id'] == $novel['author_id']){
                  echo $author['name'];
                }
              }
            }          
           ?>
          </td> 
             <td><?=$novel['description']?></td>
             <td>
             <?php if ($categories == 0){
              echo "undefined";}else{
              foreach ($categories as $category){
                if ($category['id'] == $novel['category_id']){
                  echo $category['name'];
                }
              }
            }
            ?>
            </td>
             <td>
              
                <a href="delete-novels.php?id=<?php echo $novel['id']; ?>";
                class="btn btn-danger">
                Delete</a>
             </td>
        </tr> 
         <?php } ?>

</tbody>
</table>
  <?php }?>

  <?php if ($categories == 0) { ?>
    <div class="alert alert-warning p-5 text-center" role="alert">
          <img src="empty.jpg" width="100">
          <br>
          There is no categories in database
  </div>
      
      <?php }else {?>
  <h4 class="mt-5">All Categories</h4>
  <br>
  <table class="table table-bordered shadow">
    <thead>
      <tr>
        <th>#</th>
        <th>Category Name</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody?>
      <?php
      $j = 0;
      foreach ($categories as $category){
        $j++;

      
      ?>
      <tr>
        <td><?=$j?></td>
        <td><?=$category['name']?></td>
        <td>
         

                <a href="delete-category.php?id=<?php echo $category['id']; ?>" 
                class="btn btn-danger">
                Delete</a></td>
      </tr>
      <?php } ?>
    </tbody>
      </table>
  <?php } ?>

  <?php if ($authors == 0) { ?>
    <div class="alert alert-warning p-5 text-center" role="alert">
          <img src="empty.jpg" width="100">
          <br>
          There is no authors in database
  </div>
      <?php }else {?>
  <h4 class="mt-5">All Authors</h4>
  <br>
  
  <table class="table table-bordered shadow">
    <thead>
      <tr>
        <th>#</th>
        <th>Author Name</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody?>
      <?php
      $k = 0;
      foreach ($authors as $author){
        $k++;
      ?>
      <tr>
        <td><?=$k?></td>
        <td><?=$author['name']?></td>
        <td>

                <a href="delete-author.php?id=<?php echo $author['id']; ?>" 
                class="btn btn-danger">
                Delete</a></td>
      </tr>
      <?php } ?>
    </tbody>
      </table>
  <?php } ?>

  </div>
</body>
</html>

<?php }else{
    header("Location: login.php");

    exit;

} ?>