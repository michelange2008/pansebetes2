@if($errors->any())

  <div class="alert alert-danger">

    <strong>Oups, nous n'avons pas pu valider votre saisie pour la raison suivante</strong>

    <ul class="list-unstyled">
      @foreach($errors->all() as $error)

        <li>
          {{ $error }}
        </li>

      @endforeach
    </ul>

  </div>

@endif
