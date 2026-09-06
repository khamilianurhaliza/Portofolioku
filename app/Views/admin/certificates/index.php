<?php ob_start(); ?>

<div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
    <div>
        <h2 class="text-3xl font-bold text-gray-800">Manage Certificates</h2>
        <p class="text-gray-500 text-sm mt-1">Add your professional certificates and achievements.</p>
    </div>
    <button onclick="toggleForm()" class="bg-primary hover:bg-indigo-600 text-white px-6 py-2.5 rounded-xl font-medium shadow-lg shadow-primary/30 transition-all flex items-center">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Add Certificate
    </button>
</div>

<!-- Certificates Table -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-12">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-100">
            <thead class="bg-gray-50/80">
                <tr>
                    <th scope="col" class="px-8 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Image</th>
                    <th scope="col" class="px-8 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Certificate Title</th>
                    <th scope="col" class="px-8 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Issuer</th>
                    <th scope="col" class="px-8 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Date Issued</th>
                    <th scope="col" class="px-8 py-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                <?php if(empty($certificates)): ?>
                <tr><td colspan="5" class="px-8 py-8 text-center text-gray-500">No certificates added yet.</td></tr>
                <?php else: ?>
                    <?php foreach($certificates as $cert): ?>
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-8 py-4">
                            <?php if(!empty($cert['image_url'])): ?>
                                <img src="<?= htmlspecialchars($cert['image_url']) ?>" alt="Certificate Image" class="w-20 h-14 object-cover rounded-lg border border-gray-200">
                            <?php else: ?>
                                <div class="w-20 h-14 bg-gray-100 rounded-lg border border-gray-200 flex items-center justify-center text-gray-400 text-xs">No Image</div>
                            <?php endif; ?>
                        </td>
                        <td class="px-8 py-4">
                            <p class="text-sm font-medium text-gray-800"><?= htmlspecialchars($cert['title']) ?></p>
                            <?php if(!empty($cert['credential_url'])): ?>
                                <a href="<?= htmlspecialchars($cert['credential_url']) ?>" target="_blank" class="text-xs text-primary hover:underline flex items-center mt-1">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                    View Credential
                                </a>
                            <?php endif; ?>
                        </td>
                        <td class="px-8 py-4 text-sm text-gray-600">
                            <?= htmlspecialchars($cert['issuer']) ?>
                        </td>
                        <td class="px-8 py-4 text-sm text-gray-600">
                            <?= !empty($cert['date_issued']) ? date('M d, Y', strtotime($cert['date_issued'])) : '-' ?>
                        </td>
                        <td class="px-8 py-5 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex justify-end space-x-2">
                                <a href="/admin/certificates/<?= $cert['id'] ?>/edit" class="text-indigo-500 hover:text-indigo-700 hover:bg-indigo-50 p-2 rounded-lg transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </a>
                                <form action="/admin/certificates/<?= $cert['id'] ?>/delete" method="POST" onsubmit="return confirm('Are you sure you want to delete this certificate?');" class="inline">
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

<!-- Add Certificate Form -->
<div id="add-form" class="hidden bg-white p-8 rounded-2xl shadow-sm border border-gray-100 scroll-mt-24">
    <div class="mb-6 border-b border-gray-100 pb-4">
        <h3 class="text-xl font-bold text-gray-800">Add New Certificate</h3>
    </div>
    
    <form action="/admin/certificates" method="POST" enctype="multipart/form-data" class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Certificate Title</label>
                <input type="text" name="title" required placeholder="E.g., AWS Certified Solutions Architect" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary/20">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Issuer</label>
                <input type="text" name="issuer" required placeholder="E.g., Amazon Web Services" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary/20">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Date Issued</label>
                <input type="date" name="date_issued" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary/20">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Credential URL</label>
                <input type="url" name="credential_url" placeholder="https://..." class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary/20">
                <p class="text-xs text-gray-500 mt-1">Optional link to verify the certificate</p>
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Certificate Image</label>
                <div class="flex items-center justify-center w-full">
                    <label id="dropzone-label-add" class="flex flex-col items-center justify-center w-full h-48 border-2 border-gray-300 border-dashed rounded-xl cursor-pointer bg-gray-50 hover:bg-gray-100 transition-all relative overflow-hidden group">
                        <div id="upload-content-add" class="flex flex-col items-center justify-center pt-5 pb-6 z-10 transition-all bg-white/50 backdrop-blur-sm rounded-xl p-4 mt-2">
                            <svg class="w-8 h-8 mb-3 text-gray-400 group-hover:text-primary transition-colors mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                            <p class="mb-2 text-sm text-gray-800"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-600">PNG, JPG or WEBP (MAX. 2MB)</p>
                        </div>
                        <img id="image-preview-add" class="absolute inset-0 w-full h-full object-contain hidden z-0 opacity-60 group-hover:opacity-30 transition-opacity" />
                        <input type="file" id="image-input-add" name="image" class="hidden" accept="image/*" />
                    </label>
                </div>
            </div>
        </div>
        <div class="pt-4 flex justify-end">
            <button type="submit" class="bg-primary hover:bg-indigo-600 text-white px-8 py-3 rounded-xl font-bold transition-all shadow-lg shadow-primary/30">Save Certificate</button>
        </div>
    </form>
</div>

<script>
    function toggleForm() {
        var formContainer = document.getElementById('add-form');
        formContainer.classList.toggle('hidden');
        if (!formContainer.classList.contains('hidden')) {
            formContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }

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
        setupDragAndDrop('image-input-add', 'dropzone-label-add', 'image-preview-add');
    });
</script>

<?php 
$content = ob_get_clean(); 
require BASE_PATH . '/app/Views/layouts/admin.php'; 
?>
