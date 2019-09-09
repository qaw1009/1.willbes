<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Point extends \app\controllers\FrontController
{
    protected $models = array('pointF', '_lms/sys/siteGroup');
    protected $helpers = array();
    protected $auth_controller = true;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 포인트 목록 조회 (tab => 강좌 : lecture, 교재 : book / stab => 적립 : save, 사용 : use)
     * @param array $params
     */
    public function index($params = [])
    {
        // input parameter
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        // 탭
        $point_type = element('tab', $arr_input, 'lecture');    // 강좌 : lecture, 교재 : book
        $point_status = strtolower(element('stab', $arr_input, 'save'));    // 적립 : save, 사용 : use, 전체 : all
        
        // 모바일, APP일 경우
        if (APP_DEVICE != 'pc') {
            $point_status = 'all';
        }

        // 디폴트 조회일자
        if (isset($arr_input['search_start_date']) === false) {
            $arr_input['search_end_date'] = date('Y-m-d');
            $arr_input['search_start_date'] = date('Y-m-d', strtotime($arr_input['search_end_date'] . ' -1 month'));
        }

        // 사이트그룹 코드 조회
        $arr_site_group = $this->siteGroupModel->getSiteGroupArray(false);

        // 전체 포인트 조회
        $member_point = $this->pointFModel->getMemberPoint();
        $available_point = element($point_type, $member_point, 0);

        // 기본 조회 조건
        $arr_base_condition = ['EQ' => ['PS.PointType' => $point_type]];

        // 총 적립 포인트
        $total_save_point = array_get($this->pointFModel->listMemberSavePoint('ifnull(SUM(PS.SavePoint), 0) as SavePoint', $arr_base_condition), '0.SavePoint', 0);

        // 당월 소멸예정 포인트
        $expiring_save_point = array_get($this->pointFModel->listMemberSavePoint('ifnull(SUM(PS.RemainPoint), 0) as RemainPoint', array_merge_recursive($arr_base_condition, [
            'EQ' => ['PS.PointStatusCcd' => $this->pointFModel->_point_status_ccd['save']],
            'GT' => ['PS.RemainPoint' => 0],
            'BDT' => ['PS.ExpireDatm' => [date('Y-m-d'), date('Y-m-t')]]
        ])), '0.RemainPoint', 0);

        // 총 사용 포인트
        $total_use_point = array_get($this->pointFModel->listMemberUsePoint('ifnull(SUM(PU.UsePoint), 0) as UsePoint', $arr_base_condition), '0.UsePoint', 0);

        // 포인트 내역 조회
        $list_method = ucfirst($point_status);
        $arr_type_column = ['save' => 'PS.PointType', 'use' => 'PS.PointType', 'all' => 'PSU.PointType'];
        $arr_date_column = ['save' => 'PS.SaveDatm', 'use' => 'PU.UseDatm', 'all' => 'PSU.RegDatm'];
        $arr_orderby = ['save' => ['PS.PointIdx' => 'desc'], 'use' => ['PU.PointUseIdx' => 'desc'], 'all' => ['PSU.RegDatm' => 'desc', 'PSU.PointIdx' => 'asc']];

        // 파라미터 체크
        if (array_key_exists($point_status, $arr_type_column) === false) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }
        
        $arr_condition = [
            'EQ' => [$arr_type_column[$point_status] => $point_type, 'S.SiteGroupCode' => element('site_group', $arr_input)],
            'BDT' => [$arr_date_column[$point_status] => [element('search_start_date', $arr_input), element('search_end_date', $arr_input)]]
        ];

        $list = [];
        $count = $this->pointFModel->{ 'listMember' . $list_method . 'Point' }(true, $arr_condition);
        $paging = $this->pagination('/classroom/point/index?' . http_build_query($arr_input), $count, 10, 10,true);

        if ($count > 0) {
            $list = $this->pointFModel->{ 'listMember' . $list_method . 'Point' }(false, $arr_condition, $paging['limit'], $paging['offset'], $arr_orderby[$point_status]);
        }

        $this->load->view('/classroom/point/index', [
            'tab' => $point_type,
            'stab' => $point_status,
            'arr_input' => $arr_input,
            'arr_site_group' => $arr_site_group,
            'point' => [
                'lecture' => element('lecture', $member_point, 0),
                'book' => element('book', $member_point, 0),
                'available' => $available_point,
                'expiring' => $expiring_save_point,
                'total_save' => $total_save_point,
                'total_use' => $total_use_point
            ],
            'paging' => $paging,
            'data' => $list
        ]);
    }
}
