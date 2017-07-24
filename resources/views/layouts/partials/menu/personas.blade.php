@yield("nav_personas", "<li class=\"treeview\">")
	
	<a href="#">
		<i class="fa fa-user"></i>Personas <i class="fa fa-angle-left pull-right"></i>
	</a>
	<ul class="treeview-menu">
	    @yield("item_propietarios","<li>")
	    <a href="{{URL::route('personas.listado', 'propietarios')}}"><i class="fa fa-edit"></i>Propietarios</a>
	    </li>
	    @yield("item_inquilinos","<li>")
	    <a href="{{URL::route('personas.listado', 'inquilinos')}}"><i class="fa fa-edit"></i>Inquilinos</a>
	    </li>
	    @yield("item_garantes","<li>")
	    <a href="{{URL::route('personas.listado', 'garantes')}}"><i class="fa fa-edit"></i>Garantes</a>
	    </li>
	</ul>
</li>