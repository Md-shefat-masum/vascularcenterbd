<ul class="sidebar-menu">

    <li>
        <a href="/dashboard" class="sidebar-header">
            <i class="icon-anchor"></i><span> Home</span>
        </a>
    </li>

    <li>
        <a href="javascript:void(0)" class="sidebar-header">
            <i class="icon-layout"></i> <span>Basic Information</span>
            <i class="fa fa-angle-right pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
            <li><a href="{{ route('editor_contact_information_index') }}"><i class="fa fa-angle-right"></i>Contact</a></li>
            <li><a href="{{ route('editor_social_information_index') }}"><i class="fa fa-angle-right"></i>Social Links</a></li>
            <li><a href="{{ route('editor_seo_information_index') }}"><i class="fa fa-angle-right"></i>Seo Information</a></li>
            <li><a href="{{ route('editor_image_information_index') }}"><i class="fa fa-angle-right"></i>Image Information</a></li>
            <li><a href="{{ route('editor_about_information_index') }}"><i class="fa fa-angle-right"></i>About Information</a></li>

        </ul>
    </li>

    <li>
        <a href="javascript:void(0)" class="sidebar-header">
            <i class="fa fa-globe"></i> <span> Frontend</span>
            <i class="fa fa-angle-right pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
            <li><a href="{{ route('banner.index') }}"><i class="fa fa-angle-right"></i>Banner</a></li>
            <li><a href="{{ route('chember.index') }}"><i class="fa fa-angle-right"></i>Chember</a></li>
            <li><a href="{{ route('service.index') }}"><i class="fa fa-angle-right"></i>Service</a></li>
            <li><a href="{{ route('video.index') }}"><i class="fa fa-angle-right"></i>Video</a></li>
            <li><a href="{{ route('team.index') }}"><i class="fa fa-angle-right"></i>Team</a></li>
            <li><a href="{{ route('appoinment_topic.index') }}"><i class="fa fa-angle-right"></i>Appoinemnt Topic</a></li>
            <li><a href="{{ route('appoinment.index') }}"><i class="fa fa-angle-right"></i>Appoinemnts</a></li>
        </ul>
    </li>

    <li>
        <a href="javascript:void(0)" class="sidebar-header">
            <i class="icon-comment"></i> <span>Blog</span>
            <i class="fa fa-angle-right pull-right"></i>
        </a>
        <ul class="sidebar-submenu">
            <li><a href="{{ route('editor_blog_create') }}"><i class="fa fa-angle-right"></i>Create Blog</a></li>
            <li><a href="{{ route('editor_blog_list') }}"><i class="fa fa-angle-right"></i>All Blogs</a></li>
            <li><a href="{{ route('editor_blog_categories') }}"><i class="fa fa-angle-right"></i>All Categories</a></li>
            <li><a href="{{ route('editor_blog_tags_information_index') }}"><i class="fa fa-angle-right"></i>Blog Tags</a></li>
            <li><a href="{{ route('editor_blog_comment') }}"><i class="fa fa-angle-right"></i>All Blog Comments</a></li>
        </ul>
    </li>
    <li><a href="{{ route('message.index') }}" class="sidebar-header"><i class="fa fa-envelope-o"></i>Contact Message</a></li>
    <li><a href="{{ route('subscriber.index') }}" class="sidebar-header"><i class="fa fa-users"></i>Subscribers</a></li>
    {{-- <li>
        <a class="has-arrow" href="#">
            <div class="parent-icon"><i class="fa fa-book"></i></div>
            <div class="menu-title">Blog Management</div>
        </a>
        <ul class="">
            <li>
                <a href="{{ route('admin_blog_create') }}"><i class="zmdi zmdi-dot-circle-alt"></i> Create Blogs</a>
            </li>
            <li>
                <a href="{{ route('admin_blog_list') }}"><i class="zmdi zmdi-dot-circle-alt"></i> All Blogs</a>
            </li>
            <li>
                <a href="{{ route('admin_blog_categories') }}"><i class="zmdi zmdi-dot-circle-alt"></i> All Categories</a>
            </li>
            <li>
                <a href="{{ route('admin_blog_comment') }}"><i class="zmdi zmdi-dot-circle-alt"></i> Comments</a>
            </li>
        </ul>
    </li> --}}


</ul>
