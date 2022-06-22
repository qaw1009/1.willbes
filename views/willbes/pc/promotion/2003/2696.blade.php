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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/ 


        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2022/06/2696_top_bg.jpg) no-repeat center top;}

        .evt03 {background:#f0f0f0}

        /* 이용안내 */
        .evtInfo {padding:100px 0; background:#555; color:#fff; line-height:1.5}
        .guide_box{width:1120px; margin:0 auto; padding:0 50px; text-align:left; word-break:keep-all}
        .guide_box h2 {font-size:30px; margin-bottom:30px;}
        .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; padding:5px 10px; font-weight:bold; margin-right:10px; font-size:16px;}        
        .guide_box dd{margin-bottom:50px;}
        .guide_box dd li{margin-bottom:5px; list-style:decimal; margin-left:20px;font-size:14px;}
        .guide_box dd li.none {list-style:none; margin-left:0}
        .guide_box dd:last-child {margin:0}
        /************************************************************/      
    </style> 

    <div class="evtContent NSK" id="evtContainer">
		<div class="evtCtnsBox evtTop" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2696_top.jpg" alt="김동진 법원팀" />
		</div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2696_01.jpg" alt="김동진 법원팀" />
		</div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <div class="wrap">            
                <img src="https://static.willbes.net/public/images/promotion/2022/06/2696_02.jpg" alt="연간 커리큘럼">
                <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU67JiI67mE7Iic7ZmY&course_idx=" title="예비순환" target="_blank" style="position: absolute; left: 11.88%; top: 81.99%; width: 11.61%; height: 7.66%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6MeyInO2ZmA%3D%3D" title="1순환" target="_blank" style="position: absolute; left: 24.91%; top: 81.99%; width: 11.61%; height: 7.66%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6MuyInO2ZmA%3D%3D" title="2순환" target="_blank" style="position: absolute; left: 38.04%; top: 81.99%; width: 11.61%; height: 7.66%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6M%2ByInO2ZmA%3D%3D" title="3순환" target="_blank" style="position: absolute; left: 50.8%; top: 81.99%; width: 11.61%; height: 7.66%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6NOyInO2ZmA%3D%3D" title="4순환" target="_blank" style="position: absolute; left: 63.93%; top: 81.99%; width: 11.61%; height: 7.66%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6NeyInO2ZmA%3D%3D" title="5순환" target="_blank" style="position: absolute; left: 77.23%; top: 81.99%; width: 11.61%; height: 7.66%; z-index: 2;"></a>
            </div>
		</div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/06/2696_03.jpg" alt="절대 만족 후기"/>
                <a href="https://cafe.daum.net/LAW-KDJTEAM/I7Bo" target="_blank" title="더 많은 합격수기 보기" style="position: absolute; left: 34.46%; top: 81%; width: 30.89%; height: 5.55%; z-index: 2;"></a>
            </div>
		</div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/06/2696_04.jpg" alt="온라인 패스" />
                <a href="https://pass.willbes.net/periodPackage/show/cate/3035/pack/648001/prod-code/198683" target="_blank" style="position: absolute; left: 10.8%; top: 78.43%; width: 31.43%; height: 7.04%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/periodPackage/show/cate/3035/pack/648001/prod-code/198682" target="_blank" style="position: absolute; left: 58.93%; top: 78.43%; width: 31.43%; height: 7.04%;z-index: 2;"></a>
            </div>
		</div>

	</div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $(document).ready(function(){AOS.init();});
    </script> 

    <script type="text/javascript">         
        function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ site_url('/periodPackage/show/cate/3035/pack/648001/prod-code/') }}' + code;
            location.href = url;
        };
    </script>
@stop