@section('client-nav')
<nav class="navbar fixed-top navigation-header">
    <div class="container-fluid navigation-content">
      <a class="navbar-brand text-white mt-1" href="#"><h3 class="nav-title">BATAAN VAN RENTAL</h3></a>
      <div class="d-flex nav-title">
        {{-- guide --}}
        {{-- <a class="navbar-toggler border-0 text-white" style="text-decoration: none" data-bs-toggle="offcanvas" data-bs-target="#guidelines" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="bx bx-info-square position-relative">
            </span>
          </a> --}}
          {{-- notification --}}
        <a class="navbar-toggler border-0 text-white" style="text-decoration: none" data-bs-toggle="offcanvas" data-bs-target="#notification" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="bx bx-bell position-relative" id="bell">

            </span>
          </a>
          {{-- message history --}}
        <a class="navbar-toggler border-0 text-white" style="text-decoration: none" data-bs-toggle="offcanvas" data-bs-target="#messages" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="bx bx-chat position-relative" id="chat">

            </span>
          </a>
          {{-- navigation --}}
          <a class="navbar-toggler border-0 text-white" style="text-decoration: none" data-bs-toggle="offcanvas" data-bs-target="#settings" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span>{{ Auth::user()->firstname }}</span>
            <span class="bx bx-dots-vertical-rounded"></span>
          </a>
      </div>

      <div class="offcanvas offcanvas-end" tabindex="-1" id="settings" aria-labelledby="offcanvasNavbarLabel" style="max-width: 40%;background: #274C77;">
        <div class="offcanvas-header border-bottom">
          <h5 class="offcanvas-title text-white" id="offcanvasNavbarLabel">Navigation</h5>
          <a class="text-white bx bx-x" data-bs-dismiss="offcanvas" aria-label="Close" style="text-decoration: none"></a>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="{{ route('client-dash') }}">
                        <span class="bx bxs-home"></span>
                        <span class="mx-2">HOME</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('client-dash-services') }}">
                        <span class="bx bxs-wrench"></span>
                        <span class="mx-2">SERVICES</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('client-dash-profile') }}">
                        <span class="bx bxs-user"></span>
                        <span class="mx-2">PROFILE</span>
                    </a>
                </li>

              </ul>
        </div>
        <div class="offcanvas-footer p-3">
            <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger form-control mx-auto" type="submit">
                    <span class="bx bx-log-out"></span>
                    Logout
                </button>
            </form>
        </div>
      </div>
    </div>
</nav>


@endsection
