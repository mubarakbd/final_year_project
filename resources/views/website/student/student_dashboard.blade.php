@extends("website.layouts.app")
 <!-- ======= Hero Section ======= -->
   <section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
      <h1>Learning Today,<br>Leading Tomorrow</h1>
      <a href="courses.html" class="btn-get-started">Get Course Registration</a>
    </div>
  </section><!-- End Hero --> 

@section("contents")
<section id="popular-courses" class="courses">
    <div class="container" data-aos="fade-up">

      <div class="section-title text-center text-capitalize" style="color:coral; font-size: 30px; font-weight: 900">
        {{-- <span>{{$c->session_name}} {{$c->session_year}} Course Offer List</span> --}}
      </div>
      <div class="row" data-aos="zoom-in" data-aos-delay="100">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                              <th>Semester Name</th>
                                             <th>Course Name</th>
                                             <th>Course Code</th>
                                             <th>Course Credit</th>
                                             <th>Course Teacher</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        </tr>
                                        

                                        @php
                                        $i=0;
                                    @endphp
                                    @if( count($semester_course_list) > 0 )
                                        @foreach ($semester_course_list as $item)
                                            @php
                                            $i++;
                                        @endphp
                                            <tr>

                                                <td>{{ $semester_course_list->firstItem() + $loop->index }}</td>
                                         <td>
                                            {{ $item->semesters ? $item->semesters->semester_name : '' }}
                                         </td>
                                             
                                                <td>
                                                    {{ $item->course_offers ? $item->course_offers->course_name: "" }}</td>
                                                <td>{{ $item->course_offers ? $item->course_offers->course_code : "" }}</td>
                                                <td>{{ $item->course_offers ? $item->course_offers->course_credit : "" }}</td> 
                                                <td>{{ $item->teachers ? $item->teachers->f_name : "" }}</td>
                                            </tr>
                                            @endforeach
                                            @else
                                            {{"No data found"}}
                                        @endif
                                              
                                </table>
                                <div class="pt-5" style="float: right;">
                                    {{ $semester_course_list->links() }}
                                </div>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      
          </div>
           </div>
       </section><!-- End Popular Courses Section -->

  <!-- ======= Faculty Section ======= -->

  <div class="container" data-aos="fade-up">
    <section id="trainers" class="trainers">
      <h2 class="text-center text-dark font-bold">All Faculty Infromation</h2>
      <div class="container" data-aos="fade-up">
        <section id="trainers" class="trainers">
          <div class="container" data-aos="fade-up">

            <div class="row" data-aos="zoom-in" data-aos-delay="100">
                @foreach ($teacher_list as $teac)
              <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                <div class="member">
                  <img src="{{asset("storage/$teac->f_image")}}" class="img-fluid" alt="">
                  <div class="member-content">
                    <h4>{{$teac->f_name}}</h4>
                    <span>{{$teac->f_email}}</span>
                    <p class="text-danger">{{$teac->f_phone}}</p>
                    <p>
                     {{$teac->f_designation}}
                    </p>
                  
                  </div>
                </div>
              </div>
             @endforeach
  
            
            </div>
          </div>
        </div>
        </section><!-- End Trainers Section -->      

        
  </div>    
   
@endsection