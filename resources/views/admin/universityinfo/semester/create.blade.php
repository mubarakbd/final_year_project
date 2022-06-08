@extends("admin.layouts.app")
@section('contents')
<section class="section">
    <div class="section-header">
        <h1>Semester Add</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('semester.store')}}">
                            @csrf
                            <div class="form-group mb-3">
                                <label>Department Name</label>
                                <input type="text" class="form-control" name="semester_name" value="" autofocus placeholder="Enter Department">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Add Semester</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection