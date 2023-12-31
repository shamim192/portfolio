<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <div class="form-inline mr-auto"></div>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, Shamim</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Logged in 5 min ago</div>
                <a href="{{ route('profile.edit') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                <a href="features-settings.html" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Settings
                </a>
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a href="#" onclick="event.preventDefault();
              this.closest('form').submit();"
                        class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </form>

            </div>
        </li>
    </ul>
</nav>
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item">
                <a href="{{route('dashboard')}}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
         
            <li class="menu-header">Sections</li>

            {{-- <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li> --}}
            <li class="nav-item dropdown {{setSidebarActive(['admin.type-title.*','admin.hero.*'])}}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Hero</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{setSidebarActive(['admin.type-title.*'])}}"><a class="nav-link" href="{{ route('admin.type-title.index') }}">Typer Title </a></li>
                    <li class="{{setSidebarActive(['admin.hero.*'])}}"><a class="nav-link" href="{{ route('admin.hero.index') }}">Hero Section </a></li>


                </ul>
            </li>

            <li class="{{setSidebarActive(['admin.services.*'])}}">
                <a class="nav-link" href="{{ route('admin.services.index') }}"><i
                        class="far fa-square"></i><span>Services</span></a>
            </li>
            <li class=" {{setSidebarActive(['admin.about.*'])}}">
                <a class="nav-link" href="{{ route('admin.about.index') }}"><i
                        class="far fa-square"></i><span>About</span></a>
            </li>

            <li class="nav-item dropdown {{setSidebarActive(['admin.category.*','admin.portfolio-item.*','admin.portfolio-section-setting.*'])}}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Portfolio</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class=" {{setSidebarActive(['admin.category.*'])}}"><a class="nav-link" href="{{ route('admin.category.index') }}">Category </a></li>
                    <li class=" {{setSidebarActive(['admin.portfolio-item.*'])}}"><a class="nav-link" href="{{ route('admin.portfolio-item.index') }}">Portfolio Item </a></li>
                    <li class=" {{setSidebarActive(['admin.portfolio-section-setting.*'])}}"><a class="nav-link" href="{{ route('admin.portfolio-section-setting.index') }}">Section Setting </a></li>


                </ul>
            </li>

            <li class="nav-item dropdown {{setSidebarActive(['admin.skill-items.*','admin.skill-setting.*'])}} ">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Skill</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{setSidebarActive(['admin.skill-items.*'])}}"><a class="nav-link" href="{{ route('admin.skill-items.index') }}">Skill Items </a></li>
                    <li class="{{setSidebarActive(['admin.skill-setting.*'])}}"><a class="nav-link" href="{{ route('admin.skill-setting.index') }}"> Skill Setting </a></li>
                    
                    
                </ul>
            </li>

            <li class="{{setSidebarActive(['admin.experience.*'])}}">
                <a class="nav-link" href="{{ route('admin.experience.index') }}"><i
                        class="far fa-square"></i><span>Experience</span></a>
            </li>

            <li class="nav-item dropdown {{setSidebarActive(['admin.admin.feedback.*','admin.admin.feedback-setting.*'])}}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Feedback</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{setSidebarActive(['admin.admin.feedback.*'])}}"><a class="nav-link" href="{{ route('admin.feedback.index') }}"> Feedbacks </a></li>
                    <li class="{{setSidebarActive(['admin.admin.feedback-setting.*'])}}"><a class="nav-link" href="{{ route('admin.feedback-setting.index') }}"> Feedback Setting </a></li>
                    
                    
                </ul>
            </li>
            <li class="nav-item dropdown {{setSidebarActive(['admin.blog-category.*','admin.blog-list.*','admin.blog-setting.*'])}}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Blog</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{setSidebarActive(['admin.blog-category.*'])}}"><a class="nav-link" href="{{ route('admin.blog-category.index') }}"> Category </a></li>
                    <li class="{{setSidebarActive(['admin.blog-list.*'])}}"><a class="nav-link" href="{{ route('admin.blog-list.index') }}"> Blog List </a></li>
                    <li class="{{setSidebarActive(['admin.blog-setting.*'])}}"><a class="nav-link" href="{{ route('admin.blog-setting.index') }}"> Blog Setting </a></li>
                    
                    
                </ul>
            </li>

            <li class="nav-item dropdown {{setSidebarActive(['admin.contact-setting.*'])}}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Contact</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class=" {{setSidebarActive(['admin.contact-setting.*'])}}"><a class="nav-link" href="{{ route('admin.contact-setting.index') }}"> Contact Setting </a></li>
                                        
                </ul>
            </li>

            <li class="nav-item dropdown {{setSidebarActive(['admin.social-link.*','admin.footer-information.*','admin.contact-info.*','admin.useful-link.*','admin.help-link.*'])}}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Footer</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="{{setSidebarActive(['admin.social-link.*'])}}"><a class="nav-link" href="{{ route('admin.social-link.index') }}"> Social Link </a></li>
                    <li class="{{setSidebarActive(['admin.footer-information.*'])}}"><a class="nav-link" href="{{ route('admin.footer-information.index') }}"> Footer Information </a></li>
                    <li class="{{setSidebarActive(['admin.contact-info.*'])}}"><a class="nav-link" href="{{ route('admin.contact-info.index') }}"> Contact Info </a></li>
                    <li class="{{setSidebarActive(['admin.useful-link.*'])}}"><a class="nav-link" href="{{ route('admin.useful-link.index') }}"> Useful Links </a></li>
                    <li class="{{setSidebarActive(['admin.help-link.*'])}}"><a class="nav-link" href="{{ route('admin.help-link.index') }}"> Help Links </a></li>
                                        
                </ul>
            </li>

            <li class="menu-header">Settings</li>

          <li class="{{setSidebarActive(['admin.settings.*'])}}">
                <a class="nav-link" href="{{ route('admin.settings.index') }}"><i
                        class="far fa-square"></i><span>Settings</span></a>
            </li>

        </ul>
    </aside>
</div>
