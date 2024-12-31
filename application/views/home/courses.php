    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
        }

        .card-container {
            margin: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-container:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 10px rgba(0, 0, 0, 0.2);
        }

        .card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
        }

        .card-img-top {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-bottom: 1px solid #ddd;
        }


        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 20px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .card-title {
            font-weight: 700;
            font-size: 1.2rem;
        }

        .card-text {
            font-size: 0.9rem;
            color: #6c757d;
        }
    </style>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <?php foreach ($courses as $index => $course) : ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="card-container">
                            <div class="card">
                                <img src="<?= base_url($course['image']); ?>" class="card-img-top" alt="<?= $course['title']; ?>">
                                <div class="card-body text-center">
                                    <h5 class="card-title"><?= $course['title']; ?></h5>
                                    <h6 class="text-success">Rp. <?= number_format($course['price'], 0, ',', '.'); ?></h6>
                                    <p class="card-text"><?= $course['description']; ?></p>
                                    <a href="<?= base_url('authuser/register?course=' . urlencode($course['title'])); ?>" class="btn btn-primary">
                                        Learn Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>