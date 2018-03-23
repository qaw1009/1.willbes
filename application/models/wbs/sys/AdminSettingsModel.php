<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminSettingsModel extends WB_Model
{
    private $_table = 'wbs_sys_admin_settings';

    public function __construct()
    {
        parent::__construct('wbs');
    }

    /**
     * 환경설정 정보 목록 조회
     * @param array $arr_condition
     * @return array
     */
    public function listSettings($arr_condition = [])
    {
        $colum = 'wSettingType, wSettingValue';
        $arr_condition['EQ']['wIsStatus'] = 'Y';

        return $this->_conn->getListResult($this->_table, $colum, $arr_condition, null, null, ['wSettingIdx' => 'asc']);
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
                        'wSettingType' => $type,
                        'wSettingValue' => $value
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
                    $this->_conn->set('wSettingValue', $value)->where([
                        'wAdminIdx' => $this->session->userdata('admin_idx'),
                        'wSettingType' => $type
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
            $data = $this->_conn->getFindResult($this->_table, 'wSettingIdx', [
                'EQ' => [
                    'wAdminIdx' => $admin_idx, 'wSettingType' => 'favorite', 'wSettingValue' => $menu_idx, 'wIsStatus' => 'Y'
                ]
            ]);

            if (count($data) > 0) {
                // 기 설정된 데이터 삭제 처리
                $is_excute = $this->_conn->set('wIsStatus', 'N')->where('wSettingIdx', $data['wSettingIdx'])->update($this->_table);
            } else {
                // 데이터 추가
                $is_excute = $this->_conn->set([
                    'wAdminIdx' => $admin_idx, 'wSettingType' => 'favorite', 'wSettingValue' => $menu_idx
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