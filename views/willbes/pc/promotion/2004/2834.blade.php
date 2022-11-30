@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
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

		.evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/11/2834_top_bg.jpg) no-repeat center top;}	

        .evt_01 {background:#f0f0f0}
        .evt_02 .tabmenu {width:980px; margin:0 auto 40px; display:flex; justify-content: space-between;}
        .evt_02 .tabmenu a {padding:20px; width:24.8%; background:#a5a8ad; color:#fff; font-size:28px}
        .evt_02 .tabmenu a.active {background:#ca2c07}    
        
        .evt_03 {background:#ca2c07}
        .evt_04 {background:#ececec}

        .evt_05 {background:url(https://static.willbes.net/public/images/promotion/2022/11/2834_07_bg.jpg) no-repeat center top;}
        
        .evt_06 ul {width:1120px; margin:0 auto; padding:100px; text-align:left; font-size:20px; line-height:1.7; display:flex; flex-wrap: wrap;  }
        .evt_06 li {list-style-type: disc; margin-left:20px; margin-bottom:20px; width:calc(50% - 20px)}
        .evt_06 li div {font-size:18px; color:#666}   
        .evt_06 li div span {padding:2px 5px; font-size:14px; color:#fff; border-radius:4px; vertical-align:middle; display:inline-block}
        .evt_06 li div span:nth-of-type(1) {background:#3957ac;}
        .evt_06 li div span:nth-of-type(2) {background:#40a028;}
        .evt_06 li div span:nth-of-type(3) {background:#c90f25;}
        .evt_06 li div span:nth-of-type(4) {background:#40a028;}

        .loadmap {position: relative; /*padding-bottom:56.25%;*/ overflow: hidden; max-width:100%; height:500px; }
        .loadmap iframe {position:absolute; top: 0; left: 0; width:100%; height:100%;}     
        
        /************************************************************/

    </style>
    
	<div class="evtContent NSK">
        <div class="sky" id="QuickMenu">
            <a href="#lecbuy"><img src="https://static.willbes.net/public/images/promotion/2022/11/2834_sky.png" alt="불꽃소방 실강오픈"></a>         
        </div>
    
		<div class="evtCtnsBox evt_top" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2022/11/2834_top.jpg" alt="불꽃소방 실강오픈" />
		</div>

		<div class="evtCtnsBox evt_01" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2022/11/2834_01.jpg" alt="합격보장반" />			  
		</div>       
        

		<div class="evtCtnsBox evt_02" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2022/11/2834_02_01.jpg" alt="" />
            <div class="tabmenu">
                <a href="#tab01"><strong class="NSK-Black">소방학</strong><br> 권나라</a>
                <a href="#tab02"><strong class="NSK-Black">소방관계법규</strong><br> 이종오</a>
                <a href="#tab04"><strong class="NSK-Black">소방관계법규</strong><br> 오도희</a>
                <a href="#tab03"><strong class="NSK-Black">소방행정법</strong><br> 신기훈</a>
            </div>
            <div id="tab01">
                <a href="https://pass.willbes.net/pass/professor/show/prof-idx/51422/?cate_code=3050&subject_idx=1259" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2022/11/2834_02_02.jpg" alt="소방학 권나라" /></a>
            </div>
            <div id="tab02">
                <a href="https://pass.willbes.net/pass/professor/show/prof-idx/51055?cate_code=3050&subject_idx=1284" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2022/11/2834_02_03.jpg" alt="소방관계법규 이종오" /></a>
            </div>
            <div id="tab04">
                <a href="https://pass.willbes.net/pass/professor/show/prof-idx/51423?cate_code=3050&subject_idx=1284" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2022/11/2834_02_06.jpg" alt="소방관계법규 오도희" /></a>
            </div>
            <div id="tab03">
                <a href="https://pass.willbes.net/pass/professor/show/prof-idx/51215?cate_code=3050&subject_idx=1257" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2022/11/2834_02_04.jpg" alt="소방행정법 신기훈" /></a>	
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2834_02_05.jpg" alt="커리큘럼" />				  
		</div>   

        <div class="evtCtnsBox evt_03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2834_03.jpg" alt="오픈 이벤트" />	
		</div> 

        <div class="evtCtnsBox evt_04" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2834_04.jpg" alt="추가 학습혜택" />	
		</div> 

        <div class="evtCtnsBox evt_05" data-aos="fade-up" id="lecbuy">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/11/2834_07.jpg" alt="합격보장반" />	
                <a href="https://pass.willbes.net/pass/offLecture/show/cate/3050/prod-code/202747" title="합격패스" style="position: absolute; left: 65.09%; top: 52.13%; width: 23.84%; height: 11%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/pass/offLecture/show/cate/3050/prod-code/202993" title="합격보장반" style="position: absolute; left: 65.18%; top: 72.25%; width: 23.84%; height: 11%; z-index: 2;"></a>
            </div>
		</div> 

  

        <div class="evtCtnsBox evt_06" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2834_06.jpg" alt="합격보장반" />
            <div class="loadmap">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1881.7990872517546!2d126.94238635957505!3d37.51272428677447!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357c9fe8a0a1e2a5%3A0x3bc432e93a6e20c1!2zKOyjvCnsnIzruYTsiqQ!5e0!3m2!1sko!2skr!4v1669167778104!5m2!1sko!2skr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div> 
			<ul>
                <li>
                    주소
                    <div>서울시 동작구 만양로 105 한성빌딩 2층</div>
                </li>
                <li>
                    관리반 문의
                    <div>1522-6112</div>
                </li>
                <li>
                    지하철 이용 시
                    <div>노량진역 1번 출구 도보로 3분 / 3번 출구 도보로 4분</div>
                </li>
                <li>
                    버스 이용 시
                    <div>
                        <span>간선</span> 150, 360, 500, 504, 507, 605, 640, 654, 742<br>
                        <span>지선</span> 5516, 5517, 5531, 5535, 5536, 6211, 6411<br>
                        <span>광역</span> 9408<br>
                        <span>마을</span> 동작03, 동작08
                    </div>
                </li>
            </ul>	  
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