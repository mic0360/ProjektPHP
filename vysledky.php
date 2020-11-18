<?php

$title = "vysledky";
include "conDB.php";
include "hlavicka.php";

?>


<?php

global $zaznamy;

if (isset($_POST['search'])){

    $hodnotaVyhledani = $_POST['hodnotaVyhledavani'];

    $sql = "SELECT * FROM formular WHERE CONCAT(email,vek,vyska,vaha,adresa,mesto,stat,psc,pohlavi) LIKE '%".$hodnotaVyhledani."%'";
    $result = pg_query($sql);

}

?>



<div class="container">

<div class="container">
        <h1 class="display-3">BMI výsledky</h1>
       
</div>


<form action="" method="post">

    <div class="input-group mb-3">
        <input type="text" name="hodnotaVyhledavani" class="form-control" placeholder="Zadejte hodnotu" aria-label="Zadejte hodnotu" aria-describedby="button-addon2">
        <div class="input-group-append">
         <button class="btn btn-outline-secondary" name="search" type="submit" id="button-addon2">Vyhledat</button>
        </div>
    </div>

    <table  class="table">
        <tr>
            <th scope="col">Email</th>
            <th>Věk</th>
            <th>Výška</th>
            <th>Váha</th>
            <th>Adresa</th>
            <th>Město</th>
            <th>Stát</th>
            <th>PSČ</th>
            <th>Pohlaví</th>
            <th>BMI</th>
        </tr>

        <!-- PostgreSQL -->

        <?php if (isset($result)) {

              while($row = pg_fetch_array($result)):

                $zaznamy[] = $row;
              
              ?>
        
        <tr> 
            <td><?php echo $row['email'] ;?></td>
            <td><?php echo $row['vek'] ;?></td>
            <td><?php echo $row['vyska'];?></td>
            <td><?php echo $row['vaha'];?></td>
            <td><?php echo $row['adresa'];?></td>
            <td><?php echo $row['mesto'];?></td>
            <td><?php echo $row['stat'];?></td>
            <td><?php echo $row['psc'];?></td>
            <td><?php echo $row['pohlavi'];?></td>
            <td><?php 

              $bmi = round($row['vaha']/pow($row['vyska'],2),2);

              if ($bmi <= 18.5 ){
                  echo $bmi.' : Podváha';
              } elseif ($bmi > 18.5  && $bmi <= 18.5) {
                echo $bmi.' : Normální hmotnost';
              } elseif ($bmi > 25  && $bmi <= 29.9) {
                echo $bmi.' : Nadváha';
              } else {
                echo $bmi.' : Obezita'; 
              }            
            
            ?></td>
        </tr>

        <?php endwhile; }?>
    </table>

</form>


<canvas id="myChart"></canvas>

</div>


<?php

include "footer.php";

?>

<script type="text/javascript">
var vyhledanaData = <?php echo json_encode($zaznamy);?>; 
</script>

<script type="text/javascript" src="script.js"></script>