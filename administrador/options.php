<?php 
  include("sesion_activa.php");
?>
<!doctype html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SISConvocatorias</title>
    <link rel="stylesheet" type="text/css" href="../estilos/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="../estilos/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="../estilos/estilos.css">
  <link rel="stylesheet" href="../estilos/jquery.dataTables.min.css">
  </head>
  <body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
      <div class="navbar-brand tituloGeneral">
        <div class="title">
          DREP
        </div>
        <span class="linea">  </span>
        <div class="subtitle">
          Dirección Regional de <br>   educación Puno
        </div>
      </div>
      <img class="logo1" src="../logos/logochacana.png" alt="">
      <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </header>
    <div class="container-fluid">
      <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse barraLateral">
          <div class="position-sticky pt-5 sidebar-sticky ">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="./">
                  <i class="bi bi-house-door"></i>
                  Inicio
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../" target="_blank">
                  <i class="bi bi-box-arrow-up-right"></i>
                  Ver Sistema
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="sesion_cerrada.php">
                  <i class="bi bi-box-arrow-down-left"></i>
                  Desconectarse
                </a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
    <script src="../estilos/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="../estilos/dashboard.js"></script>
  </body>
  </html>
