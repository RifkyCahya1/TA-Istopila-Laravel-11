<nav class="navbar navbar-expand-lg custom-navbar">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">
        <img src="{{ asset('img/Istopila.png') }}" alt="Logo" style="height: 100px;">
      </a>
      <div class="d-flex justify-content-end">
        <ul class="navbar-nav navbar-home">
            <li class="{{ Request::is('Dashboard') ? 'active' : '' }}"><a class="nav-link nav-home" href="Dashboard">Dashboard</a></li>
            <li class="{{ Request::is('Upload') ? 'active' : '' }}"><a class="nav-link nav-home" href="Upload">Upload</a></li>
            <li class="{{ Request::is('Project') ? 'active' : '' }}"><a class="nav-link nav-home" href="Project">Project</a></li>
            <li class="{{ Request::is('Report') ? 'active' : '' }}"><a class="nav-link nav-home" href="Report">Report</a></li>
            <li class="{{ Request::is('Profile') ? 'active' : '' }}"><a class="nav-link nav-home" href="Profile"><i class="bi bi-person"></i></a></li>
        </ul>
      </div>
    </div>
</nav>