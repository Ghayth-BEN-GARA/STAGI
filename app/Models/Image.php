<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;

    class Image extends Model{
        protected $table = 'images';
        protected $primaryKey = 'id';
        public $timestamps = false;
        public $incrementing = true;
        protected $fillable = [
            'id',
            'photo',
            'email',
        ];

        public function getIdAttribute(){
            return ($this->attributes['id']);
        }

        public function getPhotoAttribute(){
            return ($this->attributes['photo']);
        }

        public function setPhotoAttribute($value){
            $this->attributes['photo'] = $value;
        }

        public function getEmailAtribute(){
            return ($this->attributes['email']);
        }

        public function setEmailAttribute($value){
            $this->attributes['email'] = $value;
        }
    }
?>
