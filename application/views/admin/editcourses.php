<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <form action="<?= base_url('admin/editcourses/' . $course['id']); ?>" method="post" enctype="multipart/form-data">

        <div class="mb-3">
            <div class="col-sm-5">
                <label for="courses" class="form-label">Course Title</label>
                <input type="text" class="form-control" id="courses" name="courses" placeholder="Course Title" value="<?= $course['title']; ?>">
            </div>
        </div>
        <div class="mb-3">
            <div class="col-sm-5">
                <label for="price" class="form-label">Course Price</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="Course Price" value="<?= $course['price']; ?>">
            </div>
        </div>
        <div class="mb-3">
            <div class="col-sm-5">
                <label for="description" class="form-label">Course Description</label>
                <textarea class="form-control" id="description" name="description" placeholder="Course Description" rows="3"><?= $course['description']; ?></textarea>
            </div>
        </div>
        <div class="mb-3">
            <div class="col-sm-5">
                <label for="materi" class="form-label">Upload Materi</label>
                <input type="file" class="form-control" id="materi" name="materi" accept=".pdf,.doc,.docx,.mp4,.mkv">
                <small class="text-muted">Tipe file yang didukung: PDF, DOC, DOCX, MP4, MKV</small>
                <?php if (!empty($course['file_path'])): ?>
                    <small class="d-block mt-2">Current File:
                        <a href="<?= base_url($course['file_path']); ?>" target="_blank">
                            <?= basename($course['file_path']); ?>
                        </a>
                    </small>
                <?php endif; ?>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>