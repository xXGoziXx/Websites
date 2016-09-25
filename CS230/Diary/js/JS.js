var diary = document.getElementsByClassName("diary");
for (var i = 0; i < diary.length; i++) {
  diary[i].style.visibility = "hidden";
}

function showDiary() {
  for (var i = 0; i < diary.length; i++) {
    diary[i].style.visibility = "visible";
  }
}

function hideDiary() {
  for (var i = 0; i < diary.length; i++) {
    diary[i].style.visibility = "hidden";
  }
}

function validateForm() {
    var x = new Array(5);
    x[0] = document.forms["dForm"]["where"].value;
    x[1] = document.forms["dForm"]["event"].value;
    x[2] = document.forms["dForm"]["emotion"].value;
    x[3] = document.forms["dForm"]["thoughts"].value;
    x[4] = document.forms["dForm"]["response"].value;
    
    var y = new Array(5);
    y[0] = '"Where"';
    y[1] = '"Event"';
    y[2] = '"Emotion"';
    y[3] = '"Thoughts"';
    y[4] = '"Response"';

    for(var i = 0;i<5;i++){
      if(x[i] == null || x[i] == "") {
        alert(y[i] + " must be filled out");
        return false;
      }
    } 
}