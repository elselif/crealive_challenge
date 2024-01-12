<div class="main-sidebar">
          <aside id="sidebar-wrapper">
              <div class="sidebar-brand">
                  <a href="{{route('admin.home')}}">Admin Panel</a>
              </div>
              <div class="sidebar-brand sidebar-brand-sm">
                  <a href="{{route('admin.home')}}"></a>
              </div>

              <ul class="sidebar-menu">

                  <li class="active"><a class="nav-link" href="{{route('admin.home')}}"><i class="fas fa-hand-point-right"></i> <span>Dashboard</span></a></li>

                  <li class="nav-item dropdown ">
                    <a href="{{route('admin_author_show')}}" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Author Section</span></a>
                    <ul class="dropdown-menu">
                        <li class=""><a class="nav-link" href="{{route('admin_author_show')}}"><i class="fas fa-angle-right"></i> Author List</a></li>
                        <li class=""><a class="nav-link" href="{{route('admin_page_login')}}"><i class="fas fa-angle-right"></i> Author Posts</a></li>
                       
                        
                    </ul>
                </li>
                  <li class="nav-item dropdown ">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Advertisements</span></a>
                    <ul class="dropdown-menu">
                        <li class="active"><a class="nav-link" href=""><i class="fas fa-angle-right"></i> Top Advertisements</a></li>
                        <li class=""><a class="nav-link" href="{{route('admin_home_ad_show')}}"><i class="fas fa-angle-right"></i> Home Advertisements</a></li>
                        <li class=""><a class="nav-link" href=""><i class="fas fa-angle-right"></i> Sidebar Advertisements</a></li>
                    </ul>
                </li>
                  <li class="nav-item dropdown ">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>News</span></a>
                    <ul class="dropdown-menu">
                        <li class=""><a class="nav-link" href="{{route('admin_category_show')}}"><i class="fas fa-angle-right"></i> Categories</a></li>
                        <li class=""><a class="nav-link" href="{{route('admin_sub_category_show')}}"><i class="fas fa-angle-right"></i> SubCategories</a></li>
                        <li class=""><a class="nav-link" href="{{route('admin_post_show')}}"><i class="fas fa-angle-right"></i> Posts</a></li>
                        
                    </ul>
                </li>
                  <li class="nav-item dropdown ">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Page</span></a>
                    <ul class="dropdown-menu">
                        <li class=""><a class="nav-link" href="{{route('admin_page_about')}}"><i class="fas fa-angle-right"></i> About</a></li>
                        <li class=""><a class="nav-link" href="{{route('admin_page_login')}}"><i class="fas fa-angle-right"></i> Login</a></li>
                        <li class=""><a class="nav-link" href="{{route('admin_page_contact')}}"><i class="fas fa-angle-right"></i> Contact</a></li>
                       
                        
                    </ul>
                </li>
                 

                 
              </ul>
          </aside>
      </div>