@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">

    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtCtnsBox .wrap {position:relative}
    /*.evtCtnsBox a {border:1px solid #000}*/
    

    /* 이용안내 */
    .wb_info {padding:50px 20px; color:#3a3a3a; line-height:1.4; background:#f4f4f4}
    .guide_box{text-align:left; word-break:keep-all}
    .guide_box h2 {font-size:3vh; margin-bottom:30px;}
    .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; padding:5px 10px; font-weight:bold; margin-right:10px; font-size:1.8vh;}        
    .guide_box dd{color:#3a3a3a; margin:0 0 20px 5px;}
    .guide_box dd li{margin-bottom:3px; list-style:decimal; margin-left:20px;font-size:1.6vh;font-weight:bold;} 

    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px)  {   
       
    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) {       
        
    }
    
    /* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {
        
    }

</style>

<div id="Container" class="Container NSK c_both">

    <div class="evtCtnsBox" data-aos="fade-down">
        <img src="https://static.willbes.net/public/images/promotion/2022/06/2700m_top.jpg" alt="합격인증센터" >
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/06/2700m_01.jpg" alt="지금 바로 윌비스로 시작할 때" ><br>
        <img src="https://static.willbes.net/public/images/promotion/2022/06/2700m_02.jpg" alt="쿠폰 받고 열공" ><br>

        @php
            // 다수의 인증코드 사용
            $cert_array = [];
            if (empty($arr_promotion_params["cert"]) === false) {
                $cert_array = explode(',', $arr_promotion_params["cert"]);
            }
        @endphp

        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2700m_03.jpg" alt="할인 및 구매하기" >
            <a href="javascript:certOpen('{{element("page", $arr_promotion_params)}}', '{{element(0, $cert_array)}}');" title="9급 인증받고 할인받기" style="position: absolute;left: 10.08%;top: 12.59%;width: 29.25%;height: 2.38%;z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/promotion/index/cate/3019/code/2502" target="_blank" title="9급 구매하기" style="position: absolute;left: 10.08%;top: 15.23%;width: 29.25%;height: 2.38%;z-index: 2;"></a>
            <a href="javascript:certOpen('{{element("page", $arr_promotion_params)}}', '{{element(1, $cert_array)}}');" title="세무직 인증받고 할인받기" style="position: absolute;left: 60.08%;top: 12.59%;width: 29.25%;height: 2.38%;z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/promotion/index/cate/3022/code/1983" target="_blank" title="세무직 구매하기" style="position: absolute;left: 60.08%;top: 15.23%;width: 29.25%;height: 2.38%;z-index: 2;"></a>
            <a href="javascript:certOpen('{{element("page", $arr_promotion_params)}}', '{{element(2, $cert_array)}}');" title="소방직 인증받고 할인받기" style="position: absolute;left: 11.28%;top: 31.69%;width: 29.25%;height: 2.38%;z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/promotion/index/cate/3023/code/2503" target="_blank" title="소방직 구매하기" style="position: absolute;left: 11.28%;top: 34.35%;width: 29.25%;height: 2.38%;z-index: 2;"></a>
            <a href="javascript:certOpen('{{element("page", $arr_promotion_params)}}', '{{element(3, $cert_array)}}');" title="농업직 인증받고 할인받기" style="position: absolute;left: 59.91%;top: 31.69%;width: 29.25%;height: 2.38%;z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/promotion/index/cate/3028/code/1068" target="_blank" title="농업직 구매하기" style="position: absolute;left: 59.91%;top: 34.35%;width: 29.25%;height: 2.38%;z-index: 2;"></a>
            <a href="javascript:certOpen('{{element("page", $arr_promotion_params)}}', '{{element(4, $cert_array)}}');" title="조경직 인증받고 할인받기" style="position: absolute;left: 11.38%;top: 50.79%;width: 29.25%;height: 2.38%;z-index: 2;"></a>
            <a href="https://pass.willbes.net/promotion/index/cate/3028/code/2115" target="_blank" title="조경직 구매하기" style="position: absolute;left: 11.38%;top: 53.53%;width: 29.25%;height: 2.38%;z-index: 2;"></a>
            <a href="javascript:certOpen('{{element("page", $arr_promotion_params)}}', '{{element(5, $cert_array)}}');" title="축산직 인증받고 할인받기" style="position: absolute;left: 60.08%;top: 50.79%;width: 29.25%;height: 2.38%;z-index: 2;"></a>
            <a href="https://pass.willbes.net/promotion/index/cate/3028/code/2114" target="_blank" title="축산직 구매하기" style="position: absolute;left: 60.08%;top: 53.53%;width: 29.25%;height: 2.38%;z-index: 2;"></a>
            <a href="javascript:certOpen('{{element("page", $arr_promotion_params)}}', '{{element(6, $cert_array)}}');" title="통신직 인증받고 할인받기" style="position: absolute;left: 11.38%;top: 69.51%;width: 29.25%;height: 2.38%;z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/promotion/index/cate/3028/code/2256" target="_blank" title="통신직 구매하기" style="position: absolute;left: 11.38%;top: 72.21%;width: 29.25%;height: 2.38%;z-index: 2;"></a>
            <a href="javascript:certOpen('{{element("page", $arr_promotion_params)}}', '{{element(7, $cert_array)}}');" title="전기직 인증받고 할인받기" style="position: absolute;left: 60.08%;top: 69.51%;width: 29.25%;height: 2.38%;z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/promotion/index/cate/3028/code/2256" target="_blank" title="전기직 구매하기" style="position: absolute;left: 60.08%;top: 72.21%;width: 29.25%;height: 2.38%;z-index: 2;"></a>
            <a href="javascript:certOpen('{{element("page", $arr_promotion_params)}}', '{{element(8, $cert_array)}}');" title="전자직 인증받고 할인받기" style="position: absolute;left: 37.08%;top: 89.05%;width: 29.25%;height: 2.38%;z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/promotion/index/cate/3028/code/2256" target="_blank" title="군무원 구매하기" style="position: absolute;left: 37.08%;top: 91.75%;width: 29.25%;height: 2.38%;z-index: 2;"></a>
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
        @if(empty($arr_promotion_params) === false)
        var url = '/certApply/index/page/'+type+'/cert/'+code;
        window.open(url, 'cert', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=800');
        @endif
    }
    </script>

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')
@stop