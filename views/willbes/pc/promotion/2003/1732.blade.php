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
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/
        .wb_top {background:#FF9F1C url(https://static.willbes.net/public/images/promotion/2020/07/1732_top_bg.jpg) no-repeat center top; position:relative}

        .wb_cts01 {background:#FFF;}

        .wb_cts02 {background:#0000EE;}

        .wb_cts03 {background:#FFF;}

        .evt04 {background:#eceaf5; position:relative} 
        .check { position:absolute; bottom:50px; left:50%; margin-left:-490px; width:980px; padding:20px 0px 20px 10px; letter-spacing:3; color:#fff; z-index:5}
        .check label {cursor:pointer; font-size:14px;color:#000;font-weight:bold;}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a {display:inline-block; padding:12px 20px 10px 20px; color:#fff; background:#2d2d2d; margin-left:50px; border-radius:20px;font-size:14px;}

        /* 이용안내 */
        .content_guide_wrap{background:#fff; width:1210px; margin:0 auto; padding:50px 0 100px}
        .content_guide_wrap .guide_tit{width:1210px;margin:0 auto;text-align:center; }
        .content_guide_box{width:960px; margin:0 auto; border:2px solid #202020;padding-top:30px}
        .content_guide_box dl{margin:0 20px; word-break:keep-all; padding:30px}
        .content_guide_box dt{margin-bottom:10px}
        .content_guide_box h2{font-size:25px;padding-left:50px;font-weight:bold;}
        .content_guide_box dt h3{color:#fff; background:#333; display:inline-block; padding:5px 10px; font-weight:bold; margin-right:10px; font-size:17px;}
        .content_guide_box dt img.btn{padding:2px 0 0 0}
        .content_guide_box dd{color:#777; margin:0 0 20px 5px; line-height:17px}
        .content_guide_box dd strong {color:#555}
        .content_guide_box dd li{margin-bottom:3px; list-style:decimal; margin-left:20px;font-size:13px;}
        .content_guide_box .step {display:inline-block; float:left; width:23%; border:1px solid #c4c4c4; margin-top:10px; margin-right:2%; text-align:center; line-height:1.2}
        .content_guide_box .step h4 {color:#fff; font-size:18px; background:#c4c4c4; padding:10px 0}
        .content_guide_box .step h5 {font-size:18px; color:#333; font-weight:bold; margin-bottom:20px}
        .content_guide_box .step div {padding:20px; min-height:200px; font-size:14px}
        .content_guide_box .step span {color:#fd4e3d; font-size:10px;}
        .content_guide_box dd:after {content:""; display:block; clear:both}
        .content_guide_box .inquire{padding-top:25px;font-size:20px;font-weight:bold;color:#000;}

        .evt05{padding:100px 0;}
    </style>


    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top" >            
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1732_top.gif" alt="이론패스" />            
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1732_01.jpg" alt="합격권 실력의 기초"/>
        </div>

        <div class="evtCtnsBox wb_cts02" >            
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1732_02.jpg" alt="초반 이론 학습"> 
        </div>

        <div class="evtCtnsBox wb_cts03" >            
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1732_03.jpg" alt="이런 분들이 수강하시면 좋아요."/>
        </div>

        <div class="evtCtnsBox evt04" >
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1732_04.jpg" usemap="#Map1732a"  title="수강신청" border="0" />
            <map name="Map1732a" id="Map1732a">
                <area shape="rect" coords="661,797,930,961" href="javascript:go_PassLecture('169376');">
            </map>                  
            <div class="check">
                <label>
                    <input name="ischk"  type="checkbox" value="Y" />
                    페이지 하단 2021 군무원 이론패스 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#careful">이용안내확인하기 ↓</a>
            </div>
        </div>

        <div class="evt05">

            <div class="content_guide_box" id="careful">
                <h2 classc="title">군무원 이론패스 이용안내</h2>
                <dl>
                    <dt>
                        <h3>상품구성</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 PASS는 군무원 9급 행정직 대비 과정으로, 참여 교수진의 기본/심화이론 강좌를 배수 제한 없이 무제한으로 수강 가능합니다.</li>
                            <li>수강 가능 교수진 : 국어 기미진, 행정법 이석준, 행정학 김덕관</li>
                            <li>2020년 대비 기본/심화이론 강좌 및 2021년 대비로 진행되는 신규 개강 기본/심화이론 강좌를 커리큘럼 진행에 따라 순차적으로 제공해드리는 상품입니다.<br/>
                                (일부 교수진의 경우, 학원 사정으로 인하여 신규 과정이 업데이트 되지 않을 수 있으며 해당 경우에는 이전 연도 과정을 수강해주셔야 합니다.)
                            </li>
                            <li>참여 교수진의 강의 진행 일정은 과목별로 상이하게 진행될 수 있으며, 학원 사정에 따라 부득이하게 커리큘럼 및 교수진이 추가/변경될 수 있다는 점 숙지 부탁드립니다.
                                (과목별 교수진의 제공 과정은 수강신청 상세안내 화면을 참고해주시기 바랍니다.)
                            </li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>수강기간</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>수강기간은 상품 상세 안내 페이지에 표시된 기간만큼 제공되며, 결제가 완료되는 즉시 수강이 시작됩니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>수강관련</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>먼저 [내강의실] 메뉴에서 무한PASS존으로 접속합니다.</li>
                            <li>구매하신 무한PASS 상품명 옆의 [강좌추가] 버튼을 클릭, 워하는 과목/교수님/강좌를 선택 등록 후 수강할 수 있습니다.</li>
                            <li>본 PASS를 이용 중에는 일시정지 기능을 사용할 수 없습니다.</li>
                            <li>본 PASS 수강 시 이용 가능한 기기는 다음과 같이 제한됩니다.<br/>
                                - PC 2대 or 모바일 2대 or PC 1대+모바일 1대 (총 2대)
                            </li>
                            <li>PC/모바일 기기변경 등 단말기 초기화가 필요한 경우, 내용 확인 후 진행 가능하오니 고객센터로 문의주시기 바랍니다.</li>                            
                        </ol>
                    </dd>

                    <dt>
                        <h3>교재관련</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 PASS는 교재를 별도로 구매하셔야 하며, 각 강좌별 교재는 <span style="color:#b02900;vertical-align:top;">강좌소개 및 [교재구매] 메뉴에서 별도로 구입</span> 가능합니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>환불정책</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내 전액 환불 가능합니다.</li>
                            <li>맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                            <li>자료 및 모바일 강의 다운로드 시 수강한 것으로 간주됩니다.</li>
                            <li>고객변심으로 인한 부분환불은 수강시작일(당일 포함)로부터 7일이 경과되면, 정가 기준으로 계산하여 사용일수만큼 차감하고 환불됩니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>유의사항</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 상품은 특별할인기획 상품으로 쿠폰할인/다다익선/적립금 사용 등 혜택이 적용되지 않습니다.</li>
                            <li>선택한 교수의 강의가 학원 사정에 의해 부득이하게 진행되지 않을 경우 대체 강의가 제공되며, 이로 인한 환불은 불가합니다.</li>
                            <li>아이디 공유 적발 시 회원 자격 박탈 및 환불 불가하며, 추가적인 불법 공유 행위 적발 시 형사고발조치가 단행될 수 있습니다.</li>
                        </ol>
                    </dd>
                    <dd>
                        <p class="inquire">※ 이용 문의 : 윌비스 고객만족센터 1544-5006</p>
                    </dd>
                </dl>
            </div>

        </div>    

    </div>
    <!-- End Container -->

    <script type="text/javascript">
        function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }               
    </script>
    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop