<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LectureModel extends WB_Model
{
    private $_table = [
        'product' => 'lms_product',
        'lecture' => 'lms_product_lecture',
        'category' => 'lms_product_r_category',
        'sample' => 'lms_product_lecture_sample',
        'sale'=>'lms_product_sale',
        'division' => 'lms_Product_Division',
        'memo' => 'lms_Product_Memo',
        'content' => 'lms_Product_Content',
        'sms' => 'lms_Product_Sms',
        'book' => 'lms_Product_R_SaleBook',
        'autofreebie' => 'lms_Product_R_AutoFreebie',
        'autocoupon' => 'lms_Product_R_AutoCoupon',
        'autolecture' => 'lms_Product_R_AutoLecture',
        'sublecture' => 'lms_Product_R_SubLecture',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    public function listLecture($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {

            $column = '
                   A.ProdCode,A.ProdName,A.IsNew,A.IsBest,A.IsUse,A.RegDatm
                    ,Aa.CcdName as SaleStatusCcd_Name,A.SiteCode,Ab.SiteName
                    ,B.CourseIdx,B.SubjectIdx,B.LearnPatternCcd,B.SchoolYear,B.MultipleApply
                    ,Ba.CourseName,Bb.SubjectName,Bc.CcdName as LearnPatternCcd_Name
                    ,Bd.CcdName as LecTypeCcd_Name
                    ,Be.wProgressCcd_Name,Be.wUnitCnt, Be.wUnitLectureCnt
                    ,C.CateCode
                    ,Ca.CateName, Cb.CateName as CateName_Parent
                    ,D.SalePrice, D.SaleRate, D.RealSalePrice
                    ,E.ProfIdx_String,E.wProfName_String
                    ,F.DivisionCount
                    ,0 as CartCnt
                    ,0 as PayIngCnt
                    ,0 as PayEndCnt
                    #,fn_product_professor_name(A.ProdCode) as ProfName_Arr	//검색때문에 vw_product_r_professor_concat 사용
                    ,Z.wAdminName
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
                    from
                        lms_product A
                            left outer join lms_sys_code Aa on A.SaleStatusCcd = Aa.Ccd and Aa.IsStatus=\'Y\'
                            left outer join lms_site Ab on A.SiteCode = Ab.SiteCode
                        join lms_product_lecture B on A.ProdCode = B.ProdCode
                            left outer join lms_product_course Ba on B.CourseIdx = Ba.CourseIdx and Ba.IsStatus=\'Y\'
                            left outer join lms_product_subject Bb on B.SubjectIdx = Bb.SubjectIdx and Bb.IsStatus=\'Y\'
                            left outer join lms_sys_code Bc on B.LearnPatternCcd = Bc.Ccd and Bc.IsStatus=\'Y\'
                            left outer join lms_sys_code Bd on B.LecTypeCcd = Bd.Ccd
                            join wbs_cms_lecture_combine_light Be on B.wLecIdx = Be.wLecIdx and Be.cp_wAdminIdx='. $this->session->userdata('admin_idx') .'
                        join lms_product_r_category C on A.ProdCode = C.ProdCode and C.IsStatus=\'Y\'
                            join lms_sys_category Ca on C.CateCode = Ca.CateCode  and Ca.IsStatus=\'Y\'
                            left outer join lms_sys_category Cb on Ca.ParentCateCode = Cb.CateCode
                        left outer join lms_product_sale D on A.ProdCode = D.ProdCode and D.SaleTypeCcd=\'613001\' and D.IsStatus=\'Y\'	#Pc+모바일 판매가만 추출
                        join vw_product_r_professor_concat E on A.ProdCode = E.ProdCode
                        left outer join (select ProdCode, count(*) as DivisionCount from lms_product_division where IsStatus=\'Y\' group by ProdCode) as F on A.ProdCode = F.ProdCode
                        left outer join wbs_sys_admin Z on A.RegAdminIdx = Z.wAdminIdx
                     where A.IsStatus=\'Y\'
        ';

        // 사이트 권한 추가
        $arr_condition['IN']['A.SiteCode'] = get_auth_site_codes();
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        //echo 'select ' . $column . $from . $where . $order_by_offset_limit;        exit;
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 상품등록정보 추출
     * @param $prodcode
     * @return mixed
     */
    public function findProductForModify($prodcode)
    {
            $column = 'A.*,B.*
                        ,Ba.wLecName,Ba.wCpName,Ba.wShootingCcd_Name,Ba.wProgressCcd_Name,Ba.wMakeYM,Ba.wAttachFile,Ba.wAttachPath
                        ,Ba.wUnitCnt,Ba.wUnitLectureCnt
                        ,C.CateCode,Ca.CateName,Ca.CateRouteName
                        ,D.wAdminName as RegAdminName,E.wAdminName as UpdAdminName';

            $from = '
                        from
                                lms_product A
                                join lms_product_lecture B on A.ProdCode = B.ProdCode
                                    join wbs_cms_lecture_combine Ba on B.wLecIdx = Ba.wLecIdx and Ba.cp_wAdminIdx='. $this->session->userdata('admin_idx') .'
                                join lms_product_r_category C on A.ProdCode = C.ProdCode
                                    join vw_category_concat Ca on C.CateCode = Ca.CateCode
                                left outer join wbs_sys_admin D on A.RegAdminIdx = D.wAdminIdx
	                            left outer join wbs_sys_admin E on A.UpdAdminIdx = E.wAdminIdx
	                    Where A.IsStatus=\'Y\' 
                        ';

            $arr_condition['IN']['A.SiteCode'] = get_auth_site_codes();
            $arr_condition['EQ']['A.ProdCode'] = $prodcode;
            $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

            $result = $this->_conn->query('select ' .$column .$from .$where)->row_array();
            //echo $this->_conn->last_query();
            return $result;
    }

    /**
     * 상품연결 기타정보 추출
     * @param $prodcode
     * @param $tableName
     * @return mixed
     */
    public function findProductEtcModify($prodcode,$tableName)
    {

        if ($tableName === 'lms_product_lecture_sample') {      //샘플

            $column = 'A.wUnitIdx,B.wUnitNum,b.wUnitLectureNum,B.wUnitName';

            $from = ' from
                             '.$tableName.' A
                            join wbs_cms_lecture_unit_combine B on A.wUnitIdx = B.wUnitIdx
                        where A.IsStatus=\'Y\' and B.wIsStatus=\'Y\'
            ';
            $where = $this->_conn->makeWhere(['EQ'=>['A.ProdCode'=>$prodcode]])->getMakeWhere(true);
            $result = $this->_conn->query('select ' .$column .$from .$where)->result_array();

        }elseif ($tableName === 'lms_product_division') {   //강사료

            $column = 'A.*,C.wProfName';

            $from = ' from
                            '.$tableName.' A
                            join lms_professor B on A.ProfIdx = B.ProfIdx
                            join wbs_pms_professor C on B.wProfIdx = C.wProfIdx
                        where A.IsStatus=\'Y\' and B.IsStatus=\'Y\' and C.wIsStatus=\'Y\'
            ';

            $where = $this->_conn->makeWhere(['EQ'=>['A.ProdCode'=>$prodcode]])->getMakeWhere(true);
            $result = $this->_conn->query('select ' .$column .$from .$where)->result_array();

        }elseif ($tableName === 'lms_product_memo') {   //메모

            $column = 'A.*,B.wAdminName as RegAdminName';

            $from = ' from
                            '.$tableName.' A
	                        left outer join wbs_sys_admin B on A.RegAdminIdx = B.wAdminIdx and B.wIsStatus=\'Y\'
                        where A.IsStatus=\'Y\'   
            ';

            $order_by = $this->_conn->makeOrderBy(['A.MemoTypeCcd'=>'asc', 'A.PmIdx' => 'desc'])->getMakeOrderBy();
            $where = $this->_conn->makeWhere(['EQ'=>['A.ProdCode'=>$prodcode]])->getMakeWhere(true);
            $result = $this->_conn->query('select ' .$column .$from .$where .$order_by)->result_array();

        }else if ($tableName === 'lms_Product_R_SaleBook') {    //교재

            $column = 'A.*,B.ProdName as bookname,C.wBookIdx,D.wSaleCcdName,E.SalePrice,E.RealSalePrice';

            $from = ' from
                            '.$tableName.' A
                            join lms_Product B on A.BookProdCode = B.ProdCode
                            join lms_Product_book C on B.ProdCode = C.ProdCode
                            join vw_wbs_bms_book_list D on C.wBookIdx = D.wBookIdx
                            join lms_product_sale E on B.ProdCode = E.ProdCode 
                        where A.IsStatus=\'Y\' and B.IsStatus=\'Y\' and D.wIsStatus=\'Y\' and E.IsStatus=\'Y\'   
            ';

            $order_by = $this->_conn->makeOrderBy(['PsbIdx'=>'asc'])->getMakeOrderBy();
            $where = $this->_conn->makeWhere(['EQ'=>['A.ProdCode'=>$prodcode]])->getMakeWhere(true);
            $result = $this->_conn->query('select ' .$column .$from .$where .$order_by)->result_array();

        }else if ($tableName === 'lms_product_r_autofreebie') {    //사은품

            $column = 'A.*,B.FreebieName,B.RefundSetPrice,B.Stock';

            $from = ' from
                            '.$tableName.' A
	                        join lms_freebie B on A.AutoFreebieIdx = B.FreebieIdx
                        where A.IsStatus=\'Y\' and B.IsStatus=\'Y\'    
            ';

            $order_by = $this->_conn->makeOrderBy(['paIdx'=>'asc'])->getMakeOrderBy();
            $where = $this->_conn->makeWhere(['EQ'=>['A.ProdCode'=>$prodcode]])->getMakeWhere(true);
            $result = $this->_conn->query('select ' .$column .$from .$where .$order_by)->result_array();

        }else if ($tableName === 'lms_product_r_autocoupon') {    //쿠폰

            $column = '
                            S.AutoCouponIdx
                            ,A.*
                            ,(case 
                                when current_date() between A.IssueStartDate and A.IssueEndDate then "유효"
                                when current_date() > A.IssueEndDate then "만료"
                                else "발급전"
                            end) as IssueValid
                            ,B.CcdName as CouponTypeCcdName
                            ,C.CcdName as ApplyTypeCcdName
            ';

            $from = ' from
                            '.$tableName.' S	
                            join lms_coupon A on S.AutoCouponIdx = A.CouponIdx
                            join lms_sys_code B on A.CouponTypeCcd = B.Ccd
                            join lms_sys_code C on A.ApplyTypeCcd = C.Ccd
                        where S.IsStatus=\'Y\' and A.IsStatus=\'Y\'     
            ';

            $order_by = $this->_conn->makeOrderBy(['S.PcIdx'=>'asc'])->getMakeOrderBy();
            $where = $this->_conn->makeWhere(['EQ'=>['S.ProdCode'=>$prodcode]])->getMakeWhere(true);
            $result = $this->_conn->query('select ' .$column .$from .$where .$order_by)->result_array();

        }else if ($tableName === 'lms_product_r_autolecture') {    //지급강좌

            $column = '
                            S.AutoProdCode
                            ,A.ProdCode,A.ProdName,A.IsUse
                            ,Aa.CcdName as SaleStatusCcd_Name
                            ,B.MultipleApply
                            ,Ba.CourseName,Bb.SubjectName,Bc.CcdName as LearnPatternCcd_Name
                            ,Bd.CcdName as LecTypeCcd_Name
                            ,Be.wProgressCcd_Name,Be.wUnitCnt, Be.wUnitLectureCnt
                            ,C.CateCode
                            ,Ca.CateName, Cb.CateName as CateName_Parent
                            ,D.SalePrice, D.RealSalePrice
                            ,E.wProfName_String
            ';

            $from = ' from
                            '.$tableName.' S	
                            join lms_product A on S.AutoProdCode = A.ProdCode
                                left outer join lms_sys_code Aa on A.SaleStatusCcd = Aa.Ccd and Aa.IsStatus=\'Y\'
                                
                            join lms_product_lecture B on A.ProdCode = B.ProdCode
                                left outer join lms_product_course Ba on B.CourseIdx = Ba.CourseIdx and Ba.IsStatus=\'Y\'
                                left outer join lms_product_subject Bb on B.SubjectIdx = Bb.SubjectIdx and Bb.IsStatus=\'Y\'
                                left outer join lms_sys_code Bc on B.LearnPatternCcd = Bc.Ccd and Bc.IsStatus=\'Y\'
                                left outer join lms_sys_code Bd on B.LecTypeCcd = Bd.Ccd
                                join wbs_cms_lecture_combine_light Be on B.wLecIdx = Be.wLecIdx and Be.cp_wAdminIdx=1026
                            join lms_product_r_category C on A.ProdCode = C.ProdCode and C.IsStatus=\'Y\'
                                join lms_sys_category Ca on C.CateCode = Ca.CateCode  and Ca.IsStatus=\'Y\'
                                left outer join lms_sys_category Cb on Ca.ParentCateCode = Cb.CateCode
                            left outer join lms_product_sale D on A.ProdCode = D.ProdCode and D.SaleTypeCcd=\'613001\' and D.IsStatus=\'Y\'	#Pc+모바일 판매가만 추출
                            join vw_product_r_professor_concat E on A.ProdCode = E.ProdCode
                        where S.IsStatus=\'Y\'  and A.IsStatus=\'Y\' 
            ';

            $order_by = $this->_conn->makeOrderBy(['S.PaIdx'=>'asc'])->getMakeOrderBy();
            $where = $this->_conn->makeWhere(['EQ'=>['S.ProdCode'=>$prodcode]])->getMakeWhere(true);
            $result = $this->_conn->query('select ' .$column .$from .$where .$order_by)->result_array();


        }else{

            $column = ' * ';
            $from = '
                    from '. $tableName .' Where IsStatus=\'Y\'
             ';
            $where = $this->_conn->makeWhere(['EQ'=>['ProdCode'=>$prodcode]])->getMakeWhere(true);
            $result = $this->_conn->query('select ' .$column .$from .$where);

            if($tableName === 'lms_product_sms') {
                $result = $result->row_array();
            } else {
                $result = $result->result_array();
            }

        }
        //var_dump($result);
        return $result;
    }



    /**
     * 상품 및 강좌 등록
     * @param array $input
     * @return array|bool
     */
    public function addProduct($input=[])
    {

        $this->_conn->trans_begin();

        try {

            // 신규 상품코드 조회
            $row = $this->_conn->getFindResult($this->_table['product'], 'ifnull(max(ProdCode) + 1, 200001) as ProdCode');

            $prodcode = $row['ProdCode'];

            // 입력항목 구분
            $this->inputCommon($input, $input_product, $input_lecture);

            /*----------------          상품등록        ---------------*/
            $product_data = array_merge($input_product,[
                'ProdCode'=> $prodcode
                ,'ProdTypeCcd'=>element('ProdTypeCcd',$input)
                ,'SiteCode'=>element('site_code',$input)
                ,'RegAdminIdx'=>$this->session->userdata('admin_idx')
                ,'RegIp'=>$this->input->ip_address()
            ]);

            if($this->_conn->set($product_data)->insert($this->_table['product']) === false) {
                throw new \Exception('상품 등록에 실패했습니다.');
            };
            //echo $this->_conn->last_query().'; ';
            /*----------------          상품등록        ---------------*/

            /*----------------          강좌등록        ---------------*/
            $lecture_data = array_merge($input_lecture,[
                'ProdCode'=> $prodcode
                ,'LearnPatternCcd'=>element('LearnPatternCcd',$input)
            ]);
            if($this->_conn->set($lecture_data)->insert($this->_table['lecture']) === false) {
                throw new \Exception('강좌 등록에 실패했습니다.');
            }
            //echo $this->_conn->last_query().'<BR><BR>';
            /*----------------          강좌등록        ---------------*/

            /*----------------          카테고리등록        ---------------*/
            if($this->setCategory($input,$prodcode) !== true) {
                throw new \Exception('카테고리 등록에 실패했습니다.');
            }
            /*----------------          카테고리등록        ---------------*/

            /*----------------          샘플등록        ---------------*/
            if($this->setSample($input,$prodcode) !== true) {
                throw new \Exception('샘플 등록에 실패했습니다.');
            }
            /*----------------          샘플등록        ---------------*/

            /*----------------          가격등록        ---------------*/
            if($this->setPrice($input,$prodcode) !== true) {
                throw new \Exception('가격 등록에 실패했습니다.');
            }
            /*----------------          가격등록        ---------------*/

            /*----------------          강사료정산        ---------------*/
            if($this->setDivision($input,$prodcode) !== true) {
                throw new \Exception('강사료정산 등록에 실패했습니다.');
            }
            /*----------------          강사료정산        ---------------*/

            /*----------------          메모등록        ---------------*/
            if($this->setMemo($input,$prodcode) !== true) {
                throw new \Exception('메모 등록에 실패했습니다.');
            }
            /*----------------          메모등록        ---------------*/

            /*----------------          컨텐트등록        ---------------*/
            if($this->setContent($input,$prodcode) !== true) {
                throw new \Exception('컨텐트 등록에 실패했습니다.');
            }
            /*----------------          컨텐트등록        ---------------*/

            /*----------------          SMS등록        ---------------*/
            if($this->setSms($input,$prodcode) !== true) {
                throw new \Exception('SMS 등록에 실패했습니다.');
            }
            /*----------------          SMS등록        ---------------*/

            /*----------------          교재등록        ---------------*/
            if($this->setBook($input,$prodcode) !== true) {
                throw new \Exception('교재 등록에 실패했습니다.');
            }
            /*----------------          교재등록        ---------------*/

            /*----------------          자동지급단강좌 등록        ---------------*/
            if($this->setAutoLec($input,$prodcode) !== true) {
                throw new \Exception('자동지급단강좌 등록에 실패했습니다.');
            }
            /*----------------          자동지급단강좌등록        ---------------*/

            /*----------------          자동지급쿠폰 등록        ---------------*/
            if($this->setAutoCoupon($input,$prodcode) !== true) {
                throw new \Exception('자동지급쿠폰 등록에 실패했습니다.');
            }
            /*----------------          자동지급쿠폰 등록        ---------------*/

            /*----------------          자동지급사은품 등록        ---------------*/
            if($this->setAutoFreebie($input,$prodcode) !== true) {
                throw new \Exception('자동지급사은품 등록에 실패했습니다.');
            }
            /*----------------          자동지급사은품 등록        ---------------*/

            /*----------------          연결강좌(단과,패키지) 등록        ---------------*/
            if($this->setSubLecture($input,$prodcode) !== true) {
                throw new \Exception('연결강좌 등록에 실패했습니다.');
            }
            /*----------------          연결강좌 등록        ---------------*/

            $this->_conn->trans_commit();
            //$this->_conn->trans_rollback();

        } catch(\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }


    /**
     * 상품 및 강좌 수정
     * @param array $input
     * @return array|bool
     */
    public function modifyProduct($input=[])
    {

        $this->_conn->trans_begin();

        try{

            $prodcode = element('ProdCode',$input);
            // 입력항목 구분
            $this->inputCommon($input, $input_product, $input_lecture);

            /*----------------          상품수정        ---------------*/
            $product_data = array_merge($input_product,[
                'UpdAdminIdx'=>$this->session->userdata('admin_idx')
            ]);
            if ($this->_conn->set($product_data)->where('ProdCode', $prodcode)->update($this->_table['product']) === false) {
                throw new \Exception('상품 정보 수정에 실패했습니다.');
            }
            //echo $this->_conn->last_query();
            /*----------------          상품수정        ---------------*/

            /*----------------          강좌수정        ---------------*/
            $lecture_data = array_merge($input_lecture,[
                //'LearnPatternCcd'=>element('LearnPatternCcd',$input)
            ]);
            if ($this->_conn->set($lecture_data)->where('ProdCode', $prodcode)->update($this->_table['lecture']) === false) {
                throw new \Exception('강좌 정보 수정에 실패했습니다.');
            }
           //echo $this->_conn->last_query();
            /*----------------          강좌수정        ---------------*/

            /*----------------          샘플등록        ---------------*/
            if($this->setSample($input,$prodcode) !== true) {
                throw new \Exception('샘플 등록에 실패했습니다.');
            }
            /*----------------          샘플등록        ---------------*/

            /*----------------          가격등록        ---------------*/
            if($this->setPrice($input,$prodcode) !== true) {
                throw new \Exception('가격 등록에 실패했습니다.');
            }
            /*----------------          가격등록        ---------------*/

            /*----------------          강사료정산        ---------------*/
            if($this->setDivision($input,$prodcode) !== true) {
                throw new \Exception('강사료정산 등록에 실패했습니다.');
            }
            /*----------------          강사료정산        ---------------*/

            /*----------------          메모등록        ---------------*/
            if($this->setMemo($input,$prodcode) !== true) {
                throw new \Exception('메모 등록에 실패했습니다.');
            }
            /*----------------          메모등록        ---------------*/

            /*----------------          컨텐트등록        ---------------*/
            if($this->setContent($input,$prodcode) !== true) {
                throw new \Exception('컨텐트 등록에 실패했습니다.');
            }
            /*----------------          컨텐트등록        ---------------*/

            /*----------------          SMS등록        ---------------*/
            if($this->setSms($input,$prodcode) !== true) {
                throw new \Exception('SMS 등록에 실패했습니다.');
            }
            /*----------------          SMS등록        ---------------*/

            /*----------------          교재등록        ---------------*/
            if($this->setBook($input,$prodcode) !== true) {
                throw new \Exception('교재 등록에 실패했습니다.');
            }
            /*----------------          교재등록        ---------------*/

            /*----------------          자동지급단강좌 등록        ---------------*/
            if($this->setAutoLec($input,$prodcode) !== true) {
                throw new \Exception('자동지급단강좌 등록에 실패했습니다.');
            }
            /*----------------          자동지급단강좌등록        ---------------*/

            /*----------------          자동지급쿠폰 등록        ---------------*/
            if($this->setAutoCoupon($input,$prodcode) !== true) {
                throw new \Exception('자동지급쿠폰 등록에 실패했습니다.');
            }
            /*----------------          자동지급쿠폰 등록        ---------------*/

            /*----------------          자동지급사은품 등록        ---------------*/
            if($this->setAutoFreebie($input,$prodcode) !== true) {
                throw new \Exception('자동지급사은품 등록에 실패했습니다.');
            }
            /*----------------          자동지급사은품 등록        ---------------*/

            //$this->_conn->trans_rollback();
            $this->_conn->trans_commit();

        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 인풋항목 공통 처리
     * @param array $input
     * @param $input_product
     * @param $input_lecture
     */
    public function inputCommon($input=[], &$input_product, &$input_lecture)
        {
            $LecTypeCcd = element('LecTypeCcd',$input);

            $StudyPeriod = element('StudyPeriod',$input);       //수강일수
            $WorkStudyPeriod = element('WorkStudyPeriod',$input);    //직장인 배수적용수간기간

            $StudyStartDate = element('StudyStartDate',$input); //개강일
            $WorkStudyStartDate = element('WorkStudyStartDate',$input); //직장인/재학생반 개강일

            if($LecTypeCcd==='607003') {        //  직장인/재학생반 일경우
                $commonStudyPeriod = $WorkStudyPeriod;
                $commonStudyStartDate = $WorkStudyStartDate;
            } else {
                $commonStudyPeriod = $StudyPeriod;
                $commonStudyStartDate = $StudyStartDate;
            }

            $SaleStartDat = element('SaleStartDat',$input);
            $SaleStartTime = element('SaleStartTime',$input);
            if($SaleStartDat === '') {
                $SaleStartDat = date("Y-m-d");
            }
            if($SaleStartTime === '') {
                $SaleStartTime = date('H');
            }
            $SaleStartDatm = $SaleStartDat.' '.$SaleStartTime.':00:00';

            $SaleEndDat = element('SaleEndDat',$input);
            $SaleEndTime = element('SaleEndTime',$input);
            if($SaleEndDat === '') {
                $SaleEndDat = "2100-12-31";
            }
            if($SaleEndTime === '') {
                $SaleEndTime = '23';
            }
            $SaleEndDatm = $SaleEndDat.' '.$SaleEndTime.':59:59';

            //상품관리 테이블 입력
            $input_product = [
                'ProdName'=>element('ProdName',$input)
                ,'SaleStartDatm'=>$SaleStartDatm
                ,'SaleEndDatm'=>$SaleEndDatm
                ,'SaleStatusCcd'=>element('SaleStatusCcd',$input)
                ,'IsSaleEnd'=>element('IsSaleEnd',$input,'N')
                ,'IsCoupon'=>element('IsCoupon',$input)
                ,'IsPoint'=>element('IsPoint',$input)
                ,'PointApplyCcd'=>element('PointApplyCcd',$input)
                ,'PointSavePrice'=>get_var(element('PointSavePrice',$input),0)
                ,'PointSaveType'=>element('PointSaveType',$input)
                ,'IsBest'=>element('IsBest',$input, 'N')
                ,'IsNew'=>element('IsNew',$input, 'N')
                ,'IsCart'=>element('IsCart',$input)
                ,'IsRefund'=>element('IsRefund',$input)
                ,'IsFreebiesTrans'=>element('IsFreebiesTrans',$input)
                ,'IsSms'=>element('IsSms',$input)
                ,'IsUse'=>element('IsUse',$input)
                ,'Keyword'=>element('Keyword',$input)
            ];

            $input_lecture = [
                'wLecIdx'=>element('wLecIdx',$input)
                ,'SchoolYear'=>element('SchoolYear',$input)
                ,'CourseIdx'=>element('CourseIdx',$input)
                ,'SubjectIdx'=>element('SubjectIdx',$input)
                ,'LecTypeCcd'=>$LecTypeCcd
                ,'StudyPeriodCcd'=>element('StudyPeriodCcd',$input)
                ,'StudyPeriod'=>$commonStudyPeriod
                ,'StudyStartDate'=>get_var($commonStudyStartDate,null)
                ,'StudyEndDate'=>get_var(element('StudyEndDate',$input,''),null)
                ,'WorkBaseStudyPeriod'=>get_var(element('WorkBaseStudyPeriod',$input),0)         //정상수강시간
                ,'WorkMultipleApply'=>element('WorkMultipleApply',$input)                   //배수제한값
                ,'WorkWeekDayStartTime'=>element('WorkWeekDayStartTime',$input)     //수강적용시간 : 평일 시작시간
                ,'WorkWeekDayEndTime'=>element('WorkWeekDayEndTime',$input)         //수강적용시간 : 평일 종료시간
                ,'WorkHoliDayStartTime'=>element('WorkHoliDayStartTime',$input)          //수강적용시간 : 주말 시작시간
                ,'WorkHoliDayEndTime'=>element('WorkHoliDayEndTime',$input)              //수강적용시간 : 주말 종료시간
                ,'StudyProvisionCcd'=>element('StudyProvisionCcd',$input)          //강좌제공구분
                ,'PcProvisionCcd'=>element('PcProvisionCcd',$input)                   //PC제공구분
                ,'MobileProvisionCcd'=>element('MobileProvisionCcd',$input)         //모바일제공구분
                ,'PlayerTypeCcds'=>implode(',', element('PlayerTypeCcds', $input))                //플레이어선택
                ,'MultipleApply'=>element('MultipleApply',$input)                        //수강배수정보 - 배수제한값
                ,'MultipleTypeCcd'=>element('MultipleTypeCcd',$input)               //수강배수정보 - 적용
                ,'AllLecTime'=>element('AllLecTime',$input)                               //전체강의시간
                ,'LecCalcType'=>element('LecCalcType',$input)                         //강사료정산 타입
                ,'IsLecStart'=>element('IsLecStart',$input)
                ,'IsPause'=>element('IsPause',$input)
                ,'PauseNum'=>element('PauseNum',$input)
                ,'IsExten'=>element('IsExten',$input)
                ,'ExtenNum'=>element('ExtenNum',$input)
                ,'IsRetake'=>element('IsRetake',$input)
                ,'RetakeSaleRate'=>element('RetakeSaleRate',$input)
                ,'RetakePeriod'=>get_var(element('RetakePeriod',$input),0)
                ,'wCpIdx'=>element('wCpIdx',$input)
                ,'CpDistribution'=>get_var(element('CpDistribution',$input),0)
                ,'IsEdit'=>element('IsEdit',$input)
            ];

   }

    /**
     * 기존데이터 상태값 변경
     * @param $prodcode
     * @param $tablename
     * @param $msg
     * @throws Exception
     */
   public function setDataDelete($prodcode,$tablename,$msg,$whereType=null,$whereKey=null,$whereVal=null)
   {
       try {
           /*  기존 정보 상태값 변경 */
           $del_data = [
               'IsStatus' => 'N'
               , 'UpdAdminIdx' => $this->session->userdata('admin_idx')
           ];

           $this->_conn->set($del_data)->where('ProdCode', $prodcode)->where('IsStatus', 'Y');

           if(empty($whereType) === false) {
               $this->_conn->{$whereType}($whereKey, $whereVal);
           }

           if ($this->_conn->update($tablename) === false) {
               throw new \Exception('이전 ' . $msg . ' 정보 수정에 실패했습니다.');
           }

           /*  기존 정보 상태값 변경 */
       } catch (\Exception $e) {
           return $e->getMessage();
       }
       return true;
   }

    //카테고리 등록
    public function setCategory($input=[],$prodcode)
    {
        try {
            /*  기존 카테고리 정보 상태값 변경 */
            if($this->setDataDelete($prodcode,$this->_table['category'],'카테고리') !== true) {
                throw new \Exception('카테고리 수정에 실패했습니다.');
            }

            /*  카테고리 등록 */
            $data = [
                'ProdCode' => $prodcode
                , 'CateCode' => element('cate_code', $input)
                , 'RegAdminIdx' => $this->session->userdata('admin_idx')
                , 'RegIp' => $this->input->ip_address()
            ];

            if ($this->_conn->set($data)->insert($this->_table['category']) === false) {
                throw new \Exception('카테고리 정보 등록에 실패했습니다.');
            }
            /*  카테고리 등록  */
        } catch (\Exception $e) {
            return $e->getMessage();
        }
         return true;
    }

    //샘플등록
    public function setSample($input=[],$prodcode)
    {
        try {
            /*  기존 샘플 정보 상태값 변경 */
            if($this->setDataDelete($prodcode,$this->_table['sample'],'샘플') !== true) {
                throw new \Exception('샘플 수정에 실패했습니다.');
            }

            $wUnitCode = element('wUnitCode',$input,'');

            if(empty($wUnitCode) === false) {
                for($i=0;$i<count($wUnitCode);$i++) {
                    $data = [
                        'ProdCode' => $prodcode
                        ,'wUnitIdx' => $wUnitCode[$i]
                        ,'OrderNum' => $i+1
                        ,'RegAdminIdx' => $this->session->userdata('admin_idx')
                    ];

                    if($this->_conn->set($data)->insert($this->_table['sample']) === false) {
                        throw new \Exception('샘플 정보 등록에 실패했습니다.');
                    }
                }
            }

        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }
    
    //가격등록
    public function setPrice($input=[],$prodcode)
    {
        try {

            /*판매가격*/
            $SalseTypeCcd = element('SalseTypeCcd',$input);                     //판매가격 코드
            $SalePrice = element('SalePrice',$input);                                  //정상가
            $SaleDiscType = element('SaleDiscType',$input);                        //할인적용코드
            $SaleRate = element('SaleRate',$input);                                    //할인율/금액
            $RealSalePrice = element('RealSalePrice',$input);                        //판매가격 코드
            /*판매가격*/

            /*  기존 가격 정보 상태값 변경 */
            if($this->setDataDelete($prodcode,$this->_table['sale'],'가격') !== true) {
                throw new \Exception('가격 수정에 실패했습니다.');
            }

            for($i=0;$i<count($SalseTypeCcd);$i++) {

                if(empty($SalePrice[$i]) !== true) {

                    $data = [
                        'ProdCode' => $prodcode
                        ,'SaleTypeCcd' => $SalseTypeCcd[$i]
                        ,'SalePrice' => $SalePrice[$i]
                        ,'SaleRate' => $SaleRate[$i]
                        ,'SaleDiscType' => $SaleDiscType[$i]
                        ,'RealSalePrice' => $RealSalePrice[$i]
                        ,'RegAdminIdx' => $this->session->userdata('admin_idx')
                        ,'RegIp' => $this->input->ip_address()
                    ];

                    if($this->_conn->set($data)->insert($this->_table['sale']) === false) {
                        throw new \Exception('가격 정보 등록에 실패했습니다.');
                    }
                }
            }

        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    //강사료정산
    public function setDivision($input=[],$prodcode)
    {
        try {
            /*강사료정산*/
            $rateRemainProfIdx = element('rateRemainProfIdx',$input);          //단수적용 교수코드
            $SingularValue = element('rateRemain',$input,0);            //단수값
            $IsSingular = element('IsSingular',$input,'');                   //단수적용코드
            $IsReprProf = element('IsReprProf',$input);                               //대표강사

            $prodcodesub = element('ProdCodeSub',$input,'');
            $ProfIdx = element('ProfIdx',$input);
            $TotalPrice = element('TotalPrice',$input);
            $ProdDivisionPrice = element('ProdDivisionPrice',$input);           //안분가격
            $ProdDivisionRate = element('ProdDivisionRate',$input);             //안분율
            $ProdCalcRate = element('ProdCalcRate',$input);                     //정산율

            /*  기존 강사료 정산 정보 상태값 변경 */
            if($this->setDataDelete($prodcode,$this->_table['division'],'강사료 정산') !== true) {
                throw new \Exception('강사료 정산 수정에 실패했습니다.');
            }

            for($i=0;$i<count($ProfIdx);$i++) {

                if(empty($ProfIdx[$i]) !== true) {

                    //서브 상품코드가 없을경우 해당 상품코드가 서브로 들어감 (단강좌 와 패키지의 구조를 맞추기 위함)
                    $prodcodesubMake = (empty($prodcodesub) === true ? $prodcode : $prodcodesub[$i]);

                    //교수코드와 대표강사의 값이같으면.
                    $IsReprProfMake = ($ProfIdx[$i] === $IsReprProf ? 'Y' : 'N');

                    //교수코드와 단수적용 교수가 값이 같으면
                    if($ProfIdx[$i] === $rateRemainProfIdx) {
                        $IsSingularMake = 'Y';
                        $SingularValueMake = $SingularValue;
                    } else {
                        $IsSingularMake = 'N';
                        $SingularValueMake = 0;
                    }

                    $data = [
                        'ProdCode' => $prodcode
                        ,'ProdCodeSub' => $prodcodesubMake
                        ,'ProfIdx' => $ProfIdx[$i]
                        ,'LecCnt' => 0
                        ,'IsReprProf' => $IsReprProfMake
                        ,'TotalPrice' => $TotalPrice[$i]
                        ,'ProdDivisionPrice' => $ProdDivisionPrice[$i]
                        ,'ProdDivisionRate' => $ProdDivisionRate[$i]
                        ,'ProdCalcRate' => $ProdCalcRate[$i]
                        ,'SingularValue' => $SingularValueMake
                        ,'IsSingular' => $IsSingularMake
                        ,'RegAdminIdx' => $this->session->userdata('admin_idx')
                        ,'RegIp' => $this->input->ip_address()
                    ];

                    if($this->_conn->set($data)->insert($this->_table['division']) === false) {
                        throw new \Exception('강사료 정산 등록에 실패했습니다.');
                    }
                }
            }

        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    //메모등록
    public function setMemo($input=[],$prodcode)
    {
        try {
            /*각종 메모*/
            $MemoTypeCcd = element('MemoTypeCcd',$input,'');
            $IsOutPut = element('IsOutPut',$input,'Y');
            $Memo = element('Memo',$input);

            /*  기존 메모 정보 상태값 변경 : 강사료 정산 메모의 경우는 보존*/
            if($this->setDataDelete($prodcode,$this->_table['memo'],'메모','where_not_in','MemoTypeCcd','634001') !== true) {
                throw new \Exception('메모 수정에 실패했습니다.');
            }
            //echo $this->_conn->last_query();

            if(empty($MemoTypeCcd) === false) {

                for($i=0;$i<count($MemoTypeCcd);$i++) {
                    
                    if(empty($Memo[$i]) === false) {
                        $data = [
                            'ProdCode' => $prodcode
                            , 'MemoTypeCcd' => $MemoTypeCcd[$i]
                            , 'Memo' => $Memo[$i]
                            , 'IsOutput' => $IsOutPut[$i]
                            , 'RegAdminIdx' => $this->session->userdata('admin_idx')
                            , 'RegIp' => $this->input->ip_address()
                        ];

                        if($this->_conn->set($data)->insert($this->_table['memo']) === false) {
                            throw new \Exception('메모 등록에 실패했습니다.');
                        }
                        //echo $this->_conn->last_query().';';
                    }

                }

            }

        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    //컨텐트 등록
    public function setContent($input=[], $prodcode)
    {
        try {
            /*각종 컨텐트*/
            $ContentTypeCcd = element('ContentTypeCcd',$input,'');
            $Content = element('Content',$input);

            /*  기존 컨텐트 정보 상태값 변경 */
            if($this->setDataDelete($prodcode,$this->_table['content'],'컨텐트') !== true) {
                throw new \Exception('컨텐트 수정에 실패했습니다.');
            }

            if(empty($ContentTypeCcd) === false) {

                for($i=0;$i<count($ContentTypeCcd);$i++) {

                    if(empty(trim($Content[$i])) === false) {

                        $data = [
                            'ProdCode' => $prodcode
                            , 'ContentTypeCcd' => $ContentTypeCcd[$i]
                            , 'Content' => $Content[$i]
                            , 'RegAdminIdx' => $this->session->userdata('admin_idx')
                            , 'RegIp' => $this->input->ip_address()
                        ];

                        if($this->_conn->set($data)->insert($this->_table['content']) === false) {
                            throw new \Exception('컨텐트 등록에 실패했습니다.');
                        }
                        //echo $this->_conn->last_query();
                    }

                }

            }

        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    //SMS 발송 정보
    public function setSms($input=[],$prodcode)
    {
        try {
            /*  기존 컨텐트 정보 상태값 변경 */
            if($this->setDataDelete($prodcode,$this->_table['sms'],'SMS') !== true) {
                throw new \Exception('SMS 수정에 실패했습니다.');
            }

            if(empty(element('SmsMemo',$input)) === false && empty(element('SendTel',$input)) === false) {
                $data = [
                    'ProdCode' => $prodcode
                    ,'Memo' => element('SmsMemo', $input)
                    , 'SendTel' => element('SendTel', $input, '')
                    , 'RegAdminIdx' => $this->session->userdata('admin_idx')
                    , 'RegIp' => $this->input->ip_address()
                ];
                if($this->_conn->set($data)->insert($this->_table['sms']) === false) {
                    throw new \Exception('SMS 등록에 실패했습니다.');
                }
            }
            //echo $this->_conn->last_query();
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    //교재
    public function setBook($input=[],$prodcode)
    {
        try {
            /*  기존 가격 정보 상태값 변경 */
            if($this->setDataDelete($prodcode,$this->_table['book'],'교재') !== true) {
                throw new \Exception('교재 수정에 실패했습니다.');
            }
            $BookProdCode = element('BookProdCode',$input,'');
            $BookProvisionCcd = element('BookProvisionCcd',$input);

            if(empty($BookProdCode) === false) {
                for($i=0;$i<count($BookProdCode);$i++) {
                    $data = [
                        'ProdCode' => $prodcode
                        , 'BookProdCode' => $BookProdCode[$i]
                        , 'BookProvisionCcd' => $BookProvisionCcd[$i]
                        , 'RegAdminIdx' => $this->session->userdata('admin_idx')
                        , 'RegIp' => $this->input->ip_address()
                    ];

                    if($this->_conn->set($data)->insert($this->_table['book']) === false) {
                        throw new \Exception('교재 등록에 실패했습니다.');
                    }
                    //echo $this->_conn->last_query();
                }

            }

        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    //자동지급단강좌
    public function setAutoLec($input=[],$prodcode)
    {
        try {

            /*  기존 자동지급강좌 정보 상태값 변경 */
            if($this->setDataDelete($prodcode,$this->_table['autolecture'],'자동지급 강좌') !== true) {
                throw new \Exception('자동지급 강좌 수정에 실패했습니다.');
            }

            $AutoProdCode = element('AutoProdCode',$input,'');

            if(empty($AutoProdCode) === false) {
                for($i=0;$i<count($AutoProdCode);$i++) {
                    $data = [
                        'ProdCode' => $prodcode
                        ,'AutoProdCode' => $AutoProdCode[$i]
                        , 'RegAdminIdx' => $this->session->userdata('admin_idx')
                        , 'RegIp' => $this->input->ip_address()
                    ];

                    if($this->_conn->set($data)->insert($this->_table['autolecture']) === false) {
                        throw new \Exception('자동지급 강좌 등록에 실패했습니다.');
                    }
                    //echo $this->_conn->last_query();
                }
            }


        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    //자동지급쿠폰
    public function setAutoCoupon($input=[],$prodcode)
    {
        try {

            /*  기존 쿠폰 정보 상태값 변경 */
            if($this->setDataDelete($prodcode,$this->_table['autocoupon'],'쿠폰') !== true) {
                throw new \Exception('쿠폰 수정에 실패했습니다.');
            }

            $CouponIdx = element('CouponIdx',$input);
            if(empty($CouponIdx) === false) {
                for($i=0;$i<count($CouponIdx);$i++) {
                    $data = [
                        'ProdCode' => $prodcode
                        ,'AutoCouponIdx' => $CouponIdx[$i]
                        , 'RegAdminIdx' => $this->session->userdata('admin_idx')
                        , 'RegIp' => $this->input->ip_address()
                    ];

                    if($this->_conn->set($data)->insert($this->_table['autocoupon']) === false) {
                        echo $this->_conn->last_query();
                        throw new \Exception('쿠폰 등록에 실패했습니다.');
                    }

                }
            }
            
            
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    //자동지급사은품
    public function setAutoFreebie($input=[],$prodcode)
    {
        try {

            /*  기존 사은품 정보 상태값 변경 */
            if($this->setDataDelete($prodcode,$this->_table['autofreebie'],'사은품') !== true) {
                throw new \Exception('사은품 수정에 실패했습니다.');
            }

            $FreebieIdx = element('FreebieIdx',$input);

            if(empty($FreebieIdx) === false) {
                for($i=0;$i<count($FreebieIdx);$i++) {
                    $data = [
                        'ProdCode' => $prodcode
                        ,'AutoFreebieIdx' => $FreebieIdx[$i]
                        , 'RegAdminIdx' => $this->session->userdata('admin_idx')
                        , 'RegIp' => $this->input->ip_address()
                    ];

                    if($this->_conn->set($data)->insert($this->_table['autofreebie']) === false) {
                        throw new \Exception('사은품 등록에 실패했습니다.');
                    }
                    //echo $this->_conn->last_query();
                }
            }

        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    //연결강좌
    public function setSubLecture($input=[],$prodcode)
    {
        try {
            /*  기존 강좌 연결 정보 상태값 변경 */
            if($this->setDataDelete($prodcode,$this->_table['sublecture'],'강좌 연결') !== true) {
                throw new \Exception('연결강좌 수정에 실패했습니다.');
            }

            $prodcodesub = element('ProdCodeSub',$input,'');

            //서브 상품코드가 없을경우 해당 상품코드가 서브로 들어감 (단강좌 와 패키지의 구조를 맞추기 위함)
            if(empty($prodcodesub) === true) {

                $data = [
                    'ProdCode' => $prodcode
                    ,'ProdCodeSub' => $prodcode
                    ,'RegAdminIdx' => $this->session->userdata('admin_idx')
                    ,'RegIp' => $this->input->ip_address()
                ];

                if($this->_conn->set($data)->insert($this->_table['sublecture']) === false) {
                    throw new \Exception('연결강좌 등록에 실패했습니다.');
                }

            } else {

                for($i=0;$i<count($prodcodesub);$i++){

                    $data = [
                        'ProdCode' => $prodcode
                        ,'ProdCodeSub' => $prodcodesub[$i]
                        ,'RegAdminIdx' => $this->session->userdata('admin_idx')
                        ,'RegIp' => $this->input->ip_address()
                    ];

                    if($this->_conn->set($data)->insert($this->_table['sublecture']) === false) {
                        throw new \Exception('연결강좌 등록에 실패했습니다.');
                    }
                }
            }
            //echo $this->_conn->last_query();

        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 강좌 신규/추천 변경
     * @param array $params
     * @return array|bool
     */
    public function modifyLectureByColumn($params=[])
    {
        $this->_conn->trans_begin();

        try {
            if (count($params) < 1) {
                throw new \Exception('필수 파라미터 오류입니다.');
            }

            foreach ($params as $prod_code => $columns) {
                $this->_conn->set($columns)->set('UpdAdminIdx', $this->session->userdata('admin_idx'))->where('ProdCode', $prod_code);

                if ($this->_conn->update($this->_table['product']) === false) {
                    throw new \Exception('상품 정보 수정에 실패했습니다.');
                }
                //echo $this->_conn->last_query();
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 강좌복사
     * @param $prodcode
     * @return array|bool
     */
    public function prodCopy($prodcode)
    {

        $this->_conn->trans_begin();

        try {

            $admin_idx = $this->session->userdata('admin_idx');
            $reg_ip = $this->input->ip_address();
            $row = $this->_conn->getFindResult($this->_table['product'], 'ifnull(max(ProdCode) + 1, 200001) as ProdCode');
            $prodcode_new = $row['ProdCode'];

            //상품복사
            $insert_column = 'ProdCode, SiteCode, ProdName, ProdTypeCcd, SaleStartDatm, SaleEndDatm, SaleStatusCcd, IsSaleEnd, IsCoupon, IsPoint, 
                    PointApplyCcd, PointSaveType, PointSavePrice, IsBest, IsNew, IsCart, IsRefund, IsFreebiesTrans, IsSms, IsUse, Keyword, RegAdminIdx, RegIp';

            $select_column= str_replace('ProdCode','\''.$prodcode_new.'\' as ProdCode',$insert_column);
            $select_column= str_replace('RegAdminIdx','\''.$admin_idx.'\' as RegAdminIdx',$select_column);
            $select_column= str_replace('RegIp','\''.$reg_ip.'\' as RegIp',$select_column);
            $select_column= str_replace('ProdName','concat(\'[복사]\',ProdName)',$select_column);

            $query = 'insert into '.$this->_table['product'].' ('. $insert_column .')SELECT '.$select_column.' FROM '.$this->_table['product'].' where ProdCode='.$prodcode;
            if($this->_conn->query($query) === false) {
                throw new \Exception('상품 복사에 실패했습니다.');
            };


            //강좌복사
            $insert_column = '';
            $select_column= '\''.$prodcode_new.'\' as ProdCode, CourseIdx, LearnPatternCcd, SubjectIdx, wLecIdx, SchoolYear, LecTypeCcd, StudyPeriodCcd, StudyPeriod, StudyStartDate, StudyEndDate
                    , WorkBaseStudyPeriod, WorkMultipleApply, WorkWeekDayStartTime, WorkWeekDayEndTime, WorkHoliDayStartTime, WorkHoliDayEndTime, StudyProvisionCcd
                    , PcProvisionCcd, MobileProvisionCcd, PlayerTypeCcds, IsPackMultipleType, MultipleTypeCcd, MultipleApply, AllLecTime, LecCalcType
                    , IsLecStart, IsPause, PauseNum, IsExten, ExtenNum, IsRetake, RetakeSaleRate, RetakePeriod, wCpIdx, CpDistribution, IsEdit, IsSelLecCount, SelCount
                    , PackCateCcd, PackCateEtcMemo, PackSelCount, FreeLecTypeCcd, FreeLecPasswd, CampusCcd, SchoolStartYear, SchoolStartMonth, SchoolStartDatm
                    , StudyPatternCcd, StudyApplyCcd, FixNumber, IsLecOpen';

            $query = 'insert into '.$this->_table['lecture'].' Select '.$select_column.' FROM '.$this->_table['lecture'].' where ProdCode='.$prodcode;
            if($this->_conn->query($query) === false) {
                throw new \Exception('강좌 복사에 실패했습니다.');
            };


            //카테고리복사
            $insert_column = 'ProdCode, CateCode, RegAdminIdx, RegIp';
            $select_column= str_replace('ProdCode','\''.$prodcode_new.'\' as ProdCode',$insert_column);
            $select_column= str_replace('RegAdminIdx','\''.$admin_idx.'\' as RegAdminIdx',$select_column);
            $select_column= str_replace('RegIp','\''.$reg_ip.'\' as RegIp',$select_column);

            $query = 'insert into '.$this->_table['category'].'('.$insert_column.') Select '.$select_column.' FROM '.$this->_table['category'].' where ProdCode='.$prodcode.' And IsStatus=\'Y\'';
            if($this->_conn->query($query) === false) {
                throw new \Exception('카테고리 복사에 실패했습니다.');
            };


            //샘플복사
            $insert_column = 'ProdCode, wUnitIdx, OrderNum, RegAdminIdx';
            $select_column= str_replace('ProdCode','\''.$prodcode_new.'\' as ProdCode',$insert_column);
            $select_column= str_replace('RegAdminIdx','\''.$admin_idx.'\' as RegAdminIdx',$select_column);
            $select_column= str_replace('RegIp','\''.$reg_ip.'\' as RegIp',$select_column);

            $query = 'insert into '.$this->_table['sample'].'('.$insert_column.') Select '.$select_column.' FROM '.$this->_table['sample'].' where ProdCode='.$prodcode.' And IsStatus=\'Y\'';
            if($this->_conn->query($query) === false) {
                throw new \Exception('샘플 복사에 실패했습니다.');
            };


            //가격복사
            $insert_column = 'ProdCode, SaleTypeCcd, SalePrice, SaleRate, SaleDiscType, RealSalePrice, RegAdminIdx, RegIp';
            $select_column= str_replace('ProdCode','\''.$prodcode_new.'\' as ProdCode',$insert_column);
            $select_column= str_replace('RegAdminIdx','\''.$admin_idx.'\' as RegAdminIdx',$select_column);
            $select_column= str_replace('RegIp','\''.$reg_ip.'\' as RegIp',$select_column);

            $query = 'insert into '.$this->_table['sale'].'('.$insert_column.') Select '.$select_column.' FROM '.$this->_table['sale'].' where ProdCode='.$prodcode.' And IsStatus=\'Y\'';
            if($this->_conn->query($query) === false) {
                throw new \Exception('가격 복사에 실패했습니다.');
            };


            //강사료정산복사
            $insert_column = 'ProdCode, ProdCodeSub, ProfIdx, LecCnt, IsReprProf, TotalPrice, ProdDivisionPrice, ProdDivisionRate, ProdCalcRate, SingularValue, IsSingular, RegAdminIdx, RegIp';
            $select_column= str_replace('ProdCode','\''.$prodcode_new.'\' as ProdCode',$insert_column);
            $select_column= str_replace('RegAdminIdx','\''.$admin_idx.'\' as RegAdminIdx',$select_column);
            $select_column= str_replace('RegIp','\''.$reg_ip.'\' as RegIp',$select_column);

            $query = 'insert into '.$this->_table['division'].'('.$insert_column.') Select '.$select_column.' FROM '.$this->_table['division'].' where ProdCode='.$prodcode.' And IsStatus=\'Y\'';
            if($this->_conn->query($query) === false) {
                throw new \Exception('강사료정산 복사에 실패했습니다.');
            };


            //메모복사
            $insert_column = 'ProdCode, MemoTypeCcd, Memo, IsOutput, RegAdminIdx, RegIp';
            $select_column= str_replace('ProdCode','\''.$prodcode_new.'\' as ProdCode',$insert_column);
            $select_column= str_replace('RegAdminIdx','\''.$admin_idx.'\' as RegAdminIdx',$select_column);
            $select_column= str_replace('RegIp','\''.$reg_ip.'\' as RegIp',$select_column);

            $query = 'insert into '.$this->_table['memo'].'('.$insert_column.') Select '.$select_column.' FROM '.$this->_table['memo'].' where ProdCode='.$prodcode.' And IsStatus=\'Y\'';
            if($this->_conn->query($query) === false) {
                throw new \Exception('메모 복사에 실패했습니다.');
            };


            // 컨텐트복사
            $insert_column = 'ProdCode, ContentTypeCcd, Content, RegAdminIdx, RegIp';
            $select_column= str_replace('ProdCode','\''.$prodcode_new.'\' as ProdCode',$insert_column);
            $select_column= str_replace('RegAdminIdx','\''.$admin_idx.'\' as RegAdminIdx',$select_column);
            $select_column= str_replace('RegIp','\''.$reg_ip.'\' as RegIp',$select_column);

            $query = 'insert into '.$this->_table['content'].'('.$insert_column.') Select '.$select_column.' FROM '.$this->_table['content'].' where ProdCode='.$prodcode.' And IsStatus=\'Y\'';
            if($this->_conn->query($query) === false) {
                throw new \Exception(' 컨텐트 복사에 실패했습니다.');
            };


            // SMS복사
            $insert_column = 'ProdCode, SendTel, Memo, RegAdminIdx, RegIp';
            $select_column= str_replace('ProdCode','\''.$prodcode_new.'\' as ProdCode',$insert_column);
            $select_column= str_replace('RegAdminIdx','\''.$admin_idx.'\' as RegAdminIdx',$select_column);
            $select_column= str_replace('RegIp','\''.$reg_ip.'\' as RegIp',$select_column);

            $query = 'insert into '.$this->_table['sms'].'('.$insert_column.') Select '.$select_column.' FROM '.$this->_table['sms'].' where ProdCode='.$prodcode.' And IsStatus=\'Y\'';
            if($this->_conn->query($query) === false) {
                throw new \Exception(' SMS 복사에 실패했습니다.');
            };


            //  교재복사
            $insert_column = 'BookProdCode,ProdCode,BookProvisionCcd, RegAdminIdx, RegIp';
            $select_column= str_replace(',ProdCode',',\''.$prodcode_new.'\' as ProdCode',$insert_column);           //prodcode 치환 문제로 이와같이 변경
            $select_column= str_replace('RegAdminIdx','\''.$admin_idx.'\' as RegAdminIdx',$select_column);
            $select_column= str_replace('RegIp','\''.$reg_ip.'\' as RegIp',$select_column);

            $query = 'insert into '.$this->_table['book'].'('.$insert_column.') Select '.$select_column.' FROM '.$this->_table['book'].' where ProdCode='.$prodcode.' And IsStatus=\'Y\'';
            if($this->_conn->query($query) === false) {
                throw new \Exception('교재 복사에 실패했습니다.');
            };


            //  자동지급단강좌복사
            $insert_column = 'AutoProdCode,ProdCode, RegAdminIdx, RegIp';
            $select_column= str_replace(',ProdCode',',\''.$prodcode_new.'\' as ProdCode',$insert_column);       //prodcode 치환 문제로 이와같이 변경
            $select_column= str_replace('RegAdminIdx','\''.$admin_idx.'\' as RegAdminIdx',$select_column);
            $select_column= str_replace('RegIp','\''.$reg_ip.'\' as RegIp',$select_column);

            $query = 'insert into '.$this->_table['autolecture'].'('.$insert_column.') Select '.$select_column.' FROM '.$this->_table['autolecture'].' where ProdCode='.$prodcode.' And IsStatus=\'Y\'';
            if($this->_conn->query($query) === false) {
                throw new \Exception('자동지급단강좌 복사에 실패했습니다.');
            };


            //  자동지급사은품복사
            $insert_column = 'ProdCode, AutoFreebieIdx, RegAdminIdx, RegIp';
            $select_column= str_replace('ProdCode','\''.$prodcode_new.'\' as ProdCode',$insert_column);
            $select_column= str_replace('RegAdminIdx','\''.$admin_idx.'\' as RegAdminIdx',$select_column);
            $select_column= str_replace('RegIp','\''.$reg_ip.'\' as RegIp',$select_column);

            $query = 'insert into '.$this->_table['autofreebie'].'('.$insert_column.') Select '.$select_column.' FROM '.$this->_table['autofreebie'].' where ProdCode='.$prodcode.' And IsStatus=\'Y\'';
            if($this->_conn->query($query) === false) {
                throw new \Exception('자동지급사은품 복사에 실패했습니다.');
            };


            //  자동지급쿠폰복사
            $insert_column = 'ProdCode, AutoCouponIdx, RegAdminIdx, RegIp';
            $select_column= str_replace('ProdCode','\''.$prodcode_new.'\' as ProdCode',$insert_column);
            $select_column= str_replace('RegAdminIdx','\''.$admin_idx.'\' as RegAdminIdx',$select_column);
            $select_column= str_replace('RegIp','\''.$reg_ip.'\' as RegIp',$select_column);

            $query = 'insert into '.$this->_table['autocoupon'].'('.$insert_column.') Select '.$select_column.' FROM '.$this->_table['autocoupon'].' where ProdCode='.$prodcode.' And IsStatus=\'Y\'';
            if($this->_conn->query($query) === false) {
                throw new \Exception('자동지급쿠폰 복사에 실패했습니다.');
            };


            //  연결강좌복사  : 단강좌는 자신이 연결강좌로
            $insert_column = 'ProdCode, ProdCodeSub, IsEssential, SubGroupName, OrderNum, RegAdminIdx, RegIp';
            $select_column= str_replace('ProdCodeSub','\''.$prodcode_new.'\' as ProdCodeSub',$insert_column);
            $select_column= str_replace('ProdCode','\''.$prodcode_new.'\' as ProdCode',$insert_column);
            $select_column= str_replace('RegAdminIdx','\''.$admin_idx.'\' as RegAdminIdx',$select_column);
            $select_column= str_replace('RegIp','\''.$reg_ip.'\' as RegIp',$select_column);

            $query = 'insert into '.$this->_table['sublecture'].'('.$insert_column.') Select '.$select_column.' FROM '.$this->_table['sublecture'].' where ProdCode='.$prodcode.' And IsStatus=\'Y\'';
            if($this->_conn->query($query) === false) {
                throw new \Exception('연결강좌 복사에 실패했습니다.');
            };

            //echo $this->_conn->last_query();
            //$this->_conn->trans_rollback();
            $this->_conn->trans_commit();

        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }


        return true;
    }


}