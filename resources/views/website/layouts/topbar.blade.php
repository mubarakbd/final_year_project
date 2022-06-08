 <nav id="navbar" class="navbar order-last order-lg-0">
    <ul class="md-auto">
      <li><a class="active" href="{{ route('student.dashboard')}}">Home</a></li>
      <li><a href="{{ url('/student/couese_registration')}}">Courses Registration</a></li>

      <li><a href="{{ route('Application')}}">Application From</a></li>

      <li class="dropdown"><a href="#" style="color: #ddd">Hello  {{Auth::guard('student')->user()->name}}</a>
        <ul>  
          <li><a href="{{ route('st_profile')}}"> Profile</a></li>

          <li><a href="{{ route('course_enrollment')}}">Course Enrolment</a></li>
          <li><a href="{{ route('payment_process')}}">Payment</a></li>
    
          <li><a href="{{ route('logout') }}">Logout</a></li>
        </ul>
      </li>
     <li></li>
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
  </nav>


  