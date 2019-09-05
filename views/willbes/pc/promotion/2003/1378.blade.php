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
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
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
            background:url(https://static.willbes.net/public/images/promotion/2019/09/1378_top_bg.jpg) no-repeat center top;
            position:relative
        }
        /*플립 애니메이션*/
        .wb_top .main_img {
            position:absolute;
            width:722px;
            top:315px;
            left:50%;
            margin-left:-361px;
            z-index:10;
            animation:flipInX 2s infinite;
            -webkit-animation:flipInX 2s infinite;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
        }
        @@keyframes flipInX {
             from {
                 -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 20deg);
                 transform: perspective(400px) rotate3d(1, 0, 0, 20deg);
                 -webkit-animation-timing-function: ease-in;
                 animation-timing-function: ease-in;                
             }
             40% {
                 -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
                 transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
                 -webkit-animation-timing-function: ease-in;
                 animation-timing-function: ease-in;
             }
             60% {
                 -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
                 transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
                 -webkit-animation-timing-function: ease-in;
                 animation-timing-function: ease-in;
                
             }
             80% {
                 -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -10deg);
                 transform: perspective(400px) rotate3d(1, 0, 0, -10deg);
                 -webkit-animation-timing-function: ease-in;
                 animation-timing-function: ease-in;
             }
             to {
                 -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 20deg);
                 transform: perspective(400px) rotate3d(1, 0, 0, 20deg);  
                 -webkit-animation-timing-function: ease-in;
                 animation-timing-function: ease-in;               
             }
         }

        .flipInX {
            -webkit-backface-visibility: visible !important;
            backface-visibility: visible !important;
            -webkit-animation-name: flipInX;
            animation-name: flipInX;
        }

        .wb_top .check {position:absolute; width:1000px; left:50%; top:710px; margin-left:-500px; letter-spacing:3 !important; color:#fff; font-size:14px; z-index:10}
        .wb_cts04 .check {color:#fff; font-size:14px}
        .check p {margin-bottom:20px;}
        .check label {cursor:pointer}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a.infotxt {display:inline-block; padding:12px 20px 10px 20px;color:#fff; background:#000; margin-left:50px; border-radius:20px}
        .check a.infotxt:hover {background:#f2463f}       

        .wb_cts01 {background:#f8f8f8}
        .wb_cts02 {background:#223e27}

        .wb_cts03 {background:#f8f8f8; padding-bottom:150px;}
        .wb_cts03 ul {width:1120px; margin:0 auto}
        .wb_cts03 li {display:inline; float:left; text-align:center; width:33.3333%}
        .wb_cts03 ul:after {content:""; display:block; clear:both}

        .wb_cts04 {background:#f97f7a; padding-bottom:120px} 
        .wb_ctsInfo {background:#2b2b2b; padding:100px 0}  
        .wb_ctsInfo div {width:1000px; margin:0 auto; color:#fff; font-size:14px; line-height:1.5;letter-spacing: normal}
        .wb_ctsInfo div h3 {font-size:30px; margin-bottom:30px; color:#f97f7a} 
        .wb_ctsInfo div dt {font-size:18px; margin-bottom:10px; font-family: "NotoSansCJKkr-Regular", "Noto Sans KR", "sans-serif" !important;
            text-decoration:underline}  
        .wb_ctsInfo div dd {margin-bottom:30px}
        .wb_ctsInfo div dl {
            position: relative;
		    padding-left:10px;
        }
        .wb_ctsInfo div dl:before{
            background: #f97f7a none repeat scroll 0 0; 
            border-radius: 2px;
            content: '';
            display: block;
            height: 4px;
            left: 0;
            position: absolute;
            top: 8px;
            width: 4px
        }
        .wb_ctsInfo p {margin-top:40px;font-size:18px;}
        .wb_ctsInfo p span  {border:2px solid #fff; padding:10px 20px}
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <!-- 타이머 -->
        <div class="evtCtnsBox time NGEB" id="newTopDday">
            <div>
                <table>
                    <tr>
                    <td class="time_txt"><span>{{ kw_date('n/j(%)', $arr_promotion_params['edate']) }} </span>마감!</td>
                    <td class="time_txt">마감까지<br><span>남은 시간은</span></td>
                    <td><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">일 </td>
                    <td><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">:</td>
                    <td><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">:</td>
                    <td><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    </tr>
                </table>                
            </div>
        </div>
        <!-- 타이머 //-->

        <div class="evtCtnsBox wb_top" >
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1378_top.jpg" alt="윌비스 7급 외무영사직 PASS" />

            <div class="main_img flipInX animated">
                <img src="https://static.willbes.net/public/images/promotion/2019/09/1378_top_img01.png" alt="윌비스 7급 외무영사직 PASS" />
            </div>

            <div class="check" id="chkInfo">
                <p><a onclick="go_PassLecture(1);" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/09/1378_top_btn.jpg" alt="윌비스 7급 외무영사직 PASS" /></a></p>      
                <label>
                    <input name="ischk" type="checkbox" value="Y" />
                    페이지 하단 윌비스 7급 외무영사직 PASS를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#ctsInfo" class="infotxt">이용안내확인하기 ↓</a>
            </div>
        </div>
        <!--WB_top//-->


        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1378_01.jpg" alt="윌비스 7급 외무영사직 PASS"  />            
        </div>

        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1378_02_01.jpg"  alt="윌비스 7급 외무영사직 PASS"  />
        </div>

        <div class="evtCtnsBox wb_cts03" >
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1378_03.jpg"  alt="윌비스 7급 외무영사직 PASS"/>
            <ul>
                <li><img src="https://static.willbes.net/public/images/promotion/2019/09/1378_03_p01.gif" alt="기미진"/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2019/09/1378_03_p02.gif" alt="이상구"/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2019/09/1378_03_p03.gif" alt="황남기"/></li>
            </ul>
        </div>

        <div class="evtCtnsBox wb_cts04" >
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1378_04.jpg"  alt="윌비스 7급 외무영사직 PASS" usemap="#Map190124B" border="0"/>
            <map name="Map190124B" id="Map190124B">
                <area shape="rect" coords="884,872,1095,962" onclick="go_PassLecture(2);" alt="외무영사직 PASS 수강신청" />
            </map>
            <div class="check mt20">
                <label>
                    <input name="ischk2"  type="checkbox" value="Y" />
                    페이지 하단 윌비스 7급 외무영사직 PASS를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#ctsInfo" class="infotxt">이용안내확인하기 ↓</a>
            </div>
        </div>
        
        <div class="wb_ctsInfo NSK-Thin" id="ctsInfo">
            <div>
                <h3 class="NSK-Black">윌비스 7급 외무영사직 PASS 이용안내</h3>
                <dd>
                    <dt>상품구성</dt>
                    <dl>본 PASS는 참여교수진의 전 강좌를 수강할 수 있는 상품입니다. 단, 기미진 국어 강좌의 경우, 19년 대비 아침특강 커리큘럼 과정은 본 PASS에 제공되지 않습니다.</dl>
                    <dl>2019년 7급 국가직 외무영사직렬 대비로 진행되는 국어, 한국사, 헌법, 국제정치학, 국제법, 중국어, 프랑스어를 포함하여 신규 진행되는 모든 강좌가 제공됩니다.</dl>
                </dd>                
                <dd>
                    <dt>수강기간</dt>
                    <dl>본 상품은 구매일로부터 1년 간 제공되며, 결제가 완료되는 즉시 수강이 시작됩니다.</dl>
                </dd>
                <dd>
                    <dt>수강관련</dt>
                    <dl>먼저 [내강의실] 메뉴에서 무한PASS존으로 접속합니다.</dl>
                    <dl>구매하신 무한PASS 상품명 옆의 [강좌추가] 버튼을 클릭, 원하는 과목/교수님/강좌를 선택 등록 후 수강할 수 있습니다.</dl>
                    <dl> 본 상품을 이용 중에는 일시정지 기능을 이용하실 수 없습니다.</dl>
                    <dl>본 PASS수강 시 이용 가능한 기기는 다음과 같이 제한됩니다.<br>
                    - PC+ 모바일 수강 시:  PC 2대 or 모바일 2대 or PC 1대 + 모바일 1대</dl>
                    <dl>PC/모바일 기기변경 등 단말기 초기화가 필요한 경우, 내용 확인 후 초기화 진행가능하오니 고객센터로 문의주시기 바랍니다.</dl>
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
                    <dl>선택한 교수님의 강의가 학원 사정에 의해 부득이하게 진행되지 않을 경우 대체 강의로 제공되며, 이로 인한 환불은 불가합니다.</dl>
                    <dl>아이디 공유, 타인양도 등 부정사용 적발 시 회원 자격 박탈 및 환불 불가하며, 불법 공유 행위 사안에 따라 민/형사상 조치가 있을 수 있습니다.</dl>                    
                </dd>
                <p class="NSK"><span>※ 이용문의 : 고객만족센터 1544-5006</span></p>
            </div>
        </div>

    </div>
    <!-- End Container -->    

    <script type="text/javascript">
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
                lUrl = "{{ site_url('/periodPackage/show/cate/3020/pack/648001/prod-code/149331') }}";
            }else{
                lUrl = "{{ site_url('/periodPackage/show/cate/3020/pack/648001/prod-code/149331') }}";
            }

            location.href = lUrl;
        }
        
        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}');
        });
    </script>
    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop