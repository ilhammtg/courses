<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

<style>
    /* Gaya dasar tombol */
    .custom-btn {
        background-color: #e63946;
        /* Warna merah elegan */
        color: #ffffff;
        border: none;
        border-radius: 8px;
        padding: 10px 20px;
        font-size: 16px;
        font-weight: 600;
        text-transform: uppercase;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        /* Bayangan lembut */
    }

    /* Ikon dan teks tombol */
    .custom-btn i {
        font-size: 20px;
        transition: transform 0.3s ease;
        /* Efek ikon saat hover */
    }

    /* Hover efek */
    .custom-btn:hover {
        background-color: #d62828;
        /* Warna merah gelap */
        color: #fff;
        transform: translateY(-2px);
        /* Efek melayang */
        box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
    }

    .custom-btn:hover i {
        transform: scale(1.1);
        /* Membuat ikon lebih besar sedikit */
    }

    /* Fokus untuk keyboard navigasi */
    .custom-btn:focus {
        outline: 2px solid #f4a261;
        outline-offset: 3px;
    }
</style>

</html>