<nav class="fixed w-full z-50 transition-all duration-300" id="navbar">
    <!-- Glassmorphism background effect added via JS on scroll -->
    <div class="absolute inset-0 bg-dark/70 backdrop-blur-md border-b border-white/10 opacity-0 transition-opacity duration-300" id="navbar-bg"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex justify-between items-center h-20 transition-all duration-300" id="navbar-container">
            <div class="flex items-center justify-between w-full md:w-auto">
                <a href="/" class="text-2xl font-display font-black tracking-widest uppercase text-white hover:text-primary transition-colors drop-shadow-[0_0_10px_rgba(0,240,255,0.5)]">
                    > <?= htmlspecialchars($settings['site_title'] ?? 'Portofolioku') ?>_
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
                <a href="/#about" class="nav-link text-gray-300 hover:text-primary transition-colors duration-200 font-display font-bold uppercase text-sm tracking-widest">[ ABOUT ]</a>
                <a href="/#projects" class="nav-link text-gray-300 hover:text-primary transition-colors duration-200 font-display font-bold uppercase text-sm tracking-widest">[ PROJECTS ]</a>
                <a href="/#skills" class="nav-link text-gray-300 hover:text-primary transition-colors duration-200 font-display font-bold uppercase text-sm tracking-widest">[ SKILLS ]</a>
                <a href="/#contact" class="px-5 py-2.5 rounded-sm bg-primary/20 hover:bg-primary border border-primary text-primary hover:text-dark font-display font-bold uppercase text-sm transition-all duration-300 backdrop-blur-sm shadow-[0_0_10px_rgba(0,240,255,0.3)] hover:shadow-[0_0_20px_rgba(0,240,255,0.8)]">> CONTACT_</a>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Panel -->
    <div class="md:hidden hidden bg-dark/95 backdrop-blur-xl border-b border-white/10 absolute w-full left-0 top-full shadow-2xl" id="mobile-menu">
        <div class="px-4 pt-4 pb-8 space-y-4 flex flex-col items-center">
            <a href="/#about" class="mobile-link block px-3 py-2 text-lg font-display font-bold tracking-widest uppercase text-gray-300 hover:text-primary">[ ABOUT ]</a>
            <a href="/#projects" class="mobile-link block px-3 py-2 text-lg font-display font-bold tracking-widest uppercase text-gray-300 hover:text-primary">[ PROJECTS ]</a>
            <a href="/#skills" class="mobile-link block px-3 py-2 text-lg font-display font-bold tracking-widest uppercase text-gray-300 hover:text-primary">[ SKILLS ]</a>
            <a href="/#contact" class="mobile-link mt-4 inline-block px-8 py-3 rounded-sm border border-primary bg-primary/20 hover:bg-primary hover:text-dark transition-colors text-primary font-display font-bold tracking-widest uppercase shadow-[0_0_15px_rgba(0,240,255,0.4)]">> CONTACT_</a>
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
