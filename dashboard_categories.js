document.addEventListener('DOMContentLoaded', function () {
    const categories = document.querySelectorAll('.category');

    categories.forEach(category => {
        category.addEventListener('click', function () {
            categories.forEach(cat => cat.classList.remove('active'));
            this.classList.add('active');
            const targetSectionId = this.getAttribute('data-target');
            const targetSection = document.getElementById(targetSectionId);

            if (targetSection) {

                targetSection.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

});

