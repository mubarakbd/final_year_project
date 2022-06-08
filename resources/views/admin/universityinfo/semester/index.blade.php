@extends('admin.layouts.app')
@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>All Semester Infromation</h1>
            <div class="ml-auto">
                <a href="{{ url('/admin/semester/create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>Add
                    Semester</a>
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
                                            <th>Semester Name</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        </tr>
                                        @php($i = 1)

                                        @foreach ($semester_list as $semester)
                                            <tr>
                                                <td>{{ $semester_list->firstItem() + $loop->index }}</td>
                                                <td>{{ $semester->semester_name }}</td>
                                                <td class="pt_10 pb_10">
                                                    <a href="{{ url("/admin/semester/$semester->id/edit") }}" class="btn btn-info">Edit</a>
                                                    <form action="{{ url("/admin/semester/$semester->id") }}" method="post" style="display:inline"
                                                        onSubmit="return confirm('Are you sure you want to delete?')">
                                                        @csrf
                                                        @method("delete")
                                                        <input type="submit" class="btn btn-danger" value="Delete" id="delete">
                                                    </form>
                                                    </td>
        
                                            </tr>
                                        @endforeach
                                </table>
                                <div class="pt-5 float-right">
                                    {{ $semester_list->links() }}
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
