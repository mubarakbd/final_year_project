@extends("admin.layouts.app")
@section('contents')
<section class="section">
    <div class="section-header">
        <h1>Department Add</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{url("/admin/department/$dep->id") }}">
                            @csrf
                            @method("PUT")
                            <div class="form-group mb-3">
                                <label>Department Name</label>
                                <input type="text" class="form-control" name="dep_name" value="{{$dep->dep_name}}">
                            </div>
                            
                            <div class="form-group mb-3">
                                <label>Program Name</label>
                                <input type="text" class="form-control" name="program_name" value="{{$dep->program_name}}" >
                            </div>
                           
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Updatee Department</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection