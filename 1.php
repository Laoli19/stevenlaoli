<?php
$host = "localhost";
$user = "root";
$password = "";
$databasename = "pop";

$db = mysqli_connect($host, $user, $password, $databasename);

// Periksa koneksi ke database
if (!$db) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil data populasi dari database
$query = "SELECT country, pop2024 FROM _20232_0610098801ti2240202_240611_122133 WHERE country IN ('Malawi', 'Indonesia') AND year IN (2024, 2030)";
$result = mysqli_query($db, $query);

$populations = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $populations[] = $row;
    }
} else {
    echo "Error: " . mysqli_error($db);
}

mysqli_close($db);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Malawi vs Indonesia Population</title>
</head>
<body>
    <div class="c">
        <button onclick="showPopulation()">Malawi vs Indonesia</button>
        <div id="population-data" style="display: none;">
            <h2>Population Data for Malawi and Indonesia</h2>
            <table border="1">
                <thead>
                    <tr>
                        <th>Country</th>
                        <th>Year</th>
                        <th>Population</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($populations as $population): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($population['country']); ?></td>
                        <td><?php echo htmlspecialchars($population['year']); ?></td>
                        <td><?php echo htmlspecialchars($population['population']); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function showPopulation() {
            var dataDiv = document.getElementById('population-data');
            if (dataDiv.style.display === 'none') {
                dataDiv.style.display = 'block';
            } else {
                dataDiv.style.display = 'none';
            }
        }
    </script>
</body>
</html>
