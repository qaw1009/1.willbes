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
            font-size:14px;
            line-height:1.4;
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .sky {position:fixed;top:200px;right:10px; width:120px; z-index:1;}     
        .sky a {display:block; margin-bottom:10px}    

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2023/01/2872_top_bg.jpg) no-repeat center top;}
        .evtTop span {position: absolute; left:50%; z-index: 10;}
        .evtTop span.img01 {width:621px; margin-left:-310px; top:180px;}
        .evtTop span.img02 {width:888px; margin-left:-444px; top:320px;}

        .evt01 {background:#f4f4f4; padding:120px 0}

        .tableWrap {background:#fff; border:1px solid #dfdfdf; width:810px; margin:30px auto 0; padding:50px; }
        .tableWrap table {margin-top:50px; border-top:4px solid #454545}
        .tableWrap tr {border-bottom:1px solid #bababa}
        .tableWrap th,
        .tableWrap td {font-size:16px; padding:15px; border-right:1px solid #bababa}
        .tableWrap th:last-child,
        .tableWrap td:last-child {border:0}
        .tableWrap thead th {background:#ededed}
        .tableWrap tbody th {font-size:20px; font-weight:bold}
        .tableWrap td a {display:block; border:1px solid #c9c9c9; padding:15px 10px 15px 50px; border-radius:5px; width:120px; margin:5px auto; background:url(https://static.willbes.net/public/images/promotion/2023/01/2872_icon_01.png) no-repeat 10px center; text-align:left; box-shadow:5px 5px 5px rgba(0,0,0,.1); color:#454545}
        .tableWrap td a:hover {background:#c9c9c9 url(https://static.willbes.net/public/images/promotion/2023/01/2872_icon_01.png) no-repeat 10px center;}

        .evt02 {padding:120px 0}
        .tabbtn {display:flex; justify-content: space-between; width:720px; margin:50px auto; }
        .tabbtn a {display:inline-block; padding:13px; font-size:19px; font-weight:bold; border:1px solid #d9d9d9; background:#ededed; border-radius:15px}
        .tabbtn a.active {background:#7c0083; border:0; color:#fff}

        .evt03 {background:#f4f4f4; padding:120px 0}

        .evt03 .tableWrap td a {display:block; padding:10px; border-radius:5px; border:0; width:90%; background:#427bda; color:#fff; text-align:center}
        .evt03 .tableWrap td a.down {background:#427bda; color:#fff;}
        .evt03 .tableWrap td a:hover {background:#000; color:#fff;}

        .evt04 {padding:120px 0}
        .evt04 .tabbtn a.active {background:#427bda; border:0; color:#fff}

        .evt05 {background:#f4d733;}

        .youtube {width:720px; margin:0 auto; height:480px; background:url(https://static.willbes.net/public/images/promotion/2023/01/2872_comingsoons.jpg) no-repeat 10px center;}
        .youtube iframe {width:720px; height:480px} 

    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evtTop">
        <img src="https://static.willbes.net/public/images/promotion/2023/01/2872_top.jpg" alt=""/>
            <span class="img01" data-aos="fade-down"><img src="https://static.willbes.net/public/images/promotion/2023/01/2872_top_01.png" alt="2023 경찰승진시험 총평 기출해설특강"/></span>
            <span class="img02" data-aos="fade-up"><img src="https://static.willbes.net/public/images/promotion/2023/01/2872_top_02.png" alt="교수진"/></span>
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">            
            <div class="tableWrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/01/2872_01_01.jpg" alt=""/>
                <table cellspacing="0" cellpadding="0">
                    <col  />
                    <col  />
                    <col width="24%"/>
                    <col width="24%"/>
                    <thead>
                        <tr>
                            <th>계급</th>
                            <th>과목</th>
                            <th>시험지</th>
                            <th>가답안</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th rowspan="2">경정<br>경감</th>
                            <td>헌법<br>
                            경찰행정학<br>
                            형법<br>
                            실무종합
                        </td>
                            <td><a href="#none">1교시</a></td>
                            <td><a href="#none">1,2교시</a></td>
                        </tr>
                        <tr>
                            <td> 형사소송법(경정)<br>
                            경찰행정법(경감)
                        </td>
                            <td><a href="#none">2교시</a></td>
                            <td><a href="#none">1,2교시</a></td>
                        </tr>
                        <tr>
                            <th rowspan="2">경위<br>경사<br>경장</th>
                            <td> 헌법<br>
                            경찰행정학<br>
                            실무종합<br>
                            형법
                        </td>
                            <td>
                                <a href="#none">1교시</a>
                                <a href="#none">2교시</a>
                            </td>
                            <td><a href="#none">1,2교시</a></td>
                        </tr>
                        <tr>
                            <td>형사소송법</td>
                            <td><a href="#none">2교시</a></td>
                            <td><a href="#none">1,2교시</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">   
            <img src="https://static.willbes.net/public/images/promotion/2023/01/2872_02_01.jpg" alt=""/>         
            <div class="tabbtn">
               <a href="#tab01">경찰실무종합</a> 
               <a href="#tab02">형사소송법</a> 
               <a href="#tab03">형법</a> 
               <a href="#tab04">헌법</a> 
               <a href="#tab05">경찰행정학</a> 
               <a href="#tab06">주관식 경찰행정법</a> 
            </div>
            <div class="youtube" id="tab01">
                {{--<iframe src="https://www.youtube.com/embed/270p7AXQBi4?rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>--}}
            </div>
            <div class="youtube" id="tab02">
                {{--<iframe src="https://www.youtube.com/embed/270p7AXQBi4?rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>--}}
            </div> 
            <div class="youtube" id="tab03">
                {{--<iframe src="https://www.youtube.com/embed/270p7AXQBi4?rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>--}}
            </div> 
            <div class="youtube" id="tab04">
                {{--<iframe src="https://www.youtube.com/embed/270p7AXQBi4?rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>--}}
            </div> 
            <div class="youtube" id="tab05">
                {{--<iframe src="https://www.youtube.com/embed/270p7AXQBi4?rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>--}}
            </div> 
            <div class="youtube" id="tab06">
                {{--<iframe src="https://www.youtube.com/embed/270p7AXQBi4?rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>--}}
            </div> 
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">            
            <div class="tableWrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/01/2872_03_01.jpg" alt=""/>
                <table cellspacing="0" cellpadding="0">
                    <col  />
                    <col width="33%"/>
                    <col width="30%"/>
                    <thead>
                        <tr>
                            <th>과목</th>
                            <th>교수</th>
                            <th>해설지 다운로드</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>실무종합</td>
                            <td>김재규 교수</td>
                            <td><a href="@if($file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif">DOWNLOAD <img src="https://static.willbes.net/public/images/promotion/2023/01/2872_icon_02.png" alt=""/></a></td>
                        </tr>
                        <tr>
                            <td>형법</td>
                            <td>김원욱 교수</td>
                            <td><a href="@if($file_yn[1] == 'Y') {{ front_url($file_link[1]) }} @else {{ $file_link[1] }} @endif">DOWNLOAD <img src="https://static.willbes.net/public/images/promotion/2023/01/2872_icon_02.png" alt=""/></a></td>
                        </tr>
                        <tr>
                            <td>형사소송법</td>
                            <td>서영교 교수</td>
                            <td><a href="@if($file_yn[2] == 'Y') {{ front_url($file_link[2]) }} @else {{ $file_link[2] }} @endif">DOWNLOAD <img src="https://static.willbes.net/public/images/promotion/2023/01/2872_icon_02.png" alt=""/></a></td>
                        </tr>
                        <tr>
                            <td>헌법</td>
                            <td>선동주 교수</td>
                            <td><a href="@if($file_yn[3] == 'Y') {{ front_url($file_link[3]) }} @else {{ $file_link[3] }} @endif">DOWNLOAD <img src="https://static.willbes.net/public/images/promotion/2023/01/2872_icon_02.png" alt=""/></a></td>
                        </tr>
                        <tr>
                            <td>주관식 행정법</td>
                            <td>김재규 교수</td>
                            <td><a href="@if($file_yn[4] == 'Y') {{ front_url($file_link[4]) }} @else {{ $file_link[4] }} @endif">DOWNLOAD <img src="https://static.willbes.net/public/images/promotion/2023/01/2872_icon_02.png" alt=""/></a></td>
                        </tr>
                        <tr>
                            <td>주관식 형사소송법</td>
                            <td>김원욱 교수</td>
                            <td><a href="@if($file_yn[5] == 'Y') {{ front_url($file_link[5]) }} @else {{ $file_link[5] }} @endif">DOWNLOAD <img src="https://static.willbes.net/public/images/promotion/2023/01/2872_icon_02.png" alt=""/></a></td>
                        </tr>
                        <tr>
                            <td>행정학</td>
                            <td>서영교 교수</td>
                            <td><a href="@if($file_yn[6] == 'Y') {{ front_url($file_link[6]) }} @else {{ $file_link[6] }} @endif">DOWNLOAD <img src="https://static.willbes.net/public/images/promotion/2023/01/2872_icon_02.png" alt=""/></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="evtCtnsBox evt04" data-aos="fade-up">   
            <img src="https://static.willbes.net/public/images/promotion/2023/01/2872_04_01.jpg" alt=""/>         
            <div class="tabbtn">
               <a href="#tab07">경찰실무종합</a> 
               <a href="#tab08">형사소송법</a> 
               <a href="#tab09">형법</a> 
               <a href="#tab10">헌법</a> 
               <a href="#tab11">경찰행정학</a> 
               <a href="#tab12">주관식 경찰행정법</a> 
            </div>
            <div class="youtube" id="tab07">
                {{--<iframe src="https://www.youtube.com/embed/270p7AXQBi4?rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>--}}
            </div>
            <div class="youtube" id="tab08">
                {{--<iframe src="https://www.youtube.com/embed/270p7AXQBi4?rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>--}}
            </div> 
            <div class="youtube" id="tab09">
                {{--<iframe src="https://www.youtube.com/embed/270p7AXQBi4?rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>--}}
            </div> 
            <div class="youtube" id="tab10">
                {{--<iframe src="https://www.youtube.com/embed/270p7AXQBi4?rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>--}}
            </div> 
            <div class="youtube" id="tab11">
                {{--<iframe src="https://www.youtube.com/embed/270p7AXQBi4?rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>--}}
            </div> 
            <div class="youtube" id="tab12">
                {{--<iframe src="https://www.youtube.com/embed/270p7AXQBi4?rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>--}}
            </div> 
        </div>

        <div class="evtCtnsBox evt05" data-aos="fade-up"> 
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/01/2872_05.jpg" alt=""/>   
                <a href="#none" onclick="javascript:alert('Coming soon');" style="position: absolute; left: 19.2%; top: 38.24%; width: 61.61%; height: 16.26%; z-index: 2;"></a>       
            </div>
        </div>

    </div>
    <!-- End Container -->

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.tabbtn').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');
            
                $content = $($active[0].hash);
            
                $links.not($active).each(function () {
                $(this.hash).hide()});
            
                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                $active.removeClass('active');
                $content.hide();
            
                $active = $(this);
                $content = $(this.hash);
            
                $active.addClass('active');
                $content.show();
            
                e.preventDefault()})})}
        );

        $(document).ready( function() {
            AOS.init();
        });
    </script>
@stop