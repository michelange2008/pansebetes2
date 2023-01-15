@extends('layouts.app')

@extends('menus.menuprincipal')

{{-- @extends('aide.aide_accueil', ['especes' => session('especes')]) --}}

@section('contenu')

  <div class="container-fluid">

    <form class="" action="{{ route('ferme.update', $user) }}" method="post">
      @csrf
      @method('PUT')

      <div class="row justify-content-center">

        <div class="col-sm-11 col-md-10 col-lg-9">

          @titre

        </div>

      </div>

      <div class="row justify-content-center">

        <div class="col-sm-11 col-md-10 col-lg-9">

          @foreach ($parafermes as $paraferme)

            @if ($paraferme->type == "liste")

              @include('user.inputSelectFerme')

            @elseif ($paraferme->type == "liste multiple")

              @include('user.inputSelectFermeMultiple')

            @elseif ($paraferme->type == "texte")

              @inputTextarea([
                'label'=> $paraferme->nom,
                'name' => $paraferme->id,
                'isName' => $paraferme->value
              ])

            @else
              {{-- cf. fragments.inputNum --}}
              @if ($paraferme->unite == null)
                @inputNum([
                  'label' => $paraferme->nom,
                  'name' => $paraferme->id,
                  'min' => 0,
                  'step' => ($paraferme->type == 'int') ? 1 : 0.1,
                  'isName' => $paraferme->value,
                ])

              @else

                @inputNum([
                  'label' => $paraferme->nom.' ('.$paraferme->unite.')',
                  'name' => $paraferme->id,
                  'min' => 0,
                  'step' => ($paraferme->type == 'int') ? 1 : 0.1,
                  'isName' => $paraferme->value,
                ])

              @endif
              
            @endif

          @endforeach

        </div>

      </div>

      <div class="row justify-content-center">

        <div class="col-sm-11 col-md-10 col-lg-9">

          @enregistreAnnule()

        </div>

      </div>

    </form>

  </div>

@endsection
