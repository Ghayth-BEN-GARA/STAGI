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
            $mailConfirmation->AddEmbeddedImage('site/img/logos/favicon.png', 'logo','site/img/logos/favicon.png');
            $mailConfirmation->CharSet = 'UTF-8';
            $mailConfirmation->Subject = 'Bienvenue sur Stagi.tn';
            $mailConfirmation->Body = "  <div style = 'padding:5px;margin-right:50px;margin-top:10px;'>
                                            <h3>Objet : Confirmation</h3>
                                            <p style = 'font-family:&quot;Lucida Grande&quot;,Tahoma;font-size:12px;'><b>Bonjour</b> <b style = 'color: #142850;'>$prenom</b>,</p>
                                            <p style = 'font-family:&quot;Lucida Grande&quot;,Tahoma;font-size:12px;'>Votre compte a été créé. Maintenant, vous pouvez facilement partager et utiliser votre compte.</p>
                                            </div>
                                            <div dir = 'ltr'>
                                                <div  style = 'color:rgb(0,0,0);font-family:&quot;Times New Roman&quot;;font-size:medium;width:130px;max-width:130px;min-width:100px;float:left;padding-top:15px'>
                                                    <img src = 'cid:logo' style = 'margin-top: 1.4em;margin-left:1.1em;width:90px;'/>
                                                </div>
                                                <div style = 'width:190px;max-width:190px;font-family:&quot;Lucida Grande&quot;,Tahoma;font-size:12px;margin-top:0.5em;color:rgb(102,102,102);letter-spacing:2px;border-left:2px solid rgb(211,216,215);padding-top:3px;padding-left:10px;overflow:hidden'>
                                                    <p>Ghayth Ben Gara&nbsp;<br></p>
                                                    <p>(+216) 52 792 385&nbsp;<br><a href = 'https://stagi.tn' style = 'margin-top:5px;color:rgb(102,102,102);text-decoration:none' target = '_blank'>Stagi.tn</a>&nbsp;<br></p>
                                                    <p>
                                                        <a href = '#' style = 'margin-top:0.5em;color:rgb(102,102,102);text-decoration:none' target = '_blank'>
                                                        <img src = 'https://cdn3.iconfinder.com/data/icons/free-social-icons/67/linkedin_circle_gray-24.png'></a>&nbsp;
                                                        <a href = '#' style = 'margin-top:0.5em;color:rgb(102,102,102);text-decoration:none' target = '_blank'>
                                                        <img src = 'https://cdn3.iconfinder.com/data/icons/free-social-icons/67/facebook_circle_gray-24.png'></a>&nbsp;
                                                        <a href = 'https://plus.google.com/+Micha%C5%82Szyma%C5%84skiBF/posts' style = 'margin-top:0.5em;color:rgb(102,102,102);text-decoration:none' target = '_blank'>
                                                        <img src = 'https://cdn3.iconfinder.com/data/icons/free-social-icons/67/google_circle_gray-24.png'></a>
                                                    </p>
                                                    <div style = 'width:190px;max-width:190px;font-family:'Lucida Grande',Tahoma;font-size:12px;margin-top:0.5em;color:rgb(102,102,102);letter-spacing:2px;border-left-width:2px;border-left-style:solid;border-left-color:rgb(251,224,181);padding-top:3px;padding-left:10px;overflow:hidden'></div>
                                                </div>
                                            </div>
                                        </div>";
            $mailConfirmation->send();
        }

        public static function GetNomPrenom($email){
            $Personne = Personne::where('email', '=', $email)->first();
            return $Personne->getPrenomAttribute().' '.$Personne->getNomAttribute();
        }

        public function GetNumeroFormatter($email){
            $Personne = Personne::where('email', '=', $email)->first();
            return $Personne->numeroFormatter();
        }
    }
?>
