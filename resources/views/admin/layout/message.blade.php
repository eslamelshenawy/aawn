@if(count($errors->all()))
    <div class="alert alert-danger">
    <span class="help-block">
                                                      <small class="text-info">

                                                          @foreach($errors->all() as $error)

                                                              <li>{{$error}}</li>
                                                          @endforeach
                                                      </small>
                                                </span>
    </div>

@endif

@if(session()->has('success'))
    <div class="alert alert-info">
        <span class="help-block">
            <small class="text-success">
                <h4>{{session('success')}}</h4>
            </small>
        </span>
    </div>
@endif

@if(session()->has('error'))
    <div class="alert alert-info">
        <span class="help-block">
            <small class="text-success">
                <h4>{{session('error')}}</h4>
            </small>
        </span>
    </div>
@endif