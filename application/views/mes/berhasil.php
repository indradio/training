<!--

 =========================================================
  Paper Kit 2 PRO - v2.3.0
 =========================================================

  Product Page: https://www.creative-tim.com/product/paper-kit-2-pro
  Copyright 2019 Creative Tim (https://www.creative-tim.com)

  Coded by Creative Tim

 =========================================================

  The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

-->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url(); ?>assets/img//apple-icon.png">
  <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/img//favicon.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    WINTEQ - Kuesioner
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?= base_url(); ?>assets/css/paper-kit.css?v=2.3.0" rel="stylesheet" />
  <!-- Ajax Jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body class="sections-page sidebar-collapse">
  <div class="section-space"></div>
  <div class="section section-header cd-section" id="headers">
    <!--     *********     HEADER 3      *********      -->
    <div class="header-4">
      <div class="header-wrapper">
        <div class="page-header header-video">
          <div class="filter filter-danger"></div>
          <!-- We show the video image placeholder instead of the video for small devices  -->
          <div class="video-image" style="background-image: url('<?= base_url(); ?>assets/img/video-placeholder.png')"></div>
          <video id="video-source" autoplay="true" preload="auto" loop="loop" muted="muted" volume="0">
            <source src="<?= base_url(); ?>assets/video/fireworks.mp4" type="video/mp4"> Video not supported
          </video>
          <div class="content-center">
            <div class="row">
              <div class="col-md-6 ml-auto mr-auto text-center">
                <h1 class="title"> Terima kasih</h1>
                <h5 class="description">Anda telah mengisi kuesioner.</h5>
                <br />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--     *********    END HEADER 3      *********      -->
  <footer class="footer footer-black  footer-white ">
    <div class="container">
      <div class="row">
        <nav class="footer-nav">
          <ul>
            <li>
              <a href="https://www.winteq-astra.com" target="_blank">PT Astra Otoparts, Tbk. Divisi WINTEQ</a>
            </li>
          </ul>
        </nav>
        <div class="credits ml-auto">
          <span class="copyright">
            ©
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="fa fa-heart heart"></i> by Winteq Digitalization Team.
          </span>
        </div>
      </div>
    </div>
  </footer>
  <!--   Core JS Files   -->
  <script src="<?= base_url(); ?>assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="<?= base_url(); ?>assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="<?= base_url(); ?>assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="<?= base_url(); ?>assets/js/plugins/bootstrap-switch.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="<?= base_url(); ?>assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
  <script src="<?= base_url(); ?>assets/js/plugins/moment.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="<?= base_url(); ?>assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="<?= base_url(); ?>assets/js/plugins/bootstrap-selectpicker.js" type="text/javascript"></script>
  <!--	Plugin for Datetimepicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="<?= base_url(); ?>assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!--  Vertical nav - dots -->
  <script src="<?= base_url(); ?>assets/demo//vertical-nav.js" type="text/javascript"></script>
  <!--  Photoswipe files -->
  <script src="<?= base_url(); ?>assets/js/plugins/photo_swipe/photoswipe.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/plugins/photo_swipe/photoswipe-ui-default.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/plugins/photo_swipe/init-gallery.js"></script>
  <!--  for Jasny fileupload -->
  <script src="<?= base_url(); ?>assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!-- Control Center for Paper Kit: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url(); ?>assets/js/paper-kit.js?v=2.3.0" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!--  Plugin for presentation page - isometric cards  -->
  <script src="<?= base_url(); ?>assets/js/plugins/presentation-page/main.js"></script>
  <script>
    $(document).ready(function() {
      if (window_width >= 768) {
        $(window).on('scroll', pk.checkScrollForPresentationPage);
      }

      // Javascript method's body can be found in assets/js/core/partials/_demo-object.js
      demo.initContactUsMap2();
    });
  </script>
</body>

</html>