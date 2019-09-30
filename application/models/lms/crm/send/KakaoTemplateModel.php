<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KakaoTemplateModel extends WB_Model
{
    private $_table = 'lms_crm_kakao_template';

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 알림톡 템플릿 정보 조회
     * @param $is_count
     * @param $arr_condition
     * @param $limit
     * @param $offset
     * @param $order_by
     * @return mixed
     */
    public function listKakaoTemplate($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'COUNT(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
                KT.*,
                fn_admin_name(KT.RegAdminIdx) AS RegAdminName,
                fn_admin_name(KT.UpdAdminIdx) AS UpdAdminName,
                fn_admin_name(KT.ApprovalAdminIdx) AS ApprovalAdminName
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }
        $from = "
            FROM {$this->_table} as KT
        ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $query = $this->_conn->query('SELECT ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 알림톡 템플릿 정보 상세 조회
     * @param $idx
     * @return mixed
     */
    public function findKakaoTemplate($idx)
    {
        $return_data = null;
        $arr_condition = [
            'EQ' => [
                'KT.CktIdx' => $idx,
                'KT.IsStatus' => 'Y'
            ]
        ];
        $column = '
            KT.*,
            fn_admin_name(KT.RegAdminIdx) AS RegAdminName,
            fn_admin_name(KT.UpdAdminIdx) AS UpdAdminName,
            fn_admin_name(KT.ApprovalAdminIdx) AS ApprovalAdminName
        ';
        $from = "
            FROM {$this->_table} as KT
        ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $query = $this->_conn->query('SELECT ' . $column . $from . $where);
        $return_data = $query->row_array();

        //버블챗 json 변환
        $arr_chat_bubble_button = array();
        for($i=1; $i<=5; $i++) {
            if(empty($return_data['ChatBubbleButton'.$i]) === false) {
                $arr_temp = []; $type_name = null; $link1 = null; $link2 = null;
                $decode_data = json_decode($return_data['ChatBubbleButton'.$i], true);

                switch ($decode_data['type']) {
                    case 'WL':
                        $type_name = '웹링크';
                        $link1 = $decode_data['url_mobile'];
                        $link2 = $decode_data['url_pc'];
                        break;
                    case 'AL':
                        $type_name = '앱링크';
                        $link1 = $decode_data['scheme_ios'];
                        $link2 = $decode_data['scheme_android'];
                        break;
                    case 'DS': $type_name = '배송조회'; break;
                    case 'BK': $type_name = '봇키워드'; break;
                    case 'MD': $type_name = '메세지전달'; break;
                    default: break;
                }

                $arr_temp['type'] = $decode_data['type'];
                $arr_temp['type_name'] = $type_name;
                $arr_temp['name'] = $decode_data['name'];
                $arr_temp['link1'] = $link1;
                $arr_temp['link2'] = $link2;

                array_push($arr_chat_bubble_button, $arr_temp);
            }
        }
        $return_data['arr_chat_bubble_button'] = $arr_chat_bubble_button;

        return $return_data;
    }

    /**
     * 알림톡 템플릿 등록
     * @param $input_data
     * @return mixed
     */
    public function addKakaoTemplate($input_data = []){
        $this->_conn->trans_begin();
        try {
            $input_data = array_merge($input_data,[
                'RegAdminIdx'=> $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ]);

            if(empty($input_data['IsApproval']) === false && $input_data['IsApproval'] == 'Y'){
                $input_data = array_merge($input_data, [
                    'ApprovalAdminIdx'=> $this->session->userdata('admin_idx'),
                    'ApprovalDatm' => date('Y-m-d H:i:s')
                ]);
            }

            if ($this->_conn->set($input_data)->insert($this->_table) === false) {
                throw new \Exception('템플릿 등록을 실패했습니다.');
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 알림톡 템플릿 수정
     * @param $input_data
     * @param $idx
     * @return mixed
     */
    public function modifyKakaoTemplate($input_data = [], $idx)
    {
        $this->_conn->trans_begin();
        try {
            $input_data = array_merge($input_data, [
                'UpdAdminIdx'=> $this->session->userdata('admin_idx'),
                'UpdDatm' => date('Y-m-d H:i:s')
            ]);

            if(empty($input_data['IsApproval']) === false && $input_data['IsApproval'] == 'Y'){
                $input_data = array_merge($input_data, [
                    'ApprovalAdminIdx'=> $this->session->userdata('admin_idx'),
                    'ApprovalDatm' => date('Y-m-d H:i:s')
                ]);
            }

            $this->_conn->set($input_data)->where('CktIdx', $idx);
            if ($this->_conn->update($this->_table) === false) {
                throw new \Exception('템플릿 수정을 실패했습니다.');
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

}