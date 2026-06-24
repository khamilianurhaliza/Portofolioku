<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($settings['site_title'] ?? 'My Portfolio') ?></title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                    },
                    colors: {
                        primary: '#6366f1', // Indigo-500
                        secondary: '#ec4899', // Pink-500
                        dark: '#0f172a', // Slate-900
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
</head>
<body class="bg-dark text-gray-200 font-sans antialiased overflow-x-hidden selection:bg-primary selection:text-white cursor-default">
    <!-- Custom GSAP Cursor -->
    <div id="cursor" class="fixed top-0 left-0 w-3 h-3 bg-white rounded-full pointer-events-none z-[100] mix-blend-difference hidden md:block" style="transform: translate(-50%, -50%);"></div>
    <div id="cursor-follower" class="fixed top-0 left-0 w-10 h-10 border border-white/50 rounded-full pointer-events-none z-[100] mix-blend-difference hidden md:block" style="transform: translate(-50%, -50%);"></div>

    <?php require BASE_PATH . '/app/Views/components/navbar.php'; ?>

    <main class="relative z-10">
        <?= $content ?? '' ?>
    </main>

    <?php require BASE_PATH . '/app/Views/components/footer.php'; ?>

    <script src="/assets/js/app.js"></script>
</body>
</html>
