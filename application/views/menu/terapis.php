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
      <div class="btn btn-info float-left " data-toggle="modal" data-target="#modal-form">
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