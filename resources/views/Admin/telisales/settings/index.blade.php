@extends('Admin.system.app')

@section('system')

      <div class="card">
          <div class="card-body">
              @if(Auth::user()->role == 'admin' Or Auth::user()->role == 'sales')
                  <h5>Telesales Settings</h5>
                  @foreach($settings as $settings_val)
                      <form action="{{route('settings_update')}}" method="POST">
                          @method('patch')
                          <div class="small"></div>
                          <div class="row">
                              @if(session()->has('message'))
                                  <div class="col-12">
                                      <div class="alert alert-success">
                                          <i class="fas fa-shield-check"></i> {{session()->get('message')}}
                                      </div>

                                  </div>
                              @endif
                              <div class="col-6">
                                  <label for="commission">Commission</label>
                                  <input type="text" class="form-control" name="commission" value="{{$settings_val->commission}}">
                                  <div class="small"></div>
                              </div>
                              <div class="col-6">
                                  <label for="Target">Target</label>
                                  <input type="text" class="form-control" name="target" value="{{$settings_val->target}}">
                              </div>
                              <div class="col-6">
                                  <hr>
                                  <button type="submit" class="btn btn-success">Save Settings</button>
                              </div>
                          </div>
                          @csrf

                      </form>
                  @endforeach
              @endif
          </div>
      </div>
@endsection
