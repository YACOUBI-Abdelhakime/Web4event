<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center " style="background-color:#972525fa;">
    <div class="container-fluid container-xxl d-flex align-items-center">

      <div id="logo" class="me-auto">
        <!-- Uncomment below if you prefer to use a text logo -->
        <h1><a href="<?php echo base_url();?>index.php/compte/home">Salon <span>Auto</span></a></h1>
        <!-- <a href="" class="scrollto"><img src="<?php //echo base_url();?>style/assets/img/logo.png" alt="" title=""></a> -->
      </div>

<nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <!-- <li><a id="ninvites" class="nav-link scrollto" href="<?php //echo base_url();?>index.php/invite/passeport">Passeport</a></li> -->
          <li><a id="ninvites" class="nav-link scrollto" href="<?php echo base_url();?>index.php/invite/profile">Profile</a></li>
          <li class="dropdown"><a href=""><span>Passeport/Post</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="<?php echo base_url();?>index.php/invite/passeport">Afficher</a></li>
              <li><a href="<?php echo base_url();?>index.php/invite/ajoute_passe">Créer un passeport</a></li>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a class="buy-tickets scrollto" href="<?php echo base_url();?>index.php/compte/deconnecter">Déconnexion</a>

    </div>
  </header><!-- End Header -->