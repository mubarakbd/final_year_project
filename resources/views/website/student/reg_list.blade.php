@extends('admin.layouts.app')
@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>All Semester Course Registarion Details</h1>
            
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
                                            <th>Registraion Number</th>
                                            <th>Course Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        </tr>
                                        @php
                                        $i=0;
                                    @endphp
                                    @if( count($course_reg_list) > 0 )
                                        @foreach ($course_reg_list as $item)
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
                                                <td>{{ $item->students ? $item->students->reg_number: "" }}</td>
                                                    { <td>
                                                    <a href="{{ route('course_reg_detalis', $item->reg_number) }}" class="btn btn-info"> Delatlis</a>
                                                
                                                 
                                                    
                                                    
                                             

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
