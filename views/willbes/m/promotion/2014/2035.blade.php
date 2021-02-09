@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtTop {position:relative}

    .evt01 {position:relative;}
    .video-container {position:relative; padding-bottom:56.25%; padding-top:0; height:0; overflow: hidden;}
    .video-container iframe {position:absolute; top:0; left:0; width:100%; height:100%;}

    .evt02 a {position: absolute; left: 22.36%; top: 86.23%; width: 55.83%; height: 3.61%; z-index: 2;}

    .evt06 a {position: absolute; left: 3.89%; top: 82.69%; width: 91.25%; height: 9.81%; z-index: 2;}

    .evtCurri {text-align:left; padding:50px 20px; word-break: keep-all; background:#f5f5f5}
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

    .evtFooter {margin:0 auto; padding:30px 20px; text-align:left; color:#3a3a3a; background:#E1E1E1; font-size:0.875rem; line-height:1.4 }
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
        <img src="https://static.willbes.net/public/images/promotion/2021/01/2035m_top.jpg" alt="창업&마케팅" >
    </div> 
    
    <div class="evtCtnsBox evt01">
        <img src="https://static.willbes.net/public/images/promotion/2021/01/2035_01.jpg" alt="1% 전문가만 살아남는 쇼핑몰" >  
    </div> 
    
    <div class="evtCtnsBox evt02">
        <img src="https://static.willbes.net/public/images/promotion/2021/01/2035_02_01.jpg" alt="마케팅 1% 전문가 권혁중" >
        <div class="video-container">
            <iframe src="https://www.youtube.com/embed/W2nDOfP913A?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>   
        <img src="https://static.willbes.net/public/images/promotion/2021/01/2035_02_02.jpg" alt="" >  
    </div>    

    <div class="evtCtnsBox evt03">
        <img src="https://static.willbes.net/public/images/promotion/2021/01/2035_03.jpg" alt="권혁중은 다르다 1" >
    </div> 

    <div class="evtCtnsBox evt04">
        <img src="https://static.willbes.net/public/images/promotion/2021/01/2035_04.jpg" alt="권혁중은 다르다 2" >
    </div>

    <div class="evtCtnsBox evt05">
        <img src="https://static.willbes.net/public/images/promotion/2021/01/2035_05.jpg" alt="권혁중은 다르다" >
    </div>   
    
    <div class="evtCtnsBox evt06" id="evt06">
        <img src="https://static.willbes.net/public/images/promotion/2021/01/2035m_06.jpg" alt="온라인 쇼핑몰이 지금 대세" >
    </div> 

    <div class="evtCtnsBox evtCurri">
        <h5 class="NSK-Black">
            <div>실전 쇼핑몰 창업&마케팅 : </div>
            <div>실전 마케팅을 통한 쇼핑몰 매출 상승 비법</div>
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
                <dt>CH1. INTRO</dt>
                <dd>1강. 쇼핑몰을 창업하는데 너무나 부정확한 정보들이 넘쳐나요? 믿을 수가 없어요?<br>
                - 이 강의가 필요한 이유와 특별한 이유
                <dd>2강. 쇼핑몰 exit 은 무엇이 있을까요?<br>
                - 쇼핑몰 성공 사례와 그 이유</dd>

                <dt>CH2. 쇼핑몰 기초 쌓기</dt>
                <dd>3강. 전자상거래업으로 돈버는 방법을 알려주세요.<br>
                - 전자상거래 비즈니스 모델</dd>
                <dd>4강. 자사몰(카페24)과 스마트스토어, 오픈마켓의 차이점 및 장단점을 알고 싶어요.</dd>
                <dd>5강. 전체적인 쇼핑몰 창업 순서를 알고 싶어요.</dd>

                <dt>CH3. 쇼핑몰 기초 마케팅</dt>
                <dd>6강. 아이템 선택할 때 도움이 되는 툴을 알려주세요.<br>
                - 네이버 빅데이터를 활용하는 방법</dd>
                <dd>7강. 쇼핑몰 컨셉을 정하는 방법을 알려주세요.</dd>
                <dd>8강. 쇼핑몰 SWOT 전략은 무엇인가요?</dd>
                <dd>9강. 쇼핑몰 이름과 사업자 이름과 같아야 하나요?</dd>
                <dd>10강. 도메인을 확보하고 등록하는 방법은요? - .COM 과 .CO.KR 의 차이점</dd>

                <dt>CH4. 쇼핑몰 기초 세무</dt>
                <dd>11강. 사업자등록 기준은 무엇인가요?<br>
                - 스마트스토어의 개인셀러가 가능한 이유를 설명해주세요.</dd>
                <dd>12강. 부가가치세는 무엇인가요? 사례로 설명해 주세요.</dd>
                <dd>13강. 사업자가 알아야 할 세무 캘린더를 알려주세요. (1인 개인사업자 경우)</dd>
                <dd>14강. 건강보험료가 많이 나왔어요. 어떻게 처리해야 하나요?</dd>
                <dd>15강. 통신판매업신고는 어디서 하나요? 비용은요?</dd>
                <dd>16강. 정부 창업자금을 받을 수 있을까요?</dd>

                <dt>CH5. 무료 카페24 쇼핑몰 구축하기</dt>
                <dd>17강. 카페24 무료 쇼핑몰 가입하는 방법은 어떻게 되나요?</dd>
                <dd>18강. 쇼핑몰 메인 디자인은 무엇인가요?</dd>
                <dd>19강. 카테고리 만드는 방법은 어떻게 되나요?</dd>                
                <dd>20강. 상품 등록하는 방법을 알려 주세요</dd>
                <dd>21강. AI를 활용해서 3분만에 상세페이지 디자인을 만드는 방법을 알려주세요.</dd>
                <dd>22강. 나도 색깔 옵션, 사이즈 옵션을 주고 싶어요. 방법은요?</dd>
                <dd>23강. 무료로 메인 사진, 메인 배너를 만드는 방법을 알려주세요.</dd>
                <dd>24강. 카페24에서 SEO 세팅은 어떻게 하나요?</dd>
                <dd>25강. 어떤 PG사 들이 존재하나요? 나에게 유리한 PG사 선택 방법을 알려주세요</dd>

                <dt>CH6. 실전 온라인 마케팅</dt>
                <dd>26강. 네이버 검색광고를 설정하는 방법을 알려주세요.</dd>
                <dd>27강. 블로그 마케팅을 알려주세요.</dd>
                <dd>28강. 네이버 포스트, 모두 설정 방법을 알려주세요.</dd>
                <dd>29강. 네이버 사이트등록 방법을 알려주세요.</dd>
                <dd>30강. 구글 애드센스 광고수익을 내는 방법을 알려주세요.</dd>
                <dd>31강. 페이스북 마케팅 – 타겟 설정을 알려주세요.</dd>
                <dd>32강. 페이스북 마케팅 – 소재 세팅을 알려주세요.</dd>
                <dd>33강. 소비자 구매의사결정과정을 알려주세요.</dd>
                <dd>34강. 쇼핑몰 마케팅 12가지 법칙 중 1법칙과 6법칙을 알려주세요.</dd>
                <dd>35강. 쇼핑몰 마케팅 12가지 법칙 중 7법칙과 12법칙을 알려주세요.</dd>
                <dd>36강. 쇼핑몰 고객응대 CS 매뉴얼을 알려주세요.</dd>
            </dl>
        </div>
    </div> 
  

    <div class="evtCtnsBox" id="infoText">
        <div class="evtFooter">
            <h3 class="NSK-Black">[이용안내]</h3>

            <p># 사전예약 혜택</p>
            <ul>
                <li>사전예약 혜택은 2월 15일까지 결제완료자에 한해서만 적용됩니다.</li>
                <li>사전예약 혜택은 강의료 40% 할인입니다.</li>
                <li>강의 시작일은 2월 15일 예정이오나, 일정에 따라 변경 될 수 있으니 참고 부탁 드립니다.</li>  
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
        <input type="checkbox" name="y_pkg" value="178676" style="display: none;" checked/>
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