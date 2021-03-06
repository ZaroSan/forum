<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://kit.fontawesome.com/b4e22c4cf5.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo Router::webroot('css/style.css');?>">
    <title><?php echo isset($title_for_layout)? $title_for_layout: ' Admin '; ?></title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <ul class="navbar-nav mr-auto">
            
            <li class="nav-item">
              <a class="nav-link" href="<?php echo Router::url('admin/post/index');?>">Articles</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo Router::url('admin/page/index');?>">Pages</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo Router::url('admin/manga/index');?>">Mangas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo Router::url('admin/anime/index');?>">Animés</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo Router::url('admin/support/index');?>">Supports</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo Router::url('admin/category/index');?>">Catégories</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo Router::url('admin/gender/index');?>">Genres</a>
            </li>
            
             <li class="nav-item active ">
              <a class="nav-link " href="<?php echo Router::url('/');?>">Voir le site</a>
            </li>
            
          </ul>
      </div>
      <div class="float-right">
         <a class="nav-link" href="<?php echo Router::url('user/logout');?>"><i class="fas fa-sign-out-alt" style="color:white"></i></a>
      </div>
    </nav>

    <div class="container">
      <?php echo $this->Session->flash();?>
      <?php echo $content_for_layout;?>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php echo Router::webroot('js/sortTable.js');?>"></script>
    <script type="text/javascript" src="<?php echo Router::webroot('js/searchTable.js');?>"></script>
    <script type="text/javascript" src="<?php echo Router::webroot('ajax/ajax.js');?>"></script>
  </body>
</html>