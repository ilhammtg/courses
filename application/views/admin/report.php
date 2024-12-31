<div class="container mt-4">
    <h1 class="mb-4">Payment Report</h1>

    <!-- Filter Form -->
    <form method="get" action="<?= site_url('admin/report'); ?>" class="row g-3 mb-4">
        <div class="col-md-4">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date" value="<?= isset($_GET['start_date']) ? $_GET['start_date'] : ''; ?>">
        </div>
        <div class="col-md-4">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" class="form-control" id="end_date" name="end_date" value="<?= isset($_GET['end_date']) ? $_GET['end_date'] : ''; ?>">
        </div>
        <div class="col-md-4 align-self-end">
            <button type="submit" class="btn btn-primary">Filter</button>
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
                <th>Amount</th>
                <th>Payment Date</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($reports)): ?>
                <?php foreach ($reports as $report): ?>
                    <tr>
                        <td><?= $report['id']; ?></td>
                        <td><?= $report['user_name']; ?></td>
                        <td><?= $report['email']; ?></td>
                        <td><?= $report['course_name']; ?></td>
                        <td><?= number_format($report['amount'], 0, ',', '.'); ?></td>
                        <td><?= date('Y-m-d', strtotime($report['created_at'])); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">No records found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>