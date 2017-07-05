@yield("nav_contratos", "<li class=\"treeview\">")
	<a href="#">	
		<i class="fa fa-book" aria-hidden="true"></i>
			Contratos 
		<i class="fa fa-angle-left pull-right"></i></a>
	<ul class="treeview-menu">
	    @yield("item_contratos","<li>")
	    <a href="{{URL::route('contratos.listado')}}"><i class="fa fa-edit"></i>Contratos</a>
	    </li>	    
	</ul>
</li>