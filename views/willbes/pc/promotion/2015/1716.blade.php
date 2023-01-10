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
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative;}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .sky {position:fixed; top:200px; width:180px; right:10px; z-index:1;}
        .sky a {padding-bottom:10px; display:block}
        
        .evtTop {background:#79CAFF url(https://static.willbes.net/public/images/promotion/2023/01/1716_top_bg.jpg) no-repeat center top;}
        .evt01 {background:#79CAFF url(https://static.willbes.net/public/images/promotion/2020/07/1716_01_bg.jpg) no-repeat center top;}
        .evt02 {background:#9090FE url(https://static.willbes.net/public/images/promotion/2020/07/1716_02_bg.jpg) no-repeat center top;}
        .evt03 {background:#fff url(https://static.willbes.net/public/images/promotion/2020/07/1716_03_bg.jpg) no-repeat center top;}
        .evt06 {background: url(https://static.willbes.net/public/images/promotion/2023/01/1716_06_bg.jpg) no-repeat center top;} 

         /*탭(이미지)*/
        .tabs{width:100%; text-align:center;}
        .tabs ul {width:1116px;margin:0 auto;border-bottom:5px solid #363636;}		
        .tabs li {display:inline; float:left;}	
        .tabs a img.off {display:block}
        .tabs a img.on {display:none}
        .tabs a.active img.off {display:none}
        .tabs a.active img.on {display:block}
        .tabs ul:after {content:""; display:block; clear:both}


    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="sky">
            <a href="#apply"><img src="https://static.willbes.net/public/images/promotion/2020/07/1716_sky.jpg"  title="수강신청하기" /></a>
        </div>

        <div class="evtCtnsBox evtTop" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/01/1716_top.jpg" title="스파르타 합격 관리반">                    
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1716_01.jpg" title="비포어">           
        </div>
        
        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1716_02.jpg" title="애프터">           
        </div>
        
        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1716_03.jpg" title="차별화된 합격시스템">
            <div class="tabs">
                <ul>
                    <li>
                        <a href="#tab01s" class="active">
                            <img src="https://static.willbes.net/public/images/promotion/2020/07/1716_03_tab01on.png" class="on"/>
                            <img src="https://static.willbes.net/public/images/promotion/2020/07/1716_03_tab01off.png" class="off"/>
                        </a>
                    </li>
                    <li>
                        <a href="#tab02s">
                            <img src="https://static.willbes.net/public/images/promotion/2020/07/1716_03_tab02on.png" class="on"/>
                            <img src="https://static.willbes.net/public/images/promotion/2020/07/1716_03_tab02off.png" class="off"/>
                        </a>
                    </li>
                </ul>
            </div>
            <div id="tab01s" > 
                <img src="https://static.willbes.net/public/images/promotion/2023/01/1716_03_tab01.jpg" />      
            </div>                                        
            <div id="tab02s">
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1716_03_tab02.jpg" />         
            </div>
        </div>
        
         <div class="evtCtnsBox evt06" id="apply" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/01/1716_06.jpg" title="수강신청">
                <a href="https://willbesedu.willbes.net/pass/offLecture/show/cate/3130/prod-code/204596" target="_blank" title="실강 스파르타" style="position: absolute; left: 17.68%; top: 38.98%; width: 16.07%; height: 4.41%; z-index: 2;"></a>
                <a href="https://willbesedu.willbes.net/pass/offLecture/show/cate/3130/prod-code/204597" target="_blank" title="독학 스파르타" style="position: absolute; left: 66.88%; top: 38.98%; width: 16.07%; height: 4.41%; z-index: 2;"></a>
            </div>                  
        </div>

	</div>
    <!-- End Container --> 

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">    
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
        /*탭(이미지버전)*/
        $(document).ready(function(){
                $('.tabs ul').each(function(){
                    var $active, $content, $links = $(this).find('a');
                    $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                    //$active.addClass('active');
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
                        $active.addClass('active');
                        $content.show();
                        e.preventDefault()
                    });
                });
            });

            $(document).ready(function(){
        $(".tabCts").hide(); 
        $(".tabCts:first").show();        
        $(".evttab ul li a").click(function(){             
            var activeTab = $(this).attr("href"); 
            $(".evttab ul li a").removeClass("active"); 
            $(this).addClass("active"); 
            $(".tabCts").hide(); 
            $(activeTab).fadeIn();             
            return false; 
        });
    });

    $(document).ready(function() {
        AOS.init();
    });
</script>
    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop