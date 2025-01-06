<style>
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f5f5f5;
    }

    .card-container {
        margin: 15px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card-container:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 18px rgba(0, 0, 0, 0.15);
    }

    .card {
        border: none;
        border-radius: 12px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
    }

    .card-img-top {
        width: 100%;
        height: 180px;
        object-fit: cover;
        border-bottom: 1px solid #ddd;
    }

    .card-title {
        font-weight: 700;
        font-size: 1.1rem;
        margin-bottom: 8px;
    }

    .card-text {
        color: #6c757d;
        font-size: 0.9rem;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        /* Limit text to 3 lines */
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .card-body {
        padding: 16px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .price {
        font-size: 1.2rem;
        font-weight: bold;
        color: #28a745;
        margin: 10px 0;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
        border-radius: 20px;
        font-size: 0.9rem;
        padding: 8px 16px;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        transform: scale(1.05);
    }

    .btn-read-more {
        font-size: 0.8rem;
        color: transparent;
        cursor: pointer;
        text-decoration: none;
        transition: color 0.2s ease;
    }

    .btn-read-more:hover {
        color: #0056b3;
    }
</style>
</head>

<body>
    <div class="container py-4">
        <div class="row">
            <?php foreach ($courses as $index => $course) : ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card-container">
                        <div class="card">
                            <img src="<?= base_url($course['image']); ?>" class="card-img-top" alt="<?= $course['title']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= $course['title']; ?></h5>
                                <div class="price">Rp. <?= number_format($course['price'], 0, ',', '.'); ?></div>
                                <p class="card-text" id="description-<?= $index; ?>"><?= $course['description']; ?></p>
                                <a class="btn-read-more" onclick="toggleReadMore(<?= $index; ?>)">Read More</a>
                                <a href="<?= base_url('authuser/register?course=' . urlencode($course['title'])); ?>" class="btn btn-primary mt-auto">
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
    <script>
        function toggleReadMore(index) {
            const description = document.getElementById(`description-${index}`);
            const readMoreButton = description.nextElementSibling;

            if (description.style.webkitLineClamp === "3") {
                description.style.webkitLineClamp = "unset";
                description.style.overflow = "visible";
                readMoreButton.textContent = "Show Less";
            } else {
                description.style.webkitLineClamp = "3";
                description.style.overflow = "hidden";
                readMoreButton.textContent = "Read More";
            }
        }
    </script>