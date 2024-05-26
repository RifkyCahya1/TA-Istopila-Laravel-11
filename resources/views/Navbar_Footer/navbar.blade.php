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
          <li class="{{ Request::is('Profile') ? 'active' : '' }}"><a class="nav-link nav-home" href="Profile"><i class="bi bi-person"></i></a></li>
        </ul>
      </div>
    </div>
</nav>