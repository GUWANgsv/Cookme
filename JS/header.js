function toggleDropdown() {
    const userMenu = document.querySelector('.user-menu');
    userMenu.classList.toggle('active');
}

window.onclick = function(event) {
    if (!event.target.matches('.user-icon')) {
        const dropdowns = document.querySelectorAll('.dropdown');
        dropdowns.forEach(dropdown => {
            dropdown.parentElement.classList.remove('active');
        });
    }
}
