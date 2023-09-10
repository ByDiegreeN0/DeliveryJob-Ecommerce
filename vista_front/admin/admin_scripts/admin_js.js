
// Script Navbar Responsive Dashboard

const BurgerButton = document.getElementById('responsive-nav-burger')
const ResponsiveNav = document.getElementById('responsive-nav-ul')

BurgerButton.addEventListener('click', () => {
    ResponsiveNav.classList.toggle('active');
});