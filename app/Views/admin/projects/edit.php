<?php ob_start(); ?>

<div class="flex items-center mb-8 gap-4">
    <a href="/admin/projects" class="p-2 bg-white rounded-xl shadow-sm border border-gray-100 text-gray-500 hover:text-primary hover:border-primary/30 transition-colors">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
    </a>
    <div>
        <h2 class="text-3xl font-bold text-gray-800">Edit Project</h2>
        <p class="text-gray-500 text-sm mt-1">Update the details of your project.</p>
    </div>
</div>

<div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
    <form action="/admin/projects/<?= $project['id'] ?>/edit" method="POST" id="editProjectForm" enctype="multipart/form-data" class="space-y-6">
        <div class="grid grid-cols-1 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Project Title</label>
                <input type="text" name="title" value="<?= htmlspecialchars($project['title']) ?>" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary/20 transition-all bg-gray-50 focus:bg-white">
            </div>
            
            <!-- WYSIWYG Editor Container -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                <input type="hidden" name="description" id="hiddenDescription">
                <div id="editor-container" style="height: 300px;" class="bg-white border border-gray-200 rounded-xl">
                    <?= $project['description'] ?>
                </div>
            </div>

            <!-- Technologies Checkboxes -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Technologies Used</label>
                <div class="bg-gray-50 border border-gray-200 p-4 rounded-xl flex flex-wrap gap-4 max-h-40 overflow-y-auto">
                    <?php 
                        $projectTechIds = array_column($project['technologies'] ?? [], 'id');
                    ?>
                    <?php if(empty($technologies)): ?>
                        <p class="text-sm text-gray-500">No technologies found.</p>
                    <?php else: ?>
                        <?php foreach($technologies as $tech): ?>
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="technologies[]" value="<?= $tech['id'] ?>" <?= in_array($tech['id'], $projectTechIds) ? 'checked' : '' ?> class="w-4 h-4 text-primary rounded border-gray-300 focus:ring-primary">
                            <span class="ml-2 text-sm text-gray-700"><?= htmlspecialchars($tech['name']) ?></span>
                        </label>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Project Image (Upload New)</label>
                <div class="relative">
                    <input type="file" name="image" accept="image/*" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary/20 transition-all bg-gray-50 focus:bg-white text-sm file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20">
                    <?php if($project['image_url']): ?>
                        <p class="mt-2 text-xs text-gray-500">Current: <a href="<?= htmlspecialchars($project['image_url']) ?>" target="_blank" class="text-primary hover:underline">View Image</a> (Leave blank to keep current)</p>
                    <?php endif; ?>
                </div>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Repository URL</label>
                <div class="relative">
                    <input type="url" name="repository_url" value="<?= htmlspecialchars($project['repository_url']) ?>" placeholder="https://github.com/..." class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary/20 transition-all bg-gray-50 focus:bg-white">
                </div>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Live Demo URL</label>
                <div class="relative">
                    <input type="url" name="demo_url" value="<?= htmlspecialchars($project['demo_url']) ?>" placeholder="https://..." class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary/20 transition-all bg-gray-50 focus:bg-white">
                </div>
            </div>
        </div>
        
        <div class="pt-4 border-t border-gray-100 flex justify-end gap-3">
            <a href="/admin/projects" class="px-8 py-3 rounded-xl font-bold text-gray-600 bg-gray-100 hover:bg-gray-200 transition-all">
                Cancel
            </a>
            <button type="submit" class="bg-primary hover:bg-indigo-600 text-white px-8 py-3 rounded-xl font-bold shadow-lg shadow-primary/30 transition-all">
                Update Project
            </button>
        </div>
    </form>
</div>

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
                ['image'],
                ['clean']                                         // remove formatting button
            ]
        }
    });

    var form = document.getElementById('editProjectForm');
    form.onsubmit = function() {
        var description = document.querySelector('input[name=description]');
        description.value = quill.root.innerHTML;
        
        if (quill.getText().trim().length === 0) {
            description.value = '';
        }
    };
</script>

<?php 
$content = ob_get_clean(); 
require BASE_PATH . '/app/Views/layouts/admin.php'; 
?>
