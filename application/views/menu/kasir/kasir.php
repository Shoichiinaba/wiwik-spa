<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Kasir Transaksi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item active">Kasir</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
<div class="row">
    <div class="col-md-4 col-sm-6 col-12">
        <div class="info-box bg-gradient-info">
            <div class="info-box-content">
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Tanggal</label>
                        <div class="col-sm-8">
                            <input type="date" id="date" value="<?=date('Y-m-d')?>" name="tgl_trx" class="form-control"  readonly="" >
                        </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Kasir</label>
                        <div class="col-sm-8">
                            <input type="text" id="user" value="<?=$this->fungsi->user_login()->nama_karyawan?>" class="form-control" name="nama_kasir" >
                        </div>
                </div>
                <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Pelanggan</label>
                        <div class="col-sm-8">
                            <select class="custom-select" name="pelanggn" required>
                                <option value="">--Pilih Pelanggan--</option>
                                <?php foreach($pelanggan as $pel => $value)
                                    {
                                        echo '<option value="'.$value->id_pelanggan.'">'.$value->nama_pelanggan.'</option>';
                                    } 
                                ?>
                            </select>
                        </div>
                </div>
            </div>
        </div>
    </div>
   
    <!-- /.col -->
    <div class="col-md-4 col-sm-6 col-12">
        <div class="info-box bg-gradient-success">
            <div class="info-box-content">
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Terapis</label>
                        <div class="col-sm-8">
                            <select class="custom-select" name="terapis" required>
                                <option value="">--Pilih Terapis--</option>
                                <?php foreach($terapis as $ter => $value)
                                    {
                                        echo '<option value="'.$value->id_terapis.'">'.$value->nama_terapis.'</option>';
                                    } 
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Jasa</label>
                            <div class="col-sm-8">
                                <select class="custom-select" name="id_jasa"  required>
                                    <option value="">-- Select --</option>
                                    <?php foreach ($jasa as $data) { ?>
                                        <option value="<?= $data->id_jasa . '/' . $data->biaya . '/' . $data->kategori ?>" <?= $data->komisi ? : '' ?>><?= strtoupper($data->jasa) . ' - ' . number_format($data->biaya).' - ' . number_format($data->komisi) ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Tambahan</label>
                            <div class="col-sm-8">
                                <span class="input-group-append">
                                    <input type="text" class="form-control is-invalid" name="id_barang" placeholder="Barang Tambahan">
                                    <button type="button" class="btn btn-danger"><i class="fas fa-align-right" data-toggle="modal" data-target="#modal-select"></i></button>
                                    <div class="col-sm-4" class="float-right">
                                        <input type="number" min="0" name="id_barang" id="item" class="form-control" required >
                                    </div>
                                </span>
                            </div>
                    </div>
                </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-4 col-sm-6 col-12">
        <div class="info-box bg-gradient-warning">
            <span class="info-box-icon"><i class="far  fa-credit-card"></i></span>
            <div class="info-box-content">
            <h5><span class="info-box-number" id="no_struk" style="font-size:18pt" ><b>Nomer Struk :  <?= $no_struk?> </b> </span></h5>
             <h3><b><span id="total" style="font-size:50pt">0<span></h3>
            <span class="progress-description">     
                <td>
                    <button type="button" class="btn btn-block btn-outline-secondary btn-sm">Proses</button>
                </td>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
<!-- Tabel transaksi -->
<div class="row">
    <div class="col-lg-12">
        <div class="box box-widget">
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No Struk</th>
                            <th>Jasa</th>
                            <th>produk Tambahan</th>
                            <th>Harga</th>
                            <th>Komisi</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody >
                        <tr>
                            <td colspan="9" class="text-center">Tidak ada Transaksi </td>
                        </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Menu transaksi -->
<div class="row">
    <div class="col-md-4">
        <div class="card bg-gradient-primary">
            <div class="card-header">
                <h3 class="card-title">Total Bayar</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                <!-- /.card-tools -->
            </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Pembayaran</label>
                            <div class="col-sm-8">
                                <input type="number" id="" class="form-control" name="harga" disabled >
                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Komisi</label>
                            <div class="col-sm-8">
                                <input type="number" id="" class="form-control" name="komisi" >
                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Total Bayar</label>
                            <div class="col-sm-8">
                                <input type="number" id="" class="form-control" name="total_harga" disabled >
                            </div>
                    </div>
                </div>
                <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->

    <div class="col-md-4">
        <div class="card bg-gradient-success">
            <div class="card-header">
                <h3 class="card-title">Bayar</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
                <div class="card-body">
                <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Cash</label>
                            <div class="col-sm-8">
                                <input type="number" id="" class="form-control" name="harga" disabled >
                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Kembalian</label>
                            <div class="col-sm-8">
                                <input type="number" id="" class="form-control" name="komisi" >
                            </div>
                    </div>
                </div>
                <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->

    <div class="col-md-2">
        <div class="card bg-gradient-success">
            <div class="card-header">
                <h3 class="card-title">Menu Proses</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
                <div class="card-body">
                    <td>
                    <button type="button" class="btn btn-block btn-outline-warning btn-sm">Batal</button>
                    </td>
                    <td>
                      <button type="button" class="btn btn-block btn-outline-primary btn-sm">Proses Bayar</button>
                    </td>
                </div>
                <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</section>

<!-- Modal select -->
<div class="modal fade" id="modal-select">
    <div class="modal-dialog">
        <div class="modal-content bg-warning">
        <div class="modal-header">
            <h4 class="modal-title">Pilih Tambahan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body table-responsive">
            <table class="table table-bordered table-strip" id="table1">
                <thead>
                    <tr>
                        <td>id_barang</td>
                        <td>nama_barang</td>
                        <td>harga</td>
                        <td>stock</td>
                        <td>aksi</td>
                    </tr>
                </thead>
                    <tbody>
                    <?php $no= 0; foreach ($item as $g ): $no++;?>
                                <tr>
                                    <td><?php echo $g->id_barang; ?></td>
                                    <td><?php echo $g->item; ?></td>
                                    <td><?php echo indo_currency($g->harga);?></td>
                                    <td><?php echo $g->stock; ?></td>
                                    <td>
                                        <button class="btn btn-xs bg-purple" id="select"
                                        data-id="<?=$g->id_barang?>"
                                        data-item="<?=$g->item?>">
                                            <i class="fa fa-check"></i> Pilih
                                        </button>
                                    </td>
                                </tr>

                    <?php endforeach;?> 
                    </tbody>
            </table>
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>
$(document).ready(function() {
    $document.on('click', '#select', function() {
        var id_barang = $(this).data('id');
        var item = $(this).data('item');
        $('#id_barang').val(id_barang);
        $('#item').val(item);
        $('#modal-select').modal('hide');
    })
    
})
</script>