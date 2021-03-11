@extends('Admin.system.app')
@section('title', trans('admin.projects'))
@section('system')

  <div class="row text-center">
    <div class="col-lg-12">
        <div class="card" style="width:100%!important">
            <div class="card-header">
              <a href="{{url('admin/projects/create')}}" class="btn btn-md btn-success float-left">{{trans("admin.create")}}</a>
              <i class="fa fa-table"></i> Data Projects
            </div>
            <div class="card-body">
                <div class="table-responsive">
                  <table id="example" class="table table-bordered">
                      <thead>
                          <tr>
                          <th>Name</th>
                          <th>Category</th>
                          <th>Package</th>
                          <th>Recieve_date</th>
                          <th>Client</th>
                          @if(Auth::user()->role == 'admin')
                          <th> User</th>
                          @endif
                          <th>Status</th>
                          <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>

                        @if(Auth::user()->role == 'admin')
                          @foreach($data as $project)
                            <tr role="row" class="odd">
                              <td class="sorting_1">{{$project['name'] ? $project['name'] : 'Null'}}</td>
                              <td>
                                @if($project->category==1)
                                Web Design
                                @elseif($project->category==2)
                                Marketing
                                @elseif($project->category==3)
                                Graphic Design
                                @elseif($project->category==4)
                                Other
                                @endif

                              </td>
                              <td>
                                @if($project->package==1)
                                Mini Package
                                @elseif($project->package ==2)
                                Bussines Package
                                @elseif($project->package ==3)
                                Super Package
                                @elseif($project->package ==4)
                                CMS
                                @elseif($project->package ==5)
                                Private
                                @endif
                              </td>

                              <td>{{$project->recieve_date ? $project->recieve_date : 'Null'}}</td>
                              <td>{{App\Models\Project::where('client_id',  [$project['client_id']])->count()  > 0 ? $project->client['name'] : 'Null'}}</td>
                              <td> {{$project->user_id ? $project->user['name'] : 'Null'}}</td>
                              <td> {{$project->status ? $project->status : 'Null'}} </td>
                              <td>
                                  <a href="{{url('admin/projects/'.$project->id)}}" class="btn btn-sm btn-primary">{{trans('admin.show')}}</a>
                                  <a href="{{url('admin/projects/'.$project->id.'/edit')}}" class="btn btn-sm btn-success">{{trans('admin.edit')}}</a>
                                  <a href="{{url('admin/projects/delete/'.$project->id)}}" class="btn btn-sm btn-danger">{{trans('admin.delete')}}</a>
                              </td>
                            </tr>
                          @endforeach

                        @endif

                        @if(Auth::user()->role == 'sales')
                          @foreach($data->where('user_id', Auth::user()->id) as $project)
                            <tr role="row" class="odd">
                              <td class="sorting_1">{{$project['name'] ? $project['name'] : 'Null'}}</td>
                              <td>
                                @if($project->category==1)
                                Web Design
                                @elseif($project->category==2)
                                Marketing
                                @elseif($project->category==3)
                                Graphic Design
                                @elseif($project->category==4)
                                Other
                                @endif

                              </td>
                              <td>
                                @if($project->package==1)
                                Mini Package
                                @elseif($project->package ==2)
                                Bussines Package
                                @elseif($project->package ==3)
                                Super Package
                                @elseif($project->package ==4)
                                CMS
                                @elseif($project->package ==5)
                                Private
                                @endif
                              </td>

                              <td>{{$project->recieve_date ? $project->recieve_date : 'Null'}}</td>
                              <td>{{$project->client['name'] ? $project->client['name'] : 'Null'}}</td>
                              <td>{{$project->status ? $project->status : "Null" }}</td>
                              <td>
                                  <a href="{{url('admin/projects/'.$project->id)}}" class="btn btn-sm btn-primary">{{trans('admin.show')}}</a>
                                  <a href="{{route('projects.edit', $project->id)}}" class="btn btn-sm btn-success">{{trans('admin.edit')}}</a>
                              </td>
                            </tr>
                          @endforeach
                        @endif
                      </tbody>

                  </table>
                  {{$data->links()}}
                </div>
            </div>
        </div>
    </div>
  </div><!-- End Row-->
@endsection
