<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="./"><img src="{{ asset(config('asset.image_path.logo') . 'framgia-logo.png') }}" alt="Logo"></a>
            <a class="navbar-brand hidden" href="./"><img src="{{ asset(config('asset.image_path.logo') . 'framgia-logo.png') }}" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>{{ __('message.title.dashboard') }}</a>
                </li>
                <h3 class="menu-title">{{ __('message.title.system') }}</h3><!-- /.menu-title -->
                <li>
                    <a href="{{ route('admin.user.index') }}"> <i class="menu-icon ti-user"></i>{{ __('message.user') }}</a>
                </li>
                <li>
                    <a href="{{ route('admin.role.index') }}"> <i class="menu-icon ti-user"></i>{{ __('message.role') }}</a>
                </li>
                <h3 class="menu-title">{{ __('message.title.business') }}</h3><!-- /.menu-title -->
                <li>
                    <a href="{{ route('admin.category.index') }}"> <i class="menu-icon ti-email"></i>{{ __('message.category') }}</a>
                </li>
                <li>
                    <a href="{{ route('admin.product.index') }}"> <i class="menu-icon ti-email"></i>{{ __('message.product') }}</a>
                </li>
                <li>
                    <a href="{{ route('admin.topping.index') }}"> <i class="menu-icon ti-email"></i>{{ __('message.topping') }}</a>
                </li>
                <h3 class="menu-title">{{ __('message.order') }}</h3><!-- /.menu-title -->
                <li>
                    <a href="{{ route('admin.order.index') }}"> <i class="menu-icon ti-email"></i>{{ __('message.order') }}</a>
                </li>
                <h3 class="menu-title">{{ __('message.index.statistics') }}</h3><!-- /.menu-title -->
                <li>
                    <a href="{{ route('admin.order.index') }}"> <i class="menu-icon ti-email"></i>{{ __('message.orderList') }}</a>
                </li>
                <li>
                    <a href="{{ route('admin.feedback.index') }}"> <i class="menu-icon ti-email"></i>{{ __('message.feedback') }}</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->
