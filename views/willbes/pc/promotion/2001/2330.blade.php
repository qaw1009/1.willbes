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

        .evtTop {background:url("https://static.willbes.net/public/images/promotion/2021/08/2330_top_bg.jpg") no-repeat center top;} 
        .evtTop span.img1 {position:absolute; left:50%; z-index:100; top:217px; margin-left:-500px; width:287px;
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
        @@-webkit-keyframes flipInX{
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

        .evt01 {background:#ECECEC; padding-bottom:100px;}
        .evt01 .passLecBuy {position:relative; width:1120px; margin:0 auto;}
        .evt01 .passLecBuy .price {background:url(https://static.willbes.net/public/images/promotion/2021/08/2330_01_bg.jpg) repeat-y center; } 
        .evt01 .passLecBuy .price:after {content:''; display:block; clear:both}
        .evt01 .passLecBuy .priceBox {width:1120px; margin:0 auto; justify-content: center;}
        .evt01 .passLecBuy .priceBox div {display:inline-block; float:left; width:calc(33.33333% - 40px); text-align:left; line-height:30px; font-size:14px; font-weight:bold; background:#151515; color:#fff; padding:15px 20px; border-radius:10px; margin:0 20px}
        .evt01 .passLecBuy .priceBox div strong {font-family:Verdana, Geneva, sans-serif; font-size:30px}   
        .evt01 input[type="radio"] {height:18px; width:18px; vertical-align:middle}
        .evt01 input[type="checkbox"] {height:20px; width:20px; vertical-align:middle}
        .evt01 input:checked + label {border-bottom:1px dashed #0d3692} /*컬러변경*/
        .evt01 .passLecBuy .final {position: relative;}
        .evt01 .passLecBuy .final input {position:absolute; bottom:100px; left:180px; height:20px; width:20px;}
        .evt01 .passLecBuy span {position:absolute; top:1070px; left:222px; z-index:10; font-size:16px; color:#000}
        .evt01 .passLecBuy span label {border-bottom:0}
        .evt01 .passLecBuy span input:checked + label {border-bottom:0}

        .evt01 .passLecBuy .totalPrice {width:600px; margin:60px auto;  }
        .evt01 .passLecBuy .totalPrice a {background:#c00d0d; display:block; font-size:36px; color:#fff; padding:0 30px; background:#000; border-radius:60px; height:80px; line-height:80px; box-shadow:10px rgba(0,0,0,.5);}
        .evt01 .passLecBuy .totalPrice a:hover {background:#5b18a7}

        .evt01 .check {width:800px; margin:0 auto; padding:20px; font-size:16px; color:#000; text-align:left; letter-spacing:-1px;}
        .evt01 .check a {display:inline-block; padding:10px; color:#fff; background:#000; margin-left:40px; border-radius:20px; font-size:12px}
        .evt01 .check p {font-size:14px; padding:10px 0 0 20px; line-height:1.4}

        .evt01_pass {background:url("https://static.willbes.net/public/images/promotion/2021/08/2330_01_pass_bg.jpg") no-repeat center top;} 

        .evt02 {background:#393939;}      

        .evt03 {background:#eee}
        .evt03 iframe {width:853px; height:480px}         

        .evt05 {background:#fff;  position:relative}
        .evt05 .youtube iframe {width:550px; height:310px} 
        .evt05 .youtube {position:absolute; top:241px; left:52.3%; width:455px; z-index:1; margin-left:-479px; box-shadow:0 10px 20px rgba(0,0,0,.3);}     
        .evt05 .youtube.yu02 {top:650px; margin-left:-168px;}
        .evt05 .youtube.yu03 {top:1070px;}   
        .evt05 .youtube.yu04 {top:1470px; margin-left:-168px;}  

        .evt06 {background:#5b68ea;}  

        .evt07 {background:#f6f9fe;}         

        .evt08 {background:#ffc200;}
        
        .evt11 {background:#f6f9fe;}


        /* 이용안내 */
        .content_guide_wrap{background:#fff; width:1000px; margin:0 auto; padding:100px 0; font-size:14px}
        .content_guide_wrap .guide_tit{margin-bottom:50px; text-align:left; font-size:30px;}

        .content_guide_wrap .tabs {width:1000px; margin:0 auto;} 
        .content_guide_wrap .tabs li {display:inline; float:left; width:33.33333%}
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
        .newTopDday > div {font-size:22pt;color:#000; margin-top:10px;}
        .newTopDday ul {width:1210px; margin:0 auto}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; height:60px; padding-top:10px !important; font-weight:600; color:#000}
        .newTopDday ul li strong {line-height:70px}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {text-align:right; padding-right:20px; width:28%}
        .newTopDday ul li:first-child span {font-size:12px; color:#999; margin-top:4px;}
        .newTopDday ul li.endday {text-align:left; padding-left:20px; width:24%}
        .newTopDday ul li.endday a {display:inline; font-size:14px; padding:4px 20px; background:#999; color:#FFF; text-align:center; border-radius:20px}
        .newTopDday ul li.endday a:hover {background:#333}
        .newTopDday ul li.endday span {display:block; margin-top:10px; color:#000;}
        .newTopDday ul:after {content:""; display:block; clear:both}

        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        .evtCtnsBox .wrap a:hover {box-shadow:0 0 10px rgba(0,0,0,.5);}

    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}

        <input type="hidden" id="chk_price" name="chk_price" value="0"/>
    </form>

    <div class="evtContent NSK" id="evtContainer">
        <div class="sky">
            <a href="#pass">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2330_sky1.png" alt="무제한 패스">
            </a>  
            <a href="#transfer">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2330_sky2.png" alt="타학원환승 재수강 할인 받기">
            </a>  
            <a href="https://police.willbes.net/promotion/index/cate/3001/code/2301" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2330_sky3.png" alt="10% 할인 받기">
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
                    <li class="endday">
                        <a href="#pass" target="_self">수강하기 ></a>
                        <span class="NSK-Black">{{ kw_date('n.j(%)', $arr_promotion_params['edate']) }} {{ $arr_promotion_params['etime'] or '' }} 마감!</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="evtCtnsBox evt00">
            <div data-aos="fade-left">
                <img src="https://static.willbes.net/public/images/promotion/2020/10/wb_police.jpg"  alt="경찰학원부분 1위"/>
            </div>
        </div>

        <div class="evtCtnsBox evtTop" id="main">
            <div data-aos="fade-right">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2330_top_bg.jpg"  alt=""/>
                <span class="img1"><img src="https://static.willbes.net/public/images/promotion/2021/08/2230_top_img02.png" title="0원패스" /></span>
            </div>           
        </div>

        <div class="evtCtnsBox evt01" id="pass">
            <div class="passLecBuy" data-aos="fade-left">
                <div>               
                    <img src="https://static.willbes.net/public/images/promotion/2021/08/2330_01_01.jpg"  alt="신광은경찰PASS">
                </div>

                <div class="price">
                    <div class="priceBox">
                        <div>
                            <strong>129</strong>만원<br>
                            <input type="radio" id="y_pkg1" name="y_pkg" value="183758" data-sale-price="1100000"/> <label for="y_pkg1">22/23년 0원 무제한 PASS</label>
                        </div>
                        <div>
                            <strong>95</strong>만원<br>
                            <input type="radio" id="y_pkg2" name="y_pkg" value="183760" data-sale-price="899000"/> <label for="y_pkg2">12개월 무제한 PASS</label>
                        </div>
                        <div>
                            <strong>69.9</strong>만원<br>
                            <input type="radio" id="y_pkg3" name="y_pkg" value="183762" data-sale-price="699000"/> <label for="y_pkg3">22년 1차 PASS</label>
                        </div>                        
                    </div>       
                </div>  

                <div>
                    <img src="https://static.willbes.net/public/images/promotion/2021/08/2230_01_bottom.jpg"  alt="파이널패스"/>
                </div> 

                <div class="check">
                    <input type="checkbox" id="is_chk1" name="is_chk" value="Y"/> <label for="is_chk">페이지 하단 신광은 경찰 PASS 이용안내를 모두 확인하였고, 이에 동의합니다. </label>
                    <a href="javascript:goDesc('tab1')">이용안내확인하기 ↓</a>
                    <p>
                        ※ 강의공유, 콘텐츠 부정사용 적발 시, 패스의 수강기간 갱신이 불가합니다.<br>
                        ※ 강좌 및 교수진은 학원 사정에 따라 변경될 수 있습니다.<br>
                        ※ 쿠폰은 PASS 결제 후 [내 강의실>결제관리>쿠폰/수강권 관리] 에서 확인 가능합니다.<br>
                        ※ 재수강&환승쿠폰은 기간 갱신 가능 패스에는 적용되지 않습니다.
                    </p>
                </div>

                <div class="wrap mt40" id="transfer">               
                    <img src="https://static.willbes.net/public/images/promotion/2021/08/2330_01_03.jpg"  alt="재수강, 환승">
                    <a href="https://www.willbes.net/classroom/qna/index" target="_blank" title="재수강 쿠폰받기" style="position: absolute; left: 42.32%; top: 54.22%; width: 11.79%; height: 18.07%;  z-index: 2;"></a>
                    <a href="https://police.willbes.net/promotion/index/cate/3001/code/1139" target="_blank" title="환승 쿠폰받기" style="position: absolute; left: 75.8%; top: 54.22%; width: 11.79%; height: 18.07%;  z-index: 2;"></a>
                </div>

                <div class="totalPrice NSK-Black">
                    <a href="javascript:void(0);" onclick="termsCheck('is_chk1', 'pass');">
                        신청하기 >
                    </a>
                </div>  
            </div>
        </div>

        
        <div class="evtCtnsBox evt01_pass">  
            <div data-aos="fade-right">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2330_01_pass.jpg"  alt="all pass" />
            </div>
        </div>

        <div class="evtCtnsBox evt02">  
            <div data-aos="fade-right">
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2281_02.jpg"  alt="후기" />
            </div>
        </div>
         
        <div class="evtCtnsBox evt03">
            <div data-aos="fade-left">
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2281_03.jpg"  alt="합격할수 없는 이유"/>    
            </div>       
        </div>        

        <div class="evtCtnsBox evt04">  
            <div data-aos="fade-right">
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2281_04.jpg"  alt="전문교수진" />
            </div>
        </div>

        <div class="evtCtnsBox evt05">
            <div data-aos="fade-left">
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2281_05.jpg"  alt="믿고 듣는 신광은 경찰팀" />
                <div class="youtube">
                    <iframe src="https://www.youtube.com/embed/40LDBoOoD_k?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="youtube yu02">
                    <iframe src="https://www.youtube.com/embed/VHTrL5w2IF4?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="youtube yu03">
                    <iframe src="https://www.youtube.com/embed/KkESWQLjtq8?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>	
                <div class="youtube yu04">
                    <iframe src="https://www.youtube.com/embed/_-XbBFVxK2Y?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>  
        </div>

        <div class="evtCtnsBox evt06">  
            <div data-aos="fade-right">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2330_06.jpg"  alt="reason2" />
            </div>
        </div>

        <div class="evtCtnsBox evt07"> 
            <div data-aos="fade-left"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2330_07.jpg"  alt="reason3" />
            </div>
        </div>

        <div class="evtCtnsBox evt08" id="evt08">
            <form id="add_apply_form" name="add_apply_form"  data-aos="fade-right">
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                <input type="hidden" name="event_idx" value="{{ $data['ElIdx'] }}"/>
                <input type="hidden" name="register_type" value="promotion"/>
                <div class="wrap">
                    <img src="https://static.willbes.net/public/images/promotion/2021/08/2330_08.jpg"  alt="교재 신청하기" />
                    <a href="javascript:void(0);" title="교재 신청하기" onclick="fn_promotion_etc_submit();" style="position: absolute; left: 13.04%; top: 68.69%; width: 29.73%; height: 6.77%; z-index: 2;"></a>
                    <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/180566" title="장정훈 경찰학" style="position: absolute; left: 50.98%; top: 68.69%; width: 14.46%; height: 6.77%; z-index: 2;"></a>
                    <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/180748" title="신광은 형법" style="position: absolute; left: 65.36%; top: 68.69%; width: 14.46%; height: 6.77%; z-index: 2;"></a>
                    <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/180567" title="김원욱 헌법" style="position: absolute; left: 79.73%; top: 68.69%; width: 14.46%; height: 6.77%; z-index: 2;"></a>
                </div>
            </form>
        </div>

        <div class="evtCtnsBox evt01" id="pass2">
            <div class="passLecBuy" data-aos="fade-left">
                <div>               
                    <img src="https://static.willbes.net/public/images/promotion/2021/08/2330_01_01.jpg"  alt="신광은경찰PASS">
                </div>

                <div class="price">
                    <div class="priceBox">
                        <div>
                            <strong>129</strong>만원<br>
                            <input type="radio" id="y_pkg5" name="y_pkg" value="183758" data-sale-price="1100000"/> <label for="y_pkg5">22/23년 0원 무제한 PASS</label>
                        </div>
                        <div>
                            <strong>95</strong>만원<br>
                            <input type="radio" id="y_pkg6" name="y_pkg" value="183760" data-sale-price="899000"/> <label for="y_pkg6">12개월 무제한 PASS</label>
                        </div>
                        <div>
                            <strong>69.9</strong>만원<br>
                            <input type="radio" id="y_pkg7" name="y_pkg" value="183762" data-sale-price="699000"/> <label for="y_pkg7">22년 1차 PASS</label>
                        </div>                        
                    </div>       
                </div>  
                
                {{--
                <div class="final">
                    <input type="radio" id="y_pkg8" name="y_pkg" value="183767" />
                    <label for="y_pkg8">
                        <img src="https://static.willbes.net/public/images/promotion/2021/07/2281_01_02.jpg"  alt="파이널패스"/>
                    </label>
                </div> 
                --}}

                <div>
                    <img src="https://static.willbes.net/public/images/promotion/2021/08/2230_01_bottom.jpg"  alt="파이널패스"/>
                </div> 

                <div class="check">
                    <input type="checkbox" id="is_chk2" name="is_chk" value="Y"/> <label for="is_chk">페이지 하단 신광은 경찰 PASS 이용안내를 모두 확인하였고, 이에 동의합니다. </label>
                    <a href="javascript:goDesc('tab1')">이용안내확인하기 ↓</a>
                    <p>
                        ※ 강의공유, 콘텐츠 부정사용 적발 시, 패스의 수강기간 갱신이 불가합니다.<br>
                        ※ 강좌 및 교수진은 학원 사정에 따라 변경될 수 있습니다.<br>
                        ※ 쿠폰은 PASS 결제 후 [내 강의실>결제관리>쿠폰/수강권 관리] 에서 확인 가능합니다.<br>
                        ※ 재수강&환승쿠폰은 기간 갱신 가능 패스에는 적용되지 않습니다.
                    </p>
                </div>

                <div class="wrap mt40">               
                    <img src="https://static.willbes.net/public/images/promotion/2021/08/2330_01_03.jpg"  alt="재수강, 환승">
                    <a href="https://www.willbes.net/classroom/qna/index" target="_blank" title="재수강 쿠폰받기" style="position: absolute; left: 42.32%; top: 54.22%; width: 11.79%; height: 18.07%;  z-index: 2;"></a>
                    <a href="https://police.willbes.net/promotion/index/cate/3001/code/1139" target="_blank" title="환승 쿠폰받기" style="position: absolute; left: 75.8%; top: 54.22%; width: 11.79%; height: 18.07%;  z-index: 2;"></a>
                </div>

                <div class="totalPrice NSK-Black">
                    <a href="javascript:void(0);" onclick="termsCheck('is_chk2', 'pass2');">
                        신청하기 >
                    </a>
                </div>  
            </div>
        </div>
 

        <div class="content_guide_wrap" id="tab">
            <p class="guide_tit">윌비스 <span class="NSK-Black tx-blue">신광은 경찰 PASS </span> 이용안내 </p>
            <ul class="tabs">
                <li><a href="#tab1">22/23년 0원 무제한 PASS</a></li>
                <li><a href="#tab2">12개월 무제한 PASS</a></li>
                <li><a href="#tab3">22년 1차 PASS</a></li>
            </ul>

            <div class="content_guide_box" id="tab1">
                <dl>
                    <dt>
                        <h3>22/23년 0원 무제한 PASS</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 상품은 수강기간(12개월) 내 경찰 순경 시험 최종합격 시 수강료 전액 환급, 불합격 시 23년 1차 시험일까지 수강기간 연장되는 상품입니다.</li>
                            <li>본 상품 강좌 구성은 다음과 같습니다.<br>
                                - 2022년 대비 형사법, 경찰학, 헌법 전 강좌<br>
                                - 2021년 대비 형사소송법, 경찰학개론, 형법 전 강좌<br>
                                - 해당 상품은 일반공채 대비 상품으로 범죄학은 수강 불가합니다.<br>
                                <div class="tx-blue">
                                    *형사소송법/형사법 : 신광은 교수님<br>
                                    *경찰학개론/경찰학(개편) : 장정훈 교수님<br>
                                    *형법 : 김원욱 교수님 / 신광은 교수님<br>
                                    *헌법 : 김원욱 교수님 / 이국령 교수님<br>
                                    *G-TELP : 김준기 교수님<br>
                                    *한능검 : 오태진 교수님<br>
                                    *실용글쓰기 : 박우찬 교수님
                                </div>
                                * 2022년 경행경채 대비 범죄학은 수강 불가합니다.
                            </li>
                            <li>선택한 신광은 경찰 PASS 상품의 표기된 기간 동안 동영상 강좌를 무제한 수강할 수 있습니다.</li>
                            <li>신광은 경찰 PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다. (결제완료자에 한함)</li>
                            <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
                            <li>최종합격 인증 후 환급 시 보유한 PASS 수강기간은 종료됩니다.(수강기간 갱신 불가)</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>교재 및 포인트</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>신광은 경찰 PASS 수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌 별 교재는 강좌 소개 및 교재 구매 메뉴에서 별도 구매 가능합니다.</li>
                            <li>중도 환불 시 제공받은 입문서는 판매가 기준으로 차감 후 환불됩니다.</li>
                            <li>포인트가 포함된 상품을 구매할 경우 익일 오전 일괄 지급됩니다. (금요일~일요일 구매 시 월요일 오전  일괄지급)</li>
                            <li>포인트는 구매일로부터 1년 동안 사용 가능하며, 1년이 지날 경우 자동 소멸됩니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>최종합격 시 환급 안내</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>환급 시 상품 결제 금액에서 지급된 혜택만큼 차감 후 환급됩니다. (제세공과금 22% 제외)<br>
                            ※ 지급된 혜택(포인트 등)을 사용하지 않았어도 지급된 만큼 차감 후 환급금 책정</li>
                            <li>수강기간 내에 진행된 순경 공채 시험 최종합격 및 인증자료를 제출하여야 환급금 지급 대상이 됩니다.<br>
                            ※ 환급 가능 직렬 : 일반공채, 101경비단, 전의경 경채, 경찰행정 경채</li>
                            <li>환급 신청은 합격한 시험의 최종합격자 발표일로부터 1개월 이내에만 가능합니다.</li>
                            <li>패스 수강 기간 내에 합격예측 서비스 1회 이상 참여 해주셔야합니다.<br>
                            (해당 서비스는 시즌성 이벤트로 일정 기간이 지나면 확인 불가하니, 참여 후 캡쳐해서 추후 증빙자료로 제출하셔야합니다.)</li>
                            <li>패스 수강기간 내에 모든 전국 모의고사 및 빅매치 모의고사를 모두 응시하여야 합니다.<br>
                            (온/오프 무관하며, 추후 응시내역 파일첨부 제출해 주셔야 합니다.)</li>
                            <li>환급 신청 기간 내에 최종 합격 인증 자료 및 신청 서류 제출이 완료된 회원에게 환급 가능합니다.<br>
                            - 제출 서류 (모든 제출 서류는 반드시 윌비스 신광은 경찰 아이디 수강생 본인 명의이여야 합니다.)<br>
                                ① 응시표 사본 : 응시번호 기재 필수, 응시원서/응시접수증/응시표출력 전체화면 등 대체 가능<br>
                                ② 최종 합격증명서 : 최종 합격 확인 증명 가능한 관련 사이트 전체 화면 캡쳐본 등 대체 가능<br>
                                ③ 신분증 사본 : 제세공과금 세무 증빙을 위해 주민등록번호 앞/뒷자리 전체가 보여야 함<br>
                                ④ 통장사본 : 수강료 환급 받을 수강생 본인 명의 통장<br>
                                ⑤ 합격수기 : 공지 글 내 첨부된 파일을 다운 후 양식에 맞추어 작성 후 첨부 (한글 또는 워드 파일)<br>
                                ⑥ 개인정보 수집 및 활용 동의서 : 공지 글 내 첨부된 파일을 프린트하여 자필 서명 후 사진 또는 스캔하여 이미지 첨부<br>
                                ⑦ 윌비스 신광은 경찰 합격예측서비스 & 모의고사 내역 : 시험 후 오픈되는 합격예측서비스 참여 인증 캡쳐 및 윌비스신광은경찰 모의고사 전체 응시 내역<br>
                                *전국모의고사 및 빅매치 모의고사 중 온라인 경행경채 직렬이 없다면 온라인 일반경찰로 응시를 꼭 하시기 바랍니다.<br>
                                (*학원 모의고사에 따라 진행)</li>
                            <li>최종합격자 발표일로부터 1개월경과 후 요청 시에는 환급이 불가합니다.</li>
                            <li>자세한 환급신청 방법은 공지사항에서 확인 바랍니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>환불</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내 3강 이하 수강시에만 전액 환불 가능합니다.</li>
                            <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                            <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                            <li>고객 변심으로 인한 환불은 수강 시작일 (당일 포함)로부터 7일이 경과되면, 신광은 경찰PASS 결제가 기준으로 계산하여 
                            사용일 수만큼 차감 후 환불됩니다. (단, 가산점 특강, 온라인 모의고사 등 이용 시에도 차감)</li>
                            <li>갱신되어 제공되는 기간의 강의는 무료 서비스이며, 환불대상이 아닙니다.</li>
                            <li>중도 환불 시 제공받은 입문서는 판매가 기준으로 차감 후 환불됩니다.</li>
                            <li>
                                포인트를 사용하였을 경우 사용한 포인트만큼 차감 후 환불 진행되며, 남은 포인트는 회수됩니다.<br>
                                (포인트 미사용일 경우 추가 차감 없이 포인트 회수 후 환불 진행)
                            </li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>수강기간 연장</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>22/23년 0원 무제한 PASS는 갱신형 상품입니다. 시험 응시 후 불합격 인증하여야 수강기간이 갱신되며, 23년 1차 필기시험일까지 무료 연장됩니다.</li>
                            <li>수강기간 갱신이 필요한 경우 갱신 신청 기간 내에 직전 시험 불합격 증빙(응시표, 성적표)자료를 제출하셔야 합니다.</li>
                            <li>불합격 인증 시에 전과목 0점일 경우 수강기간 갱신은 불가능합니다.</li>
                            <li>시험 접수 후 시험에 응시하지 못한 경우 수강기간 갱신 불가합니다.</li>
                            <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
                            <li>상품에 등록된 과목 이외의 다른 강의는 추가 제공되지 않습니다.</li>
                            <li>구매일로부터 12개월(365일)간 유료 수강 가능하며, 갱신 신청한 수강생에 한하여 23년 1차 필기시험일까지 무료 연장됩니다.</li>
                            <li>갱신되어 제공되는 기간의 강의는 무료 서비스이며, 환불대상이 아닙니다.</li>
                            <li>자세한 수강기간 갱신 방법은 공지사항에서 확인 바랍니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>PASS 수강</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>로그인 후 [내 강의실]에서 [무한PASS존]으로 접속합니다.</li>
                            <li>구매한 PASS 상품 선택 후 [강좌추가하기]를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                            <li>신광은 경찰 PASS는 일시 정지, 수강 연장, 재수강 불가합니다.</li>
                            <li>신광은 경찰 PASS 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다.<br>
                            총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대 (신광은 경찰PASS PMP강의는 제공하지 않습니다.)</li>
                            <li>PC, 모바일 기기에 대한 초기화가 필요할 경우 최초 초기화에 한해서는 수강생 본인이 초기화가 가능합니다. 다만 추후 초기화가
                                필요할 시 내용 확인 후 가능하오니 고객센터로 문의하시기 바랍니다. ([내 강의실] 내 [무한PASS존]에서 등록기기정보 확인)</li>
                            <li>일부 강좌의 경우 자료 출력 횟수 제한이 적용됩니다. (2단계 동형 모의고사, 3단계 파이널 모의고사 등)</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>유의사항</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.</li>
                            <li>신광은 경찰PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며, 이로 인한 환불은 불가합니다.</li>
                            <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 PASS 강좌는 즉시 정지, 회원 자격이 박탈됩니다. <br>
                            이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생할 수 있습니다.</li>
                            <li>온,오프라인 동시 시행되는 이벤트, 무료특강 등의 경우 해당 강좌는 PASS에 미지급 되거나, 이벤트 종료 후 제공될 수 있습니다.</li>
                            <li>PASS 관련 발급된 쿠폰은 이벤트가 변경되거나 종료될 경우 자동 회수될 수 있으며, 동일 혜택이 적용되지 않을 수 있습니다.</li>
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
                        <h3>12개월 무제한 PASS</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 상품은 구매일로부터 12개월간 수강 가능합니다.</li>
                            <li>본 상품 강좌 구성은 다음과 같습니다.<br>
                                - 2022년 대비 형사법, 경찰학, 헌법 전 강좌<br>
                                - 2021년 대비 형사소송법, 경찰학개론, 형법 전 강좌<br>
                                - 해당 상품은 일반공채 대비 상품으로 범죄학은 수강 불가합니다.
                                <div class="tx-blue">
                                    * 형사소송법/형사법 : 신광은 교수님<br>
                                    * 경찰학개론/경찰학(개편) : 장정훈 교수님<br>
                                    * 형법 : 김원욱 교수님 / 신광은 교수님<br>
                                    * 헌법 : 김원욱 교수님 / 이국령 교수님<br>
                                    * G-TELP : 김준기 교수님<br>
                                    * 한능검 : 오태진 교수님<br>
                                    * 실용글쓰기 : 박우찬 교수님
                                </div>
                            </li>
                            <li>선택한 신광은 경찰 PASS 상품의 표기된 기간 동안 동영상 강좌를 무제한 수강할 수 있습니다.</li>
                            <li>신광은 경찰 PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다. (결제완료자에 한함)</li>
                            <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>교재 및 포인트</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>신광은 경찰 PASS 수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌 별 교재는 강좌 소개 및 교재 구매 메뉴에서 별도 구매 가능합니다. </li>
                            <li>중도 환불 시 제공받은 입문서는 판매가 기준으로 차감 후 환불됩니다.</li>
                            <li>포인트가 포함된 상품을 구매할 경우 익일 오전 일괄 지급됩니다. (금요일~일요일 구매 시 월요일 오전  일괄지급)</li>
                            <li>포인트는 구매일로부터 1년 동안 사용 가능하며, 1년이 지날 경우 자동 소멸됩니다.</li>
                        </ol>
                    </dd>     

                    <dt>
                        <h3>환불</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내 3강 이하 수강시에만 전액 환불 가능합니다.</li>
                            <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                            <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                            <li>고객 변심으로 인한 환불은 수강 시작일 (당일 포함)로부터 7일이 경과되면, 신광은 경찰PASS 결제가 기준으로 계산하여 
                            사용일 수만큼 차감 후 환불됩니다. (단, 가산점 특강, 온라인 모의고사 등 이용 시에도 차감)</li>
                            <li>중도 환불 시 제공받은 입문서는 판매가 기준으로 차감 후 환불됩니다.</li>
                            <li>
                                포인트를 사용하였을 경우 사용한 포인트만큼 차감 후 환불 진행되며, 남은 포인트는 회수됩니다.<br>
                                (포인트 미사용일 경우 추가 차감 없이 포인트 회수 후 환불 진행)
                            </li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>PASS 수강</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>로그인 후 [내 강의실]에서 [무한PASS존]으로 접속합니다.</li>
                            <li>구매한 PASS 상품 선택 후 [강좌추가하기]를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                            <li>신광은 경찰 PASS는 일시 정지, 수강 연장, 재수강 불가합니다.</li>
                            <li>신광은 경찰 PASS 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다.<br>
                            총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대 (신광은 경찰PASS PMP강의는 제공하지 않습니다.)</li>
                            <li>PC, 모바일 기기에 대한 초기화가 필요할 경우 최초 초기화에 한해서는 수강생 본인이 초기화가 가능합니다. 다만 추후 초기화가
                                필요할 시 내용 확인 후 가능하오니 고객센터로 문의하시기 바랍니다. ([내 강의실] 내 [무한PASS존]에서 등록기기정보 확인)</li>
                            <li>일부 강좌의 경우 자료 출력 횟수 제한이 적용됩니다. (2단계 동형 모의고사, 3단계 파이널 모의고사 등)</li>
                        </ol>
                    </dd>
                    
                    <dt>
                        <h3>유의사항</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.</li>
                            <li>신광은 경찰PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며, 이로 인한 환불은 불가합니다.</li>
                            <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 PASS 강좌는 즉시 정지, 회원 자격이 박탈됩니다. <br>
                            이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생할 수 있습니다.</li>
                            <li>온,오프라인 동시 시행되는 이벤트, 무료특강 등의 경우 해당 강좌는 PASS에 미지급 되거나, 이벤트 종료 후 제공될 수 있습니다.</li>
                            <li>PASS 관련 발급된 쿠폰은 이벤트가 변경되거나 종료될 경우 자동 회수될 수 있으며, 동일 혜택이 적용되지 않을 수 있습니다.</li>
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
                        <h3>22년 1차 PASS</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 상품은 구매일로부터 22년 1차 필기시험일까지 수강 가능합니다.</li>
                            <li>
                                본 상품 강좌 구성은 다음과 같습니다.<br>
                                - 2022년 대비 형사법, 경찰학개론, 헌법 전 강좌<br>
                                - 해당 상품은 일반공채 대비 상품으로 범죄학은 수강 불가합니다.
                                <div class="tx-blue">
                                    * 형사법 : 신광은 교수님<br>
                                    * 경찰학(개편) : 장정훈 교수님<br>
                                    * 헌법 : 김원욱 교수님 / 이국령 교수님
                                </div>
                            </li>
                            <li>선택한 신광은경찰PASS 상품의 표기된 기간 동안 동영상 강좌를 2배수 수강 할 수 있습니다.</li>
                            <li>각 강좌 별 2배수 수강 후에는 추가 수강이 불가합니다. (<a href="https://police.willbes.net/support/notice/show/cate/3001?board_idx=250648" target="_blank" class="tx-blue">배수제한 공지 자세히 보기 ></a>)</li>
                            <li>신광은경찰PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다. (결제완료자에 한함)</li>
                            <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
                        </ol>
                    </dd>  

                    <dt>
                        <h3>교재 및 포인트</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>신광은 경찰 PASS 수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌 별 교재는 강좌 소개 및 교재 구매 메뉴에서 별도 구매 가능합니다. </li>
                            <li>중도 환불 시 제공받은 입문서는 판매가 기준으로 차감 후 환불됩니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>환불</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내 3강 이하 수강시에만 전액 환불 가능합니다.</li>
                            <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                            <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                            <li>고객 변심으로 인한 환불은 수강 시작일 (당일 포함)로부터 7일이 경과되면, 신광은 경찰PASS 결제가 기준으로 계산하여 
                            사용일 수만큼 차감 후 환불됩니다. (단, 가산점 특강, 온라인 모의고사 등 이용 시에도 차감)</li>
                            <li>중도 환불 시 제공받은 입문서는 판매가 기준으로 차감 후 환불됩니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>PASS 수강</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>로그인 후 [내 강의실]에서 [무한PASS존]으로 접속합니다.</li>
                            <li>구매한 PASS 상품 선택 후 [강좌추가하기]를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                            <li>신광은 경찰 PASS는 일시 정지, 수강 연장, 재수강 불가합니다.</li>
                            <li>신광은 경찰 PASS 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다.<br>
                            총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대 (신광은 경찰PASS PMP강의는 제공하지 않습니다.)</li>
                            <li>PC, 모바일 기기에 대한 초기화가 필요할 경우 최초 초기화에 한해서는 수강생 본인이 초기화가 가능합니다. 다만 추후 초기화가
                                필요할 시 내용 확인 후 가능하오니 고객센터로 문의하시기 바랍니다. ([내 강의실] 내 [무한PASS존]에서 등록기기정보 확인)</li>
                            <li>일부 강좌의 경우 자료 출력 횟수 제한이 적용됩니다. (2단계 동형 모의고사, 3단계 파이널 모의고사 등)</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>유의사항</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.(재수강/환승 및 이벤트진행시 제외)</li>
                            <li>신광은경찰PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며, 이로 인한 환불은 불가합니다.</li>
                            <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 PASS 강좌는 즉시 정지, 회원 자격이 박탈됩니다. 이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생 할 수 있습니다.</li>
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

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );
    </script>

    <script type="text/javascript">
        var $regi_form = $('#regi_form');

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

       /*쿠폰발급 */
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

        /*약관동의*/
        function termsCheck(terms_id,ele_id){
            if($("#" + terms_id).is(":checked") === false){
                $("#" + terms_id).focus();
                alert('이용안내에 동의하셔야 합니다.');
                return;
            }
            goCartNDirectPay(ele_id, 'y_pkg', 'on_lecture', 'periodpack_lecture', 'Y');
        }

        /*무료 교재지급*/
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

        /* 이벤트 추가 신청 메세지*/
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

    
    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-69505110-4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-69505110-4');
    </script>

@stop