<nav id="sidebar" class="active">
    <div class="sidebar-header">
        <a href="{{ route("welcome")}}" style="text-decoration: none;color:unset;">
            <img src="{{ asset('backend/assets/img/dashboard-logo.png') }}" alt="bootraper logo" class="app-logo">
        </a>
    </div>
    <ul class="list-unstyled components text-secondary">
        <li class="nav-item active">
            <a href="{{ route('candidate.dashboard') }}" class="nav-link"><i class="fas fa-home"></i> Dashboard</a>
        </li>
        <li class="nav-item">
            <a href="#cand_profiles" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-address-card"></i> Profile</a>
            <ul class="collapse list-unstyled" id="cand_profiles">
                <li>
                    <a href="{{ route('candidate.profile.create')}}"><i class="fas fa-user-plus"></i> Create</a>
                </li>
                <li>
                    <a href="{{route('candidate.profile')}}"><i class="fas fa-list"></i> View</a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#jobpost" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-edit"></i> Jobs</a>
            <ul class="collapse list-unstyled" id="jobpost">
                <li>
                    <a href="{{ route('applied.jobs') }}"><i class="fas fa-align-left"></i> Applied Jobs</a>
                </li>

                <li>
                    <a href="{{ route('backend.job.list') }}"><i class="fas fa-briefcase"></i>Apply Job</a>
                </li>


            </ul>
        </li>


        <li>
            <a href="{{ route('candidate.order.forms') }}"><i class="fas fa-credit-card"></i> Create Credit</a>
        </li>

    </ul>
</nav>
