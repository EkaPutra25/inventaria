<?php

class multiuser extends Controller {

public function admin() {
    $data['judul'] = 'Admin';
    $_SESSION['status'] = [];

    session_start();

    if(empty($_SESSION['status'])) {
        header('Location :' . BASEURL . '/login/index');
    } else if(!empty($_SESSION['status'] === 1)){
        header('Location :' . BASEURL . '/loginmultiuser/admin'); 
    }
    $this->view('tamplates/headerlogin');
    $this->view('loginmultiuser/admin');
    $this->view('tamplates/footer');


}

public function user() {
    $data['judul'] = 'User';
    $_SESSION['status'] = [];

    session_start();

    if(empty($_SESSION['status'])) {
        header('Location :' . BASEURL . '/login/index');
    } else if(!empty($_SESSION['status'] === 2)){
        header('Location :' . BASEURL . '/loginmultiuser/user'); 
    }
    $this->view('tamplates/headerlogin');
    $this->view('loginmultiuser/user');
    $this->view('tamplates/footer');
}

}