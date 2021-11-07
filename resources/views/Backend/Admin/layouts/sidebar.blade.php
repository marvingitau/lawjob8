
{{-- <ul>
        @if(Auth::guard('admin')->check())
        <li>

            <a href="#m_job_attr" data-toggle="collapse">

                <i class="fa fa-fw fa-th-large"></i> Manage Job Attribute

            </a>

            @php($j_attr = \App\Model\AdminFolder\JobAttributs::types())

            <ul id="m_job_attr" class="list-unstyled collapse {{active_menu($j_attr->map(function ($item,$key){

            return route('admin.jobAttrib.show',[$key]);

            })->toArray(),'show') }}">

                @foreach($j_attr as $key=>$j_type)

                    <li class="{{active_menu([route('admin.jobAttrib.show',[$key])],'active')}}"> <a href="{{route('admin.jobAttrib.show',[$key])}}"> <?php echo $j_type['icon']?> {{$j_type['label']}}</a></li>


                @endforeach

            </ul>

        </li>
    @endif
</ul> --}}
