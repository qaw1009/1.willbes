<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PatternModel extends WB_Model
{
    private $_table = 'lms_product_pattern';

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 학습형태 목록 조회
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return array|int
     */
    public function listPattern($arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        $colum = 'PP.PatternIdx, PP.SiteCode, PP.PatternName, PP.OrderNum, PP.IsUse, PP.RegDatm, PP.RegAdminIdx, S.SiteName';
        $colum .= ' , (select wAdminName from wbs_sys_admin where wAdminIdx = PP.RegAdminIdx) as RegAdminName';
        $arr_condition['EQ']['PP.IsStatus'] = 'Y';
        $arr_condition['EQ']['S.IsUse'] = 'Y';
        $arr_condition['EQ']['S.IsStatus'] = 'Y';
        $arr_condition['IN']['PP.SiteCode'] = get_auth_site_codes();

        return $this->_conn->getJoinListResult($this->_table . ' as PP', 'inner', 'lms_site as S', 'PP.SiteCode = S.SiteCode'
            , $colum, $arr_condition, $limit, $offset, $order_by
        );
    }

    /**
     * 학습형태 수정 폼을 위한 데이터 조회
     * @param $pattern_idx
     * @return array
     */
    public function findPatternForModify($pattern_idx)
    {
        $colum = 'PP.PatternIdx, PP.SiteCode, PP.PatternName, PP.OrderNum, PP.Keyword, PP.Desc, PP.IsUse, PP.RegDatm, PP.RegAdminIdx, PP.UpdDatm, PP.UpdAdminIdx';
        $colum .= ' , (select wAdminName from wbs_sys_admin where wAdminIdx = PP.RegAdminIdx) as RegAdminName';
        $colum .= ' , if(PP.UpdAdminIdx is null, "", (select wAdminName from wbs_sys_admin where wAdminIdx = PP.UpdAdminIdx)) as UpdAdminName';

        return $this->_conn->getFindResult($this->_table . ' as PP', $colum, [
            'EQ' => ['PP.PatternIdx' => $pattern_idx]
        ]);
    }

    /**
     * 사이트 코드별 학습형태 정렬순서 값 조회
     * @param $site_code
     * @return int
     */
    public function getPatternOrderNum($site_code)
    {
        return $this->_conn->getFindResult($this->_table, 'ifnull(max(OrderNum), 0) + 1 as NextOrderNum', [
            'EQ' => ['SiteCode' => $site_code]
        ])['NextOrderNum'];
    }

    /**
     * 학습형태 등록
     * @param array $input
     * @return array|bool
     */
    public function addPattern($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $site_code = element('site_code', $input);
            $order_num = get_var(element('order_num', $input), $this->getPatternOrderNum($site_code));
            $admin_idx = $this->session->userdata('admin_idx');

            $data = [
                'SiteCode' => $site_code,
                'PatternName' => element('pattern_name', $input),
                'OrderNum' => $order_num,
                'Keyword' => element('keyword', $input),
                'Desc' => element('desc', $input),
                'IsUse' => element('is_use', $input),
                'RegAdminIdx' => $admin_idx,
                'RegIp' => $this->input->ip_address()
            ];

            // 학습형태 등록
            if ($this->_conn->set($data)->insert($this->_table) === false) {
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
     * 학습형태 수정
     * @param array $input
     * @return array|bool
     */
    public function modifyPattern($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $pattern_idx = element('idx', $input);

            // 기존 학습형태 정보 조회
            $row = $this->findPatternForModify($pattern_idx);
            if (count($row) < 1) {
                throw new \Exception('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            $site_code = $row['SiteCode'];
            $order_num = get_var(element('order_num', $input), $this->getPatternOrderNum($site_code));
            $admin_idx = $this->session->userdata('admin_idx');

            $data = [
                'PatternName' => element('pattern_name', $input),
                'OrderNum' => $order_num,
                'Keyword' => element('keyword', $input),
                'Desc' => element('desc', $input),
                'IsUse' => element('is_use', $input),
                'UpdAdminIdx' => $admin_idx,
            ];

            // 학습형태 수정
            if ($this->_conn->set($data)->where('PatternIdx', $pattern_idx)->update($this->_table) === false) {
                throw new \Exception('학습형태 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 학습형태 정렬변경 수정
     * @param array $params
     * @return array|bool
     */
    public function modifyPatternReorder($params = [])
    {
        $this->_conn->trans_begin();

        try {
            if (count($params) < 1) {
                throw new \Exception('필수 파라미터 오류입니다.');
            }

            foreach ($params as $pattern_idx => $order_num) {
                $this->_conn->set('OrderNum', $order_num)->where('PatternIdx', $pattern_idx);

                if ($this->_conn->update($this->_table) === false) {
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
