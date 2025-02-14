AOS.init();
// You can also pass an optional settings object
// below listed default settings
AOS.init({
  
  // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
  offset: 120, // offset (in px) from the original trigger point
  delay: 0, // values from 0 to 3000, with step 50ms
  duration: 700, // values from 0 to 3000, with step 50ms
  easing: 'ease', // default easing for AOS animations
  once: false, // whether animation should happen only once - while scrolling down
  mirror: false, // whether elements should animate out while scrolling past them
  anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

});


    const textElement = document.getElementById('dynamic-text');
    const phrases = [
        "FRONTEND DEVELOPER",
        "WEB DEVELOPER",
        "SOFTWARE DEVELOPER",
    ];
    let currentPhraseIndex = 0;
    let currentText = '';
    let isDeleting = false;
    let charIndex = 0;
    let typingSpeed = 100;
    let deletingSpeed = 50;

    function typeEffect() {
        const currentPhrase = phrases[currentPhraseIndex];

        if (isDeleting) {
            currentText = currentPhrase.substring(0, charIndex - 1);
            charIndex--;
        } else {
            currentText = currentPhrase.substring(0, charIndex + 1);
            charIndex++;
        }

        textElement.textContent = currentText;

        if (!isDeleting && charIndex === currentPhrase.length) {
            setTimeout(() => {
                isDeleting = true;
            }, 1000); // Wait before deleting
        } else if (isDeleting && charIndex === 0) {
            isDeleting = false;
            currentPhraseIndex = (currentPhraseIndex + 1) % phrases.length; // Move to next phrase
        }

        const speed = isDeleting ? deletingSpeed : typingSpeed;
        setTimeout(typeEffect, speed);
    }

    typeEffect(); // Start the typing effect
