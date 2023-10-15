<div class="row">
    <div class="col">
        <h3>Evolution du nombre de saisies</h3>
        {{ $nb_pb_mensuel->renderHtml() }}
    </div>
</div>
<hr>
<div class="my-3 row">
    <div class="col-lg-6">
        <h3 class="text-center">Origine des utilisateurs.trices</h3>
        {{ $origine_users->renderHtml() }}
    </div>
    <div class="col-lg-6">
        <h3 class="text-center">Profession des utilisateurs.trices</h3>
        {{ $profession_users->renderHtml() }}
    </div>
</div>

@section('scripts')
{!! $nb_pb_mensuel->renderChartJsLibrary() !!}
{!! $nb_pb_mensuel->renderJs() !!}
{!! $origine_users->renderJs() !!}
{!! $profession_users->renderJs() !!}
@endsection