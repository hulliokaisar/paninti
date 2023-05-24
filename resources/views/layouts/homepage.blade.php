<!DOCTYPE html>
<html>

<head>
    <title>Homepage</title>
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            background-image: url('{{ asset('assets/img/hero.png') }}');
            background-size: cover;
            background-position: center;
        }

        .content {
            text-align: center;
            color: #fff;
        }

        h1 {
            font-size: 3em;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.5em;
            margin-bottom: 30px;
        }

        .chef {
            position: relative;
            width: 200px;
            height: 200px;
            margin: 0 auto 30px;
            background-image: url('{{ asset('assets/img/chef.jpg') }}');
            background-size: cover;
            opacity: 1;
            transition: opacity 1s ease;
        }

        .chef.rotate {
            animation: spin 1s infinite linear;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        button {
            padding: 10px 20px;
            font-size: 1.2em;
            background-color: #ff8800;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="{{ route('home.index') }}">
            <div class="content">
            <h1>Selamat Datang di Halaman Homepage</h1>
            <p>Temukan keindahan dan inspirasi di sini.</p>
            <div id="chefAnimation" class="chef"></div>
            <button id="mainButton">Mulai</button>
        </div>
    </form>
        
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.min.js"></script>
    
<script>
        new Vue({
            el: '#app',
            mounted() {
                document.getElementById("mainButton").addEventListener("click", () => {
                    var chefAnimation = document.getElementById("chefAnimation");
                    chefAnimation.classList.add("rotate");

                    setTimeout(() => {
                        chefAnimation.style.opacity = 0;
                        setTimeout(() => {
                            chefAnimation.style.display = "none";
                        }, 1000);
                    }, 200);
                });
            }
        });
    </script>

</html>