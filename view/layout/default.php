<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/b4e22c4cf5.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="<?php echo Router::webroot('css/style.css');?>">
    <title><?php echo isset($title_for_layout)? $title_for_layout: ' Mon site '; ?></title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <ul class="navbar-nav col-9">
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo Router::url('post/index');?>">Actualités <span class="sr-only">(current)</span></a>
            </li>
            <?php $pageMenu =$this->request('Page','getMenu'); ?>
            <?php foreach ($pageMenu as $p): ?>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo Router::url("page/view/id:{$p->id}/slug:{$p->slug}"); ?>" title="<?php echo $p->name ?>"><?php echo $p->name ?></a>

              </li>
            <?php endforeach; ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo Router::url("manga/index"); ?>" title="mangas"><i class="fas fa-book" style="margin-right: 5px"></i>Mangathèque</a>

            </li>

          </ul>
          <form class="form-inline my-2 my-lg-0 col-3" action="<?php echo Router::url('manga/index'); ?>" method="GET">
            <input class="form-control mr-sm-2" type="search" placeholder="Rechercher" aria-label="Rechercher" name="search">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Rechercher</button>
          </form>
        </div>
      
    </nav>
    <div class="row">
      <div class="col-md-1" style="background-color: red">
      </div>
      <div class="col-sm-10">
        <?php echo $this->Session->flash();?>
        <?php echo $content_for_layout;?>
      </div>
      <div class="col-md-1" style="background-color: red">
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>