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
                         <!-- form start -->
                         <div class="card-body">
                             <form action="<?= base_url('profile/' . $data['id'] . '/edit') ?>"  method="post">
                              <?= csrf_field(); ?>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="sejarah">Sejarah</label>
                                        <textarea type="text" name="sejarah" class="form-control" id="sejarah" placeholder="sejarah" required><?= $data['sejarah']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="visimisi">Visi Misi</label>
                                        <textarea type="text" name="visimisi" class="form-control" id="visimisi" placeholder="Visi Misi" required><?= $data['visimisi']; ?></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="<?= base_url('profile') ?>" class="btn btn-secondary" data-dismiss="modal">Back</a>
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