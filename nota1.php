<?php 
require('menu.php');
require('php/conn.php');
inicio();
head();  

$cedu = (int)$_GET['ci'];

if(!empty($cedu)){
    $sel = $myPDO->prepare("
        SELECT
        `RAcademico`.`ID_Estudia`,
        `RAcademico`.`Período`,
        `RAcademico`.`Curso`,
        `RAcademico`.`Califica`,
        `Estudiante`.`Cédula`,
        `Estudiante`.`P_APELLIDO`,
        `Estudiante`.`P_Nombres`,
        `Estudiante`.`Especialidad`
        FROM `RAcademico`,`Estudiante`
        WHERE `RAcademico`.`ID_Estudia` = `Estudiante`.`ID_Estudia` AND `Estudiante`.`Cédula` = $cedu ORDER BY `RAcademico`.`Período` ASC
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
                  <h5><strong>Nombre : </strong><?= $select[0][5]." ".$select[0][6] ?></h5>
                  <h5><strong>Cedula : </strong><?= $select[0][4] ?></h5>
                  <h5><strong>Carrera : </strong><?= $select[0][7] ?></h5>    
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
                <td><?= $notas[2] ?></td>
                <td><?= $notas[3] ?></td>
                <td><?= $notas[1] ?></td>
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

