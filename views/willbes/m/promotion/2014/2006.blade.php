@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtTop {position:relative}

    .evt01 {position:relative;}
    .video-container-box {position:absolute; bottom:10%; left:50%; width:100%; margin-left:-50%; z-index:1}
    .video-container {position:relative; padding-bottom:56.25%; padding-top:0; height:0; overflow: hidden;}
    .video-container iframe {position:absolute; top:0; left:50%; width:90%; margin-left:-45%; height:95%;}

    .evt02 a {position: absolute; left: 22.36%; top: 86.23%; width: 55.83%; height: 3.61%; z-index: 2;}

    .evt06 a {position: absolute; left: 3.89%; top: 82.69%; width: 91.25%; height: 9.81%; z-index: 2;}

    .evtCurri {text-align:left; padding:20px;word-break: keep-all; background:#f5f5f5}
    .evtCurri h5 {color:#414d4c; font-size:2.2rem; line-height:1; margin-bottom:20px; letter-spacing:-1px;}
    .evtCurri .evtCurriTxt01 {font-size:1.6rem;line-height:1;}
    .evtCurri .sample {margin-top:50px}
    .evtCurri .sample li {display:inline; float:left; width:49%; padding:15px 0; margin-right:1%; margin-bottom:10px; border-radius:10px; 
        background: #acacac; color:#fff; font-size:16px; font-weight:600; text-align:center}
    .evtCurri .sample li p {margin-bottom:15px;}
    .evtCurri .sample li a {display:inline-block; padding:5px 10px; font-size:14px; margin:0 2px 5px; border-radius:4px; background:#000; color:#fff;}
    .evtCurri .sample li a:hover {background:#fff; color:#000}
    .evtCurri .sample li:last-child {margin:0}
    .evtCurri .sample:after {content:""; display:block; clear:both}
    .evtCurri .curriculum {margin:30px 0}
    .evtCurri .curriculum li.cTitle {list-style:none;color:#414d4c; font-size:28px; margin:50px 0 30px; font-family: "Noto Sans KR Black", "Noto Sans KR", "sans-serif" !important;} 
    .evtCurri dl {margin-top:30px;}
    .evtCurri dl:first-child {margin:0}
    .evtCurri dt {font-size:16px; font-weight:900; color:#414d4c; margin:30px 0 10px}
    .evtCurri dt:first-child {margin:0 0 10px}
    .evtCurri dd {margin-bottom:10px; line-height:1.4}    

    .evtCurri .evtCurriTxt02 {font-size:14px; line-height:1.4; letter-spacing:-1px; color:#333; margin:20px auto 0; text-align:left}

    .evtFooter {margin:80px auto 0; padding:30px 20px; text-align:left; color:#3a3a3a; background:#E1E1E1; font-size:0.875rem; line-height:1.4 }
    .evtFooter h3 {font-size:1.5rem; margin-bottom:30px; color:#000}
    .evtFooter p {margin-bottom:10px; color:#333; font-size:1.2rem;}
    .evtFooter div,
    .evtFooter ul {margin-bottom:30px; padding-left:10px}
    .evtFooter li {margin-left:20px; list-style-type: decimal; margin-bottom:10px}

    .btnbuyBox {width:100%; position:fixed; bottom:0; text-align:center; background:rgba(255,255,255,0.5); padding-top:10px}
    .btnbuy a {display:block; width:94%; max-width:700px; margin:0 auto; font-size:1.5rem; background:#000; color:#fff; padding:15px 0; text-align:center; border-radius:10px; line-height:1.4}
    .btnbuy a span {font-size:1.2rem;}
    .btnbuy a:hover {background:#3a99f0;
        -webkit-animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
    }
    .infoCheck {width:100%; max-width:720px; margin:10px auto; font-size:12px;}
    .infoCheck label {margin-right:30px; cursor: pointer; }
    .infoCheck input[type=checkbox] {width:20px; height:20px; margin-right:10px}
    .infoCheck input[type=checkbox]:checked + label {border-bottom:1px dashed #0099ff; font-weight:bold; color:#0099ff} 
    .infoCheck a {display:inline-block; background:#333; color:#fff; height:30px; line-height:30px; text-align:center; padding:0 20px; border-radius:20px}
    .infoCheck a:hover {background:#0099ff;}

    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px) {

    }

    @@media only screen and (min-width: 375px) and (max-width: 640px) {

    }
    /* 태블릿 세로 */
    @@media only screen and (min-width: 690px) {
        .evtCurri h5 br {display:none}
        .evtCurri .curriculum {column-count: 2; column-gap:40px; column-rule:1px solid #e4e4e4}
    }

</style>

<div id="Container" class="Container NSK c_both">            
    <div class="evtCtnsBox evtTop">
        <img src="https://static.willbes.net/public/images/promotion/2021/01/2006m_top.jpg" alt="억대연봉 세일즈마케팅" usemap="#Map1968B" border="0" >
        <map name="Map1968B">
            <area shape="rect" coords="93,640,631,774" href="#lecBuy" alt="수강신청">
        </map>
    </div> 
    
    <div class="evtCtnsBox evt01">
        <img src="https://static.willbes.net/public/images/promotion/2021/01/2006m_01.jpg" alt="안은재 대표">
        <div class="video-container-box">
            <div class="video-container">
                <iframe src="https://www.youtube.com/embed/dPrn9DS8Ci8?rel=0" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div> 
    
    <div class="evtCtnsBox evt02">
        <img src="https://static.willbes.net/public/images/promotion/2021/01/2006m_02.jpg" alt="역대급 세일즈마케팅 강의" > 
        <a href="https://njob.willbes.net/m/lecture/show/cate/3114/pattern/only/prod-code/178634" target="_blank" title="사전예약"></a>
    </div>    

    <div class="evtCtnsBox evt03">
        <img src="https://static.willbes.net/public/images/promotion/2021/01/2006m_03.jpg" alt="미치도록 팔고 싶다." >
    </div> 

    <div class="evtCtnsBox evt04">
        <img src="https://static.willbes.net/public/images/promotion/2021/01/2006m_04.jpg" alt="세일즈" >
    </div>

    <div class="evtCtnsBox evt05">
        <img src="https://static.willbes.net/public/images/promotion/2021/01/2006m_05.jpg" alt="받드시 해내고야 말겠어" >
    </div>  

    {{--
    <div class="evtCtnsBox evtCurri">
        <h5 class="NSK-Black">
            <div>억대연봉 세일즈 마케팅</div>
        </h5>
        <div class="evtCurriTxt01 NSK-Thin">우리가 배울 수 있는 과정은?</div>
        <ul class="sample">
            @if(empty($arr_base['promotion_otherinfo_data']) === false)
                @php $i = 1; @endphp
                @foreach($arr_base['promotion_otherinfo_data'] as $row)
                    <li>
                        <p>{{$i}}강 맛보기 수강 ▼</p>
                        <a href='javascript:fnMobile("https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p={{$row['OtherData1']}}&u={{$row['wUnitIdx']}}&q=HD", "{{config_item('starplayer_license')}}");'>고해상도 ></a>
                        <a href='javascript:fnMobile("https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p={{$row['OtherData1']}}&u={{$row['wUnitIdx']}}&q=SD", "{{config_item('starplayer_license')}}");'>저해상도 ></a>
                    </li>
                    @php $i += 1; @endphp
                @endforeach
            @else
                <li><a href="#none">1강 맛보기 수강 준비중 ></a></li>
                <li><a href="#none">4강 맛보기 수강 준비중 ></a></li>
            @endif
        </ul>

        <div class="evt05Txt02">
            * 동영상 수강을 위해서는 스타플레이어 설치 후 재생하셔야 합니다.<br>
            * 스타플레이어 미설치 경우 맛보기 수강버튼 클릭시 설치 메시지가 팝업으로 뜹니다.<br>
            * 팝업 확인이 안 될 경우 팝업 해제 후 다시 진행하시면 됩니다.
        </div>

        <div class="curriculum">
            <dl>
                <dt>CH 1. 루루라탄의 라탄공예 입문</dt> 
                <dd>1. 안녕하세요, 루루라탄입니다.</dd>
                <dd>2. 라탄(등공예)란 무엇인가?</dd>
                <dd>3. 취미로 시작한 라탄, 새로운 기회가 될 수 있을까요?</dd>

                <dt>CH 2. 라탄공예, 그 위대한 첫 발</dt>
                <dd>1. 라탄 재료에 대한 종류와 이해</dd>
                <dd>2. 공예를 시작할 때 필요한 준비물</dd>
                <dd>3. 라탄 관련 용어 및 재료의 사용법</dd>
                <dd>4. 환심 물에 담그는 방법</dd>
                <dd>5. 환심 보관하는 방법</dd>
                <dd>6. 환심 부러졌을 때, 사릿대 이어서 엮는 방법</dd>

                <dt>CH 3. 다용도 원형 바구니</dt>
                <dd>1. 자작나무 플레이트에 라탄 환심 끼우기</dd>
                <dd>2. 사릿대 1줄로 막엮기<dd>
                <dd>3. 상•하 기본 엮어 마무르기<dd>

                <dt>CH 4. 기본 티코스터, 응용 티코스터</dt>
                <dd>1. 원형의 기본 +자짜기를 이용한 시작</dd>
                <dd>2. 날대를 균일하게 나눠주는 방법</dd>
                <dd>3. 막엮기를 이용한 엮음</dd>
                <dd>4. 2줄꼬아엮기</dd>
                <dd>5. 엮어마무르기<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - BONUS, 티코스터 업그레이드 하기<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 기본티코스터 3번까지 엮은 후 덧날대 추가하여 엮기
                </dd>

                <dt>CH 5. 회오리 티코스터</dt>
                <dd>1. 井(우물정)자짜기를 이용해 원형 바닥 짜기</dd>
                <dd>2. 날대 수를 이용한 회오리기법</dd>
                <dd>3. 젖혀마무르기 변형으로 마무리하기</dd>

                <dt>CH 6. 타원트레이</dt>
                <dd>1. 자작나무 플레이트에 라탄 환심 끼우기</dd>
                <dd>2. 사릿대 2줄로 따라 엮기</dd>
                <dd>3. 3줄 꼬아 엮기 2단하기</dd>
                <dd>4. 두 번 젖혀 마무르기<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - tip. 한 번 젖혀 마무르기
                </dd>

                <dt>CH 7. 타원바구니</dt>
                <dd>1. 井자짜기 변형을 이용한 타원 바닥 짜기</dd>
                <dd>2. 매끼돌리기와 따라 엮기를 이용한 바닥 엮기</dd>
                <dd>3. 덧날대 추가 후 3줄 꼬아 엮기</dd>
                <dd>4. 3줄 꼬아 엮기 3단 하기</dd>
                <dd>5. 따라 엮기와 되돌아엮기로 측면 올리기</dd>
                <dd>6. 비단무늬 1/2 넣기</dd>
                <dd>7. 2줄 꼬아 엮기 정방향과 역방향 엮어 주기</dd>
                <dd>8. 감아 마무르기</dd>

                <dt>CH 8. 라탄 물병</dt>
                <dd>1. 물병 혹은 화병에 라탄 엮는 기법</dd>
                <dd>2. 2줄 꼬아엮기로 고정하기</dd>
                <dd>3. 막엮기 혹은 따라엮기를 3.5cm 엮기</dd>
                <dd>4. 비단무늬 1/2 넣기</dd>
                <dd>5. 막엮기 혹은 따라엮기를 3.5cm 엮기</dd>
                <dd>6. 2줄 꼬아 엮기 1단 하기</dd>
                <dd>7. 엮어마무르기 변형으로 위, 아래 마무리</dd>

                <dt>CH 9. 라탄 공예 재료 구입 방법 및 응용</dt>
                <dd>1. 라탄 재료 구입 방법과 좋은 재료 구별법 tip</dd>
                <dd>2. 배운 기법을 응용하여 만들 수 있는 작품들 tip</dd>

                <dt>CH 10. 드디어 완강! 수고하셨습니다.</dt>
                <dd>1. 여러분의 라탄 입문을 축하합니다!</dd>
            </dl>
        </div>
    </div>
    --}}
    
    <div class="evtCtnsBox evt06">
        <img src="https://static.willbes.net/public/images/promotion/2021/01/2006m_06.jpg" alt="소문내기" >
        <a href="https://njob.willbes.net/promotion/index/cate/3114/code/2006#evt02" title="이벤트참여"></a>
    </div>  

    <div class="evtCtnsBox" id="infoText">
        <div class="evtFooter">
            <h3 class="NSK-Black">[이용안내]</h3>

            <p># 사전예약 혜택</p>
            <ul>
                <li>사전예약 혜택은 2021년 2월 15일 결제완료자에 한해서만 적용됩니다.</li>
                <li>사전예약 혜택은 수강기간 1개월이 무료 제공됩니다.<br>
                    수강기간 추가 혜택은 3월 3일 일괄 적용예정
                </li>  
            </ul>

            <p># 소문내기 이벤트</p>
            <ul>
                <li>발표 시 동일인으로 확인 될 경우 강의 제공은 한 개의 아이디만 당첨으로 인정합니다.</li>
                <li>당첨자 발표는 2021년 3월 3일(수) 공지사항 참조</li>
            </ul>

            <p>※ 문의안내 : 1544-5006</p>
        </div>    
    </div> 
</div> 
<!-- End Container -->

<div class="btnbuyBox">
    <div class="btnbuy NSK-Black">     
        <a href="javascript:goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'on_lecture', 'Y');" onMouseDown="javascript:_PL('{{'https:'.front_url('/promotion/index/cate/3114/code/'.$data['PromotionCode'].'/order/Y')}}');">
        [온라인강의] 신청하기 >
        </a>
    </div>
    <div id="pass" class="infoCheck">
        <input type="checkbox" name="y_pkg" value="178634" style="display: none;" checked/>
        <input type="checkbox" id="is_chk" name="is_chk"><label for="is_chk">페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다. </label>
        <a href="#infoText">이용안내 확인하기 ↓</a>
    </div>
</div>

<script src="/public/vendor/starplayer/js/starplayer_app.js"></script>
<script type="text/javascript">
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

<!-- AceCounter Log Gathering Script V.8.0.AMZ2019080601 -->
<script language='javascript'>
    var _AceGID=(function(){var Inf=['gtp14.acecounter.com','8080','AH1A44052179653','AW','0','NaPm,Ncisy','ALL','0']; var _CI=(!_AceGID)?[]:_AceGID.val;var _N=0;var _T=new Image(0,0);if(_CI.join('.').indexOf(Inf[3])<0){ _T.src ="https://"+ Inf[0] +'/?cookie'; _CI.push(Inf);  _N=_CI.length; } return {o: _N,val:_CI}; })();
    var _AceCounter=(function(){var G=_AceGID;var _sc=document.createElement('script');var _sm=document.getElementsByTagName('script')[0];if(G.o!=0){var _A=G.val[G.o-1];var _G=(_A[0]).substr(0,_A[0].indexOf('.'));var _C=(_A[7]!='0')?(_A[2]):_A[3];var _U=(_A[5]).replace(/\,/g,'_');_sc.src='https:'+'//cr.acecounter.com/Web/AceCounter_'+_C+'.js?gc='+_A[2]+'&py='+_A[4]+'&gd='+_G+'&gp='+_A[1]+'&up='+_U+'&rd='+(new Date().getTime());_sm.parentNode.insertBefore(_sc,_sm);return _sc.src;}})();
</script>
<noscript><img src='https://gtp14.acecounter.com:8080/?uid=AH1A44052179653&je=n&' border='0' width='0' height='0' alt=''></noscript>
<!-- AceCounter Log Gathering Script End -->

@stop