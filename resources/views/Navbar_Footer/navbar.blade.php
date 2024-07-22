<nav class="navbar navbar-expand-lg custom-navbar">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">
        <img src="{{ asset('img/Istopila.png') }}" alt="Logo" style="height: 100px;">
      </a>
      <div class="d-flex justify-content-end">
        <ul class="navbar-nav navbar-home">
          <li class="{{ Request::is('/') ? 'active' : '' }}"><a class="nav-link nav-home" href="/">Home</a></li>
          <li class="{{ Request::is('About') ? 'active' : '' }}"><a class="nav-link nav-home" href="About">About</a></li>
          <li class="{{ Request::is('Gallery') ? 'active' : '' }}"><a class="nav-link nav-home" href="Gallery">Gallery</a></li>
          <li class="{{ Request::is('Contact') ? 'active' : '' }}"><a class="nav-link nav-home" href="Contact">Contact</a></li>
          <li class="{{ Request::is('Booking') ? 'active' : '' }}"><a class="nav-link nav-home" href="Booking">Booking</a></li>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-gear-fill"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="dropdownMenuButton1">
                <li class="{{ Request::is('Profile') ? 'active' : '' }}"><a class="dropdown-item nav-link nav-home" href="Profile">Profil <i class="bi bi-person"></i></a></li>
                <li class="{{ Request::is('UserDashboard') ? 'active' : '' }}"><a class="dropdown-item nav-link nav-home" href="UserDashboard">Dashboard <i class="bi bi-speedometer2"></i></a></li>
              </ul>
          </li>
        </ul>
      </div>
    </div>
</nav>