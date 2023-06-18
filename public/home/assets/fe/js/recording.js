  var recognition = new webkitSpeechRecognition();

  recognition.onresult = function(event) {
    var saidText = "";
    for (var i = event.resultIndex; i < event.results.length; i++) {
      if (event.results[i].isFinal) {
        saidText = event.results[i][0].transcript;
      } else {
        saidText += event.results[i][0].transcript;
      }
    }
    console.log(saidText);
    // Update Textbox value
    document.getElementById('keyword').value = saidText;

  }

  function startRecording() {
    recognition.start();
  }