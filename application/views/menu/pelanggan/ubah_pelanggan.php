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
                <h1 class="m-0 text-dark">Ubah Pelanggan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>"></a> Menu pelanggan</li>
                    <li class="breadcrumb-item active">Ubah pelanggan</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="card">
        <div class="card-body">
            <form action="<?= base_url('pelanggan/update'); ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?= $pelanggan['id_pelanggan']; ?>">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Id Pelanggan</label>
                        <div class="col-sm-9">
                            <input type="text" name="id" value="<?= $pelanggan['id_pelanggan']; ?>" class="form-control" readonly="ID Pelanggan" disable>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama_pel" placeholder="Masukan Nama Pelanggan" required value="<?= $pelanggan['nama_pelanggan']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Telepon</label>
                        <div class="col-sm-9">
                            <input type="number" min="0" class="form-control" name="telepon_pel" placeholder="Masukan No.Telepon" required value="<?= $pelanggan['telp']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Kelompok</label>
                        <div class="col-sm-9">
                            <select class="custom-select" name="kelompok_pel" required>
                                <option value="">--Pilih kelompok--</option>
                                <option value="1" <?= $pelanggan['kelompok'] == 1 ? 'selected' : '' ; ?>>UMUM</option>
                                <option value="2" <?= $pelanggan['kelompok'] == 2 ? 'selected' : '' ; ?>>PELANGGAN</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <textarea name="alamat_pel" id="alamat" cols="30" rows="10" class="form-control" placeholder="Masukan Alamat..." required><?= $pelanggan['alamat']; ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning" name="ubah">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</section>