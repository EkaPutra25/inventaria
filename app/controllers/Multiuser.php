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
    } else if(!empty($_SESSION['status'] === 0)){
        header('Location :' . BASEURL . '/loginmultiuser/user'); 
    }
    $this->view('tamplates/headerlogin');
    $this->view('loginmultiuser/user');
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
            header('Location: ' . BASEURL . '/multiuser');
        }
    }

    public function tambahBarang() {
        if( $this->model('Barang_model')->tambahDataBarang($_POST) ) {
            header('Location: ' . BASEURL . '/multiuser');
            exit;
        } else {
            header('Location: ' . BASEURL . '/multiuser');
        }
    }

    public function editbarang()
    {
        $data['judul'] = 'Edit Barang';
        $data['activeItem'] = 'active-item';

        $this->view('tamplates/header', $data);
        $this->view('adminPage/editbarang', $data);
        $this->view('tamplates/footer');
    }

}