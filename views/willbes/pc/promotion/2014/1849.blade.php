@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')  
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/
        .skybanner {
            position:fixed;
            top:100px;
            right:10px;
            z-index:1;
            width:152px;
            text-align:left;
        }
        .skybanner a {display:block; margin-bottom:5px; text-align:center}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/09/1849_top_bg.jpg) no-repeat center top}
        .evtMenu {background:#fff; height:80px; width:100%; border-bottom:1px solid #edeff0}

        .tabs {width:1120px; margin:0 auto;}
        .tabs li {display:inline; float:left; width:25%}
        .tabs li a {display:block; text-align:center; font-size:16px; height:80px; line-height:80px; color:#999; font-weight:bold}
        .tabs li a:hover,
        .tabs li a.active {box-shadow:inset 0 -5px 0 rgba(0,0,0,1); color:#000}
        .tabs:after {content:""; display:block; clear:both}

        .evt01 {background:#22262f;}

        .evt02 {background:#fff; padding:100px 0;}
        .btnbuy {width:720px; margin:50px auto 0}
        .btnbuy a {border-radius:10px; display:block; font-size:40px; background:#000; color:#fff; padding:20px 0;}
        .btnbuy a:hover {background:#a14f5b;}

        .infoCheck {font-size:14px; max-width:720px; margin:30px auto 0}
        .infoCheck label {margin-right:30px; cursor: pointer; font-weight:bold; }
        .infoCheck input[type=checkbox] {width:20px; height:20px; margin-right:10px}
        .infoCheck input[type=checkbox]:checked + label {border-bottom:1px dashed #0099ff; color:#0099ff} 
        .infoCheck a {display:inline-block; background:#333; color:#fff; height:30px; line-height:30px; text-align:center; padding:0 20px; border-radius:20px}
        .infoCheck a:hover {background:#a14f5b;}

        .evt03 {background:#ebebeb; padding-top:150px;}

        .evt04 {background:#414d4c;}     

        .evt05 {background:#862331;}       

        .evt06 {background:#353a45;}

        .evt07 {background:url(https://static.willbes.net/public/images/promotion/2020/09/1849_07_bg.jpg) no-repeat center top}

        .evt08 {background:#917c53;}

        .evtCurriBox {padding:120px 0 0; text-align:left;}
        .evtCurriBox .copy {width:720px; margin:0 auto;}
        .evtCurriBox h5 {color:#414d4c; font-size:50px; line-height:1; margin-bottom:20px; letter-spacing:-1px;}
        .evtCurriBox .evtCurriBoxTxt01 {font-size:28px; margin:20px auto 80px}
        .evtCurriBox .sample {width:720px; margin:0 auto}
        .evtCurriBox .sample li {display:inline; float:left; width:49%; padding:20px; margin-right:1%; border-radius:10px; 
            background:#acacac; color:#fff; font-size:20px; font-weight:600; text-align:center}
        .evtCurriBox .sample li p {margin-bottom:15px;}
        .evtCurriBox .sample li a {display:inline-block; padding:10px 20px; font-size:16px; margin-right:10px; border-radius:8px; background:#000; color:#fff;}
        .evtCurriBox .sample li a:hover {background:#fff; color:#000}
        .evtCurriBox .sample li:last-child {margin:0}
        .evtCurriBox .sample:after {content:""; display:block; clear:both}
        .evtCurriBox .sample:after {content:""; display:block; clear:both}
        .evtCurriBox .evtCurriBoxTxt02 {width:720px; margin:0 auto; font-size:16px; line-height:1.4; margin-top:20px; text-align:left; letter-spacing:-1px; color:#333;}  
        .evtCurri {width:720px; margin:50px auto 100px; text-align:left}
        .evtCurri li {font-size:20px; margin-bottom:15px; color:#414d4c; letter-spacing:-1px; line-height:1.2}
        .evtCurri li strong {margin-right:10px; font-family: "Noto Sans KR Black", "Noto Sans KR", "sans-serif" !important; }
        .evtCurri li.cTitle {color:#744416; font-size:28px; margin:50px 0 30px; font-family: "Noto Sans KR Black", "Noto Sans KR", "sans-serif" !important;}

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

        .evtFooter {width:720px; margin:0 auto; padding:100px 0; text-align:left; line-height:1.5; font-size:14px; color:#666; background:#fff !important}
        .evtFooter h3 {font-size:1.5rem; margin-bottom:30px; color:#000}
        .evtFooter p {font-size:1.1rem; margin-bottom:10px; color:#333;}
        .evtFooter div,
        .evtFooter ul {margin-bottom:30px; padding-left:10px}
        .evtFooter li {margin-left:20px; list-style-type: decimal; }

        .evtReply { width:940px; margin:0 auto; position:relative}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="skybanner" >            
            <a href="#tab01"><img src="https://static.willbes.net/public/images/promotion/2020/09/1849_sky01.png" alt="신청하기"></a>
            <a href="https://njob.willbes.net/book/index/cate/3114?cate_code=3114&subject_idx=1971&prof_idx=51125" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2020/09/1849_sky02.png" alt="교재구매하기"></a>
            <a href="#evtCurriBoxSec"><img src="https://static.willbes.net/public/images/promotion/2020/09/1849_sky03.png" alt="맛보기"></a>                            
        </div>                  

		<div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1849_top.jpg" alt="양원근 대표" >             
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1849_01.jpg" alt="양원근 대표" >             
        </div>

        <div class="evtCtnsBox">
            <div class="evtMenu">
                <ul class="tabs">
                    <li><a href="#tab01" data-tab="tab01" class="top-tab">수강신청</a></li>
                    <li><a href="#tab02" data-tab="tab02" class="top-tab">인플루언서</a></li>
                    <li><a href="#tab03" data-tab="tab03" class="top-tab">커리큘럼 안내</a></li>
                    <li><a href="#tab04" data-tab="tab04" class="top-tab">수강후기</a></li>
                </ul>
            </div>  
        </div>  

        <div id="tab01">
            <div class="evtCtnsBox evt02">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/1849_02.jpg">
                <div class="btnbuy NSK-Black">
                    <a href="javascript:goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'on_lecture', 'Y');" onMouseDown="javascript:_PL('{{'https:'.front_url('/promotion/index/cate/3114/code/'.$data['PromotionCode'].'/order/Y')}}');">[온라인강의] 신청하기 ></a>
                </div>
                <div id="pass" class="infoCheck">
                    <input type="checkbox" name="y_pkg" value="172160" style="display: none;" checked/>
                    <input type="checkbox" id="is_chk" name="is_chk"><label for="is_chk">페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다. </label>
                    <a href="#infoText">이용안내 확인하기 ↓</a>
                </div>
            </div>
        </div>

        <div id="tab02">
            <div class="evtCtnsBox evt03">
                <iframe src="https://www.youtube.com/embed/CMDjINjDQyg?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div>
                    <img src="https://static.willbes.net/public/images/promotion/2020/09/1849_03.jpg" alt="2시한의 읽은척 책방" >
                </div>                
            </div>
            <div class="evtCtnsBox evt04">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1849_04.jpg" alt="인플루언서" >            
            </div>  
            <div class="evtCtnsBox evt05">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1849_05.jpg" alt=" " >
            </div>
            <div class="evtCtnsBox evt06">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1849_06.jpg" alt=" " >
            </div>
            <div class="evtCtnsBox evt07">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1849_07.jpg" alt=" " >
            </div>
            <div class="evtCtnsBox evt08">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1849_08.jpg" alt=" " >
            </div>
        </div>       


        <div id="tab03">
            <div class="evtCtnsBox evtCurriBox" id="evtCurriBoxSec">
                <div class="copy">
                    <h5 class="NSK-Black">
                        <div>자기경영 리더십</div>
                    </h5>
                    <div class="evtCurriBoxTxt01 NSK-Thin">우리가 배울 수 있는 과정은?</div>
                </div>

                <ul class="sample">
                    @if(empty($arr_base['promotion_otherinfo_data']) === false)
                        @php
                            // 셈플강의 4강,1강 하드코딩
                            $arr_sample_lecture = array_reverse($arr_base['promotion_otherinfo_data']);
                            $i = 1;
                            $arr_chapter = [1 => '4', 2 => '1']
                        @endphp
                        @foreach($arr_sample_lecture as $row)
                            <li>
                                <p>{{$arr_chapter[$i]}}강 맛보기 수강 ▼</p>
                                <a href="javascript:fnPlayerSample('{{$row['OtherData1']}}','{{$row['wUnitIdx']}}','HD');" class="btnst02">HIGH ></a>
                                <a href="javascript:fnPlayerSample('{{$row['OtherData1']}}','{{$row['wUnitIdx']}}','SD');" class="btnst03">LOW ></a>
                            </li>
                            @php $i += 1; @endphp
                        @endforeach
                    @else
                        <li><a href="#none">4강 맛보기 준비중 ></a></li>
                        <li><a href="#none">1강 맛보기 준비중 ></a></li>
                    @endif
                </ul>           

                <div class="evtCurriBoxTxt02">
                    * 동영상 수강을 위해서는 스타플레이어 설치 후 재생하셔야 합니다.<br>
                    스타플레이어 미설치 경우 맛보기 수강버튼 클릭시 설치 메시지가 팝업으로 뜹니다.<br>
                    팝업 확인이 안 될 경우 팝업 해제 후 다시 진행하시면 됩니다.
                </div>

                <div class="evtCurri">
                    <ul>
                        <li><strong>1강.</strong> 왜 다시 이순신인가?</li>
                        <li><strong>2강.</strong> 무에서 유를 만들어 내는 리더</li>
                        <li>&nbsp;</li>
                        <li><strong>3강.</strong> 정통 문신 집안 출신, 무인의 길을 걷다 </li>
                        <li><strong>4강.</strong> “임무” vs “업무”를 구분하여 파악하라</li>
                        <li><strong>5강.</strong> 성공적인 삶은 사는 사람들의 공통점은?</li>
                        <li>&nbsp;</li>
                        <li><strong>6강.</strong> NO!는 책임감의 언어</li>
                        <li><strong>7강.</strong> 절대권력 앞에서 과감히 "No!"를 외친 "대간제도"</li>
                        <li>&nbsp;</li>
                        <li><strong>8강.</strong> 필승전략의 귀재! 이순신 장군의 필승전략</li>
                        <li><strong>9강.</strong> 경쟁에서 이기고 싶다면 치열하게 계산하라!</li>
                        <li>&nbsp;</li>
                        <li><strong>10강.</strong> 통찰력의 원천을 찾아라!</li>
                        <li><strong>11강.</strong> 명량을 승리로 이끈 지적 능력</li>
                        <li><strong>12강.</strong> 듣는 기술로 학습을 완성하다</li>
                        <li>&nbsp;</li>
                        <li><strong>13강.</strong> 평온할 때 위기에 대비하라</li>
                        <li><strong>14강.</strong> 환경은 탓해야 할 대상이 아니라 극복해야 할 대상</li>
                        <li>&nbsp;</li>
                        <li><strong>15강.</strong> 치밀하게 정보를 수집하고 꼼꼼하게 기록하다</li>
                        <li><strong>16강.</strong> 정보수집의 집약체,  한산해전 승리의 비밀</li>
                        <li><strong>17강.</strong> 정보를 이용해 전략을 수립하라</li>
                        <li>&nbsp;</li>
                        <li><strong>18강.</strong> 400년을 뛰어넘어 일본의 존경을 받는 리더의 전략으로
                        코로나로 변화된 세상에서 반드시 승리할 수 있는 전략을 세워라</li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="tab04">
            <div class="evtCtnsBox evtReplyBox">
                @if(empty($data['ProdCode']) === false)
                    <div class="evtReply">
                        <div class="willbes-Reply p_re c_both"><a id="Reply" name="Reply" class="sticky-top"></a></div>
                        @include('willbes.pc.site.lecture.iframe_reply_partial')
                        <div class="TopBtn">
                            <a href="#none" onclick="goTop()"><span class="arrow-Btn">></span> TOP</a>
                        </div>
                    </div>
                @endif
            </div>           

        </div>

        <div class="evtFooter" id="infoText">
            <h3 class="NSK-Black">[이용 및 환불 안내]</h3>

            <p># 수강안내</p>
            <ul>
                <li>강좌의 표기된 수강기간 동안 동영상 강좌를 무제한 수강 할 수 있습니다. (내강의실 > '수강 중 강좌'에서 확인 가능)</li>
                <li>PC/휴대폰/태블릿에서 언제든 수강가능합니다.</li>
                <li>커리큘럼은 사정에 따라 일부 변동될 수 있으며, 강의 콘텐츠는 순차적으로 제공될 수 있습니다.</li>
                <li>동영상 수강을 위해서는 스타플레이어 설치 후 재생하셔야 합니다.<br>
                    스타플레이어 미설치 경우 맛보기 수강버튼 클릭시 설치 메시지가 팝업으로 뜹니다.<br>
                    팝업 확인이 안 될 경우 팝업 해제 후 다시 진행하시면 됩니다.</li>
                <li>결제 완료 시 강의는 즉시 수강 시작되오니, 이 점 참고 부탁 드립니다.</li> 
                <li>수강상품 이용기간 중에는 일시정지 기능을 이용할 수 없습니다.</li> 
                <li>본 강의는 재수강,수강연장은 불가능합니다.</li>     
            </ul>

            <p># 환불안내</p>
            <ul>
                <li>이용안내 및 환불 특약으로 안내된 별도 환불 기준이 있는 경우 우선 적용합니다.</li>
                <li>강의재생시간에 관계없이 강의를 재생한 경우, 학습 자료 및 모바일 다운로드 이용한 경우 수강한 것으로 간주합니다.(맛보기 강의 제외)</li>
                <li>강좌비*에서 기수강 강의수에 대한 금액* 및 위약금*(강의 정상가의 10%)을 차감 후 부분 환불이 진행됩니다.<br>
                * 강좌비: 결제금액에서 서비스프로그램 등 추가 혜택에 해당하는 금액을 차감한 순수강좌비<br>
                * 기수강강의 금액: 결제금액 - (전체 강좌 수 대비 강좌 정상가의 1회 이용대금×이용강의수)<br>
                * 수강시작일로부터 7일 이내 위약금 없음<br>
                * 수강시작일로부터 7일 이후 위약금 적용 (정상가의 10% 공제) </li>
                <li>지급된 솔루션, 사은품이 있는 경우 공급자의 교환, 환불 정책에 따릅니다.</li>
                <li>환불이 진행 된 후에는 자동 수강 종료됩니다.</li>
                <li>총강의수 전체 기수강 시에는 전액환불이 불가합니다.</li>
            </ul>

            <p># 기타유의사항</p>
            <ul>
                <li>제공되는 사은혜택과 동영상은 구분하여 별도구매 불가합니다.</li>
                <li>아이디 공유, 타인양도 등 부정사용 적발 시 회원 자격 박탈 및 환불 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 있을 수 있습니다. </li>
                <li>수강혜택 사은품으로 발급된 인증코드 및 쿠폰은 이벤트가 변경되거나 종료 될 경우 회수 될 수 있으며, 동일 혜택이 적용되지 않습니다.</li>
            </ul>

            <div>※ 이용문의 : 고객만족센터 1544-5006</div>
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">  
        /*스크롤고정*/
        $(function() {
            var nav = $('.evtMenu');
            var navTop = nav.offset().top+100;
            var navHeight = nav.height()+10;
            var showFlag = false;
            nav.css('top', -navHeight+'px');
            $(window).scroll(function () {
                var winTop = $(this).scrollTop();
                if (winTop >= navTop) {
                    if (showFlag == false) {
                        showFlag = true;
                        nav
                            .addClass('fixed')
                            .stop().animate({'top' : '0px'}, 100);
                    }
                } else if (winTop <= navTop) {
                    if (showFlag) {
                        showFlag = false;
                        nav.stop().animate({'top' : -navHeight+'px'}, 100, function(){
                            nav.removeClass('fixed');
                        });
                    }
                }
            });
        });

        $(window).on('scroll', function() {
            $('.top-tab').each(function() {
                if($(window).scrollTop() >= $('#'+$(this).data('tab')).offset().top) {
                    $('.top-tab').removeClass('active')
                    $(this).addClass('active');
                }
            });
        });

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDownText('{{$arr_promotion_params['edate']}}');
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