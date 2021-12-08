<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Session;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use App\Models\Compte;

    class CompteController extends Controller{
        public function VerifierCompte($email){
            $Compte = Compte::where('email', '=', $email)->get();
            
            if($Compte->isEmpty()){
                return ('personne-not-exist');
            }

            else{
                return ('personne-exist');
            }
        }

        public function StoreCompte($email,$password){
            $Compte = new Compte();
            $Compte->setPasswordAttribute($password);
            $Compte->setDateAttribute();
            $Compte->setTempsAttribute();
            $Compte->setEmailAttribute($email);
            $Compte->save();
        }

        public function GetIdCompte($email){
            $Compte = Compte::where('email', '=', $email)->first();
            return ($Compte->getIdAttribute());
        }

        public function CreerSession($email,$request){
            $request->session()->put('email',$email);	
        }

        public function Authentification(Request $request){
            $verifierCompte = $this->VerifierCompte($request->email);

            if($verifierCompte == 'personne-not-exist'){
                return back()->with('personne-not-exist','');
            }

            else{
                if(md5($request->password) <> $this->GetPassword($request->email)){
                    return back()->with('parametres-incorrecte','');
                }

                else{
                    if($this->GetEtat($request->email) == 'Active'){
                        $JournaleController = new JournaleController();
                        $JournaleController->StoreJournal('Connexion',$this->GetIdCompte($request->email));
                        $this->CreerSession($request->email,$request);
                        return redirect()->route('profileAuth');
                    }

                    else{
                        $this->ActiverCompte($request->email);
                        $JournaleController = new JournaleController();
                        $JournaleController->StoreJournal('Activation',$this->GetIdCompte($request->email));
                        $this->CreerSession($request->email,$request);
                        return redirect()->route('profileAuth')->with('compte-activer','');
                    }
                }
            }
        }

        public function GetPassword($email){
            $Compte = Compte::where('email', '=', $email)->first();
            return $Compte->getPasswordAttribute();
        }

        public function GetEtat($email){
            $Compte = Compte::where('email', '=', $email)->first();
            return $Compte->getEtatAttribute();
        }

        public function ActiverCompte($email){
            $Compte = Compte::where('email',$email)->update(['etat'=>"Active"]);
        }

        public function GestionDeconnexion(Request $request){
            $email = $request->session()->get('email');
            $JournaleController = new JournaleController();
            $JournaleController->StoreJournal('Déconnexion',$this->GetIdCompte($email));
            $this->LogOut();
        }

        public function LogOut(){
            Session::pull('email');
            Session::forget('email');
            Session::flush();
        }

        public function RechercherCompte(Request $request){
            $verifierCompte = $this->VerifierCompte($request->email);

            if($verifierCompte == 'personne-not-exist'){
                return back()->with('compte-not-exist','');
            }

            else{
                $data = $this->GetDataForget($request->email);
                return view('authentification.forget2',compact('data'));
            }
        }

        public function GetDataForget($email){
            $PersonneController = new PersonneController();
            $nomComplet = $PersonneController->GetNomPrenom($email);
            $numero = $PersonneController->GetNumeroFormatter($email);

            $ImageController = new ImageController();
            $photo = $ImageController->GetPhoto($email);

            $data = [
                'nomComplet' => $nomComplet,
                'numero' => $numero,
                'photo' => $photo,
                'email' => $email

            ];
            return $data;
        }

        public function EnvoyerCodeSecurite(Request $request){
            $code = $this->GenererCodeSecurite();
            
            if($this->CodeSecuriteParMail($request->email,$code,$request->nomComplet) == 'mail-sent'){
                return ($this->OuvrirForget3($code,$request->email));
            }

            else{
                return view ('errors.recuperation');
            }  
        }

        public function GenererCodeSecurite(){
            return rand(11111111,99999999);
        }

        public function CodeSecuriteParMail($email,$code,$prenom){
            $mailCode = new PHPMailer(true);
            $mailCode->IsSmtp();
            $mailCode->SMTPDebug = 0;
            $mailCode->SMTPAuth = true;
            $mailCode->SMTPSecure = 'ssl';
            $mailCode->Host = 'smtp.gmail.com';
            $mailCode->Port = 465;
            $mailCode->Timeout = 5;
            $mailCode->IsHTML(true);
            $mailCode->Username = 'stagi.tn@gmail.com';
            $mailCode->Password = '123456789stagi';                                
            $mailCode->setFrom('stagi.tn@gmail.com', 'Stagi.tn');
            $mailCode->addAddress($email);
            $mailCode->isHTML(true);
            $mailCode->AddEmbeddedImage('site/img/logos/favicon.png', 'logo','site/img/logos/favicon.png');
            $mailCode->CharSet = 'UTF-8';
            $mailCode->Subject = 'Code de sécurité';
            $mailCode->Body = "<div style = 'padding:5px;margin-right:50px;margin-top:10px;'>
                                    <h3>Objet : Code de sécurité</h3>
                                    <p style = 'font-family:&quot;Lucida Grande&quot;,Tahoma;font-size:12px;'><b>Bonjour</b> <b style = 'color: #142850;'>$prenom</b>,</p>
                                    <p style = 'font-family:&quot;Lucida Grande&quot;,Tahoma;font-size:12px;'>Suite à votre demande, le code de sécurité requis est <b style = 'color:#142850;'>$code</b>.<br>Utilisez ce code pour récupérer votre compte. Notez que ce code est privé, donc ne le donnez jamais à qui que ce soit.</p>
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
                                </div>";
            if($mailCode->send()){
                return ('mail-sent');
            }           
        }

        public function OuvrirForget3($code, $email){
            return view('authentification.forget3',compact('code','email'));
        }

        public function GestionOuvrirForget4(Request $request){
            $email = $request->email;
            return redirect()->route('forget4',[$email])->with('compte-recuperer','');
        }

        public function OuvrirForget4(){
            return view('authentification.forget4',compact('email'))->with('compte-recuperer','');
        }

        public function GestionUpdatePasswordForget(Request $request){
            $oldPassword = $this->GetPassword($request->email);

            if($oldPassword == md5($request->password)){
                return back()->with('same-old-password','');
            }

            else{
                if($this->UpdatePassword($request->email,$request->password) == 'password-update'){
                    $JournaleController = new JournaleController();
                    $JournaleController->StoreJournal('Récupération',$this->GetIdCompte($request->email));
                    $this->CreerSession($request->email,$request);
                    return redirect()->route('profileAuth')->with('compte-recuperer','');
                }

                else{
                    return view ('errors.recuperation');
                }
            }
        }

        public function UpdatePassword($email,$password){
            $Compte = Compte::where('email',$email)->update(['password'=>md5($password)]);

            if($Compte){
                return ('password-update');
            }

            else{
                return ('password-not-update');
            }
        }

        public function OuvrirParametresCompte(Request $request){
            $PersonneController = new PersonneController();
            $email = $PersonneController->GetEmailSessionActive($request);
            $dataP = $PersonneController->GetDataSessionActive($email);
            return view('profils.parametres_profil',compact('dataP'));
        }

        public function OuvrirUpdatePasswordCompte(Request $request){
            $PersonneController = new PersonneController();
            $email = $PersonneController->GetEmailSessionActive($request);
            $dataP = $PersonneController->GetDataSessionActive($email);
            return view('profils.modifier_password',compact('dataP'));
        }

        public function GestionUpdatePasswordProfile(Request $request){
            $PersonneController = new PersonneController();
            $email = $PersonneController->GetEmailSessionActive($request);
            $passwordProfil = $this->GetPassword($email);

            if($passwordProfil == md5($request->new_password)){
                return back()->with('same-old-password','');
            }

            else{
                if($this->UpdatePassword($email,$request->new_password) == 'password-update'){
                    $JournaleController = new JournaleController();
                    $JournaleController->StoreJournal('Modification de mot de passe',$this->GetIdCompte($email));
                    return back()->with('password-updated','');
                }

                else{
                    return view ('errors.password');
                }
            }
        }

        public function DesactiverCompte(Request $request){
            $PersonneController = new PersonneController();
            $email = $PersonneController->GetEmailSessionActive($request);
            $Compte = Compte::where('email',$email)->update(['etat'=>"Desactive"]);
            if($Compte){
                $JournaleController = new JournaleController();
                $JournaleController->StoreJournal('Désactivation',$this->GetIdCompte($email));
                $this->LogOut();
                return redirect()->route('login')->with('compte-desactiver','');
            }

            else{
                return view('errors.compte_desactiver');
            }
            
        }
    }
?>
