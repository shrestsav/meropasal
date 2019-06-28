<div class="scrollbar-inner">
  <!-- Brand -->
  <div class="sidenav-header d-flex align-items-center">
    <a class="navbar-brand" href="{{route('dashboard')}}">
      <img src="{{asset('argon')}}/img/brand/blue.png" class="navbar-brand-img" alt="...">
    </a>
    <div class="ml-auto">
      <!-- Sidenav toggler -->
      <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
        <div class="sidenav-toggler-inner">
          <i class="sidenav-toggler-line"></i>
          <i class="sidenav-toggler-line"></i>
          <i class="sidenav-toggler-line"></i>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar-inner">
    <!-- Collapse -->
    <div class="collapse navbar-collapse" id="sidenav-collapse-main">
      <!-- Nav items -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <router-link :to="{ name: 'dashboard'}" class="nav-link">
            <i class="ni ni-shop text-primary"></i>
            <span class="nav-link-text">Dashboard</span>
          </router-link>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
            <i class="ni ni-ungroup text-orange"></i>
            <span class="nav-link-text">Functions</span>
          </a>
          <div class="collapse" id="navbar-examples">
            <ul class="nav nav-sm flex-column">
              <li class="nav-item">
                <router-link :to="{ name: 'items'}" class="nav-link">
                  List
                </router-link>
                <router-link :to="{ name: 'addItem'}" class="nav-link">
                  Add
                </router-link>

              </li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>