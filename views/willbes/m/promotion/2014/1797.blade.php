@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtTop {position:relative}

    .evt01 {}

    .evt02 {text-align:center; padding-bottom:100px; background:#212121}
    .evt02 .dday {font-size:22px;padding:20px 0; background:#fff}
    .evt02 .dday span {color:#a0774e; box-shadow:inset 0 -25px 0 rgba(0,0,0,0.1);}

    .evt03 {}   

    .evt04 div {font-size:16px; font-weight:600; margin-top:20px}

    .evt05 {margin-top:80px}

    .evt06 {text-align:left; padding:50px 20px; word-break: keep-all;}
    .evt06 h5 {color:#414d4c; font-size:2.2rem; line-height:1; margin-bottom:20px; letter-spacing:-1px;}
    .evt06 .evt06Txt01 {font-size:1.6rem;line-height:1;}
    .evt06 dl {margin-top:30px;}
    .evt06 dl:first-child {margin:0}
    .evt06 dt {font-size:16px; font-weight:bold; color:#01c73c; margin-top:30px}
    .evt06 dt:first-child {margin:0}
    .evt06 .curriculum {margin:30px 0}
    .evt06 .sample {margin-top:50px}
    .evt06 .sample li {display:inline; float:left; width:49%; padding:15px 0; margin-right:1%; border-radius:10px; 
        background: #acacac; color:#fff; font-size:16px; font-weight:600; text-align:center}
    .evt06 .sample li p {margin-bottom:15px;}
    .evt06 .sample li a {display:inline-block; padding:5px 10px; font-size:14px; margin:0 2px 5px; border-radius:4px; background:#000; color:#fff;}
    .evt06 .sample li a:hover {background:#fff; color:#000}
    .evt06 .sample li:last-child {margin:0}
    .evt06 .sample:after {content:""; display:block; clear:both}

    .evt06 .curriculum {margin:30px 0}
    .evt06 dl {margin-top:30px;}
    .evt06 dl:first-child {margin:0}
    .evt06 dt {font-size:16px; font-weight:bold; color:#a0774e; margin:30px 0 10px}
    .evt06 dt:first-child {margin:0 0 10px}
    .evt06 dd {margin-bottom:10px; line-height:1.4}

    .evt06 .evt06Txt02 {font-size:14px; line-height:1.4; letter-spacing:-1px; color:#333; margin-top:20px; text-align:left}   

    .video-container {position:relative; padding-bottom:56.25%; padding-top:30px; height:0; overflow: hidden;}
    .video-container iframe,
    .video-container object,
    .video-container embed {position:absolute; top:0; left:50%; width:100%; margin-left:-50%; height:100%;}

    .evtCtnsBox .btn {width:90%; margin:30px auto 0}
    .evtCtnsBox .btn a {display:block; color:#fff; background:#ebc667; border-radius:30px; font-size:20px; padding:15px 0; border:1px solid #ebc667;
        box-shadow: 0 1px 0 #cccccc, 0 2px 0 #cccccc, 0 3px 0 #cccccc, 0 4px 0 #cccccc, 0 5px 0 #cccccc, 0 6px 0 #cccccc, 0 7px 0 #cccccc, 0 8px 0 #cccccc, 0 9px 0 #cccccc, 0 50px 30px rgba(0, 0, 0, 0.3)
    }


    .evtFooter {margin:80px auto 0; padding:30px 20px; text-align:left; color:#3a3a3a; background:#c2c2c2; font-size:0.875rem; line-height:1.4 }
    .evtFooter h3 {font-size:1.5rem; margin-bottom:30px; color:#000}
    .evtFooter p {margin-bottom:10px; color:#333; font-size:1.2rem;}
    .evtFooter div,
    .evtFooter ul {margin-bottom:30px; padding-left:10px}
    .evtFooter li {margin-left:20px; list-style-type: decimal;}


    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px) {        
        .evt02 .dday strong {font-size:32px}
        .evt02 .btn a {font-size:30px;}        
    }

    @@media only screen and (min-width: 375px) and (max-width: 640px) {

    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 690px) {       
        .evt02 .btn a br {display:none}
        .evt06 h5 br {display:none}
        .evt06 .curriculum {column-count: 2; column-gap:40px; column-rule:1px solid #e4e4e4} 
    }

</style>

<div id="Container" class="Container NSK c_both">            
    <div class="evtCtnsBox evtTop">
        <img src="https://static.willbes.net/public/images/promotion/2020/09/1797_top.jpg" alt="이승기 PD" >        
    </div> 
    
    <div class="evtCtnsBox evt01">
        <img src="https://static.willbes.net/public/images/promotion/2020/09/1797_01.jpg" alt="이시한 교수" >
    </div> 
    

    <div class="evtCtnsBox evt02 ddayArea">
        <div class="dday NSK-Thin">
            <strong class="NSK-Black">사전예약 마감까지 <br><span id="ddayCountText"></span> 남았습니다.</strong>
        </div> 
    </div>

    <div class="evtCtnsBox evt02">
        <img src="https://static.willbes.net/public/images/promotion/2020/09/1797_02.jpg" alt="" >
        <div class="video-container-box">
            <div class="video-container">
                <iframe src="https://www.youtube.com/embed/CMDjINjDQyg?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
        <div class="btn NSK-Black">
            <a href="javascript:goLecture();">지금, 사전 예약하고<br> 끝장 혜택받기 ></a>
            {{-- 
            <a href="javascript:goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'on_lecture', 'Y');">지금, 사전 예약하고<br> 끝장 혜택받기 ></a>
            <div id="pass" class="infoCheck" style="display: none;">
                <input type="checkbox" name="y_pkg" value="172160" checked/>
                <input type="checkbox" id="is_chk" name="is_chk" checked>
            </div>
            --}}
        </div>    
         
    </div>

    <div class="evtCtnsBox evt03">
        <img src="https://static.willbes.net/public/images/promotion/2020/09/1797_03.jpg" alt="" > 
        <img src="https://static.willbes.net/public/images/promotion/2020/09/1797_04.jpg" alt="" >       
    </div>    

    <div class="evtCtnsBox evt04">        
        <img src="https://static.willbes.net/public/images/promotion/2020/09/1797_05.jpg" alt="" ><br>
        <img src="https://static.willbes.net/public/images/promotion/2020/09/1797_06.jpg" alt="" > 
    </div>

    <div class="evtCtnsBox evt06">
        <h5 class="NSK-Black">
            <div>자기경영 리더십</div>
        </h5>
        <div class="evt06Txt01 NSK-Thin">우리가 배울 수 있는 과정은?</div>

        <ul class="sample">
            @if(empty($arr_base['promotion_otherinfo_data']) === false)
                @php
                    // 셈플강의 4강,1강 하드코딩
                    $arr_sample_lecture = array_reverse($arr_base['promotion_otherinfo_data']);
                    $i = 1;
                    $arr_chapter = [1 => '4', 2 => '1']
                @endphp
                @foreach($arr_sample_lecture as $row)
                    <li>
                        <p>{{$arr_chapter[$i]}}강 맛보기 수강 ▼</p>
                        <a href='javascript:fnMobile("https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p={{$row['OtherData1']}}&u={{$row['wUnitIdx']}}&q=HD", "{{config_item('starplayer_license')}}");' class="btnst02">HIGH ></a>
                        <a href='javascript:fnMobile("https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p={{$row['OtherData1']}}&u={{$row['wUnitIdx']}}&q=SD", "{{config_item('starplayer_license')}}");' class="btnst03">LOW ></a>
                    </li>
                    @php $i += 1; @endphp
                @endforeach
            @else
                <li><a href="#none">4강 맛보기<br> 수강 준비중 ></a></li>
                <li><a href="#none">1강 맛보기<br> 수강 준비중 ></a></li>
            @endif
        </ul>

        <div class="evt06Txt02">
            * 동영상 수강을 위해서는 스타플레이어 설치 후 재생하셔야 합니다.<br>
            * 스타플레이어 미설치 경우 맛보기 수강버튼 클릭시 설치 메시지가 팝업으로 뜹니다.<br>
            * 팝업 확인이 안 될 경우 팝업 해제 후 다시 진행하시면 됩니다.
        </div>
        
        <div class="curriculum">              
            <dl>
                <dd>1강. 왜 다시 이순신인가? </dd>
                <dd>2강. 무에서 유를 만들어 내는 리더</dd>
                <dd>&nbsp;</dd>
                <dd>3강. 정통 문신 집안 출신, 무인의 길을 걷다 </dd>
                <dd>4강. “임무” vs “업무”를 구분하여 파악하라</dd>
                <dd>5강. 성공적인 삶은 사는 사람들의 공통점은?</dd>
                <dd>&nbsp;</dd>
                <dd>6강. NO!는 책임감의 언어</dd>
                <dd>7강. 절대권력 앞에서 과감히 "No!"를 외친 "대간제도"</dd>
                <dd>&nbsp;</dd>
                <dd>8강. 필승전략의 귀재! 이순신 장군의 필승전략</dd>
                <dd>9강. 경쟁에서 이기고 싶다면 치열하게 계산하라!</dd>
                <dd>&nbsp;</dd>
                <dd>10강. 통찰력의 원천을 찾아라!</dd>
                <dd>11강. 명량을 승리로 이끈 지적 능력</dd>
                <dd>12강. 듣는 기술로 학습을 완성하다</dd>
                <dd>&nbsp;</dd>
                <dd>13강. 평온할 때 위기에 대비하라</dd>
                <dd>14강. 환경은 탓해야 할 대상이 아니라 극복해야 할 대상</dd>
                <dd>&nbsp;</dd>
                <dd>15강. 치밀하게 정보를 수집하고 꼼꼼하게 기록하다</dd>
                <dd>16강. 정보수집의 집약체,  한산해전 승리의 비밀</dd>
                <dd>17강. 정보를 이용해 전략을 수립하라</dd>
                <dd>&nbsp;</dd>
                <dd>18강. 400년을 뛰어넘어 일본의 존경을 받는 리더의 전략으로 
                코로나로 변화된 세상에서 반드시 승리할 수 있는 전략을 세워라</dd>
            </dl>
        </div>
    </div>

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/09/1797_07m.jpg" alt="" >
        <div>소문내기 이벤트는 PC버전에서 참여 가능합니다.</div>
        <div class="btn NSK-Black"><a href="https://njob.willbes.net/promotion/index/cate/3114/code/1797" target="_blank">소문내기 이벤트 참여하기 ></a></div>       
    </div>  

    <div class="evtCtnsBox evtFooter" id="infoText">
        <h3 class="NSK-Black">[이용안내]</h3>
        <p># 사전예약 혜택</p>
        <ul>
            <li>사전예약 혜택은 9월 30일까지 결제완료자에 한해서만 적용됩니다.</li>
            <li>사전예약 혜택은 수강료 40% 할인입니다.<br>
                수강기간 추가 혜택은 강의 시작(10월 1일) 이후 일괄적으로 적용 예정입니다.
            </li>
        </ul>

        <p># 소문내기 이벤트</p>
        <ul>
            <li>발표시 동일인으로 확인 될 경우 강의 제공은 한 개의 아이디만 당첨으로 인정합니다.</li>
            <li>당첨자 발표는 10월 7일 공지사항을 참고하시면 됩니다.</li>
        </ul>

        <div>※ 문의안내 1544-5006</div>
    </div>  
</div>
<!-- End Container -->

    <script src="/public/vendor/starplayer/js/starplayer_app.js"></script>
    <script type="text/javascript">
        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}','txt');
        });

        function goLecture() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            location.href = 'https://njob.willbes.net/m/lecture/show/cate/3114/pattern/only/prod-code/172160';
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

    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

    <!-- AceCounter Log Gathering Script V.8.0.AMZ2019080601 -->
    <script language='javascript'>
        var _AceGID=(function(){var Inf=['gtp14.acecounter.com','8080','AH1A44052179653','AW','0','NaPm,Ncisy','ALL','0']; var _CI=(!_AceGID)?[]:_AceGID.val;var _N=0;var _T=new Image(0,0);if(_CI.join('.').indexOf(Inf[3])<0){ _T.src ="https://"+ Inf[0] +'/?cookie'; _CI.push(Inf);  _N=_CI.length; } return {o: _N,val:_CI}; })();
        var _AceCounter=(function(){var G=_AceGID;var _sc=document.createElement('script');var _sm=document.getElementsByTagName('script')[0];if(G.o!=0){var _A=G.val[G.o-1];var _G=(_A[0]).substr(0,_A[0].indexOf('.'));var _C=(_A[7]!='0')?(_A[2]):_A[3];var _U=(_A[5]).replace(/\,/g,'_');_sc.src='https:'+'//cr.acecounter.com/Web/AceCounter_'+_C+'.js?gc='+_A[2]+'&py='+_A[4]+'&gd='+_G+'&gp='+_A[1]+'&up='+_U+'&rd='+(new Date().getTime());_sm.parentNode.insertBefore(_sc,_sm);return _sc.src;}})();
    </script>
    <noscript><img src='https://gtp14.acecounter.com:8080/?uid=AH1A44052179653&je=n&' border='0' width='0' height='0' alt=''></noscript>
    <!-- AceCounter Log Gathering Script End -->

@stop