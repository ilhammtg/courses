<!-- footer.php -->
<footer>
    <div class="footer-links">
        <a href="https://wa.me/6282273811061">Help Center</a>
    </div>
    <section id="contact" class="contact">
        <a href="https://www.facebook.com/profile.php?id=100046037506280" target="_blank">
            <i class="fab fa-facebook"></i>
        </a>
        <a href="https://x.com/ilham_mtg" target="_blank">
            <i class="fab fa-twitter"></i>
        </a>
        <a href="https://www.instagram.com/yra.ilhm" target="_blank">
            <i class="fab fa-instagram"></i>
        </a>
        <a href="https://github.com/ilhammtg" target="_blank">
            <i class="fab fa-github"></i>
        </a>
    </section>

    <p>&copy; <?= date('Y'); ?> NexGenBot Team. All rights reserved.</p>
</footer>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const toggler = document.querySelector(".navbar-toggler");
        const navLinks = document.querySelector(".nav-links");

        toggler.addEventListener("click", () => {
            navLinks.classList.toggle("active");
        });
    });
</script>

</body>

</html>