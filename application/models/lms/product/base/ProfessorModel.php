<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfessorModel extends WB_Model
{
    private $_table = [
        'site' => 'lms_site',
        'code' => 'lms_sys_code',
        'category' => 'lms_sys_category',
        'subject' => 'lms_product_subject',
        'professor' => 'lms_professor',
        'pms_professor' => 'wbs_pms_professor',
        'professor_reference' => 'lms_professor_reference',
        'professor_banner' => 'lms_professor_banner',
        'professor_r_subject_r_category' => 'lms_professor_r_subject_r_category',
        'professor_calculate_rate' => 'lms_professor_calculate_rate',
        'professor_board_info' => 'lms_professor_board_info',
        'admin' => 'wbs_sys_admin',
        'board' => 'lms_board'
    ];
    private $_refer_type = [
        'string' => ['ot_url', 'wsample_url', 'sample_url1', 'sample_url2', 'sample_url3', 'homep_url', 'cafe_url', 'blog_url', 'yt_url1', 'yt_url2', 'yt_url3'],
        'attach' => ['prof_index_img', 'prof_detail_img', 'lec_list_img', 'lec_detail_img', 'lec_review_img', 'class_detail_img']
    ];
    private $_refer_opt_code = ['sample_url1_opt_code', 'sample_url2_opt_code', 'sample_url3_opt_code', 'yt_url1_opt_code', 'yt_url2_opt_code', 'yt_url3_opt_code'];
    private $_bnr_type = ['01' => 3, '02' => 3, '03' => 3, '04' => 3];     // 배너타입별 이미지 갯수
    private $_ccd = ['LearnPattern' => '615', 'ProdType' => '636'];
    public $_bm_idx = ['notice' => 63, 'qna' => 66, 'data' => 69, 'tpass' => '87', 'assignment' => '88', 'tcc' => '101', 'anonymous' => '111'];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 교수관리 목록 조회
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return int|array
     */
    public function listProfessor($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
                U.*, ifnull(C.CateName, "삭제된 카테고리") as CateName, ifnull(PS.SubjectName, "삭제된 과목") as SubjectName
                    , json_value(U.UseBoardJson, "$[*].' . $this->_bm_idx['notice'] . '") as IsNoticeBoard
                    , json_value(U.UseBoardJson, "$[*].' . $this->_bm_idx['qna'] . '") as IsQnaBoard
                    , json_value(U.UseBoardJson, "$[*].' . $this->_bm_idx['data'] . '") as IsDataBoard
                    , json_value(U.UseBoardJson, "$[*].' . $this->_bm_idx['tpass'] . '") as IsTpassBoard
                    , json_value(U.UseBoardJson, "$[*].' . $this->_bm_idx['assignment'] . '") as IsAssignmentBoard
                    , json_value(U.UseBoardJson, "$[*].' . $this->_bm_idx['tcc'] . '") as IsTccBoard
                    , json_value(U.UseBoardJson, "$[*].' . $this->_bm_idx['anonymous'] . '") as IsAnonymousBoard
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
            from (
                select I.*, substring_index(I.SubjectMapping, "_", 1) as CateCode, substring_index(I.SubjectMapping, "_", -1) as SubjectIdx
                from (
                    select P.ProfIdx, P.SiteCode, P.UseBoardJson, P.IsBoardPublic, P.IsDispIntro, P.IsUse, P.RegDatm, P.RegAdminIdx
                        , WP.wProfIdx, WP.wProfId, WP.wProfName, WP.wIsUse, S.SiteName, A.wAdminName as RegAdminName
                        , (select concat(CateCode, "_", SubjectIdx)
                            from ' . $this->_table['professor_r_subject_r_category'] . '
                            where ProfIdx = P.ProfIdx and IsStatus = "Y"
                            group by CateCode, SubjectIdx
                            order by max(PcIdx) asc limit 1		
                          ) as SubjectMapping
                    from ' . $this->_table['professor'] . ' as P
                        inner join ' . $this->_table['pms_professor'] . ' as WP
                            on P.wProfIdx = WP.wProfIdx
                        inner join ' . $this->_table['site'] . ' as S
                            on P.SiteCode = S.SiteCode
                        left join ' . $this->_table['admin'] . ' as A
                            on P.RegAdminIdx = A.wAdminIdx and A.wIsStatus = "Y"
                    where P.IsStatus = "Y" 
                        and WP.wIsStatus = "Y" 
                        and S.IsStatus = "Y"
                ) I 
            ) U left join ' . $this->_table['category'] . ' as C
                    on U.SiteCode = C.SiteCode and U.CateCode = C.CateCode and C.IsStatus = "Y"
                left join ' . $this->_table['subject'] . ' as PS
                    on U.SiteCode = PS.SiteCode and U.SubjectIdx = PS.SubjectIdx and PS.IsStatus = "Y"			
        ';

        // 사이트 권한 추가
        $arr_condition['IN']['U.SiteCode'] = get_auth_site_codes();
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 교수별 카테고리 + 과목 매핑 데이터 조회
     * @param $prof_idx
     * @return array
     */
    public function listProfessorSubjectMapping($prof_idx)
    {
        $column = '
            PSC.CateCode, PSC.SubjectIdx
                , C.CateName, PS.SubjectName
                , ifnull(PC.CateCode, "") as ParentCateCode, ifnull(PC.CateName, "") as ParentCateName
                , concat(if(PC.CateCode is null, "", concat(PC.CateName, " > ")), C.CateName, " > ", PS.SubjectName) as CateSubjectRouteName            
        ';
        $from = '
            from ' . $this->_table['professor_r_subject_r_category'] . ' as PSC
                inner join ' . $this->_table['category'] . ' as C
                    on PSC.CateCode = C.CateCode
                left join ' . $this->_table['category'] . ' as PC
                    on C.ParentCateCode = PC.CateCode and PC.IsUse = "Y" and PC.IsStatus = "Y"
                inner join ' . $this->_table['subject'] . ' as PS
                    on PSC.SubjectIdx = PS.SubjectIdx                    
                inner join ' . $this->_table['professor'] . ' as P
                    on PSC.ProfIdx = P.ProfIdx
                inner join ' . $this->_table['pms_professor'] . ' as WP
                    on P.wProfIdx = WP.wProfIdx
        ';
        $where = ' where PSC.ProfIdx = ? and PSC.IsStatus = "Y" and C.IsUse = "Y" and C.IsStatus = "Y" and PS.IsUse = "Y" and PS.IsStatus = "Y"';
        $order_by_offset_limit = ' order by PSC.PcIdx asc';

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit, [$prof_idx])->result_array();

        $results = [];
        foreach ($query as $row) {
            $results[$row['CateCode'] . '_' . $row['SubjectIdx']] = $row['CateSubjectRouteName'];
        }
        
        return $results;
    }

    /**
     * 카테고리 + 과목 + 교수별 게시판 답변현황 매핑 데이터 조회
     * @param $is_count
     * @param $arr_condition
     * @param $bm_idx
     * @param $reply_status_ccd
     * @return mixed
     */
    public function listProfessorSubjectMappingForBoard($is_count, $arr_condition, $bm_idx, $reply_status_ccd = null, $limit = null, $offset = null)
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
                P.ProfIdx, P.wProfIdx, P.SiteCode, P.SiteName, P.ProfNickName, P.UseBoardJson, P.IsBoardPublic, PrSC.CateCode
            ';
            if (empty($reply_status_ccd) === false) {
                $column = $column . '
                    ,IFNULL(C.BoardProfCount,0) AS BoardProfCount
                ';
            }

            $order_by_offset_limit = $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }
        $from = '
            FROM (
                SELECT lp.ProfIdx, lp.wProfIdx, lp.SiteCode, lp.ProfNickName, lp.UseBoardJson, lp.IsBoardPublic, lp.IsStatus, ls.SiteName, wp.wProfId, wp.wProfName
                FROM '. $this->_table['professor'] .' AS lp
                INNER JOIN '. $this->_table['site'] .' AS ls ON lp.SiteCode = ls.SiteCode
                INNER JOIN '. $this->_table['pms_professor'] .' AS wp ON lp.wProfIdx = wp.wProfIdx
                WHERE
                    lp.IsStatus = "Y" AND lp.IsUse = "Y"
                    AND json_value(lp.UseBoardJson, "$[*].'.$bm_idx.'") = "Y"
            ) AS P
            LEFT OUTER JOIN (
                SELECT ProfIdx, GROUP_CONCAT(CONCAT(B.CateName,"->",C.SubjectName)) AS CateCode
                FROM '. $this->_table['professor_r_subject_r_category'] .' AS A
                LEFT JOIN '. $this->_table['category'] .' AS B ON A.CateCode = B.CateCode
                LEFT JOIN '. $this->_table['subject'] .' AS C ON A.SubjectIdx = C.SubjectIdx
                WHERE A.IsStatus = "Y"
                GROUP BY ProfIdx
            ) AS PrSC ON P.ProfIdx = PrSC.ProfIdx
        ';
        if (empty($reply_status_ccd) === false) {
            $from = $from . '
                LEFT OUTER JOIN (
                    SELECT tempC.ProfIdx, COUNT(tempC.ProfIdx) AS BoardProfCount
                    FROM (
                        SELECT ProfIdx
                        FROM ' . $this->_table['board'] . '
                        WHERE BmIdx = "' . $bm_idx . '" AND ReplyStatusCcd = "' . $reply_status_ccd . '" AND IsStatus = \'Y\' AND IsUse = \'Y\'
                    ) AS tempC
                    GROUP BY tempC.ProfIdx
                ) AS C ON P.ProfIdx = C.ProfIdx
            ';
        }

        $set_where = $this->_conn->makeWhere($arr_condition);
        $set_where = $set_where->getMakeWhere(false);
        $where = '
            AND json_value(P.UseBoardJson, "$[*].'.$bm_idx.'") = "Y"
        ';
        $where = $set_where.$where;

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 카테고리별 과목/교수 데이터 조회
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listSearchProfessorSubjectMapping($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = 'PSC.PcIdx, PSC.ProfIdx, PF.SiteCode, PSC.CateCode, PSC.SubjectIdx, PSC.OrderNum, WP.wProfId, WP.wProfName, PS.SubjectName
                , concat(PSC.ProfIdx, "_", PSC.SubjectIdx) as ProfSubjectIdx, concat(PS.SubjectName, ">", WP.wProfName) as ProfSubjectName
                , concat(if(PC.CateCode is null, "", concat(PC.CateName, ">")), C.CateName) as CateRouteName, S.SiteName
                , PSC.RegDatm, PSC.RegAdminIdx, A.wAdminName as RegAdminName
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
            from ' . $this->_table['professor_r_subject_r_category'] . ' as PSC
                inner join ' . $this->_table['professor'] . ' as PF
                    on PSC.ProfIdx = PF.ProfIdx
                inner join ' . $this->_table['pms_professor'] . ' as WP
                    on PF.wProfIdx = WP.wProfIdx
                inner join ' . $this->_table['subject'] . ' as PS
                    on PSC.SubjectIdx = PS.SubjectIdx		
                inner join ' . $this->_table['category'] . ' as C
                    on PSC.CateCode = C.CateCode
                left join ' . $this->_table['category'] . ' as PC
                    on C.ParentCateCode = PC.CateCode and PC.IsStatus = "Y"
                inner join ' . $this->_table['site'] . ' as S
                    on PF.SiteCode = S.SiteCode                    
                left join ' . $this->_table['admin'] . ' as A 	
                    on PSC.RegAdminIdx = A.wAdminIdx and A.wIsStatus = "Y" 
            where PSC.IsStatus = "Y"
                and PF.IsUse = "Y" and PF.IsStatus = "Y"
                and WP.wIsUse = "Y" and WP.wIsStatus = "Y"	
                and PS.IsUse = "Y" and PS.IsStatus = "Y"      
                and C.IsUse = "Y" and C.IsStatus = "Y"
                and S.IsUse = "Y" and S.IsStatus = "Y"                                         
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 교수 참조 자료 조회
     * @param $prof_idx
     * @param string $key_type [idx : ReferIdx => ReferType, type : ReferType => ReferValue]
     * @return array
     */
    public function listProfessorRefer($prof_idx, $key_type = 'idx')
    {
        $results = [];
        if ($key_type == 'idx') {
            $_key = 'ReferIdx';
            $_value = 'ReferType';
        } else {
            $_key = 'ReferType';
            $_value = 'ReferValue';
        }

        $data = $this->_conn->getListResult($this->_table['professor_reference'], 'ReferIdx, ReferType, ReferValue, OptionCode', [
            'EQ' => ['ProfIdx' => $prof_idx, 'IsStatus' => 'Y'],
        ]);

        foreach ($data as $idx => $row) {
            $result_key = (ends_with($row['ReferType'], '_img') === true) ? 'attach' : 'string';

            $results[$result_key][$row[$_key]] = $row[$_value];
            $key_type == 'idx' && $results{$result_key . '_value'}[$row[$_key]] = $row['ReferValue'];

            // 옵션코드 추가
            if ($key_type == 'idx') {
                $results[$result_key . '_option'][$row[$_key]] = $row['OptionCode'];
            } else {
                $results[$result_key][$row[$_key] . '_opt_code'] = $row['OptionCode'];
            }
        }

        return $results;
    }

    /**
     * 교수 강사료 정산률 등록 대상 조회 (모의고사상품 추가)
     * @return array
     */
    public function listProfessorCalcRateTarget()
    {
        $results = [];
        $arr_condition = [
            'EQ' => ['IsUse' => 'Y', 'IsStatus' => 'Y'],
            'IN' => ['GroupCcd' => array_values($this->_ccd)],
            'ORG' => ['EQ' => ['json_value(CcdEtc, "$.is_calc")' => 'Y', 'Ccd' => '636010']]
        ];

        $list = $this->_conn->getListResult($this->_table['code'], 'Ccd, CcdName, ifnull(json_value(CcdEtc, "$.type"), "mock_exam") as OnOffType', $arr_condition);

        foreach ($list as $row) {
            $results[$row['OnOffType']][$row['Ccd']] = $row['CcdName'];
        }

        return $results;
    }

    /**
     * 교수 강사료 정산률 데이터 조회 (모의고사상품 추가)
     * @param $prof_idx
     * @return array
     */
    public function listProfessorCalcRate($prof_idx)
    {
        $results = [];
        $column = '
            PCR.ProfCalcIdx, PCR.LearnPatternCcd, left(PCR.ApplyStartDatm, 10) as ApplyStartDate, left(PCR.ApplyEndDatm, 10) as ApplyEndDate
                , PCR.CalcRate, PCR.ContribRate, PCR.CalcMemo
                , ifnull(json_value(C.CcdEtc, "$.type"), "mock_exam") as OnOffType            
        ';
        $arr_condition = [
            'EQ' => ['PCR.ProfIdx' => $prof_idx, 'PCR.IsStatus' => 'Y', 'C.IsUse' => 'Y', 'C.IsStatus' => 'Y'],
            'IN' => ['C.GroupCcd' => array_values($this->_ccd)],
        ];
        
        $list = $this->_conn->getJoinListResult($this->_table['professor_calculate_rate'] . ' as PCR', 'inner', $this->_table['code'] . ' as C'
            , 'PCR.LearnPatternCcd = C.Ccd'
            , $column, $arr_condition, null, null, ['PCR.ProfCalcIdx', 'asc']
        );

        foreach ($list as $row) {
            $results[$row['OnOffType']][$row['LearnPatternCcd']][] = $row;
        }

        return $results;        
    }

    /**
     * 교수 배너 조회
     * @param int $prof_idx
     * @return array
     */
    public function listProfessorBanner($prof_idx)
    {
        $results = [];
        $data = $this->_conn->getListResult($this->_table['professor_banner'], 'BnrIdx, BnrType, BnrNum, BnrImgPath, BnrImgName, LinkType, LinkUrl', [
            'EQ' => ['ProfIdx' => $prof_idx, 'IsStatus' => 'Y'],
        ]);

        foreach ($data as $idx => $row) {
            $results[$row['BnrType']][$row['BnrNum']] = $row;
        }

        return $results;
    }

    /**
     * 교수 코드 목록 조회
     * @param string $site_code [사이트코드 (all : 사이트 권한과 상관없이 모든 교수식별자 조회)]
     * @param string $wprof_idx [WBS 교수식별자]
     * @param array $order_by [정렬조건]
     * @return array
     */
    public function getProfessorArray($site_code = '', $wprof_idx = '', $order_by = [])
    {
        $arr_condition = ['EQ' => ['P.IsUse' => 'Y', 'P.IsStatus' => 'Y', 'WP.wIsUse' => 'Y', 'WP.wIsStatus' => 'Y']];
        empty($order_by) === true && $order_by = ['P.SiteCode' => 'asc', 'P.ProfIdx' => 'asc'];

        if (empty($site_code) === false) {
            if ($site_code != 'all') {
                $arr_condition['EQ']['P.SiteCode'] = $site_code;
            }
        } else {
            $arr_condition['IN']['P.SiteCode'] = get_auth_site_codes();
        }

        if (empty($wprof_idx) === false) {
            $arr_condition['EQ']['P.wProfIdx'] = $wprof_idx;
        }

        $column = 'P.SiteCode, P.ProfIdx, WP.wProfName 
                        ,(case WHEN ASCII(SUBSTRING(wP.wProfName,1)) < 128 THEN 2 ELSE 1 end) as wProfName_order_by'; //한글우선순위로 정렬하기 위한 컬럼재생성

        $data = $this->_conn->getJoinListResult($this->_table['professor'] . ' as P', 'inner', $this->_table['pms_professor'] . ' as WP'
            , 'P.wProfIdx = WP.wProfIdx'
            , $column, $arr_condition, null, null, $order_by
        );

        return (empty($site_code) === false) ? array_pluck($data, 'wProfName', 'ProfIdx') : $data;
    }

    /**
     * 교수 정보 조회
     * @param string $column
     * @param array $arr_condition
     * @return array
     */
    public function findProfessor($column = '*', $arr_condition = [])
    {
        $arr_condition['EQ']['IsStatus'] = 'Y';

        return $this->_conn->getFindResult($this->_table['professor'], $column, $arr_condition);
    }

    /**
     * 교수 상세 정보 조회
     * @param string $column
     * @param array $arr_condition
     * @return array
     */
    public function findProfessorDetail($column = '*', $arr_condition = [])
    {
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $from = "
            FROM {$this->_table['professor']} AS a
            INNER JOIN {$this->_table['site']} AS b ON a.SiteCode = b.SiteCode AND b.IsStatus = 'Y' AND b.IsUse = 'Y'
            INNER JOIN (
                SELECT temp_a.ProfIdx, GROUP_CONCAT(temp_a.CateCode) AS CateCode, GROUP_CONCAT(temp_a.CateName) AS CateName
                FROM (
                    SELECT a.ProfIdx, a.CateCode, b.CateName
                    FROM {$this->_table['professor_r_subject_r_category']} AS a
                    INNER JOIN {$this->_table['category']} AS b ON a.CateCode = b.CateCode
                    {$where}
                    GROUP BY a.CateCode
                ) AS temp_a
            ) AS c ON a.ProfIdx = c.ProfIdx
        ";

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where);
        return $query->result_array()[0];
    }
    
    /**
     * 교수 정보 수정 폼에 필요한 데이터 조회
     * @param $prof_idx
     * @return array
     */
    public function findProfessorForModify($prof_idx)
    {
        $column = '
            P.ProfIdx, P.wProfIdx, P.SiteCode, P.ProfNickName, P.ProfSlogan, P.ProfCurriculum, P.ProfContent, P.OnLecViewCcd, P.UseBoardJson, P.IsBoardPublic, P.IsUse, P.RegDatm, P.RegAdminIdx, P.UpdDatm, P.UpdAdminIdx
                , P.AppellationCcd, P.IntroDefTabCcd, P.IsOpenStudyComment, P.IsDispIntro
                , json_value(P.UseBoardJson, "$[*].' . $this->_bm_idx['notice'] . '") as IsNoticeBoard
                , json_value(P.UseBoardJson, "$[*].' . $this->_bm_idx['qna'] . '") as IsQnaBoard
                , json_value(P.UseBoardJson, "$[*].' . $this->_bm_idx['data'] . '") as IsDataBoard
                , json_value(P.UseBoardJson, "$[*].' . $this->_bm_idx['tpass'] . '") as IsTpassBoard
                , json_value(P.UseBoardJson, "$[*].' . $this->_bm_idx['assignment'] . '") as IsAssignmentBoard
                , json_value(P.UseBoardJson, "$[*].' . $this->_bm_idx['tcc'] . '") as IsTccBoard
                , json_value(P.UseBoardJson, "$[*].' . $this->_bm_idx['anonymous'] . '") as IsAnonymousBoard
                , WP.wProfName, WP.wProfId, WP.wProfProfile, WP.wBookContent, WP.wIsUse 
                , (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = P.RegAdminIdx and wIsStatus = "Y") as RegAdminName
                , if(P.UpdAdminIdx is null, "", (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = P.UpdAdminIdx and wIsStatus = "Y")) as UpdAdminName
        ';

        return $this->_conn->getJoinFindResult($this->_table['professor'] . ' as P', 'inner', $this->_table['pms_professor'] . ' as WP', 'P.wProfIdx = WP.wProfIdx'
            , $column, ['EQ' => ['P.ProfIdx' => $prof_idx, 'P.IsStatus' => 'Y', 'WP.wIsStatus' => 'Y']]);
    }

    /**
     * 교수 등록
     * @param array $input
     * @return array|bool
     */
    public function addProfessor($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $wprof_idx = element('wprof_idx', $input);
            $site_code = element('site_code', $input);

            // 운영사이트+WBS교수정보 중복체크
            $duplicate_cnt = $this->findProfessor(true, ['EQ' => ['wProfIdx' => $wprof_idx, 'SiteCode' => $site_code, 'IsStatus' => 'Y']]);
            if ($duplicate_cnt > 0) {
                throw new \Exception('이미 등록된 교수정보 입니다.');
            }

            $data = [
                'wProfIdx' => $wprof_idx,
                'SiteCode' => $site_code,
                'ProfNickName' => element('prof_nickname', $input),
                'ProfSlogan' => element('prof_slogan', $input),
                'UseBoardJson' => $this->_getUseBoardJson(element('use_board', $input)),
                'IsBoardPublic' => (empty(element('is_board_public', $input)) === false) ? 'Y' : 'N',
                'ProfCurriculum' => element('prof_curriculum', $input),
                'ProfContent' => element('prof_content', $input),
                'OnLecViewCcd' => element('onlec_view_ccd', $input, '719001'),
                'IsOpenStudyComment' => element('is_open_studycomment', $input),
                'AppellationCcd' => element('appellation_ccd', $input, '724001'),
                'IntroDefTabCcd' => element('intro_def_tab_ccd', $input),
                'IsDispIntro' => element('is_disp_intro', $input, 'Y'),
                'IsUse' => element('is_use', $input),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ];

            // 데이터 등록
            if ($this->_conn->set($data)->insert($this->_table['professor']) === false) {
                throw new \Exception('교수 정보 등록에 실패했습니다.');
            }

            // 등록된 교수 식별자
            $prof_idx = $this->_conn->insert_id();

            // 카테고리 정보 등록
            $is_subject_mapping = $this->_replaceProfessorSubjectMapping(element('subject_mapping_code', $input), $prof_idx);
            if ($is_subject_mapping !== true) {
                throw new \Exception($is_subject_mapping);
            }

            // 교수 참조자료 등록
            $refer_input = elements($this->_refer_type['string'], $input);
            $refer_opt_input = elements($this->_refer_opt_code, $input);
            $is_refer = $this->_replaceProfessorRefer($refer_input, [], $prof_idx, $refer_opt_input);
            if ($is_refer !== true) {
                throw new \Exception($is_refer);
            }
            
            // 교수영역 이미지 업로드
            $is_upload = $this->_attachProfessorImg([], [], $prof_idx);
            if ($is_upload !== true) {
                throw new \Exception($is_upload);
            }

            // 강사료 정산 데이터 등록/수정
            $calc_rate_input = elements(['calc_rate', 'contrib_rate', 'apply_start_date', 'apply_end_date', 'calc_memo', 'learn_pattern_ccd', 'prof_calc_idx'], $input);
            $is_calc_rate = $this->_replaceProfessorCalcRate($calc_rate_input, [], $prof_idx);
            if ($is_calc_rate !== true) {
                throw new \Exception($is_calc_rate);
            }

            // 교수배너 이미지 업로드
            $is_bnr_upload = $this->_attachProfessorBannerImg($input, [], $prof_idx);
            if ($is_bnr_upload !== true) {
                throw new \Exception($is_bnr_upload);
            }

            // 강사 게시판정보 등록
            $arr_sms_bm_idx = element('sms_bm_idx', $input);
            if(empty($arr_sms_bm_idx) === false) {
                $i = 0;
                foreach($arr_sms_bm_idx as $row) {
                    $sms_limit_start_time = element('sms_limit_start_hour', $input)[$i] . ':' . element('sms_limit_start_min', $input)[$i] . ':00';
                    $sms_limit_end_time = element('sms_limit_end_hour', $input)[$i] . ':' . element('sms_limit_end_min', $input)[$i] . ':59';
                    $is_add_board_info = $this->addProfessorBoardInfo([
                        'prof_idx' => $prof_idx,
                        'sms_bm_idx' => $row,
                        'sms_limit_start_time' => $sms_limit_start_time,
                        'sms_limit_end_time' => $sms_limit_end_time,
                        'sms_send_tel' => element('sms_send_tel', $input)[$i],
                        'sms_receive_tel' => element('sms_receive_tel', $input)[$i],
                        'sms_content' => element('sms_content', $input)[$i],
                        'is_sms_use' => element('is_sms_use', $input)[$i]
                    ]);
                    if ($is_add_board_info !== true) {
                        throw new \Exception($is_add_board_info);
                    }
                    $i++;
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
     * 교수 수정
     * @param array $input
     * @return array|bool
     */
    public function modifyProfessor($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $prof_idx = element('idx', $input);

            // 기존 교수 기본정보 조회
            $row = $this->findProfessor('ProfIdx', ['EQ' => ['ProfIdx' => $prof_idx]]);
            if (empty($row) === true) {
                throw new \Exception('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            $data = [
                'ProfNickName' => element('prof_nickname', $input),
                'ProfSlogan' => element('prof_slogan', $input),
                'UseBoardJson' => $this->_getUseBoardJson(element('use_board', $input)),
                'IsBoardPublic' => (empty(element('is_board_public', $input)) === false) ? 'Y' : 'N',
                'ProfCurriculum' => element('prof_curriculum', $input),
                'ProfContent' => element('prof_content', $input),
                'OnLecViewCcd' => element('onlec_view_ccd', $input, '719001'),
                'IsOpenStudyComment' => element('is_open_studycomment', $input),
                'AppellationCcd' => element('appellation_ccd', $input, '724001'),
                'IntroDefTabCcd' => element('intro_def_tab_ccd', $input),
                'IsDispIntro' => element('is_disp_intro', $input, 'Y'),
                'IsUse' => element('is_use', $input),
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];

            // 데이터 수정
            if ($this->_conn->set($data)->where('ProfIdx', $prof_idx)->update($this->_table['professor']) === false) {
                throw new \Exception('교수 정보 수정에 실패했습니다.');
            }

            // 카테고리 정보 등록
            $is_subject_mapping = $this->_replaceProfessorSubjectMapping(element('subject_mapping_code', $input), $prof_idx);
            if ($is_subject_mapping !== true) {
                throw new \Exception($is_subject_mapping);
            }

            // 교수 참조자료 조회
            $refer_data = $this->listProfessorRefer($prof_idx);

            // 교수 참조자료 등록/수정
            $refer_input = elements($this->_refer_type['string'], $input);
            $refer_opt_input = elements($this->_refer_opt_code, $input);
            $is_refer = $this->_replaceProfessorRefer($refer_input, element('string', $refer_data, []), $prof_idx, $refer_opt_input);
            if ($is_refer !== true) {
                throw new \Exception($is_refer);
            }

            // 교수영역 이미지 업로드
            $is_upload = $this->_attachProfessorImg(element('attach', $refer_data, []), element('attach_value', $refer_data, []), $prof_idx);
            if ($is_upload !== true) {
                throw new \Exception($is_upload);
            }

            // 강사료 정산 데이터 등록/수정
            $calc_rate_input = elements(['calc_rate', 'contrib_rate', 'apply_start_date', 'apply_end_date', 'calc_memo', 'learn_pattern_ccd', 'prof_calc_idx'], $input);
            $is_calc_rate = $this->_replaceProfessorCalcRate($calc_rate_input, element('del_prof_calc_idx', $input, []), $prof_idx);
            if ($is_calc_rate !== true) {
                throw new \Exception($is_calc_rate);
            }

            // 교수배너 이미지 업로드
            $bnr_data = $this->listProfessorBanner($prof_idx);  // 교수배너 정보 조회
            $is_bnr_upload = $this->_attachProfessorBannerImg($input, $bnr_data, $prof_idx);
            if ($is_bnr_upload !== true) {
                throw new \Exception($is_bnr_upload);
            }

            // 강사 게시판정보 삭제/등록
            $is_remove_board_info = $this->removeProfessorBoardInfo($prof_idx);
            if($is_remove_board_info === true) {
                $arr_sms_bm_idx = element('sms_bm_idx', $input);
                if(empty($arr_sms_bm_idx) === false) {
                    $i = 0;
                    foreach($arr_sms_bm_idx as $row) {
                        $sms_limit_start_time = element('sms_limit_start_hour', $input)[$i] . ':' . element('sms_limit_start_min', $input)[$i] . ':00';
                        $sms_limit_end_time = element('sms_limit_end_hour', $input)[$i] . ':' . element('sms_limit_end_min', $input)[$i] . ':59';
                        $is_add_board_info = $this->addProfessorBoardInfo([
                            'prof_idx' => $prof_idx,
                            'sms_bm_idx' => $row,
                            'sms_limit_start_time' => $sms_limit_start_time,
                            'sms_limit_end_time' => $sms_limit_end_time,
                            'sms_send_tel' => element('sms_send_tel', $input)[$i],
                            'sms_receive_tel' => element('sms_receive_tel', $input)[$i],
                            'sms_content' => element('sms_content', $input)[$i],
                            'is_sms_use' => element('is_sms_use', $input)[$i]
                        ]);
                        if ($is_add_board_info !== true) {
                            throw new \Exception($is_add_board_info);
                        }
                        $i++;
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
     * 교수 사용게시판 JSON 데이터 리턴
     * @param array $arr_use_board
     * @return string
     */
    private function _getUseBoardJson($arr_use_board)
    {
        $results = [];
        foreach ($this->_bm_idx as $bm_idx) {
            $results[][$bm_idx] = in_array($bm_idx, (array) $arr_use_board) === true ? 'Y' : 'N';
        }

        return json_encode($results);
    }

    /**
     * 교수 참조자료 데이터 저장
     * @param array $input [폼 참조 데이터 배열]
     * @param array $arr_string_refer [등록된 이미지를 제외한 참조 데이터 배열, ReferIdx => ReferType]
     * @param int $prof_idx [교수식별자]
     * @param array $opt_input [옵션코드 폼 데이터 배열]
     * @return bool|string
     */
    private function _replaceProfessorRefer($input, $arr_string_refer, $prof_idx, $opt_input = [])
    {
        try {
            $admin_idx = $this->session->userdata('admin_idx');
            $reg_ip = $this->input->ip_address();

            foreach ($input as $key => $value) {
                if (in_array($key, $arr_string_refer) === true) {
                    $data = [
                        'ReferValue' => $value,
                        'OptionCode' => element($key . '_opt_code', $opt_input),
                        'UpdAdminIdx' => $admin_idx
                    ];

                    $_refer_idx = array_search($key, $arr_string_refer);
                    if ($_refer_idx !== false) {
                        if ($this->_conn->set($data)->where('ReferIdx', $_refer_idx)->where('ProfIdx', $prof_idx)->update($this->_table['professor_reference']) === false) {
                            throw new \Exception('참조 데이터 수정에 실패했습니다.');
                        }
                    }
                } else {
                    if (empty($value) === false) {
                        $data = [
                            'ProfIdx' => $prof_idx,
                            'ReferType' => $key,
                            'ReferValue' => $value,
                            'OptionCode' => element($key . '_opt_code', $opt_input),
                            'RegAdminIdx' => $admin_idx,
                            'RegIp' => $reg_ip
                        ];

                        if ($this->_conn->set($data)->insert($this->_table['professor_reference']) === false) {
                            throw new \Exception('참조 데이터 등록에 실패했습니다.');
                        }
                    }
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 강사료 정산 데이터 저장
     * @param array $input
     * @param array $arr_del_prof_calc_idx [삭제할 강사료 정산 식별자 배열]
     * @param $prof_idx
     * @return bool|string
     */
    private function _replaceProfessorCalcRate($input, $arr_del_prof_calc_idx, $prof_idx)
    {
        try {
            $admin_idx = $this->session->userdata('admin_idx');
            $reg_ip = $this->input->ip_address();

            // 강사료 정산 등록/수정
            foreach ($input['learn_pattern_ccd'] as $idx => $learn_pattern_ccd) {
                $prof_calc_idx = element($idx, $input['prof_calc_idx']);
                $cal_rate = element($idx, $input['calc_rate']);
                $contrib_rate = element($idx, $input['contrib_rate']);
                $apply_start_date = element($idx, $input['apply_start_date']);
                $apply_end_date = element($idx, $input['apply_end_date']);

                // 필수 정보가 모두 있을 경우만 등록/수정
                if (strlen($cal_rate) > 0 && strlen($contrib_rate) > 0 && empty($apply_start_date) === false && empty($apply_end_date) === false) {
                    if (empty($prof_calc_idx) === true) {
                        // 데이터 등록
                        $data = [
                            'ProfIdx' => $prof_idx,
                            'LearnPatternCcd' => $learn_pattern_ccd,
                            'ApplyStartDatm' => $apply_start_date . ' 00:00:00',
                            'ApplyEndDatm' => $apply_end_date . ' 23:59:59',
                            'CalcRate' => $cal_rate,
                            'ContribRate' => $contrib_rate,
                            'CalcMemo' => element($idx, $input['calc_memo'], ''),
                            'RegAdminIdx' => $admin_idx,
                            'RegIp' => $reg_ip
                        ];

                        if ($this->_conn->set($data)->insert($this->_table['professor_calculate_rate']) === false) {
                            throw new \Exception('강사료 정산 데이터 등록에 실패했습니다.');
                        }
                    } else {
                        // 데이터 수정
                        $data = [
                            'ApplyStartDatm' => $apply_start_date . ' 00:00:00',
                            'ApplyEndDatm' => $apply_end_date . ' 23:59:59',
                            'CalcRate' => $cal_rate,
                            'ContribRate' => $contrib_rate,
                            'CalcMemo' => element($idx, $input['calc_memo'], ''),
                            'UpdAdminIdx' => $admin_idx
                        ];

                        if ($this->_conn->set($data)->where('ProfCalcIdx', $prof_calc_idx)->where('ProfIdx', $prof_idx)->update($this->_table['professor_calculate_rate']) === false) {
                            throw new \Exception('강사료 정산 데이터 수정에 실패했습니다.');
                        }
                    }
                }
            }

            // 강사료 정산 데이터 삭제
            if (count($arr_del_prof_calc_idx) > 0) {
                $is_update = $this->_conn->set([
                    'IsStatus' => 'N',
                    'UpdAdminIdx' => $admin_idx
                ])->where_in('ProfCalcIdx', $arr_del_prof_calc_idx)->where('ProfIdx', $prof_idx)->update($this->_table['professor_calculate_rate']);

                if ($is_update === false) {
                    throw new \Exception('강사료 정산 데이터 삭제에 실패했습니다.');
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 교수 영역 이미지 업로드 및 데이터 저장
     * @param array $arr_attach_refer [등록된 교수영역 이미지 타입 배열, ReferIdx => ReferType]
     * @param array $arr_attach_value [등록된 교수영역 이미지 값 배열, ReferIdx => ReferValue]
     * @param $prof_idx
     * @return bool|string
     */
    private function _attachProfessorImg($arr_attach_refer, $arr_attach_value, $prof_idx)
    {
        try {
            $this->load->library('upload');
            $upload_sub_dir = config_item('upload_prefix_dir') . '/professor/' . $prof_idx;
            $bak_uploaded_files = [];
            $admin_idx = $this->session->userdata('admin_idx');
            $reg_ip = $this->input->ip_address();

            // 업로드 파일명
            $attach_img_names = [];
            array_map(function ($val) use (&$attach_img_names, $arr_attach_refer, $prof_idx) {
                $attach_img_postfix = (in_array($val, $arr_attach_refer) === true) ? '_' . time() : '';
                $attach_img_names[] = str_replace('_img', '_' . $prof_idx, $val) . $attach_img_postfix;
            }, $this->_refer_type['attach']);

            // 이미지 업로드
            $uploaded = $this->upload->uploadFile('img', $this->_refer_type['attach'], $attach_img_names, $upload_sub_dir, 'overwrite:false');
            if (is_array($uploaded) === false) {
                throw new \Exception($uploaded);
            }

            foreach ($uploaded as $idx => $attach_imgs) {
                if (count($attach_imgs) > 0) {
                    $_refer_type = $this->_refer_type['attach'][$idx];
                    if (in_array($_refer_type, $arr_attach_refer) === true) {
                        $data = [
                            'ReferValue' => $this->upload->_upload_url . $upload_sub_dir . '/' . $attach_imgs['file_name'],
                            'UpdAdminIdx' => $admin_idx
                        ];

                        $_refer_idx = array_search($_refer_type, $arr_attach_refer);
                        if ($_refer_idx !== false) {
                            if ($this->_conn->set($data)->where('ReferIdx', $_refer_idx)->where('ProfIdx', $prof_idx)->update($this->_table['professor_reference']) === false) {
                                throw new \Exception('교수 영역 이미지 수정에 실패했습니다.');
                            }
                        }

                        // 기존 업로드된 첨부 이미지 정보
                        $bak_uploaded_files[] = $arr_attach_value[$_refer_idx];
                    } else {
                        $data = [
                            'ProfIdx' => $prof_idx,
                            'ReferType' => $this->_refer_type['attach'][$idx],
                            'ReferValue' => $this->upload->_upload_url . $upload_sub_dir . '/' . $attach_imgs['file_name'],
                            'RegAdminIdx' => $admin_idx,
                            'RegIp' => $reg_ip
                        ];

                        if ($this->_conn->set($data)->insert($this->_table['professor_reference']) === false) {
                            throw new \Exception('교수 영역 이미지 등록에 실패했습니다.');
                        }
                    }
                }
            }

            // 수정된 첨부 이미지 백업
            $is_bak_uploaded_file = $this->upload->bakUploadedFile(array_unique($bak_uploaded_files), true);
            if ($is_bak_uploaded_file !== true) {
                throw new \Exception($is_bak_uploaded_file);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 교수 배너 이미지 업로드 및 데이터 저장
     * @param array $input [폼 참조 데이터 배열]
     * @param array $arr_bnr_data [기 등록된 배너 데이터 배열]
     * @param int $prof_idx [교수식별자]
     * @return bool|string
     */
    private function _attachProfessorBannerImg($input, $arr_bnr_data, $prof_idx)
    {
        try {
            $this->load->library('upload');
            $upload_sub_dir = config_item('upload_prefix_dir') . '/professor/' . $prof_idx;
            $bak_uploaded_files = [];
            $admin_idx = $this->session->userdata('admin_idx');
            $reg_ip = $this->input->ip_address();

            // 텍스트 input, 업로드 파일 input, 업로드 파일명
            $string_inputs = [];
            $attach_img_inputs = [];
            $attach_img_names = [];

            foreach ($this->_bnr_type as $type => $cnt) {
                for($i = 1; $i <= $cnt; $i++) {
                    $attach_img_postfix = empty(array_get($arr_bnr_data, $type . '.' . $i)) === false ? '_' . time() : '';
                    $attach_img_inputs[] = 'bnr_img_' . $type . '_' . $i;
                    $attach_img_names[] = 'bnr_img_' . $type . '_' . $i . '_' . $prof_idx . $attach_img_postfix;
                    $string_inputs[$type . '.' . $i] = [
                        'link_type' => array_get($input, 'link_type_' . $type . '_' . $i, 'self'),
                        'link_url' => array_get($input, 'link_url_' . $type . '_' . $i),
                    ];
                }
            }

            // 이미지 업로드
            $uploaded = $this->upload->uploadFile('img', $attach_img_inputs, $attach_img_names, $upload_sub_dir, 'overwrite:false');
            if (is_array($uploaded) === false) {
                throw new \Exception($uploaded);
            }

            $uploaded_idx = 0;
            foreach ($string_inputs as $key => $arr_input) {
                if (empty(array_get($arr_bnr_data, $key)) === false) {
                    // 배너 식별자
                    $bnr_idx = array_get($arr_bnr_data, $key . '.BnrIdx');

                    if (empty($bnr_idx) === false) {
                        $data = [
                            'LinkType' => element('link_type', $arr_input),
                            'LinkUrl' => element('link_url', $arr_input),
                            'UpdAdminIdx' => $admin_idx
                        ];

                        if (empty($uploaded[$uploaded_idx]) === false) {
                            $data = array_merge($data, [
                                'BnrImgPath' => $this->upload->_upload_url . $upload_sub_dir . '/',
                                'BnrImgName' => $uploaded[$uploaded_idx]['file_name'],
                            ]);

                            // 기존 업로드된 첨부 이미지 정보
                            $bak_uploaded_files[] = array_get($arr_bnr_data, $key . '.BnrImgPath') . array_get($arr_bnr_data, $key . '.BnrImgName');
                        }

                        if ($this->_conn->set($data)->where('BnrIdx', $bnr_idx)->where('ProfIdx', $prof_idx)->update($this->_table['professor_banner']) === false) {
                            throw new \Exception('교수 배너 수정에 실패했습니다.');
                        }
                    }
                } else {
                    if (empty($uploaded[$uploaded_idx]) === false) {
                        $data = [
                            'ProfIdx' => $prof_idx,
                            'BnrType' => str_first_pos_before($key, '.'),
                            'BnrNum' => str_first_pos_after($key, '.'),
                            'BnrImgPath' => $this->upload->_upload_url . $upload_sub_dir . '/',
                            'BnrImgName' => $uploaded[$uploaded_idx]['file_name'],
                            'LinkType' => element('link_type', $arr_input),
                            'LinkUrl' => element('link_url', $arr_input),
                            'RegAdminIdx' => $admin_idx,
                            'RegIp' => $reg_ip
                        ];

                        if ($this->_conn->set($data)->insert($this->_table['professor_banner']) === false) {
                            throw new \Exception('교수 배너 등록에 실패했습니다.');
                        }
                    }
                }

                $uploaded_idx++;
            }

            // 수정된 첨부 이미지 백업
            $is_bak_uploaded_file = $this->upload->bakUploadedFile(array_unique($bak_uploaded_files), true);
            if ($is_bak_uploaded_file !== true) {
                throw new \Exception($is_bak_uploaded_file);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 교수 카테고리 과목 연결 데이터 저장
     * @param $arr_subject_mapping_code
     * @param $prof_idx
     * @return bool|string
     */
    private function _replaceProfessorSubjectMapping($arr_subject_mapping_code, $prof_idx)
    {
        $_table = $this->_table['professor_r_subject_r_category'];
        $_arr_condition = ['ProfIdx' => $prof_idx, 'IsStatus' => 'Y'];

        try {
            $arr_subject_mapping_code = (is_null($arr_subject_mapping_code) === true) ? [] : array_values(array_unique($arr_subject_mapping_code));
            $admin_idx = $this->session->userdata('admin_idx');

            // 기존 설정된 과목 연결 데이터 조회
            $data = $this->_conn->getListResult($_table, 'PcIdx, CateCode, SubjectIdx, concat(CateCode, "_", SubjectIdx) as SubjectMappingCode', ['EQ' => $_arr_condition]);
            if (count($data) > 0) {
                $data = array_pluck($data, 'SubjectMappingCode', 'PcIdx');

                // 기존 등록된 과목 연결 데이터 삭제 처리 (전달된 카테고리_과목 식별자 중에 기 등록된 카테고리_과목 식별자가 없다면 삭제 처리)
                $arr_delete_subject_mapping_code = array_diff($data, $arr_subject_mapping_code);
                if (count($arr_delete_subject_mapping_code) > 0) {
                    $is_update = $this->_conn->set([
                        'IsStatus' => 'N',
                        'UpdAdminIdx' => $admin_idx
                    ])->where_in('PcIdx', array_keys($arr_delete_subject_mapping_code))->where('ProfIdx', $prof_idx)->update($_table);

                    if ($is_update === false) {
                        throw new \Exception('기 설정된 카테고리 정보 수정에 실패했습니다.');
                    }
                }
            }

            // 신규 등록 (기 등록된 카테고리_과목 식별자 중에 전달된 카테고리_과목 식별자가 없다면 등록 처리)
            $arr_insert_subject_mapping_code = array_diff($arr_subject_mapping_code, $data);
            foreach ($arr_insert_subject_mapping_code as $subject_mapping_code) {
                $_arr_subject_mapping_code = explode('_', $subject_mapping_code);

                $is_insert = $this->_conn->set([
                    'ProfIdx' => $prof_idx,
                    'CateCode' => element('0', $_arr_subject_mapping_code),
                    'SubjectIdx' => element('1', $_arr_subject_mapping_code),
                    'RegAdminIdx' => $admin_idx,
                    'RegIp' => $this->input->ip_address()
                ])->insert($_table);

                if ($is_insert === false) {
                    throw new \Exception('카테고리 정보 등록에 실패했습니다.');
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 교수 카테고리 과목 연결 데이터 정렬변경 수정
     * @param array $params
     * @return array|bool
     */
    public function modifyProfessorSubjectMappingReorder($params = [])
    {
        $this->_conn->trans_begin();

        try {
            if (count($params) < 1) {
                throw new \Exception('필수 파라미터 오류입니다.');
            }

            $admin_idx = $this->session->userdata('admin_idx');

            foreach ($params as $subject_mapping_code => $order_num) {
                $arr_subject_mapping_code = explode('_', $subject_mapping_code);

                $is_update = $this->_conn->set('OrderNum', $order_num)->set('UpdAdminIdx', $admin_idx)
                    ->where('PcIdx', $arr_subject_mapping_code[0])->where('ProfIdx', $arr_subject_mapping_code[1])
                    ->update($this->_table['professor_r_subject_r_category']);

                if ($is_update === false) {
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

    /**
     * 교수영역 이미지 삭제
     * @param string $img_type [교수영역 이미지 input명]
     * @param int $prof_idx [교수식별자]
     * @return array|bool
     */
    public function removeImg($img_type, $prof_idx)
    {
        $this->_conn->trans_begin();

        try {
            // 데이터 조회
            $row = $this->_conn->getFindResult($this->_table['professor_reference'], 'ReferIdx, ReferValue', [
                'EQ' => ['ProfIdx' => $prof_idx, 'ReferType' => $img_type, 'IsStatus' => 'Y']    
            ]);
            if (empty($row) === true) {
                throw new \Exception('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            // 이미지 백업
            $this->load->library('upload');
            $bak_uploaded_file = $row['ReferValue'];
            $is_bak_uploaded_file = $this->upload->bakUploadedFile($bak_uploaded_file, true);
            if ($is_bak_uploaded_file !== true) {
                throw new \Exception($is_bak_uploaded_file);
            }

            // 데이터 수정
            $is_update = $this->_conn->set('IsStatus', 'N')->set('UpdAdminIdx', $this->session->userdata('admin_idx'))
                ->where('ReferIdx', $row['ReferIdx'])->update($this->_table['professor_reference']);
            if ($is_update === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 교수배너 이미지 삭제
     * @param string $img_type [배너타입_배너순번, bnr_img_{bnr_type}_{bnr_num}]
     * @param int $prof_idx [교수식별자]
     * @return array|bool
     */
    public function removeBannerImg($img_type, $prof_idx)
    {
        $this->_conn->trans_begin();

        try {
            $bnr_keys = explode('_', str_first_pos_after($img_type, 'bnr_img_'));

            // 데이터 조회
            $row = $this->_conn->getFindResult($this->_table['professor_banner'], 'BnrIdx, BnrImgPath, BnrImgName', [
                'EQ' => ['ProfIdx' => $prof_idx, 'BnrType' => $bnr_keys[0], 'BnrNum' => $bnr_keys[1], 'IsStatus' => 'Y']
            ]);
            if (empty($row) === true) {
                throw new \Exception('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            // 이미지 백업
            $this->load->library('upload');
            $bak_uploaded_file = $row['BnrImgPath'] . $row['BnrImgName'];
            $is_bak_uploaded_file = $this->upload->bakUploadedFile($bak_uploaded_file, true);
            if ($is_bak_uploaded_file !== true) {
                throw new \Exception($is_bak_uploaded_file);
            }

            // 데이터 수정
            $is_update = $this->_conn->set('IsStatus', 'N')->set('UpdAdminIdx', $this->session->userdata('admin_idx'))
                ->where('BnrIdx', $row['BnrIdx'])->update($this->_table['professor_banner']);
            if ($is_update === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 교수 과목 조회
     * @param $prof_idx
     * @return array
     */
    public function getProfessorSubjectArray($prof_idx)
    {
        $column = 'S.SubjectIdx, PS.SubjectName';

        $from = '
            FROM (
                SELECT SubjectIdx
                FROM ' . $this->_table['professor_r_subject_r_category'] . '
                WHERE ProfIdx = "'.$prof_idx.'" AND IsStatus = "Y"
                GROUP BY SubjectIdx
            ) AS S
            INNER JOIN ' . $this->_table['subject'] . ' AS PS ON S.SubjectIdx = PS.SubjectIdx';

        // 쿼리 실행
        $result = $this->_conn->query('select ' . $column . $from)->result_array();

        return array_pluck($result, 'SubjectName', 'SubjectIdx');
    }

    /**
     * 교수별 게시판정보 데이터 조회
     * @param $prof_idx
     * @return array
     */
    public function listProfessorBoardInfo($prof_idx)
    {
        $column = "
            PBI.PbiIdx, PBI.ProfIdx, PBI.BmIdx, PBI.SmsLimitStartTime, PBI.SmsLimitEndTime, PBI.SmsSendTel, PBI.SmsReceiveTel, PBI.SmsContent, 
            PBI.IsSmsUse, PBI.IsStatus, PBI.RegDatm, PBI.RegAdminIdx, PBI.RegIp, PBI.UpdDatm, PBI.UpdAdminIdx,
            DATE_FORMAT(PBI.SmsLimitStartTime, '%H') AS SmsLimitStartHour, DATE_FORMAT(PBI.SmsLimitStartTime, '%i') AS SmsLimitStartMin,                    
            DATE_FORMAT(PBI.SmsLimitEndTime, '%H') AS SmsLimitEndHour, DATE_FORMAT(PBI.SmsLimitEndTime, '%i') AS SmsLimitEndMin
        ";
        $from = "
            FROM {$this->_table['professor_board_info']} PBI
        ";
        $where = " WHERE PBI.ProfIdx = ? AND PBI.IsStatus = 'Y'";
        $order_by_offset_limit = " ORDER BY PBI.ProfIdx ASC";

        $data = $this->_conn->query('SELECT ' . $column . $from . $where . $order_by_offset_limit, [$prof_idx])->result_array();

        $result = [];
        foreach ($this->_bm_idx as $bm_key => $bm_val) {
            $result[$bm_key] = [];
            foreach ($data as $row) {
                if($bm_val == $row['BmIdx']) {
                    $result[$bm_key] = $row;
                }
            }
        }

        return $result;
    }

    /**
     * 교수별 게시판정보 삭제
     * @param $prof_idx
     * @return array|bool
     */
    public function removeProfessorBoardInfo($prof_idx)
    {
        try {
            if(empty($prof_idx) === true) {
                throw new \Exception('필수 파라메터 누락 오류');
            }

            $is_update = $this->_conn->set('IsStatus', 'N')->set('UpdAdminIdx', $this->session->userdata('admin_idx'))
                ->where('ProfIdx', $prof_idx)->update($this->_table['professor_board_info']);
            if ($is_update === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

        } catch (\Exception $e) {
            return error_result($e);
        }

        return true;
    }

    /**
     * 교수별 게시판정보 등록
     * @param array $input
     * @return array|bool
     */
    public function addProfessorBoardInfo($input = [])
    {
        try {
            $prof_idx = element('prof_idx', $input);
            $bm_idx = element('sms_bm_idx', $input);

            if(empty($prof_idx) === true || empty($bm_idx) === true) {
                throw new \Exception('필수 파라메터 누락 오류');
            }

            $data = [
                'ProfIdx' => $prof_idx,
                'BmIdx' => $bm_idx,
                'SmsLimitStartTime' => element('sms_limit_start_time', $input),
                'SmsLimitEndTime' => element('sms_limit_end_time', $input),
                'SmsSendTel' => element('sms_send_tel', $input),
                'SmsReceiveTel' => element('sms_receive_tel', $input),
                'SmsContent' => element('sms_content', $input),
                'IsSmsUse' => element('is_sms_use', $input),
                'IsStatus' => 'Y',
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ];

            if ($this->_conn->set($data)->insert($this->_table['professor_board_info']) === false) {
                throw new \Exception('교수 게시판정보 등록에 실패했습니다.');
            }

        } catch (\Exception $e) {
            return error_result($e);
        }
        return true;
    }
}
