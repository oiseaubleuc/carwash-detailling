import './bootstrap';
document.addEventListener('DOMContentLoaded', function () {
    const toggleOptions = document.querySelector('.toggle-options');
    const optionsList = document.querySelector('.options-list');

    toggleOptions.addEventListener('click', function () {
        optionsList.classList.toggle('hidden'); // Toggle de hidden klasse
        optionsList.classList.toggle('visible'); // Toggle de visible klasse
    });
});
