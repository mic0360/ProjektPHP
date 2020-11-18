<?php

$title = "formular";
include "conDB.php";
include "hlavicka.php";


?>

<?php
if (isset($_GET['ulozit'])) {
    $zadanyEmail = $_GET['email'];
    $zadanyVek = $_GET['vek'];
    $zadanaVyska = $_GET['vyska'];
    $zadanaVaha = $_GET['vaha'];
    $zadanaAdresa = $_GET['adresa'];
    $zadaneMesto = $_GET['mesto'];
    $zadanyStat = $_GET['stat'];
    $zadanePSC = $_GET['psc'];
    $zadanePohlavi = $_GET['inlineRadioOptions'];


    try {
        $sql = "INSERT INTO formular (email,vek,vyska,vaha,adresa,mesto,stat,psc,pohlavi) VALUES ('$zadanyEmail','$zadanyVek',
        '$zadanaVyska','$zadanaVaha','$zadanaAdresa','$zadaneMesto','$zadanyStat','$zadanePSC','$zadanePohlavi')";
        $result = pg_query($sql);
        //echo "Záznamy byly úspěšně vloženy do databáze";

        header('Location: vysledky.php');

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>


<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
  <div class="col-md-5 p-lg-5 mx-auto my-5">
    <h1 class="display-4 font-weight-normal">Výplňte formulář BMI</h1>
    <p class="lead font-weight-normal">Zkratka BMI (Body mass index) označuje index tělesné hmotnosti a používá se jako měřítko obezity. Tento index se vypočítá vydělením tělesné hmotnosti v kilogramech výšky daného člověka umocněné na druhou. BMI tak umožňuje statisticky porovnat různě vysoké lidi.</p>
    <a class="btn btn-outline-secondary" href="https://zivotavyziva.cz/kalkulacka-bmi/">Zjistit více</a>
  </div>
  <div class="product-device shadow-sm d-none d-md-block"></div>
  <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
</div>



<div class="container">
  <form action="" method="get">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail">Email</label>
        <input type="email" name="email" class="form-control" id="inputEmail">
      </div>
      <div class="form-group col-md-2">
        <label for="inputVek">Věk</label>
        <input type="number" name="vek" class="form-control" id="inputVek">
      </div>
      <div class="form-group col-md-2">
        <label for="inputVyska">Výška</label>
        <input type="number" name="vyska" step="any"  class="form-control" id="inputVyska">
      </div>
      <div class="form-group col-md-2">
        <label for="inputVaha">Váha</label>
        <input type="number" name="vaha" step="any" class="form-control" id="inputVaha">
      </div>
    </div>
    <div class="form-group">
      <label for="inputAddress">Adresa</label>
      <input type="text" name="adresa" class="form-control" id="inputAddress" placeholder="17. listopadu 1266/17">
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputCity">Město</label>
        <input type="text" name = "mesto" class="form-control" id="inputCity">
      </div>
      <div class="form-group col-md-4">
        <label for="inputState">Stát</label>
        <select id="inputState" name = "stat" class="form-control">
          <option selected>Česká republika</option>
          <option>Slovenko</option>
          <option>Jiný</option>
        </select>
      </div>
      <div class="form-group col-md-2">
        <label for="inputZip">PSČ</label>
        <input type="text" name="psc" class="form-control" id="inputZip">
      </div>
    </div>
    <div class="form-group">

      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="muž">
        <label class="form-check-label" for="inlineRadio1">Muž</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="žena">
        <label class="form-check-label" for="inlineRadio2">Žena</label>
      </div>
    </div>
    <button type="submit" name="ulozit" class="btn btn-primary">Odeslat</button>
  </form>
</div>








<?php

include "footer.php"

?>