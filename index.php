<!doctype html>
  <html lang="en">
    <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <link rel="stylesheet" href="estilos.css">
      <link href="https://fonts.googleapis.com/css?family=Spicy+Rice" rel="stylesheet">
      <title>FES Acatlàn | Sitio Reto</title>
      <link rel="shortcut icon" type="image/png" href="img/escudo-unam.ico">
    </head>
    <body>

      <!--HEADER-->
        <header>
          <div class="container" style="background-color: #1B3D70;">
            <div class="row">
              <div class="col-sm-12 col-md-6 d-flex justify-content-sm-center justify-content-md-start my-2">
                <img src="img/Logo-UNAM.png"  alt="">
              </div>
              <div class="col-sm-12 col-md-6 d-flex justify-content-sm-center justify-content-md-end my-3">
                <img src="img/logo_fesa.png" style=" height: 60px;" alt="">
              </div>
            </div>
          </div>
        </header>
      <!--/HEADER-->

      <!--NAVBAR-->
      <nav class="container navbar navbar-expand-lg navbar-light bg-gold" style="color: white;">
        <div class="container">
           <p class="my-2 mr-4"> <strong> Tràmites y servicios </strong></p>
          <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">

            <li class="nav-item dropdown my-2 mr-3">
              <a class="nav-link-white dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Alumnos
              </a>
              <div class="dropdown-menu mostrar mt-2" aria-labelledby="navbarDropdown">
                <a class="dropdown-item item-show" href="#">Item #1</a>
                <a class="dropdown-item item-show" href="#">Item #2</a>
                <a class="dropdown-item item-show" href="#">Item #3</a>
              </div>
            </li>

            <li class="nav-item dropdown my-2 mr-3">
              <a class="nav-link-white dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Academicos
              </a>
              <div class="dropdown-menu mostrar mt-2" aria-labelledby="navbarDropdown">
                <a class="dropdown-item item-show" href="#">Item #1</a>
                <a class="dropdown-item item-show" href="#">Item #2</a>
                <a class="dropdown-item item-show" href="#">Item #3</a>
              </div>
            </li>

            <li class="nav-item dropdown my-2">
              <a class="nav-link-white dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Administrativos
              </a>
              <div class="dropdown-menu mostrar mt-2" aria-labelledby="navbarDropdown">
                <a class="dropdown-item item-show" href="#">Item #1</a>
                <a class="dropdown-item item-show" href="#">Item #2</a>
                <a class="dropdown-item item-show" href="#">Item #3</a>
              </div>
            </li>
          </ul>
        </div>
    </div>
  </nav>
<!--NAVBAR-->

<div class="container text-center" style="background-color: #1B3D70; color: white; font-size:18px ">
  LIBRERIA
</div>

<!--SISTEMA-->
<?php require_once 'process.php'; ?>

<?php
if(isset($_SESSION['message'])): ?>

<div class="alert alert-<?=$_SESSION['msg_type']?>">
  <?php
  echo $_SESSION['message'];
  unset($_SESSION['message']);
  ?>
</div>
<?php endif ?>
<div class="container">

  <?php
  $mysqli = new mysqli('localhost', 'root', '', 'crud') or die (mysqli_error($mysqli));
  $result = $mysqli->query("SELECT * FROM data") or die($mysqli-> error);
  // pre_r($result);
  //pre_r($result->fetch_assoc());
  ?>
  <div class="row justify-content-center">
    <table class="table">
      <thead>
        <tr>
          <th>
            Titulo
          </th>
          <th>
            Descripciòn
          </th>
          <th colspan="2">
            Acciòn
          </th>
        </tr>
      </thead>
      <?php
      while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['location'];?></td>
        <td>
          <a href="index.php?edit=<?php echo $row['id']; ?>"
            class="btn btn-info my-1">Editar</a>
            <a href="process.php?delete=<?php echo $row['id']; ?>"
              class="btn btn-danger my-1">Eliminar</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </table>
    </div>
    <?php
    function pre_r($array) {
      echo '<pre>';
        print_r($array);
        echo '<pre>';
        }
        ?>
        <div class="justify-content-center">
          <form action="process.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
              <label>Titulo</label>
              <input type="text" name="name" class="form-control"
              value="<?php echo $name; ?>" placeholder="Ingresa titulo del libro">
            </div>

            <div class="form-group">
              <label>Descripciòn</label>
              <input type="text" name="location" class="form-control"
              value="<?php echo $location; ?>" placeholder="Añade una breve descripciòn (no mayor de 100 caracteres)">
            </div>

            <div class="form-group">
              <?php
              if($update == true):
              ?>
              <button type="submit" class="btn btn-info" name="update">Actualizar</button>
            <?php else: ?>
              <button type="submit" class="btn btn-primary" name="save">Guardar</button>
            <?php endif; ?>
          </div>
        </form>
      </div>
      <!--/SISTEMA-->
<!--FOOTER-->
<footer>
  <div class="container" style="background-color:  #1B3D70;">
    <div class="row">
      <div class="col mx-sm-5 mx-md-5 text-center" style="color:#fff; font-size: 90%">
    <p class=" mt-4 mb-0">Hecho en México, todos los derechos reservados 2018.</p>
    <p class="my-0">Esta página puede ser reproducida con fines no lucrativos, siempre y cuando no se mutile, se cite la fuente</p>
    <p class="my-0">completa y su dirección electrónica. De otra forma, requiere permiso previo por escrito de la institución.</p>
      </div>
    </div>
    <div class="row text-center d-flex justify-content-md-center" style="color:#fff; font-size: 80%">
      <div class=" col-sm-10 offset-sm-1 py-sm-2 py-md-1 offset-md-0 col-md-2 caja my-sm-2 my-md-4 mr-3 ">
        <a href="#" class="nav-link-white">
          Creditos
        </a>
      </div>
      <div class="col-sm-10 offset-sm-1 py-sm-2 py-md-1 offset-md-0 col-md-2 caja my-sm-2 my-md-4 mr-3 ">
        <a href="#" class="nav-link-white">
          Conoce el portal
        </a>
      </div>
      <div class="col-sm-10 offset-sm-1 py-sm-2 py-md-1 offset-md-0 col-md-2 caja my-sm-2 my-md-4 mr-3 ">
        <a href="#" class="nav-link-white">
          Mapa del sitio
        </a>
      </div>
      <div class="col-sm-10 offset-sm-1 py-sm-2 py-md-1 offset-md-0 col-md-2 caja my-sm-2 my-md-4">
        <a href="#" class="nav-link-white">
          Preguntas frecuentes
        </a>
      </div>
    </div>
    <div class="row">
        <div class="col text-center" style="color:#fff; font-size: 90%;">
          <p>Sitio web administrado por: Facultad de Estudios Superiores Acatlán. web2.0@apolo.acatlan.unam.mx</p>
        </div>
    </div>
  </div>
  </footer>
  <!--/FOOTER-->

      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
  </html>
