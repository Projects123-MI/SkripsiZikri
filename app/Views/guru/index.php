 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1 class="m-0">Data guru</h1>
                     <?php if (!empty(session()->getFlashdata('success'))) : ?>   
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <?= session('success'); ?>
                         </div>
                     <?php endif; ?>
                     <br>
                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                         Tambah
                     </button>
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
                             <h3 class="card-title">DataTable </h3>
                         </div>
                         <!-- /.card-header -->
                         <div class="card-body">
                             <table id="example1" class="table table-bordered table-striped">
                                 <thead>
                                     <tr>
                                         <th>No</th>
                                         <th>Nama</th>
                                         <th>NIK</th>
                                         <th>Tempat lahir</th>
                                         <th>Tanggal Lahir</th>
                                         <th>Jenis kelamin</th>
                                         <th>Alamat</th>
                                         <th>Jabatan</th>
                                         <th>Pendidikan</th>
                                         <th>Action</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php foreach ($gurus as $key => $guru) : ?>
                                         <tr>
                                             <td><?= ++$key ?></td>
                                             <td><?= $guru['name'] ?></td>
                                             <td><?= $guru['nik'] ?></td>
                                             <td><?= $guru['tempat_lahir'] ?></td>
                                             <td><?= date('d-m-Y', strtotime($guru['tgl_lahir'])) ?></td>
                                             <td><?= $guru['jk'] ?></td>
                                             <td><?= $guru['alamat'] ?></td>
                                             <td><?= $guru['jabatan'] ?></td>
                                             <td><?= $guru['pendidikan'] ?></td>
                                             <td align="center">
                                                 <a href="#" data-href="<?= base_url('guru/' . $guru['id'] . '/delete') ?>" onclick="confirmToDelete(this)" class="btn btn-danger"><i class="fa fa-trash"></i></a> 
                                                 <a href="<?= base_url('guru/edit/'.$guru['id']); ?>"  class="btn btn-warning"><i class="fa fa-edit"></i></a></td>
                                         </tr>
                                     <?php endforeach; ?>

                                 </tbody>
                             </table>
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
 <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Add Data </h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <form action="<?= base_url('guru') ?>" method="post">
                 <?= csrf_field(); ?>
                 <div class="modal-body">
                     <div class="form-group">
                         <label for="name">Name</label>
                         <input type="text" name="name" class="form-control" id="name" placeholder=" Name" required>
                     </div>
                     <div class="form-group">
                         <label for="nik">NIK</label>
                         <input type="text" name="nik" class="form-control" id="nik" placeholder="NIK" required>
                     </div>
                     <div class="form-group">
                         <label for="tempat_lahir">Tempat lahir</label>
                         <input type="tempat_lahir" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="tempat_lahir" required>
                     </div>
                     <div class="form-group">
                         <label for="tgl_lahir">Tanggal Lahir</label>
                         <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" required>
                     </div>
                     <div class="form-group">
                         <label for="jk">Jenis kelamin</label>
                         <select name="jk" id="jk" class="form-control">
                             <option value="-">-Pilih Jenis Kelamin-</option>
                             <option value="Laki-Laki">Laki-laki</option>
                             <option value="Perempuan">Perempuan</option>
                         </select>
                     </div>
                     <div class="form-group">
                         <label for="alamat">Alamat</label>
                         <input type="text" name="alamat" class="form-control" id="alamat" placeholder="alamat" required>
                     </div>
                     <div class="form-group">
                         <label for="jabatan">Jabatan</label>
                         <input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="jabatan" required>
                     </div>
                     <div class="form-group">
                         <label for="pendidikan">Pendidikan</label>
                         <input type="text" name="pendidikan" class="form-control" id="pendidikan" placeholder="pendidikan" required>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary">Save</button>
                 </div>
             </form>
         </div>
     </div>
 </div>

  <!-- delete -->
  <div id="confirm-dialog" class="modal" tabindex="-1" role="dialog">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-body">
                 <h2 class="h2">Are you sure?</h2>
                 <p>The data will be deleted and lost forever</p>
             </div>
             <div class="modal-footer">
                 <a href="#" role="button" id="delete-button" class="btn btn-danger">Delete</a>
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
             </div>
         </div>
     </div>
 </div>

 <script>
     function confirmToDelete(el) {
         $("#delete-button").attr("href", el.dataset.href);
         $("#confirm-dialog").modal('show');
     }
 </script>