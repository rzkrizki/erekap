<link rel="stylesheet" type="text/css" href="<?=base_url(DEF_THEMES.'/fancytree/skin-win8/ui.fancytree.min.css');?>">
<link href="<?=base_url(DEF_THEMES.'/slick-carousel/slick/slick.css')?>" rel="stylesheet">
<link href="<?=base_url(DEF_THEMES.'/pace/pace.css');?>" rel="stylesheet">
<link href="<?=base_url(DEF_THEMES.'/switchery/switchery.min.css');?>" rel="stylesheet">

<div class="content-w">

<!--     <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="index.html">Products</a></li>
        <li class="breadcrumb-item"><span>Laptop with retina screen</span></li>
    </ul>
-->
<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-md-3">
                <div class="element-wrapper" style="padding-bottom: 0px;">
                    <h6 class="element-header">Navigasi Wilayah</h6>
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
                                    <li  data-tipe='provinsi' data-nama="NASIONAL" data-logo='nasional.png' data-id="0">NASIONAL</li>
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
                <div class="element-wrapper" style="padding-bottom: 0px;">
                    <!-- <h6 class="element-header">Infomasi</h6> -->
                    <!-- <div class="os-tabs-w mx-4"> -->
                        <div class="os-tabs-controls" style="margin-top: -9px">
                            <ul class="nav nav-tabs upper">
                                <li class="nav-item"><a aria-expanded="false" class="nav-link active" data-toggle="tab" href="#tab_profile" onclick="load_tab('tab_profile');"> PROFIL</a></li>
                                <li class="nav-item"><a aria-expanded="false" class="nav-link" data-toggle="tab" href="#tab_survei" onclick="load_tab('tab_survei');"> SURVEI</a></li>
                                <li class="nav-item"><a aria-expanded="false" class="nav-link" data-toggle="tab" href="#tab_ketokohan" onclick="load_tab('tab_ketokohan');"> INFLUENCER</a></li>
                                <li class="nav-item"><a aria-expanded="false" class="nav-link" data-toggle="tab" href="#tab_simulasi" onclick="load_tab('tab_simulasi');"> SIMULASI</a></li>
                                <!-- <li class="nav-item"><a aria-expanded="false" class="nav-link" data-toggle="tab" href="#tab_legislator" onclick="load_tab('tab_legislator');"> LEGISLATOR</a></li> -->
                                <li class="nav-item"><a aria-expanded="false" class="nav-link" data-toggle="tab" href="#tab_rekomendasi" onclick="load_tab('tab_rekomendasi');"> REKOMENDASI</a></li>
                            </ul>                                
                        </div>


                        <div class="element-box-tp">
                            <div class="profile-tile">
                                <a class="" href="#">
                                    <div class="pt-avatar-w"><img id="logo_wilayah" alt=""></div>
                                    <!--div class="pt-avatar-w"><img id="logo_wilayah" alt="" src="<?=base_url();?>img/avatar1.jpg"></div-->
                                </a>
                                <div class="profile-tile-meta">
                                    <ul>
                                        <li><span class='daft-title-wil' id="tipe_wilayah">Wilayah</span></li>
                                        <li><span class='daft-title-wil' id="nama_wilayah">NASIONAL</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>     
                        <div class="tab-content">
                            <div id="tab_profile" class="tab-pane active show"> 
                             Content Profile
                         </div>
                         <div id="tab_survei" class="tab-pane"> 
                            Content Survei
                        </div>
                        <div id="tab_ketokohan" class="tab-pane"> 
                            Content Ketokohan
                        </div>
                        <div id="tab_simulasi" class="tab-pane"> 
                            Content Simulasi
                        </div>
                        <div id="tab_legislator" class="tab-pane"> 
                            Content Legislator
                        </div>
                        <div id="tab_rekomendasi" class="tab-pane"> 
                            Content Legislator
                        </div>
                    </div> 


                </div>
            </div>
        </div>
            <!-- <div class="row">
                <div class="col-sm-12">
                    <div class="element-wrapper">
                     
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
<script type="text/javascript" src="<?=base_url(DEF_THEMES.'/jquery-ui.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url(DEF_THEMES.'/fancytree/jquery.fancytree-all.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url(DEF_THEMES.'/switchery/switchery.min.js');?>"></script>

