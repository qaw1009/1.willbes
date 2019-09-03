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
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position: relative;}

        /************************************************************/     

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/09/1384_top_bg.jpg) no-repeat center top;}       
        .evt01 {background:#fff;}
        .evt02 {background:#ff8a00;}
        .evt03 {background:#ececec; padding:0 0 150px}
        .evt03 .tabs {width:1090px; margin:0 auto;}
        .evt03 .tabs li {display:inline; float:left; width:25%}
        .evt03 .tabs li a {display:block; height:73px; line-height:73px; font-size:33px; background:#707070; color:#d3d3d3; margin-right:1px; border-top:8px solid #ececec}
        .evt03 .tabs li a:hover,
        .evt03 .tabs li a.active {background:#fff; color:#000; border-top:8px solid #fff}
        .evt03 .tabs li:last-child a {margin:0}
        .evt04 {background:#fff; padding:0 0 150px} 
        .evt04 div {width:1000px; margin:0 auto}
        .evt04 table {width:100%; border-top:2px solid #000; border-bottom:2px solid #000}        
        .evt04 table td,
        .evt04 table th {padding:15px; font-size:14px; border-right:1px solid #000}
        .evt04 th {font-weight:bold}  
        .evt04 thead th {color:#000; border-bottom:1px solid #000; background:#e2e2e2 }
        .evt04 tbody tr td:nth-child(1) {text-align:left; font-weight:bold}
        .evt04 table tr {border-bottom:1px solid #000; color:#999}
        .evt04 table tr span {padding:8px 0; border-radius:15px; background:#ccc; color:#000; display:block}
        .evt04 table tr.on {color:#000}
        .evt04 table tr.on span {background:#fcdea2;}        
        .evt04 table tbody tr:hover {
            background:#eee;    
        }
        .evt04 th:last-child,
        .evt04 td:last-child,
        .evt04 tbody tr:last-child {border:0}  
        
        .evt04 div ul {margin-top:20px}
        .evt04 div li {list-style-type:disc !important; margin-left:25px; text-align:left; font-size:14px; margin-bottom:10px;}
        .evt05 {background:#ececec; padding:0 0 150px} 
        .evt06 {background:#fff;} 
        
        .evt04 div a,      
        .evt05 a,
        .evt06 a {display:block; width:800px; margin:50px auto 0; padding:20px 0; border-radius:30px; font-size:24px; background:#000; color:#fff;}
        .evt06 a {position:absolute; top:926px; left:50%; margin:0 !important; margin-left:-400px !important}
        .evt04 div a:hover,      
        .evt05 a:hover,  
        .evt06 a:hover {background:#ff8a00;}
    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>

    <div class="p_re evtContent NGR" id="evtContainer">       
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1384_top.jpg" title="하프 불금모의고사"  />
        </div>
      
        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1384_01.jpg" title="하프 불금모의고사"  />         
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1384_02.jpg" title="하프 불금모의고사"  />
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1384_03.jpg" title="하프 불금모의고사"  />
            <div class="tabs">
                <ul class="NGEB">
                    <li><a href="#tab01">9월</a></li>
                    <li><a href="#tab02">10월</a></li>
                    <li><a href="#tab03">11월</a></li>
                    <li><a href="#tab04">12월</a></li>
                </ul>
                <div id="tab01"><img src="https://static.willbes.net/public/images/promotion/2019/09/1384_03_tab01.jpg" title="9월 하프 불금모의고사"  /></div>
                <div id="tab02"><img src="https://static.willbes.net/public/images/promotion/2019/09/1384_03_tab02.jpg" title="10월 하프 불금모의고사"  /></div>
                <div id="tab03"><img src="https://static.willbes.net/public/images/promotion/2019/09/1384_03_tab03.jpg" title="11월 하프 불금모의고사"  /></div>
                <div id="tab04"><img src="https://static.willbes.net/public/images/promotion/2019/09/1384_03_tab04.jpg" title="12월 하프 불금모의고사"  /></div>
            </div>
        </div>
        
        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1384_04.jpg" title="하프 불금모의고사"  />
            <div>
                <table cellspacing="0" cellpadding="0">
                    <col width="*" />
                    <col style="width:15%" />
                    <col style="width:15%" />
                    <col style="width:12%" />
                    <col style="width:14%" />
                    <thead>
                        <tr>
                            <th scope="col">강의명</th>
                            <th scope="col">과목</th>
                            <th scope="col">시간</th>
                            <th scope="col">일정</th>
                            <th scope="col">학원</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="on">
                            <td>2020년 합격대비 HALF 불금모의고사 [1회]</td>
                            <td>한국사/형소법/형법</td>
                            <td>18:00 ~ 18:30</td>
                            <td>9.20(금)</td>
                            <td><span>접수중</span></td>
                        </tr>
                        <tr class="on">
                            <td>2020년 합격대비 HALF 불금모의고사 [2회]</td>
                            <td>영어/경찰</td>
                            <td>18:00 ~ 18:30</td>
                            <td>10.4(금)</td>
                            <td><span>접수중</span></td>
                        </tr>
                        <tr class="on">
                            <td>2020년 합격대비 HALF 불금모의고사 [3회]</td>
                            <td>한국사/형소법/형법</td>
                            <td>18:00 ~ 18:30</td>
                            <td>10.11(금)</td>
                            <td><span>접수중</span></td>
                        </tr>
                        <tr>
                            <td>2020년 합격대비 HALF 불금모의고사 [4회]</td>
                            <td>영어/경찰학</td>
                            <td>18:00 ~ 18:30</td>
                            <td>10.18(금)</td>
                            <td><span>접수 준비중</span></td>
                        </tr>
                        <tr>
                            <td>2020년 합격대비 HALF 불금모의고사 [5회]</td>
                            <td>한국사/형소법/형법</td>
                            <td>18:00 ~ 18:30</td>
                            <td>10.25(금)</td>
                            <td><span>접수 준비중</span></td>
                        </tr>
                        <tr>
                            <td>2020년 합격대비 HALF 불금모의고사 [6회]</td>
                            <td>영어/경찰학</td>
                            <td>18:00 ~ 18:30</td>
                            <td>11.8(금)</td>
                            <td><span>접수 준비중</span></td>
                        </tr>
                        <tr>
                            <td>2020년 합격대비 HALF 불금모의고사 [7회]</td>
                            <td>한국사/형소법/형법</td>
                            <td>18:00 ~ 18:30</td>
                            <td>11.15(금)</td>
                            <td><span>접수 준비중</span></td>
                        </tr>
                        <tr>
                            <td>2020년 합격대비 HALF 불금모의고사 [8회]</td>
                            <td>영어/경찰학</td>
                            <td>18:00 ~ 18:30</td>
                            <td>11.22(금)</td>
                            <td><span>접수 준비중</span></td>
                        </tr>
                        <tr>
                            <td>2020년 합격대비 HALF 불금모의고사 [9회]</td>
                            <td>한국사/형소법/형법</td>
                            <td>18:00 ~ 18:30</td>
                            <td>12.6(금)</td>
                            <td><span>접수 준비중</span></td>
                        </tr>
                        <tr>
                            <td>2020년 합격대비 HALF 불금모의고사 [10회]</td>
                            <td>영어/경찰학</td>
                            <td>18:00 ~ 18:30</td>
                            <td>12.13(금)</td>
                            <td><span>접수 준비중</span></td>
                        </tr>
                        <tr>
                            <td>2020년 합격대비 HALF 불금모의고사 [11회]</td>
                            <td>한국사/형소법/형법</td>
                            <td>18:00 ~ 18:30</td>
                            <td>12.20(금)</td>
                            <td><span>접수 준비중</span></td>
                        </tr>
                    </tbody>
                </table>
                <ul>
                    <li>해당 모의고사는 학원전용 모의고사입니다.</li>
                    <li>학원일정에 따라 연기 또는 변경될수 있으며, 온라인은 진행하지 않습니다.</li>
                    <li>불금모의고사 문의 : 1544-0336</li>
                </ul>
                <a href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&campus_ccd=605001&course_idx=1096&subject_idx=1476" target="_blank" class="NSK-Black">HALF 불금 모의고사 신청하기 ></a>                
            </div>
            
        </div>

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1384_05.jpg" title="2020 합격대비 패키지"  />
            <a href="https://police.willbes.net/pass/offPackage/index?cate_code=3010&campus_ccd=605001&course_idx=1096" target="_blank" class="NSK-Black">모의고사 신청하기 ></a>
        </div>

        <div class="evtCtnsBox evt06">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1384_06.jpg" title="소문내고 무료쿠폰 받고"  />
            <a href="#none" onclick="giveCheck();" class="NSK-Black">HALF 불금 모의고사 응시쿠폰 받기 ></a>
        </div>

        {{--홍보url댓글--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial')
        @endif

    </div>
    <!-- End Container -->

    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        /*tab*/
        $(document).ready(function(){
            $('.tabs ul').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');
                $content = $($active[0].hash);

                $links.not($active).each(function () {
                    $(this.hash).hide();
                });

                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    $active.removeClass('active');
                    $content.hide();
                    $active = $(this);
                    $content = $(this.hash);
                });
                    $active.addClass('active');
                    $content.show();
                    e.preventDefault()
            });
        });

        function giveCheck() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            @if(empty($arr_promotion_params) === false)
                var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params["give_type"]}}&give_idx={{$arr_promotion_params["give_idx"]}}&event_code={{$data['ElIdx']}}&comment_chk_yn=Y';
                ajaxSubmit($regi_form, _check_url, function (ret) {
                    if (ret.ret_cd) {
                        alert('온라인 모의고사 무료 응시쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');
                        location.href = '{{ app_url('/classroom/coupon/index', 'www') }}';
                    }
                }, showValidateError, null, false, 'alert');
            @endif
        }

    </script>


@stop