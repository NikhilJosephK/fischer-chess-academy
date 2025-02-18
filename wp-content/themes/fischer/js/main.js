if (document.querySelector('.fischer-nav-mob')) {
    (function () {
        document.querySelector('.hamburger-menu').addEventListener('click', function (event) {
            event.preventDefault();
            document.querySelector('.bar').classList.toggle('animate');
            document.querySelector('.mobile-menu').classList.toggle('active');
        });

    })();
}

if (document.querySelector('.fischer-achievements')) {
    (function () {
        const gallery_items = document.querySelectorAll('.gallery-item');
        const button_container = document.querySelector('.button-container');
        const next_button = document.querySelector('.next');
        const previous_button = document.querySelector('.previous');

        let start_limit = 0;
        let end_limit = 9;
        function displayCards(limitOne, limitTwo) {
            if (gallery_items.length <= 9) {
                next_button.style.display = 'none'
            }
            gallery_items.forEach((item, index) => {
                if (start_limit <= 0) {
                    previous_button.style.display = "none";
                }
                if (index < limitTwo && index >= limitOne) {
                    item.classList.add('show');
                } else {
                    item.classList.remove('show');
                }
            })
        }
        displayCards(start_limit, end_limit)

        button_container.addEventListener('click', function (e) {
            const direction = e.target.dataset.previous === 'previous' ? -1 : e.target.dataset.next === 'next' ? 1 : 0;

            if (direction !== 0) {
                start_limit += direction * 9;
                end_limit += direction * 9;
                previous_button.style.display = start_limit <= 0 ? "none" : "block";
                next_button.style.display = end_limit > gallery_items.length ? "none" : "block";

                displayCards(start_limit, end_limit);
            }
        });

    })();
}
