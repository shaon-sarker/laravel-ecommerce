<!-- ########## START: LEFT PANEL ########## -->
<div class="sl-logo"><a href=""><i class="icon ion-android-star-outline"></i> starlight</a></div>
<div class="sl-sideleft">
  <div class="input-group input-group-search">
    <input type="search" name="search" class="form-control" placeholder="Search">
    <span class="input-group-btn">
      <button class="btn"><i class="fa fa-search"></i></button>
    </span><!-- input-group-btn -->
  </div><!-- input-group -->

  <label class="sidebar-label">Navigation</label>
  <div class="sl-sideleft-menu">
    <a href="index.html" class="sl-menu-link active">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
        <span class="menu-item-label">Dashboard</span>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <a href="" class="sl-menu-link">
      <div class="sl-menu-item">
        <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
        <span class="menu-item-label">Category</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
      <li class="nav-item"><a href="{{ route('category.index') }}" class="nav-link">Add Category</a></li>
      <li class="nav-item"><a href="{{ route('category.view') }}" class="nav-link">View Category</a></li>
    </ul>
    <a href="#" class="sl-menu-link">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
        <span class="menu-item-label">Products</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
      <li class="nav-item"><a href="{{ route('product.index') }}" class="nav-link">Add Product</a></li>
      <li class="nav-item"><a href="form-layouts.html" class="nav-link">Form Layouts</a></li>
    </ul>
    <a href="#" class="sl-menu-link">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
        <span class="menu-item-label">Order Details</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
      <li class="nav-item"><a href="{{ url('/userorder') }}" class="nav-link">View Order</a></li>
      <li class="nav-item"><a href="{{ url('/orderhistory') }}" class="nav-link">View History Order</a></li>
    </ul>
    <a href="#" class="sl-menu-link">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
        <span class="menu-item-label">Settings</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
      <li class="nav-item"><a href="{{ route('maintaince') }}" class="nav-link">Maintance</a></li>
      <li class="nav-item"><a href="{{ route('maintaince.up') }}" class="nav-link">Maintance Up</a></li>
      <li class="nav-item"><a href="{{ url('/env-editor') }}" target="__blank"  class="nav-link">Env File Manage</a></li>

      <li class="nav-item"><a href="{{ route('mail')}}" class="nav-link">Mail</a></li>
    </ul>
    <a href="#" class="sl-menu-link">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-navigate-outline tx-24"></i>
        <span class="menu-item-label">Maps</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
      <li class="nav-item"><a href="map-google.html" class="nav-link">Google Maps</a></li>
      <li class="nav-item"><a href="map-vector.html" class="nav-link">Vector Maps</a></li>
    </ul>
    <a href="mailbox.html" class="sl-menu-link">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
        <span class="menu-item-label">Mailbox</span>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <a href="#" class="sl-menu-link">
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-paper-outline tx-22"></i>
        <span class="menu-item-label">Pages</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
      <li class="nav-item"><a href="blank.html" class="nav-link">Blank Page</a></li>
      <li class="nav-item"><a href="page-signin.html" class="nav-link">Signin Page</a></li>
      <li class="nav-item"><a href="page-signup.html" class="nav-link">Signup Page</a></li>
      <li class="nav-item"><a href="page-notfound.html" class="nav-link">404 Page Not Found</a></li>
    </ul>
  </div><!-- sl-sideleft-menu -->

  <br>
</div><!-- sl-sideleft -->
<!-- ########## END: LEFT PANEL ########## -->

<!-- ########## START: HEAD PANEL ########## -->
<div class="sl-header">
  <div class="sl-header-left">
    <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
    <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
  </div><!-- sl-header-left -->
  <div class="sl-header-right">
    <nav class="nav">
      <div class="dropdown">
        <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
          <span class="logged-name">Jane<span class="hidden-md-down"> Doe</span></span>
          <img src="{{ asset('assets/backend/img/img7.jpg') }}" class="wd-32 rounded-circle" alt="">
        </a>
        <div class="dropdown-menu dropdown-menu-header wd-200">
          <ul class="list-unstyled user-profile-nav">
            <li><a href=""><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
            <li><a href=""><i class="icon ion-ios-gear-outline"></i> Settings</a></li>
            <li><a href=""><i class="icon ion-ios-download-outline"></i> Downloads</a></li>
            <li><a href=""><i class="icon ion-ios-star-outline"></i> Favorites</a></li>
            <li><a href=""><i class="icon ion-ios-folder-outline"></i> Collections</a></li>
            <li><a href=""><i class="icon ion-power"></i> Sign Out</a></li>
          </ul>
        </div><!-- dropdown-menu -->
      </div><!-- dropdown -->
    </nav>
    <div class="navicon-right">
      <a id="btnRightMenu" href="" class="pos-relative">
        <i class="icon ion-ios-bell-outline"></i>
        <!-- start: if statement -->
        <span class="square-8 bg-danger"></span>
        <!-- end: if statement -->
      </a>
    </div><!-- navicon-right -->
  </div><!-- sl-header-right -->
</div><!-- sl-header -->
<!-- ########## END: HEAD PANEL ########## -->
</div><!-- sl-sideright -->
<!-- ########## END: RIGHT PANEL ########## --->
