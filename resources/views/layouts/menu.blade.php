 @section('menu') @if(Auth::check())
<li><a class="waves-effect waves-light" href="{{ url('/file') }}">file</a></li>
<li class="dropdown">
    <a href="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ currentUser()->name }} <span class="caret"></span></a>
    <ul class="dropdown-menu">
        <li class="{{ (findPermission(1))? : " disabled " }} ">
            <a href="{{ (findPermission(1))? url('/panel-de-control'): " # " }}">{{ findMenuName(1) }}</a>
        </li>
        <li class="{{ (findPermission(2))? : " disabled " }} ">
            <a href="{{ (findPermission(2))? url('/panel-de-control'): " # " }}" class="btn-block ">{{ findMenuName(2) }}</a>
        </li>
        <li class="divider"></li>
        <li>
            <a href="#" class="red-text"><span class="glyphicon glyphicon-log-out"></span> @lang('validation.attributes.logout')   </a>
        </li>
    </ul>
</li>
@endif @endsection
