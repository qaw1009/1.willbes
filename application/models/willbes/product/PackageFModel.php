<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/willbes/product/ProductFModel.php';

/**
 * 패키지 전체 적용 - 운영자패키지(추천,선택), 사용자패키지, 기간제패키지, 학원종합반
 * Class PackageFModel
 */
class PackageFModel extends ProductFModel
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 패키지 연결 하위 강좌 목록 추출
     * @param $learn_pattern
     * @param array $prod_code
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function subListProduct($learn_pattern, $prod_code=[], $arr_condition=[], $limit = null, $offset = null, $order_by = [])
    {
        $prod_code = is_array($prod_code) ? $prod_code : array($prod_code);

        $column =  'A.ProdCode As Parent_ProdCode, B.IsEssential, B.SubGroupName, B.OrderNum, C.*';

        //학원종합반 일경우.
        if($learn_pattern === 'off_pack_lecture') {
            $_join_table = $this->_table['off_lecture'];        //단과반 뷰
            $column = $column.',fn_product_content(C.ProdCode, "633002") as Content
                                , fn_product_content(C.ProdCode, "633005") as Content5
                                , fn_product_content(C.ProdCode, "633006") as Content6
                                , fn_product_content(C.ProdCode, "633007") as Content7
             ';
        } else {
            $_join_table = $this->_table['on_lecture'];        //단강좌 뷰
        }

        $arr_condition = array_merge_recursive($arr_condition,[
            'IN' => ['A.ProdCode' => $prod_code],
            'EQ' => ['B.IsStatus'=>'Y', 'C.wIsUse'=>'Y'],         //패키지 하위 과정이므로 특정 조건을 제외하고 상품에 관계 없이 노출
        ]);

        $from = ' 
            from
                '.$this->_table[$learn_pattern].' A
                join lms_product_r_sublecture B on A.ProdCode = B.ProdCode	
                join '.$_join_table.' C on B.ProdCodeSub = C.ProdCode ';

        $order_by = array_merge($order_by, [
            'A.ProdCode, B.OrderNum'=>'ASC'
        ]);

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);
        $order_by = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        //echo 'Select straight_join '. $column. $from. $where .$order_by;
        return $this->_conn->query('Select straight_join '. $column. $from. $where .$order_by)->result_array();
    }


    /**
     * 기간제패키지 선택형 일 경우 과목+교수별 그룹 추출
     * @param $learn_pattern
     * @param array $prod_code
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function subListProductGroupBy($learn_pattern, $prod_code=[], $arr_condition=[], $limit = null, $offset = null, $order_by = []) {
        $prod_code = is_array($prod_code) ? $prod_code : array($prod_code);

        $column =  'B.IsEssential, B.SubGroupName 
	                    ,C.SubjectIdx,C.SubjectName,C.wProfName,C.ProfNickName,C.ProfIdx,C.ProfReferData';

        $_join_table = $this->_table['on_lecture'];        //단강좌 뷰

        $arr_condition = array_merge_recursive($arr_condition,[
            'IN' => ['A.ProdCode' => $prod_code],
            'EQ' => ['B.IsStatus'=>'Y', 'C.wIsUse'=>'Y'],         //패키지 하위 과정이므로 특정 조건을 제외하고 상품에 관계 없이 노출
        ]);

        $from = ' 
            from
                '.$this->_table[$learn_pattern].' A
                join lms_product_r_sublecture B on A.ProdCode = B.ProdCode	
                join '.$_join_table.' C on B.ProdCodeSub = C.ProdCode ';

        $order_by = array_merge($order_by, [
            'B.IsEssential' => 'DESC'
            ,'B.SubGroupName' => 'DESC'
            ,'C.SubjectName, C.wProfName' => 'ASC'
        ]);

        $group_by = ' Group by '.$column;

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);
        $order_by = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        //echo 'Select straight_join '. $column. $from. $where .$group_by .$order_by;
        //return $this->_conn->query('Select straight_join '. $column. $from. $where .$group_by .$order_by)->result_array();

        $result = $this->_conn->query('Select straight_join '. $column. $from. $where .$group_by .$order_by)->result_array();


        /************************ 필수 과목 교수 갯수 추출 : 뷰에서 처리용 *****************************/
        $column_subject = ' IsEssential, SubjectName, SubjectIdx, Count(*) as subjectCount ';

        $from_subject = '
            from 
             (
                      Select straight_join '. $column. $from. $where. $group_by.
            ') mm  
        ';

        $group_by_subject = ' Group by IsEssential, SubjectName, SubjectIdx';
        //echo 'Select '. $column_subject. $from_subject. $group_by_subject;
        $result_subject  = $this->_conn->query('Select '. $column_subject. $from_subject. $group_by_subject)->result_array();

        return array($result, $result_subject);
    }
}
