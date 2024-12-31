<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></h1>

    <form action="<?= base_url('admin/editcourses/' . (isset($course['id']) ? $course['id'] : '')); ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <div class="col-sm-5">
                <label for="courses" class="form-label">Course Title</label>
                <input type="text" 
                       class="form-control" 
                       id="courses" 
                       name="courses" 
                       placeholder="Course Title" 
                       value="<?= isset($course['title']) ? htmlspecialchars($course['title'], ENT_QUOTES, 'UTF-8') : ''; ?>">
            </div>
        </div>
        <div class="mb-3">
            <div class="col-sm-5">
                <label for="price" class="form-label">Course Price</label>
                <input type="text" 
                       class="form-control" 
                       id="price" 
                       name="price" 
                       placeholder="Course Price" 
                       value="<?= isset($course['price']) ? htmlspecialchars($course['price'], ENT_QUOTES, 'UTF-8') : ''; ?>">
            </div>
        </div>
        <div class="mb-3">
            <div class="col-sm-5">
                <label for="description" class="form-label">Course Description</label>
                <textarea class="form-control" 
                          id="description" 
                          name="description" 
                          placeholder="Course Description" 
                          rows="3"><?= isset($course['description']) ? htmlspecialchars($course['description'], ENT_QUOTES, 'UTF-8') : ''; ?></textarea>
            </div>
        </div>
        <div class="mb-3">
            <div class="col-sm-5">
                <label for="image" class="form-label">Upload Image</label>
                <input type="file" 
                       class="form-control" 
                       id="image" 
                       name="image" 
                       accept="image/*">
                <?php if (isset($course['image']) && !empty($course['image'])): ?>
                    <small>Current Image: <a href="<?= base_url('uploads/' . $course['image']); ?>" target="_blank"><?= htmlspecialchars($course['image'], ENT_QUOTES, 'UTF-8'); ?></a></small>
                <?php else: ?>
                    <small>No image uploaded</small>
                <?php endif; ?>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>
