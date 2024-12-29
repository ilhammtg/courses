<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= site_url('admin') ?>">NexGen-BOT<sub>Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= site_url('admin') ?>">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Manage Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('admin/managecourses'); ?>">Manage Courses</a>
                </li>
            </ul>
        </div>
        <a href="<?= site_url('auth/logout') ?>" class="btn btn-outline-light">Logout</a>
    </div>
</nav>