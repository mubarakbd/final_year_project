@extends('admin.layouts.app')
@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>All Course Registation Details</h1>
            
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                        
                                            <th>Name</th>
                                            <th>Dep Name</th>
                                            <th>Program</th>
                                            <th>Semester</th>
                                            <th>Course Name</th>
                                            <th>Course Code</th>
                                            <th>Course Credit</th>
                                            <th> Course Status</th>
                                            <td>Descion Process</td>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        </tr>
                                      
                                        @if( count($course_reg_list) > 0 )
                                        @foreach ($course_reg_list as $item)
                                          
                                            <tr>
                                                {{-- <td>{{ $semester_list->firstItem() + $loop->index }}</td> --}}

                                                {{-- <td>{{ $item->coursedetalis ? $item->coursedetalis->course_id : '' }}
                                                </td>
                                                <td>{{ $item->coursedetalis ? $item->coursedetalis->course_code : '' }}
                                                </td>
                                                <td>{{ $item->coursedetalis ? $item->coursedetalis->course_credit : '' }}
                                                </td>
                                                <td>{{ $item->facilities ? $item->facilities->f_name : '' }}</td> --}}
                                             
                                               
                                                
                                                <td>{{ $item->students ? $item->students->name : "" }}</td>
                                              
                                                <td>{{ $item->departments ? $item->departments->dep_name : "" }}</td>

                                                <td>{{ $item->departments ? $item->departments->program_name : "" }}</td>
                                                <td>{{ $item->semesters ? $item->semesters->semester_name : "" }}</td>

                                                <td>{{ $item->course_offers ? $item->course_offers->course_name : "" }}</td> 

                                                <td>{{ $item->course_offers ? $item->course_offers->course_code : "" }}</td> 

                                                <td>{{ $item->course_offers ? $item->course_offers->course_credit : "" }}</td> 
                                           
                                                <td>{{ App\Enums\CourseType::getDescription($item->status) }}</td>
                                                
                                            
                                                @if($item->confirmed==1)   
                                                <td class="text-success"><p>Approved</p></td>
                                                @else
                                                <td class="text-danger"><p>Pending for Approved</p></td>
                                                @endif
{{-- 
                                          <td class="pt_10 pb_10">
                                              <a href="{{ route('testimonial.edit', ['id'=>$testimonial->id]) }}" class="btn btn-info">Edit</a>
                                              <a href="{{ route('testimonial.delete', ['id'=>$testimonial->id]) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
                                          </td> --}}
                                          <td class="pt_10 pb_10">
                                              @if($item->confirmed==1)
                                              <a style="pointer-events:none" href="{{ route('course.approved', ['id'=>$item->id]) }}" class="btn btn-success" disabled>Approved</a>
                                              @else
                                              <a href="{{ route('course.approved', ['id'=>$item->id]) }}" class="btn btn-info">Aprroved</a>
                                              @endif
                                                 
                                              @if($item->confirmed==0)
                                              <a style="pointer-events:none" href="{{ route('course.Unapproved', ['id'=>$item->id]) }}" class="btn btn-warning btn-sm">Unapproved</a>
                                              @else
                                              <a  href="{{ route('course.Unapproved', ['id'=>$item->id]) }}" class="btn btn-danger btn-sm" >Unapproved</a>
                                              @endif
                                             
                                                {{-- <td class="pt_10 pb_10">
                                                    <a href="{{ url("/admin/semester/$semester->id/edit") }}"
                                                        class="btn btn-info">Edit</a>
                                                    <form action="{{ url("/admin/semester/$semester->id") }}"
                                                        method="post" style="display:inline"
                                                        onSubmit="return confirm('Are you sure you want to delete?')">
                                                        @csrf
                                                        @method('delete')
                                                        <input type="submit" class="btn btn-danger" value="Delete"
                                                            id="delete">
                                                    </form>
                                                </td> --}}

                                            </tr>
                                            @endforeach
                                            @else
                                            {{"No data found"}}
                                        @endif
                                </table>
                                
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
