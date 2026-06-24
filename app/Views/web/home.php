<?php ob_start(); ?>

<!-- Hero Section -->
<section id="hero" class="relative min-h-screen flex items-center pt-20 pb-20 overflow-hidden">
    <!-- Animated background blobs -->
    <div class="absolute top-0 -left-4 w-72 h-72 bg-primary rounded-full mix-blend-multiply filter blur-2xl opacity-20 animate-blob"></div>
    <div class="absolute top-0 -right-4 w-72 h-72 bg-secondary rounded-full mix-blend-multiply filter blur-2xl opacity-20 animate-blob animation-delay-2000"></div>
    <div class="absolute -bottom-8 left-20 w-72 h-72 bg-purple-500 rounded-full mix-blend-multiply filter blur-2xl opacity-20 animate-blob animation-delay-4000"></div>

    <div class="container mx-auto px-4 relative z-10 text-center">
        <h2 class="text-sm md:text-lg font-bold text-secondary uppercase tracking-widest mb-4 gsap-hero-item">Welcome to my universe</h2>
        <h1 class="text-5xl md:text-7xl font-extrabold text-white mb-6 tracking-tight leading-tight gsap-hero-item">
            Hi, I'm <br/>
            <span class="bg-clip-text text-transparent bg-gradient-to-r from-primary via-purple-500 to-secondary">
                <?= htmlspecialchars($settings['author_name'] ?? 'John Doe') ?>
            </span>
        </h1>
        <p class="text-lg md:text-xl text-gray-400 mb-10 max-w-2xl mx-auto leading-relaxed gsap-hero-item">
            <?= htmlspecialchars($settings['author_bio'] ?? 'A passionate software engineer building digital experiences.') ?>
        </p>
        <div class="flex justify-center gap-4 gsap-hero-item">
            <a href="#projects" class="px-8 py-4 rounded-full bg-primary hover:bg-indigo-600 text-white font-semibold transition-all duration-300 transform hover:scale-105 hover:shadow-lg hover:shadow-primary/50">
                View My Work
            </a>
            <a href="#contact" class="px-8 py-4 rounded-full bg-white/5 hover:bg-white/10 text-white font-semibold border border-white/10 transition-all duration-300 backdrop-blur-md">
                Contact Me
            </a>
        </div>
    </div>
</section>

<!-- About & Experiences Section -->
<section id="about" class="py-24 bg-dark/50 border-y border-white/5 relative">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="text-center mb-16 gsap-fade-up">
            <h2 class="text-3xl md:text-5xl font-bold mb-4">Journey & <span class="text-primary">Experience</span></h2>
            <div class="w-24 h-1 bg-gradient-to-r from-primary to-secondary mx-auto rounded-full"></div>
        </div>
        
        <div class="relative border-l-2 border-white/10 ml-4 md:ml-0 md:mx-auto md:w-2/3">
            <?php if(empty($experiences)): ?>
                <p class="text-center text-gray-500 italic ml-4">No experiences added yet.</p>
            <?php else: ?>
                <?php foreach($experiences as $exp): ?>
                <div class="mb-10 ml-8 relative gsap-slide-right group">
                    <a href="/experience/<?= $exp['id'] ?>" class="block p-6 bg-white/5 hover:bg-white/10 border border-transparent hover:border-white/10 rounded-2xl transition-all duration-300">
                        <span class="absolute -left-[41px] flex items-center justify-center w-8 h-8 bg-dark rounded-full border-2 border-primary ring-4 ring-dark">
                            <div class="w-2.5 h-2.5 bg-secondary rounded-full group-hover:scale-150 transition-transform"></div>
                        </span>
                    <h3 class="flex items-center mb-1 text-xl font-semibold text-white">
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
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="text-center mb-16 gsap-fade-up">
            <h2 class="text-3xl md:text-5xl font-bold mb-4">My <span class="text-secondary">Skills</span></h2>
            <div class="w-24 h-1 bg-gradient-to-r from-primary to-secondary mx-auto rounded-full"></div>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <?php if(empty($skills)): ?>
                <div class="col-span-full text-center text-gray-500 italic">No skills added yet.</div>
            <?php else: ?>
                <?php foreach($skills as $skill): ?>
                <div class="bg-white/5 border border-white/10 rounded-2xl p-6 text-center backdrop-blur-sm hover:bg-white/10 transition-colors duration-300 gsap-pop-in">
                    <div class="w-16 h-16 mx-auto bg-dark rounded-full flex items-center justify-center mb-4 shadow-inner border border-white/5">
                        <?php if($skill['icon']): ?>
                            <img src="<?= htmlspecialchars($skill['icon']) ?>" alt="<?= htmlspecialchars($skill['name']) ?>" class="w-8 h-8 object-contain">
                        <?php else: ?>
                            <span class="text-xl font-bold text-gray-400"><?= substr(htmlspecialchars($skill['name']), 0, 1) ?></span>
                        <?php endif; ?>
                    </div>
                    <h3 class="text-lg font-semibold text-white mb-2"><?= htmlspecialchars($skill['name']) ?></h3>
                    <div class="w-full bg-gray-700 rounded-full h-1.5 mb-1 overflow-hidden">
                        <div class="bg-gradient-to-r from-primary to-secondary h-1.5 rounded-full skill-progress" data-width="<?= $skill['proficiency'] ?>%"></div>
                    </div>
                    <span class="text-xs text-gray-400"><?= htmlspecialchars($skill['proficiency']) ?>%</span>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Projects Section -->
