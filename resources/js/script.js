document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('service-modal');
    const modalDescription = document.getElementById('modal-description');
    const modalTitle = document.getElementById('modal-title');
    const closeButton = document.querySelector('.close-button');
    const readMoreLinks = document.querySelectorAll('.read-more');
    const modalActionBtn = document.getElementById('modal-action-btn');

    modalActionBtn.addEventListener('click', function () {
        modal.style.display = 'none';
        document.body.classList.remove('modal-open');
    });

    readMoreLinks.forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            const id = this.getAttribute('data-id');
            const title = this.getAttribute('data-title');
            const descElement = document.getElementById(`desc-${id}`);

            if (descElement) {
                modalTitle.innerHTML = `<i class='bx bx-detail bx-tada' style="color:#ee4962; margin-right:8px;"></i> ${title}`;
                const rawText = descElement.textContent || descElement.innerText;
                const lines = rawText
                    .split(/[.!؟]/)
                    .filter(line => line.trim() !== '')
                    .map(line => `<div class="modal-description-line">${line.trim()}.</div>`)
                    .join('');

                modalDescription.innerHTML = lines;
                modal.style.display = 'block';
                document.body.classList.add('modal-open'); // ← منع تمرير الخلفية
            }
        });
    });

    closeButton.addEventListener('click', function () {
        modal.style.display = 'none';
        document.body.classList.remove('modal-open');
    });

    window.addEventListener('click', function (e) {
        if (e.target === modal) {
            modal.style.display = 'none';
            document.body.classList.remove('modal-open');
        }
    });
});
