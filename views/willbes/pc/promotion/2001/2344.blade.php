@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative;}
        .evtCtnsBox .wrap a:hover {box-shadow:0 10px 10px rgba(0,0,0,.5); border-radius:30px}

        /************************************************************/
        .sky {position:fixed; width:120px; top:200px; right:10px; z-index:10;}
        .sky a {display:block; margin-bottom:10px}

        .evt00 {background:#0a0a0a}

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/08/2344_top_bg.jpg) no-repeat center top;}
        .evt_top div {position:absolute; top:200px; width:100%; z-index: 10;}

        .evt_01 {background:#010111; position:relative;}
        .evt_01 > div {position:absolute; top:998px; left:50%; margin-left:-335px}

        .evt_02 {background:#f3f3f3; position:relative;}

        .evt_02_01 {padding-top:150px}
        .evtTab {width:890px; margin:0 auto}
        .evtTab li {display:inline; float:left; width:50%}
        .evtTab li a {display:block; color:#898989; font-size:20px; padding:15px 0; border:5px solid #898989; border-bottom-color:#000; font-weight:bold; margin-top:15px}       
        .evtTab li:first-child a {border-right:0}
        .evtTab li:last-child a {border-left:0}
        .evtTab li a:hover,
        .evtTab li a.active {color:#000; border:5px solid #000; border-bottom-color:#fff; font-size:24px; padding:20px 0;margin-top:0}
        .evtTab:after {content:''; display:block; clear:both}

        .evt_03 {background:#0261b5;}  

        .evt_04 {background:#ececec; padding-bottom:100px}     
        .evt_04 .evt03Box {width:1120px; margin:0 auto; position:relative}
        .evt_04 .check {font-size:16px; text-align:center; line-height:1.5;margin-top:40px;font-weight:bold;}
        .evt_04 .check input {border:2px solid #000; margin-right:10px; height:20px; width:20px}
        .evt_04 .check a {display:inline-block; padding:5px 20px; color:#fff; background:#000; margin-left:20px; border-radius:20px}
        .evt_04 .check a:hover {color:#333; background:#35fffa;}
        .evt_04 .info {margin:20px auto 50px; padding:10px;line-height:1.4; font-size:14px; font-weight:bold;}

        .evt_05 {padding-bottom:150px}  

        .evtInfo {padding:80px 0; background:#333; color:#fff; font-size:16px}
		.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:40px; margin-bottom:30px}
		.evtInfoBox .infoTit {font-size:20px; margin-bottom:20px}
		.evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox ul li {list-style-type: disc; margin-left:20px; margin-bottom:10px; font-size:14px}

        /* 슬라이드배너 */
        .slide_con {position:relative; width:669px; margin:0 auto}
        .slide_con p {position:absolute; top:50%; width:46px; height:82px; margin-top:-41px; z-index:100}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-100px}
        .slide_con p.rightBtn {right:-100px}
        #slidesImg4 {width:669px; height:370px; overflow:hidden}
        #slidesImg4 li {display:inline; float:left}
        #slidesImg4 li img {width:100%}
        #slidesImg4:after {content::""; display:block; clear:both} 
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="sky" id="QuickMenu">
            <a href="#evt03"><img src="https://static.willbes.net/public/images/promotion/2021/08/2344_sky1.jpg" alt="이벤트 하나"/></a>
            <a href="#evt04"><img src="https://static.willbes.net/public/images/promotion/2021/08/2344_sky2.jpg" alt="이벤트 둘"/></a>
        </div>

        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div>

        <div class="evtCtnsBox evt_top">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2344_top_txt.png"  alt="해양경찰 등불쌤 합격패스" data-aos="fade-left"/>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2344_top.jpg"  alt="해양경찰 등불쌤 합격패스" />
        </div>

        <div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2344_01.jpg"  alt="왜 등불쌤인가?" />
            <div>
                <div class="slide_con">
                    <ul id="slidesImg4">
                        <li><img src="https://static.willbes.net/public/images/promotion/2021/05/2208_01_01.jpgg" alt="" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2021/05/2208_01_02.jpg" alt="" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2021/05/2208_01_03.jpg" alt="" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2021/05/2208_01_04.jpg" alt="" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2021/05/2208_01_05.jpg" alt="" /></li>
                    </ul>
                    <p class="leftBtn"><a id="imgBannerLeft4"><img src="https://static.willbes.net/public/images/promotion/2021/05/2208_p_prev.png" alt="left" /></a></p>
                    <p class="rightBtn"><a id="imgBannerRight4"><img src="https://static.willbes.net/public/images/promotion/2021/05/2208_p_next.png" alt="right" /></a></p>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox evt_02">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2344_02.jpg"  alt="학습 PLAN" />     
                <a href="https://blog.naver.com/psb7817/221996517237" target="_blank" title="필기부터 면접까지" style="position: absolute; left: 20.54%; top: 82.75%; width: 11.7%; height: 3.8%; z-index: 2;"></a>
                <a href="https://blog.naver.com/psb7817/222211861661" target="_blank" title="해양경찰 공부는 이렇게" style="position: absolute; left: 67.32%; top: 82.75%; width: 11.7%; height: 3.8%; z-index: 2;"></a>
            </div>       
        </div>

        <div class="evtCtnsBox evt_02_01">
            <ul class="evtTab">
                <li><a href="#tab01" class="active">2021년 해양경찰을 말하다</a></li>
                <li><a href="#tab02">2022년 해양경찰을 말하다</a></li>
            </ul>
            <div id="tab01"><img src="https://static.willbes.net/public/images/promotion/2021/08/2344_02_01.jpg"  alt="2021년 해양경찰을 말하다" /></div>
            <div id="tab02"><img src="https://static.willbes.net/public/images/promotion/2021/08/2344_02_02.jpg"  alt="2022년 해양경찰을 말하다" /></div>    
        </div>

        <div class="evtCtnsBox evt_03" id="evt03">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2344_03.jpg"  alt="스폐셜 혜택" />
                <a href="javascript:void(0);" onclick="certOpen();" title="수험표 인증하기" style="position: absolute; left: 54.11%; top: 62.27%; width: 33.13%; height: 5.91%; z-index: 2;"></a>
            </div>          
        </div>

        <div class="evtCtnsBox evt_04" id="evt04">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2344_04.jpg"  alt="합격패스" />
                <a href="javascript:void(0);" onclick="go_PassLecture(3008, 183573);" title="항해술 패스" style="position: absolute;left: 14.4%;top: 91.36%;width: 22.5%;height: 8.83%;z-index: 2;"></a>
                <a href="javascript:void(0);" onclick="go_PassLecture(3008, 183575);" title="해양공채 패스" style="position: absolute;left: 38.8%;top: 91.36%;width: 22.5%;height: 8.83%;z-index: 2;"></a>
                <a href="javascript:void(0);" onclick="go_PassLecture(3007, 183576);" title="해양공채 패스" style="position: absolute;left: 63%;top: 91.36%;width: 22.5%;height: 8.83%;z-index: 2;"></a>
            </div>
            <div class="check">
                <label><input name="ischk" type="checkbox" value="Y" />페이지 하단 합격PASS 이용안내를 모두 확인하였고, 이에 동의합니다.</label>
                <a href="#careful">이용안내 확인하기 ↓</a>               
            </div>
            <div class="info">
                ※ 강좌 및 교수진은 학원 사정에 따라 변경될 수 있습니다.<br>
                ※ 한정 상품으로 할인쿠폰이 사용불가한 상품입니다.(공채인증 쿠폰제외)
            </div>
        </div>

        <div class="evtCtnsBox evt_05" id="evt05">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2344_05.jpg"  alt="온라인 단과강의 신청" /> 
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif         
        </div>

        <div class="evtCtnsBox evtInfo" id="careful">
			<div class="evtInfoBox">
				<h4 class="NSK-Black">[윌비스 X 등불쌤] 2021-11기+12기 합격PASS 이용안내</h4>
				<div class="infoTit NSK-Black">▶  2021-11기+12기 합격PASS </div>
				<ul>
                    <li>구매일 기준 12개월 동안 수강 가능합니다. (365일</li>
                    <li>합격PASS 강좌는 결제가 완료되는 즉시 수강이 시작됩니다. (결제완료자에 한함)</li>
                    <li>선택한 합격PASS  상품의 표기된 기간 동안 동영상 강좌를 무제한 수강 할 수 있습니다.(3베수 제한 상품)</li>
                    <li>상품기간 종료 시 수강 중이던 강좌가 모두 종료됩니다.</li>
                    <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
				</ul>

                <div class="infoTit NSK-Black">▶ 상품구성</div>
                <div class="tx16 mb20">
                    * 등불쌤 10기 강의 : 1월 진행 + 11기강의 : 7월 진행 + 12기강의 : 12월예정(10기+11+12기기 합쳐진 상품입니다)<br>
                    * 각합격 PASS별 구성진행(4과목 / 3과목 / 2과목)
                </div>
				<ul>
                    <li>등불쌤 해사법규 (10기 + 11기+12기) : 등불쌤 교수님의 해사법규 10기+11+12기 전 강좌를 3배수제한으로 수강할 수 있습니다</li>
                    <li>등불쌤 해양경찰학 (10기 + 11기+12기) : 등불쌤 교수님의 해양경찰학 10기+11+12기 전 강좌를 3배수제한으로 수강할 수 있습니다.</li>
                    <li>등불쌤 해사영어 (10기 + 11기+12기) : 등불쌤 교수님의 해사영어 10기+11+12기 전 강좌를 3배수제한으로 수강할 수 있습니다.</li>
                    <li>등불쌤 항해술 (10기 + 11기+12기) : 등불쌤 교수님의 항해술 10기+11+12기 전 강좌를 3배수제한으로 수강할 수 있습니다.</li>
				</ul>

                <div class="infoTit NSK-Black">▶ 교재</div>
				<ul>
                    <li>합격PASS 수강에 필요한 교재는 별도로 구매 하셔야 하며, 각 강좌 별 교재는 강좌소개 및 교재구매 메뉴에서 별도 구매 가능합니다. <br>
                    (해사법규 -3권세트 , 해양경찰학 – 2권세트 , 해사영어 – 2권세트 , 항해술 – 2권세트)</li>
				</ul>

                <div class="infoTit NSK-Black">▶ 수강 안내</div>
				<ul>
                    <li>로그인 후 [내강의실] → [무한PASS존]으로 접속합니다.</li>
                    <li>구매한 PASS 상품 선택 후 [강좌추가]를 클릭, 원하는 강좌를 등록한 후 수강할 수 있습니다.</li>
                    <li>강의는 순차 업로드 예정이며 업로드 일정은 강의 진행일정에 따라 변경될 수 있습니다.</li>
                    <li>합격패스는 일시 정지, 수강 연장, 재수강 불가합니다.</li>
                    <li>합격패스 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다. <br>
                    총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대</li>
                    <li>PC, 모바일 기기에 대한 초기화가 필요할 경우 최초 초기화에 한해서는 수강생 본인이 초기화가 가능합니다. <br>
                     ([내강의실] → [무한PASS존]에서 등록기기정보 확인) 추후 초기화가 필요할 시 유선(온라인 고객센터)이나 게시판을 통해 요청이 가능하고, 수강 기간 동안 3회 신청이 가능합니다.</li>
				</ul>

                <div class="infoTit NSK-Black">▶ 환불정책</div>
				<ul>
                    <li>전액환불 : 결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                    <li>부분환불 : 결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                    <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                    <li>고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, 합격패스 결제가 기준으로 계산하여 사용일수만큼 차감 후 환불됩니다. </li>
				</ul>

                <div class="infoTit NSK-Black">▶ 유의사항</div>
				<ul>
                    <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 부탁드립니다.
                        (단, 공채합격PASS는 공채인증시 쿠폰사용가능)</li>
                    <li>합격패스 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며, 이로 인한 환불은 불가합니다.</li>
                    <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강중인 PASS 강좌는 즉시 정지, 회원 자격이 박탈됩니다. 이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생 할 수 있습니다.</li>
				</ul>
                <div class="infoTit NSK-Black">※ 이용문의 : 고객센터 1544-5006 / 사이트 내 1:1 상담 게시판</div>
			</div>
		</div> 
    </div>
    <!-- End Container -->

    <script>
        function go_PassLecture(cate, code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var _url = '{{ site_url('/periodPackage/show/cate/')}}' + cate + '/pack/648001/prod-code/' + code;
            location.href = _url;
        }

        function certOpen(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            @if(strtotime(date('YmdHi')) >= strtotime($arr_promotion_params['edate'] . ' ' . $arr_promotion_params['etime']))
                alert('이벤트가 종료되었습니다.');
                return;
            @endif

            @if(empty($cert_apply) === false)
                alert("이미 인증이 완료된 상태입니다.");
                return;
            @endif

            @if(empty($arr_promotion_params["page"]) === false && empty($arr_promotion_params["cert"]) === false)
                var url = '/certApply/index/page/{{$arr_promotion_params["page"]}}/cert/{{$arr_promotion_params["cert"]}}' ;
                window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
            @else
                alert('프로모션 추가 파라미터가 지정되지 않았습니다.');
            @endif
        }

        $(document).ready(function(){
            $('.evtTab').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');

                $content = $($active[0].hash);

                $links.not($active).each(function () {
                    $(this.hash).hide()});

                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    $active.removeClass('active');
                    $content.hide();

                    $active = $(this);
                    $content = $(this.hash);

                    $active.addClass('active');
                    $content.show();

                    e.preventDefault()}
                )}
            )}

            var slidesImg4 = $("#slidesImg4").bxSlider({
                mode:'horizontal',
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false,
            });

            $("#imgBannerLeft4").click(function (){
                slidesImg4.goToPrevSlide();
            });

            $("#imgBannerRight4").click(function (){
                slidesImg4.goToNextSlide();
            });
            
        });
    </script>

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );
    </script>

@stop