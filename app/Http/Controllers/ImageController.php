<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\Image;

    class ImageController extends Controller{
        public function StoreImage($email){
            $Image = new Image();
            $Image->setEmailAttribute($email);
            $Image->save();
        }

        public function GetPhoto($email){
            $Image = Image::where('email', '=', $email)->first();
            return $Image->getPhotoAttribute();
        }

        public function GestionUpdateImageProfile(Request $request){
            $PersonneController = new PersonneController();
            $email = $PersonneController->GetEmailSessionActive($request);
            $dataP = $PersonneController->GetDataSessionActive($email);
            $CompteController = new CompteController();

            if($request->hasfile('image')){
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' .$extension;
                $file->move('uploads/images/'.$dataP['nomComplet'],$filename);

                if($this->ModifierImage($email,$filename) == "image-updated"){
                    $JournalController = new JournaleController();
                    $JournalController->StoreJournal("Modification d'image de profile",$CompteController->GetIdCompte($email));
                    return back()->with('image-updated', '');
                }

                else{
                    return back()->with('image-not-updated', '');
                }
            }
        }

        public function ModifierImage($email,$filename){
            $Image = Image::where('email',$email)->update(['photo' => $filename]);
            if($Image){
               return ('image-updated');
            }

            else{
               return ('image-not-updated');
            }
        }
    }
?>
