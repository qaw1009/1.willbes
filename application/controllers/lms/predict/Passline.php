<?php
/**
 * ======================================================================
 * 모의고사등록 > 모의고사상품등록
 * ======================================================================
 *
 * lms_Product_Mock, lms_Product_Mock_R_Paper, lms_Product, lms_Product_R_Category, lms_Product_Sale, lms_Product_Sms DB에 나눠서 분리 저장
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Passline extends \app\controllers\BaseController
{
    protected $models = array('sys/site', 'sys/code', 'sys/category', 'predict/predict' , 'mocktest/mockCommon');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();

        $this->applyType = $this->config->item('sysCode_applyType', 'mock');
        $this->applyArea1 = $this->config->item('sysCode_applyArea1', 'mock');
        $this->applyArea2 = $this->config->item('sysCode_applyArea2', 'mock');
        $this->addPoint = $this->config->item('sysCode_addPoint', 'mock');
        $this->applyType_on = $this->config->item('sysCode_applyType_on', 'mock');
        $this->applyType_off = $this->config->item('sysCode_applyType_off', 'mock');
        $this->acceptStatus = $this->config->item('sysCode_acceptStatus', 'mock');

        // 공통코드 셋팅
        //$this->_groupCcd = $this->regGoodsModel->_groupCcd;
    }

    /**
     * 등록폼
     */
    public function index()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $prodcode = element('prodcode',$arr_input);

        if(empty($prodcode)){
            $prodcode = '1';
        }

        //합격예측 기본정보호출
        $productList = $this->predictModel->getProductALL();
        $serialList = $this->predictModel->getSerialAll();
        $sysCode_Area = $this->config->item('sysCode_Area', 'predict');
        $areaList = $this->predictModel->getArea($sysCode_Area);
        $agoData = $this->predictModel->statisticsListLine2($prodcode);

        $dtSet = array();
        foreach ($agoData as $key => $val){
            $TakeMockPart = $val['TakeMockPart'];
            $TakeArea = $val['TakeArea'];
            $PickNum = $val['PickNum'];
            $TakeNum = $val['TakeNum'];
            $CompetitionRateNow = $val['CompetitionRateNow'];
            $CompetitionRateAgo = $val['CompetitionRateAgo'];
            $PassLineAgo = $val['PassLineAgo'];
            $AvrPointAgo = $val['AvrPointAgo'];
            $StabilityAvrPoint = $val['StabilityAvrPoint'];
            $StabilityAvrPointRef = $val['StabilityAvrPointRef'];
            $StabilityAvrPercent = $val['StabilityAvrPercent'];
            $StrongAvrPoint1 = $val['StrongAvrPoint1'];
            $StrongAvrPoint1Ref = $val['StrongAvrPoint1Ref'];
            $StrongAvrPoint2 = $val['StrongAvrPoint2'];
            $StrongAvrPoint2Ref = $val['StrongAvrPoint2Ref'];
            $StrongAvrPercent = $val['StrongAvrPercent'];
            $ExpectAvrPoint1 = $val['ExpectAvrPoint1'];
            $ExpectAvrPoint1Ref = $val['ExpectAvrPoint1Ref'];
            $ExpectAvrPoint2 = $val['ExpectAvrPoint2'];
            $ExpectAvrPoint2Ref = $val['ExpectAvrPoint2Ref'];
            $ExpectAvrPercent = $val['ExpectAvrPercent'];
            $IsUse = $val['IsUse'];
            $RegistAvrPoint = $val['RegistAvrPoint'];
            $RegistStandard = $val['RegistStandard'];

            $dtSet[$TakeMockPart][$TakeArea]['PickNum'] = $PickNum;
            $dtSet[$TakeMockPart][$TakeArea]['TakeNum'] = $TakeNum;
            $dtSet[$TakeMockPart][$TakeArea]['CompetitionRateNow'] = $CompetitionRateNow;
            $dtSet[$TakeMockPart][$TakeArea]['CompetitionRateAgo'] = $CompetitionRateAgo;
            $dtSet[$TakeMockPart][$TakeArea]['PassLineAgo'] = $PassLineAgo;
            $dtSet[$TakeMockPart][$TakeArea]['AvrPointAgo'] = $AvrPointAgo;
            $dtSet[$TakeMockPart][$TakeArea]['StabilityAvrPoint'] = $StabilityAvrPoint;
            $dtSet[$TakeMockPart][$TakeArea]['StabilityAvrPointRef'] = $StabilityAvrPointRef;
            $dtSet[$TakeMockPart][$TakeArea]['StabilityAvrPercent'] = $StabilityAvrPercent;
            $dtSet[$TakeMockPart][$TakeArea]['StrongAvrPoint1'] = $StrongAvrPoint1;
            $dtSet[$TakeMockPart][$TakeArea]['StrongAvrPoint1Ref'] = $StrongAvrPoint1Ref;
            $dtSet[$TakeMockPart][$TakeArea]['StrongAvrPoint2'] = $StrongAvrPoint2;
            $dtSet[$TakeMockPart][$TakeArea]['StrongAvrPoint2Ref'] = $StrongAvrPoint2Ref;
            $dtSet[$TakeMockPart][$TakeArea]['StrongAvrPercent'] = $StrongAvrPercent;
            $dtSet[$TakeMockPart][$TakeArea]['ExpectAvrPoint1'] = $ExpectAvrPoint1;
            $dtSet[$TakeMockPart][$TakeArea]['ExpectAvrPoint1Ref'] = $ExpectAvrPoint1Ref;
            $dtSet[$TakeMockPart][$TakeArea]['ExpectAvrPoint2'] = $ExpectAvrPoint2;
            $dtSet[$TakeMockPart][$TakeArea]['ExpectAvrPoint2Ref'] = $ExpectAvrPoint2Ref;
            $dtSet[$TakeMockPart][$TakeArea]['ExpectAvrPercent'] = $ExpectAvrPercent;
            $dtSet[$TakeMockPart][$TakeArea]['IsUse'] = $IsUse;
            $dtSet[$TakeMockPart][$TakeArea]['RegistAvrPoint'] = $RegistAvrPoint;
            $dtSet[$TakeMockPart][$TakeArea]['RegistStandard'] = $RegistStandard;
        }

        $dataSet = array();

        foreach ($serialList as $key => $val) {
            foreach ($areaList as $key2 => $val2) {
                $SerialCcd = $val['Ccd'];
                $SerialCcdName = $val['CcdName'];
                $TakeArea = $val2['Ccd'];
                $TakeAreaName = $val2['CcdName'];

                if ($SerialCcd == '400') {
                    //101단 - 서울만 접수받음
                    if ($TakeArea == '712001') {
                        $dataSet[$SerialCcd][$TakeArea]['TakeMockPartName'] = $SerialCcdName;
                        $dataSet[$SerialCcd][$TakeArea]['TakeMockPart'] = $SerialCcd;
                        $dataSet[$SerialCcd][$TakeArea]['TakeAreaName'] = $TakeAreaName;
                        $dataSet[$SerialCcd][$TakeArea]['TakeArea'] = $TakeArea;
                        $dataSet[$SerialCcd][$TakeArea]['TakeOrigin'] = "";
                        $dataSet[$SerialCcd][$TakeArea]['TotalRegist'] = "";
                        $dataSet[$SerialCcd][$TakeArea]['AvrPoint'] = "";
                        if(empty($dtSet)===false){
                            $dataSet[$SerialCcd][$TakeArea]['PickNum'] = $dtSet[$SerialCcd][$TakeArea]['PickNum'];
                            $dataSet[$SerialCcd][$TakeArea]['TakeNum'] = $dtSet[$SerialCcd][$TakeArea]['TakeNum'];
                            $dataSet[$SerialCcd][$TakeArea]['CompetitionRateNow'] = $dtSet[$SerialCcd][$TakeArea]['CompetitionRateNow'];
                            $dataSet[$SerialCcd][$TakeArea]['CompetitionRateAgo'] = $dtSet[$SerialCcd][$TakeArea]['CompetitionRateAgo'];
                            $dataSet[$SerialCcd][$TakeArea]['PassLineAgo'] = $dtSet[$SerialCcd][$TakeArea]['PassLineAgo'];
                            $dataSet[$SerialCcd][$TakeArea]['AvrPointAgo'] = $dtSet[$SerialCcd][$TakeArea]['AvrPointAgo'];
                            $dataSet[$SerialCcd][$TakeArea]['StabilityAvrPoint'] = $dtSet[$SerialCcd][$TakeArea]['StabilityAvrPoint'];
                            $dataSet[$SerialCcd][$TakeArea]['StabilityAvrPointRef'] = $dtSet[$SerialCcd][$TakeArea]['StabilityAvrPointRef'];
                            $dataSet[$SerialCcd][$TakeArea]['StabilityAvrPercent'] = $dtSet[$SerialCcd][$TakeArea]['StabilityAvrPercent'];
                            $dataSet[$SerialCcd][$TakeArea]['StrongAvrPoint1'] = $dtSet[$SerialCcd][$TakeArea]['StrongAvrPoint1'];
                            $dataSet[$SerialCcd][$TakeArea]['StrongAvrPoint1Ref'] = $dtSet[$SerialCcd][$TakeArea]['StrongAvrPoint1Ref'];
                            $dataSet[$SerialCcd][$TakeArea]['StrongAvrPoint2'] = $dtSet[$SerialCcd][$TakeArea]['StrongAvrPoint2'];
                            $dataSet[$SerialCcd][$TakeArea]['StrongAvrPoint2Ref'] = $dtSet[$SerialCcd][$TakeArea]['StrongAvrPoint2Ref'];
                            $dataSet[$SerialCcd][$TakeArea]['StrongAvrPercent'] = $dtSet[$SerialCcd][$TakeArea]['StrongAvrPercent'];
                            $dataSet[$SerialCcd][$TakeArea]['ExpectAvrPoint1'] = $dtSet[$SerialCcd][$TakeArea]['ExpectAvrPoint1'];
                            $dataSet[$SerialCcd][$TakeArea]['ExpectAvrPoint1Ref'] = $dtSet[$SerialCcd][$TakeArea]['ExpectAvrPoint1Ref'];
                            $dataSet[$SerialCcd][$TakeArea]['ExpectAvrPoint2'] = $dtSet[$SerialCcd][$TakeArea]['ExpectAvrPoint2'];
                            $dataSet[$SerialCcd][$TakeArea]['ExpectAvrPoint2Ref'] = $dtSet[$SerialCcd][$TakeArea]['ExpectAvrPoint2Ref'];
                            $dataSet[$SerialCcd][$TakeArea]['ExpectAvrPercent'] = $dtSet[$SerialCcd][$TakeArea]['ExpectAvrPercent'];
                            $dataSet[$SerialCcd][$TakeArea]['IsUse'] = $dtSet[$SerialCcd][$TakeArea]['IsUse'];
                            $dataSet[$SerialCcd][$TakeArea]['RegistAvrPoint'] = $dtSet[$SerialCcd][$TakeArea]['RegistAvrPoint'];
                            $dataSet[$SerialCcd][$TakeArea]['RegistStandard'] = $dtSet[$SerialCcd][$TakeArea]['RegistStandard'];

                        } else {
                            $dataSet[$SerialCcd][$TakeArea]['PickNum'] = '';
                            $dataSet[$SerialCcd][$TakeArea]['TakeNum'] = '';
                            $dataSet[$SerialCcd][$TakeArea]['CompetitionRateNow'] = '';
                            $dataSet[$SerialCcd][$TakeArea]['CompetitionRateAgo'] = '';
                            $dataSet[$SerialCcd][$TakeArea]['PassLineAgo'] = '';
                            $dataSet[$SerialCcd][$TakeArea]['AvrPointAgo'] = '';
                            $dataSet[$SerialCcd][$TakeArea]['StabilityAvrPoint'] = '';
                            $dataSet[$SerialCcd][$TakeArea]['StabilityAvrPointRef'] = '';
                            $dataSet[$SerialCcd][$TakeArea]['StabilityAvrPercent'] = '';
                            $dataSet[$SerialCcd][$TakeArea]['StrongAvrPoint1'] = '';
                            $dataSet[$SerialCcd][$TakeArea]['StrongAvrPoint1Ref'] = '';
                            $dataSet[$SerialCcd][$TakeArea]['StrongAvrPoint2'] = '';
                            $dataSet[$SerialCcd][$TakeArea]['StrongAvrPoint2Ref'] = '';
                            $dataSet[$SerialCcd][$TakeArea]['StrongAvrPercent'] = '';
                            $dataSet[$SerialCcd][$TakeArea]['ExpectAvrPoint1'] = '';
                            $dataSet[$SerialCcd][$TakeArea]['ExpectAvrPoint1Ref'] = '';
                            $dataSet[$SerialCcd][$TakeArea]['ExpectAvrPoint2'] = '';
                            $dataSet[$SerialCcd][$TakeArea]['ExpectAvrPoint2Ref'] = '';
                            $dataSet[$SerialCcd][$TakeArea]['ExpectAvrPercent'] = '';
                            $dataSet[$SerialCcd][$TakeArea]['IsUse'] = '';
                            $dataSet[$SerialCcd][$TakeArea]['RegistAvrPoint'] = '';
                            $dataSet[$SerialCcd][$TakeArea]['RegistStandard'] = '';
                        }

                    }
                } else {
                    $dataSet[$SerialCcd][$TakeArea]['TakeMockPartName'] = $SerialCcdName;
                    $dataSet[$SerialCcd][$TakeArea]['TakeMockPart'] = $SerialCcd;
                    $dataSet[$SerialCcd][$TakeArea]['TakeAreaName'] = $TakeAreaName;
                    $dataSet[$SerialCcd][$TakeArea]['TakeArea'] = $TakeArea;
                    $dataSet[$SerialCcd][$TakeArea]['TakeOrigin'] = "";
                    $dataSet[$SerialCcd][$TakeArea]['TotalRegist'] = "";
                    $dataSet[$SerialCcd][$TakeArea]['AvrPoint'] = "";
                    if(empty($dtSet)===false){
                        $dataSet[$SerialCcd][$TakeArea]['PickNum'] = $dtSet[$SerialCcd][$TakeArea]['PickNum'];
                        $dataSet[$SerialCcd][$TakeArea]['TakeNum'] = $dtSet[$SerialCcd][$TakeArea]['TakeNum'];
                        $dataSet[$SerialCcd][$TakeArea]['CompetitionRateNow'] = $dtSet[$SerialCcd][$TakeArea]['CompetitionRateNow'];
                        $dataSet[$SerialCcd][$TakeArea]['CompetitionRateAgo'] = $dtSet[$SerialCcd][$TakeArea]['CompetitionRateAgo'];
                        $dataSet[$SerialCcd][$TakeArea]['PassLineAgo'] = $dtSet[$SerialCcd][$TakeArea]['PassLineAgo'];
                        $dataSet[$SerialCcd][$TakeArea]['AvrPointAgo'] = $dtSet[$SerialCcd][$TakeArea]['AvrPointAgo'];
                        $dataSet[$SerialCcd][$TakeArea]['StabilityAvrPoint'] = $dtSet[$SerialCcd][$TakeArea]['StabilityAvrPoint'];
                        $dataSet[$SerialCcd][$TakeArea]['StabilityAvrPointRef'] = $dtSet[$SerialCcd][$TakeArea]['StabilityAvrPointRef'];
                        $dataSet[$SerialCcd][$TakeArea]['StabilityAvrPercent'] = $dtSet[$SerialCcd][$TakeArea]['StabilityAvrPercent'];
                        $dataSet[$SerialCcd][$TakeArea]['StrongAvrPoint1'] = $dtSet[$SerialCcd][$TakeArea]['StrongAvrPoint1'];
                        $dataSet[$SerialCcd][$TakeArea]['StrongAvrPoint1Ref'] = $dtSet[$SerialCcd][$TakeArea]['StrongAvrPoint1Ref'];
                        $dataSet[$SerialCcd][$TakeArea]['StrongAvrPoint2'] = $dtSet[$SerialCcd][$TakeArea]['StrongAvrPoint2'];
                        $dataSet[$SerialCcd][$TakeArea]['StrongAvrPoint2Ref'] = $dtSet[$SerialCcd][$TakeArea]['StrongAvrPoint2Ref'];
                        $dataSet[$SerialCcd][$TakeArea]['StrongAvrPercent'] = $dtSet[$SerialCcd][$TakeArea]['StrongAvrPercent'];
                        $dataSet[$SerialCcd][$TakeArea]['ExpectAvrPoint1'] = $dtSet[$SerialCcd][$TakeArea]['ExpectAvrPoint1'];
                        $dataSet[$SerialCcd][$TakeArea]['ExpectAvrPoint1Ref'] = $dtSet[$SerialCcd][$TakeArea]['ExpectAvrPoint1Ref'];
                        $dataSet[$SerialCcd][$TakeArea]['ExpectAvrPoint2'] = $dtSet[$SerialCcd][$TakeArea]['ExpectAvrPoint2'];
                        $dataSet[$SerialCcd][$TakeArea]['ExpectAvrPoint2Ref'] = $dtSet[$SerialCcd][$TakeArea]['ExpectAvrPoint2Ref'];
                        $dataSet[$SerialCcd][$TakeArea]['ExpectAvrPercent'] = $dtSet[$SerialCcd][$TakeArea]['ExpectAvrPercent'];
                        $dataSet[$SerialCcd][$TakeArea]['IsUse'] = $dtSet[$SerialCcd][$TakeArea]['IsUse'];
                        $dataSet[$SerialCcd][$TakeArea]['RegistAvrPoint'] = $dtSet[$SerialCcd][$TakeArea]['RegistAvrPoint'];
                        $dataSet[$SerialCcd][$TakeArea]['RegistStandard'] = $dtSet[$SerialCcd][$TakeArea]['RegistStandard'];
                    } else {
                        $dataSet[$SerialCcd][$TakeArea]['PickNum'] = '';
                        $dataSet[$SerialCcd][$TakeArea]['TakeNum'] = '';
                        $dataSet[$SerialCcd][$TakeArea]['CompetitionRateNow'] = '';
                        $dataSet[$SerialCcd][$TakeArea]['CompetitionRateAgo'] = '';
                        $dataSet[$SerialCcd][$TakeArea]['PassLineAgo'] = '';
                        $dataSet[$SerialCcd][$TakeArea]['AvrPointAgo'] = '';
                        $dataSet[$SerialCcd][$TakeArea]['StabilityAvrPoint'] = '';
                        $dataSet[$SerialCcd][$TakeArea]['StabilityAvrPointRef'] = '';
                        $dataSet[$SerialCcd][$TakeArea]['StabilityAvrPercent'] = '';
                        $dataSet[$SerialCcd][$TakeArea]['StrongAvrPoint1'] = '';
                        $dataSet[$SerialCcd][$TakeArea]['StrongAvrPoint1Ref'] = '';
                        $dataSet[$SerialCcd][$TakeArea]['StrongAvrPoint2'] = '';
                        $dataSet[$SerialCcd][$TakeArea]['StrongAvrPoint2Ref'] = '';
                        $dataSet[$SerialCcd][$TakeArea]['StrongAvrPercent'] = '';
                        $dataSet[$SerialCcd][$TakeArea]['ExpectAvrPoint1'] = '';
                        $dataSet[$SerialCcd][$TakeArea]['ExpectAvrPoint1Ref'] = '';
                        $dataSet[$SerialCcd][$TakeArea]['ExpectAvrPoint2'] = '';
                        $dataSet[$SerialCcd][$TakeArea]['ExpectAvrPoint2Ref'] = '';
                        $dataSet[$SerialCcd][$TakeArea]['ExpectAvrPercent'] = '';
                        $dataSet[$SerialCcd][$TakeArea]['IsUse'] = '';
                        $dataSet[$SerialCcd][$TakeArea]['RegistAvrPoint'] = '';
                        $dataSet[$SerialCcd][$TakeArea]['RegistStandard'] = '';
                    }
                }
            }
        }

        if(empty($prodcode) == false) {

            $list = $this->predictModel->statisticsListLine($prodcode);

            foreach ($list as $key => $val) {

                $TakeMockPart = $val['TakeMockPart'];
                $TakeArea = $val['TakeArea'];

                $TakeOrigin = $val['TakeOrigin'];
                $TotalRegist = $val['TotalRegist'];
                $AvrPoint = $val['AvrPoint'];
                $PickNum = $val['PickNum'];
                $TakeNum = $val['TakeNum'];
                $CompetitionRateNow = $val['CompetitionRateNow'];
                $CompetitionRateAgo = $val['CompetitionRateAgo'];
                $PassLineAgo = $val['PassLineAgo'];
                $AvrPointAgo = $val['AvrPointAgo'];
                $StabilityAvrPoint = $val['StabilityAvrPoint'];
                $StabilityAvrPointRef = $val['StabilityAvrPointRef'];
                $StabilityAvrPercent = $val['StabilityAvrPercent'];
                $StrongAvrPoint1 = $val['StrongAvrPoint1'];
                $StrongAvrPoint1Ref = $val['StrongAvrPoint1Ref'];
                $StrongAvrPoint2 = $val['StrongAvrPoint2'];
                $StrongAvrPoint2Ref = $val['StrongAvrPoint2Ref'];
                $StrongAvrPercent = $val['StrongAvrPercent'];
                $ExpectAvrPoint1 = $val['ExpectAvrPoint1'];
                $ExpectAvrPoint1Ref = $val['ExpectAvrPoint1Ref'];
                $ExpectAvrPoint2 = $val['ExpectAvrPoint2'];
                $ExpectAvrPoint2Ref = $val['ExpectAvrPoint2Ref'];
                $ExpectAvrPercent = $val['ExpectAvrPercent'];
                $IsUse = $val['IsUse'];
                $RegistAvrPoint = $val['RegistAvrPoint'];
                $RegistStandard = $val['RegistStandard'];

                if ($TakeMockPart == '400') {
                    //101단 - 서울만 접수받음
                    if ($TakeArea == '712001') {
                        $dataSet[$TakeMockPart][$TakeArea]['TakeOrigin'] = $TakeOrigin;
                        $dataSet[$TakeMockPart][$TakeArea]['TotalRegist'] = $TotalRegist;
                        $dataSet[$TakeMockPart][$TakeArea]['AvrPoint'] = $AvrPoint;
                        $dataSet[$TakeMockPart][$TakeArea]['PickNum'] = $PickNum;
                        $dataSet[$TakeMockPart][$TakeArea]['TakeNum'] = $TakeNum;
                        $dataSet[$TakeMockPart][$TakeArea]['CompetitionRateNow'] = $CompetitionRateNow;
                        $dataSet[$TakeMockPart][$TakeArea]['CompetitionRateAgo'] = $CompetitionRateAgo;
                        $dataSet[$TakeMockPart][$TakeArea]['PassLineAgo'] = $PassLineAgo;
                        $dataSet[$TakeMockPart][$TakeArea]['AvrPointAgo'] = $AvrPointAgo;
                        $dataSet[$TakeMockPart][$TakeArea]['StabilityAvrPoint'] = $StabilityAvrPoint;
                        $dataSet[$TakeMockPart][$TakeArea]['StabilityAvrPointRef'] = $StabilityAvrPointRef;
                        $dataSet[$TakeMockPart][$TakeArea]['StabilityAvrPercent'] = $StabilityAvrPercent;
                        $dataSet[$TakeMockPart][$TakeArea]['StrongAvrPoint1'] = $StrongAvrPoint1;
                        $dataSet[$TakeMockPart][$TakeArea]['StrongAvrPoint1Ref'] = $StrongAvrPoint1Ref;
                        $dataSet[$TakeMockPart][$TakeArea]['StrongAvrPoint2'] = $StrongAvrPoint2;
                        $dataSet[$TakeMockPart][$TakeArea]['StrongAvrPoint2Ref'] = $StrongAvrPoint2Ref;
                        $dataSet[$TakeMockPart][$TakeArea]['StrongAvrPercent'] = $StrongAvrPercent;
                        $dataSet[$TakeMockPart][$TakeArea]['ExpectAvrPoint1'] = $ExpectAvrPoint1;
                        $dataSet[$TakeMockPart][$TakeArea]['ExpectAvrPoint1Ref'] = $ExpectAvrPoint1Ref;
                        $dataSet[$TakeMockPart][$TakeArea]['ExpectAvrPoint2'] = $ExpectAvrPoint2;
                        $dataSet[$TakeMockPart][$TakeArea]['ExpectAvrPoint2Ref'] = $ExpectAvrPoint2Ref;
                        $dataSet[$TakeMockPart][$TakeArea]['ExpectAvrPercent'] = $ExpectAvrPercent;
                        $dataSet[$TakeMockPart][$TakeArea]['IsUse'] = $IsUse;
                        $dataSet[$TakeMockPart][$TakeArea]['RegistAvrPoint'] = $RegistAvrPoint;
                        $dataSet[$TakeMockPart][$TakeArea]['RegistStandard'] = $RegistStandard;

                    }
                } else {
                    $dataSet[$TakeMockPart][$TakeArea]['TakeOrigin'] = $TakeOrigin;
                    $dataSet[$TakeMockPart][$TakeArea]['TotalRegist'] = $TotalRegist;
                    $dataSet[$TakeMockPart][$TakeArea]['AvrPoint'] = $AvrPoint;
                    $dataSet[$TakeMockPart][$TakeArea]['PickNum'] = $PickNum;
                    $dataSet[$TakeMockPart][$TakeArea]['TakeNum'] = $TakeNum;
                    $dataSet[$TakeMockPart][$TakeArea]['CompetitionRateNow'] = $CompetitionRateNow;
                    $dataSet[$TakeMockPart][$TakeArea]['CompetitionRateAgo'] = $CompetitionRateAgo;
                    $dataSet[$TakeMockPart][$TakeArea]['PassLineAgo'] = $PassLineAgo;
                    $dataSet[$TakeMockPart][$TakeArea]['AvrPointAgo'] = $AvrPointAgo;
                    $dataSet[$TakeMockPart][$TakeArea]['StabilityAvrPoint'] = $StabilityAvrPoint;
                    $dataSet[$TakeMockPart][$TakeArea]['StabilityAvrPointRef'] = $StabilityAvrPointRef;
                    $dataSet[$TakeMockPart][$TakeArea]['StabilityAvrPercent'] = $StabilityAvrPercent;
                    $dataSet[$TakeMockPart][$TakeArea]['StrongAvrPoint1'] = $StrongAvrPoint1;
                    $dataSet[$TakeMockPart][$TakeArea]['StrongAvrPoint1Ref'] = $StrongAvrPoint1Ref;
                    $dataSet[$TakeMockPart][$TakeArea]['StrongAvrPoint2'] = $StrongAvrPoint2;
                    $dataSet[$TakeMockPart][$TakeArea]['StrongAvrPoint2Ref'] = $StrongAvrPoint2Ref;
                    $dataSet[$TakeMockPart][$TakeArea]['StrongAvrPercent'] = $StrongAvrPercent;
                    $dataSet[$TakeMockPart][$TakeArea]['ExpectAvrPoint1'] = $ExpectAvrPoint1;
                    $dataSet[$TakeMockPart][$TakeArea]['ExpectAvrPoint1Ref'] = $ExpectAvrPoint1Ref;
                    $dataSet[$TakeMockPart][$TakeArea]['ExpectAvrPoint2'] = $ExpectAvrPoint2;
                    $dataSet[$TakeMockPart][$TakeArea]['ExpectAvrPoint2Ref'] = $ExpectAvrPoint2Ref;
                    $dataSet[$TakeMockPart][$TakeArea]['ExpectAvrPercent'] = $ExpectAvrPercent;
                    $dataSet[$TakeMockPart][$TakeArea]['IsUse'] = $IsUse;
                    $dataSet[$TakeMockPart][$TakeArea]['RegistAvrPoint'] = $RegistAvrPoint;
                    $dataSet[$TakeMockPart][$TakeArea]['RegistStandard'] = $RegistStandard;
                }
            }
           //var_dump($dataSet);
        }

        $this->load->view('predict/passline/index', [
            'productList' => $productList,
            'prodcode' => $prodcode,
            'dataSet' => $dataSet
        ]);
    }

    /**
     * 리스트
     */
    public function list()
    {
        $rules = [
            ['field' => 'search_ProdCode', 'label' => '코드', 'rules' => 'trim|is_natural_no_zero']
        ];

        if ($this->validate($rules) === false) return;

        $ProdCode = $this->input->post('search_ProdCode');

        $condition = [
            'EQ' => [
                'pg.TakeMockPart' => $this->input->post('search_TakeMockPart'),
                'pg.TakeArea' => $this->input->post('search_TakeArea'),
            ],
        ];

        if(empty($ProdCode) === true) {
            $ProdCode = "100000";
        }

        list($data, $count) = $this->predictModel->statisticsList($ProdCode, $condition);

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $data,
        ]);
    }

    /**
     * 직렬별 예상합격선 등록
     */
    public function store()
    {
        $rules = [
            ['field' => 'ProdCode', 'label' => '합격예측명', 'rules' => 'trim|required|is_natural_no_zero'],
        ];

        if ($this->validate($rules) === false) return;

        $result = $this->predictModel->storeLine();
        $this->json_result($result['ret_cd'], '저장되었습니다.', $result, $result);
    }

    /*
     *  기대권 / 유력권 / 안정권
     */
    public function calculateAjax(){
        $ProdCode = $this->_req("ProdCode");
        $TakeMockPart = $this->_req("TakeMockPart");
        $TakeArea = $this->_req("TakeArea");
        $Per1 = $this->_req("Per1");
        $Per2 = $this->_req("Per2");
        $Per3 = $this->_req("Per3");

        $data = $this->predictModel->calculate($ProdCode, $TakeMockPart, $TakeArea, $Per1, $Per2, $Per3);
        return $this->response([
            'data' => $data
        ]);
    }

}