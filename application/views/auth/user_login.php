<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <!-- Custom Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Custom Inline CSS -->
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }

        .card h3 {
            font-weight: 700;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 8px;
            font-weight: 500;
            padding: 10px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .form-control {
            border-radius: 8px;
        }

        .text-muted a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .text-muted a:hover {
            color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card p-4">
                    <h3 class="text-center mb-4">Login</h3>

                    <!-- Flash Message for Error -->
                    <?php if ($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
                    <?php endif; ?>

                    <form method="POST" action="<?= base_url('authuser/login?course=' . $this->input->get('course')) ?>">
                        <!-- Email Input -->
                        <div class="form-group mb-3">
                            <label for="email">Email Address</label>
                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                id="email"
                                placeholder="Enter your email"
                                required
                                value="<?= set_value('email') ?>" />
                            <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                        </div>

                        <!-- Password Input -->
                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                id="password"
                                placeholder="Enter your password"
                                required />
                            <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                        </div>

                        <!-- Login Button -->
                        <button type="submit" class="btn btn-primary w-100">Login</button>

                        <!-- Registration Link -->
                        <p class="text-center mt-3 text-muted">
                            Don't have an account?
                            <a href="<?= base_url('authuser/register?course=' . $this->input->get('course')) ?>">Register here</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>