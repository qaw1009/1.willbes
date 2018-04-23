<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminSettingsModel extends WB_Model
{
    private $_table = 'lms_sys_admin_settings';

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 환경설정 정보 목록 조회
     * @param array $arr_condition
     * @return array
     */
    public function listSettings($arr_condition = [])
    {
        $column = 'SettingType, SettingValue';
        $arr_condition['EQ']['IsStatus'] = 'Y';

        return $this->_conn->getListResult($this->_table, $column, $arr_condition, null, null, ['SettingIdx' => 'asc']);
    }

    /**
     * 환경설정 정보 등록
     * @param array $input
     * @return array|bool
     */
    public function addSettings($input = [])
    {
        $this->_conn->trans_begin();

        try {
            foreach ($input as $type => $value) {
                if ($type != '_method') {
                    $data = [
                        'wAdminIdx' => $this->session->userdata('admin_idx'),
                        'SettingType' => $type,
                        'SettingValue' => $value
                    ];

                    if ($this->_conn->set($data)->insert($this->_table) === false) {
                        throw new \Exception('데이터 저장에 실패했습니다.');
                    }
                }
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 환경설정 정보 수정
     * @param array $input
     * @return array|bool
     */
    public function modifySettings($input = [])
    {
        $this->_conn->trans_begin();

        try {
            foreach ($input as $type => $value) {
                if ($type != '_method') {
                    $this->_conn->set('SettingValue', $value)->where([
                        'wAdminIdx' => $this->session->userdata('admin_idx'),
                        'SettingType' => $type
                    ]);

                    if ($this->_conn->update($this->_table) === false) {
                        throw new \Exception('데이터 수정에 실패했습니다.');
                    }
                }
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 즐겨찾기 추가/삭제
     * @param $menu_idx
     * @return array|bool
     */
    public function replaceFavorite($menu_idx)
    {
        $this->_conn->trans_begin();

        try {
            $admin_idx = $this->session->userdata('admin_idx');
            $data = $this->_conn->getFindResult($this->_table, 'SettingIdx', [
                'EQ' => [
                    'wAdminIdx' => $admin_idx, 'SettingType' => 'favorite', 'SettingValue' => $menu_idx, 'IsStatus' => 'Y'
                ]
            ]);

            if (count($data) > 0) {
                // 기 설정된 데이터 삭제 처리
                $is_excute = $this->_conn->set('IsStatus', 'N')->where('SettingIdx', $data['SettingIdx'])->update($this->_table);
            } else {
                // 데이터 추가
                $is_excute = $this->_conn->set([
                    'wAdminIdx' => $admin_idx, 'SettingType' => 'favorite', 'SettingValue' => $menu_idx
                ])->insert($this->_table);
            }

            if ($is_excute === false) {
                throw new \Exception('데이터 처리에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 검색 값 기본 셋팅
     * @param array $input
     * @return array|bool
     */
    public function storeSearchSetting($input = [])
    {
        $this->_conn->trans_begin();

        $bm_idx = element('setting_bm_idx', $input);
        unset($input['setting_bm_idx']);

        try {
            $admin_idx = $this->session->userdata('admin_idx');
            $data = $this->_conn->getFindResult($this->_table, 'SettingIdx', [
                'EQ' => [
                    'wAdminIdx' => $admin_idx, 'SettingType' => 'searchSetting_'.$bm_idx, 'IsStatus' => 'Y'
                ]
            ]);

            $set_data = [];
            $enc_set_data = '';
            foreach ($input as $key => $val){
                if (empty($val) === false) {
                    $set_data = array_merge($set_data, [$key => $val]);
                }
            }

            if (count($set_data) > 0) {
                $enc_set_data = json_encode($set_data);
            }

            if (count($data) > 0) {
                // update
                $is_excute = $this->_conn->set('SettingValue', $enc_set_data)->where('SettingIdx', $data['SettingIdx'])->update($this->_table);
            } else {
                // 데이터 추가
                $is_excute = $this->_conn->set([
                    'wAdminIdx' => $admin_idx, 'SettingType' => 'searchSetting_'.$bm_idx, 'SettingValue' => $enc_set_data
                ])->insert($this->_table);
            }

            if ($is_excute === false) {
                throw new \Exception('데이터 처리에 실패했습니다.');
            }

            $this->_conn->trans_commit();

        } catch (\Exception $e) {
                $this->_conn->trans_rollback();
                return error_result($e);
        }

        return true;
    }
}