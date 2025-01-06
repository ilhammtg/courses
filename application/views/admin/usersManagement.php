<div class="container mt-2">
    <?= $this->session->flashdata('message'); ?>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Users Management</h1>
        <form method="get" action="<?= base_url('admin/users'); ?>" class="d-flex">
            <input type="text" name="search" class="form-control me-2" placeholder="Search users..." value="<?= $this->input->get('search'); ?>">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>


    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Selected Course</th>
                <th>Active Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $user['name']; ?></td>
                    <td><?= $user['email']; ?></td>
                    <td><?= $user['phone']; ?></td>
                    <td><?= $user['course_title'] ?: 'No Course Selected'; ?></td>
                    <td>
                        <input type="checkbox" class="btn btn-primary" <?= $user['is_active'] ? 'checked' : ''; ?>>
                    </td>
                    <td>
                        <a href="<?= base_url('admin/editUser/' . $user['id']); ?>" class="btn btn-success btn-sm">Edit</a>
                        <a href="<?= base_url('admin/deleteUser/' . $user['id']); ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>