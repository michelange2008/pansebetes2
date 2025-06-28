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
    <h3 class="pdf-sous-titre">Saisie des informations chiffrées</h3>
  </div>

  <table>

    <th>
      <tr>
        <td></td>
        <td>Valeur</td>
      </tr>
    </th>

    @foreach ($chiffresGroupes as $groupe => $chiffres)

      <tr>
        <td colspan="2" class="table-groupe">
          <h4>{{ ucfirst($groupe) }}</h4>
        </td>
      </tr>
      @foreach ($chiffres as $chiffre)

        <tr>

            <td class="table-chiffres-bordure">
              {{ $chiffre->nom }}
            </td>
            <td class="table-chiffres-bordure table-blanc">
              ...............................
            </td>

        </tr>

      @endforeach
      {{-- Interligne entre les groupes --}}
      <tr>
          <td style="color:white">-</td>
          <td style="color:white">-</td>
      </tr>


    @endforeach

  </table>


</div>
@endsection
