<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="index.html">
            <img src="https://img.icons8.com/color/48/000000/apple.png" alt="Logo" width="40" class="me-2">
            <span class="fw-bold" style="font-family: 'Montserrat', sans-serif;">Fruit Store</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" href="index.html">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('user.products') }}">Products</a></li>
                <li class="nav-item position-relative">
                    <a class="nav-link" href="{{ route('user.product.myCart') }}">
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success"
                            id="cart-count">{{ $totalQuantity }}</span>
                        <img src="https://img.icons8.com/fluency/24/000000/shopping-cart.png" />
                    </a>
                </li>
                <li class="nav-item position-relative">
                    <a class="nav-link" href="wishlist.html">
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                            id="wishlist-count">{{ $numFavorites }}</span>
                        <img src="https://img.icons8.com/color/24/000000/like--v3.png" />
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-globe"></i> {{ __('message.Change-Language') }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                        <li><a class="dropdown-item" href="{{ route('changeLang', 'en') }}">English</a></li>
                        <li><a class="dropdown-item" href="{{ route('changeLang', 'ar') }}">العربية</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
