@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">   
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:20px auto 0;
            padding:0 !important;
            background:#fff;     
            font-size:14px;  
            
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .evt_top {background:#fff6e5}
        .evt_top span {position: absolute; top:680px; left:50%; width:1066px; margin-left:-533px; z-index: 10;}

        .evt01 {background:#dda08b; padding-bottom:100px}
        .evt01 .tabBox {position:relative; width:1120px; margin:0 auto; padding-bottom:50px}
        .evt01 .tabs {display: flex; flex-wrap: wrap; justify-content: space-between; width:980px; margin:0 auto;}
        .evt01 .tabs a {display:block; text-align:center; width:calc(33.333% - 5px); font-size:22px; font-weight:600; background:#ffffff; color:#1f1f1f; padding:15px 0;}
        .evt01 .tabs a:hover,
        .evt01 .tabs a.active {background:#1f1f1f; color:#fff;}
        .evt01 .tabs a:last-child {margin:0}
        .evt01 .btn {display:block; text-align:center; width:calc(25%); margin:0 auto 30px; font-size:30px; background:#292929; color:#ffea87; padding:20px; border-radius:50px}
        .evt01 .btn:hover {background:#ffea87; color:#292929;}
        .evt01 p {font-size:16px; line-height:1.4;}

        .evt02 {background:#474747}

        .evt03 {padding:100px 0;}
        .evt03 .sTilte {font-size:40px; margin-bottom:50px}
        .evt03 .request {width:1000px; margin:0 auto 50px; background:#fff; padding:0 60px; text-align:left; display:flex; justify-content: space-between;}
        .evt03 .request h3 {font-size:18px;}
        .evt03 .request td {padding:10px}
        .evt03 .request input {height:26px;}
        .evt03 .requestL {width:49%;}        
        .evt03 .requestR {width:49%;}
        .evt03 .requestR ul {margin-top:10px; line-height:1.5; padding:10px; border:1px solid #ccc; height:147px; overflow-y:scroll }
        .evt03 .requestL li {display:inline-block; margin-right:10px}
        .evt03 .requestR li {margin-bottom:5px}
        .evt03 .request:after {content:""; display:block; clear:both}
        .evt03 .btn {display:block; text-align:center; width:calc(25%); margin:0 auto 30px; font-size:30px; background:#292929; color:#ffea87; padding:20px; border-radius:50px}
        .evt03 .btn:hover {background:#ffea87; color:#292929;}

        .evt04 {background:#cbeaff; padding-bottom:80px}
        .evt05 {padding:100px 0}
        .evt05 .sTilte {font-size:40px; margin-bottom:50px; line-height:1.4; color:#474747}
        .evt05 .sTilte div {color:#7d7d7d}

    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}

        <input type="hidden" name="msg" value="설문조사를 참여해 주세요.">
    </form>
    
    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2823_top.gif" alt=""/>
            <span data-aos="fade-up"><img src="https://static.willbes.net/public/images/promotion/2022/11/2823_top_img.png" alt=""/></span>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2823_01.jpg" alt=""/>
            <div class="tabBox" data-aos="fade-up">
                <div class="tabs">
                    <a href="#tab01">수강대상</a>
                    <a href="#tab02">강의특징</a>
                    <a href="#tab03">강의계획</a>
                </div>
                <div id="tab01"><img src="https://static.willbes.net/public/images/promotion/2022/11/2823_01_01.jpg" alt=""/></div>
                <div id="tab02"><img src="https://static.willbes.net/public/images/promotion/2022/11/2823_01_02.jpg" alt=""/></div>
                <div id="tab03"><img src="https://static.willbes.net/public/images/promotion/2022/11/2823_01_03.jpg" alt=""/></div>
            </div>
            <a href="#" class="btn NSK-Black" href="javascript:void(0);" onclick="showPopup();">설문조사 참여하기</a>
            <p>
                ※ 설문조사 참여일 기준 다음날 평일 오후 1시 전까지 아이디로 무료수강권이 발급됩니다.<br>
                ※ 쿠폰 사용 방법 : 로그인 > [7급 PSAT 자료해석 표,그래프 계산특강] > 바로결제 > 쿠폰적용 > 결제완료
            </p>
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/11/2823_02.jpg" alt=""/>
                <a href="https://pass.willbes.net/lecture/show/cate/3103/pattern/only/prod-code/201672" target="_blank" title="석치수" style="position: absolute; left: 70.63%; top: 65.75%; width: 20%; height: 4.16%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/lecture/show/cate/3103/pattern/free/prod-code/202468" target="_blank" title="박준범" style="position: absolute; left: 70.63%; top: 72.92%; width: 20%; height: 4.16%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/lecture/show/cate/3103/pattern/free/prod-code/202469" target="_blank" title="이나우" style="position: absolute; left: 70.63%; top: 79.96%; width: 20%; height: 4.16%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/lecture/show/cate/3103/pattern/free/prod-code/202470" target="_blank" title="한승아" style="position: absolute; left: 70.63%; top: 86.94%; width: 20%; height: 4.16%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <div class="sTilte NSK-Black">수강내역 인증하기</div>    
            <div class="request" id="request">
                <div class="requestL">
                    <h3>* 수강내역 인증하기 - 로그인 후 참여</h3>
                    <table width="0" cellspacing="0" cellpadding="0" class="table_type">
                        <col width="25%" />
                        <col  />
                        <tr>
                            <th>* 이름</th>
                            <td scope="col">
                                <input type="text" id="register_name" name="register_name" value="{{sess_data('mem_name')}}" title="성명" {{(sess_data('is_login') === true) ? 'readonly="readonly"' : ''}}/>
                            </td>
                        </tr>
                        <tr>
                            <th>* 아이디</th>
                            <td>
                                willbes
                            </td>
                        </tr>
                        <tr>
                            <th>* 이미지 등록</th>
                            <td>
                                <input type="file" name="attach_file" id="attach_file"/>
                            </td>
                        </tr>
                    </table>
                    <p>* 이미지 (jpg, gif, png 파일만 등록 가능)</p>
                </div>
                <div class="requestR">
                    <h3>* 개인정보 수집 및 이용에 대한 안내</h3>
                    <ul>
                        <li>
                            <strong>1. 개인정보 수집 이용 목적</strong> <br>
                            - 신청자 본인 확인 및 신청 접수 및 문의사항 응대<br>
                            - 윌비스 한림법학원 7급공채 이벤트, 신규 강의 안내 등 최신 정보 및 광고성 정보 제공
                        </li>
                        <li><strong>2. 개인정보 수집 항목</strong> <br>
                        - 필수항목 : 성명, 아이디
                        </li>
                        <li><strong>3. 개인정보 이용기간 및 보유기간</strong><br>
                        - 이용 목적 달성 또는 신청자의 신청 해지 및 삭제 요청 시 파기
                        </li>
                        <li>4. 신청자의 개인정보 수집 및 활용에 동의하지 않으실 경우 이벤트 참여 및 서비스 이용에 제한이 있을 수 있습니다.</li>
                        <li>5. 입력하신 개인정보는 수집목적 외 신청자의 동의 없이 절대 제3 자에게 제공되지 않으며 개인정보 처리방침에 따라 보호되고 있습니다.</li>
                    </ul>
                    <div>
                        <input name="is_chk" id="is_chk" type="checkbox" value="Y"><label for="is_chk"> 윌비스에 개인정보 제공 동의하기(필수)</label>
                    </div>
                </div>
            </div>
            <div>
                <a href="#none" onclick="javascript:fn_submit();" class="btn NSK-Black">인증하기</a>
            </div> 
        </div>

        <div class="evtCtnsBox evt04" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2823_04.jpg" alt=""/>
        </div> 

        <div class="evtCtnsBox evt05">
            <div class="sTilte NSK-Black">
                <div class="">7급 공채 시험만을 위한</div>
                최적화된 단계별 학습 프로그램으로 시작부터 앞서 가십시오!
            </div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif 
        </div>
    </div>
    <!-- End Container -->

    <script>
        /*탭*/
        $(document).ready(function(){
            $('.tabs').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');

                $content = $($active[0].hash);

                $links.not($active).each(function () {
                    $(this.hash).hide()});

                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    $active.removeClass('active');
                    $content.hide();

                    $active = $(this);
                    $content = $(this.hash);

                    $active.addClass('active');
                    $content.show();

                    e.preventDefault()})})}
        );   

        var $regi_form = $('#regi_form');

        function showPopup(){
            @if(empty($arr_promotion_params['SsIdx']) === true)
                alert('설문정보가 없습니다.');
                return;
            @else
                var url = "{{front_url('/eventSurvey/index/' . $arr_promotion_params['SsIdx'])}}";
                window.open(url,'survey_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=800,height=700');
            @endif
        }
    </script>

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
        $(document).ready( function() {
            AOS.init();
        });
    </script>
@stop