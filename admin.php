<?PHP
session_start();

$passwort = "ptGhpX9PF47kc"; // Hier bitte gewuenschtes Passwort eintragen

if (isset($_POST['go'])){

$check = $_POST["password"];
$_SESSION["access"] = "empty";
if ($check == "$passwort"){
$_SESSION["access"] = "okay";
}else{
echo "Falsches Passwort...";
}
}

$oldCountJson = file_get_contents('json/counter.json');
$data = json_decode($oldCountJson, true);
?>

<!DOCTYPE html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/landingPage.css" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="js/introductionFunctions.js"></script>
<title>Reisepass Chatbot Admin</title>
<script>
var countA1 = <?php echo $data["1"] ?>;
var countA2=<?php echo $data["2"] ?>;
var countA3=<?php echo $data["3"] ?>;
var countB1=<?php echo $data["4"] ?>;
var countB2=<?php echo $data["5"] ?>;
</script>
</head>

<body>
  <div class="container-fluid bg-1 text-center">
    <h2>Admin-Seite zum Chatbot Experiment</h2>
  </div>

<?php

if ($_SESSION["access"] == "okay") {

// Geschuetzter Bereich...
?>
<!-- Content -->
<div class="container-fluid bg-2" id="content">
  <div class="row">
    <div class="col">
      <p><b>Chatbot A1</b></br>
        <form>
          <input class="button" type="button" onclick="openBot(1)" value="Starten" />
        </form>
         freundschaftlich </br>
         mit Erklärung, dass er menschlich gestaltet ist </br>
         Abgeschlossene Dialoge: <script>document.write(countA1)</script></br>
      </p>
      <p><b>Chatbot A2</b></br>
        <form>
          <input class="button" type="button" onclick="openBot(2)" value="Starten" />
        </form>
         freundschaftlich </br>
         ohne Erklärung, dass er menschlich gestaltet ist </br>
         Abgeschlossene Dialoge: <script>document.write(countA2)</script></br>
      </p>
      <p><b>Chatbot A3</b></br>
        <form>
          <input class="button" type="button" onclick="openBot(3)" value="Starten" />
        </form>
         freundschaftlich </br>
         mit Erklärung, dass er menschlich gestaltet ist und das er besonders freundschaftlich gestaltet wurde</br>
         Abgeschlossene Dialoge: <script>document.write(countA3)</script></br>
      </p>
      <p><b>Chatbot B1</b></br>
        <form>
          <input class="button" type="button" onclick="openBot(4)" value="Starten" />
        </form>
         sachlich </br>
         mit Erklärung, dass er besonders menschlich ist </br>
         Abgeschlossene Dialoge: <script>document.write(countB1)</script></br>
      </p>
      <p><b>Chatbot B2</b></br>
        <form>
          <input class="button" type="button" onclick="openBot(5)" value="Starten" />
        </form>
         sachlich </br>
         ohne Erklärung, dass er besonders menschlich ist </br>
         Abgeschlossene Dialoge: <script>document.write(countB2)</script></br>
      </p>
      <a href="logout.php">Logout</a>
    </div>
  </div>
<? }else{ // close geschuetzter Bereich
?>
<!--- Loginformular beginn -->
<form method="POST" action="">
<fieldset>
  <div class="container-fluid bg-2" id="content">

    <div class="row">
      <div class="col">

        <legend>Bitte Passwort eingeben...</legend>
        <input type="password" name="password" size="16" />
        <input type="submit" value="Login" name="go"/>
      </div>
    </div>
</form>
<!-- Loginformular ende -->
<?php } // close Loginform
?>
</body>
</html>
