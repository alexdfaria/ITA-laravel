@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Table List')])

@section('content')
<div class="content">
  <div class="container-fluid">

  <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{url('table-edit', ['id' => $meal->id])}}">
          {{ csrf_field() }}

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Edit Meal') }}</h4>
                <p class="card-category">{{ __('Meal information') }}</p>
              </div>
              <div class="card-body ">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('ID') }}</label>
                  <div class="col-sm-2">
                    <div class="form-group">
                    <p> {{ $meal->id }}</p>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                    <h6 style="color:red;">(You cannot change the id)</h6>
                    </div>
                  </div>
                </div>
<!--                 <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('ID') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="id" id="input-name" type="int" placeholder="{{ $meal->id }}" value="{{ $meal->id }}" required="true" aria-required="true"/>  
                        <span id="name-error" class="error text-danger" for="input-name"></span>
                    </div>
                  </div>
                </div> -->
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <input class="form-control" name="name" id="input-name" type="text" placeholder="{{ $meal->name }}" value="{{ $meal->name }}" required="true" aria-required="true"/>  
                        <span id="name-error" class="error text-danger" for="input-name"></span>
                    </div>
                  </div>
                  <label class="col-sm-2 col-form-label">{{ __('Company ID') }}</label>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <input class="form-control" name="company" id="input-email" type="text" placeholder="{{ $meal->company }}" value="{{ $meal->company }}" required />
                        <span id="email-error" class="error text-danger" for="input-email"></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
  </div>
</div>
@endsection