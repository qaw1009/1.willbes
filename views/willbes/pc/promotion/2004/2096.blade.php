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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

        /************************************************************/ 

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/02/2096_top_bg.jpg) no-repeat center top;}

        .evt02 {background:#f0f0f0;}

        .evt03 {background:#f0f0f0;}

        .evt05 {background:#373737;}

        .evt06 {background:#f0f0f0;padding-bottom:50px;}
    
        /************************************************************/      
    </style> 
	<div class="evtContent NGR">
		<div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2096_top.jpg" alt="연간 종합반" usemap="#Map2096_apply" border="0" />
            <map name="Map2096_apply" id="Map2096_apply">
                <area shape="rect" coords="364,1030,760,1122" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3059" target="_blank"/>
            </map>
		</div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2096_01.jpg" alt="합격의 기준" />
		</div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2096_02.jpg" alt="연간 커리큘럼" usemap="#Map2096a" border="0" />
            <map name="Map2096a" id="Map2096a">
                <area shape="rect" coords="238,657,343,722" href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6MeyInO2ZmA%3D%3D" target="_blank" />
                <area shape="rect" coords="373,657,476,722" href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6MuyInO2ZmA%3D%3D" target="_blank" />
                <area shape="rect" coords="506,657,611,722" href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6M%2ByInO2ZmA%3D%3D" target="_blank" />
                <area shape="rect" coords="643,657,746,722" href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6NOyInO2ZmA%3D%3D" target="_blank" />
                <area shape="rect" coords="779,659,886,722" href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6NeyInO2ZmA%3D%3D" target="_blank" />
            </map>
		</div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2096_03.jpg" alt="수강생 중심 운영" />
		</div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2096_04.jpg" alt="절대 만족 후기" usemap="#Map2096b" border="0" />
            <map name="Map2096b" id="Map2096b">
                <area shape="rect" coords="391,1056,727,1119" href="http://cafe.daum.net/LAW-KDJTEAM/I7Bo" target="_blank" />
            </map>
		</div>

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2096_05.jpg" alt="법원팀과 함께" />
		</div>    

        <div class="evtCtnsBox evt06">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2096_06.jpg" alt="수강신청하기" usemap="#Map2096c" border="0" />
            <map name="Map2096c" id="Map2096c">
                <area shape="rect" coords="437,878,683,952" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3059" target="_blank" />
            </map>
		</div>       

	</div>
    <!-- End Container -->

    <script type="text/javascript">         
       
    </script>
@stop