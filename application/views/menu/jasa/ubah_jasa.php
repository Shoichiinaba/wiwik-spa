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
                <h1 class="m-0 text-dark">Ubah Jasa</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('jasa'); ?>"></a> Menu Jasa</li>
                    <li class="breadcrumb-item active">Ubah Jasa</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="card">
        <div class="card-body">
            <form action="<?= base_url('jasa/update'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Id jasa</label>
                        <div class="col-sm-9">
                            <input type="text" name="id" value="<?= $jasa['id_jasa']; ?>" class="form-control" readonly="ID jasa" disable>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama" placeholder="Masukan Nama jasa" required value="<?= $jasa['jasa']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Biaya</label>
                        <div class="col-sm-9">
                            <input type="number" min="0" class="form-control" name="biaya" placeholder="Masukan Biaya jasa" required value="<?= $jasa['biaya']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Kategori</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="kategori" placeholder="Masukan kategori jasa" required value="<?= $jasa['kategori']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Jenis</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="jenis" placeholder="Masukan jenis jasa" required value="<?= $jasa['jenis']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Komisi</label>
                        <div class="col-sm-9">
                            <input type="number" min="0" class="form-control" name="komisi" placeholder="Masukan komisi jasa" required value="<?= $jasa['komisi']; ?>">
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