<?php ob_start(); ?>

<div class="min-h-screen bg-transparent relative overflow-hidden selection:bg-primary/30 selection:text-primary-100">

    <!-- Navigation / Breadcrumb -->
    <nav class="relative z-20 pt-28 lg:pt-32 pb-6 pointer-events-auto">
        <div class="container mx-auto px-6 lg:px-12 max-w-7xl">
            <a href="/#projects" class="group inline-flex items-center space-x-3 text-sm font-display font-bold tracking-widest uppercase text-primary hover:text-white transition-colors bg-dark/80 hover:bg-primary/20 px-5 py-2.5 rounded-sm border border-primary backdrop-blur-md">
                <svg class="w-4 h-4 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                <span>< BACK_TO_ROOT</span>
            </a>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="relative z-20 pt-8 pb-20 lg:pt-16 lg:pb-32 pointer-events-auto">
        <div class="container mx-auto px-6 lg:px-12 max-w-7xl">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 lg:gap-12 items-start relative">
                
                <!-- Project Meta (Left - Sticky) -->
                <div class="lg:col-span-5 order-1 lg:sticky lg:top-32 flex flex-col justify-start">
                    <div class="inline-flex items-center space-x-2 bg-primary/20 text-primary px-4 py-1.5 rounded-sm text-xs font-display font-bold tracking-widest uppercase mb-6 border border-primary w-max">
                        <span class="w-2 h-2 rounded-sm bg-primary animate-pulse"></span>
                        <span>[ DATA_ENTRY_FOUND ]</span>
                    </div>
                    
                    <h1 class="text-5xl lg:text-7xl font-display font-black uppercase tracking-widest text-white mb-8 drop-shadow-[0_0_15px_rgba(0,240,255,0.4)]">
                        > <?= htmlspecialchars($project['title']) ?>_
                    </h1>
                    
                    <!-- Technology Stack -->
                    <?php if(!empty($project['technologies'])): ?>
                    <div class="mb-10">
                        <p class="text-sm font-display font-bold text-secondary uppercase tracking-widest mb-4">>> SYS.MODULES_LOADED</p>
                        <div class="flex flex-wrap gap-2.5">
                            <?php foreach($project['technologies'] as $tech): ?>
                                <span class="inline-flex items-center px-4 py-1.5 text-sm font-display font-bold uppercase tracking-wider rounded-none text-white <?= htmlspecialchars($tech['color']) ?> bg-opacity-20 border border-white/20 transition-transform hover:-translate-y-0.5">
                                    <span class="w-1.5 h-1.5 rounded-none bg-white mr-2 opacity-50"></span>
                                    <?= htmlspecialchars($tech['name']) ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <!-- Action Buttons -->
                    <div class="flex flex-wrap items-center gap-4 pt-6 border-t border-white/10">
                        <?php if($project['demo_url']): ?>
                            <a href="<?= htmlspecialchars($project['demo_url']) ?>" target="_blank" class="group relative flex items-center justify-center font-display font-bold tracking-widest uppercase text-dark px-8 py-4 rounded-sm bg-primary hover:bg-white transition-all duration-300 shadow-[0_0_20px_rgba(0,240,255,0.6)] border border-primary hover:-translate-y-1">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                [ LIVE_DEMO ]
                            </a>
                        <?php endif; ?>
                        
                        <?php if($project['repository_url']): ?>
                            <a href="<?= htmlspecialchars($project['repository_url']) ?>" target="_blank" class="group flex items-center justify-center font-display font-bold tracking-widest uppercase text-white hover:text-secondary px-8 py-4 rounded-sm bg-dark/80 hover:bg-dark border border-white/20 hover:border-secondary transition-all duration-300 backdrop-blur-md hover:-translate-y-1 hover:shadow-[0_0_20px_rgba(255,0,60,0.4)]">
                                <svg class="w-5 h-5 mr-2 opacity-70 group-hover:opacity-100 transition-opacity" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"></path></svg>
                                < SOURCE_CODE >
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Project Image & Description Showcase (Right) -->
                <div class="lg:col-span-7 order-2 flex flex-col gap-12">
                    <?php if($project['image_url']): ?>
                    <div class="relative w-full aspect-video md:aspect-[16/10] rounded-sm overflow-hidden shadow-[0_0_30px_rgba(0,240,255,0.2)] group ring-1 ring-primary/50 cursor-zoom-in tilt-3d" data-tilt data-tilt-max="3" data-tilt-speed="500" data-tilt-perspective="1000" onclick="openLightbox()">
                        <!-- Browser-like header for aesthetic -->
                        <div class="absolute top-0 inset-x-0 h-10 bg-dark backdrop-blur-md flex items-center px-4 space-x-2 z-10 border-b border-primary/50">
                            <div class="w-3 h-3 rounded-none bg-secondary"></div>
                            <div class="w-3 h-3 rounded-none bg-accent"></div>
                            <div class="w-3 h-3 rounded-none bg-primary"></div>
                        </div>
                        <img id="project-main-image" src="<?= htmlspecialchars($project['image_url']) ?>" alt="<?= htmlspecialchars($project['title']) ?>" class="absolute inset-0 w-full h-full object-cover object-top pt-10 transform group-hover:scale-105 transition-transform duration-1000 ease-out filter contrast-125">
                        <div class="absolute inset-0 shadow-[inset_0_0_0_1px_rgba(0,240,255,0.2)] pointer-events-none z-20"></div>
                    </div>
                    <?php else: ?>
                    <div class="relative w-full aspect-video md:aspect-[16/10] rounded-sm overflow-hidden bg-black border border-primary/50 flex items-center justify-center">
                        <p class="text-primary font-display font-bold tracking-widest uppercase">NO_IMAGE_FOUND</p>
                    </div>
                    <?php endif; ?>

                    <div class="bg-dark/80 border border-white/10 rounded-sm p-8 md:p-12 backdrop-blur-2xl shadow-[0_0_30px_rgba(0,0,0,0.8)] relative overflow-hidden">
                        
                        <h2 class="text-2xl md:text-3xl font-display font-bold uppercase tracking-widest text-primary mb-8 pb-6 border-b border-white/10 relative z-10">> DESCRIPTION_LOG</h2>
                        
                        <div class="prose prose-invert prose-lg md:prose-xl max-w-none prose-headings:text-white prose-a:text-primary hover:prose-a:text-white prose-img:rounded-sm prose-img:border prose-img:border-primary/50 text-gray-300 font-mono text-base leading-relaxed relative z-10">
                            <?= $project['description'] ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </header>

