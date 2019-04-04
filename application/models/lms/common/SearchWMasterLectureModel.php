<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchWMasterLectureModel extends WB_Model
{
    private $_table = [
       'masterlecture' => 'wbs_cms_lecture_combine'
        ,'masterlectureunit' => 'wbs_cms_lecture_unit_combine'
    ];

    public function __construct()
    {
        parent::__construct('lms');
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
            $column = ' count(*) as numrows ';
            $order_by_offset_limit = '';
        } else {
            $column = ' * ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }
        $from = '
                    from
                        '.$this->_table['masterlecture'].'
                    where 1=1 
                    ';
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);
        $query = $this->_conn->query('select ' .$column .$from .$where. $order_by_offset_limit);
        //echo $this->_conn->last_query();
        return ($is_count===true) ? $query->row(0)->numrows : $query->result_array();
    }


    /**
     * 마스터 강의 정보 추출
     * @param $lecidx
     * @return mixed
     */
    public function findLecture($lecidx)
    {
        $column = ' * ';
        $from = ' From '.$this->_table['masterlecture'];
        $where = $this->_conn->makeWhere([
            'EQ'=>['wLecIdx'=>$lecidx, 'cp_wAdminIdx'=>$this->session->userdata('admin_idx')]
        ]);
        $where = $where->getMakeWhere(false);

        return $this->_conn->query('select ' .$column .$from .$where)->row_array();
        //echo $this->_conn->last_query();
    }


    /**
     * 회차 목록
     * @param $lecidx
     * @return mixed
     */
    public function listAllUnit($lecidx)
    {
        $column = '*';
        $from = ' From '.$this->_table['masterlectureunit'];
        $where =  $this->_conn->makeWhere([
            'EQ'=>[
                'wLecIdx'=>$lecidx
                ,'wIsUse' => 'Y'
            ]
        ])->getMakeWhere(false);

        $order_by = $this->_conn->makeOrderBy(['wOrderNum'=>'ASC'])->getMakeOrderBy();
        return $this->_conn->query('select ' .$column .$from .$where .$order_by) ->result_array();
        //echo $this->_conn->last_query();
    }



    /**
     * 마스터강의에 매핑된 강사의 LMS 등록정보 추출 (LMS에 강사 등록이 되어 있지 않을 경우 추출 불가 함)
     */
    public function listWMasterLectureProfessor($sitecode,$learnpatternccd,$wlecidx)
    {
        $column = ' STRAIGHT_JOIN  A.ProfIdx,A.wProfIdx
                        ,B.ProfCalcIdx,B.ApplyStartDatm,B.ApplyEndDatm,B.CalcRate,B.ContribRate
                        ,C.wUnitCnt
                        ,D.wProfId,D.wProfName';
        $from = ' from lms_professor A 
                    join lms_professor_calculate_rate B on A.ProfIdx = B.ProfIdx and B.IsStatus=\'Y\'
                    join wbs_cms_lecture_combine C on INSTR(C.profIdx_string,A.wProfIdx) And C.cp_wAdminIdx='. $this->session->userdata('admin_idx') .'
                    join wbs_pms_professor D on A.wProfIdx = D.wProfIdx and D.wIsStatus=\'Y\'  ';

        $where = $this->_conn->makeWhere([
            'EQ' => ['A.Sitecode'=>$sitecode
                ,'A.IsStatus'=>'Y'
                ,'A.IsUse'=>'Y'
                ,'B.LearnPatternCcd'=>$learnpatternccd
                ,'C.wLecIdx'=>$wlecidx
            ]
        ]);

        $where = $where->getMakeWhere(false).' and (now() between B.ApplyStartDatm and B.ApplyEndDatm)';
        //echo 'select ' .$column .$from .$where;
        return $this->_conn->query('select ' .$column .$from .$where)->result_array();
    }


    /**
     * 단강좌 연결 마스터강의에 매핑된 강사의 LMS 등록정보 추출 (LMS에 강사 등록이 되어 있지 않을 경우 추출 불가 함)
     */
    public function listWMasterLectureProfessorFromLecture($sitecode,$learnpatternccd,$prodcode)
    {
        //var_dump($prodcode);//exit;
        $column = ' STRAIGHT_JOIN
                        A.ProdCode,A.ProdName,B.wLecIdx
                        ,C.wUnitCnt
                        ,D.ProfIdx,D.wProfIdx
                        ,E.wProfId,E.wProfName
                        ,F.ProfCalcIdx,F.ApplyStartDatm,F.ApplyEndDatm,F.CalcRate,F.ContribRate';
        $from = ' from 
                        lms_product A
                        join lms_product_lecture B on A.ProdCode = B.ProdCode
                        join wbs_cms_lecture_combine C on B.wLecIdx = C.wLecIdx and C.cp_wAdminIdx='. $this->session->userdata('admin_idx') .'
                        join lms_professor D on INSTR(C.profIdx_string,D.wProfIdx) and D.IsStatus=\'Y\' 
                        join wbs_pms_professor E on D.wProfIdx = E.wProfIdx and E.wIsStatus=\'Y\'
                        join lms_professor_calculate_rate F on D.ProfIdx = F.ProfIdx and F.IsStatus=\'Y\' ';

        $where = $this->_conn->makeWhere([
            'EQ' => [
                'A.Sitecode'=>$sitecode
                ,'A.IsStatus'=>'Y'
                ,'F.LearnPatternCcd'=>$learnpatternccd
                ,'D.Sitecode'=>$sitecode
            ]
            ,'IN' => ['A.ProdCode' => $prodcode]
        ]);

        $where = $where->getMakeWhere(false).' and (now() between F.ApplyStartDatm and F.ApplyEndDatm)';

        $orderby = ' order by ( 
                            case A.ProdCode';
            $i = 1;
            foreach ($prodcode as $val) {
                $orderby .= ' when \''.$val.'\' then '.$i;
                $i += 1;
            }
        $orderby .= ' end )';

        //echo 'select ' .$column .$from .$where. $orderby;
        return $this->_conn->query('select ' .$column .$from .$where. $orderby)->result_array();
    }


}