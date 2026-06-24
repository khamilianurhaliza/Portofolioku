document.addEventListener('DOMContentLoaded', () => {
    
    // Register GSAP ScrollTrigger
    gsap.registerPlugin(ScrollTrigger);

    // Navbar Glassmorphism Effect on Scroll
    const navbarBg = document.getElementById('navbar-bg');
    const navbarContainer = document.getElementById('navbar-container');
    
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbarBg?.classList.remove('opacity-0');
            navbarBg?.classList.add('opacity-100');
            navbarContainer?.classList.remove('h-20');
            navbarContainer?.classList.add('h-16');
        } else {
            navbarBg?.classList.add('opacity-0');
            navbarBg?.classList.remove('opacity-100');
            navbarContainer?.classList.add('h-20');
            navbarContainer?.classList.remove('h-16');
        }
    });

    // Smooth scrolling for anchor links
    document.querySelectorAll('a.nav-link, a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if(href.startsWith('#') && href !== '#') {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    const headerOffset = 80;
                    const elementPosition = target.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
    
                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }
            }
        });
    });

    // --- ADVANCED GSAP ANIMATIONS ---

    // 0. Custom Cursor Animation
    const cursor = document.getElementById('cursor');
    const follower = document.getElementById('cursor-follower');
    
    if(cursor && follower) {
        let posX = 0, posY = 0, mouseX = 0, mouseY = 0;
        
        gsap.to({}, 0.016, {
            repeat: -1,
            onRepeat: function() {
                posX += (mouseX - posX) / 9;
                posY += (mouseY - posY) / 9;
                
                gsap.set(follower, {
                    css: { left: posX, top: posY }
                });
                gsap.set(cursor, {
                    css: { left: mouseX, top: mouseY }
                });
            }
        });

        window.addEventListener('mousemove', (e) => {
            mouseX = e.clientX;
            mouseY = e.clientY;
        });

        // Add hover effect for links and buttons
        const hoverElements = document.querySelectorAll('a, button, input, textarea, select, .cursor-pointer');
        hoverElements.forEach(el => {
            el.addEventListener('mouseenter', () => {
                gsap.to(cursor, { scale: 0, duration: 0.3 });
                gsap.to(follower, { scale: 1.5, backgroundColor: 'rgba(255,255,255,0.1)', borderColor: 'transparent', duration: 0.3 });
            });
            el.addEventListener('mouseleave', () => {
                gsap.to(cursor, { scale: 1, duration: 0.3 });
                gsap.to(follower, { scale: 1, backgroundColor: 'transparent', borderColor: 'rgba(255,255,255,0.5)', duration: 0.3 });
            });
        });
    }

    // 1. Hero Section Initial Load Animation
    // Create a cool stagger effect for the hero texts
    const heroTimeline = gsap.timeline({ defaults: { ease: 'expo.out' } });
    
    heroTimeline.fromTo('.gsap-hero-item', 
        { y: 80, opacity: 0, rotationX: -20 },
        { y: 0, opacity: 1, rotationX: 0, duration: 1.5, stagger: 0.15, delay: 0.2, transformOrigin: '0% 50% -50' }
    );

    // Add subtle parallax to ambient blobs
    gsap.utils.toArray('.animate-blob').forEach(blob => {
        gsap.to(blob, {
            yPercent: 30,
            ease: "none",
            scrollTrigger: {
                trigger: "#hero",
                start: "top top",
                end: "bottom top",
                scrub: true
            } 
        });
    });

    // 2. High-end Fade Up for general elements (Staggered if multiple)
    gsap.utils.toArray('section').forEach(section => {
        const elements = section.querySelectorAll('.gsap-fade-up');
        if(elements.length > 0) {
            gsap.fromTo(elements, 
                { y: 100, opacity: 0 },
                {
                    y: 0,
                    opacity: 1,
                    duration: 1.2,
                    stagger: 0.2,
                    ease: 'expo.out',
                    scrollTrigger: {
                        trigger: section,
                        start: 'top 75%',
                        toggleActions: 'play none none reverse'
                    }
                }
            );
        }
    });

    // 3. Slide Right for Experience Timeline with Spring effect
    gsap.utils.toArray('.gsap-slide-right').forEach((element, i) => {
        gsap.fromTo(element, 
            { x: -100, opacity: 0 },
            {
                x: 0,
                opacity: 1,
                duration: 1,
                ease: 'elastic.out(1, 0.75)',
                scrollTrigger: {
                    trigger: element,
                    start: 'top 85%',
                    toggleActions: 'play none none reverse'
                }
            }
        );
    });

    // 4. Pop In for Skills with rotation
    gsap.utils.toArray('.gsap-pop-in').forEach((element, i) => {
        gsap.fromTo(element, 
            { scale: 0.5, opacity: 0, rotationY: 45 },
            {
                scale: 1,
                opacity: 1,
                rotationY: 0,
                duration: 0.8,
                ease: 'back.out(1.5)',
                scrollTrigger: {
                    trigger: element,
                    start: 'top 85%',
                    toggleActions: 'play none none reverse'
                }
            }
        );
    });

    // 5. Animate Skill Progress Bars Dynamically
    gsap.utils.toArray('.skill-progress').forEach(bar => {
        const targetWidth = bar.getAttribute('data-width');
        gsap.fromTo(bar, 
            { width: '0%' },
            {
                width: targetWidth,
                duration: 2,
                ease: 'power4.out',
                scrollTrigger: {
                    trigger: bar,
                    start: 'top 95%',
                }
            }
        );
    });

    // 6. Project detail page hero animations
    if(document.querySelector('header.relative.z-20')) {
        gsap.fromTo('header.relative.z-20 h1', 
            { y: 50, opacity: 0, clipPath: 'inset(100% 0 0 0)' },
            { y: 0, opacity: 1, clipPath: 'inset(0% 0 0 0)', duration: 1.2, ease: 'expo.out', delay: 0.1 }
        );
        gsap.fromTo('header.relative.z-20 img', 
            { scale: 1.2, opacity: 0, filter: 'blur(20px)' },
            { scale: 1, opacity: 1, filter: 'blur(0px)', duration: 1.5, ease: 'power3.out', delay: 0.3 }
        );
    }

    // 7. Parallax Image reveals
    gsap.utils.toArray('img').forEach(img => {
        // Prevent animating SVG icons or small logos, target project images
        if(img.classList.contains('object-cover')) {
            gsap.fromTo(img, 
                { yPercent: -10 },
                {
                    yPercent: 10,
                    ease: "none",
                    scrollTrigger: {
                        trigger: img.parentElement,
                        start: "top bottom",
                        end: "bottom top",
                        scrub: true
                    }
                }
            );
        }
    });

    // 8. Anti Right-Click and Inspect Protection
    // Prevent right click
    document.addEventListener('contextmenu', function(e) {
        e.preventDefault();
    });

    // Prevent common inspection shortcut keys
    document.addEventListener('keydown', function(e) {
        // F12
        if (e.key === 'F12' || e.keyCode === 123) {
            e.preventDefault();
        }
        // Ctrl+Shift+I (Inspect)
        if (e.ctrlKey && e.shiftKey && (e.key === 'I' || e.key === 'i')) {
            e.preventDefault();
        }
        // Ctrl+Shift+J (Console)
        if (e.ctrlKey && e.shiftKey && (e.key === 'J' || e.key === 'j')) {
            e.preventDefault();
        }
        // Ctrl+Shift+C (Inspect Element)
        if (e.ctrlKey && e.shiftKey && (e.key === 'C' || e.key === 'c')) {
            e.preventDefault();
        }
        // Ctrl+U (View Source)
        if (e.ctrlKey && (e.key === 'U' || e.key === 'u')) {
            e.preventDefault();
        }
    });

    console.log("Portofolioku Advanced GSAP Animations Loaded Successfully.");
});
