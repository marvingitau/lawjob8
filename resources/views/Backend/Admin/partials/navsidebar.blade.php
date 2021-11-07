<nav id="sidebar" class="active">
    <div class="sidebar-header">
        <img src="{{ asset('backend/assets/img/bootstraper-logo.png') }}" alt="bootraper logo" class="app-logo">
    </div>
    <ul class="list-unstyled components text-secondary">
        <li>
            <a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i> Dashboard</a>
        </li>
        <li>
            <a href="#eployers" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-user-secret"></i> Employers</a>
            <ul class="collapse list-unstyled" id="eployers">
                <li>
                    <a href=""><i class="fas fa-list"></i> View List</a>
                </li>
                <li>
                    <a href=""><i class="fas fa-user-plus"></i> Create New</a>
                </li>

            </ul>
        </li>

        <li>
            <a href="#candidatw" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-user-circle"></i> Candidates</a>
            <ul class="collapse list-unstyled" id="candidatw">
                <li>
                    <a href="ui-buttons.html"><i class="fas fa-angle-right"></i> View List</a>
                </li>
                <li>
                    <a href="ui-badges.html"><i class="fas fa-angle-right"></i> Create New</a>
                </li>

                </li>
            </ul>
        </li>

         <li>
            <a href="#jobattributes" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-th-large"></i> Job Attributes</a>

            @php($j_attr = \App\Models\Admin\JobAttributs::types())

            <ul id="jobattributes" class="list-unstyled collapse {{active_menu($j_attr->map(function ($item,$key){

            return route('admin.jobAttrib.show',[$key]);

            })->toArray(),'show') }}">

                @foreach($j_attr as $key=>$j_type)

                    <li class="{{active_menu([route('admin.jobAttrib.show',[$key])],'active')}}"> <a href="{{route('admin.jobAttrib.show',[$key])}}"> <?php echo $j_type['icon']?> {{$j_type['label']}}</a></li>


                @endforeach

            </ul>
        </li>


    </ul>
</nav>
