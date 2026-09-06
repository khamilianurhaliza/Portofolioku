<?php ob_start(); ?>

<div class="mb-8 flex items-center gap-4">
    <a href="/admin/certificates" class="w-10 h-10 rounded-xl bg-white border border-gray-200 flex items-center justify-center text-gray-500 hover:text-primary hover:border-primary transition-colors">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
    </a>
    <div>
        <h2 class="text-3xl font-bold text-gray-800">Edit Certificate</h2>
        <p class="text-gray-500 text-sm mt-1">Update your professional certificate details.</p>
    </div>
</div>

<div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 max-w-4xl">
    <form action="/admin/certificates/<?= $certificate['id'] ?>/edit" method="POST" enctype="multipart/form-data" class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Certificate Title</label>
                <input type="text" name="title" value="<?= htmlspecialchars($certificate['title']) ?>" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary/20">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Issuer</label>
                <input type="text" name="issuer" value="<?= htmlspecialchars($certificate['issuer']) ?>" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary/20">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Date Issued</label>
                <input type="date" name="date_issued" value="<?= htmlspecialchars($certificate['date_issued'] ?? '') ?>" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary/20">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Credential URL</label>
                <input type="url" name="credential_url" value="<?= htmlspecialchars($certificate['credential_url'] ?? '') ?>" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary/20">
            </div>
            
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Certificate Image</label>
                <div class="flex items-center justify-center w-full">
                    <label id="dropzone-label-edit" class="flex flex-col items-center justify-center w-full h-48 border-2 border-gray-300 border-dashed rounded-xl cursor-pointer bg-gray-50 hover:bg-gray-100 transition-all relative overflow-hidden group">
                        <div id="upload-content-edit" class="flex flex-col items-center justify-center pt-5 pb-6 z-10 <?= !empty($certificate['image_url']) ? 'bg-white/50 backdrop-blur-sm rounded-xl p-4 mt-2' : '' ?> transition-all">
                            <svg class="w-8 h-8 mb-3 text-gray-400 group-hover:text-primary transition-colors mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                            <p class="mb-2 text-sm text-gray-800"><span class="font-semibold">Click to upload new image</span> or drag and drop</p>
                            <p class="text-xs text-gray-600">Leave empty to keep current image. (MAX. 2MB)</p>
                        </div>
                        
                        <?php if(!empty($certificate['image_url'])): ?>
                            <img id="image-preview-edit" src="<?= htmlspecialchars($certificate['image_url']) ?>" class="absolute inset-0 w-full h-full object-contain z-0 opacity-60 group-hover:opacity-30 transition-opacity" />
                        <?php else: ?>
                            <img id="image-preview-edit" class="absolute inset-0 w-full h-full object-contain hidden z-0 opacity-60 group-hover:opacity-30 transition-opacity" />
                        <?php endif; ?>
                        
                        <input type="file" id="image-input-edit" name="image" class="hidden" accept="image/*" />
                    </label>
                </div>
            </div>
        </div>
        
        <div class="pt-6 border-t border-gray-100 flex justify-end gap-3">
            <a href="/admin/certificates" class="px-6 py-3 rounded-xl font-medium text-gray-600 hover:bg-gray-100 transition-colors">Cancel</a>
            <button type="submit" class="bg-primary hover:bg-indigo-600 text-white px-8 py-3 rounded-xl font-bold shadow-lg shadow-primary/30 transition-all">Update Certificate</button>
        </div>
    </form>
</div>

<script>
    // Drag and Drop with Preview
    function setupDragAndDrop(inputId, labelId, previewId) {
        const input = document.getElementById(inputId);
        const label = document.getElementById(labelId);
        const preview = document.getElementById(previewId);

        if(!input || !label || !preview) return;

        const showPreview = (file) => {
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    label.classList.add('border-primary');
                };
                reader.readAsDataURL(file);
            }
        };

        input.addEventListener('change', (e) => {
            if (e.target.files.length > 0) {
                showPreview(e.target.files[0]);
            }
        });

        label.addEventListener('dragover', (e) => {
            e.preventDefault();
            label.classList.add('border-primary', 'bg-gray-100');
        });

        label.addEventListener('dragleave', (e) => {
            e.preventDefault();
            label.classList.remove('border-primary', 'bg-gray-100');
        });

        label.addEventListener('drop', (e) => {
            e.preventDefault();
            label.classList.remove('border-primary', 'bg-gray-100');
            
            if (e.dataTransfer.files.length > 0) {
                input.files = e.dataTransfer.files;
                showPreview(e.dataTransfer.files[0]);
            }
        });
    }

    document.addEventListener('DOMContentLoaded', () => {
        setupDragAndDrop('image-input-edit', 'dropzone-label-edit', 'image-preview-edit');
    });
</script>

<?php 
$content = ob_get_clean(); 
require BASE_PATH . '/app/Views/layouts/admin.php'; 
?>
