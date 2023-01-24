<?php include('../config/auto_load.php'); ?>

<?php include('pengajuan_surat_control.php'); ?>

<?php include('../template/header.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Data Pengajuan Berkas</h1>
  <form class="user" method="POST" action="<?= $base_url ?>/user/editprofil.php" enctype="multipart/form-data">
    <div class="row mb-4">




      <!-- </div>  

<div class="row mb-4">        -->
      <div class="col-md-5">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="h4 font-weight-bold text-primary text-uppercase mb-1">Surat Tidak Mampu</div>

                <!-- <div class="h5 mt-3 font-weight-bold">
                  <?= mysqli_num_rows($jml_pendaftar) ?> Orang
                </div> -->
                <div class="row no-gutters align-items-center">
                  <a href="tidak_mampu.php" class="btn btn-primary btn-sm float-left disabled" target="">Buat Sekarang</a>

                </div>
                <p class="text-danger mt-3"> *fitur belum tersedia</p>
              </div>
              <div class="col-auto">
                <i class="fas fa-users fa-2x text-gray-300" style="font-size: 90px;"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- <div class="row mb-4">
      <div class="col-md-5">
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="h4 font-weight-bold text-warning text-uppercase mb-1">Surat Keramaian</div>

                <div class="row no-gutters align-items-center">
                  <a href="" class="btn btn-warning btn-sm float-left" target="">Buat Sekarang</a>

                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-users fa-2x text-gray-300" style="font-size: 90px;"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->
  </form>
</div>
<!-- /.container-fluid -->

<?php include('../template/footer.php'); ?>