@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
    <div id="vodTabs" class="vodTabs p_re">
        <ul class="vodWrap four NGEB">
            <li><a href="/player/Curriculum/?o={{$input['o']}}&p={{$input['p']}}&sp={{$input['sp']}}&l={{$input['l']}}&u={{$input['u']}}&q={{$input['q']}}">강의목록</a></li>
            <li><a href="/player/listBookmark/?o={{$input['o']}}&p={{$input['p']}}&sp={{$input['sp']}}&l={{$input['l']}}&u={{$input['u']}}&q={{$input['q']}}"class="on">북마크</a></li>
            <li><a href="/player/qna/?o={{$input['o']}}&p={{$input['p']}}&sp={{$input['sp']}}&l={{$input['l']}}&u={{$input['u']}}&q={{$input['q']}}">학습Q&A</a></li>
        </ul>
        <div class="linkTabs NGEB"><a href="//{{app_to_env_url($lec['SiteUrl'])}}/professor/show/cate/{{$lec['CateCode']}}/prof-idx/{{$lec['ProfIdx']}}/?subject_idx={{$lec['SubjectIdx']}}&subject_name={{rawurlencode($lec['SubjectName'])}}" target="_blank">수강후기</a></div>
        <div class="tabBox vodBox">
            <div id="Bookmark" class="bookmarkGrid">
                <div class="w-data w-box tx-left">
                    <div class="w-tit NGR">
                        <span class="tx-sky-blue">북마크</span> 클릭시 북마크 시간이 설정되며,<br/>
                        내용 입력 후 <span class="tx-sky-blue">저장</span>시 북마크가 등록됩니다
                    </div>
                    <form name="bmform" id="bmform">
                        <div class="buttonBtn bookmarkBox">
                            <ul>
                                <li>
                                    <input type="hidden" id="o" name="o" value="{{$input['o']}}" />
                                    <input type="hidden" id="p" name="p" value="{{$input['p']}}" />
                                    <input type="hidden" id="sp" name="sp" value="{{$input['sp']}}" />
                                    <input type="hidden" id="l" name="l" value="{{$input['l']}}" />
                                    <input type="hidden" id="u" name="u" value="{{$input['u']}}"  />
                                    <input type="hidden" id="bmtime" name="bmtime" value="" />
                                    <input type="text" id="vtime" name="vtime" class="iptTime" onclick="fnGetTime();" placeholder="북마크 시간을 설정 하세요." style="cursor:pointer;" readonly>
                                    <button type="button" onclick="fnGetTime();" class="btnGray"><span>북마크</span></button>
                                </li>
                                <li>
                                    <input type="text" id="bmtitle" name="bmtitle" class="iptTime" placeholder="내용을 입력하세요." maxlength="100">
                                    <button type="button" onclick="storeBookmark();" class="btnBlue"><span>저장</span></button>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>
                <div class="vodtableBox">
                    <ul class="top">
                        <li>
                            <div class="tt1">선택</div>
                            <div class="tt2">시간</div>
                            <div class="tt3">내용</div>
                        </li>
                    </ul>
                    <ul class="table">
                        @forelse($data as $row)
                            <li>
                                <div class="tt1"><a href="javascript:;" onclick="fnDelete({{$row['bmIdx']}});">X</a></div>
                                <div class="tt2"><a href="javascript:;" onclick="fnSetPosition({{$row['Time']}})">{{$row['ConvertTime']}}</a></div>
                                <div class="tt3"><a href="javascript:;" onclick="fnSetPosition({{$row['Time']}})">{{$row['Title']}}</a></div>
                            </li>
                        @empty
                            <li style="text-align: center;">
                                저장된 북마크가 없습니다.
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
            $('.vodlecBox ul.lec').css('height', $(window).height() - 150);
            $('.vodtableBox ul.table').css('height', $(window).height() - 230);

            $(window).resize(function() {
                $('#vodTabs').css('height', $(window).height());

                $('.vodSbjBox ul.sbj').css('height', $(window).height() - 220);
                $('.vodlecBox ul.lec').css('height', $(window).height() - 150);
                $('.vodtableBox ul.table').css('height', $(window).height() - 230);
            });
        });

        function fnSetPosition(position) {
            parent.player.setCurrentPosition(position);
        }

        function fnGetTime() {
            var Seconds;
            Seconds = parent.player.getCurrentPosition();

            Seconds = parseInt(Seconds);

            $("#bmtime").val(Seconds);

            var hr = parseInt(Seconds / 3600 - (Seconds % 3600) / 3600);
            var mn = parseInt((Seconds % 3600) / 60 - ((Seconds % 3600) % 60) / 60);
            var sc = parseInt((Seconds % 3600) % 60);
            if (hr < 10) hr = "0" + hr;
            if (mn < 10) mn = "0" + mn;
            if (sc < 10) sc = "0" + sc;

            $("#vtime").val(hr + ":" + mn + ":" + sc);

        }

        function storeBookmark()
        {
            url = "{{ site_url("/player/storeBookmark/") }}";
            data = $("#bmform").serialize();

            sendAjax(url,
                data,
                function(d){
                    location.reload();
                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, true, 'GET');
        }

        function fnDelete(bmidx)
        {
            if(!window.confirm('북마크를 삭제하시겠습니까?')){
                return;
            }
            url = "{{ site_url("/player/deleteBookmark/") }}";
            data = "bmidx="+bmidx;

            sendAjax(url,
                data,
                function(d){
                    location.reload();
                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, true, 'GET');
        }


    </script>
@stop