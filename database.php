<?php
// Sesuaikan dengan setting MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "penduduk_db";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM responsi_alif";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>MANGGUNG</title>

<!-- <link rel="stylesheet" href="style.css" /> -->
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Optional custom styles */
        /* Adjust as needed */
        .table-container {
            margin: 20px;
        }
        body {
            background-image: url('assets/img/jogan2.jpeg'); /* Ganti 'background.jpg' dengan path gambar latar belakang yang diinginkan */
            background-size: cover;
            color: #000;
        }

        .navbar {
            background-color: #0095ff;
        }

        .table-container {
            margin: 20px;
            background-color: rgba(255, 255, 255, 0.8); /* Warna latar belakang tabel */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Efek bayangan pada tabel */
        }

        .table th,
        .table td {
            color: #000; /* Warna teks hitam */
        }
    </style>
</head>

<body>

    <!--Navbar-->
  <nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: #000000">
    <div class="container">
      <a class="navbar-brand" href="index.html"><i class="fa-solid fa-mountain-sun mx-2"></i>MANGGUNG</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.html">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="peta.html">MAPS</a>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>
  <!--Akhir Navbar-->
        
    <div class="container table-container">

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nama Pantai</th>
                    <th>Longitude</th>
                    <th>latitude</th>
                    <th>Kecamatan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>" . $row["nama_pantai"] . "</td>
                            <td>" . $row["longitude"] . "</td>
                            <td>" . $row["latitude"] . "</td>
                            <td>" . $row["kecamatan"] . "</td>
                          </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>0 results</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

<?php
$conn->close();
?>