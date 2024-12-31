<div class="container">
    <div class="row">
        <?php foreach ($courses as $index => $course) : ?>
            <div class="col-md-3 mb-1 p-0 ">
                <div class="card-container">
                    <div class="card">
                        <img src="<?= base_url($course['image']); ?>" class="card-img-top" alt="<?= $course['title']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $course['title']; ?></h5><br>
                            <h5 class="card-title">Rp. <?= number_format($course['price'], 0, ',', '.'); ?></h5>
                            <p class="card-text"><?= $course['description']; ?></p>
                            <!-- Tombol Redirect ke Halaman Register -->
                            <a href="<?= base_url('authuser/register?course=' . urlencode($course['title'])); ?>"
                                class="btn btn-primary">
                                Learn Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tutup dan buka baris baru setiap 4 card -->
            <?php if (($index + 1) % 4 == 0) : ?>
    </div>
    <div class="row">
    <?php endif; ?>
<?php endforeach; ?>
    </div>
</div>