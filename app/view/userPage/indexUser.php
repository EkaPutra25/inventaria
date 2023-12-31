
                <div class="col-10">

                    <!-- Navbar Design -->
                    <div class="navbar-design shadow">
                        <div class="d-flex justify-content-between">
                            <div class="col-6">
                                <div class="input-group search-layout">
                                    <input type="text" class="form-control" placeholder="Search..." aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn btn-primary" type="button" id="button-addon2">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex justify-content-end profile-layout">
                                    <p>User</p>
                                    <i class="fa-solid fa-circle-user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Navbar Design -->


                    <!-- Item Card Design -->
                    <div class="item-barang ">

                        <div class="row row-cols-1 row-cols-md-3 g-4">
                            <?php foreach ( $data['barang'] as $rowBarang ) : ?>
                                <div class="col p-4">
                                    <div class="card h-100">
                                        <img src="<?= BASEURL ?>/img/ice-tea-with-mint 1.jpg" alt="Item">
                                        <div class="card-body">
                                        <h5 class="card-title text-center mb-2"><?= $rowBarang['nama_barang'] ?> </h5>
                                        <p class="card-text">Rak : <?= $rowBarang['nama_rak'] ?> </p>
                                        <p class="card-text">Keterangan : <?= $rowBarang['keterangan'] ?> </p>
                                        <p class="card-text">Kolom : <?= $rowBarang['kolom'] ?> </p>
                                        <p class="card-text">Stok : <?= $rowBarang['stok'] ?> </p>    
                                        </div>
        
                                        <!-- <div class="card-footer">
                                            <div class="float-start">
                                                <div class="tombol">
                                                <a href="<?= BASEURL ?>/multiuser/editbarang/<?= $rowBarang['id_barang'] ?>" data-id ="<?= $rowBarang['id_barang'] ?>" class="btn btn-warning justify-content-center editDataBarang"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></a>
                                                <a href="<?= BASEURL ?>/multiuser/deleteBarang/<?= $rowBarang['id_barang'] ?>"  onclick="return confirm('Yakin Barang Ingin Dihapus?')" class="btn btn-danger"><i class="fa-solid fa-trash-can" style="color: #ffffff;"></i></a>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            
                        </div>
                    </div>
                    <!-- End Item Card Design -->



                    



                    <!-- pagination start-->
                    <div class="pagination d-flex justify-content-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                            <?php if ( $data['halaman_aktif'] > 1) : ?>
                              <li class="page-item">
                                  <a class="page-link" href="<?= BASEURL ?>/multiuser/page/<?= $data['halaman_aktif'] - 1 ?>" aria-label="Previous">
                                  <span aria-hidden="true">&laquo;</span>
                                  </a>
                              </li>
                            <?php endif; ?>

                            <?php for ( $i = 1; $i <= $data['jumlah_halaman'] ; $i++ ) : ?>
                              <?php if( $i == $data['halaman_aktif'] ) : ?>
                                <li class="page-item"><a class="page-link active" href="<?= BASEURL ?>/multiuser/page/<?= $i ?>"><?= $i ?></a></li>
                              <?php else : ?>
                                <li class="page-item"><a class="page-link" href="<?= BASEURL ?>/multiuser/page/<?= $i ?>"><?= $i ?></a></li>
                              <?php endif; ?>
                            <?php endfor; ?>

                            <?php if( $data['halaman_aktif'] < $data['jumlah_halaman']) : ?>
                            <li class="page-item">
                                <a class="page-link" href="<?= BASEURL ?>/multiuser/page/<?= $data['halaman_aktif'] + 1 ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                            <?php endif; ?>
                            </ul>
                        </nav>
                    </div>
                      <!-- Pagination End -->
  </div>
  </div>


                      
                </div>
            </div>
        </div>

        <!-- JAVA SCRIPT LINK -->
         <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->

    <!--</body>
    </html>  -->