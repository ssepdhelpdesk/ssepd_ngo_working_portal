<aside class="left-sidebar">
   <!-- Sidebar scroll-->
   <div class="scroll-sidebar">
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav">
         <ul id="sidebarnav">
            <li class="user-pro">
               <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><img src="{{ (!empty(Auth::user()->profile_photo))? url(Auth::user()->profile_photo_path):url('storage/profile-pic/no_image.jpg') }}" alt="user-img" class="img-circle"><span class="hide-menu">{{Auth::user()->name}} &nbsp;</span></a>
               <ul aria-expanded="false" class="collapse">
                  @can('my-profile-access')
                  <li><a href="{{route('admin.myprofile.index')}}"><i class="ti-user"></i> My Profile</a></li>
                  @endcan
                  <li><a href="javascript:void(0)"><i class="ti-wallet"></i> My Balance</a></li>
                  <li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a></li>
                  @can('my-profile-edit')
                  <li><a href="{{route('admin.myprofile.changePassword')}}"><i class="ti-settings"></i> Account Setting</a></li>
                  @endcan
                  <form method="POST" action="{{ route('logout') }}">
                     @csrf
                     <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                  </form>
               </ul>
            </li>
            <li class="nav-small-cap">--- PERSONAL</li>
            <li>
               <a class="has-arrow waves-effect waves-dark active" href="javascript:void(0)" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Dashboard </span></a>
            </li>
            @can('user-access')
            <li>
               <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-user-circle"></i><span class="hide-menu">Users</span></a>
               <ul aria-expanded="false" class="collapse">
                  @can('user-list')
                  <li><a href="{{route('admin.users.index')}}">View Users</a></li>
                  @endcan
                  @can('user-create')
                  <li><a href="{{route('admin.users.create')}}">Create Users</a></li>
                  @endcan
               </ul>
            </li>
            @endcan
            @if(auth()->user()->can('role-access') || auth()->user()->can('permission-access'))
            <li>
               <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fab fa-keycdn"></i><span class="hide-menu">Roles & permissions</span></a>
               <ul aria-expanded="false" class="collapse">
                  @can('role-list')
                  <li><a href="{{route('admin.roles.index')}}">View Roles</a></li>
                  @endcan
                  @can('role-create')
                  <li><a href="{{route('admin.roles.create')}}">Create Roles</a></li>
                  @endcan
                  @can('permission-list')
                  <li><a href="{{route('admin.permissions.index')}}">View Permissions</a></li>
                  @endcan
                  @can('permission-create')
                  <li><a href="{{route('admin.permissions.create')}}">Create Permissions</a></li>
                  @endcan
               </ul>
            </li>
            @endif
            @can('location-access')
            <li>
               <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Locations</span></a>
               <ul aria-expanded="false" class="collapse">
                  @can('location-list')
                  <li><a href="{{route('admin.locations.blockwise.index')}}">Block Wise</a></li>
                  <li><a href="{{route('admin.locations.municipalitywise.index')}}">Municipality Wise</a></li>
                  @endcan
                  @can('location-create')
                  <li><a href="app-ticket.html">Support Ticket</a></li>
                  <li><a href="app-contact.html">Contact / Employee</a></li>
                  <li><a href="app-contact2.html">Contact Grid</a></li>
                  <li><a href="app-contact-detail.html">Contact Detail</a></li>
                  @endcan
               </ul>
            </li>
            @endif
            <li class="nav-small-cap">--- BENEFICIARY SERVICES</li>
            <li>
               <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-media-right-alt"></i><span class="hide-menu">Beneficiary Services</span></a>
               <ul aria-expanded="false" class="collapse">
                  <li><a href="{{route('admin.ngo.index')}}">View NGOs</a></li>
                  <li><a href="{{route('admin.ngo.create')}}">NGO Registration</a></li>                  
               </ul>
            </li>
            <li class="nav-small-cap">--- SUPPORT</li>
            <li> <a class="waves-effect waves-dark" href="../documentation/documentation.html" aria-expanded="false"><i class="far fa-circle text-danger"></i><span class="hide-menu">Documentation</span></a></li>
            <li> <a class="waves-effect waves-dark" href="pages-login.html" aria-expanded="false"><i class="far fa-circle text-success"></i><span class="hide-menu">Log Out</span></a></li>
            <li> <a class="waves-effect waves-dark" href="pages-faq.html" aria-expanded="false"><i class="far fa-circle text-info"></i><span class="hide-menu">FAQs</span></a></li>
         </ul>
      </nav>
      <!-- End Sidebar navigation -->
   </div>
   <!-- End Sidebar scroll-->
</aside>