@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
    <style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:1.4vh; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtCtnsBox .wrap {margin:0 auto; position:relative}
    /*.evtCtnsBox .wrap a {border:1px solid #000}*/

    /************************************************************/


    .evt_05 {padding-bottom:3vh; background:#0f181d; color:#fff }
    .evt_05 > a {display:block; margin-bottom:1.5vh; position: relative;}
    .evt_05 > a span {font-size:2vh; color:#fff; padding:10px 20px; background:#3f80d8; border-radius:40px; box-shadow:10px rgba(0,0,0,.5); position: absolute; left:10%; bottom:1.5vh; z-index: 2;}
    .evtCtnsBox .check{margin:30px 20px 50px; font-size:1.5vh; text-align:center; line-height:1.5; letter-spacing:-1px;}
    .evtCtnsBox .check label{font-weight:bold;}
    .evtCtnsBox .check input {border: 2px solid #000;margin-right: 8px;height: 20px; width: 20px;} 
    .evtCtnsBox .check a {display: block; width:60%; padding:5px 20px; color: #fff;background: #000;border-radius:20px; margin:20px auto}
    .evtCtnsBox .check a:hover {background-color:#073ef3;}


    /* 이용안내 */
    .wb_info {padding:50px 20px; color:#3a3a3a; line-height:1.4; background:#f4f4f4}
    .guide_box{text-align:left; word-break:keep-all}
    .guide_box h2 {font-size:3vh; margin-bottom:30px;}
    .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; padding:5px 10px; font-weight:bold; margin-right:10px; font-size:1.8vh;}        
    .guide_box dd{color:#3a3a3a; margin:0 0 20px 5px;}
    .guide_box dd li{margin-bottom:3px; list-style:decimal; margin-left:20px;font-size:1.5vh;font-weight:bold;}

    </style>

    <div id="Container" class="Container NSK c_both">  

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/12/2837m_top.jpg" alt="윌비스 경찰 패스">
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/12/2837m_01.jpg" alt="">
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/12/2837m_02.jpg" alt="">
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/12/2837m_03.jpg" alt="">
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/12/2837m_04.jpg" alt="">
        </div>

        <div class="evtCtnsBox evt_05" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/12/2837m_05_01.jpg" alt="" />	
            <a href="javascript:go_PassLecture('203784');" title=""><img src="https://static.willbes.net/public/images/promotion/2022/12/2837m_05_02.jpg" alt="" /><span>신청하기 ></span></a>
            <a href="javascript:go_PassLecture('203736');" title=""><img src="https://static.willbes.net/public/images/promotion/2022/12/2837m_05_03.jpg" alt="" /><span>신청하기 ></span></a>
            <a href="javascript:go_PassLecture('203735');" title=""><img src="https://static.willbes.net/public/images/promotion/2022/12/2837m_05_04.jpg" alt="" /><span>신청하기 ></span></a>
            <a href="javascript:go_PassLecture('206615');" title=""><img src="https://static.willbes.net/public/images/promotion/2023/03/2837m_05_05.jpg" alt="" /><span>신청하기 ></span></a>
            <div class="check">
                <label>
                    <input type="checkbox" name="ischk" value="Y">
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다   
                </label>
                <a href="#careful">이용안내확인하기 ↓</a>
                <p>
                    ※ 강의공유, 콘텐츠 부정사용 적발 시, 패스의 수강기간 갱신 및 환급이 불가합니다.<br>
                    ※ 스페셜한정상품으로 할인쿠폰사용이 불가한 상품입니다.
                </p>
            </div> 
		</div>


        <div class="evtCtnsBox wb_info" id="notice">
            <div class="guide_box">
                <h2 class="NSK-Black">윌비스경찰 올인원 T-PASS 이용안내</h2>
                <dl>
                    <dt>상품구성</dt>
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

                    <dt>교재 및 포인트</dt>
                    <dd>
                        <ol>
                            <li>윌비스 경찰 올인원 T-PASS 수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌 별 교재는 강좌 소개 및 교재 구매 메뉴에서 별도 구매 가능합니다.</li>
                        </ol>
                    </dd>

                    <dt>환불</dt>
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

                    <dt>수강</dt>
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

                    <dt>유의사항</dt>
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
    <!-- End Container -->

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
      $(document).ready( function() {
        AOS.init();
      });
    </script>

    <script type="text/javascript">     
        /*수강신청 동의*/ 
        function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ front_url('/periodPackage/show/cate/3001/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }    
    </script>
@stop