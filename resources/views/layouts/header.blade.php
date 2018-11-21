<!-- Header-->
<header id="header" class="header">

    <div class="header-menu">

        <div class="col-sm-7">
            <div class="header-left">
            </div>
        </div>

        <div class="col-sm-5">
            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if (Auth::user()->image)
                        <img class="user-avatar rounded-circle" src="{{ asset(config('asset.image_path.avatar') . $currentUser->image) }}" alt="User Avatar">
                    @else
                        <img class="user-avatar rounded-circle" src="{{ asset(config('asset.image_path.default') . 'default.jpeg') }}" alt="User Avatar">
                    @endif
                </a>

                <div class="user-menu dropdown-menu" >
                    <a class="nav-link" href="{{ route('admin.user.edit', $currentUser->id) }}">
                        <i class="fa fa-user">{{ $currentUser->name }}</i></a>
                    <a class="nav-link" href="{{ route('admin.logout') }}"><i class="fa fa-power -off"></i>{{ __('message.logout') }}</a>
                </div>
            </div>

            <div class="language-select dropdown" id="language-select">
                <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="language" aria-haspopup="true" aria-expanded="true">
                    <i class="flag-icon flag-icon-vn"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="language" >
                    <div class="dropdown-item">
                        <span class="flag-icon flag-icon-us"></span>
                    </div>
                </div>
            </div>

        </div>
    </div>

</header><!-- /header -->
<!-- Header-->
