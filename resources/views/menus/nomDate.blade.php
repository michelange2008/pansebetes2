<img class="img-40" src="{{ url('storage/img/especes/'.$saisie->espece->icone) }}" alt="">

{{$saisie->elevage->nom}} -

{{$saisie->created_at->month}} {{$saisie->created_at->locale('fr')->monthName}} {{$saisie->created_at->year}}
