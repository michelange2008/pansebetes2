@section('soustitre')
  <div class="container-fluid">
    <div class="alert alert-success d-flex">
      <img class="img-40 mr-3" src="{{asset(config('chemins.images'))}}/divers/{{$icone}}.svg" alt="">
      <h5 class="mt-3">{{$soustitre}}</h5>
    </div>
  </div>
@endsection
