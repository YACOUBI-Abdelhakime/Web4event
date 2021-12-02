<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center " style="background-color:#16328d;">
    <div class="container-fluid container-xxl d-flex align-items-center">

      <div id="logo" class="me-auto">
        <!-- Uncomment below if you prefer to use a text logo -->
        <h1><a href="">Salon <span>Auto</span></a></h1>
        <!-- <a href="" class="scrollto"><img src="<?php //echo base_url();?>style/assets/img/logo.png" alt="" title=""></a> -->
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <?php /*<li><a id="nhome" class="nav-link scrollto " href="<?php echo base_url();?>#hero">Home</a></li>
          <li><a id="nabaout" class="nav-link scrollto" href="<?php echo base_url();?>#about">About</a></li>
          <li><a id="nactualites" class="nav-link scrollto" href="<?php echo base_url();?>#actualites">Actualités</a></li>
          <li><a id="ninvites" class="nav-link scrollto" href="<?php echo base_url();?>index.php/invite/lister">Invités</a></li>
          */?>
          <li><a id="nprogrammation" class="nav-link scrollto" href="<?php echo base_url();?>index.php/animation/admin">Programmation</a></li>
          <li><a id="nprogr" class="nav-link scrollto" href="<?php echo base_url();?>index.php/admin/lieux">Lieux</a></li>
          <li><a id="ninvites" class="nav-link scrollto" href="<?php echo base_url();?>index.php/admin/profile">Profile</a></li>
          <li><a id="nipost" class="nav-link scrollto" href="<?php echo base_url();?>index.php/admin/post">Posts</a></li>
          <li><a id="ncomptes" class="nav-link scrollto" href="<?php echo base_url();?>index.php/admin/comptes">Comptes</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a class="buy-tickets scrollto" href="<?php echo base_url();?>index.php/compte/deconnecter">Déconnexion</a>

    </div>
  </header><!-- End Header -->