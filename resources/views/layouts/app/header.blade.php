    <header class="p-3 text-bg-dark mb-3">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <i class="fa-brands fa-blogger fs-5 px-3" style="scale: 2"></i>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 text-light fs-4" style="font-family:fantasy">OhayoBlog</a></li>
        </ul>

        <div class="text-end">
            @if(!Auth::check())
            <a href="{{ url('login') }}" class="btn btn-outline-light me-2">Login</a>
            <a href="{{ url('register') }}" class="btn btn-outline-light me-2">Register</a>
            @else()
            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="..."
              class="img-fluid me-1" style="max-width: 18%; height: auto;border-radius: 50%;">
            <a href='#' class="btn btn-outline-light me-2">{{ Auth::user()->name }}</a>
            <a href="{{ url('logout') }}" class="btn btn-outline-light me-2">Logout</a>
            @endif
        </div>
      </div>
    </div>
  </header>
