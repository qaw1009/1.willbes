@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
    <style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:1.6vh; line-height:1.5; clear:both}
    .evtCtnsBox .wrap {margin:0 auto; position:relative}
    /*.evtCtnsBox .wrap a {border:1px solid #000}*/
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtCtnsBox span { vertical-align:top}   

    /************************************************************/

    .evt_02 {padding-bottom:5vh}
    .check {padding:2vh 0; color:#fff; z-index:5}
    .check label {cursor:pointer; font-size:1.8vh; color:#000; font-weight:bold;}
    .check input {border:2px solid #000; margin-right:5px; height:20px; width:20px}
    .check a {display:block; width:60%; margin:10px auto; padding:1vh 0; color:#fff; background:#393939; border-radius:20px; font-weight:bold;}
    .check a:hover {background-color:#f1d188; color:#272a31}

    .evtInfo {padding:4vh 3vw; background:#222; color:#fff;}
    .evtInfoBox { text-align:left; line-height:1.5;}
    .evtInfoBox h4 {font-size:3vh; margin-bottom:40px}
    .evtInfoBox .infoTit {font-size:1.8vh; margin-bottom:20px}
    .evtInfoBox .infoTit strong {padding:8px 20px; background:#000; border-radius:20px; font-weight:normal !important}
    .evtInfoBox ul {margin-bottom:30px}
    .evtInfoBox li {margin-bottom:8px; list-style:disc; margin-left:20px}
    span.red {color:red; vertical-align:top}
    .original {text-decoration:line-through;}

    </style>

    <div id="Container" class="Container NSK c_both">
        
        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2386m_top.jpg" alt="황종휴 경제한 e-pass">
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2386m_01.jpg" alt="특별혜택">
        </div>

        <div class="evtCtnsBox evt_02" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/09/2386m_02.jpg" alt="수강 신청하기" />
                <a href="javascript:void(0);" data-url="https://gosi.willbes.net/m/periodPackage/show/cate/3094/pack/648001/prod-code/200932" onclick="go_PassLecture(this)" style="position: absolute; left: 73.06%;top: 15.09%; width: 23.66%; height: 13.62%; z-index: 2;"></a> 
                <a href="javascript:void(0);" data-url="https://gosi.willbes.net/m/periodPackage/show/cate/3094/pack/648001/prod-code/200933" onclick="go_PassLecture(this)" style="position: absolute; left: 73.06%;top: 32.27%; width: 23.66%; height: 13.62%; z-index: 2;"></a> 
                <a href="javascript:void(0);" data-url="https://gosi.willbes.net/m/periodPackage/show/cate/3094/pack/648001/prod-code/200934" onclick="go_PassLecture(this)" style="position: absolute; left: 73.06%;top: 49.59%; width: 23.66%; height: 13.62%; z-index: 2;"></a> 
                <a href="javascript:void(0);" data-url="https://gosi.willbes.net/m/periodPackage/show/cate/3094/pack/648001/prod-code/200935" onclick="go_PassLecture(this)" style="position: absolute; left: 73.06%;top: 66.48%; width: 23.66%; height: 13.62%; z-index: 2;"></a> 
                <a href="javascript:void(0);" data-url="https://gosi.willbes.net/m/userPackage/show/cate/3094/prod-code/200949" onclick="go_PassLecture(this)" style="position: absolute; left: 73.06%;top: 83.45%; width: 23.66%; height: 13.62%; z-index: 2;"></a>           
            </div>    
            <div class="check">
                <label>
                    <input name="ischk"  type="checkbox" value="Y" />
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#notice">이용안내확인하기 ↓</a>
            </div>   
		</div>

        <div class="evtCtnsBox evtInfo" data-aos="fade-up" id="notice">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">[PC] 상품이용안내</h4>
                <div class="infoTit"><strong>이용안내</strong></div>
                <ul>
                    <li>본 상품은 황종휴 경제학 고득점 합격을 위한 E-PASS 상품입니다.</li>
                </ul>
                <div class="infoTit"><strong>E-PASS 해당과정 할인율 및 수강기간</strong></div>
                <ul>
                    <li>경제학 전과정 + 국제경제학 전과정 E-PASS / 수강기간 : 2023년 6월 30일까지<br>
                        - 경제학  :  예비순환(22년 4월) + GS1순환(22년 7월) + GS2순환(21년 10월) + GS3순환(22년 3월)<br>
                        - 국제경제학  : 예비순환(22년 5월) + GS1순환(21년 10월) + GS2순환(22년 1월) + GS3순환(22년 6월)</li>
                    <li>경제학 예비+1순환+2순환+3순환 E-PASS / 수강기간 : 2023년 4월 30일까지<br>
                        -  경제학  :  예비순환(22년 4월) + GS1순환(22년 7월) + GS2순환(21년 10월) + GS3순환(22년 3월)</li>
                    <li>경제학 1순환+2순환+3순환 E-PASS / 수강기간 : 2023년 3월 31일까지<br>
                        -  경제학  GS1순환(22년 7월) + GS2순환(21년 10월) + GS3순환(22년 3월)</li>
                    <li>경제학 1순환+2순환+3순환+국제경제학 1순환  E-PASS / 수강기간 : 2023년 4월 30일까지<br>
                        -  경제학  GS1순환(22년 7월) + GS2순환(21년 10월) + GS3순환(22년 3월) + 국제경제학 1순환(21년 10월)</li>
                    <li>경제학+재정학+국제경제학 예비~3순환 자유선택 PACK : 3강좌이상 자유선택<br>
                        -  3강좌 선택 : 수강료 20%할인<br>
                        -  4강좌 이상 선택 : 수강료 30%할인<br>
                        -  수강시작일 :  3강좌 이상 선택하시고 동영상 게시판에 수강시작일을 남겨주시면 100일 범위내에서 수강시작일을 변경하여 드립니다.</li>
                    <li>신청 및 접수기간 : 2022년 9월 1일(목)  ~  2022년  9월 18일(일) 24:00까지</li>
                </ul>
                <div class="infoTit"><strong>E-PASS 수강기간-과정별 수강기간 자동 적용</strong></div>
                <ul>
                    <li>경제학 E-PASS강의는 PASS상품으로 강의신청시 바로 수강시작이 됩니다.(일시정지, 강의연장 불가)</li>
                    <li>강의는 강의배수 및 기기대수 제한 규정이 적용됩니다.</li>
                    <li>황종휴 경제학 E-PASS 상품은 사정에 의해서 사전공지없이 종료 또는 변경될 수 있습니다.</li>
                </ul>
                <div class="infoTit"><strong>교재</strong></div>
                <ul>
                    <li>강의배부자료 및 강의를 위해 제작된 교재는 <span class="red">해당 강의에서 모두 무료로 주문</span>하실 수 있습니다.<span class="red">(등록된 제본교재에 한함)</span></li>
                </ul>

                <div class="infoTit"><strong>환불</strong></div>
                <ul>
                    <li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.(일부강의만의 환불은 불가합니다.)</li>
                    <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 <span class="red">정가 기준</span>으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                    <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                    <li>고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, <span class="red">정가 기준</span>으로 계산하여 사용일수만큼 차감 후 환불됩니다.</li>
                    <li>환불시 무료로 제공된 제본교재는 반납 또는 해당 제본교재 정가기준 차감 후 환불됩니다.</li>
                    <li>기타 약관에 규정에 따릅니다.</li>       
                </ul>
                <div class="infoTit"><strong>PASS 수강</strong></div>
                <ul>
                    <li>로그인 후 <span class="red">[내강의실] 에서 [무한PASS존]으로 접속</span>합니다.</li>
                    <li>구매한 PASS 상품 선택 후 <span class="red">[강좌추가]</span> 를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                    <li>PASS반은 <span class="red">일시 정지, 수강 연장, 재수강 불가</span>합니다.</li>
                    <li>PASS반 수강 시 이용 가능한 <span class="red">기기 대수</span>는 다음과 같이 <span class="red">제한</span>됩니다.[ 총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대 ]</li> 
                    <li>PC, 모바일 기기에 대한 초기화가 필요할  경우 내용확인 후 진행이 가능하오니 고객센터로 문의 부탁드립니다.(수강기간동안 3회 신청가능)</li> 
                </ul>
                <div class="infoTit"><strong>유의사항</strong></div>
                <ul>
                    <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.</li>
                    <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 PASS반은 즉시 정지, 회원 자격이 박탈됩니다. 이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생 할 수 있습니다.</li>                
                </ul>
            </div>
        </div>

    </div>
    <!-- End Container -->

    <script type="text/javascript">
        /*수강신청 동의*/ 
        function go_PassLecture(obj){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }else{
                var _url = $(obj).data('url');
                window.open(_url);
            }
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