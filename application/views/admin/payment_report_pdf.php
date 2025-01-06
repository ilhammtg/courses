<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        /* Watermark */
        body:before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('<?= base_url("assets/img/logoteam.png"); ?>') no-repeat center center;
            background-size: 300px 300px;
            opacity: 0.1;
            z-index: -1;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: rgba(242, 242, 242, 0);
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        .total-row {
            font-weight: bold;
            background-color: rgba(249, 249, 249, 0);
        }

        .total-label {
            text-align: left;
        }

        .total-value {
            text-align: left;
        }
    </style>
</head>

<body>
    <h1>Payment Report</h1>
    <table>
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
                        <td><?= $report['status']; ?></td>
                        <td>Rp. <?= number_format($report['amount'], 0, ',', '.'); ?></td>
                    </tr>
                    <?php
                    $totalAmount += $report['amount'];
                    ?>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" style="text-align: center;">No records found</td>
                </tr>
            <?php endif; ?>
        </tbody>
        <tfoot>
            <tr class="total-row">
                <td colspan="6" class="total-label">Total Amount :</td>
                <td colspan="7" class="total-value">Rp. <?= number_format($totalAmount, 0, ',', '.'); ?></td>
            </tr>
        </tfoot>
    </table>
</body>

</html>