<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SupportersRegistModel extends WB_Model
{
    private $_table = [
        'lms_board' => 'lms_board',
        'supporters' => 'lms_supporters',
        'supporters_r_coupon' => 'lms_supporters_r_coupon',
        'lms_coupon' => 'lms_coupon',
        'lms_site' => 'lms_site',
        'wbs_sys_admin' => 'wbs_sys_admin'
    ];
    private $_supporters_bm_idx = 104;

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 서포터즈 기본 관리 데이터 조회
     * @param $is_board_count
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listSupporters($is_board_count, $is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = 'SP.*';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }
        // 사이트 권한 추가
        $arr_condition = array_merge_recursive($arr_condition,[
            'IN' => [
                'a.SiteCode' => get_auth_site_codes()
            ]
        ]);
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        $from = "
            FROM (
                SELECT
                a.SupportersIdx, a.SiteCode, a.Title, a.SupportersYear, a.SupportersNumber, a.StartDate, a.EndDate, a.CouponIssueCcd, a.IsUse, a.RegDatm, a.RegAdminIdx,
                b.SiteName, c.wAdminName as RegAdminName,
                fn_ccd_name(a.CouponIssueCcd) AS CouponIssueCcdName 
                FROM {$this->_table['supporters']} AS a
                INNER JOIN {$this->_table['lms_site']} as b ON a.SiteCode = b.SiteCode
                INNER JOIN {$this->_table['wbs_sys_admin']} as c ON a.RegAdminIdx = c.wAdminIdx AND c.wIsStatus='Y'
                {$where}
            ) AS SP
        ";

        if ($is_board_count === true) {
            $column .= ", IFNULL(S.cnt, 0) AS SupportersAssignmentTotalCount ";
            $from .= "
                LEFT JOIN (
                    SELECT SupportersIdx, COUNT(*) AS cnt FROM {$this->_table['lms_board']} WHERE BmIdx = '{$this->_supporters_bm_idx}'
                    AND IsStatus = 'Y' AND IsUse = 'Y'
                    GROUP BY SupportersIdx
                ) AS S ON SP.SupportersIdx = S.SupportersIdx
            ";
        }

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 서포터즈 간편 조회
     * @param $arr_condition
     * @return mixed
     */
    public function getSupportersData($arr_condition)
    {
        $column = 'a.SupportersIdx, a.SiteCode, a.Title, a.SupportersYear, a.SupportersNumber';
        $from = "
            FROM {$this->_table['supporters']} as a
            INNER JOIN {$this->_table['lms_site']} as b ON a.SiteCode = b.SiteCode
        ";

        // 사이트 권한 추가
        $arr_condition = array_merge_recursive($arr_condition,[
            'IN' => [
                'a.SiteCode' => get_auth_site_codes()
            ]
        ]);
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        $order_by_offset_limit = $this->_conn->makeOrderBy(['a.SupportersIdx' => 'DESC'])->getMakeOrderBy();
        // 쿼리 실행
        return $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit)->result_array();
    }

    /**
     * 서포터즈 기본 정보 등록
     * @param array $input
     * @return array|bool
     */
    public function addSupporters($input = [])
    {
        $this->_conn->trans_begin();
        try {
            $arr_condition = [
                'EQ' => [
                    'a.SiteCode' => element('site_code',$input),
                    'a.SupportersYear' => element('supporters_year',$input),
                    'a.SupportersNumber' => element('supporters_number',$input)
                ]
            ];
            $check = $this->findSupporters($arr_condition);
            if(empty($check) === false) {
                throw new \Exception('이미 등록된 서포터즈 기수 정보입니다.');
            }

            $input_data = $this->_inputCommon($input);
            $input_data = array_merge($input_data, [
                'RegAdminIdx'=>$this->session->userdata('admin_idx'),
                'RegIp'=>$this->input->ip_address()
            ]);

            if($this->_conn->set($input_data)->insert($this->_table['supporters']) === false) {
                throw new \Exception('서포터즈 기수 등록에 실패했습니다.');
            }
            $supporters_idx = $this->_conn->insert_id();

            if($this->_setCoupon($input, $supporters_idx) !== true) {
                throw new \Exception('쿠폰 등록에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch(\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    public function modifySupporters($input = [])
    {
        $this->_conn->trans_begin();
        try {
            $supporters_idx = element('supporters_idx',$input);
            $arr_condition = [
                'EQ' => [
                    'a.SupportersIdx' => $supporters_idx
                ]
            ];
            $data = $this->supportersRegistModel->findSupporters($arr_condition);
            if (empty($data) === true) {
                show_error('데이터 조회에 실패했습니다.');
            }

            $common_data = $this->_inputCommon($input);
            $input_data = array_merge($common_data, [
                'UpdAdminIdx'=>$this->session->userdata('admin_idx')
            ]);

            if ($this->_conn->set($input_data)->where('SupportersIdx', $supporters_idx)->update($this->_table['supporters']) === false) {
                throw new \Exception('서포터즈 기수 정보 수정에 실패했습니다.');
            }

            if($this->_setCoupon($input, $supporters_idx) !== true) {
                throw new \Exception('쿠폰 등록에 실패했습니다.');
            }
            $this->_conn->trans_commit();
        } catch(\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 서포터즈 기수 조회
     * @param $arr_condition
     * @param string $column
     * @return mixed
     */
    public function findSupporters($arr_condition, $column = 'a.SupportersIdx')
    {
        $from = "
            FROM {$this->_table['supporters']} as a
            INNER JOIN {$this->_table['lms_site']} as b ON a.SiteCode = b.SiteCode
            INNER JOIN {$this->_table['wbs_sys_admin']} as c ON a.RegAdminIdx = c.wAdminIdx AND c.wIsStatus='Y'
            INNER JOIN {$this->_table['wbs_sys_admin']} as d ON a.RegAdminIdx = d.wAdminIdx AND d.wIsStatus='Y'
        ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        return $this->_conn->query('select ' . $column . $from . $where)->row_array();
    }

    /**
     * 쿠폰 조회
     * @param $supporters_idx
     * @return mixed
     */
    public function listSupportersForCoupon($supporters_idx)
    {
        $column = 'a.SrcIdx, a.SupportersIdx, a.CouponIdx, b.CouponName';
        $arr_condition = [
            'EQ' => [
                'a.SupportersIdx' => $supporters_idx,
                'a.IsStatus' => 'Y'
            ]
        ];
        $from = "
            FROM {$this->_table['supporters_r_coupon']} as a
            INNER JOIN {$this->_table['lms_coupon']} b on a.CouponIdx = b.CouponIdx and b.IsIssue='Y'
        ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        return $this->_conn->query('select ' . $column . $from . $where)->result_array();
    }

    /**
     * 중복제거된 사이트, 연도 값 조회
     * @return mixed
     */
    public function getSupportersYear()
    {
        $column = '
            SiteCode, SupportersYear
        ';
        $from = "
            FROM {$this->_table['supporters']}
        ";

        // 사이트 권한 추가
        $arr_condition = [
            'EQ' => [
                'IsUse' => 'Y'
            ],
            'IN' => [
                'SiteCode' => get_auth_site_codes()
            ]
        ];
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $group_by = ' group by SiteCode, SupportersYear ';
        $order_by = $this->_conn->makeOrderBy(['SiteCode' => 'ASC', 'SupportersYear' => 'DESC'])->getMakeOrderBy();

        // 쿼리 실행
        $result = [];
        $data = $this->_conn->query('select ' . $column . $from . $where . $group_by . $order_by)->result_array();
        foreach ($data as $row) {
            $result[$row['SiteCode']][] = $row['SupportersYear'];
        }
        return $result;
    }

    /**
     * 중복제거된 년도, 기수 값 조회
     * @return mixed
     */
    public function getSupportersNumber()
    {
        $column = '
            SupportersYear, SupportersNumber
        ';
        $from = "
            FROM {$this->_table['supporters']}
        ";

        // 사이트 권한 추가
        $arr_condition = [
            'EQ' => [
                'IsUse' => 'Y'
            ],
            'IN' => [
                'SiteCode' => get_auth_site_codes()
            ]
        ];
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $group_by = ' group by SupportersYear, SupportersNumber ';
        $order_by = $this->_conn->makeOrderBy(['SupportersYear' => 'ASC', 'SupportersNumber' => 'ASC'])->getMakeOrderBy();

        // 쿼리 실행
        $result = [];
        $data = $this->_conn->query('select ' . $column . $from . $where . $group_by . $order_by)->result_array();
        foreach ($data as $row) {
            $result[$row['SupportersYear']][] = $row['SupportersNumber'];
        }
        return $result;
    }

    /**
     * 연결 쿠폰 등록
     * @param array $input
     * @param $supporters_idx
     * @return bool|string
     */
    private function _setCoupon($input = [], $supporters_idx)
    {
        try {
            //기존 쿠폰 정보 상태값 변경
            if($this->_setDataDelete($supporters_idx) !== true) {
                throw new \Exception('쿠폰 수정에 실패했습니다.');
            }

            $CouponIdx = element('CouponIdx',$input);
            if(empty($CouponIdx) === false) {
                foreach ($CouponIdx as $key => $val) {
                    $input_data = [
                        'SupportersIdx' => $supporters_idx,
                        'CouponIdx' => $val,
                        'RegAdminIdx' => $this->session->userdata('admin_idx')
                    ];

                    if($this->_conn->set($input_data)->insert($this->_table['supporters_r_coupon']) === false) {
                        //echo $this->_conn->last_query();
                        throw new \Exception('쿠폰 등록에 실패했습니다.');
                    }
                }
            }

        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 기존 등록된 쿠폰 삭제처리
     * @param $supporters_idx
     * @return bool|string
     */
    private function _setDataDelete($supporters_idx)
    {
        try {
            //기존 정보 상태값 변경
            $del_data = [
                'IsStatus' => 'N',
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];

            $this->_conn->set($del_data)->where('SupportersIdx', $supporters_idx)->where('IsStatus', 'Y');

            if ($this->_conn->update($this->_table['supporters_r_coupon']) === false) {
                //echo $this->_conn->last_query();
                throw new \Exception('이전 쿠폰 정보 수정에 실패했습니다.');
            }

            /*  기존 정보 상태값 변경 */
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 인풋항목 공통처리
     * @param array $input
     * @return array
     */
    private function _inputCommon($input=[])
    {
        $input_data = [
            'SiteCode' => element('site_code',$input)
            ,'Title' => element('title',$input)
            ,'SupportersYear' => element('supporters_year',$input)
            ,'SupportersNumber' => element('supporters_number',$input)
            ,'StartDate' => element('start_date',$input)
            ,'EndDate' => element('end_date',$input)
            ,'CouponIssueCcd' => element('coupon_issue_ccd',$input)
            ,'IsUse' => element('is_use',$input)
        ];
        return $input_data;
    }
}