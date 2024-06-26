<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* CSS untuk navigasi */
        .main-navigation {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: black;
            padding: 10px 20px;
        }

        .judul {
            display: flex;
            align-items: center;
        }

        .judul h4 {
            color: white;
            margin: 0;
            font-size: 1.5em;
        }

        .menu-list {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .menu-list li {
            margin: 0;
        }

        .menu-list li a {
            text-decoration: none;
            color: white;
            padding: 10px 15px;
        }

        .menu-list li a:hover {
            color: #b1b1b1;
        }

        /* Responsiveness for smaller screens */
        @media screen and (max-width: 768px) {
            .main-navigation {
                flex-direction: column;
                align-items: flex-start;
            }

            .judul {
                flex-direction: row;
                justify-content: space-between;
                width: 100%;
            }

            .judul h4 {
                margin-bottom: 0;
            }

            .menu-list {
                flex-direction: column;
                width: 100%;
            }

            .menu-list li {
                width: 100%;
                text-align: left;
                margin-bottom: 5px;
            }

            .menu-list li a {
                display: block;
                width: 100%;
                padding: 10px;
                background-color: black;
                border-top: 1px solid #b1b1b1;
            }

            .menu-list li a:hover {
                background-color: #333;
            }
        }

        /* Hamburger menu for mobile */
        .hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
        }

        .hamburger div {
            width: 25px;
            height: 3px;
            background-color: white;
            margin: 4px 0;
        }

        @media screen and (max-width: 768px) {
            .hamburger {
                display: flex;
            }

            .menu-list {
                display: none;
            }

            .menu-list.show {
                display: flex;
            }
        }
    </style>
</head>
<body>
    <nav class="main-navigation">
        <div class="judul">
            <h4>GEREJA IMMANUEL LAOLI</h4>
            <div class="hamburger" onclick="toggleMenu()">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <ul class="menu-list" id="menu-list">
            <li><a href="index.php">HOME</a></li>
            <li><a href="next/umum.php">UMUM</a></li>
            <li><a href="next/youth.php">YOUTH</a></li>
            <li><a href="next/komsel.php">KOMSEL</a></li>
            <li><a href="next/renungan.php">RENUGAN</a></li>
            <li><a href="next/event_user.php">EVENT</a></li>
            <li><a href="next/persembahan.php">PERSEMBAHAN</a></li>
            <li><a href="login.php">LOGIN</a></li>

        </ul>
    </nav>
    <script>
        function toggleMenu() {
            var menuList = document.getElementById('menu-list');
            menuList.classList.toggle('show');
        }
    </script>
</body>
</html>
