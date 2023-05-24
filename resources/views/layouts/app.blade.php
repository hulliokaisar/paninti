<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Restoran</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <div id="app">
        <nav>
            <ul>
                <li><a href="{{ route('home.index') }}">Beranda</a></li>
                <li><a href="#menu">Menu</a></li>
                <li><a href="#contact">Kontak</a></li>
            </ul>
            <div class="cart">
                <a href="{{ route('cart.index')}}">
                    <i class="cart-icon fas fa-shopping-cart"><img src="{{ asset('assets/img/icon/cart.png') }}" alt=""></i>
                </a>
            </div>
            <div class="search-box">
                <input type="text" placeholder="Cari..." />
            </div>
        </nav>

        @yield('content')

        <section id="contact">
            <h2>Kontak Kami</h2>
            <p>Hubungi kami untuk reservasi atau pertanyaan lebih lanjut.</p>
            <form>
                <input type="text" placeholder="Nama" />
                <input type="email" placeholder="Email" />
                <textarea placeholder="Pesan"></textarea>
                <button type="submit">Kirim</button>
            </form>
        </section>
    </div>

    <script src="https://unpkg.com/vue@2.6.14"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>

    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script>
        import Vue from 'vue';
        import Slider from './components/Slider.vue';

        new Vue({
            el: '#app',
            components: {
                Slider,
            },
        });
        // Ambil referensi elemen tombol
        var addToCartBtn = document.getElementById('addToCartBtn');

        // Tambahkan event listener untuk menangani klik tombol
        addToCartBtn.addEventListener('click', function() {
            // Tampilkan pesan alert
            alert("Makanan sudah masuk ke dalam keranjang Anda");
        });
    </script>
</body>

</html>