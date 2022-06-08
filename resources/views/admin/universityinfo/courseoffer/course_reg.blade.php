@extends('admin.layouts.app')
@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>All  Course  Registation Information</h1>
            <div class="ml-auto">
                
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
                                             <th>Student Registration Number</th>
                                             <th>Action</th>
                                             
                                        </tr>
                                    </thead>
                                    <tbody>
                                        </tr>
                                        @php
                                        $i=0;
                                    @endphp
                                    @if( count($student_reg) > 0 )
                                        @foreach ( $student_reg as $streg )
                                        @php
                                            $i++;
                                        @endphp

                                             <tr>

                                                 <td>{{$i}}</td>
                                            
                                                 <td>{{ $streg->students ? $streg->students->reg_number: "" }}</td>
                                              

        
                                             
                                     <td>                   
                                         <a href="{{ route("course_reg_detalis",$streg->reg_number) }}" class="btn btn-primary">Detalis</a>
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
