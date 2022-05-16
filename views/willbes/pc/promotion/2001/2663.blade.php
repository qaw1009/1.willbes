@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
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

        .skybanner {position:fixed; top:200px; width:120px; right:10px; z-index:10;}        
        .skybanner a {display:block; margin-bottom:10px}

        /*타이머*/
        .newTopDday {clear:both;background:#f5f5f5; width:100%; padding:20px 0; font-size:26px;}
        .newTopDday ul {width:1120px; margin:0 auto}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; font-weight:600; color:#000}
        .newTopDday ul li strong {line-height:70px}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {line-height:none; text-align:center; padding-left:110px; padding-top:10px; width:28%}
        .newTopDday ul li:last-child {line-height:none; text-align:left; padding-left:10px; padding-top:5px; width:24%; line-height:70px}
        .newTopDday ul:after {content:""; display:block; clear:both}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2022/05/2663_top_bg.jpg) no-repeat center;}
        .wb_top span {position:absolute; left:50%; z-index: 10;}
        .wb_top span.img01 {width:577px; margin-left:-480px; top:170px}
        .wb_top span.img02 {width:597px; margin-left:40px; top:100px}

        .wb_02 {background:#f2f2f2}     
        
        .wb_play {font-size:40px; color:#191919; line-height:1.4; padding-bottom:150px} 
        .wb_play .stitle {margin:150px 0 40px}
        .wb_play span {color:#ff7e00}  
        .wb_play .youtube {width:840px; height:484px; margin:0 auto; position:relative; background: #333;} 
        .wb_play .youtube:before,
        .wb_play .youtube:after{
            z-index: 0;
            width:800px;
            position: absolute;
            content: "";
            bottom: 35px;
            left: 5px;
            top: 80%;            
            box-shadow: 0 20px 15px rgba(0,0,0,.3);
            transform: rotate(-5deg);
        }
        .wb_play .youtube:after{
            transform: rotate(5deg);
            right: 5px;
            left: auto;
        }
        .wb_play .youtube iframe {position: absolute; left:0; width:840px; height:484px; z-index: 2;}  


        .wb_03 {background:url(https://static.willbes.net/public/images/promotion/2022/05/2663_03_bg.jpg) no-repeat center;}   

        .wb_04 {background:#f2f2f2}  
        
        .wb_05 {padding-bottom:150px;}    

        .wb_05 {padding-bottom:150px;}          

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="skybanner" id="QuickMenu">
            <a href="#evt_01"><img src="https://static.willbes.net/public/images/promotion/2022/05/2663_sky01.png" alt="개편과목" ></a>
        </div>      

        <!-- 타이머 
        <div id="newTopDday" class="newTopDday">
            <div>
                <ul>
                    <li>
                    사전접수<br>EVENT 마감까지
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
                        남았습니다.
                    </li>
                </ul>
            </div>
        </div>  -->
        
        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2663_top.jpg"  alt="2022 기본종합반" />
		</div>

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2663_01.jpg"  alt="2022 기본종합반 교수진" />
		</div>

        <div class="evtCtnsBox wb_02" data-aos="fade-up">            
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/05/2663_02.jpg" alt="경찰 과목 개편" />
                <a href="https://police.willbes.net/promotion/index/cate/3001/code/1839" target="_blank" title="개편과목확인" style="position: absolute; left: 15%; top: 78.87%; width: 33.57%; height: 7.5%; z-index: 2;"></a>
                <a href="https://police.willbes.net/promotion/index/cate/3001/code/1966" target="_blank" title="지텔프확인" style="position: absolute; left: 51.25%; top: 78.87%; width: 33.57%; height: 7.5%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox wb_03">
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2663_03.jpg"  alt="2022 기본종합반" />
		</div>

        <div class="evtCtnsBox wb_play NSK-Black" data-aos="fade-up">
            <div class="stitle">형사법 신광은 교수님<br>
            강의의 <span>새로운 신세계</span>를 보여드리겠습니다.</div>
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/40LDBoOoD_k?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="stitle">경찰학 장정훈 교수님<br>
            <span>베테랑의 노하우</span>로 최적화된 경찰학 강의.</div>
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/VHTrL5w2IF4?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="stitle">헌법 김원욱 교수님<br>
            <span>경찰 헌법의 새로운 시대</span>를 이끕니다.</div>
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/KkESWQLjtq8?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>	
            <div class="stitle">헌법 이국령 교수님<br>
            <span>헌법도약으로 정답</span>을 찾아냅니다.</div>
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/_-XbBFVxK2Y?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="stitle">범죄학 박상민 교수님<br>
            <span>저스티스 박상민 범죄학</span>으로 통한다.</div>
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/8T1HxQ5PPhQ?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
		</div>

        <div class="evtCtnsBox wb_04" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2663_04.jpg"  alt="신규강사"/>
        </div>

        <div class="evtCtnsBox wb_05" id="evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2663_05.jpg"  alt="종합반 할인" />
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif  
		</div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('@if(empty($arr_promotion_params['edate'])===false) {{$arr_promotion_params['edate']}} @endif');
        });
    </script>

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop