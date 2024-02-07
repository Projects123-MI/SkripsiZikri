 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                 <?php if (!empty(session()->getFlashdata('error'))) : ?>   
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <?= session('error'); ?>
                          </div>
                     <?php endif; ?>
                     <?php if (!empty(session()->getFlashdata('success'))) : ?>   
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <?= session('success'); ?>
                         </div>
                     <?php endif; ?>
                     <h1 class="m-0">Data arsip</h1>
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
                                         <th>Judul</th>
                                         <th>Tanggal</th>
                                         <th>Lampiran</th>
                                         <th>Keterangan</th>
                                         <th>Action</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php foreach ($arsips as $key => $arsip) : ?>
                                         <tr>
                                             <td><?= ++$key ?></td>
                                             <td><?= $arsip['judul'] ?></td>
                                             <td><?= $arsip['tgl_arsip'] ?></td>
                                             <td align="center">
                                                <a href="<?= base_url('arsip/editFile/'.$arsip['id']); ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                             <a target="_blank" href="<?= base_url() . "/uploads/lampiran/" . $arsip['lampiran']?>">
                                             <?php  $file_explode = explode('.',$arsip['lampiran']); ?>
                                             <?php if($file_explode[1] == "png"): ?>
                                            <img width="100px" class="img-thumbnail" src="<?= base_url() . "/uploads/lampiran/" . $arsip['lampiran']  ?>" alt="">
                                       <?php endif; ?>

                                             <?php if($file_explode[1] == "docx"): ?>
                                                <div class="d-flex">
                                            <p> <i class="fas-fa fas fa-file-word"></i> <?= $arsip['lampiran'] ?></p>
                                            <?php elseif($file_explode[1] == "pdf"): ?>
                                                <div class="d-flex">
                                            <p> <i class="fas-fa fas fa-file-pdf"></i> <?= $arsip['lampiran'] ?></p>
                                            <?php elseif($file_explode[1] == "xlsx"): ?>
                                                <div class="d-flex">
                                            <p> <i class="fas-fa fas fa-file-excel"></i> <?= $arsip['lampiran'] ?></p>
                                            </div>
                                       <?php endif; ?>
                                             
                                            </a>
                                            </td>

                                             <td><?= $arsip['ket'] ?></td>
                                             <td align="center">
                                                 <a href="#" data-href="<?= base_url('arsip/' . $arsip['id'] . '/delete') ?>" onclick="confirmToDelete(this)" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                 <a href="<?= base_url('arsip/edit/'.$arsip['id']); ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
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
             <form action="<?= base_url('arsip') ?>" method="post" enctype="multipart/form-data">
                 <?= csrf_field(); ?>
                 <div class="modal-body">
                     <div class="form-group">
                         <label for="judul">Judul</label>
                         <input type="text" name="judul" class="form-control" id="judul" placeholder=" judul" required></input>
                     </div>
                     <div class="form-group">
                         <label for="tgl_arsip">Tanggal</label>
                         <input type="date" name="tgl_arsip" class="form-control" id="tgl_arsip" placeholder="Visi Misi" required></input>
                     </div>
                     <div class="form-group">
                         <label for="lampiran">Lampiran</label>
                         <input type="file" name="lampiran" class="form-control" id="lampiran" placeholder=" lampiran"></input>
                     </div>
                     <div class="form-group">
                         <label for="ket">Keterangan</label>
                         <input type="text" name="ket" class="form-control" id="ket" placeholder=" Keterangan" required></input>
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