<section id="projects" class="py-24 bg-dark/50 border-y border-white/5">
    <div class="container mx-auto px-4 max-w-7xl">
        <div class="text-center mb-16 gsap-fade-up">
            <h2 class="text-3xl md:text-5xl font-bold mb-4">Featured <span class="text-primary">Projects</span></h2>
            <div class="w-24 h-1 bg-gradient-to-r from-primary to-secondary mx-auto rounded-full"></div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php if(empty($projects)): ?>
                <div class="col-span-full text-center text-gray-500 italic">No projects found. Add some from the admin panel!</div>
            <?php else: ?>
                <?php foreach($projects as $project): ?>
                <a href="/project/<?= htmlspecialchars($project['slug']) ?>" class="block group bg-white/5 border border-white/10 rounded-2xl overflow-hidden hover:shadow-2xl hover:shadow-primary/20 transition-all duration-500 transform hover:-translate-y-2 gsap-fade-up cursor-pointer">
                    <div class="relative h-56 overflow-hidden bg-gray-800">
                        <?php if($project['image_url']): ?>
                            <img src="<?= htmlspecialchars($project['image_url']) ?>" alt="<?= htmlspecialchars($project['title']) ?>" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                        <?php else: ?>
                            <div class="w-full h-full flex items-center justify-center text-gray-500 font-medium">No Image Available</div>
                        <?php endif; ?>
                        <div class="absolute inset-0 bg-gradient-to-t from-dark to-transparent opacity-80"></div>
                    </div>
                    <div class="p-8 relative">
                        <h3 class="text-2xl font-bold text-white mb-2 group-hover:text-primary transition-colors"><?= htmlspecialchars($project['title']) ?></h3>
                        
                        <!-- Technology Badges -->
                        <div class="flex flex-wrap gap-2 mb-4">
                            <?php if(!empty($project['technologies'])): ?>
                                <?php foreach($project['technologies'] as $tech): ?>
                                    <span class="inline-block px-2.5 py-1 text-xs font-semibold rounded-md text-white <?= htmlspecialchars($tech['color']) ?> bg-opacity-80">
                                        <?= htmlspecialchars($tech['name']) ?>
                                    </span>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>

                        <!-- Plain Text Snippet -->
                        <div class="text-gray-400 mb-6 text-sm leading-relaxed line-clamp-3">
                            <?= strip_tags($project['description']) ?>
                        </div>
                        
                        <div class="flex items-center space-x-4 relative z-20">
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
                </a>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-24 relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiM0ZjQ2ZTMiIGZpbGwtb3BhY2l0eT0iMC4xIj48cGF0aCBkPSJNMzYgMzR2LTE2aDJ2MTZoLTJ6bTAtMThWMEgzNHYxNmgyeiIvPjwvZz48L2c+PC9zdmc+')] opacity-20"></div>
    <div class="container mx-auto px-4 max-w-4xl relative z-10">
        <div class="text-center mb-16 gsap-fade-up">
            <h2 class="text-3xl md:text-5xl font-bold mb-4">Let's <span class="text-secondary">Talk</span></h2>
            <div class="w-24 h-1 bg-gradient-to-r from-primary to-secondary mx-auto rounded-full mb-6"></div>
            <p class="text-gray-400 max-w-2xl mx-auto">Have a project in mind or just want to say hi? I'd love to hear from you. Drop me a message below!</p>
        </div>
        
        <?php if(isset($_GET['status']) && $_GET['status'] === 'success'): ?>
            <div class="bg-green-500/20 border border-green-500 text-green-300 px-6 py-4 rounded-xl mb-8 text-center backdrop-blur-sm gsap-fade-up">
                Your message has been sent successfully! I'll get back to you soon.
            </div>
        <?php endif; ?>

        <div class="bg-white/5 border border-white/10 rounded-3xl p-8 md:p-12 backdrop-blur-lg shadow-2xl gsap-fade-up">
            <form action="/contact" method="POST" class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-300 font-medium mb-2 text-sm">Your Name</label>
                        <input type="text" name="name" required placeholder="John Doe" class="w-full px-5 py-3 bg-dark/50 border border-white/10 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                    </div>
                    <div>
                        <label class="block text-gray-300 font-medium mb-2 text-sm">Your Email</label>
                        <input type="email" name="email" required placeholder="john@example.com" class="w-full px-5 py-3 bg-dark/50 border border-white/10 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                    </div>
                </div>
                <div>
                    <label class="block text-gray-300 font-medium mb-2 text-sm">Subject</label>
                    <input type="text" name="subject" placeholder="What is this regarding?" class="w-full px-5 py-3 bg-dark/50 border border-white/10 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                </div>
                <div>
                    <label class="block text-gray-300 font-medium mb-2 text-sm">Message</label>
                    <textarea name="message" rows="5" required placeholder="Hello, I would like to discuss..." class="w-full px-5 py-3 bg-dark/50 border border-white/10 rounded-xl text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all resize-none"></textarea>
                </div>
                <button type="submit" class="w-full bg-gradient-to-r from-primary to-secondary text-white font-bold py-4 rounded-xl hover:opacity-90 transition-opacity shadow-lg flex justify-center items-center group">
                    Send Message
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
