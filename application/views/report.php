<link rel="stylesheet" type="text/css" href="<?=base_url(DEF_THEMES.'/fancytree/skin-win8/ui.fancytree.min.css');?>">
<link href="<?=base_url(DEF_THEMES.'/slick-carousel/slick/slick.css')?>" rel="stylesheet">
<!-- <link href="<?=base_url(DEF_THEMES.'/pace/pace.css');?>" rel="stylesheet"> -->
<link href="<?=base_url(DEF_THEMES.'/switchery/switchery.min.css');?>" rel="stylesheet">

<style>
    .nav-pills .nav-link.active, .nav-pills .nav-item.show .nav-link {
        background-color: #01ecf7 !important;
        min-width: 100px;
        text-align: center;
        color: #000;
        font-weight: 600;
    }

    .nav-pills .nav-link {
        background-color: #fff!important;
        margin: 0 2px 2px;
        text-align: center;
        color: #000;
        font-weight: 600;
        min-width: 100px;
    }

    .spacing_top{
        margin-top: -70px;
    }


    @media screen and (min-width: 768px) {
        #imageRekap{
            width: 8%;
        }

        #TitleReport{
            font-size: 60px;
        }

        #titleDate,
        #titleNotes,
        #titleAddress,
        #date,
        #notes,
        #address{
            font-size: 20px;
        }
    
        #image_modal{
            margin-left:130px;
            width: 12%;
        }

        #title_modal{
            margin-right:130px; 
        }
    }

    @media screen and (max-width: 768px) {
        #imageRekap{
            width: 19%;
            margin-left: 60px;
            margin-bottom: 15px;
        }

        #TitleReport{
            font-size: 44px;
        }

        #tabNav{
            margin-left: 55px;
        }

        #titleDate,
        #titleNotes,
        #titleAddress,
        #date,
        #notes,
        #address{
            font-size: 13px;
        }

        .spacing_top2{
            margin-top: -70px;
        }

        #image_modal{
            width: 22%;
        }
    }
</style>

