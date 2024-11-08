let toggle = document.getElementById('toggle');
let label_toggle = document.getElementById('label_toggle');

// Leer el estado del modo oscuro desde localStorage al cargar la página
document.addEventListener('DOMContentLoaded', (event) => {
    let darkMode = localStorage.getItem('darkMode');
    if (darkMode === 'enabled') {
        document.body.classList.add('dark');
        toggle.checked = true;
        label_toggle.innerHTML = '<i class="fa-regular fa-sun"></i>';
        label_toggle.style.color = "black";
    } else {
        document.body.classList.remove('dark');
        toggle.checked = false;
        label_toggle.innerHTML = '<i class="fa-regular fa-moon"></i>';
        label_toggle.style.color = "white";
    }
});

// Cambiar el estado del modo oscuro y guardarlo en localStorage
toggle.addEventListener('change', (event) => {
    let checked = event.target.checked;
    if (checked) {
        document.body.classList.add('dark');
        localStorage.setItem('darkMode', 'enabled');
        label_toggle.innerHTML = '<i class="fa-regular fa-sun"></i>';
        label_toggle.style.color = "black";
    } else {
        document.body.classList.remove('dark');
        localStorage.setItem('darkMode', 'disabled');
        label_toggle.innerHTML = '<i class="fa-regular fa-moon"></i>';
        label_toggle.style.color = "white";
    }
});
