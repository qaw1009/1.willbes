<div class="sec-prof-title"><img src="https://static.willbes.net/public/images/promotion/main/2018/title01.jpg" title="교수진"></div>
<div class="widthAuto p_re NSK">
    <ul class="prof-Tab">
        @if(empty($data['prof_hot_clip']) === false)
            @foreach($data['prof_hot_clip'] as $row)
                <li><a href="#tab{{$loop->index}}" @if($loop->first)class="active"@endif><span>{{ $row['SubjectName'] }}</span>{{ $row['wProfName'] }}</a></li>
            @endforeach
        @endif
    </ul>
    @if(empty($data['prof_hot_clip']) === false)
        @foreach($data['prof_hot_clip'] as $row)
            <div class="prof-Tab-Cts" id="tab{{$loop->index}}">
                <div class="btnBox">
                    <div class="prof-top-btn">
                        @if($row['ProfBtnIsUse'] == 'Y')
                            <a href="{{front_url("/professor/show/prof-idx/{$row['ProfIdx']}?cate_code={$row['CateCode']}&subject_idx={$row['SubjectIdx']}")}}">교수님 홈</a>
                        @endif
                        @if($row['CurriculumBtnIsUse'] == 'Y')
                            <a href="#none" onclick="openWin('sec-prof-layer'),openWin('Curriculum')">커리큘럼</a>
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
                                        $html .= '<a onclick="openWin(\'sec-prof-layer\'),open_youtube(\''.$thumbnail_row['LinkUrl'].'\')">';
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
                <img src="{{$row['ProfBgImagePath'].$row['ProfBgImageName']}}" title="{{$row['SubjectName']}} {{$row['wProfName']}}">
            </div>
        @endforeach
    @endif
</div>

{{--교수 커리큘럼 팝업 --}}
<div id="Curriculum" class="willbes-Layer-CurriBox">
    <a class="closeBtn" href="#none" onclick="closeWin('sec-prof-layer'),closeWin('Curriculum')">
        <img src="{{ img_url('prof/close.png') }}">
    </a>
    <div class="Layer-Tit NG tx-dark-black"><span class="tx-blue">민정선</span> 교수님 커리큘럼</div>
    <div class="Layer-Cont">
        <img src="https://ssam.willbes.net/public/uploads/willbes/board/92/2020/1127/board_305025_01_20201127150717.jpg"/>
    </div>
</div>

{{-- layer 수강후기 --}}
<div id="ProfReply" class="willbes-Layer-ProfReply"></div>

{{--교수 youtube 팝업 --}}
<div id="youtube" class="willbes-Layer-youtube">
    <a class="closeBtn" href="#none" onclick="closeWin('sec-prof-layer'),close_youtube()">
        <img src="{{ img_url('prof/close.png') }}">
    </a>
    <iframe src="" id="youtube_frame" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
<div id="sec-prof-layer" class="willbes-Layer-Black"></div>

<script type="text/javascript">
    function open_youtube(url) {
        var youtube_url = url + '?' + 'enablejsapi=1&version=3&playerapiid=ytplayer';
        $("#youtube_frame").attr('src',youtube_url);
        openWin('youtube');
    }
    function close_youtube() {
        $('#youtube_frame')[0].contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*');
        closeWin('youtube');
    }
</script>