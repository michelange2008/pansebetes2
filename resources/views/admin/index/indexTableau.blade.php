{{-- LE BOUTON QUI S AFFICHE DEPEND DU TYPE D UTILISATEUR: labo (ajouter une demande), Veto ou eleveur (nous contacter) --}}

  @include('admin.index.indexBouton')

{{-- SI IL N Y A AUCUNE LIGNE DANS LE TABLEAU --}}
@if (count($datas->liste) === 0)

<div class="row my-3">

  <div class="col-md-12">

    <h4 class="text-secondary">{!! __($tableau_vide ?? 'tableaux.vide') !!}</h4>

  </div>

</div>
@else

<table   id="table"
  data-toggle = "table"
  data-locale = "fr-FR"
  data-sort-name = {{ $datas->intitules->tri->colonne ?? "" }}
  data-sort-order = {{ $datas->intitules->tri->ordre ?? "" }}
  data-toolbar = "#toolbar"
  data-pagination="true"
  data-pagination-v-align = "both"
  data-page-list="[10, 25, 50, 100, 200, All]"
  data-page-size="25"
  data-search-accent-neutralise="true"
  data-search="true"
  data-show-search-clear-button="true">
  <thead class="alert-bleu-tres-fonce">
    <tr>
      @foreach ($datas->intitules->liste as $intitule) <!-- issu de tableauEleveurs.json -->
        <th data-halign="{{ $intitule->align }}" data-align="{{ $intitule->align }}" data-field="{{ $intitule->id }}"
          data-sortable="{{ $intitule->sortable}}"
          @isset($intitule->width)
            data-width="{{$intitule->width}}"
          @endisset
           >{!! ucfirst(__($intitule->nom)) !!}</th>
      @endforeach
      {{-- dans de rare cas la largeur de la colonne est précisée pour éviter qu'elle ne soit trop large --}}
    </tr>
  </thead>
  <tbody>
    @foreach ($datas->liste as $user)
      <tr>

          @foreach ($user as $detail)

            @empty ($detail->action)

              <td>
                @isset($detail->nom)

                  {{ ucfirst(__($detail->nom)) }}

                @endisset
              </td>

            @elseif($detail->action === 'date')

              <td>
                {{-- juste pour le tri des dates tout en ayant un affichage correct --}}
                <span style="display:none">{{ \Carbon\Carbon::parse($detail->nom)}}</span>

                {{ \Carbon\Carbon::parse($detail->nom)->isoFormat('D MMM Y') }}

              </td>

            @elseif($detail->action === 'lien')

              <td>
                @nomLien([
                  'id' => $detail->id,
                  'nom' => ucfirst(__($detail->nom)),
                  'route' => $detail->route,
                  'tooltip' => $detail->tooltip,
                  'icone' => $detail->icone ?? '',
                ])
              </td>

            @elseif ($detail->action == "tableau")

              <td>
                {!! $detail !!}
              </td>

            @elseif($detail->action === 'del')

              <td>
                @supprLigne(['id' => $detail->id, 'route' => $detail->route, 'titre' => $detail->titre, 'texte' => $detail->texte])
              </td>
            @elseif ($detail->action === 'modifier')


              <td>
                @modifierLigne(['id' => $detail->id, 'route' => $detail->route])
              </td>

            @elseif ($detail->action === 'ouinon')

              <td>

                @ouinon(['condition' => $detail->nom])

              </td>

            @elseif ($detail->action === 'icone')

              <td>

                <img class="img-50" src="{{ url('storage/img/icones/'.$detail->nom) }}" alt="{{ $detail->nom }}">

              </td>

            @elseif ($detail->action === 'photo')

              <td>

                <img class="img-50" src="{{ url('storage/img/'.$detail->nom) }}" alt="{{ $detail->nom }}">

              </td>

            @elseif ($detail->action === 'email')

              <td>

                {{ $detail->nom }}

              </td>
            @endempty

          @endforeach
      </tr>
    @endforeach
  </tbody>
</table>

@endif
