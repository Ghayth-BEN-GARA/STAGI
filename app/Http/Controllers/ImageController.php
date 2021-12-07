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
    }
?>
