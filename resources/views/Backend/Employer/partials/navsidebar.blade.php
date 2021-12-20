<nav id="sidebar" class="active">
    <div class="sidebar-header">
        <img src="{{ asset('backend/assets/img/dashboard-logo.png') }}" alt="bootraper logo" class="app-logo">
    </div>
    <ul class="list-unstyled components text-secondary">
        <li>
            <a href="{{ route('employer.dashboard') }}"><i class="fas fa-home"></i> Dashboard</a>
        </li>
        @if(auth()->user()->role=='employer' && auth()->user()->approved == 0)
        @else
        <li>
            <a href="#jobpost" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-edit"></i> Job Post</a>
            <ul class="collapse list-unstyled" id="jobpost">
                <li>
                    <a href="{{ route('job.create') }}"><i class="fas fa-briefcase"></i> Create Job Post</a>
                </li>
                <li>
                    <a href="{{ route('job.list') }}"><i class="fas fa-align-left"></i> Posted Jobs</a>
                </li>

            </ul>
        </li>
        <li>
            <a href="{{ route('order.forms') }}"><i class="fas fa-credit-card"></i> Create Credit</a>
        </li>
        @endif
        <li>
            <a href="{{ route('job.application') }}"><i class="fas fa-list"></i> Application List</a>
        </li>
        <li>
            <a href="{{ route('profile.create') }}"><i class="fas fa-user"></i> Profile</a>
        </li>

        {{-- <li>
            <a href="#eployers" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-history"></i> Order History</a>
            <ul class="collapse list-unstyled" id="eployers">
                <li>
                    <a href=""><i class="fas fa-list"></i> Pending</a>
                </li>
                <li>
                    <a href="{{ route('checkout.approved') }}"><i class="fas fa-user-plus"></i> Approved</a>
                </li>

            </ul>
        </li> --}}
    </ul>
</nav>
