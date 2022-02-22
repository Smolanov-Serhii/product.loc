<header class="header" id="header">
    <div class="header__container main-container">
        <div class="header__logo">
            <a href="{{ url('/') }}">
                <img src="{{ url('/') }}/img/header/logo.svg" alt="Logo">
            </a>
        </div>
        <div class="header__menu">
            <div class="header__search">
                <form action="{{ route('client.search') }}" method="get">
                    <input type="text" placeholder="Search mockups" name="query" value="{{ $query ?? '' }}" required>
                    <button>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.3447 16.3447C16.6376 16.0518 17.1124 16.0518 17.4053 16.3447L21.9053 20.8447C22.1982 21.1376 22.1982 21.6124 21.9053 21.9053C21.6124 22.1982 21.1376 22.1982 20.8447 21.9053L16.3447 17.4053C16.0518 17.1124 16.0518 16.6376 16.3447 16.3447Z" fill="#C2C6DC"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.25 4.875C7.72919 4.875 4.875 7.72919 4.875 11.25C4.875 14.7708 7.72919 17.625 11.25 17.625C14.7708 17.625 17.625 14.7708 17.625 11.25C17.625 7.72919 14.7708 4.875 11.25 4.875ZM3.375 11.25C3.375 6.90076 6.90076 3.375 11.25 3.375C15.5992 3.375 19.125 6.90076 19.125 11.25C19.125 15.5992 15.5992 19.125 11.25 19.125C6.90076 19.125 3.375 15.5992 3.375 11.25Z" fill="#C2C6DC"/>
                        </svg>
                    </button>
                </form>
            </div>
            <nav class="header__nav">
                <ul class="header__nav-list">
                    <li class="header__nav-item"><a class="header__nav-lnk" href="#">Mockups</a></li>
                    <li class="header__nav-item"><a class="header__nav-lnk" href="#">Pricing</a></li>
                    <li class="header__nav-item"><a class="header__nav-lnk" href="#">Log In</a></li>
                </ul>
            </nav>
            <div class="header__try button-stroke">
                <span>Try it Free</span>
            </div>
        </div>
    </div>
</header>

