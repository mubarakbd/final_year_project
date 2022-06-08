@extends("admin.layouts.app")
@section('contents')
<section class="section">
    <div class="section-header">
        <h1>Course Of All Semester</h1>
        <div class="ml-auto">
            <a href="{{ route('import_course')}}" class="btn btn-primary"><i class="fas fa-plus"></i>Upload Course CSV File</a>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('semester_courses.store')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Enter Session</label>
                                        <input type="text" class="form-control" name="session_name" value="" autofocus placeholder="Enter Session">
                                    </div>                  
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Session Year</label>
                                        <input type="number" min="1900" max="3000" step="1" value="2022"class="form-control" name="session_year" value="" autofocus />
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Semester</label>
                                        <div class="controls">
                                            <select name="semester_id" class="form-control"
                                                class="@error('semester_id') is-invalid @enderror">
                                                <option value="" selected="" disabled="">Select Semester</option>
                                                @foreach ($semester_list as $item )
                                                <option value="{{$item->id}}">{{$item->semester_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @error('semester_id')
                                    <p class="text-danger text-capitalize">{{ $message }}</p>
                                    @enderror
                                </div>
                
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="add_item">
                                        <div class="form-group">
                                            <label for="">Teacher Name</label>
                                            <div class="controls">
                                                <select name="teacher_id[]" class="form-control"
                                                    class="@error('teacher_id') is-invalid @enderror">
                                                    <option value="" selected="" disabled="">Select Teacher</option>
                                                    @foreach ($fac_list as $item )
                                                    <option value="{{$item->id}}">{{$item->f_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        @error('teacher_id')
                                        <p class="text-danger text-capitalize">{{ $message }}</p>
                                        @enderror
                                        <div class="row">
                                            <div class="col-md-3">
                
                                                <div class="form-group">
                                                    <label for="">Course Name</label>
                                                    <div class="controls">
                                                        <select id="course_name" name="course_id[]" class="form-control course_name"
                                                            class="@error('course_id') is-invalid @enderror">
                                                            <option value="" selected="" disabled="">Select Course Name</option>
                                                            @foreach ($course_offer_list as $item )
                                                            <option value="{{$item->id}}">{{$item->course_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                @error('course_id')
                                                <p class="text-danger text-capitalize">{{ $message }}</p>
                                                @enderror
                
                                            </div>
                
                                            <div class="col-md-3">
                
                                                <div class="form-group">
                                                    <label for="">Course Code</label>
                                                    <div class="controls">
                                                        <select name="course_code[]" id="course_code" class="form-control course_code"
                                                            class="@error('course_code') is-invalid @enderror">
                                                            <option value="" selected="" disabled="">Select Course Code</option>
                                                            @foreach ($course_offer_list as $item )
                                                            <option value="{{$item->id}}">{{$item->course_code}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                @error('course_code')
                                                <p class="text-danger text-capitalize">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                
                                                <div class="form-group">
                                                    <label for="">Course Credit</label>
                                                    <div class="controls">
                                                        <select name="course_credit[]" id="course_credit"
                                                            class="form-control course_credit">
                                                            <option value="" selected="" disabled="">Select Credit</option>
                                                            @foreach ($course_offer_list as $item )
                                                            <option value="{{$item->id}}">{{$item->course_credit}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                @error('course_credit')
                                                <p class="text-danger text-capitalize">{{ $message }}</p>
                                                @enderror
                
                                            </div>
                                            
                                            <div class="col-md-1" style="padding-top: 42px;">
                                                <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i> </span>
                                            </div>
                
                                        </div>
                                
                                </div>
                            
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                </div>
                                </div>
                            </div>
                        </form>
                        <div style="visibility: hidden;">
                            <div class="whole_extra_item_add" id="whole_extra_item_add">
                                <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                                    <div class="form-row appended_row">
                                    
                                        <div class="col-md-5">
                
                                            <div class="form-group">
                                                <label for="">Course Name</label>
                                                <div class="controls">
                                                    <select name="course_id[]" class="form-control course_name">
                                                        <option value="" selected="" disabled="">Select Course Name</option>
                                                        @foreach ($course_offer_list as $item )
                                                        <option value="{{$item->id}}">{{$item->course_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                
                                        <div class="col-md-3">
                
                                            <div class="form-group">
                                                <label for="">Course Code</label>
                                                <div class="controls">
                                                    <select name="course_code[]" class="form-control course_code">
                                                        <option value="" selected="" disabled="">Select Course Code</option>
                                                        @foreach ($course_offer_list as $item )
                
                                                        <option value="{{$item->id}}">{{$item->course_code}}</option>
                                                        @endforeach
                
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                
                                            <div class="form-group">
                                                <label for="">Course Credit</label>
                                                <select name="course_credit[]" id="course_credit" class="form-control course_credit"
                                               >
                                                    <option value="" selected="" disabled="">Select Credit</option>
                                                    @foreach ($course_offer_list as $item )
                                                    <option value="{{$item->id}}">{{$item->course_credit}}</option>
                                                    @endforeach
                                                </select>
                
                                            </div>
                                        </div>
                
                                        <div class="col-md-2" style="padding-top: 42px;">
                                            <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i> </span>
                                            <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i> </span>
                                        </div>
                
                                        <div class="form-group">
                                            <label for="">Teacher Name</label>
                                            <div class="controls">
                                                <select name="teacher_id[]" class="form-control"
                                                    class="@error('teacher_id') is-invalid @enderror" style="width: 990px">
                                                    <option value="" selected="" disabled="">Select Teacher</option>
                                                    @foreach ($fac_list as $item )
                                                    <option value="{{$item->id}}">{{$item->f_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                       
                                    </div>
                                   
                                    </div>
                                </div>
                            </div>
                        </div>
                
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(document).ready(function () {
        var counter = 0;
        $(document).on("click", ".addeventmore", function () {
            var whole_extra_item_add = $('#whole_extra_item_add').html();
            $(this).closest(".add_item").append(whole_extra_item_add);
            counter++;
            $(".course_name").on('change', function () {
                var val = $(this).find(":selected").val();
                $(this).closest("div.appended_row").find(".course_code").val(val);
                $(this).closest("div.appended_row").find(".course_credit").val(val);
            });
      
      
        });
        $(document).on("click", '.removeeventmore', function (event) {
            $(this).closest(".delete_whole_extra_item_add").remove();
            counter -= 1
        });

        $(".course_name").on('change', function () {
            var val = $(this).find(":selected").val();
            $(this).closest("div.row").find(".course_code").val(val);
            $(this).closest("div.row").find(".course_credit").val(val);
        });
  

    });

</script>
@endsection










