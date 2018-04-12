<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubjectModel extends WB_Model
{
    private $_table = [
        'site' => 'lms_site',
        'subject' => 'lms_product_subject',
        'admin' => 'wbs_sys_admin'
    ];    

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 과목 목록 조회
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return array|int
     */
    public function listSubject($arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        $column = 'PS.SubjectIdx, PS.SiteCode, PS.SubjectName, PS.OrderNum, PS.IsUse, PS.RegDatm, PS.RegAdminIdx, S.SiteName';
        $column .= ' , (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = PS.RegAdminIdx) as RegAdminName';
        $arr_condition['EQ']['PS.IsStatus'] = 'Y';
        $arr_condition['EQ']['S.IsStatus'] = 'Y';
        $arr_condition['IN']['PS.SiteCode'] = get_auth_site_codes();

        return $this->_conn->getJoinListResult($this->_table['subject'] . ' as PS', 'inner', $this->_table['site'] . ' as S', 'PS.SiteCode = S.SiteCode'
            , $column, $arr_condition, $limit, $offset, $order_by
        );
    }

    /**
     * 과목 코드 목록 조회
     * @param string $site_code
     * @return array
     */
    public function getSubjectArray($site_code = '')
    {
        $arr_condition = ['EQ' => ['IsUse' => 'Y', 'IsStatus' => 'Y']];
        if (empty($site_code) === false) {
            $arr_condition['EQ']['SiteCode'] = $site_code;
        } else {
            $arr_condition['IN']['SiteCode'] = get_auth_site_codes();
        }

        $data = $this->_conn->getListResult($this->_table['subject'], 'SiteCode, SubjectIdx, SubjectName', $arr_condition, null, null, [
            'SiteCode' => 'asc', 'OrderNum' => 'asc'
        ]);

        return (empty($site_code) === false) ? array_pluck($data, 'SubjectName', 'SubjectIdx') : $data;
    }

    /**
     * 과목 수정 폼을 위한 데이터 조회
     * @param $subject_idx
     * @return array
     */
    public function findSubjectForModify($subject_idx)
    {
        $column = 'PS.SubjectIdx, PS.SiteCode, PS.SubjectName, PS.OrderNum, PS.Keyword, PS.IsUse, PS.RegDatm, PS.RegAdminIdx, PS.UpdDatm, PS.UpdAdminIdx';
        $column .= ' , (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = PS.RegAdminIdx) as RegAdminName';
        $column .= ' , if(PS.UpdAdminIdx is null, "", (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = PS.UpdAdminIdx)) as UpdAdminName';

        return $this->_conn->getFindResult($this->_table['subject'] . ' as PS', $column, [
            'EQ' => ['PS.SubjectIdx' => $subject_idx]
        ]);
    }

    /**
     * 사이트 코드별 과목 정렬순서 값 조회
     * @param $site_code
     * @return int
     */
    public function getSubjectOrderNum($site_code)
    {
        return $this->_conn->getFindResult($this->_table['subject'], 'ifnull(max(OrderNum), 0) + 1 as NextOrderNum', [
            'EQ' => ['SiteCode' => $site_code]
        ])['NextOrderNum'];
    }

    /**
     * 과목 등록
     * @param array $input
     * @return array|bool
     */
    public function addSubject($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $site_code = element('site_code', $input);
            $order_num = get_var(element('order_num', $input), $this->getSubjectOrderNum($site_code));
            $admin_idx = $this->session->userdata('admin_idx');

            $data = [
                'SiteCode' => $site_code,
                'SubjectName' => element('subject_name', $input),
                'OrderNum' => $order_num,
                'Keyword' => element('keyword', $input),
                'IsUse' => element('is_use', $input),
                'RegAdminIdx' => $admin_idx,
                'RegIp' => $this->input->ip_address()
            ];

            // 과목 등록
            if ($this->_conn->set($data)->insert($this->_table['subject']) === false) {
                throw new \Exception('데이터 저장에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 과목 수정
     * @param array $input
     * @return array|bool
     */
    public function modifySubject($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $subject_idx = element('idx', $input);

            // 기존 과목 정보 조회
            $row = $this->findSubjectForModify($subject_idx);
            if (count($row) < 1) {
                throw new \Exception('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            $site_code = $row['SiteCode'];
            $order_num = get_var(element('order_num', $input), $this->getSubjectOrderNum($site_code));
            $admin_idx = $this->session->userdata('admin_idx');

            $data = [
                'SubjectName' => element('subject_name', $input),
                'OrderNum' => $order_num,
                'Keyword' => element('keyword', $input),
                'IsUse' => element('is_use', $input),
                'UpdAdminIdx' => $admin_idx,
            ];

            // 과목 수정
            if ($this->_conn->set($data)->where('SubjectIdx', $subject_idx)->update($this->_table['subject']) === false) {
                throw new \Exception('과목 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 과목 정렬변경 수정
     * @param array $params
     * @return array|bool
     */
    public function modifySubjectsReorder($params = [])
    {
        $this->_conn->trans_begin();

        try {
            if (count($params) < 1) {
                throw new \Exception('필수 파라미터 오류입니다.');
            }

            foreach ($params as $subject_idx => $order_num) {
                $this->_conn->set('OrderNum', $order_num)->set('UpdAdminIdx', $this->session->userdata('admin_idx'))->where('SubjectIdx', $subject_idx);

                if ($this->_conn->update($this->_table['subject']) === false) {
                    throw new \Exception('데이터 수정에 실패했습니다.');
                }
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }
}
