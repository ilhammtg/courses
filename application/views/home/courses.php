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
<<<<<<< HEAD
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#RegisModal"
                            data-course="<?= $course['title']; ?>"
                            data-price="<?= $course['price']; ?>">Learn Now</a>
=======
                            <!-- Tombol Redirect ke Halaman Register -->
                            <a href="<?= base_url('authuser/register?course=' . urlencode($course['title'])); ?>"
                                class="btn btn-primary">
                                Learn Now
                            </a>
>>>>>>> edb51df161b0226810e9473ef1cd3d7c9f89d4c9
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
<<<<<<< HEAD
</div>

Modal 
<div class="modal fade" id="RegisModal" tabindex="-1" aria-labelledby="RegisModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="RegisModalLabel">Input Data Anda</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('home/courses'); ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Nomor HP" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="resi_pembayaran" name="resi_pembayaran" placeholder="Resi Pembayaran" required>
                    </div>
                    <div class="mb-3">
                        <select name="status" id="status" class="form-select" required>
                            <option value="" disabled selected>Pilih Status</option>
                            <option value="Pelajar SMK/SMA">Pelajar SMK/SMA</option>
                            <option value="Mahasiswa">Mahasiswa</option>
                            <option value="Bukan Pelajar">Bukan Pelajar</option>
                        </select>
                    </div>
                    <input type="hidden" id="course" name="course">
                    <input type="hidden" id="price" name="price">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>
        </div>
    </div>
</div> 


<script type="text/javascript">
      // For example trigger on button clicked, or any time you need
      var btn btn-primary = document.getElementById('btn btn-primary');
      btn btn-primary.addEventListener('click', async function () {
try {
    const response = await fetch('C:\laragon\www\courses\application\views\home\peyment.php',{
        method: 'POST',
        body: data,
    })
    const token = await response.text();
} catch (error) {
    console.log(err.message);
}
console.log(token);
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('TRANSACTION_TOKEN_HERE');
        // customer will be redirected after completing payment pop-up
      });
</script>

=======
</div>
>>>>>>> edb51df161b0226810e9473ef1cd3d7c9f89d4c9
