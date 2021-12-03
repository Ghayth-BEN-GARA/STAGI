<?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateJournalesTable extends Migration{
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up(){
            Schema::create('journales', function (Blueprint $table) {
                $table->collation = 'utf8_general_ci';
                $table->charset = 'utf8';
                $table->id();
                $table->string('action',100);
                $table->date('date');
                $table->time('temps');
                $table->string('region',100);
                $table->string('email',350);
                $table->foreign('email')->references('email')->on('comptes')->onUpdate('cascade')->onDelete('cascade');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down(){
            Schema::dropIfExists('journales');
        }
    }
?>
