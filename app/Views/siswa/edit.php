<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                     <h1 class="m-0">Edit Data Siswa</h1>
                     <?php if (!empty(session()->getFlashdata('success'))) : ?>   
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <?= session('success'); ?>
                         </div>
                     <?php endif; ?>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Quick Example</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= base_url('siswa/' . $data['id'] . '/edit') ?>" method="post">
                 <?= csrf_field(); ?>
                 <div class="modal-body">
                     <div class="form-group">
                         <label for="name">Name</label>
                         <input type="text" name="name" class="form-control" id="name" placeholder="Contact Name" value="<?= $data['name']; ?>" required>
                     </div>
                     <div class="form-group">
                         <label for="tempat_lahir">Tempat lahir</label>
                         <input type="tempat_lahir" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="Contact tempat_lahir" value="<?= $data['tempat_lahir']; ?>" required>
                     </div>
                     <div class="form-group">
                         <label for="tgl_lahir">Tanggal Lahir</label>
                         <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" value="<?= $data['tgl_lahir']; ?>" required>
                     </div>
                     <div class="form-group">
                         <label for="jk">Jenis kelamin</label>
                         <select name="jk" id="jk" class="form-control">
                             <option <?php if ($data['jk'] == "-"): ?> selected <?php endif; ?> value="-">-Pilih Jenis Kelamin-</option>
                             <option <?php if ($data['jk'] == "Laki-laki"): ?> selected <?php endif; ?> value="Laki-laki">Laki-laki</option>
                             <option <?php if ($data['jk'] == "Perempuan"): ?> selected <?php endif; ?> value="Perempuan">Perempuan</option>
                         </select>
                     </div>
                     <div class="form-group">
                         <label for="alamat">Alamat</label>
                         <input type="text" name="alamat" class="form-control" id="alamat" placeholder="alamat" value="<?= $data['alamat']; ?>" required>
                     </div>
                     <div class="form-group">
                         <label for="kelas">Kelas</label>
                         <input type="text" name="kelas" class="form-control" id="kelas" placeholder="kelas" value="<?= $data['kelas']; ?>" required>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <a href="<?= base_url('siswa') ?>" class="btn btn-secondary" data-dismiss="modal">Back</a>
                     <button type="submit" class="btn btn-primary">Save</button>
                 </div>
             </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
</div>