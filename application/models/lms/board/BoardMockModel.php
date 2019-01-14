<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once  APPPATH . 'models/lms/board/BoardModel.php';

class BoardMockModel extends BoardModel
{
    private $_mock_table = [
        'mockProduct' => 'lms_Product_Mock',
        'Product' => 'lms_Product',
        'ProductCate' => 'lms_Product_R_Category',
        'category' => 'lms_sys_category',
        'ProductSale' => 'lms_Product_Sale',
        'admin' => 'wbs_sys_admin',
        'sysCode' => 'lms_sys_code',
    ];

    public function mainList($conditionAdd='', $limit='', $offset='')
    {
        $condition = [ 'IN' => ['PD.SiteCode' => get_auth_site_codes()] ];    //사이트 권한 추가
        if($conditionAdd) $condition = array_merge_recursive($condition, $conditionAdd);

        $offset_limit = (is_numeric($limit) && is_numeric($offset)) ? "LIMIT $offset, $limit" : "";


        $select = "
            SELECT MP.*, A.wAdminName, PD.ProdName, PD.SaleStartDatm, PD.SaleEndDatm, PD.IsUse, PS.SalePrice, PS.RealSalePrice,          
            C1.CateName, C1.IsUse AS IsUseCate,
            SC1.CcdName As AcceptStatusCcd_Name,
            IFNULL(BD1.cnt, 0) AS qnaTotalCnt, IFNULL(BD2.cnt, 0) AS qnaUnAnsweredCnt,
            IFNULL(BD3.cnt, 0) AS noticeCnt
        ";
        $from = "
            FROM {$this->_mock_table['mockProduct']} AS MP
            JOIN {$this->_mock_table['Product']} AS PD ON MP.ProdCode = PD.ProdCode 
            JOIN {$this->_mock_table['ProductCate']} AS PC ON MP.ProdCode = PC.ProdCode AND PC.IsStatus = 'Y'
            JOIN {$this->_mock_table['category']} AS C1 ON PC.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
            JOIN {$this->_mock_table['ProductSale']} AS PS ON MP.ProdCode = PS.ProdCode AND PS.IsStatus = 'Y'
            LEFT JOIN {$this->_mock_table['admin']} AS A ON MP.RegAdminIdx = A.wAdminIdx
            LEFT OUTER JOIN {$this->_mock_table['sysCode']} AS SC1 ON MP.AcceptStatusCcd = SC1.Ccd
            
            LEFT JOIN (
                SELECT ProdCode, COUNT(*) AS cnt
                FROM {$this->_table}
                WHERE BmIdx = '95' AND RegType = '0' AND IsStatus = 'Y'
                GROUP BY ProdCode
            ) AS BD1 ON BD1.ProdCode = MP.ProdCode
            
            LEFT JOIN (
                SELECT ProdCode, COUNT(*) AS cnt
                FROM {$this->_table}
                WHERE BmIdx = '95' AND RegType = '0' AND ReplyStatusCcd = '621001' AND IsStatus = 'Y'
                GROUP BY ProdCode
            ) AS BD2 ON BD2.ProdCode = MP.ProdCode
            
            LEFT JOIN (
                SELECT ProdCode, COUNT(*) AS cnt
                FROM {$this->_table}
                WHERE BmIdx = '96' AND IsStatus = 'Y'
                GROUP BY ProdCode
            ) AS BD3 ON BD3.ProdCode = MP.ProdCode
        ";
        $selectCount = "SELECT COUNT(*) AS cnt";
        $where = "WHERE PD.IsStatus = 'Y' ";
        $where .= $this->_conn->makeWhere($condition)->getMakeWhere(true)."\n";
        $order = "ORDER BY MP.ProdCode DESC\n";

        //echo $select . $from . $where . $order . $offset_limit;

        $data = $this->_conn->query($select . $from . $where . $order . $offset_limit)->result_array();
        $count = $this->_conn->query($selectCount . $from . $where)->row()->cnt;


        // 직렬이름 추출
        $mockKindCode = $this->config->item('sysCode_kind', 'mock'); // 직렬 운영코드값
        $codes = $this->codeModel->getCcdInArray([$mockKindCode]);


        // 데이터정리
        $applyType_on = $this->config->item('sysCode_applyType_on', 'mock');   // 응시형태(online)
        $applyType_off = $this->config->item('sysCode_applyType_off', 'mock'); // 응시형태(offline)

        foreach ($data as &$it) {
            $takeFormsCcds = explode(',', $it['TakeFormsCcd']);
            $it['TakePart_on'] = ( in_array($applyType_on, $takeFormsCcds) ) ? 'Y' : 'N';
            $it['TakePart_off'] = ( in_array($applyType_off, $takeFormsCcds) ) ? 'Y' : 'N';

            $mockPart = explode(',', $it['MockPart']);
            foreach ($mockPart as $mp) {
                if( !empty($codes[$mockKindCode][$mp]) ) $it['MockPartName'][] = $codes[$mockKindCode][$mp];
            }
        }

        return array($data, $count);
    }
}