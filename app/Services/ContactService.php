<?php

namespace App\Services;

class ContactService {

    private function captcha() {
        if(isset($_POST['g-recaptcha-response'])) {
            $url = "https://www.google.com/recaptcha/api/siteverify";
            $data = [
                'secret' => "6LeWjGgeAAAAAC-HXpeSmU_Y-vuladDSheSZkJWS",
                'response' => $_POST['g-recaptcha-response'],
                'remoteip' => $_SERVER['REMOTE_ADDR']
            ];
           
            
            $options = array(

                'http' => array(
                  'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                  'method'  => 'POST',
                  'content' => http_build_query($data)
                )
            );
    
            $context  = stream_context_create($options);
            $response = file_get_contents($url, false, $context);
    
            $res = json_decode($response, true);

            if(isset($res['score']) && $res['success']) {
                if($res['score'] < 0.5) {
                    abort(404);
                }
                else if ($res['success'] == false) {
                    abort(404);
                }

                else if (isset($res['error_codes'])){
                    abort(404);
                }
            }
            
           
        }
        else {
            abort(404);
        }
    }

    static function getCaptcha() {
        $getCaptcha = new ContactService;
        return $getCaptcha->captcha();
    }

} 