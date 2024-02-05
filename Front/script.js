const menuBurger = document.querySelector(".burger-menu");
const menu = document.querySelector(".menu");

menuBurger.addEventListener('click', () => {
  if (menu.style.display === 'none' || menu.style.display === '') {
    menu.style.display = 'flex';
    menu.style.flexDirection = 'column'; // Afficher en colonne
  } else {
    menu.style.display = 'none';
  }
});

function toggleMode() {
  const body = document.body;
  const modeToggle = document.getElementById('modeToggle');

  if (modeToggle.checked) {
      body.style.setProperty('--background-color', '#333');
      body.style.setProperty('--text-color', '#fff');
  } else {
      body.style.setProperty('--background-color', '#fff');
      body.style.setProperty('--text-color', '#333');
  }
}
