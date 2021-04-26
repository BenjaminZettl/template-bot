var url = "/index.php";
var chatbotUrl = "/chatbot.php";
var comprehensionUrl = "/comprehensionQuestions.php";
var errorUrl = "/errorPage.php";
//var bot_versions=1;
var answerFile = "json/questions.json"
var array_correct = [];


/* Function to generate random int between 1 (inclusive) and max (inclusive)
function getRandomInt(max) {
  return Math.ceil(Math.random() * Math.floor(max));
}
*/

function errorMessage(varTry){
  const urlParams = new URLSearchParams(window.location.search);
  const noconsent = urlParams.get('noconsent');
  if(noconsent){
      var messageText = document.createTextNode("Bitte stimmen Sie der Datenschutzerklärung und der Nutzung der Dienste Forms und Dialogflow von Google zu.");
      document.getElementById('errorMessage').appendChild(messageText);
      document.getElementById('errorMessage').appendChild(document.createElement("br"));
  }
  if(varTry===2){
    var messageText = document.createTextNode("Ihre Antworten waren leider nicht richtig. Dies ist ihr zweiter von drei Versuchen. Lesen Sie die Experimentbeschreibung noch einmal gründlich durch und beantworten Sie anschließend die Fragen erneut.");
    document.getElementById('errorMessage').appendChild(messageText);
  } else if (varTry===3) {
    var messageText = document.createTextNode("Das ist Ihr letzter Versuch! Lesen Sie die Experimentbeschreibung noch einmal gründlich durch und beantworten Sie anschließend die Fragen erneut.");
    document.getElementById('errorMessage').appendChild(messageText);
  } else if (varTry>3) {
    window.open(errorUrl, "_self");
  }
}
/*
function fetchBotNumber(){
  fetch("json/bot_setup.json")
    .then(response => response.json())
    .then(data => {bot_versions = data.length});
}
*/
function fetchAnswers() {
  fetch(answerFile)
    .then(response => response.json())
    .then(data => {
      for (let question of data){
        var answer_correct = question.answer_correct;
        array_correct.push(answer_correct);
      }
    }
  )
}

function evaluate(i) {
  if(i>0){
    return ($("input[name="+i+"]:checked").val() === array_correct[i-1]) + evaluate(i-1);
  } else {
      return false;
  }
}


function checkAnswersOld(attempt){
  if(attempt === 4){
    window.open(errorUrl, "_self");
  }else if(evaluate(array_correct.length)===array_correct.length){
    document.getElementById("forwardingMessage").value = "Ihre Antworten waren richtig. Warten Sie bitte einen Augenbenblick, bis das Experiment geöffnet wird.";
    openBot(bot_version);
  } else {
    if(attempt === 2) {
        openWithPost(url, "try", 3);
      } else if(attempt === 3) {
        $.post(comprehensionUrl, {try:4});
        window.open(errorUrl, "_self");
    } else {
      openWithPost('index.php', "try", 2);
    }
  }
}


function openBot(version){
  openWithPost(chatbotUrl, "version", version);
  }

function openWithPost(url, name, value){
  var dummyForm = document.createElement("form");
  dummyForm.method = "POST";
  dummyForm.action = url;
  dummyForm.style.display = "none";
  var dummyInput = document.createElement("input");
  dummyInput.type = "text";
  dummyInput.name = name;
  dummyInput.value = value;
  dummyForm.appendChild(dummyInput);
  document.body.appendChild(dummyForm);
  dummyForm.submit();
  document.body.removeChild(dummyForm);
}

function directToIndex(bool){
  if(bool){
    window.open(url, "_self");
  }
}

function validate(varTry) {
        if (document.getElementById('privacy').checked && document.getElementById('dialogflow').checked && document.getElementById('forms').checked) {
            openWithPost('comprehensionQuestions.php','try', varTry);
        } else {
            openWithPost('index.php?noconsent=true','try', varTry);
        }
    }

function getAnswers(questionIds){
  var jsonAnswers = {};
  questionIds.forEach(function(id){
    jsonAnswers[id] = $("input[name="+id+"]:checked").val();
  });
  return jsonAnswers;
}

function checkAnswers(questionIds, varTry){
  document.getElementById("try").value = varTry;
  document.getElementById("answers").value = JSON.stringify(getAnswers(questionIds));
  console.log({answers: getAnswers(questionIds), try: varTry});
}
