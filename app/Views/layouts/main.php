<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($settings['site_title'] ?? 'My Portfolio') ?></title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700;900&family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Rajdhani', 'sans-serif'],
                        display: ['Orbitron', 'sans-serif'],
                    },
                    colors: {
                        primary: '#00f0ff', // Cyberpunk Cyan
                        secondary: '#ff003c', // Cyberpunk Red
                        accent: '#fcee0a', // Cyberpunk Yellow
                        dark: '#050505', // Deep Black
                    },
                    animation: {
                        'blob': 'blob 7s infinite',
                    },
                    keyframes: {
                        blob: {
                            '0%': { transform: 'translate(0px, 0px) scale(1)' },
                            '33%': { transform: 'translate(30px, -50px) scale(1.1)' },
                            '66%': { transform: 'translate(-20px, 20px) scale(0.9)' },
                            '100%': { transform: 'translate(0px, 0px) scale(1)' },
                        }
                    }
                }
            }
        }
    </script>

    <!-- GSAP & ScrollTrigger -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

    <!-- Vanilla Tilt for 3D Effects -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.8.1/vanilla-tilt.min.js" integrity="sha512-wC/g5368cx-o1T52vKzXqT2sErNntJPiA8Xo4XJ3iZtI6N/tA03K1/nL6xS11q2T1zN89g+j/l5U1+W25S1L1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Spline 3D Viewer -->
    <script type="module" src="https://unpkg.com/@splinetool/viewer@1.0.94/build/spline-viewer.js"></script>

    <style>
        /* Cyberpunk Anti-Selection / Anti-Drag Protection */
        body {
            -webkit-user-select: none; /* Safari */
            -moz-user-select: none; /* Firefox */
            -ms-user-select: none; /* IE10+/Edge */
            user-select: none; /* Standard */
        }
        img {
            -webkit-user-drag: none;
            -khtml-user-drag: none;
            -moz-user-drag: none;
            -o-user-drag: none;
        }
    </style>
</head>
<body class="bg-dark text-gray-200 font-sans antialiased overflow-x-hidden select-none cursor-default">
    <!-- Global Spline 3D Background -->
    <div class="fixed inset-0 z-0 opacity-80">
        <spline-viewer url="https://prod.spline.design/PyzDhpQ9E5f1E3MT/scene.splinecode" events-target="global"></spline-viewer>
    </div>
    <!-- Radial gradient overlay to blend 3D model with background -->
    <div class="fixed inset-0 z-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-transparent via-dark/50 to-dark pointer-events-none"></div>
    <!-- Custom GSAP Cursor -->
    <div id="cursor" class="fixed top-0 left-0 w-2 h-2 bg-primary rounded-none pointer-events-none z-[100] shadow-[0_0_10px_rgba(0,240,255,1)] hidden md:block" style="transform: translate(-50%, -50%);"></div>
    <div id="cursor-follower" class="fixed top-0 left-0 w-10 h-10 border border-secondary/50 rounded-none pointer-events-none z-[100] shadow-[inset_0_0_10px_rgba(255,0,60,0.3)] hidden md:block" style="transform: translate(-50%, -50%);">
        <div class="absolute top-1/2 -left-2 w-2 h-px bg-secondary"></div>
        <div class="absolute top-1/2 -right-2 w-2 h-px bg-secondary"></div>
        <div class="absolute -top-2 left-1/2 w-px h-2 bg-secondary"></div>
        <div class="absolute -bottom-2 left-1/2 w-px h-2 bg-secondary"></div>
    </div>

    <?php require BASE_PATH . '/app/Views/components/navbar.php'; ?>

    <main class="relative z-10 pointer-events-none">
        <?= $content ?? '' ?>
    </main>

    <?php require BASE_PATH . '/app/Views/components/footer.php'; ?>

    <script src="/assets/js/app.js"></script>
</body>
</html>
