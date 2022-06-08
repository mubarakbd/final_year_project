@extends('admin.layouts.app')
@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>All Semester Course Details</h1>
            <div class="ml-auto">
                <a href="{{ url('/admin/semester_courses') }}" class="btn btn-primary"><i
                        class="fas fa-plus"></i>Semester Courese</a>
            </div>
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
                                            <th>SL</th>
                                            <th>Course Name</th>
                                            <th>Course Code</th>
                                            <th>Course Credit</th>
                                            <th>Course Teacher</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        </tr>
                                        @php
                                        $i=0;
                                    @endphp
                                    @if( count($semester_course_list) > 0 )
                                        @foreach ($semester_course_list as $item)
                                            @php
                                            $i++;
                                        @endphp
                                            <tr>
                                                {{-- <td>{{ $semester_list->firstItem() + $loop->index }}</td> --}}

                                                {{-- <td>{{ $item->coursedetalis ? $item->coursedetalis->course_id : '' }}
                                                </td>
                                                <td>{{ $item->coursedetalis ? $item->coursedetalis->course_code : '' }}
                                                </td>
                                                <td>{{ $item->coursedetalis ? $item->coursedetalis->course_credit : '' }}
                                                </td>
                                                <td>{{ $item->facilities ? $item->facilities->f_name : '' }}</td> --}}
                                                <td>{{$i}}</td>
                                                <td>{{ $item->course_offers ? $item->course_offers->course_name: "" }}</td>
                                                
                                                <td>{{ $item->course_offers ? $item->course_offers->course_code : "" }}</td>
                                                <td>{{ $item->course_offers ? $item->course_offers->course_credit : "" }}</td> 
                                                <td>{{ $item->teachers ? $item->teachers->f_name : "" }}</td>
                                              
                                                <td>
                            
                                                    <form action="{{ url("/admin/semester_courses/$item->id") }}" method="post" style="display:inline"
                                                        onSubmit="return confirm('Are you sure you want to delete?')">
                                                        @csrf
                                                        @method("delete")
                                                        <input type="submit" class="btn btn-danger" value="Delete" id="delete">
                                                    </form>
                                                </td>

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
