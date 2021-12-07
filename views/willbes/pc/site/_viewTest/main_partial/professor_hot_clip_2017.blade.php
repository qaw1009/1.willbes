<div class="sec-prof-title"><img src="https://static.willbes.net/public/images/promotion/main/2018/title01.jpg" title="교수진"></div>
<div class="widthAuto p_re NSK">
    <ul class="ssam-prof-List">
        @forelse($data['prof_hot_clip_test'] as $subject_name => $arr_row)
            <li class="prof-dropdown">
                <a href="javascript:void(0);">{{$subject_name}}</a>
                <div class="prof-list-drop-Box">
                    <ul>
                        @foreach($arr_row as $key => $row)
                            <li><a href="javascript:void(0);" class="btn-hotclip-prof" data-prof-id="{{$row['PhcIdx']}}">{{$row['SubjectName']}} <strong>{{$row['wProfName']}}</strong></a></li>
                        @endforeach
                    </ul>
                </div>
            </li>
        @empty
        @endforelse
    </ul>

    <div class="prof-Tab-Wrap" id="profRollingSlider">
        @forelse($data['prof_hot_clip_test'] as $subject_name => $arr_row)
            @foreach($arr_row as $key => $row)
                <div class="prof-Tab-Cts" id="tab{{$row['PhcIdx']}}">
                    <div class="btnBox">
                        <div class="prof-top-btn">
                            @if($row['ProfBtnIsUse'] == 'Y')
                                <a href="{{front_url("/professor/show/prof-idx/{$row['ProfIdx']}?cate_code={$row['CateCode']}&subject_idx={$row['SubjectIdx']}")}}">교수님 홈</a>
                            @endif
                            @if($row['CurriculumBtnIsUse'] == 'Y')
                                <a href="javascript:void(0);" onclick="openWin('sec-prof-layer'); fnOpenProfCurriculum('{{$row['ProfIdx']}}');">커리큘럼</a>
                            @endif
                            @if($row['StudyCommentBtnIsUse'] == 'Y')
                                <a href="javascript:void(0);" onclick="fnStudyComentLayer('{{$row['SubjectIdx']}}', '{{$row['ProfIdx']}}', '', '{{$row['CateCode']}}', 'ProfReply');">수강후기</a>
                            @endif
                        </div>
                        @if(empty($row['thumbnail_data']) === false)
                            <div class="prof-clip-btn">
                                @php
                                    $thumbnail_data = json_decode($row['thumbnail_data'],true);
                                    foreach ($thumbnail_data as $thumbnail_row) {
                                        $html = '';
                                        if ($thumbnail_row['LinkType'] == 'layer') {
                                            $html .= '<a onclick="fnOpenYoutube(\''.$thumbnail_row['LinkUrl'].'\')">';
                                        } elseif ($thumbnail_row['LinkType'] == 'self') {
                                            $html .= '<a href="'.$thumbnail_row['LinkUrl'].'">';
                                        } elseif ($thumbnail_row['LinkType'] == 'blank') {
                                            $html .= '<a href="'.$thumbnail_row['LinkUrl'].'" target="_balnk">';
                                        } else {
                                            $html .= '<a href="javascript:void(0);">';
                                        }
                                        $html .= '<img src="'.$thumbnail_row['ThumbnailPath'].$thumbnail_row['ThumbnailFileName'].'" title="유튜브">';
                                        $html .= '</a>';
                                        echo $html;
                                    }
                                @endphp
                            </div>
                        @endif
                    </div>
                    @if(empty($row['thumbnail_data']) === false)<span class="hotclip"><img src="https://static.willbes.net/public/images/promotion/main/2018/hotclip.jpg" title="hot clip"></span>@endif
                    <img src="{{$row['ProfBgImagePath'].$row['ProfBgImageName']}}" title="{{$row['SubjectName']}} {{$row['wProfName']}}" class="prof-img">
                </div>
            @endforeach
        @empty
        @endforelse
    </div>
</div>

{{--교수 커리큘럼 팝업 --}}
<div id="curriculum_box" class="willbes-Layer-CurriBox"></div>

{{-- layer 수강후기 --}}
<div id="ProfReply" class="willbes-Layer-ProfReply"></div>

{{--교수 youtube 팝업 --}}
<div id="youtube" class="willbes-Layer-youtube">
    <a class="closeBtn" href="javascript:void(0);" onclick="fnCloseYoutube()">
        <img src="{{ img_url('prof/close.png') }}">
    </a>
    <iframe src="" id="youtube_frame" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
<div id="sec-prof-layer" class="willbes-Layer-Black"></div>

<script type="text/javascript">
    $(document).ready(function() {
        /*교수 배너 롤링기능*/
        var profslidesImg = $(".prof-Tab-Wrap").bxSlider({
            mode:'fade',
            touchEnabled: false,
            speed:400,
            pause:3000,
            sliderWidth:1120,
            auto : true,
            autoHover: true,
            controls:false,
            /*pagerCustom: '#profRolling',
            onSliderLoad: function(){
                $("#profRollingSlider").css("visibility", "visible").animate({opacity:1});
            }*/
        });

        $(".btn-hotclip-prof").on('click', function () {
            var target = $(this).data("prof-id");
            $(".prof-Tab-Cts").css('display','none');
            $("#tab"+target).css('display','block');
        });
    });


    function fnOpenProfCurriculum(prof_idx) {
        var ele_id = 'curriculum_box';
        var _url = '{{ front_url('/professor/layerCurriculum/prof-idx/') }}'+prof_idx;
        var data = {
            'ele_id' : ele_id,
            'close_id' : 'sec-prof-layer'
        }
        sendAjax(_url, data, function(ret) {
            console.log(ret);
            $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
        }, showAlertError, false, 'GET', 'html');
    }

    function fnOpenYoutube(url) {
        var youtube_url = url + '?' + 'enablejsapi=1&version=3&playerapiid=ytplayer';
        $("#youtube_frame").attr('src',youtube_url);
        openWin('sec-prof-layer');
        openWin('youtube');
    }
    function fnCloseYoutube() {
        $('#youtube_frame')[0].contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*');
        $("#youtube_frame").attr('src',"");
        closeWin('sec-prof-layer')
        closeWin('youtube');
    }
</script>