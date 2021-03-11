@extends('Admin.system.app')

@section('system')

<div class="show-clients">
<div class="container">

    <div class="card">
        <div class="card-body">
            <!-- Start Show Clients -->
            <a href="{{url('admin//programming/project')}}" class="btn btn-primary"><i class="fas fa-edit"></i> All Clients</a>
            <a href="{{url('admin//programming/project/'.$row->id.'/edit')}}" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</a>

            <div class="small"></div>

            <div class="row">
                <table class="table table-bordered col-8 table-show-client">
                    <tr>
                        <td class="tb">{{trans('admin.project-name')}}</td>
                        <td>{{$row->project_name ? $row->project_name : 'Null'}}</td>
                    </tr>
                    <tr>
                        <td class="tb">{{trans('admin.client-name')}}</td>
                        <td>{{$row->programming_request->manage_client->client['name']}}</td>
                    </tr>
                    <tr>
                        <td class="tb">{{trans('admin.project-type')}}</td>
                        <td>{{$row->project_type ? $row->project_type : 'Null'}}</td>
                    </tr>
                    <tr>
                        <td class="tb">{{trans('admin.status')}}</td>
                        <td>{{$row->project_status ? $row->project_status  : 'Null'}}</td>
                    </tr>
                    <tr>
                        <td class="tb">{{trans('admin.project-price')}}</td>
                        <td>{{$row->project_price ? $row->project_price  : 'Null'}}</td>
                    </tr>
                    <tr>
                        <td class="tb">{{trans('admin.amount-paid')}}</td>
                        <td>{{$row->amount_paid ? $row->amount_paid  : 'Null'}}</td>
                    </tr>
                    <tr>
                        <td class="tb">{{trans('admin.remaining-amount')}}</td>
                        <td>{{$row->remaining_amount ? $row->remaining_amount : 'Null'}}</td>
                    </tr>
                    <tr>
                        <td class="tb">{{trans('admin.start-resgister')}}</td>
                        <td>{{$row->start_resgister ? $row->start_resgister  : 'Null'}}</td>
                    </tr>
                    <tr>
                        <td class="tb">{{trans('admin.amount-paid')}}</td>
                        <td>{{$row->finish_resgister ? $row->finish_resgister : 'Null'}}</td>
                    </tr>

                    <tr>
                        <td class="tb">{{trans('admin.date-start')}}</td>
                        <td>{{$row->date_start ? $row->date_start : 'Null'}}</td>
                    </tr>

                    <tr>
                        <td class="tb">{{trans('admin.date-line')}}</td>
                        <td>{{$row->date_line ? $row->date_line : 'Null'}}</td>
                    </tr>

                    <tr>
                        <td class="tb">{{trans('admin.project-level')}}</td>
                        <td>{{$row->project_level ? $row->project_level : 'Null'}}</td>
                    </tr>

                    <tr>
                        <td class="tb">{{trans('admin.project-url-domin')}}</td>
                        <td>{{$row->project_url_domin ? $row->project_url_domin : 'Null'}}</td>
                    </tr>

                    <tr>
                        <td class="tb">{{trans('admin.project-url-demo')}}</td>
                        <td>{{$row->project_url_demo ? $row->project_url_demo : 'Null'}}</td>
                    </tr>

                    <tr>
                        <td class="tb">{{trans('admin.project-ftp')}}</td>
                        <td>{{$row->project_ftp ? $row->project_ftp : 'Null'}}</td>
                    </tr>

                    <tr>
                        <td class="tb">Team Leader</td>
                        <td>{{$row->user_id ? $row->user['name'] : 'Null'}}</td>
                    </tr>

                </table>
                <!-- End Show Clients -->


                <div class="col-lg-4 text-center">
                    {{trans('admin.programmers')}}
                    <hr>
                </div>
            </div>
        </div>
    </div>


</div>
</div>
@endsection
