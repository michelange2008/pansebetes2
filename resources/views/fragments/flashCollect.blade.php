@if (session('message'))

  <div class="alert {{  session('couleur')  ?? 'alert-success'}} ">

  @foreach (session('message') as $libelle => $mess)

    <h5>
      {{ $libelle }} : {{ __($mess) }}
    </h5>

  @endforeach



    </div>

@endif
