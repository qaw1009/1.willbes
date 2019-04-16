<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LectureModel extends WB_Model
{

	private $_table = 'wbs_cms_lecture';

	public function __construct()
	{
		parent::__construct('wbs');
	}

    /**
     * 마스터강의 리스트
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listLecture($is_count ,$arr_condition=[] ,$limit=null ,$offset=null ,$order_by=[])
    {
        if ($is_count === true) {
            $column = ' count(*) as numrows';
            $order_by_offset_limit = '';
        } else {
            $column = 'A.wLecIdx,A.wLecName,A.wMakeYM,A.wAttachFile,A.wAttachPath,A.wRegDatm,A.wIsUse,A.wScheduleCount
                            ,B.wCpName
                            ,C.wCcdName as wContentCcd_Name
                            ,D.wCcdName as wShootingCcd_Name
                            ,E.wCcdName as wProgressCcd_Name
                            ,F.wAdminName As wRegAdminName
                            ,(select Count(*) from wbs_cms_lecture_unit where wLecIdx=A.wlecIdx and wIsStatus=\'Y\') as wUnitCnt
                            ,H.profName_string,H.profIdx_string 
                            ,IFNULL(Y.wLecIdx_Original,\'\') as wLecIdx_Original
                            ';

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
                    from
                        wbs_cms_lecture A
                        left outer join wbs_sys_cp B on A.wCpIdx = B.wCpIdx and B.wIsStatus="Y"
                        join wbs_sys_code C on A.wContentCcd = C.wCcd and C.wIsStatus="Y"
                        join wbs_sys_code D on A.wShootingCcd = D.wCcd and D.wIsStatus="Y"
                        join wbs_sys_code E on A.wProgressCcd = E.wCcd and E.wIsStatus="Y"
                        left outer join wbs_sys_admin F on A.wRegAdminIdx = F.wAdminIdx and F.wIsStatus="Y"
                        join wbs.vw_role_cp_list G on A.wCpIdx=G.wCpIdx 
                        left outer join wbs_cms_lecture_copy_log Y on A.wLecIdx = Y.wLecIdx
                        join vw_lecture_r_professor_concat H on A.wLecIdx = H.wLecIdx 
                    where A.wIsStatus="Y"
                    ';
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);
        $query = $this->_conn->query('select ' .$column .$from .$where. $order_by_offset_limit);

        return ($is_count===true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 마스터 강의 수정을 위한 정보 추출
     * @param $lecidx
     * @return mixed
     */
    public function findLectureForModify($lecidx)
    {
        $column = 'A.*, B.wAdminName, C.wAdminName As wUpdAdminName, D.wAdminName As wMemoAdminName';

        $from = ' From '.$this->_table.' A 
                        LEFT OUTER JOIN wbs_sys_admin B ON A.wRegAdminIdx = B.wAdminIdx And B.wIsStatus="Y"
                        LEFT OUTER JOIN wbs_sys_admin C ON A.wUpdAdminIdx = C.wAdminIdx And C.wIsStatus="Y"
                        LEFT OUTER JOIN wbs_sys_admin D ON A.wMemoRegAdminIdx = D.wAdminIdx And D.wIsStatus="Y"
                    ';
        $where = $this->_conn->makeWhere([
            'EQ'=>['A.wLecIdx'=>$lecidx,'A.wIsStatus'=>'Y']
        ]);
        $where = $where->getMakeWhere(false);

        return $this->_conn->query('select ' .$column .$from .$where)->row_array();
    }

    /**
     * 마스터 강의 수정을 위한 연결 교수 정보 추출
     * @param $lecidx
     * @return array|int
     */
    public function findLectureProfessorForModify($lecidx)
    {
        return $this->_conn->getListResult('wbs_cms_lecture_r_professor', 'wProfIdx, wOrderNum', [
            'EQ' => ['wLecIdx'=>$lecidx, 'wIsStatus' => 'Y']
        ], null, null, [
            'wOrderNum' => 'asc'
        ]);
    }

    /**
     * 회차등록을 위한 마스터강의 기본 정보 추출
     * @param $lecidx
     * @return mixed
     */
    public function findLectureForUnit($lecidx)
    {
        $column = ' A.wLecName,A.wLecName,A.wAttachPath,B.wCcdName as wContentCcdName,D.wCpName,E.profName_string';
        $from = ' From '.$this->_table.' A 
	                    join wbs_sys_code B on A.wContentCcd = B.wCcd
                        join wbs_sys_cp D on A.wCpIdx = D.wCpIdx and D.wIsStatus="Y"
                        left outer join vw_lecture_r_professor_concat E on A.wLecIdx = E.wLecIdx';
        $where =$this->_conn->makeWhere([
            'EQ'=>['A.wLecIdx'=>$lecidx,'A.wIsStatus'=>'Y']
        ]);
        $where = $where->getMakeWhere(false);

        return $this->_conn->query('select ' .$column .$from .$where)->row_array();
    }

    /**
     * 마스터 강의 등록
     * @param array $input
     * @return array|bool
     */
	public function addLecture($input=[])
	{

		$this->_conn->trans_begin();

		try{

		    $data = $this->inputCommon($input);
		    $data = array_merge($data,[
		        'wRegAdminIdx'=>$this->session->userdata('admin_idx')
                ,'wRegIp' => $_SERVER['REMOTE_ADDR']
            ]);

		    //memo 정보가 존재할 경우
		    if(empty(element('Memo',$input)) === false) {
                $data = array_merge($data,[
                    'wMemo' => element('Memo',$input)
                    ,'wMemoRegAdminIdx'=>$this->session->userdata('admin_idx')
                ]);
                $this->_conn->set($data)->set('wMemoRegDatm', 'NOW()', false);
            }

		    if($this->_conn->insert($this->_table,$data) === false) {
		        throw new \Exception('마스터강의 등록에 실패했습니다.');
            }

            // 등록된 마스터강의 식별자
            $lec_idx = $this->_conn->insert_id();

		    // 강의별  교수 등록
            if($this->setLectureProfessor(element('ProfIdx',$input),$lec_idx) !== true) {
                throw new \Exception('교수 등록에 실패했습니다. 마스터강의 수정을 통해 교수등록을 다시 진행하여 주십시오');
            }

            //년도 삽입 새로운 경로로 수정
            $filePath = config_item('upload_prefix_dir').'/lecture/'.date("Y").'/'.$lec_idx;

            // 첨부파일 등록
            if($this->setUpload(element('attach_delete',$input),$lec_idx,$filePath) !== true) {
                throw new \Exception('첨부파일 등록에 실패했습니다.');
            }

            $this->_conn->trans_commit();

		} catch(\Exception $e) {
			$this->_conn->trans_rollback();
			return error_result($e);
		}
		//return true;
        return ['ret_cd' => true, 'ret_data' => $lec_idx];
	}

    /**
     * 마스터 강의 수정
     * @param array $input
     * @return array|bool
     */
	public function modifyLecture($input=[])
    {
        $this->_conn->trans_begin();

        try{

            $lec_idx = element('LecIdx',$input);
            $data = $this->inputCommon($input);

            // 백업 데이터 등록
            $this->addBakData($this->_table, ['wLecIdx' => $lec_idx]);

            if(empty(element('Memo',$input)) === false) {
                $data = array_merge($data,[
                    'wMemo' => element('Memo',$input)
                    ,'wMemoRegAdminIdx'=>$this->session->userdata('admin_idx')
                ]);
                $this->_conn->set($data)->set('wMemoRegDatm', 'NOW()', false);
            }

            $data = array_merge($data,[
                'wUpdAdminIdx'=>$this->session->userdata('admin_idx')
            ]);
            $this->_conn->set($data)->set('wUpdDatm', 'NOW()', false);
            $this->_conn->set($data)->where('wLecIdx',$lec_idx);
            if($this->_conn->update($this->_table) === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

            // 강의별  교수 등록
            if($this->setLectureProfessor(element('ProfIdx',$input),$lec_idx) !== true) {
                throw new \Exception('교수 등록에 실패했습니다. 마스터강의 수정을 통해 교수등록을 다시 진행하여 주십시오');
            }

            //첨부파일 경로 생성을 위한 등록일 : 인풋에서 히든으로 전송
            $regdateyear = element('regdateyear', $input);

            $filePath = config_item('upload_prefix_dir').'/lecture/'.$regdateyear.'/'.$lec_idx;

            // 첨부파일 등록
            if($this->setUpload(element('attach_delete',$input),$lec_idx,$filePath) !== true) {
                throw new \Exception('첨부파일 등록에 실패했습니다.');
            }

            $this->_conn->trans_commit();

        } catch(\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return ['ret_cd' => true, 'ret_data' => $lec_idx];
    }


    /**
     * 마스터강의별 교수 등록 - 기 등록은 사용안함으로 업데이트 후 신규 데이터를 입력하는 방식
     * @param array $arr_prof_idx
     * @param $lec_idx
     * @return bool
     */
	public function setLectureProfessor($arr_prof_idx=[], $lec_idx)
    {
        $_r_table= 'wbs_cms_lecture_r_professor';

        $arr_prof_idx = (is_null($arr_prof_idx) === true) ? [] :array_values(array_unique($arr_prof_idx));
        $admin_idx=$this->session->userdata('admin_idx');

        //기존 교수 설정 모두 사용안함으로 변경
        $del_data = [
            'wIsStatus'=>'N'
            ,'wUpdAdminIdx'=>$admin_idx
        ];
        $this->_conn->set($del_data)->set('wUpdDatm','NOW()',false)->where('wLecIdx',$lec_idx)->where('wIsStatus','Y');
        if($this->_conn->update($_r_table) === false) {
            //throw new \Exception('교수 연결 삭제 처리에 실패했습니다.');
            return false;
        }

        //새로운 관계 설정 등록
        $order_num = 1;
        foreach ($arr_prof_idx as $prof_idx) {
            if(empty($prof_idx) === false) {
                $ins_data = [
                    'wLecIdx' => $lec_idx
                    , 'wProfIdx' => $prof_idx
                    , 'wOrderNum' => $order_num
                    , 'wRegAdminIdx' => $admin_idx
                ];
                if ($this->_conn->set($ins_data)->insert($_r_table) === false) {
                    //throw new \Exception('신규 교수 연결 등록에 실패했습니다.');
                    return false;
                }
                $order_num++;
            }
        }
        return true;
    }


    /**
     * 첨부파일 처리 프로세스 (업로드 및 DB 업데이트 처리)
     * @param $lec_idx
     * @return array|bool|string
     */
    public function setUpload($delete_flag,$lec_idx,$file_Path)
    {

        $data = [];
        $this->load->library('upload');
        $upload_sub_dir = $file_Path;

        $filename = date("YmdHis");

        //첨부자료 등록
        $upload_result = $this->upload->uploadFile('file','attachfile',$filename,$upload_sub_dir,'overwrite:false');

        if(is_array($upload_result) === false) {
            return false;
        }

        //첨부파일경로
        $data_new['wAttachPath'] = $this->upload->_upload_url.$upload_sub_dir.'/';

        //첨부파일명
        if(count($upload_result) > 0) {
            $data_new['wAttachFileReal'] = $upload_result[0]['client_name'];
            $data_new['wAttachFile'] = $upload_result[0]['file_name'];

            $delete_flag = 'Y';     //신규 파일이 등록될경우 기존 파일 삭제처리
        }

        //파일 삭제 처리
        if($delete_flag === 'Y') {
            //파일정보 추출
            $row = $this->findLectureForModify($lec_idx);
            $attach_info = $row['wAttachPath'].$row['wAttachFile'];     //해당경로는 삭제가 안됨. 실제 디렉토리로 삭제해야함.
            //$attach_info_real = public_to_upload_path($row['wAttachPath']).'/' .$row['wAttachFile'];        //파일 실 디렉토리
            //var_dump($attach_info);exit;

            if(empty($row['wAttachFile']) === false) {  //기존 파일이 존재할경우. 백업폴더로 이동
                //if(unlink($attach_info_real) === false) {//파일 삭제 실패
                if($this->upload->bakUploadedFile($attach_info, true) !== true) {// 파익 백업 이동
                    return false;
                }
            }

            $data['wAttachFileReal'] = NULL;
            $data['wAttachFile'] = NULL;
            //Db 업데이트
            if ($this->_conn->set($data)->where('wLecIdx',$lec_idx)->update($this->_table) === false) {
                //throw new \Exception('첨부파일 등록에 실패했습니다.');
                echo "업데이트 실패";
                return false;
            }
        }

        //Db 업데이트
        if ($this->_conn->set($data_new)->where('wLecIdx',$lec_idx)->update($this->_table) === false) {
            return false;
        }

        return true;
    }

    /**
     * input 항목 공통 처리
     * @param array $input
     * @return array
     */
	public function inputCommon($input=[])
    {
        $input_data = [
            'wCpIdx' => element('CpIdx',$input)
            ,'wContentCcd' => element('ContentCcd',$input)
            ,'wLecName' => element('LecName',$input)
            ,'wShootingCcd' => element('ShootingCcd',$input)
            ,'wProgressCcd' => element('ProgressCcd',$input)
            ,'wMakeYM' => element('MakeY',$input).element('MakeM',$input)
            ,'wMediaUrl' => element('MediaUrl',$input)
            ,'wIsUse' => element('is_use',$input)
            ,'wKeyword' => element('Keyword',$input)
            ,'wScheduleCount' => element('ScheduleCount',$input)

        ];
        return $input_data;
    }

    /**
     * 마스터강의 복사
     * @param $wlecidx
     * @return array|bool
     */
    public function lectureCopy($wlecidx)
    {

        $this->_conn->trans_begin();

        try {

            $admin_idx = $this->session->userdata('admin_idx');
            $reg_ip = $this->input->ip_address();

            $select = " * From wbs_cms_lecture";

            $where =$this->_conn->makeWhere([
                'EQ'=>['wLecIdx'=>$wlecidx,'wIsStatus'=>'Y']
            ]);
            $where = $where->getMakeWhere(false);

            //원본 강좌 정보
            $ori_data = $this->_conn->query('select ' .$select .$where)->row_array();
            $ori_wAttachPah = $ori_data['wAttachPath'];

            // 마스터강의 복사
            $insert_column = 'wLecName, wCpIdx, wContentCcd, wShootingCcd, wProgressCcd, wMakeYM, wMediaUrl
                                    , wAttachFileReal, wAttachFile, wKeyword, wScheduleCount, wIsUse, wRegAdminIdx, wRegIp';

            //$select_column= str_replace('wLecName','concat(\'[복사]\',wLecName)',$insert_column);
            $select_column = $insert_column;
            $select_column= str_replace('wRegAdminIdx','\''.$admin_idx.'\' as wRegAdminIdx',$select_column);
            $select_column= str_replace('wRegIp','\''.$reg_ip.'\' as wRegIp',$select_column);

            $query = 'insert into wbs_cms_lecture ('. $insert_column .') SELECT '.$select_column.' FROM wbs_cms_lecture where wLecIdx='.$wlecidx;

            if($this->_conn->query($query) === false) {
                throw new \Exception('마스터강의 복사에 실패했습니다.');
            };

            //신규 마스터강의 식별자
            $new_wlecidx = $this->_conn->insert_id();

            //신규 경로
            $this->load->library('upload');
            $new_filePath =  $this->upload->_upload_url.config_item('upload_prefix_dir').'/lecture/'.date("Y").'/'.$new_wlecidx.'/';

            $update_data = [
                'wAttachPath' => $new_filePath 
            ];

            if ($this->_conn->set($update_data)->where('wLecIdx',$new_wlecidx)->update('wbs_cms_lecture') === false) {
                throw new \Exception('마스터강의 복사(파일 경로 생성)에 실패했습니다.');
            }

            //echo $this->_conn->last_query();

            //마스터강의 교수정보
            $insert_column = "wLecIdx, wProfIdx, wOrderNum, wRegAdminIdx ";

            $select_column = $insert_column;
            $select_column= str_replace('wLecIdx','\''.$new_wlecidx.'\' as wLecIdx',$select_column);
            $select_column= str_replace('wRegAdminIdx','\''.$admin_idx.'\' as wRegAdminIdx',$select_column);

            $query = 'insert into wbs_cms_lecture_r_professor ('. $insert_column .') SELECT '.$select_column.' FROM wbs_cms_lecture_r_professor where wIsStatus=\'Y\' And wLecIdx='.$wlecidx;
            
            if($this->_conn->query($query) === false) {
                throw new \Exception('마스터강의 복사(교수정보)에 실패했습니다.');
            };


            //마스터강의 회차정보
            $insert_column = " wLecIdx, wUnitName, wUnitNum, wUnitLectureNum, wContentTypeCcd, wContentSizeCcd, wHD, wSD, wWD
                                , wUnitAttachFileReal, wUnitAttachFile, wRuntime, wBookPage, wShootingDate, wProfIdx, wOrderNum, wIsUse, wUnitInfo, wRegAdminIdx, wRegIp";

            $select_column = $insert_column;
            $select_column= str_replace('wLecIdx','\''.$new_wlecidx.'\' as wLecIdx',$select_column);
            $select_column= str_replace('wRegAdminIdx','\''.$admin_idx.'\' as wRegAdminIdx',$select_column);
            $select_column= str_replace('wRegIp','\''.$reg_ip.'\' as wRegIp',$select_column);

            $query = 'insert into wbs_cms_lecture_unit ('. $insert_column .') SELECT '.$select_column.' FROM wbs_cms_lecture_unit where wIsStatus=\'Y\' And wLecIdx='.$wlecidx;

            if($this->_conn->query($query) === false) {
                throw new \Exception('마스터강의 복사(교수정보)에 실패했습니다.');
            };

            //복사 로그 저장
            $copy_data = [
                'wLecIdx' => $new_wlecidx
                ,'wLecIdx_Original' => $wlecidx
                ,'wRegAdminIdx' =>$admin_idx
            ];
            if($this->_conn->set($copy_data)->insert('wbs_cms_lecture_copy_log') === false) {
                throw new \Exception('복사 이력 저장에 실패했습니다.');
            }

            // 파일 복사
            $original = str_replace($this->upload->_upload_url.config_item('upload_prefix_dir') ,$this->upload->_upload_path.config_item('upload_prefix_dir'),$ori_wAttachPah);
            $target = str_replace($this->upload->_upload_url.config_item('upload_prefix_dir') ,$this->upload->_upload_path.config_item('upload_prefix_dir'),$new_filePath);

            if(is_dir($original)) {
                exec("cp -rf $original $target");
            }

            //$this->_conn->trans_rollback();
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }




}

