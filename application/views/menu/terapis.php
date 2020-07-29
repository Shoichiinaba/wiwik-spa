<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('assets/lte') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.css">

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Menu Terapis</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Terapis</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<!-- alert -->
<?php if ($this->session->has_userdata('success')) { ?>
  <div class="success" data-success="<?= $this->session->flashdata('success') ?>"></div>
<?php } elseif ($this->session->has_userdata('error')) { ?>
  <div class="error" data-error="<?= $this->session->flashdata('error') ?>"></div>
<?php } ?>

<!-- Main content -->
<section class="content">

  <div class="card">
    <div class="card-header">
      <div class="btn btn-info float-left " data-toggle="modal" data-target="#modal-info">
        <i class="fa fa-plus-circle"></i> Tambah Terapis
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead class="bg-teal">
          <tr>
            <th>NO</th>
            <th>Id Terapis</th>
            <th>Nama Terapis</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
              <?php $no= 0; foreach ($list as $g ): $no++;?>
                  <tr>
                    <td><?php echo $no; ?>
                    <td><?php echo $g->id_terapis ?></td>
                    <td><?php echo $g->nama_terapis ?></td>
                    <td><?php echo $g->alamat ?></td>
                    <td><?php echo $g->tlp ?></td>
                    <td>
                    <?php if($g->setatus=='1'){
                                  echo "<span class='badge badge-success'>Aktif</span>";
                                  //$teks="Nonaktifkan Data";
                                  $icon="switch";
                                  $class="danger";
                          }elseif($g->setatus=='2'){
                                  echo "<span class='badge badge-warning'>Tidak Aktif</span>";
                                  //$teks="Aktifkan Data";
                                  $icon="switch";
                                  $class="info";
                          }else{
                          }?>
                    </td>
                    <td>
                      
                    </td>
                  </tr>
              <?php endforeach;?>
        </tbody>
      </table>
    </div>
  </div>
</section>

<!-- Modal -->
<div class="modal fade" id="modal-info">
  <div class="modal-dialog">
    <form action="<?php echo site_url('terapis/tambah'); ?>" method="post">
      <div class="modal-content bg-info">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Data Terapis</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Id Terapis</label>
                <div class="col-sm-9">
                  <input type="text" name="id_terapis" value="<?= $nomer; ?>" class="form-control" readonly="" disable>
                </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama Terapis</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="nama_terapis" placeholder="Masukan Nama Terapis">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Alamat</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="alamat" placeholder="Masukan Alamat">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">No Phone</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="tlp" placeholder="Masukan N0 tlp">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3">Foto Terapis</label>
              <div class="col-sm-9" >
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="img">
                    <label class="custom-file-label">Pilih foto</label>
                  </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Status</label>
                <div class="col-sm-9">
                  <select class="custom-select">
                    <option value="">Pilih Status</option>
                    <option value="1">Aktif</option>
                    <option value="2">Non Aktif</option>
                  </select>
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-outline-light">Simpan</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </form>
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->






















<!-- JAVA SCRIPT -->
<!-- InputMask -->
<script src="<?= base_url('assets/lte') ?>/plugins/moment/moment.min.js"></script>
<script src="<?= base_url('assets/lte') ?>/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?= base_url('assets/lte') ?>/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url('assets/lte') ?>/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url('assets/lte') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<script type="text/javascript">
  // datatable
  $(function() {
    $("#example1").DataTable({
      "order": [
        [0, "desc"]
      ],
      "autoWidth": false,
    });
  });
  // photo
  $(document).ready(function() {
    bsCustomFileInput.init();
  });
</script>
<!-- phone number -->
<script>
  $(function() {
    //Money Euro
    $('[data-mask]').inputmask()
  })
</script>