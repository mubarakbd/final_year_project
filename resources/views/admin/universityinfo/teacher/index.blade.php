@extends('admin.layouts.app')
@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>All Faculty Infromation</h1>
            <div class="ml-auto">
                <a href="{{ url('/admin/faculty/create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>Add
                    Faculty</a>
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
                                            <th>Faculty Name</th>
                                             <th>Designation</th>
                                             <th>Email</th>
                                             <th>Phone</th>
                                             <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        </tr>
                                         @php($i = 1)
                                        @foreach ($fac_list as $fac)
                                       
                                        
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{ $fac->f_name }}</td>
                                                <td>{{ $fac->f_desgination }}</td>
                                                <td>{{ $fac->f_email }}</td>
                                                <td>{{ $fac->f_phone }}</td>
                                                <td> <img style="width: 70px" height="70px" src="{{asset("storage/$fac->f_image")}}" alt="image"  ></td> 

                                                <td class="pt_10 pb_10">
                                                    <a href="{{ url("/admin/faculty/$fac->id/edit") }}" class="btn btn-info">Edit</a>
                                                    
                                                    <form action="{{ url("/admin/faculty/$fac->id") }}" method="post" style="display:inline"
                                                        onSubmit="return confirm('Are you sure you want to delete?')">
                                                        @csrf
                                                        @method("delete")
                                                        <input type="submit" class="btn btn-danger" value="Delete" id="delete">
                                                    </form>
                                                    </td>
        
                                            </tr>
                                        @endforeach 
                                     
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
