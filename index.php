
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Church - Online Church Top 1 </title>
    <link rel="stylesheet" href=".style.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <style>
body {
    margin: 0;
    padding: 0;
    font-family:  Calibri;
    background: white;
}

.welcome {
    margin-top: 0;
    text-align: center;
}

.welcome img {
    max-width: 100%;
    height: auto;
    margin: auto; 
}
.running {
    margin-top: -10px;
    background-color: #063970; 
    overflow: hidden;
  }

  .running-text {
    width: 100%;
    white-space: nowrap;
    animation: marquee 30s linear infinite;
    color: white;
    padding: 1px; 
  }
  .running-text p{
    font-size: 2.9rem;
    margin: 0;
  }


  @keyframes marquee {
    0% { transform: translateX(98%); }
    100% { transform: translateX(-82%); }
  }

  @media screen and (max-width: 1024px) {
            .running-text p {
                font-size: 2.5rem;
            }
        }

        @media screen and (max-width: 768px) {
            .running-text p {
                font-size: 2rem;
            }
        }

        @media screen and (max-width: 480px) {
            .running-text p {
                font-size: 1.5rem;
            }
        }
        
.about {
    background-color: #f9f9f9;
    padding: 2rem;
    text-align: center;
}

.about .church-name {
    font-size: 4rem;
    margin-bottom: 1rem;
    margin-top: -20px;
}

.about .section-title {
    font-size: 3vw;
    margin: 3% 0;
}

.about .section-content {
    font-size: 2vw;
    margin-bottom: 3%;
    line-height: 1.6;
}

/* Style untuk container utama */
.pendeta {
  text-align: center;
  margin-top: 2rem;
}

/* Style untuk judul h1 */
.pendeta h1 {
  margin-top: 2rem;
  margin-bottom: 2rem;
}

/* Style untuk item pendeta */
.pendeta-item {
  display: flex;
  align-items: flex-start;
  justify-content: center;
  margin-top: 2rem;
}

/* Style untuk teks */
.pendeta-item-text {
  text-align: justify;
  max-width: 50rem; 
  font-size: 1.52rem;
  margin-top: -20px;
  margin-bottom: 1rem;
}

.pendeta-item-text span {
  display: block; 
  margin-bottom: 1rem;
}

.pendeta-item-img {
  margin-right: 2rem; 
}

.pendeta-item-img img {
  width: 20rem;
  height: auto;
}


.map-container {
    margin: 20px auto;
    text-align: center;
    margin-top: -1rem;
    margin-bottom: 3.7rem;
}

/* Style heading */
.map-container h2 {
    font-size: 24px;
    margin-bottom: 15px;
}

/* Style map */
#map {
    margin:0 auto;
    height: 31rem;
    width: 60rem;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
}
#map p {
    animation: moveUpDown 3s ease-in-out infinite alternate; */
}

@keyframes moveUpDown {
    0% {
        transform: translateY(4px); 
    }
    100% {
        transform: translateY(-13px); 
    }
}


/* Optional: Style marker popup */
.leaflet-popup-content-wrapper {
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
    color: #333;
}

.leaflet-popup-content {
    margin: 8px 12px;
}

/* Responsiveness for smaller screens */
@media screen and (max-width: 768px) {
    .about .church-name {
        font-size: 6vw;
    }

    .about .section-title {
        font-size: 5vw;
        margin: 5% 0;
    }

    .about .section-content {
        font-size: 4vw;
        margin-bottom: 6%;
    }
    .pendeta-item {
        flex-direction: column; /* Mengatur tata letak elemen dalam satu kolom pada perangkat seluler */
        align-items: center; /* Memusatkan elemen pada perangkat seluler */
    }

    .pendeta-item-img {
        margin-bottom: 20px;
        margin-left: 35px;
        justify-content: center;
    }

    .pendeta-item-text {
        text-align: center; /* Memusatkan teks pada perangkat seluler */
        font-size: 1.3rem;
        text-align: justify;
        padding: 2.2rem;
        margin-top:-4rem;
    }
    #map {
    height: 11rem;
    width: 25rem;
    }

    
}

