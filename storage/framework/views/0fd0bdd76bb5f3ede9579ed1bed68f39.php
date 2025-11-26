<?php $__env->startPush('styles'); ?>
<style>
.preview-container {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
    margin-top: 8px;
}
.preview-item {
    position: relative;
    width: 100px;
    height: 100px;
    border: 2px dashed #cbd5e1;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f8fafc;
}
.preview-item img {
    max-width: 100%;
    max-height: 100%;
    border-radius: 6px;
    object-fit: cover;
}
.preview-item .file-name {
    font-size: 10px;
    color: #64748b;
    text-align: center;
    padding: 4px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    max-width: 100%;
}
.remove-preview {
    position: absolute;
    top: -8px;
    right: -8px;
    background: #ef4444;
    color: white;
    border: none;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    cursor: pointer;
    font-size: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0.8;
}
.remove-preview:hover {
    opacity: 1;
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<section class="py-16 bg-gradient-to-b from-emerald-50 to-white">
    <div class="container mx-auto px-4 max-w-4xl">
        <div class="text-center mb-10">
            <p class="text-sm text-emerald-600 uppercase tracking-[0.4em]">Pendaftaran MI</p>
            <h1 class="text-4xl font-bold text-slate-900">Formulir Daftar Online</h1>
            <p class="text-slate-600 mt-3">Isi data calon siswa dengan lengkap. Tim kami akan menghubungi melalui WhatsApp dalam 1x24 jam.</p>
        </div>

        <?php if(session('success')): ?>
            <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-emerald-700">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('registration.store')); ?>" method="post" enctype="multipart/form-data" class="bg-white border border-slate-100 rounded-3xl p-8 shadow-sm space-y-6">
            <?php echo csrf_field(); ?>
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="text-sm font-semibold text-slate-600">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" value="<?php echo e(old('nama_lengkap')); ?>" class="w-full border border-slate-200 rounded-2xl px-4 py-3 text-sm" required>
                    <?php $__errorArgs = ['nama_lengkap'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-rose-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div>
                    <label class="text-sm font-semibold text-slate-600">NISN</label>
                    <input type="text" name="nisn" value="<?php echo e(old('nisn')); ?>" class="w-full border border-slate-200 rounded-2xl px-4 py-3 text-sm">
                    <?php $__errorArgs = ['nisn'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-rose-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div>
                    <label class="text-sm font-semibold text-slate-600">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="w-full border border-slate-200 rounded-2xl px-4 py-3 text-sm" required>
                        <option value="">Pilih</option>
                        <option value="L" <?php if(old('jenis_kelamin')==='L'): echo 'selected'; endif; ?>>Laki-laki</option>
                        <option value="P" <?php if(old('jenis_kelamin')==='P'): echo 'selected'; endif; ?>>Perempuan</option>
                    </select>
                    <?php $__errorArgs = ['jenis_kelamin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-rose-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div>
                    <label class="text-sm font-semibold text-slate-600">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" value="<?php echo e(old('tempat_lahir')); ?>" class="w-full border border-slate-200 rounded-2xl px-4 py-3 text-sm" required>
                    <?php $__errorArgs = ['tempat_lahir'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-rose-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div>
                    <label class="text-sm font-semibold text-slate-600">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" value="<?php echo e(old('tanggal_lahir')); ?>" class="w-full border border-slate-200 rounded-2xl px-4 py-3 text-sm" required>
                    <?php $__errorArgs = ['tanggal_lahir'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-rose-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div>
                    <label class="text-sm font-semibold text-slate-600">Asal Sekolah/TK</label>
                    <input type="text" name="asal_sekolah" value="<?php echo e(old('asal_sekolah')); ?>" class="w-full border border-slate-200 rounded-2xl px-4 py-3 text-sm">
                    <?php $__errorArgs = ['asal_sekolah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-rose-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <div>
                <label class="text-sm font-semibold text-slate-600">Alamat Lengkap</label>
                <textarea name="alamat" rows="3" class="w-full border border-slate-200 rounded-2xl px-4 py-3 text-sm" required><?php echo e(old('alamat')); ?></textarea>
                <?php $__errorArgs = ['alamat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-rose-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="text-sm font-semibold text-slate-600">Nama Orang Tua/Wali</label>
                    <input type="text" name="nama_ortu" value="<?php echo e(old('nama_ortu')); ?>" class="w-full border border-slate-200 rounded-2xl px-4 py-3 text-sm" required>
                    <?php $__errorArgs = ['nama_ortu'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-rose-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div>
                    <label class="text-sm font-semibold text-slate-600">Nomor HP Aktif</label>
                    <input type="text" name="no_hp" value="<?php echo e(old('no_hp')); ?>" class="w-full border border-slate-200 rounded-2xl px-4 py-3 text-sm" required>
                    <?php $__errorArgs = ['no_hp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-rose-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div>
                    <label class="text-sm font-semibold text-slate-600">Email</label>
                    <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="w-full border border-slate-200 rounded-2xl px-4 py-3 text-sm">
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-rose-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="text-sm font-semibold text-slate-600">Upload KK (PDF/JPG)</label>
                    <input type="file" name="dokumen_kk" class="w-full border border-dashed border-slate-300 rounded-2xl px-4 py-3 text-sm file-input" data-preview="dokumen_kk_preview" accept=".pdf,.jpg,.jpeg,.png">
                    <?php $__errorArgs = ['dokumen_kk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-rose-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <div id="dokumen_kk_preview" class="preview-container"></div>
                </div>
                <div>
                    <label class="text-sm font-semibold text-slate-600">Upload Akte Kelahiran</label>
                    <input type="file" name="dokumen_akte" class="w-full border border-dashed border-slate-300 rounded-2xl px-4 py-3 text-sm file-input" data-preview="dokumen_akte_preview" accept=".pdf,.jpg,.jpeg,.png">
                    <?php $__errorArgs = ['dokumen_akte'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-rose-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <div id="dokumen_akte_preview" class="preview-container"></div>
                </div>
                <div>
                    <label class="text-sm font-semibold text-slate-600">Upload Pas Foto (JPG/PNG)</label>
                    <input type="file" name="pas_foto" class="w-full border border-dashed border-slate-300 rounded-2xl px-4 py-3 text-sm file-input" data-preview="pas_foto_preview" accept=".jpg,.jpeg,.png">
                    <?php $__errorArgs = ['pas_foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-rose-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <div id="pas_foto_preview" class="preview-container"></div>
                </div>
                <div>
                    <label class="text-sm font-semibold text-slate-600">Upload Foto Ijazah/STL (JPG/PNG)</label>
                    <input type="file" name="foto_ijazah" class="w-full border border-dashed border-slate-300 rounded-2xl px-4 py-3 text-sm file-input" data-preview="foto_ijazah_preview" accept=".jpg,.jpeg,.png">
                    <?php $__errorArgs = ['foto_ijazah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-xs text-rose-500 mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <div id="foto_ijazah_preview" class="preview-container"></div>
                </div>
            </div>

            <div class="flex items-start gap-3">
                <span class="w-3 h-3 rounded-full bg-emerald-500 mt-2"></span>
                <p class="text-sm text-slate-500">Setelah mengirim formulir, harap standby nomor WhatsApp untuk verifikasi dokumen.</p>
            </div>

            <div class="text-center">
                <button class="inline-flex items-center gap-2 bg-emerald-500 hover:bg-emerald-600 text-white px-8 py-3 rounded-full font-semibold">Kirim Pendaftaran</button>
            </div>
        </form>
    </div>
</section>
<?php $__env->startPush('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const fileInputs = document.querySelectorAll('.file-input');

    fileInputs.forEach(input => {
        input.addEventListener('change', function(e) {
            const previewContainer = document.getElementById(this.getAttribute('data-preview'));
            previewContainer.innerHTML = '';

            const files = Array.from(e.target.files);

            files.forEach((file, index) => {
                createPreview(file, previewContainer);
            });
        });
    });

    function createPreview(file, container) {
        const previewItem = document.createElement('div');
        previewItem.style.cssText = 'position: relative; width: 100px; height: 100px; border: 2px dashed #cbd5e1; border-radius: 8px; display: flex; align-items: center; justify-content: center; background: #f8fafc; margin: 5px;';

        const reader = new FileReader();

        reader.onload = function(e) {
            if (file.type.startsWith('image/')) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.style.cssText = 'max-width: 100%; max-height: 70px; border-radius: 6px; object-fit: cover;';
                previewItem.appendChild(img);
            } else if (file.type === 'application/pdf') {
                const pdfIcon = document.createElement('div');
                pdfIcon.innerHTML = '<div style="background:#ef4444;color:white;padding:8px 12px;border-radius:6px;font-size:10px;font-weight:bold;">PDF</div>';
                previewItem.appendChild(pdfIcon);
            }

            const fileName = document.createElement('div');
            fileName.style.cssText = 'position: absolute; bottom: 0; left: 0; right: 0; background: rgba(255,255,255,0.9); font-size: 8px; color: #64748b; text-align: center; padding: 2px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;';
            fileName.textContent = file.name.length > 12 ? file.name.substring(0, 10) + '...' : file.name;
            fileName.title = file.name;
            previewItem.appendChild(fileName);

            const removeBtn = document.createElement('button');
            removeBtn.innerHTML = '×';
            removeBtn.style.cssText = 'position: absolute; top: -8px; right: -8px; background: #ef4444; color: white; border: none; border-radius: 50%; width: 20px; height: 20px; cursor: pointer; font-size: 12px; opacity: 0.8;';
            removeBtn.type = 'button';
            removeBtn.onmouseover = function() { this.style.opacity = '1'; };
            removeBtn.onmouseout = function() { this.style.opacity = '0.8'; };
            removeBtn.onclick = function() {
                previewItem.remove();
                const containerId = container.id;
                const input = document.querySelector(`[data-preview="${containerId}"]`);
                if (input) input.value = '';
            };
            previewItem.appendChild(removeBtn);
        };

        reader.readAsDataURL(file);
        container.appendChild(previewItem);
    }
});
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', ['title' => 'Daftar Online MI'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\adyatama-school2\resources\views/registration/index.blade.php ENDPATH**/ ?>