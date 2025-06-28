{{-- Issu de accueil.blade.php --}}
<div class="menu-rond">

    @foreach ($especes as $espece)

      <img class="menu-item" id="menu-item_{{$espece->id}}"
            name="{{auth()->user()->name}}"
            route= "{{url('/')}}"
            src="{{ 'storage/img/especes/'.$espece->icone}}" alt="{{$espece->nom}}">

    @endforeach

  </div>

  <div class="bouton-rond smartphone-only"></div>