<div class="content-w" style="background-color: #1b1a28;">
<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-md-3">
                <div class="element-wrapper" style="padding-bottom: 0px;">
                    <div class="element-box" style="padding-left: 2px;padding-right:2px;overflow: auto;height: 780px;">
                        <?php if($role == 'provinsi'){ ?>
                            <div id="tree2">
                                <ul id="treeData" style="display: none;">
                                    <li  data-tipe='provinsi' data-nama="<?=$provinsi->name?>" data-logo='<?=$provinsi->logo?>' data-id="<?=$provinsi->id?>"><?=$provinsi->name?></li>
                                    <?php foreach ($kabupaten as $key => $value) { ?>
                                        <li class="lazy" data-tipe='kabupaten' data-nama="<?= $value->name?>" data-logo='' data-id="<?= $value->id?>"><?= $value->name?>
                                    <?php } ?>
                                </ul>
                            </div>
                        <?php } else if($role == 'kabupaten'){ ?>
                            <div id="tree2">
                                <ul id="treeData" style="display: none;">
                                    <?php foreach ($kabupaten as $key => $value) { ?>
                                        <li class="lazy" data-tipe='kabupaten' data-nama="<?= $value->name?>" data-logo='' data-id="<?= $value->id?>"><?= $value->name?>
                                    <?php } ?>
                                </ul>
                            </div>
                        <?php } else { ?>
                            <div id="tree2">
                                <ul id="treeData" style="display: none;">
                                    <?php foreach ($provinsi as $key => $value) { ?>
                                        <li class="lazy" data-tipe='provinsi' data-nama="<?= $value->name?>" data-logo='<?= $value->logo ?>' data-id="<?= $value->id?>"><?= $value->name?>
                                    <?php } ?>
                                </ul>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <input type="text" class="form-control" id="id_kecamatan" hidden>
                <input type="text" class="form-control" id="id_kelurahan" hidden>
                <input type="text" class="form-control" id="flag" hidden>
                <div class="element-wrapper" style="padding-bottom: 30px;">
                    <div class="mx-auto" id="logoRow">
                        <span class='daft-title-wil'> 
                            <img class="" src="<?= base_url() ?>assets/images/png/icon-lapor.png" alt="" id="imageRekap">
                            <font style="color: #fff; font-weight: 600; margin-left: 30px" id="TitleReport">Lapor</font>
                        </span>
                    </div>
                </div>
                <div class="col-md-4 mx-auto" style="padding-bottom: 30px;">
                    <ul class="nav nav-pills d-none" id="tabNav">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" href="#flamingo" id="today_link" role="tab" aria-controls="pills-flamingo" aria-selected="true" onclick="flag('today', 2)">Today</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#cuckoo" role="tab" id="all_link" aria-controls="pills-cuckoo" aria-selected="false" style="margin-left: -3px;" onclick="flag('all', 2)">All</a>
                        </li>
                    </ul>
                </div>
                <div class="row" id="contentDiv">
                   
                </div>
                <div class="row" id="totalReport">
            </div>
        </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalDetailPelanggaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-notify modal-dialog-centered modal" role="document">
            <!--Content-->
            <div class="modal-content text-center">
                <!--Body-->
                <div class="modal-body" style="background-color: #1b1a28;">
                    <div class="row">
                        <div class="col-md-12">
                            <img style="float:left;" src="<?= base_url() ?>assets/images/png/icon-lapor.png" alt="" id="image_modal">
                            <h3 style="font-weight: 700; color: #fff; font-size: 46px" class="" id="title_modal">Lapor</h3>
                        </div>
                    </div>
                    <div class="card" style="border: 5px solid #848484; margin-top: 40px; padding: 15px; border-radius: 25px">
                        <div class="card-body">
                            <div class="row" style="margin-bottom: 10px;">
                                <div class="col-6">
                                    <font style="font-weight: 600; color: #fff" id="titleDate">Tanggal Pelanggaran</font>
                                </div>
                                <div class="col-6">
                                    <font style="font-weight: 600; color: #fff" id="date"></font>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: 10px;">
                                <div class="col-6">
                                    <font style="font-weight: 600; color: #fff" id="titleNotes">Catatan Pelanggaran</font>
                                </div>
                                <div class="col-6">
                                    <font style="font-weight: 600; color: #fff" id="notes"></font>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: 10px;">
                                <div class="col-6">
                                    <font style="font-weight: 600; color: #fff" id="titleAddress">Alamat Pelanggaran</font>
                                </div>
                                <div class="col-6">
                                    <font style="font-weight: 600; color: #fff" id="address"></font>
                                </div>
                            </div>
                            <hr>
                            <div class="row" style="margin-bottom: 10px;">
                                <div class="col-md-12">
                                    <img src="" alt="" id="foto_pelanggaran" style="width: 100%;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-block" style="background-color: #fff; color: 1b1a28; font-weight: 600" data-dismiss="modal">CLOSE</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>

<script type="text/javascript" src="<?=base_url(DEF_THEMES.'/jquery-ui.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url(DEF_THEMES.'/fancytree/jquery.fancytree-all.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url(DEF_THEMES.'/switchery/switchery.min.js');?>"></script>
<!-- Swal -->
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> -->

<script>

    $(document).ready(function($) {
        flag('today', 1)
        $('.daft-spinner').addClass('d-none')
    });
   
    function get_tree(){
        $('#totalReport').empty();
        let tree = $("#tree2");
        tree.fancytree({
            selectMode: 1,
            activate: function(event, data){
                var tipe    = data.node.data.tipe;
                var id      = data.node.data.id;
                var nama    = data.node.data.nama;
                var logo    = data.node.data.logo;
                load_information(id,tipe,nama,logo);
            },

            lazyLoad: function(event, data){    
                var tipe    = data.node.data.tipe;
                var id      = data.node.data.id;
                var nama    = data.node.data.nama;
                var logo    = data.node.data.logo;
                if(tipe == 'provinsi'){
                    data.result = {url: "<?=site_url('report/get_tree_kabupaten/')?>"+id};
                
                } else if (tipe == 'kabupaten'){
                    data.result = {url: "<?=site_url('report/get_tree_kecamatan/')?>"+id};
                
                } else if (tipe == 'kecamatan'){
                    data.result = {url: "<?=site_url('report/get_tree_kelurahan/')?>"+id};
                }
            }
        });

       
            tree.fancytree("getRootNode").visit(function(node){
                if(node.getLevel() == 1) {
                    node.setExpanded(true);
                }
            });
    }

    function load_information(id,tipe,nama,logo){
        if(tipe == "kecamatan"){
            $('#id_kecamatan').val(id)
            $('#id_kelurahan').val('0')
            filter_data()
        }

        if(tipe == "kelurahan"){
            $('#id_kelurahan').val(id)
            
            filter_data()
        }

    }

    function flag(value, type){
        id_kecamatan = $('#id_kecamatan').val()
        id_kelurahan =  $('#id_kelurahan').val()
      
        if(id_kecamatan == '' && type == '2'){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Silahkan pilih kecamatan terlebih dahulu',
            })
            $('#all_link').removeClass('active');
            $('#today_link').addClass('active');
        }else{
            $('#flag').val(value)
            filter_data()
        }
      
    }

    function filter_data(){
        $('#tabNav').addClass('d-none');
        $.ajax({
            type: 'POST',
            url: '<?= base_url('report/filter_data'); ?>',
            data: {
				'id_kecamatan': $('#id_kecamatan').val(),
				'id_kelurahan': $('#id_kelurahan').val(),
                'flag': $('#flag').val(),
			},
   			dataType: 'json',
            success: function(data) {
              
              if(data.status == 'error'){
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: data.message,
				})
			  }else{
				if(data.result == ''){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Belum ada laporan apapun',
                    })
                }else{
                    $('#contentDiv').empty();
                    $('#tabNav').removeClass('d-none');
                    var no = 1;
                    $.each(data.result, function(index, element) {
                        notes = element.notes.toLowerCase().replace(/\b[a-z]/g, function(letter) {
                            return letter.toUpperCase();
                        });
                        $('#contentDiv').append(
                            `<div class="col-md-6">\
                                <div class="card text-center ` + (index > 1 ? `spacing_top` : `` )+ ` ` + (index > 0 ? `spacing_top2` : `` )+ `" style="background-color: #f7f7f9; margin-bottom: 90px;">\
                                    <hr>\
                                    <div class="card-header" style="font-weight: 600; font-size: 30px; color: #1b1a28;">\
                                        `+notes+`
                                    </div>\
                                    <br>\
                                    <img class="card-img-top" src="`+element.url_image+`" alt="Card image cap" style="width:auto; height: 200px; margin-bottom: 22px; max-width: 378px; cursor: pointer" onclick="detail_pelanggaran(`+element.id_pelanggaran+`)">\
                                </div>\
                            </div>\
                        `);
                        //   console.log(element);
                        no += 1;
                        
                    });
                    $('#totalReport').append(
                        `<div class="col-md-12 text-center">\
                            <span style="padding: 13px; background-color: #01ecf7; color: #000; font-weight: 600;">N = `+data.result.length+`</span>
                        </div>\
                    `);
                    console.log(data);
                }
			  }
              $('.daft-spinner').addClass('d-none') 
            },
            beforeSend:function(d){
                $('#totalReport').empty();
    		    $("#contentDiv").html("<center><strong style='color: #0088a3'><img class='daft-spinner' src='<?=base_url();?>bowernd/pin_digipol_new.png'></strong></center>");
            }
        });
    }

    function detail_pelanggaran(id){
        $('#date').text('');
        $('#notes').text('');
        $('#address').text('');
        $('#foto_pelanggaran').attr('src', "");
        $.ajax({
            type: 'POST',
            url: '<?= base_url('report/detail_pelanggaran'); ?>',
            data: {
				'id_pelanggaran': id
			},
   			dataType: 'json',
            success: function(data) {
                $('.daft-spinner').addClass('d-none')
              if(data.status == 'error'){
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: data.message,
				})
			  }else{
                $('#date').text(data.result.date);
                $('#notes').text(data.result.notes);
                $('#address').text(data.result.address);
                $('#foto_pelanggaran').attr('src', data.result.url_image);
                $('#modalDetailPelanggaran').modal('show')
			  }
			    
            }
        });
       
    }

    function close_detail(){
        $('#date').text('');
        $('#notes').text('');
        $('#address').text('');
        $('#foto_pelanggaran').attr('src', "");
        $('#modalDetailPelanggaran').modal('hide')
    }
    
</script>


