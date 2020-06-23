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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .sky {position:fixed; top:200px;right:0;z-index:10;}
        .sky li{padding-bottom:25px;}

        .evtTop00 {background:#0a0a0a}

        .evtTop {background:#313E4F url(https://static.willbes.net/public/images/promotion/2020/06/1697_top_bg.jpg) repeat-y center top;}     

        .evt01 {background:#f8f8f8;} 

        .evt02, .evt03, .evt04 {background:#ddd;}
        .evt02_title {background:#ddd;padding:50px 0;}

        .evt05 {background:#F1F1F1;position:relative;}
        .check {color:#000; font-size:15px;font-weight:bold;position:absolute;left:50%;top:39%;margin-left:-417px;margin-top:325px;}
        .check label {cursor:pointer}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a.infotxt {display:inline-block; padding:12px 20px 10px 20px;color:#fff; background:#c30006; margin-left:50px; border-radius:20px}
        .check a.infotxt:hover {background:#000;}   

        .evt06 {background:#fff;}

        .evt07 {background:#797979;}

        /*탭(텍스트)*/
        .tabContaier{width:100%;background:#fff;margin:50px 0;}
        .tabContaier ul{width:964px;margin:0 auto;height:80px;border-bottom:5px solid #000;} 
        .tabContaier li{display:inline-block;width:400px;height:75px;line-height:75px;background:#ebebeb;color:#7f7f7f;float:left;font-size:25px;font-weight:bold;}
        .tabContaier li:first-child {margin-right:20px;margin-left:75px;}
        .tabContaier:after {content:""; display:block; clear:both}
        .tabContaier li a{display:block;}
        .tabContaier li a:hover,
        .tabContaier li a.active {color:#000;font-size:40px;background:#fff;border:5px solid #000;border-bottom:none;}

    </style>

    <div class="p_re evtContent NGR" id="evtContainer">

        <ul class="sky">
            <li>
                <a href="#apply01"> 
                    <img src="https://static.willbes.net/public/images/promotion/2020/06/1697_sky1.jpg" alt="1단계 핵심.문풀 단과강의" >
                </a>
            </li>      
            <li>
                <a href="#apply02"> 
                    <img src="https://static.willbes.net/public/images/promotion/2020/06/1697_sky2.jpg" alt="실전문풀 풀패키지" >
                </a>
            </li>                
        </ul> 
        
        <div class="evtCtnsBox evtTop00">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1009_first.jpg" title="대한민국 경찰학원 1위">        
        </div>

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1697_top.jpg" title="문제풀이 풀패키지">                    
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1697_01.jpg" title="커리큘럼">           
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1697_02.jpg"  title="문제풀이 1단계">
        </div>

        <div class="evtCtnsBox evt02_title" id="apply01">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1697_02_title.jpg"  title="1단계 과목별 신청하기">
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial')
            @else
            @endif    
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1697_03.jpg"  title="문제풀이 2단계">
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1697_04.jpg"  title="문제풀이 3단계">
        </div>     

         <div class="evtCtnsBox evt05" id="apply02">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1697_05.jpg" usemap="#map1697c"  title="수강신청" border="0">
            <map name="map1697c" id="map1697c">
                <area shape="rect" coords="129,676,279,716" href="javascript:go_PassLecture('167104');"  alt="수강신청" />
                <area shape="rect" coords="484,676,633,716" href="javascript:go_PassLecture('167105');"  alt="수강신청" />
                <area shape="rect" coords="841,677,989,717" href="javascript:go_PassLecture('167106');"  alt="수강신청" />
            </map>  
            <div class="check" id="chkInfo">   
                <label>
                    <input name="ischk" type="checkbox" value="Y" />
                    페이지 하단 신광은경찰PASS 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#info" class="infotxt">이용안내 확인하기 ↓</a><br/><br/>
                <span>※ 강의공유, 콘테츠 부정 사용 적발 시, 회원 자격 박탈 및 환불이 불가하며, 불법 공유 행위 시안에 따라 민형사상 조치가 있을 수 있습니다.</span>
            </div>              
        </div>    

         <div class="evtCtnsBox evt06">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1697_06.jpg"  title="수강신청">
            <div class="evtCtnsBox wb_tab">
                <div class="tabContaier">    
                    <ul>    
                        <li><a href="#tab1" class="active">일반공채</a></li>
                            
                        <li><a href="#tab2">경행경채</a></li>          
                    </ul>
                </div> 
                <div id="tab1" class="tabContents">       
                    <img src="https://static.willbes.net/public/images/promotion/2020/06/1697_06_tab01.jpg" usemap="#Map1697a" title="일반공채 수강신청" border="0"  />
                    <map name="Map1697a" id="Map1697a">
                        <area shape="rect" coords="897,118,1027,154" href="https://police.willbes.net/package/index/cate/3001/pack/648001?course_idx=1007" target="_blank" />
                        <area shape="rect" coords="895,298,1026,334" href="https://police.willbes.net/package/index/cate/3001/pack/648001?course_idx=1008" target="_blank" />
                        <area shape="rect" coords="895,489,1025,523" href="https://police.willbes.net/package/index/cate/3001/pack/648001?course_idx=1009" target="_blank" />
                    </map>
                </div>
                <div id="tab2" class="tabContents">       
                    <img src="https://static.willbes.net/public/images/promotion/2020/06/1697_06_tab02.jpg" usemap="#Map1697b" title="경행경채 수강신청" border="0"  />
                    <map name="Map1697b" id="Map1697b">
                        <area shape="rect" coords="898,118,1025,152" href="https://police.willbes.net/package/index/cate/3002/pack/648001?course_idx=1007" target="_blank" />
                        <area shape="rect" coords="896,299,1024,332" href="https://police.willbes.net/package/index/cate/3002/pack/648001?course_idx=1008" target="_blank" />
                        <area shape="rect" coords="896,487,1026,523" href="https://police.willbes.net/package/index/cate/3002/pack/648001?course_idx=1009" target="_blank" />
                    </map>
                </div>      
            </div>     
        </div>     

        <div class="evtCtnsBox evt07" id="info">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1697_07.jpg"  title="이용안내">
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

    /* 이용안내 동의 */
    function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ site_url('/periodPackage/show/cate/3001/pack/648001/prod-code/') }}' + code;
            location.href = url;            
        }

</script>
    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop