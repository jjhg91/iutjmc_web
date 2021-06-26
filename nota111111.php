<?php 
require('menu.php');
require('php/conn.php');
inicio();
head();  


$cedu = (int)$_GET['ci'];

if(!empty($cedu)){
    $sel = $myPDO->prepare("
       SELECT          `Estudiante`.`Cédula`,          `Estudiante`.`P_APELLIDO`,          `Estudiante`.`S_Apellidos`,          `Estudiante`.`P_Nombres`,          `Estudiante`.`S_Nombres`,          `Estudiante`.`ID_Estudia`,          `INSCRIPCION`.`Especialidad`,          `INSCRIPCION`.`Curso`,          `INSCRIPCION`.`Califica`    FROM          `Estudiante`,          `INSCRIPCION`    WHERE          `INSCRIPCION`.`ID_Estudia` = `Estudiante`.`ID_Estudia`           AND   `Estudiante`.`Cédula` = $cedu;
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
                <h3><strong>Buscador de Notas perido 2020-2</strong></h3> 
                <br>
                <br>
                <form method="get" action="nota111111.php" >
                    <label for="ci">C.I  </label>
                    <input name="ci" type="text">
                    <button type="submit">Buscar</button>
                </form>
                <br>
            <?php if(!empty($cedu)): ?> 
              <ul class="list-xl">
                <li>
                  <h4><?= $select[0][1]." ".$select[0][3] ?></h4>
                  <h4>C.I: <?= $select[0][0] ?></h4>
                  
                 
                  
                  <h4>Especialidad: <?= $select[0][6] ?></h4>
                </li>
              </ul>
              <?php endif ?>
            </div>
             <div class="col-xl-12">
                 
 <?php if(!empty($cedu)): ?>
<table id="customers">
  <tr>
    <th>Asignatura</th>
    <th>Nota</th>
  </tr>
  
  <?php foreach($select as $notas): ?> 
  <tr>
    <td><?= $notas[7] ?></td>
    <td><?= $notas[8] ?></td>
  </tr>
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
