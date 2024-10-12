CREATE DATABASE perusahaan;

USE perusahaan;

-- Tabel Ruangan
CREATE TABLE ruangan (
    id_ruangan INT(11) AUTO_INCREMENT PRIMARY KEY,
    keterangan VARCHAR(200) NOT NULL
);

-- Tabel Pegawai
CREATE TABLE pegawai (
    nip INT(11) AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(200) NOT NULL,
    alamat VARCHAR(200),
    tgl_lahir DATETIME,
    id_ruangan INT(11),
    FOREIGN KEY (id_ruangan) REFERENCES ruangan(id_ruangan) ON DELETE SET NULL
);

-- Insert contoh data ke tabel ruangan
INSERT INTO ruangan (keterangan) VALUES ('HRD'), ('Keuangan'), ('IT');
