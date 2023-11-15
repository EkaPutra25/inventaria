<?php

class multiuser extends Controller {

public function index() {
    $data['judul'] = 'Admin';
    $_SESSION['status'] = [];

    session_start();

    if(empty($_SESSION['status'])) {
        header('Location :' . BASEURL . '/login/index');
    } else if(!empty($_SESSION['status'] === 1)){
        header('Location :' . BASEURL . '/adminPage/index'); 
    }

    // pagination
    $batasHalaman = 3;
    $jumlah_data = count($this->model('Barang_model')->queryData());
    $data['halaman_aktif'] = (isset($idPages)) ? (int)$idPages : 1 ;
    $data['jumlah_halaman'] = ceil($jumlah_data / $batasHalaman);

    $data['judul'] = 'AdminDashboard';
    $data['barang'] = $this->model('Barang_model')->getAllBarang();
    $data['rakData'] = $this->model('Rak_model')->queryRak();

    $data['barang'] = $this->model('Barang_model')->getAllBarang();
    $this->view('tamplates/header', $data);
    $this->view('adminPage/index', $data);
    $this->view('tamplates/footer');


}

public function user() {
    $data['judul'] = 'User';
    $_SESSION['status'] = [];

    session_start();

    if(empty($_SESSION['status'])) {
        header('Location :' . BASEURL . '/login/index');
    } else if(!empty($_SESSION['status'] === 2)){
        header('Location :' . BASEURL . '/userPage/indexUser'); 
    }

    $batasHalaman = 3;
    $jumlah_data = count($this->model('Barang_model')->queryData());
    $data['halaman_aktif'] = (isset($idPages)) ? (int)$idPages : 1 ;
    $data['jumlah_halaman'] = ceil($jumlah_data / $batasHalaman);

    $data['judul'] = 'AdminDashboard';
    $data['barang'] = $this->model('Barang_model')->getAllBarang();
    $data['rakData'] = $this->model('Rak_model')->queryRak();

    $data['barang'] = $this->model('Barang_model')->getAllBarang();
    $this->view('tamplates/header_user', $data);
    $this->view('userPage/indexUser', $data);
    $this->view('tamplates/footer');
}


public function page($idPages)
    {
        // pagination
        $batasHalaman = 3;
        $jumlah_data = count($this->model('Barang_model')->queryData());
        $data['halaman_aktif'] = (isset($idPages)) ? (int)$idPages : 1 ;
        $halamanAwal = ( $batasHalaman * $data['halaman_aktif'] ) - $batasHalaman ;
        $data['jumlah_halaman'] = ceil($jumlah_data / $batasHalaman);

        $data['judul'] = 'AdminPage';
        $data['barang'] = $this->model('Barang_model')->getAllBarangPage( $halamanAwal, $batasHalaman );
        $data['rakData'] = $this->model('Rak_model')->queryRak();
        $data['activeItem'] = 'active-item';

        $this->view('tamplates/header', $data);
        $this->view('adminPage/index', $data);
        $this->view('tamplates/footer');
    }

    public function deleteBarang($id)
    {
        if( $this->model('Barang_model')->deleteDataBarang($id) ){
            Flasher::setFlash('Berhasil', 'ditambahkan', 'success'); 
            header('Location: ' . BASEURL . '/multiuser');
        }
    }

    public function tambahBarang() {
        if( $this->model('Barang_model')->tambahDataBarang($_POST) ) {
            Flasher::setFlash('Berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/multiuser');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/multiuser');
        }
    }

    public function tambahRak(){
        // var_dump($_POST);
        if ($this->model('Rak_model')->tambahRak($_POST) > 0){
            header('location: '. BASEURL.'/Multiuser/index');
            exit;
        }
    }

    public function getId($id) {
        $this->model('Barang_model')->getIdDataBarang($id);
    }

    public function editbarang($id)
    {
        $data['judul'] = 'Edit Barang';
        $data['activeItem'] = 'active-item';
        $data['barang'] = $this->model('Barang_model')->getIdDataBarang($id);

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nama_barang = $_POST['namaBarang'];
            $keterangan = $_POST['keterangan'];
            $stok = $_POST['stok'];
            $id_rak = $_POST['idrak'];
            // $gambar = $_POST['gambar'];
            $kolom = $_POST['kolom'];

            $newData = [
                'id_barang' => $id,
                'nama_barang' => $nama_barang,
                'keterangan' => $keterangan,
                'stok' => $stok,
                'id_rak' => $id_rak,
                'kolom' => $kolom
                // 'gambar' => $gambar,
            ];

            if($this->model('Barang_model')->updateDataBarang($newData['id_barang'], $newData['nama_barang'], $newData['keterangan'], $newData['stok'], $newData['id_rak'], $newData['kolom']) > 0) {
                
                header('location:'. BASEURL .'/multiuser/index');

            }
            else {
                echo 'Data Tidak ditemukan';
            }

            
        }

        $this->view('tamplates/header', $data);
        $this->view('adminPage/editbarang', $data);
        $this->view('tamplates/footer');
    }

}