<nav class="navbar navbar-dark navbar-expand-lg navigation-clean-search">
    <div class="container"><a class="navbar-brand" href="#">Company Name</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse"
             id="navcol-1">
            @auth
                <ul class="nav navbar-nav">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#">Link</a></li>
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">General </a>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" role="presentation" href="{{route('goods.index')}}">Goods</a>
                            <a class="dropdown-item" role="presentation" href="{{route('brand.index')}}">Brand</a>
                            <a class="dropdown-item" role="presentation" href="{{route('categories.index')}}">Categories</a>
                        </div>
                    </li>
                </ul>
                <form class="form-inline mr-auto" method="post" action="/search">
                    <div class="form-group">
                        <label for="search-field">
                            <i class="fa fa-search"></i>
                        </label>
                        <input class="form-control search-field" type="search" id="search-field" name="search">
                    </div>
                </form>
            @else
                <ul class="nav navbar-nav">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#">Home</a></li>
                </ul>
            @endauth

        </div>
            @if(auth()->check())
                <ul class="nav navbar-nav pull-right">

                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle nav-link" id="notification" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fa fa-bell"></i></a>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" role="presentation" href="#">Settings</a>
                            <a class="dropdown-item" role="presentation" href="/logout">Logout</a>
                        </div>
                    </li>

                <li class="nav-item dropdown">
                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Settings </a>
                    <div class="dropdown-menu" role="menu">
                    <a class="dropdown-item" role="presentation" href="{{route('profile.edit',auth()->user())}}">Profile</a>
                        <a class="dropdown-item" role="presentation" href="/logout">Logout</a>
                    </div> 
                </li>
                </ul>
            @else
                <div class="pull-right">
            <span class="navbar-text ml-4"><a class="login" href="{{url('/')}}/login">Log In</a></span>
            <a class="btn btn-light action-button" role="button" href="{{url('/')}}/register">Sign Up</a>
                </div>
            @endif

    </div>
</nav>