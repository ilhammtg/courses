<div class="container mt-4">
    <h1 class="mb-4">Payment Report</h1>

    <!-- Filter Form -->
    <form method="get" action="<?= site_url('admin/report'); ?>" class="row g-3 mb-4">
        <div class="col-md-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date" value="<?= isset($_GET['start_date']) ? $_GET['start_date'] : ''; ?>">
        </div>
        <div class="col-md-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" class="form-control" id="end_date" name="end_date" value="<?= isset($_GET['end_date']) ? $_GET['end_date'] : ''; ?>">
        </div>
        <div class="col-md-3 align-self-end">
            <button type="submit" class="btn btn-primary">Filter</button>
        </div>
        <div class="col-md-3 d-flex justify-content-end align-items-end">
            <a href="<?= base_url('admin/reportpdf?start_date=' . $this->input->get('start_date') . '&end_date=' . $this->input->get('end_date')); ?>"
                class="btn btn-danger btn-lg d-flex align-items-center gap-2 shadow-sm custom-btn">
                <i class="bi bi-file-earmark-pdf"></i>
                <span>Export</span>
            </a>
        </div>
    </form>

    <!-- Report Table -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Email</th>
                <th>Course</th>
                <th>Payment Date</th>
                <th>Status</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $totalAmount = 0;
            if (!empty($reports)):
            ?>
                <?php foreach ($reports as $report): ?>
                    <tr>
                        <td><?= $report['id']; ?></td>
                        <td><?= $report['user_name']; ?></td>
                        <td><?= $report['email']; ?></td>
                        <td><?= $report['course_name']; ?></td>
                        <td><?= date('Y-m-d', strtotime($report['created_at'])); ?></td>
                        <td>
                            <?php if ($report['status'] === 'Verified'): ?>
                                <span class="badge bg-success"><?= ucfirst($report['status']); ?></span>
                                <?php $totalAmount += $report['amount'];
                                ?>
                            <?php elseif ($report['status'] === 'Rejected'): ?>
                                <span class="badge bg-danger"><?= ucfirst($report['status']); ?></span>
                            <?php else: ?>
                                <?= ucfirst($report['status']); ?>
                                <?php $totalAmount += $report['amount'];
                                ?>
                            <?php endif; ?>
                        </td>
                        <td>Rp. <?= number_format($report['amount'], 0, ',', '.'); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" class="text-left">No records found</td>
                </tr>
            <?php endif; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6" class="text-start fw-bold">Total Amount :</td>
                <td colspan="7" class="text-start fw-bold text-primary">Rp. <?= number_format($totalAmount, 0, ',', '.'); ?></td>
            </tr>
        </tfoot>
    </table>
</div>