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

        .evtTop {background:#000} 

        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2021/01/2006_01_bg.jpg) no-repeat center top} 
        .evt01 .youtube {position:absolute; top:611px; left:50%; margin-left:-136px; width:640px; z-index:1; } 
        .evt01 .youtube iframe {width:640px; height:360px}

        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2021/01/2006_02_bg.jpg);}

        .evt03 {background:#3e3eea;}

        .evt04 {background:#f7f3e7;}     

        .evt05 {background:url(https://static.willbes.net/public/images/promotion/2021/01/2006_05_bg.jpg) no-repeat center top}       

        .evt06 {background:#fff;}

        .evt07 {background:#e1e1e1;}

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

        .evtFooter {width:720px; margin:0 auto; padding:100px 0; text-align:left; line-height:1.5; font-size:14px; color:#666;}
        .evtFooter h3 {font-size:1.5rem; margin-bottom:30px; color:#000}
        .evtFooter p {font-size:1.1rem; margin-bottom:10px; color:#333;}
        .evtFooter div,
        .evtFooter ul {margin-bottom:30px; padding-left:10px}
        .evtFooter li {margin-left:20px; list-style-type: decimal; margin-bottom:10px }

        .evtReply { width:940px; margin:0 auto; position:relative}

    </style>


    <div id="background" class="player mt20" data-property="{
        videoURL:'https://youtu.be/odGgBq2eqCg',
        mute: true,
        showControls: false,
        useOnMobile: true,
        quality: 'highres',
        containment: 'self',
        loop: true,
        autoPlay: true,
        stopMovieOnBlur: false,
        startAt: 0,
        opacity: 1
        }"></div>



    <div class="p_re evtContent NSK c_both" id="evtContainer">
        <div class="skybanner" >            
            <a href="https://njob.willbes.net/lecture/show/cate/3114/pattern/only/prod-code/178634" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/01/2006_sky01.png" alt=""></a> 
            {{--<a href="#evtCurriBoxSec"><img src="https://static.willbes.net/public/images/promotion/2021/01/2006_sky02.png" alt=""></a>--}}
        </div>

		<div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2006_top.jpg" alt="억대연봉 세일즈 마케팅" >             
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2006_01.jpg" alt="억대연봉 세일즈 안은재 대표" > 
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/dPrn9DS8Ci8?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>          
        </div>

        <div class="evtCtnsBox evt02" id="evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2006_02.jpg" alt="역대급 세일즈 마케팅 강의" usemap="#Map2006A" border="0" >
            <map name="Map2006A" id="Map2006A">
                <area shape="rect" coords="675,912,997,972" href="https://njob.willbes.net/lecture/show/cate/3114/pattern/only/prod-code/178634" target="_blank" alt="사전예약신청" />
            </map>            
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2006_03.jpg" alt="미치도록 팔고 싶다." >                
        </div>   

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2006_04.jpg" alt="백 년후에도 변하지 않는 마케팅" >
        </div>

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2006_05.jpg" alt="반드시 해내고야 말겠어" >
        </div>

        {{--
        <div class="evtCtnsBox evtCurriBox" id="evtCurriBoxSec">
            <div class="copy">
                <h5 class="NSK-Black">
                    <div>억대연봉 세일즈 마케팅</div>
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
                    <li class="cTitle">CH 1. 루루라탄의 라탄공예 입문</li>
                    <li>1. 안녕하세요, 루루라탄입니다.</li>
                    <li>2. 라탄(등공예)란 무엇인가?</li>
                    <li>3. 취미로 시작한 라탄, 새로운 기회가 될 수 있을까요?</li>
                    <li class="cTitle">CH 2. 라탄공예, 그 위대한 첫 발</li>
                    <li>1. 라탄 재료에 대한 종류와 이해	</li>
                    <li>2. 공예를 시작할 때 필요한 준비물</li>
                    <li>3. 라탄 관련 용어 및 재료의 사용법</li>
                    <li>4. 환심 물에 담그는 방법</li>
                    <li>5. 환심 보관하는 방법</li>
                    <li>6. 환심 부러졌을 때, 사릿대 이어서 엮는 방법</li>
                    <li class="cTitle">CH 3. 다용도 원형 바구니</li>
                    <li>1. 자작나무 플레이트에 라탄 환심 끼우기</li>
                    <li>2. 사릿대 1줄로 막엮기</li>
                    <li>3. 상•하 기본 엮어 마무르기</li>
                    <li class="cTitle">CH 4. 기본 티코스터, 응용 티코스터</li>
                    <li>1. 원형의 기본 +자짜기를 이용한 시작</li>
                    <li>2. 날대를 균일하게 나눠주는 방법</li>
                    <li>3. 막엮기를 이용한 엮음</li>
                    <li>4. 2줄꼬아엮기</li>
                    <li>5. 엮어마무르기<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - BONUS, 티코스터 업그레이드 하기<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 기본티코스터 3번까지 엮은 후 덧날대 추가하여 엮기
                    </li>
                    <li class="cTitle">CH 5. 회오리 티코스터</li>
                    <li>1. 井(우물정)자짜기를 이용해 원형 바닥 짜기</li>
                    <li>2. 날대 수를 이용한 회오리기법</li>
                    <li>3. 젖혀마무르기 변형으로 마무리하기</li>
                    <li class="cTitle">CH 6. 타원트레이</li>
                    <li>1. 자작나무 플레이트에 라탄 환심 끼우기</li>
                    <li>2. 사릿대 2줄로 따라 엮기</li>
                    <li>3. 3줄 꼬아 엮기 2단하기</li>
                    <li>4. 두 번 젖혀 마무르기<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - tip. 한 번 젖혀 마무르기
                    </li>    
                    <li class="cTitle">CH 7. 타원바구니</li>
                    <li>1. 井자짜기 변형을 이용한 타원 바닥 짜기</li>
                    <li>2. 매끼돌리기와 따라 엮기를 이용한 바닥 엮기</li>
                    <li>3. 덧날대 추가 후 3줄 꼬아 엮기</li>
                    <li>4. 3줄 꼬아 엮기 3단 하기</li>
                    <li>5. 따라 엮기와 되돌아엮기로 측면 올리기</li>
                    <li>6. 비단무늬 1/2 넣기</li>
                    <li>7. 2줄 꼬아 엮기 정방향과 역방향 엮어 주기</li>
                    <li>8. 감아 마무르기</li>
                    <li class="cTitle">CH 8. 라탄 물병</li>
                    <li>1. 물병 혹은 화병에 라탄 엮는 기법</li>
                    <li>2. 2줄 꼬아엮기로 고정하기</li>
                    <li>3. 막엮기 혹은 따라엮기를 3.5cm 엮기</li>
                    <li>4. 비단무늬 1/2 넣기</li>
                    <li>5. 막엮기 혹은 따라엮기를 3.5cm 엮기</li>
                    <li>6. 2줄 꼬아 엮기 1단 하기</li>
                    <li>7. 엮어마무르기 변형으로 위, 아래 마무리</li>
                    <li class="cTitle">CH 9. 라탄 공예 재료 구입 방법 및 응용</li>
                    <li>1. 라탄 재료 구입 방법과 좋은 재료 구별법 tip</li>
                    <li>2. 배운 기법을 응용하여 만들 수 있는 작품들 tip</li>
                    <li class="cTitle">CH 10. 드디어 완강! 수고하셨습니다.</li>
                    <li>1. 여러분의 라탄 입문을 축하합니다!</li>
                </ul>
            </div>
        </div>
        --}}

        <div class="evtCtnsBox evt06">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2006_06.jpg" alt="소문내기 이벤트" usemap="#Map2006B" border="0" >
            <map name="Map2006B" id="Map2006B">
                <area shape="rect" coords="255,770,330,845" href="#" alt="블로그" />
                <area shape="rect" coords="362,770,439,845" href="#" alt="인스타그램" />
                <area shape="rect" coords="469,770,547,845" href="#" alt="페이스북" />
                <area shape="rect" coords="575,770,653,845" href="#" alt="카카오스토리" />
                <area shape="rect" coords="684,770,761,845" href="#" alt="밴드" />
                <area shape="rect" coords="790,770,867,845" href="#" alt="트위터" />
            </map>
        </div>

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'N')){{--기존SNS예외처리시--}}
        @endif 
        
        <div class="evtCtnsBox evt07">
            <div class="evtFooter" id="infoText">
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

    {{--//상단영상--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.mb.YTPlayer/3.3.1/css/jquery.mb.YTPlayer.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mb.YTPlayer/3.3.1/jquery.mb.YTPlayer.min.js"></script>
    <script>     
        //상단영상
        jQuery( function() {
            jQuery( '#background' ).YTPlayer();
        } );
    </script>
    <style>
      #background { z-index: -1; background:#000;}
    </style>

    {{--상단영상//--}}


    <!-- AceCounter Log Gathering Script V.8.0.AMZ2019080601 -->
    <script language='javascript'>
        var _AceGID=(function(){var Inf=['gtp14.acecounter.com','8080','AH1A44052179653','AW','0','NaPm,Ncisy','ALL','0']; var _CI=(!_AceGID)?[]:_AceGID.val;var _N=0;var _T=new Image(0,0);if(_CI.join('.').indexOf(Inf[3])<0){ _T.src ="https://"+ Inf[0] +'/?cookie'; _CI.push(Inf);  _N=_CI.length; } return {o: _N,val:_CI}; })();
        var _AceCounter=(function(){var G=_AceGID;var _sc=document.createElement('script');var _sm=document.getElementsByTagName('script')[0];if(G.o!=0){var _A=G.val[G.o-1];var _G=(_A[0]).substr(0,_A[0].indexOf('.'));var _C=(_A[7]!='0')?(_A[2]):_A[3];var _U=(_A[5]).replace(/\,/g,'_');_sc.src='https:'+'//cr.acecounter.com/Web/AceCounter_'+_C+'.js?gc='+_A[2]+'&py='+_A[4]+'&gd='+_G+'&gp='+_A[1]+'&up='+_U+'&rd='+(new Date().getTime());_sm.parentNode.insertBefore(_sc,_sm);return _sc.src;}})();
    </script>
    <noscript><img src='https://gtp14.acecounter.com:8080/?uid=AH1A44052179653&je=n&' border='0' width='0' height='0' alt=''></noscript>
    <!-- AceCounter Log Gathering Script End -->
@stop