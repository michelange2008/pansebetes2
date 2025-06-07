{{-- FRAGMENT DESTINE A FAIRE UN BOUTON voir
ET UN ROUTAGE VERS LA METHODE show
VARIABLES: id ET route
--}}
<a href="{{ route($route, $id) }}"

    class="allervers text-{{ $aligne ?? 'left' }}" type="submit" name="ok"

    data-toggle="tooltip" data-placement="top"

    title="Modification de la ligne">

      <i class="text-center text-success fas fa-eye"></i> {{ $nom }}

</a>

</form>
