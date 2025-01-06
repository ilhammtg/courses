<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .dashboard-header {
            color: #343a40;
            font-weight: bold;
            text-align: center;
            margin-bottom: 30px;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
        }

        .card-title {
            font-size: 18px;
            font-weight: bold;
        }

        .icon {
            font-size: 40px;
            margin-bottom: 15px;
            color: #007bff;
        }

        .btn-primary {
            border-radius: 8px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="dashboard-header">Admin Dashboard</h1>
        <div class="row">
            <div class="col-lg-4">
                <div class="card text-center p-4">
                    <div class="icon">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <h5 class="card-title">Users</h5>
                    <p class="card-text">Manage all registered users in the system.</p>
                    <a href="<?= base_url('admin/users'); ?>" class="btn btn-primary">View Users</a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card text-center p-4">
                    <div class="icon">
                        <i class="bi bi-book-fill"></i>
                    </div>
                    <h5 class="card-title">Courses</h5>
                    <p class="card-text">Create and manage courses offered on the platform.</p>
                    <a href="<?= base_url('admin/managecourses'); ?>" class="btn btn-primary">View Courses</a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card text-center p-4">
                    <div class="icon">
                        <i class="bi bi-bar-chart-fill"></i>
                    </div>
                    <h5 class="card-title">Reports</h5>
                    <p class="card-text">View system reports and analytics.</p>
                    <a href="<?= site_url('admin/report') ?>" class="btn btn-primary">View Reports</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.js"></script>
</body>

</html>