<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>

<body>
    <div class="container mt-5">
        <div class="card p-4 shadow">
            <h3 class="text-center mb-4">Login</h3>

            <!-- Flash Message for Error -->
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
            <?php endif; ?>

            <form method="POST" action="<?= base_url('authuser/login?course=' . $this->input->get('course')) ?>">
                <!-- Email Input -->
                <div class="form-group">
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
                <div class="form-group">
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
                <p class="text-center mt-3">
                    Don't have an account?
                    <a href="<?= base_url('authuser/register?course=' . $this->input->get('course')) ?>">Register here</a>
                </p>
            </form>
        </div>
    </div>

    <!-- Bootstrap and Custom Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/js/script.js') ?>"></script>
</body>

</html>