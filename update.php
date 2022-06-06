<?php
include './koneksi.php';

//POST DATA
if ($_POST){
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $jumlah = $_POST['jumlah'];
    $tanggal = $_POST['tanggal'];
    $abstrak = $_POST['abstrak'];
    $isbn = $_POST['isbn'];
    
    //UPDATE DATA
    $stmt = $connection->prepare("UPDATE `buku` SET `judul`='$judul',`pengarang`='$pengarang',`jumlah`='$jumlah',`tanggal`='$tanggal',`abstrak`='$abstrak' WHERE `isbn` = $isbn");
    $stmt->execute();

    //Beri Response
    $response['message'] = "Berhasil Diperbaharui";
    $response['data'] = [
        
        'judul' => $judul,
        'pengarang' => $pengarang,
        'jumlah' => $jumlah,
        'tanggal' => $tanggal,
        'abstrak' => $abstrak,
        'isbn' => $isbn
    ];

    //Jadikan data dalam bentuk JSON
    $json = json_encode($response, JSON_PRETTY_PRINT);

    //print json
    echo $json;

} else {
    $response['message'] = "Gagal Memperbaharui";
    //Jadikan data dalam bentuk JSON
    $json = json_encode($response, JSON_PRETTY_PRINT);

    //print json
    echo $json;
}