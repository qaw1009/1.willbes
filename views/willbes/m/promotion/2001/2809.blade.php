@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:1rem; line-height:1.4; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtCtnsBox .wrap {position:relative}
    .evtCtnsBox a {border:1px solid #000}

    .evt02 {background:#0b3130; padding-bottom:8rem}
    .slide_con {padding:0 30px 30px}
    .slide_con .bx-wrapper {box-shadow:none; border:0; margin:0; padding:0}
    .slide_con .bx-wrapper .bx-pager {
        width: auto;
        bottom: -30px;
        left:0;
        right:0;
        text-align: center;
        z-index:90;
    }
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a {
        background: #ccc;
        width: 14px;
        height: 14px;
        margin: 0 4px;
        border-radius:10px;
    }
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a:hover,
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a.active,
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a:focus {
        background: #d5c15e;
    }
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a.active {
        width: 30px;
    }

    .evt05 {background:#ececec; padding-bottom:50px}
    .evt05 .lecbuy {display:flex; justify-content:center; flex-wrap: wrap; margin:0 2rem}
    .evt05 .lecbuy a {width:50%; margin-bottom:20px; position: relative;}
    .evt05 .lecbuy a span {position: absolute; bottom:1.3rem; left:50%; width:70%; display:block; background:#000; color:#fff; font-size:1.4rem; padding:1rem; margin-left:-35%; border-radius:2rem}
    .evt05 .lecbuy a img {max-width:317px;}
    .evt05 .check {font-size:1.2rem; text-align:center; line-height:1.4;margin-top:40px;font-weight:bold;}
    .evt05 .check input {border:2px solid #000; margin-right:10px; height:20px; width:20px}
    .evt05 .check a {display:block; padding:5px 0; color:#fff; background:#000; width:60%; margin:20px auto 0; border-radius:20px}
    .evt05 .check a:hover {color:#333; background:#35fffa;}
    .evt05 .info {margin:20px auto 50px; padding:10px;line-height:1.4; font-size:1rem; font-weight:bold;}


    .evtInfo {padding:40px 20px; background:#333; color:#fff;}
    .evtInfoBox { text-align:left;}
    .evtInfoBox h4 {font-size:1.5rem; margin-bottom:30px}
    .evtInfoBox .infoTit {font-size:1.3rem; margin-bottom:20px; color:#ffe56e}
    .evtInfoBox ul {margin-bottom:30px}
    .evtInfoBox ul li {list-style-type: disc; margin-left:20px; margin-bottom:10px;}

    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px)  {   
        .evt05 .lecbuy a {width: calc(50% - 10px);}
    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) {     
        .evt05 .lecbuy a {width: calc(50% - 10px);}
    }
    
    /* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {
        
    }
</style>

<div id="Container" class="Container NSK c_both">   
    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/11/2809m_top.jpg" alt="윌비스 해양경찰 공채 합격패스" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/11/2809m_01.jpg" alt="베스트 교수진" >
    </div> 

    <div class="evtCtnsBox evt02" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/11/2809m_02.jpg" alt="왜 등불쌤인가?" >
        <div class="slide_con">
            <ul id="slidesImg2">
                <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2208_01_10.jpg" alt="" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2208_01_09.jpg" alt="" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2021/11/2208_01_08.jpg" alt="" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2021/11/2208_01_07.jpg" alt="" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2021/11/2208_01_06.jpg" alt="" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2021/05/2208_01_05.jpg" alt="" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2021/05/2208_01_04.jpg" alt="" /></li>                
                <li><img src="https://static.willbes.net/public/images/promotion/2021/05/2208_01_03.jpg" alt="" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2021/05/2208_01_02.jpg" alt="" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2021/05/2208_01_01.jpg" alt="" /></li>
            </ul>
        </div>
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/11/2809m_03.jpg" alt="베스트 교수진" >
        <a href="https://m.blog.naver.com/psb7817/222869689060" title="초시행 공부법" style="position: absolute; left: 29.44%; top: 51.55%; width: 41.11%; height: 4.41%; z-index: 2;"></a>
        <a href="https://m.blog.naver.com/psb7817/222211861661" title="형사법 준비요령" style="position: absolute; left: 29.44%; top: 88.76%; width: 41.11%; height: 4.41%; z-index: 2;"></a>
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/11/2809m_04.jpg" alt="학습플랜" >
        <a href="javascript:alert('준비중입니다.');" title="필기부터 면접까지" style="position: absolute; left: 40.56%; top: 68%; width: 18.47%; height: 2.62%; z-index: 2;"></a>
        <a href="https://blog.naver.com/psb7817/222211861661" target="_blank" title="해양경찰 공부는 이렇게하자" style="position: absolute; left: 40.56%; top: 92.28%; width: 18.47%; height: 2.62%; z-index: 2;"></a>
    </div> 

    <div class="evtCtnsBox evt05" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/11/2809m_05.jpg" alt="2022 해양경찰 채용" >
        <div class="lecbuy">
            <a href="javascript:void(0);" onclick="go_PassLecture(3007, 187597);"><img src="https://static.willbes.net/public/images/promotion/2022/11/2809m_05_01.png" alt="스폐셜 01" ><span>신청하기</span></a>
            <a href="javascript:void(0);" onclick="go_PassLecture(3007, 187598);"><img src="https://static.willbes.net/public/images/promotion/2022/11/2809m_05_02.png" alt="스폐셜 02" ><span>신청하기</span></a>
            <a href="javascript:void(0);" onclick="go_PassLecture(3007, 187599);"><img src="https://static.willbes.net/public/images/promotion/2022/11/2809m_05_03.png" alt="스폐셜 03" ><span>신청하기</span></a>
            <a href="javascript:void(0);" onclick="go_PassLecture(3007, 190512);"><img src="https://static.willbes.net/public/images/promotion/2022/11/2809m_05_04.png" alt="스폐셜 04" ><span>신청하기</span></a>
        </div>
        <div class="check">
            <label><input name="ischk" type="checkbox" value="Y" />페이지 하단 합격PASS 이용안내를 모두 확인하였고, 이에 동의합니다.</label>
            <a href="#careful">이용안내 확인하기 ↓</a>               
        </div>
        <div class="info">
            ※ 강좌 및 교수진은 학원 사정에 따라 변경될 수 있습니다.
        </div>
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2809m_05_05.jpg" alt="" >
            <a href="javascript:void(0);" onclick="giveCheck();" title="재수강 쿠폰" style="position: absolute; left: 13.61%; top: 47.73%; width: 25%; height: 11.05%; z-index: 2;"></a>
        </div>
    </div>


    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/11/2809m_06_01.jpg" alt="면접이론 할인 쿠폰" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/11/2809m_06_02.jpg" alt="소문내기" >        
        <a href="javascript:void(0);" onclick="giveCheck();" title="재수강 쿠폰" style="position: absolute; left: 19.31%; top: 81.87%; width: 61.39%; height: 7.73%; z-index: 2;"></a>
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/11/2809m_06_03.jpg" alt="소문내기" >        
        <a href="@if($file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="홍보 이미지 받기" style="position: absolute; left: 9.58%; top: 25.99%; width: 80.69%; height: 11.45%; z-index: 2;"></a>
        <a href="https://cafe.daum.net/policeacademy" target="_blank" title="경시모" style="position: absolute; left: 3.06%; top: 86.78%; width: 46.11%; height: 9.8%; z-index: 2;"></a>
        <a href="https://cafe.naver.com/polstudy" target="_blank" title="경꿈사" style="position: absolute; left: 50.56%; top: 86.78%; width: 46.11%; height: 9.8%; z-index: 2;"></a>
    </div> 

    {{--홍보url--}}
    @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
        @include('willbes.m.promotion.show_comment_list_url_partial')
    @endif

    <div class="evtCtnsBox evtInfo" id="careful">
        <div class="evtInfoBox">
            <h4 class="NSK-Black">"윌비스X등불쌤" 2023 해양경찰공채 합격패스 이용안내 </h4>
            <div class="infoTit NSK-Black">[2023년 해양경찰 공채대비 합격 패스]</div>
            <ul>
                <li>구매일 기준 2023년12월 31일까지 수강 가능한 기간제 PASS입니다.</li>
                <li>본 상품 강좌 구성은 다음과 같습니다.<br>
                    * 형사법 : 임종희교수님<br>
                    * 형법 : 문형석<br>
                    * 형소법 : 김한기<br>
                    * 헌법 : 이국령 교수님<br>
                    * 해양경찰학 / 해사법규 : 등불쌤 교수님<br>
                    * G-TELP : JENNY  교수님<br>
                    * 한능검 : 오태진 교수님</li>
                <li>선택한 해양경찰 공채 합격PASS 상품의 표기된 기간 동안 동영상 강좌를 무제한 수강할 수 있습니다.</li>
                <li>해양경찰 공채 합격 PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다. (결제완료자에 한함)</li>
                <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
            </ul>

            <div class="infoTit NSK-Black">[교재 및 포인트]</div>
            <ul>
                <li>해양경찰 공채 합격 PASS 수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌 별 교재는 강좌 소개 및 교재 구매 메뉴에서 별도 구매 가능합니다.</li>
            </ul>

            <div class="infoTit NSK-Black">[수강 안내]</div>
            <ul>
                <li>로그인 후 [내강의실] → [무한PASS존]으로 접속합니다.</li>
                <li>구매한 PASS 상품 선택 후 [강좌추가]를 클릭, 원하는 강좌를 등록한 후 수강할 수 있습니다.<br>
                강의는 순차 업로드 예정이며 업로드 일정은 강의 진행일정에 따라 변경될 수 있습니다.</li>
                <li>합격패스는 일시 정지, 수강 연장, 재수강 불가합니다.</li>
                <li>합격패스 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다.<br>
                총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대</li>
                <li>PC, 모바일 기기에 대한 초기화가 필요할 경우 최초 초기화에 한해서는 수강생 본인이 초기화가 가능합니다.<br>
                ([내강의실] → [무한PASS존]에서 등록기기정보 확인) 추후 초기화가 필요할 시 유선(온라인 고객센터)이나 게시판을 통해 요청이 가능하고, 수강 기간 동안 3회 신청이 가능합니다.</li>
            </ul>

            <div class="infoTit NSK-Black">[환불정책]</div>
            <ul>
                <li>전액환불 : 결제 후 7일 이내 3강 이하 수강 시에만 전액 환불 가능합니다.</li>
                <li>부분환불 : 결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                <li>고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, 합격패스 결제가 기준으로 계산하여 사용일수만큼 차감 후 환불됩니다.</li>
            </ul>

            <div class="infoTit NSK-Black">[유의사항]</div>
            <ul>
                <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 부탁드립니다. (단,  이벤트 시에는 쿠폰사용가능)</li>
                <li>단기패스 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며, 이로 인한 환불은 불가합니다.</li>
                <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강중인 PASS 강좌는 즉시 정지, 회원 자격이 박탈됩니다. 이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생 할 수 있습니다.</li>
            </ul>
            <div class="infoTit NSK-Black">※ 이용문의 : 고객센터 1544-5006 / 사이트 내 1:1 상담 게시판</div>
        </div>
    </div>

</div>
<form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    {!! method_field('POST') !!}
</form>
<!-- End Container -->

<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );
</script>

<link rel="stylesheet" href="/public/vendor/jquery/bxslider/jquery.bxslider.min.css">
<script src="/public/vendor/jquery/bxslider/jquery.bxslider.js"></script>
<script type="text/javascript">
    var $regi_form = $('#regi_form');

    $(document).ready(function() {
        var slidesImg1 = $("#slidesImg2").bxSlider({
            auto: true,
            speed: 500,
            pause: 4000,
            mode:'horizontal',
            autoControls: false,
            controls:false,
            pager:true,
        });
    });

    function go_PassLecture(cate, code){
        if($("input[name='ischk']:checked").size() < 1){
            alert("이용안내에 동의하셔야 합니다.");
            return;
        }

        var _url = '{{ site_url('/m/periodPackage/show/cate/')}}' + cate + '/pack/648001/prod-code/' + code;
        location.href = _url;
    }

    function giveCheck() {
        {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

        @if(empty($arr_promotion_params['give_type']) === false && empty($arr_promotion_params['give_idx']) === false)
            var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params["give_type"]}}&give_idx={{$arr_promotion_params["give_idx"]}}&event_code={{$data['ElIdx']}}&comment_chk_yn={{$arr_promotion_params["comment_chk_yn"]}}';
            ajaxSubmit($regi_form, _check_url, function (ret) {
                if (ret.ret_cd) {
                    alert('쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');
                }
            }, showValidateError, null, false, 'alert');
        @else
            alert('프로모션 추가 파라미터가 지정되지 않았습니다.');
        @endif
    }
</script>

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop