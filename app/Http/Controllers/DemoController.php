<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class DemoController extends Controller
{
    public function MakeMigratrionFile(){
        Artisan::call('make:model DemoTable -m');
    }

    public function RunMigration(){
        Artisan::call('migrate');
    }

    public function AppCacheClear(){
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
    }

    public function setEnvValue($envkey, $envValue){
        $envfilepath = app()->environmentFilePath();
        $strEnv = file_get_contents($envfilepath);
        $strEnv.="\n";
        
        $keyStartPosition = strpos($strEnv, "{$envkey}=");
        $keyEndPosition = strpos($strEnv, "\n", $keyStartPosition);
        $oldValue = substr($strEnv, $keyStartPosition, $keyEndPosition-$keyStartPosition);
        

        if(!$keyStartPosition || !$keyEndPosition || !$oldValue){
            $strEnv.="{$envkey}={$envValue}\n";
        }else {
            $strEnv = str_replace($oldValue, "{$envkey}={$envValue}", $strEnv);
        }

        $strEnv = substr($strEnv, 0, -1);
        $changeResult = file_put_contents($envfilepath, $strEnv);
        if(!$changeResult){
            return false;
        }else{
            return true;
        }
    }

    public function envConfig(){
        $this->setEnvValue("DB_DATABASE", "my_database");
        $this->setEnvValue("DB_USERNAME", "my_user");
        $this->setEnvValue("DB_PASSWORD", "my_password");

        $this->setEnvValue("ON_SINGNAL_API_KEY", "12345698562");
        $this->setEnvValue("SMS_API_KEY", "123564852");
        $this->setEnvValue("SMS_API_USER", "5236581439685");
        $this->setEnvValue("SMS_API_PASS", "415523658143");
    }

    public function serverConfigCheck(){
        $phpversion = phpversion();
        $bcmath = extension_loaded('bcmath');
        $ctype = extension_loaded('ctype');
        $fileinfo = extension_loaded('Fileinfo');
        $json = extension_loaded('json');
        $mbstring = extension_loaded('mbstring');
        $openssl = extension_loaded('openssl');
        $tokenizer = extension_loaded('tokenizer');
        $xml = extension_loaded('xml');
        $pdo = defined('PDO::ATTR_DRIVER_NAME');

        if($phpversion>=7.3 && $bcmath==true && $ctype==true && $fileinfo==true && $json==true && $mbstring==true && $openssl==true && $tokenizer==true && $xml==true && $pdo==true ){
            return "laravel 7 is ok";
        }else{
            return "laravel 7 is not support";
        }

    }

}
