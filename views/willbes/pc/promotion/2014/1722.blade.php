@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')  
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/
        .skybanner {
            position:fixed;
            bottom:20px;
            right:10px;
            z-index:1;
            width:138px;
        }
        .skybanner a {display:block; margin-bottom:5px}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/07/1722_top_bg.jpg) no-repeat center top}

        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2020/07/1722_01_bg.jpg) no-repeat center top}         

        .evt02 {background:#252525; padding-bottom:150px}
        .evt02 .youtube iframe {width:720px; height:405px; margin:0 auto}
        .evt02 .btn {width:590px; margin:50px auto 0}
        .evt02 .btn a {display:block; color:#282f4c; background:#fff; border-radius:30px; font-size:30px; padding:15px 0;
            box-shadow: 0 1px 0 #cccccc, 0 2px 0 #cccccc, 0 3px 0 #cccccc, 0 4px 0 #cccccc, 0 5px 0 #cccccc, 0 6px 0 #cccccc, 0 7px 0 #cccccc, 0 8px 0 #cccccc, 0 9px 0 #cccccc, 0 50px 30px rgba(0, 0, 0, 0.3)
        }
        .evt02 .btn a:hover {color:#fff; background:#282f4c;}

        .evt03 {background:url(https://static.willbes.net/public/images/promotion/2020/07/1722_03_bg.jpg) no-repeat center top}
        .evt03 .slide_con {width:784px; margin:0 auto; position:relative;}
        .evt03 .slide_con p {position:absolute; top:50%; margin-top:-22px; width:44px !important; height:45px !important; z-index:10}
        .evt03 .slide_con p.leftBtn {left:-22px}
        .evt03 .slide_con p.rightBtn {right:-22px}
        .evt03 .slide_con li {display:inline; float:left}
        .evt03 .slide_con li img {width:100%}
        .evt03 .slide_con ul:after {content::""; display:block; clear:both}

        .evt04 {background:url(https://static.willbes.net/public/images/promotion/2020/07/1722_04_bg.jpg) no-repeat center top}
        .evt05 {background:#484c57}       
        .evt06 {background:url(https://static.willbes.net/public/images/promotion/2020/07/1722_05_bg.jpg) repeat}
        .evt07 {background:#a1774f}
        .evt09 {background:#c2c2c2}

        .evt10 { padding:120px 0 0; text-align:left;}
        .evt10 .copy {width:720px; margin:0 auto;}
        .evt10 h5 {color:#a0774e; font-size:46px; line-height:1; margin-bottom:20px; letter-spacing:-1px;}
        .evt10 .evt10Txt01 {font-size:28px; margin:20px auto 80px}
        .evt10 .sample {width:720px; margin:0 auto}
        .evt10 .sample li {display:inline; float:left; width:49%; padding:20px; margin-right:1%; border-radius:10px; 
            background:#acacac; color:#fff; font-size:20px; font-weight:600; text-align:center}
        .evt10 .sample li p {margin-bottom:15px;}
        .evt10 .sample li a {display:inline-block; padding:10px 20px; font-size:16px; margin-right:10px; border-radius:8px; background:#000; color:#fff;}
        .evt10 .sample li a:hover {background:#fff; color:#000}
        .evt10 .sample li:last-child {margin:0}
        .evt10 .sample:after {content:""; display:block; clear:both}
        .evt10 .evt10Txt02 {width:720px; margin:0 auto; font-size:16px; line-height:1.4; margin-top:20px; text-align:left; letter-spacing:-1px; color:#333;}

        .evtCurri {width:720px; margin:50px auto 100px; text-align:left}
        .evtCurri li {font-size:20px; margin-bottom:15px; color:#232323; letter-spacing:-1px; line-height:1.3}
        .evtCurri li.cTitle {color:#a0774e; font-size:28px; margin:50px 0 30px; font-family: "Noto Sans KR Black", "Noto Sans KR", "sans-serif" !important;}


        /*타이머*/
        .newTopDday {clear:both;background:#f5f5f5; width:100%; padding:20px 0; font-size:26px;}
        .newTopDday ul {width:1120px; margin:0 auto}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; font-weight:600; color:#000; line-height:70px}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {line-height:none; text-align:right; padding-right:10px; padding-top:5px; width:28%;}
        .newTopDday ul li:last-child {line-height:none; text-align:left; padding-left:10px; padding-top:5px; width:24%;}
        .newTopDday ul:after {content:""; display:block; clear:both}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">    
        <div class="skybanner">
            <a href="#evt02"><img src="https://static.willbes.net/public/images/promotion/2020/07/1722_sky02.png" alt="황채영대표"></a>
            <a href="https://njob.willbes.net/book/index/cate/3114?cate_code=3114&subject_idx=1971&prof_idx=51060" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1722_sky01.png" alt="교재구매">
            </a>            
        </div>

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1722_top.jpg" alt="양원근 대표 책쓰기 브랜딩" > 
        </div>  

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1722_01.jpg" alt="누적 1천명 돌파" >             
        </div>

        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday">
            <div>
                <ul>
                    <li>
                        사전예약 마감일까지
                    </li>
                    <li><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>일</strong></li>
                    <li><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>:</strong></li>
                    <li><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>:</strong></li>
                    <li><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li>
                        남았습니다.
                    </li>
                </ul>
            </div>
        </div>

        <div class="evtCtnsBox evt02" id="evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1722_02.jpg" alt="사전예약 특별혜택" >
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/AhPAFng06cA?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div> 
            <div class="btn NSK-Black">
                {{--  <a href="javascript:goLecture();">지금, 사전 예약하고 끝장 혜택받기 ></a> --}}
                <a href="javascript:goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'on_lecture', 'Y');">지금, 사전 예약하고 끝장 혜택받기 ></a>
                <div id="pass" class="infoCheck" style="display: none;">
                    <input type="checkbox" name="y_pkg" value="169144" checked/>
                    <input type="checkbox" id="is_chk" name="is_chk" checked>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1722_03.jpg" alt="양원근 대료가 런칭한 베스트셀러" >
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1722_04.jpg" alt="양원근 대료가 런칭한 베스트셀러" >
        </div>

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1722_05.jpg" alt="졸업생">
        </div>

        <div class="evtCtnsBox evt06">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1722_06.jpg" alt="방송에 소개된 책쓰기 브랜딩 스쿨 출연 영상">
        </div>

        <div class="evtCtnsBox evt07">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1722_07.jpg" alt="2년연속 조기마감">
        </div>

        <div class="evtCtnsBox evt10" id="evt10">
            <div class="copy">
                <h5 class="NSK-Black">
                    <div>책쓰기가 이렇게 쉬울줄이야!</div>
                </h5>
                <div class="evt10Txt01 NSK-Thin">우리가 배울 수 있는 과정은?</div>
            </div>

            <ul class="sample">
                @if(empty($arr_base['promotion_otherinfo_data']) === false)
                    @php $i = 1; @endphp
                    @foreach($arr_base['promotion_otherinfo_data'] as $row)                            
                        <li>
                            <p>{{$i}}강 맛보기 수강 ▼</p>                                
                            <a href="javascript:fnPlayerSample('{{$row['OtherData1']}}','{{$row['wUnitIdx']}}','HD');" class="btnst02">HIGH ></a>
                            <a href="javascript:fnPlayerSample('{{$row['OtherData1']}}','{{$row['wUnitIdx']}}','SD');" class="btnst03">LOW ></a>
                        </li>
                        @php $i += 1; @endphp
                    @endforeach
                @else
                    <li><a href="#none">1강 맛보기 준비중 ></a></li>
                    <li><a href="#none">2강 맛보기 준비중 ></a></li>
                @endif
            </ul>             

            <div class="evt10Txt02">
                * 동영상 수강을 위해서는 스타플레이어 설치 후 재생하셔야 합니다.<br>
                스타플레이어 미설치 경우 맛보기 수강버튼 클릭시 설치 메시지가 팝업으로 뜹니다.<br>
                팝업 확인이 안 될 경우 팝업 해제 후 다시 진행하시면 됩니다.
            </div>


            <div class="evtCurri">
                <ul>
                    <li class="cTitle">CHAPTER 1</li>
                    <li>1강 책은 성공한 사람이 아닌, 성공을 꿈꾸는 사람이 쓰는 것이다<br>
                    - 왜 책을 쓰려고 하는가? 책은 어떤 사람이 쓰는가?</li>
                    <li>2강 나같이 평범한 사람도 책을 쓸 수 있을까? - 사례 1</li>
                    <li>3강 나같이 평범한 사람도 책을 쓸 수 있을까? - 사례 2</li>
                    <li>4강 나같이 평범한 사람도 책을 쓸 수 있을까? - 사례 3</li>

                    <li class="cTitle">CHAPTER 2</li>
                    <li>5강 이런 책들은 누가, 그리고 어떤 사람이 쓸까요? - 사례 1<br>
                    - 전문가가 아니어도 책은 쓸 수 있다</li>
                    <li>6강 이런 책들은 누가, 그리고 어떤 사람이 쓸까요? - 사례 2<br>
                    - 우리의 상식으로는 도저히 납득할 수 없는 상식을 뒤집는 책</li>
                    <li>7강 이런 책들은 누가, 그리고 어떤 사람이 쓸까요? - 사례 3<br>
                    - 유대인의 생각하는 힘<br>
                    - 스피치의 매력에 빠지다<br>
                    - 한권으로 정리하는 4차 산업혁명<br>
                    - 나는 스타벅스보다 작은 카페가 좋다<br>
                    - 톡!톡!톡! 생각을 디자인하라<br>
                    - 내 아이를 위한 칼 비테 교육법<br>
                    - 공부머리 독서법</li>

                    <li class="cTitle">CHAPTER 3</li>
                    <li>8강 나만의 콘셉트를 잡기 / "나"는 누구인가? 사례 1<br>
                    - 대기업 교육 담당 경험으로 커뮤니케이션 코칭<br>
                    - 독서를 통해 쌓은 지식을 토대로 속독법이나 독서법 코칭</li>
                    <li>9강 "나"는 누구인가? 사례 2<br>
                    - 꽃을 매개로 바쁘고 지친 사람들의 마음에 힐링을 주는 에세이<br>
                    - 누구나 쉽게 갈 수 있는 세계여행<br>
                    - 왜 실패했는지에 대한 경험을 토대로 비즈니스 성공학<br>
                    - 작은 회사 200% 매출 올리는 노하우 비법<br>
                    - 스마트스토어 마케팅<br>
                    - 미래4차 산업을 어떻게 대처할 것인가?<br>
                    - 학교를 떠나 성공한 자들의 비결</li>

                    <li class="cTitle">CHAPTER 4</li>
                    <li>10강 기획부터 출간까지, 책쓰기에 필요한 9가지<br>
                    - 책은 어떻게 쓰는가?<br>
                    - 책은 어떻게 만들어지는가?<br>
                    - 13가지 출판의 흐름 분석하기</li>

                    <li class="cTitle">CHAPTER 5</li>
                    <li>11강 베스트셀러는 어떻게 만들어지는가?<br>
                    - 베스트셀러가 되는 5가지 요소</li>

                    <li class="cTitle">CHAPTER 6</li>
                    <li>12강 책은 제목이 팔 할이다 - 좋은 제목 사례 1</li>
                    <li>13강 책은 제목이 팔 할이다 - 좋은 제목 사례 2</li>
                    <li>14강 책은 제목이 팔 할이다 - 제목 실패 사례</li>

                    <li class="cTitle">CHAPTER 7</li>
                    <li>15강 제목의 짝꿍인 카피, "나도 너만큼 중요해" - 카피의 중요성 1</li>
                    <li>16강 제목의 짝꿍인 카피, "나도 너만큼 중요해" - 카피의 중요성 2</li>

                    <li class="cTitle">CHAPTER 8</li>
                    <li>17강 제목을 200% 상승시켜주는 표지 정하기</li>
                    <li>18강 책 제목의 중요성<br>
                    - 제목 깎아 먹는 표지 사례<br>
                    - 내가 만약 표지를 선택한다면?<br>
                    - 제목을 200% 상승시켜주는 표지<br>
                    - 제목 깎아 먹는 제목<br>
                    - 표지를 200% 상승시켜주는 제목</li>

                    <li class="cTitle">CHAPTER 9</li>
                    <li>19강 제목은 모든 문장의 첫 번째 줄이다!</li>
                    <li>20강 가장 이상적인 제목의 글자 수는?</li>
                    <li>21강 출판사 계약을 성공시킨 작은 성공체험</li>

                    <li class="cTitle">CHAPTER 10</li>
                    <li>22강 독자의 시선을 사로잡는 제목 만들기<br>
                    - 제목은 모든 문장의 첫 번째 줄이다<br>
                    - 마음을 담은 제목 한 줄이 상대의 욕구를 자극한다<br>
                    - 출판사에 계약을 성사시킨 작은 성공체험</li>
                    <li>23강 제목 만들기 실전 연습 1</li>
                    <li>24강 제목 만들기 실전 연습 2</li>

                    <li class="cTitle">CHAPTER 11</li>
                    <li>25강 '대박' 제목 만들기 6가지 법칙 1<br>
                    - 무엇이 이익인지 확실하게 알려주어야 한다<br>
                    - 지금이 기회라는 강조와 중요한 일임을 인식시켜야한다<br>
                    - 내용이 궁금해서 참을 수 없게 만든다.<br>
                    - ‘왜?’라는 의문이 들게 해야 한다 </li>
                    <li>26강 '대박' 제목 만들기 6가지 법칙 2<br>
                    - ‘설마, 그게 가능해?’하는 흥미를 유발시켜야 한다. <br>
                    - ‘왜 읽어야 하는가?’ 읽어야할 이유를 확실하게 알려야 한다.<br>
                    - 독자의 마음을 위로하고 대변해주는 표현을 한다.</li>
                    <li>27강 제목을 지을때 꼭 알아야 할 금기 사항</li>

                    <li class="cTitle">CHAPTER 12</li>
                    <li>28강 목차 만들기 실전 연습 1</li>
                    <li>29강 목차 만들기 실전 연습 2</li>
                    <li>30강 목차 만들기 실전 연습 3</li>

                    <li class="cTitle">CHAPTER 13</li>
                    <li>31강 책을 쓰려면 어떤 것 부터 준비해야 하나요?<br>
                    - 나만의 콘셉 잡기<br>
                    - 나의 언어로 고쳐쓰기<br>
                    - 진짜 나의 이야기로 표현하는 전문적인 책쓰기<br>
                    <li>32강 책쓰기, 어떻게 해야 하나요? 실전 연습 1</li>
                    <li>33강 책쓰기, 어떻게 해야 하나요? 실전 연습 2</li>

                    <li class="cTitle">CHAPTER 14</li>
                    <li>34강 출판권 설정 계약은 어떻게 해야 하나요<br>
                    - 출판권 및 전송 이용권의 유효기간과 갱신 및 재고도서의 배포 <br>
                    - 비용의 부담<br>
                    - 출판에 따른 저작권 사용료  ‘인세’ 등</li>

                    <li class="cTitle">CHAPTER 15</li>
                    <li>35강 종강 : 당신의 삶이 책이 되는 양원근의 강의를 마치며</li>
                </ul>
            </div>
        </div>

        <div class="evtCtnsBox evt08">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1722_08.jpg" alt="소문내기 이벤트" usemap="#Map1722A" border="0">
            <map name="Map1722A">
                <area shape="rect" coords="52,768,134,852" href="https://section.blog.naver.com/BlogHome.nhn?directoryNo=0&currentPage=1&groupId=0" alt="블로그">
                <area shape="rect" coords="159,768,240,852" href="https://www.instagram.com" target="_blank" alt="인스타">
                <area shape="rect" coords="266,768,347,852" href="https://www.facebook.com" target="_blank" alt="페이스북">
                <area shape="rect" coords="373,768,453,852" href="https://story.kakao.com/ch/kakaostory" target="_blank" alt="카카오스토리">
                <area shape="rect" coords="480,768,563,852" href="https://band.us/ko" target="_blank" alt="밴드">
                <area shape="rect" coords="584,768,672,852" href="https://twitter.com" target="_blank" alt="트위터">
            </map>
        </div>

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial')
        @endif

        <div class="evtCtnsBox evt09">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1722_09.jpg" alt="이용안내">
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript"> 
       /* function goLecture() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            location.href = 'https://njob.willbes.net/lecture/show/cate/3114/pattern/only/prod-code/169144';
        };*/

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('@if(empty($arr_promotion_params['edate'])===false) {{$arr_promotion_params['edate']}} @endif');
        });
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