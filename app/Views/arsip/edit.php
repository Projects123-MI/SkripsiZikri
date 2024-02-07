 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1 class="m-0">Data arsip</h1>
                     <?php if (!empty(session()->getFlashdata('success'))) : ?>   
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
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
                         <div class="card-body">
                         <form action="<?= base_url('arsip/' . $data['id'] . '/edit') ?>" method="post" enctype="multipart/form-data">
                 <?= csrf_field(); ?>
                 <input type="text" hidden name="fileLama" value="<?= $data['lampiran']; ?>">
                 <div class="modal-body">
                     <div class="form-group">
                         <label for="judul">Judul</label>
                         <input type="text" name="judul" class="form-control" id="judul" placeholder=" judul" value="<?= $data['judul']; ?>" required></input>
                     </div>
                     <div class="form-group">
                         <label for="tgl_arsip">Tanggal</label>
                         <input type="date" name="tgl_arsip" class="form-control" id="tgl_arsip" value="<?= $data['tgl_arsip']; ?>" placeholder="Visi Misi" required></input>
                     </div>
                    <!-- <div class="form-group">
                         <label for="lampiran">Lampiran</label>
                         <input type="file" name="lampiran" class="form-control" id="lampiran" value="<?= $data['lampiran']; ?>" placeholder=" lampiran"></input> 
                     </div> -->
                     <div class="form-group">
                         <label for="ket">Keterangan</label>
                         <input type="text" name="ket" class="form-control" id="ket" value="<?= $data['ket']; ?>" placeholder=" Keterangan" required></input>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <a href="<?= base_url('arsip') ?>" class="btn btn-secondary" data-dismiss="modal">Back</a>
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