<script>
    var vid;
    var vnama;
    var vtipe;
    var vlogo;
    var vtab_active;
    document.addEventListener("DOMContentLoaded", function(event) { 
        <?php 
        if($flashdata){
            $id = $flashdata->id;
            $nama = $flashdata->name;
            $tipe = $flashdata->tipe;
            $logo = $flashdata->logo;
        
        } else {
            if($role == 'provinsi'){
                $id     = $provinsi->id;
                $nama   = $provinsi->name;
                $tipe   = 'provinsi';
                $logo   = $provinsi->logo;
            
            } else if($role == 'kabupaten'){
                $id     = $kabupatenx->id;
                $nama   = $kabupatenx->name;
                $tipe   = 'kabupaten';
                $logo   = '';

            } else {
                $id     = 0;
                $nama   = 'NASIONAL';
                $tipe   = 'provinsi';
                $logo   = 'nasional.png';
            }
            
        }
        ?>
        vid = <?=$id?>;
        vnama = '<?=$nama?>';
        vtipe = '<?=$tipe?>';
        vlogo = '<?=$logo?>';
        $("#nama_wilayah").html(vnama);
        var url = "<?=base_url(DEF_THEMES.'/img/logo_provinsi/')?>";
        $("#logo_wilayah").attr("src",url+vlogo);
        load_tab('tab_profile');
    });
    
    function load_tab(tab){  	
    	$("#"+tab).empty();
    	$.ajax({
            type:'POST',
            url:"<?php echo base_url(); ?>load_view/load_tab/",
            data: {tab_name:tab,id:vid,nama:vnama,tipe:vtipe,logo:vlogo},
            success:function(msg){
                vtab_active = tab;
                if(msg == 'N'){
                    window.location = "<?=base_url()?>";
                }else{
                    $("#"+tab).html(msg);    
                }

            // load_informasi(vid,vtipe,vnama,vlogo);
        },
        error: function(result)
        {
         $("#"+tab).html("Error"); 
     },
     fail:(function(status) {
         $("#"+tab).html("Fail");
     }),
     beforeSend:function(d){
    		//$("#"+tab).html("<center><strong style='color:red'>Please Wait...<br><img height='25' width='120' src='<?php echo base_url();?>img/ajax-loader.gif' /></strong></center>");
    		$("#"+tab).html("<center><strong style='color:<?=CNF_COLOR_PRIMARY_DARK?>'>Please Wait...<br><img class='daft-spinner' src='<?=base_url();?><?=DEF_THEMES;?>/<?=CNF_LOADING_SITE?>'></strong></center>");

        }

    }); 
    }

    function get_tree(){
        let tree = $("#tree2");
        tree.fancytree({
            selectMode: 1,
            activate: function(event, data){
                var tipe    = data.node.data.tipe;
                var id      = data.node.data.id;
                var nama    = data.node.data.nama;
                var logo    = data.node.data.logo;
                load_informasi(id,tipe,nama,logo);
            },

            lazyLoad: function(event, data){    
                var tipe    = data.node.data.tipe;
                var id      = data.node.data.id;
                if(tipe == 'provinsi'){
                    data.result = {url: "<?=site_url('dashboard/get_tree_kabupaten/')?>"+id};
                
                } else if (tipe == 'kabupaten'){
                    data.result = {url: "<?=site_url('dashboard/get_tree_kecamatan/')?>"+id};
                
                } else if (tipe == 'kecamatan'){
                    data.result = {url: "<?=site_url('dashboard/get_tree_kelurahan/')?>"+id};
                }
                
            }
        });

        <?php if($role == 'kabupaten') { ?>
            tree.fancytree("getRootNode").visit(function(node){
                if(node.getLevel() == 1) {
                    node.setExpanded(true);
                }
            });
        <?php } ?>
    }

    function load_informasi(id,tipe,nama,logo){
        vid     = id;
        vtipe   = tipe;
        vnama   = nama;
        vlogo   = logo;
        load_tab(vtab_active);
        // console.log(vnama);
        // $.ajax({
        //     url: "<?= site_url('dashboard/get_information/') ?>",
        //     cache: false,
        //     type:"POST",
        //     data: {tab_active:vtab_active,id:vid,nama:vnama,tipe:vtipe,logo:vlogo},
        //     dataType : 'json',
        //     success: function(respond){
        //         console.log(respond);
        //         var url = "<?=base_url(DEF_THEMES.'/img/logo_provinsi/')?>";
        //         $("#logo_wilayah").attr("src",url+vlogo);
        //         $("#nama_wilayah").html(vnama);
        //         if(tab_active == 'tab_profile'){
        //             $("#value_survei").html(respond.jum_survei);
        //             $("#value_dpt").html(respond.jum_dpt);
        //             $("#value_ketokohan").html(respond.jum_ketokohan);
        //             $("#value_guraklih").html(respond.jum_guraklih);
        //             $("#list_paslon").html(respond.paslon);
        //             link = "https://www.google.com/maps/embed/v1/place?key=AIzaSyARSxVnQPIC6yvDqFNwpy0Ym5sMpRk-dSs&q="+respond.link;
        //             $("#frame").attr("src", link);
        //         }else if(tab_active == 'tab_survei'){

        //         }
        //     }
        // })
        
    }

    function get_data(wil,vid,nama){

       $.ajax({
        url: "<?= site_url('dashboard/get_data') ?>",
        cache: false,
        type:"POST",
        async: false,
        dataType: "json",
        data: {wil:wil,id:vid,nama:nama},
        success: function(respond){
            click = 0;
            $("#nilai-n").text('N : '+respond.totall)
            
            if(respond.fauzan == 0){
                $(".bukan-nasional").hide();
                $(".nasional").show();
                $("#label_map").text('Wilayah : Nasional');
            
            } else {
                $(".bukan-nasional").show();
                $(".nasional").hide();
                $("#label_map").text('Wilayah : '+respond.fauzan2);
            }
            ketokohan(respond.chart_ketokohan);
            $("#labelketokohan").text('Ketokohan N : '+respond.ketokohan_total);
            generate_chart__('all',vid,wil);
            $("#labelketokohan2").text('N : '+respond.ketokohan_total);
            area = vid;
            tipe = wil;
        }
    })

   }
</script>


