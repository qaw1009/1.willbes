@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

        /************************************************************/

        .sky {position:fixed; top:225px;right:10px;z-index:10;}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/03/2104_top_bg.jpg) no-repeat center top;}

        .wb_top .tImg img {margin:0 5px 10px;width:460px;height:290px;margin-top:-155px;}

        .wb_cts02 {background:#DADCDB}
                
        /*수강신청 체크*/
        .check {padding-bottom:100px;}
        .check p {margin-bottom:50px;padding-top:75px;}
        .check p a {display:block; width:525px; height:90px; line-height:90px; margin:0 auto; font-size:30px; color:#fff; background:#163C57; text-align:center; border-radius:90px;}
        .check p a:hover {color:#8d0033; background:#eee53b;}
        .check label {cursor:pointer;color:#585858;font-weight:bold;font-size:15px;}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a.infotxt {display:inline-block; padding:12px 20px 10px 20px;color:#504f4f; background:#ededed; margin-left:50px; border-radius:20px;font-size:15px;font-weight:bold;}
        
        /* 이용안내 */
        .wb_info {padding:100px 0;background:#ededed}
        .guide_box{width:1000px; margin:0 auto; text-align:left; word-break:keep-all; line-height:1.5; font-size:13px;}
        .guide_box h2 {font-size:30px; margin-bottom:30px;color:#3a3a3a;}
        .guide_box dt{margin-bottom:10px; display:inline-block;font-weight:bold; font-size:17px; border-radius:30px;color:#3a3a3a;font-size:25px;}        
        .guide_box dd{color:#777; margin:0 0 20px 5px;}
        .guide_box dd strong {color:#555}
        .guide_box dd li {margin-bottom:3px; list-style:decimal; margin-left:20px;color:#3a3a3a;font-size:15px}
        .guide_box dd li a {display:inline-block; margin-left:20px; background:#032E5B; color:#fff; padding:3px 10px; border-radius:15px;}
        .guide_box .inquire{padding-top:25px;font-size:20px;font-weight:bold;color:#000;} 

    </style>


    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="sky">
            <a href="#apply"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2104_sky.png" alt="위생사 올패스 신청하기" >
            </a>             
        </div>   

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2104_top.jpg" alt="위생사 올패스"  />
            <div class="tImg">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2104_top01.gif" alt="강의1" />
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2104_top02.gif" alt="강의2" />
            </div>
        </div>

        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2104_01.jpg" alt="명강의 후기"  />
        </div>

        <div class="evtCtnsBox wb_cts02">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2104_02.jpg" alt="하재남 교수"/>
        </div>
    
        <div class="evtCtnsBox wb_cts03" id="apply">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2104_03.jpg" alt="올패스 신청하기" usemap="#Map2104_apply" border="0" />
            <map name="Map2104_apply" id="Map2104_apply">
                <area shape="rect" coords="212,977,458,1025" href="javascript:go_PassLecture('179733');" alt="수강신청" />
                <area shape="rect" coords="663,976,908,1024" href="javascript:go_PassLecture('179732');" alt="수강신청" />
            </map>
            <div class="check" id="chkInfo">               
                <label>
                    <input name="ischk" type="checkbox" value="Y" />
                    페이지 하단 PASS 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#tip" class="infotxt" > 유의사항 자세히보기 ↓</a>
            </div>      
        </div>

        <div class="evtCtnsBox wb_info" id="tip">
            <div class="guide_box">
                <h2 class="NSK-Black">위생사 ALL패스 이용안내</h2>
                <dl>
                    <dt>상품구성</dt>
                    <dd>
                        <ol>
                            <li>본 PASS는 2021년도 제43회 위생사 대비 과정으로, 참여 교수진의 전 강좌(필기/실기)를 배수 제한없이 무제한으로 수강 가능합니다.<br>
                            (참여 교수진 : 하재남 교수)
                            </li>
                            <li>All패스의 경우 2020~2021년 대비로 진행된 신규 개강 강좌를, 선행학습반의 경우 2020년 대비로 진행된 기존 강좌를 커리큘럼 진행에 따라 제공해드리는 상품입니다.<br>
                            (해당 과정은 대방고시 제휴 과정으로, 대방고시 신규 개강 일정에 맞추어 강좌가 업데이트 됩니다.)
                            </li>
                            <li>참여 교수진의 일정 및 진행 방식은 상이하게 진행될 수 있으며, 각 학원 사정에 따라 부득이하게 커리큘럼 및 교수진이 추가/변경될 수 있다는 점 숙지 부탁드립니다.<br>
                            (과목별 교수진의 제공 과정은 수강신청 상세안내 화면을 참고해주시기 바랍니다.)          
                            </li>
                        </ol>
                    </dd>

                    <dt>수강기간</dt>
                    <dd>
                        <ol>
                            <li>수강기간은 상품 상세 안내 페이지에 표시된 기간만큼 제공되며, 결제가 완료되는 즉시 수강이 시작됩니다.</li>
                        </ol>
                    </dd>

                    <dt>수강관련</dt>
                    <dd>
                        <ol>
                            <li>먼저 [내강의실] 메뉴에서 무한PASS존으로 접속합니다.</li>
                            <li>구매하신 무한PASS 상품명 옆의 [강좌추가] 버튼을 클릭,원하는 과목/교수님/강좌를 선택 등록 후 수강할 수 있습니다.</li>
                            <li>본 PASS를 이용 중에는 일시 정지 기능을 사용할 수 없습니다.</li>
                            <li>본 PASS 수강 시 이용가능한 기기는 다음과 같이 제한됩니다.<br>
                            - PC 2대 or 모바일 2대 or PC 1대+모바일 1대 (총 2대)</li>
                            <li>PC/모바일 기기변경 등 단말기 초기화가 필요한 경우, 내용 확인 후 진행 가능하오니 고객센터로 문의주시기 바랍니다.</li>                           
                        </ol>
                    </dd>

                    <dt>교재관련</dt>
                    <dd>
                        <ol>
                            <li>본 PASS는 교재를 별도로 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 [교재구매] 메뉴에서 별도로 구입 가능합니다.</li>
                        </ol>
                    </dd>

                    <dt>환불정책</dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내 전액 환불 가능합니다.</li>
                            <li>맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                            <li>자료 및 모바일 강의 다운로드 시 수강한 것으로 간주됩니다.</li>
                            <li>본 상품은 특별 기획 상품으로, 수강시작일(결제 당일 포함)로부터 7일 경과 후 환불 시에는 할인 되기 전 정가를 기준으로 사용일수만큼 차감하고 환불됩니다.<br>
                                · 결제금액 - (강좌 정상가의 1일 이용대금×이용일수)
                            </li>
                        </ol>
                    </dd>

                    <dt>유의사항</dt>
                    <dd>
                        <ol>
                            <li>본 상품은 특별할인기획 상품으로 쿠폰할인/다다익선/적립금 사용 등 혜택이 적용되지 않습니다.</li>
                            <li>선택한 교수의 강의가 학원 사정에 의해 부득이하게 진행되지 않을 경우 대체 강의가 제공되며, 이로 인한 환불은 불가합니다.</li>
                            <li>아이디 공유 적발 시 회원 자격 박탈 및 환불 불가하며, 추가적인 불법 공유 행위 적발 시 형사 고발 조치가 단행될 수 있습니다.</li>
                        </ol>
                    </dd>
                    
                </dl>
            </div>
        </div>
    </div>
    <!-- End Container -->

    <script>    
    
        /*수강신청 동의*/ 
        function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }
            if(code == 1){
                code = $('input[name="y_pkg"]:checked').val();
                if (typeof code == 'undefined' || code == '') {
                    alert('강좌를 선택해 주세요.');
                    return;
                }
            }
            location.href = "{{ site_url('/periodPackage/show/cate/3022/pack/648001/prod-code/') }}" + code;
        }

    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop