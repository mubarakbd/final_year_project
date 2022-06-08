@extends("admin.layouts.app")
@section('contents')
<section class="section">
    <div class="section-header">
        <h1>Faculty Information Update</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{url("/admin/faculty/$fac->id") }}" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")
                            <div class="form-group mb-3">
                                <label>Faculty Name</label>
                                <input type="text" class="form-control" name="f_name" value="{{$fac->f_name}}" autofocus placeholder="Enter Name">
                            </div>
                            <div class="form-group mb-3">
                                <label>Desgination</label>
                                <input type="text" class="form-control" name="f_desgination" value="{{$fac->f_desgination}}" autofocus placeholder="Enter Desgination">
                            </div>
                            <div class="form-group mb-3">
                                <label>Faculty Email</label>
                                <input type="email" class="form-control" name="f_email" value="{{$fac->f_email}}" autofocus placeholder="Enter Email">
                            </div>
                            <div class="form-group mb-3">
                                <label>Faculty Phone</label>
                                <input type="number" class="form-control" name="f_phone" value="{{$fac->f_phone}}" autofocus placeholder="Enter Phone">
                            </div>
                          
                            <div class="form-group mb-3">
                                <label>Photo</label>
                                <div>
                                    <input type="file" value="{{$fac->f_image}}}" name="f_image">
                                </div>
                            </div>


                            
                          
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update Infroamtion</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection