<div class="sidebar" data-active-color="green" data-background-color="black" data-image="{{ asset('img/sidebar-1.jpg') }}">
  <div class="logo">
    <a href="javascript:;" class="simple-text">
      <i class="material-icons">fingerprint</i>  {{ config('app.name') }}
    </a>
  </div>
  <div class="logo logo-mini">
    <a href="javascript:;" class="simple-text">
      PB
    </a>
  </div>
  <div class="sidebar-wrapper">

    <!-- Sidebar Starts -->
      {!! Menu::make( config('html.sidebar') ) !!}
    <!-- Sidebar Ends -->

  </div>
</div>