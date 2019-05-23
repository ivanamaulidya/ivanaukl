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
                        <li class="active">
                            <a href="<?=base_url()?>index.php/Pelanggan" ><i class="notika-icon notika-promos"></i> Menu</a>
                        </li>
                        <li>
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
                <div class="row" id="tampil">

                    

                </div>
            </div>
        </div>

    </div>
    <!-- End Status area-->

<script type="text/javascript">

//card view
    $.getJSON("<?=base_url()?>index.php/Pelanggan/Delok", function(hasil)
    {
        var hasilnya="";
        $.each(hasil, function(key,data)
        {
            hasilnya+=
                       '<div class="col-lg-4 mg-tb-30">'+
                        '<div class="contact-list">'+
                            '<div class="contact-ctn">'+
                                '<div class="contact-ad-hd">'+
                                    '<h2>'+data['nama_masakan']+'</h2>'+
                                '</div>'+
                                '<p>'+data['detail']+'</p>'+
                            '</div>'+
                            '<div class="social-st-list">'+
                                '<div class="social-sn">'+
                                    '<h2>Status makanan</h2>'+
                                    '<p>'+data['status_masakan']+'</p>'+
                                '</div>'+
                                '<div class="social-sn">'+
                                    '<h2>Harga</h2>'+
                                    '<p>Rp.'+data['harga']+',00</p>'+
                                '</div>'+
                            '</div><br>'+
                            '<a href="#mau" data-toggle="modal" onclick="detail('+data['id_masakan']+')" class="btn btn-success">Beli</a>'+
                        '</div>'+
                    '</div>'
        });
        $("#tampil").html(hasilnya);
    });


//card view pas di klik
    function detail(id_masakan) 
        {
            $.getJSON("<?=base_url()?>index.php/Pelanggan/Detail/"+id_masakan,function(detail)
            {
                
                $("#deskripsi").html(
                    '<table class="table table-hover table-striped">'+
                        '<tr><td>Nama Makanan</td><td>'+detail['nama_masakan']+'</td></tr>'+
                        '<tr><td>Harga Makanan</td><td>Rp.'+detail['harga']+',00</td></tr>'+
                        '<tr><td>Status Makanan</td><td>'+detail['status_masakan']+'</td></tr>'+
                    '</table>'
                );
                $("#jumlah").html(
                    '<label>Jumlah Makanan</label><br>'+
                    '<input type="number" id="jumlah_item" value="1" class="form-control">'
                );
                $('#meja').html(
                    '<label>Nomor Meja</label><br>'+
                    '<input type="number" id="no_meja" value="1" class="form-control">'
                );
                $("#btn").html(
                    '<button id="beli" onclick="Tumbas('+detail['id_masakan']+')" class="col-lg-6 btn btn-success">Beli</button>'+
                    '<a href="<?=base_url()?>index.php/Keranjang" class="col-lg-6 pull-right btn btn-info">Bayar </a>'
                );
            }); 
        }

//klik beli terus data masuk nang cart onok meja, id masakan, jumlah
    function Tumbas(id_masakan) 
    {
        var jumlah=$("#jumlah_item").val();
        var meja=$("#no_meja").val();
        $("#pesan").hide();
        $("#pesan").removeClass("alert alert-success");

        $.getJSON("<?= base_url()?>index.php/Keranjang/Masuk_Cart/"+meja+"/"+id_masakan+"/"+jumlah,function(hasil)
        {
            $("#cart").html(hasil['total_cart']);
            $("#pesan").html("Pesanan Anda telah ditambahkan");
            $("#pesan").addClass('alert alert-success');
            $("#pesan").show('animate');

            setTimeout(function()
            {
                $("#pesan").hide('fade');
            }, 3000);
        });
    }

</script>

<div class="modal fade" id="mau" role="dialog">
        <div class="modal-dialog modal-large">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2>Beli Makanan</h2>
                </div>
                <div class="modal-body">
                        <div id="deskripsi"></div>
                        <div id="jumlah"></div>
                        <div id="meja"></div>
                        <br>
                        <div class="row" id="btn"></div>
                        <br>
                        <div class="col-lg-12" id="pesan">
                        </div><br>
                </div>
            </div>
        </div>
    </div>