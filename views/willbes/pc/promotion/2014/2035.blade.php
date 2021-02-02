@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')  
    <!-- Container -->
    

    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
            margin-top:20px
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/
        .skybanner {
            position:fixed;
            top:250px;
            right:10px;
            z-index:1;
            width:150px;
            text-align:left;
        }
        .skybanner a {display:block; margin-bottom:5px; text-align:center}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/01/2035_top_bg.jpg) no-repeat center top;} 
        .evtTop > div {width:768px; margin:0 auto; position:relative;}

        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2021/01/2035_01_bg.jpg) no-repeat center top}         

        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2021/01/2035_02_bg.jpg) no-repeat center top;}
        .evt02 .youtube { width:100%; max-width:768px; margin:0 auto; } 
        .evt02 .youtube iframe {width:768px; height:432px}

        .evt03 {background:url(https://static.willbes.net/public/images/promotion/2021/01/2035_03_bg.jpg)}

        .evt05 {background:url(https://static.willbes.net/public/images/promotion/2021/01/2035_05_bg.jpg) no-repeat center top}       

        .evt06 {background:#eee7d5;}
        .evt06 > div {width:768px; margin:0 auto; position:relative;}

        .evtCurriBox {padding:100px 0; text-align:left; background:#F5F5F5}
        .evtCurriBox .copy {width:720px; margin:0 auto;}
        .evtCurriBox h5 {color:#414d4c; font-size:50px; line-height:1; margin-bottom:20px; letter-spacing:-1px;}
        .evtCurriBox .evtCurriBoxTxt01 {font-size:28px; margin:20px auto 80px}
        .evtCurriBox .sample {width:720px; margin:0 auto}
        .evtCurriBox .sample li {display:inline; float:left; width:49%; padding:20px; margin-right:1%; border-radius:10px; 
            background:#acacac; color:#fff; font-size:20px; font-weight:600; text-align:center; margin-bottom:10px}
        .evtCurriBox .sample li p {margin-bottom:15px;}
        .evtCurriBox .sample li a {display:inline-block; padding:10px 20px; font-size:16px; margin-right:10px; border-radius:8px; background:#000; color:#fff;}
        .evtCurriBox .sample li a:hover {background:#fff; color:#000}
        .evtCurriBox .sample li:last-child {margin:0}
        .evtCurriBox .sample:after {content:""; display:block; clear:both}
        .evtCurriBox .sample:after {content:""; display:block; clear:both}
        .evtCurriBox .evtCurriBoxTxt02 {width:720px; margin:0 auto; font-size:16px; line-height:1.4; margin-top:20px; text-align:left; letter-spacing:-1px; color:#333;}  
        .evtCurri {width:720px; margin:50px auto 0; text-align:left}
        .evtCurri li {font-size:20px; margin-bottom:15px; color:#414d4c; letter-spacing:-1px; line-height:1.2}
        .evtCurri li strong {margin-right:10px; font-family: "Noto Sans KR Black", "Noto Sans KR", "sans-serif" !important; }
        .evtCurri li.cTitle {color:#414d4c; font-size:28px; margin:50px 0 30px; font-family: "Noto Sans KR Black", "Noto Sans KR", "sans-serif" !important;}

        .evtReplyBox {background:#f5f5f5; padding:50px 0 100px}
        .evtReplyBox .columns {width:720px; margin:50px auto 0;
            column-count: 2;
            column-gap:10px;
        }
        .evtReplyBox .columns div {
            text-align:justify; font-size:14px; line-height:1.4;
            display:inline-block;
            padding:20px; border:1px solid #eee; border-radius:10px;
            margin-bottom:10px; color:#888; background:#fff;
            width:100%;
        }
        .evtReplyBox .columns div p {border-bottom:1px solid #eee; margin-bottom:10px; padding-bottom:10px; color:#744416}
        .evtReplyBox .columns div:hover {box-shadow:0 10px 10px rgba(102,102,102,0.2); color:#000}
        .evtReplyBox .columns div strong {font-size:bold; color:#333}

        .evt14 {background:#744416; padding-bottom:120px}
        .evt14 ul {width:720px; margin:0 auto;}
        .evt14 li a {display:block; font-size:24px; color:#fff; padding:20px 0; text-align:center; background:#000; line-height:1.5; border-radius:10px}
        .evt14 li a:hover {background:#fff; color:#000;
            -webkit-animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
            animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        }
        .evt14 li span {display:block; font-size:28px}
        .evt14 li:last-child a{margin-left:10px}
        .evt14 ul:after {content:""; display:block; clear:both}

        .evtCtnsBox iframe {width:940px; height:528px; margin:0 auto}        

        .fixed {position:fixed; width:100%; background:rgba(255,255,255,0.5);
            background:#fff; box-shadow:0 10px 10px rgba(102,102,102,0.2); z-index:10;
        }

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

        .evtFooter {width:720px; margin:0 auto; padding:100px 0; text-align:left; line-height:1.5; font-size:14px; color:#666;}
        .evtFooter h3 {font-size:1.5rem; margin-bottom:30px; color:#000}
        .evtFooter p {font-size:1.1rem; margin-bottom:10px; color:#333;}
        .evtFooter div,
        .evtFooter ul {margin-bottom:30px; padding-left:10px}
        .evtFooter li {margin-left:20px; list-style-type: decimal; margin-bottom:10px }

        .evtReply { width:940px; margin:0 auto; position:relative}
    </style>


    <div class="p_re evtContent NSK c_both" id="evtContainer">
        <div class="skybanner" >            
            <a href="https://njob.willbes.net/lecture/show/cate/3114/pattern/only/prod-code/178676" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/01/2035_sky01.png" alt=""></a> 
            <a href="#evtCurriBoxSec"><img src="https://static.willbes.net/public/images/promotion/2021/01/2035_sky02.png" alt=""></a>                           
        </div>

		<div class="evtCtnsBox evtTop">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/01/2035_top.jpg" alt="창업&마케팅" >   
                <a href="#gostart" title="" style="position: absolute; left: 16.28%; top: 74.15%; width: 67.19%; height: 9.27%; z-index: 2;"></a>
            </div>        
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2035_01.jpg" alt="1% 전문가만 살아남는 쇼핑몰" >                       
        </div>

        <div class="evtCtnsBox evt02" id="evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2035_02_01.jpg" alt="마케팅 1% 전문가 권혁중" >
            <div class="youtube">
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
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/01/2035_06.jpg" alt="온라인 쇼핑몰이 지금 대세" >
                <a href="https://njob.willbes.net/lecture/show/cate/3114/pattern/only/prod-code/178676" target="_blank" title="" style="position: absolute; left: 11.98%; top: 83.28%; width: 75.13%; height: 7.1%; z-index:2;" id="gostart"></a>
            </div>
        </div>

        <div class="evtCtnsBox evtCurriBox" id="evtCurriBoxSec">
            <div class="copy">
                <h5 class="NSK-Black">
                    <div>
                        지금 바로 시작할 수 있는<br>
                        실전 온라인 쇼핑몰 창업&마케팅
                    </div>
                </h5>
                <div class="evtCurriBoxTxt01 NSK-Thin">우리가 배울 수 있는 과정은?</div>
            </div>

            <ul class="sample">
                @if(empty($arr_base['promotion_otherinfo_data']) === false)
                    @php $i = 1; @endphp
                    @foreach($arr_base['promotion_otherinfo_data'] as $row)                            
                        <li>
                            <p>{{$i}}강 맛보기 수강 ▼</p>
                            <a href="javascript:fnPlayerSample('{{$row['OtherData1']}}','{{$row['wUnitIdx']}}','HD');">고해상도 ></a>
                            <a href="javascript:fnPlayerSample('{{$row['OtherData1']}}','{{$row['wUnitIdx']}}','SD');">저해상도 ></a>
                        </li>
                        @php $i += 1; @endphp
                    @endforeach
                @else
                    <li><a href="#none">1강 맛보기 준비중 ></a></li>
                    <li><a href="#none">4강 맛보기 준비중 ></a></li>
                @endif
            </ul>           

            <div class="evtCurriBoxTxt02">
                * 동영상 수강을 위해서는 스타플레이어 설치 후 재생하셔야 합니다.<br>
                스타플레이어 미설치 경우 맛보기 수강버튼 클릭시 설치 메시지가 팝업으로 뜹니다.<br>
                팝업 확인이 안 될 경우 팝업 해제 후 다시 진행하시면 됩니다.
            </div>

            <div class="evtCurri">
                <ul>
                    <li class="cTitle">CH1. INTRO</li>
                    <li>1강. 쇼핑몰을 창업하는데 너무나 부정확한 정보들이 넘쳐나요? 믿을 수가 없어요?<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- 이 강의가 필요한 이유와 특별한 이유
                    <li>2강. 쇼핑몰 exit 은 무엇이 있을까요?<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- 쇼핑몰 성공 사례와 그 이유</li>

                    <li class="cTitle">CH2. 쇼핑몰 기초 쌓기</li>
                    <li>3강. 전자상거래업으로 돈버는 방법을 알려주세요.<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- 전자상거래 비즈니스 모델</li>
                    <li>4강. 자사몰(카페24)과 스마트스토어, 오픈마켓의 차이점 및 장단점을 알고 싶어요.</li>
                    <li>5강. 전체적인 쇼핑몰 창업 순서를 알고 싶어요.</li>

                    <li class="cTitle">CH3. 쇼핑몰 기초 마케팅</li>
                    <li>6강. 아이템 선택할 때 도움이 되는 툴을 알려주세요.<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- 네이버 빅데이터를 활용하는 방법</li>
                    <li>7강. 쇼핑몰 컨셉을 정하는 방법을 알려주세요.</li>
                    <li>8강. 쇼핑몰 SWOT 전략은 무엇인가요?</li>
                    <li>9강. 쇼핑몰 이름과 사업자 이름과 같아야 하나요?</li>
                    <li>10강. 도메인을 확보하고 등록하는 방법은요? - .COM 과 .CO.KR 의 차이점</li>

                    <li class="cTitle">CH4. 쇼핑몰 기초 세무</li>
                    <li>11강. 사업자등록 기준은 무엇인가요?<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- 스마트스토어의 개인셀러가 가능한 이유를 설명해주세요.</li>
                    <li>12강. 부가가치세는 무엇인가요? 사례로 설명해 주세요.</li>
                    <li>13강. 사업자가 알아야 할 세무 캘린더를 알려주세요. (1인 개인사업자 경우)</li>
                    <li>14강. 건강보험료가 많이 나왔어요. 어떻게 처리해야 하나요?</li>
                    <li>15강. 통신판매업신고는 어디서 하나요? 비용은요?</li>
                    <li>16강. 정부 창업자금을 받을 수 있을까요?</li>

                    <li class="cTitle">CH5. 무료 카페24 쇼핑몰 구축하기</li>
                    <li>17강. 카페24 무료 쇼핑몰 가입하는 방법은 어떻게 되나요?</li>
                    <li>18강. 카테고리 만드는 방법은 어떻게 되나요?</li>
                    <li>19강. 쇼핑몰 메인 디자인은 무엇인가요?</li>
                    <li>20강. 상품 등록하는 방법을 알려 주세요</li>
                    <li>21강. 나도 색깔 옵션, 사이즈 옵션을 주고 싶어요. 방법은요?</li>
                    <li>22강. 카페24에서 SEO 세팅은 어떻게 하나요?</li>
                    <li>23강. 어떤 PG사 들이 존재하나요? 나에게 유리한 PG사 선택 방법을 알려주세요</li>

                    <li class="cTitle">CH6. 실전 온라인 마케팅</li>
                    <li>24강. 네이버 검색광고를 설정하는 방법을 알려주세요.</li>
                    <li>25강. 블로그 마케팅을 알려주세요.</li>
                    <li>26강. 네이버 포스트 설정 방법을 알려주세요.</li>
                    <li>27강. 네이버 모두 설정방법을 알려주세요.</li>
                    <li>28강. 네이버 사이트등록 방법을 알려주세요.</li>
                    <li>29강. 구글 애드센스 광고수익을 내는 방법을 알려주세요.</li>
                    <li>30강. 페이스북 마케팅 – 타겟 설정을 알려주세요.</li>
                    <li>31강. 페이스북 마케팅 – 소재 세팅을 알려주세요.</li>
                    <li>32강. 소비자 구매의사결정과정을 알려주세요.</li>
                    <li>33강. 쇼핑몰 마케팅 12가지 법칙 중 1법칙과 6법칙을 알려주세요.</li>
                    <li>34강. 쇼핑몰 마케팅 12가지 법칙 중 7법칙과 12법칙을 알려주세요.</li>
                    <li>35강. 쇼핑몰 고객응대 CS 매뉴얼을 알려주세요.</li>
                </ul>
            </div>
        </div>
        
        <div class="evtCtnsBox evt07">
            <div class="evtFooter" id="infoText">
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

    <!-- AceCounter Log Gathering Script V.8.0.AMZ2019080601 -->
    <script language='javascript'>
        var _AceGID=(function(){var Inf=['gtp14.acecounter.com','8080','AH1A44052179653','AW','0','NaPm,Ncisy','ALL','0']; var _CI=(!_AceGID)?[]:_AceGID.val;var _N=0;var _T=new Image(0,0);if(_CI.join('.').indexOf(Inf[3])<0){ _T.src ="https://"+ Inf[0] +'/?cookie'; _CI.push(Inf);  _N=_CI.length; } return {o: _N,val:_CI}; })();
        var _AceCounter=(function(){var G=_AceGID;var _sc=document.createElement('script');var _sm=document.getElementsByTagName('script')[0];if(G.o!=0){var _A=G.val[G.o-1];var _G=(_A[0]).substr(0,_A[0].indexOf('.'));var _C=(_A[7]!='0')?(_A[2]):_A[3];var _U=(_A[5]).replace(/\,/g,'_');_sc.src='https:'+'//cr.acecounter.com/Web/AceCounter_'+_C+'.js?gc='+_A[2]+'&py='+_A[4]+'&gd='+_G+'&gp='+_A[1]+'&up='+_U+'&rd='+(new Date().getTime());_sm.parentNode.insertBefore(_sc,_sm);return _sc.src;}})();
    </script>
    <noscript><img src='https://gtp14.acecounter.com:8080/?uid=AH1A44052179653&je=n&' border='0' width='0' height='0' alt=''></noscript>
    <!-- AceCounter Log Gathering Script End -->
@stop