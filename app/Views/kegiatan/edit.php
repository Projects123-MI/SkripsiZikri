 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1 class="m-0">Data kegiatan</h1>
                     <?php if (!empty(session()->getFlashdata('success'))) : ?>   
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <?= session('success'); ?>
                         </div>
                     <?php endif; ?>
                     <br>
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
                     <div class="card">
                         <div class="card-header">
                             <h3 class="card-title">Edit data <?= $kegiatan['name']; ?></h3>
                         </div>
                         <!-- /.card-header -->
                         <!-- form start -->   
                         <form action="<?= base_url('kegiatan/' . $kegiatan['kegiatanID'] . '/edit') ?>" method="post">
                 <?= csrf_field(); ?>
                 <input type="text" hidden name="id_kegiatan" value="<?= $data_guru['id_kegiatan']; ?>">
                 <div class="modal-body">
                     <div class="form-group">
                     </div> 
                     <div class="form-group"> 
                         <label for="jam">Jam Mengajar</label>
                         <input type="time" name="jam" class="form-control" id="jam" value="<?= $data_guru['jam']; ?>" placeholder="Jam" required></input>
                     </div>
                     <div class="form-group">
                         <label for="hari">Hari</label>
                         <select name="hari" id="hari" class="form-control" required>
                             <option  <?php if ($data_guru['hari'] == "-"): ?> selected <?php endif; ?> value="">-Pilih-</option>
                             <option  <?php if ($data_guru['hari'] == "Senin"): ?> selected <?php endif; ?> value="Senin">Senin</option>
                             <option <?php if ($data_guru['hari'] == "Selasa"): ?> selected <?php endif; ?> value="Selasa">Selasa</option>
                             <option <?php if ($data_guru['hari'] == "Rabu"): ?> selected <?php endif; ?> value="Rabu">Rabu</option>
                             <option <?php if ($data_guru['hari'] == "Kamis"): ?> selected <?php endif; ?> value="Kamis">Kamis</option>
                             <option <?php if ($data_guru['hari'] == "Jumat"): ?> selected <?php endif; ?> value="Jumat">Jumat</option>
                             <option <?php if ($data_guru['hari'] == "Sabtu"): ?> selected <?php endif; ?> value="Sabtu">Sabtu</option>
                         </select>
                     </div>
                     <div class="form-group">
                         <label for="kelas">Kelas</label>
                         <select name="kelas" id="kelas" class="form-control" required>
                             <option <?php if ($data_guru['kelas'] == "-"): ?> selected <?php endif; ?> value="">-Pilih-</option>
                             <option <?php if ($data_guru['kelas'] == "1"): ?> selected <?php endif; ?> value="1">1</option>
                             <option <?php if ($data_guru['kelas'] == "2"): ?> selected <?php endif; ?> value="2">2</option>
                             <option <?php if ($data_guru['kelas'] == "3"): ?> selected <?php endif; ?> value="3">3</option>
                             <option <?php if ($data_guru['kelas'] == "4"): ?> selected <?php endif; ?> value="4">4</option>
                             <option <?php if ($data_guru['kelas'] == "5"): ?> selected <?php endif; ?> value="5">5</option>
                             <option <?php if ($data_guru['kelas'] == "6"): ?> selected <?php endif; ?> value="6">6</option>
                         </select>
                     </div>
                 </div>
                 <div class="modal-footer">
                 <a href="<?= base_url('kegiatan') ?>" class="btn btn-secondary" data-dismiss="modal">Back</a>
                     <button type="submit" class="btn btn-primary">Save</button>
                 </div>
             </form>
                         </div>
                         <!-- /.card-body -->
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
 

 <script>
     function confirmToDelete(el) {
         $("#delete-button").attr("href", el.dataset.href);
         $("#confirm-dialog").modal('show');
     }
 </script>