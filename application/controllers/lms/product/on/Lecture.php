<?
defined('BASEPATH') OR exit('No direct script access allowed');

Class Lecture extends \app\controllers\BaseController
{
    protected $models = array('sys/code','product/base/course','product/base/subject');
    protected $helpers = array('download');

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('product/on/index',[
            'data'=>[]
        ]);
    }


    public function listAjax()
    {
        /*
        $_search_value = $this->_req('search_value');
        $_search_prof = $this->_req('search_prof');
        $_search_cp = $this->_req('search_cp');
        $_search_category = $this->_req('search_category');
        $_search_progress = $this->_req('search_progress');
        $_search_is_use = $this->_req('search_is_use');
*/
        $count = 0;
        $list = [];

        return $this->response([
            'recordsTotal' => $count,
            'data' => $list
        ]);
    }

    public function create($params=[])
    {
        $method = 'POST';

        $codes = $this->codeModel->getCcdInArray(['607','608','609','610','611','612','613','616','617','618']); // 강좌유형,강좌제공구분,강좌제공방식,교재제공구분,수강배수적용구분,상품판매구분,수강기간설정구분,VOD구분,판매상태

        $courseList = $this->courseModel->listCourse([], null, null, ['PC.SiteCode' => 'asc','PC.OrderNum' => 'asc' ]);
        $subjectList = $this->subjectModel->listSubject([], null, null, ['PS.SiteCode' => 'asc','PS.OrderNum' => 'asc' ]);

        $data = null;

        $this->load->view('product/on/create',[
            'method'=>$method
            ,'leckind_ccd'=>$codes['607']       //강좌유형
            ,'lecprovision_ccd'=>$codes['608']          //강좌제공구분
            ,'contentprovision_ccd'=>$codes['609']   //강좌제공방식
            ,'booktype_ccd'=>$codes['610']  //교재제공구분
            ,'multiplelimit_ccd'=>$codes['611'] //수강배수
            ,'multipleapply_ccd'=>$codes['612'] //수강배수적용구분
            ,'salestype_ccd'=>$codes['613'] //상품판매구분
            ,'studyterm_ccd'=>$codes['616'] //수강기간설정구분
            ,'vodtype_ccd'=>$codes['617'] //VOD구분
            ,'sales_ccd'=>$codes['618'] //판매상태

            ,'courseList'=>$courseList      //과정
            ,'subjectList'=>$subjectList    //과목
            ,'data'=>$data
        ]);
    }

    /**
     * 마스터강의 첨부파일 다운로드
     * @param array $fileinfo
     */
    public function download($fileinfo=[])
    {
        echo $fileinfo[0];

        public_download($fileinfo[0]);
    }

}