<!DOCTYPE html>
<html lang="de">
<head>
  <script>
  <?php
      $oldCountJson = file_get_contents('json/counter.json');
      $data = json_decode($oldCountJson, true);
      $data["3"] = $data["3"] + 1;
      $newCountJson = json_encode($data);
      file_put_contents('json/counter.json', $newCountJson);
  ?>
  </script>
  <meta http-equiv="refresh" content="5; URL=https://docs.google.com/forms/u/0/">
  <title>Chatbot Experiment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/landingPage.css" type="text/css">
</head>

<body>

  <div class="container-fluid bg-1 text-center">
    <h2>Weiterleitung zum Fragebogen</h2>
  </div>
  <div class="container-fluid bg-2">
    <div class="row">
      <div class="col">
        <p style="text-align:center;"><strong>Vielen Dank, dass Sie sich für eine Teilnahme an unserer Umfrage entschieden haben. </br>
          Sie werden weitergeleitet...</strong></p>
      </div>
    </div>
  </div>
</body>
</html>
