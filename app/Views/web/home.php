<?php ob_start(); ?>

<!-- Hero Section -->
<section id="hero" class="relative min-h-screen flex items-center pt-20 pb-20 overflow-hidden bg-transparent">


    <div class="container mx-auto px-4 relative z-10 text-center pointer-events-none">
        <h1 class="text-5xl md:text-7xl font-display font-black uppercase tracking-widest text-white mb-6 leading-tight gsap-hero-item pointer-events-auto drop-shadow-[0_0_15px_rgba(0,240,255,0.5)]">
            <span class="text-xl text-primary block mb-4 tracking-[0.3em]">> SYS.INIT</span>
            I'M <br/>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary via-white to-secondary">
                <?= htmlspecialchars($settings['author_name'] ?? 'John Doe') ?>
            </span>
        </h1>
        <p class="text-lg md:text-xl text-gray-300 mb-10 max-w-2xl mx-auto leading-relaxed gsap-hero-item pointer-events-auto drop-shadow-lg font-medium">
            <?= htmlspecialchars($settings['author_bio'] ?? 'A passionate software engineer building digital experiences.') ?>
        </p>
        <div class="flex justify-center gap-6 gsap-hero-item pointer-events-auto mt-12">
            <a href="#projects" class="px-8 py-4 rounded-sm bg-primary/20 backdrop-blur-md hover:bg-primary/40 text-primary font-display font-bold uppercase tracking-widest transition-all duration-300 border border-primary hover:shadow-[0_0_20px_rgba(0,240,255,0.6)]">
                [ View Work ]
            </a>
            <a href="#contact" class="px-8 py-4 rounded-sm bg-dark/80 hover:bg-white/10 text-white font-display font-bold uppercase tracking-widest border border-white/20 transition-all duration-300 backdrop-blur-md hover:border-secondary hover:text-secondary hover:shadow-[0_0_20px_rgba(255,0,60,0.4)]">
                > Contact_
            </a>
        </div>
    </div>
</section>

<!-- About & Experiences Section -->
<section id="about" class="py-24 bg-transparent border-y border-white/10 relative">
    <div class="container mx-auto px-4 max-w-6xl pointer-events-auto">
        <div class="text-center mb-16 gsap-fade-up">
            <h2 class="text-3xl md:text-5xl font-display font-bold uppercase tracking-widest mb-4"><span class="text-primary">></span> JOURNEY & <span class="text-secondary">EXPERIENCE</span> <span class="text-primary animate-pulse">_</span></h2>
            <div class="w-24 h-1 bg-gradient-to-r from-primary to-secondary mx-auto"></div>
        </div>
        
        <div class="relative border-l-2 border-white/10 ml-4 md:ml-0 md:mx-auto md:w-2/3">
            <?php if(empty($experiences)): ?>
                <p class="text-center text-gray-500 italic ml-4">No experiences added yet.</p>
            <?php else: ?>
                <?php foreach($experiences as $exp): ?>
                <div class="mb-10 ml-8 relative gsap-slide-right group tilt-3d" data-tilt data-tilt-max="5" data-tilt-speed="400" data-tilt-glare data-tilt-max-glare="0.2">
                    <a href="/experience/<?= $exp['id'] ?>" class="block p-6 bg-dark/80 hover:bg-dark border border-white/10 hover:border-primary rounded-sm transition-all duration-300 shadow-[0_0_15px_rgba(0,0,0,0.5)] group-hover:shadow-[0_0_20px_rgba(0,240,255,0.2)]">
                        <span class="absolute -left-[41px] flex items-center justify-center w-8 h-8 bg-dark rounded-none border border-primary">
                            <div class="w-2.5 h-2.5 bg-secondary group-hover:scale-150 transition-transform"></div>
                        </span>
                    <h3 class="flex items-center mb-1 text-xl font-display font-bold uppercase tracking-wider text-white">
                        <?= htmlspecialchars($exp['position']) ?> 
                        <span class="bg-primary/20 text-primary text-sm font-medium mr-2 px-2.5 py-0.5 rounded ml-3">
                            <?= htmlspecialchars($exp['company']) ?>
                        </span>
                    </h3>
                        <time class="block mb-3 text-sm font-normal leading-none text-gray-400">
                            <?= date('M Y', strtotime($exp['start_date'])) ?> - 
                            <?= $exp['end_date'] ? date('M Y', strtotime($exp['end_date'])) : '<span class="text-green-400">Present</span>' ?>
                        </time>
                        <div class="mb-4 text-base font-normal text-gray-400 line-clamp-3">
                            <?= strip_tags($exp['description']) ?>
                        </div>
                        <div class="text-primary text-sm font-semibold flex items-center opacity-0 group-hover:opacity-100 transition-opacity">
                            View Details <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </div>
                    </a>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Skills Section -->
