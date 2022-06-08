@extends('admin.layouts.app')
@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>All Course Offer Infromation</h1>
            <div class="ml-auto">
                <a href="{{ url('/admin/course_offer/create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>Add
                    Course</a>
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
                                             <th>Session/Year</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        </tr>
                                         @php($i = 1)

                                        @foreach ($course_list as $course)
                                            <tr>
                                                <td>{{ $course_list->firstItem() + $loop->index }}</td>
                                                <td>{{ $course->course_name }}</td>
                                                <td>{{ $course->course_code }}</td>
                                                <td>{{ $course->course_credit }}</td>
                                                <td>{{ $course->session_name }} 
                                                    {{$course->session_year}}
                                                
                                                 </td>
                                               
                                            </tr>
                                        @endforeach 
                                </table>
                                <div class="pt-5 float-right">
                                    {{ $course_list->links() }}
                                </div>
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
