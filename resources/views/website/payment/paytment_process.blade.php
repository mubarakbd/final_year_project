@extends("website.layouts.app")
  @section("contents")
  <div class="py-5">
    <section id="trainers" class="trainers">
        <h2 class="text-center text-dark font-bold">Upload Your Payment Details</h2>
        <hr>
      <div class="container" data-aos="fade-up">
        <div id="trainers" class="trainers">
          <div class="container" data-aos="fade-up">
            <div class="row" data-aos="zoom-in" data-aos-delay="100">
            
            <div class="row">
              <div class="col-md-6">
                <div class="card shadow">
                   <h2></h2>
                  <div class="card-header">
                    <h2>Online Payment Process System</h2>
                  </div>  
                  <div class="card-body text-center text-primary">
                    <h4 style="font-size: 18px">For Bkash</h4>
                       <span>Merchent Account : <strong class="text-danger">+8801755566994</strong><p>Account Name:North East Univeristy Bangldesh</p></span>
                     </div>
                    <hr>
                    <p class="m-2">Payment Processing System</p>
                  
                      <ol>
                          <li>Login Your Bkash App or dial <strong class="text-warning">*247#</strong></li>
                          <li>Select <span class="text-danger">Make Payment</span> option</li>
                          <li>Sleect <span>Merchent Account : <strong class="text-danger">+8801755566994</strong></span></li>
                          <li>Enter Fee Amount</li>
                          <li>Refreance Your <strong class="text-danger">12digits </strong> Reg No</li>
                          <li>Enter Your Pin Number</li>
                          <li>Tap To Confrim Payment</li>
                          <li>After Successfully payment save <span class="text-parimary text-capitalize">Transaction ID,Sender No,Payment Date & Amount</span></li>
                      </ol>
                    
                  </div>
                </div>
                <div class="col-md-6">
                  @if (Session::has('success'))
                  <div class="alert alert-primary" role="alert">
                   {{session::get('success')}}
                  </div>
      
              @endif
                    <form action="{{ route('payment_process.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <div class="controls">
                                <input type="text" name="name" id=""  class="form-control" class="@error('name') is-invalid @enderror" placeholder="Enter Name" >
                            </div>
                        </div>
                        @error('reg_no')
                        <p class="text-danger text-capitalize">{{ $message }}</p>
                        @enderror            
                        <div class="form-group">
                            <label for="">Registration Number</label>
                            <div class="controls">
                                <input type="text" name="reg_number" id="" class="form-control" class="@error('reg_no') is-invalid @enderror" placeholder="Enter Reg_No" >
                            </div>
                        </div>
                        @error('reg_no')
                        <p class="text-danger text-capitalize">{{ $message }}</p>
                        @enderror
                  
                        <div class="form-group">
                            <label for="">Transcation ID</label>
                            <div class="controls">
                                <input type="text" name="trans_id" id="" class="form-control" class="@error('trans_id') is-invalid @enderror" placeholder="Enter Transsction" >
                            </div>
                        </div>
                        @error('trans_id')
                        <p class="text-danger text-capitalize">{{ $message }}</p>
                        @enderror
                  
                       
                          <div class="form-group">
                            <label for="">Semester</label>
                            <div class="controls">
                                <select name="semester_id" class="form-control"
                                    class="@error('semester_id') is-invalid @enderror">
                                    <option value="" selected="" disabled="">Select Semester</option>
                                    @foreach ($semester_list as $item )
                                    <option value="{{$item->id}}">{{$item->semester_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @error('semester_id')
                        <p class="text-danger text-capitalize">{{ $message }}</p>
                        @enderror
                  
    
                    <div class="form-group">
                        <label class="custom-file-label" for="customFile">Upload Your Payment Receipt</label>
                        <div class="controls">
                            <div class="custom-file">
                              <input type="file" name="image" class="custom-file-input form-control" id="customFile">
                            
                            </div>
                        </div>
                    </div>
                 <br>
            
                        <div class="form-group">
                            <input type="submit" class="btn btn-info" value="Submit">
                        </div>
                    </form>
                </div>
           
                </div>
            </div> 
          </div> 
        </section>    
    </div>
  @endsection