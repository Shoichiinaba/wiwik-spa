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
                <!-- <div class="form-group row">
                    <select id="pelanggan" class="form-control">
                        <option value=""> Pelanggan</option>
                        <?php foreach(pelanggan as $pel -> $value)
                            {
                                echo 'option value="'.$value->id_pelanggan.'">'.$value->nama_pelanggan.'</option>';
                            } 
                        ?>
                    </select>    
                </div> -->
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
                            <input type="text" name="id_terapis" class="form-control">
                        </div>
                </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Treatment</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_terapis">
                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Tambahan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="alamat" placeholder="Masukan Alamat">
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
            <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>

            <div class="info-box-content">
            
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- Select2 -->
<script src="<?= base_url('assets/lte') ?>/plugins/select2/js/select2.full.min.js"></script>