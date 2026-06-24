<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Portofolioku</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Outfit', 'sans-serif'] },
                    colors: { primary: '#6366f1', dark: '#0f172a', light: '#f8fafc' }
                }
            }
        }
    </script>
    
    <!-- Quill WYSIWYG Editor -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
</head>
<body class="bg-light font-sans antialiased text-gray-800">

    <div class="flex h-screen overflow-hidden bg-light">
        
        <!-- Mobile Sidebar Overlay -->
        <div id="sidebar-overlay" class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm z-40 hidden lg:hidden transition-opacity"></div>

        <!-- Sidebar -->
        <aside id="sidebar" class="fixed inset-y-0 left-0 w-72 bg-dark text-white flex flex-col transition-transform duration-300 shadow-2xl z-50 -translate-x-full lg:translate-x-0 lg:static lg:h-screen">
            <div class="h-20 flex items-center px-8 border-b border-white/10">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg bg-gradient-to-tr from-primary to-pink-500 flex items-center justify-center shadow-lg">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <span class="text-xl font-bold tracking-wide">CMS Panel</span>
                </div>
            </div>
            
            <nav class="flex-1 px-4 py-8 space-y-2 overflow-y-auto">
                <p class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Menu</p>
                <a href="/admin/dashboard" class="flex items-center px-4 py-3 rounded-xl transition-all <?= strpos($_SERVER['REQUEST_URI'], 'dashboard') !== false ? 'bg-primary text-white shadow-lg shadow-primary/30' : 'text-gray-300 hover:bg-white/5 hover:text-white' ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    Dashboard
                </a>
                <a href="/admin/projects" class="flex items-center px-4 py-3 rounded-xl transition-all <?= strpos($_SERVER['REQUEST_URI'], 'projects') !== false ? 'bg-primary text-white shadow-lg shadow-primary/30' : 'text-gray-300 hover:bg-white/5 hover:text-white' ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    Projects
                </a>
                <a href="/admin/technologies" class="flex items-center px-4 py-3 rounded-xl transition-all <?= strpos($_SERVER['REQUEST_URI'], 'technologies') !== false ? 'bg-primary text-white shadow-lg shadow-primary/30' : 'text-gray-300 hover:bg-white/5 hover:text-white' ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                    Technologies
                </a>
                <a href="/admin/skills" class="flex items-center px-4 py-3 rounded-xl transition-all <?= strpos($_SERVER['REQUEST_URI'], 'skills') !== false ? 'bg-primary text-white shadow-lg shadow-primary/30' : 'text-gray-300 hover:bg-white/5 hover:text-white' ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    Skills
                </a>
                <a href="/admin/experiences" class="flex items-center px-4 py-3 rounded-xl transition-all <?= strpos($_SERVER['REQUEST_URI'], 'experiences') !== false ? 'bg-primary text-white shadow-lg shadow-primary/30' : 'text-gray-300 hover:bg-white/5 hover:text-white' ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    Experiences
                </a>
                <a href="/admin/settings" class="flex items-center px-4 py-3 rounded-xl transition-all <?= strpos($_SERVER['REQUEST_URI'], 'settings') !== false ? 'bg-primary text-white shadow-lg shadow-primary/30' : 'text-gray-300 hover:bg-white/5 hover:text-white' ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    Settings
                </a>
            </nav>
            
            <div class="p-4 border-t border-white/10 bg-dark">
                <form action="/admin/logout" method="POST">
                    <button type="submit" class="w-full flex items-center px-4 py-3 text-red-400 hover:bg-red-500/10 hover:text-red-300 rounded-xl transition-all">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden relative w-full lg:w-auto">
            <!-- Decorative background elements for main area -->
            <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-primary/5 rounded-full mix-blend-multiply filter blur-3xl -translate-y-1/2 translate-x-1/3 pointer-events-none"></div>

            <!-- Top Header -->
            <header class="h-20 bg-white/80 backdrop-blur-md border-b border-gray-200 flex items-center justify-between px-4 lg:px-8 relative z-10 sticky top-0">
                <div class="flex items-center gap-3">
                    <button id="sidebar-toggle" class="lg:hidden p-2 text-gray-600 hover:bg-gray-100 rounded-lg transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>
                    <h1 class="text-xl lg:text-2xl font-bold text-gray-800 tracking-tight hidden sm:block">Welcome, <span class="text-primary"><?= htmlspecialchars($_SESSION['username'] ?? 'Admin') ?></span> 👋</h1>
                </div>
                
                <div class="flex items-center gap-4">
                    <a href="/" target="_blank" class="text-sm font-medium text-gray-500 hover:text-primary transition-colors flex items-center bg-gray-100 hover:bg-gray-200 px-4 py-2 rounded-full">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                        View Live Site
                    </a>
                    <div class="w-10 h-10 rounded-full bg-gradient-to-r from-primary to-pink-500 p-0.5 shadow-md cursor-pointer">
                        <div class="w-full h-full bg-white rounded-full flex items-center justify-center">
                            <span class="font-bold text-primary"><?= strtoupper(substr($_SESSION['username'] ?? 'A', 0, 1)) ?></span>
                        </div>
                    </div>
                </div>
            </header>
            
            <!-- Dynamic Content Area -->
            <main class="flex-1 overflow-y-auto p-8 relative z-10 scroll-smooth">
                <div class="max-w-6xl mx-auto">
                    <?= $content ?? '' ?>
                </div>
            </main>
        </div>
        
    </div>

    <script>
        // Admin Sidebar Toggle Logic
        document.addEventListener('DOMContentLoaded', () => {
            const sidebar = document.getElementById('sidebar');
            const toggle = document.getElementById('sidebar-toggle');
            const overlay = document.getElementById('sidebar-overlay');
            
            if(toggle && sidebar && overlay) {
                toggle.addEventListener('click', () => {
                    sidebar.classList.toggle('-translate-x-full');
                    overlay.classList.toggle('hidden');
                });
                
                overlay.addEventListener('click', () => {
                    sidebar.classList.add('-translate-x-full');
                    overlay.classList.add('hidden');
                });
            }
        });
    </script>
</body>
</html>
