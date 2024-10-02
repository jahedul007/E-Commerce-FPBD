<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- plugins:css -->
    @include('admin.css')
  </head>
  <>
    <div class="container-scroller">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
              <a class="sidebar-brand brand-logo" href="index.html"><img src="admin/assets/images/logo.svg" alt="logo" /></a>
              <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="admin/assets/images/logo-mini.svg" alt="logo" /></a>
            </div>
            <ul class="nav">
              <li class="nav-item profile">
                <div class="profile-desc">
                  <div class="profile-pic">
                    <div class="count-indicator">
                      <img class="img-xs rounded-circle " src="admin/assets/images/faces/face15.jpg" alt="">
                      <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                      <h5 class="mb-0 font-weight-normal">Henry Klein</h5>
                      <span>Gold Member</span>
                    </div>
                  </div>
                  <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
                  <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                    <a href="#" class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                        <div class="preview-icon bg-dark rounded-circle">
                          <i class="mdi mdi-settings text-primary"></i>
                        </div>
                      </div>
                      <div class="preview-item-content">
                        <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                      </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                        <div class="preview-icon bg-dark rounded-circle">
                          <i class="mdi mdi-onepassword  text-info"></i>
                        </div>
                      </div>
                      <div class="preview-item-content">
                        <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                      </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                        <div class="preview-icon bg-dark rounded-circle">
                          <i class="mdi mdi-calendar-today text-success"></i>
                        </div>
                      </div>
                      <div class="preview-item-content">
                        <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                      </div>
                    </a>
                  </div>
                </div>
              </li>
              <li class="nav-item nav-category">
                <span class="nav-link">Navigation</span>
              </li>
              <li class="nav-item menu-items">
                <a class="nav-link" href="{{ url('redirect') }}">
                  <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                  </span>
                  <span class="menu-title">Dashboard</span>
                </a>
              </li>
              <li class="nav-item menu-items">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                  <span class="menu-icon">
                    <i class="mdi mdi-laptop"></i>
                  </span>
                  <span class="menu-title">Products</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="container">
                    <!-- Collapsible content -->
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu mt-2">
                            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.viewProduct') }}">Add Products</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('admin.showProduct') }}">Show Products</a></li>
                        </ul>
                    </div>
                </div>

              </li>
              <li class="nav-item menu-items">
                <a class="nav-link" href="{{ route('admin.category') }}">
                  <span class="menu-icon">
                    <i class="mdi mdi-playlist-play"></i>
                  </span>
                  <span class="menu-title">Catagory</span>
                </a>
              </li>

              <li class="nav-item menu-items">
                <a class="nav-link" href="{{ route('admin.slider') }}">
                  <span class="menu-icon">
                    <i class="mdi mdi-playlist-play"></i>
                  </span>
                  <span class="menu-title">Slider</span>
                </a>
              </li>

              <li class="nav-item menu-items">
                <a class="nav-link" href="{{ route('admin.reviewSlider') }}">
                  <span class="menu-icon">
                    <i class="mdi mdi-playlist-play"></i>
                  </span>
                  <span class="menu-title">Review Slider</span>
                </a>
              </li>

              <li class="nav-item menu-items">
                <a class="nav-link" href="{{ route('admin.location') }}">
                  <span class="menu-icon">
                    <i class="mdi mdi-playlist-play"></i>
                  </span>
                  <span class="menu-title">Location</span>
                </a>
              </li>

              <li class="nav-item menu-items">
                <a class="nav-link" href="{{ route('admin.order') }}">
                  <span class="menu-icon">
                    <i class="mdi mdi-playlist-play"></i>
                  </span>
                  <span class="menu-title">Order</span>
                </a>
              </li>




              <li class="nav-item menu-items">
                <a class="nav-link" href="http://www.bootstrapdash.com/demo/corona-free/jquery/documentation/documentation.html">
                  <span class="menu-icon">
                    <i class="mdi mdi-file-document-box"></i>
                  </span>
                  <span class="menu-title">Documentation</span>
                </a>
              </li>
            </ul>
          </nav>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- End custom js for this page -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>



