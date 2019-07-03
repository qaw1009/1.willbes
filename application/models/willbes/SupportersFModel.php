<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SupportersFModel extends WB_Model
{
    public $_arr_bm_idx = [
        'notice' => '103'
    ];
    private $_table = [
        'supporters' => 'lms_supporters',
        'supporters_r_member' => 'lms_supporters_r_member',
        'supporters_r_coupon' => 'lms_supporters_r_coupon',
        'supporters_myclass' => 'lms_supporters_myclass',
        'lms_member' => 'lms_member'
    ];

    //등록파일 rule 설정
    protected $upload_file_rule = [
        'allowed_types' => 'jpg|gif|png',
        'overwrite' => 'false',
        'max_size' => 5120 //2560
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 서포터즈 회원 단일검색
     * @param $arr_condition_1
     * @param $arr_condition_2
     * @param string $column
     * @return mixed
     */
    public function findSupporters($arr_condition_1, $arr_condition_2, $column = 'a.SupportersIdx')
    {
        $where_1 = $this->_conn->makeWhere($arr_condition_1);
        $where_1 = $where_1->getMakeWhere(false);

        $where_2 = $this->_conn->makeWhere($arr_condition_2);
        $where_2 = $where_2->getMakeWhere(false);

        $from = "
            FROM (
                SELECT
                SupportersIdx, Title, SupportersYear, SupportersNumber, CouponIssueCcd
                FROM {$this->_table['supporters']}
                {$where_1}
                ORDER BY SupportersIdx DESC LIMIT 1
            ) AS a
            INNER JOIN {$this->_table['supporters_r_member']} AS b ON a.SupportersIdx = b.SupportersIdx
        ";
        $order_by_offset_limit = ' ORDER BY a.SupportersIdx DESC Limit 1';

        // 쿼리 실행
        return $this->_conn->query('select ' . $column . $from . $where_2 . $order_by_offset_limit)->row_array();
    }

    /**
     * 발급할 서포터즈용 쿠폰 조회
     * @param $supporters_idx
     * @return mixed
     */
    public function listCoupon($supporters_idx)
    {
        $arr_condition = [
            'EQ' => [
                'SupportersIdx' => $supporters_idx,
                'IsStatus' => 'Y'
            ]
        ];

        $column = 'CouponIdx';
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $from = "FROM {$this->_table['supporters_r_coupon']}";

        return $this->_conn->query("SELECT {$column} {$from} {$where}")->result_array();
    }

    public function listMyClass($is_count, $arr_condition=[], $column = 'a.SmcIdx', $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $from = "
            FROM {$this->_table['supporters_myclass']} AS a
            INNER JOIN {$this->_table['lms_member']} AS b ON a.MemIdx = b.MemIdx
        ";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    public function findMyClass($arr_condition, $column)
    {
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $from = "
            FROM {$this->_table['supporters_myclass']} AS a
            INNER JOIN {$this->_table['lms_member']} AS b ON a.MemIdx = b.MemIdx
        ";

        return $this->_conn->query('select ' . $column . $from . $where)->row_array();
    }

    public function addMyClass($inputData = [])
    {
        $this->_conn->trans_begin();
        try {
            $arr_condition = [
                'EQ' => [
                    'a.SupportersIdx' => element('SupportersIdx',$inputData),
                    'a.MemIdx' => element('MemIdx',$inputData)
                ],
            ];
            $data = $this->findMyClass($arr_condition, 'a.SmcIdx');
            if (empty($data) === false) {
                throw new \Exception('이미 등록 된 소개글이 있습니다.');
            }


            if (empty($_FILES['attach_file']['name']) === false) {
                $sum_size_mb = round($_FILES['attach_file']['size'] / 1024);
                if ($sum_size_mb > $this->upload_file_rule['max_size']) {
                    throw new \Exception('첨부파일 총합 최대 5MB까지 등록 가능합니다.');
                }
            }

            $this->load->library('upload');
            $upload_sub_dir = config_item('upload_prefix_dir') . '/supporters/myclass/' . date('Y') . '/' . date('md');
            $uploaded = $this->upload->uploadFile('file', ['attach_file'], $this->getAttachImgNames(), $upload_sub_dir
                ,'allowed_types:'.$this->upload_file_rule['allowed_types'].',overwrite:'.$this->upload_file_rule['overwrite']);

            if (empty($_FILES['attach_file']['name']) === false && is_array($uploaded) === false) {
                throw new \Exception('파일 등록에 실패했습니다.');
            }

            $inputData['AttachFileName'] = (empty($uploaded[0]) === false) ? $uploaded[0]['orig_name'] : '';
            $inputData['AttachFileRealName'] = (empty($uploaded[0]) === false) ? $uploaded[0]['client_name'] : '';
            $inputData['AttachFilePath'] = (empty($uploaded[0]) === false) ? $this->upload->_upload_url . $upload_sub_dir . '/' : '';

            if ($this->_conn->set($inputData)->insert($this->_table['supporters_myclass']) === false) {
                throw new \Exception('나의소개 등록에 실패했습니다.');
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 파일명 생성
     * @return string
     */
    protected function getAttachImgNames()
    {
        $temp_time = date('YmdHis');
        $attach_file_names = 'myclass_' . $temp_time;
        return $attach_file_names;
    }
}