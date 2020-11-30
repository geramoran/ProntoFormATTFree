@guest
@if (Route::has('login'))
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="/client">
                    <span data-feather="users"></span>
                    Clientes
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/product">
                    <span data-feather="shopping-cart"></span>
                    Productos
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/despacho">
                    <span data-feather="layers"></span>
                    Despacho
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/inventario">
                    <span data-feather="layers"></span>
                    Ingreso de Inventario
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/remesa">
                    <span data-feather="layers"></span>
                    Recolección
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/recibo">
                    <span data-feather="layers"></span>
                    Recibo
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/catalogstatus">
                    <span data-feather="file"></span>
                    Catalogo de estatus
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/area">
                    <span data-feather="bar-chart-2"></span>
                    Zonas de entrega
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/user">
                    <span data-feather="layers"></span>
                    Usuarios
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/usertype">
                    <span data-feather="layers"></span>
                    Tipos de Usuarios
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/place">
                    <span data-feather="layers"></span>
                    Ubicaciones
                </a>
            </li>
        </ul>
    </div>
</nav>
@endif
@endguest
