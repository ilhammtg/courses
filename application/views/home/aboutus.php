<section class="hero"></section>

<section class="content">
    <div>
        <h2>Belajar Tanpa Batas, Untuk Masa Depan yang Lebih Cerah</h2>
        <p>
            Selamat datang di NextGen-BOT COURSE, platform e-learning modern yang dirancang untuk mendukung pembelajaran generasi digital. Kami percaya bahwa pendidikan adalah kunci untuk membuka peluang, dan melalui teknologi, kami dapat membawa pembelajaran berkualitas ke ujung jari Anda.
        </p>
        <a href="#">Apa yang Kami Tawarkan?</a>
    </div>
    <div>
        <p>Kursus Interaktif: Materi yang mudah dipahami, dirancang oleh para ahli di bidangnya.</p>
        <p>Belajar Fleksibel: Akses pembelajaran kapan saja, baik di komputer maupun perangkat seluler.</p>
        <p>Topik Terkini: Mulai dari dasar pemrograman hingga teknologi terbaru seperti AI, Blockchain, dan IoT.</p>
        <p>Proyek Nyata: Belajar dengan praktek melalui proyek-proyek dunia nyata yang aplikatif.</p>
    </div>
</section>

<div class="contact" title="Contact Us">
    📞
</div>

<style>
    .hero {
        display: flex;
        width: 100%;
        height: 400px;
        background-image: url(<?= base_url('assets/img/aboutus.png'); ?>);
        background-size: cover;
        background-position: center;
    }

    .content {
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .content h2 {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .content p {
        margin-bottom: 20px;
        line-height: 1.6;
    }

    .content a {
        color: blue;
        text-decoration: none;
    }

    .content a:hover {
        text-decoration: underline;
    }

    .content img {
        max-width: 100%;
        height: auto;
    }

    .contact {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background-color: yellow;
        color: black;
        padding: 15px;
        border-radius: 50%;
        text-align: center;
        box-shadow: 0 4px 8px rgba(43, 106, 202, 0.2);
        cursor: pointer;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .hero {
            height: 300px;
        }

        .content h2 {
            font-size: 20px;
        }

        .content p {
            font-size: 16px;
        }

        .contact {
            width: 50px;
            height: 50px;
            font-size: 14px;
            padding: 10px;
        }
    }

    @media (max-width: 480px) {
        .hero {
            height: 200px;
        }

        .content h2 {
            font-size: 18px;
        }

        .content p {
            font-size: 14px;
        }

        .contact {
            width: 40px;
            height: 40px;
            font-size: 12px;
            padding: 8px;
        }
    }
</style>