<section id="skills" class="py-24 relative overflow-hidden">
    <div class="container mx-auto px-4 max-w-6xl pointer-events-auto">
        <div class="text-center mb-16 gsap-fade-up">
            <h2 class="text-3xl md:text-5xl font-display font-bold uppercase tracking-widest mb-4"><span class="text-secondary">></span> SYS.<span class="text-primary">SKILLS</span> <span class="text-secondary animate-pulse">_</span></h2>
            <div class="w-24 h-1 bg-gradient-to-r from-secondary to-primary mx-auto"></div>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <?php if(empty($skills)): ?>
                <div class="col-span-full text-center text-gray-500 italic">No skills added yet.</div>
            <?php else: ?>
                <?php foreach($skills as $skill): ?>
                <div class="bg-dark/80 border border-white/10 rounded-sm p-6 text-center hover:border-secondary transition-colors duration-300 gsap-pop-in tilt-3d shadow-[0_0_15px_rgba(0,0,0,0.5)] hover:shadow-[0_0_20px_rgba(255,0,60,0.3)]" data-tilt data-tilt-max="15" data-tilt-speed="400" data-tilt-glare data-tilt-max-glare="0.3" data-tilt-scale="1.05">
                    <div class="w-16 h-16 mx-auto bg-black rounded-sm flex items-center justify-center mb-4 border border-secondary/50 shadow-[0_0_10px_rgba(255,0,60,0.2)]">
                        <?php if($skill['icon']): ?>
                            <img src="<?= htmlspecialchars($skill['icon']) ?>" alt="<?= htmlspecialchars($skill['name']) ?>" class="w-8 h-8 object-contain filter grayscale group-hover:grayscale-0">
                        <?php else: ?>
                            <span class="text-xl font-display font-bold text-secondary"><?= substr(htmlspecialchars($skill['name']), 0, 1) ?></span>
                        <?php endif; ?>
                    </div>
                    <h3 class="text-lg font-display uppercase tracking-widest text-white mb-2"><?= htmlspecialchars($skill['name']) ?></h3>
                    <div class="w-full bg-gray-900 h-1 mb-1 overflow-hidden border border-white/5">
                        <div class="bg-gradient-to-r from-secondary to-primary h-1 skill-progress" data-width="<?= $skill['proficiency'] ?>%"></div>
                    </div>
                    <span class="text-xs text-gray-400"><?= htmlspecialchars($skill['proficiency']) ?>%</span>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Projects Section -->
