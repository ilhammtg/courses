<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></h1>

    <form action="<?= base_url('admin/editsiswa/' . (isset($student['id']) ? $student['id'] : '')); ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <div class="col-sm-5">
                <label for="name" class="form-label">Student Name</label>
                <input type="text" 
                       class="form-control" 
                       id="name" 
                       name="name" 
                       placeholder="Enter Student Name" 
                       value="<?= isset($student['name']) ? htmlspecialchars($student['name'], ENT_QUOTES, 'UTF-8') : ''; ?>">
            </div>
        </div>
        <div class="mb-3">
            <div class="col-sm-5">
                <label for="course" class="form-label">Course</label>
                <select class="form-control" id="course" name="course">
                <option value="">Select Course</option>
                <?php foreach ($courses as $course): ?>
                <option value="<?= htmlspecialchars($course['id'], ENT_QUOTES, 'UTF-8'); ?>" 
                    <?= isset($student['course']) && $student['course'] == $course['id'] ? 'selected' : ''; ?>>
                    <?= htmlspecialchars($course['title'], ENT_QUOTES, 'UTF-8'); ?>
                </option>
                <?php endforeach; ?>
                </select>
                </div>
            </div>  
        </div>
        <div class="mb-3">
            <div class="col-sm-5">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" 
                          id="address" 
                          name="address" 
                          placeholder="Enter Address" 
                          rows="3"><?= isset($student['address']) ? htmlspecialchars($student['address'], ENT_QUOTES, 'UTF-8') : ''; ?></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>
