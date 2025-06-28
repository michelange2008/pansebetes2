<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\SaisieController;
use App\Http\Controllers\DevController;
use App\Http\Controllers\ChiffreController;
use App\Http\Controllers\AlerteController;
use App\Http\Controllers\NumalerteController;
use App\Http\Controllers\CritalerteController;
use App\Http\Controllers\OrigineController;
use App\Http\Controllers\ParafermeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\SchiffreController;
use App\Http\Controllers\SalerteController;
use App\Http\Controllers\SorigineController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\FermeController;
use App\Http\Controllers\AmiController;
use App\Http\Controllers\CompareController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\StatsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('/')->controller(FrontController::class)->group(function () {
  // Point d'accès à Panse-Bêtes
  Route::get('/', 'front')->name('front');
  // Vidéo de présentation
  Route::get('/presentation', 'presentation')->name('visiteur.presentation');
  Route::get('/statistiques/utilisation', 'utilisation')->name('visiteur.statistiques.utilisation');
  Route::get('/statistiques/exploitations', 'exploitations')->name('visiteur.statistiques.exploitations');
});

Route::get('Invalide', [AccueilController::class, 'nonValide'])->name('user_non_valide');

Route::group(['middleware' => ['auth', 'verified', 'isAdmin', 'isValid', 'addAdmin', 'menu']], function () {

  Route::get('/dev', [DevController::class, 'dev'])->name('dev');
  Route::post('/store', [DevController::class, 'store'])->name('dev.store');

  Route::prefix('/chiffres')->controller(ChiffreController::class)->group(function () {

    Route::get('/', 'index')->name('chiffre.index');
    Route::get('/index/{espece_nom}', 'indexParEspece')->name('chiffre.indexParEspece');
    Route::get('/create', 'create')->name('chiffre.create');
    Route::post('/store', 'store')->name('chiffre.store');
    Route::put('/update/{chiffre_id}', 'update')->name('chiffre.update');
    // Route::get('/{chiffre_id}', 'show')->name('chiffre.show');
    Route::get('/edit/{chiffre_id}', 'edit')->name('chiffre.edit');
    Route::delete('/delete/{chiffre_id}', 'destroy')->name('chiffre.destroy');
  });

  Route::prefix('/alerte')->controller(AlerteController::class)->group(function () {

    Route::get('/', 'index')->name('alerte.index');
    Route::get('/index/{espece_nom}', 'indexParEspece')->name('alerte.indexParEspece');
    Route::get('/create', 'create')->name('alerte.create');
    Route::post('/store', 'store')->name('alerte.store');
    Route::put('/update/{alerte_id}', 'update')->name('alerte.update');
    Route::put('/updateListe/{alerte_id}', 'updateListe')->name('alerte.updateListe');
    Route::put('/updateNum/{alerte_id}', 'updateNum')->name('alerte.updateNum');
    Route::get('/{alerte_id}', 'show')->name('alerte.show');
    Route::get('/edit/{alerte_id}', 'edit')->name('alerte.edit');
    Route::get('/editListe/{alerte_id}', 'editParamListe')->name('alerte.editParamListe');
    Route::get('/editNum/{alerte_id}', 'editParamNum')->name('alerte.editParamNum');
    Route::delete('/delete/{alerte_id}', 'destroy')->name('alerte.destroy');
  });

  Route::prefix('/alerte/num')->controller(NumalerteController::class)->group(function () {

    Route::get('/create/{alerte_id}', 'create')->name('num.create');
    Route::post('/store', 'store')->name('num.store');
    Route::put('/update/{alerte_id}', 'update')->name('num.update');
    Route::get('/edit/{alerte_id}', 'edit')->name('num.edit');
  });

  Route::prefix('/alerte/liste')->controller(CritalerteController::class)->group(function () {

    Route::get('/create/{alerte_id}', 'create')->name('liste.create');
    Route::post('/store', 'store')->name('liste.store');
    Route::put('/update/{alerte_id}', 'update')->name('liste.update');
    Route::get('/edit/{alerte_id}', 'edit')->name('liste.edit');
  });
  Route::prefix('/origine')->controller(OrigineController::class)->group(function () {

    Route::get('/', 'index')->name('origine.index');
    Route::get('/index/{alerte_id}', 'indexParAlerte')->name('origine.indexParAlerte');
    Route::get('/create/{alerte_id}', 'create')->name('origine.create');
    Route::post('/store', 'store')->name('origine.store');
    Route::put('/update/{origine_id}', 'update')->name('origine.update');
    Route::get('/edit/{origine_id}', 'edit')->name('origine.edit');
    Route::delete('/delete/{origine_id}', 'destroy')->name('origine.destroy');
  });

  Route::prefix('/paraferme')->group( function() {
    
    Route::get('/paraferme/ranger', [ParafermeController::class, 'ranger'])->name('paraferme.ranger');
    Route::post('/paraferme/storeRanger', [ParafermeController::class, 'storeRanger'])->name('paraferme.storeRanger');
    Route::resource('/paraferme', ParafermeController::class);
  });

});

