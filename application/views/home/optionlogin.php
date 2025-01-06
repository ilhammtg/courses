<style>
    /* General Styling */
    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    footer {
        margin-top: auto;
    }

    /* Card Design */
    .option-card {
        margin: auto;
        border: none;
        border-radius: 20px;
        background: linear-gradient(145deg, #f3f4f6, #ffffff);
        box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.1), -5px -5px 15px rgba(255, 255, 255, 0.5);
        color: #333;
        transition: all 0.3s ease-in-out;
    }

    .option-card:hover {
        transform: scale(1.05);
        box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.2), -10px -10px 20px rgba(255, 255, 255, 0.6);
    }

    .icon {
        font-size: 3rem;
        color: #6c63ff;
    }

    .card-title {
        font-size: 1.5rem;
        font-weight: bold;
        margin-bottom: 0.5rem;
    }

    .card-text {
        font-size: 0.9rem;
        color: #666;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .option-card {
            margin-bottom: 20px;
        }
    }
</style>

<div class="container text-center min-vh-100 d-flex flex-column justify-content-center">
    <h2 class="mb-4">Welcome to Our System</h2>
    <p class="text-muted mb-5">Please select your login option below</p>
    <div class="row justify-content-center">

        <div class="col-md-4">
            <a href="<?= base_url('authuser/login'); ?>" class="card option-card text-decoration-none shadow-lg">
                <div class="card-body">
                    <div class="icon mb-3">
                        <i class="bi bi-person"></i>
                    </div>
                    <h4 class="card-title">User Login</h4>
                    <p class="card-text">Access your account and explore the courses that await you.</p>
                </div>
            </a>
        </div>


        <div class="col-md-4">
            <a href="<?= base_url('auth'); ?>" class="card option-card text-decoration-none shadow-lg">
                <div class="card-body">
                    <div class="icon mb-3">
                        <i class="bi bi-person-lock"></i>
                    </div>
                    <h4 class="card-title">Admin Login</h4>
                    <p class="card-text">Access administrative features and manage the system.</p>
                </div>
            </a>
        </div>
    </div>
</div>