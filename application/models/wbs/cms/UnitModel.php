<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UnitModel extends WB_Model
{

    protected $models = array('cms/lecture');

    private $_table = 'wbs_cms_lecture_unit';


    public function __construct()
    {
        parent::__construct('wbs');
    }

    /**
     * 회차 목록
     * @param $lecidx
     * @return mixed
     */
    public function listAllUnit($lecidx)
    {
        $column = 'A.*,B.wProfName,C.wAdminName,Ccd.wCcd, Ccd.wCcdName';

        $from = '
                    From '.$this->_table.' A 
                    left outer join wbs_pms_professor B on A.wProfIdx = B.wProfIdx And B.wIsStatus="Y"
                    left outer join wbs_sys_admin C on A.wRegAdminIdx = C.wAdminIdx And C.wIsStatus="Y"
                    left outer join wbs_sys_code Ccd on A.wContentSizeCcd = Ccd.wCcd
                    ';

        $where =  $this->_conn->makeWhere([
            'EQ'=>['A.wLecIdx'=>$lecidx,'A.wIsStatus'=>'Y']
        ])->getMakeWhere(false);

        $order_by = $this->_conn->makeOrderBy(['A.wOrderNum'=>'ASC'])->getMakeOrderBy();

        return $this->_conn->query('select ' .$column .$from .$where .$order_by) ->result_array();
    }

    /**
     * 회차 추가/수정/삭제 처리
     * @param array $input
     * @return array|bool
     */
    public function addUnit($input=[])
    {

        $this->_conn->trans_begin();

        try {

                $delwUnitIdx = element('delwUnitIdx', $input);  //삭제 식별자

                $lec_idx = element('LecIdx', $input);
                $seq = element('seq', $input);

                $wOrderNum = element('wOrderNum', $input);
                $wUnitIdx = element('wUnitIdx', $input);
                $wUnitNum = element('wUnitNum', $input);
                $wUnitLectureNum= element('wUnitLectureNum', $input);
                $wUnitName = element('wUnitName', $input);
                $wRuntime = element('wRuntime', $input);
                $wBookPage = element('wBookPage', $input);

                $wWD = element('wWD', $input);
                $wHD = element('wHD', $input);
                $wSD = element('wSD', $input);

                $wShootingDate = element('wShootingDate', $input);
                $wProfIdx = element('wProfIdx', $input);
                $wContentSizeCcd = element('wContentSizeCcd', $input);
                $wIsUse = element('wIsUse',$input);
                $wUnitInfo= element('wUnitInfo', $input);

                $this->load->library('upload');

                $row = $this->lectureModel->findLectureForModify($lec_idx);
                $upload_sub_dir = config_item('upload_prefix_dir').'/lecture/'.date("Y",strtotime($row['wRegDatm'])).'/'.$lec_idx;

                //첨부자료 등록 처리
                //$upload_result = $this->upload->uploadFile('file',['wUnitAttachFile'],'',$upload_sub_dir);
                $upload_result = $this->upload->uploadFile('file',['wUnitAttachFile'],$this->setAttachFileName(count($seq)),$upload_sub_dir,'overwrite:false');

                if(is_array($upload_result) === false) {
                    throw new \Exception($upload_result);
                }

                //회차 삭제
                if(empty($delwUnitIdx) !== true) {
                    //var_dump($delwUnitIdx);
                    $del_data = [
                        'wIsStatus'=>'N'
                        ,'wUpdAdminIdx'=>$this->session->userdata('admin_idx')
                    ];

                    $this->_conn-> set($del_data)->where_in('wUnitIdx',$delwUnitIdx);

                    if($this->_conn->update($this->_table)=== false) {
                        throw new \Exception('회차 삭제에 실패했습니다.');
                    }
                }

                for($i=0;$i<count($seq);$i++) {

                        if(empty($wHD[$i])) {
                            $wHD_Chg = str_replace("_1.mp4", "_2.mp4",$wWD[$i]);
                        } else {
                            $wHD_Chg =  $wHD[$i];
                        }

                        if(empty($wSD[$i])) {
                            $wSD_Chg = str_replace("_1.mp4", "_3.mp4",$wWD[$i]);
                        } else {
                            $wSD_Chg =  $wSD[$i];
                        }

                        // 기본항목
                        $input_data = [
                            'wUnitNum' => $wUnitNum[$i]
                            ,'wUnitLectureNum' => $wUnitLectureNum[$i]
                            ,'wUnitName' => $wUnitName[$i]
                            ,'wRuntime' => $wRuntime[$i]
                            ,'wBookPage' => $wBookPage[$i]

                            ,'wWD' => $wWD[$i]
                            ,'wHD' => $wHD_Chg
                            ,'wSD' => $wSD_Chg

                            ,'wShootingDate' => $wShootingDate[$i]
                            ,'wProfIdx' => $wProfIdx[$i]
                            ,'wContentTypeCcd' => '106001'                            //강의유형 : 임의로 고정
                            ,'wContentSizeCcd' => $wContentSizeCcd[$i]          //컨텐트사이즈
                            ,'wIsUse' => $wIsUse[$i]
                            ,'wUnitInfo' => $wUnitInfo[$i]
                            ,'wOrderNum' => $wOrderNum[$i]
                        ];

                        //기존 회차식별자가 존재하면 업데이트 처리
                        if(empty($wUnitIdx[$i]) !== true) {

                                // 백업 데이터 등록
                                $this->addBakData($this->_table, ['wUnitIdx' => $wUnitIdx[$i]]);

                                /**
                                첨부파일 존재시 처리
                                 */
                                if(count($upload_result) > 0) {
                                    if(empty($upload_result[$i]) !== true) {
                                        $input_data = array_merge($input_data, [
                                            'wUnitAttachFileReal' => $upload_result[$i]['client_name']
                                           ,'wUnitAttachFile' => $upload_result[$i]['file_name']
                                        ]);
                                    }
                                }

                                $input_data = array_merge($input_data,[
                                    'wUpdAdminIdx'=>$this->session->userdata('admin_idx')
                                ]);

                                $this->_conn->set($input_data)->where('wUnitIdx',$wUnitIdx[$i]);
                                if($this->_conn->update($this->_table)===false) {
                                    throw new \Exception('데이터 수정에 실패했습니다.');
                                }

                        } else {

                                $input_data = array_merge($input_data,[
                                    'wLecIdx'=> $lec_idx
                                    ,'wRegAdminIdx'=> $this->session->userdata('admin_idx')
                                    ,'wRegIp' => $_SERVER['REMOTE_ADDR']
                                ]);

                                /**
                                첨부파일 존재시 처리
                                 */
                                if(count($upload_result) > 0) {
                                    if(empty($upload_result[$i]) !== true) {
                                        $input_data = array_merge($input_data, [
                                            'wUnitAttachFileReal' => $upload_result[$i]['client_name']
                                            ,'wUnitAttachFile' => $upload_result[$i]['file_name']
                                        ]);
                                    }
                                }

                                //$this->_conn->set($input_data)->set('wOrderNum','fn_lecture_unit_maxnumber('.$lec_idx.')',false);
                                $this->_conn->insert($this->_table,$input_data);
                        }

                }
            
                $this->_conn->trans_commit();

        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        //return false;
        return true;
    }

    /**
     * 회차 등록 파일 삭제
     * @param array $input
     * @return bool
     */
    public function deleteFileUnit($input=[])
    {
        $lec_idx = element('LecIdx', $input);
        $unit_idx = element('wUnitIdx', $input);

        $row = $this->findUnitForModify($lec_idx,$unit_idx);

        $this->load->library('upload');

        $attach_info = $row['wAttachPath'].$row['wUnitAttachFile'];

        if(empty($row['wUnitAttachFile']) === false) {  //기존 파일이 존재할경우. 백업폴더로 이동
            if($this->upload->bakUploadedFile($attach_info, true) !== true) {// 파익 백업 이동
                return false;
            }
        }
        // 백업 데이터 등록
        $this->addBakData($this->_table, ['wUnitIdx' => $unit_idx]);

        $data['wUnitAttachFileReal'] = NULL;
        $data['wUnitAttachFile'] = NULL;
        $data['wUpdAdminIdx'] = $this->session->userdata('admin_idx');
        //Db 업데이트
        if ($this->_conn->set($data)->where('wUnitIdx', $unit_idx)->update($this->_table) === false) {
            return false;
        }

        /*
        $attach_info_real = public_to_upload_path($row['wAttachPath']).'/' .$row['wUnitAttachFile'];        //파일 실 디렉토리
        if(empty($attach_info) === false) {
            //echo var_dump($attach_info);
            if(is_file($attach_info_real)) {
                if (unlink($attach_info_real) === false) {
                    return false;       //파일 삭제 실패
                } else {

                    // 백업 데이터 등록
                    $this->addBakData($this->_table, ['wUnitIdx' => $unit_idx]);

                    $data['wUnitAttachFile'] = '';
                    $data['wUpdAdminIdx'] = $this->session->userdata('admin_idx');
                    //Db 업데이트
                    if ($this->_conn->set($data)->where('wUnitIdx', $unit_idx)->update($this->_table) === false) {
                        return false;
                    }
                }
            } else {
                //echo '실제없어';
                return false;       //실제파일 없음
            }
        }
        */
        return true;
    }


    /**
     * 회차 첨부파일 삭제를 위한 정보 추출
     * @param $lecidx
     * @param $unitidx
     * @return mixed
     */
    public function findUnitForModify($lecidx,$unitidx)
    {
        $column = 'A.wAttachPath,B.wUnitAttachFile';
        $from = ' From wbs_cms_lecture A JOIN '.$this->_table.' B ON A.wLecIdx = B.wLecIdx ';
        $where = $this->_conn->makeWhere([
            'EQ'=>['A.wLecIdx'=>$lecidx,'A.wIsStatus'=>'Y','B.wUnitIdx'=>$unitidx,'B.wIsStatus'=>'Y']
        ]);
        $where = $where->getMakeWhere(false);

        return $this->_conn->query('select ' .$column .$from .$where)->row_array();
    }

    /**
     * 회차 첨부파일명 생성
     * @param $attach_cnt
     * @return array
     */
    public function setAttachFileName($attach_cnt)
    {
        $file_name = [];
        $temp_name = 'unit_'.date("YmdHis");

        for($i = 0; $i < $attach_cnt; $i++) {
            $file_name[] = $temp_name.'_'.$i;
        }
        return $file_name;
    }


    public function getUnit($unitidx)
    {
        $column = 'A.*,B.wProfName,C.wAdminName,Ccd.*';

        $from = '
                    From '.$this->_table.' A 
                    left outer join wbs_pms_professor B on A.wProfIdx = B.wProfIdx And B.wIsStatus="Y"
                    left outer join wbs_sys_admin C on A.wRegAdminIdx = C.wAdminIdx And C.wIsStatus="Y"
                    left outer join wbs_sys_code Ccd on A.wContentSizeCcd = Ccd.wCcd
                    ';

        $where =  $this->_conn->makeWhere([
            'EQ'=>['A.wUnitIdx'=>$unitidx,'A.wIsStatus'=>'Y']
        ])->getMakeWhere(false);

        $order_by = $this->_conn->makeOrderBy(['A.wOrderNum'=>'ASC'])->getMakeOrderBy();

        return $this->_conn->query('select ' .$column .$from .$where .$order_by) ->result_array();
    }

}







