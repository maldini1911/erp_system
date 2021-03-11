@extends('Admin.system.app')

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
@section('title', trans('admin.projects'))
@section('system')

<div class="creat-project">
  <a href="{{url('admin/projects')}}" class="btn btn-success"> All {{trans("admin.projects")}}</a>
  <hr>
    <div class="card">
      <div class="card-body">
          <div class="container">
          <form action="{{url('admin/projects')}}" method="post">
            {{csrf_field()}}
            <div class="row">
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">


            <div class="col-6">
                <label for="Name">Name</label>
                <input type="text" class='form-control' name="name">
            </div>


            <div class="col-6">
                <div class="form-group">
                    <label for="input-21">{{trans('admin.client-name')}}</label>
                    @php $input = "client_id" @endphp
                    <input type="hidden" class="form-control @error($input) is-invalid @enderror" id="client" name="{{$input}}">
                    @error($input)
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror

                    <input type="text" class="form-control" id="filter-clients-sales" url-data="{{url('admin/filter/clients/sales')}}">
                    <ul class="list-unstyled show-clients text-center"></ul>
                </div>
            </div>

            <div class="col-6">
                <label for="Category">Category</label>
                <select name="category"  class="form-control">

                  <option value="1">Web Designing</option>
                  <option value="2">Marketing</option>
                  <option value="3">Graphics Design</option>
                  <option value="4">Other</option>
                </select>
            </div>


            @if(Auth::user()->role == 'admin')
              <div class="col-6">
                <label for="price">Price</label>
                <input type="text" name="price" class="form-control">
              </div>
               <div class="col-6">
                    <label for="name">paid</label>
                    <input type="number" class="form-control" name="paid">
               </div>
            @endif

            <div class="col-6">
                <label for="Package">Package</label>
                <select name="package" class="form-control">
                  <option value="1">Mini Package</option>
                  <option value="2">Bussines Package</option>
                  <option value="3">Super Package</option>
                  <option value="4">CMS(wordpress,joomla,etc)</option>
                  <option value="5">Private</option>
                </select>
            </div>



            <div class="col-6">
                <label for="recieve_date">Recieve Date</label>
                <input type="date" class="form-control" name="recieve_date">
            </div>



            <div class="col-6">
                <label for="status">Status</label>
                <select name="status" class="form-control">
                  <option value="waiting"> Waiting</option>
                  <option value="pending">Pending</option>
                  <option value="cancel">Cancel</option>
                  <option value="delay"> Delay</option>
                  <option value="finish">Finish</option>
                </select>
            </div>



            <div class="col-6">
              <label for="note">Note</label>
              <textarea name="note"  cols="30" rows="5" class="form-control"></textarea>
            </div>
            <?php
            $time = date('Y-m-d');
            ?>
            <input type="hidden" name="register_date" value = "<?php echo $time; ?>">
          </div>
          @csrf

              <hr>
          <button type="submit" class="btn btn-success col-4"><i class="fas fa-check-circle"></i> Submit project</button>
          </form>
          </div>
      </div>
    </div>






</div>
@endsection
