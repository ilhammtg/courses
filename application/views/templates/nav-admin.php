<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }

        .nav-link {
            font-size: 1.1rem;
        }

        .btn-custom {
            background-color: #0d6efd;
            color: white;
            border-radius: 20px;
        }

        .btn-custom:hover {
            background-color: #084298;
            color: #fff;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">E-Learning Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= base_url('user'); ?>">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('user/courses'); ?>">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('user/user'); ?>">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('payment/form'); ?>">Payment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('user/report'); ?>">Reports</a>
                    </li>
                </ul>
                <li class="nav-item">
                    <a class="btn btn-danger" href="<?= base_url('authuser/logout'); ?>">Logout</a>
                </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <!-- Content will go here -->