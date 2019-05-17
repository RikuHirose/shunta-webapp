<header id="header" class="">
    <!-- <div class="container-fluid"> -->
    <div class="m-header container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row m-header--wrap">
                    <div class="col-md-3">
                        <div class="float-left m-header-logo">
                            <a href="/" class="">
                                <img src="http://rlx.jp/img/logo.png?1510128432" class="m-header-logo__sizing">
                            </a>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <nav class="float-right m-header-list">
                            @guest
                                <header-right-list></header-right-list>
                            @else

                                <div id="dropdown" class="dropdown">
                                    <div class="dropdown-toggle " type="" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="{{ $currentUser->image->url }}" class="m-header-list__avatar">
                                    </div>
                                    <ul class="dropdown-menu nav-lists dbmenu" aria-labelledby="dropdownMenu1">
                                        <li><a href="">マイページ</a></li>
                                        <li><a href="">Setting</a></li>
                                        <li>
                                            <a class="" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
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
