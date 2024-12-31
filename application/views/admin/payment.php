<div class="container mt-4">
    <h1 class="mb-4"><?= $title; ?></h1>
    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Course</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($payments as $payment): ?>
                <tr>
                    <td><?= $payment['id']; ?></td>
                    <td><?= $payment['user_name']; ?></td>
                    <td><?= $payment['course_name']; ?></td>
                    <td><?= number_format($payment['amount'], 0, ',', '.'); ?></td>
                    <td>
                        <?php if ($payment['status'] === 'Pending'): ?>
                            <span class="badge bg-warning text-dark"><?= ucfirst($payment['status']); ?></span>
                        <?php elseif ($payment['status'] === 'Verified'): ?>
                            <span class="badge bg-success text-light"><?= ucfirst($payment['status']); ?></span>
                        <?php elseif ($payment['status'] === 'Rejected'): ?>
                            <span class="badge bg-danger text-light"><?= ucfirst($payment['status']); ?></span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if ($payment['status'] === 'Pending'): ?>
                            <a href="<?= site_url('admin/verify_payment/' . $payment['id'] . '/Verified') ?>" class="btn btn-success btn-sm">Approve</a>
                            <a href="<?= site_url('admin/verify_payment/' . $payment['id'] . '/Rejected') ?>" class="btn btn-danger btn-sm">Reject</a>
                        <?php elseif ($payment['status'] === 'Verified'): ?>
                            <span class="text-success">Verified</span>
                        <?php elseif ($payment['status'] === 'Rejected'): ?>
                            <span class="text-danger">Rejected</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>