/**
 * Les statistiques ont des droits d'affichages qui peuvent être modifiés par l'administrateur
 * le routes ne sont donc pas contraintes à un middleware de type auth ou isAdmin
 */
Route::group(['middleware' => ['auth', 'verified', 'addAdmin', 'isValid', 'menu']], function () {

  Route::prefix('/statistiques')->controller(StatsController::class)->group(function () {
    Route::get('/generales', 'generales')->name('stats.generales');
    Route::get('/exploitations', 'exploitations')->name('stats.exploitations');
    Route::get('/pansebetes', 'pansebetes')->name('stats.pansebetes');
    Route::get('/pansebetes/{espece_nom}', 'pansebetes')->name('stats.pansebetesParEspece');
  });

});

Route::group(['middleware' => ['auth', 'verified', 'isAdmin', 'isValid', 'addAdmin', 'menu']], function () {

  // Gestion des droits des utilisateurs par l'admin: acceptation, suppression
  Route::prefix('/administration')->controller(AdminController::class)->group(function () {
    // Affiche la liste des utilisateurs avec ceux à valider et ceux validés
    Route::get('/', 'utilisateurs')->name('admin.utilisateurs');
    // Affiche la page permettant de choisir qui peut voir les stats
    Route::get('/statsDisplayEdit', 'statsDisplayEdit')->name('admin.statsDisplayEdit');
    Route::post('/statsDisplayStore', 'statsDisplayStore')->name('admin.statsDisplayStore');
    // Affichage des notes laissées par les utilisateurs
    Route::get('/notes', 'notes')->name('admin.notes');
    // Permet à l'administrateur du site de modifier le role_id ou de supprimer
    Route::get('/userEdit/{id}', 'userEdit')->name('admin.userEdit');
    Route::put('/{id}', 'userUpdate')->name('admin.userUpdate');
    Route::get('/del/{id}', 'del')->name('admin.del');
    Route::delete('/{id}', 'destroy')->name('admin.destroy');
  });
  // Gestion des appels AJAX
  Route::prefix('/api')->controller(ApiController::class)->group(function () {
    // Route utilisée par admin.js pour changer les saisies d'un utilisateur que l'on supprime
    Route::get('/changeSaisieUser/{ancien_user_id}/{nouveau_user_id}', 'changeSaisieUser')->name('changeSaisieUser');
    // Route utilisée par admin.js pour la même raison que précédemment
    Route::get('/tousSauf/{id}', 'tousSauf')->name('tousSauf');
    // Route utilisée par afficherOrigines.js pour récupérer la liste des sorigines d'une salerte
    Route::get('/originesSalerte/{salerte_id}', 'originesSalerte');
  });
});

