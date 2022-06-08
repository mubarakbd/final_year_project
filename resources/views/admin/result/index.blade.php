@extends('admin.layouts.app')
@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>Marking System With Grad point Letter</h1>
            <div class="ml-auto">
                <a href="{{ url('/admin/grad_point/create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>Add
                    Makes Grad Point and Letter Gard</a>
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
                                             <th>Makes</th>
                                             <th>Letter Grad</th>
                                             <th>Grad Point</th>
                                            
                                             <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        </tr>
                                         @php
                                        $i=0;
                                    @endphp
                                    @if( count($grad_point_list) > 0 )
                                    @foreach ($grad_point_list as $result)
                                        @php
                                            $i++;
                                        @endphp

    
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{ $result->marks }}</td>
                                                <td>{{ $result->letter_grad }}</td>
                                                <td>{{ $result->grad_point }}  </td>
                                                
                                                <td class="pt_10 pb_10">
                                                    <a href="{{ url("/admin/grad_point/$result->id/edit") }}" class="btn btn-info">Edit</a>
                                                    
                                                    <form action="{{ url("/admin/grad_point/$result->id") }}" method="post" style="display:inline"
                                                        onSubmit="return confirm('Are you sure you want to delete?')">
                                                        @csrf
                                                        @method("delete")
                                                        <input type="submit" class="btn btn-danger" value="Delete" id="delete">
                                                    </form>
                                                    </td>
                                                
                                               
                                            </tr>
                                            @endforeach 
                                        @else
                                        {{"No data found from your account"}}
                                    @endif 
                                       
                                </table>
                                <div class="pt-5 float-right">
                                    {{-- {{ $course_list->links() }} --}}
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
