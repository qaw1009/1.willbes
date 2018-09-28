<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseReadingRoomModel extends WB_Model
{
    public $arr_mang_title = [
        'R' => '독서실',
        'L' => '사물함'
    ];
    public $arr_product_type_ccd = [
        'R' => '636007',    //상품타입공통코드 독서실
        'L' => '636008'     //상품타입공통코드 사물함
    ];
    public $_groupCcd = [
        'seat' => '682'     //좌석상태 (미사용,사용중,대기,홀드,고장)
    ];

    private $sub_product_type_ccd = '636009';   //상품타입공통코드 예치금
    private $_prod_code;
    private $_sub_prod_code;
    private $_lr_idx;
    private $_arr_sale_status_ccd = [
        'main' => '618001',    //판매상태(판매가능)
        'sub' => '618003'      //판매상태(판매불가)
    ];
    private $_sale_type_ccd = '613001'; // 상품판매구분 > PC+모바일

    protected $_arr_reading_room_status_ccd = [
        'N' => '682001',      //독서실사물함 좌석상태(미사용)
        'Y' => '682002'    //독서실사물함 좌석상태(사용중)
    ];

    protected $_arr_reading_room_seat_status_ccd = [
        'in' => '683001',           //배정
        'extension' => '683002',    //연장
        'change' => '683003',       //자리이동
        'out' => '683004',          //퇴실
    ];

    protected $_table = [
        'lms_site' => 'lms_site',
        'lms_sys_code' => 'lms_sys_code',
        'lms_order' => 'lms_order',
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
     * 독서실/사물함 데이터 조회
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
                'ProdTypeCcd' => $this->arr_product_type_ccd[element('mang_type',$input)],
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
                'ProdTypeCcd' => $this->sub_product_type_ccd,
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
            if($this->_setDataDelete($prod_code,$this->_table['product_r_product'],'연관상품','where','ProdTypeCcd', $this->arr_product_type_ccd[element('mang_type',$input)]) !== true) {
                throw new \Exception('연관상품 수정에 실패했습니다.');
            }

            $data = [
                'ProdCode' => $prod_code,
                'ProdCodeSub' => $sub_prod_code,
                'IsSale' => 'N',
                'ProdTypeCcd' => $this->arr_product_type_ccd[element('mang_type',$input)],
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
     * @return string
     */
    protected function _makeAuthCampusQueryString()
    {
        $arr_auth_campus_ccds = get_auth_all_campus_ccds();
        $where_campus = $this->_conn->group_start();
        foreach ($arr_auth_campus_ccds as $set_site_ccd => $set_campus_ccd) {
            $where_campus->or_group_start();
            $where_campus->or_where('a.SiteCode',$set_site_ccd);
            $where_campus->group_start();
            $where_campus->where('a.CampusCcd', $this->codeModel->campusAllCcd);
            $where_campus->or_where_in('a.CampusCcd', $set_campus_ccd);
            $where_campus->group_end();
            $where_campus->group_end();
        }
        $where_campus->or_where('a.CampusCcd', "''", false);
        $where_campus->or_where('a.CampusCcd IS NULL');
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
        $SaleEndDatm = element('use_end_date',$input).'23:59:59';

        $input_product = [
            'ProdName' => element('rd_name',$input),
            'SaleStartDatm' => $SaleStartDatm,
            'SaleEndDatm' => $SaleEndDatm,
            'SaleStatusCcd' => $this->_arr_sale_status_ccd[$input_type],
            'IsSaleEnd' => 'N',
            'IsCoupon' => 'N',
            'IsPoint' => 'N',
            'PointApplyCcd' => '',
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
     * 좌석상태 업데이트
     * @param $lr_idx           [상품코드에 매핑되는 식별자]
     * @param $serial_number    [좌석번호]
     * @param $now_order_idx    [생성된 주문 식별자]
     * @param $status_ccd       [좌석상태 -> 682001:미사용, 682002:사용중, 682003:대기, 682004:홀드, 682005:고장]
     * @param $start_date
     * @param $end_date
     * @return bool|string
     */
    protected function _updateSeatMst($lr_idx, $serial_number, $now_order_idx, $status_ccd, $start_date, $end_date)
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
     * 좌석 상세 정보 저장 [입실 (자리이동/퇴실)]
     * @param $prod_code        [상품코드]
     * @param $lr_idx
     * @param $now_order_idx    [현재주문식별자]
     * @param $now_m_idx        [사용중인좌석]
     * @param $old_m_idx        [이전사용좌석]
     * @param $use_start_date   [시작일 월단위]
     * @param $use_end_date     [종료일 월단위]
     * @return bool|string
     */
    protected function _insertSeatDetail($prod_code, $lr_idx, $now_order_idx, $now_m_idx, $old_m_idx, $use_start_date, $use_end_date)
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

            foreach ($arr_monthly_price as $key => $val) {
                $seat_data = [
                    'LrIdx' => $lr_idx,
                    'MasterOrderIdx' => $now_order_idx,
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
        foreach ($arr_day as $key => $day) {
            $interval = $this->_setDayDiff($day[0], $day[1]);
            $arr_day[$key][] = $interval * $daily_price;
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
}