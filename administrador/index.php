<?php 
include("options.php");
include("conexion.php");

$sql="SELECT * FROM convocatoria";
$resultado=$conn->query($sql);

$id=(isset($_GET['id']))?$_GET['id']:'';
$idEvaluacion=(isset($_GET['idEvaluacion']))?$_GET['idEvaluacion']:'';

$numConvocatoria='';
$cargo='';
$estado='';
$bases='';
if($id!=''){
  $sql="SELECT * FROM convocatoria WHERE id=$id";
  $result=$conn->query($sql);
  $fila=$result->fetch_row();
  $id=$fila[0];
  $numConvocatoria=$fila[1];
  $cargo=$fila[2];
  $estado=$fila[3];
  $bases=$fila[4];
}
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <?php 
  print($id);
  $sql="DELETE FROM convocatorias WHERE id=3";
  $eliminar=$conn->query($sql);
  if ($eliminar) {
    echo "Se borro el dato correctamente";
  }else{
    echo "no se borro el dato";
  }
  print($sql);
  print("<br>");
  print($resultado->num_rows);
  print("<br>");
  ?>

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">SISConvocatorias</h1>
    <!-- Button trigger modal -->
    <a href="" id="pressEvaluacion"  data-bs-toggle="modal" data-bs-target="#ModalEvalucionCurricular"></a> 
    <a href="" id="press"  data-bs-toggle="modal" data-bs-target="#Modal2"></a> 
    <a href="./" class="btn btn-danger">Actualizar Datos</a> 
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal1">
      Agregar Datos
    </button>
  </div>

  <h2>Panel de Control</h2>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead >
        <tr>
          <th >#</th>
          <th >N° de Convocatoria</th>
          <th >Cargo</th>
          <th >Estado</th>
          <th >Bases</th>
          <th>Evaluacion Curricular</th>
          <th>Editar</th>
          <th >Elimnar</th>
        </tr>
      </thead>
      <tbody>
        <?php while($fila=$resultado->fetch_row()) {?>
          <tr >
            <td><?php echo $fila[0]?></td>
            <td><?php echo $fila[1]?></td>
            <td><?php echo $fila[2]?></td>
            <td><?php echo $fila[3]?></td>
            <td><?php echo($fila[4]!='')?'<a href="'.$fila[4].'" target="_blank" class="p-3 py-6"><i class="bi bi-file-earmark-pdf-fill icono"></i></a>':'';?></td>
            <td><div class="box"><div>
              <?php


              $sql1="SELECT * FROM evaluacion_curricular WHERE id_convocatoria=$fila[0]";


              $queryEvaluacion=$conn->query($sql1);

              while($filaEvaluacion=$queryEvaluacion->fetch_row()){
                echo($filaEvaluacion[1]!='')?'<a href="'.$filaEvaluacion[1].'" target="_blank" class="p-3 py-6"><i class="bi bi-file-earmark-pdf-fill icono"></i></a>':'';
              }


              ?>                  
            </div>
            <div>
              <a href="index.php?idEvaluacion=<?php echo $fila[0]?>" ><i class="bi bi-file-earmark-plus icono2 box"></i></a>
            </div>
          </div></td>
          <td><a href="index.php?id=<?php echo $fila[0]?>" class="p-3 py-6" ><i class="bi bi-pencil-square icono1"></i></a></td>
          <td><a href="convocatoriaEvalua.php?op=eliminar&id=<?php echo $fila[0]?>" class="p-3 py-6"><i class="bi bi-trash3  icono " ></a></i></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>

</div>

</main>
<!-- modal guardar -->
<div class="modal fade" id="Modal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregue una Convocatoria:</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="convocatoriaEvalua.php" method="GET" id="enviar" >
         <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">N° de Convocatoria:</label>
          <input type="text" class="form-control" name="numConvocatoria"  placeholder="N° de Convocatoria">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Cargo:</label>
          <textarea class="form-control" name="cargo"  placeholder="Cargo"></textarea>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Estado:</label>
          <input type="text" class="form-control" name="estado" placeholder="Estado">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Bases:</label>
          <textarea class="form-control" name="base"  placeholder="Link"></textarea>
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      <button type="submit" class="btn btn-primary" form="enviar">Guardar</button>
    </div>
  </div>
</div>
</div>
<!-- modal editar -->
<div class="modal fade" id="Modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edite una Convocatoria:</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="convocatoriaEvalua.php" method="GET" id="enviarEditar" >
          <input type="text" name="id" value="<?php echo $id; ?>" hidden>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">N° de Convocatoria:</label>
            <input type="text" class="form-control" name="numConvocatoria" value="<?php echo $numConvocatoria; ?>" placeholder="N° de Convocatoria">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Cargo:</label>
            <textarea class="form-control" name="cargo"  placeholder="Cargo"><?php echo $cargo;?></textarea>

          </div>

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Estado:</label>
            <input type="text" class="form-control" name="estado" value="<?php echo $estado; ?>" placeholder="Estado">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Bases:</label>
            <textarea class="form-control" name="base"  placeholder="Link"><?php echo $bases;?></textarea>

          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" form="enviarEditar">Editar</button>
      </div>
    </div>
  </div>
</div>

<!-- Evaluacion curricular agregar -->
<div class="modal fade" id="ModalEvalucionCurricular" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Evaluacion Curricular</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="evaluacion_evalua.php" method="GET" id="enviarEvaluacion" >
          <input type="text" name="id" value="<?php echo $idEvaluacion; ?>" >
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Evaluacion Curricular</label>
            <textarea class="form-control" name="evaluacion"  placeholder="Ingrese el link"></textarea>

          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" form="enviarEvaluacion">Guardar</button>
      </div>
    </div>
  </div>
</div>

<style type="text/css">


 .icono{
  font-size: 25px;
  color: red;
}
.icono2{
  font-size: 25px;

}
.icono1{
  font-size: 25px;
  color: #ffc107;
}
.box {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
}
/*  thead{
    background-color: red;
  }*/

</style>
<?php 
if($id!=''){
  echo '<script type="text/javascript">
  document.getElementById("press").click();
  </script>';
}
if($idEvaluacion!=''){
  echo '<script type="text/javascript">
  document.getElementById("pressEvaluacion").click();
  </script>';
}
?>