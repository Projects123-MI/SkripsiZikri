 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-2">
                     <h1 class="m-0">Data Pengguna</h1>
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
                                         <th>Nama Lengkap</th>
                                         <th>Username</th>
                                         <th>Level</th>
                                         <th>Action</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                        $nomor = 1;
                                        foreach ($users as $user) : ?>
                                         <tr>
                                             <td><?= $nomor++; ?></td>
                                             <td><?= $user->name ?></td>
                                             <td><?= $user->username ?></td>
                                             <td><?= $user->level ?></td>
                                             <td align="center">
                                                 <a href="#" data-href="<?= base_url('user/' . $user->username . '/delete') ?>" onclick="confirmToDelete(this)" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
             <form action="<?= base_url('user') ?>" method="post">
                 <?= csrf_field(); ?>
                 <div class="modal-body">
                     <div class="form-group">
                         <label for="username">Username</label>
                         <input type="text" name="username" class="form-control" id="username" placeholder=" username" required></input>
                     </div>
                     <div class="form-group">
                         <label for="name">Nama lengkap</label>
                         <input type="text" name="name" class="form-control" id="name" placeholder="Nama lengkap" required></input>
                     </div>
                     <div class="form-group">
                         <label for="level">Level</label>
                         <select name="level" id="level" class="form-control">
                             <option value="Admin">Admin</option>
                             <option value="Guru">Guru</option>
                         </select>
                     </div>
                     <div class="form-group">
                         <label for="password">Password</label>
                         <input type="password" name="password" class="form-control" id="password" placeholder="password" required></input>
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