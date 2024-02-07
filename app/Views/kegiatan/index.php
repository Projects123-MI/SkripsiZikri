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
                                         <th>Guru</th>
                                         <th>Jam Mengajar</th>
                                         <th>Hari</th>
                                         <th>Kelas</th>
                                         <th>Action</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                        $nomor = 1;
                                        foreach ($kegiatan as $row) : ?> 
                                         <tr>
                                             <td><?= $nomor++; ?></td>
                                             <td><?= $row->name ?></td>
                                             <td><?= $row->jam ?></td>
                                             <td><?= $row->hari ?></td>
                                             <td><?= $row->kelas ?></td>
                                             <td align="center">
                                                 <a href="#" data-href="<?= base_url('kegiatan/' . $row->kegiatanID . '/delete') ?>" 
                                                 onclick="confirmToDelete(this)" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                 <a href="<?= base_url('kegiatan/edit/'.$row->kegiatanID); ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>   

                                                 
                                            </td>
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
                 <h5 class="modal-title" id="exampleModalLabel">Add or Edit</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <form action="<?= base_url('kegiatan') ?>" method="post">
                 <?= csrf_field(); ?>
                 <div class="modal-body">
                     <div class="form-group">
                         <select name="id_guru" id="" class="form-control">
                             <?php foreach ($data_guru as $row) : ?>
                                 <option value="<?php echo $row->id ?>"><?= $row->name ?></option>
                             <?php endforeach; ?>
                         </select>
                     </div>
                     <div class="form-group">
                         <label for="jam">Jam Mengajar</label>
                         <input type="time" name="jam" class="form-control" id="jam" placeholder="Jam" required></input>
                     </div>
                     <div class="form-group">
                         <label for="hari">Hari</label>
                         <select name="hari" id="hari" class="form-control" required>
                             <option value="">-Pilih-</option>
                             <option value="Senin">Senin</option>
                             <option value="Selasa">Selasa</option>
                             <option value="Rabu">Rabu</option>
                             <option value="Kamis">Kamis</option>
                             <option value="Jumat">Jumat</option>
                             <option value="Sabtu">Sabtu</option>
                             <option value="Minggu">Minggu</option>
                         </select>
                     </div>
                     <div class="form-group">
                         <label for="kelas">Kelas</label>
                         <select name="kelas" id="kelas" class="form-control" required>
                             <option value="">-Pilih-</option>
                             <option value="1">1</option>
                             <option value="2">2</option>
                             <option value="3">3</option>
                             <option value="4">4</option>
                             <option value="5">5</option>
                             <option value="6">6</option>
                         </select>
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