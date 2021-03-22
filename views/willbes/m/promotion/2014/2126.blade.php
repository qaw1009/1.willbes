@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtTop {position:relative;}

    .evt01 {position:relative; background:#252525}
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

    .btnbuyBox {width:100%; position:fixed; bottom:0; text-align:center; background:rgba(255,255,255,0.5); padding-top:10px; z-index:100}
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

    .slide_con {max-width:768px; margin:0 auto}
    .slide_con .bx-wrapper {box-shadow:none; border:0; margin:0; padding:0}
    .slide_con .bx-wrapper .bx-pager {        
        width: auto;
        bottom: -30px;
        left:0;
        right:0;
        text-align: center;
        z-index:10;
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
        background: #d7d7d7;
    }
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a.active {
        background:#000;
    }

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
        <img src="https://static.willbes.net/public/images/promotion/2021/03/2126_top.jpg" alt="리빙&인테리어" >
        <a href="https://njob.willbes.net/m/lecture/show/cate/3114/pattern/only/prod-code/178874" title="알아보기" target="_blank" style="position: absolute; left: 10.02%; top: 82.69%; width: 77.54%; height: 10.79%; z-index: 2;"></a>
    </div> 
    
    <div class="evtCtnsBox evt01">
        <img src="https://static.willbes.net/public/images/promotion/2021/03/2126_01.jpg" alt="이커머스 전문 MD 최효진" >  
        <br>
        <br>
        <br>
        <div class="video-container">
            <iframe src="https://www.youtube.com/embed/vjPtDvb1Bng?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div> 
    
    <div class="evtCtnsBox evt02">
        <img src="https://static.willbes.net/public/images/promotion/2021/03/2126_02.jpg" alt="4가지 포인트" >         
    </div>    

    <div class="evtCtnsBox evt03">
        <img src="https://static.willbes.net/public/images/promotion/2021/03/2126_03.jpg" alt="20년 사업경력의 전문MD" >
    </div> 

    <div class="evtCtnsBox evt04">
        <div class="p_re">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2126_04.jpg" alt="사전예약 신청하기" >           
            <a href="https://njob.willbes.net/m/lecture/show/cate/3114/pattern/only/prod-code/180404" title="" style="position: absolute; left: 14.84%; top: 62.23%; width: 35.55%; height: 14.88%; z-index: 2;"></a>
        </div>
    </div>

    <div class="evtCtnsBox evt05">
        <img src="https://static.willbes.net/public/images/promotion/2021/03/2126_05.jpg" alt="1:1 개별 컨설팅" >
    </div> 

    <div class="evtCtnsBox" id="guide">
        <div class="evtFooter">
            <h3 class="NSK-Black">[이용안내]</h3>
            <p># 사전예약 및 강의 안내</p>
            <ul>
                <li>사전예약 혜택은 04월 30일까지 결제완료자에 한해서만 적용됩니다.</li> 
                <li>사전예약 혜택은 강의료 40% 할인입니다.</li> 
                <li>강의 시작일은 05월 01일 예정이오나, 일정에 따라 변경 될 수 있으니 참고 부탁 드립니다.</li> 
                <li>본강의의 구매자에게 제공되는 농업회계프로그램은 수강생만 제공되는 혜택으로, 지급된 프로그램이 있는 경우 본강의의 교환, 환불 정책에 따릅니다.</li>  
            </ul>

            <p>※ 이용문의 : 고객만족센터 1544-5006</p>
        </div>    
    </div> 
</div> 
<!-- End Container -->

{{--
<div class="btnbuyBox">
    <div class="btnbuy NSK-Black">     
        <a href="#evt05">
        [온라인강의] 신청하기 >
        </a>
    </div>
    <div class="infoCheck" id="chkInfo">   
        <label>
            <input name="ischk" type="checkbox" value="Y" />페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.
        </label>
        <a href="#guide" class="infotxt">이용안내확인하기 ↓</a>
    </div>
</div>
--}}

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