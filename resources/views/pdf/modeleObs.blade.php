@extends('layouts.pdf')

@section('contenu')

  <br />
  <div class="entete">
    <img src="img/pansebetes.jpeg" alt="otoveil" class="logo">
    <h1 class="pdf-titre">{{ ucfirst($espece->nom) }}</h1>
    </div>
  </div>

  <div class="row mt-3" style="margin-left: 6%; width:80%">

  <div>
    <h3 class="pdf-sous-titre">Liste des observations à réaliser</h3>
    <p>Entourer l'option ou écrire le nombre d'animaux concernés</p>
  </div>

  <table class="table table-bordered">

    <th>
      <tr class="table-entete">
        <td class="table-chiffres-bordure col-350 tb-b-r">Observations</td>
        <td class="table-chiffres-bordure col-left">Résultats</td>
      </tr>
    </th>
    <tbody>

    @foreach ($observations as $observation)

      <tr>
        <td class="table-chiffres-bordure col-350 tb-b-r">{{ $observation->nom }}</td>

        <td class="table-chiffres-bordure col-left">
          @foreach ($observation->critalertes as $critalerte)

              <p>{{ $critalerte->nom }}</p>

            @endforeach
          </td>


    </tr>

    @endforeach

  </tbody>
  </table>


</div>
@endsection
