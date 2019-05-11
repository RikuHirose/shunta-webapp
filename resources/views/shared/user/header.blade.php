<header id="header" class="">
    <!-- <div class="container-fluid"> -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-3">
                        <div class="float-left">
                            <a href="/" class="">
                                {{ config('app.name', 'Laravel') }}
                            </a>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <nav class="float-right">
                            @guest
                                <a class="" href="{{ route('login') }}">{{ __('Login') }}</a>
                                <a class="" href="{{ route('register') }}">{{ __('Register') }}</a>

                            @else

                                <div id="dropdown" class="dropdown">
                                    <div class="dropdown-toggle " type="" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="{{ asset('/static/user/images/user.png') }}" class="avatar">
                                    </div>
                                    <ul class="dropdown-menu nav-lists dbmenu" aria-labelledby="dropdownMenu1">
                                        <li><a href="">マイページ</a></li>
                                        <li><a href="">Setting</a></li>
                                        <li>
                                            <a class="" href="{{ route('logout') }}">
                                                 {{ __('Logout') }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
