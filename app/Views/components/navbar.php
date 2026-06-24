<nav class="fixed w-full z-50 transition-all duration-300" id="navbar">
    <!-- Glassmorphism background effect added via JS on scroll -->
    <div class="absolute inset-0 bg-dark/70 backdrop-blur-md border-b border-white/10 opacity-0 transition-opacity duration-300" id="navbar-bg"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex justify-between items-center h-20 transition-all duration-300" id="navbar-container">
            <div class="flex items-center justify-between w-full md:w-auto">
                <a href="/" class="text-2xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary">
                    <?= htmlspecialchars($settings['site_title'] ?? 'Portofolioku') ?>
                </a>
                
                <!-- Mobile menu button -->
                <div class="flex md:hidden">
                    <button type="button" id="mobile-menu-button" class="text-gray-300 hover:text-white focus:outline-none p-2 rounded-lg hover:bg-white/10 transition-colors">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>
            
            <!-- Desktop menu -->
            <div class="hidden md:flex md:items-center md:space-x-8">
                <a href="/#about" class="nav-link text-gray-300 hover:text-white transition-colors duration-200 font-medium text-sm tracking-wide">About</a>
                <a href="/#projects" class="nav-link text-gray-300 hover:text-white transition-colors duration-200 font-medium text-sm tracking-wide">Projects</a>
                <a href="/#skills" class="nav-link text-gray-300 hover:text-white transition-colors duration-200 font-medium text-sm tracking-wide">Skills</a>
                <a href="/#contact" class="px-5 py-2.5 rounded-full bg-white/10 hover:bg-white/20 border border-white/10 text-white font-medium text-sm transition-all duration-300 backdrop-blur-sm">Contact Me</a>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Panel -->
    <div class="md:hidden hidden bg-dark/95 backdrop-blur-xl border-b border-white/10 absolute w-full left-0 top-full shadow-2xl" id="mobile-menu">
        <div class="px-4 pt-4 pb-8 space-y-4 flex flex-col items-center">
            <a href="/#about" class="mobile-link block px-3 py-2 text-lg font-medium text-gray-300 hover:text-white">About</a>
            <a href="/#projects" class="mobile-link block px-3 py-2 text-lg font-medium text-gray-300 hover:text-white">Projects</a>
            <a href="/#skills" class="mobile-link block px-3 py-2 text-lg font-medium text-gray-300 hover:text-white">Skills</a>
            <a href="/#contact" class="mobile-link mt-4 inline-block px-8 py-3 rounded-full bg-primary hover:bg-indigo-500 transition-colors text-white font-medium shadow-lg shadow-primary/30">Contact Me</a>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const btn = document.getElementById('mobile-menu-button');
        const menu = document.getElementById('mobile-menu');
        
        if(btn && menu) {
            btn.addEventListener('click', () => {
                menu.classList.toggle('hidden');
                // Toggle background if menu is open
                const navBg = document.getElementById('navbar-bg');
                if(!menu.classList.contains('hidden')) {
                    navBg.classList.remove('opacity-0');
                    navBg.classList.add('opacity-100');
                } else if(window.scrollY < 50) {
                    navBg.classList.add('opacity-0');
                    navBg.classList.remove('opacity-100');
                }
            });
            
            // Close menu when clicking a link
            const links = menu.querySelectorAll('.mobile-link');
            links.forEach(link => {
                link.addEventListener('click', () => {
                    menu.classList.add('hidden');
                });
            });
        }
    });
</script>
