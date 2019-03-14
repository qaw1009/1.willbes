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
            position:relative;            
            width:100% !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }	
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

        /************************************************************/

        .wb_top {background:#fff url(http://file3.willbes.net/new_cop/2019/03/1129_01_bg.jpg) no-repeat center top}
        .wb_top div { position:absolute}
	    .wb_cts01 {background:#f7f7f7}
	    .wb_cts02 {background:#dfdfe1;}	

        /* 탭 */
        .evttab {border-bottom:10px solid #0c5dc0}
        .evttab ul {width:1120px; margin:0 auto}	
        .evttab li {display:inline; float:left; margin-right:5px}	
        .evttab li a {
            display:block;
            width:370px;
            height:263px;
            font-size:0;
            text-indent:-9999;
        }
        .evttab li:first-child a {
            background:url(http://file3.willbes.net/new_cop/2019/03/1129_02_tab1.jpg) no-repeat left top;
        }        
        .evttab li:nth-child(2) a {
            background:url(http://file3.willbes.net/new_cop/2019/03/1129_02_tab2.jpg) no-repeat left top;
        }
        .evttab li:last-child a {
            background:url(http://file3.willbes.net/new_cop/2019/03/1129_02_tab3.jpg) no-repeat left top;
        }
        .evttab li:last-child {            
            margin:0
        }
        .evttab li a:hover,
        .evttab li a.active {
            background-position:right top;
        } 
        .evttab ul:after {
            content:'';
            display:block;
            clear:both;
        }     
        
        .wb_cts03 {background:#FFF;}
        .menuWarp {position:relative; width:1210px; height:490px; margin:0 auto; }
        .PeMenu {position:absolute; width:1210px; height:328px; top:0px; left:0px;}
        .PeMenu li { display:inline; float:left}
        .PeMenu li a img.off {display:block} 	
        .PeMenu li a img.on {display:none} 	

    </style>


<div class="evtContent" id="evtContainer">     

    <div class="evtCtnsBox wb_top" >
        <img src="http://file3.willbes.net/new_cop/2019/03/1129_01.jpg" alt=" 윌비스 신광은경찰팀 신의 법칙을 믿어라! " />
        <div>
            <a href="#none">신의법칙 자세히보기 &gt;</a>
        </div>
    </div>     

    <div class="evtCtnsBox wb_cts01">
        <img src="http://file3.willbes.net/new_cop/2019/03/1129_02.jpg" alt="여러분을 합격의 지름길로 안내할 3가지의 신의법칙 " />
        <div class="evttab">
            <ul>
                <li><a href="#tab01" class="active">기본과정</a></li>
                <li><a href="#tab02">심화과정</a></li>
                <li><a href="#tab03">3개월 필합 풀패키지</a></li>
            </ul>
        </div>
        <div id="tab01" class="tabCts">
            <img src="http://file3.willbes.net/new_cop/2019/03/1129_02_t01.jpg" alt="기본과정">
        </div>
        <div id="tab02" class="tabCts">
            <img src="http://file3.willbes.net/new_cop/2019/03/1129_02_t02.jpg" alt="심화과정">
        </div>
        <div id="tab03" class="tabCts">
            <img src="http://file3.willbes.net/new_cop/2019/03/1129_02_t03.jpg" alt="3개월 필합 풀패키지">
        </div>
    </div>

</div>
<!-- End Container -->


<script type="text/javascript">
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
</script>

@stop