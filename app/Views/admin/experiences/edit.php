<?php ob_start(); ?>

<div class="flex items-center mb-8 gap-4">
    <a href="/admin/experiences" class="p-2 bg-white rounded-xl shadow-sm border border-gray-100 text-gray-500 hover:text-primary hover:border-primary/30 transition-colors">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
    </a>
    <div>
        <h2 class="text-3xl font-bold text-gray-800">Edit Experience</h2>
        <p class="text-gray-500 text-sm mt-1">Update the details of your work history.</p>
    </div>
</div>

<div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
    <form action="/admin/experiences/<?= $experience['id'] ?>/edit" method="POST" id="editExpForm" class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Position Title</label>
                <input type="text" name="position" value="<?= htmlspecialchars($experience['position']) ?>" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary/20 transition-all bg-gray-50 focus:bg-white">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Company / Institution</label>
                <input type="text" name="company" value="<?= htmlspecialchars($experience['company']) ?>" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary/20 transition-all bg-gray-50 focus:bg-white">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Start Date</label>
                <input type="date" name="start_date" value="<?= htmlspecialchars($experience['start_date']) ?>" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary/20 transition-all bg-gray-50 focus:bg-white">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">End Date (Leave blank if present)</label>
                <input type="date" name="end_date" value="<?= $experience['end_date'] ? htmlspecialchars($experience['end_date']) : '' ?>" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary/20 transition-all bg-gray-50 focus:bg-white">
            </div>
        </div>
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
            <input type="hidden" name="description" id="hiddenDescription">
            <div id="editor-container" style="height: 300px;" class="bg-white border border-gray-200 rounded-xl">
                <?= $experience['description'] ?>
            </div>
        </div>
        
        <div class="pt-4 border-t border-gray-100 flex justify-end gap-3">
            <a href="/admin/experiences" class="px-8 py-3 rounded-xl font-bold text-gray-600 bg-gray-100 hover:bg-gray-200 transition-all">
                Cancel
            </a>
            <button type="submit" class="bg-primary hover:bg-indigo-600 text-white px-8 py-3 rounded-xl font-bold shadow-lg shadow-primary/30 transition-all">
                Update Experience
            </button>
        </div>
    </form>
</div>

<script>
    var quill = new Quill('#editor-container', {
        theme: 'snow',
        placeholder: 'Describe your responsibilities and achievements...',
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

    var form = document.getElementById('editExpForm');
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
