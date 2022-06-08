@extends("website.layouts.app");
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@section("contents")
<div class="breadcrumbs" data-aos="fade-in">
    <div class="container">
       <h1>North East University Bangladesh Sylhet</h1>
       <h2>Course Registration Form</h2>
        <h3 class="text-danger font-bold">Spring 2022</h3>
    </div>
  </div><!-- End Breadcrumbs -->

  
  <section id="contact" class="contact">
    <div class="py-2 px-2">
    <div class="container bg-light text-black" data-aos="fade-up">
        
            <form method="POST" action="{{ route('student_course_reg.store')}}">
                @csrf
                 <div class="row">
                     <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="">Department</label>           
                            <select id="dep_name" name="dep_name" class="form-control dep_name" class="@error('dep') is-invalid @enderror">
                                    <option value="" selected="" disabled="">Select Department</option>
                                    @foreach ($dep_list as $item )
                                    <option value="{{$item->id}}">{{$item->dep_name}}</option>
                                    @endforeach
                                </select>
                            </div> 
                         @error('dep_name')
                         <p class="text-danger text-capitalize">{{ $message }}</p>
                         @enderror
                     </div>

                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">Program Name</label>           
                                <select id="program_name" name="program_name" class="form-control program_name">
                                        <option value="" selected="" disabled=""></option>
                                        @foreach ($dep_list as $item )
                                        <option value="{{$item->id}}">{{$item->program_name}}</option>
                                        @endforeach
                                    </select>
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
                
              
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Registration Number</label>
                        <div class="controls">
                             <select id="reg_number" name="reg_number" class="form-control reg_number" class="@error('reg_number') is-invalid @enderror">
                                <option value="" selected="" disabled=""></option>
                                @foreach ($student_list as $item )
                                <option value="{{$item->id}}">{{$item->reg_number}}</option>
                                @endforeach
                            </select> 
                            {{-- <input type="reg_number" name="reg_number" value=" {{Auth::guard('student')->user()->reg_number}}" id="" class="form-control"> --}}
                        </div>
                    </div>
                    @error('reg_number')
                    <p class="text-danger text-capitalize">{{ $message }}</p>
                    @enderror
                </div>
            
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Name</label>
                        <div class="controls">
                             <select id="name" name="name" class="form-control name">
                                <option value="" selected="" disabled=""></option>
                                @foreach ($student_list as $item )
                                <option  value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select> 
                            {{-- <input type="text" name="name" value=" {{Auth::guard('student')->user()->name}}" id="" class="form-control"> --}}
                        </div>
                    </div>
                    @error('name')
                    <p class="text-danger text-capitalize">{{ $message }}</p>
                    @enderror
                </div>
            </div>
          
                 <div class="row">
                    <div class="col-12">
                        <div class="add_item">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Course Name</label>
                                        <div class="controls">
                                            <select id="course_name" name="course_id[]" class="form-control course_name"
                                                class="@error('course_id') is-invalid @enderror">
                                                <option value="" selected="" disabled="">Select Course Name</option>
                                                @foreach ($course_offer as $item )
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
                                            <select id="course_code" name="course_code[]" class="form-control course_code">
                                                <option value="" selected="" disabled=""></option>
                                                @foreach ($course_offer as $item )
                                                <option value="{{$item->id}}">{{$item->course_code}}</option>
                                                @endforeach
                                               
                                            </select>
                                        </div>
                                    </div>
                           
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Course Credit</label>
                                        <div class="controls">
                                            <select id="course_credit" name="course_credit[]" class="form-control course_credit">
                                                <option value="" selected="" disabled=""></option>
                                                @foreach ($course_offer as $item )
                                                <option value="{{$item->id}}">{{$item->course_credit}}</option>
                                                @endforeach
                                               
                                            </select>
                                        </div>
                                    </div>
                               
    
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">If you have</label>
                                        <div class="controls">
                                            <select name="status" class="form-control">
                                                <option value=""></option>
                                                @foreach ($course_status as $key =>$status)
                                                    <option value="{{ $key }}" {{ old('status')==$key ? 'selected' : '' }}>{{ $status }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
    
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Course Name</label>
                                        <div class="controls">
                                            <select id="course_name" name="course_id[]" class="form-control course_name"
                                                class="@error('course_id') is-invalid @enderror">
                                                <option value="" selected="" disabled="">Select Course Name</option>
                                                @foreach ($course_offer as $item )
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
                                            <select id="course_code" name="course_code[]" class="form-control course_code">
                                                <option value="" selected="" disabled=""></option>
                                                @foreach ($course_offer as $item )
                                                <option value="{{$item->id}}">{{$item->course_code}}</option>
                                                @endforeach
                                               
                                            </select>
                                        </div>
                                    </div>
                           
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Course Credit</label>
                                        <div class="controls">
                                            <select id="course_credit" name="course_credit[]" class="form-control course_credit">
                                                <option value="" selected="" disabled=""></option>
                                                @foreach ($course_offer as $item )
                                                <option value="{{$item->id}}">{{$item->course_credit}}</option>
                                                @endforeach
                                               
                                            </select>
                                        </div>
                                    </div>
                               
    
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">If you have</label>
                                        <div class="controls">
                                            <select name="status" class="form-control">
                                                <option value=""></option>
                                                @foreach ($course_status as $key =>$status)
                                                    <option value="{{ $key }}" {{ old('status')==$key ? 'selected' : '' }}>{{ $status }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
    
                                </div>
                                
                            </div>

                         <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Course Name</label>
                                        <div class="controls">
                                            <select id="course_name" name="course_id[]" class="form-control course_name"
                                                class="@error('course_id') is-invalid @enderror">
                                                <option value="" selected="" disabled="">Select Course Name</option>
                                                @foreach ($course_offer as $item )
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
                                            <select id="course_code" name="course_code[]" class="form-control course_code">
                                                <option value="" selected="" disabled=""></option>
                                                @foreach ($course_offer as $item )
                                                <option value="{{$item->id}}">{{$item->course_code}}</option>
                                                @endforeach
                                               
                                            </select>
                                        </div>
                                    </div>
                           
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Course Credit</label>
                                        <div class="controls">
                                            <select id="course_credit" name="course_credit[]" class="form-control course_credit">
                                                <option value="" selected="" disabled=""></option>
                                                @foreach ($course_offer as $item )
                                                <option value="{{$item->id}}">{{$item->course_credit}}</option>
                                                @endforeach
                                               
                                            </select>
                                        </div>
                                    </div>
                               
    
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">If you have</label>
                                        <div class="controls">
                                            <select name="status" class="form-control">
                                                <option value=""></option>
                                                @foreach ($course_status as $key =>$status)
                                                    <option value="{{ $key }}" {{ old('status')==$key ? 'selected' : '' }}>{{ $status }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
    
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Course Name</label>
                                        <div class="controls">
                                            <select id="course_name" name="course_id[]" class="form-control course_name"
                                                class="@error('course_id') is-invalid @enderror">
                                                <option value="" selected="" disabled="">Select Course Name</option>
                                                @foreach ($course_offer as $item )
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
                                            <select id="course_code" name="course_code[]" class="form-control course_code">
                                                <option value="" selected="" disabled=""></option>
                                                @foreach ($course_offer as $item )
                                                <option value="{{$item->id}}">{{$item->course_code}}</option>
                                                @endforeach
                                               
                                            </select>
                                        </div>
                                    </div>
                           
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Course Credit</label>
                                        <div class="controls">
                                            <select id="course_credit" name="course_credit[]" class="form-control course_credit">
                                                <option value="" selected="" disabled=""></option>
                                                @foreach ($course_offer as $item )
                                                <option value="{{$item->id}}">{{$item->course_credit}}</option>
                                                @endforeach
                                               
                                            </select>
                                        </div>
                                    </div>
                               
    
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">If you have</label>
                                        <div class="controls">
                                            <select name="status" class="form-control">
                                                <option value=""></option>
                                                @foreach ($course_status as $key =>$status)
                                                    <option value="{{ $key }}" {{ old('status')==$key ? 'selected' : '' }}>{{ $status }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
    
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Course Name</label>
                                        <div class="controls">
                                            <select id="course_name" name="course_id[]" class="form-control course_name"
                                                class="@error('course_id') is-invalid @enderror">
                                                <option value="" selected="" disabled="">Select Course Name</option>
                                                @foreach ($course_offer as $item )
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
                                            <select id="course_code" name="course_code[]" class="form-control course_code">
                                                <option value="" selected="" disabled=""></option>
                                                @foreach ($course_offer as $item )
                                                <option value="{{$item->id}}">{{$item->course_code}}</option>
                                                @endforeach
                                               
                                            </select>
                                        </div>
                                    </div>
                           
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Course Credit</label>
                                        <div class="controls">
                                            <select id="course_credit" name="course_credit[]" class="form-control course_credit">
                                                <option value="" selected="" disabled=""></option>
                                                @foreach ($course_offer as $item )
                                                <option value="{{$item->id}}">{{$item->course_credit}}</option>
                                                @endforeach
                                               
                                            </select>
                                        </div>
                                    </div>
                               
    
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">If you have</label>
                                        <div class="controls">
                                            <select name="status" class="form-control">
                                                <option value=""></option>
                                                @foreach ($course_status as $key =>$status)
                                                    <option value="{{ $key }}" {{ old('status')==$key ? 'selected' : '' }}>{{ $status }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
    
                                </div>
                                
                            </div>

                              <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Course Name</label>
                                        <div class="controls">
                                            <select id="course_name" name="course_id[]" class="form-control course_name"
                                                class="@error('course_id') is-invalid @enderror">
                                                <option value="" selected="" disabled="">Select Course Name</option>
                                                @foreach ($course_offer as $item )
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
                                            <select id="course_code" name="course_code[]" class="form-control course_code">
                                                <option value="" selected="" disabled=""></option>
                                                @foreach ($course_offer as $item )
                                                <option value="{{$item->id}}">{{$item->course_code}}</option>
                                                @endforeach
                                               
                                            </select>
                                        </div>
                                    </div>
                           
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Course Credit</label>
                                        <div class="controls">
                                            <select id="course_credit" name="course_credit[]" class="form-control course_credit">
                                                <option value="" selected="" disabled=""></option>
                                                @foreach ($course_offer as $item )
                                                <option value="{{$item->id}}">{{$item->course_credit}}</option>
                                                @endforeach
                                               
                                            </select>
                                        </div>
                                    </div>
                               
    
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">If you have</label>
                                        <div class="controls">
                                            <select name="status" class="form-control">
                                                <option value=""></option>
                                                @foreach ($course_status as $key =>$status)
                                                    <option value="{{ $key }}" {{ old('status')==$key ? 'selected' : '' }}>{{ $status }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
    
                                </div>
                                
                            </div>
                               
                              
                                
                            <br>
                           
             
                    <div class="form-group mb-2">
                        <input type="submit" class="btn btn-primary" value="Make Course Registration">
                    </div>
            </div>
            </form>
    </div>
       
 
















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
    
                    $(".dep_name").on('change', function () {
                        var val = $(this).find(":selected").val();
                        $(this).closest("div.appended_row").find(".program_name").val(val);
                     
                    });

                    
                    $(".reg_number").on('change', function () {
                        var val = $(this).find(":selected").val();
                        $(this).closest("div.appended_row").find(".name").val(val);
                     
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

                $(".dep_name").on('change', function () {
                    var val = $(this).find(":selected").val();
                    $(this).closest("div.row").find(".program_name").val(val);
                   
                   
                });
                $(".reg_number").on('change', function () {
                    var val = $(this).find(":selected").val();
                    $(this).closest("div.row").find(".name").val(val);
                   
                });
    
    
            });
    
        </script>


  </div>

 
@endsection






