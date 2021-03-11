<!--Start topbar header-->
<header class="topbar-nav">
 <nav class="navbar navbar-expand fixed-top bg-dark border-bottom border-light-3">
  <ul class="navbar-nav mr-auto align-items-center">
    <li class="nav-item">
      <a class="nav-link toggle-menu" href="javascript:void();">
       <i class="icon-menu menu-icon text-white"></i>
     </a>
    </li>
  </ul>

  <ul class="navbar-nav align-items-center right-nav-link">

    @if(Auth::user()->role == 'sales')
    <li class="nav-item dropdown-lg">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
      <i class="fa fa-bell-o text-white"></i><span class="badge badge-info badge-up">{{Auth::user()->unreadNotifications->count()}}</span></a>
      <div class="dropdown-menu dropdown-menu-right">
        <ul class="list-group list-group-flush">
          <li class="list-group-item d-flex justify-content-between align-items-center">
          You have {{Auth::user()->unreadNotifications->count()}} Notifications
          <span class="badge badge-info">{{Auth::user()->unreadNotifications->count()}}</span>
          </li>

          <li class="list-group-item">
          <a href="javaScript:void();">
           <div class="media">
            <div class="media-body text-center">
            @foreach(Auth::user()->notifications()->limit(3)->get() as $notify)
              {{$notify->markAsRead()}}

                @isset($notify->data['message'])
                <h4 class="mt-0 msg-title alert alert-white"blue style="padding: 1px">{{$notify->data['message']}}</h4>
                <h4 class="mt-0 msg-title alert alert-white" blue style="padding: 1px">{{$notify->data['client']}}</h4>
                <h4 class="mt-0 msg-title alert alert-white"blue style="padding: 1px">{{$notify->data['meeting']}}</h4>
                 <hr>
                @endisset


                @isset($notify->data['id_client_sales'])
                        <a href="{{url('admin/clients/'.$notify->data['id_client_sales'])}}" class="mt-0 msg-title alert alert-white"blue style="padding: 1px">Check This New Client</a>
                        <h4 class="mt-0 msg-title alert alert-white" blue style="padding: 1px">{{$notify->data['marketer']}}</h4>
                @endisset

            @endforeach
            </div>
          </div>
          </a>
          </li>
          <li class="list-group-item"><a href="{{url('admin/notifcations/clients/all')}}">See All Notifications Meeting</a></li>
          <li class="list-group-item"><a href="{{url('admin/notifications/telesales/data/all')}}">See All Notifications Telesales Data</a></li>
        </ul>
      </div>
    </li>
    @endif

    <li class="nav-item">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
        <span class="user-profile"><img src="{{url('/')}}/uploads/admins/profile/{{Auth::user()->image}}" class="img-circle" alt="user avatar"></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-right">
       <li class="dropdown-item user-details">
        <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="{{url('/')}}/uploads/admins/profile/{{Auth::user()->image}}" alt="user avatar"></div>
            <div class="media-body">
            <h6 class="mt-2 user-title">{{auth()->guard('web')->user()->name}}</h6>
            <p class="user-subtitle">{{auth()->guard('web')->user()->email}}</p>
            </div>
           </div>
          </a>
        </li>

        @if(Auth::user()->role == 'admin')
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-envelope mr-2"></i> Inbox</li>
        @endif
        <li class="dropdown-divider"></li>
        <li class="dropdown-item">
          <i class="fas fa-user-circle"></i>
          <a href="{{url('admin/admins/profile/'.auth()->guard('web')->user()->id)}}">
          {{trans('admin.profile')}}
        </a>
        </li>
        @if(Auth::user()->role == 'admin')
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-settings mr-2"></i> Setting</li>
        <li class="dropdown-divider"></li>
        @endif
        <li class="dropdown-item">
          <a href="{{url('admin/logout')}}"><i class="icon-power mr-2"></i> Logout </a>
        </li>
      </ul>
    </li>
  </ul>
</nav>
</header>
<!--End topbar header-->

<div class="clearfix"></div>
