@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
    <style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtCtnsBox .wrap {margin:0 auto; position:relative}
    /*.evtCtnsBox .wrap a {border:1px solid #000}*/

    /************************************************************/

    .evtCtnsBox .check{margin:30px 20px 50px; font-size:14px; text-align:center;line-height:1.5;
					  letter-spacing:-1px;font-weight:bold;}
    .evtCtnsBox .check label{color:#000}
    .evtCtnsBox .check input {border: 2px solid #000;margin-right: 8px;height: 20px; width: 20px;} 
    .evtCtnsBox .check a {display: block; width:60%; padding:5px 20px; color: #fff;background: #000;border-radius:20px; margin:20px auto}
    .evtCtnsBox .check a:hover {background-color:#613EE3; color:#fff}

    /* 이용안내 */
    .wb_info {padding:50px 20px; color:#3a3a3a; line-height:1.4; background:#f4f4f4}
    .guide_box{text-align:left; word-break:keep-all}
    .guide_box h2 {font-size:3vh; margin-bottom:30px;}
    .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; padding:5px 10px; font-weight:bold; margin-right:10px; font-size:1.8vh;}        
    .guide_box dd{color:#3a3a3a; margin:0 0 20px 5px;}
    .guide_box dd li{margin-bottom:3px; list-style:decimal; margin-left:20px;font-size:1.5vh;font-weight:bold;}

    </style>

    <div id="Container" class="Container NSK c_both">  

        <div class="evtCtnsBox" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2746m_top.jpg" alt="온라인 종합반">
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2746m_01.jpg" alt="이벤트 특별혜택">
        </div>

        <div class="evtCtnsBox evt_02" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2022/08/2746m_02.jpg" alt="gs0순환이란" />            
		</div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2746m_03.jpg" alt="강사진">
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/08/2746m_04.jpg" alt="강의 신청하기" />
                <a href="javascript:go_PassLecture('200478');" title="" style="position: absolute;left: 0%;top: 83.33%;width: 100%;height: 17.71%;z-index: 2;"></a>               
            </div>
            <div class="check">
                <label>
                    <input type="checkbox" name="ischk" value="Y">
                    페이지 하단 노무 2차 GS0순환 선택형 종합반 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#notice">이용안내확인하기 ↓</a>
            </div>
        </div>

        <div class="evtCtnsBox wb_info" id="notice">
            <div class="guide_box">
                <h2 class="NSK-Black">상품 이용안내</h2>
                <dl>
                    <dt>상품구성</dt>
                    <dd>
                        <ol>
                            <li>본 상품은 2022년 9월~12월에 진행되는 [공인노무사 2차 GS0순환 강의] 과정입니다.<br>
                                동영상 강의는 실강 진행 후 다음날 동영상 업로드(주말/공휴일/일요일 제외) 됩니다.
                            <li>
                            <li>강사배정 및 학원사정에 따라 강의가 진행이 되지 않을 경우 다른 강사님의 강의로 변경하실 수 있습니다.<br>
                                강의는 순차적으로 업로드 예정이며, 강의 일시와 횟수는 변경될 수 있습니다.
                            </li>
                        </ol>
                    </dd>

                    <dt>수강관련</dt>
                    <dd>
                        <ol>
                            <li>본 상품 신청 시 컴퓨터, 스마트 기기를 이용하여 자유롭게 수강하실 수 있습니다.</li>
                            <li>본 상품은 2배수 수강제한이 되어있습니다.</li>
                        </ol>
                    </dd>

                    <dt>교재관련</dt>
                    <dd>
                        <ol>
                            <li>본 상품 강의별 교재는 별도로 주문하셔야 합니다.</li>
                            <li>본 상품 강의별 교재는 동영상 강의 신청 후 내강의실 바로가기 → 「강의보기」를 클릭하신 후 주문하실 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dt>결제/환불관련</dt>
                    <dd>
                        <ol>
                            <li>본 패키지 강좌의 환불시 패키지 구성 일부 과목만의 환불은 불가하며, 패키지 전체 환불만 가능합니다.</li>
                            <li>자세한 환불규정은 다음의 각 호의 규정에 따릅니다.<br/>
                                ① 강좌 파일을 열거나 강좌 자료 및 모바일 다운로드 이용 시 수강한 것으로 간주합니다.<br/>
                                ② 고객 변심으로 인한 환불은 해당 상품의 정가 기준으로 계산하여 수강하신 회차만큼 차감 후 환불됩니다.<br/>
                                ③ 강좌 차감액이 결제 금액을 초과할 시에는 환불이 불가합니다.
                            </li>
                        </ol>
                    </dd>

                    <dt>유의사항</dt>
                    <dd>
                        <ol>
                            <li>아이디 공유 및 불법공유 행위 적발 시 회원자격 박탈 및 고발 조치가 진행될 수 있습니다.</li>
                            <li>본 상품은 PC 식별코드인 MAC ADDRESS 수집에 동의하셔야 구매 및 수강이 가능합니다.</li>
                            <li>[MAC ADDRESS 안내]<br>
                            본 상품은 MAC 주소 정보 수집에 동의 후 구매할 수 있습니다.<br>
                            윌비스는 정당하게 수강하시는 분들의 권리를 보호하기 위하여 MAC주소를 수집하고 있습니다. <br>
                            MAC 주소(Media Access Control Address)는 PC마다 존재하는 고유 식별 번호입니다.</li>
                        </ol>
                    </dd>

                    <dt>상담 및 문의</dt>
                    <dd>
                        <ol>
                            <li>[상담시간] 평일 오전 9시 ~ 오후 6시</li>
                            <li>[상담전화] 1566-4770</li>
                            <li>[상담내용] 강의 및 패키지 상품 안내</li>
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

            var url = '{{ site_url('/m/userPackage/show/cate/309002/prod-code/') }}' + code;
            location.href = url;
        }    
    </script>
@stop