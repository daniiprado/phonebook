<nav class="navbar navbar-primary navbar-transparent navbar-absolute">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ url('material/dashboard') }}">Centro de Innovación y Tecnología</a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="{{ url('material/dashboard') }}">
            <i class="material-icons">dashboard</i> Dashboard
          </a>
        </li>
        <li class=" @yield('class-register') ">
          <a href="{{ url('material/paginas/registro') }}">
            <i class="material-icons">person_add</i> Register
          </a>
        </li>
        <li class=" @yield('class-login') ">
          <a href="{{ url('material/paginas/login') }}">
            <i class="material-icons">fingerprint</i> Login
          </a>
        </li>
        <li class=" @yield('class-lock') ">
          <a href="{{ url('material/paginas/lock') }}">
            <i class="material-icons">lock_open</i> Lock
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>