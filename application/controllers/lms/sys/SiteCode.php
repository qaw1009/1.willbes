<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiteCode
{
    private $_CI;
    private $_ccd = [
        'SiteType' => '602',
        'Campus' => '605',
        'Pg' => '603',
        'PayMethod' => '604',
        'DeliveryComp' => '606',
        'MailDomain' => '103'
    ];

    public function __construct()
    {
        $this->_CI =& get_instance();

        // load model
        $this->_CI->load->loadModels(['sys/site', 'sys/siteGroup']);
    }

    /**
     * 사이트 생성관리 인덱스
     */
    public function index()
    {
        // PG 공통코드 조회
        $pg_ccds = $this->_CI->codeModel->getCcd($this->_ccd['Pg']);
        
        // 사이트 목록 조회
        $list = $this->_CI->siteModel->listAllSite([], null, null, ['S.SiteCode' => 'asc']);

        // PG사명 추가
        $list = array_map(function ($row) use ($pg_ccds) {
            $row['PgName'] = $pg_ccds[$row['PgCcd']];
            return $row;
        }, $list);

        $this->_CI->load->view('sys/site/index', [
            'data' => $list
        ]);
    }

    /**
     * 사이트 등록/수정 폼
     * @param array $params
     */
    public function create($params = [])
    {
        $method = 'POST';
        $idx = null;
        $data = null;

        // 사이트 그룹코드 조회
        $site_group_codes = $this->_CI->siteGroupModel->getSiteGroupArray();

        // 사용하는 코드값 조회
        // 사이트 타입, PG사, 택배사 코드 조회
        $codes = $this->_CI->codeModel->getCcdInArray([$this->_ccd['SiteType'], $this->_ccd['Pg'], $this->_ccd['DeliveryComp']]);

        // 캠퍼스 코드 조회 (캠퍼스 코드가 '전체' 코드인 값 제외)
        $codes[$this->_ccd['Campus']] = $this->_CI->codeModel->getCcd($this->_ccd['Campus'], '', ['NOT' => ['Ccd' => $this->_CI->codeModel->campusAllCcd]]);

        // 결제방법 코드 조회 (PG사 사용 결제방법만 조회)
        $codes[$this->_ccd['PayMethod']] = $this->_CI->codeModel->getCcd($this->_ccd['PayMethod'], '', ['RAW' => ['json_value(CcdEtc, "$.is_pg") = ' => '"Y"']]);

        // 메일 도메인 코드 조회 (WBS 공통코드 조회)
        $codes[$this->_ccd['MailDomain']] = $this->_CI->wCodeModel->getCcd($this->_ccd['MailDomain']);

        if (empty($params[1]) === false) {
            $method = 'PUT';
            $idx = $params[1];
            $data = $this->_CI->siteModel->findSiteForModify($idx);

            if (empty($data) === true) {
                show_error('데이터 조회에 실패했습니다.');
            }

            // 고객센터 전화번호
            $data['CsTels'] = explode('-', $data['CsTel']);

            $data['SiteMailId'] = substr($data['UseMail'], 0, strpos($data['UseMail'], '@'));
            $data['SiteMailDomain'] = substr($data['UseMail'], strpos($data['UseMail'], '@') + 1);
        }

        $this->_CI->load->view('sys/site/create', [
            'method' => $method,
            'idx' => $idx,
            'data' => $data,
            'site_group_codes' => $site_group_codes,
            'mail_domain_ccd' => element($this->_ccd['MailDomain'], $codes),
            'site_type_ccd' => element($this->_ccd['SiteType'], $codes),
            'campus_ccd' => element($this->_ccd['Campus'], $codes),
            'pg_ccd' => element($this->_ccd['Pg'], $codes),
            'pay_method_ccd' => element($this->_ccd['PayMethod'], $codes),
            'delivery_comp_ccd' => element($this->_ccd['DeliveryComp'], $codes)
        ]);
    }

    /**
     * 사이트 등록/수정
     */
    public function store()
    {
        $method = 'add';
        $rules = [
            ['field' => 'site_type_ccd', 'label' => '사이트 타입', 'rules' => 'trim|required'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'site_name', 'label' => '이름', 'rules' => 'trim|required'],
            ['field' => 'is_campus', 'label' => '캠퍼스 구분', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'campus_ccd[]', 'label' => '캠퍼스', 'rules' => 'callback_validateRequiredIf[is_campus,Y]'],
            ['field' => 'site_group_code', 'label' => '사이트 그룹정보', 'rules' => 'trim|required'],
            ['field' => 'site_url', 'label' => '대표 도메인', 'rules' => 'trim|required'],
            ['field' => 'use_domain', 'label' => '접속 도메인', 'rules' => 'trim|required'],
            ['field' => 'pg_ccd', 'label' => 'PG사', 'rules' => 'trim|required'],
            ['field' => 'pay_method_ccd[]', 'label' => '결제수단', 'rules' => 'trim|required'],
            ['field' => 'delivery_price', 'label' => '배송료', 'rules' => 'trim|required|numeric'],
            ['field' => 'delivery_add_price', 'label' => '추가 배송료', 'rules' => 'trim|required|numeric'],
            ['field' => 'delivery_free_price', 'label' => '무료 배송조건', 'rules' => 'trim|required|numeric'],
            ['field' => 'delivery_comp_ccd', 'label' => '택배사', 'rules' => 'trim|required'],
        ];

        if (empty($this->_CI->_reqP('idx')) === false) {
            $method = 'modify';
            $rules = array_merge($rules, [
                ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
                ['field' => 'idx', 'label' => '식별자', 'rules' => 'trim|required|integer'],
            ]);
        }

        if ($this->_CI->validate($rules) === false) {
            return null;
        }

        // 사이트 정보 저장
        $result = $this->_CI->siteModel->{$method . 'Site'}($this->_CI->_reqP(null, false));

        if ($result['ret_cd'] === false) {
            return $this->_CI->json_error($result['ret_msg'], $result['ret_status']);
        }

        // 배송료, 추가 배송료 상품 등록
        $this->_CI->load->loadModels(['product/etc/deliveryPrice']);

        $is_delivery_price = $this->_CI->deliveryPriceModel->replaceProduct($result['ret_data'], $this->_CI->_reqP('delivery_price'), $this->_CI->_reqP('delivery_add_price'));
        if ($is_delivery_price !== true) {
            return $this->_CI->json_error($is_delivery_price['ret_msg'], $is_delivery_price['ret_status']);
        }

        // 사이트 정보 캐쉬 저장 (빈번한 캐쉬수정 방지, 수동캐시저장 버튼 활용)
        //$this->_saveSiteCache(true);

        return $this->_CI->json_result(true, '저장 되었습니다.');
    }

    /**
     * 사이트 로고, 파비콘 삭제
     */
    public function destroyImg()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]'],
            ['field' => 'idx', 'label' => '식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'img_type', 'label' => '이미지 구분', 'rules' => 'trim|required|in_list[logo,favicon]'],
        ];

        if ($this->_CI->validate($rules) === false) {
            return;
        }

        $result = $this->_CI->siteModel->removeImg($this->_CI->_reqP('img_type'), $this->_CI->_reqP('idx'));

        // 사이트 정보 캐쉬 저장 (빈번한 캐쉬수정 방지, 수동캐시저장 버튼 활용)
        //$this->_saveSiteCache($result);

        $this->_CI->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 사이트 정보 캐쉬 수동 저장
     */
    public function saveCache()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]']
        ];

        if ($this->_CI->validate($rules) === false) {
            return;
        }

        $result = true;
        $this->_saveSiteCache($result);
        $this->_CI->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 사이트 정보 캐쉬 저장
     * @param $is_success
     */
    private function _saveSiteCache($is_success)
    {
        if ($is_success === true) {
            $this->_CI->load->driver('caching');
            $this->_CI->caching->site->save();
        }
    }
}