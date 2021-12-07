<div class="sec-prof-title"><img src="https://static.willbes.net/public/images/promotion/main/2018/title01.jpg" title="교수진"></div>
{{--<div class="widthAuto p_re NSK">
    <ul class="prof-Tab" id="profRolling">
        @if(empty($data['prof_hot_clip']) === false)
            @foreach($data['prof_hot_clip'] as $row)
                <li><a data-slide-index="{{ $loop->index -1 }}" href="javascript:void(0);" @if($loop->first)class="active"@endif><span>{{ $row['SubjectName'] }}</span>{{ $row['wProfName'] }}</a></li>
            @endforeach
        @endif
    </ul>

    <div class="prof-Tab-Wrap" id="profRollingSlider">
    @if(empty($data['prof_hot_clip']) === false)
        @foreach($data['prof_hot_clip'] as $row)
            <div class="prof-Tab-Cts" id="tab{{$loop->index}}">
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
                <img src="{{$row['ProfBgImagePath'].$row['ProfBgImageName']}}" title="{{$row['SubjectName']}} {{$row['wProfName']}}">
            </div>
        @endforeach
    @endif
    </div>
</div>--}}

<div class="widthAuto p_re NSK">
    {{--
     <ul class="prof-Tab" id="profRolling">
         <li><a data-slide-index="0" href="javascript:void(0);" class="active"><span>유아</span>민정선</a></li>
         <li><a data-slide-index="1" href="javascript:void(0);"><span>초등</span>배재민</a></li>
         <li><a data-slide-index="2" href="javascript:void(0);"><span>교육학</span>이인재</a></li>
         <li><a data-slide-index="3" href="javascript:void(0);"><span>교육학</span>홍의일</a></li>
         <li><a data-slide-index="4" href="javascript:void(0);"><span>전공국어</span>송원영</a></li>
         <li><a data-slide-index="5" href="javascript:void(0);"><span>전공국어</span>권보민</a></li>
         <li><a data-slide-index="6" href="javascript:void(0);"><span>전공영어</span>김유석</a></li>
         <li><a data-slide-index="7" href="javascript:void(0);"><span>전공영어</span>김영문</a></li>
         <li><a data-slide-index="8" href="javascript:void(0);"><span>전공수학</span>김철홍</a></li>
         <li><a data-slide-index="9" href="javascript:void(0);"><span>수학교육론</span>박태영</a></li>
         <li><a data-slide-index="10" href="javascript:void(0);"><span>전공생물</span>강치욱</a></li>
         <li><a data-slide-index="11" href="javascript:void(0);"><span>생물교육론</span>양혜정</a></li>
         <li><a data-slide-index="12" href="javascript:void(0);"><span>도덕윤리</span>김병찬</a></li>
         <li><a data-slide-index="13" href="javascript:void(0);"><span>전공역사</span>최용림</a></li>
         <li><a data-slide-index="14" href="javascript:void(0);"><span>전공음악</span>다이애나</a></li>
         <li><a data-slide-index="15" href="javascript:void(0);"><span>전기전자통신</span>최우영</a></li>
         <li><a data-slide-index="16" href="javascript:void(0);"><span>정보컴퓨터</span>송광진</a></li>
         <li><a data-slide-index="17" href="javascript:void(0);"><span>정컴교육론</span>장순선</a></li>
         <li><a data-slide-index="18" href="javascript:void(0);"><span>전공중국어</span>정경미</a></li>
     </ul>
     --}}

    <ul class="ssam-prof-List">
        @forelse($data['prof_hot_clip_test'] as $subject_name => $arr_row)
            <li class="prof-dropdown">
                <a href="javascript:void(0);">{{$subject_name}}</a>
                <div class="prof-list-drop-Box">
                    <ul>
                        @foreach($arr_row as $prof_idx => $row)
                            <li><a href="javascript:void(0);" class="btn-hotclip-prof" data-prof-id="{{$row['ProfIdx']}}">{{$row['SubjectName']}} <strong>{{$row['wProfName']}}</strong></a></li>
                        @endforeach
                    </ul>
                </div>
            </li>
        @empty
        @endforelse
    </ul>

    <div class="prof-Tab-Wrap" id="profRollingSlider">
        @forelse($data['prof_hot_clip_test'] as $subject_name => $arr_row)
            @foreach($arr_row as $prof_idx => $row)
                <div class="prof-Tab-Cts" id="tab{{$row['ProfIdx']}}">
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



        {{--<div class="prof-Tab-Cts" id="tab1">
            <div class="btnBox">
                <div class="prof-top-btn">
                    <a href="https://ssam.willbes.net/professor/show/prof-idx/51076?cate_code=3135&subject_idx=1981">교수님 홈</a>
                    <a href="javascript:void(0);" onclick="openWin('sec-prof-layer'),openWin('Curriculum')">커리큘럼</a>
                    <a href="javascript:void(0);" onclick="openWin('sec-prof-layer'),openWin('ProfReply')">수강후기</a>
                </div>
                <div class="prof-clip-btn">
                    <a onclick="openWin('sec-prof-layer'),openWin('youtube')"><img src="https://static.willbes.net/public/images/promotion/main/2018/btn_hotclip.jpg" title="유튜브"></a>
                </div>
            </div>
            <span class="hotclip"><img src="https://static.willbes.net/public/images/promotion/main/2018/hotclip.jpg" title="hot clip"></span>
            <img src="https://static.willbes.net/public/images/promotion/main/2018/51076.jpg" title="유아 민정선" class="prof-img">
        </div>

        <div class="prof-Tab-Cts" id="tab2">
            <div class="btnBox">
                <div class="prof-top-btn">
                    <a href="https://ssam.willbes.net/professor/show/prof-idx/51077?cate_code=3136&subject_idx=1982">교수님 홈</a>
                    <a href="javascript:void(0);" onclick="openWin('sec-prof-layer'),openWin('Curriculum')">커리큘럼</a>
                    <a href="javascript:void(0);" onclick="openWin('sec-prof-layer'),openWin('ProfReply')">수강후기</a>
                </div>
                <div class="prof-clip-btn">
                    <a onclick="openWin('sec-prof-layer'),openWin('youtube')"><img src="https://static.willbes.net/public/images/promotion/main/2018/btn_hotclip.jpg" title="유튜브"></a>
                    <a onclick="openWin('sec-prof-layer'),openWin('youtube')"><img src="https://static.willbes.net/public/images/promotion/main/2018/btn_hotclip.jpg" title="유튜브"></a>
                </div>
            </div>
            <span class="hotclip"><img src="https://static.willbes.net/public/images/promotion/main/2018/hotclip.jpg" title="hot clip"></span>
            <img src="https://static.willbes.net/public/images/promotion/main/2018/51077.jpg" title="초등 배재민">
        </div>

        <div class="prof-Tab-Cts" id="tab3">
            <div class="btnBox">
                <div class="prof-top-btn">
                    <a href="https://ssam.willbes.net/professor/show/prof-idx/51074?cate_code=3134&subject_idx=1980">교수님 홈</a>
                    <a href="javascript:void(0);" onclick="openWin('sec-prof-layer'),openWin('Curriculum')">커리큘럼</a>
                    <a href="javascript:void(0);" onclick="openWin('sec-prof-layer'),openWin('ProfReply')">수강후기</a>
                </div>
                <div class="prof-clip-btn">
                    <a onclick="openWin('sec-prof-layer'),openWin('youtube')"><img src="https://static.willbes.net/public/images/promotion/main/2018/btn_hotclip.jpg" title="유튜브"></a>
                    <a onclick="openWin('sec-prof-layer'),openWin('youtube')"><img src="https://static.willbes.net/public/images/promotion/main/2018/btn_hotclip.jpg" title="유튜브"></a>
                    <a onclick="openWin('sec-prof-layer'),openWin('youtube')"><img src="https://static.willbes.net/public/images/promotion/main/2018/btn_hotclip.jpg" title="유튜브"></a>
                </div>
            </div>
            <span class="hotclip"><img src="https://static.willbes.net/public/images/promotion/main/2018/hotclip.jpg" title="hot clip"></span>
            <img src="https://static.willbes.net/public/images/promotion/main/2018/51074.jpg" title="교육학 이인재">
        </div>

        <div class="prof-Tab-Cts" id="tab4">
            <div class="btnBox">
                <div class="prof-top-btn">
                    <a href="https://ssam.willbes.net/professor/show/prof-idx/51075?cate_code=3134&subject_idx=1980">교수님 홈</a>
                    <a href="javascript:void(0);" onclick="openWin('sec-prof-layer'),openWin('Curriculum')">커리큘럼</a>
                    <a href="javascript:void(0);" onclick="openWin('sec-prof-layer'),openWin('ProfReply')">수강후기</a>
                </div>
                <div class="prof-clip-btn">
                    <a onclick="openWin('sec-prof-layer'),openWin('youtube')"><img src="https://static.willbes.net/public/images/promotion/main/2018/btn_hotclip.jpg" title="유튜브"></a>
                </div>
            </div>
            <span class="hotclip"><img src="https://static.willbes.net/public/images/promotion/main/2018/hotclip.jpg" title="hot clip"></span>
            <img src="https://static.willbes.net/public/images/promotion/main/2018/51075.jpg" title="교육학 홍의일">
        </div>

        <div class="prof-Tab-Cts" id="tab5">
            <div class="btnBox">
                <div class="prof-top-btn">
                    <a href="https://ssam.willbes.net/professor/show/prof-idx/51078?cate_code=3137&subject_idx=1983">교수님 홈</a>
                    <a href="javascript:void(0);" onclick="openWin('sec-prof-layer'),openWin('Curriculum')">커리큘럼</a>
                    <a href="javascript:void(0);" onclick="openWin('sec-prof-layer'),openWin('ProfReply')">수강후기</a>
                </div>
                <div class="prof-clip-btn">
                    <a onclick="openWin('sec-prof-layer'),openWin('youtube')"><img src="https://static.willbes.net/public/images/promotion/main/2018/btn_hotclip.jpg" title="유튜브"></a>
                    <a onclick="openWin('sec-prof-layer'),openWin('youtube')"><img src="https://static.willbes.net/public/images/promotion/main/2018/btn_hotclip.jpg" title="유튜브"></a>
                    <a onclick="openWin('sec-prof-layer'),openWin('youtube')"><img src="https://static.willbes.net/public/images/promotion/main/2018/btn_hotclip.jpg" title="유튜브"></a>
                </div>
            </div>
            <span class="hotclip"><img src="https://static.willbes.net/public/images/promotion/main/2018/hotclip.jpg" title="hot clip"></span>
            <img src="https://static.willbes.net/public/images/promotion/main/2018/51078.jpg" title="국어 송원영">
        </div>

        <div class="prof-Tab-Cts" id="tab6">
            <div class="btnBox">
                <div class="prof-top-btn">
                    <a href="https://ssam.willbes.net/professor/show/prof-idx/51078?cate_code=3137&subject_idx=1983">교수님 홈</a>
                    <a href="javascript:void(0);" onclick="openWin('sec-prof-layer'),openWin('Curriculum')">커리큘럼</a>
                    <a href="javascript:void(0);" onclick="openWin('sec-prof-layer'),openWin('ProfReply')">수강후기</a>
                </div>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/main/2018/51080.jpg" title="국어 권보민">
        </div>

        <div class="prof-Tab-Cts" id="tab7">
            <div class="btnBox">
                <div class="prof-top-btn">
                    <a href="https://ssam.willbes.net/professor/show/prof-idx/51081?cate_code=3137&subject_idx=1984">교수님 홈</a>
                    <a href="javascript:void(0);" onclick="openWin('sec-prof-layer'),openWin('Curriculum')">커리큘럼</a>
                    <a href="javascript:void(0);" onclick="openWin('sec-prof-layer'),openWin('ProfReply')">수강후기</a>
                </div>
                <div class="prof-clip-btn">
                    <a onclick="openWin('sec-prof-layer'),openWin('youtube')"><img src="https://static.willbes.net/public/images/promotion/main/2018/btn_hotclip.jpg" title="유튜브"></a>
                    <a onclick="openWin('sec-prof-layer'),openWin('youtube')"><img src="https://static.willbes.net/public/images/promotion/main/2018/btn_hotclip.jpg" title="유튜브"></a>
                    <a onclick="openWin('sec-prof-layer'),openWin('youtube')"><img src="https://static.willbes.net/public/images/promotion/main/2018/btn_hotclip.jpg" title="유튜브"></a>
                </div>
            </div>
            <span class="hotclip"><img src="https://static.willbes.net/public/images/promotion/main/2018/hotclip.jpg" title="hot clip"></span>
            <img src="https://static.willbes.net/public/images/promotion/main/2018/51081.jpg" title="영어 김유석">
        </div>

        <div class="prof-Tab-Cts" id="tab8">
            <div class="btnBox">
                <div class="prof-top-btn">
                    <a href="https://ssam.willbes.net/professor/show/prof-idx/51082?cate_code=3137&subject_idx=1984">교수님 홈</a>
                    <a href="javascript:void(0);" onclick="openWin('sec-prof-layer'),openWin('Curriculum')">커리큘럼</a>
                    <a href="javascript:void(0);" onclick="openWin('sec-prof-layer'),openWin('ProfReply')">수강후기</a>
                </div>
                <div class="prof-clip-btn">
                    <a onclick="openWin('sec-prof-layer'),openWin('youtube')"><img src="https://static.willbes.net/public/images/promotion/main/2018/btn_hotclip.jpg" title="유튜브"></a>
                    <a onclick="openWin('sec-prof-layer'),openWin('youtube')"><img src="https://static.willbes.net/public/images/promotion/main/2018/btn_hotclip.jpg" title="유튜브"></a>
                    <a onclick="openWin('sec-prof-layer'),openWin('youtube')"><img src="https://static.willbes.net/public/images/promotion/main/2018/btn_hotclip.jpg" title="유튜브"></a>
                </div>
            </div>
            <span class="hotclip"><img src="https://static.willbes.net/public/images/promotion/main/2018/hotclip.jpg" title="hot clip"></span>
            <img src="https://static.willbes.net/public/images/promotion/main/2018/51082.jpg" title="영어 김영문">
        </div>

        <div class="prof-Tab-Cts" id="tab9">
            <div class="btnBox">
                <div class="prof-top-btn">
                    <a href="https://ssam.willbes.net/professor/show/prof-idx/51084?cate_code=3137&subject_idx=1985">교수님 홈</a>
                    <a href="javascript:void(0);" onclick="openWin('sec-prof-layer'),openWin('Curriculum')">커리큘럼</a>
                    <a href="javascript:void(0);" onclick="openWin('sec-prof-layer'),openWin('ProfReply')">수강후기</a>
                </div>
                <div class="prof-clip-btn">
                    <a onclick="openWin('sec-prof-layer'),openWin('youtube')"><img src="https://static.willbes.net/public/images/promotion/main/2018/btn_hotclip.jpg" title="유튜브"></a>
                    <a onclick="openWin('sec-prof-layer'),openWin('youtube')"><img src="https://static.willbes.net/public/images/promotion/main/2018/btn_hotclip.jpg" title="유튜브"></a>
                    <a onclick="openWin('sec-prof-layer'),openWin('youtube')"><img src="https://static.willbes.net/public/images/promotion/main/2018/btn_hotclip.jpg" title="유튜브"></a>
                </div>
            </div>
            <span class="hotclip"><img src="https://static.willbes.net/public/images/promotion/main/2018/hotclip.jpg" title="hot clip"></span>
            <img src="https://static.willbes.net/public/images/promotion/main/2018/51084.jpg" title="수학 김철홍">
        </div>

        <div class="prof-Tab-Cts" id="tab10">
            <div class="btnBox">
                <div class="prof-top-btn">
                    <a href="https://ssam.willbes.net/professor/show/prof-idx/51085?cate_code=3137&subject_idx=1986">교수님 홈</a>
                    <a href="javascript:void(0);" onclick="openWin('sec-prof-layer'),openWin('Curriculum')">커리큘럼</a>
                    <a href="javascript:void(0);" onclick="openWin('sec-prof-layer'),openWin('ProfReply')">수강후기</a>
                </div>
                <div class="prof-clip-btn">
                    <a onclick="openWin('sec-prof-layer'),openWin('youtube')"><img src="https://static.willbes.net/public/images/promotion/main/2018/btn_hotclip.jpg" title="유튜브"></a>
                    <a onclick="openWin('sec-prof-layer'),openWin('youtube')"><img src="https://static.willbes.net/public/images/promotion/main/2018/btn_hotclip.jpg" title="유튜브"></a>
                    <a onclick="openWin('sec-prof-layer'),openWin('youtube')"><img src="https://static.willbes.net/public/images/promotion/main/2018/btn_hotclip.jpg" title="유튜브"></a>
                </div>
            </div>
            <span class="hotclip"><img src="https://static.willbes.net/public/images/promotion/main/2018/hotclip.jpg" title="hot clip"></span>
            <img src="https://static.willbes.net/public/images/promotion/main/2018/51085.jpg" title="수학 박태영">
        </div>

        <div class="prof-Tab-Cts" id="tab11">
            <div class="btnBox">
                <div class="prof-top-btn">
                    <a href="https://ssam.willbes.net/professor/show/prof-idx/51086?cate_code=3137&subject_idx=1987">교수님 홈</a>
                    <a href="javascript:void(0);" onclick="openWin('sec-prof-layer'),openWin('Curriculum')">커리큘럼</a>
                    <a href="javascript:void(0);" onclick="openWin('sec-prof-layer'),openWin('ProfReply')">수강후기</a>
                </div>
                <div class="prof-clip-btn">
                    <a onclick="openWin('sec-prof-layer'),openWin('youtube')"><img src="https://static.willbes.net/public/images/promotion/main/2018/btn_hotclip.jpg" title="유튜브"></a>
                </div>
            </div>
            <span class="hotclip"><img src="https://static.willbes.net/public/images/promotion/main/2018/hotclip.jpg" title="hot clip"></span>
            <img src="https://static.willbes.net/public/images/promotion/main/2018/51086.jpg" title="생물 강치욱">
        </div>

        <div class="prof-Tab-Cts" id="tab12">
            <div class="btnBox">
                <div class="prof-top-btn">
                    <a href="https://ssam.willbes.net/professor/show/prof-idx/51087?cate_code=3137&subject_idx=1988">교수님 홈</a>
                    <a href="javascript:void(0);" onclick="openWin('sec-prof-layer'),openWin('Curriculum')">커리큘럼</a>
                    <a href="javascript:void(0);" onclick="openWin('sec-prof-layer'),openWin('ProfReply')">수강후기</a>
                </div>
                <div class="prof-clip-btn">
                    <a onclick="openWin('sec-prof-layer'),openWin('youtube')"><img src="https://static.willbes.net/public/images/promotion/main/2018/btn_hotclip.jpg" title="유튜브"></a>
                </div>
            </div>
            <span class="hotclip"><img src="https://static.willbes.net/public/images/promotion/main/2018/hotclip.jpg" title="hot clip"></span>
            <img src="https://static.willbes.net/public/images/promotion/main/2018/51087.jpg" title="생물 양혜정">
        </div>

        <div class="prof-Tab-Cts" id="tab13">
            <div class="btnBox">
                <div class="prof-top-btn">
                    <a href="https://ssam.willbes.net/professor/show/prof-idx/51087?cate_code=3137&subject_idx=1988">교수님 홈</a>
                    <a href="javascript:void(0);" onclick="openWin('sec-prof-layer'),openWin('Curriculum')">커리큘럼</a>
                    <a href="javascript:void(0);" onclick="openWin('sec-prof-layer'),openWin('ProfReply')">수강후기</a>
                </div>
                <div class="prof-clip-btn">
                    <a onclick="openWin('sec-prof-layer'),openWin('youtube')"><img src="https://static.willbes.net/public/images/promotion/main/2018/btn_hotclip.jpg" title="유튜브"></a>
                    <a onclick="openWin('sec-prof-layer'),openWin('youtube')"><img src="https://static.willbes.net/public/images/promotion/main/2018/btn_hotclip.jpg" title="유튜브"></a>
                    <a onclick="openWin('sec-prof-layer'),openWin('youtube')"><img src="https://static.willbes.net/public/images/promotion/main/2018/btn_hotclip.jpg" title="유튜브"></a>
                </div>
            </div>
            <span class="hotclip"><img src="https://static.willbes.net/public/images/promotion/main/2018/hotclip.jpg" title="hot clip"></span>
            <img src="https://static.willbes.net/public/images/promotion/main/2018/51088.jpg" title="도덕윤리 김병찬">
        </div>

        <div class="prof-Tab-Cts" id="tab14">
            <div class="btnBox">
                <div class="prof-top-btn">
                    <a href="https://ssam.willbes.net/professor/show/prof-idx/51089?cate_code=3137&subject_idx=1990">교수님 홈</a>
                    <a href="javascript:void(0);" onclick="openWin('sec-prof-layer'),openWin('Curriculum')">커리큘럼</a>
                    <a href="javascript:void(0);" onclick="openWin('sec-prof-layer'),openWin('ProfReply')">수강후기</a>
                </div>
                <div class="prof-clip-btn">
                    <a onclick="openWin('sec-prof-layer'),openWin('youtube')"><img src="https://static.willbes.net/public/images/promotion/main/2018/btn_hotclip.jpg" title="유튜브"></a>
                    <a onclick="openWin('sec-prof-layer'),openWin('youtube')"><img src="https://static.willbes.net/public/images/promotion/main/2018/btn_hotclip.jpg" title="유튜브"></a>
                    <a onclick="openWin('sec-prof-layer'),openWin('youtube')"><img src="https://static.willbes.net/public/images/promotion/main/2018/btn_hotclip.jpg" title="유튜브"></a>
                </div>
            </div>
            <span class="hotclip"><img src="https://static.willbes.net/public/images/promotion/main/2018/hotclip.jpg" title="hot clip"></span>
            <img src="https://static.willbes.net/public/images/promotion/main/2018/51089.jpg" title="한국사 최용림">
        </div>

        <div class="prof-Tab-Cts" id="tab15">
            <div class="btnBox">
                <div class="prof-top-btn">
                    <a href="https://ssam.willbes.net/professor/show/prof-idx/51090?cate_code=3137&subject_idx=1991">교수님 홈</a>
                    <a href="javascript:void(0);" onclick="openWin('sec-prof-layer'),openWin('Curriculum')">커리큘럼</a>
                    <a href="javascript:void(0);" onclick="openWin('sec-prof-layer'),openWin('ProfReply')">수강후기</a>
                </div>
                <div class="prof-clip-btn">
                    <a onclick="openWin('sec-prof-layer'),openWin('youtube')"><img src="https://static.willbes.net/public/images/promotion/main/2018/btn_hotclip.jpg" title="유튜브"></a>
                    <a onclick="openWin('sec-prof-layer'),openWin('youtube')"><img src="https://static.willbes.net/public/images/promotion/main/2018/btn_hotclip.jpg" title="유튜브"></a>
                    <a onclick="openWin('sec-prof-layer'),openWin('youtube')"><img src="https://static.willbes.net/public/images/promotion/main/2018/btn_hotclip.jpg" title="유튜브"></a>
                </div>
            </div>
            <span class="hotclip"><img src="https://static.willbes.net/public/images/promotion/main/2018/hotclip.jpg" title="hot clip"></span>
            <img src="https://static.willbes.net/public/images/promotion/main/2018/51090.jpg" title="음악 다이애나">
        </div>

        <div class="prof-Tab-Cts" id="tab16">
            <div class="btnBox">
                <div class="prof-top-btn">
                    <a href="https://ssam.willbes.net/professor/show/prof-idx/51091?cate_code=3137&subject_idx=1992">교수님 홈</a>
                    <a href="javascript:void(0);" onclick="openWin('sec-prof-layer'),openWin('Curriculum')">커리큘럼</a>
                    <a href="javascript:void(0);" onclick="openWin('sec-prof-layer'),openWin('ProfReply')">수강후기</a>
                </div>
                <div class="prof-clip-btn">
                    <a onclick="openWin('sec-prof-layer'),openWin('youtube')"><img src="https://static.willbes.net/public/images/promotion/main/2018/btn_hotclip.jpg" title="유튜브"></a>
                    <a onclick="openWin('sec-prof-layer'),openWin('youtube')"><img src="https://static.willbes.net/public/images/promotion/main/2018/btn_hotclip.jpg" title="유튜브"></a>
                    <a onclick="openWin('sec-prof-layer'),openWin('youtube')"><img src="https://static.willbes.net/public/images/promotion/main/2018/btn_hotclip.jpg" title="유튜브"></a>
                </div>
            </div>
            <span class="hotclip"><img src="https://static.willbes.net/public/images/promotion/main/2018/hotclip.jpg" title="hot clip"></span>
            <img src="https://static.willbes.net/public/images/promotion/main/2018/51091.jpg" title="전기전자통신 최우영">
        </div>

        <div class="prof-Tab-Cts" id="tab17">
            <div class="btnBox">
                <div class="prof-top-btn">
                    <a href="https://ssam.willbes.net/professor/show/prof-idx/51092?cate_code=3137&subject_idx=1993">교수님 홈</a>
                    <a href="javascript:void(0);" onclick="openWin('sec-prof-layer'),openWin('Curriculum')">커리큘럼</a>
                    <a href="javascript:void(0);" onclick="openWin('sec-prof-layer'),openWin('ProfReply')">수강후기</a>
                </div>
                <div class="prof-clip-btn">
                    <a onclick="openWin('sec-prof-layer'),openWin('youtube')"><img src="https://static.willbes.net/public/images/promotion/main/2018/btn_hotclip.jpg" title="유튜브"></a>
                    <a onclick="openWin('sec-prof-layer'),openWin('youtube')"><img src="https://static.willbes.net/public/images/promotion/main/2018/btn_hotclip.jpg" title="유튜브"></a>
                    <a onclick="openWin('sec-prof-layer'),openWin('youtube')"><img src="https://static.willbes.net/public/images/promotion/main/2018/btn_hotclip.jpg" title="유튜브"></a>
                </div>
            </div>
            <span class="hotclip"><img src="https://static.willbes.net/public/images/promotion/main/2018/hotclip.jpg" title="hot clip"></span>
            <img src="https://static.willbes.net/public/images/promotion/main/2018/51092.jpg" title="정보컴퓨터 송광진">
        </div>

        <div class="prof-Tab-Cts" id="tab18">
            <div class="btnBox">
                <div class="prof-top-btn">
                    <a href="https://ssam.willbes.net/professor/show/prof-idx/51093?cate_code=3137&subject_idx=1994">교수님 홈</a>
                    <a href="javascript:void(0);" onclick="openWin('sec-prof-layer'),openWin('Curriculum')">커리큘럼</a>
                    <a href="javascript:void(0);" onclick="openWin('sec-prof-layer'),openWin('ProfReply')">수강후기</a>
                </div>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/main/2018/51093.jpg" title="정컴교육론 장순선">
        </div>

        <div class="prof-Tab-Cts" id="tab19">
            <div class="btnBox">
                <div class="prof-top-btn">
                    <a href="https://ssam.willbes.net/professor/show/prof-idx/51094?cate_code=3137&subject_idx=1995">교수님 홈</a>
                    <a href="javascript:void(0);" onclick="openWin('sec-prof-layer'),openWin('Curriculum')">커리큘럼</a>
                    <a href="javascript:void(0);" onclick="openWin('sec-prof-layer'),openWin('ProfReply')">수강후기</a>
                </div>
                <div class="prof-clip-btn">
                    <a onclick="openWin('sec-prof-layer'),openWin('youtube')"><img src="https://static.willbes.net/public/images/promotion/main/2018/btn_hotclip.jpg" title="유튜브"></a>
                    <a onclick="openWin('sec-prof-layer'),openWin('youtube')"><img src="https://static.willbes.net/public/images/promotion/main/2018/btn_hotclip.jpg" title="유튜브"></a>
                    <a onclick="openWin('sec-prof-layer'),openWin('youtube')"><img src="https://static.willbes.net/public/images/promotion/main/2018/btn_hotclip.jpg" title="유튜브"></a>
                </div>
            </div>
            <span class="hotclip"><img src="https://static.willbes.net/public/images/promotion/main/2018/hotclip.jpg" title="hot clip"></span>
            <img src="https://static.willbes.net/public/images/promotion/main/2018/51094.jpg" title="중국어 정경미">
        </div>--}}
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