<nav class="navbar navbar-expand-lg navbar-dark sticky-top shadow">

    ```
    <div class="container">

        {{-- Logo --}}
        <a
            class="navbar-brand fw-bold d-flex align-items-center"
            href="{{ route('dashboard') }}">

            <i class="bi bi-snow2 me-2 fs-4"></i>

            <span class="fs-5">
                FROZERIA
            </span>

        </a>

        {{-- Toggle Mobile --}}
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        {{-- Menu --}}
        <div
            class="collapse navbar-collapse"
            id="navbarNav">

            <ul class="navbar-nav mx-auto">

                {{-- Dashboard --}}
                <li class="nav-item">

                    <a
                        href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->routeIs('dashboard') ? 'active fw-bold' : '' }}">

                        <i class="bi bi-speedometer2 me-1"></i>

                        Dashboard

                    </a>

                </li>

                {{-- Barang --}}
                <li class="nav-item">

                    <a
                        href="{{ route('products.index') }}"
                        class="nav-link {{ request()->routeIs('products.*') ? 'active fw-bold' : '' }}">

                        <i class="bi bi-box-seam me-1"></i>

                        Barang

                    </a>

                </li>

                {{-- Kategori --}}
                <li class="nav-item">

                    <a
                        href="{{ route('categories.index') }}"
                        class="nav-link {{ request()->routeIs('categories.*') ? 'active fw-bold' : '' }}">

                        <i class="bi bi-tags me-1"></i>

                        Kategori

                    </a>

                </li>

                {{-- Bantuan --}}
                <li class="nav-item">

                    <a
                        href="{{ route('help') }}"
                        class="nav-link {{ request()->routeIs('help') ? 'active fw-bold' : '' }}">

                        <i class="bi bi-question-circle me-1"></i>

                        Bantuan

                    </a>

                </li>

            </ul>


            </a>

        </div>

    </div>
    ```

</nav>