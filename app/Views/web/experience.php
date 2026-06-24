<?php ob_start(); ?>

<div class="min-h-screen bg-dark pt-24 pb-20">
    <!-- Breadcrumb & Back Link -->
    <div class="container mx-auto px-4 max-w-4xl mb-8 relative z-10">
        <a href="/" class="inline-flex items-center text-gray-400 hover:text-white transition-colors bg-white/5 hover:bg-white/10 px-4 py-2 rounded-lg backdrop-blur-md border border-white/5">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Back to Home
        </a>
    </div>

    <div class="container mx-auto px-4 max-w-4xl relative z-10">
        <div class="bg-white/5 border border-white/10 rounded-3xl p-8 md:p-12 backdrop-blur-xl shadow-2xl">
            <!-- Header Section -->
            <div class="mb-10 pb-10 border-b border-white/10">
                <div class="inline-flex items-center space-x-2 bg-primary/20 text-primary px-4 py-1.5 rounded-full text-sm font-semibold mb-6 border border-primary/20">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    <span>Experience Detail</span>
                </div>
                
                <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4 tracking-tight leading-tight">
                    <?= htmlspecialchars($experience['position']) ?>
                </h1>
                
                <div class="flex flex-col md:flex-row md:items-center text-gray-400 text-lg gap-4">
                    <div class="flex items-center text-secondary font-semibold">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        <?= htmlspecialchars($experience['company']) ?>
                    </div>
                    <div class="hidden md:block w-1.5 h-1.5 rounded-full bg-gray-600"></div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <?= date('M Y', strtotime($experience['start_date'])) ?> - <?= $experience['end_date'] ? date('M Y', strtotime($experience['end_date'])) : '<span class="text-green-400 ml-1">Present</span>' ?>
                    </div>
                </div>
            </div>

            <!-- Content Section -->
            <div class="prose prose-invert prose-lg max-w-none text-gray-300">
                <?= $experience['description'] ?>
            </div>
        </div>
    </div>

    <!-- Decorative Blobs -->
    <div class="fixed top-1/4 -right-64 w-96 h-96 bg-primary rounded-full mix-blend-multiply filter blur-3xl opacity-10 pointer-events-none"></div>
    <div class="fixed bottom-1/4 -left-64 w-96 h-96 bg-secondary rounded-full mix-blend-multiply filter blur-3xl opacity-10 pointer-events-none"></div>
</div>

<?php 
$content = ob_get_clean(); 
require BASE_PATH . '/app/Views/layouts/main.php'; 
?>
