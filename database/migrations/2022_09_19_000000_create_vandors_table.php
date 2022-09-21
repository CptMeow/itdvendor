<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->integer('vendor_id', true);
            $table->string('juristic_id', 13)->comment('เลขทะเบียนนิติบุคคล');
            $table->string('juristic_type')->comment('รหัสประเภทสมาชิกนิติบุคคล');
            $table->string('juristic_name_th')->comment('ชื่อนิติบุคคล (ภาษาไทย)');
            $table->string('juristic_name_en')->nullable()->comment('ชื่อนิติบุคคล (ภาษาอังกฤษ)');
            $table->string('juristic_status')->nullable()->comment('สถานะนิติบุคคล');
            $table->string('standard_id', 10)->comment('รหัสหมวดหมู่ tsic');
            $table->date('register_date')->comment('วันที่จดทะเบียน');
            $table->bigInteger('register_capital')->nullable()->comment('ทุนจดทะเบียน');
            $table->string('address', 250)->nullable()->comment('ที่ตั้งนิติบุคคล (ภาษาไทย)');
            $table->integer('sub_district_id')->nullable()->comment('รหัสตำบล/แขวง');
            $table->integer('district_id')->nullable()->comment('รหัสอำเภอ/เขต');
            $table->integer('province_id')->nullable()->comment('รหัสจังหวัด');
            $table->string('postal_code', 7)->nullable()->comment('รหัสไปรษณีย์');
            $table->string('juristic_phone', 50)->nullable()->comment('หมายเลขโทรศัพท์');
            $table->string('mobile_number', 50)->nullable()->comment('หมายเลขโทรศัพท์มือถือ');
            $table->string('fex_number', 50)->nullable()->comment('หมายเลขโทรสาร');
            $table->string('juristic_website', 200)->nullable()->comment('ที่อยู่เว็บไซต์');
            $table->string('facebook_url')->nullable()->comment('Facebook');
            $table->string('line_id', 200)->nullable()->comment('Line ID.');
            $table->string('juristic_email', 250)->nullable()->comment('E-mail');
            $table->bigInteger('paid_register_capital')->nullable();
            $table->char('blacklist_flag', 1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendors');
    }
}
