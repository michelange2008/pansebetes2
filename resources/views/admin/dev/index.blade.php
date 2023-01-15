@extends('layouts.app')





@section('contenu')

    <div class="form-group">

    <form class="" action="{{ route('dev.store') }}" method="post">

      @csrf

    <label for="exampleFormControlSelect2">Example multiple select</label>
    <select multiple class="form-control" id="exampleFormControlSelect2" name="essai[]">
      <option name="Un" value="A">1</option>
      <option name="Deux" value="B">2</option>
      <option name="Trois" value="C">3</option>
      <option name="Quatre" value="D">4</option>
      <option name="Cinq" value="E">5</option>
    </select>

    @enregistre()
  </form>
  </div>

@endsection
