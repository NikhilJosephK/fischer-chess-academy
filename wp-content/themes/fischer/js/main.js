//mob nav tab issue
(function () {
    const resourcesTab = document.querySelector('.mob-resources');
    const mobResourcesWrapper = document.querySelector('.mob-resources-wrapper');

    resourcesTab.addEventListener('click', function () {
        mobResourcesWrapper.classList.toggle('active');
    })
})();

// mob nav
if (document.querySelector('.fischer-nav-mob')) {
    (function () {
        document.querySelector('.hamburger-menu').addEventListener('click', function (event) {
            event.preventDefault();
            document.querySelector('.bar').classList.toggle('animate');
            document.querySelector('.mobile-menu').classList.toggle('active');
        });

    })();
}

// show active state on header
(function () {
    const headerHome = document.querySelector('.header-home');
    const headerAbout = document.querySelector('.header-about');
    const headerAchievements = document.querySelector('.header-achievements');
    const headerContactUs = document.querySelector('.header-contact-us');
    const resources = document.querySelector('.resources');

    const headerElements = [
        {
            id: 1,
            url: "/",
            element: headerHome
        },
        {
            id: 2,
            url: "/about-us/",
            element: headerAbout
        },
        {
            id: 3,
            url: "/achievements/",
            element: headerAchievements
        },
        {
            id: 4,
            url: "/contact-us/",
            element: headerContactUs
        },
        {
            id: 5,
            url: "/blog/",
            element: resources
        },
        {
            id: 6,
            url: "/pdf-library/",
            element: resources
        },
    ];

    headerElements.forEach(item => {
        if (item.element.style.textDecoration !== 'underline') {
            item.element.style.textDecoration = window.location.pathname === item.url ? 'underline' : 'none';
            item.element.style.textUnderlineOffset = window.location.pathname === item.url ? '3px' : '0';
        }
    });
})();

// achievements page
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

//blog home page
if (document.querySelector('.fischer-blog')) {
    (function () {
        const blogContainer = document.querySelector('.blog-container');
        const prevBtn = document.querySelector('.previous');
        const nextBtn = document.querySelector('.next');
        const rippleLoader = document.querySelector('.lds-ripple');
        const noMoreBlogs = document.querySelector('.no-more-blogs');
        let num = 1;

        async function createCard(pageNumber = 1) {
            if (document.querySelector('.blog-card')) {
                document.querySelectorAll('.blog-card').forEach(item => {
                    item.remove();
                })
            }
            rippleLoader.style.display = 'flex';
            const data = await fetch(`http://fischerchess.in/wp-json/wp/v2/blog?_fields=slug,featured_image_url,date,acf&per_page=9&page=${pageNumber}`);
            const response = await data.json();

            [prevBtn, nextBtn].forEach(item => {
                item.style.display = response.length > 0 ? 'block' : 'none';
            });

            noMoreBlogs.style.display = response.length > 0 ? 'none' : 'block'

            if (pageNumber === 1) {
                prevBtn.style.display = 'none';
            } else {
                prevBtn.style.display = 'block';
            }

            rippleLoader.style.display = response.length !== 0 ? 'none' : 'flex';

            if (response.length > 0) {
                response.forEach(item => {
                    const card = document.createElement('div');
                    card.classList.add('blog-card');
                    card.innerHTML = `
                    <a target="_blank" rel='noopener noreferrer' style="background-image: url('${item?.featured_image_url}');" href="${item?.slug}">
                    <p class="blog-title">${item?.acf?.blog_title}</p>
                    <p class="blog-publish-date">${item?.date.split('T')[0]}</p>
                    </a>
                    `;
                    blogContainer.appendChild(card);
                })
            }
        }
        createCard();

        nextBtn.addEventListener('click', function () {
            num++;
            createCard(num)
        })
        prevBtn.addEventListener('click', function () {
            num--;
            createCard(num)
        })

    })();
}