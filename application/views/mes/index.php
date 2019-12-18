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
    WINTEQ Sharing Event - Kuesioner
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
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top nav-down">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="#">
          <img src="<?= base_url(); ?>assets/img/logo.png" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="section section-contactus cd-section" id="contact-us">
     <!--     *********    CONTACT US 1     *********      -->
     <div class="contactus-1 section-image" style="background-image: url('<?= base_url(); ?>assets/img/sections/winteq.jpg')">
      <div class="container">
        <div class="row">
          <div class="col-md-12 ml-auto mr-auto">
            <div class="card card-contact no-transition">
              <h2 class="card-title text-center">WINTEQ Sharing Event</h2>
              <h3 class="text-center">MES Implementation for SMART FACTORY</h3>
              <h3 class="card-title text-center">Kuesioner</h3>
              <div class="row">
                <div class="col-md-4 ml-auto">
                  <div class="card-body">
                    <div class="info info-horizontal">
                      <div class="icon icon-info">
                        <i class="nc-icon nc-pin-3" aria-hidden="true"></i>
                      </div>
                      <div class="description">
                        <h4 class="info-title">PT Astra Otoparts, Tbk. Divisi WINTEQ</h4>
                        <p> Jl. Raya Jakarta Bogor Km 47,
                          <br> Nanggewer Mekar, Cibinong, 
                          <br> Kab Bogor - Jawa Barat,
                          <br> Indonesia 16912
                          <br> Telp. +6221 8790 1703
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-mb-2 mr-auto">
                  <form role="form" id="contact-form" method="post"  action="<?= base_url('mes/kuesioner'); ?>">
                    <div class="card-body">
                      <div class="form-group label-floating">
                        <label class="control-label">Nama*</label>
                        <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Lengkap" required="true" />
                      </div>
                      <div class="form-group label-floating">
                        <label class="control-label">Perusahaan*</label>
                        <input type="text" id="perusahaan" name="perusahaan" class="form-control" placeholder="Perusahaan" required="true" />
                      </div>
                      <div class="form-group label-floating">
                        <label class="control-label">Aplikasi MES apa yang dibutuhkan untuk factory anda*</label>
                        <input type="text" id="aplikasi" name="aplikasi" class="form-control" placeholder="Aplikasi MES" required="true" />
                      </div>
                      <div class="form-group label-floating">
                        <label class="control-label">Catatan</label>
                        <textarea rows="2" id="catatan" name="catatan" class="form-control" placeholder="Apa yang menjadi concern anda"></textarea>
                      </div>
                      <div class="form-group label-floating">
                        <label class="control-label"><small>* Wajib diisi</label>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" id="check" value="" required="true">Saya bukan robot.
                              <span class="form-check-sign"></span>
                            </label>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <button type="submit" class="btn btn-lg btn-primary pull-right" id="submit">KIRIM</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--     *********    END CONTACT US 1      *********      -->
  </div>
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

      var checker = document.getElementById('check');
      var sendbtn = document.getElementById('submit');
        sendbtn.disabled = true;
        // when unchecked or checked, run the function
        checker.onchange = function() {
            if (this.checked) {
                sendbtn.disabled = false;
            } else {
                sendbtn.disabled = true;
            }
        }

        $('.datetimepicker').datetimepicker({
        format: 'DD-MM-YYYY',
        icons: {
            time: "fa fa-clock-o",
            date: "fa fa-calendar",
            up: "fa fa-chevron-up",
            down: "fa fa-chevron-down",
            previous: 'fa fa-chevron-left',
            next: 'fa fa-chevron-right',
            today: 'fa fa-screenshot',
            clear: 'fa fa-trash',
            close: 'fa fa-remove'
          }
        });

        $('#email').change(function(){
          var email = $('#email').val();
          if(email != ''){
            $.ajax({
              url: "<?php echo base_url(); ?>beranda/checkEmail",
              method: "POST",
              data: {email:email},
              success: function(data){
                $('#email_result').html(data);
            }
          });
          }
        });

      // Javascript method's body can be found in assets/js/core/partials/_demo-object.js
      demo.initContactUsMap2();
    });
  </script>
</body>

</html>