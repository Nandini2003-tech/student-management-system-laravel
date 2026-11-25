<header class="w-100 fixed-top bg-dark">
  <nav class="navbar navbar-expand-lg" data-bs-theme="dark">

    <div class="container">
   <!-- logo -->
        <a class="navbar-brand fw-bold fs-4 text-white" href="{{route('dashboard')}}">Student<span class="text-info">MS</span></a>

        <!-- nav toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

      <!-- nav links -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class=" navbar-nav mb-2 mb-lg-0 me-auto">

          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{route('dashboard')}}">Dashboard</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{route('students.create')}}">Add Student</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('students.index')}}">View Student</a>
          </li>
        </ul>

        <!-- profile -->
        <li class="dropdown">
          <a class="btn btn-light text-capitalize py-1 px-3 dropdown-toggle" 
         href="#"  type="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ Auth::user()->name }}
          </a>

          <ul class="dropdown-menu">

            <li>
              <a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a>
            </li>

            <li>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="dropdown-item text-light fw-semibold py-2">
                  Logout
                </button>
              </form>
            </li>

          </ul>
        </li>

      </div>
    </div>

  </nav>
</header>