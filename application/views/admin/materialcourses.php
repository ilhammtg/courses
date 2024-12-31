<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-5">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="row">
            <div class="col-lg">

                <?= $this->session->flashdata('message'); ?>

                <a href="#" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#newCourses">Add New Materi</a>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Title</th>
                            <th scope="col">pdf Path</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($coursesManage as $cm): ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $cm['title']; ?></td>
                                <td><?= $cm['file_path']; ?></td>
                                <td>
                                    <a type="link" href="<?= base_url('admin/editcourses/' . $cm['id']); ?>" class="badge bg-success text-decoration-none">Edit</a>
                                    <a type="link" href="<?= base_url('admin/deletecourses/' . $cm['id']); ?>" class="badge bg-danger text-decoration-none">Delete</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>

    </div>
</div>
<!-- End of Main Content -->

<!--Input Modal -->
<div class="modal fade" id="newCourses" tabindex="-1" aria-labelledby="newCoursesLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="newCoursesLabel">Add New material Course</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Tambahkan enctype untuk mendukung upload file -->
            <form action="<?= base_url('admin/managecourses'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="courses" name="courses" placeholder="Course Title">
                    </div>
                    <div class="mb-3">
                        <label for="materi" class="form-label">Upload materi</label>
                        <input type="file" class="form-control" id="materi" name="materi" accept="materi/*">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>