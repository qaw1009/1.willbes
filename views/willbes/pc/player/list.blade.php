@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
    <div id="vodTabs" class="vodTabs p_re">
        <ul class="vodWrap four NGEB">
            <li><a href="/player/Curriculum/?o={{$input['o']}}&p={{$input['p']}}&sp={{$input['sp']}}&l={{$input['l']}}&u={{$input['u']}}&q={{$input['q']}}" class="on">강의목록</a></li>
            <li><a href="/player/listBookmark/?o={{$input['o']}}&p={{$input['p']}}&sp={{$input['sp']}}&l={{$input['l']}}&u={{$input['u']}}&q={{$input['q']}}">북마크</a></li>
            @if($lec['IsQnaBoard'] == 'Y')
                <li><a href="/player/qna/?o={{$input['o']}}&p={{$input['p']}}&sp={{$input['sp']}}&l={{$input['l']}}&u={{$input['u']}}&q={{$input['q']}}">학습Q&A</a></li>
            @endif
            <li><a href="//{{app_to_env_url($lec['SiteUrl'])}}/professor/show/cate/{{$lec['CateCode']}}/prof-idx/{{$lec['ProfIdx']}}/?subject_idx={{$lec['SubjectIdx']}}&subject_name={{rawurlencode($lec['SubjectName'])}}" target="_blank">수강후기</a></li>
        </ul>
<!--        <div class="linkTabs NGEB"><a href="//{{app_to_env_url($lec['SiteUrl'])}}/professor/show/cate/{{$lec['CateCode']}}/prof-idx/{{$lec['ProfIdx']}}/?subject_idx={{$lec['SubjectIdx']}}&subject_name={{rawurlencode($lec['SubjectName'])}}" target="_blank">수강후기</a></div> -->
        <div class="tabBox vodBox">
            <div id="Lec" class="lecGrid">
                <div class="w-data w-box tx-left">
                    <div class="w-tit NGR">{{$lec['subProdName']}}</div>
                </div>
                <div class="vodlistBox vodlecBox">
                    <ul class="top">
                        <li>
                            <div class="tt1">NO</div>
                            <div class="tt2">강의명</div>
                            <div class="tt3">자료</div>
                        </li>
                    </ul>
                    <ul class="list lec">
                        @forelse($curriculum as $row)
                            <li>
                                <div class="tt1">{{$row['wUnitNum']}}회 {{$row['wUnitLectureNum']}}강</div>
                                <div class="tt2 tx-left">
                                    @if($row['isstart'] == 'Y' && $row['ispause'] == 'N')
                                        @if($row['timeover'] == 'N')
                                            <a href="javascript:;" onclick='fnPlayer("{{$row['OrderIdx']}}","{{$row['ProdCode']}}","{{$row['ProdCodeSub']}}","{{$row['wLecIdx']}}","{{$row['wUnitIdx']}}","{{$input['q']}}");'>
                                        @else
                                            <a href="javascript:;" onclick=''>
                                        @endif
                                    @elseif($row['ispause'] == 'Y')
                                            <a href="javascript:;" onclick=''>
                                    @else
                                            <a href="javascript:;" onclick=''>
                                    @endif
                                    {{$row['wUnitName']}}</a></div>
                                <div class="tt3">@if(empty($row['wUnitAttachFile']) == false)
                                        @if($row['wControlCount'] > 0)
                                            {{-- 파일 인쇄 카운트 관리 --}}
                                            @if($row['wControlCount'] > $row['downcount'])
                                                {{-- 인쇄가능  --}}
                                                <a href="javascript:;" onclick="ezPrint('/{{$row['OrderIdx']}}/{{$row['ProdCode']}}/{{$row['ProdCodeSub']}}/{{$row['wLecIdx']}}/{{$row['wUnitIdx']}}/{{sess_data('mem_idx')}}/{{$row['wUnitIdx']}}/')">
                                                    @if($row['downcount'] > 0)
                                                        <img src="{{ img_url('prof/icon_down.png') }}">
                                                    @else
                                                        <img src="{{ img_url('prof/icon_file.gif') }}">
                                                    @endif
                                                </a>
                                            @else
                                                {{-- 인쇄불가능 --}}
                                                <a href="javascript:;" onclick="alert('인쇄횟수가 초과되었습니다.');"><img src="{{ img_url('prof/icon_down.png') }}"></a>
                                            @endif

                                        @else
                                            {{-- 일반 다운로드 --}}
                                            <a href="/classroom/on/download/{{$row['OrderIdx']}}/{{$row['ProdCode']}}/{{$row['ProdCodeSub']}}/{{$row['wLecIdx']}}/{{$row['wUnitIdx']}}">
                                                @if($row['downcount'] > 0)
                                                    <img src="{{ img_url('prof/icon_down.png') }}">
                                                @else
                                                    <img src="{{ img_url('prof/icon_file.gif') }}">
                                                @endif
                                            </a>
                                        @endif
                                    @endif</div>
                            </li>
                        @empty
                            <li style="text-align: center;">
                                강의 목록이 없습니다.
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function() {
            $(".vodlistBox ul.list li:nth-child(2n)").addClass("nth");
        });
        $(document).ready(function(){
            $('#vodTabs').css('height', $(window).height());

            $('.vodSbjBox ul.sbj').css('height', $(window).height() - 220);
            $('.vodlecBox ul.lec').css('height', $(window).height() - 135);
            $('.vodtableBox ul.table').css('height', $(window).height() - 230);

            $(window).resize(function() {
                $('#vodTabs').css('height', $(window).height());

                $('.vodSbjBox ul.sbj').css('height', $(window).height() - 220);
                $('.vodlecBox ul.lec').css('height', $(window).height() - 135);
                $('.vodtableBox ul.table').css('height', $(window).height() - 230);
            });
        });

        function ezPrint(param)
        {
            var url = '{{front_url('classroom/on/downloadPopup')}}'+param;
            popupOpen(url, 'pdfdown', 800, 500, null, null, 'no', 'no');
        }
    </script>
@stop