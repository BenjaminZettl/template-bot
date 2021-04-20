<!DOCTYPE html>
<html lang="de">
<head>
  <title>Chatbot Experiment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
  <script src="js/introductionFunctions.js"></script>
  <link rel="stylesheet" href="css/landingPage.css" type="text/css">

  <script>
  var emptyTry = <?php if(isset($_POST["try"])){
                          echo 0;
                        } else {
                          echo 1;
                        };
                  ?>;
  directToIndex(emptyTry);

  var bot_version = "<?php
      $bot_setup = file_get_contents('json/bot_setup.json');
      $data = json_decode($bot_setup, true);
      $minId = "";
      $minCount = INF;
      foreach ($data as $bot) {
        if ($bot["counter_adjustable"] < $minCount) {
          $minCount = $bot["counter_adjustable"];
          $minId = $bot["bot_id"];
        }
      }
      echo $minId
  ?>";
  </script>
</head>

<body>

  <!-- Header -->
  <div class="container-fluid bg-1 text-center">
    <h2>Fragen zum Chatbot Experiment</h2>
  </div>

  <!-- Content -->
  <div class="container-fluid bg-2" id="content">

    <div class="row">
      <div class="col-*-*", id="question_col">
		    <p>Um zu überpüfen, dass Sie das Experiment und den Ablauf verstanden haben, beantworten Sie bitte noch kurz diese Fragen.</p>
        <script>
        var varTry =
          <?php if(isset($_POST['try'])){
            echo $_POST['try'];
          } else {
            echo 1;
          } ?>;

          //fetchBotNumber();
          fetchQuestions("json/questions.json", "question_col");
          fetchAnswers();
        </script>
	    </div>
    </div>

    <div class="row">
      <div class="col-*-*">
	      <p>Bitte klicken Sie nun auf den untenstehenden Button, um Ihre Antorten auszuwerten und anschließend mit dem Experiment zu beginnen.</p>
        <form>
          <input class="button" type="button" onclick="checkAnswers(varTry)" value="Starten" />
        </form>
        <br>
		    <p><strong><font color=red><output id="forwardingMessage"></output></font></strong></p>
		  </div>
    </div>
  </div>
</body>
</html>
