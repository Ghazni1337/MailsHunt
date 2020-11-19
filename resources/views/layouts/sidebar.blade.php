<div class="app-sidebar colored">
                    <div class="sidebar-header">
                        <a class="header-brand" href="{{ route('dashboard')}}">
                            <div class="logo-img">
                               <img src="{{asset('image/icon.png')}}" class="header-brand-img" alt="lavalite"> 
                            </div>
                            <span class="text">MailsHunt</span>
                        </a>
                        <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
                        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
                    </div>
                    
                    <div class="sidebar-content">
                        <div class="nav-container">
                            <nav id="main-menu-navigation" class="navigation-main">
                                <div class="nav-lavel"></div>
                                <div class="nav-item active">
                                    <a href="index.html"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                                </div>
                                <div class="nav-item has-sub">
                                    <a href="javascript:void(0)"><i class="ik ik-package"></i><span>Plans</span> <span class="badge badge-success">{{ plansCount() }}</span></a>
                                    <div class="submenu-content">
                                        <a href="{{ route('plan.all')}}" class="menu-item">
                                            All Plans
                                        </a>
                                        <a href="{{ route('plan.add')}}" class="menu-item">
                                            Add Plan
                                        </a>
                                    </div>
                                </div>
                                <div class="nav-item">
                                    <a href="{{asset('assets/pages/navbar.html')}}"><i class="ik ik-menu"></i><span>Navigation</span> <span class="badge badge-success">New</span></a>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>