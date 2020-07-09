<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NpayProduct extends \app\controllers\FrontController
{
    protected $models = array('product/bookF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    private $_learn_pattern = 'book';

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $add_condition = [
            'EQ' => ['A.SiteCode' => $this->_site_code]
        ];
        $data = $this->bookFModel->NpayListBookStoreProduct($add_condition);

        //$write =  "id	title	price_pc	price_mobile	normal_price	link	image_link	category_name1  naver_category	condition	brand	maker	search_tag	shipping". PHP_EOL;
        $write =  "id\ttitle\tprice_pc\tprice_mobile\tnormal_price\tlink\timage_link\tcategory_name1\tnaver_category\tcondition\tbrand\tmaker\tsearch_tag\tshipping". PHP_EOL;

        foreach ($data as $row) {
            $write .= $row['id']."\t".$row['title']."\t".$row['price_pc']."\t".$row['price_mobile']."\t".$row['normal_price']."\t".$row['link']."\t".$row['image_link']."\t".$row['category_name1']
                ."\t".$row['naver_category']."\t".$row['condition']."\t".$row['brand']."\t".$row['maker']."\t".$row['search_tag']."\t".$row['shipping']. PHP_EOL;
        }
        //echo '<xmp>'.$write.'</xmp>'; //바로 호출

        /* 파일 생성 후 리다이렉트 처리*/
        $this->load->helper('file');
        $real_file_path = public_to_upload_path(config_item('upload_prefix_dir').'/npay/product.txt');
        write_file($real_file_path, $write);
        header('Content-type: text/html; charset=utf-8');
        header( 'Location:/uploads/willbes/npay/product.txt');
        //$temp = file_get_contents($real_file_path);
        //echo '<xmp>'.$temp.'</xmp>';
        return;
    }
}