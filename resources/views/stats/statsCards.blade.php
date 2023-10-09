@foreach ($cards as $card)

    <div class="flex-row d-flex justify-content-between">

        <div class="card">

            <div class="text-center card-body">

                <h3>{{ $card['titre'] }}</h3>

                <h5>{{ $card['soustitre'] }}</h5>
                
            </div>
        </div>

    </div>

@endforeach
