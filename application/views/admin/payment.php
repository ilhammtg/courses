<div class="container mt-4">
    <h1 class="mb-4"><?= $title; ?></h1>
    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Course</th>
                <th>Amount</th>
                <th>Proof</th>
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
                    <td>Rp. <?= number_format($payment['amount'], 0, ',', '.'); ?></td>
                    <td>
                        <button
                            class="btn btn-outline-primary btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#proofModal<?= $payment['id']; ?>"
                            title="View Proof">
                            <i class="fas fa-eye"></i> View
                        </button>

                        <!-- Modal -->
                        <div
                            class="modal fade"
                            id="proofModal<?= $payment['id']; ?>"
                            tabindex="-1"
                            aria-labelledby="proofModalLabel<?= $payment['id']; ?>"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="proofModalLabel<?= $payment['id']; ?>">Proof Image</h5>
                                        <button
                                            type="button"
                                            class="btn-close"
                                            data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <img
                                            src="<?= base_url($payment['proof']); ?>"
                                            class="img-fluid"
                                            alt="Proof Image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
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
                            <a href="<?= site_url('admin/verify_payment/' . $payment['id'] . '/Verified') ?>"
                                class="btn btn-outline-success btn-sm"
                                title="Approve Payment">
                                <i class="fa-solid fa-check"></i> Approve
                            </a>
                            <a href="<?= site_url('admin/verify_payment/' . $payment['id'] . '/Rejected') ?>"
                                class="btn btn-outline-danger btn-sm"
                                title="Reject Payment">
                                <i class="fa-solid fa-times"></i> Reject
                            </a>
                        <?php elseif ($payment['status'] === 'Verified'): ?>
                            <span class="text-success"><i class="fa-solid fa-check-circle"></i> Verified</span>
                        <?php elseif ($payment['status'] === 'Rejected'): ?>
                            <span class="text-danger"><i class="fa-solid fa-times-circle"></i> Rejected</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>