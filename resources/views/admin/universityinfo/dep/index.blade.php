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
                                            <th>Department Name</th>
                                            <th>Program Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i =0 ;
                                        @endphp
                                        @if (count($dep_list) > 0)
                                          @foreach ($dep_list as $dep)
                                              @php
                                                  $i++
                                              @endphp        
                                     
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$dep->dep_name}}</td>
                                            <td>{{$dep->program_name}}</td>

                                            <td class="pt_10 pb_10">
                                            <a href="{{ url("/admin/department/$dep->id/edit") }}" class="btn btn-info">Edit</a>
                                            <form action="{{ url("/admin/department/$dep->id") }}" method="post" style="display:inline"
                                                onSubmit="return confirm('Are you sure you want to delete?')">
                                                @csrf
                                                @method("delete")
                                                <input type="submit" class="btn btn-danger" value="Delete" id="delete">
                                            </form>
                                            </td>

                                           
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        {{"No data found"}}
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
