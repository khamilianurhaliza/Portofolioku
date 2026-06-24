<?php ob_start(); ?>

<div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
    <div>
        <h2 class="text-3xl font-bold text-gray-800">Manage Skills</h2>
        <p class="text-gray-500 text-sm mt-1">Add or remove skills from your profile.</p>
    </div>
    <button onclick="document.getElementById('add-form').scrollIntoView({behavior: 'smooth'})" class="bg-primary hover:bg-indigo-600 text-white px-6 py-2.5 rounded-xl font-medium shadow-lg shadow-primary/30 transition-all flex items-center">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Add New Skill
    </button>
</div>

<!-- Skills Table -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-12">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-100">
            <thead class="bg-gray-50/80">
                <tr>
                    <th scope="col" class="px-8 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Skill Info</th>
                    <th scope="col" class="px-8 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Proficiency</th>
                    <th scope="col" class="px-8 py-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                <?php if(empty($skills)): ?>
                <tr>
                    <td colspan="3" class="px-8 py-12 text-center text-gray-500">
                        <p class="font-medium">No skills added yet.</p>
                    </td>
                </tr>
                <?php else: ?>
                    <?php foreach($skills as $skill): ?>
                    <tr class="hover:bg-gray-50/50 transition-colors group">
                        <td class="px-8 py-5 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="h-10 w-10 flex-shrink-0 rounded-full overflow-hidden bg-gray-100 border border-gray-200 flex items-center justify-center">
                                    <?php if($skill['icon']): ?>
                                        <img src="<?= htmlspecialchars($skill['icon']) ?>" alt="" class="h-6 w-6 object-cover">
                                    <?php else: ?>
                                        <span class="text-xs font-bold text-gray-400"><?= substr(htmlspecialchars($skill['name']), 0, 1) ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-bold text-gray-900"><?= htmlspecialchars($skill['name']) ?></div>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-5 whitespace-nowrap">
                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div class="bg-primary h-2.5 rounded-full" style="width: <?= $skill['proficiency'] ?>%"></div>
                            </div>
                            <span class="text-xs text-gray-500 mt-1"><?= $skill['proficiency'] ?>%</span>
                        </td>
                        <td class="px-8 py-5 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex justify-end space-x-2">
                                <a href="/admin/skills/<?= $skill['id'] ?>/edit" class="text-indigo-500 hover:text-indigo-700 hover:bg-indigo-50 p-2 rounded-lg transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </a>
                                <form action="/admin/skills/<?= $skill['id'] ?>/delete" method="POST" onsubmit="return confirm('Are you sure?');" class="inline">
                                    <button type="submit" class="text-red-500 hover:text-red-700 hover:bg-red-50 p-2 rounded-lg transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Add Skill Form -->
<div id="add-form" class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 scroll-mt-24">
    <div class="mb-6 border-b border-gray-100 pb-4">
        <h3 class="text-xl font-bold text-gray-800">Add New Skill</h3>
    </div>
    
    <form action="/admin/skills" method="POST" class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Skill Name</label>
                <input type="text" name="name" required placeholder="E.g., PHP" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all bg-gray-50 focus:bg-white">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Proficiency (%)</label>
                <input type="number" name="proficiency" required min="0" max="100" placeholder="85" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all bg-gray-50 focus:bg-white">
            </div>
        </div>
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Icon URL (Optional)</label>
            <input type="url" name="icon" placeholder="https://..." class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all bg-gray-50 focus:bg-white">
        </div>
        
        <div class="pt-4 border-t border-gray-100 flex justify-end">
            <button type="submit" class="bg-primary hover:bg-indigo-600 text-white px-8 py-3 rounded-xl font-bold shadow-lg shadow-primary/30 transition-all flex items-center">
                Save Skill
            </button>
        </div>
    </form>
</div>

<?php 
$content = ob_get_clean(); 
require BASE_PATH . '/app/Views/layouts/admin.php'; 
?>
