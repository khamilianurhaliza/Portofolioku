<?php ob_start(); ?>

<div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
    <div>
        <h2 class="text-3xl font-bold text-gray-800">Manage Technologies</h2>
        <p class="text-gray-500 text-sm mt-1">Add technologies/tools you use, which can later be assigned to projects.</p>
    </div>
    <button onclick="document.getElementById('add-form').scrollIntoView({behavior: 'smooth'})" class="bg-primary hover:bg-indigo-600 text-white px-6 py-2.5 rounded-xl font-medium shadow-lg shadow-primary/30 transition-all flex items-center">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Add Technology
    </button>
</div>

<!-- Tech Table -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-12">
    <table class="min-w-full divide-y divide-gray-100">
        <thead class="bg-gray-50/80">
            <tr>
                <th scope="col" class="px-8 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Technology Name</th>
                <th scope="col" class="px-8 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Color Class (Tailwind)</th>
                <th scope="col" class="px-8 py-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-100">
            <?php if(empty($technologies)): ?>
            <tr><td colspan="3" class="px-8 py-8 text-center text-gray-500">No technologies added yet.</td></tr>
            <?php else: ?>
                <?php foreach($technologies as $tech): ?>
                <tr class="hover:bg-gray-50/50 transition-colors">
                    <td class="px-8 py-4">
                        <span class="inline-block px-3 py-1 text-sm font-medium rounded-full text-white <?= htmlspecialchars($tech['color']) ?>">
                            <?= htmlspecialchars($tech['name']) ?>
                        </span>
                    </td>
                    <td class="px-8 py-4 text-sm text-gray-600">
                        <?= htmlspecialchars($tech['color']) ?>
                    </td>
                    <td class="px-8 py-5 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex justify-end space-x-2">
                            <a href="/admin/technologies/<?= $tech['id'] ?>/edit" class="text-indigo-500 hover:text-indigo-700 hover:bg-indigo-50 p-2 rounded-lg transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </a>
                            <form action="/admin/technologies/<?= $tech['id'] ?>/delete" method="POST" onsubmit="return confirm('Are you sure?');" class="inline">
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

<!-- Add Tech Form -->
<div id="add-form" class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 scroll-mt-24">
    <div class="mb-6 border-b border-gray-100 pb-4">
        <h3 class="text-xl font-bold text-gray-800">Add New Technology</h3>
    </div>
    
    <form action="/admin/technologies" method="POST" class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Technology Name</label>
                <input type="text" name="name" required placeholder="E.g., Laravel" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary/20">
            </div>
            <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Badge Color</label>
            <?php
            $colors = [
                'bg-red-500' => 'Red',
                'bg-orange-500' => 'Orange',
                'bg-amber-500' => 'Amber',
                'bg-yellow-500' => 'Yellow',
                'bg-lime-500' => 'Lime',
                'bg-green-500' => 'Green',
                'bg-emerald-500' => 'Emerald',
                'bg-teal-500' => 'Teal',
                'bg-cyan-500' => 'Cyan',
                'bg-sky-500' => 'Sky',
                'bg-blue-500' => 'Blue',
                'bg-indigo-500' => 'Indigo',
                'bg-violet-500' => 'Violet',
                'bg-purple-500' => 'Purple',
                'bg-fuchsia-500' => 'Fuchsia',
                'bg-pink-500' => 'Pink',
                'bg-rose-500' => 'Rose',
                'bg-slate-500' => 'Slate/Gray',
                'bg-gray-800' => 'Dark Gray'
            ];
            ?>
            <select name="color" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all bg-gray-50 focus:bg-white">
                <option value="">-- Select a Color --</option>
                <?php foreach($colors as $class => $label): ?>
                    <option value="<?= $class ?>"><?= $label ?></option>
                <?php endforeach; ?>
            </select>
            <p class="text-xs text-gray-500 mt-2">Select the color that best matches the technology logo.</p>
        </div>
        </div>
        <div class="pt-4 flex justify-end">
            <button type="submit" class="bg-primary hover:bg-indigo-600 text-white px-8 py-3 rounded-xl font-bold">Save Technology</button>
        </div>
    </form>
</div>

<?php 
$content = ob_get_clean(); 
require BASE_PATH . '/app/Views/layouts/admin.php'; 
?>
