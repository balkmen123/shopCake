<div class="navbar nav_title" style="border: 0;">
    <a href="{{route('admin.dashboard')}}" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
</div>

<div class="clearfix"></div>

<!-- menu profile quick info -->
<div class="profile clearfix">
    <div class="profile_pic">
        <img src="https://scontent.fhan5-3.fna.fbcdn.net/v/t1.6435-9/227058957_1461196324265490_5260948734856407232_n.jpg?_nc_cat=106&_nc_rgb565=1&ccb=1-5&_nc_sid=09cbfe&_nc_ohc=zEuvR3pY7YUAX9pMP4K&_nc_ht=scontent.fhan5-3.fna&oh=a764dd6c325c6cc786edd696b9cde464&oe=615F651D" alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">
        <span>Welcome,</span>
        <h2>Cao</h2>
    </div>
</div>
<!-- /menu profile quick info -->

<br />

<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-home"></i> Menu <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('listing.index',['model'=>'Menu'])}}">Danh mục</a></li>
                    <li><a href="{{route('listing.index',['model'=>'News'])}}">Tin tức</a></li>
                    <li><a href="{{route('listing.index',['model'=>'Product'])}}">Sản phẩm</a></li>
                    <li><a href="{{route('order.index')}}">Đơn hàng</a></li>
                    <li><a href="{{route('listing.index',['model'=>'Admin'])}}">Thành viên</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- /sidebar menu -->

<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
    <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    </a>
</div>
<!-- /menu footer buttons -->