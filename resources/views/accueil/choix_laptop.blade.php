<div class="row justify-content-center">

  <div class="col-sm-11 col-md-10 col-lg-9">

    <div class="nouvelle-saisie-liste alert desktop-only btn-otobleu" style="padding:0">

      <div class="d-flex flex-column">

        <h6>@lang('saisie.saisie_new')</h6>

        <p><em>@lang('saisie.choix_elevage') <i class="fas fa-arrow-right"></i></em></p>

      </div>

      @foreach ($especes as $espece)

        <img src="{{ url('storage/img/especes/'.$espece->icone)}}"
          id="nouvelle_{{$espece->id}}" name="{{auth()->user()->name}}" class="nouvelle-saisie-item toto shadow curseur"
          route= "{{url('/')}}"
          alt="{{$espece->nom}}" title="{{$espece->nom}}">

      @endforeach

    </div>

  </div>

</div>
