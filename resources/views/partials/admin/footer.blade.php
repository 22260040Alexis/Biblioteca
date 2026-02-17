<!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-16 py-6">
        <div class="container mx-auto px-4 text-center text-gray-600 text-xs md:text-sm">
            <p>&copy; 2026 Biblioteca Municipal. Todos los derechos reservados.</p>
            <p class="mt-1">Imágenes cortesía de Unsplash (libres de derechos)</p>
        </div>
    </footer>

    <h1>Footer 12</h1>


    <!-- JavaScript para menú hamburguesa -->
    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        
        if (menuToggle && mobileMenu) {
            menuToggle.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
                const icon = menuToggle.querySelector('i');
                if (mobileMenu.classList.contains('hidden')) {
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                } else {
                    icon.classList.remove('fa-bars');
                    icon.classList.add('fa-times');
                }
            });
        }
    </script>
</body>
</html>