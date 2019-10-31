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
.evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

/************************************************************/

.wb_00 {background:#404040;}
.wb_top{background:#40c8f4;}
.wb_cts01{background:#fff;}
.wb_cts02{background:#f9f9f9;padding-bottom:150px;}
.wb_cts03{background:#fffce9;padding-bottom:150px;}
.wb_cts04{background:#fff;}
.wb_cts05{background:#3d3d3d;}

/*탭(텍스트)*/
.tabContaier{width:1020px;margin:0 auto;padding-bottom:50px;}
.tabContaier li{display:inline-block;width:170px;height:60px;line-height:60px;background:#ececec;color:#000;float:left;font-size:18px;font-weight:bold;}
.tabContaier:after {content:""; display:block; clear:both}
.tabContaier li a{display:block;}
.tabContaier li a:hover,
.tabContaier li a.active {background:#00c1ff;color:#fff;}

/*탭(이미지)*/
.tabs{width:100%; text-align:center; padding-bottom:20px;}
.tabs ul {width:1000px;margin:0 auto;}		
.tabs li {display:inline; float:left;}	
.tabs a img.off {display:block}
.tabs a img.on {display:none}
.tabs a.active img.off {display:none}
.tabs a.active img.on {display:block}
.tabs ul:after {content:""; display:block; clear:both}
 </style>

 <div class="p_re evtContent NGR" id="evtContainer">       

    <div class="evtCtnsBox wb_00">
        <img src="https://static.willbes.net/public/images/promotion/2019/06/1270_00.jpg" alt="신광은 경찰팀" />
    </div>  
    
    <div class="evtCtnsBox wb_top">
        <img src="https://static.willbes.net/public/images/promotion/2019/10/1446_top.jpg" alt="튜터링 관리반" />
    </div> 
     
    <div class="evtCtnsBox wb_cts01">
        <img src="https://static.willbes.net/public/images/promotion/2019/10/1446_01.jpg" alt="해답을 제시" />
    </div> 

    <div class="evtCtnsBox wb_cts02">
        <img src="https://static.willbes.net/public/images/promotion/2019/10/1446_02.jpg"  title="튜터링 관리반 학습포인트" />
        <div class="tabContaier">    
            <ul>    
                <li><a href="#tab1" class="active">한국사(원)</a></li>
                    
                <li><a href="#tab2">한국사(오)</a></li>
                
                <li><a href="#tab3">영어</a></li>
                   
                <li><a href="#tab4">형소법</a></li>

                <li><a href="#tab5">경찰학</a></li>

                <li><a href="#tab6">형법</a></li>
            </ul>
        </div> 
        <div id="tab1" class="tabContents">       
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1446_02_1.png" title="" />      
        </div>
        <div id="tab2" class="tabContents">       
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1446_02_2.png"  title="" />      
        </div>
        <div id="tab3" class="tabContents">       
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1446_02_3.png"  title="" />      
        </div>
        <div id="tab4" class="tabContents">       
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1446_02_4.png" title="" />      
        </div>   
        <div id="tab5" class="tabContents">       
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1446_02_5.png" title="" />      
        </div>   
        <div id="tab6" class="tabContents">       
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1446_02_6.png" title="" />      
        </div>   
    </div> 

    <div class="evtCtnsBox wb_cts03">
        <img src="https://static.willbes.net/public/images/promotion/2019//10/1446_03.jpg" alt="튜터링 관리반 시간표"/>
        <div class="tabs">
            <ul>
                <li>
                    <a href="#tab01s" class="active">
                        <img src="https://static.willbes.net/public/images/promotion/2019/10/1446_03_tab1on.jpg" class="on"/>
                        <img src="https://static.willbes.net/public/images/promotion/2019/10/1446_03_tab1.jpg" class="off"/>
                    </a>
                </li>
                <li>
                    <a href="#tab02s">
                        <img src="https://static.willbes.net/public/images/promotion/2019/10/1446_03_tab2on.jpg" class="on"/>
                        <img src="https://static.willbes.net/public/images/promotion/2019/10/1446_03_tab2.jpg" class="off"/>
                    </a>
                </li>
            </ul>
            <div id="tab01s">
                <img src="https://static.willbes.net/public/images/promotion/2019/10/1446_03_tab1_con.png" />                   
            </div>                                        
            <div id="tab02s">
                <img src="https://static.willbes.net/public/images/promotion/2019/10/1446_03_tab2_con.png" />            
            </div>
        </div>
    </div>

    <div class="evtCtnsBox wb_cts04">
        <img src="https://static.willbes.net/public/images/promotion/2019/10/1446_04.jpg" alt="지금 바로 신청하기" usemap="#Map1446a" border="0" />
        <map name="Map1446a" id="Map1446a">
            <area shape="rect" coords="367,978,756,1099" href="https://police.willbes.net/pass/offLecture/index/type/tutor?cate_code=3010&campus_ccd=605001&course_idx=1104&subject_idx=1479" target="_blank" />
        </map>
    </div> 

    <div class="evtCtnsBox wb_cts05">
        <img src="https://static.willbes.net/public/images/promotion/2019/10/1446_05.jpg" alt="튜터링 관리문의" />
    </div> 
  
</div>
<!-- End Container -->

<script type="text/javascript">

    /*탭(텍스터버전)*/
    $(document).ready(function(){
        $(".tabContents").hide();
        $(".tabContents:first").show();
        $(".tabContaier ul li a").click(function(){
        var activeTab = $(this).attr("href");
        $(".tabContaier ul li a").removeClass("active");
        $(this).addClass("active");
        $(".tabContents").hide();
        $(activeTab).fadeIn();
        return false;
        });
    });

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

</script>
{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop