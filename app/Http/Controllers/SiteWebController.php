<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use Carbon\Carbon;

    class SiteWebController extends Controller{
        public function OuvrirHome(){
            try{
                return view('welcome');
            }

            catch(\Exception $e){
                return view('errors.404');
            }
        }

        public function OuvrirContact(){
            try{
                return view('contact');
            }

            catch(\Exception $e){
                return view('errors.404');
            }
        }

        public function EnvoyerEmail(Request $request){
            require base_path("vendor/autoload.php");
            $sujet = $request->sujet;
            $message = $request->message;
            $email = $request->email_complet;
            $nom = $request->nom_complet;
            $date = Carbon::now()->format('Y');
            
            $mailContact = new PHPMailer(true);
            $mailContact->IsSmtp();
            $mailContact->SMTPDebug = 0;
            $mailContact->SMTPAuth = true;
            $mailContact->SMTPSecure = 'ssl';
            $mailContact->Host = 'smtp.gmail.com';
            $mailContact->Port = 465;
            $mailContact->Timeout = 5;
            $mailContact->IsHTML(true);
            $mailContact->Username = 'stagi.tn@gmail.com';
            $mailContact->Password = '123456789stagi';                                
            $mailContact->setFrom('stagi.tn@gmail.com', 'Stagi.tn');
            $mailContact->addAddress('stagi.tn@gmail.com');
            $mailContact->isHTML(true);
            $mailContact->CharSet = 'UTF-8';
            $mailContact->Subject = $sujet;
            $mailContact->Body = "  <div style = 'border:1px solid #142850; padding:5px;margin-right:50px;margin-top:10px; text-align:center;'>
                                        <h3>Objet :$sujet</h3>
                                        <p>Bonjour <b style = 'color: #142850;'>Stagi.tn</b>,</p>
                                        <br>
                                        <p>$message</p>
                                    </div>
                                    <div style = text-align:center>
                                        <p>Envoyé de : $email($nom)<br>Copyright $date</p>
                                    </div>";
            try{
                $mailContact->send();
                return back()->with('email-sent', '');
            }
                        
            catch(\Exception $e){
                return view('errors.email');
            }
            
        }
    }
?>
