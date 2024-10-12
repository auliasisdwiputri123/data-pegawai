<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perusahaan";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Menampilkan semua pegawai
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sql = "SELECT pegawai.nip, pegawai.nama, pegawai.alamat, pegawai.tgl_lahir, ruangan.keterangan 
            FROM pegawai
            LEFT JOIN ruangan ON pegawai.id_ruangan = ruangan.id_ruangan";
    $result = $conn->query($sql);
    
    $pegawai = array();
    while($row = $result->fetch_assoc()) {
        $pegawai[] = $row;
    }
    echo json_encode($pegawai);
}

// Menambah pegawai
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $id_ruangan = $_POST['id_ruangan'];
    
    $sql = "INSERT INTO pegawai (nama, alamat, tgl_lahir, id_ruangan) VALUES ('$nama', '$alamat', '$tgl_lahir', '$id_ruangan')";
    
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Pegawai berhasil ditambahkan"]);
    } else {
        echo json_encode(["message" => "Error: " . $sql . "<br>" . $conn->error]);
    }
}

// Menghapus pegawai
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    parse_str(file_get_contents("php://input"), $_DELETE);
    $nip = $_DELETE['nip'];
    
    $sql = "DELETE FROM pegawai WHERE nip = $nip";
    
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Pegawai berhasil dihapus"]);
    } else {
        echo json_encode(["message" => "Error: " . $sql . "<br>" . $conn->error]);
    }
}

// Mengedit pegawai
if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    parse_str(file_get_contents("php://input"), $_PUT);
    $nip = $_PUT['nip'];
    $nama = $_PUT['nama'];
    $alamat = $_PUT['alamat'];
    $tgl_lahir = $_PUT['tgl_lahir'];
    $id_ruangan = $_PUT['id_ruangan'];
    
    $sql = "UPDATE pegawai SET nama = '$nama', alamat = '$alamat', tgl_lahir = '$tgl_lahir', id_ruangan = '$id_ruangan' WHERE nip = $nip";
    
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Pegawai berhasil diupdate"]);
    } else {
        echo json_encode(["message" => "Error: " . $sql . "<br>" . $conn->error]);
    }
}

$conn->close();
?>
