<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <!-- Google Font -->
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
            padding: 20px;
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

        .form-control,
        select {
            border-radius: 8px;
        }

        .form-control:focus,
        select:focus {
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            border-color: #007bff;
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
            <div class="col-md-6 col-lg-5">
                <div class="card">
                    <h3 class="text-center">Register</h3>
                    <?php if (validation_errors()): ?>
                        <div class="alert alert-danger"><?= validation_errors(); ?></div>
                    <?php endif; ?>
                    <form method="POST" action="<?= base_url('authuser/register') ?>">
                        <!-- Hidden Field untuk Selected Course -->
                        <input type="hidden" name="selected_course" value="<?= isset($selected_course) ? $selected_course : ''; ?>">

                        <!-- Full Name -->
                        <div class="form-group mb-3">
                            <label for="name">Full Name</label>
                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                id="name"
                                value="<?= set_value('name'); ?>"
                                placeholder="Enter your full name"
                                required />
                        </div>

                        <!-- Email -->
                        <div class="form-group mb-3">
                            <label for="email">Email Address</label>
                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                id="email"
                                value="<?= set_value('email'); ?>"
                                placeholder="Enter your email"
                                required />
                            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <!-- Phone -->
                        <div class="form-group mb-3">
                            <label for="phone">Phone Number</label>
                            <input
                                type="text"
                                name="phone"
                                class="form-control"
                                id="phone"
                                value="<?= set_value('phone'); ?>"
                                placeholder="Enter your phone number"
                                required />
                        </div>

                        <!-- Dropdown Course -->
                        <div class="form-group mb-4">
                            <label for="selected_course">Select Course</label>
                            <select name="selected_course" class="form-control" required>
                                <option value="" disabled selected>Select a course</option>
                                <?php foreach ($courses as $course): ?>
                                    <option value="<?= $course['id']; ?>" <?= ($selected_course == $course['id']) ? 'selected' : ''; ?>>
                                        <?= $course['title']; ?> - Rp. <?= number_format($course['price'], 0, ',', '.'); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Password -->
                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                id="password"
                                placeholder="Create a password"
                                required />
                        </div>


                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary w-100">Register</button>

                        <!-- Login Link -->
                        <p class="text-center mt-3 text-muted">
                            Already have an account?
                            <a href="<?= base_url('authuser/login') ?>">Login here</a>
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