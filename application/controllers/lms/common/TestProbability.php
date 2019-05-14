<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestProbability extends \app\controllers\BaseController
{
    protected $models = array();
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        /*//echo (215 / 5) / 100;
        $probability_1 = round(((200 / 215) * 100) / 2);
        $probability_2 = 0; //round(((5 / 215) * 100) / 2);
        $probability_3 = 0; //round(((5 / 215) * 100) / 2);
        $probability_4 = round(((5 / 215) * 100) / 2);


        echo $probability_1.'<Br>';
        echo $probability_2.'<Br>';
        echo $probability_3.'<Br>';
        echo $probability_4.'<Br>';
        echo '<Br><Br>';


        $values = ['a','b','c','d','a-1','b-1','c-1','d-1'];
        $weights = [$probability_1, $probability_2, $probability_3, $probability_4, $probability_1, $probability_2, $probability_3, $probability_4];
        //$index = $this->weighted_random($weights);
        //echo $index;

        for ($i=1; $i<=100; $i++) {
            $index = $this->weighted_random($weights);
            $result = $values[$index];
            //echo $i . ' = ';
            echo $result . '<br>';
        }*/

        $this->load->view("common/test_roulette", []);
    }

    private function weighted_random($weights) {
        $r = rand(1, array_sum($weights));
        for($i=0; $i<count($weights); $i++) {
            $r -= $weights[$i];
            if($r < 1) return $i;
        }
        return false;
    }

    /**
     * TODO : 서버호출 룰렛 테스트
     */
    public function send_test()
    {
        $result = null;
        $err_data = null;
        
        $roulette_num = '7';
        $random_rro_idx = '7';

        $ret = true;

        if ($ret === true) {
            $result = [
                'result' => $roulette_num,
                'result_rro_idx' => $random_rro_idx
            ];
        } else {
            $err_data = [
                'ret_cd' => false,
                'ret_msg' => '룰렛 횟수 초과.',
                'ret_status' => _HTTP_ERROR
            ];
        }

        return $this->json_result($ret, '성공', $err_data, $result['result']);
    }
}