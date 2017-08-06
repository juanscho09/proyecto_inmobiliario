@yield("nav_configuracion", "<li class=\"treeview\">")
	<a href="#">
		<i class="fa fa-gears" aria-hidden="true"></i>
			Configuración
		<i class="fa fa-angle-left pull-right"></i>
	</a>
	<ul class="treeview-menu">

	    @yield("item_configuraciones_generales","<li>")
            <a href="{{URL::route('configuracion.generales', null)}}">
                <i class="fa fa-gears"></i>Configuraciónes generales
            </a>
        </li>
        @yield("item_configuraciones_servicios","<li>")
            <a href="{{URL::route('configuracion.servicios', null)}}">
                <i class="fa fa-gears"></i>Configuración Servicios
            </a>
        </li>
	</ul>
</li>