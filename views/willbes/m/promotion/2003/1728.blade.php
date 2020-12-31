@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
    .evtCtnsBox img {width:100%; max-width:720px;}  


    .evtTop {position:relative}

    .evtMenu {background:#f3f3f3; width:100%; border-bottom:1px solid #edeff0; border-top:1px solid #edeff0}

    .evt01 {}
    .evt01 .dday {font-size:22px;padding:20px 0;}
    .evt01 .dday span {color:#154e3b; box-shadow:inset 0 -25px 0 rgba(252,243,64,0.5);}

    .evt02 {position:relative;}
    .evt02 p img {position:absolute;left:50%;top:70%;margin-left:-40%;width:80%; max-width:576px}    
    .check {padding:20px 0px 20px 10px; letter-spacing:0; color:#fff; z-index:5}
    .check label {cursor:pointer; font-size:14px;color:#000;}
    .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
    .check a {display:block; padding:10px 20px; color:#fff; background:#2d2d2d; margin-top:20px; border-radius:20px; font-size:14px;font-weight:bold;}

    .evt03 {padding-bottom:50px}

    .evt04 {background:#4fdeb1; padding:80px 50px}
    .evt04 li {display:inline; float:left; width:33%}
    .evt04 li:nth-child(3) {width:34%}
    .evt04 li a {display:block; padding:20px 0; background:#154e3b; color:#fff; font-size:20px; margin-right:1px}
    .evt04 li a.active {background:#fff; color:#154e3b;}
    .evt04 li a span {display:block; font-size:24px}    
    .evt04 li:nth-child(3) a {margin:0}

    .evtFooter {margin:0 auto;text-align:left; color:#000; line-height:1.7;background:#6b6b6b; color:#fff }
    .evtFooter h3 {font-size:20px;color:#f3f3f3; background:#161616; text-align:center; padding:10px 0}
    .evtFooter .infoBox {padding:20px;}
    .evtFooter p {margin-bottom:10px; font-size:18px;}
    .evtFooter p span {display:inline-block; font-size:10px; padding-bottom:5px; vertical-align:middle}
    .evtFooter div,
    .evtFooter ul {margin-bottom:20px; padding:0 10px}
    .evtFooter li {margin-left:20px; list-style-type: decimal; font-size:14px;}
    .evtFooter li span {color:#252525;}

    .fixed {position:fixed; width:100%; left:0; z-index:10; border:0; opacity: .95;} 
    .fixed ul {width:100%; max-width:720px; margin:0 auto; background:rgba(255,255,255,0.5); background:#f3f3f3; box-shadow:0 10px 10px rgba(102,102,102,0.2);}

    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px) {        
        .evt02 .dday strong {font-size:32px}
        .evt03 .btn a {font-size:30px;}  
        .evt04 {padding:40px 10px}      
        .evt04 li a {font-size:16px;}
        .evt04 li a span {font-size:18px}  
    }

    @@media only screen and (min-width: 375px) and (max-width: 640px) {
        .evt04 {padding:60px 20px} 
    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 690px) {       
        .evt03 .btn a br {display:none}
        .evt06 h5 br {display:none}
        .evt06 .curriculum {column-count: 2; column-gap:40px; column-rule:1px solid #e4e4e4} 
    }
</style>

<div id="Container" class="Container NSK c_both"> 
    <div class="evtCtnsBox evt01 ddayArea">
        <div class="dday NSK-Thin">
            <strong class="NSK-Black">T-PASS 마감까지 <br><span id="ddayCountText"></span> 남았습니다.</strong>
        </div>      
    </div>
               
    <div class="evtCtnsBox evtTop">
        <img src="https://static.willbes.net/public/images/promotion/2020/08/1728m_top.jpg" alt="최우영 T-PASS" > 
    </div>  
    
    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/08/1728m_01.jpg" alt="단기 성적향상에 효과적" >
    </div>

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/08/1728m_02.jpg" alt="선택하는 이유">
        <a href="https://m.cafe.daum.net/sharkchoi" target="_blank" title="카페바로가기" style="position: absolute; left: 61.94%; top: 55.12%; width: 25%; height: 6.4%; z-index: 2;"></a>
    </div>
    {{--
    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/08/1728m_03.jpg" alt="응시표 인증하기" usemap="#Map1728B" border="0" >
        <map name="Map1728B">
            <area shape="rect" coords="43,440,678,535" href="https://pass.willbes.net/promotion/index/cate/3028/code/1728#certification" target="_blank" alt="응시표인증하기">
        </map>
    </div>
    --}}

    <div class="evtCtnsBox evt04" >
        <ul class="tab">
            <li><a href="#tab01">통신직<span class="NSK-Black">T-PASS</span></a></li>
            <li><a href="#tab02">전기직<span class="NSK-Black">T-PASS</span></a></li>
            <li><a href="#tab03">전자직<span class="NSK-Black">T-PASS</span></a></li>
        </ul>
        <div id="tab01">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1728m_04_1_t.jpg" alt="통신직">
            <a href="javascript:go_PassLecture('169198');">
                <img src="https://static.willbes.net/public/images/promotion/2020/08/1728m_04_1_b.jpg" alt="통신직">
            </a>
        </div>
        <div id="tab02">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1728m_04_2_t.jpg" alt="전기직">
            <a href="javascript:go_PassLecture('169199');">
                <img src="https://static.willbes.net/public/images/promotion/2020/08/1728m_04_2_m.jpg" alt="전기직7급수강신청">
            </a>
            <a href="javascript:go_PassLecture('169201');">
                <img src="https://static.willbes.net/public/images/promotion/2020/08/1728m_04_2_b.jpg" alt="전기직9급수강신청">
            </a>
        </div>
        <div id="tab03">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1728m_04_3_t.jpg" alt="전자직">
            <a href="javascript:go_PassLecture('170039');">
                <img src="https://static.willbes.net/public/images/promotion/2020/08/1728m_04_3_b.jpg" alt="전자직">
            </a>
        </div>

        <div class="check">
            <label>
                <input name="ischk" type="checkbox" value="Y" />
                페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.
            </label>
            <a href="#infoText">이용안내 확인하기 ↓</a>
        </div>        
    </div>

    <div class="evtCtnsBox evtFooter" id="infoText">
        <h3 class="NSK-Black">이용안내 및 유의사항</h3>
        <div class="infoBox">
            <p class="NSK-Black"><span>●</span> 상품구성 </p>
            <ul>
                <li>최우영 T-PASS 제공 과정<br>
                - 통신직 : 2020년도 대비 이론 + 2021년도 9급 국가직·지방직/군무원 대비 신규 개강 전 과정<br>
                - 전기직 : 2020년도 대비 이론 및 문제풀이 + 2021년도 전기직 대비 신규 개강 전 과정<br/>
                - 전자직 : 2020년도 대비 이론 및 문제풀이 + 2021년도 군무원 전자직 대비 신규 개강 전 과정</li>
                <li>본 T-PASS 내 제공되는 과정 중 신규 개강이 진행되지 않는 경우, 전년도 진행 과정으로 대체 제공될 수 있습니다.</li>
                <li>본 T-PASS를 통한 강의 수강 시, 각 과정당 3배수 제한이 적용됩니다.</li>
            </ul>

            <p class="NSK-Black"><span>●</span> 기기제한</p>
            <ul>
                <li>본 PASS 수강 시 이용 가능한 기기는 다음과 같이 제한됩니다.<br>
                - PC+모바일 수강 시 : PC 2대 or 모바일 2대 or PC 1대+모바일 1대 (총 2대)</li>
                <li>계정당 최초 1회에 한해 직접 기기정보 초기화 진행 가능하며, 별도 기기정보 초기화가 추가로 필요하신 경우 내용 확인 후 진행 가능하오니 
                고객센터로 문의주시기 바랍니다. (윌비스 고객만족센터 1544-5006)</li>
            </ul>

            <p class="NSK-Black"><span>●</span> 수강안내</p>
            <ul>
                <li>먼저 [내강의실] 메뉴에서 무한PASS존으로 접속합니다.</li>
                <li>구매하신 무한PASS 상품명 옆의 [강좌추가] 버튼을 클릭, 원하는 과목/교수/강좌를 선택 등록 후 수강할 수 있습니다.</li>
                <li>본 PASS 이용 중에는 일시정지/재수강/연장 기능을 사용할 수 없습니다.</li>
            </ul>

            <p class="NSK-Black"><span>●</span> 결제/환불</p>
            <ul>
                <li>결제일로부터 7일 이내 전액 환불 가능합니다. 단, 맛보기 강좌를 제외하고 2강 이하 수강 시에만 전액 환불이 가능합니다. 
                    강의 자료 및 모바일 강의 다운로드 서비스 이용 시 수강한 것으로 간주됩니다.</li>
                <li>본 상품은 특별 기획 강좌로 환불 시에는 할인 되기 전 정가를 기준으로 사용일수만큼 차감 후 환불됩니다.</li>
                <li>아이디 공유 적발 시 회원 자격 박탈 및 환불 불가하오니 유의바랍니다.</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Container -->

<script type="text/javascript">
        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDownText('{{$arr_promotion_params['edate']}}');
        });

        // 날짜차이 계산
        var dDayDateDiff = {
            inDays: function(dd1, dd2) {
                var tt2 = dd2.getTime();
                var tt1 = dd1.getTime();

                return Math.floor((tt2-tt1) / (1000 * 60 * 60 * 24));
            },
            inWeeks: function(dd1, dd2) {
                var tt2 = dd2.getTime();
                var tt1 = dd1.getTime();

                return parseInt((tt2-tt1)/(24*3600*1000*7));
            },
            inMonths: function(dd1, dd2) {
                var dd1Y = dd1.getFullYear();
                var dd2Y = dd2.getFullYear();
                var dd1M = dd1.getMonth();
                var dd2M = dd2.getMonth();

                return (dd2M+12*dd2Y)-(dd1M+12*dd1Y);
            },
            inYears: function(dd1, dd2) {
                return dd2.getFullYear()-dd1.getFullYear();
            }
        };

        {{--
         * 프로모션용 디데이카운터 텍스트
         * @@param end_date [마감일 (YYYY-MM-DD)]
        --}}
        function dDayCountDownText(end_date, ele_id) {
            if(!ele_id) ele_id = 'ddayCountText';
            var arr_end_date = end_date.split('-');
            var event_day = new Date(arr_end_date[0], parseInt(arr_end_date[1]) - 1, arr_end_date[2], 23, 59, 59);
            var now = new Date();
            var timeGap = new Date(0, 0, 0, 0, 0, 0, (event_day - now));
            var date_left = String( dDayDateDiff.inDays(now, event_day) );
            var hour_left = String( timeGap.getHours() );
            var minute_left = String( timeGap.getMinutes() );
            var second_left = String(  timeGap.getSeconds() );

            if(date_left.length == 1) date_left = '0' + date_left;
            if(hour_left.length == 1) hour_left = '0' + hour_left;
            if(minute_left.length == 1) minute_left = '0' + minute_left;
            if(second_left.length == 1) second_left = '0' + second_left;

            if ((event_day.getTime() - now.getTime()) > 0) {
                $('#'+ele_id).html(date_left + '일 ' + hour_left + ':' + minute_left + ':' + second_left);

                setTimeout(function() {
                    dDayCountDownText(end_date, ele_id);
                }, 1000);
            } else {
                $('#'+ele_id).hide();
                $('.ddayArea').hide();
            }
        }


        {{-- 수강신청 동의 --}}
        function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ site_url('/m/periodPackage/show/cate/3028/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }

        function goCartNDirectPay(ele_id, field_name, cart_type, learn_pattern, is_direct_pay)
        {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            var $regi_form = $('#' + ele_id);
            var $prod_code = $regi_form.find('input[name="' + field_name + '"]:checked');   // 상품코드
            var $is_chk = $regi_form.find('input[name="is_chk"]');  // 동의여부
            var params;

            if ($is_chk.length > 0) {
                if ($is_chk.is(':checked') === false) {
                    alert('이용안내에 동의하셔야 합니다.');
                    $is_chk.focus();
                    return;
                }
            }

            if ($prod_code.length < 1) {
                alert('강좌를 선택해 주세요.');
                return;
            }

            {{-- 장바구니 저장 기본 파라미터 --}}
                params = [
                { 'name' : '{{ csrf_token_name() }}', 'value' : '{{ csrf_token() }}' },
                { 'name' : '_method', 'value' : 'POST' },
                { 'name' : 'cart_type', 'value' : cart_type },
                { 'name' : 'learn_pattern', 'value' : learn_pattern },
                { 'name' : 'is_direct_pay', 'value' : is_direct_pay }
            ];

            {{-- 선택된 상품코드 파라미터 --}}
            $prod_code.each(function() {
                params.push({ 'name' : 'prod_code[]', 'value' : $(this).val() + ':613001:' + $(this).val() });
            });

            {{-- 장바구니 저장 URL로 전송 --}}
            formCreateSubmit('{{ front_url('/cart/store') }}', params, 'POST');
        }

        /*탭*/
        $(document).ready(function(){
            $('.tab').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');

                $content = $($active[0].hash);

                $links.not($active).each(function () {
                    $(this.hash).hide()
                });

                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    $active.removeClass('active');
                    $content.hide();
                    $active = $(this);
                    $content = $(this.hash);
                    $active.addClass('active');
                    $content.show();
                    e.preventDefault();
                })
            })
        });

    </script>

    <!-- AceCounter Log Gathering Script V.8.0.AMZ2019080601 -->
    <script language='javascript'>
        var _AceGID=(function(){var Inf=['gtp14.acecounter.com','8080','AH1A44052179653','AW','0','NaPm,Ncisy','ALL','0']; var _CI=(!_AceGID)?[]:_AceGID.val;var _N=0;var _T=new Image(0,0);if(_CI.join('.').indexOf(Inf[3])<0){ _T.src ="https://"+ Inf[0] +'/?cookie'; _CI.push(Inf);  _N=_CI.length; } return {o: _N,val:_CI}; })();
        var _AceCounter=(function(){var G=_AceGID;var _sc=document.createElement('script');var _sm=document.getElementsByTagName('script')[0];if(G.o!=0){var _A=G.val[G.o-1];var _G=(_A[0]).substr(0,_A[0].indexOf('.'));var _C=(_A[7]!='0')?(_A[2]):_A[3];var _U=(_A[5]).replace(/\,/g,'_');_sc.src='https:'+'//cr.acecounter.com/Web/AceCounter_'+_C+'.js?gc='+_A[2]+'&py='+_A[4]+'&gd='+_G+'&gp='+_A[1]+'&up='+_U+'&rd='+(new Date().getTime());_sm.parentNode.insertBefore(_sc,_sm);return _sc.src;}})();
    </script>
    <noscript><img src='https://gtp14.acecounter.com:8080/?uid=AH1A44052179653&je=n&' border='0' width='0' height='0' alt=''></noscript>
    <!-- AceCounter Log Gathering Script End -->

@stop