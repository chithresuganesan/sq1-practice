
@extends('layouts.app')

@section('content')
<div class="container fluid">
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">{{ __('Route') }}</div>

                <div class="card-body">
                  <form method="POST" action="{{ route('route') }}">
                    @csrf
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right required">{{ __('Request Type') }}</label>
                      <div class="col-md-6">
                        <select class="form-select  form-control{{ $errors->has('request_type') ? ' is-invalid' : '' }}" name="request_type" id="user-role" required>
                        <option value="" selected disabled>Please Select Role</option>
                        <option value="get" {{ old('request_type') == 'get' ? 'selected' : '' }}>Get</option>
                        <option value="post" {{ old('request_type') == 'post' ? 'selected' : '' }}>Post</option>
                        <option value="put" {{ old('request_type') == 'put' ? 'selected' : '' }}>Put</option>
                        <option value="delete" {{ old('request_type') == 'delete' ? 'selected' : '' }}>Delete</option>
                        </select>
                          @error('request_type')
                              <span class="invalid-feedback" role="alert" data-error="new_user">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right required">{{ __('Group Url') }}</label>
                      <div class="col-md-6">
                          <input  type="text" class="form-control @error('group_url') is-invalid @enderror" name="group_url" value="{{ old('group_url') }}" autocomplete="group_url" >

                          @error('group_url')
                              <span class="invalid-feedback" role="alert" data-error="new_user">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right required">{{ __('Url') }}</label>
                      <div class="col-md-6">
                          <input  type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') }}" autocomplete="url" >

                          @error('url')
                              <span class="invalid-feedback" role="alert" data-error="new_user">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right required">{{ __('Controller Name') }}</label>
                      <div class="col-md-6">
                        <select class="form-select  form-control{{ $errors->has('controller_name') ? ' is-invalid' : '' }}" name="controller_name" id="user-role" required>
                        <option value="" selected disabled>Please Select Controller</option>
                        <option value="TestController" {{ old('controller_name') == 'TestController' ? 'selected' : '' }}>TestController</option>
                        </select>

                          @error('controller_name')
                              <span class="invalid-feedback" role="alert" data-error="new_user">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="function_name" class="col-md-4 col-form-label text-md-right required">{{ __('Function Name') }}</label>
                      <div class="col-md-6">
                          <input  type="text" class="form-control @error('function_name') is-invalid @enderror" name="function_name" value="{{ old('function_name') }}"  required >

                          @error('function_name')
                              <span class="invalid-feedback" role="alert" data-error="new_user">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right required">{{ __('Route Name') }}</label>
                      <div class="col-md-6">
                          <input  type="text" class="form-control @error('route_name') is-invalid @enderror" name="route_name" value="{{ old('route_name') }}" required autocomplete="route_name" >

                          @error('route_name')
                              <span class="invalid-feedback" role="alert" data-error="new_user">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right required">{{ __('Route Show') }}</label>
                      <div class="col-md-6">
                        <select class="form-select  form-control{{ $errors->has('route_show') ? ' is-invalid' : '' }}" name="route_show" id="user-role" required>
                        <option value="" selected disabled>Please Select Route</option>
                        <option value="enable" {{ old('route_show') == 'enable' ? 'selected' : '' }}>Enable</option>
                        <option value="disable" {{ old('route_show') == 'disable' ? 'selected' : '' }}>Disable</option>
                        </select>
                          @error('route_show')
                              <span class="invalid-feedback" role="alert" data-error="new_user">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right required">{{ __('Is Menu') }}</label>
                      <div class="col-md-6">
                        <select class="form-select  form-control{{ $errors->has('menu') ? ' is-invalid' : '' }}" name="menu" id="user-role" required>
                        <option value="" selected disabled>Please Select Type</option>
                        <option value="Yes" {{ old('menu') == 'Yes' ? 'selected' : '' }}>Yes</option>
                        <option value="No" {{ old('menu') == 'No' ? 'selected' : '' }}>No</option>
                        </select>
                          @error('menu')
                              <span class="invalid-feedback" role="alert" data-error="new_user">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right"></label>

                        <div class="col-md-6">
                          <button type="submit" class="btn btn-sm font-12 text-light btn-info px-4">
                              {{ __('Submit') }}
                          </button>
                        </div>
                    </div>

                  </form>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                  <table class="table table-striped text-center">
                    <tr>
                      <th>Route Url</th>
                      <th>Route Name</th>
                      <th>Controller Name</th>
                      <th>Controller Function Name</th>
                      <th>Request Type</th>
                      <th>Action</th>
                    </tr>
                    @foreach ($customroutes as $key => $routes)
                      <tr>
                        <td>{{ $routes->group_url }}/{{ $routes->url }}</td>
                        <td>{{ $routes->route_name }}</td>
                        <td>{{ $routes->controller_name }}</td>
                        <td>{{ $routes->function_name }}</td>
                        <td>{{ $routes->request_type }}</td>
                        <td></td>
                      </tr>
                    @endforeach
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
