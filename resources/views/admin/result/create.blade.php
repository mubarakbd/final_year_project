@extends("admin.layouts.app")
@section('contents')
<section class="section">
    <div class="section-header">
        <h1>Grad Points Marks Add</h1>
        
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        
                        <form method="POST" action="{{ route('grad_point.store')}}">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" name="marks"  class="form-control" value="" autofocus placeholder="Enter Makrs">
                            </div>
                            <div class="form-group mb-3">
                                <label>Letter Grad</label>
                                <input type="text" name="letter_grad"  class="form-control" value="" autofocus placeholder="Enter Letter Gard">
                            </div>



                            <div class="form-group mb-3">
                                <label>Grad Point</label>
                                <input type="text" name="grad_point" class="form-control"  value="" autofocus placeholder="Enter Grad point">
                            </div>

                         
                           
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Add Grad Point</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection