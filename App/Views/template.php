<!DOCTYPE html>
<html>
<head>
  <title>Ulum Kitchen</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="<?php echo BASE; ?>/assets/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo BASE; ?>/assets/style.css">
  <script src="//cdn.ckeditor.com/4.14.0/basic/ckeditor.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

  <!-- ini section berita -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">

      <a class="navbar-brand" href="<?php echo BASE . "/index" ?>">UlumKitchen</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <form class="form-inline my-2 my-lg-0">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
              </div>
              <form method="get">
                <input type="text" name="search" class="form-control" placeholder="User" aria-label="Username" aria-describedby="basic-addon1">
              </form>
            </div>
          </form>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE.'/index' ?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE.'/recipe/checkout' ?>">List Recepient</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">My Favourit</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <ul class="navbar-nav mr-auto">
            <?php if(!empty($_SESSION['username'])){ ?>
              <a href="<?php echo BASE . '/recipe/add_recipe'?>" class="btn btn-primary my-2 mr-2 my-sm-0">Add Receipe</a> 
              <li class="nav-item">
                <a class="nav-link" href="<?php echo BASE . '/index/action_logout'?>"><?php echo $_SESSION['username']?></a>
              </li>
            <?php } else{ ?>  
              <a href="<?php echo BASE . '/index/login'?>" class="btn btn-primary my-2 my-sm-0" type="submit">login</a> 
            <?php } ?>
          </ul>
        </form>
      </div>

    </div>
  </nav>

  <?php $this->loadViewInTemplate($viewName, $viewData); ?>


</body>
</html>




