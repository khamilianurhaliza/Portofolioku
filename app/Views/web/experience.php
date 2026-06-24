<?php ob_start(); ?>

<div class="min-h-screen bg-transparent pt-24 pb-20">
    <!-- Breadcrumb & Back Link -->
    <div class="container mx-auto px-4 max-w-4xl mb-8 relative z-10 pointer-events-auto">
        <a href="/" class="group inline-flex items-center space-x-3 text-sm font-display font-bold tracking-widest uppercase text-primary hover:text-white transition-colors bg-dark/80 hover:bg-primary/20 px-5 py-2.5 rounded-sm border border-primary backdrop-blur-md">
            <svg class="w-4 h-4 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            <span>< BACK_TO_ROOT</span>
        </a>
    </div>

    <div class="container mx-auto px-4 max-w-4xl relative z-10 pointer-events-auto">
        <div class="bg-dark/80 border border-white/10 rounded-sm p-8 md:p-12 backdrop-blur-xl shadow-[0_0_30px_rgba(0,0,0,0.8)] relative before:absolute before:inset-0 before:border before:border-primary/20 before:m-2 before:pointer-events-none">
            <!-- Header Section -->
            <div class="mb-10 pb-10 border-b border-white/10 relative z-10">
                <div class="inline-flex items-center space-x-2 bg-primary/20 text-primary px-4 py-1.5 rounded-sm text-xs font-display font-bold uppercase tracking-widest mb-6 border border-primary/50">
                    <span class="w-2 h-2 rounded-sm bg-primary animate-pulse"></span>
                    <span>EXPERIENCE_LOG</span>
                </div>
                
                <h1 class="text-4xl md:text-5xl font-display font-black uppercase tracking-widest text-white mb-4 drop-shadow-[0_0_15px_rgba(0,240,255,0.4)]">
                    > <?= htmlspecialchars($experience['position']) ?>_
                </h1>
                
                <div class="flex flex-col md:flex-row md:items-center text-gray-400 font-mono text-sm gap-4">
                    <div class="flex items-center text-secondary font-bold uppercase">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        [ <?= htmlspecialchars($experience['company']) ?> ]
                    </div>
                    <div class="hidden md:block w-1.5 h-1.5 rounded-none bg-primary"></div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        SYS.TIME: <?= date('M Y', strtotime($experience['start_date'])) ?> - <?= $experience['end_date'] ? date('M Y', strtotime($experience['end_date'])) : '<span class="text-primary ml-1 animate-pulse">ACTIVE_STATUS</span>' ?>
                    </div>
                </div>
            </div>

            <!-- Content Section -->
            <div class="prose prose-invert prose-lg max-w-none text-gray-300 font-mono text-base relative z-10 leading-relaxed">
                <?= $experience['description'] ?>
            </div>
        </div>
    </div>

</div>

<?php 
$content = ob_get_clean(); 
require BASE_PATH . '/app/Views/layouts/main.php'; 
?>
