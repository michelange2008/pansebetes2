@if (session('message'))

  <div class="alert {{  session('couleur')  ?? 'alert-success'}} ">

  @foreach (session('message') as $mess)

    <h5>
      {{ $mess }}
    </h5>

  @endforeach



    </div>

@endif
