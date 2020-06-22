@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Table List')])

@section('content')
<div class="content">
  <div class="container-fluid">

  <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{url('table-add')}}">
          {{ csrf_field() }}

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Create new Meal') }}</h4>
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
                  <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <input class="form-control" name="name" id="input-name" type="text" required="true" aria-required="true"/>  
                        <span id="name-error" class="error text-danger" for="input-name"></span>
                    </div>
                  </div>
                  <label class="col-sm-2 col-form-label">{{ __('Type of Food') }}</label>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <input class="form-control" name="type" id="input-type" type="text" required="true" aria-required="true"/>  
                        <span id="name-error" class="error text-danger" for="input-type"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Warehouse ID') }}</label>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <input class="form-control" name="warehouse" id="input-warehouse" type="text" required="true" />
                        <span id="email-error" class="error text-danger" for="input-warehouse"></span>
                    </div>
                  </div>
                  <label class="col-sm-2 col-form-label">{{ __('Price') }}</label>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <input class="form-control" name="price" id="input-price" type="text" required />
                        <span id="email-error" class="error text-danger" for="input-price"></span>
                    </div>
                  </div>
                  </div>
                  <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Stock') }}</label>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <input class="form-control" name="stock" id="input-stock" type="text" required />
                        <span id="email-error" class="error text-danger" for="input-stock"></span>
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