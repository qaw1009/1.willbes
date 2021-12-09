<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfessorHotClipFModel extends WB_Model
{
    private $_table = [
        'professor_hot_clip_group' => 'lms_professor_hot_clip_group',
        'professor_hot_clip' => 'lms_professor_hot_clip',
        'professor_hot_clip_thumbnail' => 'lms_professor_hot_clip_thumbnail',
        'product_subject' => 'lms_product_subject',
        'professor' => 'lms_professor',
        'pms_professor' => 'wbs_pms_professor',
        'professor_hot_clip_product' => 'lms_professor_hot_clip_product',
        'product' => 'lms_product',
        'product_lecture' => 'lms_product_lecture',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 강사 핫클립 데이터 리스트
     * @param array $arr_condition
     * @param string $order_by
     * @return mixed
     */
    public function listHotClip($arr_condition = [], $order_by = '')
    {
        $column = "
            hc.PhcIdx,hc.SiteCode,hc.CateCode,hc.ProfIdx,hc.SubjectIdx,hc.OrderNum
            ,hc.ProfBgImagePath,hc.ProfBgImageName,hc.ProfBgImageRealName
	        ,hc.ProfBtnIsUse,hc.CurriculumBtnIsUse,hc.StudyCommentBtnIsUse,hc.RegDatm
	        ,ps.SubjectName,wp.wProfName
	        ,(
            SELECT
                CONCAT('[', GROUP_CONCAT(JSON_OBJECT(
                    'LinkType', LinkType,
                    'LinkUrl', LinkUrl,
                    'ThumbnailPath', ThumbnailPath,
                    'ThumbnailFileName', ThumbnailFileName,
                    'ThumbnailRealName', ThumbnailRealName
                )), ']') AS info
            FROM {$this->_table['professor_hot_clip_thumbnail']} AS hct
            WHERE hc.PhcIdx = hct.PhcIdx AND hct.IsStatus = 'Y'
            ) AS thumbnail_data
        ";
        $from = "
            FROM {$this->_table['professor_hot_clip']} AS hc
            INNER JOIN {$this->_table['product_subject']} AS ps ON hc.SubjectIdx = ps.SubjectIdx
            INNER JOIN {$this->_table['professor']} AS pf ON hc.ProfIdx = pf.ProfIdx
            INNER JOIN {$this->_table['pms_professor']} AS wp ON pf.wProfIdx = wp.wProfIdx
        ";
        $order_by = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        return $this->_conn->query('select ' . $column . $from . $where . $order_by)->result_array();
    }

    /**
     * todo : 개발/테스트 완료 후 실제 함수에 대입 (2021.12.06)
     * 강사 핫클립 데이터 리스트
     * @param array $arr_condition
     * @param string $order_by
     * @return mixed
     */
    public function listHotClip_test($arr_condition = [], $order_by = '')
    {
        $column = "
            g.PhcgIdx AS group_code,g.Title AS group_title
            ,hc.PhcIdx,hc.SiteCode,hc.CateCode,hc.ProfIdx,hc.SubjectIdx,hc.OrderNum
            ,hc.ProfBgImagePath,hc.ProfBgImageName,hc.ProfBgImageRealName
	        ,hc.ProfBtnIsUse,hc.CurriculumBtnIsUse,hc.StudyCommentBtnIsUse,hc.RegDatm
	        ,ps.SubjectName,wp.wProfName
	        ,(
            SELECT
                CONCAT('[', GROUP_CONCAT(JSON_OBJECT(
                    'LinkType', LinkType,
                    'LinkUrl', LinkUrl,
                    'ThumbnailPath', ThumbnailPath,
                    'ThumbnailFileName', ThumbnailFileName,
                    'ThumbnailRealName', ThumbnailRealName
                )), ']') AS info
            FROM {$this->_table['professor_hot_clip_thumbnail']} AS hct
            WHERE hc.PhcIdx = hct.PhcIdx AND hct.IsStatus = 'Y'
            ) AS thumbnail_data
        ";
        $from = "
            FROM {$this->_table['professor_hot_clip_group']} AS g
            INNER JOIN {$this->_table['professor_hot_clip']} AS hc ON g.PhcgIdx = hc.PhcgIdx
            INNER JOIN {$this->_table['product_subject']} AS ps ON hc.SubjectIdx = ps.SubjectIdx
            INNER JOIN {$this->_table['professor']} AS pf ON hc.ProfIdx = pf.ProfIdx
            INNER JOIN {$this->_table['pms_professor']} AS wp ON pf.wProfIdx = wp.wProfIdx
        ";
        $order_by = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        return $this->_conn->query('select ' . $column . $from . $where . $order_by)->result_array();
    }

    /**
     * 핫클립 상품 리스트
     * @param array $arr_condition
     * @param string $order_by
     * @return mixed
     */
    public function listHotClipForProduct($arr_condition = [], $order_by = '')
    {
        $column = "
            g.PhcgIdx AS group_code,g.Title AS group_title
            ,hc.PhcIdx,hc.SiteCode,hc.CateCode,hc.ProfIdx,hc.SubjectIdx,hc.OrderNum
            ,hc.ProfBgImagePath,hc.ProfBgImageName,hc.ProfBgImageRealName
	        ,hc.ProfBtnIsUse,hc.CurriculumBtnIsUse,hc.StudyCommentBtnIsUse,hc.RegDatm
	        ,ps.SubjectName,wp.wProfName
	        ,(
                SELECT
                    CONCAT('[', GROUP_CONCAT(JSON_OBJECT(
                        'LinkType', LinkType,
                        'LinkUrl', LinkUrl,
                        'ThumbnailPath', ThumbnailPath,
                        'ThumbnailFileName', ThumbnailFileName,
                        'ThumbnailRealName', ThumbnailRealName
                    )), ']') AS info
                FROM {$this->_table['professor_hot_clip_thumbnail']} AS hct
                WHERE hc.PhcIdx = hct.PhcIdx AND hct.IsStatus = 'Y'
            ) AS thumbnail_data
            ,(
                SELECT CONCAT('[', GROUP_CONCAT(JSON_OBJECT(
                    'ProfName', wp.wProfName,
                    'LearnPatternCcd', c.LearnPatternCcd,
                    'ProductTitle', IF(c.LearnPatternCcd = '615007','학원직강 신청', '동영상강의 신청'),
                    'ProdCode',a.ProdCode,
                    'ProdName',b.ProdName,
                    'ProdItemCcdName', IF(a.ProdItemCcd = '747001', '', CONCAT(' - ',fn_ccd_name(a.ProdItemCcd)))
                ) ORDER BY a.OrderNum ASC), ']') AS info
                FROM {$this->_table['professor_hot_clip_product']} AS a
                INNER JOIN {$this->_table['product']} AS b ON b.ProdCode = a.ProdCode
                INNER JOIN {$this->_table['product_lecture']} AS c ON b.ProdCode = c.ProdCode AND a.Territory = '1'
                WHERE hc.PhcIdx = a.PhcIdx AND a.IsStatus = 'Y'
            ) AS product_info_1
            ,(
                SELECT CONCAT('[', GROUP_CONCAT(JSON_OBJECT(
                    'ProfName', wp.wProfName,
                    'LearnPatternCcd', c.LearnPatternCcd,
                    'ProductTitle', IF(c.LearnPatternCcd = '615007','학원직강 신청', '동영상강의 신청'),
                    'ProdCode',a.ProdCode,
                    'ProdName',b.ProdName,
                    'ProdItemCcdName', IF(a.ProdItemCcd = '747001', '', CONCAT(' - ',fn_ccd_name(a.ProdItemCcd)))
                ) ORDER BY a.OrderNum ASC), ']') AS info
                FROM {$this->_table['professor_hot_clip_product']} AS a
                INNER JOIN {$this->_table['product']} AS b ON b.ProdCode = a.ProdCode
                INNER JOIN {$this->_table['product_lecture']} AS c ON b.ProdCode = c.ProdCode AND a.Territory = '2'
                WHERE hc.PhcIdx = a.PhcIdx AND a.IsStatus = 'Y'
            ) AS product_info_2
        ";
        $from = "
            FROM {$this->_table['professor_hot_clip_group']} AS g
            INNER JOIN {$this->_table['professor_hot_clip']} AS hc ON g.PhcgIdx = hc.PhcgIdx
            INNER JOIN {$this->_table['product_subject']} AS ps ON hc.SubjectIdx = ps.SubjectIdx
            INNER JOIN {$this->_table['professor']} AS pf ON hc.ProfIdx = pf.ProfIdx
            INNER JOIN {$this->_table['pms_professor']} AS wp ON pf.wProfIdx = wp.wProfIdx
        ";
        $order_by = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        return $this->_conn->query('select ' . $column . $from . $where . $order_by)->result_array();
    }
}