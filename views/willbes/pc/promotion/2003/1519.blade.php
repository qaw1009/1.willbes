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
            width:100% !important;
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto !important}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

        /************************************************************/    
        /*타이머*/
        .time {width:100%; text-align:center; background:#e9e7e8}
        .time {text-align:center; padding:20px 0}
        .time table {width:1120px; margin:0 auto}
        .time table td:first-child {font-size:40px}
        .time table td img {width:70%}
        .time .time_txt {font-size:24px; color:#000; letter-spacing: -1px}
        .time .time_txt span {color:#ef6759; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        @@keyframes upDown{
        from{color:#ef6759}
        50%{color:#ff6600}
        to{color:#ef6759}
        }
        @@-webkit-keyframes upDown{
        from{color:#ef6759}
        50%{color:#ff6600}
        to{color:#ef6759}
        }    

        .wb_top {
            font-size:15px; color:#ebebeb;
            background:url(https://static.willbes.net/public/images/promotion/2020/01/1519_top_bg.jpg) no-repeat center top;
        }
        .wb_top .topText {
            position:absolute; width:640px; height:50px; line-height:50px; top:70px; left:50%; margin-left:-320px; border-radius:40px; background:#000;
            text-align:center; color:#fff; font-size:24px; z-index:10;            
        }
        .wb_top .dday {
            position:absolute; width:640px; height:50px; line-height:50px; top:680px; left:50%; margin-left:-320px; 
            text-align:center; color:#fff; font-size:24px; z-index:10;            
        }
        .wb_top .dday span {font-size:26px;}
        .wb_top span {
            vertical-align:top;
            animation:topText01 2s infinite;
            -webkit-animation:topText01 2s infinite;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
        }
        @@keyframes topText01 {
        from{color:#cff74d}
        50%{color:#34ff72}
        to{color:#cff74d}
        }
        @@-webkit-keyframes topText01{
        from{color:#cff74d}
        50%{color:#34ff72}
        to{color:#cff74d}
        }         

        .wb_top .check {position:absolute; width:1000px; left:50%; top:900px; margin-left:-500px; letter-spacing:3 !important; color:#fff; font-size:14px; z-index:10}
        .wb_cts04 .check {color:#fff; font-size:14px}
        .check p {margin-bottom:20px;}
        .check p a {display:block; width:432px; height:90px; line-height:90px; margin:0 auto; font-size:30px; color:#fff; background:#8d0033; text-align:center; border-radius:90px}
        .check p a:hover {color:#8d0033; background:#eee53b;}
        .check label {cursor:pointer}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a.infotxt {display:inline-block; padding:12px 20px 10px 20px;color:#fff; background:#000; margin-left:50px; border-radius:20px}
        .check a.infotxt:hover {background:#8d0033}       

        .wb_cts01 {background:#f8f8f8}
        .wb_cts02 {background:#f8f8f8;padding:100px 0;}
        .wb_cts02 .box-book .bx-wrapper{max-width:100% !important;}
        .wb_cts02 .box-book li {display:inline; float:left; padding:20px 0}
        .wb_cts02 .box-book li img {
            width: 200px;
            -webkit-box-shadow: 10px 10px 30px 1px rgba(0,0,0,0.31);
            -moz-box-shadow: 10px 10px 30px 1px rgba(0,0,0,0.31);
            box-shadow: 10px 10px 30px 1px rgba(0,0,0,0.31);
        }
        .wb_cts02 .box-book li span {display:block; margin-top:20px; text-align:center; font-size:14px}
        .wb_cts02 p {margin-top:80px}
        .wb_cts02 p a {display:block; width:660px; height:90px; line-height:90px; margin:0 auto; font-size:30px; color:#fff; background:#0f0f0f; text-align:center; border-radius:90px}
        .wb_cts02 p a:hover {color:#fed901; background:#13604d;}        

        .wb_ctsInfo {background:#2b2b2b; padding:100px 0}  
        .wb_ctsInfo div {width:1000px; margin:0 auto; color:#fff; font-size:14px; line-height:1.5;
            font-family: "NanumGothic-Regular", "Nanum Gothic", "나눔고딕", "sans-serif" !important;
        }
        .wb_ctsInfo div h3 {font-size:30px; margin-bottom:30px; color:#fed901} 
        .wb_ctsInfo div dt {font-size:18px; margin-bottom:10px; font-family: "NotoSansCJKkr-Regular", "Noto Sans KR", "sans-serif" !important;
            text-decoration:underline}  
        .wb_ctsInfo div dd {margin-bottom:30px}
        .wb_ctsInfo div dl {
            position: relative;
		    padding-left:10px;
        }
        .wb_ctsInfo div dl:before{
            background: #fed901 none repeat scroll 0 0; 
            border-radius: 2px;
            content: '';
            display: block;
            height: 4px;
            left: 0;
            position: absolute;
            top: 8px;
            width: 4px;
        }
        .wb_ctsInfo p {margin-top:40px;font-size:18px;}
        .wb_ctsInfo p span  {border:2px solid #fff; padding:10px 20px}
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="evtCtnsBox wb_top" >
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1519_top.jpg" alt="윌비스 7급 일반행정직 PASS" />

            <div class="topText NGEB">
                2021 국가직 PSAT 도입 전 <span>마지막 기회!</span>
            </div>

            <!-- 타이머 -->
            <div class="dday NSK-Black">
                2020 일반행정직 PASS <span>{{$arr_promotion_params['turn']}}</span>기 마감 <span class="dayLeft"></span>
            </div>

            <div class="check" id="chkInfo">
                <p class="NGEB"><a onclick="go_PassLecture(1);" target="_blank">지금 바로 신청하기 ></a></p>      
                <label>
                    <input name="ischk" type="checkbox" value="Y" />
                    페이지 하단 윌비스 7급 일반행정직 PASS를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#ctsInfo" class="infotxt">이용안내확인하기 ↓</a>
            </div>
        </div>
        <!--WB_top//-->


        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1519_01.gif" alt="윌비스 7급 일반행정직 PASS"  /><br> 
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1519_02.jpg" alt="윌비스 7급 일반행정직 PASS"  />
        </div>

        <div class="evtCtnsBox wb_cts02">
            <div class="box-book">
                <ul class="slidesBook NSK">
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/2020/01/1519_03_01.gif" alt=""/>
                        <span>국어 기미진</span>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/2020/01/1519_03_02.gif" alt=""/>
                        <span>한국사 조민주</span>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/2020/01/1519_03_03.gif" alt=""/>
                        <span>경제학 황정빈</span>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/2020/01/1519_03_04.gif" alt=""/>
                        <span>행정법 한세훈</span>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/2020/01/1519_03_05.gif" alt=""/>
                        <span>행정학 김덕관</span>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/2020/01/1519_03_06.gif" alt=""/>
                        <span>헌법 유시완</span>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/2020/01/1519_03_07.gif" alt=""/>
                        <span>헌법/행정법 황남기</span>
                    </li>
                </ul>
            </div> 
            <p class="NGEB"><a href="#chkInfo">지금 바로 7급 일반행정직 PASS 신청하기 ></a></p> 
        </div>
        
        <div class="wb_ctsInfo NGR" id="ctsInfo">
            <div>
                <h3 class="NGEB">윌비스 7급 일반행정직 PASS 이용안내</h3>
                <dd>
                    <dt>상품구성</dt>
                    <dl>본 PASS는 참여교수진의 전 강좌를 수강할 수 있는 상품입니다. 단, 기미진 국어 강좌의 경우, 아침특강 커리큘럼 과정은 제공되지 않습니다.</dl>
                    <dl>2020년 7급 일반행정직 대비로 진행되는 국어, 한국사, 헌법, 경제학, 행정학, 행정법을 포함하여 신규 진행되는 모든 강좌가 제공됩니다.<br>
                    (단, 신규 강의가 진행되지 않을 경우 이전 연도에 촬영된 강의를 대체 제공합니다.)</dl>
                    <dl>제공 교수진 : 국어 기미진, 한국사 조민주, 헌법/행정법 황남기, 헌법 유시완, 행정법 한세훈, 경제학 황정빈, 행정학 김덕관</dl>
                    </dd>                
                <dd>
                    <dt>수강기간</dt>
                    <dl>본 상품은 구매일로부터 상품 상세 안내에 표기된 기간동안 제공되며, 결제가 완료되는 즉시 수강이 시작됩니다.</dl>
                </dd>
                <dd>
                    <dt>수강관련</dt>
                    <dl>먼저 [내강의실] 메뉴에서 무한PASS존으로 접속합니다.</dl>
                    <dl>구매하신 무한PASS 상품명 옆의 [강좌추가] 버튼을 클릭, 원하는 과목/교수님/강좌를 선택 등록 후 수강할 수 있습니다.</dl>
                    <dl> 본 상품을 이용 중에는 일시정지 기능을 이용하실 수 없습니다.</dl>
                    <dl>본 PASS수강 시 이용 가능한 기기는 다음과 같이 제한됩니다.<br>
                    - PC+ 모바일 수강 시:  PC 2대 or 모바일 2대 or PC 1대 + 모바일 1대</dl>
                    <dl>PC/모바일 기기변경 등 최초 1회에 한해 본인 직접 초기화 가능하며 추가로 단말기 초기화를 원하시는 경우, 고객센터로 문의주시기 바랍니다.<br>
                        단, 고객센터를 통한 단말기 초기화 진행 시 콘텐츠 공유 방지를 위해 사유 확인 후 최대 2회까지만 단말기 초기화가 가능합니다. (총 3회)</dl>
                </dd>
                <dd>
                    <dt>교재관련</dt>
                    <dl>본 상품은 교재를 별도 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 [교재구매] 메뉴에서 별도 구매가 가능합니다.</dl>
                </dd>
                <dd>
                    <dt>환불정책</dt>
                    <dl>결제 후 7일 이내 전액 환불 가능합니다. 단, 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불이 가능합니다.</dl>
                    <dl>상기 경우에만 전액 환불 가능하며, 할인가 적용된 특별 상품이기에 부분환불은 정가 대비 사용일수에 따라 공제 후 차감되오니 양해 부탁 드립니다.</dl>
                </dd>
                <dd>
                    <dt>유의사항</dt>
                    <dl>본 상품은 특별할인기획 상품으로 쿠폰할인/적립금사용 등 혜택이 적용되지 않으니 양해 및 참조 부탁 드립니다.</dl>
                    <dl>강의가 학원 사정에 의해 부득이하게 진행되지 않을 경우 대체 강의로 제공되며, 이로 인한 환불은 불가합니다.</dl>
                    <dl>아이디 공유, 타인양도 등 부정사용 적발 시 회원 자격 박탈 및 환불 불가하며, 불법 공유 행위 사안에 따라 민/형사상 조치가 있을 수 있습니다.</dl>                    
                </dd>
                <p class="NSK"><span>※ 이용문의 : 고객만족센터 1544-5006</span></p>
            </div>
        </div>

    </div>
    <!-- End Container -->    

    <script type="text/javascript">    
        $(document).ready(function() {
            var BxBook = $('.slidesBook').bxSlider({
                slideWidth: 200,
                slideMargin: 40,
                maxSlides:10,
                minSlides:1,
                moveSlides: 1,
                ticker:true,
                speed:40000,
                onSlideAfter: function() {
                    BxBook.stopAuto();
                    BxBook.startAuto();
                }
            });
        });   

        function go_PassLecture(no){
            if(parseInt(no)==1 || parseInt(no)==2){
                if($("input[name='ischk']:checked").size() < 1 && $("input[name='ischk2']:checked").size() < 1){
                    alert("이용안내에 동의하셔야 합니다.");
                    $("#chkInfo").focus();
                    return;
                }
            }else if(parseInt(no)==3 || parseInt(no)==4){
                if($("input[name='ischk']:checked").size() < 1){
                    alert("이용안내에 동의하셔야 합니다.");
                    return;
                }
            }else if(parseInt(no)==5 || parseInt(no)==6){
                if($("input[name='ischk2']:checked").size() < 1){
                    alert("이용안내에 동의하셔야 합니다.");
                    return;
                }
            }

            var lUrl = "";

            if(parseInt(no)==1 || parseInt(no)==3 || parseInt(no)== 5){
                lUrl = "{{ site_url('/periodPackage/show/cate/3020/pack/648001/prod-code/157472') }}";
            }else{
                lUrl = "{{ site_url('/periodPackage/show/cate/3020/pack/648001/prod-code/157472') }}";
            }

            location.href = lUrl;
        }        
        
        /*디데이카운트다운*/
        $(document).ready(function() {
            @if(empty($arr_promotion_params['edate']) === false)
                var day_left = dDayCountLeft('{{$arr_promotion_params['edate']}}');
                if(typeof day_left !== 'undefined') {
                    $('.dayLeft').html('D-' + day_left);
                }
            @endif
        });
    </script>
    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop