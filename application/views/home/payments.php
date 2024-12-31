<div class="container mt-5">
    <div class="card p-4">
        <h3 class="text-center">Payment for <?= $course['title']; ?></h3>
        <p>Total Amount: <strong>Rp. <?= number_format($course['price'], 0, ',', '.'); ?></strong></p>
        <?php if (isset($error)) : ?>
            <div class="alert alert-danger"><?= $error; ?></div>
        <?php endif; ?>
        <form method="POST" action="<?= base_url('payment/submit'); ?>" enctype="multipart/form-data">
            <input type="hidden" name="course_id" value="<?= $course['id']; ?>">
            <div class="form-group">
                <label for="proof">Upload Payment Proof</label>
                <input type="file" name="proof" class="form-control" id="proof" required>
            </div>
            <button type="submit" class="btn btn-primary w-100 mt-3">Submit Payment</button>
        </form>
    </div>
</div>