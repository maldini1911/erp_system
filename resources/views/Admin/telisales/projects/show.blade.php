@extends('Admin.system.app')
@section('title', trans('admin.projects'))

@push('css')
<style>
    .show-proejcts tr td:first-child{background: #f2f2f2;font-weight: bolder;width: 100px}
    .show-proejcts tr td:last-child{text-align: center}
</style>
@endpush
@section('system')

    <div class="card show-proejcts">
        <div class="card-body">
        <a href="{{url('admin/projects')}}" class="btn btn-primary"> All Projects </a>
        <hr>
            <h5 class="card-title text-center">Show Project</h5>
            <div class="container">
                <div class="table-responsive">
                    <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <td class="tb">Project</td>
                        <td>{{$project->name ? $project->name : 'Null'}}</td>
                    </tr>

                    <tr>
                        <td class="tb">Added By</td>
                        <td>{{$project->user_id ? $project->user['name'] : 'Null'}}</td>
                    </tr>

                    <tr>
                        <td class="tb">Client</td>
                        <td>
                            @isset($project->client_id)
                            <a href="{{url('admin/clients/'.$project->client['id'])}}" target="_blank">{{$project->client['name']}}</a>
                            @else
                              Null
                            @endisset
                        </td>
                    </tr>
                    <tr>
                        <td class="tb">Category</td>
                        <td>
                            @isset($project->category)
                                {{$project->category == 1 ? 'Web Designing' : ''}}
                                {{$project->category == 2 ? 'Marketing' : ''}}
                                {{$project->category == 3 ? 'Graphics Design' : ''}}
                                {{$project->category == 4 ? 'Other' : ''}}
                            @else
                            Null
                            @endisset

                        </td>
                    </tr>
                    @if(Auth::user()->role == 'admin' OR Auth::user()->role == 'sales')
                        <tr>
                            <td class="tb">Price</td>
                            <td>{{$project->price ? $project->price : 'Null'}}</td>
                        </tr>

                        <tr>
                            <td class="tb">Paid</td>
                            <td>{{$project->paid ? $project->paid : 'Null'}}</td>
                        </tr>
                    @endif
                    <tr>
                        <td class="tb">Package</td>
                        <td>
                            @isset($project->package)
                                {{$project->package == 1 ? 'Mini Package' : ''}}
                                {{$project->package == 2 ? 'Bussines Package' : ''}}
                                {{$project->package == 3 ? 'Super Package' : ''}}
                                {{$project->package == 4 ? 'CMS(wordpress,joomla,etc)' : ''}}
                                {{$project->package == 5 ? 'Private' : ''}}
                            @else
                            Null
                            @endisset
                        </td>
                    </tr>
                    <tr>
                        <td class="tb">Registerd Date</td>
                        <td>{{$project->register_date ? $project->register_date : 'Null'}}</td>
                    </tr>
                    <tr>
                        <td class="tb">Recieve date</td>
                        <td >{{$project->recieve_date ? $project->recieve_date : 'Null'}}</td>
                    </tr>

                    <tr>
                        <td class="tb">Status</td>
                        <td >{{$project->status ? $project->status : 'Null'}}</td>
                    </tr>
                    <tr>
                        <td class="tb">Note</td>
                        <td>{{$project->note ? $project->note : 'Null'}}</td>
                    </tr>

                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

@endsection
