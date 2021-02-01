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

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/01/2024_top_bg.jpg) no-repeat center top;} 
        .evtTop .topImg {width:1120px; margin:0 auto; position:relative;}
        .evtTop .youtube {position:absolute; top:1035px; left:50%; width:768px; margin-left:-384px} 
        .evtTop .youtube iframe {width:768px; height:432px}

        .evt01 {background:#303c5f}   
        .evt01 > div {width:1120px; margin:0 auto; position:relative;}      

        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2021/01/2024_02_bg.jpg) no-repeat center top;}       

        .evt03 {background:#474558}

        .evt04 {background:#f7f3e7}

        .evt05 {background:#00acc1}       

        .evt06 {background:#fff;}
        .evt06 > div {width:1120px; margin:0 auto; position:relative;}
        .evt06 > div a {position: absolute; top:86.57%; width:7.77%; height:9.82%; z-index: 2;}
        .evt06 > div a.link01 {left: 22.05%;}
        .evt06 > div a.link02 {left: 31.96%;}
        .evt06 > div a.link03 {left: 41.52%;}
        .evt06 > div a.link04 {left: 50.98%;}
        .evt06 > div a.link05 {left: 60.63%;}
        .evt06 > div a.link06 {left: 70%;}

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

        .fixed {position:fixed; width:100%; background:rgba(255,255,255,0.5);
            background:#fff; box-shadow:0 10px 10px rgba(102,102,102,0.2); z-index:10;
        }

        .evt07 {background:#e1e1e1;}
        .evtFooter {width:720px; margin:0 auto; padding:100px 0; text-align:left; line-height:1.5; font-size:14px; color:#666;}
        .evtFooter h3 {font-size:1.5rem; margin-bottom:30px; color:#000}
        .evtFooter p {font-size:1.1rem; margin-bottom:10px; color:#333;}
        .evtFooter div,
        .evtFooter ul {margin-bottom:30px; padding-left:10px}
        .evtFooter li {margin-left:20px; list-style-type: decimal; margin-bottom:10px }       

    </style>


    <div class="p_re evtContent NSK c_both" id="evtContainer">
        <div class="skybanner" >            
            <a href="#evt01"><img src="https://static.willbes.net/public/images/promotion/2021/01/2024_sky_01.png" alt=""></a> 
            <a href="#evtCurriBoxSec"><img src="https://static.willbes.net/public/images/promotion/2021/01/2024_sky_02.png" alt=""></a>                           
        </div>

		<div class="evtCtnsBox evtTop">
            <div class="topImg">
                <img src="https://static.willbes.net/public/images/promotion/2021/01/2024_top.jpg" alt="9천만원 매출의 사업가 되기까지" >
            </div>  
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/W2nDOfP913A?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>       
        </div>

        <div class="evtCtnsBox evt01" id="evt01">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/01/2024_01.jpg" alt="godsr 마케팅" >
                <a href="" title="사전예약 신청하기" style="position: absolute; left: 27.41%; top: 85.84%; width: 44.64%; height: 5.6%; z-index: 2;"></a>   
            </div>                             
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2024_02.jpg" alt="인기강사 이상욱입니다." >        
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2024_03.jpg" alt="인생의 끝 없는 도전" >                
        </div>   

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2024_04.jpg" alt="네이버 스탐트스토어 4000만원 이상의 매출" >
        </div>

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2024_05.jpg" alt="스마트셀러" >
        </div>

        <div class="evtCtnsBox evtCurriBox" id="evtCurriBoxSec">
            <div class="copy">
                <h5 class="NSK-Black">
                    <div>
                        유통MD로 성공하는법
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
                    <li class="cTitle">INTRO - 사업가의 자세</li>
                    <li>1강 사업과 장사의 차이</li>
                    <li>2강 사업 성공 공식</li>
                    <li>3강 실패를 통해 배운 성공 프로세스</li>
                    <li>4강 온라인 사업 필수 지표</li>

                    <li class="cTitle">Chapter1. 온라인 사업시스템 구축</li>
                    <li>5강 0원부터 시작하는 사업 프로세스</li>
                    <li>6강 사업자 만들기</li>
                    <li>7강 온라인 스토어 만들기</li>
                    <li>8강 도매 사이트 소개</li>
                    <li>9강 온라인 사업에 도움되는 필수 사이트</li>
                    <li>10강 업무 최적화의 필요성</li>
                    <li>11강 오피스 최적화</li>
                    <li>12강 네이버 최적화</li>
                    <li>13강 데이터 최적화</li>
                    <li>14강 업무도구 최적화</li>
                    <li>15강 사업에 도움되는 업무 메뉴얼</li>

                    <li class="cTitle">Chapter 2. 도전 유통MD 누구나 쉬운 상품 소싱</li>
                    <li>16강 만족도가 높은 물건팔기</li>
                    <li>17강 주변에서 상품 소싱하기</li>
                    <li>18강 데이터로 리스크 없애기</li>
                    <li>19강 소싱리스트 만들기</li>
                    <li>20강 도매업체 찾는법</li>
                    <li>21강 제조업체 찾는법</li>
                    <li>22강 제품수입 하는법</li>

                    <li class="cTitle">Chapter 3. 무조건 팔리는 판매기법 - GODSR마케팅 (이론편)</li>
                    <li>23강 준비물</li>
                    <li>24강 GROUNDBAIT</li>
                    <li>25강 OPENING</li>
                    <li>26강 DESIRE</li>
                    <li>27강 SOLUTION</li>
                    <li>28강 RECOMMEND</li>

                    <li class="cTitle">Chapter 4. 무조건 팔리는 판매기법(실습편)</li>
                    <li>29강 사진촬영</li>
                    <li>30강 경쟁사 및 소비자니즈 분석</li>
                    <li>31강 몰입 및 호기심 불러 일으키기</li>
                    <li>32강 고객의 니즈 환기</li>
                    <li>33강 상품소개</li>
                    <li>34강 추천상품</li>

                    <li class="cTitle">Chapter 5. 이제부터 실전이다!</li>
                    <li>35강 네이버 로직 이해하기</li>
                    <li>36강 스마트스토어 상품등록</li>
                    <li>37강 지표 분석</li>

                    <li class="cTitle">Chapter 6. 리스크 없는 제품판매</li>
                    <li>38강 제품테스트</li>
                    <li>39강 리뷰 이벤트</li>
                    <li>40강 체험단 모집</li>

                    <li class="cTitle">Chapter 7. 당신의 날개를 펼칠 때</li>
                    <li>41강 채널확장</li>
                    <li>42강 검색광고</li>
                    <li>43강 인플루언서</li>
                    <li>44강 캔버시</li>
                    <li>45강 정책자금 이용</li>

                    <li class="cTitle">OUTTRO - 마치는 인사</li>
                </ul>
            </div>
        </div>
        
        <div class="evtCtnsBox evt06" id="evt06">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/01/2024_06.jpg" alt="소문내기 이벤트" >
                <a href="https://section.blog.naver.com/BlogHome.nhn" target="_blank" title="블로그"></a>
                <a href="https://www.instagram.com/" target="_blank" title="인스타그램"></a>
                <a href="https://www.facebook.com/" target="_blank" title="페이스북"></a>
                <a href="https://accounts.kakao.com/login/kakaostory" target="_blank" title="카카오스토리"></a>
                <a href="https://band.us" target="_blank" title="밴드"></a>
                <a href="https://twitter.com/" target="_blank" title="트위터"></a>
            </div>
        </div>

        {{--홍보url --}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true &&   array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'N')){{--기존SNS예외처리시--}}
        @endif 


        <div class="evtCtnsBox evt07">
            <div class="evtFooter" id="infoText">
                <h3 class="NSK-Black">[이용안내]</h3>

                <p># 사전예약 혜택</p>
                <ul>
                    <li>사전예약 혜택은 2월 8일까지 결제완료자에 한해서만 적용됩니다.</li>
                    <li>사전예약 혜택은 강의료 40% 할인입니다.<br>
                        수강기간 추가 혜택은 강의 시작 2월 15일 일괄적으로 적용 예정입니다.</li> 
                </ul>

                <p># 소문내기 이벤트</p>
                <ul>
                    <li>발표시 동일인으로 확인 될 경우 강의 제공은 한 개의 아이디만 당첨으로 인정합니다.</li>
                    <li>당첨자 발표는 2월 10일 공지사항을 참고하시면 됩니다.</li> 
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