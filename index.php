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
  <!--
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  -->
  <script src="js/introductionFunctions.js"></script>
  <link rel="stylesheet" href="css/landingPage.css" type="text/css">
</head>

<body>
  <!-- Header -->
	<div class="container-fluid bg-1 text-center">
		<h2>Experiment zum Einsatz von Bots für digitale Amtsgänge</h2>
	</div>

	<!-- Content -->
	<div class="container bg-2" id="content" style="margin-top:40px">
		<div class="row">
			<div class="col-*-*">
				<h4>Herzlich Willkommen zu unserem Experiment.</h4>
			</div>
		</div>

		<div class="row">
			<div class="col-*-*">
				<p><strong><font color=red><output id="errorMessage"></output></font></strong></p>
        <script>
          var varTry =
            <?php if(isset($_POST['try'])){
              echo $_POST['try'];
            } else {
              echo 1;
            } ?>;
					errorMessage(varTry);
				</script>

        <p>Die Coronakrise führt uns gerade vor Augen, dass digitale Formate in Zukunft eine immer größere Rolle spielen werden.
          Viele Unternehmen nutzen deshalb bereits <b>Chatbots</b>, um ihren Kunden einen möglichst natürlichen Kontakt zu ermöglichen.
          Falls Ihnen der Begriff auf Anhieb nichts sagt, ist hier eine kurze Definition: Bei einem Chatbot handelt es sich um ein technisches Dialogsystem,
          mit dem per Texteingabe kommuniziert werden kann. Chatbots werden häufig eingesetzt, um Anfragen automatisiert und ohne direkten menschlichen
          Eingriff zu beantworten oder zu bearbeiten.
          Allerdings kommen Chatbots bisher vor allem bei der Verkaufs- und Kundenberatung zum Einsatz.
          In diesem Experiment möchten wir deshalb den Einsatz von Chatbots zum Erledigen digitaler Amtsgänge untersuchen.
          Als Dankeschön haben Sie die Chance auf einen von <b>fünf Amazon Gutscheinen im Wert von 10€.</b>
        </p>
				<p>Das Experiment beinhaltet die folgenden Schritte:</p>
				<p><ol>
					<li>Sie benatworten zunächst ein paar Kontrollfragen, um sicherzustellen, dass Sie das Experiment verstanden haben.</li>
					<li>Anschließend erscheint ein Chatbot, welcher Ihr persönlicher Assistent ist. Er soll Ihnen helfen einen <b>Reisepass</b> auf dem Bürgerbüro zu verlängern.
              Dazu führt er mit Ihnen ein Gespräch, in dem er die benötigten Daten abfragt. Bitte <b>notieren</b> Sie sich dafür folgende Angaben:
            <ul>
              <li>Name: <b>Erika Mustermann</b></li>
              <li>Reisepassnummer: <b>C01X00T47</b></li>
            </ul>
            Alle weiteren Daten können Sie frei wählen.</li>
					<li>Nachdem Sie den Antrag mittels des Bots abgeschlossen haben, beginnt die Umfrage.</li>
					<li>Füllen Sie die anonyme Umfrage aus und bewerten Sie, wie Sie das Experiment wahrgenommen haben.</li>
					<li>Am Ende der Umfrage können Sie Ihre E-Mail angeben, um an der Verlosung teilzunehmen.</li>
				</ol></p>
				<p>Zusammengefasst müssen Sie nur mit dem Bot Ihren Reisepass verlängern und die Umfrage abschließen, um an der Amazon Gutschein-Verlosung teilzunehmen! Dies dauert ca. 10 Minuten. :)</p>
				<p>Um am Experiment teilzunehmen, stimmen Sie bitte der Datenschutzerklärung sowie der Nutzung der Dienste Dialogflow und Forms von Google zu.
          Klicken Sie dann auf den untenstehenden Button und beantworten Sie die Kontrollfragen. Anschließend beginnt das Experiment.</p>
			</div>
		</div>

		<div class="row">
			<div class="col-*-*">
        <div>
          <input type="checkbox" id="privacy" name="privacy">
          <label for="privacy">Ich habe die <a href="gdpr.html">Datenschutzerklärung</a> gelesen und verstanden.</label>
        </div>
        <div>
          <input type="checkbox" id="dialogflow" name="dialogflow">
          <label for="dialogflow">Ich bin einverstanden, dass der Google Dienst Dialogflow für den Betrieb des Chatbots genutzt wird.</label>
        </div>
        <div>
          <input type="checkbox" id="forms" name="forms">
          <label for="forms">Ich bin einverstanden, dass der Google Dienst Forms für die Durchführung der Umfrage genutzt wird.</label>
        </div>
				<form>
          <input class="btn button" type="button" onclick="validate(varTry)" value="Zu den Fragen" />
				</form>
			</div>
		</div>

	</div>

</body>
</html>
