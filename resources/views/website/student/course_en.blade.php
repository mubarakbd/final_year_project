@extends("website.layouts.app")
 

@section("contents")
<section id="popular-courses" class="courses">
    <div class="container" data-aos="fade-up">

      <div class="section-title text-center text-capitalize pt-5 py-3" style="color:coral; font-size: 30px; font-weight: 900">
        
        <span> Your Course Registration  List</span> 
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
                                             <th>Your Course Registration Status</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        </tr>
                                        

                                         @php
                                        $i=0;
                                    @endphp
                                    @if( count($student_courses) > 0 )
                                        @foreach ($student_courses as $item)
                                            @php
                                            $i++;
                                        @endphp
                                            <tr>

                                              <td>{{$i}}</td>
                                         <td>
                                            {{ $item->semesters ? $item->semesters->semester_name : '' }}
                                         </td>
                                             
                                                <td>
                                                    {{ $item->course_offers ? $item->course_offers->course_name: "" }}</td>
                                                <td>{{ $item->course_offers ? $item->course_offers->course_code : "" }}</td>
                                                <td>{{ $item->course_offers ? $item->course_offers->course_credit : "" }}</td> 
                                               

                                               @if($item->confirmed==1)   
                                                <td class="text-success"><p>Approved</p></td>
                                                @else
                                                <td class="text-danger"><p>Pending for Approved</p></td>
                                              @endif

                                            </tr>
                                            @endforeach
                                            @else
                                            {{"No data found Please Make A Course Registration"}}
                                        @endif 
                                              
                                </table>
                                <div class="pt-5" style="float: right;">
                                 
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


        
  </div>    
   
@endsection