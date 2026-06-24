<?php ob_start(); ?>

<div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
    <div>
        <h2 class="text-3xl font-bold text-gray-800">Manage Projects</h2>
        <p class="text-gray-500 text-sm mt-1">Add, edit, or remove items from your portfolio.</p>
    </div>
    <button onclick="document.getElementById('add-form').scrollIntoView({behavior: 'smooth'})" class="bg-primary hover:bg-indigo-600 text-white px-6 py-2.5 rounded-xl font-medium shadow-lg shadow-primary/30 transition-all flex items-center">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Add New Project
    </button>
</div>

<!-- Projects Table -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-12">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-100">
            <thead class="bg-gray-50/80">
                <tr>
                    <th scope="col" class="px-8 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Project Info</th>
                    <th scope="col" class="px-8 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Technologies</th>
                    <th scope="col" class="px-8 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Links</th>
                    <th scope="col" class="px-8 py-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                <?php if(empty($projects)): ?>
                <tr>
                    <td colspan="4" class="px-8 py-12 text-center text-gray-500">
                        <div class="inline-block p-4 rounded-full bg-gray-50 mb-3">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        </div>
                        <p class="font-medium">No projects added yet.</p>
                    </td>
                </tr>
                <?php else: ?>
                    <?php foreach($projects as $project): ?>
                    <tr class="hover:bg-gray-50/50 transition-colors group">
                        <td class="px-8 py-5 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="h-12 w-12 flex-shrink-0 rounded-lg overflow-hidden bg-gray-100 border border-gray-200">
                                    <?php if($project['image_url']): ?>
                                        <img src="<?= htmlspecialchars($project['image_url']) ?>" alt="" class="h-full w-full object-cover">
                                    <?php else: ?>
                                        <div class="h-full w-full flex items-center justify-center text-gray-400 text-xs">No Img</div>
                                    <?php endif; ?>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-bold text-gray-900"><?= htmlspecialchars($project['title']) ?></div>
                                    <div class="text-xs text-gray-500 mt-1 max-w-xs truncate"><?= strip_tags($project['description']) ?></div>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-5">
                            <div class="flex flex-wrap gap-1">
                                <?php if(empty($project['technologies'])): ?>
                                    <span class="text-xs text-gray-400">-</span>
                                <?php else: ?>
                                    <?php foreach($project['technologies'] as $tech): ?>
                                        <span class="inline-block px-2 py-0.5 text-[10px] font-medium rounded-full text-white <?= htmlspecialchars($tech['color']) ?>">
                                            <?= htmlspecialchars($tech['name']) ?>
                                        </span>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </td>
                        <td class="px-8 py-5 whitespace-nowrap">
                            <div class="flex flex-col space-y-1">
                                <?php if($project['demo_url']): ?>
                                    <a href="<?= htmlspecialchars($project['demo_url']) ?>" target="_blank" class="text-xs font-medium text-primary hover:text-indigo-700 flex items-center">
                                        Demo <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                    </a>
                                <?php endif; ?>
                                <?php if($project['repository_url']): ?>
                                    <a href="<?= htmlspecialchars($project['repository_url']) ?>" target="_blank" class="text-xs font-medium text-gray-500 hover:text-gray-700 flex items-center">
                                        Repo <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </td>
                        <td class="px-8 py-5 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex justify-end space-x-2">
                                <a href="/admin/projects/<?= $project['id'] ?>/edit" class="text-indigo-500 hover:text-indigo-700 hover:bg-indigo-50 p-2 rounded-lg transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </a>
                                <form action="/admin/projects/<?= $project['id'] ?>/delete" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?');" class="inline">
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

<!-- Add Project Form -->
<div id="add-form" class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 scroll-mt-24">
    <div class="mb-6 border-b border-gray-100 pb-4">
        <h3 class="text-xl font-bold text-gray-800">Add New Project</h3>
        <p class="text-gray-500 text-sm mt-1">Fill out the details below. Use the rich text editor for the description.</p>
    </div>
    
    <form action="/admin/projects" method="POST" id="projectForm" enctype="multipart/form-data" class="space-y-6">
        <div class="grid grid-cols-1 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Project Title</label>
                <input type="text" name="title" required placeholder="E.g., E-Commerce Website" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all bg-gray-50 focus:bg-white">
            </div>
            
            <!-- WYSIWYG Editor Container -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                <input type="hidden" name="description" id="hiddenDescription">
                <div id="editor-container" style="height: 200px;" class="bg-white border border-gray-200 rounded-xl"></div>
            </div>

            <!-- Technologies Checkboxes -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Technologies Used</label>
                <div class="bg-gray-50 border border-gray-200 p-4 rounded-xl flex flex-wrap gap-4 max-h-40 overflow-y-auto">
                    <?php if(empty($technologies)): ?>
                        <p class="text-sm text-gray-500">No technologies found. <a href="/admin/technologies" class="text-primary hover:underline">Add some first.</a></p>
                    <?php else: ?>
                        <?php foreach($technologies as $tech): ?>
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="technologies[]" value="<?= $tech['id'] ?>" class="w-4 h-4 text-primary rounded border-gray-300 focus:ring-primary">
                            <span class="ml-2 text-sm text-gray-700"><?= htmlspecialchars($tech['name']) ?></span>
                        </label>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Project Image (Upload)</label>
                <div class="relative">
                    <input type="file" name="image" accept="image/*" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary/20 transition-all bg-gray-50 focus:bg-white text-sm file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20">
                </div>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Repository URL</label>
                <div class="relative">
                    <input type="url" name="repository_url" placeholder="https://github.com/..." class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary/20 transition-all bg-gray-50 focus:bg-white">
                </div>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Live Demo URL</label>
                <div class="relative">
                    <input type="url" name="demo_url" placeholder="https://..." class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary/20 transition-all bg-gray-50 focus:bg-white">
                </div>
            </div>
        </div>
        
        <div class="pt-4 border-t border-gray-100 flex justify-end">
            <button type="submit" class="bg-primary hover:bg-indigo-600 text-white px-8 py-3 rounded-xl font-bold shadow-lg shadow-primary/30 transition-all">
                Save Project
            </button>
        </div>
    </form>
</div>

<!-- Initialize QuillJS -->
<script>
    var quill = new Quill('#editor-container', {
        theme: 'snow',
        placeholder: 'Write your project description here...',
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
                ['blockquote', 'code-block'],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
                ['image'],                                        // add image support
                ['clean']                                         // remove formatting button
            ]
        }
    });

    var form = document.getElementById('projectForm');
    form.onsubmit = function() {
        // Populate hidden form on submit
        var description = document.querySelector('input[name=description]');
        description.value = quill.root.innerHTML;
        
        // Prevent empty submit if needed
        if (quill.getText().trim().length === 0) {
            description.value = '';
        }
    };
</script>

<?php 
$content = ob_get_clean(); 
require BASE_PATH . '/app/Views/layouts/admin.php'; 
?>
