        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
              <ul class="nav">
                <li class="nav-item nav-profile">
                  <a href="#" class="nav-link">
                    <div class="nav-profile-image">
                      <img src="{{ asset('images/faces/face1.jpg') }}" alt="profile" />
                      <span class="login-status online"></span>
                      <!--change to offline or busy as needed-->
                    </div>
                    <div class="nav-profile-text d-flex flex-column">
                      <span class="font-weight-bold mb-2">{{ Auth::user()->name}}</span>
                    </div>
                    <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('tasks.index') }}">
                    <span class="menu-title">Task Management</span>
                    <i class="mdi mdi-clipboard-check menu-icon"></i>
                  </a>
                </li>
              </ul>
            </nav>
            <div class="main-panel">