Route::group(['middleware' => ['auth', 'verified', 'isValid', 'addAdmin', 'menu']], function () {

  // Gestion du profil par les utilisateurs
  Route::prefix('/utilisateur')->controller(UserController::class)->group(function () {

    Route::get('/', 'index')->name('user.index');
    Route::get('/create', 'create')->name('user.create');
    Route::post('/store', 'store')->name('user.store');
    Route::get('/', 'show')->name('user.show');
    Route::get('/edit/', 'edit')->name('user.edit');
    Route::put('/update/{id}', 'update')->name('user.update');
    Route::get('/wantToDestroy', 'wantToDestroy')->name('user.wantToDestroy');
    Route::delete('/destroy', 'destroy')->name('user.destroy');
  });
  // Routes principales
  //
  Route::controller(AccueilController::class)->group(function () {
    // Liste des saisies de l'user authentifié
    Route::get('/accueil', 'accueil')->name('accueil');
    // Liste des saisies d'un ami suivi de l'auteur identifié
    Route::get('/ami/{user}', 'saisiesAmi')->name('saisiesAmi');
    // Description du programme (cf. menu principal)
    Route::get('/description', 'description')->name('description');
    // Instructions (cf. menu principal);
    Route::get('/instructions', 'instructions')->name('instructions');
    // etc.
    Route::get('/credits', 'credits')->name('credits');

    Route::get('/contact', 'contact')->name('contact');

    Route::get('/mentions_legales', 'mentions_legales')->name('mentions_legales');

    Route::get('/aide', 'aide')->name('aide');

    Route::get('/aide/video', 'video')->name('aide.video');
  });

  // Saisies

  Route::controller(SaisieController::class)->group(function () {

    Route::get('/saisie/nouvelle/{saisie_nom}/{espece_id}', 'nouvelle')->name('saisie.nouvelle');
    // Affiche la saisie en cours
    Route::get('/saisie/{saisie_id}', 'show')->name('saisie.show');

    Route::get('/saisie/renomme/{saisie}', 'renomme')->name('saisie.renomme');

    Route::post('/saisie/renomStore/{saisie}', 'renomStore')->name('saisie.renomStore');
    // Modifie les observations d'une saisie (les données chiffrées passent par le SchiffreController)
    Route::get('/saisie/observations/{saisie_id}', 'saisieObservations')->name('saisie.observations');

    Route::post('/saisie/enregistreObservations', 'enregistreObservations')->name('saisie.enregistreObservations')->middleware('nullToZero');

    Route::get('/saisie/destroy/{saisie_id}', 'destroy')->name('saisie.destroy');

    // Route::get('/saisie/resultats', 'enregistre')->name('saisie.resultats');

  });

  // Gestion de la saisie des paramètres numériques
  Route::prefix('/saisie/schiffres')->controller(SchiffreController::class)->group(function () {

    Route::get('/edit/{saisie_id}', 'edit')->name('schiffre.edit');

    Route::post('/store', 'store')->name('schiffre.store');

    Route::get('/{saisie_id}', 'show')->name('schiffre.show');
  });

  Route::controller(SalerteController::class)->group(function () {

    Route::get('/salerte/{saisie_id}/{theme_id}', 'index')->name('salerte.index');
  });

  // Routes des Sorigines

  Route::prefix('/saisie/sorigines')->controller(SorigineController::class)->group(function () {

    Route::get('/{saisie_id}', 'index')->name('sorigines.index');

    Route::get('/show/{saisie_id}', 'show')->name('sorigines.show');

    Route::post('/edit', 'edit')->name('sorigines.edit');

    Route::post('/enregistre', 'store')->name('sorigines.store');
  });
  // Production de pdf
  Route::prefix('pdf')->controller(PdfController::class)->group(function () {

    // Tableau vide pour la saisie de chiffres
    Route::get('/modeleNum/{espece}', 'modeleNum')->name('pdf.modeleNum');
    // Tableau vide pour la saisie des observations
    Route::get('/modeleObs/{espece}', 'modeleObs')->name('pdf.modeleObs');
    // Tableau vide pour la saisie des données de l'exploitation
    Route::get('/modeleExploitation', 'modeleExploitation')->name('pdf.modeleExploitation');
    // Exportation de la saisie
    Route::get('/saisie/{saisie}', 'saisie')->name('pdf.saisie');
  });

  // Route de gestion des informations de la ferme d'un user
  Route::prefix('ferme')->controller(FermeController::class)->group(function () {

    Route::get('/{user}', 'index')->name('ferme.index');

    Route::get('/{user}/create', 'create')->name('ferme.create');

    Route::post('{user}', 'store')->name('ferme.store');

    Route::get('/edit/{user}', 'edit')->name('ferme.edit');

    Route::put('{user}', 'update')->name('ferme.update');
  });

  // Gestion des amis
  Route::prefix('amis')->controller(AmiController::class)->group(function () {

    Route::get('/{user}', 'index')->name('amis.index');

    Route::get('/{user}/create', 'create')->name('amis.create');

    Route::post('{user}', 'store')->name('amis.store');

    Route::get('/edit/{user}', 'edit')->name('amis.edit');

    Route::put('{user}', 'update')->name('amis.update');
  });

  // Gestion des comparaisons
  Route::get('/comparaison', [CompareController::class, 'index'])->name('compare.index');
  // Comparaison de deux saisies par thème
  Route::post('/comparaison/themes', [CompareController::class, 'themes'])->name('compare.themes');
  // Comparaison de plusieurs saisies par salerte
  Route::get('/comparaison/theme/{theme}/{saisies}', [CompareController::class, 'salertes'])->name('compare.salertes');

  // Gestion des notes
  Route::resource('/notes', NoteController::class);
});


require __DIR__ . '/auth.php';
