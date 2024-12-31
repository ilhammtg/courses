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

                <a href="#" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#newCourses">Add New Menu</a>


                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Price</th>
                            <th scope="col">Description</th>
                            <th scope="col">Image Path</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php $i = 1; ?>
                        <?php foreach ($coursesManage as $cm): ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $cm['title']; ?></td>
                                <td><?= $cm['price']; ?></td>
                                <td><?= $cm['description']; ?></td>
                                <td><?= $cm['image']; ?></td>
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
                <h1 class="modal-title fs-5" id="newCoursesLabel">Add New Course</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Tambahkan enctype untuk mendukung upload file -->
            <form action="<?= base_url('admin/managecourses'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="courses" name="courses" placeholder="Course Title">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="price" name="price" placeholder="Course Price">
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" id="description" name="description" placeholder="Course Description" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Upload Image</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
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