<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DbBackupLog extends \app\controllers\BaseController
{
    protected $models = array('sys/dbBackupLog', 'sys/code');
    protected $helpers = array();

    /*  테이블 컬럼 기본 명 */
    protected $_columns_config = [
            'ProdCode' => '상품코드',
            'RegDatm' => '등록일시',
            'RegAdminIdx' => '등록관리자식별자',
            'RegIp' => '등록아이피',
            'UpdDatm' => '수정일시',
            'UpdAdminIdx' => '수정관리자식별자',
            'IsStatus' => '상태여부',
            'IsUse' => '사용여부',
    ];

    /*  클래스명*/
    protected $_class_config = [
        'lecture' => '온라인강좌',
        'packageUser' => '사용자패키지',
        'packageAdmin' => '운영자패키지',
        'packagePeriod' => '기간제패키지',
        'lectureFree' => '무료강좌',
        'offLecture' => '학원강좌',
        'offPackageAdmin' => '학원종합반',
    ];
    
    /*  메소드명*/
    protected $_method_config = [
        'store' => '수정',
        'reorder' => '정렬변경',
        'redata' => '신규,추천,사용 변경',
        'reoption' => '개설,접수 변경'
    ];

    public function __construct()
    {
        parent ::__construct();
    }

    /**
     * 인덱스
     */
    public function index($params = [])
    {
        $arr_search = array_merge($this->_reqG(null), $this->_reqP(null));
        $view_file = empty($params) ? 'index' : 'index_modal';
        $tables = $this->dbBackupLogModel->listSearchCondition('table');
        $classes = $this->dbBackupLogModel->listSearchCondition('class');
        $this->load->view('sys/db_backup_log/'.$view_file, [
            'search_tables' => $tables,
            'search_classes' => $classes,
            'arr_search' => $arr_search,
            'class_config' => $this->_class_config,
            'method_config' => $this->_method_config,
        ]);
    }

    /**
     * 백업 목록
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'tbd.TableName' => $this->_reqP('search_table'),
                'tbd.ExecClass' => $this->_reqP('search_class'),
                'tbd.IdxName' => $this->_reqP('search_idx_name'),
                'tbd.Idx' => $this->_reqP('search_idx')
            ],
            'ORG' => [
                'LKB' => [
                    'tbd.ProcessGroup' => $this->_reqP('search_values'),
                    'tbd.TableName' => $this->_reqP('search_values'),
                    'tbd.ExecClass' => $this->_reqP('search_values'),
                    'tbd.IdxName' => $this->_reqP('search_values'),
                    'tbd.Idx' => $this->_reqP('search_values'),
                    'wsa.wAdminName' => $this->_reqP('search_values'),
                    'wsa.wAdminId' => $this->_reqP('search_values'),
                ]
            ],
            'BDT' => ['tbd.RegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]]
        ];

        $list= [];
        $count = $this->dbBackupLogModel->listBackupLog(true, $arr_condition);

        if($count > 0) {
            $list = $this->dbBackupLogModel->listBackupLog(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['tbd.ProcessGroup' => 'DESC', 'tbd.TbdIdx' => 'ASC']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 백업 상세
     * @param array $params
     * @return CI_Output|void
     */
    public function show($params=[])
    {
        if (empty($params) === true) {
            return $this->json_error('필수 파라미터 오류입니다.');
        }

        $idx = $params[0];
        $data = $this->dbBackupLogModel->findBackupLog( ['EQ' => ['tbd.TbdIdx' => $idx]] );

        if (empty($data) === true) {
            return $this->json_error('선택한 데이터가 존재하지 않습니다.');
        }

        $data['BackupData'] = json_decode($data['BackupData'],true);

        $column_config = array_merge($this->dbBackupLogModel->listColumnNameComment($data['TableName']), $this->_columns_config);
        $admin_condition = ['IN' => ['wAdminIdx' => array_merge(array_column($data['BackupData'], 'RegAdminIdx'), array_column($data['BackupData'], 'UpdAdminIdx'))]];
        $admin_config = $this->dbBackupLogModel->listAdminName($admin_condition);

        $this->load->view('sys/db_backup_log/show_modal', [
            'data' => $data,
            'column_config' => $column_config,
            'admin_config' => $admin_config,
            'class_config' => $this->_class_config,
            'method_config' => $this->_method_config,
        ]);
    }

}

