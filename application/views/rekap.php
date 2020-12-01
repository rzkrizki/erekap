<link rel="stylesheet" type="text/css" href="<?=base_url(DEF_THEMES.'/fancytree/skin-win8/ui.fancytree.min.css');?>">
<link href="<?=base_url(DEF_THEMES.'/slick-carousel/slick/slick.css')?>" rel="stylesheet">
<link href="<?=base_url(DEF_THEMES.'/pace/pace.css');?>" rel="stylesheet">
<link href="<?=base_url(DEF_THEMES.'/switchery/switchery.min.css');?>" rel="stylesheet">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">

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
                <input type="text" class="form-control" id="id_kabupaten" value="<?= $id_kabupaten?>" hidden>
                <input type="text" class="form-control" id="id_kecamatan" hidden>
                <input type="text" class="form-control" id="id_kelurahan" hidden>
                <div class="element-wrapper" style="padding-bottom: 30px;">
                    <div class="mx-auto" id="logoRow">
                        <span class='daft-title-wil'> 
                            <img class="" src="<?= base_url() ?>assets/images/png/icon-rekap.png" alt="" id="imageRekap" style="width: 8%;">
                            <font style="font-size: 60px; color: #fff; font-weight: 600; margin-left: 30px">Rekap</font>
                        </span>
                    </div>
                </div>
                <div class="col-md-6 mx-auto" style="padding-bottom: 30px;">
                    <div>
                        <canvas id="pieChart" style="max-width: 500px;"></canvas>
                    </div>
                </div>
                <div class="row" id="contentDiv">
                    <!--div class="col-md-3" style="padding: 20px;">
                        <div class="card text-center" style="background-color: #1b1a28;">
                            <div class="card-header" style="font-weight: 600; font-size: 20px; color: #fff">
                                1
                            </div>
                            <br>
                            <img class="card-img-top" src="<?= base_url() ?>assets/images/paslon/paslon_1.png" alt="Card image cap" style="width: 80%;">
                            <div class="card-footer mt-3" style="background-color: #01ecf7; width: 80%;margin: auto; color: #000; font-weight: 600; font-size: 20px">
                                88.776
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3" style="padding: 20px;">
                        <div class="card text-center" style="background-color: #1b1a28;">
                            <div class="card-header" style="font-weight: 600; font-size: 20px; color: #fff">
                            2
                            </div>
                            <br>
                            <img class="card-img-top" src="<?= base_url() ?>assets/images/paslon/paslon_2.png" alt="Card image cap" style="width: 80%;">
                            <div class="card-footer mt-3" style="background-color: #01ecf7; width: 80%;margin: auto; color: #000; font-weight: 600; font-size: 20px">
                                46.317
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3" style="padding: 20px;">
                        <div class="card text-center" style="background-color: #1b1a28;">
                            <div class="card-header" style="font-weight: 600; font-size: 20px; color: #fff">
                            3
                            </div>
                            <br>
                            <img class="card-img-top" src="<?= base_url() ?>assets/images/paslon/paslon_3.png" alt="Card image cap" style="width: 80%;">
                            <div class="card-footer mt-3" style="background-color: #01ecf7; width: 80%;margin: auto; color: #000; font-weight: 600; font-size: 20px">
                                111.934
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3" style="padding: 20px;">
                        <div class="card text-center" style="background-color: #1b1a28;">
                            <div class="card-header" style="font-weight: 600; font-size: 20px; color: #fff">
                            4
                            </div>
                            <br>
                            <img class="card-img-top" src="<?= base_url() ?>assets/images/paslon/paslon_4.png" alt="Card image cap" style="width: 80%;">
                            <div class="card-footer mt-3" style="background-color: #01ecf7; width: 80%;margin: auto; color: #000; font-weight: 600; font-size: 20px">
                                138.953
                            </div>
                        </div>
                    </div-->
                </div>
                <div class="row" id="summaryDiv"></div>
            </div>
        </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?=base_url(DEF_THEMES.'/jquery-ui.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url(DEF_THEMES.'/fancytree/jquery.fancytree-all.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url(DEF_THEMES.'/switchery/switchery.min.js');?>"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>

<script>
/*
var ctxP = document.getElementById("pieChart").getContext('2d');
    var myPieChart = new Chart(ctxP, {
      type: 'pie',
      data: {
        labels: ["Paslon 1", "Paslon 2", "Paslon 3", "Paslon 4"],
        datasets: [{
          data: [88.776, 46.317, 111.934, 138.953],
          backgroundColor: ["#52e8e8", "#00ffaa", "#00b2b2", "#a4ffff"],
          hoverBackgroundColor: ["#52e8e8", "#00ffaa", "#00b2b2", "#a4ffff"]
        }]
      },
      options: {
        legend: {
            display: false
         },
         tooltips: {
            enabled: true
         },
        responsive: true
      }
    });
*/ 
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
                if(tipe == 'provinsi'){
                    data.result = {url: "<?=site_url('rekap/get_tree_kabupaten/')?>"+id};
                
                } else if (tipe == 'kabupaten'){
                    data.result = {url: "<?=site_url('rekap/get_tree_kecamatan/')?>"+id};
                
                } else if (tipe == 'kecamatan'){
                    data.result = {url: "<?=site_url('rekap/get_tree_kelurahan/')?>"+id};
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

    function filter_data(){
        $.ajax({
            type: 'POST',
            url: '<?= base_url('rekap/filter_data'); ?>',
            data: {
				'id_kabupaten': $('#id_kabupaten').val(),
                'id_kecamatan': $('#id_kecamatan').val(),
				'id_kelurahan': $('#id_kelurahan').val(),
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
                            `<div class="col-md-3" style="padding: 20px;">\
                                <div class="card text-center" style="background-color: #1b1a28;">\
                                    <div class="card-header" style="font-weight: 600; font-size: 20px; color: #fff">\
                                         `+element.no_urut+`
                                    </div>\
                                    <br>\
                                    <img class="card-img-top" src="`+element.paslon_image+`" alt="Card image cap" style="width: 100%; background-color: #ae0001; padding: 18px;" onclick="detail_pelanggaran(`+element.id_pelanggaran+`)">\
                                    <div class="card-footer mt-3" style="background-color: #01ecf7; width: 80%;margin: auto; color: #000; font-weight: 600; font-size: 20px">\
                                        `+element.total_suara+`
                                    </div>\
                                </div>\
                            </div>\
                        `);
                        //   console.log(element);
                        no += 1;
                    });
                    console.log(data);
                }
                // pie chart
                var ctxP = document.getElementById("pieChart").getContext('2d');
                var myPieChart = new Chart(ctxP, {
                  type: 'pie',
                  data: {
                    labels: ["Paslon 1", "Paslon 2", "Paslon 3", "Paslon 4"],
                    datasets: [{
                      data: [data.result[0].total_suara, data.result[0].total_suara, data.result[0].total_suara, data.result[0].total_suara],
                      backgroundColor: ["#52e8e8", "#00ffaa", "#00b2b2", "#a4ffff"],
                      hoverBackgroundColor: ["#52e8e8", "#00ffaa", "#00b2b2", "#a4ffff"]
                    }]
                  },
                  options: {
                    legend: {
                        display: false
                     },
                     tooltips: {
                        enabled: true
                     },
                    responsive: true
                  }
                });
                // pie chart
                // summary
                $('#summaryDiv').append(
                    `<div class="offset-1 col-md-3" style="padding: 20px;">\
                        <div class="card text-center" style="background-color: #1b1a28;">\
                            <div class="card-footer mt-3" style="background-color: #01ecf7; width: 80%;margin: auto; color: #000; font-weight: 600; font-size: 20px">\
                                `+data.summary.total_dpt+` </br> DPT\
                            </div>\
                        </div>\
                    </div>\
                    <div class="col-md-3" style="padding: 20px;">\
                        <div class="card text-center" style="background-color: #1b1a28;">\
                            <div class="card-footer mt-3" style="background-color: #01ecf7; width: 80%;margin: auto; color: #000; font-weight: 600; font-size: 20px">\
                                Masuk </br> `+data.summary.suara_masuk_persen+`%\ 
                            </div>\
                        </div>\
                    </div>\
                    <div class="col-md-3" style="padding: 20px;">\
                        <div class="card text-center" style="background-color: #1b1a28;">\
                            <div class="card-footer mt-3" style="background-color: #01ecf7; width: 80%;margin: auto; color: #000; font-weight: 600; font-size: 20px">\
                                `+data.summary.total_tps+` </br> TPS\ 
                            </div>\
                        </div>\
                    </div>\
                `);
			  }
              $('.daft-spinner').addClass('d-none');
            },
            beforeSend:function(d){
    		    $("#contentDiv").html("<center><strong style='color: #0088a3'><img class='daft-spinner' src='<?=base_url();?>bowernd/pin_digipol_new.png'></strong></center>");
            }
        });
    }
    
    get_tree();
</script>


