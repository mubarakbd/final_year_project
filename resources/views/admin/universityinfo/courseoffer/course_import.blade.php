@extends("admin.layouts.app")
@section("contents")
    

<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('import_course.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Upload Course CSV File</label>
                            <div>
                                <input type="file" name="file" class=" form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Upload CSV File</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>










@endsection