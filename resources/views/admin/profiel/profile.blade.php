
@extends('admin.layouts.app')
@section('contents')
  <section class="section">
    <div class="section-header">
        <h1>Edit Profile</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST"  action="{{ route('admin_profile_edit')}}"enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    @if(Auth::guard('admin')->user()->image)
                                    <img src="{{ asset('admin/uploads/'.Auth::guard('admin')->user()->image) }}" alt="" class="profile-photo w_100_p">  
                                    @else
                                    <img src="{{ asset('admin/uploads/default.png') }}" alt="" class="profile-photo w_100_p">
                                    @endif
                                    <input type="file" class="form-control mt_10" name="image">
                                </div>
                                <div class="col-md-9">
                                    <div class="mb-4">
                                        <label class="form-label">Name *</label>
                                        <input type="text" class="form-control" name="name" value="{{ Auth::guard('admin')->user()->name }}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Email *</label>
                                        <input type="text" class="form-control" name="email" value="{{ Auth::guard('admin')->user()->email }}">
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
</section> 
@endsection







