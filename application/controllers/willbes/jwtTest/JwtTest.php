<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * TODO : TEST성 컨트롤러, 모바일 앱 토큰 생성 개발 완료 시 해당 컨트롤러 삭제 처리
 * JwtTest constructor.
 */
class JwtTest extends \app\controllers\FrontController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->library('Jwt');
        $this->jwt->setTokenData('dlumjjang','최현탁');
        $token = $this->jwt->getToken();
        echo $token;
    }
}