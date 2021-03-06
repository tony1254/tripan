 @section('menu') @if(Auth::check())
<li class="dropdown tooltipped" data-position="right" data-delay="0" data-tooltip="&#x25BC; test">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">TODO <span class="caret"></span></a>
    <ul class="dropdown-menu">
          <li class="{{ (findPermission(9))? : " disabled " }} ">
            <a href="{{ (findPermission(9))? url('/FormGenerator'): " # " }}">{{ findMenuName(9) }}</a>
        </li>
        <li role="separator" class="divider"></li>

          <li class="{{ (findPermission(14))? : " disabled " }} ">
            <a href="{{ (findPermission(14))? url('/catalog'): " # " }}">{{ findMenuName(14) }}</a>
        </li>
        </li>
          <li class="{{ (findPermission(19))? : " disabled " }} ">
            <a href="{{ (findPermission(19))? url('/HeaderPlants'): " # " }}">{{ findMenuName(19) }}</a>
        </li>
        </li>
          <li class="{{ (findPermission(24))? : " disabled " }} ">
            <a href="{{ (findPermission(24))? url('/title'): " # " }}">{{ findMenuName(24) }}</a>
        </li>
        <li><a href="/fund">Fondos</a></li>


        <li role="separator" class="divider"></li>
        <li><a href="/subRodal">subRodales</a></li>

        <li role="separator" class="divider"></li>
        <li><a href="/inventory">inventario</a></li>
        <li role="separator" class="divider"></li>
        <li class="{{ (findPermission(8))? : " disabled " }} ">
            <a href="{{ (findPermission(8))? url('/subir/GFMIS'): " # " }}">{{ findMenuName(8) }}</a>
        </li>

    </ul>
</li>
<li class="dropdown tooltipped" data-position="right" data-delay="0" data-tooltip="&#x25BC; Catalogos">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Catalogos<span class="caret"></span></a>
    <ul class="dropdown-menu">

          <li class="{{ (findPermission(14))? : " disabled " }} ">
            <a href="{{ (findPermission(14))? url('/catalog'): " # " }}">{{ findMenuName(14) }}</a>
        </li>
        </li>
          <li class="{{ (findPermission(19))? : " disabled " }} ">
            <a href="{{ (findPermission(19))? url('/HeaderPlants'): " # " }}">{{ findMenuName(19) }}</a>
        </li>
        </li>
          <li class="{{ (findPermission(24))? : " disabled " }} ">
            <a href="{{ (findPermission(24))? url('/title'): " # " }}">{{ findMenuName(24) }}</a>
        </li>
        <li><a href="/fund">Fondos</a></li>

    </ul>
</li>
<li class="dropdown tooltipped" data-position="right" data-delay="0" data-tooltip="&#x25BC; Importar">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="material-icons">file_upload</span><span class="caret"></span></a>
    <ul class="dropdown-menu">

          <li class="{{ (findPermission(8))? : " disabled " }} ">
            <a href="{{ (findPermission(8))? url('/subir/GFMIS'): " # " }}">{{ findMenuName(8) }}</a>
        </li>
        </li>
          <li class="{{ (findPermission(19))? : " disabled " }} ">
            <a href="{{ (findPermission(19))? url('/HeaderPlants'): " # " }}">{{ findMenuName(19) }}</a>
        </li>
        </li>
          <li class="{{ (findPermission(24))? : " disabled " }} ">
            <a href="{{ (findPermission(24))? url('/title'): " # " }}">{{ findMenuName(24) }}</a>
        </li>
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
        <li class="{{ (findPermission(6))? : " disabled " }} ">
            <a href="{{ (findPermission(6))? url('/panel-de-control'): " # " }}" class="btn-block ">{{ findMenuName(6) }}</a>
        </li>
        <li class="divider"></li>
        <li>
            <a href="#" class="red-text" onclick="logout()"><span class="glyphicon glyphicon-log-out"></span> @lang('validation.attributes.logout')   </a>
        </li>
    </ul>
</li>
@endif @endsection
