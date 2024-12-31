<table class="table">
    <thead>
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
                <td><?= ucfirst($payment['status']); ?></td>
                <td>
                    <?php if ($payment['status'] === 'Pending'): ?>
                        <a href="<?= site_url('admin/verify_payment/' . $payment['id'] . '/Verified') ?>" class="btn btn-success">Approve</a>
                        <a href="<?= site_url('admin/verify_payment/' . $payment['id'] . '/Rejected') ?>" class="btn btn-danger">Reject</a>
                    <?php elseif ($payment['status'] === 'Verified'): ?>
                        <span class="badge text-bg-success"><?= ucfirst($payment['status']); ?></span>
                    <?php elseif ($payment['status'] === 'Rejected'): ?>
                        <span class="badge text-bg-danger"><?= ucfirst($payment['status']); ?></span>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>

</table>