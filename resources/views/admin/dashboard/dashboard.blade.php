@extends("admin.layouts.app")
@section('contents')

<section class="section">
    <div class="section-header">
        <h1>All Information Of North East University Bangladesh </h1>
    </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header"><h2 style="color: rebeccapurple; font-weight: 900">All Students List</h2></div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                               <th>Sl</th>
                                                 <th>Student Name</th>
                                                 <th>Student Registation Number</th>
                                                 <th>Email</th>
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            </tr>
                                          
                                            @php
                                            $i=0;
                                        @endphp
                                        @if( count($student_list) > 0 )
                                            @foreach ( $student_list as $st )
                                            @php
                                                $i++;
                                            @endphp
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>@if($st->name) {{$st->name}} @else {{'no data found'}} @endif</td>
                                              
                                                <td>@if($st->reg_number) {{$st->reg_number}} @else {{'no data found'}} @endif</td>
                                                <td>@if($st->email) {{$st->email}} @else {{'no data found'}} @endif</td>
                                           
                                            </tr>
                                            @endforeach
                                            @else
                                            {{"No data found from your account"}}
                                        @endif
                                    </table>
                                    <div class="pt-5 float-right">
                                     
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
    
