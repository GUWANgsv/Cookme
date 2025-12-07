document.addEventListener('DOMContentLoaded', () => {
    const stars = document.querySelectorAll('.star');

    stars.forEach(star => {
        star.addEventListener('click', () => {stars
            .forEach(s => s.classList.remove('selected'));
            star.classList.add('selected');
            const rating = star.getAttribute('data-value');
            console.log(`Rating: ${rating}`);
        });
    });
});

document.querySelectorAll('.star').forEach(star => {
    star.addEventListener('click', function() {
        document.getElementById('difficultyInput').value = this.getAttribute('data-value');
    });
});