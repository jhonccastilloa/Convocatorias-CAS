<?php
include("options.php");
include("procesos.php");
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">SISConvocatorias</h1>
    <!-- Modales -->
    <a href="" id="pressResultadoEditar"  data-bs-toggle="modal" data-bs-target="#ModalResultadoEditar"></a> 
    <a href="" id="pressResultado"  data-bs-toggle="modal" data-bs-target="#ModalResultado"></a> 
    <a href="" id="pressEntrevistaEditar"  data-bs-toggle="modal" data-bs-target="#ModalEntrevistaEditar"></a> 
    <a href="" id="pressEntrevista"  data-bs-toggle="modal" data-bs-target="#ModalEntrevista"></a> 
    <a href="" id="pressConocimientosEditar"  data-bs-toggle="modal" data-bs-target="#ModalConocimientosEditar"></a> 
    <a href="" id="pressConocimientos"  data-bs-toggle="modal" data-bs-target="#ModalConocimientos"></a> 
    <a href="" id="pressEvaluacionEditar"  data-bs-toggle="modal" data-bs-target="#ModalEvalucionCurricularEditar"></a> 
    <a href="" id="pressEvaluacion"  data-bs-toggle="modal" data-bs-target="#ModalEvalucionCurricular"></a> 
    <a href="" id="press"  data-bs-toggle="modal" data-bs-target="#Modal2"></a> 
    <div>
      <button type="button" class="btn btn-primary buttonConvocatoria" data-bs-toggle="modal" data-bs-target="#Modal1">
        Iniciar Convocatoria
        <i class="bi bi-megaphone"></i>
      </button>
    </div>
  </div>
  <h2>Panel de Control:</h2>
  <br>
  <div class="table-responsive">
    <table class="display cell-border  compact small tablaAdministrador"  id="convocatoriasTable">
      <thead class="align-middle cabecera">
        <tr class=" ">
          <th >N° de Convocatoria</th>
          <th >Cargo</th>
          <th >Estado</th>
          <th >Vigencia</th>
          <th >Bases</th>
          <th>Evaluacion Curricular</th>
          <th>Conocimientos y Aptitudes</th>
          <th>Entrevista Personal</th>
          <th>Resultado Final</th>
          <th>Editar</th>
          <th >Elimnar</th>
        </tr>
      </thead>
      <tbody class="align-middle ">
        <?php while($fila=$resultado->fetch_row()) {?>
          <tr >
            <td><?php echo $fila[1]?></td>
            <td><?php echo $fila[2]?></td>
            <td><?php estado($fila[0],$fila[5],$fila[6])?>  </td>
            <td class="text-center sizeDate"><?php echo $fila[7]." al <br>".$fila[3]?></td>
            <td class="text-center"><?php echo($fila[5]!='')?'<a href="'.$fila[5].'" target="_blank" class=" py-6"><i class="bi bi-file-earmark-pdf-fill icono"></i></a>':'';?></td>
            <td>
              <div class="box">
                <div class="pdfRow">
                  <?php mostrarEtapas($fila[0],"evaluacion_curricular","id_convocatoria","idEvaluacionEditar","evaluacion_evalua.php"); ?>
                </div>
                <?php agregarPdfLimite($fila[0],"evaluacion_curricular","id_convocatoria","idEvaluacion"); ?>
              </div>
            </td>
            <td>
              <div class="box">
                <div class="pdfRow">
                  <?php mostrarEtapas($fila[0],"conocimientos_aptitudes","id_conocimientos","idConocimientosEditar","conocimientos_evalua.php"); ?>
                </div>
                <?php agregarPdfLimite($fila[0],"conocimientos_aptitudes","id_conocimientos","idConocimientos"); ?>
              </div>
            </td>
            <td><div class="box">
              <div class="pdfRow">
                <?php mostrarEtapas($fila[0],"entrevista_personal","id_entrevista","idEntrevistaEditar","entrevista_evalua.php"); ?>
              </div>
              <?php agregarPdfLimite($fila[0],"entrevista_personal","id_entrevista","idEntrevista"); ?>
            </div>
          </td>
          <td>
            <div class="box">
              <div class="pdfRow">
                <?php mostrarEtapas($fila[0],"resultado_final","id_resultado","idResultadoEditar","resultado_evalua.php"); ?>
              </div>
              <?php agregarPdfLimite($fila[0],"resultado_final","id_resultado","idResultado"); ?>
            </div>
          </td>
          <td><a href="index.php?id=<?php echo $fila[0]?>" class="p-3 py-6" ><i class="bi bi-pencil-square icono1" title="Editar"></i></a></td>
          <td><a href="convocatoriaEvalua.php?op=eliminar&id=<?php echo $fila[0]?>" class="p-3 py-6 confirmarEliminar" title="Eliminar"><i class="bi bi-trash3  icono "  ></a></i></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
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
          <label for="exampleFormControlInput1" class="form-label">Fecha de Finalizacion:</label>
          <input type="date" class="form-control" name="fechaFin">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Cargo:</label>
          <textarea class="form-control" name="cargo"  placeholder="Cargo"></textarea>
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
          <div class="mb-3 row">
            <div class="col">
              <label class="col-sm-12" >Fecha de Inicio: </label>
              <div class="col-sm-12">
                <input type="date" class="form-control"  name="fechaInicio" value="<?php echo $fechaInicio; ?>">
              </div>
            </div>
            <div class="col">
              <label class="col-sm-12" >Fecha de Finalización: </label>
              <div class="col-sm-12">
                <input type="date" class="form-control"  name="fechaFin" value="<?php echo $fechaFin; ?>" >
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Cargo:</label>
            <textarea class="form-control" name="cargo"  placeholder="Cargo"><?php echo $cargo;?></textarea>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Bases:</label>
            <textarea class="form-control" name="base"  placeholder="Link"><?php echo $bases;?></textarea>
          </div>
          <div class="form-check">
            <label class="form-check-label" for="flexCheckChecked">
              CANCELAR
            </label>
            <input class="form-check-input" type="checkbox" value="1" name="cancelado" <?php echo $cancelado;?>  >
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary confirmarEditar" form="enviarEditar" >Editar</button>
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
          <input type="text" name="idEvaluacion" value="<?php echo $idEvaluacion; ?>" hidden>
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
<!-- Evaluacion curricular editar -->
<div class="modal fade" id="ModalEvalucionCurricularEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Evaluacion Curricular</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="evaluacion_evalua.php" method="GET" id="editarEvaluacion" >
          <input type="text" name="id" value="<?php echo $idEvaluacionEditar; ?>" hidden>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Evaluacion Curricular</label>
            <textarea class="form-control" name="evaluacion"  placeholder="Ingrese el link"><?php echo $nom_evaluacion;?></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary confirmarEditar" form="editarEvaluacion">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- Conocimientos y aptitudes  agregar -->
<div class="modal fade" id="ModalConocimientos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Conocimientos y aptititudes</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="conocimientos_evalua.php" method="GET" id="enviarConocimientos" >
          <input type="text" name="idConocimientos" value="<?php echo $idConocimientos; ?>" hidden>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Conocimientos y aptititudes</label>
            <textarea class="form-control" name="conocimientos"  placeholder="Ingrese el link"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" form="enviarConocimientos">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- Conocimientos y aptitudes  editar -->
<div class="modal fade" id="ModalConocimientosEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Conocimientos y aptititudes</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="conocimientos_evalua.php" method="GET" id="enviarConocimientosEditar" >
          <input type="text" name="id" value="<?php echo $idConocimientosEditar; ?>" hidden>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Conocimientos y aptititudes</label>
            <textarea class="form-control" name="conocimientos"  placeholder="Ingrese el link"><?php echo $nom_conocimientos;?></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Editar</button>
        <button type="submit" class="btn btn-primary confirmarEditar" form="enviarConocimientosEditar">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!--MODAL Entrevista personal  agregar -->
<div class="modal fade" id="ModalEntrevista" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Entrevista personal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="entrevista_evalua.php" method="GET" id="enviarEntrevista" >
          <input type="text" name="idEntrevista" value="<?php echo $idEntrevista; ?>" hidden>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Entrevista Personal:</label>
            <textarea class="form-control" name="entrevista"  placeholder="Ingrese el link"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" form="enviarEntrevista">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!--MODAL Entrevista personal   editar -->
<div class="modal fade" id="ModalEntrevistaEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Entrevista personal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="entrevista_evalua.php" method="GET" id="enviarEntrevistaEditar" >
          <input type="text" name="id" value="<?php echo $idEntrevistaEditar; ?>" hidden >
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Entrevista Personal:</label>
            <textarea class="form-control" name="entrevista"  placeholder="Ingrese el link"><?php echo $nom_entrevista;?></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Editar</button>
        <button type="submit" class="btn btn-primary confirmarEditar" form="enviarEntrevistaEditar">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!--MODAL Resultado Final agregar -->
<div class="modal fade" id="ModalResultado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Resultado Final </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="resultado_evalua.php" method="GET" id="enviarResultado" >
          <input type="text" name="idResultado" value="<?php echo $idResultado; ?>" hidden>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Resultado Final :</label>
            <textarea class="form-control" name="resultado"  placeholder="Ingrese el link"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" form="enviarResultado">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!--MODAL Resultado Final    editar -->
<div class="modal fade" id="ModalResultadoEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Resultado final</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="resultado_evalua.php" method="GET" id="enviarResultadoEditar" >
          <input type="text" name="id" value="<?php echo $idResultadoEditar; ?>"  hidden>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Resultado Final:</label>
            <textarea class="form-control confirmarEditar" name="resultado"  placeholder="Ingrese el link"><?php echo $nom_resultado;?></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Editar</button>
        <button type="submit" class="btn btn-primary" form="enviarResultadoEditar">Guardar</button>
      </div>
    </div>
  </div>
</div>
<script src="../js/jquery-3.5.1.js"> </script>
<script src="../js/jquery.dataTables.min.js"> </script>
<script src="../js/javascript.js"> </script>
</main>
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
if($idEvaluacionEditar!=''){
  echo '<script type="text/javascript">
  document.getElementById("pressEvaluacionEditar").click();
  </script>';
}
if($idConocimientos!=''){
  echo '<script type="text/javascript">
  document.getElementById("pressConocimientos").click();
  </script>';
}
if($idConocimientosEditar!=''){
  echo '<script type="text/javascript">
  document.getElementById("pressConocimientosEditar").click();
  </script>';
}
if($idEntrevista!=''){
  echo '<script type="text/javascript">
  document.getElementById("pressEntrevista").click();
  </script>';
}
if($idEntrevistaEditar!=''){
  echo '<script type="text/javascript">
  document.getElementById("pressEntrevistaEditar").click();
  </script>';
}
if($idEntrevista!=''){
  echo '<script type="text/javascript">
  document.getElementById("pressEntrevista").click();
  </script>';
}
if($idEntrevistaEditar!=''){
  echo '<script type="text/javascript">
  document.getElementById("pressEntrevistaEditar").click();
  </script>';
}
if($idResultado!=''){
  echo '<script type="text/javascript">
  document.getElementById("pressResultado").click();
  </script>';
}
if($idResultadoEditar!=''){
  echo '<script type="text/javascript">
  document.getElementById("pressResultadoEditar").click();
  </script>';
}
?>
