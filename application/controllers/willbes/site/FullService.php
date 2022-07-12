<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/passpredict/BaseFullService.php';

/**
 * 합격예측 풀서비스
 * 2022.06 신규 합격예측
 */
class FullService extends BaseFullService
{
    public function __construct()
    {
        parent::__construct();
    }
}