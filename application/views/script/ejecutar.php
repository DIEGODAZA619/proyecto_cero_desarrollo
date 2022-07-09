<?php 
 $conn = new mysqli('localhost','root','','metabiz_mlm'); 

 ?>

<div class="row">
  <div class="col-lg-2"></div>
  <div class="col-lg-8">
    <?php
      //$fileSQL = file_get_contents('ejecutar.sql');
    /* Ejecutar consulta multiquery */
      $sql = explode(";",file_get_contents(base_url()."/MANTENIMIENTOS/ejecutar.sql" ));// 
    ?>
    <h2>Lista CONSULTAS</h2>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">CONSULTA EJECUTADA</th>
          
        </tr>
      </thead>
      <tbody>
        <?php 
        $n = 1;
         foreach($sql as $query)
         {?>
          <tr>
            <th scope="row"><?php echo $n++;?></th>
            <td><?php echo $query?></td>            
          </tr>
          <?php
          $result = $conn->query($query);
          echo $result;
        }?>
        
      </tbody>
    </table>     
  </div>
  <div class="col-lg-2">
    
  </div>
</div>








