var path = window.location.pathname;
var page = path.split("/").pop();

if (page == "about") {
  var word = 'echo Wait... You want to know more?';
} else {
  var word = 'echo Hi. Hello.';
}

var div = document.getElementById('terminal-line');

function readWord(word, el) {
  var pos = 0;
  var duration = 250;
  var text = '$ ';
  var readLetter = (function readLetter () {
    if (pos < word.length) {
        var letter = word.substr(pos, 1);
        text += letter;
        div.innerHTML = text;
        pos++;
        setTimeout(readLetter, duration);
    }
  })();
}

readWord(word, div);

document.getElementById('menu-right').addEventListener("change", menuItemChange);
function menuItemChange() {
  var menu = document.getElementById("menu-right");
  var selectedItem = menu.options[menu.selectedIndex].value;
  window.location.href = "http://www.fay.geek.nz/" + selectedItem;
}