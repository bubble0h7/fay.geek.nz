var path = window.location.pathname;
var page = path.split("/").pop();

if (page == "about") {
  var word = 'cat about.conf';
} else if (page == "projects") {
  var word = 'cd projects';
} else if (!page || page == "home") {
  var word = 'ls';
} else {
  var word = 'Hi. Hello.';
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

if (div != null) {
  readWord(word, div);
}


var menu = document.getElementById('menu-right');

if (menu != null) {
  document.getElementById('menu-right').addEventListener("change", menuItemChange);
  function menuItemChange() {
    if (menu.options[menu.selectedIndex].value == 'home') {
      window.location.href = "https://www.fay.geek.nz/";
    } else if (menu.options[menu.selectedIndex].value == 'about') {
      window.location.href = "https://www.fay.geek.nz/about";
    } else if (menu.options[menu.selectedIndex].value == 'contact') {
      window.location.href = "https://www.fay.geek.nz/contact";
    } else if (menu.options[menu.selectedIndex].value == 'admin') {
      window.location.href = "https://www.fay.geek.nz/admin";
    } else if (menu.options[menu.selectedIndex].value == 'profile') {
      window.location.href = "https://www.fay.geek.nz/profile";
    } else if (menu.options[menu.selectedIndex].value == 'projects') {
      window.location.href = "https://www.fay.geek.nz/projects";
    }
  }
}