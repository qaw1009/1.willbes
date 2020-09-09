@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')  
    <!-- Container -->
    <style type="text/css">
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
        .skybanner a {display:block; margin-bottom:5px; text-align:center}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/09/1797_top_bg.jpg) no-repeat center top}

        .evt01 {background:#22262f}         

        .evt02 {background:#212121; padding-bottom:150px}
        .evt02 .youtube iframe {width:720px; height:405px; margin:0 auto}
        .evt02 .btn {width:590px; margin:50px auto 0}
        .evt02 .btn a {display:block; color:#ebc667; background:#fff; border-radius:30px; font-size:30px; padding:15px 0;
            box-shadow: 0 1px 0 #cccccc, 0 2px 0 #cccccc, 0 3px 0 #cccccc, 0 4px 0 #cccccc, 0 5px 0 #cccccc, 0 6px 0 #cccccc, 0 7px 0 #cccccc, 0 8px 0 #cccccc, 0 9px 0 #cccccc, 0 50px 30px rgba(0, 0, 0, 0.3)
        }
        .evt02 .btn a:hover {color:#fff; background:#ebc667;}

        .evt03 {background:#414d4c}

        .evt04 {background:#353a45}
        .evt05 {background:url(https://static.willbes.net/public/images/promotion/2020/09/1797_05_bg.jpg) no-repeat center top}       
        .evt06 {background:#917c53}
        .evt07 {background:#fff}

        .evt10 {padding:120px 0 50px; text-align:left; background:#f5f5f5}
        .evt10 .copy {width:720px; margin:0 auto;}
        .evt10 h5 {color:#414d4c; font-size:46px; line-height:1; margin-bottom:20px; letter-spacing:-1px;}
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

        .evtFooter {padding:100px 0; text-align:left; line-height:1.5; font-size:14px; color:#3a3a3a; background:#c2c2c2 !important}
        .evtFooter h3 {width:720px; margin:0 auto;font-size:1.5rem; margin-bottom:30px; }
        .evtFooter p {width:720px; margin:0 auto;font-size:1.1rem; margin-bottom:10px;}
        .evtFooter div,
        .evtFooter ul {width:720px; margin:0 auto 30px; padding-left:10px}
        .evtFooter li {margin-left:20px; list-style-type: decimal; }


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
            <a href="#evt02"><img src="https://static.willbes.net/public/images/promotion/2020/09/1797_sky01.png" alt="사전예약하기"></a>
            <a href="#evt10">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1797_sky02.png" alt="맛보기">
            </a>            
        </div>

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1797_top.jpg" alt="양원근 대표 책쓰기 브랜딩" > 
        </div>  

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1797_01.jpg" alt="누적 1천명 돌파" >             
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
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1797_02.jpg" alt="사전예약 특별혜택" >
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/CMDjINjDQyg?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div> 
            <div class="btn NSK-Black">
                <a href="javascript:goLecture();">지금, 사전 예약하고 끝장 혜택받기 ></a>
                {{--
                <a href="javascript:goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'on_lecture', 'Y');">지금, 사전 예약하고 끝장 혜택받기 ></a>
                <div id="pass" class="infoCheck" style="display: none;">
                    <input type="checkbox" name="y_pkg" value="172160" checked/>
                    <input type="checkbox" id="is_chk" name="is_chk" checked>
                </div>
                --}}
            </div>
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1797_03.jpg" alt="양원근 대료가 런칭한 베스트셀러" >
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1797_04.jpg" alt="양원근 대료가 런칭한 베스트셀러" >
        </div>

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1797_05.jpg" alt="졸업생">
        </div>

        <div class="evtCtnsBox evt06">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1797_06.jpg" alt="방송에 소개된 책쓰기 브랜딩 스쿨 출연 영상">
        </div>       

        <div class="evtCtnsBox evt10" id="evt10">
            <div class="copy">
                <h5 class="NSK-Black">
                    <div>자기경영 리더십</div>
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
                    <li>1강 안녕하세요 인문학 리더십 전문가, 김윤태입니다.</li>
                    <li>&nbsp;</li>
                    <li>2강 통합의 구심점이 필요한 시대</li>
                    <li>3강 갑질을 경계했던 진정한 "갑" 이순신</li>
                    <li>4강 무에서 유를 만들어 내는 리더</li>
                    <li>&nbsp;</li>  
                    <li>5강 붓을 놓고 칼을 들다! 정통 문신 집안 출신, 무인의 길을 걷다 </li>
                    <li>6강 현상이 아닌 본질을 파악하라</li>
                    <li>7강 불확실한 시대 “임무” vs “업무”를 구분하여 파악하라</li>
                    <li>8강 성공적인 삶을 사는 사람들의 공통점은?</li>
                    <li>&nbsp;</li>  
                    <li>9강 부당함에 눈을 감지 않는다</li>
                    <li>10강 리더를 빛나게 하는 구성원은 누구인가?</li>
                    <li>11강 균형있는 리더의 모습</li>
                    <li>&nbsp;</li> 
                    <li>12강 필승전략의 귀재! 이순신 장군의 23전 23승 필승전략</li>
                    <li>13강 이기고 싶다면 경우의 수를 치열하게 계산하라!</li>
                    <li>14강 경쟁에서 이기는 방법, 전략을 짜라</li>
                    <li>&nbsp;</li>
                    <li>15강 다방면에 지식을 보유하다! 끊임없는 학습의 자세를 가진 리더</li>
                    <li>16강 통찰력의 원천은 어디에서 오는가?</li>
                    <li>17강 끊임없이 새로운 지식과 정보를 수집하는 리더</li>
                    <li>18강 듣는 기술로 학습을 완성하다</li>
                    <li>&nbsp;</li>
                    <li>19강 평온할 때 위기에 대비하라</li>
                    <li>20강 변화를 바라보는 사람이 앞자리에 앉는다 </li>
                    <li>&nbsp;</li>
                    <li>21강 치밀하게 정보를 수집하고 꼼꼼하게 기록하다</li>
                    <li>22강 정보수집의 집약체,  한산해전 승리의 비밀</li>
                    <li>23강 정보를 이용해 전략을 수립하라</li>
                    <li>24강 빅데이터로 온라인 쇼핑의 주도권을 쥔 아마존</li>
                    <li>25강 데이터가 승자와 패자를 가른다</li>
                    <li>&nbsp;</li>
                    <li>26강 마치며<br>
                    "400년을 뛰어넘어 일본의 존경을 받는 리더의 전략으로 <br>
                    코로나로 변화된 세상에서 반드시 승리할 수 있는 전략을 세워라"</li>
                </ul>
            </div>
        </div>

        <div class="evtCtnsBox evt07">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1797_07.jpg" alt="소문내기 이벤트" usemap="#Map1797A" border="0">
            <map name="Map1797A">
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

        <div class="evtFooter" id="infoText">
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

    <script type="text/javascript"> 
        function goLecture() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            location.href = 'https://njob.willbes.net/lecture/show/cate/3114/pattern/only/prod-code/172160';
        };

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