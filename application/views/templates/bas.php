  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
		<div class="text-center">
			<div class="social-links">
				<a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
				<a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
				<a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
				<a href="#" class="google-plus"><i class="bi bi-instagram"></i></a>
				<a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
			</div>
		</div>


      <!--<div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <img src="<?php //echo base_url();?>style/assets/img/logo.png" alt="TheEvenet">
            <p>In alias aperiam. Placeat tempore facere. Officiis voluptate ipsam vel eveniet est dolor et totam porro. Perspiciatis ad omnis fugit molestiae recusandae possimus. Aut consectetur id quis. In inventore consequatur ad voluptate cupiditate debitis accusamus repellat cumque.</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>

          </div>

        </div>
      </div>-->
    </div>
  <!-- *********************************************************************************** -->
    <div class="container">
      <!-- <div class="text-center"><img style="width : 13rem;margin-top:20px;" src="<?php //echo base_url();?>style/assets/img/logo.png" alt="TheEvenet"></div> -->
      <div class="copyright">
        &copy; Copyright <strong>UBO</strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a>A.YACOUBI</a>
      </div>
      <?php
        if(!isset($_SESSION['username'])){          
          ?>
          <div class="credits">
            <a style="font-size:18px;color:white;" href="<?php echo base_url();?>index.php/accueil/ajouter_post"><i class="bi bi-plus-circle"></i></a>
          </div>
          <?php
        }
      ?>
    </div>
  <!-- *********************************************************************************** -->
  </footer><!-- End  Footer -->

  <a href="" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url();?>style/assets/vendor/aos/aos.js"></script>
  <script src="<?php echo base_url();?>style/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url();?>style/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?php echo base_url();?>style/assets/vendor/php-email-form/validate.js"></script>
  <script src="<?php echo base_url();?>style/assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url();?>style/assets/js/main.js"></script>

</body>

</html>