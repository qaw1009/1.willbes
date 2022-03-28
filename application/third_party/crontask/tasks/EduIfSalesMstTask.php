<?php
namespace crontask\tasks;

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'third_party/crontask/tasks/Task.php';

class EduIfSalesMstTask extends \crontask\tasks\Task
{
    /**
     * @var \CI_DB_query_builder
     */
    private $_src_db;

    /**
     * @var \CI_DB_query_builder
     */
    private $_rem_db;

    private $_src_table = [
        'teacher' => 'if_teacher_mst_log',
        'product' => 'if_product_mst_log',
        'product_sch' => 'if_product_sch_log',
        'order' => 'if_order_mst_log'
    ];

    private $_rem_table = [
        'teacher' => 'if_teacher_mst',
        'product' => 'if_product_mst',
        'product_sch' => 'if_product_sch',
        'order' => 'if_order_mst'
    ];

    public function __construct()
    {
        parent::__construct();

        $this->setLogId('ESM');     // cron 실행로그 작업구분 컬럼값
    }

    /**
     * 매출관리시스템 인터페이스 데이터 등록
     * @param null|string $if_sdate
     * @param null|string $if_edate
     * @return mixed|string
     */
    public function run($if_sdate = null, $if_edate = null)
    {
        $this->_src_db = $this->_CI->load->database('gathering', true);   // 소스DB
        $this->_rem_db = $this->_CI->load->database('eduif', true);     // 원격DB
        $this->_rem_db->trans_begin();
        
        try {
            $ret_msg = '';

            // 교수정보
            $teacher_result = $this->_runTeacherMst($if_sdate, $if_edate);
            if (is_numeric($teacher_result) === false) {
                throw new \Exception($teacher_result);
            }
            $ret_msg .= 'Teacher : ' . $teacher_result;

            // 상품정보
            $product_result = $this->_runProductMst($if_sdate, $if_edate);
            if (is_numeric($product_result) === false) {
                throw new \Exception($product_result);
            }
            $ret_msg .= ' / Product : ' . $product_result;

            // 강의스케줄
            $product_sch_result = $this->_runProductSch($if_sdate, $if_edate);
            if (is_numeric($product_sch_result) === false) {
                throw new \Exception($product_sch_result);
            }
            $ret_msg .= ' / Product Sch : ' . $product_sch_result;

            // 매출정보
            $order_result = $this->_runOrderMst($if_sdate, $if_edate);
            if (is_numeric($order_result) === false) {
                throw new \Exception($order_result);
            }
            $ret_msg .= ' / Order : ' . $order_result;

            $this->_rem_db->trans_commit();
            $this->setOutput('EduIfSalesMstTask complete.');
            return 'Success(' . $ret_msg . ')';
        } catch (\Exception $e) {
            $this->_rem_db->trans_rollback();
            $this->setOutput('EduIfSalesMstTask error occured. [' . $e->getMessage() . ']');
            return 'Error(' . $e->getMessage() . ')';
        } finally {
            $this->_src_db->close();
            $this->_rem_db->close();
        }
    }

    /**
     * 매출통합 인터페이스 일자 설정
     * @param null|string $if_sdate
     * @param null|string $if_edate
     * @return array|null[]
     */
    private function _setIfDate($if_sdate = null, $if_edate = null)
    {
        if (date_verify($if_sdate, 'Y-m-d') === false || date_verify($if_edate, 'Y-m-d') === false) {
            $if_sdate = date('Y-m-d');
            $if_edate = $if_sdate;
        }

        return [$if_sdate, $if_edate];
    }    

