@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/  
        
        /*타이머*/
        .newTopDday * {font-size:24px}
        .newTopDday {background:#e4e4e4; width:100%; padding:15px 0 40px}
        .newTopDday ul {width:1120px; margin:0 auto;}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; font-size:28px; height:60px; line-height:60px; padding-top:10px !important; font-weight:bold; color:#000}
        .newTopDday ul li strong {line-height:60px}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {text-align:right; padding-right:20px; width:28%; font-size:16px; color:#666; line-height:2.5; }
        .newTopDday ul li:first-child span { font-size:28px; color:#000; }
        .newTopDday ul li:last-child {text-align:left; padding-left:20px; width:24%; line-height:60px}
        .newTopDday ul:after {content:""; display:block; clear:both}

        .sky {position:fixed;top:250px;right:10px;z-index:2;}
        .sky a {display:block;margin-top:10px;}

        .wb_06 {background:#1a1a1a;}
        .wb_07 {background:#ddd6c4;}
        .wb_07 > div {width:1120px; margin:0 auto; position:relative}

        .wb_tops {background:#991DED;}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2020/11/1915_top_bg.jpg) no-repeat center top; }
        
        .tab01s_01 {background:url(https://static.willbes.net/public/images/promotion/2021/03/2001_01_c_bg.jpg) no-repeat center top; position:relative}
        .tab01s_01 span {position:absolute; top:720px; left:50%; margin-left:450px; width:51px; z-index:10}
        .top_tab {position:absolute; left:50%; top:960px; width:975px; margin-left:-487px; z-index:10}   
        .top_tab li {display:inline; float:left; height:150px; width:325px;}        
        .top_tab li a {display:block} 
        .top_tab:after {content:""; display:block; clear:both}

        .tab01s_02 {background:#EAE6DB}

        .tab01s_03 {background:#fff; padding-bottom:100px;}
        .tab01s_03 .link {width:1120px; margin:0 auto; position:relative}

        .tab01s_04 {background:#EAE6DB}

        .tab01s_05 {background:#C23A2E;}
        .tab01s_05 > div {width:1120px; margin:0 auto; position:relative}

        .tab01s_06 {padding:100px 0; width:1120px; margin:0 auto;} 
        .tab01s_06 .title {text-align:left;padding-bottom:50px;}
        .tab01s_06 .title span {padding:5px 20px; color:#fff; background:#333; font-size:30px;}

        .check { position:absolute; bottom:50px; left:50%; margin-left:-490px; width:980px; padding:20px 0px 20px 10px; letter-spacing:3; color:#fff; z-index:5}
        .check label {cursor:pointer; font-size:14px;color:#FFF;font-weight:bold;}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a {display:inline-block; padding:12px 20px 10px 20px; color:#fff; background:#202334; margin-left:50px; border-radius:20px;
            font-size:14px;font-weight:bold;}
            .check a:hover {background:#000;}

        /*TAB*/
        .tabWrapEvt{width:920px; margin:0 auto}
        .tabWrapEvt li {display:inline; float:left; width:450px; margin-left:10px;}
        .tabWrapEvt li a {display:block; text-align:center}
        .tabWrapEvt li a img.off {display:block}
        .tabWrapEvt li a img.on {display:none}
        .tabWrapEvt li a:hover img.off {display:none}
        .tabWrapEvt li a:hover img.on {display:block}
        .tabWrapEvt li a.active img.off {display:none}
        .tabWrapEvt li a.active img.on {display:block}
        .tabWrapEvt li:last-child a {margin-right:0}
        .tabWrapEvt:after {content:""; display:block; clear:both}
        .tabcts {background:none; width:920px; margin:30px auto 0; text-align:center;}
        .evtCtnsBox iframe {width:940px; margin:30px auto 0; height:520px; border:#f4f4f4 solid 14px;}    

        .evtInfo {padding:80px 0; background:#fff; color:#000; font-size:16px}
        .evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
        .evtInfoBox li {list-style: decimal; margin-left:20px; font-size:14px; margin-bottom:10px}
        .evtInfoBox h4 {font-size:35px; margin-bottom:50px}
        .evtInfoBox .infoTit {font-size:20px; margin-bottom:10px}
        .evtInfoBox ul {margin-bottom:30px}

        /*레이어팝업*/
        .Pstyle {
            opacity: 0;
            display: none;
            position: relative;
            width: auto;
        }
        .b-close {
            position: absolute;
            right: 0;
            top: 0;
            padding:7px 10px;
            font-size:20px;
            background:#000; color:#fff;
            display: inline-block;
            cursor: pointer;
        }
        .Pstyle .content {height:auto; width:auto;}     
    </style>


    <div class="p_re evtContent NSK" id="evtContainer"> 
        {{--
        <div class="sky">
            <a href="#apply">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2001_sky.png" alt="스카이베너" >
            </a>
        </div> 
        --}}  

        <div class="evtCtnsBox wb_06" >            
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2001_06.jpg" alt="수강생 14배 증가"/>
        </div>

        {{--
        <div class="evtCtnsBox wb_07" >        
            <div>    
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2001_07.jpg" alt="환승 이벤트"/>
                <a href="javascript:void(0);" title="타 사이트 수강 인증하기" onclick="certOpen();" style="position: absolute; left: 29.73%; top: 75.72%; width: 39.91%; height: 6.41%; z-index: 2;"></a>
                <a href="javascript:go_popup3()"  title="유의사항 확인하기" style="position: absolute; left: 41.34%; top: 83.3%; width: 14.46%; height: 3.88%; z-index: 2;"></a>
            </div>
        </div>
        --}}

        <div class="evtCtnsBox wb_tops" >            
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2001_top.jpg" alt=""/>
        </div>

        <div class="evtCtnsBox wb_top" >            
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1915_top.gif" alt="단숨에 합격"/>                      
        </div> 
        
        <div class="evtCtnsBox tab01s_01">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2001_01_c.jpg" alt="조경직 이윤주"/>
            <span>
                <a href="https://pass.willbes.net/professor/show/cate/3028/prof-idx/51152?subject_idx=2117" target="_blank">
                    <img src="https://static.willbes.net/public/images/promotion/2020/11/1915_home.png" alt="교수홈">
                </a>
            </span>
            <ul class="top_tab">
                <li>
                    <a href="/promotion/index/cate/3028/code/1915">
                    <img src="https://static.willbes.net/public/images/promotion/2020/11/1915_tab01_off.png" alt="축산직 윤용범" class="off"  />
                    </a>
                </li>
                <li>
                    <a href="/promotion/index/cate/3028/code/2000">
                        <img src="https://static.willbes.net/public/images/promotion/2020/11/1915_tab02_off.png" alt="기계직 윤황현" class="on"/>
                    </a>
                </li>
                <li>
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/2020/11/1915_tab03.png" alt="조경직 이윤주" class="on"/>
                    </a>
                </li>
            </ul> 
        </div>

        <div class="evtCtnsBox tab01s_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1915_02_c.jpg" alt="" /> 
        </div>

        <div class="evtCtnsBox tab01s_03">
            <div class="link">
                <img src="https://static.willbes.net/public/images/promotion/2021/09/1915_03_c.jpg" alt=""/>
                <a href="javascript:go_popup1()" title="조경직 커리큘럼" style="position: absolute; left: 9.2%; top: 61.47%; width: 81.34%; height: 26.42%; z-index: 2;"></a>
            </div>                             		
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1915_03s_01.jpg" alt=""/>
        </div>

        <div class="evtCtnsBox tab01s_04">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1915_04_c.jpg" alt="" />
        </div>

        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday NG">        
            <div>
                <ul>
                    <li>                                
                        <span class="NGEB">{{ kw_date('n.j(%)', $arr_promotion_params['edate']) }} 마감!</span>
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
                        남았습니다
                    </li>
                </ul>
            </div>
        </div>  
        
        <div class="evtCtnsBox tab01s_05" id="apply">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2001_05.jpg" alt="신청하기" />
                <a href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/178351" title="수강신청" target="_blank" style="position: absolute; left: 67.86%; top: 62.4%; width: 16.88%; height: 10%; z-index: 2;"></a>
            </div>                      
        </div> 

        <div class="evtCtnsBox tab01s_06">
            <div class="title"><span>단과 수강신청</span></div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif             
        </div>
        
        <!--레이어팝업-->

        <div id="popup1" class="Pstyle">
            <span class="b-close NSK-Black">X</span>
            <div class="content">                  
                <img src="https://static.willbes.net/public/images/promotion/2021/09/1915_curri01.jpg" alt="" />      
            </div> 
        </div>

    </div>
    <!-- End Container -->
    
    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <script type="text/javascript">
        var tab1_url = "https://www.youtube.com/embed/jcr0AKg9yVk?rel=0";
		var tab2_url = "https://www.youtube.com/embed/iJEmIip6phg?rel=0";

		$(document).ready(function(){
		$(".tabcts").hide(); 
		$(".tabcts:first").show();
		$(".tabWrapEvt li a").click(function(){ 
			var activeTab = $(this).attr("href"); 
			var html_str = "";
			if(activeTab == "#tab1"){
				html_str = "<iframe src='"+tab1_url+"' allowfullscreen></iframe>";
			}else if(activeTab == "#tab2"){
				html_str = "<iframe src='"+tab2_url+"' allowfullscreen></iframe>";					
			}
			$(".tabWrapEvt li a").removeClass("active"); 
			$(this).addClass("active"); 
			$(".tabcts").hide(); 
			$(".tabcts").html(''); 
			$(activeTab).html(html_str);
			$(activeTab).fadeIn(); 
			return false; 
			});
        });        


        /*레이어팝업*/ 
        function go_popup1() {
            $('#popup1').bPopup();
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

	    /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop