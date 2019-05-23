<!-- Mobile Menu start -->
<div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">
                                <li class="active">
                                    <a data-toggle="collapse" data-target="#Charts" href="#">Kasir</a>
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
            <div  class="col-lg-12" >
                <div class="row" id="tampil">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="normal-table-list mg-t-30">
                            <div class="basic-tb-hd">
                                <h2>PESANAN PELANGGAN</h2>
                                    <div class="row">
                                        <form action="<?=base_url()?>index.php/Kasir/Cari" method="post">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <div class="form-example-int form-example-st">
                                                    <div class="form-group">
                                                        <div class="nk-int-st">
                                                            <input type="date" name="tanggal" class="form-control" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
                                                <div class="form-example-int">
                                                     <button class="btn btn-success notika-btn-success">Search</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bsc-tbl-cls">
                            <table class="table table-cl">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Tanggal</th>
                                        <th>Status Pembayaran</th>
                                        <th>Status Masakan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 0;
                                        foreach($order as $fresh)
                                        {
                                            $no++;
                                                echo'<tr>
                                                        <td>'.$no.'</td>
                                                        <td>'.$fresh -> nama.'</td>
                                                        <td>'.$fresh -> tanggal.'</td>
                                                        <td>'.$fresh -> status_order.'</td>
                                                        <td>Rp.'.$fresh -> total_bayar.',00</td>
                                                        <td>
                                                            <a href="#update" class="btn btn-success" data-toggle="modal" data-target="#update" onclick="detail('.$fresh->id_order.')">UPDATE</a>
                                                            <a href='.base_url('index.php/Kasir/Cetak/'.$fresh->id_order).' class="btn btn-info">CETAK</a>
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

    </div>

    <div class="modal fade" id="update" role="dialog">
        <div class="modal-dialog modal-large">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2>Verifikasi Pembayaran</h2>
                </div>
                <div class="modal-body">
                    <form action="<?=base_url()?>index.php/Kasir/Update" enctype="multipart/form-data" method="post">
                        <label> Status Order</label><br>
                        <select id="status_order" name="status_order" class="form-control show-tick">
                            <option>Pending</option>
                            <option>LUNAS</option>
                        </select><br>
                        <input id="id_order" type="hidden" name="id_order" class="form-control" required>
                        <button type="submit" name="simpan" value="simpan" class="btn btn-success">Simpan</button>    
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function detail(data){
        $.getJSON("<?=base_url()?>index.php/Kasir/Detail/"+data,
        function(tampil)
        {
            $("#id_order").val(tampil['id_order']);
            $("#status_order").val(tampil['status_order']);
        });
    }
    </script>