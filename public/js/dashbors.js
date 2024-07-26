document.getElementById('toggleButton').addEventListener('click', function () {
  var sidebar = document.getElementById('sidebar');
  var texts = document.querySelectorAll('#sidebar p');
  var line = document.getElementById('line');
  if (sidebar.classList.contains('w-64')) {
    sidebar.classList.remove('w-64');
    sidebar.classList.add('w-16');
    line.classList.add('with-line');
    line.classList.remove('hidden');
    texts.forEach(function(text) {
      text.classList.add('hide-text');
    });
  } else {
    sidebar.classList.remove('w-16');
    sidebar.classList.add('w-64');
    line.classList.remove('with-line');
    line.classList.add('hidden');
    texts.forEach(function(text) {
      text.classList.remove('hide-text');
    });
  }
});