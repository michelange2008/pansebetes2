@extends('layouts.app')

@extends('menus.menuprincipal')

@extends('menus.soustitre', ['soustitre' => "Le CASDAR OTOVEIL, fruit d'un projet collectif", 'icone' => 'collectif'])

@section('contenu')

  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="ziehharmonika">
          <h3><i style="font-size:2rem" class="fas fa-users"></i> Chef de projet</h3>
          <div>
            <p><span class="font-weight-bold">Catherine EXPERTON</span> - ITAB</p>
          </div>
          <h3><i style="font-size:2rem" class="fas fa-user-friends"></i> Coordination de la rédaction des livrets</h3>
          <div>
            <p>
              <span class="font-weight-bold">Thierry MOUCHARD</span> - ITAB
            </p>
          </div>
          <h6 class="accordeon-intermediaire">Conception, rédaction, relectures et tests des livrets:</h6>

          @foreach($especes as $espece)
            <h3><img style="height:38px; padding-right:10px" src="{{config('chemins.especes').$espece->icone}}" alt="{{$espece->nom}}">{{ucfirst($espece->nom)}}</h3>
            <div>
              @foreach($participants as $participant)

                @foreach($participant->especes as $especeParticipant)

                  @if($especeParticipant->id == $espece->id)

                    <p>
                      <span class="font-weight-bold">{{$participant->nom}}</span> ({{trim($participant->institution)}})
                    </p>

                  @endif

                @endforeach

              @endforeach
            </div>
          @endforeach
          <h6 class="accordeon-intermediaire">Panse-bêtes WebApp</h6>
          <h3><i style="font-size:2rem" class="fas fa-globe-europe"></i> Conception web</h3>
          <div>
            <p>
              <span class="font-weight-bold">Michel BOUY</span> - ANTIKOR
            </p>
          </div>
          <h3><i style="font-size:2rem" class="fas fa-book-reader"></i> Relecture et tests</h3>
          <div>
            <p>
              <span class="font-weight-bold">Agathe VALORY</span> - ITAB
            </p>
          </div>


      </div>
    </div>
  <div class="container d-flex justify-content-end" style="border:none;padding:0">
    <a href="{{URL::route('accueil')}}" class="btn btn-otobleu text-light rounded-0">retour</a>
  </div>
  </div>
</div>

@endsection

@push('js')
  <script src="{{asset(config('chemins.js'))}}/ziehharmonika.js"></script>
  <script src="{{asset(config('chemins.js'))}}/accordeon.js"></script>
@endpush
