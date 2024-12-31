<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>

<body>
    <div class="container mt-5">
        <div class="card p-4">
            <h3 class="text-center">Register</h3>
            <?php if (validation_errors()): ?>
                <div class="alert alert-danger"><?= validation_errors(); ?></div>
            <?php endif; ?>
            <form method="POST" action="<?= base_url('authuser/register') ?>">
                <!-- Hidden field untuk selected_course -->
                <input type="hidden" name="selected_course" value="<?= isset($selected_course) ? $selected_course : ''; ?>">

                <!-- Form lainnya -->
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="<?= set_value('name'); ?>" placeholder="Enter your full name" required />
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" class="form-control" id="email" value="<?= set_value('email'); ?>" placeholder="Enter your email" required />
                    <?= form_error('email', '<small>', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone" class="form-control" id="phone" value="<?= set_value('phone'); ?>" placeholder="Enter your phone number" required />
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Create a password" required />
                </div>

                <!-- Dropdown untuk memilih course -->
                <div class="form-group">
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

                <button type="submit" class="btn btn-primary w-100">Register</button>
                <p class="text-center mt-3">Already have an account? <a href="<?= base_url('authuser/login') ?>">Login here</a></p>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/js/script.js') ?>"></script>
</body>

</html>