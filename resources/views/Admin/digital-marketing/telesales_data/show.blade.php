@extends('Admin.system.app')

@section('system')

<div class="show-clients">
<div class="container">

    <div class="card">
        <div class="card-body">
            <!-- Start Show Clients -->
            <a href="{{url('admin/clients')}}" class="btn btn-primary"><i class="fas fa-edit"></i> All Clients</a>
            <a href="{{url('admin/clients/'.$client->id.'/edit')}}" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</a>

            <div class="small"></div>
            <table class="table table-bordered col-6 table-show-client">
                <tr>
                    <td class="tb">Name</td>
                    <td>{{$client->name ? $client->name : 'Null'}}</td>
                </tr>
                <tr>
                    <td class="tb">Phone</td>
                    <td>{{$client->phone ? $client->phone  : 'Null'}}</td>
                </tr>
                <tr>
                    <td class="tb">Phone 2</td>
                    <td>{{$client->phone2 ? $client->phone2   : 'Null'}}</td>
                </tr>
                <tr>
                    <td class="tb">Landline</td>
                    <td>{{$client->landline ? $client->landline  : 'Null'}}</td>
                </tr>
                <tr>
                    <td class="tb">Email Address</td>
                    <td>{{$client->email ? $client->email  : 'Null'}}</td>
                </tr>
                <tr>
                    <td class="tb">Country</td>
                    <td>{{$client->country ? $client->country['country_name'] : 'Null'}}</td>
                </tr>
                <tr>
                    <td class="tb">Source</td>
                    <td><?php if($client->source == 1 ){echo 'Company Guide Book'; }elseif($client->source == 2){echo 'Marketing'; }elseif($client->source==3 ){echo 'Personal'; }elseif($client->source==4 ){ echo 'Other';} ?></td>
                </tr>
                <tr>
                    <td class="tb">Response</td>
                    <td><?php if($client->response==1){echo 'active';}elseif($client->response==2){echo 'not intersted';}elseif($client->response==3){echo 'done';}  ?></td>
                </tr>
                <tr>
                    <td class="tb">Registed Date</td>
                    <td>{{$client->date ? $client->date : 'Null'}}</td>
                </tr>

            </table>
            <div style="height:50px;"></div>
            <!-- End Show Clients -->
        </div>
    </div>

    @if(Auth::user()->role == 'admin')
    <!-- Start Show Projects This Clients -->
    <div class="card">
        <div class="card-body">

                <h4>All Projects</h4>
                <div class="small"></div>
                <h5>Total Paid Price : {{$total_price}}</h5>
                <h5>Remaining Price : {{$total_remaining_price}} </h5>
                <div class="small"></div>
                <table id="myTable" class="display table-show-project" style="width:100%;">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Project</th>
                        <th>Price</th>
                        <th>Paid</th>
                        <th>Remaining</th>
                        <th>Status</th>
                        <th>Receive Date</th>
                        <th>Show</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($projects as $project)
                        <tr>
                            <td>{{$project->id}}</td>
                            <td>{{$project->name ? $project->name : 'Null'}}</td>
                            <td>{{$project->price ? $project->price : 'Null'}}</td>
                            <td>{{$project->paid ? $project->paid : 'Null'}}</td>
                            <td>{{$project->price-$project->paid}}</td>
                            <td>{{$project->status ? $project->status : 'Null'}}</td>
                            <td>{{$project->recieve_date ? $project->recieve_date : 'Null'}}</td>
                            <td><a href="{{url('admin/projects/'.$project->id)}}" target="_blank" class="btn btn-sm  btn-info">project details</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

        </div>
    </div>
    @endif
    <!-- End Show Projects This Clients -->
</div>
</div>
@endsection
