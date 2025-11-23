<header class="header header-sticky p-0 mb-4">
  <div class="container-fluid border-bottom px-4">
    <button class="header-toggler" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()" style="margin-inline-start: -14px;">
      <svg class="icon icon-lg">
        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-menu') }}"></use>
      </svg>
    </button>
    <ul class="header-nav d-none d-lg-flex">
      <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
      <li class="nav-item"><a class="nav-link" href="#">Users</a></li>
      <li class="nav-item"><a class="nav-link" href="#">Settings</a></li>
    </ul>
    <ul class="header-nav ms-auto">
      <li class="nav-item"><a class="nav-link" href="#">
        <svg class="icon icon-lg">
          <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-bell') }}"></use>
        </svg></a></li>
      <li class="nav-item"><a class="nav-link" href="#">
        <svg class="icon icon-lg">
          <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-list-rich') }}"></use>
        </svg></a></li>
    </ul>
    <ul class="header-nav">
      <li class="nav-item py-1">
        <div class="vr h-100 mx-2 text-body text-opacity-75"></div>
      </li>
      <li class="nav-item dropdown">
        <button class="btn btn-link nav-link py-2 px-2 d-flex align-items-center" type="button" aria-expanded="false" data-coreui-toggle="dropdown">
          <svg class="icon icon-lg theme-icon-active">
            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-contrast') }}"></use>
          </svg>
        </button>
        <ul class="dropdown-menu dropdown-menu-end" style="--cui-dropdown-min-width: 8rem;">
          @foreach(app('viewmanager')->getThemes() as $value => $label)
          <li>
            <button class="dropdown-item d-flex align-items-center {{ $currentTheme == $value ? 'active' : '' }}" type="button" data-coreui-theme-value="{{ $value }}">
              <svg class="icon icon-lg me-3">
                <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#'. config('viewmanager.icon_theme')[$value]) }}"></use>
              </svg>{{ $label }}
            </button>
          </li>
          @endforeach
        </ul>
      </li>
      <li class="nav-item py-1">
        <div class="vr h-100 mx-2 text-body text-opacity-75"></div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link py-0 pe-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          <div class="avatar avatar-md">
            <img src="{{ Auth::user()?->profile()?->image() ?? ''}}" alt="{{Auth::user()->email}}" class="avatar avatar-md">
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-end pt-0">
          <div class="dropdown-header bg-body-tertiary text-body-secondary fw-semibold my-2">
            <div class="fw-semibold">Settings</div>
          </div>
          @if(Route::has("profile.index"))
          <a class="dropdown-item" href="{{ route('profile.index') }}">
            <svg class="icon me-2">
              <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-user') }}"></use>
            </svg> Profile</a>
          @endif
          @if(Route::has("settings"))
          <a class="dropdown-item" href="{{ route('settings') }}">
            <svg class="icon me-2">
              <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-settings') }}"></use>
            </svg> Settings</a>
          @endif
          <div class="dropdown-divider"></div>
          @if(Route::has("logout"))
          <form method="POST" action="{{ route('logout') }}" id="logout-form">
            @csrf
          <a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <svg class="icon me-2">
              <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}"></use>
            </svg> Logout</a>
          </form>
          @endif
        </div>
      </li>
    </ul>
  </div>
  <div class="container-fluid px-4">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb my-0">
        @if(Route::has("dashboard"))
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a>
        </li>
        @else
        <li class="breadcrumb-item">Home</li>
        @endif
        @hasSection("page-title")
        <li class="breadcrumb-item active">
          @yield("page-title")
        </li>
        @endif
      </ol>
    </nav>
  </div>
  @if(session("success"))
    <div class="container-fluid px-4 mt-2 align-items-center">
      <div class="alert bg-success text-white d-flex align-items-center" role="alert">
        <svg class="flex-shrink-0 me-2" width="24" height="24">
          <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-check-circle') }}"></use>
        </svg>
        <div>{{ session("success") }}</div>
      </div>
    </div>
  @endif
  @if(session("warning"))
    <div class="container-fluid px-4 mt-2 align-items-center">
      <div class="alert bg-warning text-white d-flex align-items-center" role="alert">
        <svg class="flex-shrink-0 me-2" width="24" height="24">
          <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-warning') }}"></use>
        </svg>
        <div>{{ session("warning") }}</div>
      </div>
    </div>
  @endif
  @if($errors->any())
  <div class="container-fluid px-4 mt-2 align-items-center">
    <div class="alert bg-danger text-white d-flex align-items-center" role="alert">
      <svg class="flex-shrink-0 me-2" width="24" height="24">
        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-warning') }}"></use>
      </svg>
      <ul>
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  </div>
  @endif
</header>
