@extends('layouts.app')


@extends('menus.menuprincipal')
@push('js')
  <script src="{{asset(config('chemins.js'))}}/admin.js"></script>
@endpush

@section('contenu')

    <div class="container-fluid">

        <div class="row justify-content-center">

            <div class="col-sm-11 col-md-10 col-lg-9">

                @titre(['titre' => $titre])

            </div>

        </div>

        <div class="row justify-content-center">

            <div class="col-sm-11 col-md-10 col-lg-9">

                @include('fragments.flash')

            </div>

        </div>

        <div class="row justify-content-center">

            <div class="col-sm-9 col-md-8 col-lg-7">

                <form action="{{ route('admin.statsDisplayStore') }}" method="POST">

                    @csrf

                    @foreach ($statsDisplayList as $typeUser)

                    <div class="my-3 form-check">

                        <input 
                            class="form-check-input" 
                            id="{{ $typeUser['id'] }}" 
                            value="{{ $typeUser['id'] }}"
                            type="radio" 
                            name="statsDisplay"
                            @if ($statsDisplay->nom == $typeUser['id'])
                                checked
                            @endif
                        >
                        <label class="form-check-label" for="{{ $typeUser['id'] }}">{{ $typeUser['intitule'] }}</label>
                            
                    </div>

                    @endforeach

                    @enregistre()

                </form>

            </div>

        </div>
        
    </div>



@endsection
