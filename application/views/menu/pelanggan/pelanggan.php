<!-- Select2 -->
<link rel="stylesheet" href="<?= base_url('assets/lte') ?>/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?= base_url('assets/lte') ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('assets/lte') ?>/dist/css/adminlte.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('assets/lte') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.css">

<section class="content-header">
    <div class="container-fluid bg-red">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Menu Pelanggan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item active">Menu pelanggan</li>
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
                <i class="fa fa-plus-circle"></i> Tambah pelanggan
            </div>
            <!-- <a href="<?= base_url('laporan/laporan_penjualan/print') ?>" class="btn btn-success">
                <i class="fa fa-download"></i> Cetak Laporan
            </a> -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="t_pelanggan" class="table table-bordered table-striped table-responsive-md">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID Pelanggan</th>
                        <th>Nama</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Kelompok</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($pelanggan->result_array() as $data) :?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data['id_pelanggan']; ?></td>
                            <td><?= $data['nama_pelanggan']; ?></td>
                            <td><?= $data['telp']; ?></td>
                            <td><?= ucwords($data['alamat']) ?></td>
                            <td><?= $data['kelompok'] == 1 ? 'UMUM' : 'PELANGGAN' ?></td>
                            <td>
                                <a href="<?= site_url('pelanggan/edit/'.$data['id_pelanggan']); ?>" class="btn btn-warning btn-xs float-left m-1"  data-tooltip="tooltip" title="Ubah Data"> <i class="fa fa-edit"></i> </a>
                                <a href="<?= site_url('pelanggan/hapus/'.$data['id_pelanggan']) ?>" class="btn btn-danger btn-xs float-left tombol-hapus m-1" data-tooltip="tooltip" title="Hapus Data"><i class="fa fa-trash"></i> </a>
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
                <h4 class="modal-title">Tambah Data Pelanggan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form action="<?= base_url('pelanggan/tambah'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Id Pelanggan</label>
                        <div class="col-sm-9">
                            <input type="text" name="id" value="<?= $kode_p; ?>" class="form-control" readonly="ID Pelanggan" disable>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama_pel" placeholder="Masukan Nama Terapis" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Telepon</label>
                        <div class="col-sm-9">
                            <input type="number" min="0" class="form-control" name="telepon_pel" placeholder="Masukan No.Telepon" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Kelompok</label>
                        <div class="col-sm-9">
                            <select class="custom-select" name="kelompok_pel" required>
                                <option value="">--Pilih kelompok--</option>
                                <option value="1">UMUM</option>
                                <option value="2">PELANGGAN</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <textarea name="alamat_pel" id="alamat" cols="30" rows="10" class="form-control" placeholder="Masukan Alamat..." required></textarea>
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
    $(document).ready(function(){
        $('#t_pelanggan').DataTable()
    })
</script>