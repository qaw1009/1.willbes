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
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/
        .sky {position:fixed;top:200px;right:10px;z-index:1;}
        .sky a {display:block; margin-bottom:10px}
        
        .evt00 {background:#0a0a0a}

        .evtTop {background:url("https://static.willbes.net/public/images/promotion/2021/05/2194_top_bg.jpg") no-repeat center top;} 

        .evt_coupon {background:#FAE502;}
       
        .evt01 {padding-bottom:100px; background:#fff !important}
        .evt01 .slide_con {position:relative; width:900px; margin:0 auto}
        .evt01 .slide_con p {position:absolute; top:50%; margin-top:-22px; width:44px; height:45px; z-index:10}
        .evt01 .slide_con p.leftBtn {left:-80px}
        .evt01 .slide_con p.rightBtn {right:-80px}
        .evt01 .slide_con li {display:inline; float:left}
        .evt01 .slide_con li img {width:100%}
        .evt01 .slide_con ul:after {content::""; display:block; clear:both}
        .evt01_04 {background:#f7f1bf}

        .evt02 {background:#ececec;}
        .evt02 .passLecBuy {position:relative; width:1120px; margin:0 auto;  }
        .evt02 .passLecBuy .price {background:url(https://static.willbes.net/public/images/promotion/2021/05/2194_01_bg.jpg) repeat-y center;} 
        .evt02 .passLecBuy ul {margin-left:27px;}
        .evt02 .passLecBuy li {display:inline; float:left; text-align:left; line-height:30px; font-size:14px; color:#000; width:calc(25% - 21px); margin-right:21px}
        .evt02 .passLecBuy li div {font-size:14px; font-weight:bold; background:#006bbe; color:#fff; text-align:left; padding:15px 30px; 
            border-radius:10px; margin:0 20px}
        .evt02 .passLecBuy li:last-child {margin-right:0}
        .evt02 .passLecBuy li:last-child p {font-size:16px}
        .evt02 strong {font-family:Verdana, Geneva, sans-serif; font-size:30px}
        .evt02 .passLecBuy ul:after {content:""; display:block; clear:both}        
        .evt02 input[type="radio"] {height:18px; width:18px; vertical-align:middle}
        .evt02 input[type="checkbox"] {height:20px; width:20px; vertical-align:middle}
        .evt02 input:checked + label {border-bottom:1px dashed #0d3692} /*컬러변경*/
        .evt02 .passLecBuy span {position:absolute; top:1070px; left:222px; z-index:10; font-size:16px; color:#000}
        .evt02 .passLecBuy span label {border-bottom:0}
        .evt02 .passLecBuy span input:checked + label {border-bottom:0}

        .evt02 .passLecBuy .totalPrice {width:930px; margin:100px auto; font-size:36px; color:#fff; background:#000; border-radius:60px; height:80px; line-height:80px}
        .evt02 .passLecBuy .totalPrice strong {color:#ffe500}
        .evt02 .passLecBuy .totalPrice a {background:#c00d0d; display:inline-block; padding:0 30px; float:right;border-radius:0 60px 60px 0; }
        .evt02 .passLecBuy .totalPrice:after {content:''; display:block; clear:both}

        .evt02 .check {width:800px; margin:0 auto; padding:20px; font-size:16px; color:#000; text-align:left; letter-spacing:-1px;}
        .evt02 .check a {display:inline-block; padding:10px; color:#fff; background:#000; margin-left:40px; border-radius:20px; font-size:12px}
        .evt02 .check p {font-size:14px; padding:10px 0 0 20px; line-height:1.4}

        .evt02 .passLecbtn {width:980px; margin:0 auto; padding:40px 20px 80px; background:#898989}
        .evt02 .passLecbtn ul {border:1px solid #000; background:#fff; box-shadow: 0 5px 10px rgba(0,0,0,.5);}
        .evt02 .passLecbtn li {display:inline; float:left; width:100%; color:#000; height:80px; line-height:80px}
        .evt02 .passLecbtn li a {background:#000; color:#fff; display:block; font-size:26px;}
        .evt02 .passLecbtn li a:hover {background:#0d3692}
        .evt02 .passLecbtn span {margin-left:50px}
        .evt02 .passLecbtn ul:after {content:""; display:block; clear:both}

        .evt03 {background:#313131 url(https://static.willbes.net/public/images/promotion/2020/09/1864_03_bg.jpg) no-repeat center top; padding-bottom:150px}
        .evt03 iframe {width:853px; height:480px}

        .evt04 {background:#1a1a1a;} 

        .evt04_01 {background:#272727; padding-bottom:150px}
        .evt04_01 .slide_con {width:784px; margin:0 auto; position:relative;}
        .evt04_01 .slide_con p {position:absolute; top:50%; margin-top:-22px; width:44px !important; height:45px !important; z-index:10}
        .evt04_01 .slide_con p.leftBtn {left:-22px}
        .evt04_01 .slide_con p.rightBtn {right:-22px}
        .evt04_01 .slide_con li {display:inline; float:left}
        .evt04_01 .slide_con li img {width:100%}
        .evt04_01 .slide_con ul:after {content::""; display:block; clear:both}

        .evt04_02 {background:#1a1a1a;}  
        .evt04_03 {background:#343434;}
        .evt04_03 .playTv {position:relative;}
        .evt04_03 .playTv div {position:absolute; top:2346px; width:328px; left:50%; margin-left:-333px; z-index:1}
        .evt04_03 .playTv div:last-child {margin-left:10px}
        .evt04_03 .playTv iframe {width:328px; height:184px}
        
        .evt05 {background:#eee;}
        
        .evt07 {background:#fff;  position:relative}
        .evt07 .youtube iframe {width:550px; height:310px} 
        .evt07 .youtube {position:absolute; top:241px; left:52.3%; width:455px; z-index:1; margin-left:-479px; box-shadow:0 10px 20px rgba(0,0,0,.3);}     
        .evt07 .youtube.yu02 {top:670px; margin-left:-168px;}
        .evt07 .youtube.yu03 {top:1101px;}   

        .evt08 {background:#5b68ea;}

        .evt09 {background:#f6f9fe;}
        
        .evt10, .evt11 {background:#f8aece;}

        br { font-family:dotum;}

        /* 이용안내 */
        .content_guide_wrap{background:#fff; width:1000px; margin:0 auto; padding:100px 0; font-size:14px}
        .content_guide_wrap .guide_tit{margin-bottom:50px; text-align:left; font-size:30px;}

        .content_guide_wrap .tabs {width:1000px; margin:0 auto;} 
        .content_guide_wrap .tabs li {display:inline; float:left; width:25%}
        .content_guide_wrap .tabs li a {display:block; text-align:center; height:60px; line-height:60px; font-size:140% !important; border:2px solid #f3f3f3; border-bottom:2px solid #202020; background:#f3f3f3}
        .content_guide_wrap .tabs li a:hover,
        .content_guide_wrap .tabs li a.active {border:2px solid #202020; border-bottom:2px solid #fff; color:#202020; background:#fff; font-weight:600}
        .content_guide_wrap .tabs:after {content:""; display:block; clear:both}
        .content_guide_box {width:1000px; margin:0 auto; border:2px solid #202020; border-top:0; padding-top:30px}
        .content_guide_box dl{margin:0 20px; word-break:keep-all; padding:30px}
        .content_guide_box dt{margin-bottom:10px}
        .content_guide_box dt h3{color:#fff; background:#333; display:inline-block; padding:3px 7px; margin-right:10px; font-size:120%}
        .content_guide_box dt img.btn{padding:2px 0 0 0}
        .content_guide_box dd{color:#777; margin:0 0 20px 5px; line-height:17px}
        .content_guide_box dd strong {color:#555}
        .content_guide_box dd li{margin-bottom:5px; list-style:decimal; margin-left:20px; line-height:1.5}
        .content_guide_box dd li span {vertical-align: top;}
        .content_guide_box .step {display:inline-block; float:left; width:23%; border:1px solid #c4c4c4; margin-top:10px; margin-right:2%; text-align:center; line-height:1.2}
        .content_guide_box .step h4 {color:#fff; font-size:18px; background:#c4c4c4; padding:10px 0}
        .content_guide_box .step h5 {font-size:18px; color:#333; font-weight:bold; margin-bottom:20px}
        .content_guide_box .step div {padding:20px; min-height:200px; font-size:14px}
        .content_guide_box .step span {color:#fd4e3d; font-size:10px;}
        .content_guide_box dd:after {content:""; display:block; clear:both}

        /*타이머*/
        .newTopDday * {font-size:24px}
        .newTopDday {background:#f5f5f5; width:100%; padding:10px 0 35px}
        .newTopDday div {font-size:22pt;color:#000; margin-top:10px;}
        .newTopDday ul {width:1210px; margin:0 auto}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; height:60px; padding-top:10px !important; font-weight:600; color:#000}
        .newTopDday ul li strong {line-height:70px}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {text-align:right; padding-right:20px; width:28%}
        .newTopDday ul li:first-child span {font-size:12px; color:#999; margin-top:4px;}
        .newTopDday ul li:last-child {text-align:left; padding-left:20px; width:24%}
        .newTopDday ul li:last-child a {display:inline-block; font-size:14px; padding:4px 20px; background:#999; color:#FFF; text-align:center; border-radius:20px}
        .newTopDday ul li:last-child a:hover {background:#666}
        .newTopDday ul li:last-child span {display:block; margin-top:10px}
        .newTopDday ul:after {content:""; display:block; clear:both}

         /*레이어팝업*/
         .Pstyle {
            opacity: 0;
            display: none;
            position: relative;
            width: auto;
            background-color: #fff;
        }
        .b-close {
            position: absolute;
            right: 10px;
            top: 10px;
            padding: 5px;
            display: inline-block;
            cursor: pointer;
        }
        .Pstyle .content {height:auto; width:auto;}

    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}

        <input type="hidden" id="chk_price" name="chk_price" value="0"/>
    </form>

    <div class="evtContent NSK" id="evtContainer">
        <div class="sky">
            <a href="#pass">
                <img src="https://static.willbes.net/public/images/promotion/2021/05/2194_sky01.png" alt="무제한 패스">
            </a>     
            <a href="#pass2">
                <img src="https://static.willbes.net/public/images/promotion/2021/05/2194_sky02.png" alt="개편 패스">
            </a>  
            <a href="#twenty">
                <img src="https://static.willbes.net/public/images/promotion/2021/05/2194_sky03.png" alt="갓스물 할인쿠폰">
            </a>  
            <a href="#coupon">
                <img src="https://static.willbes.net/public/images/promotion/2021/05/2194_sky04.png" alt="가정의 달 할인쿠폰">
            </a>  
        </div>

        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday">
            <div id="ddaytime">
                <ul>
                    <li>
                        <span>윌비스 신광은 경찰 2021~22대비</span>
                        <div class="NSK-Black">0원 PASS {{$arr_promotion_params['turn']}}기</div>
                    </li>
                    <li><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>일</strong></li>
                    <li><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>:</strong></li>
                    <li><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>:</strong></li>
                    <li><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li>
                        <a href="#pass" target="_self">수강하기 &gt;</a>
                        <span class="NSK-Black">{{ kw_date('n.j(%)', $arr_promotion_params['edate']) }} {{ $arr_promotion_params['etime'] or '' }} 마감!</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1864_first.jpg"  alt="경찰학원부분 1위"/>
        </div>

        <div class="evtCtnsBox evtTop" id="main">
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2194_top.jpg" alt="무제한 PASS"/>
        </div>

        <div class="evtCtnsBox evt02" id="pass">
            <div class="passLecBuy">
                <div>               
                    <img src="https://static.willbes.net/public/images/promotion/2021/05/2194_01_01.jpg"  alt="신광은경찰PASS">
                </div>

                <div class="price">
                    <ul>
                        <li>
                            <div>
                            <strong>110</strong>만원<br>
                            <input type="radio" id="y_pkg1" name="y_pkg" value="182147" data-sale-price="1100000"/> <label for="y_pkg1">무제한 PASS</label>
                            </div>
                        </li>
                        <li>
                            <div>
                                <strong>77</strong>만원<br>
                                <input type="radio" id="y_pkg2" name="y_pkg" value="182149" data-sale-price="770000"/> <label for="y_pkg2">15개월 개편 PASS</label>
                            </div>
                        </li>
                        <li>
                            <div>
                                <strong>69</strong>만원<br>
                                <input type="radio" id="y_pkg3" name="y_pkg" value="182150" data-sale-price="690000"/> <label for="y_pkg3">11개월 개편 PASS</label>
                            </div>
                        </li>
                        <li>
                            <div>
                                <strong>55</strong>만원<br>
                                <input type="radio" id="y_pkg4" name="y_pkg" value="182148" data-sale-price="550000"/> <label for="y_pkg4">2021 PASS</label>
                            </div>
                        </li>
                    </ul>

                    <img src="https://static.willbes.net/public/images/promotion/2021/05/2194_01_02.jpg"  alt=""/>
                </div>
                
{{--                <div>--}}
{{--                    <a href="#none" onclick="goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'periodpack_lecture', 'Y');">--}}
{{--                        <img src="https://static.willbes.net/public/images/promotion/2021/05/2194_01_02.jpg"  alt="체력"/>--}}
{{--                    </a>--}}
{{--                </div>--}}

                <div class="totalPrice">
                    총 결제금액 : <strong class="NSK-Black total_price">0</strong>원
                    <a href="javascript:void(0);" onclick="termsCheck('is_chk1');">
                        신청하기 >
                    </a>
                </div>    

                <div class="check">
                    <input type="checkbox" id="is_chk1" name="is_chk" value="Y"/> <label for="is_chk">페이지 하단 신광은 경찰 PASS 이용안내를 모두 확인하였고, 이에 동의합니다. </label>
                    <a href="javascript:goDesc('tab1')">이용안내확인하기 ↓</a>
                    <p>
                        ※ 강의공유, 콘텐츠 부정사용 적발 시, 0원 패스의 수강기간 갱신 및 환급이 불가합니다.<br />
                        ※ 강좌 및 교수진은 학원 사정에 따라 변경될 수 있습니다.<br/>
                        ※ 쿠폰은 PASS 결제 후 [내강의실>결제관리>쿠폰/수강권관리] 에서 확인 가능합니다.<br />
                        ※ 재수강 & 환승쿠폰은 기간 갱신 가능 패스에는 적용되지 않습니다.
                    </p>
                </div>

                <div>               
                    <img src="https://static.willbes.net/public/images/promotion/2021/05/2194_01_03.jpg"  alt="재수강, 환승">
                    <a href="https://www.willbes.net/classroom/qna/index" target="_blank" title="재수강 쿠폰받기" style="position: absolute; left: 41.8%; top: 87.41%; width: 12.45%; height: 2.43%; z-index: 2;"></a>
                    <a href="https://police.willbes.net/promotion/index/cate/3001/code/1139" target="_blank" title="환승 쿠폰받기" style="position: absolute; left: 75.52%; top: 87.41%; width: 12.45%; height: 2.43%; z-index: 2;"></a>
                </div>
            </div>

            <!--레이어팝업-->
            <div id="popup1" class="Pstyle">
                <span class="b-close">X</span>
                <div class="content">
                    <img src="https://static.willbes.net/public/images/promotion/2021/05/2194_pop01.png"/>
                </div>
            </div>

            <div id="popup2" class="Pstyle">
                <span class="b-close">X</span>
                <div class="content">
                    <img src="https://static.willbes.net/public/images/promotion/2021/05/2194_pop02.png"/>
                </div>
            </div>

            <div id="popup3" class="Pstyle">
                <span class="b-close">X</span>
                <div class="content">
                    <img src="https://static.willbes.net/public/images/promotion/2021/05/2194_pop03.png"/>
                </div>
            </div>

        </div>
        <!-- evt02//-->  

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1864_03.jpg" alt="열공지원" />
            <iframe width="853" height="480" src="https://www.youtube.com/embed/4947Jur0ZP4?rel=0" frameborder="0" allowfullscreen></iframe>
        </div>  

        <div class="evtCtnsBox evt04">  
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2194_01s.jpg"  alt="최정예 교수진" />
        </div>
         
        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1864_02.jpg"  alt="수식이 필요없는"/>
            <div class="slide_con">
                <ul id="slidesImg4">
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/09/1864_01_txt01.png" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/09/1864_01_txt02.png" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/09/1864_01_txt03.png" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/09/1864_01_txt04.png" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/09/1864_01_txt05.png" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/09/1864_01_txt06.png" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft4"><img src="https://static.willbes.net/public/images/promotion/2020/09/1864_01_arrowL.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight4"><img src="https://static.willbes.net/public/images/promotion/2020/09/1864_01_arrowR.png"></a></p>
            </div>            
        </div>        

        <div class="evtCtnsBox evt04_01">  
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2194_02s.jpg"  alt="합격을 통한 검증한 기간" />
            <div class="slide_con">
                <ul id="slidesImg3">
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/09/1864_04_02_txt01.jpg" alt="1" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/09/1864_04_02_txt02.jpg" alt="2" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/09/1864_04_02_txt03.jpg" alt="3" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/09/1864_04_02_txt04.jpg" alt="4" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft3"><img src="https://static.willbes.net/public/images/promotion/2020/09/1864_01_arrowL.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight3"><img src="https://static.willbes.net/public/images/promotion/2020/09/1864_01_arrowR.png"></a></p>
            </div>
        </div>

        <div class="evtCtnsBox evt05">  
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2194_02.jpg"  alt="준비해야 하는 이유" />
        </div>

        <div class="evtCtnsBox evt06">  
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2194_03.jpg"  alt="reason1" />
        </div>

        <div class="evtCtnsBox evt07">  
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2194_04.jpg"  alt="3법 전문" />
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/40LDBoOoD_k?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="youtube yu02">
                <iframe src="https://www.youtube.com/embed/VHTrL5w2IF4?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="youtube yu03">
                <iframe src="https://www.youtube.com/embed/KkESWQLjtq8?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>		
        </div>

        <div class="evtCtnsBox evt08">  
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2194_05.jpg"  alt="reason2" />
        </div>

        <div class="evtCtnsBox evt09">  
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2194_06.jpg"  alt="reason3" />
        </div>

        <div class="evtCtnsBox evt10" id="twenty">
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2194_07.jpg"  alt="스폐셜 혜택" />
            <a href="javascript:void(0);" title="갓스물 인증하기" onclick="certOpen();" style="position: absolute; left: 33.55%; top: 88.14%; width: 31.54%; height: 6.86%; z-index: 2;"></a>
        </div>

        <div class="evtCtnsBox evt11" id="coupon">
            <form id="add_apply_form" name="add_apply_form">
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                <input type="hidden" name="event_idx" value="{{ $data['ElIdx'] }}"/>
                <input type="hidden" name="register_type" value="promotion"/>

                <img src="https://static.willbes.net/public/images/promotion/2021/05/2194_08.jpg"  alt="쿠폰 다운로드" />
                <a href="javascript:void(0);" title="교재 신청하기" onclick="fn_promotion_etc_submit();" style="position: absolute; left: 28.55%; top: 62.14%; width: 18.54%; height: 4.86%; z-index: 2;"></a>
                <a href="javascript:void(0);" title="쿠폰 다운로드" onclick="giveCheck();" style="position: absolute; left: 54.55%; top: 62.14%; width: 18.54%; height: 4.86%; z-index: 2;"></a>
            </form>
        </div>

        <div class="evtCtnsBox evt02" id="pass2">
            <div class="passLecBuy">
                <div>               
                    <img src="https://static.willbes.net/public/images/promotion/2021/05/2194_01_01.jpg"  alt="신광은 경찰 PASS">
                </div>

                <div class="price">
                    <ul>
                        <li>
                            <div>
                            <strong>110</strong>만원<br>
                            <input type="radio" id="y_pkg5" name="y_pkg" value="182147" data-sale-price="1100000"/> <label for="y_pkg5">무제한 PASS</label>
                            </div>
                        </li>
                        <li>
                            <div>
                                <strong>77</strong>만원<br>
                                <input type="radio" id="y_pkg6" name="y_pkg" value="182149" data-sale-price="770000"/> <label for="y_pkg6">15개월 개편PASS</label>
                            </div>
                        </li>       
                        <li>
                            <div>
                            <strong>69</strong>만원<br>
                            <input type="radio" id="y_pkg7" name="y_pkg" value="182150" data-sale-price="690000"/> <label for="y_pkg7">11개월 개편PASS</label>
                            </div>
                        </li>
                        <li>
                            <div>
                                <strong>55</strong>만원<br>
                                <input type="radio" id="y_pkg8" name="y_pkg" value="182148" data-sale-price="550000"/> <label for="y_pkg8">2021 PASS</label>
                            </div>
                        </li>                                  
                    </ul>
                    <img src="https://static.willbes.net/public/images/promotion/2021/05/2194_01_02.jpg"  alt="">
                </div>
                
                <div class="totalPrice">
                    총 결제금액 : <strong class="NSK-Black total_price">0</strong>원
                    <a href="javascript:void(0);" onclick="termsCheck('is_chk2');">
                        신청하기 >
                    </a>
                </div>    

                <div class="check">
                    <input type="checkbox" id="is_chk2" name="is_chk" value="Y"/> <label for="is_chk">페이지 하단 신광은 경찰 PASS 이용안내를 모두 확인하였고, 이에 동의합니다. </label>
                    <a href="javascript:goDesc('tab1')">이용안내확인하기 ↓</a>
                    <p>
                        ※ 강의공유, 콘텐츠 부정사용 적발 시, 0원 패스의 수강기간 갱신 및 환급이 불가합니다.<br>
                        ※ 강좌 및 교수진은 학원 사정에 따라 변경될 수 있습니다.<br>
                        ※ 쿠폰은 PASS 결제 후 [내강의실>결제관리>쿠폰/수강권관리] 에서 확인 가능합니다.<br>
                        ※ 재수강 & 환승쿠폰은 기간 갱신 가능 패스에는 적용되지 않습니다.
                    </p>
                </div>

                <div>
                    <img src="https://static.willbes.net/public/images/promotion/2021/05/2194_01_03.jpg"  alt="재수강, 환승">
                    <a href="https://www.willbes.net/classroom/qna/index" target="_blank" title="재수강 쿠폰받기" style="position: absolute; left: 41.8%; top: 87.41%; width: 12.45%; height: 2.43%; z-index: 2;"></a>
                    <a href="https://police.willbes.net/promotion/index/cate/3001/code/1139" target="_blank" title="환승 쿠폰받기" style="position: absolute; left: 75.52%; top: 87.41%; width: 12.45%; height: 2.43%; z-index: 2;"></a>
                </div>
            </div>
        </div>
        <!-- evt02//--> 

        <div class="content_guide_wrap" id="tab">
            <p class="guide_tit">윌비스 <span class="NSK-Black tx-blue">신광은 경찰 PASS </span> 이용안내 </p>
            <ul class="tabs">
                <li><a href="#tab1">무제한 PASS</a></li>
                <li><a href="#tab2">15개월 개편 PASS
                <li><a href="#tab3">11개월 개편 PASS</a></li>
                <li><a href="#tab4">2021 PASS</a></li>
            </ul>

            <div class="content_guide_box" id="tab1">
                <dl>
                    <dt>
                        <h3>무제한 PASS</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 상품은 기본 수강기간(12개월) 내 불합격 인증 시 22년 2차까지 수강기간 연장되는 상품입니다.</li>
                            <li>본 상품은 일반경찰/경행경채, 기존과목/개편과목(일반경찰) 구분 없이 전 과정 수강 가능합니다. ( <a class="tx-blue" href="javascript:go_popup1()">수강가능 교수진 확인하기 ></a> )<br>
                                * 2022년 경행경채 대비 범죄학은 수강 불가합니다.
                            </li>
                            <li>선택한 신광은 경찰 PASS 상품의 표기된 기간 동안 동영상 강좌를 무제한 수강할 수 있습니다.</li>
                            <li>신광은 경찰 PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다. (결제완료자에 한함)</li>
                            <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>교재 및 교재포인트</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>신광은 경찰 PASS 수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌 별 교재는 강좌 소개 및 교재 구매 메뉴에서 별도 구매 가능합니다.</li>
                            <li>PASS 구매 시 관리자 확인 후 2022년 대비 기초입문서가 장바구니로 지급됩니다.<br/> (단, 주말 및 공휴일 인증 요청건의 경우, 휴일 다음날 22시 이전에 일괄 처리)</li>
                            <li>지급되는 기초입문서는 장바구니에서 0원으로 교재 주문해야 합니다. (배송비 본인 부담)</li>
                            <li>중도 환불 시 제공받은 입문서는 판매가 기준으로 차감 후 환불됩니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>수강기간 연장</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>무제한 PASS는 갱신형 상품입니다. 시험 응시 후 불합격 인증하여야 수강기간이 갱신되며, 22년 2차 필기시험일까지 무료 연장됩니다.</li>
                            <li>수강기간 갱신이 필요한 경우 갱신 신청 기간 내에 직전 시험 불합격 증빙(응시표, 성적표)자료를 제출하셔야 합니다.</li>
                            <li>불합격 인증 시에 전과목 0점일 경우 수강기간 갱신은 불가능합니다.</li>
                            <li>시험 접수 후 시험에 응시하지 못한 경우 수강기간 갱신 불가합니다.</li>
                            <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
                            <li>상품에 등록된 과목 이외의 다른 강의는 추가 제공되지 않습니다.</li>
                            <li>구매일로부터 12개월(365일)간 유료 수강 가능하며, 갱신 신청한 수강생에 한하여 22년 2차 필기시험일까지 무료 연장됩니다.</li>
                            <li>갱신되어 제공되는 기간의 강의는 무료 서비스이며, 환불대상이 아닙니다.</li>
                            <li>자세한 수강기간 갱신 방법은 공지사항에서 확인 바랍니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>환불</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                            <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                            <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                            <li>고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, 신광은 경찰PASS 결제가 기준으로 계산하여 사용일수만큼 차감 후 환불됩니다. 
                                (단, 가산점 특강, 온라인 모의고사 등 이용 시에도 차감)</li>
                            <li>갱신되어 제공되는 기간의 강의는 무료 서비스이며, 환불대상이 아닙니다.</li>
                            <li>중도 환불 시 제공받은 입문서는 판매가 기준으로 차감 후 환불됩니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>PASS 수강</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>로그인 후 [내강의실] 에서 [무한PASS존]으로 접속합니다.
                            <li>구매한 PASS 상품 선택 후 [강좌추가] 를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                            <li>신광은경찰 PASS는 일시 정지, 수강 연장, 재수강 불가합니다.</li>
                            <li>신광은경찰 PASS 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다.<br>
                                총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대 (신광은 경찰PASS PMP강의는 제공하지 않습니다.)
                            </li>
                            <li>PC, 모바일 기기에 대한 초기화가 필요할 경우 최초 초기화에 한해서는 수강생 본인이 초기화가 가능합니다.<br>
                                다만 추후 초기화가 필요할 시 내용 확인 후 가능하오니 고객센터로 문의하시기 바랍니다. ([내 강의실] 내 [무한PASS존]에서 등록기기정보 확인)
                            </li>
                            <li>일부 강좌의 경우 자료 출력 횟수 제한이 적용됩니다. (2단계 동형 모의고사, 3단계 파이널 모의고사 등)</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>유의사항</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.</li>
                            <li>신광은경찰PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며, 이로 인한 환불은 불가합니다.</li>
                            <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 PASS 강좌는 즉시 정지, 회원 자격이 박탈됩니다. 
                                이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생 할 수 있습니다.</li>
                            <li>온라인 모의고사는 무료로 제공되며, 학원에서 진행되는 일부 모의고사는 제공되지 않습니다.</li>
                            <li>온,오프라인 동시 시행되는 이벤트, 무료특강 등의 경우 해당 강좌는 PASS에 미지급 되거나, 이벤트 종료 후 제공 될 수 있습니다.</li>
                            <li>PASS 관련 발급 된 쿠폰은 이벤트가 변경되거나 종료 될 경우 자동 회수 될 수 있으며, 동일 혜택이 적용되지 않을 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dd>
                        <p>※ 이용문의 : 고객센터 1544-5006 / 사이트 내 1:1 상담 게시판</p>
                    </dd>
                </dl>
            </div>

            <div class="content_guide_box" id="tab2">
                <dl>
                    <dt>
                        <h3>15개월 개편 PASS</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 상품은 구매일로부터 15개월간 수강 가능합니다.</li>
                            <li>본 상품 강좌 구성은 다음과 같습니다.<br>
                                - 2022 대비 형사법, 경찰학개론, 헌법 전 강좌<br>
                                - 2021년 1차 대비 신광은 형사소송법 기본이론 (20년 9월)<br>
                                - 2021년 1차 대비 장정훈 경찰학개론 기본이론 (20년 12월)<br> 
                                - 2021년 1차 대비 김원욱 형법 기본이론 (20년 11월)<br>
                                - 2021년 1차 대비 신광은 형사소송법 심화이론 + OX (20년 10월)<br>
                                - 2020년 2차 대비 장정훈 경찰학개론 심화이론 (20년 5월)<br>
                                - 2020년 2차 대비 김원욱 형법 기본서 판례 심화이론 (20년 5월)<br>
                                - 2021년 1차 대비 신광은 형법 심화이론 (20년 10월)<br>
                                - 해당 상품은 일반공채 대비 상품으로 범죄학은 수강 불가합니다. ( <a class="tx-blue" href="javascript:go_popup2()">수강가능 교수진 확인하기 ></a> )
                            </li>
                            <li>선택한 신광은 경찰 PASS 상품의 표기된 기간 동안 동영상 강좌를 무제한 수강할 수 있습니다.</li>
                            <li>신광은 경찰 PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다. (결제완료자에 한함)</li>
                            <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>교재 및 교재포인트</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>신광은 경찰 PASS 수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌 별 교재는 강좌 소개 및 교재 구매 메뉴에서 별도 구매 가능합니다.</li>
                            <li>PASS 구매 시 관리자 확인 후 2022년 대비 기초입문서가 장바구니로 지급됩니다.<br> (단, 주말 및 공휴일 인증 요청건의 경우, 휴일 다음날 22시 이전에 일괄 처리)</li>
                            <li>지급되는 기초입문서는 장바구니에서 0원으로 교재 주문해야 합니다. (배송비 본인 부담)</li>
                            <li>중도 환불 시 제공받은 입문서는 판매가 기준으로 차감 후 환불됩니다.</li>
                        </ol>
                    </dd>                     

                    <dt>
                        <h3>수강기간 연장</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>제공되는 수강기간 중 15개월은 정규 수강 기간이며, 이후 추가 제공되는 30일은 이벤트 수강 기간입니다.</li>
                            <li>이벤트로 제공되는 수강기간은 정규 수강기간이 아니며, 정규 수강기간(15개월)이 지나면 환불이 불가합니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>환불</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                            <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                            <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                            <li>고객 변심으로 인한 환불은 수강 시작일 (당일 포함)로부터 7일이 경과되면, 신광은 경찰PASS 결제가 기준으로 계산하여<br>
                                사용일 수만큼 차감 후 환불됩니다. (단, 가산점 특강, 온라인 모의고사 등 이용 시에도 차감)
                            </li>   
                            <li>이벤트로 제공되는 수강기간은 정규 수강기간이 아니며, 정규 수강기간(15개월)이 지나면 환불이 불가합니다.</li>
                            <li>중도 환불 시 제공받은 입문서는 판매가 기준으로 차감 후 환불됩니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>PASS 수강</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>로그인 후 [내강의실] 에서 [무한PASS존]으로 접속합니다.</li>
                            <li>구매한 PASS 상품 선택 후 [강좌추가] 를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                            <li>신광은경찰 PASS는 일시 정지, 수강 연장, 재수강 불가합니다.</li>
                            <li>신광은 경찰 PASS 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다.<br>
                                총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대 (신광은 경찰PASS PMP강의는 제공하지 않습니다.)
                            </li>    
                            <li> PC, 모바일 기기에 대한 초기화가 필요할 경우 최초 초기화에 한해서는 수강생 본인이 초기화가 가능합니다.<br>
                                 다만 추후 초기화가 필요할 시 내용 확인 후 가능하오니 고객센터로 문의하시기 바랍니다. ([내 강의실] 내 [무한PASS존]에서 등록기기정보 확인)
                            </li>     
                            <li> 일부 강좌의 경우 자료 출력 횟수 제한이 적용됩니다. (2단계 동형 모의고사, 3단계 파이널 모의고사 등)</li>
                        </ol>
                    </dd>
                    
                    <dt>
                        <h3>유의사항</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.</li>
                            <li>신광은경찰PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며, 이로 인한 환불은 불가합니다.</li>
                            <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 PASS 강좌는 즉시 정지, 회원 자격이 박탈됩니다. 
                                이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생 할 수 있습니다.</li>
                            <li>온라인 모의고사는 무료로 제공되며, 학원에서 진행되는 일부 모의고사는 제공되지 않습니다.</li>
                            <li>온,오프라인 동시 시행되는 이벤트, 무료특강 등의 경우 해당 강좌는 PASS에 미지급 되거나, 이벤트 종료 후 제공 될 수 있습니다.</li>
                            <li>PASS 관련 발급 된 쿠폰은 이벤트가 변경되거나 종료 될 경우 자동 회수 될 수 있으며, 동일 혜택이 적용되지 않을 수 있습니다.</li>
                        </ol>
                    </dd>
                    
                    <dd>
                        <p>※ 이용문의 : 고객센터 1544-5006 / 사이트 내 1:1 상담 게시판</p>
                    </dd>
                </dl>
            </div>

            <div class="content_guide_box" id="tab3">
                <dl>
                    <dt>
                        <h3>11개월 개편 PASS</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 상품은 구매일로부터 11개월간 수강 가능합니다.</li>
                            <li>
                                본 상품 강좌 구성은 다음과 같습니다.<br>
                                - 2022 대비 형사법, 경찰학개론, 헌법 전 강좌<br>
                                - 2021년 1차 대비 신광은 형사소송법 기본이론 (20년 9월)<br>
                                - 2021년 1차 대비 장정훈 경찰학개론 기본이론 (20년 12월)<br>
                                - 2021년 1차 대비 김원욱 형법 기본이론 (20년 11월)<br>
                                - 2021년 1차 대비 신광은 형사소송법 심화이론 + OX (20년 10월)<br>
                                - 2020년 2차 대비 장정훈 경찰학개론 심화이론 (20년 5월)<br>
                                - 2020년 2차 대비 김원욱 형법 기본서 판례 심화이론 (20년 5월)<br>
                                - 2021년 1차 대비 신광은 형법 심화이론 (20년 10월)<br>
                                - 해당 상품은 일반공채 대비 상품으로 범죄학은 수강 불가합니다. ( <a class="tx-blue" href="javascript:go_popup2()">수강가능 교수진 확인하기 ></a> )
                            </li>
                            <li>선택한 신광은경찰PASS 상품의 표기된 기간 동안 동영상 강좌를 2배수 수강 할 수 있습니다.</li>
                            <li>각 강좌 별 2배수 수강 후에는 추가 수강이 불가합니다. (<a href="https://police.willbes.net/support/notice/show/cate/3001?board_idx=250648" target="_blank" class="tx-blue">배수제한 공지 자세히 보기 ></a>)</li>
                            <li>신광은경찰PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다. (결제완료자에 한함)</li>
                            <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
                        </ol>
                    </dd>  

                    <dt>
                        <h3>교재 및 교재포인트</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>신광은 경찰 PASS 수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌 별 교재는 강좌 소개 및 교재 구매 메뉴에서 별도 구매 가능합니다.</li>
                            <li>PASS 구매 시 관리자 확인 후 2022년 대비 기초입문서가 장바구니로 지급됩니다.<br> (단, 주말 및 공휴일 인증 요청건의 경우, 휴일 다음날 22시 이전에 일괄 처리)</li>
                            <li>지급되는 기초입문서는 장바구니에서 0원으로 교재 주문해야 합니다. (배송비 본인 부담)</li>
                            <li>중도 환불 시 제공받은 입문서는 판매가 기준으로 차감 후 환불됩니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>환불</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                            <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                            <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                            <li>고객 변심으로 인한 환불은 수강 시작일 (당일 포함)로부터 7일이 경과되면, 신광은 경찰PASS 결제가 기준으로 계산하여 사용일 수만큼 차감 후 환불됩니다. (단, 가산점 특강, 온라인 모의고사 등 이용 시에도 차감)</li>
                            <li>중도 환불 시 제공받은 입문서는 판매가 기준으로 차감 후 환불됩니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>PASS 수강</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>로그인 후 [내강의실] 에서 [무한PASS존]으로 접속합니다.</li>
                            <li>구매한 PASS 상품 선택 후 [강좌추가] 를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                            <li>신광은경찰 PASS는 일시 정지, 수강 연장, 재수강 불가합니다.</li>
                            <li>신광은경찰 PASS 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다.<br>
                                총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대
                            </li>
                            <li>PC, 모바일 기기에 대한 초기화가 필요할 경우 최초 초기화에 한해서는 수강생 본인이 초기화가 가능합니다.<br>
                                다만 추후 초기화가 필요할 시 내용 확인 후 가능하오니 고객센터로 문의하시기 바랍니다. ([내 강의실] 내 [무한PASS존]에서 등록기기정보 확인)
                            </li>
                            <li>일부 강좌의 경우 자료 출력 횟수 제한이 적용됩니다. (2단계 동형 모의고사, 3단계 파이널 모의고사 등)</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>유의사항</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.</li>
                            <li>신광은경찰PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며, 이로 인한 환불은 불가합니다.</li>
                            <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 PASS 강좌는 즉시 정지, 회원 자격이 박탈됩니다. 이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생 할 수 있습니다.</li>
                            <li>온라인 모의고사는 무료로 제공되며, 학원에서 진행되는 일부 모의고사는 제공되지 않습니다.</li>
                            <li>온,오프라인 동시 시행되는 이벤트, 무료특강 등의 경우 해당 강좌는 PASS에 미지급 되거나, 이벤트 종료 후 제공 될 수 있습니다.</li>
                            <li>PASS 관련 발급 된 쿠폰은 이벤트가 변경되거나 종료 될 경우 자동 회수 될 수 있으며, 동일 혜택이 적용되지 않을 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dd>
                        <p>※ 이용문의 : 고객센터 1544-5006 / 사이트 내 1:1 상담 게시판</p>
                    </dd>
                </dl>
            </div>

            <div class="content_guide_box" id="tab4">
                <dl>
                    <dt>
                        <h3>2021년 대비 PASS</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 상품은 구매일로부터 21년 2차 시험일 8/21까지 수강 가능한 상품입니다.</li>
                            <li>본 상품은 일반경찰/경행경채 구분 없이 전 직렬 수강 가능합니다. ( <a class="tx-blue" href="javascript:go_popup3()">수강가능 교수진 확인하기 ></a> )</li>
                            <li>선택한 신광은경찰PASS 상품의 표기된 기간 동안 동영상 강좌를 2배수 수강 할 수 있습니다.</li>
                            <li>각 강좌 별 2배수 수강 후에는 추가 수강이 불가합니다. (<a href="https://police.willbes.net/support/notice/show/cate/3001?board_idx=250648" target="_blank" class="tx-blue">배수제한 공지 자세히 보기 ></a>)</li>
                            <li>신광은 경찰PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다. (결제완료자에 한함)</li>
                            <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
                        </ol>
                    </dd>  

                    <dt>
                        <h3>교재 및 교재포인트</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>신광은 경찰 PASS 수강에 필요한 교재는 별도로 구매 하셔야 하며, 각 강좌 별 교재는 강좌 소개 및 교재 구매 메뉴에서 별도 구매 가능합니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>환불</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                            <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                            <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                            <li>고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, 신광은 경찰PASS 결제가 기준으로 계산하여 사용일수만큼 차감 후 환불됩니다. (단, 가산점 특강, 온라인 모의고사 등 이용 시에도 차감)</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>PASS 수강</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>로그인 후 [내강의실] 에서 [무한PASS존]으로 접속합니다.</li>
                            <li>구매한 PASS 상품 선택 후 [강좌추가] 를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                            <li>신광은 경찰 PASS는 일시 정지, 수강 연장, 재수강 불가합니다.</li>
                            <li>신광은 경찰 PASS 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다.<br>
                                총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대 (신광은 경찰PASS PMP강의는 제공하지 않습니다.)
                            </li>    
                            <li> PC, 모바일 기기에 대한 초기화가 필요할 경우 최초 초기화에 한해서는 수강생 본인이 초기화가 가능합니다.<br>
                                 다만 추후 초기화가 필요할 시 내용 확인 후 가능하오니 고객센터로 문의하시기 바랍니다. ([내 강의실] 내 [무한PASS존]에서 등록기기정보 확인)
                             </li>    
                            <li>일부 강좌의 경우 자료 출력 횟수 제한이 적용됩니다. (2단계 동형 모의고사, 3단계 파이널 모의고사 등)</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>유의사항</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 상품은 특별할인기획 상품으로 재수강 / 환승 시에만 쿠폰 할인 적용이 가능합니다.</li>
                            <li>신광은경찰PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며, 이로 인한 환불은 불가합니다.</li>
                            <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 PASS 강좌는 즉시 정지, 회원 자격이 박탈됩니다. 이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생 할 수 있습니다.</li>
                            <li>온라인 모의고사는 무료로 제공되며, 학원에서 진행되는 일부 모의고사는 제공되지 않습니다.</li>
                            <li>온,오프라인 동시 시행되는 이벤트, 무료특강 등의 경우 해당 강좌는 PASS에 미지급 되거나, 이벤트 종료 후 제공 될 수 있습니다.</li>
                            <li>PASS 관련 발급 된 쿠폰은 이벤트가 변경되거나 종료 될 경우 자동 회수 될 수 있으며, 동일 혜택이 적용되지 않을 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dd>
                        <p>※ 이용문의 : 고객센터 1544-5006 / 사이트 내 1:1 상담 게시판</p>
                    </dd>
                </dl>
            </div>

        </div>
        <!-- content_guide_wrap //-->
    </div>
    <!-- End evtContainer -->

    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            {{-- PASS 결제금액 --}}
            $("input[name='y_pkg']").on("change",function (){
                var sale_price = $(this).data('sale-price');
                $(".total_price").html(0);
                $(this).parents(".passLecBuy").find('.total_price').html(addComma(sale_price));
            });

            var slidesImg3 = $("#slidesImg3").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false,
            });

            $("#imgBannerLeft3").click(function (){
                slidesImg3.goToPrevSlide();
            });

            $("#imgBannerRight3").click(function (){
                slidesImg3.goToNextSlide();
            });
        });

        $(document).ready(function() {
            var slidesImg4 = $("#slidesImg4").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false,
            });

            $("#imgBannerLeft4").click(function (){
                slidesImg4.goToPrevSlide();
            });

            $("#imgBannerRight4").click(function (){
                slidesImg4.goToNextSlide();
            });
        });

        /*tab*/
        $(document).ready(function(){
            $(".tabs li a").click(function(){
                var activeTab = $(this).attr("href");
                $(".tabs li a").removeClass("active");
                $(this).addClass("active");
                $(".content_guide_box").hide();
                $(activeTab).fadeIn();
                return false;
            });

            var url = window.location.href;
            if(url.indexOf("tab3") > -1){
                var activeTab = "#tab3";
                $(".tabsl li a").removeClass("active");
                $(".tabs li a[href='#tab3']").addClass("active");
                $(".tabContents").hide();
                $(activeTab).show();
                return false;
            }else{
                $(".tabs li a").removeClass("active");
                $(".tabs li a[href='#tab1']").addClass("active");
                $(".content_guide_box").hide();
                $(".content_guide_box:first").show();
            }
        });

        function goDesc(tab){
            location.href = '#tab';
            var activeTab = "#"+tab;
            $(".tabs li a").removeClass("active");
            $(".tabs li a[href='#"+tab+"']").addClass("active");
            $(".content_guide_box").hide();
            $(activeTab).show();
        }

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });

          
          /*레이어팝업*/               
          function go_popup1() {
            $('#popup1').bPopup();
        }   
        function go_popup2() {
            $('#popup2').bPopup();
        }
        function go_popup3() {
            $('#popup3').bPopup();
        }

         /* 팝업창 */
         function certOpen(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            @if(empty($arr_promotion_params["page"]) === false && empty($arr_promotion_params["cert"]) === false)
                var url = '/certApply/index/page/{{$arr_promotion_params["page"]}}/cert/{{$arr_promotion_params["cert"]}}' ;
                window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
            @else
                alert('프로모션 추가 파라미터가 지정되지 않았습니다.');
            @endif
        }

        {{-- 쿠폰발급 --}}
        function giveCheck() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            @if(empty($arr_promotion_params['give_type']) === false && empty($arr_promotion_params['give_idx']) === false)
                var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params["give_type"]}}&give_idx={{$arr_promotion_params["give_idx"]}}&event_code={{$data['ElIdx']}}&comment_chk_yn={{$arr_promotion_params["comment_chk_yn"]}}';
                ajaxSubmit($regi_form, _check_url, function (ret) {
                    if (ret.ret_cd) {
                        alert('쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');
                    }
                }, showValidateError, null, false, 'alert');
            @else
                alert('프로모션 추가 파라미터가 지정되지 않았습니다.');
            @endif
        }

        {{-- 약관동의 --}}
        function termsCheck(obj_id){
            if($("#" + obj_id).is(":checked") === false){
                $("#" + obj_id).focus();
                alert('이용안내에 동의하셔야 합니다.');
                return;
            }
            goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'periodpack_lecture', 'Y');
        }

        {{-- 무료 교재지급 --}}
        function fn_promotion_etc_submit() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            var order_cnt = {{ $arr_base['order_count'] or 0 }};
            if(order_cnt === 0){
                alert('구매자가 아닙니다.');
                return;
            }

            @if(empty($arr_promotion_params['arr_prod_code']) === false && empty($arr_promotion_params['cart_prod_code']) === false)
                var $add_apply_form = $('#add_apply_form');
                var _url = '{!! front_url('/event/promotionEtcStore') !!}';

                if (!confirm('장바구니에 담으시겠습니까?')) { return true; }
                ajaxSubmit($add_apply_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        alert( getApplyMsg(ret.ret_msg) );
                        location.href = '{!! front_url('/cart/index?tab=book') !!}';
                    }
                }, function(ret, status, error_view) {
                    alert( getApplyMsg(ret.ret_msg) );
                }, null, false, 'alert');
            @else
                alert('프로모션 추가 파라미터가 지정되지 않았습니다.');
            @endif
        }

        // 이벤트 추가 신청 메세지
        function getApplyMsg(ret_msg) {
            {{-- 해당 프로모션 종속 결과 메세지 --}}
            var apply_msg = '';
            var arr_apply_msg = [
                ['처리 되었습니다.','장바구니에 담겼습니다.'],
            ];

            for (var i = 0; i < arr_apply_msg.length; i++) {
                if(arr_apply_msg[i][0] == ret_msg) {
                    apply_msg = arr_apply_msg[i][1];
                }
            }
            if(apply_msg == '') apply_msg = ret_msg;
            return apply_msg;
        }
    </script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-69505110-4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-69505110-4');
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop