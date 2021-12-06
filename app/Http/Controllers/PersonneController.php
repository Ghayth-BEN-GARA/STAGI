<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use Carbon\Carbon;
    use App\Models\Personne;

    class PersonneController extends Controller{
        public function Registration(Request $request){
            $CompteController = new CompteController();
            $verifierCompte = $CompteController->VerifierCompte($request->email);
            
            if($verifierCompte == 'personne-not-exist'){
                $Personne = new Personne();
                $Personne->setEmailAttribute($request->email);
                $Personne->setNomAttribute($request->nom);
                $Personne->setPrenomAttribute($request->prenom);
                $Personne->setGenreAttribute($request->genre);
                $Personne->setNumeroAttribute($request->numero);
                $Personne->setNaissanceAttribute($request->naissance);
                $Personne->setProfessionAttribute($request->profession);
                try{
                    $Personne->save();
                    $CompteController->StoreCompte($request->email,$request->password);
                    $JournaleController = new JournaleController();
                    $JournaleController->StoreJournal('Inscription',$CompteController->GetIdCompte($request->email));
                    $CompteController->CreerSession($request->email,$request);
                    $this->EnvoyerMailBienvenue($request->email,$request->prenom);
                    $ImageController = new ImageController();
                    $ImageController->StoreImage($request->email);
                    return view('profile');
                }

                catch(\Exception $e){
                    return view ('errors.compte');
                }
            }

            else{
                return back()->with('personne-exist', '');
            }
        }

        public function EnvoyerMailBienvenue($email,$prenom){
            require base_path("vendor/autoload.php");
            $date = Carbon::now()->format('Y');

            $mailConfirmation = new PHPMailer(true);
            $mailConfirmation->IsSmtp();
            $mailConfirmation->SMTPDebug = 0;
            $mailConfirmation->SMTPAuth = true;
            $mailConfirmation->SMTPSecure = 'ssl';
            $mailConfirmation->Host = 'smtp.gmail.com';
            $mailConfirmation->Port = 465;
            $mailConfirmation->Timeout = 5;
            $mailConfirmation->IsHTML(true);
            $mailConfirmation->Username = 'stagi.tn@gmail.com';
            $mailConfirmation->Password = '123456789stagi';                                
            $mailConfirmation->setFrom('stagi.tn@gmail.com', 'Stagi.tn');
            $mailConfirmation->addAddress($email);
            $mailConfirmation->isHTML(true);
            $mailConfirmation->CharSet = 'UTF-8';
            $mailConfirmation->Subject = 'Bienvenue sur Stagi.tn';
            $mailConfirmation->Body = "  <div style = 'border:1px solid #142850; padding:5px;margin-right:50px;margin-top:10px; text-align:center;'>
                                            <h1>Objet : Confirmation</h1>
                                            <p>Bonjour <b style = 'color: #142850;'>$prenom</b>,</p>
                                            <p>Votre compte a été créé. Vous pourrez maintenant partager et utiliser en toute simplicité votre compte.</p>
                                         </div>
                                        <div style = text-align:center>
                                            <p>Envoyé de : Stagi.tn<br>Copyright $date</p>
                                        </div>";
            $mailConfirmation->send();
        }

        public static function GetNomPrenom($email){
            $Personne = Personne::where('email', '=', $email)->first();
            return $Personne->getPrenomAttribute().' '.$Personne->getNomAttribute();
        }
    }
?>
