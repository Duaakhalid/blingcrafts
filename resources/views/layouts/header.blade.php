 <!-- <header>
    <nav class="d-flex justify-content-between align-items-center bg-custom">  
        <ul class="nav">
            <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="/products" class="nav-link">Products</a></li>
            <li class="nav-item"><a href="/cart" class="nav-link">My Cart</a></li>
            <li class="nav-item"><a href="/contact" class="nav-link">Contact</a></li>
        </ul>
        <div class="ml-auto">
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="search" name="search">
                <button class="btn btn-purple my-3 mr-sm-4" type="submit" style="margin-left:0%;">Search</button>
            </form>
        </div>
    </nav>
</header>  -->

<header>
    <nav class="d-flex justify-content-between align-items-center bg-custom">
        
        <ul class="nav">
            <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="/products" class="nav-link">Products</a></li>
            </li>
            <li class="nav-item"><a href="/cart" class="nav-link">My Cart</a></li>
            <li class="nav-item"><a href="/contact" class="nav-link">Contact</a></li>
        </ul>

    
        <!-- <div class="ml-auto d-flex align-items-center">
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="search" name="search">
                <button class="btn btn-purple my-3 mr-sm-1" type="submit" style="margin-left: 0%;">Search</button>
            </form> -->

            <!-- <div class="search-bar-container">
    <input type="text" id="search-bar" placeholder="Search products..." class="search-input">
    <ul id="search-results" class="search-dropdown"></ul>
</div> -->

<div class="search-bar-container d-flex align-items-center my-2 mr-3">
    <!-- Search Input -->
    <input type="text" id="search-bar" placeholder="Search products..." class="form-control search-input">

    <!-- Search Button -->
    <button class="btn btn-purple ml-2" type="submit">Search</button>

    <!-- Search Results Dropdown -->
    <ul id="search-results" class="search-dropdown"></ul>
</div>

            @guest
            
                <a href="{{ route('login') }}" class="btn btn-purple ml-2">Login</a>
                <a href="{{ route('register') }}" class="btn btn-purple ml-3">Sign Up</a>
            @else
                
                @if (auth()->user()->is_admin)
                    <a href="{{ route('admin.products.index') }}" class="btn btn-outline-light ml-3">Admin Panel</a>
                @else
                    <a href="{{ route('dashboard') }}" class="btn btn-outline-light ml-3">My Dashboard</a>
                @endif
                <form action="{{ route('logout') }}" method="POST" class="ml-2">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            @endguest
        </div>
    </nav>
</header>

