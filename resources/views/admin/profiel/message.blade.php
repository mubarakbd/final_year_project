@extends('admin.layouts.app')
@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>All Department Infromation</h1>
            <div class="ml-auto">
                <a href="{{ url('/admin/department/create')}}" class="btn btn-primary"><i class="fas fa-plus"></i>Add Department</a>
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
                                            <th>User Name</th>
                                            <th>User Email</th>
                                           
                                             <th>Message Subject</th>
                                             <th>Message Detalis</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i =0 ;
                                        @endphp
                                        @if (count($st_message) > 0)
                                          @foreach ($st_message as $dep)
                                              @php
                                                  $i++
                                              @endphp        
                                     
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$dep->name}}</td>
                                            <td>{{$dep->email}}</td>
                                          
                                            <td>{{$dep->message}}</td>
                                           

                                           
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        {{"No Message found"}}
                                    @endif
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
