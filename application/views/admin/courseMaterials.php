<div class="container mt-4">
    <h1 class="mb-4">Course Materials Management</h1>
    <?= $this->session->flashdata('message'); ?>

    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addMaterialModal">Add New Material</button>

    <div class="table-responsive">

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Course Title</th>
                    <th>Type</th>
                    <th>File Path</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php $i = 1; ?>
                <?php foreach ($materials as $material): ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $material['course_title']; ?></td>
                        <td><?= $material['type']; ?></td>
                        <td><?= $material['file_path']; ?></td>
                        <td>
                            <button
                                class="btn btn-success btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#editMaterialModal"
                                data-id="<?= $material['id']; ?>"
                                data-course-id="<?= $material['course_id']; ?>"
                                data-type="<?= $material['type']; ?>"
                                data-file-path="<?= $material['file_path']; ?>">
                                Edit
                            </button>
                            <a href="<?= base_url('admin/deleteCourseMaterial/' . $material['id']); ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addMaterialModal" tabindex="-1" aria-labelledby="addMaterialModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addMaterialModalLabel">Add New Course Material</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('admin/addCourseMaterial'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="course_id" class="form-label">Course</label>
                            <select name="course_id" id="course_id" class="form-select">
                                <option value="">Select Course</option>
                                <?php foreach ($courses as $course): ?>
                                    <option value="<?= $course['id']; ?>"><?= $course['title']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Type</label>
                            <input type="text" name="type" id="type" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="file_path" class="form-label">Upload Material</label>
                            <input type="file" name="file_path" id="file_path" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Material</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Material Modal -->
<div class="modal fade" id="editMaterialModal" tabindex="-1" aria-labelledby="editMaterialModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editMaterialModalLabel">Edit Course Material</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/editCourseMaterial/' . $material['id']); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="old_file_path" value="<?= $material['file_path']; ?>">
                    <div class="mb-3">
                        <label for="course_id" class="form-label">Course</label>
                        <select name="course_id" id="course_id" class="form-select">
                            <option value="">Select Course</option>
                            <?php foreach ($courses as $course): ?>
                                <option value="<?= $course['id']; ?>" <?= ($course['id'] == $material['course_id']) ? 'selected' : ''; ?>>
                                    <?= $course['title']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <input type="text" name="type" id="type" class="form-control" value="<?= $material['type']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="file_path" class="form-label">Upload New Material</label>
                        <input type="file" name="file_path" id="file_path" class="form-control">
                        <small>Leave empty to keep the current file.</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const editModal = document.getElementById('editMaterialModal');
        editModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;

            const id = button.getAttribute('data-id');
            const courseId = button.getAttribute('data-course-id');
            const type = button.getAttribute('data-type');
            const filePath = button.getAttribute('data-file-path');

            editModal.querySelector('form').action = '<?= base_url('admin/editCourseMaterial/'); ?>' + id;
            editModal.querySelector('select[name="course_id"]').value = courseId;
            editModal.querySelector('input[name="type"]').value = type;
            editModal.querySelector('input[name="old_file_path"]').value = filePath;
        });
    });
</script>