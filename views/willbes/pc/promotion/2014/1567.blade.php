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
            top:200px;
            right:10px;
            z-index:1;
            width:120px;
        }
        .skybanner a {display:block; margin-bottom:5px}

        .evtTop {background:#2e3366}

        .evtMenu {background:#fff; height:80px; width:100%; border-bottom:1px solid #edeff0}
        .tabs {width:1120px; margin:0 auto;}
        .tabs li {display:inline; float:left; width:25%}
        .tabs li a {display:block; text-align:center; font-size:16px; height:80px; line-height:80px; color:#999; font-weight:bold}
        .tabs li a:hover,
        .tabs li a.active {box-shadow:inset 0 -5px 0 rgba(0,0,0,1); color:#000}
        .tabs:after {content:""; display:block; clear:both}

        .evt01 {background:#f9e4d2;}

        .evt02 .btnbuy {width:720px; margin:50px auto 0}
        .evt02 .btnbuy a {border-radius:10px; display:block; font-size:40px; background:#000; color:#fff; padding:20px 0;}
        .evt02 .btnbuy a:hover {background:#6664ff;}

        .infoCheck {margin-top:30px; font-size:14px}
        .infoCheck label {margin-right:30px; cursor: pointer;}
        .infoCheck input[type=checkbox] {width:20px; height:20px; margin-right:10px}
        .infoCheck input[type=checkbox]:checked + label {border-bottom:1px dashed #0099ff; font-weight:bold; color:#0099ff} 
        .infoCheck a {display:inline-block; background:#333; color:#fff; height:30px; line-height:30px; text-align:center; padding:0 20px; border-radius:20px}
        .infoCheck a:hover {background:#6664ff;}

        .evt02 {background:#fff; padding-top:100px}
        .evt02 .evt02Txt01 {font-size:26px; line-height:1.1; margin-top:40px; letter-spacing:-1px; color:#464646}
        .evt02 .evt02Txt01 span {font-size:38px; box-shadow:inset 0 -30px 0 rgba(0,0,0,.1); color:#000}

        .evt03 {background:#fff; padding-top:100px}

        .evt04 {background:#f2f2f2;}

        .evt05 {background:#fff; padding-top:100px; text-align:left;}
        .evt05 .copy {width:720px; margin:0 auto;}
        .evt05 h5 {color:#00c73c; font-size:46px; line-height:1; margin-bottom:20px; letter-spacing:-1px;}
        .evt05 .evt05Txt01 {font-size:28px; margin:20px auto 80px}
        .evt05 .sample {width:720px; margin:0 auto}
        .evt05 .sample li {display:inline; float:left; width:49%; padding:20px; margin-right:1%; border-radius:10px; 
            background:#acacac; color:#fff; font-size:20px; font-weight:600; text-align:center}
        .evt05 .sample li p {margin-bottom:15px;}
        .evt05 .sample li a {display:inline-block; padding:10px 20px; font-size:16px; margin-right:10px; border-radius:8px; background:#000; color:#fff;}
        .evt05 .sample li a:hover {background:#fff; color:#000}
        .evt05 .sample li:last-child {margin:0}
        .evt05 .sample:after {content:""; display:block; clear:both}
        .evt05 .evt05Txt02 {width:720px; margin:0 auto; font-size:16px; line-height:1.4; margin-top:20px; text-align:left; letter-spacing:-1px; color:#333;}

        .evtCurri {width:720px; margin:50px auto 0; text-align:left}
        .evtCurri li {font-size:20px; margin-bottom:15px; color:#232323; letter-spacing:-1px}
        .evtCurri li.cTitle {color:#00c73c; font-size:28px; margin:50px 0 30px; font-family: "Noto Sans KR Black", "Noto Sans KR", "sans-serif" !important;}

        .evt06 {background:#f5f5f5; padding:150px 0 100px}
        .evt06 .columns {width:720px; margin:50px auto 0;
            column-count: 1;
            column-gap:20px;
        }
        .evt06 .columns div {
            text-align:justify; font-size:14px; line-height:1.4;
            display:inline-block;
            padding:20px; border:1px solid #eee; border-radius:10px;
            margin-bottom:20px; color:#888; background:#fff;
        }
        .evt06 .columns div p {border-bottom:1px solid #eee; margin-bottom:10px; padding-bottom:10px}
        .evt06 .columns div:hover {box-shadow:0 10px 10px rgba(102,102,102,0.2); color:#000}
        .evt06 .columns div strong {font-size:bold; color:#333}

        .evt07 {background:#6664ff; padding-bottom:100px}
        .evt07 ul {width:720px; margin:0 auto;}
        .evt07 li {display:inline; float:left; width:100%}
        .evt07 li a {display:block; font-size:24px; color:#fff; padding:20px 0; text-align:center; background:#000; line-height:1.5; border-radius:10px}
        .evt07 li a:hover {background:#fff; color:#000;
            -webkit-animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
            animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        }
        .evt07 li span {display:block; font-size:28px}
        .evt07 li:last-child a{margin-left:10px}
        .evt07 ul:after {content:""; display:block; clear:both}

        .evtCtnsBox iframe {width:940px; height:528px; margin:0 auto}

        .fixed {position:fixed; width:100%; background:rgba(255,255,255,0.5);
            background:#fff; box-shadow:0 10px 10px rgba(102,102,102,0.2); z-index:10
        }

        .evtFooter {width:900px; margin:0 auto; padding:100px 0; text-align:left; line-height:1.5; font-size:14px; color:#666; background:#fff !important}
        .evtFooter h3 {font-size:1.5rem; margin-bottom:30px; color:#000}
        .evtFooter p {font-size:1.1rem; margin-bottom:10px; color:#333;}
        .evtFooter div,
        .evtFooter ul {margin-bottom:30px; padding-left:10px}
        .evtFooter li {margin-left:20px; list-style-type: decimal; }

        .evtReply { width:940px; margin:0 auto; position:relative}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="skybanner" >
            <a href="#evt02"><img src="https://static.willbes.net/public/images/promotion/2020/05/1567_sky_01.png" alt="정문진대표"></a>
        </div>                  

		<div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1567_top.jpg" alt="정문진대표" >   
        </div> 

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1567_01.jpg" alt="정문진대표" >   
        </div>
        
        <div class="evtMenu">
            <ul class="tabs">
                <li><a href="#tab01" data-tab="tab01" class="top-tab">수강신청</a></li>
                <li><a href="#tab02" data-tab="tab02" class="top-tab">인플루언서</a></li>
                <li><a href="#tab03" data-tab="tab03" class="top-tab">커리큘럼 안내</a></li>
                <li><a href="#tab04" data-tab="tab04" class="top-tab">BEST 수강후기</a></li>
            </ul>
        </div> 

        <div id="tab01">
            <div class="evtCtnsBox evt02" id="evt02">
                <a href="https://njob.willbes.net/support/notice/show/cate/3114?board_idx=323127" target="_blank">
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/1567_02.jpg">
                </a>

                <div class="btnbuy NSK-Black"><a href="javascript:goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'on_lecture', 'Y');" onMouseDown="javascript:_PL('{{'https:'.front_url('/promotion/index/cate/3114/code/'.$data['PromotionCode'].'/order/Y')}}');">[온라인강의] 신청하기 ></a></div>
                <div id="pass" class="infoCheck">
                    <input type="checkbox" name="y_pkg" value="162746" style="display: none;" checked/>
                    <input type="checkbox" id="is_chk" name="is_chk"><label for="is_chk">페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다. </label>
                    <a href="#infoText">이용안내 확인하기 ↓</a>
                </div>
            </div>
        </div>

        <div id="tab02">
            <div class="evtCtnsBox evt03">
                <iframe src="https://www.youtube.com/embed/QZUkyd8EluI?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div><img src="https://static.willbes.net/public/images/promotion/2020/07/1567_03_01.jpg" alt="인플루언서" ></div>
                <div><img src="https://static.willbes.net/public/images/promotion/2020/07/1567_03_02.jpg" alt="인플루언서" ></div>
                <div><img src="https://static.willbes.net/public/images/promotion/2020/07/1567_03_03.jpg" alt="인플루언서" ></div>
            </div>
            <div class="evtCtnsBox evt04">
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1567_04.jpg" alt="e커머스 강좌소개" >
            </div>   
        </div>  

        <div id="tab03">
            <div class="evtCtnsBox evt05">
                <div class="copy">
                    <h5 class="NSK-Black">
                        <div>무재고 배송대행 도매매 샵플링</div>
                        <div>진짜 고수에게 배우는 이커머스 <br/>운영전략 커리큘럼</div>
                    </h5>
                    <div class="evt05Txt01 NSK-Thin">우리가 배울 수 있는 과정은?</div>
                </div>

                <ul class="sample">
                    @if(empty($arr_base['promotion_otherinfo_data']) === false)
                        @php $i = 1; @endphp
                        @foreach($arr_base['promotion_otherinfo_data'] as $row)
                            <li>
                                <p>{{$i}}강 맛보기 수강 ▼</p>
                                <a href="javascript:fnPlayerSample('{{$row['OtherData1']}}','{{$row['wUnitIdx']}}','HD');" class="btnst02">고해상도 ></a>
                                <a href="javascript:fnPlayerSample('{{$row['OtherData1']}}','{{$row['wUnitIdx']}}','SD');" class="btnst03">저해상도 ></a>
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
                    스타플레이어 미설치 경우 맛보기 수강버튼 클릭시 설치 메시지가 팝업으로 뜹니다.<br>
                    팝업 확인이 안 될 경우 팝업 해제 후 다시 진행하시면 됩니다.
                </div>

                <div class="evtCurri">
                    <ul>
                        <li class="cTitle">Chapter1. 쇼핑몰 창업 준비 사항</li>
                        <li>- 사업자신고 (온오프라인) 사업자등록증 발급방법</li>
                        <li>- 구매안전서비스 이용 확인증 발급방법</li>
                        <li>- 통신판매업 신고 방법 </li>
                        <li>- 오픈마켓 입점 방법</li>
                        <li>- 샵플링 가입 및 안내</li>

                        <li class="cTitle">Chapter2. 쇼핑몰 운영을 위한 유용한 정보</dt>
                        <li>- 필수 프로그램 이용방법<Br>
                            주문,클레임 알림 이용방법<Br>
                            캡처도구 이용방법</li>
                        <li>- 유용한 정보<Br>
                            무료팩스 이용방법<Br>
                            무료스캐너 이용방법<Br>
                            PC에서 문자 수발신 프로그램 이용방법<Br>
                            네이버 비즈넘버를 활용 한 가상 번호 받는 방법</li>                        

                        <li class="cTitle">Chapter3. 쇼핑몰 운영을 위한 통합 솔루션 기본 설정법</dt>
                        <li>- 도매매 API 연동하기</li>
                        <li>- 쇼핑몰 연동 하기(오픈마켓)</li>
                        <li>- 쇼핑몰 기본 정보 설정 방법</li>
                        <li>- G마켓 (상품등록 1.0, 상품등록 2.0)</li>
                        <li>- 옥션 (상품등록 1.0, 상품등록 2.0)</li>
                        <li>- 11번가 (일반상품 / 단일상품)</li>
                        <li>- 인터파크</li>
                        <li>- 스마트 스토어</li>

                        <li class="cTitle">Chapter4. 좋은 상품 소싱하는 방법과 우수 공급사 찾기</dt>
                        <li>- 시즌상품 키워드 선정방법 (ESM 시즌키워드)</li>
                        <li>- 상품판매 주기 확인방법 (네이버 데이터랩)</li>
                        <li>- 도매매 사이트 내 우수 상품 및 공급사 찾는 방법</li>

                        <li class="cTitle">Chapter5. 대량으로 쇼핑몰 상품 등록 및 발주하기</dt>
                        <li>- 샵플링을 통한 배송비 설정하기</li>
                        <li>- 샵플링을 통한 상품 대량 등록 방법</li>
                        <li>- 도매매 현금성 e-money 충전방법</li>
                        <li>- 도매매 주문 발주 방법</li>

                        <li class="cTitle">Chapter6. 고객 클레임 처리하는 방법</dt>
                        <li>- 가격변동 및 품절상태 대응 방법</li>
                        <li>- 주문관리 절차</li>
                        <li>- 고객 cs처리절차</li>

                        <li class="cTitle">Chapter7. 상품 노출을 위한 해시태그 사용법 및 기타 운영 팁</dt>
                        <li>- 스마트스토어 찜&톡톡 방법</li>
                        <li>- 11번가 인증키 설정 방법</li>
                        <li>- 전체상품 공지사항</li>
                        <li>- ebay 이미지 호스팅</li>

                        <li>(*커리큘럼은 사정에 따라 변동될 수 있으며, 강의 콘텐츠는 순차적으로 제공될 수 있습니다.)</li>
                    </ul>
                </div>
                <div class="evtCtnsBox"><img src="https://static.willbes.net/public/images/promotion/2020/07/1567_05.jpg" alt="" ></div>
            </div>
        </div>

        <div id="tab04">
            <div class="evtCtnsBox evt06">
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1567_06.jpg" alt="BEST 수강후기" >
                <div class="columns">
                    <div>
                        <h4>수강생 이*경님</h4>
                        <p></p>
                        2주차 부터는 본격적으로 스토어운영 관련 키워드 분석과 시즌 상품 키워드에 대해 실천 팁을
                        아낌없이 공개해주시는 강사님! 강사님 수업이 참 매력적이에요. 조용조용 할 얘기 다 하면서 웃자고 건넨 농담에 
                        그다지 웃기지 않는 반응에 대처하는 강사님이 귀여워요.
                    </div>  
                    <div>
                        <h4>수강생 김*용님</h4>
                        <p></p>
                        지난주 수업이 끝나고 이번 주는 혼자서 열심히 상품 등록하고 있어요.매일 꾸준히 상품에 대해 공부하면서
                        상품 등록을 반복해야 해요. 상품 등록은 익숙하게 잘 할 수 있어요. 샵플링을 통해 등록된 상품의 주문도 들어와서
                        발주 및 운송장 처리도 해봤어요. 아직은 주문이 많지 않아 서서히 하고 있어요.
                        앞으로 주문이 많아 질 날을 기대하면서, 좋은 상품을 찾아봅니다.
                        찾고 찾아 상품등록도 해보는 중입니다.
                    </div> 
                    <div>
                        <h4>수강생 신*한님</h4>
                        <p></p>
                        생각했던 것 보다 더, 기대했던 것보다 훨씬 더 내용이 알차고 좋았어요.
                        정문진 대표님이 실제 경험에서 우러난 강의여서 더욱더 좋았답니다.
                        다음기회에 한 번 더 들어보고 싶어요. 정문진 대표님의 동영상 강의도 찾아서 들어보려고 합니다.
                        수고해주신 강사님게 감사한 마음을 전합니다.
                    </div>           
                </div>
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

            <div class="evtCtnsBox evt07">
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1567_07.jpg" alt="BEST 수강후기" >
                <ul>
                    <li>
                        <a href="javascript:goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'on_lecture', 'Y');" onMouseDown="javascript:_PL('{{'https:'.front_url('/promotion/index/cate/3114/code/'.$data['PromotionCode'].'/order/Y')}}');">
                        <span class="NSK-Black">지금, 수강신청하고</span>
                        제2의 월급통장 만들기 도전! → 
                        </a>
                    </li>
                </ul>
            </div>	
        </div>

        <div class="evtFooter" id="infoText">
            <h3 class="NSK-Black">[이용 및 환불 안내]</h3>

            <p># 런칭기념  이벤트 안내</p>
            <div>강좌는 내 강의실 > 수강 중 강좌에서 확인 가능합니다.</div>

            <p># 수강안내</p>
            <ul>
                <li>강좌의 표기된 수강기간 동안 동영상 강좌를 무제한 수강 할 수 있습니다.</li>
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
                <li>지급된 솔루션, 사은품이 있는 경우 공급자의 교환, 환불 정책에 따릅니다.<br>
                (샵플링 프로그램 1개월 정가 275,000원 기준 환불시 기사용분 차감)</li>
                <li>환불이 진행 된 후에는 자동 수강 종료됩니다.</li>
                <li>총강의수 전체 기수강 시에는 전액환불이 불가합니다.</li>
            </ul>

            <p># 기타유의사항</p>
            <ul>
                <li>제공되는 사은혜택과 동영상은 구분하여 별도구매 불가합니다.</li>
                <li>아이디 공유, 타인양도 등 부정사용 적발 시 회원 자격 박탈 및 환불 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 있을 수 있습니다. </li>
                <li>수강혜택 사은품으로 발급된 인증코드 및 쿠폰은 이벤트가 변경되거나 종료 될 경우 회수 될 수 있으며, 동일 혜택이 적용되지 않습니다.</li>
                <li>지급된 샵플링 프로그램 이용을 위해서는 사업자등록번호가 필요합니다. (2020년 4월 9일 이전 별도 공지)</li>
            </ul> 

            <div>※ 이용문의 : 고객만족센터 1544-5006</div>
        </div>

        <div class="evtCtnsBox reply">
            {{--수강후기--}}
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