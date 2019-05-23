<!-- Mobile Menu start -->
<div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">
                                <li>
                                    <a data-toggle="collapse" data-target="#Charts" href="#">Masakan</a>
                                </li>
                                <li>
                                    <a data-toggle="collapse" data-target="#demoevent" href="#">User</a>
                                </li>
                                <li>
                                    <a data-toggle="collapse" data-target="#demoevent" href="#">Pelanggan</a>
                                </li>
                                <li>
                                    <a data-toggle="collapse" data-target="#demoevent" href="#">Kasir</a>
                                </li>
                                <li>
                                    <a data-toggle="collapse" data-target="#demoevent" href="<?=base_url()?>index.php/Login/Out"><?=  $this->session->userdata('nama_Pegawai')?></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu end -->
    <!-- Main Menu area start-->
    <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li class="active">
                            <a href="<?=base_url()?>index.php/Masakan" ><i class="notika-icon notika-house"></i> Masakan</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>index.php/User"><i class="notika-icon notika-support"></i> User</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>index.php/A_Pelanggan"><i class="notika-icon notika-finance"></i> Pelanggan</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>index.php/Kasir"><i class="notika-icon notika-bar-chart"></i> Kasir</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>index.php/Login/Out"><i class="notika-icon notika-flag"></i> <?= $this->session->userdata('nama_Pegawai')?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Menu area End-->
    <!-- Start Status area -->
    <div class="notika-status-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="normal-table-list mg-t-30">
                        <div class="basic-tb-hd">
                            <h2>MASAKAN</h2>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#ADD">Tambah Masakan
                            </button>
                        </div>
                        <div class="bsc-tbl-cls">
                            <table class="table table-cl">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Masakan</th>
                                        <th>Harga</th>
                                        <th>Deskripsi</th>
                                        <th>Status Masakan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 0;
                                        foreach($masakan as $fresh)
                                        {
                                            $no++;
                                                echo'<tr>
                                                        <td>'.$no.'</td>
                                                        <td>'.$fresh -> nama_masakan.'</td>
                                                        <td>Rp.'.$fresh -> harga.',00 </td>
                                                        <td>'.$fresh -> detail.'</td>
                                                        <td>'.$fresh -> status_masakan.'</td>
                                                        <td>
                                                            <a href='.base_url('index.php/Masakan/Hapus/'.$fresh -> id_masakan).' class="btn btn-danger">HAPUS</a>
                                                            <a href="#update" class="btn btn-success" data-toggle="modal" data-target="#update" onclick="detail('.$fresh->id_masakan.')">UPDATE</a>
                                                        </td>
                                                    <tr>';
                                                }
                                            ?>
                                </tbody>
                            </table>
                            <?php if($this->session->flashdata('pesan')!=null) : ?>
                                    <div class="btn btn-info"><?= $this->session->flashdata('pesan');
                                    ?></div>
                            <?php endif?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Status area-->
    
    <!-- End Realtime sts area-->
    <!-- Start Footer area-->

    <div class="modal fade" id="ADD" role="dialog">
        <div class="modal-dialog modal-large">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2>Tambah Masakan</h2>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url()?>index.php/Masakan/Tambah" method="post">
                        <label>Nama Masakan</label><br>
                        <input type="text" name="nama_masakan" class="form-control" placeholder="Nama Masakan" required><br>
                        <label>Harga</label><br>
                        <input type="number" name="harga" class="form-control" placeholder="Nama Masakan" required><br>
                        <label>Deskripsi</label><br>
                        <input type="text" name="detail" class="form-control" placeholder="Nama Masakan" required><br>
                        <label> Status Masakan</label><br>
                        <select name="status_masakan" class="form-control show-tick">
                                <option>HALAL dan TERSEDIA</option>
                                <option>HARAM dan TERSEDIA</option>
                                <option>HALAL dan KOSONG</option>
                                <option>HARAM dan KOSONG</option>
                        </select><br>
                        <button type="submit" name="simpan" value="simpan" class="btn btn-success">Simpan</button> 
                    </form>
                </div>
            </div>
        </div>
    </div>

     <div class="modal fade" id="update" role="dialog">
        <div class="modal-dialog modal-large">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2>Ubah Masakan</h2>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url()?>index.php/Masakan/Update" method="post">
                        <label>Nama Masakan</label><br>
                        <input id="id_masakan" type="hidden" name="id_masakan">
                        <input id="nama_masakan" type="text" name="nama_masakan" class="form-control" placeholder="Nama Masakan" required><br>
                        <label>Harga</label><br>
                        <input id="harga" type="number" name="harga" class="form-control" placeholder="Nama Masakan" required><br>
                        <label>Deskripsi</label><br>
                        <input type="text" id="detail" name="detail" class="form-control" placeholder="Nama Masakan" required><br>
                        <label> Status Masakan</label><br>
                        <select  id="status_masakan"  name="status_masakan" class="form-control show-tick">
                                <option>HALAL dan TERSEDIA</option>
                                <option>HARAM dan TERSEDIA</option>
                                <option>HALAL dan KOSONG</option>
                                <option>HARAM dan KOSONG</option>
                        </select><br>
                        <button type="submit" name="simpan" value="simpan" class="btn btn-success">Simpan</button> 
                    </form>
                </div>
            </div>
        </div>
    </div>

<script>
    function detail(data){
        $.getJSON("<?=base_url()?>index.php/Masakan/Detail/"+data,
        function(tampil)
        {
            $("#id_masakan").val(tampil['id_masakan']);
            $("#nama_masakan").val(tampil['nama_masakan']);
            $("#harga").val(tampil['harga']);
            $("#detail").val(tampil['detail']);
            $("#status_masakan").val(tampil['status_masakan']);
        });
    }
</script>