 @section('menu') @if(Auth::check())
<li class="dropdown tooltipped" data-position="right" data-delay="0" data-tooltip="&#x25BC; test">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">test <span class="caret"></span></a>
    <ul class="dropdown-menu">
        <li><a href="{{ url('/FormGenerator') }}">Generador de Formularios</a></li>
        <li><a href="#">Another action</a></li>
        <li><a href="#">Something else here sd dsa dsa dsa</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="#">Separated link</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="#">One more separated link</a></li>
    </ul>
</li>
<li class="tooltipped" data-position="right" data-delay="0" data-tooltip="&#x25BC; Importar"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="glyphicon glyphicon-import" ></span></a>
    <ul class="dropdown-menu">
        <li><a href="{{ url('/file') }}">Usuarios</a></li>
        <li><a href="{{ url('/subir/GFMIS') }}">GFMIS</a></li>

        <li role="separator" class="divider"></li>
        <li><a href="#">Separated link</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="#">One more separated link</a></li>
    </ul>
</li>
<li class="dropdown tooltipped" data-position="right" data-delay="0" data-tooltip="&#x25BC; Configuraciones">
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
