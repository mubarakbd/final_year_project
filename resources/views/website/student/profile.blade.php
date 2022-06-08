@extends("website.layouts.app");
@section("contents")
<div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
       <h1>Your Information</h1>
       
    </div>
  </div>
  <section id="contact" class="contact">
    <div class="py-2 px-2">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="#">
                            <div class="row">
                           
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label class="form-label">Name </label>
                                        <input type="text" class="form-control" name="name" value="{{ Auth::guard('student')->user()->name }}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Email *</label>
                                        <input type="text" class="form-control" name="email"  value="{{ Auth::guard('student')->user()->email }}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Email *</label>
                                        <input type="text" class="form-control" name="reg_number"  value="{{ Auth::guard('student')->user()->reg_number }}">
                                    </div>
            
                                    <div class="mb-4">
                                        <label class="form-label"></label>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
    </div>
            
  </div>
    </div>
 
@endsection










 

