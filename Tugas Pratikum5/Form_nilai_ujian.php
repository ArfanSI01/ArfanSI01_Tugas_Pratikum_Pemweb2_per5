<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nilai Ujian Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
    }
    form {
      max-width: 400px;
      margin: 0 auto;
      text-align: left; 
    /* Memposisikan form ke tengah */
    }
    label {
      display: block;
      margin-bottom: 10px;
    }
    input {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      box-sizing: border-box;
    }
    button {
      padding: 10px 20px;
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
    }
    button:hover {
      background-color: #45a049;
    }
    .error {
      color: red;
      margin-bottom: 10px;
    }
    .result {
      text-align: left;
    /* Memposisikan hasil ke tengah */
    }
  </style>
</head>
<body>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <h1>FORM NILAI MAHASISWA</h1>
    <label for="nama">Nama Siswa:</label>
    <input type="text" id="nama" name="nama" required><br>
    <label for="nim">NIM:</label>
    <input type="text" id="nim" name="nim" required><br>
    <label for="matkul">Pilih MK:</label>
    <input type="text" id="matkul" name="matkul" required><br>
    <label for="nilai">Nilai:</label>
    <input type="number" id="nilai" name="nilai" required><br>
    <button type="submit">Simpan</button>
  </form>

<?php
  // Array to store validation errors
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Sanitize input
  $nama = filter_input(INPUT_POST, "nama", FILTER_SANITIZE_STRING);
  $nim = filter_input(INPUT_POST, "nim", FILTER_SANITIZE_STRING);
  $matkul = filter_input(INPUT_POST, "matkul", FILTER_SANITIZE_STRING);
  $nilai = filter_input(INPUT_POST, "nilai", FILTER_VALIDATE_INT);
  
  // Validate input
  if (empty($nama)) {
    $errors[] = "Nama Siswa is required";
  }
  if (empty($nim)) {
    $errors[] = "NIM is required";
  }
  if (empty($matkul)) {
    $errors[] = "Course Name is required";
  }
  if ($nilai === false || $nilai === null) {
    $errors[] = "Grade must be a valid number";
  }

  // If no errors, proceed with processing
  if (empty($errors)) {
    // Perform actions with the data (e.g., store in database)
    echo "<div class='result'>";
    echo "<p>Nama Siswa: $nama </p>";
    echo "<p>NIM: $nim </p>";
    echo "<p>Mata Kuliah: $matkul </p>";
    echo "<p>Nilai: $nilai</p>";
    echo "</div>";
    // You can add further processing here, such as storing data in a database
  } else {
    // Output validation errors
    foreach ($errors as $error) {
      echo '<div class="error">' . $error . '</div>';
    }
  }
}
?>
</body>
</html>
