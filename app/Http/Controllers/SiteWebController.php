<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    class SiteWebController extends Controller{
        public function OuvrirHome(Request $request){
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
            $mailContact->AddEmbeddedImage('site/img/logos/favicon.png', 'logo','site/img/logos/favicon.png');
            $mailContact->Subject = $sujet;
            $mailContact->Body = "  <div style = 'padding:5px;margin-right:50px;margin-top:10px;'>
                                        <h3>Objet : $sujet</h3>
                                        <p style = 'font-family:&quot;Lucida Grande&quot;,Tahoma;font-size:12px;'><b>Bonjour</b> <b style = 'color: #142850;'>Stagi.tn</b>,</p>
                                        <p style = 'font-family:&quot;Lucida Grande&quot;,Tahoma;font-size:12px;'>$message</p>
                                        <p style = 'font-family:&quot;Lucida Grande&quot;,Tahoma;font-size:12px;margin-top:8px'><b font-family:&quot;Lucida Grande&quot;,Tahoma;font-size:12px;>Envoyé de : $email($nom)</b></p>
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
                                        </div>
                                        <div style = 'width:190px;max-width:190px;font-family:'Lucida Grande',Tahoma;font-size:12px;margin-top:0.5em;color:rgb(102,102,102);letter-spacing:2px;border-left-width:2px;border-left-style:solid;border-left-color:rgb(251,224,181);padding-top:3px;padding-left:10px;overflow:hidden'></div>
                                    </div>";
            try{
                $mailContact->send();
                return back()->with('email-sent', '');
            }
                        
            catch(\Exception $e){
                return view('errors.email');
            }
            
        }

        public function OuvrirSignup(){
            try{
                return view('authentification.signup');
            }

            catch(\Exception $e){
                return view('errors.404');
            }
        }

        public function OuvrirNotFound(){
            return view('errors.404');
        }

        public function OuvrirSignin(){
            try{
                return view('authentification.signIn');
            }

            catch(\Exception $e){
                return view('errors.404');
            }
        }

        public function OuvrirForget1(){
            try{
                return view('authentification.forget1');
            }

            catch(\Exception $e){
                return view('errors.404');
            }
        }
    }
?>
