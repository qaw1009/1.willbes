@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <style type="text/css">
        .Container {
            width:100% !important;
            min-width:1120px !important;
            padding:0 !important;
            background:#fff;
            text-align:center;
        }
        .evt_00 {background:#6696c7; margin-top:20px}
        .evtTop {background:#090909 url(https://static.willbes.net/public/images/promotion/main/2004/3103_top_bg_0113.jpg) no-repeat center top;  position:relative; padding-bottom:100px}
        .youtube {width:980px; margin:100px auto 0}
        .youtube iframe {width:980px; height:550px;}      

        .evt_01 {background:#fff;padding-bottom:100px;}
        .evt_01 ul {width:1120px; margin:0 auto;}
        .evt_01 li {display:inline; float:left; width:25%; text-align:center;font-size:14px;}
        .evt_01 li .gif_area img{width:250px; height:140px; margin:0 auto}
        .evt_01 li iframe {width:348px; height:220px; margin:0 auto}        
        .evt_01 li div {height:348px; line-height:25px;color:#222;}
        /*.evt_01 li div:first-child {font-size:16px; line-height:40px; height:40px;}*/
        .evt_01 ul:after {content:""; display:block; clear:both}
        .btn_area {display:inline-block;margin:20px 0 80px 0;}
        .btn_area .btn{background:#a8aaa7;color:#fff;font-size:18px;width:170px;}
        .btn_area a{display:inline-block;height:38px;line-height:38px;border-radius:25px;letter-spacing:-0.5px;transition:all 0.5s linear;}

        .evt_02 {background:#F3F3F3;}

        .evt_03 {background:#fff;position:relative;}
        .check {color:#000; font-size:15px;font-weight:bold;position:absolute;left:50%;top:50%;margin-left:-400px;margin-top:300px;}
        .check label {cursor:pointer}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a.infotxt {display:inline-block; padding:12px 20px 10px 20px;color:#fff; background:#000; margin-left:50px; border-radius:20px}

        .evt_03_info {padding-top:100px;}

        .evt_04 {background:#F3F3F3;padding-bottom:150px;}
        .evt_04 .tabBox {position:relative; width:1120px; margin:0 auto;}
        .evt_04 .tab li {display:inline; float:left; width:33.333333%;}
        .evt_04 .tab li a {display:block; text-align:center; font-size:22px; font-weight:600; background:#fff; color:#000; height:60px; line-height:60px; border:1px solid #1a1a1a; margin-right:1px}
        .evt_04 .tab li a:hover,
        .evt_04 .tab li a.active {background:#9b1f29; color:#fff;}
        .evt_04 .tab li:last-child a {margin:0}
        .evt_04 .tab:after {content:""; display:block; clear:both}

        .evt_05 {background:#fdfdfd;}

        .evt_06 {background:#F6F6F6;padding-bottom:125px;}
        .evt_06 .tabBox {position:relative; width:1120px; margin:0 auto;}
        .evt_06 .tab li {display:inline; float:left; width:50%;}
        .evt_06 .tab li a {display:block; text-align:center; font-size:22px; font-weight:600; background:#fff; color:#000; height:60px; line-height:60px; margin-right:1px; border:1px solid #1a1a1a;}
        .evt_06 .tab li a:hover,
        .evt_06 .tab li a.active {background:#9b1f29; color:#fff;}
        .evt_06 .tab li:last-child a {margin:0}
        .evt_06 .tab:after {content:""; display:block; clear:both}

         /* 이용안내 */
        .wb_info {padding:100px 0;}
        .guide_box{width:1120px; margin:0 auto; border:2px solid #202020;padding:50px; text-align:left; word-break:keep-all}
        .guide_box h2 {font-size:30px; margin-bottom:30px}
        .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; padding:5px 10px; font-weight:bold; margin-right:10px; font-size:17px;}        
        .guide_box dd{color:#777; margin:0 0 20px 5px; line-height:17px}
        .guide_box dd strong {color:#555}
        .guide_box dd li{margin-bottom:3px; list-style:decimal; margin-left:20px;font-size:13px;}
        .guide_box dd:after {content:""; display:block; clear:both}
        .guide_box .inquire{padding-top:25px;font-size:20px;font-weight:bold;color:#000;}   
        .guide_box .infoTit {font-size:20px;}  
    </style>


    <div id="Container" class="Container gosi NGR c_both">
        <div class="Menu widthAuto NGR c_both">
            @include('willbes.pc.layouts.partial.site_menu')
        </div>

        <div class="evt_00">
            <a href="https://pass.willbes.net/promotion/index/cate/3103/code/2033"><img src="https://static.willbes.net/public/images/promotion/main/2003/3103_1120x100.jpg"></a>
        </div>

        <div class="evtTop">
            <img src="https://static.willbes.net/public/images/promotion/main/2004/3103_top_0113.jpg" usemap="#Map3103" border="0" />
            <map name="Map3103">
                <area shape="rect" coords="191,1340,930,1480" href="/promotion/index/cate/3103/code/2030" alt="강의신청">
            </map>    
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/dcIflRAmSgE?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>           
        </div>

        <div class="evt_01">
            <img src="https://static.willbes.net/public/images/promotion/main/2004/3103_01.jpg" alt="">
            <ul>
                @for($i=1; $i<=12; $i++)
                    @if(isset($data['arr_main_banner']['메인_무료강좌'.$i]) === true)
                        <li>
                            {!! banner_html($data['arr_main_banner']['메인_무료강좌'.$i]) !!}
                        </li>
                    @endif
                @endfor
            </ul>
            <img src="https://static.willbes.net/public/images/promotion/main/2004/3103_01_detail.gif" alt="" usemap="#Map3103a" border="0">
            <map name="Map3103a" id="Map3103a">
                <area shape="rect" coords="219,18,900,88" href="#to_go" />
            </map>
        </div>

        <div class="evt_02">
            <img src="https://static.willbes.net/public/images/promotion/main/2004/3103_02.jpg" />         
        </div>

        <div class="evt_03" id="evt03">
            <img src="https://static.willbes.net/public/images/promotion/main/2004/3103_03.jpg" usemap="#Map3103b" border="0" />
            <map name="Map3103b" id="Map3103b">
                <area shape="rect" coords="129,346,548,522" href="javascript:go_PassLecture('173664');" alt="수강신청" />
                <area shape="rect" coords="578,347,1000,523" href="javascript:go_PassLecture('173904');" alt="수강신청" />
            </map>         
            <div class="check" id="chkInfo">   
                <label>
                    <input name="ischk" type="checkbox" value="Y" />
                        페이지 하단 Perfect PSAT Program 온라인 PASS반 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#notice" class="infotxt">이용안내확인하기 ↓</a>
            </div>               
        </div>

        <div class="evt_03_info">
            <img src="https://static.willbes.net/public/images/promotion/main/2004/3103_03_info.jpg" />       
        </div>        

        <div class="evt_04">
            <img src="https://static.willbes.net/public/images/promotion/main/2004/3103_04.jpg" alt="">
            <div class="tabBox">
                <ul class="tab">
                    <li><a href="#tab01" class="active">자료해석</a></li>
                    <li><a href="#tab02">상황판단</a></li>
                    <li><a href="#tab03">언어논리</a></li>
                </ul>
                <div id="tab01" style="padding-top:40px;">
                    <img src="https://static.willbes.net/public/images/promotion/main/2004/3103_tab_c1.png" alt="">
                </div>
                <div id="tab02" style="padding-top:40px;">
                    <img src="https://static.willbes.net/public/images/promotion/main/2004/3103_tab_c2.png" alt="">
                </div>
                <div id="tab03" style="padding-top:40px;">                    
                    <img src="https://static.willbes.net/public/images/promotion/main/2004/3103_tab_c3.png" alt="">
                    <img src="https://static.willbes.net/public/images/promotion/main/2004/3103_tab_c4.png" alt="" style="padding-top:40px;">
                </div>
            </div>
        </div>

        <div class="evt_05">
            <img src="https://static.willbes.net/public/images/promotion/main/2004/3103_05.jpg" />       
        </div> 

         <div class="evt_05">
            <img src="https://static.willbes.net/public/images/promotion/main/2004/3103_05_mid.gif" />       
        </div>

         <div class="evt_05">
            <img src="https://static.willbes.net/public/images/promotion/main/2004/3103_05_bt.jpg" />       
        </div> 

        <div class="evt_06" id="to_go">
            <img src="https://static.willbes.net/public/images/promotion/main/2004/3103_06.jpg" />       
            <div class="tabBox">
                <ul class="tab">
                    <li><a href="#tab04" class="active">모의평가 전(2020년 10월~11월)</a></li>
                    <li><a href="#tab05">모의평가 후(2021년 1월~6월)</a></li>
                </ul>
                <div id="tab04">
                    <div class="mt40">
                        <img src="https://static.willbes.net/public/images/promotion/main/2004/3103_tab2_c1.png" alt="">
                    </div>
                    <div class="mt40">
                        <a href="https://pass.willbes.net/promotion/index/cate/3103/code/1933">
                            <img src="https://static.willbes.net/public/images/promotion/main/2004/3103_tab2_c2.png" alt="">
                        </a>
                    </div>
                </div>
                <div id="tab05">
                    <div class="mt40">
                        <img src="https://static.willbes.net/public/images/promotion/main/2004/3103_tab2_c3.png" alt="">
                    </div>
                    <div class="mt40">
                        <img src="https://static.willbes.net/public/images/promotion/main/2004/3103_tab2_c4.png" alt="">
                    </div>
                    <div class="mt40">
                        <img src="https://static.willbes.net/public/images/promotion/main/2004/3103_tab2_c5.png" alt="">
                    </div>
                </div>
            </div>
        </div> 

        <div class="evtCtnsBox wb_info" id="notice">
            <div class="guide_box">
                <h2 class="NSK-Black">윌비스 한림법학원 Perfect PSAT Program 온라인 PASS반 이용안내</h2>
                <dl>    

                    <dt>이용안내</dt>
                    <dd>
                        <ol>
                            <li>본 상품은 2021년 7급공무원 1차시험(PSAT)을 준비하시는 분을 위해 준비되었습니다.[과목별 교수님]<br>
                                자료해석 : 석치수, 상황판단 : 박준범, 언어논리(택1) : 이나우/한승아
                            </li>
                            <li>수강기간 : 본 상품에 등록된 강의는 2021년  7급공무원 1차시험(PSAT)일까지 수강하실 수 있습니다.</li>
                            <li>무제한수강 : 본 상품은 수강기간 동안 강의배수제한 없이 무제한 수강하실 수 있습니다.</li>
                            <li>CORE 특강 무료제공 : 11월(과목별 4~5회) CORE특강이 무료 업로드 예정입니다.</li>
                            <li>진행(업로드) 강좌 순차 업로드 : OPEN CLASS(기본, 21년 1~2월), ADVANCED CLASS(심화, 21년 3~4월)<br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MASTER CLASS(실전모강, 21년 5~6월)강의가 수강하실 수 있게 순차적으로 업로드 될 예정입니다.
                            </li>
                            <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dt>교재</dt>
                    <dd>
                        <ol>
                            <li>각 강의수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 교재구매 메뉴에서 별도 구매 가능합니다.</li>
                        </ol>
                    </dd>

                    <dt>환불</dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                            <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                            <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                            <li>고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, Perfect PSAT Program 온라인 PASS반 결제가 기준으로 계산하여 사용일수만큼 차감 후 환불됩니다.<br>(환불시 CORE 특강 수강료도 정가기준 수강부분만큼 차감 후 환불됩니다.)</li>
                        </ol>
                    </dd>

                    <dt>PASS 수강</dt>
                    <dd>
                        <ol>
                            <li>로그인 후 [내강의실] 에서 [무한PASS존]으로 접속합니다.</li>
                            <li>구매한 PASS 상품 선택 후 [강좌추가] 를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>   
                            <li>Perfect PSAT Program 온라인 PASS반은 일시 정지, 수강 연장, 재수강 불가합니다.</li>   
                            <li>Perfect PSAT Program 온라인 PASS반 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다.<br>
                                - 총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대
                            </li>   
                            <li>PC, 모바일 기기에 대한 초기화가 필요할 경우 내용확인 후 진행이 가능하오니 고객센터로 문의 부탁드립니다.<br>
                                (수강기간동안 3회 신청가능)                          
                            </li>     
                            <li>일부 강좌의 경우 자료 출력 횟수 제한이 적용될 수 있습니다.</li>                       
                        </ol>
                    </dd>

                    <dt>유의사항</dt>
                    <dd>
                        <ol>
                            <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.</li>
                            <li>Perfect PSAT Program 온라인 PASS반 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며, 이로 인한 환불은 불가합니다.</li>
                            <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 Perfect PSAT Program 온라인 PASS반은 즉시 정지, 회원 자격이 박탈됩니다. 이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생 할 수 있습니다.</li>
                        </ol>
                    </dd>
                    <div class="infoTit NG"><strong>※ 이용 문의 : 윌비스 고객만족센터 1566-4770 > 3</strong></div>

                </dl>
            </div>
        </div>

        <div id="QuickMenu" class="MainQuickMenu">
            {{-- quick menu --}}
            @include('willbes.pc.site.main_partial.quick_menu_' . $__cfg['SiteCode'])
        </div>
    </div>

    <!-- End Container -->
    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <script type="text/javascript">
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

        function go_popup() {
            $('#popup').bPopup();
        };
        function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ site_url('/periodPackage/show/cate/3103/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }
    </script>
    {!! popup('657001', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
@stop