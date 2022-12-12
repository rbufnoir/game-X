<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Game-X</title>
        <link href="<?= URL ?>style/bootstrap.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="<?= URL ?>">Game-X</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link active" href="<?= URL ?>index">Home
                <span class="visually-hidden">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= URL ?>games">Games</a>
            </li>
          </ul>
          <form class="d-flex ui-widget" method="POST" action="<?= URL ?>redirect">
            <input class="form-control me-sm-2 basicAutoComplete" type="text" placeholder="Search" id="search-bar" name="search-bar" autocomplete="off">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
          </form>
            <div class="navbar-brand nav-item dropdown">
                <a class="nav-link dropdown-toggle p-2" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-user"></i></a>
                <div class="dropdown-menu dropdown-menu-left">
                    <a class="dropdown-item" href="<?= URL ?>login">Login</a>
                    <a class="dropdown-item" href="<?= URL ?>register">Register</a>
                </div>
            </div>
        </div>
      </div>
    </nav>

    <div class="container">
      <h1 class="my-4 text-center bg-secondary shadow p-2">
        <?= $title ?>
      </h1>

      <?= $content ?>

    </div>
    <script src="https://kit.fontawesome.com/0c571eb344.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= URL ?>script/script.js"></script>
  </body>
</html>