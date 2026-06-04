import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


function toggleDark() {
    const html = document.documentElement;
    html.classList.toggle('dark');
    // Persist preference
    localStorage.setItem('theme', html.classList.contains('dark') ? 'dark' : 'light');
}

// Apply saved preference on load
if (localStorage.getItem('theme') === 'dark' ||
    (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    document.documentElement.classList.add('dark');
}