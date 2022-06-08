<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="{{route("admin_dashboard")}}">Admin Panel</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ route('admin_dashboard')}}"></a>
    </div>

    <ul class="sidebar-menu">

        <li><a class="nav-link" href="{{ route('admin_dashboard')}}"><i class="fas fa-hand-point-right"></i> <span>Dashboard</span></a></li>

        <li class=""><a class="nav-link" href="{{ url('/admin/department')}}"><i class="fas fa-hand-point-right"></i> <span>Department Info</span></a></li>

        <li class=""><a class="nav-link" href="{{ url('/admin/semester')}}"><i class="fas fa-hand-point-right"></i> <span>Semester Mangemnet</span></a></li>

        <li class=""><a class="nav-link" href="{{ url('/admin/course_offer')}}"><i class="fas fa-hand-point-right"></i> <span>Course  Maangement</span></a></li>

        <li class=""><a class="nav-link" href="{{ url('/admin/semester_courses')}}"><i class="fas fa-hand-point-right"></i> <span>Course of Semesters</span></a></li>

        <li class=""><a class="nav-link" href="{{ url('/admin/course_reg_list')}}"><i class="fas fa-hand-point-right"></i> <span>Course Registration Information</span></a></li>


        <li class=""><a class="nav-link" href="{{ url('/admin/grad_point') }}"><i class="fas fa-hand-point-right"></i> <span>Gard Point and Marks</span></a></li>
{{-- 
        <li class=""><a class="nav-link" href="{{ url('/admin/result_list') }}"><i class="fas fa-hand-point-right"></i> <span>Semester Result</span></a></li> --}}

        
        <li class=""><a class="nav-link" href="{{ url('/admin/faculty')}}"><i class="fas fa-hand-point-right"></i> <span>Faculty's Information</span></a></li>        



    </ul>
</aside>