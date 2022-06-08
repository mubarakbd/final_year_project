@extends("admin.layouts.app")
@section('contents')
<section class="section">
    <div class="section-header">
        <h1>Faculty Information Add</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('faculty.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label>Faculty Name</label>
                                <input type="text" class="form-control" name="f_name" value="" autofocus placeholder="Enter Name">
                            </div>
                            <div class="form-group mb-3">
                                <label>Desgination</label>
                                <input type="text" class="form-control" name="f_desgination" value="" autofocus placeholder="Enter Desgination">
                            </div>
                            <div class="form-group mb-3">
                                <label>Faculty Email</label>
                                <input type="email" class="form-control" name="f_email" value="" autofocus placeholder="Enter Email">
                            </div>
                            <div class="form-group mb-3">
                                <label>Faculty Phone</label>
                                <input type="number" class="form-control" name="f_phone" value="" autofocus placeholder="Enter Phone">
                            </div>
                      

                            
                            <div class="form-group mb-3">
                                <label>Photo</label>
                                <div>
                                    <input type="file" name="f_image">
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Add Infroamtion</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection