            <div class="col-10">

                <!-- Navbar Design -->
                <div class="navbar-design shadow">
                    <div class="manage d-flex">
                        <i class="fa-solid fa-box"></i>
                        <h3 class="manage-text align-self-center">Kelola Barang</h3>
                    </div>
                </div>
                <!-- End Navbar Design -->

                <!-- Users Card Design -->
                <div class="container-brg container-sm shadow-lg">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-5">
                            <img class="img-brg rounded" src="<?= BASEURL ?>/img/ice-tea-with-mint 1.jpg" alt="">
                            <div class="file-form mb-3">
                                <label for="choose" class="btn btn-primary">
                                    <i class="fa-solid fa-camera"></i>
                                </label>
                                <input class="form-control form-control-sm" id="choose" type="file">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="container-sm form-edit">
                                <div class="mb-3">
                                    <input type="text" name="namaBarang" class="form-control" value="<?= $data['barang']['nama_barang'] ?>"  id="exampleFormControlInput1" placeholder="Nama Barang">
                                </div>
                            </div>
                            <div class="container-sm form-edit2">
                                <select class="form-select mb-3" name="idrak" aria-label="Default select example">
                                    <option selected>Pilih Rak</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <div class="container-sm form-edit2">
                                <div class="mb-3">
                                    <input type="text" name="keterangan" class="form-control" value="<?=$data['barang']['keterangan'] ?>" id="exampleFormControlInput1" placeholder="Keterangan">
                                </div>
                            </div>
                            <div class="container-sm form-edit2">
                                <select class="form-select mb-3" name="kolom" aria-label="Default select example">
                                    <option selected>Pilih Kolom</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <div class="container-sm form-edit2">
                                <div class="mb-3">
                                    <input type="text" name="stok" class="form-control" value="<?= $data['barang']['stok'] ?>" id="exampleFormControlInput1" placeholder="Stock">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-3 save-buttonedit">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                                <div class="mb-3 col-md-3 cancel-buttonedit">
                                    <button type="button" class="btn btn-danger">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                 </form>
                </div>
                <!-- End Users Card Design -->
            </div>
        </div>
    </div>

    <!-- JAVA SCRIPT LINK -->
