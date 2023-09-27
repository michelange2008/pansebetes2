@extends('layouts.app')

@extends('menus.menuprincipal')

@section('contenu')
    <div class="container-fluid">

        <div class="my-3 row justify-content-center">

            <div class="col-sm-11 col-md-10 col-lg-9">

                @include('fragments.flash')

            </div>

        </div>

        <div class="my-3 row justify-content-center">

            <div class="col-sm-11 col-md-10 col-lg-9">

                @titre(['titre' => $titre])

            </div>

        </div>

        <div class="my-3 row justify-content-start">

            <div class="offset-2 col-sm-6 col-md-5 col-lg-4">

                <form class="" action="{{ route('admin.roleUpdate', $user->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    @inputText([
                      'name' => 'name',
                      'label' => 'Nom',
                      'isName' => $user->name,
                    ])

                    @inputSelect([
                        'name' => 'role_id',
                        'label' => 'rôle',
                        'required' => true,
                        'options' => $roles,
                        'isName' => $user->role->id,
                    ])

                    @inputSelect([
                        'name' => 'profession_id',
                        'label' => 'profession',
                        'required' => true,
                        'options' => $professions,
                        'isName' => $user->profession->id,
                    ])

                    @inputSelect([
                        'name' => 'region_id',
                        'label' => 'region',
                        'required' => true,
                        'options' => $regions,
                        'isName' => $user->region->id,
                    ])

                    @enregistreAnnule()
                </form>

            </div>

        </div>


    </div>
@endsection
