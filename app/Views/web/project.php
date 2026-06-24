<?php ob_start(); ?>

<div class="min-h-screen bg-dark relative overflow-hidden selection:bg-primary/30 selection:text-primary-100">
    <!-- Ambient Background Effects -->
    <div class="absolute top-0 inset-x-0 h-[500px] bg-gradient-to-b from-primary/20 via-dark to-dark pointer-events-none"></div>
    <div class="absolute top-[-10%] right-[-5%] w-[800px] h-[800px] rounded-full bg-primary/10 blur-[120px] pointer-events-none"></div>
    <div class="absolute bottom-[-10%] left-[-10%] w-[600px] h-[600px] rounded-full bg-secondary/10 blur-[100px] pointer-events-none"></div>

    <!-- Navigation / Breadcrumb -->
    <nav class="relative z-20 pt-28 lg:pt-32 pb-6">
        <div class="container mx-auto px-6 lg:px-12 max-w-7xl">
            <a href="/#projects" class="group inline-flex items-center space-x-3 text-sm font-medium text-gray-400 hover:text-white transition-colors bg-white/5 hover:bg-white/10 px-5 py-2.5 rounded-full border border-white/10 backdrop-blur-md">
                <svg class="w-4 h-4 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                <span>Back to Projects</span>
            </a>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="relative z-20 pt-8 pb-20 lg:pt-16 lg:pb-32">
        <div class="container mx-auto px-6 lg:px-12 max-w-7xl">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 lg:gap-12 items-center">
                
                <!-- Project Meta (Left) -->
                <div class="lg:col-span-5 order-2 lg:order-1 flex flex-col justify-center">
                    <div class="inline-flex items-center space-x-2 bg-primary/10 text-primary px-4 py-1.5 rounded-full text-xs font-bold tracking-widest uppercase mb-6 border border-primary/20 w-max">
                        <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                        <span>Project Showcase</span>
                    </div>
                    
                    <h1 class="text-5xl lg:text-7xl font-extrabold text-white mb-8 tracking-tight leading-[1.1]">
                        <?= htmlspecialchars($project['title']) ?>
                    </h1>
                    
                    <!-- Technology Stack -->
                    <?php if(!empty($project['technologies'])): ?>
                    <div class="mb-10">
                        <p class="text-sm font-semibold text-gray-500 uppercase tracking-widest mb-4">Technologies Used</p>
                        <div class="flex flex-wrap gap-2.5">
                            <?php foreach($project['technologies'] as $tech): ?>
                                <span class="inline-flex items-center px-4 py-1.5 text-sm font-semibold rounded-lg text-white <?= htmlspecialchars($tech['color']) ?> bg-opacity-10 border border-white/10 backdrop-blur-sm transition-transform hover:-translate-y-0.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-white mr-2 opacity-50"></span>
                                    <?= htmlspecialchars($tech['name']) ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <!-- Action Buttons -->
                    <div class="flex flex-wrap items-center gap-4 pt-6 border-t border-white/10">
                        <?php if($project['demo_url']): ?>
                            <a href="<?= htmlspecialchars($project['demo_url']) ?>" target="_blank" class="group relative flex items-center justify-center font-bold text-white px-8 py-4 rounded-2xl bg-primary hover:bg-indigo-500 transition-all duration-300 shadow-[0_0_40px_-10px_rgba(99,102,241,0.5)] hover:shadow-[0_0_60px_-15px_rgba(99,102,241,0.7)] hover:-translate-y-1 overflow-hidden">
                                <div class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:animate-[shimmer_1.5s_infinite]"></div>
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                Live Preview
                            </a>
                        <?php endif; ?>
                        
                        <?php if($project['repository_url']): ?>
                            <a href="<?= htmlspecialchars($project['repository_url']) ?>" target="_blank" class="group flex items-center justify-center font-semibold text-gray-300 hover:text-white px-8 py-4 rounded-2xl bg-white/5 hover:bg-white/10 border border-white/10 transition-all duration-300 backdrop-blur-md hover:-translate-y-1">
                                <svg class="w-5 h-5 mr-2 opacity-70 group-hover:opacity-100 transition-opacity" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"></path></svg>
                                Source Code
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Project Image Showcase (Right) -->
                <?php if($project['image_url']): ?>
                <div class="lg:col-span-7 order-1 lg:order-2">
                    <div class="relative w-full aspect-video md:aspect-[16/10] rounded-3xl overflow-hidden shadow-2xl shadow-primary/20 group ring-1 ring-white/10 transform transition-transform duration-700 hover:rotate-1">
                        <!-- Browser-like header for aesthetic -->
                        <div class="absolute top-0 inset-x-0 h-10 bg-dark/80 backdrop-blur-md flex items-center px-4 space-x-2 z-10 border-b border-white/5">
                            <div class="w-3 h-3 rounded-full bg-red-500/80"></div>
                            <div class="w-3 h-3 rounded-full bg-yellow-500/80"></div>
                            <div class="w-3 h-3 rounded-full bg-green-500/80"></div>
                        </div>
                        <img src="<?= htmlspecialchars($project['image_url']) ?>" alt="<?= htmlspecialchars($project['title']) ?>" class="absolute inset-0 w-full h-full object-cover object-top pt-10 transform group-hover:scale-105 transition-transform duration-1000 ease-out">
                        <div class="absolute inset-0 shadow-[inset_0_0_0_1px_rgba(255,255,255,0.1)] rounded-3xl pointer-events-none z-20"></div>
                    </div>
                </div>
                <?php else: ?>
                <div class="lg:col-span-7 order-1 lg:order-2">
                    <div class="relative w-full aspect-video md:aspect-[16/10] rounded-3xl overflow-hidden bg-white/5 border border-white/10 flex items-center justify-center">
                        <p class="text-gray-500 font-medium">No Image Available</p>
                    </div>
                </div>
                <?php endif; ?>

            </div>
        </div>
    </header>

    <!-- Description Content -->
    <section class="relative z-20 bg-black/20 border-t border-white/5 py-24">
        <div class="container mx-auto px-6 lg:px-12 max-w-5xl">
            <div class="bg-dark/50 border border-white/10 rounded-[2.5rem] p-8 md:p-16 backdrop-blur-2xl shadow-2xl relative overflow-hidden">
                <!-- Abstract geometry inside content box -->
                <div class="absolute top-0 right-0 w-64 h-64 bg-primary/5 rounded-full blur-[80px]"></div>
                <div class="absolute bottom-0 left-0 w-64 h-64 bg-secondary/5 rounded-full blur-[80px]"></div>
                
                <h2 class="text-2xl md:text-3xl font-bold text-white mb-8 pb-6 border-b border-white/10">About The Project</h2>
                
                <div class="prose prose-invert prose-lg md:prose-xl max-w-none prose-headings:text-white prose-a:text-primary hover:prose-a:text-indigo-400 prose-img:rounded-2xl prose-img:border prose-img:border-white/10 prose-img:shadow-xl text-gray-300 leading-relaxed font-light">
                    <?= $project['description'] ?>
                </div>
            </div>
        </div>
    </section>

</div>

<style>
@keyframes shimmer {
    100% { transform: translateX(100%); }
}
</style>

<?php 
$content = ob_get_clean(); 
require BASE_PATH . '/app/Views/layouts/main.php'; 
?>
