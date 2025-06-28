{{-- Issu de salertes.blade.php --}}
<a href="{{ route('saisie.show', $saisie->id) }}">

  <div id="alert_{{$theme->id}}" class="alert detail detail-otorange">

    <div class="d-flex flex-row align-items-center">

      <img class="img-40" src="{{ url('storage/img/saisie/'.$theme->icone) }}" alt="">

      <h5>{{ $theme->nom }} ({{ $theme->nb_salertes }})</h5>

    </div>

    <div class="icones">

      <img class="img-40" src="{{ url('storage/img/back.svg') }}" alt="deplie" class="icone otoveil" title="Retour à la synthèse" />

    </div>

  </div>

</a>
