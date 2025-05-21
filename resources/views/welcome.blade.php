<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bengkel Ongel</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'figtree', sans-serif;
            background-color: #fff;
            color: #000;
            margin: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 10vw;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background-color: #ffffff;
            z-index: 1000;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .flex {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            /* Align items to start flexing from the left */
            gap: 20px;
            /* Adds spacing between cards */
            margin-top: 120px;
            /* Adjust as needed to avoid overlap with header */
        }

        .card {
            width: 200px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            margin-bottom: 20px;
            /* Adjust spacing between cards */
            text-decoration: none;
            /* Removes underline from the anchor tag */
            display: inline-block;
            /* Ensures the anchor tag takes the size of its content */
            transition: transform 0.2s;
            /* Adds a smooth transition effect */
        }

        .card:hover {
            transform: translateY(-5px);
            /* Lifts the card slightly on hover */
        }

        .card h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #000;
        }

        .card p {
            font-size: 16px;
            line-height: 1.6;
            color: #555555;
        }

        .card img {
            width: 100%;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .card .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            text-decoration: none;
            /* Removes underline from the anchor tag */
            border-radius: 5px;
            font-size: 16px;
            margin-top: 10px;
            transition: background-color 0.3s;
            /* Adds a smooth transition effect for background color */
        }

        .card .button:hover {
            background-color: #45a049;
            /* Darkens the button color slightly on hover */
        }

        .search-container {
            text-align: center;
            /* Align search bar to the right */
            flex-grow: 0.8
                /* Allow search bar to grow and fill available space */
        }

        .search-container input[type=text] {
            width: 100%;
            /* Occupy full width available */
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .logo {
            font-size: 1.0rem;
            line-height: 1.0;
            max-width: 300px;
            font-weight: 600;
        }

        .nav-links {
            display: flex;
            gap: 20px;
        }

        .nav-links a {
            padding: 12px 20px;
            background-color: #000;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .nav-links a:hover {
            background-color: #333;
        }
    </style>
</head>

<body>
    <div class="container">
        <header class="header">
        <!-- simulasi fixbug navbar -->
            <p class="logo">Bengkel Ongel</p>
            <nav>
                <div class="search-container">
                    <input type="text" id="searchInput" onkeyup="filterCards()" placeholder="Search for spare parts...">
                </div>
                <div class="nav-links">
                    @guest
                    <a href="{{ route('login') }}" class="btn-login">Login</a>
                    <a href="{{ route('register') }}" class="btn-register">Register</a>
                    @else
                    @if(Auth::user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" class="btn-dashboard">Dashboard</a>
                    @else
                    <a href="{{ route('profile.edit') }}" class="btn-profile">Profile</a>
                    <a href="{{ route('cart.index') }}" class="btn-cart">Cart</a>
                    @endif
                    @endguest
                </div>
            </nav>
        </header>

        <div style="position: relative; display: flex; height: 80vh; margin: 8vh 0;">
            <div style="background-image: url('https://i.pinimg.com/originals/7d/10/ea/7d10ea497feb26b63d93a4f6467da98e.jpg'); background-size: cover; background-position: center; flex: 1;">
            </div>
            <div style="display: flex; flex-direction: column; text-align: left; padding: 30px 35px; width: 400px;">
                <h1 style="font-size: 3.5rem; font-weight: 600; margin-bottom: 20px;">Welcome to Bengkel Ongel</h1>
                <p style="font-size: 1.2rem; line-height: 1.6; max-width: 600px; margin-bottom: 20px;">Your trusted
                    partner for automotive repairs and services.</p>
                <div class="actions" style="display: flex; gap: 20px; margin-top: 20px;">
                    <a href="#spareparts" onclick="smoothScroll(event)" style="padding: 12px 20px; background-color: #000; color: #fff; text-decoration: none; border-radius: 8px; font-weight: 600; transition: background-color 0.3s ease;">Our Product</a>
                    <a href="https://github.com/SyafiqMSI/bengkel-ongel/" target="_blank" style="padding: 12px 20px; background-color: #000; color: #fff; text-decoration: none; border-radius: 8px; font-weight: 600; transition: background-color 0.3s ease;">Contact
                        Us</a>
                </div>
            </div>
        </div>

        <div id="spareparts" class="flex" style="justify-content: center; margin: 0;">
            @if(isset($spareParts) && count($spareParts) > 0)
                @foreach ($spareParts as $sparePart)
                @php
                $routeName = Auth::check() && Auth::user()->isAdmin() ? 'admin.spare_parts.details' : 'sparepart.details';
                @endphp
                <a href="{{ route($routeName, $sparePart->spare_part_id) }}" class="card spare-part">
                    @if ($sparePart->picture && file_exists(public_path('storage/spare_parts/' . $sparePart->picture)))
                    <img src="{{ asset('storage/spare_parts/' . $sparePart->picture) }}" alt="Spare Part Image" width="200" height="200">
                    @elseif ($sparePart->picture && file_exists(public_path('spare_parts/' . $sparePart->picture)))
                    <img src="{{ asset('spare_parts/' . $sparePart->picture) }}" alt="Spare Part Image" width="200" height="200">
                    @else
                    <img src="https://via.placeholder.com/300" alt="Placeholder Image" width="200" height="200">
                    @endif
                    <h2>{{ $sparePart->name }}</h2>
                    <p>Rp {{ $sparePart->price }}</p>
                </a>
                @endforeach
            @else
                <p>No spare parts available.</p>
            @endif
        </div>
    </div>

    <footer style="width: 100%; text-align: center; color: #000; padding: 10px 0;">
        <div class="container">
            <div class="row mb-0 h6">
                <div class="col">
                    <p>Kelompok 11</p>
                </div>
            </div>
        </div>
    </footer>

    <script>
        function filterCards() {
            var input, filter, spareParts, cards, card, title, i, txtValue;
            input = document.getElementById('searchInput');
            filter = input.value.toUpperCase();
            cards = document.getElementsByClassName('spare-part');

            for (i = 0; i < cards.length; i++) {
                card = cards[i];
                title = card.getElementsByTagName("h2")[0];
                txtValue = title.textContent || title.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    card.style.display = "";
                } else {
                    card.style.display = "none";
                }
            }
        }

        function smoothScroll(event) {
            event.preventDefault();
            const targetId = event.target.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);
            const navbarHeight = document.querySelector('.header').offsetHeight;

            if (targetElement) {
                const targetPosition = targetElement.offsetTop - navbarHeight;
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        }
    </script>
</body>

</html>