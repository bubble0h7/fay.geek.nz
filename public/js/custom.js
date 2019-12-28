var path = window.location.pathname;
var page = path.split("/").pop();

if (page == "now") {
  var word = 'cat now.conf';
} else if (!page || page == "home" || page == "projects" || page == "blog" || page == "files") {
  var word = 'ls -al';
} else {
  var word = 'cat ' + page + '.txt';
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
    } else if (menu.options[menu.selectedIndex].value == 'now') {
      window.location.href = "https://www.fay.geek.nz/now";
    } else if (menu.options[menu.selectedIndex].value == 'admin') {
      window.location.href = "https://www.fay.geek.nz/admin";
    } else if (menu.options[menu.selectedIndex].value == 'profile') {
      window.location.href = "https://www.fay.geek.nz/profile";
    } else if (menu.options[menu.selectedIndex].value == 'projects') {
      window.location.href = "https://www.fay.geek.nz/projects";
    } else if (menu.options[menu.selectedIndex].value == 'blog') {
      window.location.href = "https://www.fay.geek.nz/blog";
    } else if (menu.options[menu.selectedIndex].value == 'files') {
      window.location.href = "https://www.fay.geek.nz/files";
    } else if (menu.options[menu.selectedIndex].value == 'git') {
      window.location.href = "https://github.com/bubble0h7";
    }
  }
}