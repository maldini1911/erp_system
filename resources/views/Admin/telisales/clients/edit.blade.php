@extends('Admin.system.app')
@section('title', trans('admin.clients'))
@section('system')
<div class="edit-client">
  <a href="{{url('admin/clients')}}" class="btn btn-success"> All Clients</a>
    <div class="card">
      <div class="card-body">
      <div class="container">
        <form action="{{url('admin/clients/'.$client->id)}}" method="POST">
          {{csrf_field()}}
          {{method_field('PUT')}}

          <div class="row">
            <div class="col-lg-4">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" value="{{$client->name}}">
              <div class="error">{{$errors->first('name')}}</div>
              <hr>
            </div>

              <div class="col-lg-4">
                  <label for="phone" >Phone</label>
                  <input type="text" value="{{$client->phone}}" class="form-control" name="phone">
                  <div class="error">{{$errors->first('phone')}}</div>
                  <hr>
              </div>

              <div class="col-lg-4">
                  <label for="phone2">Phone2</label>
                  <input type="text" class="form-control"  name="phone2" value="{{$client->phone2}}">
                  <div class="error">{{$errors->first('phone2')}}</div>
                  <hr>
              </div>

              <div class="col-lg-4">
                  <label for="landline">Landline Number</label>
                  <input type="text" value="{{$client->landline}}" class="form-control" name="landline">
                  <div class="error">{{$errors->first('landline')}}</div>
                  <hr>
              </div>


            <div class="col-lg-4">
                 <label for="source">Source</label>
                  <select name="source" class="form-control" >
                    <option value="1" <?php if($client->source=='1'){echo 'selected="selected"';}else{echo '';} ?>  >Company Guide Book</option>
                    <option value="2" <?php if($client->source=='2'){echo 'selected="selected"';}else{echo '';} ?>  > Marketing</option>
                    <option value="3" <?php if($client->source=='3'){echo 'selected="selected"';}else{echo '';} ?>  >Personal</option>
                    <option value="4" <?php if($client->source=='4'){echo 'selected="selected"';}else{echo '';} ?>   >Other</option>
                  </select>
                 <div class="error">{{$errors->first('source')}}</div>
                 <hr>
            </div>

              <div class="col-lg-4">
                  <label for="response">Response Status</label>
                  <select name="response" class="form-control">
                    <option value="1" <?php if($client->response=='1'){echo 'selected="selected"';}else{echo '';} ?>>active</option>
                    <option value="2" <?php if($client->response=='2'){echo 'selected="selected"';}else{echo '';} ?>>not intersted</option>
                    <option value="3" <?php if($client->response=='3'){echo 'selected="selected"';}else{echo '';} ?>>done</option>
                  </select>
                  <div class="error">{{$errors->first('response')}}</div>
                  <hr>
              </div>

              <div class="col-lg-4">
                  <label for="Country">Country</label>
                  <select name="country_id" class="form-control">
                    @foreach($countries as $country)
                    <option value="{{$country->id}}" <?php if($client->country==$country->country_name){echo 'selected="selected"';}else{echo '';} ?>>{{$country->country_name}}</option>
                    @endforeach
                  </select>
                 <div class="error">{{$errors->first('country')}}</div>
                  <hr>
              </div>

              <!-- Start Email -->
              <div class="col-lg-4">
                  <label for="Email">{{trans('admin.email')}}</label>
                  <input type="text" value="{{$client->email}}" name="email" class="form-control">
                  <div class="error">{{$errors->first('email')}}</div>
                  <hr>
              </div>
              <!-- End Email -->

              <!-- Start Chooise Type User -->
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
                  <hr>
              </div>
              <!-- End Chooise Type User -->



               <!-- Start Time Meeting Client -->
               <div class="col-lg-6">
                    <div class="small"></div>
                    <label for="Email">Time Metting Client</label>
                    <input type="text" name="meeting_client" class="form-control" id="datetimepicker" value="{{$client->meeting_client}}">
                    <hr>
               </div>
                <!-- End Time Meeting Client -->

              <!-- Start Price -->
              <div class="col-lg-6">
                  <div class="small"></div>
                  <label for="Email">Price</label>
                  <input type="number" name="price" class="form-control" value="{{$client->price}}" @if($client->price != null) disabled @endif>
                  <hr>
              </div>
              <!-- End Price -->


              <!-- Start Nodes -->
              <div class="col-lg-6">
                  <label for="Note">Note</label>
                  <textarea name="note" class="form-control" id="" cols="30" rows="10">{{$client->note}}</textarea>
                  <div class="error">{{$errors->first('note')}}</div>
              </div>
              <!-- End Nodes -->


             <!-- Start Show notes -->
              <div class="col-lg-6">
                <div class="card parent-notes">
                  <h4 class="text-center alert alert-info"> View Notes</h4>
                  <!-- Start Foreach Data For Note -->
                  @foreach($notes->where('user_id', Auth::user()->id) as $note)
                  <div class="card-body notes">
                    <p>  {{$note->note}} </p>
                    <hr>
                    <span class="date_note" style="padding: 8px 5px"> {{$note->created_at}}</span>
                    <a href="{{url('admin/clients/notes/delete/'.$note->id)}}" class="btn btn-danger btn-sm"> {{trans('admin.delete')}}</a>
                  </div>
                  @if(!$loop->last)  <hr> @endif
                  @endforeach
                  <!-- End Foreach Data For Note -->
                </div>

              </div>
              <!-- End Show Notes -->


              <!-- Start Button Submit -->
              <div class="col-lg-12">
                <hr>
                <button type="submit" class="btn btn-success col-4"><i class="fas fa-plus-circle"></i> Update Client</button>
              </div>
              <!-- End Button Submit -->

          </div>
        </form>

        </div>
      </div>
  </div>



</div>
@endsection
