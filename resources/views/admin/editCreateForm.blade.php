@extends('layouts.app')

@extends('menus.menuprincipal')

@section('contenu')

  <div class="container-fluid">

    <div class="row mt-3 justify-content-center">

      <div class="col-sm-11 col-md-10 col-lg-9">

        @titre(['titre'=> $elements->titre])

      </div>

    </div>


    <form class="needs-validation" action="{{ $elements->route}}" method="post">

      @csrf

      @method($elements->method)


      <div class="row justify-content-center">

        <div class="col-sm-11 col-md-10 col-lg-9">

          <div class="row ">

            @foreach ($elements->liste as $champ)

              @if ($champ->type == "text")

                <div class="col-md-6">

                  @inputText([
                    'name' => $champ->name,
                    'label' => $champ->label,
                    'isName' => $champ->isName ?? '',
                    'required' => $champ->required ?? '',
                  ])

                </div>

              @elseif ($champ->type == "number")

                <div class="col-md-6">

                  @inputNum([
                    'name' => $champ->name,
                    'label' => $champ->label,
                    'min' => $champ->min ?? '',
                    'max' => $champ->max ?? '',
                    'step' => $champ->step ?? '',
                    'isName' => $champ->isName ?? '',
                  ])

                </div>

              @elseif ($champ->type == "decimal")

                <div class="col-md-3 col-lg-2">

                  @inputDecimal([
                    'name' => $champ->name,
                    'label' => $champ->label,
                    'min' => $champ->min ?? '',
                    'max' => $champ->max ?? '',
                    'step' => $champ->step ?? '',
                    'isName' => $champ->isName ?? '',
                  ])

                </div>

              @elseif ($champ->type == "ouinon")

                <div >

                  @inputOuiNon([
                    'name' => $champ->name,
                    'label' => $champ->label,
                    'isName' => $champ->isName ?? '',
                  ])

                </div>

            @elseif ($champ->type == "select")

                <div class="col-md-6">

                  @inputSelect([
                    'name' => $champ->name,
                    'label' => $champ->label,
                    'required' => $champ->required,
                    'default' => $champ->default ?? '',
                    'options' => $champ->options,
                    'isName' => $champ->isName ?? '',
                  ])

                </div>

              @elseif ($champ->type == "textarea")

                <div class="col">

                  @inputTextarea([
                    'label' => $champ->label,
                    'name' => $champ->name,
                    'placeholder' => $champ->placeholder ?? "",
                    'isName' => $champ->isName ?? "",
                  ])
                </div>

              @elseif ($champ->type = "hidden")

                <input type="hidden" name="{{ $champ->name }}" value="{{ $champ->isName ?? '' }}">


              @endif


          @endforeach

        </div>

        </div>

      </div>

      <div class="row justify-content-center">

        <div class="col-sm-11 col-md-10 col-lg-9">

          @enregistreAnnule(['route' => $routeAnnule ?? url()->previous()])

        </div>


      </div>

    </form>

  </div>

@endsection
