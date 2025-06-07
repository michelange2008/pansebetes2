@if (session('message'))

    <div class="alert {{  session('couleur')  ?? 'alert-success'}} ">

        {!! __('messages.'.session('message')) !!}

    </div>

@endif
