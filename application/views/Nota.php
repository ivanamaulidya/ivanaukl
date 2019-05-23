<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Nota</title>

    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>assets/img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/owl.carousel.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/owl.theme.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/owl.transitions.css">
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/meanmenu/meanmenu.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/normalize.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- jvectormap CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/jvectormap/jquery-jvectormap-2.0.3.css">
    <!-- notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/notika-custom-icon.css">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/wave/waves.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/main.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url()?>assets/css/style.css">
    
</head>
<body>
    <div class="notika-status-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="normal-table-list mg-t-30">
                        <div class="basic-tb-hd">
                            <h2>NOTA </h2>
                        </div>
                        <div class="bsc-tbl-cls">
                            <table class="table table-cl">
                                <thead>
                                    <tr class="warning">
                                        <th>No</th>
                                        <th>Nama Masakan</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 0;
                                        foreach($order as $fresh)
                                        {
                                            $no++;
                                                echo'<tr class="warning">
                                                        <td>'.$no.'</td>
                                                        <td>'.$fresh -> nama_masakan.'</td>
                                                        <td>'.$fresh -> jumlah.'</td>
                                                        <td>Rp.'.$fresh -> harga.',00 </td>
                                                        <td>Rp.'.$fresh -> harga * $fresh -> jumlah.',00</td>
                                                    </tr>';
                                        }

                                        		echo'
                                        			<tr class="success">
                                        				<td colspan="4">Total Pembayaran</td>
                                                        <td>Rp.'.$fresh -> total_bayar.',00</td>
                                                    </tr>
                                                    <tr class="success">
                                        				<td colspan="4">Pembayaran</td>
                                                        <td>'.$fresh -> status_order.'</td>
                                                    </tr>
                                        			<tr class="success">
                                        				<td colspan="4">Nomor Meja</td>
                                                        <td>'.$fresh -> no_meja.'</td>
                                                    </tr>
                                        			<tr class="success">
                                        				<td colspan="4">Nomor nota</td>
                                                        <td>'.$fresh -> id_order.'</td>
                                                    </tr>
                                                    <tr class="success">
                                        				<td colspan="4">Nama Pelanggan</td>
                                                        <td>'.$fresh -> nama.'</td>
                                                    </tr>
                                                    <tr class="success">
                                        				<td colspan="4">Nama Kasir</td>
                                                        <td>'.$this->session->userdata('nama_Pegawai').'</td>
                                                    </tr>';
                                    ?>
                                </tbody>
                            </table><br>
                            <button class="btn btn-success" onclick="window.print()"><i class="notika-icon notika-house"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>