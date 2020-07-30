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
                <h1 class="m-0 text-dark">Ubah Data Terapis</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('barang'); ?>"></a> Menu Terapis</li>
                    <li class="breadcrumb-item active">Ubah Data Terapis</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="card">
        <div class="card-body">
            <form action="<?= base_url('terapis/update'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Id Terapis</label>
                        <div class="col-sm-9">
                            <input type="text" name="id_terapis" value="<?= $terapis['id_terapis']; ?>" class="form-control" readonly="ID barang" disable>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Terapis</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama_terapis" placeholder="Masukan Nama barang" required value="<?= $terapis['nama_terapis']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <textarea name="alamat" id="alamat" cols="20" rows="8" class="form-control" placeholder="Masukan Alamat..." required><?= $terapis['alamat']; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">No Telephone</label>
                        <div class="col-sm-9">
                            <input type="number" min="0"class="form-control" name="tlp" placeholder="Masukan kategori barang" required value="<?= $terapis['tlp']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <select class="custom-select" name="setatus">
                                    <option value="1" <?= $terapis['setatus'] == 1 ? 'selected' : ''; ?>>Aktif</option>
                                    <option value="2" <?= $terapis['setatus'] == 2 ? 'selected' : ''; ?>>Non Aktif</option>
                                </select>
                            </div>
                    </div>
                   
                </div>
                <div class="modal-footer justify-content-between">
                    <a href="<?= site_url('terapis'); ?>" class="btn btn-secondary">Close</a>
                    <button type="submit" class="btn btn-warning" name="ubah">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</section>