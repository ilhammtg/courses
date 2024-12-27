<div class="card-container">
    <div class="card">
        <img src="<?= base_url('assets/img/html.jpg'); ?>" class="card-img-top" alt="Deskripsi Gambar">
        <div class="card-body">
            <h5 class="card-title">HTML Basic</h5> <br>
            <h5 class="card-title">Rp. 50.000</h5>
            <p class="card-text">Pelajari dasar-dasar HTML untuk membangun struktur halaman web. Mulai dari memahami elemen HTML, atribut, hingga membuat halaman yang terstruktur dan menarik."</p>
            <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#RegisModal"
                data-course="HTML Basic"
                data-price="50000">Learn Now</a>
        </div>
    </div>


    <div class="card">
        <img src="<?= base_url('assets/img/php.jpg'); ?>" class="card-img-top" alt="Deskripsi Gambar">
        <div class="card-body">
            <h5 class="card-title">PHP Basic</h5><br>
            <h5 class="card-title">Rp. 70.000</h5>
            <p class="card-text">Pelajari konsep dasar PHP untuk pengembangan web dinamis. Mulai dari sintaks dasar, manipulasi data, hingga koneksi database.</p>
            <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#RegisModal"
                data-course="PHP Basic"
                data-price="70000">Learn Now</a>
        </div>
    </div>


    <div class="card">
        <img src="<?= base_url('assets/img/laravel.jpeg'); ?>" class="card-img-top" alt="Deskripsi Gambar">
        <div class="card-body">
            <h5 class="card-title">Laravel</h5><br>
            <h5 class="card-title">Rp. 100.000</h5>
            <p class="card-text">Jelajahi framework Laravel untuk membangun aplikasi web modern. Pelajari konsep MVC, routing, middleware, dan pengelolaan database menggunakan Eloquent ORM.</p>
            <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#RegisModal"
                data-course="Laravel"
                data-price="100000">Learn Now</a>
        </div>
    </div>


    <div class="card">
        <img src="<?= base_url('assets/img/iot.jpg'); ?>" class="card-img-top" alt="Deskripsi Gambar">
        <div class="card-body">
            <h5 class="card-title">IoT</h5><br>
            <h5 class="card-title">Rp. 90.000</h5>
            <p class="card-text">Masuki dunia IoT dan pelajari cara menghubungkan perangkat fisik ke internet. Materi mencakup dasar sensor, aktuator, hingga pengelolaan data menggunakan teknologi IoT.</p>
            <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#RegisModal"
                data-course="IoT"
                data-price="90000">Learn Now</a>
        </div>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="RegisModal" tabindex="-1" aria-labelledby="RegisModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="RegisModalLabel">Input Data Anda</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/datasiswa'); ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Nomer Hp">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="resi_pembayaran" name="resi_pembayaran" placeholder="Resi Pembayaran">
                    </div>
                    <div class="mb-3">
                        <select name="status" id="status" class="form-select">
                            <option>Pelajar SMK/SMA</option>
                            <option>Mahasiswa</option>
                            <option>Bukan Pelajar</option>
                        </select>
                    </div>
                    <input type="hidden" id="course" name="course">
                    <input type="hidden" id="price" name="price">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-text-color" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Regis</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Saat tombol Learn Now diklik
    document.addEventListener('DOMContentLoaded', () => {
        const RegisModal = document.getElementById('RegisModal');
        RegisModal.addEventListener('show.bs.modal', function(event) {
            // Ambil tombol yang memicu modal
            const button = event.relatedTarget;

            // Ambil data dari tombol
            const course = button.getAttribute('data-course');
            const price = button.getAttribute('data-price');

            // Set nilai input hidden di dalam modal
            const courseInput = this.querySelector('#course');
            const priceInput = this.querySelector('#price');

            courseInput.value = course;
            priceInput.value = price;
        });
    });
</script>