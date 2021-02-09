<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthGiveModel extends WB_Model
{
    protected $_table = [
        'auth' => 'lms_auth_give',
        'auth_product' => 'lms_auth_give_r_product',
        'site' => 'lms_site',
        'cate' => 'lms_sys_category',
        'code' => 'lms_sys_code',
        'admin' => 'wbs_sys_admin',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    public function listAuthGive($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';

        } else {

            $column = 'Straight_JOIN
                             A.*
                            ,if(A.StudyPeriodType = \'P\', \'상품 수강기간\' , \'별도 수강기간\') as StudyPeriodTypeName
                            ,if(A.IsAutoApproval =\'Y\', \'자동승인\' , \'수동승인\') as IsAutoApprovalName
                            ,B.SiteName
                            ,C.CcdName as PayRouteCcd_Name
                            ,tmp.CateInfo
                            ,D.wAdminName as RegAdminName
                            ,E.wAdminName as UpdAdminName
            ';

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
                    from
                        lms_auth_give A
                        join lms_site B on A.SiteCode = B.SiteCode and B.IsStatus=\'Y\'
                        left join lms_sys_code C on A.PayRouteCcd = C.Ccd and C.IsStatus=\'Y\'
                        left join
                            (
                                select 
                                    aa.AgIdx
                                    ,CONCAT(\'[\', GROUP_CONCAT(JSON_OBJECT(bb.CateCode, bb.CateName) order by bb.CateCode ),\']\') as CateInfo
                                from
                                    lms_auth_give aa
                                    join lms_sys_category bb on bb.CateCode REGEXP(replace(aa.CateCodes,\',\', \'|\')) and bb.IsStatus=\'Y\'
                                group by aa.AgIdx
                            ) tmp on tmp.AgIdx = A.AgIdx
                        left join wbs_sys_admin D on A.RegAdminIdx = D.wAdminIdx and D.wIsStatus=\'Y\'
                        left join wbs_sys_admin E on A.UpdAdminIdx = E.wAdminIdx and E.wIsStatus=\'Y\'
                    where
                        A.IsStatus=\'Y\'
        ';
        $arr_condition = array_merge_recursive($arr_condition, [
            'IN' => [
                'A.SiteCode' => get_auth_site_codes()
            ]
        ]);

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count) ? $query->row(0)->numrows : $query->result_array();
    }

    public function listSubProduct($ag_idx)
    {

        $column = '
                    Straight_Join
                    S.*
                    ,A.ProdCode,A.ProdName,A.IsUse
                    ,Aa.CcdName as SaleStatusCcd_Name
                    ,B.MultipleApply
                    ,Ba.CourseName,Bb.SubjectName,Bc.CcdName as LearnPatternCcd_Name
                    ,Bd.CcdName as LecTypeCcd_Name
                    ,Be.wProgressCcd_Name,Be.wUnitCnt, Be.wUnitLectureCnt, Be.wScheduleCount
                    ,C.CateCode
                    ,Ca.CateName, Cb.CateName as CateName_Parent
                    ,D.SalePrice, D.RealSalePrice
                    ,E.wProfName_String';

        $from = '
                    from
                        lms_auth_give_r_product S
                        join lms_product A on S.ProdCode = A.ProdCode  and A.IsStatus=\'Y\'
                        left outer join lms_sys_code Aa on A.SaleStatusCcd = Aa.Ccd and Aa.IsStatus=\'Y\'
                            join lms_product_lecture B on A.ProdCode = B.ProdCode
                                left outer join lms_product_course Ba on B.CourseIdx = Ba.CourseIdx and Ba.IsStatus=\'Y\'
                                left outer join lms_product_subject Bb on B.SubjectIdx = Bb.SubjectIdx and Bb.IsStatus=\'Y\'
                                left outer join lms_sys_code Bc on B.LearnPatternCcd = Bc.Ccd and Bc.IsStatus=\'Y\'
                                left outer join lms_sys_code Bd on B.LecTypeCcd = Bd.Ccd
                                join wbs_cms_lecture_basics Be on B.wLecIdx = Be.wLecIdx
                            join lms_product_r_category C on A.ProdCode = C.ProdCode and C.IsStatus=\'Y\'
                            join lms_sys_category Ca on C.CateCode = Ca.CateCode  and Ca.IsStatus=\'Y\'
                            left outer join lms_sys_category Cb on Ca.ParentCateCode = Cb.CateCode
                            left outer join lms_product_sale D on A.ProdCode = D.ProdCode and D.SaleTypeCcd=\'613001\' and D.IsStatus=\'Y\'	#Pc+모바일 판매가만 추출
                            join vw_product_r_professor_concat_repr E on A.ProdCode = E.ProdCode
                        where S.IsStatus=\'Y\' 
        ';

        $arr_condition = [
            'EQ' => [
                'S.AgIdx' => $ag_idx
            ]
        ];

        $order_by = [
            'S.GroupNum' => 'asc',
            'S.OrderNum' => 'asc',
            'A.ProdCode' => 'asc'
        ];

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);
        $order_by = $this->_conn->makeOrderBy()->getMakeOrderBy();

        return $this->_conn->query('select ' . $column . $from . $where . $order_by)->result_array();
    }

    /**
     * 인증 등록
     * @param array $input
     * @return array|bool
     */
    public function addAuthGive($input = [])
    {
        $this->_conn->trans_begin();
        try {

            $input_data = $this->_inputCommon($input);

            if(is_array($input_data) === false) {
                throw new \Exception($input_data);
            }

            if($this->_conn->set($input_data)->insert($this->_table['auth']) === false) {
                throw new \Exception('인증정보 등록에 실패했습니다.');
            }

            $ag_idx = $this->_conn->insert_id();

            $sub_result = $this->_replaceSubProduct($ag_idx, $input);
            if($sub_result !== true) {
                throw new \Exception($sub_result);
            }

            $this->_conn->trans_commit();

        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 인증 수정
     * @param array $input
     * @return array|bool
     */
    public function modifyAuthGive($input = [])
    {
        $this->_conn->trans_begin();
        try {
            $input_data = $this->_inputCommon($input);

            $ag_idx = element('idx', $input);
            if(empty($ag_idx)) {
                throw new \Exception('식별자가 존재하지 않습니다.');
            }

            if(is_array($input_data) === false) {
                throw new \Exception($input_data);
            }

            if($this->_conn->set($input_data)->where('AgIdx', $ag_idx)->update($this->_table['auth']) === false) {
                throw new \Exception('인증정보 수정에 실패했습니다.');
            }

            $sub_result = $this->_replaceSubProduct($ag_idx, $input);
            if($sub_result !== true) {
                throw new \Exception($sub_result);
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 입력데이터
     * @param array $input
     * @return array|string
     */
    protected function _inputCommon($input = [])
    {
        try {
            $cate_codes = implode(',', element('cate_code', $input));

            $input_data = [
                'CateCodes' => $cate_codes,
                'Title' => element('Title', $input),
                'AuthStartDate' => element('AuthStartDate', $input),
                'AuthEndDate' => element('AuthEndDate', $input),
                'PayRouteCcd' => element('PayRouteCcd', $input),
                'StudyPeriodType' => element('StudyPeriodType', $input),
                'StudyPeriod' => ( empty(element('StudyPeriod', $input)) ? 0 : element('StudyPeriod', $input) ),
                'LimitSelectCnt' => ( empty(element('LimitSelectCnt', $input)) ? 0 : element('LimitSelectCnt', $input) ),
                'IsAutoApproval' => element('IsAutoApproval', $input),
                'IsUseSms' => element('IsUseSms', $input),
                'SmsContent' => element('SmsContent', $input),
                'SendTel' => element('SendTel', $input),
                'Memo' => element('Memo', $input),
                'IsUse' => element('IsUse', $input),
            ];

            $method = element('_method', $input);

            if($method === 'POST') {
                $input_data = array_merge_recursive($input_data, [
                    'SiteCode' => element('site_code', $input),
                    'RegAdminIdx' => $this->session->userdata('admin_idx')
                ]);

            } else if($method === 'PUT') {
                $input_data = array_merge_recursive($input_data, [
                    'UpdAdminIdx' => $this->session->userdata('admin_idx')
                ]);
            }

            if(empty(element('AgCode', $input))) {
                $ag_code = $this->_conn->query('select '.' (ifnull(Max(AgCode),1000)+1) as NextAgCode from '. $this->_table['auth'] )->row(0)->NextAgCode;
            } else {

                if(($this->_conn->query('select '.' Count(*) as CheckCount from '. $this->_table['auth'] .' where AgIdx <> ? and AgCode = ?', [element('idx', $input), element('AgCode', $input)])->row(0)->CheckCount) > 0) {
                    throw new \Exception('이미 존재하는 인증코드입니다. 다른 인증코드로 입력하여 주십시오.');
                }
                $ag_code = element('AgCode', $input);
            }
            $input_data = array_merge_recursive($input_data, [
                'AgCode' => $ag_code
            ]);

        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return $input_data;
    }

    /**
     * 강좌연결 등록
     * @param $ag_idx
     * @param array $input
     * @return bool|string
     */
    protected function _replaceSubProduct($ag_idx, $input = [])
    {
        try {
            if($this->_conn->set(['IsStatus' => 'N', 'UpdAdminIdx'=>$this->session->userdata('admin_idx')])->where(['AgIdx' => $ag_idx, 'IsStatus' => 'Y'])->update($this->_table['auth_product']) === false) {
                throw new \Exception('기존 강좌등록 정보 수정에 실패했습니다.');
            }

            $prod_code = element('ProdCode', $input);
            $group_num = element('SubGroupName', $input);
            $order_num = element('OrderNum', $input);
            $is_essential = element('IsEssential', $input);

            if(empty($prod_code) === false) {
                for($i=0; $i<count($prod_code); $i++) {
                    $data = [
                        'AgIdx' => $ag_idx,
                        'ProdCode' => $prod_code[$i],
                        'IsEssential' => $is_essential[$i],
                        'GroupNum' => $group_num[$i],
                        'OrderNum' => $order_num[$i],
                        'RegAdminIdx' => $this->session->userdata('admin_idx')
                    ];

                    if($this->_conn->set($data)->insert($this->_table['auth_product']) === false) {
                        throw new \Exception('강좌등록에 실패했습니다.');
                    }
                }
            }

        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }

}