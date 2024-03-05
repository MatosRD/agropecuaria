<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="shortcut icon" href="img/logo-mywebsite-urian-viera.svg"/>
  <title>Cómo Importar Excel a MYSQL con PHP sin Libreria de forma Fácil :: WebDeveloper Urian Viera</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/cargando.css">
  <link rel="stylesheet" type="text/css" href="css/cssGenerales.css">
</head>
<body>

<div class="row">
    <div class="col-md-7">
       
      <form action="irecibir1.php" method="POST" enctype="multipart/form-data"/>
        <div class="file-input text-center">
            <input  type="file" name="dataCliente" id="file-input" class="file-input__input"/>
            <label class="file-input__label" for="file-input">
              <i class="zmdi zmdi-upload zmdi-hc-2x"></i>
              <span>Elegir Archivo Excel</span></label
            >
          </div>
      <div class="text-center mt-5">
          <input type="submit" name="subir" class="btn-enviar" value="Subir Excel"/>
      </div>
      </form>
    </div>

    <div class="col-md-5">
  <?php

  include 'conexion_2.php';
  $sqlClientes = "SELECT * FROM one ORDER BY id ASC";
  $queryData   = mysqli_query($conexion, $sqlClientes);
  ?>
     <table class="table table-bordered table-striped">
          <thead>
            <tr>
              
               <th>Nombre</th>
              <th>precio</th>
              
            </tr>
          </thead>
          <tbody>
            <?php 
            $i = 1;
            while ($data = mysqli_fetch_array($queryData)) { ?>
            <tr>
              
              <td><?php echo $data['nombre']; ?></td>
              <td><?php echo $data['precio']; ?></td>
              
            </tr>
          <?php } ?>
          </tbody>
        </table>

    </div>
  </div>

</div>


<script src="js/jquery.min.js"></script>
<script src="'js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $(window).load(function() {
            $(".cargando").fadeOut(1000);
        });      
});
</script>

</body>
</html>