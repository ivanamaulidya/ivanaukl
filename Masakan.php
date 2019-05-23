<!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/icon/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="active has-sub">
                            <a href="<?=base_url()?>index.php/Masakan_C">
                                <i class="fa fa-check-square"></i>Masakan</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>index.php/User_C">
                                <i class="fa fa-shopping-cart"></i>User</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub" >
                            <a href="<?=base_url()?>index.php/Masakan_C">
                                <i class="fa fa-check-square"></i>Masakan</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>index.php/User_C">
                                <i class="fa fa-shopping-cart"></i>User</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-comment-more"></i>
                                        <span class="quantity">1</span>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-email"></i>
                                        <span class="quantity">1</span>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">3</span>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?= $this->session->userdata('nama_user')?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?= $this->session->userdata('nama_user');?></a>
                                                    </h5>
                                                    <span class="email"><?= $this->session->userdata('username');?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="<?=base_url()?>index.php/Login_C/Out">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30" >
                    <div class="container-fluid" >    
                    <div class="col-lg-12">
                                <div class="table-responsive table--no-card m-b-30">
                                
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Masakan</th>
                                                <th>harga</th>
                                                <th>status</th>
                                                <th  colspan ="2" >Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php
                                                $no = 0;
                                                foreach ($masakan as $fresh) 
                                                {
                                                    $no++;
                                                    echo 
                                                    '<tr>
                                                        <td>'.$no.'</td>
                                                        <td>'.$fresh-> nama_masakan.'</td>
                                                        <td>Rp.'.$fresh-> harga.',00</td>
                                                        <td>'.$fresh-> status_masakan.'</td>
                                                        <td>
                                                            <a href='.base_url('index.php/Masakan_C/Hapus/'.$fresh->id_masakan).' class="btn btn-danger">Hapus</a>
                                                        </td>
                                                    </tr>';
                                                }
                                           ?>
                                        </tbody>
                                    </table>
                                </div>
                                <button type="button" data-toggle="modal" data-target="#add" class="btn btn-success">
                                    <i class="material-icons">add</i>
                                </button>
                                <?php if($this->session->flashdata('pesan')!=null) : ?>
                                    <div><?= $this->session->flashdata('pesan');
                                    ?></div>
                                <?php endif?>
                            </div>
                    </div>  
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

        <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="largeModalLabel">Tambah Data Masakan</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
                            <form action="<?= base_url()?>index.php/Masakan_C/Tambah" enctype="multipart/form-data" method="post">
                                <label> Nama Masakan</label><br>
                                <input type="text" name="nama_masakan" class="form-control" required><br>
                                <label> Harga</label><br>
                                <input type="number" name="harga" class="form-control" required><br>
                                <label> Status Masakan</label><br>
                                <select name="status_masakan" class="form-control show-tick">
                                                <option>HALAL | TERSEDIA</option>
                                                <option>HARAM | TERSEDIA</option>
                                                <option>HALAL | KOSONG</option>
                                                <option>HARAM | KOSONG</option>
                                </select><br>
                                <button type="submit" name="simpan" value="simpan" class="btn btn-success">Simpan</button>    
                            </form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						</div>
					</div>
				</div>
			</div>


       