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

                <a href="#" class="btn btn-primary mb-3">Add New Student</a>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Student Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">No Hp</th>
                            <th scope="col">Chosen Course</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($studentManage as $sm): ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $sm['nama']; ?></td>
                                <td><?= $sm['email']; ?></td>
                                <td><?= $sm['no_hp']; ?></td>
                                <td><?= $sm['course']; ?></td>
                                <td>
                                    <a type="link" href="<?= base_url('admin/editstudent/' . $sm['id']); ?>" class="badge bg-success text-decoration-none">Edit</a>
                                    <a type="link" href="<?= base_url('admin/deletestudent/' . $sm['id']); ?>" class="badge bg-danger text-decoration-none">Delete</a>
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