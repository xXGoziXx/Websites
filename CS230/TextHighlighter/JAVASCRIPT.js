/**
 * Created by Nosa on 02/03/2016.
 */
function clearBox() {
    document.getElementById("input").value = "";
    document.getElementById("output").innerHTML = "";
}
var verbs = ["do", "be", "am", "is", "are", "was", "has", "had",
    "been", "being", "have", "having", "were", "could", "should", "would", "may", "might", "must", "will", "shall", "can", "did", "does"
];

function textEncode() {
    /*var count = 0;*/
    var output = "";
    var input = document.getElementById("input").value + " ";
    var start = 0;
    var end = -1;
    for (var i = 0; i < input.length; i++) {
        if (input.charAt(i) == ' ' || input.charAt(i) == '.' || input.charAt(i) == ',' || input.charAt(i) == "'" || input.charAt(i) == '"') {
            start = end + 1;
            end = i;
            var text = input.substring(start, end);
            if (isInVerbs(text)) {
                output += '<span style="background-color:blue;color:white;">' + text + "</span>" + input.charAt(i);
                /*count++;*/
            } else {
                output += text + input.charAt(i);
            }
        }
    }
    document.getElementById("output").innerHTML = "<p>" + '<span style="background-color:white;color:black;">' + output + "</span>" + "</p>";
    alert(count);
}

function isInVerbs(word) {
    for (var j = 0; j < verbs.length; j++) {
        if (word == verbs[j]) {
            return true;
        }
    }
    return false;
}

function changeAll() {
    var textbox = document.getElementById("input").value;
    for(var i = 0;i < textbox.length; i++){
        if(textbox.charAt(i) == "0" || textbox.charAt(i)  == "1" || textbox.charAt(i)  == "2" || textbox.charAt(i)  == "3"|| textbox.charAt(i)  == "4" || textbox.charAt(i)  == "5" || textbox.charAt(i)  == "6" || textbox.charAt(i)  == "7" || textbox.charAt(i)  == "8" || textbox.charAt(i)  == "9"){
            alert(i);
        }
    }
}
