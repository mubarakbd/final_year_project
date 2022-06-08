<footer id="footer">
    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Neub Online Course</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
        
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset("website/assets/vendor/purecounter/purecounter.js")}}"></script>
  <script src="{{asset("website/assets/vendor/aos/aos.js")}}"></script>
  <script src="{{asset("website/assets/vendor/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
  <script src="{{asset("website/assets/vendor/swiper/swiper-bundle.min.js")}}"></script>
  <script src="{{asset("website/assets/vendor/php-email-form/validate.js")}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset("website/assets/js/main.js")}}"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <script>
      @if (Session::has('message'))
          var type = "{{ Session::get('alert-type', 'info') }}"
          switch(type){
          case 'info':
          toastr.info(" {{ Session::get('message') }} ");
          break;
      
          case 'success':
          toastr.success(" {{ Session::get('message') }} ");
          break;
      
          case 'warning':
          toastr.warning(" {{ Session::get('message') }} ");
          break;
      
          case 'error':
          toastr.error(" {{ Session::get('message') }} ");
          break;
          }
      @endif
  </script>
</body>
</html>


</body>

</html>