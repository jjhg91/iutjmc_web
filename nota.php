<?php 


error_reporting(0);

require('menu.php');
require('php/conn.php');
inicio();
head();  




$cedu = (int)$_GET['ci'];

if(!empty($cedu)){
	
  	$sel = $myPDO->prepare("
        SELECT DISTINCT `Estudiante`.`Cédula`, `Estudiante`.`P_APELLIDO`,
        `Estudiante`.`S_Apellidos`, `Estudiante`.`P_Nombres`, `Estudiante`.`S_Nombres`, 
        `Estudiante`.`ID_Estudia`, `RAcademico`.`Especialidad`, `RAcademico`.`Curso`, `RAcademico`.`Califica`, `pensum`.`descripcion`, `RAcademico`.`Período`
        FROM `Estudiante`, `RAcademico` , `pensum`
        WHERE `RAcademico`.`ID_Estudia` = `Estudiante`.`ID_Estudia` AND   `pensum`.`curso` = `RAcademico`.`Curso` 
          AND `Estudiante`.`Cédula` = $cedu;
    ");
    
    $sel->execute();
    $select = $sel->fetchAll();

}
?>
   <!--Base typography -->
    <section class="section section-lg bg-default">
        <div class="container">
          <div class="row row-50 flex-lg-row-reverse">
            <div class="col-xl-12">
                <h3><strong>Registro de Calificaciones</strong></h3> 
                
                <br>
                <form method="get" action="nota.php" >
                    <label for="ci">  <strong>C.I</strong>  </label>
                    <input   name="ci" type="text" class="redondeado" placeholder="Cedula" required="">
                    <button class="redondeado"  type="submit">Buscar</button>
                </form>
                 <br>
            <?php if(!empty($cedu)): ?> 
              <ul class="list-xl">
                <li>
                  	<h5><strong>Nombre : </strong><?= $select[0][3]." ".$select[0][1] ?></h5>
                  	<h5><strong>Cedula : </strong><?= $select[0][0] ?></h5>
                  <h5><strong>Carrera : </strong><?= $select[0][6] ?></h5>   
                </li>
              </ul>
              <?php endif ?>
            </div>
             <div class="col-xl-12">
 <?php if(!empty($cedu)): ?>
<table class="table table-striped" >
   <thead>
    <tr>
      <th scope="col">Materia</th>
      <th scope="col">Nota</th>
      <th scope="col">Periodo</th>
    </tr>
  </thead>
  <?php foreach($select as $notas): ?> 
    <tbody>
            <tr>
                <td><?= $notas[9] ?></td>
                <td><?= $notas[8] ?></td>
                <td><?= $notas[10] ?></td>
            </tr>
 </tbody>
  <?php endforeach ?> 
  
</table>
<?php endif ?>
            </div>
          </div>
        </div>
        </br> </br>
       
      <?php 
        footer();
      ?>

