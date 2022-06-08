@extends("admin.layouts.app")
@section('contents')
<section class="section">
    <div class="section-header">
        <h1>Course Add</h1>
        <div class="ml-auto">
            <a href="{{ route('import_course')}}" class="btn btn-primary"><i class="fas fa-plus"></i>Upload Course CSV File</a>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('course_offer.store')}}">
                            @csrf
                            
                        </form>
                        <form method="POST" action="{{ route('course_offer.store')}}">
                            @csrf
                    

                            <div class="form-group mb-3">
                                <input type="text" class="form-control" name="course_name" value="" autofocus placeholder="Enter Course Name">
                            </div>
                            <div class="form-group mb-3">
                                <label>Course Code</label>
                                <input type="text" class="form-control" name="course_code" value="" autofocus placeholder="Enter Course Code">
                            </div>
                            <div class="form-group mb-3">
                                <label>Course Credit</label>
                                <input type="text" class="form-control" name="course_credit" value="" autofocus placeholder="Enter Course Credit">
                            </div>

                            {{-- <div class="form-group mb-3">
                                <label for="">Course Teacher</label>           
                                    <select id="teacher_id" name="teacher_id" class="form-control">
                                        <option value="" selected="" disabled="">Select Course Teacher</option>
                                        @foreach ($fac_list as $item )
                                        <option value="{{$item->id}}">{{$item->f_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Semester Name</label>           
                                        <select id="teacher_id" name="teacher_id" class="form-control">
                                            <option value="" selected="" disabled="">Select Course Teacher</option>
                                            @foreach ($fac_list as $item )
                                            <option value="{{$item->id}}">{{$item->f_name}}</option>
                                            @endforeach
                                        </select>
                                    </div> --}}
                           
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Add Course</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection