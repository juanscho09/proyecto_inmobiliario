@yield("nav_configuracion", "<li class=\"treeview\">")
	<a href="#">	
		<i class="fa fa-gears" aria-hidden="true"></i>
			Configuracion
		<i class="fa fa-angle-left pull-right"></i></a>
	<ul class="treeview-menu">
	    @yield("item_configuracion","<li>")
	    <a href="{{URL::route('configuracion.listado')}}"><i class="fa fa-gears"></i>Configuracion</a>
	    </li>	    
	</ul>
</li>