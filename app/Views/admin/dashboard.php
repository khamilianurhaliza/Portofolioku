<?php ob_start(); ?>

<!-- Stats Overview -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow relative overflow-hidden group">
        <div class="absolute top-0 right-0 w-24 h-24 bg-primary/5 rounded-bl-full -z-10 group-hover:scale-110 transition-transform"></div>
        <div class="flex justify-between items-start">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Total Projects</p>
                <h3 class="text-4xl font-bold text-gray-800"><?= htmlspecialchars($projectCount) ?></h3>
            </div>
            <div class="p-3 bg-primary/10 rounded-xl text-primary">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            </div>
        </div>
    </div>
    
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow relative overflow-hidden group">
        <div class="absolute top-0 right-0 w-24 h-24 bg-pink-500/5 rounded-bl-full -z-10 group-hover:scale-110 transition-transform"></div>
        <div class="flex justify-between items-start">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Total Messages</p>
                <h3 class="text-4xl font-bold text-gray-800"><?= htmlspecialchars($messageCount) ?></h3>
            </div>
            <div class="p-3 bg-pink-500/10 rounded-xl text-pink-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            </div>
        </div>
    </div>
</div>

<!-- Recent Messages -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="px-8 py-6 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
        <h3 class="font-bold text-gray-800 text-lg">Recent Inbox Messages</h3>
        <span class="text-xs font-medium bg-primary/10 text-primary px-3 py-1 rounded-full">Last 5</span>
    </div>
    <div class="p-0">
        <?php if(empty($recentMessages)): ?>
            <div class="p-10 text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 mb-4 text-gray-400">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                </div>
                <p class="text-gray-500 font-medium">Inbox is completely empty.</p>
            </div>
        <?php else: ?>
            <ul class="divide-y divide-gray-100">
                <?php foreach($recentMessages as $msg): ?>
                    <li class="p-6 hover:bg-gray-50 transition-colors flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-primary to-pink-500 flex items-center justify-center text-white font-bold flex-shrink-0 shadow-sm">
                            <?= strtoupper(substr($msg['name'], 0, 1)) ?>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between mb-1">
                                <h4 class="font-semibold text-gray-900 truncate"><?= htmlspecialchars($msg['name']) ?></h4>
                                <span class="text-xs font-medium text-gray-400 whitespace-nowrap ml-4">
                                    <?= date('M d, H:i', strtotime($msg['created_at'])) ?>
                                </span>
                            </div>
                            <p class="text-xs text-primary font-medium mb-2 truncate"><?= htmlspecialchars($msg['email']) ?></p>
                            <p class="text-sm text-gray-600 font-medium mb-1 truncate"><?= htmlspecialchars($msg['subject'] ?? 'No Subject') ?></p>
                            <p class="text-sm text-gray-500 line-clamp-2 leading-relaxed"><?= htmlspecialchars($msg['message']) ?></p>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</div>

<?php 
$content = ob_get_clean(); 
require BASE_PATH . '/app/Views/layouts/admin.php'; 
?>