</style>
    <?php
    include "konek.php";
    include "menu.php";
    ?>
    
</head>
<body>

    <div class="welcome">
        <img src="assets/welcome.jpg" alt="">
    </div>
    <div class="running">
        <div class="running-text">
            <p>
                SELAMAT DATANG SELAMAT MENIKMATI HADIRAT TUHAN
            </p>
        </div>
    </div>
    <div class="about">
        <h1 class="church-name">
            GEREJA IMMANUEL LAOLI
        </h1>
        <h3 class="section-title">
            Tentang Kami
        </h3>
        <span class="section-content">
            Gereja Immanuel Laoli adalah gereja sel yang apostolik dan profetik. Gereja yang dipenuhi oleh rupa-rupa karunia Roh Kudus dan bergerak dalam Amanat Agung untuk menjadikan semua bangsa murid Kristus. Didirikan di tahun 1984 dalam bentuk persekutuan doa, GMS kini telah berkembang menjadi gereja yang bertumbuh cepat ke arah 100.000 jemaat dalam gereja-gereja lokal yang tersebar di seluruh negeri, bahkan sampai ke Asia, Australia, Eropa & Amerika.
        </span>
        <br>
        <h3 class="section-title">
            Visi dan Misi
        </h3>
        <span class="section-content">
            Gereja yang membawa orang kepada Kristus, bertumbuh serupa Kristus, dan menjadi berkat dalam gereja dan masyarakat
        </span>
    </div>

    <div class="pendeta">
    <h1>PROFIL PENDETA STEVEN IMMANUEL LAOLI</h1>
    <div class="pendeta-item">
        <div class="pendeta-item-img">
            
            <img src="assets/pdt immanuel.jpeg" alt="pendeta 3">
        </div>
        <div class="pendeta-item-text">
            
            <p>
                Pendeta Steven Immanuel Laoli dilahirkan di Surabaya pada tanggal 19 Mei, 2004. Dari kota kelahirannya, ia menempuh sekolah di Taipei, Singapore, dan akhirnya bertobat saat SMA di Vancouver, Canada.
            </p>
            <p>
                Dua tahun setelah lulus sarjana sekolah Alkitab, saat kerusuhan terjadi di Indonesia pada bulan Mei 2011, ia memutuskan untuk pulang ke tanah airnya demi memberitakan Injil. Gereja Mawar Sharon yang dipimpinnya telah berkembang menjadi salah satu gereja yang paling pesat pertumbuhannya dengan sekitar 100.000 anggota jemaat yang tersebar di berbagai lokasi di dalam dan luar negeri. Hari ini, gereja-gereja lokal yang kuat telah didirikan di seluruh Asia, Australia, Eropa dan Amerika Serikat. Saat ini, ia menjabat sebagai gembala senior organisasi dan jaringan gereja ini. Visinya adalah untuk mendirikan 1.000 gereja lokal yang kuat dengan 1 juta murid Kristus. Kerinduan hatinya yang menyala adalah untuk melihat bangsa-bangsa mengalami kasih Yesus Kristus.
            </p>
        </div>
        
    </div>
</div>

<p></p>
<div class="map-container">
<h2>Alamat Gereja</h2>
<p>CRVG+5RR, Jl. Samosir, Gilingan, Kec. Banjarsari, Kota Surakarta, Jawa Tengah 57134</p>
<div id="map" ></div>
        <script>
            const map = L.map('map').setView([-7.557020272898918, 110.82701199041887], 18);
            
            const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 20,
                attribution: '&copy; <p>Gereja Kami Tidak Sesat!!!</p>'  
            }).addTo(map);

        var g1 = L.icon({
            iconUrl: '3.png',

            iconSize:     [100, 100], // size of the icon
            popupAnchor:  [-3, -86] // point from which the popup should open relative to the iconAnchor

        });
        L.marker([-7.557020272898918, 110.82701199041887], {icon: g1}).addTo(map);

        </script>
</div>
</body>
</html>