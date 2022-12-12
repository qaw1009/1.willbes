@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:20px auto 0;
            padding:0 !important;
            background:#fff;     
            font-size:14px;       
            line-height:1.3;
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000} */

        /************************************************************/


        .sky {position:fixed;top:200px;right:10px;z-index:100;}
        .sky a {display:block; margin-bottom:10px}

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/12/2837_top_bg.jpg) no-repeat center top;}

        .evt_01 {background:#e6e6e6;}      
        .evt_03 {background:#131719;} 
        .evt_04 {background:#6b8fb1;}

        .evtPass {background:#0f181d; padding:150px 0}
        .evtPass .title01 {font-size:40px; color:#d5d5d5; margin-bottom:100px}
        .evtPass ul {width:1030px; margin:0 auto 20px; display:flex}
        .evtPass ul li {width:33.3333%}
        .evtPass ul li a {font-size:30px; color:#506266; background:#192229; padding:15px 0; border-radius:6px; display:block; margin-right:20px}
        .evtPass ul li:last-child a {margin-right:0}
        .evtPass ul li a p {font-size:20px}
        .evtPass ul li a.active {color:#fff; background:#3f80d8; }
        .evtPass .tabCts {width:1030px; margin:50px auto; position: relative;}
        .evtPass .tabCts a {display:block; background:#000; font-size:30px; color:#fff; padding:20px 0; background:#3f80d8; border-radius:60px; box-shadow:10px rgba(0,0,0,.5); width:500px; position: absolute; left:50%; margin-left:-250px; bottom:-30px; z-index: 2;}
        .evtPass .tabCts a:hover {background:#073ef3}

        .evtPass input[type="checkbox"] {height:20px; width:20px; vertical-align:middle}

        .evtPass .check {width:1030px; margin:0 auto; padding:20px; font-size:16px; color:#fff; letter-spacing:-1px;}
        .evtPass .check a {display:inline-block; padding:10px 20px; color:#fff; background:#333; margin-left:40px; border-radius:20px; font-size:12px}
        .evtPass .check p {font-size:14px; padding:10px 0 0 20px; line-height:1.4}
        .evtPass .check input:checked + label {border-bottom:1px dashed #3f80d8; color:#3f80d8}  

        /* 이용안내 */
        .content_guide_wrap{background:#f3f3f3; padding:100px 0; font-size:14px}
        .content_guide_wrap .wrap {width:1000px; margin:0 auto; position:relative}
        .content_guide_wrap .guide_tit{margin-bottom:50px; text-align:left; font-size:30px;}

        .content_guide_box dl{margin:0 20px; word-break:keep-all;}
        .content_guide_box dt{margin-bottom:10px}
        .content_guide_box dt h3{color:#fff; background:#333; display:inline-block; padding:3px 7px; margin-right:10px; font-size:120%}
        .content_guide_box dt img.btn{padding:2px 0 0 0}
        .content_guide_box dd{color:#777; margin:0 0 20px 5px; line-height:17px}
        .content_guide_box dd strong {color:#555}
        .content_guide_box dd li{margin-bottom:5px; list-style:decimal; margin-left:20px; line-height:1.5}
    </style>


    <div class="evtContent NSK" id="evtContainer">
        <div class="sky" id="QuickMenu">
            <a href="#event">
                <img src="https://static.willbes.net/public/images/promotion/2022/12/2837_sky01.png" alt="윌비스 경찰 패스">
            </a>  
            <a href="#tpass">
                <img src="https://static.willbes.net/public/images/promotion/2022/12/2837_sky02.png" alt="올인원 T-PASS">
            </a> 
        </div>

        <div class="evtCtnsBox evt_top" data-aos="fade-up">    
            <img src="https://static.willbes.net/public/images/promotion/2022/12/2837_top.jpg" alt="올인원 경찰 T-PASS"/>           
		</div>

        <div class="evtCtnsBox evt_01" data-aos="fade-up">    
            <img src="https://static.willbes.net/public/images/promotion/2022/12/2837_01.jpg" alt=""/>           
		</div>

        <div class="evtCtnsBox evt_02" data-aos="fade-up">    
            <img src="https://static.willbes.net/public/images/promotion/2022/12/2837_02.jpg" alt=""/>           
		</div>

        <div class="evtCtnsBox evt_03" data-aos="fade-up">    
            <img src="https://static.willbes.net/public/images/promotion/2022/12/2837_03.jpg" alt=""/>           
		</div>

        <div class="evtCtnsBox evt_04" data-aos="fade-up" id="event">    
            <img src="https://static.willbes.net/public/images/promotion/2022/12/2837_04.jpg" alt=""/>           
		</div>

        <div class="evtCtnsBox evtPass" data-aos="fade-up" id="tpass">
            <div class="title01 NSK-Black">2023 합격대비 윌비스경찰 올인원 T-PASS</div>
            <ul class="tabs NSK-Black">
                <li><a href="#tab1"><p>헌법</p>이국령</a></li>
                <li><a href="#tab2"><p>형사법</p>임종희</a></li>
                <li><a href="#tab3"><p>형사법</p>문형석&김한기</a></li>
            </ul>
            <div class="tabCts">
                <div id="tab1">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2837_05_01.png" alt=""/>
                    <a href="javascript:go_PassLecture('203784');" class="NSK-Black">이국령 헌법 신청 ></a>
                </div>
                <div id="tab2">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2837_05_02.png" alt=""/>
                    <a href="javascript:go_PassLecture('203736');" class="NSK-Black">임종희 형사법 신청 ></a> 
                </div>
                <div id="tab3">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2837_05_03.png" alt=""/>
                    <a href="javascript:go_PassLecture('203735');" class="NSK-Black">문형석 & 김한기 형사법 신청 ></a> 
                </div>
            </div>

            <div class="check">
                <label>
                    <input type="checkbox" name="ischk" value="Y">
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#careful">이용안내확인하기 ↓</a>
                <p>
                    ※ 강의공유, 콘텐츠 부정사용 적발 시, 패스의 수강기간 갱신 및 환급이 불가합니다.<br>
                    ※ 스페셜한정상품으로 할인쿠폰사용이 불가한 상품입니다.
                </p>
            </div>
        </div>                
        
        <div class="content_guide_wrap" id="careful">
            <div class="wrap">
                <p class="guide_tit">윌비스 경찰<span class="NSK-Black tx-blue"> 올인원 T-PASS </span> 이용안내 </p>
                <div class="content_guide_box">
                    <dl>
                        <dt>
                            <h3>상품구성</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>본 상품은 구매일로부터 수강기간은 12개월 동안 들을수 있는 기간제  T-PASS 입니다.<br>
                                    (이벤트 1개월 추가로 총 13개월 입니다)</li>
                                    <li>본 상품 강좌 구성은  각 교수님별로 다음과 같습니다.<br>
                                * 헌법 : 이국령 교수님<br>
                                * 형사법 : 임종희 교수님<br>
                                * 형사법(형법/형소법) : 문형석 & 김한기 교수님</li>
                                <li>선택한 윌비스 경찰 올인원 T-PASS 상품의 표기된 기간 동안 동영상 강좌를 무제한 수강할 수 있습니다.</li>
                                <li>윌비스경찰 올인원 T-PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다. (결제완료자에 한함)</li>
                                <li>강좌 스케줄 및 커리큘럼은 학원 사정에 따라 변동될 수 있습니다.</li>          
                            </ol>
                        </dd>

                        <dt>
                            <h3>교재 및 포인트</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>윌비스 경찰 올인원 T-PASS 수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌 별 교재는 강좌 소개 및 교재 구매 메뉴에서 별도 구매 가능합니다.</li>                      
                            </ol>
                        </dd>

                        <dt>
                            <h3>환불</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>결제 후 7일 이내 3강 이하 수강시에만 전액 환불 가능합니다.</li>
                                <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                                <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                                <li>고객 변심으로 인한 환불은 수강 시작일 (당일 포함)로부터 7일이 경과되면, 윌비스 경찰T-PASS 결제가 기준으로 계산하여 사용일 수만큼 차감 후 환불됩니다. (단, 가산점 특강, 온라인 모의고사 등 이용 시에도 차감)</li>
                                <li>포인트를 사용하였을 경우 사용한 포인트만큼 차감 후 환불 진행되며, 남은 포인트는 회수됩니다.<br>
                                    (포인트 미사용일 경우 추가 차감 없이 포인트 회수 후 환불 진행)</li>                    
                            </ol>
                        </dd>

                        <dt>
                            <h3>수강</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>로그인 후 [내 강의실]에서 [무한PASS존]으로 접속합니다.</li>
                                <li>구매한 PASS 상품 선택 후 [강좌추가하기]를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                                <li>윌비스 경찰 올인원 T-PASS는 일시 정지, 수강 연장, 재수강 불가합니다.</li>
                                <li>윌비스 경찰 올인원 T-PASS 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다.<br>
                                    총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대</li>
                                <li>PC, 모바일 기기에 대한 초기화가 필요할 경우 최초 초기화에 한해서는 수강생 본인이 초기화가 가능합니다. 다만 추후 초기화가 필요할 시 내용 확인 후 가능하오니 고객센터로 문의하시기 바랍니다.<br> 
                                    ([내 강의실] 내 [무한PASS존]에서 등록기기정보 확인)</li>
                                <li>일부 강좌의 경우 자료 출력 횟수 제한이 적용될수 있습니다. <br>
                                    (2단계 동형 모의고사, 3단계 파이널 모의고사 등)</li>
                            </ol>
                        </dd>

                        <dt>
                            <h3>유의사항</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.(단,이벤트시 쿠폰사용가능)</li>
                                <li>윌비스 경찰 올인원 T-PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며, 이로 인한 환불은 불가합니다.</li>
                                <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 PASS 강좌는 즉시 정지, 회원 자격이 박탈됩니다.<br>
                                    이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생할 수 있습니다.</li>
                                <li>온,오프라인 동시 시행되는 이벤트, 무료특강 등의 경우 해당 강좌는 PASS에 미지급 되거나, 이벤트 종료 후 제공될 수 있습니다.</li>
                                <li>PASS 관련 발급된 쿠폰은 이벤트가 변경되거나 종료될 경우 자동 회수될 수 있으며, 동일 혜택이 적용되지 않을 수 있습니다.</li>
                            </ol>
                        </dd>
                    </dl>
                </div>                
            </div>
        </div>
    </div>
    <!-- End evtContainer -->


	<script type="text/javascript">
        $(document).ready(function(){
            $('.tabs').each(function(){
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
            
                e.preventDefault()})}
            )}
        );

        /*수강신청 동의*/ 
        function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ site_url('/periodPackage/show/cate/3001/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }
    </script>

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
      $(document).ready( function() {
        AOS.init();
      });
    </script>

    
    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop