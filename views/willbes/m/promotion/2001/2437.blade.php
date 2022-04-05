@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    /*.evtCtnsBox a {border:1px solid #000}*/

    .evt03 {background:#010111}
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

    .evt06 {background:#ececec; padding-bottom:50px}
    .evt06 .lecbuy {display:flex; justify-content:center; flex-wrap: wrap; max-width:460px; margin:auto}
    .evt06 .lecbuy a {width:50%; margin-bottom:20px}
    .evt06 .lecbuy a img {max-width:220px;}
    .evt06 .check {font-size:14px; text-align:center; line-height:1.4;margin-top:40px;font-weight:bold;}
    .evt06 .check input {border:2px solid #000; margin-right:10px; height:20px; width:20px}
    .evt06 .check a {display:block; padding:5px 0; color:#fff; background:#000; width:60%; margin:20px auto 0; border-radius:20px}
    .evt06 .check a:hover {color:#333; background:#35fffa;}
    .evt06 .info {margin:20px auto 50px; padding:10px;line-height:1.4; font-size:14px; font-weight:bold;}



    .evtInfo {padding:40px 20px; background:#333; color:#fff; font-size:14px}
    .evtInfoBox { text-align:left; line-height:1.3}
    .evtInfoBox h4 {font-size:160%; margin-bottom:30px}
    .evtInfoBox .infoTit {font-size:140%; margin-bottom:20px; color:#ffe56e}
    .evtInfoBox ul {margin-bottom:30px}
    .evtInfoBox ul li {list-style-type: disc; margin-left:20px; margin-bottom:10px;}

    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px)  {   
        .evt06 .lecbuy a {width: calc(50% - 10px);}
    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) {     
        .evt06 .lecbuy a {width: calc(50% - 10px);}
    }
    
    /* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {
        
    }
</style>

<div id="Container" class="Container NSK c_both">    

    
    <div class="evtCtnsBox"  data-aos="fade-down">
        <img src="https://static.willbes.net/public/images/promotion/2022/04/2437m_00.jpg" alt="경찰학원부분 1위" >        
    </div> 


    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/04/2437m_01.jpg" alt="윌비스 해양경찰 공채 합겨패스" ><br>
    </div> 

    <div class="evtCtnsBox evt03" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/04/2437m_02.jpg" alt="왜 등불쌤인가?" >
        <div class="slide_con">
            <ul id="slidesImg2">
                <li><img src="https://static.willbes.net/public/images/promotion/2022/04/2437m_01_01.jpg" alt="" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2022/04/2437m_01_02.jpg" alt="" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2022/04/2437m_01_03.jpg" alt="" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2022/04/2437m_01_04.jpg" alt="" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2022/04/2437m_01_05.jpg" alt="" /></li>
            </ul>
        </div>
        <img src="https://static.willbes.net/public/images/promotion/2022/04/2437m_02_01.jpg" alt="" >
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/04/2437m_03.jpg" alt="학습플랜" >
        <a href="https://blog.naver.com/psb7817" target="_blank" title="필기부터 면접까지" style="position: absolute; left: 40.56%; top: 68%; width: 18.47%; height: 2.62%; z-index: 2;"></a>
        <a href="https://blog.naver.com/psb7817/222211861661" target="_blank" title="해양경찰 공부는 이렇게하자" style="position: absolute; left: 40.56%; top: 92.28%; width: 18.47%; height: 2.62%; z-index: 2;"></a>
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/04/2437m_04.jpg" alt="2022 해양경찰 채용" >
    </div> 

    <div class="evtCtnsBox evt06" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/04/2437m_05.jpg" alt="2022 해양경찰 합격 패스" >
        <div class="lecbuy">
            <a href="javascript:void(0);" onclick="go_PassLecture(3008, 188217);"><img src="https://static.willbes.net/public/images/promotion/2022/04/2437m_05_01.jpg" alt="스폐셜 01" ></a>
            <a href="javascript:void(0);" onclick="go_PassLecture(3008, 188239);"><img src="https://static.willbes.net/public/images/promotion/2022/04/2437m_05_02.jpg" alt="스폐셜 02" ></a>
            <a href="javascript:void(0);" onclick="go_PassLecture(3008, 188240);"><img src="https://static.willbes.net/public/images/promotion/2022/04/2437m_05_03.jpg" alt="스폐셜 03" ></a>
            <a href="javascript:void(0);" onclick="go_PassLecture(3008, 190525);"><img src="https://static.willbes.net/public/images/promotion/2022/04/2437m_05_04.jpg" alt="스폐셜 04" ></a>
        </div>
        <div class="check">
            <label><input name="ischk" type="checkbox" value="Y" />페이지 하단 합격PASS 이용안내를 모두 확인하였고,<br> 이에 동의합니다.</label>
            <a href="#careful">이용안내 확인하기 ↓</a>               
        </div>
        <div class="info">
            ※ 강좌 및 교수진은 학원 사정에 따라 변경될 수 있습니다.
            <div class="tx16 mt20">※ 한정상품으로 할인쿠폰이 사용불가한 상품입니다. <br>(이벤트 진행시 예외)</div>
        </div>
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/04/2437m_06.jpg" alt="소문내기 이벤트" >
        <a href="javascript:void(0);" onclick="giveCheck();" title="할인쿠폰받기" style="position: absolute; left: 8.61%; top: 74.93%; width: 83.61%; height: 6.73%; z-index: 2;"></a>
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/04/2437m_07.jpg" alt="소문내기" >
        <a href="@if($file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="홍보 이미지 받기" style="position: absolute; left: 12.78%; top: 75.41%; width: 73.89%; height: 12.43%; z-index: 2;"></a>
        <!-- <a href="https://cafe.daum.net/policeacademy" target="_blank" title="경시모" style="position: absolute; left: 25.69%; top: 77.26%; width: 9.17%; height: 19.46%; z-index: 2;"></a>
        <a href="https://cafe.naver.com/polstudy" target="_blank" title="경꿈사" style="position: absolute; left: 39.03%; top: 77.26%; width: 9.17%; height: 19.46%; z-index: 2;"></a>
        <a href="https://gall.dcinside.com/board/lists/?id=government" target="_blank" title="공무원갤러리" style="position: absolute; left: 52.36%; top: 77.26%; width: 9.17%; height: 19.46%; z-index: 2;"></a>
        <a href="https://gall.dcinside.com/board/lists?id=policeofficer" target="_blank" title="순경마이너갤러리" style="position: absolute; left: 65.56%; top: 77.26%; width: 9.17%; height: 19.46%; z-index: 2;"></a> -->
    </div> 

    {{--홍보url--}}
    @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
        @include('willbes.m.promotion.show_comment_list_url_partial')
    @endif

    <div class="evtCtnsBox evtInfo" id="careful">
        <div class="evtInfoBox">
            <h4 class="NSK-Black">[윌비스X등불쌤] 해양경찰경채 합격패스 이용안내</h4>
            <div class="infoTit NSK-Black">[2022년 해양경찰 경채대비 합격 패스] </div>
            <ul>
                <li>12개월 PASS입니다.</li>
                <li>본 상품 강의 교수님입니다.</li>
                <li>해양경찰학 / 해사법규 / 해사영어 / 항해술 : 등불쌤 교수님</li>
                <li>기관술 : 곧 공개됩니다.</li>
                <li>선택한 해양경찰 경채 합격PASS 는 12개월 동안 동영상 강좌를 무제한 수강할 수 있습니다.</li>
                <li>해양경찰경채 합격 PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다. (결제완료자에 한함)</li>
                <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
            </ul>

            <div class="infoTit NSK-Black">[상품구성](11기+12기+13기)</div>
            <div class="tx16 mb20">
                <li>등불쌤 11기 강의(21년 7월 개강~10월 종강)</li>
                <li>등불쌤 12기 강의(21년 11월 개강~22년 3월 종강예정)</li>
                <li>등불쌤 13기 강의(22년 하반기대비 개강예정 및 추후 제공]</li>
            </div>

            <div class="infoTit NSK-Black">[교재안내] </div>
            <ul>
                <li>
                    해양경찰 경채 PASS수강에 필요한 교재는 별도로 구매하셔야 합니다. <br>
                    (해사법규 3권세트, 해양경찰학 2권세트 , 해양경찰학 별책 1권, 해사영어 2권세트, 항해술 2권세트, 기관술 2권세트)
                </li>
                <li>해양경찰학 별책은 해양경찰학개론 과목에 출제된 해사법규파트를 별도 수록한 교재로 교재구매는 선택사항입니다.</li>
            </ul>

            <div class="infoTit NSK-Black">[수강안내] </div>
            <ul>
                <li>로그인 후 [내강의실] → [무한PASS존]으로 접속합니다.</li>
                <li>구매한 PASS 상품 선택 후 [강좌추가]를 클릭, 원하는 강좌를 등록한 후 수강할 수 있습니다.</li>
                <li>강의는 순차 업로드 예정이며 업로드 일정은 강의 진행일정에 따라 변경될 수 있습니다.</li>
                <li>합격패스는 일시 정지, 수강 연장, 재수강 불가합니다.</li>
                <li>합격패스 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다.</li>
                <li>총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대</li>
                <li>PC, 모바일 기기에 대한 초기화가 필요할 경우 최초 초기화에 한해서는 수강생 본인이 초기화가 가능합니다.</li>
                <li>([내강의실] → [무한PASS존]에서 등록기기정보 확인) 추후 초기화가 필요할 시 유선(온라인 고객센터)이나 게시판을 통해 요청이 가능하고, 수강 기간 동안 3회 신청이 가능합니다.</li>
            </ul>
            <div class="infoTit NSK-Black">[환불정책] </div>
            <ul>
                <li>전액환불 : 결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                <li>부분환불 : 결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                <li>고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, 합격패스 결제가 기준으로 계산하여 사용일수만큼 차감 후 환불됩니다.</li>
            </ul>

            <div class="infoTit NSK-Black">[유의사항]</div>
            <ul>
                <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 부탁드립니다. <br>
                (단, 이벤트 시에는 쿠폰사용가능)
                </li>
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