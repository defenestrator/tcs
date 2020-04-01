
<li class="nav-item"><a class="dropdown-item nav-link" href="{{ route('checkout.show') }}">Checkout</a></li>
<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::user()->name }} <span class="caret"></span>
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item nav-link" href="{{ route('home') }}">Dashboard</a>
        <a class="dropdown-item nav-link" href="{{ route('user.profile.show', Auth::user()->id) }}">Profile</a>
        {{-- <a class="dropdown-item nav-link" href="{{ route('user.invoices.index') }}">Invoices</a> --}}
        <a class="dropdown-item nav-link" href="{{ route('user.shipping_addresses.index') }}">Addresses</a>
        <hr />
        @if(in_array(Auth::user()->email , ['jeremyblc@gmail.com', 'mike@elbowfarm.com', 'cheeba@The Cheeba Shack.com']))
        <a class="dropdown-item nav-link" href="/admin/invoices"><i class="fa fa-edit"></i> All user Invoices</a>
        <hr>
            <a class="dropdown-item nav-link" href="/admin/strains"><i class="fa fa-edit"></i> Edit Strains</a>
            <a class="dropdown-item nav-link" href="/admin/strains/create"><i class="fa fa-plus-circle"></i> New Strain</a>
            <hr />
            <a class="dropdown-item nav-link" href="/admin/seed_packs"><i class="fa fa-edit"></i> Edit Packs</a>
            <a class="dropdown-item nav-link" href="/admin/seed_packs/create"><i class="fa fa-plus-circle"></i> New Packs</a>
            <hr />
            <a href="/admin/log-viewer" class="dropdown-item nav-link">
                <i class="fa fa-archive"></i> App Health
            </a>
            <a href="/admin/log-viewer/logs" class="dropdown-item nav-link">
                <i class="fa fa-archive"></i> Logs
            </a>
            <hr />
        @endif

        <a class="dropdown-item nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</li>
