@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <link href="/public/css/willbes/style_2015.css?ver={{time()}}" rel="stylesheet">
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:20px auto 0;
            padding:0 !important;
            background:#fff;     
            font-size:14px;       
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

		/************************************************************/ 

        .sky {position:fixed; top:200px; right:10px; z-index:100;}
        .sky a {display:block; margin-bottom:10px}

		.evt_top {background:url(https://static.willbes.net/public/images/promotion/2023/02/2902_top_bg.jpg) no-repeat center top;}

        .evt_01 {background:#ececec;}

        .evt_02 .tabmenu {width:980px; margin:0 auto 40px; display:flex; justify-content: space-between;}
        .evt_02 .tabmenu a {padding:20px; width:33.3333%; background:#a5a8ad; color:#fff; font-size:28px}
        .evt_02 .tabmenu a.active {background:#5907ca}

        .evt_03 {background:url(https://static.willbes.net/public/images/promotion/2023/02/2902_03_bg.jpg) no-repeat center top;}
        
        .evt_04 .lecbuy { width:1120px; margin:0 auto 100px; display:flex}
        .evt_04 .lecbuy a {display:block; background:#5907ca; color:#fff; font-size:30px; padding:30px; width:50%; text-align:left; line-height:1.4; position: relative; margin-right:1px}
        .evt_04 .lecbuy a span {color:#d3b4fe; text-decoration: line-through;}
        .evt_04 .lecbuy a strong {position: absolute; top:30px; right:30px; background:#fff; color:#5907ca; padding:20px 30px; border-radius:40px}
        .evt_04 .lecbuy a:hover {background:#000}

        .youtube {}
        .youtube iframe {width:1120px; height:550px}    


        /************************************************************/

    </style>

	<div class="evtContent NSK">

        <div class="sky" id="QuickMenu">
            <a href="#evt01"><img src="https://static.willbes.net/public/images/promotion/2023/02/2902_sky01.jpg" alt="파격할인 이벤트"></a>         
        </div>

		<div class="evtCtnsBox evt_top" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/02/2902_top.jpg"  alt="파격할인 이벤트"/>
                <a href="https://willbesedu.willbes.net/pass/offLecture/show/cate/3126/prod-code/205095" target="_blank" title="합격반" style="position: absolute; left: 65%; top: 65.37%; width: 24.02%; height: 6.19%; z-index: 2;" id="evt01"></a>
                <a href="https://willbesedu.willbes.net/pass/offLecture/show/cate/3126/prod-code/205027" target="_blank" title="합격보장반" style="position: absolute; left: 65%; top: 76.29%; width: 24.02%; height: 6.19%; z-index: 2;"></a>
            </div>
		</div>

		<div class="evtCtnsBox evt_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2902_01.jpg" alt="왜 윌비스 소방인가?" />
		</div>

        <div class="evtCtnsBox evt_02" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2023/02/2902_02_01.jpg" alt="불꽃 소방팀" />
            <div class="tabmenu">
                <a href="#tab01"><strong class="NSK-Black">소방학</strong><br> 권나라</a>        
                <a href="#tab02"><strong class="NSK-Black">소방관계법규</strong><br> 오도희</a>
                <a href="#tab03"><strong class="NSK-Black">소방행정법</strong><br> 신기훈</a>
            </div>
            <div id="tab01">
                <a href="https://willbesedu.willbes.net/pass/professor/show/prof-idx/51432?cate_code=3126&subject_idx=1962" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2023/02/2902_02_t01.jpg" alt="소방학 권나라" /></a>
            </div>        
            <div id="tab02">
                <a href="https://pass.willbes.net/pass/professor/show/prof-idx/51423?cate_code=3050&subject_idx=1284" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2023/02/2902_02_t02.jpg" alt="소방관계법규 오도희" /></a>
            </div>
            <div id="tab03">
                <a href="https://pass.willbes.net/pass/professor/show/prof-idx/51215?cate_code=3050&subject_idx=1257" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2023/02/2902_02_t03.jpg" alt="소방행정법 신기훈" /></a>	
            </div>           			  
		</div>

        <div class="evtCtnsBox evt_03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2902_03.jpg" alt="커리큘럼" />	
		</div>   

        <div class="evtCtnsBox evt_04" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2902_04_01.jpg" alt="" /><br>
            <a href="https://willbesedu.willbes.net/pass/promotion/index/cate/3126/code/2879" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2023/02/2902_04_02.jpg" alt="" /></a>
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2902_04_03.jpg" alt="" />
            <div class="lecbuy">
                <a class="NSK-Black" href="https://willbesedu.willbes.net/pass/offLecture/show/cate/3126/prod-code/205095" target="_blank">
                    소방 합격반<br> <span class="NSK">350만원</span> 150만원
                    <strong>신청하기 ></strong>
                </a>
                <a class="NSK-Black" href="https://willbesedu.willbes.net/pass/offLecture/show/cate/3126/prod-code/205027" target="_blank">
                    소방 합격보장반<br> <span class="NSK">500만원</span> 300만원
                    <strong>신청하기 ></strong>
                </a>
            </div>
		</div> 

        <div class="evtCtnsBox evt_04" data-aos="fade-up">
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/qzgc1l4EtGA?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>     
		</div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2902_05.jpg" alt="" />	
		</div>

        <div class="incheon">
            <div class="Section Section4_ic mt40 mb100">
                @include('willbes.pc.site.main_partial.campus_' . $__cfg['SiteCode'])
            </div>
        </div>
	</div>
    <!-- End Container -->

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
        $(document).ready(function(){
            $('.tabmenu').each(function(){
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
            
                e.preventDefault()})}
            )}
        );

        $(document).ready( function() {
            AOS.init();
        });

    </script>
    

@stop