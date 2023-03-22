<div class="row justify-content-center">

  <div class="col-sm-11 col-md-10 col-lg-9">

    <div>

      @foreach ($saisies as $saisie)

        <div class="alert alert-dark pb-0">

          <div class="d-flex flex-row align-items-start">

            <img src="{{ 'storage/img/especes/'.$saisie->espece->icone }}" alt="">

            <div class="saisie-info d-flex flex-column">

              <h5 class="attention">
                Nom de la saisie
              </h5>

              <!-- information sur la saisie: date et nombre d'alertes s'il y en a -->
              <p><em>({{$saisie->created_at->day}} {{$saisie->created_at->locale('fr')->monthName}} {{$saisie->created_at->year}})</em>

                @if ($saisie->salertes->where('danger', 1)->count() === 0)
                  {{ ucfirst(__('saisie.no_alerte')) }}</p>

                @elseif ($saisie->salertes->where('danger', 1)->count() === 1)
                  <strong>{{$saisie->salertes->where('danger', 1)->count()}} @lang('saisie.alerte')</strong>

                @else
                  <strong>{{$saisie->salertes->where('danger', 1)->count()}} @lang('saisie.alertes')</strong>

                @endif

              </div>

            </div>

            <!-- Bouton:  voir, modifier, supprimer -->
            <div class="d-flex flex-row justify-content-between mb-2 mt-2">

              <div>

                <a href="{{route('saisie.show', $saisie->id)}}" class="btn btn-sm btn-otobleu rounded-0 m-1">
                  <i class="fa fa-pencil-alt"></i> @lang('saisie.voir') / @lang('saisie.edit')
                </a>

              </div>

              @if ($supprime ?? true)

                <div class="d-flex flex-column justify-content-center">

                  <a id="supprime_{{$saisie->id}}"

                    href="{{route('saisie.destroy', $saisie->id)}}"

                    class=" supprime justify-self-end btn btn-sm btn-otorange rounded-0">

                    <i class="far fa-trash-alt"></i> @lang('saisie.del')

                  </a>

                </div>

              @endif

          </div>

        </div>

      @endforeach

    </div>

  </div>

</div>