<section id="projects" class="py-24 bg-transparent border-y border-white/10 relative z-10">
    <div class="container mx-auto px-4 max-w-7xl pointer-events-auto">
        <div class="text-center mb-16 gsap-fade-up">
            <h2 class="text-3xl md:text-5xl font-display font-bold uppercase tracking-widest mb-4"><span class="text-primary">></span> FEATURED <span class="text-accent">PROJECTS</span> <span class="text-primary animate-pulse">_</span></h2>
            <div class="w-24 h-1 bg-gradient-to-r from-primary to-accent mx-auto"></div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php if(empty($projects)): ?>
                <div class="col-span-full text-center text-gray-500 italic">No projects found. Add some from the admin panel!</div>
            <?php else: ?>
                <?php foreach($projects as $project): ?>
                <div class="block group bg-dark/90 border border-white/10 rounded-sm overflow-hidden hover:border-primary transition-all duration-500 gsap-fade-up relative tilt-3d shadow-[0_0_15px_rgba(0,0,0,0.8)] hover:shadow-[0_0_30px_rgba(0,240,255,0.3)]" data-tilt data-tilt-max="5" data-tilt-speed="400" data-tilt-perspective="1000" data-tilt-scale="1.02">
                    <a href="/project/<?= htmlspecialchars($project['slug']) ?>" class="absolute inset-0 z-10"></a>
                    <div class="relative h-56 overflow-hidden bg-black border-b border-white/10">
                        <div class="absolute inset-0 bg-primary/20 mix-blend-overlay z-10 group-hover:opacity-0 transition-opacity duration-500"></div>
                        <?php if($project['image_url']): ?>
                            <img src="<?= htmlspecialchars($project['image_url']) ?>" alt="<?= htmlspecialchars($project['title']) ?>" class="w-full h-full object-cover transform group-hover:scale-110 filter contrast-125 transition-transform duration-700">
                        <?php else: ?>
                            <div class="w-full h-full flex items-center justify-center text-primary font-display font-bold tracking-widest uppercase">NO_DATA_FOUND</div>
                        <?php endif; ?>
                    </div>
                    <div class="p-8 relative pointer-events-none">
                        <h3 class="text-2xl font-display font-bold uppercase tracking-wider text-white mb-2 group-hover:text-primary transition-colors drop-shadow-[0_0_8px_rgba(0,240,255,0.5)]">> <?= htmlspecialchars($project['title']) ?></h3>
                        
                        <!-- Technology Badges -->
                        <div class="flex flex-wrap gap-2 mb-4">
                            <?php if(!empty($project['technologies'])): ?>
                                <?php foreach($project['technologies'] as $tech): ?>
                                    <span class="inline-block px-2 py-1 text-xs font-display font-bold uppercase tracking-widest rounded-none border border-white/20 text-white <?= htmlspecialchars($tech['color']) ?> bg-opacity-20">
                                        <?= htmlspecialchars($tech['name']) ?>
                                    </span>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>

                        <!-- Plain Text Snippet -->
                        <div class="text-gray-400 mb-6 text-sm leading-relaxed line-clamp-3">
                            <?= strip_tags($project['description']) ?>
                        </div>
                        
                        <div class="flex items-center space-x-4 relative z-20 pointer-events-auto">
                            <?php if($project['demo_url']): ?>
                                <a href="<?= htmlspecialchars($project['demo_url']) ?>" target="_blank" onclick="event.stopPropagation()" class="flex items-center text-sm font-semibold text-white bg-primary hover:bg-indigo-600 px-4 py-2 rounded-lg transition-colors">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                    Live Demo
                                </a>
                            <?php endif; ?>
                            <?php if($project['repository_url']): ?>
                                <a href="<?= htmlspecialchars($project['repository_url']) ?>" target="_blank" onclick="event.stopPropagation()" class="flex items-center text-sm font-medium text-gray-300 hover:text-white transition-colors">
                                    <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"></path></svg>
                                    Code
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-24 relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiM0ZjQ2ZTMiIGZpbGwtb3BhY2l0eT0iMC4xIj48cGF0aCBkPSJNMzYgMzR2LTE2aDJ2MTZoLTJ6bTAtMThWMEgzNHYxNmgyeiIvPjwvZz48L2c+PC9zdmc+')] opacity-20"></div>
    <div class="container mx-auto px-4 max-w-4xl relative z-10 pointer-events-auto">
        <div class="text-center mb-16 gsap-fade-up">
            <h2 class="text-3xl md:text-5xl font-display font-bold uppercase tracking-widest mb-4"><span class="text-secondary">></span> INITIATE_<span class="text-primary">CONTACT</span> <span class="text-secondary animate-pulse">_</span></h2>
            <div class="w-24 h-1 bg-gradient-to-r from-secondary to-primary mx-auto mb-6"></div>
            <p class="text-gray-400 max-w-2xl mx-auto font-mono text-sm">TRANSMIT_MESSAGE_TO_SERVER...</p>
        </div>
        
        <?php if(isset($_GET['status']) && $_GET['status'] === 'success'): ?>
            <div class="bg-green-500/20 border border-green-500 text-green-300 px-6 py-4 rounded-xl mb-8 text-center backdrop-blur-sm gsap-fade-up">
                Your message has been sent successfully! I'll get back to you soon.
            </div>
        <?php endif; ?>

        <div class="bg-dark/80 border border-white/10 rounded-sm p-8 md:p-12 shadow-[0_0_30px_rgba(0,0,0,0.8)] gsap-fade-up relative before:absolute before:inset-0 before:border before:border-primary/20 before:m-2 before:pointer-events-none">
            <form action="/contact" method="POST" class="space-y-6 relative z-10">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-primary font-display font-bold tracking-widest mb-2 text-xs uppercase">> YOUR_NAME</label>
                        <input type="text" name="name" required placeholder="GUEST_USER" class="w-full px-5 py-3 bg-black/50 border-b-2 border-white/10 text-white placeholder-gray-600 focus:outline-none focus:border-primary transition-all font-mono">
                    </div>
                    <div>
                        <label class="block text-primary font-display font-bold tracking-widest mb-2 text-xs uppercase">> YOUR_EMAIL</label>
                        <input type="email" name="email" required placeholder="user@network.com" class="w-full px-5 py-3 bg-black/50 border-b-2 border-white/10 text-white placeholder-gray-600 focus:outline-none focus:border-primary transition-all font-mono">
                    </div>
                </div>
                <div>
                    <label class="block text-primary font-display font-bold tracking-widest mb-2 text-xs uppercase">> SUBJECT</label>
                    <input type="text" name="subject" placeholder="TRANSMISSION_TOPIC" class="w-full px-5 py-3 bg-black/50 border-b-2 border-white/10 text-white placeholder-gray-600 focus:outline-none focus:border-primary transition-all font-mono">
                </div>
                <div>
                    <label class="block text-primary font-display font-bold tracking-widest mb-2 text-xs uppercase">> MESSAGE_PAYLOAD</label>
                    <textarea name="message" rows="5" required placeholder="ENTER_DATA_HERE..." class="w-full px-5 py-3 bg-black/50 border border-white/10 text-white placeholder-gray-600 focus:outline-none focus:border-primary transition-all resize-none font-mono"></textarea>
                </div>
                <button type="submit" class="w-full bg-primary/20 text-primary font-display font-bold uppercase tracking-widest py-4 rounded-sm hover:bg-primary hover:text-dark transition-all border border-primary shadow-[0_0_15px_rgba(0,240,255,0.4)] flex justify-center items-center group">
                    [ TRANSMIT ]
                    <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </button>
            </form>
        </div>
    </div>
</section>

<?php 
$content = ob_get_clean(); 
require BASE_PATH . '/app/Views/layouts/main.php'; 
?>
