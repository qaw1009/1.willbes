@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
<style type="text/css">
.evtContent { 
    position:relative;            
    width:100% !important;
    margin-top:20px !important;
    padding:0 !important;
    background:#fff;
}	
.evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
/*****************************************************************/  

.evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/05/2215_top_bg.jpg) no-repeat center top;}
.evt01 {background:#fff100;}

.evtCtnsBox .wrap {width:1120px; margin:0 auto; position: relative;}
.evtCtnsBox .wrap a:hover {box-shadow:0 10px 10px rgba(0,0,0,.2);}

.evt03 ul {width:912px; margin:0 auto 50px}
.evt03 ul:after {content:''; display:block; clear:both}
.evt03 li {display:inline; float:left; width:50%}
.evt03 li a {background:#e1e1e1; color:#333; border:3px solid #e1e1e1; font-size:16px; line-height:1.3; display:block; padding: 20px 0}
.evt03 li a strong {font-size:30px;}
.evt03 li a.active {color:#a17544; border:3px solid #a17544; background:#fff; }

.youtubeBox iframe {width:912px; height:492px}
</style> 

    <div class="evtContent NSK" id="evtContainer"> 
        <div class="evtCtnsBox evt_top">  
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2215_top.jpg" alt="윌비스 불꽃소방 기초입문">  
        </div>
    
        <div class="evtCtnsBox evt01">            
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2215_01.jpg" alt="기초입문 강좌">
        </div>

        <div class="evtCtnsBox evt02">  
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2215_02.jpg" alt="가이드라인"> 
        </div>  

        <div class="evtCtnsBox evt03">  
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/05/2215_03.jpg" alt="전담 교수진">
                <a href="https://pass.willbes.net/professor/show/cate/3023/prof-idx/51068/?subject_idx=1113&subject_name=%EC%86%8C%EB%B0%A9%ED%95%99%EA%B0%9C%EB%A1%A0" target="_blank" title="이종오 교수" style="position: absolute; left: 12.23%; top: 87.13%; width: 8.66%; height: 3.27%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/professor/show/cate/3023/prof-idx/50615?subject_idx=1111&subject_name=%ED%96%89%EC%A0%95%EB%B2%95" target="_blank" title="이석준 교수" style="position: absolute; left: 34.38%; top: 87.13%; width: 8.66%; height: 3.27%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/professor/show/cate/3023/prof-idx/50309?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4" target="_blank" title="이아림 교수" style="position: absolute; left: 56.7%; top: 87.13%; width: 8.66%; height: 3.27%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/professor/show/cate/3023/prof-idx/50305?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC" target="_blank" title="한경준 교수" style="position: absolute; left: 78.93%; top: 87.13%; width: 8.66%; height: 3.27%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt03">  
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2215_04_01.jpg" alt="합격설명회">
            <ul class="youtubetab">
                <li>
                    <a href="#tab1" class="active">
                        소방학/소방관계법규<br>
                        <strong>이종오 합격 설명회</strong>
                    </a>
                </li>
                <li>
                    <a href="#tab2">
                        소방행정법<br>
                        <strong>이석준 합격 설명회</strong>
                    </a>
                </li>
            </ul>
            <div class="youtubeBox" id="tab1">
                <iframe src="https://www.youtube.com/embed/myYzKGCImy4?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div> 
            <div class="youtubeBox" id="tab2">
                <iframe src="https://www.youtube.com/embed/ZqMMVLxxFqw?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div> 
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/05/2215_04_02.jpg" alt="수강신청">
                <a href="https://pass.willbes.net/package/show/cate/3023/pack/648001/prod-code/182446" target="_blank" title="수강신청" style="position: absolute; left: 78.66%; top: 68.43%; width: 14.2%; height: 12.75%; z-index: 2;"></a>
            </div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif 
        </div>                  
    </div>
    <!-- End Container --> 

    <script type="text/javascript">
        var tab1_url = "https://www.youtube.com/embed/myYzKGCImy4?rel=0";
        var tab2_url = "https://www.youtube.com/embed/ZqMMVLxxFqw?rel=0"; 

        $(function() {
        $(".youtubeBox").hide(); 
        $(".youtubeBox:first").show();
        $(".youtubetab li a").click(function(){ 
                var activeTab = $(this).attr("href"); 
                var html_str = "";
                if(activeTab == "#tab1"){
                    html_str = "<iframe src='"+tab1_url+"' frameborder='0' allowfullscreen></iframe>";
                }else if(activeTab == "#tab2"){
                    html_str = "<iframe src='"+tab2_url+"' frameborder='0' allowfullscreen></iframe>";
                }
                $(".youtubetab a").removeClass("active"); 
                $(this).addClass("active"); 
                $(".youtubeBox").hide(); 
                $(".youtubeBox").html(''); 
                $(activeTab).html(html_str);
                $(activeTab).fadeIn(); 
                return false; 
                });
            });
    </script>
@stop