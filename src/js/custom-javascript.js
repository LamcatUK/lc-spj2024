// Add your custom JS here.
AOS.init({
    duration: 1000, // values from 0 to 3000, with step 50ms
    once: true,
});

document.addEventListener('DOMContentLoaded', function() {

    // HIDE NAV

    const navbar = document.getElementById('navigation');

    let lastScrollPosition = 0;
    const navbarHeight = 0; // Get the height of the navbar
    const smallerScrollThreshold = 200; // Threshold for adding the .smaller class
  
    window.addEventListener('scroll', function() {
        const currentScroll = window.scrollY || document.documentElement.scrollTop;
  
        if (currentScroll > smallerScrollThreshold) {
            // Add .smaller class if scrolled more than the threshold
            // navbar.classList.add('smaller');
  
            if (currentScroll > lastScrollPosition) {
                // Down scroll
                navbar.classList.add('hidden');
            } else {
                // Up scroll
                navbar.classList.remove('hidden');
            }
        }
        //  else {
        //     // Remove .smaller class if scrolled less than the threshold
        //     navbar.classList.remove('smaller');
        // }
  
        lastScrollPosition = currentScroll <= 0 ? 0 : currentScroll;
    });

    // SLIDER

    var latestSlider = new Swiper('.reviews__slider', {
        loop: true,
        autoplay: {
            delay: 4000,
            disableOnInteraction: true,
        },
        pagination: {
            el: '.swiper-pagination-reviews',
            clickable: true,
            dynamicBullets: true,
        },
        slidesPerView: 1,
        slidesPerGroup: 1,
        spaceBetween: 18, // Adjust this value to match your design
        on: {
            init: function() {
                setEqualHeight('.reviews__slide');
            },
            resize: function() {
                setEqualHeight('.reviews__slide');
            }
        }
    });

    window.addEventListener('load', setEqualHeight('.reviews__slide'));

    var imageSlider = new Swiper('.image_slider__slider', {
        loop: true,
        autoplay: {
            delay: 4000,
            disableOnInteraction: true,
        },
        pagination: {
            el: '.swiper-pagination-slider',
            clickable: true,
            dynamicBullets: true,
        },
        slidesPerView: 3,
        slidesPerGroup: 1,
        spaceBetween: 18, // Adjust this value to match your design
        on: {
            init: function() {
                setEqualHeight('.image_slider__slide');
            },
            resize: function() {
                setEqualHeight('.image_slider__slide');
            }
        }
    });

    window.addEventListener('load', setEqualHeight('.image_slider__slide'));

    function setEqualHeight(slider) {
        let maxHeight = 0;
        const slides = document.querySelectorAll(slider);
    
        // Remove existing heights to recalculate
        slides.forEach(slide => {
            slide.style.height = 'auto';
        });
    
        // Find the maximum height
        slides.forEach(slide => {
            if (slide.offsetHeight > maxHeight) {
                maxHeight = slide.offsetHeight;
            }
        });
    
        // Set all slides to the maximum height
        slides.forEach(slide => {
            slide.style.height = `${maxHeight}px`;
        });
    }
    const gradients = [
        { x: 85, y: 6, color: 'var(--col-blue-400)', vx: 0.2, vy: 0.1 },
        { x: 36, y: 0, color: 'var(--col-orange-400)', vx: 0.1, vy: 0.2 },
        { x: 10, y: 52, color: 'var(--col-yellow-400)', vx: 0.15, vy: 0.15 },
        { x: 2, y: 48, color: 'var(--col-pink-400)', vx: 0.2, vy: 0.1 },
        { x: 62, y: 92, color: 'var(--col-aqua-400)', vx: 0.1, vy: 0.2 },
    ];
    let animationInterval;
    
    function updateGradient() {
        const gradientElement = document.getElementById('animatedGradient');
        gradientElement.style.backgroundImage = generateGradientStyle();
    }
    
    function generateGradientStyle() {
        return gradients.map(gradient => {
            return `radial-gradient(at ${gradient.x}% ${gradient.y}%, ${gradient.color} 0px, transparent 50%)`;
        }).join(", ");
    }
    
    function animateGradients() {
        gradients.forEach(gradient => {
            gradient.x += gradient.vx;
            gradient.y += gradient.vy;
    
            if (gradient.x <= 0 || gradient.x >= 100) gradient.vx *= -1;
            if (gradient.y <= 0 || gradient.y >= 100) gradient.vy *= -1;
        });
        updateGradient();
    }
    
    function startAnimation() {
        if (!animationInterval) {
            updateGradient();
            animationInterval = setInterval(animateGradients, 20);
        }
    }
    
    function stopAnimation() {
        if (animationInterval) {
            clearInterval(animationInterval);
            animationInterval = null;
        }
    }
    
    // Set up an intersection observer to manage the animation
    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                startAnimation();
            } else {
                stopAnimation();
            }
        });
    }, { threshold: 0.1 });  // Adjust threshold as needed
    
    observer.observe(document.getElementById('animatedGradient'));
});

