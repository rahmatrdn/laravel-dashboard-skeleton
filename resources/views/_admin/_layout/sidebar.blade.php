@php
    $page = Request::segment(2);
    $subPage = Request::segment(3);
@endphp

<nav class="sidebar-nav scroll-sidebar" data-simplebar="">
    <ul id="sidebarnav">

        <li class="nav-small-cap" style="color: #adadad">
            <svg xmlns="http://www.w3.org/2000/svg" width="1.4rem" height="1.4rem" viewBox="0 0 24 24">
                <g fill="none" stroke="currentColor" stroke-width="0.95">
                    <path
                        d="M2 12.204c0-2.289 0-3.433.52-4.381c.518-.949 1.467-1.537 3.364-2.715l2-1.241C9.889 2.622 10.892 2 12 2s2.11.622 4.116 1.867l2 1.241c1.897 1.178 2.846 1.766 3.365 2.715S22 9.915 22 12.203v1.522c0 3.9 0 5.851-1.172 7.063S17.771 22 14 22h-4c-3.771 0-5.657 0-6.828-1.212S2 17.626 2 13.725z"
                        opacity="0.5" />
                    <path stroke-linecap="round" d="M12 15v3" />
                </g>
            </svg>
            <span class="hide-menu ms-1">BERANDA</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link {{ $page == '' ? 'active' : '' }}" href="{{ base_url('') }}" aria-expanded="false">
                {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-layout-dashboard">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M5 4h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1" />
                    <path d="M5 16h4a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-2a1 1 0 0 1 1 -1" />
                    <path d="M15 12h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1" />
                    <path d="M15 4h4a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-2a1 1 0 0 1 1 -1" />
                </svg> --}}

                <span class="hide-menu">Dashboard</span>
            </a>
        </li>

        {{-- PRODUCT --}}
        <li>
            <span class="sidebar-divider lg"></span>
        </li>
        <li class="nav-small-cap" style="color: #adadad">
            <svg xmlns="http://www.w3.org/2000/svg" width="1.4rem" height="1.4rem" viewBox="0 0 24 24">
                <g fill="none">
                    <path fill="currentColor"
                        d="m20.082 3.018l.026.75zm-3.582.47l-.215-.719zm-2.826 1.315l-.376-.65zM3.982 3.075l-.046.749zM7 3.488l.191-.726zm3.282 1.388l-.35.663zm3.346 15.193l.352.662zM17 18.634l-.191-.726zm2.985-.411l.047.749zm-9.613 1.846l-.352.662zM7 18.634l.191-.726zm-2.985-.411l-.047.749zm-1.265-2.08V4.999h-1.5v11.146zm20 0V4.934h-1.5v11.21zM20.056 2.269c-1.139.04-2.626.158-3.771.501l.43 1.437c.95-.284 2.274-.4 3.393-.439zm-3.771.501c-.995.298-2.114.88-2.987 1.385l.752 1.298c.85-.492 1.845-1 2.665-1.246zM3.936 3.824c.966.059 2.06.174 2.873.389l.382-1.45c-.96-.254-2.176-.376-3.163-.437zm2.873.389c.962.254 2.146.81 3.123 1.326l.7-1.326c-.995-.527-2.304-1.15-3.44-1.45zM13.98 20.73c.991-.528 2.219-1.11 3.211-1.372l-.382-1.45c-1.17.308-2.526.961-3.534 1.499zm3.211-1.372c.803-.212 1.882-.328 2.841-.388l-.094-1.497c-.98.062-2.179.183-3.13.434zm-6.466.048c-1.008-.537-2.363-1.19-3.534-1.499l-.382 1.45c.992.263 2.22.845 3.21 1.373zm-3.534-1.499c-.95-.25-2.15-.372-3.13-.434l-.093 1.497c.959.06 2.038.176 2.84.388zm14.059-1.764c0 .686-.568 1.284-1.312 1.33l.094 1.497c1.474-.092 2.718-1.291 2.718-2.827zm1.5-11.21c0-1.464-1.165-2.719-2.694-2.666l.052 1.5c.615-.022 1.142.484 1.142 1.165zm-21.5 11.21c0 1.536 1.244 2.735 2.718 2.828l.094-1.498c-.744-.046-1.312-.645-1.312-1.33zm12.025 3.264a2.72 2.72 0 0 1-2.55 0l-.705 1.323a4.22 4.22 0 0 0 3.96 0zm.023-15.254a2.77 2.77 0 0 1-2.665.059l-.701 1.326a4.27 4.27 0 0 0 4.118-.087zM2.75 4.998c0-.697.552-1.213 1.186-1.174l.092-1.498C2.47 2.231 1.25 3.5 1.25 4.998z" />
                    <path stroke="currentColor" stroke-width="0.95" d="M12 5.854V21" opacity="0.5" />
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="0.95"
                        d="m5 9l4 1m-4 3l4 1m10-1l-4 1" opacity="0.5" />
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="0.95"
                        d="M19 5.5v4.01c0 .276 0 .414-.095.47s-.224-.007-.484-.13l-1.242-.59c-.088-.042-.132-.062-.179-.062s-.091.02-.179.062l-1.242.59c-.26.123-.39.185-.484.13C15 9.923 15 9.785 15 9.51V6.95" />
                </g>
            </svg>
            <span class="hide-menu ms-1">Produk</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link {{ $page == 'product' ? 'active' : '' }}" href="{{ base_url('product') }}"
                aria-expanded="false">

                <span class="hide-menu">Data Produk</span>
            </a>
        </li>

        <li class="sidebar-item">
            <a class="sidebar-link {{ $page == 'product_category' ? 'active' : '' }}" href="{{ base_url('product_category') }}"
                aria-expanded="false">

                <span class="hide-menu">Data Kategori Produk</span>
            </a>
        </li>

        {{-- 
        <li>
            <span class="sidebar-divider lg"></span>
        </li> --}}
        {{-- <li class="nav-small-cap" style="color: #adadad">
            <svg xmlns="http://www.w3.org/2000/svg" width="1.4rem" height="1.4rem" viewBox="0 0 24 24">
                <g fill="none" stroke="currentColor" stroke-width="0.95">
                    <circle cx="12" cy="12" r="3" />
                    <path
                        d="M13.765 2.152C13.398 2 12.932 2 12 2s-1.398 0-1.765.152a2 2 0 0 0-1.083 1.083c-.092.223-.129.484-.143.863a1.62 1.62 0 0 1-.79 1.353a1.62 1.62 0 0 1-1.567.008c-.336-.178-.579-.276-.82-.308a2 2 0 0 0-1.478.396C4.04 5.79 3.806 6.193 3.34 7s-.7 1.21-.751 1.605a2 2 0 0 0 .396 1.479c.148.192.355.353.676.555c.473.297.777.803.777 1.361s-.304 1.064-.777 1.36c-.321.203-.529.364-.676.556a2 2 0 0 0-.396 1.479c.052.394.285.798.75 1.605c.467.807.7 1.21 1.015 1.453a2 2 0 0 0 1.479.396c.24-.032.483-.13.819-.308a1.62 1.62 0 0 1 1.567.008c.483.28.77.795.79 1.353c.014.38.05.64.143.863a2 2 0 0 0 1.083 1.083C10.602 22 11.068 22 12 22s1.398 0 1.765-.152a2 2 0 0 0 1.083-1.083c.092-.223.129-.483.143-.863c.02-.558.307-1.074.79-1.353a1.62 1.62 0 0 1 1.567-.008c.336.178.579.276.819.308a2 2 0 0 0 1.479-.396c.315-.242.548-.646 1.014-1.453s.7-1.21.751-1.605a2 2 0 0 0-.396-1.479c-.148-.192-.355-.353-.676-.555A1.62 1.62 0 0 1 19.562 12c0-.558.304-1.064.777-1.36c.321-.203.529-.364.676-.556a2 2 0 0 0 .396-1.479c-.052-.394-.285-.798-.75-1.605c-.467-.807-.7-1.21-1.015-1.453a2 2 0 0 0-1.479-.396c-.24.032-.483.13-.82.308a1.62 1.62 0 0 1-1.566-.008a1.62 1.62 0 0 1-.79-1.353c-.014-.38-.05-.64-.143-.863a2 2 0 0 0-1.083-1.083Z"
                        opacity="0.5" />
                </g>
            </svg>
            <span class="hide-menu ms-1">PENGATURAN</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ base_url('users') }}" aria-expanded="false">
                <span class="hide-menu">Pengelola Perpus.</span>
            </a>
            <a class="sidebar-link" href="{{ base_url('change-password') }}" aria-expanded="false">
                <span class="hide-menu">Ubah Password</span>
            </a>
        </li> --}}
    </ul>
    {{-- <div
        class="unlimited-access d-flex align-items-center hide-menu bg-primary-subtle position-relative mb-0 mt-4 p-3 rounded">
        <div>
            <p class="text-dark mb-0"><b>Digilib {{ env('APP_VERSION') }}</b></p>
            <h6 class="fw-semibold fs-4 mb-0 text-primary">by Jinggolabs</h6>
        </div>
    </div> --}}
</nav>
<!-- End Sidebar navigation -->
