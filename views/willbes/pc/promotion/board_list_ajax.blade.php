<style>
    .postWrap {width:1000px; margin:0 auto; line-height:1.5; text-align:left; font-size:12px}
    .postList > h4 {font-size:14px; padding:10px 50px 0 0; position: relative; color:#216a4f}
    .postList > h4 strong {background:#216a4f; color:#fff; padding:3px 6px; border-radius:0 4px 4px 0; margin-right:10px}
    .postList > h4 a {position: absolute; top:10px; right:10px; font-size:12px; background:#333; color:#fff; padding:3px 6px; border-radius:4px}
    .postList .postSub {padding:10px 0; border-bottom:1px solid #e0e0e0; color:#666; display:flex; justify-content: space-between;}
    .postList .postSub span {padding:0 10px; border-right:1px solid #ccc}
    .postList .postSub span:last-child {border:0}
    .postWrap .postContent {border-bottom:1px solid #999; background:#fafafa; padding:10px; color:#666}
    .postWrap .postContent .btn-more-text {cursor: pointer; font-weight:bold; color:#000; display:inline-block; box-shadow:0 -10px 0 #e5fcf4 inset }
</style>

@if(empty($list) === false)
    <div class="evtCtnsBox mt100 mb100 NG" data-aos="fade-up">
        <div class="postWrap">
            @foreach($list as $row)
                <div class="postList">
                    <h4>
                        <strong>{{$row['BoardTypeName']}}</strong>
                        {{$row['Title']}}
                        @if(sess_data('is_login') === true && sess_data('mem_idx') === $row['RegMemIdx'])
                            <a href="javascript:void(0);" onclick="delRegister('{{ $row['EpbIdx'] }}'); return false;">삭제</a>
                        @endif
                    </h4>
                    <div class="postSub">
                        <div>
                            @if ($row['BoardType'] == 1)
                                <span>{{$row['AreaName']}}</span><span>{{$row['SubjectName']}}</span>
                            @else
                                <span>{{$row['SubjectName']}}</span><span>{{$row['ProfName']}}</span><span>{{$row['Score']}}</span>
                            @endif
                        </div>
                        <div>
                            <span>{!! (sess_data('is_login') === true && sess_data('mem_idx') === $row['RegMemIdx'] ? $row['MemId'] : hpSubString($row['MemId'], 0, (strlen($row['MemId']) - 4), '****')) !!}</span>
                            <span>{{$row['RegDatm']}}</span>
                        </div>
                    </div>
                    <div class="postContent minimum-text">
                        {!! nl2br(mb_substr($row['Content'],0,150,'UTF-8')) !!}
                        {!! (mb_strlen($row['Content'],'UTF-8') > 150 ? '<span class="btn-more-text">...더보기</span>' : '') !!}
                    </div>
                    <div class="postContent full-text" style="display: none;">
                        {!! nl2br($row['Content']) !!}
                    </div>
                </div>
            @endforeach
        </div>
        {!! $paging['pagination'] !!}
    </div>
@endif

<script type="text/javascript">
    $(document).ready(function() {
        $("div.Paging a").on("click", function() {
            var link, temp_params, params;
            var num = 1;

            link = $(this).attr('href');
            if (link) {
                temp_params = link.split('?');
                params = temp_params[1].split('=');
                num = params[params.length - 1];
            }
            fnReviewList(num);
            return false;
        });

        $(".btn-more-text").click(function () {
            $(this).closest(".minimum-text").css('display', 'none');
            $(this).closest(".minimum-text").next().css('display', 'block');
        });
    });

    function delRegister(idx) {
        var _url = '{{ front_url('/promotion/deletePromotionBoard') }}';
        var data = {
            '{{ csrf_token_name() }}' : '{{ csrf_token() }}',
            '_method' : 'DELETE',
            'idx' : idx
        };

        if (confirm('삭제하시겠습니까?')) {
            sendAjax(_url, data, function(ret) {
                if (ret.ret_cd) {
                    alert('삭제 되었습니다.');
                }
                fnReviewList(1);
            }, showError, false, 'POST');
        }
    }
</script>