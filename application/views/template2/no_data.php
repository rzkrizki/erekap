<div class="content-box">
    <div class="big-error-w">
      <h1>
        404
      </h1>
      <h4>
        Oops, No Data ... 
      </h4>
    </div>
  </div>

<script type="text/javascript">
  <?php
  if ($id == 0) {
      $tipe = '';
  }
  ?>
  var url = "<?=base_url(DEF_THEMES.'/img/logo_provinsi/')?>";
  document.getElementById("nama_wilayah").innerHTML = "<?=$nama?>";
  document.getElementById("tipe_wilayah").innerHTML = "<?=strtoupper($tipe)?>";
  document.getElementById("logo_wilayah").src = url+"<?=$logo?>";
</script>