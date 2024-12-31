<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= site_url('admin') ?>">NexGen-BOT<sub>Admin</sub></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?= ($this->uri->segment(2) == '' || $this->uri->segment(2) == 'index') ? 'active' : ''; ?>" href="<?= site_url('admin') ?>">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($this->uri->segment(2) == 'users') ? 'active' : ''; ?>" href="<?= base_url('admin/users'); ?>">User Management</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?= ($this->uri->segment(2) == 'managecourses' || $this->uri->segment(2) == 'courseMaterials') ? 'active' : ''; ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Courses
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item <?= ($this->uri->segment(2) == 'managecourses') ? 'active' : ''; ?>" href="<?= base_url('admin/managecourses'); ?>">Courses Management</a></li>
                        <li><a class="dropdown-item <?= ($this->uri->segment(2) == 'courseMaterials') ? 'active' : ''; ?>" href="<?= base_url('admin/courseMaterials'); ?>">Courses Materials</a></li>
                    </ul>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?= ($this->uri->segment(2) == 'payments' || $this->uri->segment(2) == 'report') ? 'active' : ''; ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Payments
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item <?= ($this->uri->segment(2) == 'payments') ? 'active' : ''; ?>" href="<?= site_url('admin/payments') ?>">Payments Approve</a></li>
                        <li><a class="dropdown-item <?= ($this->uri->segment(2) == 'report') ? 'active' : ''; ?>" href="<?= base_url('admin/report'); ?>">Report</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <a href="<?= site_url('auth/logout') ?>" class="btn btn-outline-light">Logout</a>
    </div>
</nav>