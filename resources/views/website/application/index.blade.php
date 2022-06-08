@extends("website.layouts.app");
@section("contents")
<div class="breadcrumbs" data-aos="fade-in">
  <div class="container">
      <h2>Application Form</h2>
  </div>
</div>

<section id="contact" class="contact">
  
    <div class="container" data-aos="fade-up">

      <div class="row mt-5 justify-content-center">

        @if (Session::has('success'))
        <div class="alert alert-primary text-center" role="alert">
         {{session::get('success')}}
        </div>

    @endif
        <div class="col-lg-8 mt-5 mt-lg-0">

          <form action="{{ route('application.form.store')}}" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" class="@error('name') is-invalid @enderror"  placeholder="Your Name"  >
              </div>
              @error('name')
              <p class="text-danger text-capitalize">{{ $message }}</p>
              @enderror
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" class="@error('email') is-invalid @enderror"  placeholder="Your Email" >
              </div>
              @error('email')
              <p class="text-danger text-capitalize">{{ $message }}</p>
              @enderror
            </div>
           
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="subject" id="subject"  class="@error('subject') is-invalid @enderror"  placeholder="Subject" >
            </div>
            @error('subject')
            <p class="text-danger text-capitalize">{{ $message }}</p>
            @enderror
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" rows="5" placeholder="Message" ></textarea class="@error('message') is-invalid @enderror">
            </div>
            @error('message')
            <p class="text-danger text-capitalize">{{ $message }}</p>
            @enderror
            {{-- <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div> --}}
            <br>
            <div class="text-center"><button class="btn btn-primary" type="submit">Send Message</button></div>
          </form>

        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->

   
@endsection