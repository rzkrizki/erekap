<!-- NAVBAR -->
<?php
$session = $this->session->userdata('id');

?>
<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item row"> 
         <a class="nav-link" href="#" role="button" onclick="history.go(-1);"><i class="fas fa-arrow-left"></i></a>
         <a class="nav-link btn" id="pushMenuMobile" data-widget="pushmenu" href="#" role="button"><i class="fa fa-arrows-alt"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto mr-3">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
          <?php if(!empty($user['img'])){ ?>
              <a href="<?= base_url('profil') ?>" class="nav-link" style="margin-right: 10px;">
                  <img src="<?= base_url('assets/img/avatar/' . $user['img']) ?>" alt="" style=" width: 40px; height: 40px; border-radius: 50%; margin-top: -9px;">
              </a>
          <?php }else{ ?>
              <a href="<?= base_url('profil') ?>" class="nav-link" style="margin-right: 10px;">
                  <img src="https://via.placeholder.com/50x50" alt="" style=" width: 40px; height: 40px; border-radius: 50%; margin-top: -9px;">
              </a>
          <?php } ?>
      </li>
    </ul>
  </nav>
  
  <!-- jQuery -->
<script src="<?= base_url() ?>assets/template/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url() ?>assets/template/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- /.navbar -->

