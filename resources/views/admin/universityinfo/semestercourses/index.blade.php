@extends('admin.layouts.app')
@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>All Semester Course Offer Information Infromation</h1>
            <div class="ml-auto">
                <a href="{{ url('/admin/semester_courses/create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>Add
                    Semester Course</a>
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
                                            <th>Session</th>
                                             <th>Semester Name</th>
                                             <th>Action</th>
                                             
                                        </tr>
                                    </thead>
                                    <tbody>
                                        </tr>
                                        @php
                                        $i=0;
                                    @endphp
                                    @if( count($semester_course) > 0 )
                                        @foreach ( $semester_course as $course )
                                        @php
                                            $i++;
                                        @endphp

                                             <tr>

                                                 <td>{{$i}}</td>
                                                 <td>
                                                    {{$course->session_name}} {{$course->session_year}}
                                                </td>
                                               <td>
                                            {{ $course->semesters ? $course->semesters->semester_name : '' }}
                                                
                                               </td>
                                             
                                             
                                     <td>                   
                                <a href="{{ route("course_offer.detalis",$course->semester_id) }}" class="btn btn-primary">Detalis</a>
                                              </td>
                                        @endforeach 
                                        @else
                                        {{"No data found from your account"}}
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
