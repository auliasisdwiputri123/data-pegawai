// Fungsi untuk reset form tambah pegawai
function clearFormTambah() {
    $('#nama').val('');
    $('#alamat').val('');
    $('#tgl_lahir').val('');
    $('#id_ruangan').val('1');  // Set default ke ruangan pertama
}

// Fungsi untuk reset form edit pegawai
function clearFormEdit() {
    $('#edit-nama').val('');
    $('#edit-alamat').val('');
    $('#edit-tgl_lahir').val('');
    $('#edit-id_ruangan').val('1');  // Set default ke ruangan pertama
}
