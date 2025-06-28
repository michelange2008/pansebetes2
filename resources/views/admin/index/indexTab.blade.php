
@include('admin.index.indexTitre')

@include('admin.index.indexAddBouton')

{{-- SI IL N Y A AUCUNE LIGNE DANS LE TABLEAU --}}
@if ($indexTab->lignes->count() === 0)

<div class="row my-3">

  <div class="col-md-12">

    <h4 class="text-secondary">{!! __($tableau_vide ?? 'tableaux.vide') !!}</h4>

  </div>

</div>
@else

<table   id="table"
  data-toggle = "table"
  {{-- data-locale = "fr-FR" --}}
  {{-- data-sort-name = {{ $indexTab->intitules->tri->colonne ?? "" }} --}}
  {{-- data-sort-order = {{ $indexTab->intitules->tri->ordre ?? "" }} --}}
  data-pagination="false"
  data-pagination-v-align = "both"
  data-page-list="[10, 25, 50, 100, 200, All]"
  data-page-size="25"
  data-search-accent-neutralise="true"
  data-search="true"
  data-show-search-clear-button="true">
  <thead class="bg-otobleu">
    <tr>
      @foreach ($indexTab->entetes as $entete) <!-- issu de tableauEleveurs.json -->
        <th data-halign="{{ $entete->aligne }}" data-align="{{ $entete->aligne }}" data-field="{{ $entete->nom }}"
          data-sortable="{{ $entete->sortable}}"
          @isset($entete->width)
            data-width="{{$entete->width}}"
          @endisset
           >{!! ucfirst(__('tableaux.'.$entete->nom)) !!}</th>
      @endforeach
      {{-- dans de rare cas la largeur de la colonne est précisée pour éviter qu'elle ne soit trop large --}}
    </tr>
  </thead>
  <tbody>
    @foreach ($indexTab->lignes as $ligne)
      <tr>
          @foreach ($ligne as $item)

            @empty ($item->action)

              <td>
                @isset($item->nom)

                  {{ ucfirst(__($item->nom)) }}

                @endisset
              </td>

            @elseif($item->action === 'date')

              <td>
                {{-- juste pour le tri des dates tout en ayant un affichage correct --}}
                <span style="display:none">{{ \Carbon\Carbon::parse($item->nom)}}</span>

                {{ \Carbon\Carbon::parse($item->nom)->isoFormat('D MMM Y') }}

              </td>

            @elseif($item->action === 'lien')

              <td>
                @nomLien([
                  'id' => $item->id,
                  'nom' => ucfirst(__($item->nom)),
                  'route' => $item->route,
                  'icone' => $item->icone ?? '',
                  'aligne' => $entete->aligne ?? '',
                ])
              </td>

            @elseif ($item->action == "tableau")

              <td>
                {!! $item !!}
              </td>

            @elseif($item->action === 'del')

              <td>
                @supprLigne(['id' => $item->id, 'route' => $item->route, 'titre' => $item->titre, 'texte' => $item->texte])
              </td>

            @elseif ($item->action === 'edit')

              <td>
                @ligneEdit(['id' => $item->id, 'nom' => ucfirst($item->nom), 'route' => $item->route])
              </td>

            @elseif ($item->action === 'show')

              <td>
                @ligneShow(['id' => $item->id, 'nom' => $item->nom, 'route' => $item->route])
              </td>

            @elseif ($item->action === 'ouinon')

              <td>

                @ouinon(['condition' => $item->nom])

              </td>

            @elseif ($item->action === 'icone')

              <td>

                <img class="img-40" src="{{ url('storage/img/'.$item->nom) }}" alt="{{ $item->nom }}">

              </td>

            @elseif ($item->action === 'photo')

              <td>

                <img class="img-50" src="{{ url('storage/img/'.$item->nom) }}" alt="{{ $item->nom }}">

              </td>
            @elseif ($item->action === 'email')

              <td>

                {{ $item->nom }}

              </td>

            @endempty

          @endforeach
      </tr>
    @endforeach
  </tbody>

</table>

@endif

<div class="row my-3">

  <div class="col-md-12">

    <p class="text-secondary">{{ __('tableaux.end') }}</p>

  </div>

</div>