</div>

<!-- Lightbox Modal -->
<div id="image-lightbox" class="fixed inset-0 z-[100] bg-black/90 hidden items-center justify-center opacity-0 transition-opacity duration-300 backdrop-blur-sm" onclick="closeLightbox()">
    <button class="absolute top-6 right-6 text-white hover:text-primary transition-colors focus:outline-none z-50" onclick="closeLightbox()">
        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
    </button>
    <img id="lightbox-img" src="" alt="Enlarged Project Image" class="max-w-[95vw] max-h-[90vh] object-contain rounded-lg shadow-2xl transform scale-95 transition-transform duration-300" onclick="event.stopPropagation()">
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const lightbox = document.getElementById('image-lightbox');
    if (lightbox) {
        document.body.appendChild(lightbox);
    }
});

function openLightbox() {
    const lightbox = document.getElementById('image-lightbox');
    const img = document.getElementById('lightbox-img');
    const sourceImg = document.getElementById('project-main-image');
    
    if (sourceImg && sourceImg.src) {
        img.src = sourceImg.src;
        lightbox.classList.remove('hidden');
        lightbox.classList.add('flex');
        
        // Trigger reflow for transition
        void lightbox.offsetWidth;
        
        lightbox.classList.remove('opacity-0');
        img.classList.remove('scale-95');
        img.classList.add('scale-100');
        
        document.body.style.overflow = 'hidden';
    }
}

function closeLightbox() {
    const lightbox = document.getElementById('image-lightbox');
    const img = document.getElementById('lightbox-img');
    
    lightbox.classList.add('opacity-0');
    img.classList.remove('scale-100');
    img.classList.add('scale-95');
    
    setTimeout(() => {
        lightbox.classList.add('hidden');
        lightbox.classList.remove('flex');
        document.body.style.overflow = '';
    }, 300);
}

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        const lightbox = document.getElementById('image-lightbox');
        if (lightbox && !lightbox.classList.contains('hidden')) {
            closeLightbox();
        }
    }
});
</script>

<style>
@keyframes shimmer {
    100% { transform: translateX(100%); }
}
</style>

<?php 
$content = ob_get_clean(); 
require BASE_PATH . '/app/Views/layouts/main.php'; 
?>
