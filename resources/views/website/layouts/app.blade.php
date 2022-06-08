
@include("website.layouts.header")
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h6 class="logo me-auto"><a href="{{ route('student.dashboard') }}">NeubOCR</a></h6>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      @include("website.layouts.topbar")



    </div>
  </header><!-- End Header -->

  

  <main id="main">
    @yield("contents")

  </main><!-- End #main -->



  <!-- ======= Footer ======= -->
 @include("website.layouts.footer")