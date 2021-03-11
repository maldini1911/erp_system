<!--Start sidebar-wrapper-->
<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true" class="border-right border-light-3 shadow-none">
     <div class="brand-logo border-light-3">
      <a href="index.html">
       <img src="{{url('/')}}/Admin/dmweg.png" width="100px" alt="logo icon">
     </a>
   </div>
   <ul class="sidebar-menu do-nicescrol">
     <li><a href="{{url('admin/dashboard')}}"><i class="zmdi zmdi-star-outline"></i> {{trans('admin.dashboard')}}</a></li>
      @if(Auth::user()->role == 'admin')
        <li>
          <a href="#" class="waves-effect">
            <i class="zmdi zmdi-view-dashboard"></i> <span>Users</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="sidebar-submenu">
            <li><a href="{{url('admin/admins')}}"><i class="zmdi zmdi-star-outline"></i> {{trans('admin.admins')}}</a></li>
            <li><a href="{{url('admin/commissions')}}"><i class="zmdi zmdi-star-outline"></i> {{trans('admin.commissions')}}</a></li>
              <li><a href="{{url('admin/target')}}"><i class="zmdi zmdi-star-outline"></i> {{trans('admin.target')}}</a></li>
          </ul>
        </li>
      @endif

      @if(Auth::user()->role == 'hr' OR Auth::user()->role == 'admin')
      <!-- Start HR -->
      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="fa fa-headphones"></i>
          <span>{{trans('admin.hr')}}</span>
          <i class="fa fa-angle-left float-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li><a href="{{url('admin/manage/clients')}}">  <i class="fas fa-user-cog"></i> {{trans('admin.manage-client')}}</a></li>
          <li><a href="{{url('admin/requests/marketing')}}"><i class="fas fa-user-cog"></i>{{trans('admin.requests_marketing')}}</a></li>
          <li><a href="{{url('admin/requests/programming')}}"><i class="fas fa-project-diagram"></i> {{trans('admin.requests_programming')}}</a></li>
        </ul>
      </li>
      <!-- End HR -->
      @endif

      @if(Auth::user()->role == 'sales' OR Auth::user()->role == 'admin')
      <!-- Start Telisales -->
      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="fa fa-headphones"></i>
          <span>{{trans('admin.telesales')}}</span>
          <i class="fa fa-angle-left float-right"></i>
        </a>
        <ul class="sidebar-submenu">
          <li><a href="{{url('admin/clients')}}"><i class="fas fa-user-cog"></i>{{trans('admin.client-sales')}}</a></li>
          <li><a href="{{url('admin/marketers/client')}}"><i class="fas fa-user-cog"></i>{{trans('admin.client-marketers')}}</a></li>
          <li><a href="{{url('admin/projects')}}"><i class="fas fa-project-diagram"></i> {{trans('admin.projects')}}</a></li>
          @if(Auth::user()->role == 'admin')
          <li><a href="{{url('admin/settings')}}"><i class="fa fa-cogs"></i> {{trans('admin.setting_telesales')}}</a></li>
          @endif
        </ul>
      </li>
      <!-- End Telisales -->
      @endif


      @if(Auth::user()->role == 'marketing' OR Auth::user()->role == 'admin')
       <!-- Start Digital Marketing -->
       <li>
           <a href="javaScript:void();" class="waves-effect">
               <i class="fas fa-bullhorn"></i>
               <span>{{trans('admin.digital-marketing')}}</span>
               <i class="fa fa-angle-left float-right"></i>
           </a>
           <ul class="sidebar-submenu">
               <!-- Start Facebook Campaign -->
               <li>
                   <a href="javaScript:void();" class="waves-effect">
                       <i class="fa fa-facebook-square"></i>
                       <span>{{trans('admin.facebook-campaign')}}</span>
                       <i class="fa fa-angle-left float-right"></i>
                   </a>
                   <ul class="sidebar-submenu">
                       <li><a href="{{url('admin/facebook/coustmer/campaign')}}"><i class="zmdi zmdi-star-outline"></i> {{trans('admin.coustmer-campaign')}}</a></li>
                       <li><a href="{{url('admin/facebook/our/campaign')}}"><i class="zmdi zmdi-star-outline"></i> {{trans('admin.our-campaign')}}</a></li>
                   </ul>
               </li>
               <!-- End Facebook Campaign -->

               <!-- Start Google Campaign -->
               <li>
                   <a href="javaScript:void();" class="waves-effect">
                       <i class="fa fa-google"></i>
                       <span>{{trans('admin.google-campaign')}}</span>
                       <i class="fa fa-angle-left float-right"></i>
                   </a>
                   <ul class="sidebar-submenu">
                       <li><a href="{{url('admin/google/coustmer/campaign')}}"><i class="zmdi zmdi-star-outline"></i> {{trans('admin.coustmer-campaign')}}</a></li>
                       <li><a href="{{url('admin/google/our/campaign')}}"><i class="zmdi zmdi-star-outline"></i> {{trans('admin.our-campaign')}}</a></li>

                   </ul>
               </li>
               <!-- End Google Campaign -->

               <li><a href="{{url('admin/telesales/data')}}"><i class="fas fa-database"></i> {{trans('admin.telesales-data')}}</a></li>
               <li><a href="{{url('admin/marketing/order/requests')}}"><i class="fas fa-user-cog"></i>{{trans('admin.requests_marketing')}}</a></li>
               <li><a href="{{url('admin/clients')}}"><i class="fas fa-flag"></i> {{trans('admin.reports')}}</a></li>

           </ul>
       </li>
       <!-- End Digital Marketing -->
      @endif


      @if(Auth::user()->role == 'programming' OR Auth::user()->role == 'admin')
       <!-- Start Digital Marketing -->
       <li>
           <a href="javaScript:void();" class="waves-effect">
               <i class="fas fa-bullhorn"></i>
               <span>{{trans('admin.programming')}}</span>
               <i class="fa fa-angle-left float-right"></i>
           </a>
           <ul class="sidebar-submenu">
               <li><a href="{{url('admin/programming/clients')}}">  <i class="fas fa-user-cog"></i> {{trans('admin.clients')}}</a></li>
               <li><a href="{{url('admin/programming/projects')}}"><i class="fas fa-database"></i> {{trans('admin.projects')}}</a></li>
               <li><a href="{{url('admin/programming/tasks')}}"><i class="fas fa-flag"></i> {{trans('admin.tasks')}}</a></li>

           </ul>
       </li>
       <!-- End Digital Marketing -->
      @endif

      <!-- Start Mallbox -->
      <!--
      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="zmdi zmdi-email"></i>
          <span>Mailbox</span>
           <small class="badge float-right badge-warning">12</small>
        </a>
        <ul class="sidebar-submenu">
          <li><a href="mail-inbox.html"><i class="zmdi zmdi-star-outline"></i> Inbox</a></li>
        </ul>
      </li>
      -->
      <!-- End Mailbox -->


    </ul>

   </div>
   <!--End sidebar-wrapper-->
