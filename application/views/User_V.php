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
                        <li  class="active">
                            <a href="<?=base_url()?>index.php/User"><i class="notika-icon notika-support"></i> User</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>index.php/A_Pelanggan"><i class="notika-icon notika-finance"></i> Pelanggan</a>
                        </li>
                        <li  >
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
                            <h2>PEGAWAI</h2>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#ADD">Tambah Pegawai
                            </button>
                        </div>
                        <div class="bsc-tbl-cls">
                            <table class="table table-cl">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pegawai</th>
                                        <th>Jabatan</th>
                                        <th>username</th>
                                        <th>password</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 0;
                                        foreach($pegawai as $fresh)
                                        {
                                            $no++;
                                                echo'<tr>
                                                        <td>'.$no.'</td>
                                                        <td>'.$fresh -> nama_pegawai.'</td>
                                                        <td>'.$fresh -> nama_level.' </td>
                                                        <td>'.$fresh -> username.'</td>
                                                        <td>'.$fresh -> password.'</td>
                                                        <td>
                                                            <a href='.base_url('index.php/User/Hapus/'.$fresh -> id_pegawai).' class="btn btn-danger">HAPUS</a>
                                                            <a href="#update" class="btn btn-success" data-toggle="modal" data-target="#update" onclick="detail('.$fresh->id_pegawai.')">UPDATE</a>
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
                    <h2>Tambah Pegawai</h2>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url()?>index.php/User/Tambah" method="post">
                        <label>Nama Pegawai</label><br>
                        <input type="text" name="nama_pegawai" class="form-control" placeholder="Nama Pegawai" required><br>
                        <label>Username</label><br>
                        <input type="text" name="username" class="form-control" placeholder="Username" required><br>
                        <label>Password</label><br>
                        <input type="password" name="password" class="form-control" placeholder="Username" required><br>
                        <label> Jabatan Pegawai</label><br>
                        <select name="id_level" class="form-control show-tick">
                                <?php
                                    foreach ($level as $jabatan) 
                                    {
                                       echo"<option value='.$jabatan->id_level.'>".$jabatan->nama_level."</option>";
                                    }
                                ?>
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
                    <h2>Ubah Data Pegawai</h2>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url()?>index.php/User/Update" method="post">
                        <label>Nama Pegawai</label><br>
                        <input type="hidden" id="id_pegawai" name="id_pegawai">
                        <input type="text" id="nama_pegawai" name="nama_pegawai" class="form-control" placeholder="Nama Pegawai" required><br>
                        <label>Username</label><br>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Username" required><br>
                        <label>Password</label><br>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Username" required><br>
                        <label> Jabatan</label><br>
                        <select  id="id_level"  name="id_level" class="form-control show-tick">
                                <?php
                                    foreach ($level as $jabatan) 
                                    {
                                       echo'<option value='.$jabatan->id_level.'>'.$jabatan->nama_level.'</option>';
                                    }
                                ?>
                        </select><br>
                        <button type="submit" name="simpan" value="simpan" class="btn btn-success">Simpan</button> 
                    </form>
                </div>
            </div>
        </div>
    </div>

<script>
    function detail(data){
        $.getJSON("<?=base_url()?>index.php/User/Detail/"+data,
        function(tampil)
        {
            $("#id_pegawai").val(tampil['id_pegawai']);
            $("#nama_pegawai").val(tampil['nama_pegawai']);
            $("#username").val(tampil['username']);
            $("#password").val(tampil['password']);
            $("#id_level").val(tampil['id_level']);
        });
    }
</script>