<!-- Mobile Menu start -->
<div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">
                                <li>
                                    <a data-toggle="collapse" data-target="#Charts" href="#">Menu</a>
                                </li>
                                <li>
                                    <a data-toggle="collapse" data-target="#demoevent" href="#">Keranjang</a>
                                </li>
                                <li>
                                    <a data-toggle="collapse" data-target="#demoevent" href="<?=base_url()?>index.php/Login/Out"><?=  $this->session->userdata('nama')?></a>
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
                        <li >
                            <a href="<?=base_url()?>index.php/Pelanggan" ><i class="notika-icon notika-promos"></i> Menu</a>
                        </li>
                        <li class="active">
                            <a href="<?=base_url()?>index.php/Keranjang"><i class="notika-icon notika-form"></i> keranjang</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>index.php/Login/Out"><i class="notika-icon notika-flag"></i> <?= $this->session->userdata('nama')?></a>
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
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="normal-table-list mg-t-30">
                        <div class="basic-tb-hd">
                            <h2>PESANAN</h2>
                            <div class="ol-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <a href="<?=base_url()?>index.php/Pelanggan" class="btn btn-info">Pesan Lagi</a>
                                <a href="#mbayar" data-toggle="modal" data-target="#mbayar" onclick="bayar()" class="btn btn-warning">Bayar</a>
                            </div><br>
                        </div>
                        <div class="bsc-tbl-cls">
                            <table class="table table-cl">
                                <thead>
                                    <tr class="info">
                                        <th>No</th>
                                        <th>Nama Masakan</th>
                                        <th>Meja</th>
                                        <th>Jumlah</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody id="cart">
                                    
                                </tbody>
                            </table><br>
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

<script type="text/javascript">
   function loadCart() {
    $("#Pesanan").html('');
    $.getJSON("<?=base_url()?>index.php/Keranjang/Pesanan",function(data){
        var no=0;
        $.each(data['data_cart'],function(key,dt){
            no++;
            $("#cart").append(
                '<tr class="info">'+
                    '<td>'+no+'</td>'+
                    '<td>'+dt['name']+'</td>'+
                    '<td>'+dt['meja']+'</td>'+
                    '<td>'+dt['qty']+'</td>'+
                    '<td align="center">Rp.'+dt['subtotal']+',00</td>'+
                '</tr>'
            );
        });
        $("#cart").append(
             '<tr class="success">'+
                '<td colspan="4">Total Keseluruhan</td><td align="center">Rp.'+data['total_seluruh']+',00</td>'+
            '</tr>'
         );
    });
}

function bayar(){
        $.getJSON("<?= base_url()?>index.php/Keranjang/DataMasuk",function(data){
            if (data['status']==1) {
                $("#pesan").html('Pesanan sudah terkirim, Silahkan Mbayar');
                $("#pesan").show('animate');
                $("#pesan").addClass("alert alert-success");
                setTimeout(function(){
                    $("#pesan").hide('animate');
                    $("#pesan").removeClass("alert alert-success");
                    setTimeout(function(){
                        $("#totalnya").html(data['total']);
                        $("#bayar").modal("show");
                        $("#id_order").val(data['id_order']);
                        load_total_cart();
                        loadCart();
                    }, 500);
                }, 3000);
            }
            else
            {
                $("#pesan").html('Pesanan gagal terkirim, tunggu konfirmasi dari kasir');
            }
        });
    }
loadCart();     
</script>

<div class="modal fade" id="mbayar" role="dialog">
        <div class="modal-dialog modal-large">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h1>Pembayaran</h1>
                </div>
                <div class="modal-body">
                    <h4>Terima Kasih Telah Memesan Menu Kami</h4>
                    <p>Segera bayar di Kasir sejumlah Rp.<span id="totalnya">0</span>,00 dan Jangan Lupa Ambil Nota, jika kasir tidak memberi nota maka gratis 100%</p>
                </div>
                <div id="pesan"></div>
            </div>
        </div>
    </div>