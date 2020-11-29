<!-- Main Sidebar Container -->
<link rel="stylesheet" type="text/css" href="<?=base_url('bowernd/fancytree/skin-win8/ui.fancytree.min.css');?>">
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="brand-link">
        <!-- <a href="<?= base_url('affiliate') ?>"> -->
        <!-- </a> -->
        <!-- <i class="fa fa-arrows-h" style="font-size: 15px; color: #c2c7d0; cursor: pointer" id="pushMenuLeft" data-widget="pushmenu" href="#" role="button"></i> -->
    </div>

    <!-- Sidebar -->
    <div class="sidebar mt-5">
        
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <div class="row">
            <!-- <div class="col-md-3"> -->
                <div class="element-wrapper" style="padding-bottom: 0px;">
                    <h6 class="element-header" style="color: #fff">Navigasi Wilayah</h6>
                    <div class="element-box" style="padding-left: 2px;padding-right:2px;overflow: auto;height: 780px; color: #fff">
                        <div id="tree2">
                            <ul id="treeData">
                                <li  data-tipe='provinsi' data-nama="NASIONAL" data-logo='nasional.png' data-id="0">NASIONAL</li>
                                <?php foreach ($provinsi as $key => $value) { ?>
                                    <li class="lazy" data-tipe='provinsi' data-nama="<?= $value->name?>" data-logo='<?= $value->logo ?>' data-id="<?= $value->id?>"><?= $value->name?>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            <!-- </div> -->
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>

    <!-- /.sidebar -->
</aside>



<!-- jQuery -->
<script src="<?= base_url() ?>assets/template/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url() ?>assets/template/plugins/jquery-ui/jquery-ui.min.js"></script>

<script type="text/javascript" src="<?=base_url('bowernd/fancytree/jquery.fancytree-all.min.js');?>"></script>


<script type="text/javascript">
$(document).ready(function() {
    var firstUriActive = $('#firstUriActive').val();
    var secondUriActive = $('#secondUriActive').val();
    var searchActive = $('#searchActive').val();
    if (secondUriActive != "") {
        $("#" + secondUriActive).addClass('active');
    } else if (searchActive != '') {
        $("#marketing_tools").addClass('active');
    } else {
        $("#" + firstUriActive).addClass('active');
    }
})

$('#infoDropship').click(function(){
    $('#modalInfoDropship').modal('show')
})

$('#pushMenuLeft').click(function() {
    $('#pushMenuRight').removeClass('d-none');
    $('#nav-link-p').addClass('d-none');
    $('#pushMenuLeft').addClass('d-none');
});

$('#pushMenuRight').click(function() {
    $('#pushMenuLeft').removeClass('d-none');
    $('#nav-link-p').removeClass('d-none');
    $('#pushMenuRight').addClass('d-none');
});

$('#pushMenuMobile').click(function() {
    $('#pushMenuLeft').removeClass('d-none');
    $('#pushMenuMobile').addClass('d-none');
});

$('#pushMenuLeft').click(function() {
    $('#pushMenuMobile').removeClass('d-none');
    $('#pushMenuLeft').addClass('d-none');
});
</script>