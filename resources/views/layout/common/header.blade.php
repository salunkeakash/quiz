<header>
    @if ($title == 'home')
        <nav class="navbar" id="navbar">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/">
                        <img alt="TimesPro | Career Carnival" src="{{ asset('assets/images/logo.png') }}" class="logo">
                    </a>
                </div>
            </div>
        </nav>
    @else
        <nav class="navbar" id="navbar">
            <div class="container d-block">
                <div class="position-relative text-center">
                    <a href="/" class="backArrow">
                        <img src="{{ asset('assets/images/arrow-left.png') }}">
                    </a>
                    <h4 class="mb-0">{{ $title }}</h4>
                </div>
            </div>
        </nav>
    @endif

</header>
