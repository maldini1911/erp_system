@extends('Admin.system.app')
@section('title', trans('admin.clients'))
@section('system')


<div class="create-client">
  <a href="{{url('admin/clients')}}" class="btn btn-success"> All Clients</a>
  <div class="card">
    <div class="card-body">
      <div class="container">
        <form action="{{url('admin/clients')}}" method="POST">
          {{csrf_field()}}

          <!-- Start Row -->
          <div class="row">

                <div class="col-lg-4">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" name="name" value="{{old('name')}}">
                      <div class="error">{{$errors->first('name')}}</div>
                       <hr>
                </div>

              <div class="col-lg-4">
                  <label for="phone" >Phone</label>
                  <input type="text" value="{{old('phone')}}" class="form-control" name="phone">
                  <div class="error">{{$errors->first('phone')}}</div>
                  <hr>
              </div>

              <div class="col-lg-4">
                  <label for="phone2">Phone2</label>
                  <input type="text" class="form-control"  name="phone2" value="{{old('phone2')}}">
                  <div class="error">{{$errors->first('phone2')}}</div>
                  <hr>
              </div>

              <div class="col-lg-4">
                  <label for="landline">Landline Number</label>
                  <input type="text" value="{{old('landline')}}" class="form-control" name="landline">
                  <div class="error">{{$errors->first('landline')}}</div>
                  <hr>
              </div>

              <div class="col-lg-4">
                <div class="small"></div>
                    <label for="source">Source</label>
                    <select name="source" class="form-control">
                      <option value="1">Company Guide Book</option>
                      <option value="2">Marketing</option>
                      <option value="3">Personal</option>
                      <option value="4">Other</option>
                    </select>
                <div class="error">{{$errors->first('source')}}</div>
                  <hr>
              </div>


              <div class="col-lg-4">
                  <label for="Country">Country</label>
                  <select name="country_id" class="form-control">
                    @foreach($countries as $country)
                    <option value="{{$country->id}}" <?php if($country->country_name=='Egypt'){echo 'selected';}else{echo '';} ?> >{{$country->country_name}}</option>
                    @endforeach
                  </select>
                  <div class="error">{{$errors->first('country')}}</div>
                  <hr>
              </div>


              <div class="col-lg-4">
                  <label for="response">Response Status</label>
                  <select name="response" class="form-control">
                    <option value="1">active</option>
                    <option value="2">not intersted</option>
                    <option value="3">done</option>
                  </select>
                  <div class="error">{{$errors->first('response')}}</div>
                  <hr>
              </div>

              <div class="col-lg-4">
                  <label for="Email">{{trans('admin.email')}}</label>
                  <input type="text" value="{{old('email')}}" name="email" class="form-control">
                  <div class="error">{{$errors->first('email')}}</div>
                  <hr>
              </div>

              <div class="col-lg-4">
                  <div class="from-group">
                    <label for="Email">Chooise Position</label>
                    <br>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="marketing" name="position">
                      <label class="form-check-label" for="inlineCheckbox1">Marketing</label>
                    </div>

                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="programming" name="position">
                      <label class="form-check-label" for="inlineCheckbox2">Programming</label>
                    </div>

                      <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="all" name="position">
                          <label class="form-check-label" for="inlineCheckbox2">Programming & Marketing</label>
                      </div>
                  </div>
              </div>
              <!-- End Chooise Type User -->


              <!-- Start Time Meeting Client -->
              <div class="col-lg-6">
                 <div class="small"></div>
                <label for="Email">Time Metting Client</label>
                <input type="text" name="meeting_client" class="form-control" id="datetimepicker" autocomplete="off">
              </div>
              <!-- End Time Meeting Client -->


              <!-- Start Price -->
              <div class="col-lg-6">
                  <div class="small"></div>
                  <label for="price">Price</label>
                  <input type="number" name="price" class="form-control" autocomplete="off" placeholder="Price">
              </div>
              <!-- End Price -->

              <!-- Start Nodes -->
              <div class="col-lg-6">
                  <label for="Note">Note</label>
                  <textarea name="note" class="form-control" id="" cols="30" rows="10"></textarea>
                  <div class="error">{{$errors->first('note')}}</div>
              </div>
              <!-- End Nodes -->
              <hr>
              <input type="hidden" name="user_id" value ="{{ Auth::user()->id }}">

              <div class="col-12">
                  <hr>
              <button type="submit"  class="btn btn-success col-4"><i class="fas fa-plus-circle"></i> Submit Client</button>
              </div>

          </div>
          <!-- End Row -->

        </form>

      </div>
    </div>
  </div>
</div>
@endsection
