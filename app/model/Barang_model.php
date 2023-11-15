<?php 

class Barang_model {
    private $tabel = "barang";
    private $db;


    public function __construct()
    {
        $this->db = new Database;    
    }

    public function queryData()
    {

        $this->db->query("SELECT * FROM " . $this->tabel);
        return $this->db->resultSet();

    }

    public function getAllBarang() {

        $this->db->query("SELECT * FROM " . $this->tabel . " INNER JOIN rak ON " . $this->tabel . ".id_rak = rak.id_rak LIMIT 3 OFFSET 0");
        return $this->db->resultSet();

    }

    public function getAllBarangPage($halamanAwal, $batasHalaman)
    {
        $this->db->query("SELECT * FROM " . $this->tabel . " INNER JOIN rak ON " . $this->tabel . ".id_rak = rak.id_rak LIMIT " . $batasHalaman . " OFFSET " . $halamanAwal);
        return $this->db->resultSet();
    }

    public function getIdDataBarang($id_barang) {

        $this->db->query("SELECT * FROM " .$this->tabel . " WHERE id_barang = :id_barang ");

        $this->db->bind('id_barang', $id_barang);
        return $this->db->singel();
    }

    public function tambahDataBarang($dataBarang)
{
    $query = "INSERT INTO " . $this->tabel . " (id_barang ,nama_barang, keterangan, stok, id_rak, kolom)
                VALUES (
                     NULL,:namaBarang, :keterangan, :stok, :idRak, :jumlahKolom
                    )";
    $this->db->query($query);
    $this->db->bind('namaBarang', $dataBarang['namaBarang']);
    $this->db->bind('keterangan', $dataBarang['keterangan']);
    $this->db->bind('stok', $dataBarang['stok']);
    $this->db->bind('idRak', $dataBarang['idRak']);
    // $this->db->bind('gambarBarang', $dataBarang['gambarBarang']);
    $this->db->bind('jumlahKolom', $dataBarang['jumlahKolom']);

    $this->db->execute();
    return $this->db->rowCount();
}

    public function updateDataBarang($id_barang, $nama_barang, $keterangan, $stok, $idRak, $kolom) {
        $query = "UPDATE barang 
                SET nama_barang = :namaBarang, 
                    keterangan = :keterangan, 
                    stok = :stok, 
                    id_rak = :idRak, 
                    kolom = :kolom
                WHERE id_barang = :id_barang";
                
    $this->db->query($query);
    $this->db->bind('namaBarang', $nama_barang);
    $this->db->bind('keterangan', $keterangan);
    $this->db->bind('stok', $stok);
    $this->db->bind('idRak', $idRak);
    // $this->db->bind('gambarBarang', $dataBarang['gambarBarang']);
    $this->db->bind('kolom', $kolom);
    $this->db->bind('id_barang', $id_barang);

    $this->db->execute();
    return $this->db->rowCount();
    }


    public function deleteDataBarang($id)
    {
        $query = "DELETE FROM " . $this->tabel . " WHERE id_barang = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }


}

?>