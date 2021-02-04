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

        .evtCtnsBox .youtube { width:100%; max-width:768px; margin:0 auto; } 
        .evtCtnsBox .youtube iframe {width:768px; height:432px}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/02/2053_top_bg.jpg) no-repeat center top;} 
        .evtTop > div {width:768px; margin:0 auto; position:relative;}
        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2021/02/2053_01_bg.jpg) no-repeat center top}  
        .evt03 {background:#f5f2ef}
        .evt05 {background:#eff5f1}       
        .evt07 {background:#303d5f}
        .evt08 {background:#eee7d5;}
        .evt08 > div {width:768px; margin:0 auto; position:relative;}

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

        .evtInfo {background:#e1e1e1}
        .evtFooter {width:720px; margin:0 auto; padding:100px 0; text-align:left; line-height:1.5; font-size:14px; color:#666;}
        .evtFooter h3 {font-size:1.5rem; margin-bottom:30px; color:#000}
        .evtFooter p {font-size:1.1rem; margin-bottom:10px; color:#333;}
        .evtFooter div,
        .evtFooter ul {margin-bottom:30px; padding-left:10px}
        .evtFooter li {margin-left:20px; list-style-type: decimal; margin-bottom:10px }

        .slide_con {max-width:720px; margin:0 auto}
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
            background: #d7d7d7;
        }
        .slide_con .bx-wrapper .bx-pager.bx-default-pager a.active {
            background:#000;
        }
    </style>


    <div class="p_re evtContent NSK c_both" id="evtContainer">
        <div class="skybanner" >            
            <a href="#gostart"><img src="https://static.willbes.net/public/images/promotion/2021/02/2053_sky01.png" alt=""></a> 
            <a href="#evtCurriBoxSec"><img src="https://static.willbes.net/public/images/promotion/2021/02/2053_sky02.png" alt=""></a>                           
        </div>

		<div class="evtCtnsBox evtTop">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/02/2053_top.jpg" alt="리빙&인테리어" >   
                <a href="#gostart" title="" style="position: absolute; left: 14.71%; top: 84.52%; width: 70.57%; height: 6.63%; z-index: 2;"></a>
            </div>        
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2053_01.jpg" alt="이커머스 전문 MD 최효진" >   
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/W2nDOfP913A?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>   
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2053_01_01.jpg" alt="" >                     
        </div>

        <div class="evtCtnsBox evt02" id="evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2053_02.jpg" alt="4가지 포인트" >                    
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2053_03.jpg" alt="20년 사업경력의 전문MD" >                
        </div>   

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2053_04_01.jpg" alt="남대문 사입 실전투어" >
            <div class="slide_con">
                <ul id="slidesImg1">
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/02/2053_04_02_01.jpg" alt="상품"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/02/2053_04_02_02.jpg" alt="상품"/></li>
                </ul>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2053_04_03.jpg" alt="사입강의 실제 후기" >
        </div>

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2053_05.jpg" alt="1:1 개별 컨설팅" >
        </div>

        <div class="evtCtnsBox evt06">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2053_06.jpg" alt="데이터 분석" >
        </div>

        <div class="evtCtnsBox evt07">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2053_07.jpg" alt="이 강의가 필요하신 분" >            
        </div>

        <div class="evtCtnsBox evt08" id="evt08">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/02/2053_08.jpg" alt="최효진 대표의 이커머스 전략" > 
                <a href="https://njob.willbes.net/lecture/show/cate/3114/pattern/only/prod-code/178874" target="_blank" title="신청하기" style="position: absolute; left: 17.71%; top: 85.1%; width: 63.8%; height: 6.84%; z-index:2;" id="gostart"></a>               
            </div>            
        </div>

        <div class="evtCtnsBox evtCurriBox" id="evtCurriBoxSec">
            <div class="copy">
                <h5 class="NSK-Black">
                    <div>
                        지금 바로 시작할 수 있는<br>
                        리빙&인테리어 전문MD 커리큘럼
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
                    <li><a href="#none">2강 맛보기 준비중 ></a></li>
                @endif
            </ul>           

            <div class="evtCurriBoxTxt02">
                * 동영상 수강을 위해서는 스타플레이어 설치 후 재생하셔야 합니다.<br>
                스타플레이어 미설치 경우 맛보기 수강버튼 클릭시 설치 메시지가 팝업으로 뜹니다.<br>
                팝업 확인이 안 될 경우 팝업 해제 후 다시 진행하시면 됩니다.
            </div>

            <div class="evtCurri">
                <ul>
                    <li class="cTitle">1. 인테리어/리빙 아이템을 팔아야 하는 이유</li>
                    <li>- 데이터 분석방법</li>
                    <li>- 라이프스타일 분석</li>

                    <li class="cTitle">2. 오프라인 시장조사</li>
                    <li>- 남대문을 기반으로 </li>

                    <li class="cTitle">3. 온라인 시장조사 - 위탁, 사입</li>

                    <li class="cTitle">4. 구매대행 타오바오, 1688 시장조사</li>

                    <li class="cTitle">5. 스마트스토어를 기반으로 판매방법</li>
                    <li>- 스마트스토어 기본 세팅</li>
                    <li>- 사업자등록증, 통신판매업 신고</li>
                    <li>- 구매대행 기본 세팅</li>

                    <li class="cTitle">6. 어떤방식으로 팔것인가?</li>
                    <li>- 국내사입</li>
                    <li>- 국내위탁</li>
                    <li>- 해외구매대행</li>
                    <li>- 매장과 같이 운영(리빙윈도)</li>

                    <li class="cTitle">7. 스마트스토어 상품등록</li>
                    <li>- seo에 맞는 방법</li>
                    <li>- 상품사진찍기)</li>

                    <li class="cTitle">8. 주문처리 방법</li>
                    <li>- 국내사입
                    <li>- 국내위탁
                    <li>- 해외구매대행</li>

                    <li class="cTitle">9. 운영방법</li>
                    <li>- 교환,반품관리</li>
                    <li>- 배송관리</li>
                    <li>- kc인증 / 전안법)</li>

                    <li class="cTitle">10. 마케팅</li>
                    <li>- 럭키투데이</li>
                    <li>- 기획전</li>
                    <li>- 블로그</li>
                    <li>- 인스타그램</li>
                    <li>- 리빙윈도 입점전략</li>
                </ul>
            </div>
        </div>
        
        <div class="evtCtnsBox evtInfo">
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

    <script type="text/javascript">
        $(document).ready(function() {
            var slidesImg1 = $("#slidesImg1").bxSlider({
                auto: true, 
                speed: 500, 
                pause: 4000, 
                mode:'fade', 
                autoControls: false, 
                controls:false,
                pager:true,
            });
        });
        /* 수강신청 동의 */ 
        function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ site_url('/lecture/show/cate/3114/pattern/only/prod-code/') }}' + code;
            location.href = url;
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