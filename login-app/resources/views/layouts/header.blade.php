<header style="position: fixed; top: 0px; width: 100%; z-index: 1;">
    <nav id="principal">
        <a id="principal" href="{{ route('dashboard') }}" class="logo">Cardfort</a>
        
        <div class="mobile-menu">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
        
        <ul class="nav-list">
            <li style="margin-top: 25px;">
                <a id="principal" href="{{ route('dashboard') }}">Inicio</a>
            </li>
            <li style="margin-top: 25px;">
                <a id="principal" data-toggle="modal" href="#perfil">Perfil</a>
            </li>
            <li style="margin-top: 25px;">
                <a id="principal" href="{{ route('compras') }}">Compras</a>
            </li>
            <li>
                <a id="principal" href="#">
                    <img style="height: 30px; width: 40px; filter: invert(100%);" src="{{ asset('img/carrinho.png') }}">
                </a>
            </li>
        </ul>
    </nav>
</header>