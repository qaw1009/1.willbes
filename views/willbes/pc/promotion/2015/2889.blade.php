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

		.evt_top {background:url(https://static.willbes.net/public/images/promotion/2023/02/2889_top_bg.jpg) no-repeat center top; height:1248px;}
        .evt_top .mainImg {position:absolute; top:135px; left:50%; margin-left:-345px}

        .evt_01 {background:url(https://static.willbes.net/public/images/promotion/2023/02/2889_01_bg.jpg) no-repeat center top;}

        .evt_02 .tabmenu {width:980px; margin:0 auto 40px; display:flex; justify-content: space-between;}
        .evt_02 .tabmenu a {padding:20px; width:33.3333%; background:#a5a8ad; color:#fff; font-size:28px}
        .evt_02 .tabmenu a.active {background:#ca2c07}

        .evt_02s {background:url(https://static.willbes.net/public/images/promotion/2023/02/2889_02_curri_bg.jpg) no-repeat center top;}
        
        .evt_03 {background:#ECECEC}

        .youtube {position:absolute; top:765px; left:50%;z-index:1;margin-left:-560px}
        .youtube iframe {width:1120px; height:550px}
        
       
        /************************************************************/

    </style>
    
	<div class="evtContent NSK">

        <div class="sky" id="QuickMenu">
            <a href="https://willbesedu.willbes.net/pass/offLecture/show/cate/3126/prod-code/205021" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2023/02/2889_sky.jpg" alt="실강 0원 패스 신청하기"></a>         
        </div>

		<div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2889_title.png"  alt="실강 0원패스" data-aos="flip-down" class="mainImg"/>
		</div>

		<div class="evtCtnsBox evt_01" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/02/2889_01.jpg" alt="실강 0원 패스란" />
                <a href="https://willbesedu.willbes.net/pass/offLecture/show/cate/3126/prod-code/205021" target="_blank" title="수강신청하기" style="position: absolute;left: 20.59%;top: 76.83%;width: 37.84%;height: 8.71%;z-index: 2;"></a>
            </div>
		</div>        

		<div class="evtCtnsBox evt_02" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2023/02/2889_02.jpg" alt="불꽃 소방팀" />
            <div class="tabmenu">
                <a href="#tab01"><strong class="NSK-Black">소방학</strong><br> 권나라</a>        
                <a href="#tab02"><strong class="NSK-Black">소방관계법규</strong><br> 오도희</a>
                <a href="#tab03"><strong class="NSK-Black">소방행정법</strong><br> 신기훈</a>
            </div>
            <div id="tab01">
                <a href="https://pass.willbes.net/pass/professor/show/prof-idx/51422/?cate_code=3050&subject_idx=1259" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2023/02/2889_02_01.png" alt="소방학 권나라" /></a>
            </div>        
            <div id="tab02">
                <a href="https://pass.willbes.net/pass/professor/show/prof-idx/51423?cate_code=3050&subject_idx=1284" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2023/02/2889_02_02.png" alt="소방관계법규 오도희" /></a>
            </div>
            <div id="tab03">
                <a href="https://pass.willbes.net/pass/professor/show/prof-idx/51215?cate_code=3050&subject_idx=1257" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2023/02/2889_02_03.png" alt="소방행정법 신기훈" /></a>	
            </div>           			  
		</div>

        <div class="evtCtnsBox evt_02s" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2889_02_curri.jpg" alt="커리큘럼" />	
		</div>   

        <div class="evtCtnsBox evt_03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2889_03.jpg" alt="추가 학습혜택" />	
		</div> 

        <div class="evtCtnsBox evt_04" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/02/2889_04.jpg" alt="히어로" />
                <a href="https://willbesedu.willbes.net/pass/promotion/index/cate/3126/code/2879" title="통합생활 관리반 더 알아보기" target="_blank" style="position: absolute;left: 10.59%;top: 39.63%;width: 44.84%;height: 6.01%;z-index: 2;"></a>
                <div class="youtube">
                    <iframe src="https://www.youtube.com/embed/qzgc1l4EtGA?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>        
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