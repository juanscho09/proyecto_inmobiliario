@yield("nav_main_inmuebles", "<li>")
    <a href="{{URL::route('inmuebles.listado', null)}}">
        <i class="fa fa-building-o"></i>
        <span>Inmuebles</span>
    </a>
</li>
