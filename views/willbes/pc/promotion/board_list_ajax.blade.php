@if(empty($list) === false)
    <div class="evtCtnsBox evt02" data-aos="fade-up">
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
                        {!! (mb_strlen($row['Content'],'UTF-8') > 150 ? '<span class="btn-more-text" style="cursor: pointer; font-size: 15px; font-weight:bold;">...더보기</span>' : '') !!}
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