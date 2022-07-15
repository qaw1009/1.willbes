@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
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

    .evt_top {background:url("https://static.willbes.net/public/images/promotion/2022/06/2687_top_bg.jpg") no-repeat center top;}

    .evt01 {padding:100px 0;}

    /*전체 탭*/
    .evt_tab {padding-bottom:100px;}
    .tabs {width:1120px; margin:0 auto;padding-bottom:50px;}
    .tabs li {display:inline; float:left; width:25%;} 
    .tabs li a {display:block; color:#fff; background:#000; height:50px; line-height:50px; text-align:center; margin-right:1px; font-size:20px;font-weight:bold;}
    .tabs li a:hover,
    .tabs li a.active {background:#2260ff;}
    .tabs li:last-child a {margin:0}
    .tabs:after {content:""; display:block; clear:both}

     /*2번째 탭*/
    .step {font-size:17px;line-height:2;padding-bottom:50px;}
    .stage {font-size:17px;line-height:1.5;text-align:left;width:720px;margin:0 auto;padding-bottom:5px;}
    .phase {display:inline-block;background:#000;color:#fff;border-radius:10px;width:75px;text-align:center;}
    .bold {font-weight:bold;}
    .gray {background:#F2F2F2}
    .blue {background:#DAE3F3}
    .avg {background:#FBE5D6}
    .current {border:3px solid red;}
    .careful {color:red;text-align:right;width:720px;margin:0 auto;line-height:1.25;}
    .chart a {display:inline-block;margin:10px;}

    .table_type {width:720px; margin:1em auto; border-top:#464646 1px solid; border-bottom:#464646 1px solid; border-left:#cdcdcd 1px solid}
    .table_type caption {display:none}	
    .table_type th,
    .table_type td {letter-spacing:normal; text-align:center; padding:10px 8px}
    .table_type th {color:#464646; background:#f3f3f3; font-weight:400; border-bottom:#cdcdcd 1px solid; border-right:#cdcdcd 1px solid}
    .table_type th.th2 {background:#fffcd1}
    .table_type td {border-bottom:#cdcdcd 1px solid; border-right:#cdcdcd 1px solid; vertical-align:middle; color:#464646; text-align:left;}
    .table_type td input {vertical-align:middle}
    .table_type td span.blueB {font-weight:bold; color:#33F}
    .table_type td span.redB {font-weight:bold; color:#C00}
    .table_type td label {margin-right:10px}
    .table_type .lineNo {border-right:none}
    .sel_info li {display:inline-block;margin-right:10px;margin-bottom:5px;vertical-align:bottom;}

    .graph_area {padding-top:10px;} 
    .graph {display:flex;left:50%;top:50%;}
    .graph li {padding:0 2px;text-align:center;}
    .graph li div {position:relative;margin:0 auto;width:40px;height:250px;background:#8f52ff;border-radius:4px 4px 0 0 ;}
    .graph li div span {position:absolute;left:0;bottom:0;right:0;background:#ccc;border-radius:4px 4px 0 0 ;}
    .graph li div i {display:none;}
    .graph li p {font-size:14px;}   

    /*.eventPopS3 {padding:20px;}*/
    .eventPopS3 {padding:20px 20px 0px 20px;}
    .eventPopS3 p {font-weight:bold; margin-bottom:10px}
    .eventPopS3 ul {border:1px solid #adadad; padding:10px 4px;text-align:left;line-height:1.5;}
    .eventPopS3 ul {width:720px;margin:0 auto;}
    .eventPopS3 li {padding:0; margin:0;margin-left:15px; margin-bottom:5px} 
    .eventPopS3 div {margin-top:10px;}
    .eventPopS3 input {vertical-align:middle}
    
    .markSbtn1 {width:100%; margin:1.5em auto; text-align:center;}
    .markSbtn1 a {display:inline-block; padding:10px;background:#2260ff; color:#fff;margin:0 5px}
    .markSbtn1 a.btn2 {background:#bf1212; border:1px solid #bf1212}
    .markSbtn1 a.btn3 {background:#fff; border:1px solid #333; color:#333}
    .markSbtn2 {display:inline;padding:10px;background:#2260ff; color:#fff;margin:0 5px}
    .graph_area {font-size:17px;line-height:1.5;text-align:left;width:720px;margin:0 auto;padding-bottom:5px;text-align:center;}
    .graph_area::after {content:'';display:block;clear:both;}
    .markSbtn3 {display:inline;float:left;width:50%;}
    .recheck_area {margin:50px;}

    .grading_result {width:720px;margin:0 auto;}

    .marking {margin:10px; padding:10px; border:1px dashed #e4e4e4}
    .marking h5 {font-size:17px; margin-bottom:10px;text-align:left;font-weight:bold;}
    .marking li {display:inline; float:left; width:16.666%;}
    .marking li div {margin-right:4px;  padding:3px; background:#666; text-align:center}
    .marking li div label {color:#fff; padding-bottom:5px; display: block}
    .marking li div input {width:100%; padding:5px 0; margin:0 auto; text-align:center; letter-spacing:4px;background:#fff;}
    .marking li div span {position:absolute; right:20px; top:30px; z-index: 10;}
    .marking ul:after {content:""; display:block; clear:both}

    .markTab {width:720px;margin:0 auto;margin-top:10px; /*border-bottom:1px solid #333*/}
    .markTab li {display:inline; float:left; width:33.3333%}
    .markTab a {display:block; padding:1em 0; background:#999; color:#fff; margin-right:1px; font-weight:bold; letter-spacing:2px; text-align:center}
    .markTab a.active {background:#333}
    .markTab li:last-child a {margin-right:0}
    .markTab:after {content:""; display:block; clear:both}

    .markTab2 {width:720px;margin:0 auto;margin-top:10px; /*border-bottom:1px solid #333*/}
    .markTab2 li {display:inline; float:left; width:25%}
    .markTab2 a {display:block; padding:1em 0; background:#999; color:#fff; margin-right:1px; font-weight:bold; letter-spacing:2px; text-align:center}
    .markTab2 a.active {background:#333}
    .markTab2 li:last-child a {margin-right:0}
    .markTab2:after {content:""; display:block; clear:both}

    .total td:nth-child(odd) {background:#F2F2F2;}
    .first {background:#F2F2F2;font-weight:bold;}
    .wrong {color:red !important;}
    .pass {color:#0070C0 !important;}
                
    </style>

    <!-- Container -->

    <div class="evtContent NSK" id="evtContainer">
        <input type="hidden" id="_exam_type" name="_exam_type" value="N">
        <input type="hidden" id="_pr_id" name="_pr_id">
        <div class="evtCtnsBox evt_top" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2687_top.jpg" alt="psat 합격을 예측하다">
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2687_01.jpg" alt="신뢰할수 있는 합격 예상 커트라인">          
        </div>

        <div class="evtCtnsBox evt_tab" data-aos="fade-up">
            <ul class="tabs">
				<li><a href="#tab01">메인</a></li>
				<li><a href="#tab02">기본정보 및 답안입력</a></li>
				<li><a href="#tab03">성적확인 및 분석</a></li>
				<li><a href="#tab04">합격예측</a></li>
			</ul>
            <div class="main_content" id="tab01">
                추후 디자인
            </div>

            <div class="main_content" id="tab02"></div>
            <div class="main_content" id="tab03"></div>
            <div class="main_content" id="tab04"></div>
        </div>

    </div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <!-- googlechart -->
    {{--<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>--}}

    <script src="/public/vendor/Nwagon/Nwagon.js"></script>
    <link rel="stylesheet" href="/public/vendor/Nwagon/Nwagon.css">

    <script type="text/javascript">
        $(document).ready(function(){
            AOS.init();
            /*상단 tab*/
            $('.tabs').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');
                $content = $($active[0].hash);
                $links.not($active).each(function () {
                $(this.hash).hide()});
            
                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    if ($(this).attr('href') == '#tab03' || $(this).attr('href') == '#tab04') {
                        if ($("#_pr_id").val() == '') {
                            alert('기본정보 및 답안입력 후 확인 가능합니다.');
                            return false;
                        }

                        if ($("#_exam_type").val() != 'Y') {
                            alert('답안채점 후 확인 가능합니다.');
                            return false;
                        }
                    }

                    $links.removeClass('active');
                    $('.main_content').hide();
                    $active = $(this);
                    $content = $(this.hash);
                    $active.addClass('active');
                    $content.show();
                    e.preventDefault();
                });
            });
            ajaxHtml2('{{$arr_promotion_params['PredictIdx']}}', '{{$arr_promotion_params['SsIdx']}}');
        });

        function ajaxHtml2(predict_idx, ss_idx) {
            var data = {
                'predict_idx' : predict_idx,
                'ss_idx' : ss_idx
            };
            sendAjax('{{front_url('/fullService/ajaxHtml2')}}', data, function(d) {
                $("#tab02").html(d);
            }, showAlertError, false, 'GET', 'html', false);
        }
    </script>
@stop