<?php ob_start(); ?>

<div class="flex items-center mb-8 gap-4">
    <a href="/admin/skills" class="p-2 bg-white rounded-xl shadow-sm border border-gray-100 text-gray-500 hover:text-primary hover:border-primary/30 transition-colors">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
    </a>
    <div>
        <h2 class="text-3xl font-bold text-gray-800">Edit Skill</h2>
        <p class="text-gray-500 text-sm mt-1">Update your proficiency or skill details.</p>
    </div>
</div>

<div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 max-w-3xl">
    <form action="/admin/skills/<?= $skill['id'] ?>/edit" method="POST" class="space-y-6">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Skill Name</label>
            <input type="text" name="name" value="<?= htmlspecialchars($skill['name']) ?>" required placeholder="E.g., PHP" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all bg-gray-50 focus:bg-white">
        </div>
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Proficiency (%)</label>
            <input type="number" name="proficiency" value="<?= htmlspecialchars($skill['proficiency']) ?>" min="0" max="100" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all bg-gray-50 focus:bg-white">
        </div>
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Icon URL (Optional)</label>
            <input type="url" name="icon" value="<?= htmlspecialchars($skill['icon']) ?>" placeholder="https://..." class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all bg-gray-50 focus:bg-white">
            <p class="text-xs text-gray-500 mt-1">Provide a URL for the skill icon (SVG/PNG).</p>
        </div>
        
        <div class="pt-4 border-t border-gray-100 flex justify-end gap-3">
            <a href="/admin/skills" class="px-8 py-3 rounded-xl font-bold text-gray-600 bg-gray-100 hover:bg-gray-200 transition-all">
                Cancel
            </a>
            <button type="submit" class="bg-primary hover:bg-indigo-600 text-white px-8 py-3 rounded-xl font-bold shadow-lg shadow-primary/30 transition-all flex items-center">
                Update Skill
            </button>
        </div>
    </form>
</div>

<?php 
$content = ob_get_clean(); 
require BASE_PATH . '/app/Views/layouts/admin.php'; 
?>
