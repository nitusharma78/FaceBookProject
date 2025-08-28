@extends('layout.default')



@extends('layout.default')

<nav class="navbar navbar-expand-lg px-3">
    <div class="container-fluid">
        <!-- Left: Logo and Search -->
        <div class="d-flex align-items-center">
            <img src="https://upload.wikimedia.org/wikipedia/commons/0/05/Facebook_Logo_%282019%29.png" alt="Facebook"
                width="40">
            <div class="search-box ms-2">
                <i class="bi bi-search"></i>
                <input type="text" placeholder="Search Facebook">
            </div>
        </div>

        <!-- Center: Navigation Icons -->
        <div class="nav-icons mx-auto d-flex">
            <i class="bi bi-house-door-fill active mx-4"></i>
            <img src="{{ asset('images/friendsfacebook.png') }}" alt="Facebook" width="40" class="mx-4">
            <i class="bi bi-shop mx-4"></i>
        </div>

        <!-- Right: Profile Dropdown -->
        <div class="dropdown">
            <a href="#" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ asset('images/user.png') }}" class="rounded-circle"
                    style="height:40px; width:40px; cursor:pointer;">
            </a>

            <!-- Dropdown Menu -->
            <ul class="dropdown-menu dropdown-menu-end shadow border-0 p-2" aria-labelledby="profileDropdown"
                style="width: 280px;">

                <!-- User Info -->
                <li class="d-flex align-items-center p-2">
                    <img src="{{ asset('images/user.png') }}" class="rounded-circle me-2" width="45" height="45"
                        alt="User">
                    <div>
                        <strong>{{ Auth::user()->fname }} {{ Auth::user()->lname }}</strong>
                    </div>
                </li>

                <li>
                    <hr class="dropdown-divider">
                </li>

                <!-- Menu Items -->
                <li><a class="dropdown-item d-flex align-items-center" href="#">
                        <i class="bi bi-question-circle me-2"></i>View Profile
                    </a></li>
                <li><a class="dropdown-item d-flex align-items-center" href="#">
                        <i class="bi bi-gear me-2"></i> Settings
                    </a></li>
                <!-- <li><a class="dropdown-item d-flex align-items-center" href="#">
                        <i class="bi bi-moon me-2"></i> Display & Accessibility
                    </a></li>
                <li><a class="dropdown-item d-flex align-items-center" href="#">
                        <i class="bi bi-chat-left-text me-2"></i> Give Feedback
                    </a></li>
                <li> -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item d-flex align-items-center text-danger">
                        <i class="bi bi-box-arrow-right me-2"></i> Log Out
                    </button>
                </form>
                </li>
            </ul>
        </div>
    </div>
</nav>