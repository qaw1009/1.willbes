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

        /************************************************************/ 

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/04/2162_top_bg.jpg) no-repeat center top;}

        .evt01 {background:#467ce0;}
        .evt02 {background:#373737; padding-bottom:150px}
        .evt02 > a {display:block; width:400px; margin:0 auto; color:#Fff; background:#007de4; text-align:center; padding:30px 0; font-size:30px}
        .evt02 > a:hover {background:#000;}
        .evt03 {background:#f0f0f0;}

        .evtTop > div,
        .evt01 > div,
        .evt03 > div,
        .evt04 > div {width:1120px; margin:0 auto; position:relative}


        /************************************************************/      
    </style> 
	<div class="evtContent NSK">
		<div class="evtCtnsBox evtTop">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2162_top.jpg" alt="김동진 법원팀 이론과정 패키지" />
                <a href="https://pass.willbes.net/package/index/cate/3035/pack/648001" target="_blank" title="이론과정 패키지" style="position: absolute; left: 32.32%; top: 78.97%; width: 35.45%; height: 7.93%; z-index: 2;"></a>
            </div>
		</div>

        <div class="evtCtnsBox evt01">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2162_01.jpg" alt="합격의 기준" />
                <a href="https://pass.willbes.net/lecture/show/cate/3035/pattern/only/prod-code/180738" target="_blank" title="민법 김동진" style="position: absolute; left: 64.11%; top: 20.54%; width: 12.05%; height: 2.39%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/lecture/show/cate/3035/pattern/only/prod-code/180739" target="_blank" title="민사소송법 이덕훈" style="position: absolute; left: 63.93%; top: 29.74%; width: 12.05%; height: 2.39%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/lecture/show/cate/3035/pattern/only/prod-code/180740" target="_blank" title="형법 문형석" style="position: absolute; left: 64.02%; top: 39.07%; width: 12.05%; height: 2.39%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/lecture/show/cate/3035/pattern/only/prod-code/180741" target="_blank" title="형사소송법 유안석" style="position: absolute; left: 64.02%; top: 48.39%; width: 12.05%; height: 2.39%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/lecture/show/cate/3035/pattern/only/prod-code/180742" target="_blank" title="헌법 이국령" style="position: absolute; left: 64.02%; top: 57.59%; width: 12.05%; height: 2.39%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/lecture/show/cate/3035/pattern/only/prod-code/180743" target="_blank" title="국어 박재현" style="position: absolute; left: 63.93%; top: 66.92%; width: 12.05%; height: 2.39%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/lecture/show/cate/3035/pattern/only/prod-code/180744" target="_blank" title="영어 박초롱" style="position: absolute; left: 64.2%; top: 76.18%; width: 12.05%; height: 2.39%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/lecture/show/cate/3035/pattern/only/prod-code/180745" target="_blank" title="한국사 임진석" style="position: absolute; left: 64.02%; top: 85.44%; width: 12.05%; height: 2.39%; z-index: 2;"></a>
            </div>
		</div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2162_02.jpg" alt="온라인 패스" />
            <a href="#none" class="NSK-Black">수강신청 바로가기 ></a>
		</div>

        <div class="evtCtnsBox evt03">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2162_03.jpg" alt="연간 커리큘럼" />
                <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6MeyInO2ZmA%3D%3D" target="_blank" title="1순환" style="position: absolute; left: 20.8%; top: 34.24%; width: 9.91%; height: 3.77%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6MuyInO2ZmA%3D%3D" title="2순환" style="position: absolute; left: 32.95%; top: 34.24%; width: 9.91%; height: 3.77%; z-index: 2;"></a>                
                <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6M%2ByInO2ZmA%3D%3D" title="3순환" style="position: absolute; left: 44.64%; top: 34.24%; width: 9.91%; height: 3.77%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6NOyInO2ZmA%3D%3D" title="4순환" style="position: absolute; left: 56.79%; top: 34.24%; width: 9.91%; height: 3.77%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6NeyInO2ZmA%3D%3D" title="5순환" style="position: absolute; left: 69.29%; top: 34.24%; width: 9.91%; height: 3.77%; z-index: 2;"></a>
            </div>
		</div>

        <div class="evtCtnsBox evt04">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2162_04.jpg" alt="절대 만족 후기"/>
                <a href="http://cafe.daum.net/LAW-KDJTEAM/I7Bo" target="_blank" title="더보기" style="position: absolute; left: 34.38%; top: 79.16%; width: 30.8%; height: 5.42%; z-index: 2;"></a>
            </div>
		</div>
	</div>
    <!-- End Container -->

@stop