<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CommonLectureModel extends WB_Model
{
    protected $_table = [
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


    /**
     * 상품등록정보 추출
     * @param $prodcode
     * @return mixed
     */
    public function _findProductForModify($prodcode)
    {
        $column = 'A.*,B.*
                        ,Ba.wLecName,Ba.wCpName,Ba.wShootingCcd_Name,Ba.wProgressCcd_Name,Ba.wMakeYM,Ba.wAttachFileReal,Ba.wAttachFile,Ba.wAttachPath
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
    public function _findProductEtcModify($prodcode,$tableName)
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

        } elseif ($tableName === 'lms_product_division') {   //강사료

            $column = 'A.*,C.wProfName';

            $from = ' from
                            '.$tableName.' A
                            join lms_professor B on A.ProfIdx = B.ProfIdx
                            join wbs_pms_professor C on B.wProfIdx = C.wProfIdx
                        where A.IsStatus=\'Y\' and B.IsStatus=\'Y\' and C.wIsStatus=\'Y\'
            ';

            $where = $this->_conn->makeWhere(['EQ'=>['A.ProdCode'=>$prodcode]])->getMakeWhere(true);
            $result = $this->_conn->query('select ' .$column .$from .$where)->result_array();

        } elseif ($tableName === 'lms_product_memo') {   //메모

            $column = 'A.*,B.wAdminName as RegAdminName';

            $from = ' from
                            '.$tableName.' A
	                        left outer join wbs_sys_admin B on A.RegAdminIdx = B.wAdminIdx and B.wIsStatus=\'Y\'
                        where A.IsStatus=\'Y\'   
            ';

            $order_by = $this->_conn->makeOrderBy(['A.MemoTypeCcd'=>'asc', 'A.PmIdx' => 'desc'])->getMakeOrderBy();
            $where = $this->_conn->makeWhere(['EQ'=>['A.ProdCode'=>$prodcode]])->getMakeWhere(true);
            $result = $this->_conn->query('select ' .$column .$from .$where .$order_by)->result_array();

        } else if ($tableName === 'lms_Product_R_SaleBook') {    //교재

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
            //echo $this->_conn->last_query();
        } else if ($tableName === 'lms_product_r_autofreebie') {    //사은품

            $column = 'A.*,B.FreebieName,B.RefundSetPrice,B.Stock';

            $from = ' from
                            '.$tableName.' A
	                        join lms_freebie B on A.AutoFreebieIdx = B.FreebieIdx
                        where A.IsStatus=\'Y\' and B.IsStatus=\'Y\'    
            ';

            $order_by = $this->_conn->makeOrderBy(['paIdx'=>'asc'])->getMakeOrderBy();
            $where = $this->_conn->makeWhere(['EQ'=>['A.ProdCode'=>$prodcode]])->getMakeWhere(true);
            $result = $this->_conn->query('select ' .$column .$from .$where .$order_by)->result_array();

        } else if ($tableName === 'lms_product_r_autocoupon') {    //쿠폰

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

        } else if ($tableName === 'lms_product_r_autolecture') {    //지급강좌

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


        } else {

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
     * 기존데이터 상태값 변경
     * @param $prodcode
     * @param $tablename
     * @param $msg
     * @throws Exception
     */
    public function _setDataDelete($prodcode,$tablename,$msg,$whereType=null,$whereKey=null,$whereVal=null)
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
    public function _setCategory($input=[],$prodcode)
    {
        try {
            /*  기존 카테고리 정보 상태값 변경 */
            if($this->_setDataDelete($prodcode,$this->_table['category'],'카테고리') !== true) {
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
    public function _setSample($input=[],$prodcode)
    {
        try {
            /*  기존 샘플 정보 상태값 변경 */
            if($this->_setDataDelete($prodcode,$this->_table['sample'],'샘플') !== true) {
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
    public function _setPrice($input=[],$prodcode)
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
            if($this->_setDataDelete($prodcode,$this->_table['sale'],'가격') !== true) {
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
    public function _setDivision($input=[],$prodcode)
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
            if($this->_setDataDelete($prodcode,$this->_table['division'],'강사료 정산') !== true) {
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
    public function _setMemo($input=[],$prodcode)
    {
        try {
            /*각종 메모*/
            $MemoTypeCcd = element('MemoTypeCcd',$input,'');
            $IsOutPut = element('IsOutPut',$input,'Y');
            $Memo = element('Memo',$input);

            /*  기존 메모 정보 상태값 변경 : 강사료 정산 메모의 경우는 보존*/
            if($this->_setDataDelete($prodcode,$this->_table['memo'],'메모','where_not_in','MemoTypeCcd','634001') !== true) {
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
    public function _setContent($input=[], $prodcode)
    {
        try {
            /*각종 컨텐트*/
            $ContentTypeCcd = element('ContentTypeCcd',$input,'');
            $Content = element('Content',$input);

            /*  기존 컨텐트 정보 상태값 변경 */
            if($this->_setDataDelete($prodcode,$this->_table['content'],'컨텐트') !== true) {
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
    public function _setSms($input=[],$prodcode)
    {
        try {
            /*  기존 컨텐트 정보 상태값 변경 */
            if($this->_setDataDelete($prodcode,$this->_table['sms'],'SMS') !== true) {
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
    public function _setBook($input=[],$prodcode)
    {
        try {
            /*  기존 가격 정보 상태값 변경 */
            if($this->_setDataDelete($prodcode,$this->_table['book'],'교재') !== true) {
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
    public function _setAutoLec($input=[],$prodcode)
    {
        try {

            /*  기존 자동지급강좌 정보 상태값 변경 */
            if($this->_setDataDelete($prodcode,$this->_table['autolecture'],'자동지급 강좌') !== true) {
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
    public function _setAutoCoupon($input=[],$prodcode)
    {
        try {

            /*  기존 쿠폰 정보 상태값 변경 */
            if($this->_setDataDelete($prodcode,$this->_table['autocoupon'],'쿠폰') !== true) {
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
    public function _setAutoFreebie($input=[],$prodcode)
    {
        try {

            /*  기존 사은품 정보 상태값 변경 */
            if($this->_setDataDelete($prodcode,$this->_table['autofreebie'],'사은품') !== true) {
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
    public function _setSubLecture($input=[],$prodcode)
    {
        try {
            /*  기존 강좌 연결 정보 상태값 변경 */
            if($this->_setDataDelete($prodcode,$this->_table['sublecture'],'강좌 연결') !== true) {
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
    public function _modifyLectureByColumn($params=[])
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
    public function _prodCopy($prodcode)
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
                    , IsPackLecStartType, IsLecStart,IsPackPauseType, IsPause, PauseNum, IsPackExtenType, IsExten, ExtenNum, IsPackRetake,IsRetake, RetakeSaleRate, RetakePeriod, wCpIdx
                    , CpDistribution, IsEdit, IsSelLecCount, SelCount
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