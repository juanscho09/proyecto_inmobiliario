@yield("nav_movimientos", "<li class=\"treeview\">")

	<a href="#">
		<i class="fa fa-retweet" aria-hidden="true"></i>
		Movimientos 
		<i class="fa fa-angle-left pull-right"></i>
	</a>
    <ul class="treeview-menu">
        @yield("item_movimientos","<li>")
            <a href="{{URL::route('movimientos.listado')}}">
                <i class="fa fa-edit"></i>Listado de Movimientos
            </a>
        </li>   
    </ul>
</li>