<div class="d-flex alert bg-otobleu">

  @if (isset($icone))

    <img class="img-50" src="{!! url('storage/img/tableaux/'.$icone) !!}" alt="{{ $icone }}">

  @endif

  <h3 class="pt-3 ml-3">{!! ucfirst($titre) ?? '' !!}

    <small>{!! $soustitre ?? ''!!}</small>

  </h3>

</div>
