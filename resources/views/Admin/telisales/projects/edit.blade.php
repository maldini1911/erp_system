@extends('Admin.system.app')
@section('title', trans('admin.projects'))

@push('css')
    <style>
        .show-clients
        {
            background: #eee;
            cursor: pointer;
        }
        .show-clients li{border-bottom: 1px solid #111;}
    </style>
@endpush

@section('system')

<div class="edit-project">
    <a href="{{url('admin/projects')}}" class="btn btn-success"> All {{trans('admin.projects')}}</a>
    <hr>

    <div class="card">
      <div class="card-body">
        <div class="container">
          <form action="{{url('admin/projects/'.$project->id)}}" method="POST">
            @method('patch')
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <div class="small"></div>
            <div class="row">

              <div class="col-6">
                    <label for="name">Project Name</label>
                    <input type="text" class="form-control" name="name" value="{{$project->name}}">
              </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="input-21">{{trans('admin.client-name')}}</label>
                    @php $input = "client_id" @endphp
                    <input type="hidden" class="form-control @error($input) is-invalid @enderror" id="client" value="{{$project->client_id}}" name="{{$input}}">
                    @error($input)
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <input type="text" class="form-control" id="filter-clients-sales" value="{{$project->client['name']}}" url-data="{{url('admin/filter/clients/sales')}}">
                    <ul class="list-unstyled show-clients text-center"></ul>
                </div>
            </div>

               <div class="col-6">
                    <label for="receive date">Receive Date</label>
                    <input type="date" class="form-control" name="recieve_date" value="{{$project->recieve_date}}">
               </div>


                <div class="col-6">
                      <label for="Category">Category</label>
                      <select name="category" class="form-control">
                        <option value="1" <?php if($project->category == 1){echo 'selected';} ?> >Web Designing</option>
                        <option value="2" <?php if($project->category == 2){echo 'selected';} ?> >Marketing</option>
                        <option value="3" <?php if($project->category == 3){echo 'selected';} ?> >Graphics Design</option>
                        <option value="4" <?php if($project->category == 4){echo 'selected';} ?> >Other</option>
                      </select>
                </div>


                @if(Auth::user()->role == 'admin')
                    <div class="col-6">
                          <label for="price">Price</label>
                          <input type="text" name="price" value="{{$project->price}}" class="form-control">
                     </div>

                    <div class="col-6">
                          <label for="Paid">Paid</label>
                          <input type="text" name="paid" value="{{$project->paid}}" class="form-control" >
                    </div>

                @endif

                <div class="col-6">
                      <label for="Package">Package</label>
                      <select name="package" class="form-control">
                        <option value="1" <?php if($project->package ==1){echo 'selected';} ?>>Mini Package</option>
                        <option value="2" <?php if($project->package ==2){echo 'selected';} ?>>Bussines Package</option>
                        <option value="3" <?php if($project->package ==3){echo 'selected';} ?>>Super Package</option>
                        <option value="4" <?php if($project->package ==4){echo 'selected';} ?>>CMS(wordpress,joomla,etc)</option>
                        <option value="5" <?php if($project->package ==5){echo 'selected';} ?>>Private</option>
                      </select>
                </div>

                <div class="col-6">
                      <label for="status">Status</label>
                      <select name="status" class="form-control">
                        <option value="{{$project->status}}"></option>
                        <option value="waiting"> Waiting</option>
                        <option value="pending">Pending</option>
                        <option value="cancel">Cancel</option>
                        <option value="delay"> Delay</option>
                        <option value="finish">Finish</option>
                      </select>
                      <span style="background:#eee;font-size:20px;font-weight:bolder">{{$project->status}} </span>
                </div>


              <div class="col-6">
                <label for="note">Note</label>
                <textarea name="note"  cols="10" rows="5" class="form-control">{{$project->note}}</textarea>
              </div>

            <div class="col-12">
                <hr>
                <button type="submit" class='btn btn-primary '> Update Project</button>
            </div>
           </div>
          @csrf
         </form>


        @if($project->status != 'finish')
        <form action="{{route('finish_project',$project->id)}}" method="POST">
                    <br>

                  @if($project->status != 'pending')
                    @method('patch')
                    <button type="submit" class="btn btn-success"><i class="fas fa-check-circle"></i> Pending Project</button>
                    <input type="hidden" name="status" value="pending">
                    @csrf
                  @else

                @method('patch')
                <button type="submit" class="btn btn-danger"> Cancel Project</button>

                <input type="hidden" name="status" value="cancel">
                @csrf

              @endif
          </form>
          @endif
        </div>
      </div>
    </div>

</div>
@endsection
