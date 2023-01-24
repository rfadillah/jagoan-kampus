<?php include('../config/auto_load.php'); ?>

<?php include('nilai_control.php'); ?>

<?php include('../template/header.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Data Pengajuan Berkas</h1>
  <form class="user" method="POST" action="<?= $base_url ?>/user/editprofil.php" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-8">
                
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name="nama" value="<?= $data_pendaftar['nama'] ?>">
                </div>
                <div class="form-group">
                    <label for="NIK">NIK</label>
                    <input type="text" class="form-control" id="NIK" placeholder="Masukkan NIK" name="NIK" value=""> <!-- <?= $data_pendaftar['NIK'] ?> -->
                </div>
                
                <div class="form-group">
                <label for="agama">Keperluan</label>
                        <select name="agama" id="agama" class="form-control">
                            <option value="">Pilih Keperluan</option>
                            <option value="islam" <?php if($data_pendaftar['agama'] == 'islam'){ echo "selected"; } ?>>Mengurus KTP</option>
                            <option value="kristen" <?php if($data_pendaftar['agama'] == 'kristen'){ echo "selected"; } ?>>Mengurus KK</option>
                            <option value="katolik" <?php if($data_pendaftar['agama'] == 'katolik'){ echo "selected"; } ?>>Mengurus AKTE</option>
                            <option value="hindu" <?php if($data_pendaftar['agama'] == 'hindu'){ echo "selected"; } ?>>Mengurus Dokumen Kerja</option>
                            <option value="budha" <?php if($data_pendaftar['agama'] == 'budha'){ echo "selected"; } ?>>Lainnya</option> 
                          </select>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" placeholder="Tempat lahir" name="tempat_lahir" value="<?= $data_pendaftar['tmpt_lahir'] ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="text" class="form-control datepicker" id="tanggal_lahir" placeholder="Tanggal Lahir" name="tanggal_lahir" value="<?= date("d-m-Y", strtotime($data_pendaftar['tgl_lahir'])); ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label>Jenis Kelamin</label>
                        <?php
                        $laki = "";
                        $perempuan = "";

                        if($data_pendaftar['jenis_kelamin'] == "L") {
                            $laki = "checked";
                        } else {
                            $perempuan = "checked";
                        }
                        ?>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="lk" value="L" <?= $laki ?>>
                            <label class="form-check-label" for="lk">
                                Laki Laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="pr" value="P" <?= $perempuan ?>>
                            <label class="form-check-label" for="pr">
                                Perempuan
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="agama">Keperluan</label>
                        <select name="agama" id="agama" class="form-control">
                            <option value="">Pilih Agama</option>
                            <option value="islam" <?php if($data_pendaftar['agama'] == 'islam'){ echo "selected"; } ?>>Islam</option>
                            <option value="kristen" <?php if($data_pendaftar['agama'] == 'kristen'){ echo "selected"; } ?>>Kristen</option>
                            <option value="katolik" <?php if($data_pendaftar['agama'] == 'katolik'){ echo "selected"; } ?>>Katolik</option>
                            <option value="hindu" <?php if($data_pendaftar['agama'] == 'hindu'){ echo "selected"; } ?>>Hindu</option>
                            <option value="budha" <?php if($data_pendaftar['agama'] == 'budha'){ echo "selected"; } ?>>Budha</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="agama">Agama</label>
                        <select name="agama" id="agama" class="form-control">
                            <option value="">Pilih Agama</option>
                            <option value="islam" <?php if($data_pendaftar['agama'] == 'islam'){ echo "selected"; } ?>>Islam</option>
                            <option value="kristen" <?php if($data_pendaftar['agama'] == 'kristen'){ echo "selected"; } ?>>Kristen</option>
                            <option value="katolik" <?php if($data_pendaftar['agama'] == 'katolik'){ echo "selected"; } ?>>Katolik</option>
                            <option value="hindu" <?php if($data_pendaftar['agama'] == 'hindu'){ echo "selected"; } ?>>Hindu</option>
                            <option value="budha" <?php if($data_pendaftar['agama'] == 'budha'){ echo "selected"; } ?>>Budha</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control"><?= $data_pendaftar['alamat']; ?></textarea>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="email">Email</label>
                        <input name="email" type="email" class="form-control" id="email" placeholder="Email" value="<?= $data_pendaftar['email'] ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="telepon">Telepon</label>
                        <input name="telepon" type="text" class="form-control" id="telepon" placeholder="Telepon" value="<?= $data_pendaftar['telepon'] ?>">
                    </div>
                </div>
                <!-- <div class="form-group row">
                    <div class="col-md-6">
                        <label for="password">Password</label>
                        <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <div class="col-md-6">
                        <label for="ulangi_password">Ulangi Password</label>
                        <input name="ulangi_password" type="password" class="form-control" id="ulangi_password" placeholder="Ulangi Password">
                    </div>
                </div> -->

                
                
            </div>
            <div class="col-md-4">
                <?php
                if(isset($data_pendaftar['foto']) && $data_pendaftar['foto'] != '') {
                    $foto = '../uploads/' . $data_pendaftar['foto'];
                } else {
                    $foto = '../assets/img/avatar.jpg';
                }
                ?>
                <img src="<?= $foto ?>" alt="foto profil" class="img-fluid">

                <input type="file" name="gambar" class="form-control mt-2">
            </div>
            <div class="col-md-12">
                <button type="submit" name="btn_simpan" value="simpan_profil" class="btn btn-primary mb-5">Ubah</button>
                <a href="dashboard.php" class="btn btn-danger mb-5">Kembali</a>
            </div>
        </div>
    </form>


  <div class="row">
  <div class="col-md-6">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">EDIT DATA NILAI</h6>
        </div>
        <div class="card-body">
            <p class="text-danger">* Ubah jika ada kesalahan!</p>
            <form class="user" method="POST" action="<?= $base_url ?>/user/nilai.php">
              <?php if(isset($data_nilai)) {
                // echo "edit nilai";
                $id_nilai = $data_nilai['id'];
                echo "<input type='hidden' name='id_nilai' value='$id_nilai'>";

              } else {
                // echo "insert nilai";
              }
              ?>

                <div class="form-group">
                    <label for="un">Nilai Ujian Nasional</label>
                    <input type="text" class="form-control" id="un" placeholder="Masukkan Nilai Ujian Nasional" name="un" value="<?php if(isset($data_nilai['nilai_un'])) { echo $data_nilai['nilai_un']; } ?>">
                </div>
                <div class="form-group">
                    <label for="us">Nilai Ujian Sekolah</label>
                    <input type="text" class="form-control" id="us" placeholder="Masukkan Nilai Ujian Sekolah" name="us" value="<?php if(isset($data_nilai['nilai_us'])) { echo $data_nilai['nilai_us']; } ?>">
                </div>
                <div class="form-group">
                    <label for="uts_1">Nilai UTS 1</label>
                    <input type="text" class="form-control" id="uts_1" placeholder="Masukkan Nilai Ujian Sekolah" name="uts_1" value="<?php if(isset($data_nilai['nilai_uts_1'])) { echo $data_nilai['nilai_uts_1']; } ?>">
                </div>
                <hr>
                <div class="text-right">
                    <button type="submit" name="btn_simpan" value="simpan_nilai" class="btn btn-primary">Simpan</button>
                    <a href="dashboard.php" class="btn btn-danger">Kembali</a>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

<?php include('../template/footer.php'); ?>