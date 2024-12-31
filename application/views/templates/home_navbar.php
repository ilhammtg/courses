<nav class="navbar">
    <div class="container">
        <div class="logo-container">
            <img src="<?= base_url('assets/img/logoteam.png'); ?>" alt="Logo" class="logo-image">
            <span class="logo-title">NextGen-BOT <sub>COURSES</sub></span>
        </div>
        <button class="navbar-toggler" aria-label="Toggle navigation">
            ☰
        </button>
        <ul class="nav-links">
            <li><a href="<?= base_url(''); ?>">Home</a></li>
            <li><a href="<?= base_url('home/courses'); ?>">Courses</a></li>
            <li><a href="<?= base_url('home/aboutus'); ?>">About Us</a></li>
            <li><a href="<?= base_url(''); ?>#contact">Contact</a></li>

            <div class="auth-buttons">
                <a href="<?= base_url('home/optionlogin'); ?>" class="btn-login">Login</a>
            </div>
        </ul>

    </div>
</nav>