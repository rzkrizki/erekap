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
                    <ul class="nav nav-pills" id="tabNav">
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
            </div>
        </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalDetailPelanggaran" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Detail Pelanggaran</h5>
        <button type="button" class="close" onclick="close_detail()" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row" style="margin-bottom: 10px;">
            <div class="col-6">
               
                    <font style="font-weight: 600; color: #000" id="titleDate">Tanggal Pelanggaran :</font>
                
            </div>
            <div class="col-6">
                <font style="font-weight: 600; color: #000" id="date"></font>
            </div>
        </div>
        <div class="row" style="margin-bottom: 10px;">
            <div class="col-6">
                <!-- <div class="col-md-12"> -->
                    <font style="font-weight: 600; color: #000" id="titleNotes">Catatan Pelanggaran :</font>
                <!-- </div> -->
            </div>
            <div class="col-6">
                <font style="font-weight: 600; color: #000" id="notes"></font>
            </div>
        </div>
        <div class="row" style="margin-bottom: 10px;">
            <div class="col-6">
                <!-- <div class="col-md-12"> -->
                    <font style="font-weight: 600; color: #000" id="titleAddress">Alamat Pelanggaran :</font>
                <!-- </div> -->
            </div>
            <div class="col-6">
                <font style="font-weight: 600; color: #000" id="address"></font>
            </div>
        </div>
            
            <!-- <div class="col-6">
                <div class="row">
                    <div class="col-md-12">
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <font style="font-size: 20px; font-weight: 600; color: #000" id="notes"></font>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <font style="font-size: 20px; font-weight: 600; color: #000" id="address"></font>
                    </div>
                </div>
            </div> -->
        <!-- </div> -->
        <hr>
        <div class="row" style="margin-bottom: 10px;">
            <div class="col-md-12">
                <img src="" alt="" id="foto_pelanggaran" style="width: 100%;">
            </div>
        </div>
      </div>
    </div>
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
                    var no = 1;
                    $.each(data.result, function(index, element) {
                        $('#contentDiv').append(
                            `<div class="col-md-6" style="padding: 20px;">\
                                <div class="card text-center" style="background-color: #1b1a28;">\
                                    <div class="card-header" style="font-weight: 600; font-size: 20px; color: #fff">\
                                        Pelanggaran `+no+`
                                    </div>\
                                    <br>\
                                    <img class="card-img-top" src="<?= base_url() ?>assets/images/png/speech.png" alt="Card image cap" style="width: 30%; background-color: #ae0001; padding: 18px; cursor: pointer" onclick="detail_pelanggaran(`+element.id_pelanggaran+`)">\
                                </div>\
                            </div>\
                        `);
                        //   console.log(element);
                        no += 1;
                    });
                    console.log(data);
                }
			  }
              $('.daft-spinner').addClass('d-none') 
            },
            beforeSend:function(d){
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


