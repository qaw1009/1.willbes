@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtTop {position:relative}

    .evt01 {}

    .evt02 { text-align:center;}
    .evt02 .dday {font-size:22px;padding:20px 0;}
    .evt02 .dday span {color:#a0774e; box-shadow:inset 0 -25px 0 rgba(0,0,0,0.1);}

    .evt03 {background:#252525; padding-bottom:80px}   

    .evt04 div {font-size:16px; font-weight:600; margin-top:20px}

    .evt05 {margin-top:80px}

    .evt06 {text-align:left; padding:50px 20px; word-break: keep-all;}
    .evt06 h5 {color:#a0774e; font-size:2.2rem; line-height:1; margin-bottom:20px; letter-spacing:-1px;}
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
    .evtCtnsBox .btn a {display:block; color:#282f4c; background:#fff; border-radius:30px; font-size:20px; padding:15px 0; border:1px solid #333;
        box-shadow: 0 1px 0 #cccccc, 0 2px 0 #cccccc, 0 3px 0 #cccccc, 0 4px 0 #cccccc, 0 5px 0 #cccccc, 0 6px 0 #cccccc, 0 7px 0 #cccccc, 0 8px 0 #cccccc, 0 9px 0 #cccccc, 0 50px 30px rgba(0, 0, 0, 0.3)
    }
    .evtCtnsBox .btn a:hover {color:#fff; background:#282f4c;}

    .evtFooter {margin:80px auto 0; padding:30px 20px; text-align:left; color:#3a3a3a; background:#c2c2c2; font-size:0.875rem; line-height:1.4 }
    .evtFooter h3 {font-size:1.5rem; margin-bottom:30px; color:#000}
    .evtFooter p {margin-bottom:10px; color:#333; font-size:1.2rem;}
    .evtFooter div,
    .evtFooter ul {margin-bottom:30px; padding-left:10px}
    .evtFooter li {margin-left:20px; list-style-type: decimal;}


    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px) {        
        .evt02 .dday strong {font-size:32px}
        .evt03 .btn a {font-size:30px;}        
    }

    @@media only screen and (min-width: 375px) and (max-width: 640px) {

    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 690px) {       
        .evt03 .btn a br {display:none}
        .evt06 h5 br {display:none}
        .evt06 .curriculum {column-count: 2; column-gap:40px; column-rule:1px solid #e4e4e4} 
    }

</style>

<div id="Container" class="Container NSK c_both">            
    <div class="evtCtnsBox evtTop">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1722_top.jpg" alt="이승기 PD" >        
    </div> 
    
    <div class="evtCtnsBox evt01">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1722_01.jpg" alt="이시한 교수" >
    </div> 
    
    <div class="evtCtnsBox evt02 ddayArea">
        <div class="dday NSK-Thin">
            <strong class="NSK-Black">사전예약 마감까지 <br><span id="ddayCountText"></span> 남았습니다.</strong>
        </div> 
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1722_02.jpg" alt="" >       
    </div>

    <div class="evtCtnsBox evt03">
        <div class="video-container-box">
            <div class="video-container">
                <iframe src="https://www.youtube.com/embed/AhPAFng06cA?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
        <div class="btn NSK-Black">
            {{-- <a href="javascript:goLecture();">지금, 사전 예약하고<br> 끝장 혜택받기 ></a> --}}
            <a href="javascript:goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'on_lecture', 'Y');">지금, 사전 예약하고<br> 끝장 혜택받기 ></a>
            <div id="pass" class="infoCheck" style="display: none;">
                <input type="checkbox" name="y_pkg" value="169144" checked/>
                <input type="checkbox" id="is_chk" name="is_chk" checked>
            </div>
        </div>
    </div>    

    <div class="evtCtnsBox evt04">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1722_04.jpg" alt="" ><br>
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1722_05.jpg" alt="" ><br>
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1722_06.jpg" alt="" ><br>
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1722_07.jpg" alt="" ><br>  
    </div>

    <div class="evtCtnsBox evt06">
        <h5 class="NSK-Black">
            <div>책쓰기가 이렇게 쉬울줄이야!</div>
        </h5>
        <div class="evt06Txt01 NSK-Thin">우리가 배울 수 있는 과정은?</div>

        <ul class="sample">
            @if(empty($arr_base['promotion_otherinfo_data']) === false)
                @php $i = 1; @endphp
                @foreach($arr_base['promotion_otherinfo_data'] as $row)                                    
                    <li>
                        <p>{{$i}}강 맛보기 수강 ▼</p>                                       
                        <a href='javascript:fnMobile("https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p={{$row['OtherData1']}}&u={{$row['wUnitIdx']}}&q=HD", "{{config_item('starplayer_license')}}");' class="btnst02">HIGH ></a>
                        <a href='javascript:fnMobile("https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p={{$row['OtherData1']}}&u={{$row['wUnitIdx']}}&q=SD", "{{config_item('starplayer_license')}}");' class="btnst03">LOW ></a>
                    </li>
                    @php $i += 1; @endphp
                @endforeach
            @else
                <li><a href="#none">1강 맛보기<br> 수강 준비중 ></a></li>
                <li><a href="#none">2강 맛보기<br> 수강 준비중 ></a></li>
            @endif
        </ul>

        <div class="evt06Txt02">
            * 동영상 수강을 위해서는 스타플레이어 설치 후 재생하셔야 합니다.<br>
            * 스타플레이어 미설치 경우 맛보기 수강버튼 클릭시 설치 메시지가 팝업으로 뜹니다.<br>
            * 팝업 확인이 안 될 경우 팝업 해제 후 다시 진행하시면 됩니다.
        </div>
        
        <div class="curriculum">              
            <dl>
                <dt>CHAPTER 1</dt>
                <dd>1강 책은 성공한 사람이 아닌, 성공을 꿈꾸는 사람이 쓰는 것이다<br>
                - 왜 책을 쓰려고 하는가? 책은 어떤 사람이 쓰는가?</dd>
                <dd>2강 나같이 평범한 사람도 책을 쓸 수 있을까? - 사례 1</dd>
                <dd>3강 나같이 평범한 사람도 책을 쓸 수 있을까? - 사례 2</dd>
                <dd>4강 나같이 평범한 사람도 책을 쓸 수 있을까? - 사례 3</dd>

                <dt>CHAPTER 2</dt>
                <dd>5강 이런 책들은 누가, 그리고 어떤 사람이 쓸까요? - 사례 1<br>
                - 전문가가 아니어도 책은 쓸 수 있다</dd>
                <dd>6강 이런 책들은 누가, 그리고 어떤 사람이 쓸까요? - 사례 2<br>
                - 우리의 상식으로는 도저히 납득할 수 없는 상식을 뒤집는 책</dd>
                <dd>7강 이런 책들은 누가, 그리고 어떤 사람이 쓸까요? - 사례 3<br>
                - 유대인의 생각하는 힘<br>
                - 스피치의 매력에 빠지다<br>
                - 한권으로 정리하는 4차 산업혁명<br>
                - 나는 스타벅스보다 작은 카페가 좋다<br>
                - 톡!톡!톡! 생각을 디자인하라<br>
                - 내 아이를 위한 칼 비테 교육법<br>
                - 공부머리 독서법</dd>

                <dt>CHAPTER 3</dt>
                <dd>8강 나만의 콘셉트를 잡기 / "나"는 누구인가? 사례 1<br>
                - 대기업 교육 담당 경험으로 커뮤니케이션 코칭<br>
                - 독서를 통해 쌓은 지식을 토대로 속독법이나 독서법 코칭</dd>
                <dd>9강 "나"는 누구인가? 사례 2<br>
                - 꽃을 매개로 바쁘고 지친 사람들의 마음에 힐링을 주는 에세이<br>
                - 누구나 쉽게 갈 수 있는 세계여행<br>
                - 왜 실패했는지에 대한 경험을 토대로 비즈니스 성공학<br>
                - 작은 회사 200% 매출 올리는 노하우 비법<br>
                - 스마트스토어 마케팅<br>
                - 미래4차 산업을 어떻게 대처할 것인가?<br>
                - 학교를 떠나 성공한 자들의 비결</dd>

                <dt>CHAPTER 4</dt>
                <dd>10강 기획부터 출간까지, 책쓰기에 필요한 9가지<br>
                - 책은 어떻게 쓰는가?<br>
                - 책은 어떻게 만들어지는가?<br>
                - 13가지 출판의 흐름 분석하기</dd>

                <dt>CHAPTER 5</dt>
                <dd>11강 베스트셀러는 어떻게 만들어지는가?<br>
                - 베스트셀러가 되는 5가지 요소</dd>

                <dt>CHAPTER 6</dt>
                <dd>12강 책은 제목이 팔 할이다 - 좋은 제목 사례 1</dd>
                <dd>13강 책은 제목이 팔 할이다 - 좋은 제목 사례 2</dd>
                <dd>14강 책은 제목이 팔 할이다 - 제목 실패 사례</dd>

                <dt>CHAPTER 7</dt>
                <dd>15강 제목의 짝꿍인 카피, "나도 너만큼 중요해" - 카피의 중요성 1</dd>
                <dd>16강 제목의 짝꿍인 카피, "나도 너만큼 중요해" - 카피의 중요성 2</dd>

                <dt>CHAPTER 8</dt>
                <dd>17강 제목을 200% 상승시켜주는 표지 정하기</dd>
                <dd>18강 책 제목의 중요성<br>
                - 제목 깎아 먹는 표지 사례<br>
                - 내가 만약 표지를 선택한다면?<br>
                - 제목을 200% 상승시켜주는 표지<br>
                - 제목 깎아 먹는 제목<br>
                - 표지를 200% 상승시켜주는 제목</dd>

                <dt>CHAPTER 9</dt>
                <dd>19강 제목은 모든 문장의 첫 번째 줄이다!</dd>
                <dd>20강 가장 이상적인 제목의 글자 수는?</dd>
                <dd>21강 출판사 계약을 성공시킨 작은 성공체험</dd>

                <dt>CHAPTER 10</dt>
                <dd>22강 독자의 시선을 사로잡는 제목 만들기<br>
                - 제목은 모든 문장의 첫 번째 줄이다<br>
                - 마음을 담은 제목 한 줄이 상대의 욕구를 자극한다<br>
                - 출판사에 계약을 성사시킨 작은 성공체험</dd>
                <dd>23강 제목 만들기 실전 연습 1</dd>
                <dd>24강 제목 만들기 실전 연습 2</dd>

                <dt>CHAPTER 11</dt>
                <dd>25강 '대박' 제목 만들기 6가지 법칙 1<br>
                - 무엇이 이익인지 확실하게 알려주어야 한다<br>
                - 지금이 기회라는 강조와 중요한 일임을 인식시켜야한다<br>
                - 내용이 궁금해서 참을 수 없게 만든다.<br>
                - ‘왜?’라는 의문이 들게 해야 한다 </dd>
                <dd>26강 '대박' 제목 만들기 6가지 법칙 2<br>
                - ‘설마, 그게 가능해?’하는 흥미를 유발시켜야 한다. <br>
                - ‘왜 읽어야 하는가?’ 읽어야할 이유를 확실하게 알려야 한다.<br>
                - 독자의 마음을 위로하고 대변해주는 표현을 한다.</dd>
                <dd>27강 제목을 지을때 꼭 알아야 할 금기 사항</dd>

                <dt>CHAPTER 12</dt>
                <dd>28강 목차 만들기 실전 연습 1</dd>
                <dd>29강 목차 만들기 실전 연습 2</dd>
                <dd>30강 목차 만들기 실전 연습 3</dd>

                <dt>CHAPTER 13</dt>
                <dd>31강 책을 쓰려면 어떤 것 부터 준비해야 하나요?<br>
                - 나만의 콘셉 잡기<br>
                - 나의 언어로 고쳐쓰기<br>
                - 진짜 나의 이야기로 표현하는 전문적인 책쓰기<br>
                <dd>32강 책쓰기, 어떻게 해야 하나요? 실전 연습 1</dd>
                <dd>33강 책쓰기, 어떻게 해야 하나요? 실전 연습 2</dd>

                <dt>CHAPTER 14</dt>
                <dd>34강 출판권 설정 계약은 어떻게 해야 하나요<br>
                - 출판권 및 전송 이용권의 유효기간과 갱신 및 재고도서의 배포 <br>
                - 비용의 부담<br>
                - 출판에 따른 저작권 사용료  ‘인세’ 등</dd>

                <dt>CHAPTER 15</dt>
                <dd>35강 종강 : 당신의 삶이 책이 되는 양원근의 강의를 마치며</dd>
            </dl>
        </div>
    </div>

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1722m_08.jpg" alt="" >
        <div>소문내기 이벤트는 PC버전에서 참여 가능합니다.</div>
        <div class="btn NSK-Black"><a href="https://njob.willbes.net/promotion/index/cate/3114/code/1722" target="_blank">소문내기 이벤트 참여하기 ></a></div>       
    </div>  

    <div class="evtCtnsBox evtFooter" id="infoText">
        <h3 class="NSK-Black">[이용안내]</h3>
        <p># 사전예약 혜택</p>
        <ul>
            <li>사전예약 혜택은 8월 6일까지 결제완료자에 한해서만 적용됩니다.</li>
            <li>사전예약 혜택은 수강료 10% 할인입니다.<br>
                수강기간 추가 혜택은 강의 시작(8월 10일) 이후 일괄적으로 적용 예정입니다.
            </li>
        </ul>

        <p># 소문내기 이벤트</p>
        <ul>
            <li>당첨바료시 동일인으로 확인 될 경우 강의 제공은 한 개의 아이디만 당첨으로 인정합니다.</li>
            <li>당첨자 발표는 8월 10일(월) 공지사항을 참고하시면 됩니다.</li>
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
            location.href = 'https://njob.willbes.net/lecture/show/cate/3114/pattern/only/prod-code/169144';
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