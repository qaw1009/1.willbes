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
        <img src="https://static.willbes.net/public/images/promotion/2021/01/2024m_top.jpg" alt="창업&마케팅" >
        <div class="video-container">
            <iframe src="https://www.youtube.com/embed/7znMVhk8p9g?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>   
    </div> 
    
    <div class="evtCtnsBox evt01">
        <img src="https://static.willbes.net/public/images/promotion/2021/01/2024m_01.jpg" alt="1% 전문가만 살아남는 쇼핑몰" >        
        <a href="https://njob.willbes.net/m/lecture/show/cate/3114/pattern/only/prod-code/178677" title="사전예약 신청하기" target="_blank" style="position: absolute; left: 16.02%; top: 79.69%; width: 66.54%; height: 5.79%; z-index: 2;"></a>
    </div> 
    
    <div class="evtCtnsBox evt02">
        <img src="https://static.willbes.net/public/images/promotion/2021/01/2024m_02.jpg" alt="마케팅 1% 전문가 권혁중" >
    </div>    

    <div class="evtCtnsBox evt03">
        <img src="https://static.willbes.net/public/images/promotion/2021/01/2024m_03.jpg" alt="권혁중은 다르다 1" >
    </div> 

    <div class="evtCtnsBox evt04">
        <img src="https://static.willbes.net/public/images/promotion/2021/01/2024m_04.jpg" alt="권혁중은 다르다 2" >
    </div>

    <div class="evtCtnsBox evt05">
        <img src="https://static.willbes.net/public/images/promotion/2021/01/2024m_05.jpg" alt="권혁중은 다르다" >
    </div>     

    <div class="evtCtnsBox evtCurri">
        <h5 class="NSK-Black">
            <div>유통MD로 성공하는법</div>
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
                <li><a href="#none">2강 맛보기 수강 준비중 ></a></li>
            @endif
        </ul>

        <div class="evt05Txt02">
            * 동영상 수강을 위해서는 스타플레이어 설치 후 재생하셔야 합니다.<br>
            * 스타플레이어 미설치 경우 맛보기 수강버튼 클릭시 설치 메시지가 팝업으로 뜹니다.<br>
            * 팝업 확인이 안 될 경우 팝업 해제 후 다시 진행하시면 됩니다.
        </div>

        <div class="curriculum">
            <dl>
                <dt>INTRO - 사업가의 자세</dt>
                <dd>1강 사업과 장사의 차이</dd>
                <dd>2강 사업 성공 공식</dd>
                <dd>3강 실패를 통해 배운 성공 프로세스</dd>
                <dd>4강 온라인 사업 필수 지표</dd>

                <dt>Chapter1. 온라인 사업시스템 구축</dt>
                <dd>5강 0원부터 시작하는 사업 프로세스</dd>
                <dd>6강 사업자 만들기</dd>
                <dd>7강 온라인 스토어 만들기</dd>
                <dd>8강 도매 사이트 소개</dd>
                <dd>9강 온라인 사업에 도움되는 필수 사이트</dd>
                <dd>10강 업무 최적화의 필요성</dd>
                <dd>11강 오피스 최적화</dd>
                <dd>12강 네이버 최적화</dd>
                <dd>13강 데이터 최적화</dd>
                <dd>14강 업무도구 최적화</dd>
                <dd>15강 사업에 도움되는 업무 메뉴얼</dd>

                <dt>Chapter 2. 도전 유통MD 누구나 쉬운 상품 소싱</dt>
                <dd>16강 만족도가 높은 물건팔기</dd>
                <dd>17강 주변에서 상품 소싱하기</dd>
                <dd>18강 데이터로 리스크 없애기</dd>
                <dd>19강 소싱리스트 만들기</dd>
                <dd>20강 도매업체 찾는법</dd>
                <dd>21강 제조업체 찾는법</dd>
                <dd>22강 제품수입 하는법</dd>

                <dt>Chapter 3. 무조건 팔리는 판매기법 - GODSR마케팅 (이론편)</dt>
                <dd>23강 준비물</dd>
                <dd>24강 GROUNDBAIT</dd>
                <dd>25강 OPENING</dd>
                <dd>26강 DESIRE</dd>
                <dd>27강 SOLUTION</dd>
                <dd>28강 RECOMMEND</dd>

                <dt>Chapter 4. 무조건 팔리는 판매기법(실습편)</dt>
                <dd>29강 사진촬영</dd>
                <dd>30강 경쟁사 및 소비자니즈 분석</dd>
                <dd>31강 몰입 및 호기심 불러 일으키기</dd>
                <dd>32강 고객의 니즈 환기</dd>
                <dd>33강 상품소개</dd>
                <dd>34강 추천상품</dd>

                <dt>Chapter 5. 이제부터 실전이다!</dt>
                <dd>35강 네이버 로직 이해하기</dd>
                <dd>36강 스마트스토어 상품등록</dd>
                <dd>37강 지표 분석</dd>

                <dt>Chapter 6. 리스크 없는 제품판매</dt>
                <dd>38강 제품테스트</dd>
                <dd>39강 리뷰 이벤트</dd>
                <dd>40강 체험단 모집</dd>

                <dt>Chapter 7. 당신의 날개를 펼칠 때</dt>
                <dd>41강 채널확장</dd>
                <dd>42강 검색광고</dd>
                <dd>43강 인플루언서</dd>
                <dd>44강 캔버시</dd>
                <dd>45강 정책자금 이용</dd>

                <dt>OUTTRO - 마치는 인사</dt>
            </dl>
        </div>
    </div> 
  

    <div class="evtCtnsBox" id="infoText">
        <div class="evtFooter">
            <h3 class="NSK-Black">[이용안내]</h3>

            <p># 수강안내</p>
            <ul>
                <li>강좌의 표기된 수강기간 동안 동영상 강좌를 무제한 수강 할 수 있습니다. (내강의실 > '수강 중 강좌'에서 확인 가능)</li>
                <li>PC/휴대폰/태블릿에서 언제든 수강가능합니다.</li>
                <li>커리큘럼은 사정에 따라 일부 변동될 수 있으며, 강의 콘텐츠는 순차적으로 제공될 수 있습니다.</li>
                <li>동영상 수강을 위해서는 스타플레이어 설치 후 재생하셔야 합니다.</li>
                <li>스타플레이어 미설치 경우 맛보기 수강버튼 클릭시 설치 메시지가 팝업으로 뜹니다.</li>
                <li>팝업 확인이 안 될 경우 팝업 해제 후 다시 진행하시면 됩니다.</li>
                <li>결제 완료 시 강의는 즉시 수강 시작되오니, 이 점 참고 부탁 드립니다.</li>
                <li>수강상품 이용기간 일시정지, 재수강은 불가능합니다.</li> 
            </ul>                      

            <p># 환불안내</p>
            <ul>
                <li>이용안내 및 환불 특약으로 안내된 별도 환불 기준이 있는 경우 우선 적용합니다.</li>
                <li>강의재생시간에 관계없이 강의를 재생한 경우, 학습 자료 및 모바일 다운로드 이용한 경우 수강한 것으로 간주합니다.(맛보기 강의 제외)</li>
                <li>강좌비*에서 기수강 강의수에 대한 금액* 및 위약금을 차감 후 부분 환불이 진행됩니다.<br>
                * 강좌비: 결제금액에서 서비스프로그램 등 추가 혜택에 해당하는 금액을 차감한 순수강좌비<br>
                * 기수강강의 금액: 결제금액 - (전체 강좌 수 대비 강좌 정상가의 1회 이용대금×이용강의수)<br>
                * 수강시작일로부터 7일 이내 위약금 없음<br>
                * 수강시작일로부터 7일 이후 위약금 적용 (잔여이용대금의 10% 공제)</li>
                <li>지급된 솔루션, 사은품이 있는 경우 공급자의 교환, 환불 정책에 따릅니다.</li>
                <li>환불이 진행 된 후에는 자동 수강 종료됩니다.</li>
                <li>총 강의수 전체 기수강 시에는 환불이 불가합니다.</li> 
            </ul>

            <p># 기타유의사항</p>
            <ul>
                <li>이상욱 대표 수강생에게만 제공되는 [핫버튼 코리아] 혜택은 강의 내 확인 부탁 드립니다.</li>
                <li>아이디 공유, 타인양도 등 부정사용 적발 시 회원 자격 박탈 및 환불 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 있을 수 있습니다.</li> 
            </ul>

            <p>※ 이용문의 : 고객만족센터 1544-5006</p>
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
        <input type="checkbox" name="y_pkg" value="178677" style="display: none;" checked/>
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