 @section('menu') @if(Auth::check())

  <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>


<li><a class="waves-effect waves-light" href="{{ url('/file') }}">file</a></li>
<li class="dropdown">

    <a href="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
    <div class="col-xs-10 titleName">
    {{ currentUser()->name }}
    </div>
    <div class="col-xs-2 carretes">
     <span class="caret"></span>
    </div>
    </a>
    <ul class="dropdown-menu">
        <li class="{{ (findPermission(1))? : " disabled " }} ">
            <a href="{{ (findPermission(1))? url('/user'): " # " }}">{{ findMenuName(1) }}</a>
        </li>
        <li class="{{ (findPermission(2))? : " disabled " }} ">
            <a href="{{ (findPermission(2))? url('/panel-de-control'): " # " }}" class="btn-block ">{{ findMenuName(2) }}</a>
        </li>
        <li class="divider"></li>
        <li>
            <a href="#" class="red-text" onclick="logout()"><span class="glyphicon glyphicon-log-out"></span> @lang('validation.attributes.logout')   </a>
        </li>
    </ul>
</li>


@endif @endsection
