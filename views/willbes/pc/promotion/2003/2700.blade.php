@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/
        /************************************************************/

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2022/06/2700_top_bg.jpg) no-repeat center top;}

        .wb_01, .wb_02, .wb_03 {background:#ffca4f}

        /* 이용안내 */
        .wb_info {padding:100px 0; color:#3a3a3a; line-height:1.4; background:#fff;}
        .guide_box{width:1000px; margin:0 auto; text-align:left; word-break:keep-all}
        .guide_box h2 {font-size:30px; margin-bottom:30px; }
        .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; padding:5px 10px; font-weight:bold; margin-right:10px; font-size:18px;}        
        .guide_box dd{color:#3a3a3a; margin:0 0 20px 5px;}
        .guide_box dd li{margin-bottom:3px; list-style:decimal; margin-left:20px;font-size:15px;font-weight:bold;}    
         
    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top" data-aos="fade-down">            
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2700_top.jpg" alt="합격인증센터"/>                     
        </div>

        <div class="evtCtnsBox wb_01" data-aos="fade-up"> 
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2700_01.jpg" alt="지금 바로 윌비스로 시작할 때"/>  
		</div>

        <div class="evtCtnsBox wb_02" data-aos="fade-up"> 
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2700_02.jpg" alt="쿠폰 받고 열공"/>  
		</div>
        @php
            // 다수의 인증코드 사용
            $cert_array = [];
            if (empty($arr_promotion_params["cert"]) === false) {
                $cert_array = explode(',', $arr_promotion_params["cert"]);
            }
        @endphp
        
        <div class="evtCtnsBox wb_03" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/06/2700_03.jpg" alt="할인 및 구매하기"/>
                <a href="javascript:certOpen('{{element("page", $arr_promotion_params)}}', '{{element(0, $cert_array)}}');" title="9급 인증받고 할인받기" style="position: absolute;left: 8.5%;top: 21.31%;width: 18.82%;height: 3.52%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/promotion/index/cate/3019/code/2502" target="_blank" title="9급 구매하기" style="position: absolute;left: 8.5%;top: 25.60%;width: 18.82%;height: 3.52%;z-index: 2;"></a>
                <a href="javascript:certOpen('{{element("page", $arr_promotion_params)}}', '{{element(1, $cert_array)}}');" title="세무직 인증받고 할인받기" style="position: absolute;left: 40.58%;top: 21.31%;width: 18.82%;height: 3.52%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/promotion/index/cate/3022/code/1983" target="_blank" title="세무직 구매하기" style="position: absolute;left: 40.58%;top: 25.60%;width: 18.82%;height: 3.52%;z-index: 2;"></a>
                <a href="javascript:certOpen('{{element("page", $arr_promotion_params)}}', '{{element(2, $cert_array)}}');" title="소방직 인증받고 할인받기" style="position: absolute;left: 73.65%;top: 21.31%;width: 18.82%;height: 3.52%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/promotion/index/cate/3023/code/2503" target="_blank" title="소방직 구매하기" style="position: absolute;left: 73.65%;top: 25.60%;width: 18.82%;height: 3.52%;z-index: 2;"></a>
                <a href="javascript:certOpen('{{element("page", $arr_promotion_params)}}', '{{element(3, $cert_array)}}');" title="농업직 인증받고 할인받기" style="position: absolute;left: 8.5%;top: 52.74%;width: 18.82%;height: 3.52%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/promotion/index/cate/3028/code/1068" target="_blank" title="농업직 구매하기" style="position: absolute;left: 8.5%;top: 57.02%;width: 18.82%;height: 3.52%;z-index: 2;"></a>
                <a href="javascript:certOpen('{{element("page", $arr_promotion_params)}}', '{{element(4, $cert_array)}}');" title="축산직 인증받고 할인받기" style="position: absolute;left: 40.58%;top: 52.74%;width: 18.82%;height: 3.52%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/promotion/index/cate/3028/code/2115" target="_blank" title="축산직 구매하기" style="position: absolute;left: 40.58%;top: 57.02%;width: 18.82%;height: 3.52%;z-index: 2;"></a>
                <a href="javascript:certOpen('{{element("page", $arr_promotion_params)}}', '{{element(5, $cert_array)}}');" title="조경직 인증받고 할인받기" style="position: absolute;left: 73.65%;top: 52.74%;width: 18.82%;height: 3.52%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/promotion/index/cate/3028/code/2114" target="_blank" title="조경직 구매하기" style="position: absolute;left: 73.65%;top: 57.02%;width: 18.82%;height: 3.52%;z-index: 2;"></a>
                <a href="javascript:certOpen('{{element("page", $arr_promotion_params)}}', '{{element(6, $cert_array)}}');" title="통신직 인증받고 할인받기" style="position: absolute;left: 8.5%;top: 84.16%;width: 18.82%;height: 3.52%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/promotion/index/cate/3028/code/2256" target="_blank" title="통신직 구매하기" style="position: absolute;left: 8.5%;top: 88.45%;width: 18.82%;height: 3.52%;z-index: 2;"></a>
                <a href="javascript:certOpen('{{element("page", $arr_promotion_params)}}', '{{element(7, $cert_array)}}');" title="전기직 인증받고 할인받기" style="position: absolute;left: 40.58%;top: 84.16%;width: 18.82%;height: 3.52%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/promotion/index/cate/3028/code/2256" target="_blank" title="전기직 구매하기" style="position: absolute;left: 40.58%;top: 88.45%;width: 18.82%;height: 3.52%;z-index: 2;"></a>
                <a href="javascript:certOpen('{{element("page", $arr_promotion_params)}}', '{{element(8, $cert_array)}}');" title="전자직 인증받고 할인받기" style="position: absolute;left: 73.65%;top: 84.16%;width: 18.82%;height: 3.52%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/promotion/index/cate/3028/code/2256" target="_blank" title="전자직 구매하기" style="position: absolute;left: 73.65%;top: 88.45%;width: 18.82%;height: 3.52%;z-index: 2;"></a>
            </div>
		</div>

        <div class="evtCtnsBox wb_info" id="info">
            <div class="guide_box">
                <h2 class="NSK-Black">이벤트 유의사항</h2>
                <dl>
                    <dd>
                        <ol>                          
                            <li>하나의 아이디당 1회만 참여 가능.</li>
                            <li>인증 완료 처리는 신청 후, 24시간 이내에 처리. 단, 주말 및 공휴일 인증 건의 경우 평일 오전 중 처리.</li>
                            <li>① 재도전 인증<br>
                                - 본인의 이름이 명시된 수험표 또는 윌비스 PASS 수강생의 경우 [내강의실] 페이지 내 이름과 PASS명이 명시된 이미지 캡쳐 후 업로드 시 인증 가능<br>
                                ② 환승 인증<br>
                                - 본인의 이름, 수강내역, 결제내역 등이 명확하게 기재된 수강증 등의 캡쳐를 통해서만 인증 가능<br>
                                (결제내역을 통한 인증 시, 수강자 이름과 결제 금액, 강좌명 필수)<br>
                                ③ 대학생 인증<br>
                                - 본인의 이름, 학번이 명시된 학생증 등의 사진을 통해서만 인증 가능
                            </li>                        
                            <li>본 이벤트는 이벤트 참여자가 본인의 명의로 구매/응시한 내용에 한합니다.</li>
                            <li>등록 인증 정보는 이벤트 목적 외 용도로 사용되지 않습니다.</li>
                            <li>발급된 쿠폰의 사용 기간은 3일로, 각 페이지 내에서 판매 중인 상품에만 적용 가능합니다.</li>
                        </ol>
                    </dd>
                </dl>
            </div>
        </div>

    </div>

    <!-- End Container -->

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
      $(document).ready( function() {
        AOS.init();
      });
    </script>
    
    <script>
    /* 팝업창 */ 
    function certOpen(type, code){
        {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}

        if(type == '' || code == '') {
            alert("인증정보가 정확하지 않습니다.");return;
        }
        var url = '/certApply/index/page/'+type+'/cert/'+code;
        window.open(url, 'cert', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=800');
    }
    </script>
    
@stop