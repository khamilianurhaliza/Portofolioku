<?php ob_start(); ?>

<div class="mb-8">
    <h2 class="text-3xl font-bold text-gray-800">Site Settings</h2>
    <p class="text-gray-500 text-sm mt-1">Configure your portfolio's global variables and personal information.</p>
</div>

<?php if(isset($_GET['success'])): ?>
    <div class="bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-2xl mb-8 flex items-center">
        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        Settings updated successfully!
    </div>
<?php endif; ?>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
    <form action="/admin/settings" method="POST" class="space-y-8">
        
        <!-- General Info -->
        <div>
            <h3 class="text-lg font-bold text-gray-800 border-b border-gray-100 pb-2 mb-4">General Information</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Site Title</label>
                    <input type="text" name="site_title" value="<?= htmlspecialchars($settings['site_title'] ?? '') ?>" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all bg-gray-50 focus:bg-white">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Author Name</label>
                    <input type="text" name="author_name" value="<?= htmlspecialchars($settings['author_name'] ?? '') ?>" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all bg-gray-50 focus:bg-white">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Site Description / SEO</label>
                    <input type="text" name="site_description" value="<?= htmlspecialchars($settings['site_description'] ?? '') ?>" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all bg-gray-50 focus:bg-white">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Author Bio (Hero Text)</label>
                    <textarea name="author_bio" rows="3" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all bg-gray-50 focus:bg-white resize-none"><?= htmlspecialchars($settings['author_bio'] ?? '') ?></textarea>
                </div>
            </div>
        </div>

        <!-- Contact & Socials -->
        <div>
            <h3 class="text-lg font-bold text-gray-800 border-b border-gray-100 pb-2 mb-4">Links & Socials</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Contact Email</label>
                    <input type="email" name="contact_email" value="<?= htmlspecialchars($settings['contact_email'] ?? '') ?>" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all bg-gray-50 focus:bg-white">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">GitHub URL</label>
                    <input type="url" name="github_url" value="<?= htmlspecialchars($settings['github_url'] ?? '') ?>" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all bg-gray-50 focus:bg-white">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">LinkedIn URL</label>
                    <input type="url" name="linkedin_url" value="<?= htmlspecialchars($settings['linkedin_url'] ?? '') ?>" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all bg-gray-50 focus:bg-white">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Instagram URL</label>
                    <input type="url" name="instagram_url" value="<?= htmlspecialchars($settings['instagram_url'] ?? '') ?>" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all bg-gray-50 focus:bg-white">
                </div>
            </div>
        </div>
        
        <div class="pt-6 border-t border-gray-100 flex justify-end">
            <button type="submit" class="bg-primary hover:bg-indigo-600 text-white px-8 py-3 rounded-xl font-bold shadow-lg shadow-primary/30 transition-all">
                Save All Settings
            </button>
        </div>
    </form>
</div>

<?php 
$content = ob_get_clean(); 
require BASE_PATH . '/app/Views/layouts/admin.php'; 
?>
