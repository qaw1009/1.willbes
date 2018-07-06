<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventLectureModel extends WB_Model
{
    private $_table = [
        'event_lecture' => 'lms_event_lecture',
        'event_lecture_r_category' => 'lms_event_r_category',
        'event_register' => 'lms_event_register',
        'event_file' => 'lms_event_file',
        'event_commnet' => 'lms_event_commnet',
        'event_member' => 'lms_event_member',
        'sys_category' => 'lms_sys_category',
        'site' => 'lms_site',
        'sys_code' => 'lms_sys_code',
        'admin' => 'wbs_sys_admin',
    ];

    public $_groupCcd = [
        'option' => '660'
    ];

    // 정원제한, 댓글기능, 자동문자, 바로신청팝업
    public $_event_lecture_option_ccds = [
        '0' => '660001',
        '1' => '660002',
        '2' => '660003',
        '3' => '660004'
    ];

    // 내용등록/수정 이미지 타입 설정
    public $_set_attache_type = [
        '0' => 'C',
        '1' => 'F',
        '2' => 'S',
        '3' => 'I'
    ];

    // 댓글 이미지 등록 수
    public $_set_attach_comment_img_cnt = 2;

    // 원본 이미지 후첨자
    public $_img_postfix = '_og';
    // 썸네일 이미지 후첨자
    public $_thumb_postfixs = [
        'S' => '_sm',
        /*'M' => '_md',
        'L' => '_lg'*/
    ];
    // 썸네일 이미지 생성 비율
    private $_thumb_radio = [
        'S' => '50%',
        /*'M' => '150%',
        'L' => '200%'*/
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 이벤트/설명회/특강관리 등록
     * @param array $input
     * @return array|bool
     */
    public function addEventLecture($input = [])
    {
        $this->_conn->trans_begin();
        try {
            $admin_idx = $this->session->userdata('admin_idx');
            $option_ccds = element('option_ccds', $input);
            $comment_use_area = element('comment_use_area', $input);

            $set_option_ccd = implode(',', $option_ccds);
            $set_comment_use_area = '';
            if (empty($comment_use_area) === false) {
                $set_comment_use_area = implode(',', $comment_use_area);
            }

            $data = [
                'SiteCode' => element('site_code', $input),
                'CampusIdx' => element('campus_ccd', $input),
                'RegisterStartDate' => element('register_start_date', $input),
                'RegisterEndDate' => element('register_end_date', $input),
                'RequstType' => element('requst_type', $input),
                'TakeType' => element('take_type', $input),
                'IsRegister' => element('is_register', $input),
                'IsUse' => element('is_use', $input),
                'EventName' => element('event_name', $input),
                'EventStartDate' => (empty(element('event_start_datm', $input))) ? '0000-00-00' : element('event_start_datm', $input),
                'EventStartHour' => element('event_start_hour', $input),
                'EventStartMin' => element('event_start_min', $input),
                'EventEndDate' => (empty(element('event_end_datm', $input))) ? '0000-00-00' : element('event_end_datm', $input),
                'EventEndHour' => element('event_end_hour', $input),
                'EventEndMin' => element('event_end_min', $input),
                'EventNum' => (empty(element('event_num', $input))) ? '0' : element('event_num', $input),
                'ContentType' => element('content_type', $input),
                'Content' => element('content', $input),
                'OptionCcds' => $set_option_ccd,
                'LimitType' => element('limit_type', $input),
                'SelectType' => element('select_type', $input),
                'SendTel' => element('send_tel', $input),
                'SmsContent' => element('sms_content', $input),
                'PopupTitle' => element('popup_title', $input),
                'CommentUseArea' => $set_comment_use_area,
                'Link' => element('promotion_link', $input),
                'ReadCnt' => (empty(element('read_count', $input))) ? '0' : element('read_count', $input),
                'AdjuReadCnt' => (empty(element('setting_readCnt', $input))) ? '0' : element('setting_readCnt', $input),
                'RegAdminIdx' => $admin_idx,
                'RegIp' => $this->input->ip_address()
            ];

            //등록
            if ($this->_conn->set($data)->insert($this->_table['event_lecture']) === false) {
                throw new \Exception('이벤트 등록에 실패했습니다.');
            }
            $el_idx = $this->_conn->insert_id();

            //카테고리 저장
            $category_code = element('cate_code', $input);
            foreach ($category_code as $key => $val) {
                $category_data['ElIdx'] = $el_idx;
                $category_data['CateCode'] = $val;
                $category_data['RegAdminIdx'] = $this->session->userdata('admin_idx');
                $category_data['RegIp'] = $this->input->ip_address();
                if ($this->_addEventCategory($category_data) === false) {
                    throw new \Exception('카테고리 등록에 실패했습니다.');
                }
            }

            //정원제한(접수정보저장) 저장
            if ($this->_addEventRegister($el_idx, $input) === false) {
                throw new \Exception('이벤트 정원제한 등록에 실패했습니다.');
            }

            //파일저장
            if ($this->_addContentAttach($el_idx, count($this->_set_attache_type)) === false) {
                throw new \Exception('이벤트 파일 등록에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * @param $el_idx
     * @param $cnt
     * @return bool
     */
    private function _addContentAttach($el_idx, $cnt)
    {
        try {
            $this->load->library('upload');
            $this->load->library('image_lib');

            $upload_dir = SUB_DOMAIN . '/event/' . date('Ymd');
            $uploaded = $this->upload->uploadFile('file', ['attach_file'], $this->_getAttachImgNames($cnt), $upload_dir);
            if (is_array($uploaded) === false) {
                throw new \Exception($uploaded);
            }

            foreach ($uploaded as $idx => $attach_files) {
                if (count($attach_files) > 0) {
                    if ($this->_set_attache_type[$idx] == 'S' || $this->_set_attache_type[$idx] == 'I') {
                        // 썸네일 생성
                        $new_imgs = $this->image_lib->getThumbImgNames($attach_files['orig_name'], $this->_thumb_postfixs);
                        $is_thumb = $this->image_lib->createThumbImgs($attach_files['full_path'], $new_imgs, array_values($this->_thumb_radio));
                        if ($is_thumb === false) {
                            throw new \Exception($is_thumb);
                        }
                    }

                    $set_attach_data['ElIdx'] = $el_idx;
                    $set_attach_data['FileName'] = $attach_files['orig_name'];
                    $set_attach_data['FileFullPath'] = $this->upload->_upload_url . $upload_dir . '/';
                    $set_attach_data['FileRealName'] = $attach_files['client_name'];
                    $set_attach_data['FileType'] = $this->_set_attache_type[$idx];

                    $set_attach_data['RegAdminIdx'] = $this->session->userdata('admin_idx');
                    $set_attach_data['RegIp'] = $this->input->ip_address();

                    if ($this->_addEventAttach($set_attach_data) === false) {
                        throw new \Exception('fail');
                    }
                }
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 파일 등록
     * @param $inputData
     * @return bool
     */
    private function _addEventAttach($inputData)
    {
        try {
            if ($this->_conn->set($inputData)->insert($this->_table['event_file']) === false) {
                throw new \Exception('fail');
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 카테고리 등록
     * @param $input
     * @return bool
     */
    private function _addEventCategory($input)
    {
        try {
            if ($this->_conn->set($input)->insert($this->_table['event_lecture_r_category']) === false) {
                throw new \Exception('게시판 등록에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 정원제한 저장
     * @param $el_idx
     * @param $input
     * @return bool
     */
    private function _addEventRegister($el_idx, $input)
    {
        $limit_type = element('limit_type', $input);
        try {
            if ($limit_type == 'S') {
                $reg_set_data = [
                    'ElIdx' => $el_idx,
                    'PersonLimitType' => element('person_limit_type', $input),
                    'PersonLimit' => element('person_limit', $input),
                    'RegAdminIdx' => $this->session->userdata('admin_idx'),
                    'RegIp' => $this->input->ip_address()
                ];

                if ($this->_conn->set($reg_set_data)->insert($this->_table['event_register']) === false) {
                    throw new \Exception('fail');
                }
            } else if ($limit_type == 'M') {
                $event_register_parson_limit_type = element('event_register_parson_limit_type', $input);
                $event_register_parson_limit = element('event_register_parson_limit', $input);
                $event_register_name = element('event_register_name', $input);
                foreach ($event_register_parson_limit_type as $key => $val) {
                    $reg_set_data = [
                        'ElIdx' => $el_idx,
                        'PersonLimitType' => $val,
                        'PersonLimit' => $event_register_parson_limit[$key],
                        'Name' => $event_register_name[$key],
                        'RegAdminIdx' => $this->session->userdata('admin_idx'),
                        'RegIp' => $this->input->ip_address()
                    ];

                    if ($this->_conn->set($reg_set_data)->insert($this->_table['event_register']) === false) {
                        throw new \Exception('fail');
                    }
                }
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 파일명 배열 생성
     * @param $cnt
     * @return array
     */
    private function _getAttachImgNames($cnt)
    {
        $attach_file_names = [];
        $temp_time = date('YmdHis');
        $postfix = '';
        for ($i = 0; $i < $cnt; $i++) {
            if (empty($this->_set_attache_type[$i]) === false) {
                if ($this->_set_attache_type[$i] == 'S' || $this->_set_attache_type[$i] == 'I') {
                    $postfix = $this->_img_postfix;
                }
            }

            $attach_file_names[] = 'event_' . $i . '_' . $temp_time . $postfix;
        }
        return $attach_file_names;
    }
}