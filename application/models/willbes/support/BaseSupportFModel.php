<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseSupportFModel extends WB_Model
{
    protected $_table = [
        'board' => 'vw_board as b'
        ,'board_qna' => 'vw_board_qna'
        ,'lms_board' => 'lms_board'
        ,'lms_board_log' => 'lms_board_read_log'
        ,'menu' => 'lms_site_menu'
        ,'code' => 'lms_sys_code'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * FAQ 구분 목록 추출
     * @return mixed
     */
    public function listFaqCcd()
    {
        $arr_condition = [
        ];
        $column = 'A.Ccd, A.GroupCcd, A.CcdName, B.subFaqData';

        $from  = '
            from 
                lms_sys_code A
                left outer join
                    (
                        SELECT 
                        GroupCcd,
                        CONCAT(\'[\', GROUP_CONCAT(JSON_OBJECT(
                                \'GroupCcd\', GroupCcd,
                                \'Ccd\', Ccd,
                                \'CcdName\', CcdName
                            )), \']\') AS subFaqData
                        FROM lms_sys_code 
                        WHERE CcdDesc=\'faq_use\' AND GroupCcd != 0 AND IsStatus=\'Y\' AND IsUse = \'Y\'  
                        GROUP BY GroupCcd
                        order by OrderNum ASC
                    ) B on A.Ccd = B.GroupCcd
            WHERE 
            A.CcdDesc=\'faq_use\' and A.GroupCcd=0 AND A.IsStatus=\'Y\' AND A.IsUse = \'Y\' 
        ';

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        $order_by = ' order by OrderNum ASC';

        $query = $this->_conn->query('select ' . $column . $from . $where. $order_by);
        return $query->result_array();
    }


    /**
     * Campus 목록 추출
     * @param $site_code
     * @return mixed
     */
    public function listCampusCcd($site_code)
    {
        $arr_condition=[
            'EQ' => ['A.SiteCode'=>$site_code]
        ];

        $column = 'B.SiteCode,B.CampusCcd,C.CcdName';

        $from  = '
            from 
                lms_site A 
                join lms_site_r_campus B on A.SiteCode = B.SiteCode
                join lms_sys_code C on B.CampusCcd = C.Ccd 
            WHERE 
                A.IsCampus=\'Y\' and A.IsStatus=\'Y\' and B.IsStatus=\'Y\' and C.IsStatus=\'Y\' and C.IsUse=\'Y\'
        ';
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        $order_by = ' order by C.OrderNum ASC';

        $query = $this->_conn->query('select ' . $column . $from . $where. $order_by);
        return $query->result_array();
    }


    /**
     * 게시글 조회수 수정 및 로그정보 저장
     * @param $board_idx
     * @return array|bool|string
     */
    public function modifyBoardRead($board_idx)
    {
        if(empty($board_idx)) {
            return '게시글번호가 없습니다.';
        }

        $this->_conn->trans_begin();
        try{
            #-----  조회수 업데이트
            $this->_conn->set('ReadCnt', 'ReadCnt+1',false)->where('BoardIdx', $board_idx);
            if ($this->_conn->update($this->_table['lms_board']) === false) {
                throw new \Exception('조회수 수정에 실패했습니다.');
            }

            #----- 로그 저장
            $log_data = [
                'BoardIdx' => $board_idx
                ,'MemIdx' => sess_data('mem_idx')
                ,'UserAgent' => substr($this->input->user_agent(),0,99)
                ,'RegIp' => $this->input->ip_address()
            ];

            if ($this->_conn->set($log_data)->insert($this->_table['lms_board_log']) === false) {
                throw new \Exception('로그 저장에 실패했습니다.');
            }

            $this->_conn->trans_commit();

        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        //echo $this->_conn->last_query();
        return true;
    }
}