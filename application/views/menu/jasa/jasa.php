<!-- Select2 -->
<link rel="stylesheet" href="<?= base_url('assets/lte') ?>/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?= base_url('assets/lte') ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('assets/lte') ?>/dist/css/adminlte.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('assets/lte') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.css">

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Menu Jasa</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item active">Menu jasa</li>
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
            <div class="btn btn-info" data-toggle="modal" data-target="#modal-form">
                <i class="fa fa-plus-circle"></i> Tambah jasa
            </div>
            <!-- <a href="<?= base_url('laporan/laporan_penjualan/print') ?>" class="btn btn-success">
                <i class="fa fa-download"></i> Cetak Laporan
            </a> -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="t_jasa" class="table table-bordered table-striped table-responsive-md">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID Jasa</th>
                        <th>Nama</th>
                        <th>Biaya</th>
                        <th>Kategori</th>
                        <th>Jenis</th>
                        <th>Komisi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($jasa as $data) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data['id_jasa']; ?></td>
                            <td><?= $data['jasa']; ?></td>
                            <td><?= $data['biaya']; ?></td>
                            <td><?= $data['kategori']; ?></td>
                            <td><?= $data['jenis']; ?></td>
                            <td><?= $data['komisi']; ?></td>
                           
                            <td>
                                <a href="<?= site_url('jasa/edit/' . $data['id_jasa']); ?>" class="btn btn-warning btn-xs float-left m-1" data-tooltip="tooltip" title="Ubah Data"> <i class="fa fa-edit"></i> </a>
                                <a href="<?= site_url('jasa/hapus/' . $data['id_jasa']) ?>" class="btn btn-danger btn-xs float-left tombol-hapus m-1" data-tooltip="tooltip" title="Hapus Data"><i class="fa fa-trash"></i> </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- MODAL TAMBAH -->
<div class="modal fade" id="modal-form">
    <div class="modal-dialog">
        <div class="modal-content bg-info">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data jasa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form action="<?= site_url('jasa/tambah'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Id jasa</label>
                        <div class="col-sm-9">
                            <input type="text" name="id" value="<?= $kd; ?>" class="form-control" readonly="ID jasa" disable>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Jasa" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Biaya</label>
                        <div class="col-sm-9">
                            <input type="number" min="0" class="form-control" name="biaya" placeholder="Masukan Biaya Jasa" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Kategori</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="kategori" placeholder="Masukan Kategori jasa" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Jenis</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="jenis" placeholder="Masukan jenis jasa" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Komisi</label>
                        <div class="col-sm-9">
                            <input type="number" min="0" class="form-control" name="komisi" placeholder="Masukan Komisi" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-light" name="simpan">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Select2 -->
<script src="<?= base_url('assets/lte') ?>/plugins/select2/js/select2.full.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url('assets/lte') ?>/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url('assets/lte') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<script>
    $(document).ready(function() {
        $('#t_jasa').DataTable()
    })
</script>