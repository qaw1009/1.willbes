<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseReadingRoomModel extends WB_Model
{
    public $arr_mang_title = [
        'R' => '독서실',
        'L' => '사물함'
    ];
    public $arr_prod_type = [
        'R' => 'reading_room',
        'L' => 'locker'
    ];
    public $groupCcd = [
        'seat' => '682',        //좌석상태 (미사용, 사용중, 대기, 홀드, 고장)
        'payStatus' => '676',    //결제상태 (결제완료, 환불완료..)
        'seatStatus' => '683',  //배정여부 (배정,연장,자리이동,퇴실)
    ];
    public $_arr_reading_room_status_ccd = [
        'N' => '682001',    //독서실사물함 좌석상태(미사용)
        'Y' => '682002'     //독서실사물함 좌석상태(사용중)
    ];
    public $_arr_reading_room_seat_status_ccd = [
        'in' => '683001',           //배정
        'extension' => '683002',    //연장
        'change' => '683003',       //자리이동
        'out' => '683004',          //퇴실
        'end' => '683005',          //만료
    ];

    protected $_order_route_ccd = '670002';    //학원방문결제
    protected $_sub_order_route_ccd = '670003';    //0원결제 [예치금]
    protected $_sub_product_type_ccd = '636009';   //상품타입공통코드 예치금
    protected $_order_pay_status_ccd = '676001';    //결제완료상품

    private $_arr_product_type_ccd = [
        'R' => '636007',    //상품타입공통코드 독서실
        'L' => '636008'     //상품타입공통코드 사물함
    ];
    private $_prod_code;
    private $_sub_prod_code;
    private $_lr_idx;
    private $_arr_sale_status_ccd = [
        'main' => '618001',    //판매상태(판매가능)
        'sub' => '618001'      //판매상태(판매불가)
    ];
    private $_sale_type_ccd = '613001'; // 상품판매구분 > PC+모바일

    protected $_table = [
        'lms_site' => 'lms_site',
        'lms_sys_code' => 'lms_sys_code',
        'lms_order' => 'lms_order',
        'lms_order_product' => 'lms_order_product',
        'lms_order_product_refund' => 'lms_order_product_refund',
        'lms_member' => 'lms_member',
        'wbs_sys_admin' => 'wbs_sys_admin',
        'product' => 'lms_product',
        'product_r_product' => 'lms_product_r_product',
        'product_sale' => 'lms_product_sale',
        'product_sms' => 'lms_product_sms',
        'readingRoom' => 'lms_readingroom',
        'readingRoom_mst' => 'lms_readingroommst',
        'readingRoom_useDetail' => 'lms_readingroomusedetail',
        'readingRoom_Memo' => 'lms_readingroommemo'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * set prod_code
     * @param $prod_code
     */
    private function _setProdCode($prod_code)
    {
        $this->_prod_code = $prod_code;
    }

    /**
     * get prod_code
     * @return mixed
     */
    private function _getProdCode()
    {
        return $this->_prod_code;
    }

    /**
     * set sub_prod_code
     * @param $prod_code
     */
    private function _setSubProdCode($prod_code)
    {
        $this->_sub_prod_code = $prod_code;
    }

    /**
     * get sub_prod_code
     * @return mixed
     */
    private function _getSubProdCode()
    {
        return $this->_sub_prod_code;
    }

    /**
     * set lr_Idx
     * @param $idx
     */
    private function _setReadingRoomIdx($idx)
    {
        $this->_lr_idx = $idx;
    }

    /**
     * get lr_idx
     * @return mixed
     */
    private function _getReadingRoomIdx()
    {
        return $this->_lr_idx;
    }

    /**
     * 독서실/사물함 단일 데이터 조회
     * @param $arr_condition
     * @param string $column
     * @return mixed
     */
    protected function _getReadingRoomInfo($arr_condition, $column = '*')
    {
        $from = "
            FROM {$this->_table['readingRoom']}
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        return $this->_conn->query('select '.$column .$from .$where)->row_array();
    }

    /**
     * 독서실/사물함 다중 데이터 조회
     * @param $arr_condition
     * @param string $column
     * @return mixed
     */
    protected function _listReadingRoomInfo($arr_condition, $column = '*')
    {
        $from = "
            FROM {$this->_table['readingRoom']}
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        return $this->_conn->query('select '.$column .$from .$where)->result_array();
    }

    /**
     * 상품가격조회
     * @param $arr_condition
     * @param string $column
     * @return mixed
     */
    protected function _getProductSaleForReadingRoomInfo($arr_condition, $column = '*')
    {
        $from = "
            FROM {$this->_table['product_sale']}
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        return $this->_conn->query('select '.$column .$from .$where)->row_array();
    }

    /**
     * 상품등록
     * @param array $input
     * @return bool|string
     */
    protected function _addProductForReadingRoom($input = [])
    {
        try {
            // 신규 상품코드 조회
            $row = $this->_conn->getFindResult($this->_table['product'], 'ifnull(max(ProdCode) + 1, 200001) as ProdCode');
            $prod_code = $row['ProdCode'];
            $this->_setProdCode($prod_code);

            // 입력항목 셋팅
            $set_product_data = $this->_setProductData($input, 'main');
            $product_data = array_merge($set_product_data, [
                'ProdCode' => $prod_code,
                'ProdTypeCcd' => $this->_arr_product_type_ccd[element('mang_type',$input)],
                'SiteCode' => element('site_code',$input),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ]);

            if($this->_conn->set($product_data)->insert($this->_table['product']) === false) {
                throw new \Exception('상품 등록에 실패했습니다.');
            };

        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 예치금 상품등록
     * @param array $input
     * @return bool|string
     */
    protected function _addSubProductForReadingRoom($input = [])
    {
        try {
            // 신규 상품코드 조회
            $row = $this->_conn->getFindResult($this->_table['product'], 'ifnull(max(ProdCode) + 1, 200001) as ProdCode');
            $prod_code = $row['ProdCode'];
            $this->_setSubProdCode($prod_code);

            // 입력항목 셋팅
            $set_product_data = $this->_setProductData($input, 'sub');
            $product_data = array_merge($set_product_data, [
                'ProdCode' => $prod_code,
                'ProdTypeCcd' => $this->_sub_product_type_ccd,
                'SiteCode' => element('site_code',$input),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ]);

            if($this->_conn->set($product_data)->insert($this->_table['product']) === false) {
                throw new \Exception('상품 등록에 실패했습니다.');
            };

        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 상품수정
     * @param array $input
     * @return bool|string
     */
    protected function _modifyProductForReadingRoom($input = [])
    {
        try {
            // 상품코드 조회
            $arr_condition = [
                'EQ' => [
                    'LrIdx' => element('lr_idx', $input),
                    'IsStatus' => 'Y'
                ]
            ];
            $data = $this->_getReadingRoomInfo($arr_condition, 'LrIdx, ProdCode, SubProdCode');
            if (empty($data)) {
                throw new \Exception('조회된 상품이 없습니다.');
            }
            $this->_setProdCode($data['ProdCode']);
            $this->_setSubProdCode($data['SubProdCode']);

            // 입력항목 셋팅
            $set_product_data = $this->_setProductData($input, 'main');
            $product_data = array_merge($set_product_data, [
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ]);

            if ($this->_conn->set($product_data)->where('ProdCode', $data['ProdCode'])->update($this->_table['product']) === false) {
                throw new \Exception('상품 정보 수정에 실패했습니다.');
            }

        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 예치금 상품수정
     * @param array $input
     * @return bool|string
     */
    protected function _modifySubProductForReadingRoom($input = [])
    {
        try {
            // 상품코드 조회
            $arr_condition = [
                'EQ' => [
                    'LrIdx' => element('lr_idx', $input),
                    'IsStatus' => 'Y'
                ]
            ];
            $data = $this->_getReadingRoomInfo($arr_condition, 'LrIdx, SubProdCode');
            if (empty($data)) {
                throw new \Exception('조회된 상품이 없습니다.');
            }
            $sub_prod_code = $this->_getSubProdCode();

            // 입력항목 셋팅
            $set_product_data = $this->_setProductData($input, 'sub');
            $product_data = array_merge($set_product_data, [
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ]);

            if ($this->_conn->set($product_data)->where('ProdCode', $sub_prod_code)->update($this->_table['product']) === false) {
                throw new \Exception('예치금 상품 정보 수정에 실패했습니다.');
            }

        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 판매가격 등록
     * @param array $input
     * @return bool|string
     */
    protected function _setProductPriceForReadingRoom($input = [])
    {
        $prod_code = $this->_getProdCode();

        try {
            //기존 가격 정보 상태값 변경
            if($this->_setDataDelete($prod_code,$this->_table['product_sale'],'가격') !== true) {
                throw new \Exception('가격 수정에 실패했습니다.');
            }

            $data = [
                'ProdCode' => $prod_code,
                'SaleTypeCcd' => $this->_sale_type_ccd,
                'SalePrice' => element('sale_price', $input),
                'SaleRate' => element('sale_rate', $input, 0),
                'SaleDiscType' => element('sale_disc_type', $input, 'R'),
                'RealSalePrice' => element('real_sale_price', $input),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ];

            if ($this->_conn->set($data)->insert($this->_table['product_sale']) === false) {
                throw new \Exception('판매가격 정보 등록에 실패했습니다.');
            }

        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }

    /**
     * 예치금 판매가격 등록
     * @param array $input
     * @return bool|string
     */
    protected function _setSubProductPriceForReadingRoom($input = [])
    {
        try {
            $prod_code = $this->_getSubProdCode();

            //기존 가격 정보 상태값 변경
            if($this->_setDataDelete($prod_code,$this->_table['product_sale'],'예치금 가격') !== true) {
                throw new \Exception('예치금 가격 수정에 실패했습니다.');
            }

            $data = [
                'ProdCode' => $prod_code,
                'SaleTypeCcd' => $this->_sale_type_ccd,
                'SalePrice' => element('sub_prod_code_price', $input),
                'SaleRate' => '0',
                'SaleDiscType' => 'R',
                'RealSalePrice' => element('sub_prod_code_price', $input),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ];

            if ($this->_conn->set($data)->insert($this->_table['product_sale']) === false) {
                throw new \Exception('예치금 가격 정보 등록에 실패했습니다.');
            }

        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }

    /**
     * 연관상품 저장
     * @param $input
     * @return bool|string
     */
    protected function _setSubProduct($input)
    {
        try {
            $prod_code = $this->_getProdCode();
            $sub_prod_code = $this->_getSubProdCode();

            //연관상품 상태값 변경
            if($this->_setDataDelete($prod_code,$this->_table['product_r_product'],'연관상품','where','ProdTypeCcd', $this->_arr_product_type_ccd[element('mang_type',$input)]) !== true) {
                throw new \Exception('연관상품 수정에 실패했습니다.');
            }

            $data = [
                'ProdCode' => $prod_code,
                'ProdCodeSub' => $sub_prod_code,
                'IsSale' => 'N',
                'ProdTypeCcd' => $this->_arr_product_type_ccd[element('mang_type',$input)],
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ];

            if($this->_conn->set($data)->insert($this->_table['product_r_product']) === false) {
                throw new \Exception('예치금 연관상품 등록에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }

    protected function _addProdJsonData()
    {
        try {
            $prod_code = $this->_getProdCode();
            $sub_prod_code = $this->_getSubProdCode();

            // 판매가격 JSON 데이터 등록
            $query = $this->_conn->query('call sp_product_json_data_insert(?)', [$prod_code]);
            $result = $query->row(0)->ReturnMsg;
            if ($result != 'Success') {
                throw new \Exception('판매가격 JSON 데이터 등록에 실패했습니다.');
            }

            // 판매가격 JSON 데이터 등록
            $query = $this->_conn->query('call sp_product_json_data_insert(?)', [$sub_prod_code]);
            $result = $query->row(0)->ReturnMsg;
            if ($result != 'Success') {
                throw new \Exception('예치금가격 JSON 데이터 등록에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }

    /**
     * SMS 발송 정보
     * @param array $input
     * @return bool|string
     */
    protected function _setSms($input = [])
    {
        try {
            $prod_code = $this->_getProdCode();

            /*  기존 컨텐트 정보 상태값 변경 */
            if($this->_setDataDelete($prod_code, $this->_table['product_sms'],'SMS') !== true) {
                throw new \Exception('SMS 수정에 실패했습니다.');
            }

            if(empty(element('sms_memo',$input)) === false && empty(element('cs_tel',$input)) === false) {
                $data = [
                    'ProdCode' => $prod_code,
                    'Memo' => element('sms_memo', $input),
                    'SendTel' => element('cs_tel', $input, ''),
                    'RegAdminIdx' => $this->session->userdata('admin_idx'),
                    'RegIp' => $this->input->ip_address()
                ];
                if($this->_conn->set($data)->insert($this->_table['product_sms']) === false) {
                    throw new \Exception('SMS 등록에 실패했습니다.');
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }

    /**
     * 독서실/사물함 좌석 상태 조회
     * @param $arr_condition
     * @param string $column
     * @return mixed
     */
    protected function _getReadingRoomMst($arr_condition, $column = 'MIdx')
    {
        $from = "
            FROM {$this->_table['readingRoom_mst']}
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        return $this->_conn->query('select '.$column .$from .$where)->row_array();
    }

    /**
     * 독서실/사물함 결제정보 조회
     * @param $arr_condition
     * @param string $column
     * @return mixed
     */
    protected function _getReadingRoomUseDetail($arr_condition, $column = 'LrIdx')
    {
        $from = "
            FROM {$this->_table['readingRoom_useDetail']}
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $query = $this->_conn->query('select ' . $column . $from . $where);
        return $query->result_array();
    }

    /**
     * 독서실/사물함 등록
     * @param array $input
     * @return bool|string
     */
    protected function _addReadingRoom($input = [])
    {
        try {
            $prod_code = $this->_getProdCode();
            $sub_prod_code = $this->_getSubProdCode();
            $set_data = $this->_setReadingRoomData($input);

            $data = array_merge($set_data, [
                'ProdCode' => $prod_code,
                'SiteCode' => element('site_code',$input),
                'SubProdCode' => $sub_prod_code,
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ]);

            if($this->_conn->set($data)->insert($this->_table['readingRoom']) === false) {
                throw new \Exception($this->readingRoomModel->arr_mang_title[element('mang_type',$input)].' 등록에 실패했습니다.');
            }
            $this->_setReadingRoomIdx($this->_conn->insert_id());

        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }

    /**
     * 독서실/사물함 수정
     * @param array $input
     * @return bool|string
     */
    protected function _modifyReadingRoom($input = [])
    {
        try {
            $lr_idx = element('lr_idx', $input);
            $set_data = $this->_setReadingRoomData($input);

            $data = array_merge($set_data, [
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ]);

            if ($this->_conn->set($data)->where('LrIdx', $lr_idx)->update($this->_table['readingRoom']) === false) {
                throw new \Exception($this->readingRoomModel->arr_mang_title[element('mang_type',$input)].' 정보 수정에 실패했습니다.');
            }

            $this->_setReadingRoomIdx($lr_idx);

        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }

    /**
     * 독서실/사물함 좌석 등록/수정
     * @param array $input
     * @return bool|string
     */
    protected function _setReadingRoomMst($input = [])
    {
        try {
            $_lr_idx = $this->_getReadingRoomIdx();
            if (empty($_lr_idx) === true) {
                throw new \Exception($this->readingRoomModel->arr_mang_title[element('mang_type',$input)].' 등록에 실패했습니다.');
            }

            // 좌석 결제 정보 조회
            $arr_condition = [
                'EQ' => [
                    'LrIdx' => $_lr_idx
                ]
            ];
            $detail_data = $this->_getReadingRoomUseDetail($arr_condition);
            if (count($detail_data) > 0) {
                throw new \Exception('등록된 결제 정보가 있습니다.');
            }

            // 좌석데이터 초기화
            if ($this->_conn->where('LrIdx', $_lr_idx)->delete($this->_table['readingRoom_mst']) === false) {
                throw new \Exception('좌석 데이터 초기화 실패했습니다.');
            }

            // 좌석데이터 등록
            $start_no = element('start_no',$input);
            $end_no = element('end_no',$input);
            for ($i = $start_no; $i <= $end_no; $i++) {
                $data = [
                    'LrIdx' => $_lr_idx,
                    'SerialNumber' => $i,
                    'StatusCcd' => $this->_arr_reading_room_status_ccd['N'],
                    'RegAdminIdx' => $this->session->userdata('admin_idx'),
                    'RegIp' => $this->input->ip_address()
                ];

                if($this->_conn->set($data)->insert($this->_table['readingRoom_mst']) === false) {
                    throw new \Exception('좌석 데이터 등록에 실패했습니다.');
                }
            }

        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }

    /**
     * 캠퍼스 권한 쿼리 스트링
     * @param $as [TABLE AS 값]
     * @return string
     */
    protected function _makeAuthCampusQueryString($as)
    {
        $arr_auth_campus_ccds = get_auth_all_campus_ccds();
        $where_campus = $this->_conn->group_start();
        foreach ($arr_auth_campus_ccds as $set_site_ccd => $set_campus_ccd) {
            $where_campus->or_group_start();
            $where_campus->or_where($as.'.SiteCode',$set_site_ccd);
            $where_campus->group_start();
            $where_campus->where($as.'.CampusCcd', $this->codeModel->campusAllCcd);
            $where_campus->or_where_in($as.'.CampusCcd', $set_campus_ccd);
            $where_campus->group_end();
            $where_campus->group_end();
        }
        $where_campus->or_where($as.'.CampusCcd', "''", false);
        $where_campus->or_where($as.'.CampusCcd IS NULL');
        $where_campus->group_end();
        return $where_campus->getMakeWhere(true);
    }

    /**
     * 상품데이터 셋팅
     * @param array $input
     * @param $input_type
     * @return array
     */
    private function _setProductData($input = [], $input_type = 'main')
    {
        $SaleStartDatm = element('use_start_date',$input).' '.date('H').':00:00';
        $SaleEndDatm = element('use_end_date',$input).' 23:59:59';

        $input_product = [
            'ProdName' => element('rd_name',$input),
            'SaleStartDatm' => $SaleStartDatm,
            'SaleEndDatm' => $SaleEndDatm,
            'SaleStatusCcd' => $this->_arr_sale_status_ccd[$input_type],
            'IsSaleEnd' => 'N',
            'IsCoupon' => 'N',
            'IsPoint' => 'N',
            'PointApplyCcd' => '635002',
            'PointSavePrice' => '0',
            'PointSaveType' => 'R',
            'IsBest' => 'N',
            'IsNew' => 'N',
            'IsCart' => 'N',
            'IsRefund' => 'Y',
            'IsFreebiesTrans' => 'N',
            'IsSms' => ($input_type == 'main') ? element('sms_is_use',$input,'N') : 'N',
            'IsDeliveryInfo' => 'N',
            'IsUse' => 'Y'
        ];

        return $input_product;
    }

    /**
     * 독서실/사물함 기본 데이터 셋팅
     * @param array $input
     * @return array
     */
    private function _setReadingRoomData($input = [])
    {
        $input_data = [
            'MangType' => element('mang_type',$input),
            'CampusCcd' => element('campus_ccd',$input),
            'IsUse' => element('is_use',$input),
            'Name' => element('rd_name',$input),
            'LakeLayer' => element('lake_layer',$input),
            'UseQty' => element('use_qty',$input),
            'TransverseNum' => element('transverse_num',$input),
            'StartNo' => element('start_no',$input),
            'EndNo' => element('end_no',$input),
            'Desc' => element('desc',$input),
            'IsSmsUse' => element('sms_is_use',$input),
            'SmsContent' => element('sms_memo',$input),
            'SendTel' => element('cs_tel',$input),
            'UseStartDate' => element('use_start_date',$input),
            'UseEndDate' => element('use_end_date',$input)
        ];

        return $input_data;
    }

    /**
     * 기존 정보 상태값 변경
     * @param $prod_code
     * @param $table_name
     * @param $msg
     * @param null $whereType
     * @param null $whereKey
     * @param null $whereVal
     * @return bool|string
     */
    private function _setDataDelete($prod_code,$table_name,$msg,$whereType=null,$whereKey=null,$whereVal=null)
    {
        try {
            $del_data = [
                'IsStatus' => 'N'
                , 'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];

            $this->_conn->set($del_data)->where('ProdCode', $prod_code)->where('IsStatus', 'Y');

            if(empty($whereType) === false) {
                $this->_conn->{$whereType}($whereKey, $whereVal);
            }

            if ($this->_conn->update($table_name) === false) {
                //echo $this->_conn->last_query();
                throw new \Exception('이전 ' . $msg . ' 정보 수정에 실패했습니다.');
            }

            /*  기존 정보 상태값 변경 */
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }

    /**
     * 좌석상태수정
     * @param $input
     * @return bool|string
     */
    protected function _updateSeatTypeForMst($input)
    {
        try {
            $data = [
                'StatusCcd' => element('seat_status', $input),
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];

            if ($this->_conn->set($data)->where('LrIdx', element('lr_idx', $input))->where('SerialNumber', element('choice_serial_num', $input))->update($this->_table['readingRoom_mst']) === false) {
                throw new \Exception('좌석상태 수정에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }

    /**
     * 좌석상태 업데이트
     * @param $lr_idx           [상품코드에 매핑되는 식별자]
     * @param $serial_number    [좌석번호]
     * @param $now_order_idx    [생성된 주문 식별자]
     * @param $status_ccd       [좌석상태 -> 682001:미사용, 682002:사용중, 682003:대기, 682004:홀드, 682005:고장]
     * @param $start_date
     * @param $end_date
     * @param @master_order_idx    [연장일 경우]
     * @param @is_extension         [연장유무 = 연장:true, 신규:false]
     * @return bool|string
     */
    protected function _updateSeatMstNotExtension($lr_idx, $serial_number, $now_order_idx, $status_ccd, $start_date, $end_date)
    {
        try {
            //최초좌석등록 시 현재 주문번호가 마스터주문번호로 셋팅
            $master_o_idx = $now_order_idx;
            $now_o_idx = $now_order_idx;

            $data = [
                'MasterOrderIdx' => $master_o_idx,
                'NowOrderIdx' => $now_o_idx,
                'StatusCcd' => $status_ccd,
                'UseStartDate' => $start_date,
                'UseEndDate' => $end_date,
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];

            if ($this->_conn->set($data)->where('LrIdx', $lr_idx)->where('SerialNumber', $serial_number)->update($this->_table['readingRoom_mst']) === false) {
                throw new \Exception('좌석상태 수정에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }

    /**
     * 좌석상태 업데이트
     * @param $lr_idx           [상품코드에 매핑되는 식별자]
     * @param $serial_number    [좌석번호]
     * @param $now_order_idx    [생성된 주문 식별자]
     * @param $status_ccd       [좌석상태 -> 682001:미사용, 682002:사용중, 682003:대기, 682004:홀드, 682005:고장]
     * @param $start_date
     * @param $end_date
     * @param @master_order_idx    [연장일 경우]
     * @return bool|string
     */
    protected function _updateSeatMstExtension($lr_idx, $serial_number, $now_order_idx, $status_ccd, $start_date, $end_date, $master_order_idx)
    {
        try {
            $master_o_idx = $master_order_idx;
            $now_o_idx = $now_order_idx;

            //기존좌석번호조회 -> 좌석이동일 경우 기존좌석번호에 해당되는 데이터 초기화
            $arr_condition = [
                'EQ' => [
                    'MasterOrderIdx' => $master_order_idx,
                    'StatusCcd' => $this->readingRoomModel->_arr_reading_room_status_ccd['Y']
                ]
            ];
            $now_seat_data = $this->_getReadingRoomMst($arr_condition, 'SerialNumber, StatusCcd');
            if ($serial_number != $now_seat_data['SerialNumber']) {
                $data = [
                    'MasterOrderIdx' => null,
                    'NowOrderIdx' => null,
                    'StatusCcd' => $this->_arr_reading_room_status_ccd['N'],
                    'UseStartDate' => null,
                    'UseEndDate' => null,
                    'UpdAdminIdx' => $this->session->userdata('admin_idx')
                ];

                if ($this->_conn->set($data)->where('LrIdx', $lr_idx)->where('SerialNumber', $now_seat_data['SerialNumber'])->update($this->_table['readingRoom_mst']) === false) {
                    throw new \Exception('좌석상태 수정에 실패했습니다.');
                }
            }

            $data = [
                'MasterOrderIdx' => $master_o_idx,
                'NowOrderIdx' => $now_o_idx,
                'StatusCcd' => $status_ccd,
                'UseStartDate' => $start_date,
                'UseEndDate' => $end_date,
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];

            if ($this->_conn->set($data)->where('LrIdx', $lr_idx)->where('SerialNumber', $serial_number)->update($this->_table['readingRoom_mst']) === false) {
                throw new \Exception('좌석상태 수정에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }

    /**
     * 좌석 상세 정보 저장 [입실]
     * @param $prod_code        [상품코드]
     * @param $lr_idx
     * @param $master_order_idx [기존주문식별자, 신규일 경우 현재주문식별자로 처리]
     * @param $now_order_idx    [현재주문식별자]
     * @param $now_m_idx        [사용중인좌석]
     * @param $old_m_idx        [이전사용좌석]
     * @param $use_start_date   [시작일 월단위]
     * @param $use_end_date     [종료일 월단위]
     * @param $target_month     [좌석 이동시 사용]
     * @param $target_start_date [좌석 이동시 사용]
     * @return bool|string
     */
    protected function _insertSeatDetailForRoomIn($prod_code, $lr_idx, $master_order_idx, $now_order_idx, $now_m_idx, $old_m_idx, $use_start_date, $use_end_date, $target_month = null, $target_start_date = null)
    {
        try {
            if ($use_start_date >= $use_end_date) {
                throw new \Exception('날짜 정보가 올바르지 않습니다. 다시 시도해 주세요.');
            }

            //독서실/사물함 판매가 조회
            $arr_condition = [
                'EQ' => [
                    'ProdCode' => $prod_code,
                    'IsStatus' => 'Y'
                ]
            ];
            $product_data = $this->_getProductSaleForReadingRoomInfo($arr_condition, 'RealSalePrice');
            if (empty($product_data) === true) {
                throw new \Exception('조회된 상품가격 정보가 없습니다.');
            }

            //월별가격 [일별가격 * 월별기간]
            $arr_monthly_price = $this->_setMonthlyPrice($product_data['RealSalePrice'], $use_start_date, $use_end_date);

            if (empty($target_month) === false) {
                $arr_monthly_price[$target_month][0] = $target_start_date;
                $daily_price = $this->_setDailyPrice($product_data['RealSalePrice'], $use_start_date, $use_end_date);
                $interval = $this->_setDayDiff($arr_monthly_price[$target_month][0], $arr_monthly_price[$target_month][1]);
                $day_total_price = $interval * $daily_price;
                $arr_monthly_price[$target_month][2] = $day_total_price;

                $insert_data[$target_month] = $arr_monthly_price[$target_month];
            } else {
                $insert_data = $arr_monthly_price;
            }

            foreach ($insert_data as $key => $val) {
                $seat_data = [
                    'LrIdx' => $lr_idx,
                    'MasterOrderIdx' => $master_order_idx,
                    'NowOrderIdx' => $now_order_idx,
                    'NowMIdx' => $now_m_idx,
                    'OldMIdx' => $old_m_idx,
                    'StatusCcd' => $this->_arr_reading_room_seat_status_ccd['in'],
                    'UseStartDate' => $val[0],
                    'UseEndDate' => $val[1],
                    'Price' => $val[2],
                    'RegAdminIdx' => $this->session->userdata('admin_idx'),
                    'RegIp' => $this->input->ip_address()
                ];

                if($this->_conn->set($seat_data)->insert($this->_table['readingRoom_useDetail']) === false) {
                    throw new \Exception('좌석 배정에 실패했습니다.');
                };

            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }

    /**
     * 좌석 상세 정보 저장 [입실 연장]
     * @param $prod_code
     * @param $lr_idx
     * @param $now_order_idx
     * @param $now_m_idx
     * @param $old_m_idx
     * @param $use_start_date
     * @param $use_end_date
     * @param $master_order_idx
     * @return bool|string
     */
    protected function _insertSeatDetailForRoomInExtension($prod_code, $lr_idx, $now_order_idx, $now_m_idx, $old_m_idx, $use_start_date, $use_end_date, $master_order_idx)
    {
        try {
            if ($use_start_date >= $use_end_date) {
                throw new \Exception('날짜 정보가 올바르지 않습니다. 다시 시도해 주세요.');
            }

            //독서실/사물함 판매가 조회
            $arr_condition = [
                'EQ' => [
                    'ProdCode' => $prod_code,
                    'IsStatus' => 'Y'
                ]
            ];
            $product_data = $this->_getProductSaleForReadingRoomInfo($arr_condition, 'RealSalePrice');
            if (empty($product_data) === true) {
                throw new \Exception('조회된 상품가격 정보가 없습니다.');
            }

            //기존 master_order_idx 해당되는 좌석 모두 퇴실처리
            $arr_condition = ['MasterOrderIdx' => $master_order_idx];
            $update_input = [
                'StatusCcd' => $this->_arr_reading_room_seat_status_ccd['end']
            ];
            if ($this->updateSeatDetail($arr_condition, $update_input) !== true) {
                throw new \Exception('기존 좌석 상태 수정에 실패했습니다.');
            }

            //월별가격 [일별가격 * 월별기간]
            $arr_monthly_price = $this->_setMonthlyPrice($product_data['RealSalePrice'], $use_start_date, $use_end_date);
            $insert_data = $arr_monthly_price;

            foreach ($insert_data as $key => $val) {
                $seat_data = [
                    'LrIdx' => $lr_idx,
                    'MasterOrderIdx' => $master_order_idx,
                    'NowOrderIdx' => $now_order_idx,
                    'NowMIdx' => $now_m_idx,
                    'OldMIdx' => $old_m_idx,
                    'StatusCcd' => $this->_arr_reading_room_seat_status_ccd['extension'],
                    'UseStartDate' => $val[0],
                    'UseEndDate' => $val[1],
                    'Price' => $val[2],
                    'RegAdminIdx' => $this->session->userdata('admin_idx'),
                    'RegIp' => $this->input->ip_address()
                ];

                if($this->_conn->set($seat_data)->insert($this->_table['readingRoom_useDetail']) === false) {
                    throw new \Exception('좌석 배정에 실패했습니다.');
                };

            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }

    /**
     * 좌석관리테이블 업데이트
     * @param $arr_condition
     * @param $input
     * @param null $is_refund
     * @return array|bool
     */
    protected function updateReadingRoomMst($arr_condition, $input, $is_refund = null)
    {
        try {
            $input['UpdAdminIdx'] = $this->session->userdata('admin_idx');
            $input['UpdDatm'] = date('Y-m-d H:i:s');

            $is_update = $this->_conn->set($input);

            //호출방식이 환불일경우 해당 데이터 null 으로 update
            if ($is_refund == 'Y') {
                $is_update = $is_update->set('MasterOrderIdx', 'null', false);
                $is_update = $is_update->set('NowOrderIdx', 'null', false);
                $is_update = $is_update->set('UseStartDate', 'null', false);
                $is_update = $is_update->set('UseEndDate', 'null', false);
            }

            $is_update = $is_update->where($arr_condition);
            $is_update = $is_update->update($this->_table['readingRoom_mst']);

            if ($is_update === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

        } catch (\Exception $e) {
            return error_result($e);
        }
        return true;
    }

    /**
     * 좌석관리데이타 수정 [기존좌석 퇴실, 변경할 좌석 입실처리]
     * @param $input
     * @param $data
     * @return array|bool
     */
    protected function _modifyReadingRoomMst($input, $data)
    {
        try {
            $arr_update_condition = [
                'LrIdx' => $data['LrIdx'],
                'NowOrderIdx' => $data['NowOrderIdx'],
                'SerialNumber' => $data['SerialNumber'],
                'StatusCcd' => $data['SeatStatusCcd']
            ];
            $arr_target_data = [
                'MasterOrderIdx' => null,
                'NowOrderIdx' => null,
                'StatusCcd' => $this->_arr_reading_room_status_ccd['N'],
                'UseStartDate' => null,
                'UseEndDate' => null
            ];
            if ($this->updateReadingRoomMst($arr_update_condition, $arr_target_data) !== true) {
                throw new \Exception('좌석 수정에 실패했습니다.');
            }

            $arr_update_condition = [
                'LrIdx' => $data['LrIdx'],
                'SerialNumber' => $input['set_seat']
            ];
            $arr_target_data = [
                'MasterOrderIdx' => $data['MasterOrderIdx'],
                'NowOrderIdx' => $data['NowOrderIdx'],
                'StatusCcd' => $input['rdr_seat_status'],
                'UseStartDate' => $data['UseStartDate'],
                'UseEndDate' => $data['UseEndDate'],
            ];

            if ($this->updateReadingRoomMst($arr_update_condition, $arr_target_data) !== true) {
                throw new \Exception('좌석 수정에 실패했습니다.');
            }

        } catch (\Exception $e) {
            return error_result($e);
        }
        return true;
    }

    /**
     * 좌석이동
     * @param array $input
     * @param $data
     * @return array|bool
     */
    protected function _modifyReadingRoomDetail($input = [], $data)
    {
        try {
            $int_now_date = date('Ymd');
            $now_date = date('Y-m-d');
            $now_month = date('Y-m');
            $beforeDay = date("Y-m-d", strtotime($now_date." -1 day"));

            //기존데이터조회
            $arr_condition = [
                'EQ' => [
                    'NowOrderIdx' => $input['now_order_idx'],
                    'NowMIdx' => $data['SerialNumber'],
                    'LrIdx' => $data['LrIdx'],
                ]
            ];
            $arr_condition = array_merge($arr_condition,[
                'NOT' => [
                    'StatusCcd' => $this->_arr_reading_room_seat_status_ccd['out'],
                ]
            ]);
            $old_detail_data = $this->_getReadingRoomUseDetail($arr_condition, 'RrudIdx, LrIdx, MasterOrderIdx, NowOrderIdx, NowMIdx, StatusCcd, UseStartDate, UseEndDate, Price');

            foreach ($old_detail_data as $row) {
                $arr_condition = ['RrudIdx' => $row['RrudIdx']];
                $start_date = str_replace('-', '', $row['UseStartDate']);
                $end_date = str_replace('-', '', $row['UseEndDate']);

                if ($start_date == $int_now_date) {
                    //퇴실
                    $update_input = [
                        'StatusCcd' => $this->_arr_reading_room_seat_status_ccd['end']
                    ];
                    if ($this->updateSeatDetail($arr_condition, $update_input) !== true) {
                        throw new \Exception('좌석 수정에 실패했습니다.');
                    }

                    if ($this->_insertSeatDetailForRoomIn($data['ProdCode'], $row['LrIdx'], $row['MasterOrderIdx'], $row['NowOrderIdx'], $input['set_seat'], $row['NowMIdx'], $data['UseStartDate'], $data['UseEndDate'], $now_month, $now_date) !== true) {
                        throw new \Exception('좌석 등록에 실패했습니다.');
                    }
                } else {
                    if ($start_date < $int_now_date || $end_date < $int_now_date) {
                        if ($start_date < $int_now_date && $end_date < $int_now_date) {
                            //퇴실
                            $update_input = [
                                'StatusCcd' => $this->_arr_reading_room_seat_status_ccd['end']
                            ];
                            if ($this->updateSeatDetail($arr_condition, $update_input) !== true) {
                                throw new \Exception('좌석 수정에 실패했습니다.');
                            }

                        } else {
                            //해당 월, 전일 날짜까지의 금액
                            $daily_price = $this->_setDailyPrice($data['RealPayPrice'], $row['UseStartDate'], $data['UseEndDate']);
                            $interval = $this->_setDayDiff($row['UseStartDate'], $beforeDay);
                            $day_total_price = $interval * $daily_price;

                            $update_input = [
                                'UseStartDate' => $row['UseStartDate'],
                                'UseEndDate' => $beforeDay,
                                'Price' => $day_total_price,
                                'StatusCcd' => $this->_arr_reading_room_seat_status_ccd['end']
                            ];

                            if ($this->updateSeatDetail($arr_condition, $update_input) !== true) {
                                throw new \Exception('좌석 수정에 실패했습니다.');
                            }

                            if ($this->_insertSeatDetailForRoomIn($data['ProdCode'], $row['LrIdx'], $row['MasterOrderIdx'], $row['NowOrderIdx'], $input['set_seat'], $row['NowMIdx'], $data['UseStartDate'], $data['UseEndDate'], $now_month, $now_date) !== true) {
                                throw new \Exception('좌석 등록에 실패했습니다.');
                            }
                        }

                    } else {
                        //자리이동
                        $update_input = [
                            'NowMIdx' => $input['set_seat'],
                            'OldMIdx' => $row['NowMIdx'],
                            'StatusCcd' => $this->_arr_reading_room_seat_status_ccd['change']
                        ];

                        if ($this->updateSeatDetail($arr_condition, $update_input) !== true) {
                            throw new \Exception('좌석 수정에 실패했습니다.');
                        }
                    }
                }
            }

        } catch (\Exception $e) {
            return error_result($e);
        }
        return true;
    }

    /**
     * 좌석현황 정보 수정
     * @param $arr_condition
     * @param $input
     * @return array|bool
     */
    protected function updateSeatDetail($arr_condition, $input)
    {
        try {
            $input['UpdAdminIdx'] = $this->session->userdata('admin_idx');
            $input['UpdDatm'] = date('Y-m-d H:i:s');

            $is_update = $this->_conn->set($input);
            $is_update = $is_update->where($arr_condition);
            $is_update = $is_update->update($this->_table['readingRoom_useDetail']);

            if ($is_update === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

        } catch (\Exception $e) {
            return error_result($e);
        }
        return true;
    }

    /**
     * 메모저장
     * @param $master_order_idx
     * @param $memo
     * @return bool|string
     */
    protected function _addMemo($master_order_idx, $memo)
    {
        try {
            $data = [
                'MasterOrderIdx' => $master_order_idx,
                'Memo' => $memo,
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ];

            if($this->_conn->set($data)->insert($this->_table['readingRoom_Memo']) === false) {
                throw new \Exception('메모 등록에 실패했습니다.');
            };
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }

    /**
     * 월별 가격 계산
     * 남은 금액 차에 따른 월별 금액 분배
     * - 상품가격보다 남은 금액이 적을 경우 : 첫째달에서 금액 더하기
     * - 상품가격보다 남은 금액이 많을 경우 : 마지막달에서 금액 빼기
     * @param $price
     * @param $start_date
     * @param $end_date
     * @return mixed
     */
    private function _setMonthlyPrice($price, $start_date, $end_date)
    {
        //일별가격
        $daily_price = $this->_setDailyPrice($price, $start_date, $end_date);

        //월별 시작일,종료일 셋팅
        $arr_day = $this->_setMonthDays($start_date, $end_date);

        //월별(일자계산) 가격
        $temp_sum_price = 0;
        foreach ($arr_day as $key => $day) {
            $interval = $this->_setDayDiff($day[0], $day[1]);
            $temp_sum_price += $interval * $daily_price;
            $arr_day[$key][] = $interval * $daily_price;
        }

        //상품가격, 월별계산 가격 차이
        $temp_price = $price - $temp_sum_price;
        foreach ($arr_day as $key => $rows) {
            if ($temp_price >= 0) {
                if ($rows[0] === reset($arr_day)[0]) {
                    $arr_day[$key][2] = $temp_price + $arr_day[$key][2];
                }
            } else {
                if ($rows[0] === end($arr_day)[0]) {
                    $arr_day[$key][2] = $arr_day[$key][2] + $temp_price;
                }
            }
        }

        return $arr_day;
    }

    /**
     * 일별 가격 계산 [소수점 반올림]
     * @param $price
     * @param $start_date
     * @param $end_date
     * @return mixed
     */
    private function _setDailyPrice($price, $start_date, $end_date)
    {
        $interval = $this->_setDayDiff($start_date, $end_date);
        $daily_price = round($price / $interval);
        return $daily_price;
    }

    /**
     * 월별 시작일,종료일 셋팅
     * @param $start_date
     * @param $end_date
     * @return mixed
     */
    private function _setMonthDays($start_date, $end_date)
    {
        $m_diff = $this->_setMonthDiff($start_date, $end_date);

        $set_start_date = date('Y-m',strtotime($start_date));
        if ($m_diff <= 0) {
            $set_days[$set_start_date][] = $start_date;  //시작일
            $set_days[$set_start_date][] = $set_start_date.'-'.date('d', strtotime($end_date));   //시작월의 마지막 날짜
        } else {
            $set_days[$set_start_date][] = $start_date;  //시작일
            $set_days[$set_start_date][] = $set_start_date.'-'.date('t', strtotime($set_start_date));   //시작월의 마지막 날짜
        }

        //시작월 기준 +1개월
        for($i=0; $i<$m_diff; $i++) {
            $start_date = date("Y-m", strtotime(date($start_date)." +1 month"));
            $set_days[$start_date][] = $start_date.'-01';  //시작일

            //last loop
            if ($i == ($m_diff-1)) {
                $set_days[$start_date][] = $start_date . '-' . date('d', strtotime($end_date));   //시작월의 마지막 날짜
            } else {
                $set_days[$start_date][] = $start_date . '-' . date('t', strtotime($start_date));   //시작월의 마지막 날짜
            }
        }
        return $set_days;
    }

    /**
     * 날짜차이 (일수)
     * @param $start_date   [시작일]
     * @param $end_date     [종료일]
     * @param $is_today     [시작일 포함여부]
     * @return int|string
     */
    private function _setDayDiff($start_date, $end_date, $is_today = true)
    {
        $datetime1 = new DateTime($start_date);
        $datetime2 = new DateTime($end_date);
        $day_diff = $datetime1->diff($datetime2);
        $interval = $day_diff->format('%a') + (($is_today === true) ? 1 : 0);
        return $interval;
    }

    /**
     * 날짜차이 (월수)
     * @param $start_date
     * @param $end_date
     * @return float|int
     */
    private function _setMonthDiff($start_date, $end_date)
    {
        $s_date = explode('-',date('Y-m', strtotime(date($start_date))));
        $e_date = explode('-',date('Y-m', strtotime(date($end_date))));
        $diff_month = ($e_date[0] - $s_date[0])*12 + $e_date[1] - $s_date[1];
        return $diff_month;
    }

    /**
     * 문자발송여부
     * @param $input
     * @return array|bool
     */
    public function modifyReadingRoomSmsIsUse($input)
    {
        $this->_conn->trans_begin();
        try {
            if ($this->_updateSmsIsUse($input) !== true) {
                throw new \Exception('문자발송여부 수정에 실패했습니다.');
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 문자발송여부 수정
     * @param $input
     * @return bool|string
     */
    protected function _updateSmsIsUse($input)
    {
        try {
            $data = [
                'IsSmsUse' => element('sms_is_use', $input),
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];
            if ($this->_conn->set($data)->where('LrIdx', element('lr_idx', $input))->update($this->_table['readingRoom']) === false) {
                throw new \Exception('문자발송여부 수정에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }

}