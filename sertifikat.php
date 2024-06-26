<?php
include "konek.php";
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

$id_baptis = isset($_GET['id_baptis']) ? $_GET['id_baptis'] : '';

$query = mysqli_query($db, "SELECT * FROM baptis WHERE id_baptis = '$id_baptis'");

if (!$query) {
    die("Query failed: " . mysqli_error($db));
}

if ($query->num_rows > 0) {
    $row = $query->fetch_assoc();
    $nama = $row['nama'];
    $diterima = $row['diterima'];
    $id_baptis = $row['id_baptis'];
} else {
    $nama = 'Unknown User';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Certificate Generator</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            background-color: #f0f0f0;
        }
        .certificate {
            border: 5px solid #000;
            padding: 20px;
            width: 90%;
            max-width: 800px;
            text-align: center;
            margin-top: 20px;
            background-color: white;
        }
        .logo {
            border-radius: 50%;
            width: 100px;
        }
        .nama {
            margin-bottom: -30px;
        }
        .ttd {
            width: 90px;
            margin-bottom: -30px;
        }
        .form-group {
            margin: 10px 0;
        }
        .hidden {
            display: none;
        }
        @media (max-width: 768px) {
            .certificate {
                padding: 15px;
                border-width: 3px;
            }
            .logo {
                width: 80px;
            }
            .ttd {
                width: 70px;
            }
            .nama {
                font-size: 1.2rem;
            }
            h2 {
                font-size: 1.5rem;
            }
            h1 {
                font-size: 1.2rem;
            }
            p {
                font-size: 0.9rem;
            }
        }
        @media (max-width: 480px) {
            .certificate {
                padding: 10px;
                border-width: 2px;
            }
            .logo {
                width: 60px;
            }
            .ttd {
                width: 50px;
            }
            .nama {
                font-size: 1rem;
            }
            h2 {
                font-size: 1.2rem;
            }
            h1 {
                font-size: 1rem;
            }
            p {
                font-size: 0.8rem;
            }
        }
    </style>
</head>
<body>
    <h1>SELAMAT KAMU BERHASIL MENJADI DIBAPTIS</h1>
    <div class="certificate" id="certificate">
        <img class="logo" src="logo.png" alt="logo">
        <h2>Sertifikat Baptis</h2>
        <p>Diberikan Kepada</p>
        <h1 id="recipientName"><?php echo $nama; ?></h1>
        <p>Selamat atas baptisan Anda! Semoga kasih dan berkat Tuhan selalu menyertai Anda dalam perjalanan iman yang baru ini. Tuhan memberkati!</p>
        <p><strong>No: GIL/<?php echo $id_baptis; ?> | <?php echo date('d/m/Y', strtotime($diterima)); ?></strong></p>
        <img src="ttd.png" class="ttd" alt="ttd">
        <p class="nama">PDT.Steven Immanuel Laoli</p>
        <p>______________________________</p>
        <p><strong>Pendeta Gereja Immanuel Laoli</strong></p>
    </div>
    <br>
    <button onclick="generatePDF()">CETAK PDF</button>

    <script>
        async function generatePDF() {
            const { jsPDF } = window.jspdf;

            const date = new Date().toLocaleDateString();

            const certificateElement = document.getElementById("certificate");

            const ip = await fetch('https://api.ipify.org?format=json')
                .then(response => response.json())
                .then(data => data.ip)
                .catch(() => 'Unable to retrieve IP');

            html2canvas(certificateElement, { scale: 2 })
                .then((canvas) => {
                    const imgData = canvas.toDataURL("image/png");
                    const pdf = new jsPDF({
                        orientation: "portrait",
                        unit: "mm",
                        format: "a4"
                    });

                    const pdfWidth = pdf.internal.pageSize.getWidth();
                    const pdfHeight = pdf.internal.pageSize.getHeight();

                    const imgWidth = pdfWidth;
                    const imgHeight = (canvas.height * pdfWidth) / canvas.width;

                    pdf.addImage(imgData, "PNG", 0, 0, imgWidth, imgHeight);

                    pdf.setFontSize(10);
                    pdf.text(`Downloaded by IP: ${ip}`, 10, imgHeight + 10);
                    pdf.text(`Downloaded on: ${date}`, 10, imgHeight + 20);

                    pdf.save("certificate.pdf");
                })
                .catch((err) => {
                    console.error("Error generating PDF:", err);
                });
        }
    </script>
</body>
</html>
