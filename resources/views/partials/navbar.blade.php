<nav class="navbar navbar-expand-lg navbar-light bg-transparent">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('admin/images/logo1.png') }}" height="150">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link {{ ($title == 'Home') ? 'active' : '' }}" href="/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title == 'About') ? 'active' : '' }}" href="#artikel">Artikel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title == 'Contact') ? 'active' : '' }}" href="#essai">Essai</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title == 'Shop') ? 'active' : '' }}" href="#puisi">Puisi</a>
                </li>
               <?php if (auth()->check()): ?>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo auth()->user()->name; ?>
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php if (auth()->user()->hasRole('admin')): ?>
                <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><hr class="dropdown-divider"></li>
            <?php endif; ?>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
        </ul>
    </li>
<?php else: ?>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}" style="background-color: #007bff; border-radius: 20px; padding: 10px 20px; color: #fff; margin-left: 80px;">Login</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('register') }}" style="background-color: #007bff; border-radius: 20px; padding: 10px 20px; color: #fff;">Register</a>
    </li>
<?php endif; ?>

            </ul>
        </div>
    </div>
</nav>
