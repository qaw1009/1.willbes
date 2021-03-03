@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
    <!-- Container -->
    <style type="text/css">
        .captionWrap {padding:20px}
        .viewmenu {width:1210px; margin:0 auto}
        .viewmenu li {display:inline; float:left; margin-bottom:10px; margin-right:10px}
        .viewmenu li:last-child {margin-right:0}
        .viewmenu li a {display:block; padding:10px 20px; text-align:center; background:#fff; color:#06F; border:1px solid #06F; border-radius:50px; font-size:16px; font-weight:600}
        .viewmenu li a:hover,
        .viewmenu li a.active {background:#06F; color:#fff}
        .viewmenu:after {content:""; display:block; clear:both}

        .viewArea {position:fixed; bottom:0; width:100%; height:130px;}
        .viewArea .viewbox {position:relative; width:1210px; margin:0 auto; height:130px;}
        .bgimg {position:absolute; top:0; left:0; width:1210px; height:130px; z-index:-1 !important}
        .liveTab01 {position:absolute; top:0; left:0; width:1210px; height:130px; z-index:9999 !important}
        .liveTab01 li {height:130px; position:relative}
        .liveTab01 span {position:absolute}
        .liveTab01 .txt01 {top:30px; left:292px; font-size:30px; font-weight:bold; color:#fdf9c1; width:190px; text-align:center; line-height:1.3}
        .liveTab01 .txt02 {top:70px; left:292px; font-size:30px; font-weight:bold; color:#fdf9c1; width:190px; text-align:center; line-height:1.3}
        .liveTab01 .txt03 {top:62px; left:824px; font-size:50px; font-weight:bold; color:#8e182e; letter-spacing:-1px; font-family:"Times New Roman", Times, serif}
        .liveTab01 .txt04 {top:33px; left:1040px; width:140px; height:33px; line-height:33px; font-size:28px; text-align:right; font-family:"Times New Roman", Times, serif; font-weight:bold;}
        .liveTab01 .txt05 {top:74px; left:1040px; width:140px; height:33px; line-height:33px; font-size:28px; text-align:right; font-family:"Times New Roman", Times, serif; font-weight:bold;}

        .liveTab02 {position:absolute; top:0; left:0; width:1210px; height:130px; z-index:10}
        .liveTab02 li {padding-left:260px; height:130px; line-height:130px; color:#fff; font-size:40px; letter-spacing:-3px; text-align:left; width:890px; overflow:hidden; white-space:nowrap; text-overflow:ellipsis;}
        .liveTab02 li span {margin-right:10px; vertical-align:top}
        .liveTab02 li span.st01 {font-weight:600; color:#fdf9c1; /* border-bottom:2px solid #fdf9c1 */}
        .liveTab02 li span.st02 {font-family:"Times New Roman", Times, serif}

        .liveTab03 {position:absolute; top:0; left:0; width:1210px; height:130px; z-index:10}
        .liveTab03 li {padding-left:260px; height:130px; color:#fff; font-size:40px; letter-spacing:-3px; text-align:left; width:890px; overflow:hidden; white-space:nowrap; text-overflow:ellipsis;}
        .liveTab03 li span {margin-right:10px; vertical-align:top}
        .liveTab03 li span.st01 {font-weight:600; color:#fdf9c1; /* border-bottom:2px solid #fdf9c1 */}
        .liveTab03 li span.st02 {font-family:"Times New Roman", Times, serif}
        .liveTab03 li div {font-size:22px; margin-bottom:12px; margin-top:26px}
        .liveTab03 li div span.st01 {border:0; letter-spacing:0;}

        .counter {position:absolute; top:0; left:0; text-align:center; width:100%; padding-left:200px; z-index:10;}
        .counter div {color:#fff; font-size:40px; padding-top:45px}
        .counter span {color:#fff200; vertical-align: text-bottom}
        /*.counter p {font-size:11px; color:#fff; margin-top:10px; line-height: 1.4}*/

        /*크롬*/
        @@media screen and (-webkit-min-device-pixel-ratio:0) {
            .viewArea .viewbox {position:relative; width:1210px; margin:0 auto; height:130px;}
            .bgimg {position:absolute; top:0; left:0; width:1210px; height:130px; z-index:-1 !important}
            .liveTab01 {position:absolute; top:0; left:0; width:1210px; height:130px; z-index:9999 !important;}
        }
    </style>

    <div class="NSK captionWrap">
        <ul class="viewmenu tabSt1">
            @foreach($arr_input['menu'] as $row)
                <li><a href="#tab{{ $row['PstIdx'] }}">{{ $row['Title'] }}</a></li>
            @endforeach
        </ul>

        <div class="viewArea">
            @foreach($arr_input['menu'] as $row)
                @php echo "<div class='viewbox' id='tab{$row['PstIdx']}'>";
                    if(empty($arr_input['data'][$row['PstIdx']]) === false) {
                        switch ($row['TalkShowContentsType']) {
                            case '1':
                                echo '<ul class="liveTab01 slide01">';
                                    foreach($arr_input['data'][$row['PstIdx']] as $arr_content) {
                                        $loop = 1;
                                        echo '<li>';
                                            foreach($arr_content as $key => $val) {
                                                echo "<span class='txt0{$loop}'>{$val}</span>";
                                                $loop++;
                                            }
                                        echo '</li>';
                                    }
                                echo '</ul>';
                                break;
                            case '2':
                                echo '<ul class="liveTab03 slide01">';
                                    foreach($arr_input['data'][$row['PstIdx']] as $arr_content) {
                                        echo "<li>";
                                        echo '<div><span class="st01">'.(empty($arr_content[0]) === true ? '' : $arr_content[0]).'</span>';
                                        echo '<span class="st01">'.(empty($arr_content[1]) === true ? '' : $arr_content[1]).'</span></div>';
                                        echo '<span>'.(empty($arr_content[2]) === true ? '' : $arr_content[2]).'</span>';
                                        echo '<span class="st01">'.(empty($arr_content[3]) === true ? '' : $arr_content[3]).'</span>';
                                        echo '<span>'.(empty($arr_content[4]) === true ? '' : $arr_content[4]).'</span>';
                                        echo '<span class="st01">'.(empty($arr_content[5]) === true ? '' : $arr_content[5]).'</span>';
                                        echo '<span>'.(empty($arr_content[6]) === true ? '' : $arr_content[6]).'</span>';
                                        echo '<span class="st01">'.(empty($arr_content[7]) === true ? '' : $arr_content[7]).'</span>';
                                        echo "</li>";
                                    }
                                echo '</ul>';
                                break;
                            case "3":
                                echo '<ul class="liveTab02 slide01">';
                                    foreach($arr_input['data'][$row['PstIdx']] as $arr_content) {
                                        echo "<li>";
                                        echo "<span class='st01'>{$arr_content[0]}</span>";
                                        echo "</li>";
                                    }
                                echo '</ul>';
                                break;
                            case "4":
                                echo '<ul class="liveTab03 slide01">';
                                    foreach($arr_input['data'][$row['PstIdx']] as $arr_content) {
                                        echo "<li>";
                                        echo "<div><span class='st01'>{$arr_content[0]}</span><span class='st01'>{$arr_content[1]}</span></div>";
                                        echo "<span>{$arr_content[2]}</span><span class='st01'>{$arr_content[3]}</span>";
                                        echo "<span>{$arr_content[4]}</span><span class='st01'>{$arr_content[5]}</span>";
                                        echo "<span>{$arr_content[6]}</span><span class='st01'>{$arr_content[7]}</span>";
                                        echo "<span>{$arr_content[8]}</span><span class='st01'>{$arr_content[9]}</span>";
                                        echo "<span>{$arr_content[10]}</span><span class='st01'>{$arr_content[11]}</span>";
                                        echo "</li>";
                                    }
                                echo '</ul>';
                                break;
                            case '5':
                                echo '<ul class="liveTab03 slide01">';
                                    foreach($arr_input['data'][$row['PstIdx']] as $arr_content) {
                                        echo "<li>";
                                        echo "<div><span class='st01'>{$arr_content[0]}</span><span class='st01'>{$arr_content[1]}</span></div>";
                                        echo "<span>{$arr_content[2]}</span>";
                                        echo "<span class='st01'>{$arr_content[3]}</span>";
                                        echo "<span>{$arr_content[4]}</span>";
                                        echo "</li>";
                                    }
                                echo '</ul>';
                                break;
                            default;
                            break;
                        }
                    }
                    echo "<div class='bgimg'><img src='{$row['BgImgPath']}' title='{$row['Title']}'></div></div>";
                @endphp
            @endforeach
        </div>
    </div>

    <script src="/public/js/willbes/jquery.counterup.min.js"></script>
    <script src="/public/js/willbes/waypoints.min.js"></script>
    <script src="/public/vendor/jquery/bxslider/jquery.bxslider.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.slide01').bxSlider({
                speed : 200,
                auto : true,
                randomStart : true,
                //pager : false,
                mode : 'vertical', //'horizontal', 'vertical', 'fade'
                controls : false
            });

            $('ul.tabSt1').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');
                $content = $($active[0].hash);
                $links.not($active).each(function(){
                    $(this.hash).hide()
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

            $('.counter span').counterUp({
                delay : 11, // the delay time in ms
                time : 1000 // the speed time in ms
            });
        });
    </script>
@stop