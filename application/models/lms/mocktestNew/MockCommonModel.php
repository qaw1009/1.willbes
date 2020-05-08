<?php
/**
 * ======================================================================
 * 모의고사 공통 라이브러리
 * ======================================================================
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class MockCommonModel extends WB_Model
{
    protected $_table = [
        'site' => 'lms_site',
        'sys_code' => 'lms_sys_code',
        'sys_category' => 'lms_sys_category',
        'admin' => 'wbs_sys_admin',
        'mock_base' => 'lms_mock',
        'subject' => 'lms_product_subject',
        'mock_subject' => 'lms_mock_r_subject',
        'mock_cate' => 'lms_mock_r_category',
        'mock_area' => 'lms_mock_area',
    ];
    public $_groupCcd = [];
    public $_ccd = [];

    public function __construct()
    {
        parent::__construct('lms');

        $this->_groupCcd = [
            'option' => '660',
            'SerialCcd' => '666',
            'CandidateAreaCcd' => '631',
            'SmsSendCallBackNum' => '706',   //SMS 발송번호
            'applyType' => $this->config->item('sysCode_applyType', 'mock'),    //응시형태
            'applyArea1' => $this->config->item('sysCode_applyArea1', 'mock'),  //모의고사 Off 응시지역1
            'applyArea2' => $this->config->item('sysCode_applyArea2', 'mock'),  //모의고사 Off 응시지역2
            'addPoint' => $this->config->item('sysCode_addPoint', 'mock'),
            'acceptStatus' => $this->config->item('sysCode_acceptStatus', 'mock'),  //접수상태
            'sysCode_kind' => $this->config->item('sysCode_kind', 'mock'),
            'paymentStatus' => $this->config->item('sysCode_paymentStatus', 'mock') //결제상태
        ];

        $this->_ccd = [
            'acceptStatus_expected' => '675001',    //접수예정
            'acceptStatus_available' => '675002',   //접수중
            'acceptStatus_end' => '675003',         //접수마감
            'sale_type' => '613001',        //상품판매구분 > PC+모바일
            'paid_pay_status' => '676001',  //결제완료 결제상태 공통코드
            'refund_pay_status' => '676006',  //환불완료 결제상태 공통코드
            'applyType_on' => $this->config->item('sysCode_applyType_on', 'mock'),      //응시형태 온라인
            'applyType_off' => $this->config->item('sysCode_applyType_off', 'mock'),     //응시형태 오프라인
            'sysCode_ProdTypeCcd' => $this->config->item('sysCode_ProdTypeCcd', 'mock'),
            'sysCode_SaleStatusCcd' => $this->config->item('sysCode_SaleStatusCcd', 'mock'),
            'sysCode_PointApplyCcd' => $this->config->item('sysCode_PointApplyCcd', 'mock'),    // 포인트 적용 공통코드 : 강좌
            'sysCode_SaleTypeCcd' => $this->config->item('sysCode_SaleTypeCcd', 'mock'),    // 판매타입코드 입력값 (PC+모바일)
        ];
    }

    /**
     * 직렬(운영코드) 전체 로딩 - SELECT MENU
     * @param bool $isUseChk
     * @return mixed
     */
    public function getMockKindAll($isUseChk = true)
    {
        $sysCode_kind = $this->config->item('sysCode_kind', 'mock');
        $arr_condition = [
            'EQ' => [
                'GroupCcd' => $sysCode_kind,
                'IsStatus' => 'Y'
            ]
        ];

        if (empty($isUseChk) === true) {
            $arr_condition['EQ']['IsUse'] = 'Y';
        }

        $column = 'Ccd, CcdName';
        $from = " FROM {$this->_table['sys_code']}";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        return $this->_conn->query('select '. $column . $from . $where)->result_array();
    }

    /**
     * 카테고리에 매핑된 직렬 로딩 - SELECT MENU
     * @param bool $isUseChk
     * @return mixed
     */
    public function getMockKind($isUseChk = true)
    {
        $order_by = $this->_conn->makeOrderBy(['SC.OrderNum' => 'ASC', 'SC.CcdName' => 'ASC'])->getMakeOrderBy();
        $arr_condition = ['EQ' => ['M.IsStatus' => 'Y']];

        if (empty($isUseChk) === true) {
            $arr_condition['EQ']['M.IsUse'] = 'Y';
            $isUse_SC = "AND SC.IsUse = 'Y'";
        } else {
            $isUse_SC = "";
        }

        $column = 'M.SiteCode, M.CateCode AS ParentCateCode, SC.Ccd AS CateCode, SC.CcdName AS CateName';
        $from = "
            FROM {$this->_table['mock_base']} AS M
            JOIN {$this->_table['sys_code']} AS SC ON M.Ccd = SC.Ccd AND SC.IsStatus = 'Y' $isUse_SC
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $query = $this->_conn->query('select '. $column . $from . $where . $order_by);

        return $query->result_array();
    }

    /**
     * 그룹 과목조회
     * @return mixed
     */
    public function getSubjectGroupForMockBaseCode()
    {
        $group_by = 'GROUP BY SJ.MmIdx, SJ.SubjectType ASC';
        $order_by = $this->_conn->makeOrderBy(['SJ.MmIdx' => 'ASC'])->getMakeOrderBy();
        $arr_condition = [
            'EQ' => [
                'SJ.IsStatus' => 'Y',
                'SJ.IsUse' => 'Y'
            ]
        ];

        $column = '
            SJ.MmIdx, SJ.SubjectType, GROUP_CONCAT(SJ.SubjectIdx) AS SubjectIdxs,
            GROUP_CONCAT(IF(PS.IsUse = \'Y\', PS.SubjectName, CONCAT(PS.SubjectName, \'미사용\')) SEPARATOR \', \') AS SubjectNames
        ';
        $from = "
            FROM {$this->_table['mock_subject']} AS SJ
            JOIN {$this->_table['subject']} AS PS ON SJ.SubjectIdx = PS.SubjectIdx AND PS.IsStatus = 'Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $query = $this->_conn->query('select '. $column . $from . $where . $group_by . $order_by);
        return $query->result_array();
    }

    /**
     * @param $arr_condition
     * @param $arr_condition_sub
     * @return mixed
     */
    public function getSubjectForMockBaseCode($arr_condition, $arr_condition_sub)
    {
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $where_sub = $this->_conn->makeWhere($arr_condition_sub);
        $where_sub = $where_sub->getMakeWhere(true);

        $order_by = $this->_conn->makeOrderBy(['S.SiteCode' => 'ASC', 'S.OrderNum' => 'ASC'])->getMakeOrderBy();
        $column = 'S.SiteCode AS sSiteCode, S.SubjectIdx AS sSubjectIdx, S.SubjectName AS sSubjectName, S.IsUse AS sIsUse, MS.*, ADMIN.wAdminName AS RegAdminName, ADMIN2.wAdminName AS UpdAdminName';
        $from = "
            FROM {$this->_table['subject']} AS S
            LEFT JOIN {$this->_table['mock_subject']} AS MS ON S.SubjectIdx = MS.SubjectIdx {$where_sub}
            LEFT OUTER JOIN {$this->_table['admin']} as ADMIN ON MS.RegAdminIdx = ADMIN.wAdminIdx and ADMIN.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['admin']} as ADMIN2 ON MS.UpdAdminIdx = ADMIN2.wAdminIdx and ADMIN2.wIsStatus='Y'
        ";
        $query = $this->_conn->query('select '. $column . $from . $where . $order_by);
        return $query->result_array();
    }

    /**
     * 모의고사카테고리 검색
     * @param string $column
     * @param bool $is_count
     * @param array $conditionAdd
     * @param bool $isUse
     * @param string $isReg
     * @param null $limit
     * @param null $offset
     * @return mixed
     */
    public function moCateListAll($column = '*', $is_count = false, $conditionAdd = [], $isUse = false, $isReg = '', $limit = null, $offset = null)
    {
        if(empty($isReg) === true) {
            $from = " FROM {$this->_table['mock_subject']} AS MS";
            $from .= " JOIN {$this->_table['subject']} AS SJ ON MS.SubjectIdx = SJ.SubjectIdx AND SJ.IsStatus = 'Y'" . (($isUse === true) ? " AND SJ.IsUse = 'Y'" : "");
            $from .= " JOIN {$this->_table['mock_base']} AS MB ON MS.MmIdx = MB.MmIdx AND MB.IsStatus = 'Y'" . (($isUse === true) ? " AND MB.IsUse = 'Y'" : "");
            $from .= " JOIN {$this->_table['site']} AS S ON MB.SiteCode = S.SiteCode AND S.IsStatus = 'Y'" . (($isUse === true) ? " AND S.IsUse = 'Y'" : "");
            $from .= " JOIN {$this->_table['sys_category']} AS C1 ON MB.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'" . (($isUse === true) ? " AND C1.IsUse = 'Y'" : "");
            $from .= " JOIN {$this->_table['sys_code']} AS SC ON MB.Ccd = SC.Ccd AND SC.IsStatus = 'Y'" . (($isUse === true) ? " AND SC.IsUse = 'Y'" : "");
            $from .= " LEFT JOIN {$this->_table['admin']} AS A ON MS.RegAdminIdx = A.wAdminIdx";

        } else { // 모의고사등록 > 과목별문제등록 카테고리검색인 경우 (기본정보 > 문제영역관리에 등록된 카테고리만 로딩)
            $from = " FROM {$this->_table['mock_subject']} AS MS";
            $from .= " JOIN {$this->_table['subject']} AS SJ ON MS.SubjectIdx = SJ.SubjectIdx AND SJ.IsStatus = 'Y'" . (($isUse === true) ? " AND SJ.IsUse = 'Y'" : "");
            $from .= " JOIN {$this->_table['mock_base']} AS MB ON MS.MmIdx = MB.MmIdx AND MB.IsStatus = 'Y'" . (($isUse === true) ? " AND MB.IsUse = 'Y'" : "");
            $from .= " JOIN {$this->_table['site']} AS S ON MB.SiteCode = S.SiteCode AND S.IsStatus = 'Y'" . (($isUse === true) ? " AND S.IsUse = 'Y'" : "");
            $from .= " JOIN {$this->_table['sys_category']} AS C1 ON MB.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'" . (($isUse === true) ? " AND C1.IsUse = 'Y'" : "");
            $from .= " JOIN {$this->_table['sys_code']} AS SC ON MB.Ccd = SC.Ccd AND SC.IsStatus = 'Y'" . (($isUse === true) ? " AND SC.IsUse = 'Y'" : "");
            $from .= " JOIN {$this->_table['mock_cate']} AS MC ON MS.MrsIdx = MC.MrsIdx AND MC.IsStatus = 'Y'";
            $from .= " JOIN {$this->_table['mock_area']} AS MA ON MC.MaIdx = MA.MaIdx AND MA.IsStatus = 'Y'" . (($isUse === true) ? " AND MA.IsUse = 'Y'" : "");
            $from .= " LEFT JOIN {$this->_table['admin']} AS A ON MS.RegAdminIdx = A.wAdminIdx";
        }

        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $arr_order_by = ['C1.SiteCode' => 'ASC', 'C1.OrderNum' => 'ASC', 'SC.OrderNum' => 'ASC', 'SJ.OrderNum' => 'ASC', 'MS.SubjectType' => 'ASC'];
            $order_by_offset_limit = $this->_conn->makeOrderBy($arr_order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $condition = [
            'EQ' => ['MS.IsStatus' => 'Y'],
            'IN' => ['S.SiteCode' => get_auth_site_codes()]
        ];
        $condition = array_merge_recursive($condition, $conditionAdd);
        $where = $this->_conn->makeWhere($condition)->getMakeWhere(false);
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 업로드시 저장될 파일명 생성
     * @param $in
     * @param int $prefixLen
     * @return mixed
     */
    public function makeUploadFileName($in, $prefixLen=0)
    {
        $names = $_FILES;
        foreach ($names as $key => &$it) {
            if(in_array($key, $in)) {
                if (is_array($it['name'])) { // 업로드 배열로 받는 경우
                    $i = 1;
                    foreach ($it['name'] as $key_s => $it_s) {
                        $tmp = explode('.', $it['name'][$key_s]);
                        $ext = isset($tmp[1]) ? '.' . $tmp[1] : '';
                        $prefix = ($prefixLen) ? substr($key, 0, $prefixLen) . $i . '_' : '';
                        $it['real'][] = $prefix . md5(uniqid(mt_rand())) . $ext;
                        $i++;
                    }
                } else {
                    $tmp = explode('.', $it['name']);
                    $ext = isset($tmp[1]) ? '.' . $tmp[1] : '';
                    $prefix = ($prefixLen) ? substr($key, 0, $prefixLen) . '_' : '';
                    $it['real'] = $prefix . md5(uniqid(mt_rand())) . $ext;
                }
            }
        }
        return $names;
    }
}