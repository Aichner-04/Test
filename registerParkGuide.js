const myCheckbox = document.getElementById('myCheckbox');
const myTextbox = document.getElementById('myTextbox');

myCheckbox.addEventListener('click', function() {
  if (this.checked) {
    myTextbox.style.display = 'inline';
  } else {
    myTextbox.style.display = 'none';
  }
});