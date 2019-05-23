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
                        <li>
                            <a href="<?=base_url()?>index.php/Masakan" ><i class="notika-icon notika-house"></i> Masakan</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>index.php/User"><i class="notika-icon notika-support"></i> User</a>
                        </li>
                        <li class="active">
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
                            <h2>PELANGGAN</h2>
                        </div>
                        <div class="bsc-tbl-cls">
                            <table class="table table-cl">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pelanggan</th>
                                        <th>No Telp</th>
                                        <th>Alamat</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 0;
                                        foreach($pelanggan as $fresh)
                                        {
                                            $no++;
                                                echo'<tr>
                                                        <td>'.$no.'</td>
                                                        <td>'.$fresh -> nama.'</td>
                                                        <td>'.$fresh -> telp.'</td>
                                                        <td>'.$fresh -> alamat.'</td>
                                                        <td>'.$fresh -> username.'</td>
                                                        <td>'.$fresh -> password.'</td>
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