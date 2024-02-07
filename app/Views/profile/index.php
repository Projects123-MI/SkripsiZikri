 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1 class="m-0">Sejarah & Visi Misi</h1>
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
                                         <th>Sejarah</th>
                                         <th>Visi Misi</th>
                                         <th>Action</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php foreach ($profiles as $key => $profile) : ?>
                                         <tr>
                                             <td><?= ++$key ?></td>
                                             <td><?= $profile['sejarah'] ?></td>
                                             <td><?= $profile['visimisi'] ?></td>
                                             <td align="center">
                                                 <a href="#" data-href="<?= base_url('profile/' . $profile['id'] . '/delete') ?>" onclick="confirmToDelete(this)" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
                 <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <form action="<?= base_url('profile') ?>" method="post">
                 <?= csrf_field(); ?>
                 <div class="modal-body">
                     <div class="form-group">
                         <label for="sejarah">Sejarah</label>
                         <textarea type="text" name="sejarah" class="form-control" id="sejarah" placeholder=" sejarah" required></textarea>
                     </div>
                     <div class="form-group">
                         <label for="visimisi">Visi Misi</label>
                         <textarea type="text" name="visimisi" class="form-control" id="visimisi" placeholder="Visi Misi" required></textarea>
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