<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\SiteWebController;
    use App\Http\Controllers\PersonneController;
    use App\Http\Controllers\CompteController;
    use App\Http\Controllers\ImageController;

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
    Route::get('/', [SiteWebController::class, 'OuvrirHome']);
    Route::get('/contact', [SiteWebController::class, 'OuvrirContact']);
    Route::get('/envoyer-email-contact', [SiteWebController::class, 'EnvoyerEmail']);
    Route::get('/signup', [SiteWebController::class, 'OuvrirSignup'])->middleware('login');
    Route::post('/registration', [PersonneController::class, 'Registration']);
    Route::get('/not-found', [SiteWebController::class, 'OuvrirNotFound']);
    Route::get('/signin', [SiteWebController::class, 'OuvrirSignin'])->middleware('login');
    Route::post('/login', [CompteController::class, 'Authentification']);
    Route::get('/gestion-deconnexion', [CompteController::class, 'GestionDeconnexion']);
    Route::get('/forget1', [SiteWebController::class, 'OuvrirForget1'])->middleware('login');
    Route::post('/rechercher-compte-forget1', [CompteController::class, 'RechercherCompte'])->middleware('login');
    Route::post('/send-code-to-personne', [CompteController::class, 'EnvoyerCodeSecurite'])->middleware('login');
    Route::post('/gestion-forget4', [CompteController::class, 'GestionOuvrirForget4']);
    Route::get('/forget4/{email}', [SiteWebController::class, 'OuvrirForget4'])->name('forget4')->middleware('login');
    Route::post('/gestion-modifier-password-forget4', [CompteController::class, 'GestionUpdatePasswordForget']);
    Route::get('/profile', [PersonneController::class, 'OuvrirProfil'])->name('profileAuth')->middleware('notLoged');
    Route::get('/photo-profile', [PersonneController::class, 'OuvrirUpdateImage'])->middleware('notLoged');
    Route::post('/update-image-profile', [ImageController::class, 'GestionUpdateImageProfile']);
    Route::get('/supprimer-image', [ImageController::class, 'SupprimerImage']);
?>


