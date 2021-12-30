@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .sky {position:fixed;top:200px;right:10px; width:130px; z-index:1;}
        .sky a {display:block; margin-bottom:10px}        

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/12/2490_top_bg.jpg) no-repeat center top;}

        .wb_cts01 {background:#3d2c21;}

        .wb_cts02 {background:#e8e8e8;}
        
        .wb_cts03 {padding:100px 0;}
        /* TAB */
        .wb_cts03 .tab {width:1120px;margin:50px auto;display:flex; justify-content:space-between;}
        .wb_cts03 .tab li {margin-right:2px;width:33.3333%}
        .wb_cts03 .tab li:last-child {margin:0}
        .wb_cts03 .tab a {display:block; background:#ddd; color:#1a1a1a; font-size:30px; padding:30px 0; text-align:center; width:100%; font-weight:bold}
        .wb_cts03 .tab a.active {background:#3d2c21; color:#fff;}
 
        .wb_cts05 {background:#e9c9a2;}

        /* 수강신청 */
        .wb_cts07 {padding-bottom:175px;}
        .check {position:absolute;left:50%; margin-left:-490px; width:980px; padding:20px 0px 20px 10px; letter-spacing:3; color:#fff; z-index:5}
        .check label {cursor:pointer; font-size:15px;color:#000;font-weight:bold;}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a {display:inline-block; padding:12px 20px 10px 20px; color:#fff; background:#2d2d2d; margin-left:50px; border-radius:20px;font-size:14px;font-weight:bold;}
        .check p {color:#000;font-size:14px; padding:10px 0 0 20px; line-height:1.4;text-align:left;padding-left:100px;}     
    
        /*이용안내*/
        .evtInfo {padding:100px 0;background:#ededed}
        .guide_box{width:1000px; margin:0 auto; text-align:left; word-break:keep-all; line-height:1.5; font-size:13px;}
        .guide_box h2 {font-size:30px; margin-bottom:30px;color:#3a3a3a;}
        .guide_box dt{margin-bottom:10px; display:inline-block;font-weight:bold; font-size:17px; border-radius:30px;color:#3a3a3a;font-size:25px;}
        .guide_box dd{color:#777; margin:0 0 20px 5px;}
        .guide_box dd strong {color:#555}
        .guide_box dd li {margin-bottom:3px; list-style:none; margin-left:20px;color:#3a3a3a;font-size:15px}
        .guide_box dd li a {display:inline-block; margin-left:20px; background:#032E5B; color:#fff; padding:3px 10px; border-radius:15px;}
        .guide_box .inquire{padding-top:25px;font-size:20px;font-weight:bold;color:#000;}

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="sky" id="QuickMenu" data-aos="fade-down">
            <a href="#apply"><img src="https://static.willbes.net/public/images/promotion/2021/12/2490_sky.png" alt="평생 무제한 패스 신청하기"></a>        
        </div> 

        <div class="evtCtnsBox wb_top" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2490_top.jpg" alt="평생 무제한 패스" />
        </div>

        <div class="evtCtnsBox wb_cts01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2490_01.jpg" alt="단 한번 등록" />
        </div>

        <div class="evtCtnsBox wb_cts02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2490_02.jpg" alt="q&a" />
        </div>

        <div class="evtCtnsBox wb_cts03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2490_03.jpg" alt="커리큘럼" />
            <ul class="tab">
                <li><a href="#tab1">경찰공무원</a></li>
                <li><a href="#tab2">소방공무원</a></li>
                <li><a href="#tab3">9급공무원</a></li>
            </ul>
            <div id="tab1" class="tabcts">
                <img src="https://static.willbes.net/public/images/promotion/2021/12/2490_03_01.png" alt="경찰직" />
            </div>
            <div id="tab2" class="tabcts">
                <img src="https://static.willbes.net/public/images/promotion/2021/12/2490_03_02.png" alt="소방직" />
            </div>   
            <div id="tab3" class="tabcts">
                <img src="https://static.willbes.net/public/images/promotion/2021/12/2490_03_03.png" alt="행정직" />  
            </div>     
        </div>

        <div class="evtCtnsBox wb_cts04" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2490_04.jpg" alt="빠른합격" />
        </div>

        <div class="evtCtnsBox wb_cts05" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2490_05.jpg" alt="교수진" />
        </div>

        <div class="evtCtnsBox wb_cts06" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2490_06.jpg" alt="혜택" />
        </div>

        <div class="evtCtnsBox wb_cts07" data-aos="fade-up" id="apply">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/12/2490_07.jpg" alt="수강신청" />
                <a href="javascript:go_PassLecture('189699');" title="경찰" style="position: absolute;left: 13.89%;top: 67.33%;width: 20.88%;height: 15.34%;z-index: 2;"></a>
                <a href="javascript:go_PassLecture('189711');" title="소방" style="position: absolute;left: 39.89%;top: 67.33%;width: 20.88%;height: 15.34%;z-index: 2;"></a>
                <a href="javascript:go_PassLecture('189831');" title="9급공무원" style="position: absolute;left: 65.39%;top: 67.33%;width: 20.88%;height: 15.34%;z-index: 2;"></a>
                <div class="check">
                    <label>
                        <input name="ischk"  type="checkbox" value="Y" />
                        페이지 하단 인천 윌비스 평생 합격 무제한 PASS 이용안내를 모두 확인하였고, 이에 동의합니다.
                    </label>
                    <a href="#info">이용안내확인하기 ↓</a>
                    <p>
                        ※ 강의공유, 콘텐츠 부정사용 적발 시, 평생무제한 패스의 수강기간 갱신 및 환불이 불가합니다.<br>
                        ※ 강좌 및 교수진은 학원 사정에 따라 변경될 수 있습니다.      
                    </p>
                </div>
            </div>     
        </div>

        <div class="evtCtnsBox evtInfo NGR" data-aos="fade-up" id="info">
            <div class="guide_box" >
                <h2 class="NSK-Black" >인천 윌비스 평생 합격 무제한 PASS 이용안내 및 유의사항</h2>
                <dl>
                    <dt>상품설명</dt>
                    <dd>
                        <ol>
                            <li>● 본 상품은 실강과 인강이 모두 수강 가능한 PASS입니다.</li>                          
                            <li>● 수강신청일로부터 12개월동안은 제한없이 이용 가능하며 이후 수강기간  연장규정에 의거 수강연장이 가능합니다.</li>
                        </ol>
                    </dd>
                    <dt>수강기간 연장 규정</dt>
                    <dd>
                        <ol>
                            <li>● 수강기간 내 마지막 필기시험 합격자 발표 후 1주일 이내 불합격 인증 시 다음시험까지 학원강의 및 인강 수강기간이 연장됩니다.<br>
                                * 최종불합격자의 경우 최종불합격 발표 후 1주일 이내
                            </li>                           
                            <li>● 불합격 성적표 인증 시 모든 과목이 0점이거나 개인사정으로 불응시한 경우 수강기간 연장이 불가합니다.</li>
                            <li>● 패스 수강 기간 내에 윌비스합격예측 서비스 1회 이상 참여 해주셔야합니다.<br>
                                (해당 서비스는 시즌성 이벤트로 일정 기간이 지나면 확인 불가하니, 참여 후 캡쳐해서 추후 증빙자료로 제출하셔야 합니다.)
                            </li>
                            <li>● 패스 수강기간 내에 모든 윌비스 전국 모의고사 및 빅매치 모의고사를 모두 응시하여야 합니다.<br>
                                (온/오프 무관하며, 추후 응시내역 파일첨부 제출해 주셔야 합니다.) 
                            </li>
                            <li>● 30일 이상 결석시 퇴학 처리 될 수 있습니다.</li>
                        </ol>
                    </dd>
                    <dt>유의사항</dt>
                    <dd>
                        <ol>
                            <li>● 평생 무제한 PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다. (결제완료자에 한함)</li>
                            <li>● 강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다</li>
                            <li>● 무제한 PASS 수강에 필요한 교재는 별도로 구매하셔야 하며,학원에서 구매 가능합니다. (단,수업이 진행되지 않는 교재는 구매가 어려울 수 있습니다.)</li>
                            <li>● 평생 무제한 PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며, 이로 인한 환불은 불가합니다.</li>
                            <li>● 아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 PASS 강좌는 즉시 정지, 회원 자격이 박탈됩니다.<br>
                                 이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생할 수 있습니다.
                            </li>
                            <li>● 수강기간 연장 신청은 합격자 발표 후 1주일 이내에 완료하셔야합니다.</li>
                            <li>● 수강기간을 연장 시 학원강의 및 인강이 연장됩니다.</li>
                        </ol>
                    </dd>
                </dl>
            </div>
        </div>

    </div>
     <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );
    </script>

    <script>

    function go_PassLecture(code) {
        if($("input[name='ischk']:checked").size() < 1){
            alert("이용안내에 동의하셔야 합니다.");
            return;
        }
        var url = '{{ site_url('/offPackage/show/prod-code/') }}' + code;
        location.href = url;
    } 

        function certOpen(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
             @if(empty($arr_promotion_params) === false)
            var url = '/certApply/index/page/{{$arr_promotion_params["page"]}}/cert/{{$arr_promotion_params["cert"]}}' ;
            window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
            @endif
        }

         /*탭*/
         $(document).ready(function(){
        $('.tab').each(function(){
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
        
            e.preventDefault()})})}
        );

    </script>
@stop