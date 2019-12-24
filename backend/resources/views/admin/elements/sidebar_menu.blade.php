
<!-- menu profile quick info -->
<div class="profile clearfix">
    <div class="profile_pic">
        <img src="{{asset('admin_page/img/img.jpg')}}" alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">
        <span>Welcome,</span>
        <h2>Thang NK</h2>
    </div>
</div>
<!-- /menu profile quick info -->
<br/>
<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>Menu</h3>
        <ul class="nav side-menu">
            <li><a href="#"><i class="fa fa-home"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-user"></i> User</a></li>
            <li><a href="{{route('subject')}}"><i class="fa fa-book"></i> Subject</a></li>
            <li><a href="{{route('post')}}"><i class="fa fa-newspaper-o"></i> Post</a></li>
            <li><a href="{{route('exam')}}"><i class="fa fa fa-building-o"></i> Exam</a></li>
            <li><a href="{{route('question')}}"><i class="fa fa-question"></i> Question</a></li>
        </ul>
    </div>
</div>
<!-- /sidebar menu -->