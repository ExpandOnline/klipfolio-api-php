<?php


namespace SSO;


class SingleSignOn
{
    protected $company;
    protected $key;
    protected $userData;

    const GET_URL_APP = 'https://app.klipfolio.com/users/sso_auth?sso=%s&company=%s&redirect=true';
    const GET_URL_SB = 'https://sandbox.klipfolio.com/users/sso_auth?sso=%s&company=%s&redirect=true';

    public function __construct($company, $key, $userData) {
        $this->company = $company;
        $this->key = $key;
        $this->userData = $userData;
    }

    public function generateToken()
    {
        $salted = $this->key . $this->company;
        $hash = hash('sha1', $salted, true);
        $saltedHash = substr($hash, 0, 16);

        $iv = substr(md5(microtime()), rand(0, 16), 16); //Generate random 16 bit string

        $data = json_encode($this->userData);
        $data = $iv . $data;

        $pad = 16 - (strlen($data) % 16);
        $data = $data . str_repeat(chr($pad), $pad);

        $cipher = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', 'cbc', '');
        mcrypt_generic_init($cipher, $saltedHash, $iv);
        $encryptedData = mcrypt_generic($cipher, $data);
        mcrypt_generic_deinit($cipher);

        return base64_encode($encryptedData);
    }

    public function getGetUrl($env = 'app') {
        return sprintf($env === 'app' ? static::GET_URL_APP : static::GET_URL_SB, urlencode($this->generateToken()), $this->company);
    }
}