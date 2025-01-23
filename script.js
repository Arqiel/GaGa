let slides = document.querySelectorAll('.slideshow img');
        let currentIndex = 0;

        function showNextSlide() {
            slides[currentIndex].classList.remove('active');
            currentIndex = (currentIndex + 1) % slides.length;
            slides[currentIndex].classList.add('active');
        }

        setInterval(showNextSlide, 3000);


//სამბურგერ მენიუ

        function toggleMenu() {
            const menu = document.getElementById("menu");
            const hamburger = document.querySelector(".hamburger-menu");
            menu.style.display = (menu.style.display === "block") ? "none" : "block";
            hamburger.classList.toggle("active");
        }