    /**
     * 교수정보 조회/등록
     * @param null|string $if_sdate
     * @param null|string $if_edate
     * @return int|string
     */
    private function _runTeacherMst($if_sdate = null, $if_edate = null)
    {
        try {
            $ins_cnt = 0;
            list($if_sdate, $if_edate) = $this->_setIfDate($if_sdate, $if_edate);

            // 교수정보 조회
            $query = /** @lang text */ '
                select SYS_CD, CUD_CD, current_timestamp() as SEND_TIME, TEACHER_CD, TEACHER_NM, CONTRACT_FR, CONTRACT_TO, CONTRACT_PAY
                from ' . $this->_src_table['teacher'] . '
                where IF_DATE between ? and ?
                order by IF_IDX asc
            ';
            $result = $this->_src_db->query($query, [$if_sdate, $if_edate])->result_array();
            logger('_runTeacherMst => ' . $this->_src_db->last_query());

            // 교수정보 등록
            if (empty($result) === false) {
                foreach ($result as $row) {
                    if ($this->_rem_db->set($row)->insert($this->_rem_table['teacher']) === false) {
                        throw new \Exception('교수정보 등록에 실패했습니다. (' . element('message', $this->_rem_db->error()) . ')');
                    }
                    $ins_cnt++;
                }
            }
            logger('_runTeacherMst => Remote DB insert completed.');

            return $ins_cnt;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * 상품정보 조회/등록
     * @param null|string $if_sdate
     * @param null|string $if_edate
     * @return int|string
     */
    private function _runProductMst($if_sdate = null, $if_edate = null)
    {
        try {
            $ins_cnt = 0;
            list($if_sdate, $if_edate) = $this->_setIfDate($if_sdate, $if_edate);

            // 상품정보 조회
            $query = /** @lang text */ '
                select SYS_CD, CUD_CD, current_timestamp() as SEND_TIME, A_CD, P_TYPE, TEACHER_CD, P_CD, P_NM, P_CRE_DATE, C_NM, C_DETAIL_NM, FR_DATE, TO_DATE
                    , PRICE, REFUND, C_DAY, C_PRICE, C_RATE
                from ' . $this->_src_table['product'] . '
                where IF_DATE between ? and ?
                order by IF_IDX asc
            ';
            $result = $this->_src_db->query($query, [$if_sdate, $if_edate])->result_array();
            logger('_runProductMst => ' . $this->_src_db->last_query());

            // 상품정보 등록
            if (empty($result) === false) {
                foreach ($result as $row) {
                    if ($this->_rem_db->set($row)->insert($this->_rem_table['product']) === false) {
                        throw new \Exception('상품정보 등록에 실패했습니다. (' . element('message', $this->_rem_db->error()) . ')');
                    }
                    $ins_cnt++;
                }
            }
            logger('_runProductMst => Remote DB insert completed.');

            return $ins_cnt;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * 상품 강의스케줄 조회/등록
     * @param null|string $if_sdate
     * @param null|string $if_edate
     * @return int|string
     */
    private function _runProductSch($if_sdate = null, $if_edate = null)
    {
        try {
            $ins_cnt = 0;
            list($if_sdate, $if_edate) = $this->_setIfDate($if_sdate, $if_edate);

            // 상품 강의스케줄 조회
            $query = /** @lang text */ '
                select SYS_CD, CUD_CD, current_timestamp() as SEND_TIME, TEACHER_CD, P_CD, P_NM, C_NM, C_DETAIL_NM, C_SCH_DATE
                from ' . $this->_src_table['product_sch'] . '
                where IF_DATE between ? and ?
                order by IF_IDX asc
            ';
            $result = $this->_src_db->query($query, [$if_sdate, $if_edate])->result_array();
            logger('_runProductSch => ' . $this->_src_db->last_query());

            // 상품 강의스케줄 등록
            if (empty($result) === false) {
                foreach ($result as $row) {
                    if ($this->_rem_db->set($row)->insert($this->_rem_table['product_sch']) === false) {
                        throw new \Exception('상품 강의스케줄 등록에 실패했습니다. (' . element('message', $this->_rem_db->error()) . ')');
                    }
                    $ins_cnt++;
                }
            }
            logger('_runProductSch => Remote DB insert completed.');

            return $ins_cnt;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * 매출정보 조회/등록
     * @param null|string $if_sdate
     * @param null|string $if_edate
     * @return int|string
     */
    private function _runOrderMst($if_sdate = null, $if_edate = null)
    {
        try {
            $ins_cnt = 0;
            list($if_sdate, $if_edate) = $this->_setIfDate($if_sdate, $if_edate);

            if ($if_sdate == $if_edate) {
                $where = 'IF_DATE = ?';
                $arr_bind = [$if_sdate];
            } else {
                $where = 'IF_DATE between ? and ?';
                $arr_bind = [$if_sdate, $if_edate];
            }

            // 매출정보 조회
            $query = /** @lang text */ '
                select SYS_CD, CUD_CD, current_timestamp() as SEND_TIME, ORDER_NO, INOUT_CD, OUT_ABLE_CD, MEMBERSHIP_NO, MEMBERSHIP_NM
                    , IN_RT, IN_CH, IN_METHOD, CAMPUS, TEACHER_CD, P_CD, C_CD, C_DETAIL_NM, C_ON_FR_DATE, C_ON_TO_DATE, INOUT_DATE, TODAY_INOUT_AMT
                from ' . $this->_src_table['order'] . '
                where ' . $where . '
                order by IF_IDX asc
            ';
            $result = $this->_src_db->query($query, $arr_bind)->result_array();
            logger('_runOrderMst => ' . $this->_src_db->last_query());

            // 매출정보 등록
            if (empty($result) === false) {
                foreach ($result as $row) {
                    if ($this->_rem_db->set($row)->insert($this->_rem_table['order']) === false) {
                        throw new \Exception('매출정보 등록에 실패했습니다. (' . element('message', $this->_rem_db->error()) . ')');
                    }
                    $ins_cnt++;
                }
            }
            logger('_runOrderMst => Remote DB insert completed.');

            return $ins_cnt;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * 매출관리시스템 원격DB 테스트 커넥션
     * @return string
     */
    public function testConn()
    {
        $this->_rem_db = $this->_CI->load->database('eduif', true);     // 원격DB

        try {
            $result = $this->_rem_db->query(/** @lang text */'select NOW() as NowDatm from dual')->row(0)->NowDatm;

            return 'Test connection successful (' . $result . ')';
        } catch (\Exception $e) {
            return $e->getMessage();
        } finally {
            $this->_rem_db->close();
        }
    }

    /**
     * 매출관리시스템 개별 프로세스 실행
     * @param string $name [개별 프로세스명 (TeacherMst / ProductMst / ProductSch / OrderMst)]
     * @param null|string $if_sdate
     * @param null|string $if_edate*
     * @return string
     */
    public function testRunOne($name, $if_sdate = null, $if_edate = null)
    {
        $this->_src_db = $this->_CI->load->database('gathering', true);     // 소스DB
        $this->_rem_db = $this->_CI->load->database('eduif', true);     // 원격DB
        $this->_rem_db->trans_begin();

        try {
            $method = '_run' . $name;
            $result = $this->{$method}($if_sdate, $if_edate);

            $this->_rem_db->trans_commit();
            return 'Success(' . $name . ' : ' . $result . ')';
        } catch (\Exception $e) {
            $this->_rem_db->trans_rollback();
            return 'Error(' . $e->getMessage() . ')';
        } finally {
            $this->_src_db->close();
            $this->_rem_db->close();
        }
    }
}
