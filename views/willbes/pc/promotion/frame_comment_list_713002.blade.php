@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<style type="text/css">
    /* 프로모션 홍보 url 댓글 */
    .urlWrap {
        width:1000px;
        margin:30px auto 100px;
        font-size:12px;
        line-height: 1.4;
        color:#555556;
    }
    .urlWrap .snslink {
        width: 90%;
        margin: 0 auto;
    }
    .urlWrap .snslink li {
        display: inline;
        float: left;
        width: 25%;
        text-align: center;
    }
    .urlWrap .snslink:after {
        content:'';
        display: block;
        clear:both;
    }
    .urlWrap .textarBox {
        margin-top:80px;
        background:#e8e6d9;
        padding:20px;
        text-align: center;
        border-radius: 40px 40px 0 0;
    }
    .urlWrap .textarBox span {
        padding: 0 20px;
        font-weight: 500;
        font-size:14px;
    }
    .urlWrap .textarBox input {
        width:65%;
        height:36px;
        line-height:36px;
        border:2px solid #929292;
        border-radius: 20px 0 0 20px;
        padding-left:20px;
        vertical-align: middle;
    }
    .urlWrap .textarBox a {
        display: inline-block;
        text-align: center;
        color:#fff;
        background: #000;
        margin-left:0;
        height:36px;
        line-height: 36px;
        border-radius: 0 20px 20px 0;
        vertical-align: middle;
    }
    .urlWrap .url-List {
        margin-top: 1px;
    }
    .urlWrap .url-List table {
        border-top:0;
    }
    .urlWrap .url-List tr {
        border-bottom:1px solid #e8e6d9;
    }
    .urlWrap .url-List thead th {
        background:#e8e6d9;
        font-weight: bold;
    }
    .urlWrap .url-List thead th,
    .urlWrap .url-List td {
        padding:10px;
        text-align: center;
    }
    .urlWrap .url-List td:last-child {
        text-align: left;
    }
    .urlWrap .url-List td a {
        float: right;
        font-size: 12px;
        border:1px solid #eee;
        width: 18px;
        height: 18px;
        line-height: 18px;
        text-align: center;
        color:#ccc;
        font-family: "Helvetica", "Apple SD Gothic Neo", "sans-serif";
    }
    .urlWrap .url-List td a:hover {
        border:1px solid #000;
        color:#000;
    }
</style>

<div class="urlWrap" id="url">
    <form id="regi_form_comment" name="regi_form_comment" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        @foreach($arr_base['set_params '] as $key => $val)
            <input type="hidden" name="{{$key}}" value="{{$val}}"/>
        @endforeach

        @if((config_app('SiteCode') == '2001' || config_app('SiteCode') == '2002') && $arr_input['bottom_cafe_type'] != 'N')
            {{-- 경찰온라인 사이트일 경우만 적용 --}}
            <ul class="snslink">
                <li><a href="http://cafe.daum.net/policeacademy" target="_blank" ><img src="https://static.willbes.net/public/images/promotion/common/snsline01.png"alt="다음카페 경사모" /></a></li>
                <li><a href="http://cafe.naver.com/polstudy" target="_blank" ><img src="https://static.willbes.net/public/images/promotion/common/snsline02.png" alt="네이버카페 경꿈사" /></a></li>
                <li><a href="https://gall.dcinside.com/board/lists/?id=government" target="_blank" ><img src="https://static.willbes.net/public/images/promotion/common/snsline03.png" alt="디시 공무원 갤러리" /></a></li>
                <li><a href="https://gall.dcinside.com/mgallery/board/lists/?id=policeofficer" target="_blank"><img src="https://static.willbes.net/public/images/promotion/common/snsline04.png" alt="디시 순경마이너 갤러리" /></a></li>
            </ul>
        @endif

        @if((config_app('SiteCode') == '2003' || config_app('SiteCode') == '2004') && $arr_input['bottom_cafe_type'] != 'N')
            {{-- 경찰온라인 사이트일 경우만 적용 --}}
            <ul class="snslink">
                <li><a href="http://cafe.daum.net/9glade" target="_blank" ><img src="https://static.willbes.net/public/images/promotion/common/pass_snsline01.jpg"alt="다음카페 구꿈사" /></a></li>
                <li><a href="https://cafe.naver.com/gugrade" target="_blank" ><img src="https://static.willbes.net/public/images/promotion/common/pass_snsline02.jpg" alt="네이버카페 공드림" /></a></li>
                <li><a href="https://gall.dcinside.com/board/lists?id=government" target="_blank" ><img src="https://static.willbes.net/public/images/promotion/common/pass_snsline03.jpg" alt="디시 공무원 갤러리" /></a></li>
            </ul>
        @endif

        <div class="textarBox NSK">
            <span>홍보 URL 남기기</span>
            <input type="text" name="event_comment" id="event_comment" placeholder="홍보 URL 남기기.">
            <a href="#none" class="btnrwt" id="btn_submit_comment"><span class="ir">이벤트 참여하기</span></a>
        </div>
    </form>

    <div class="url-List">
        <table>
            <col width="15%"/>
            <col/>
            <thead>
            <tr>
                <th>ID</th>
                <th>URL</th>
            </tr>
            </thead>
            <tbody>
            @if(empty($list) === true)
                <tr>
                    <td colspan="2" style="text-align: center;">등록된 내용이 없습니다.</td>
                </tr>
            @else
                @foreach($list as $row)
                    <tr>
                        <td>{!! hpSubString($row['MemId'],0,2,'*') !!}</td>
                        <td>
                            {{--{!! nl2br($row['Content']) !!}--}}
                            {!! hpSubString($row['Content'], 0, 10, '*********************') !!}
                            @if(sess_data('is_login') === true && sess_data('mem_idx') === $row['MemIdx'])
                                <a class="btn-comment-del" data-comment-idx="{{$row['Idx']}}" href="#none">X</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>  
    
    <div class="mt30">
        {!! $paging['pagination'] !!}
    </div>
</div>

<script type="text/javascript">
    var $regi_form_comment = $('#regi_form_comment');
    $(document).ready(function() {
        $('#btn_submit_comment').click(function() {
            @if($arr_base['comment_create_type'] == '1')
            comment_submit();
            @elseif($arr_base['comment_create_type'] == '2')
            alert('회원만 댓글을 등록할 수 있습니다.');
            @elseif($arr_base['comment_create_type'] == '3')
            alert('만료된 이벤트 입니다.');
            @endif
        });

        $('.btn-comment-del').click(function () {
            var comment_idx = $(this).data('comment-idx');

            if (!confirm('해당 댓글을 삭제하시겠습니까?')) { return true; }
            var data = {
                '{{ csrf_token_name() }}' : $regi_form_comment.find('input[name="{{ csrf_token_name() }}"]').val(),
                '_method' : 'PUT'
            };
            sendAjax('{{ front_url('/promotion/commentDel/') }}' + comment_idx, data, function(ret) {
                if (ret.ret_cd) {
                    location.reload();
                }
            }, showError, false, 'POST');
        });
    });

    function comment_submit() {
        var _url = '{!! front_url('/promotion/commentStore') !!}';
        if (!confirm('등록하시겠습니까?')) { return true; }
        ajaxSubmit($regi_form_comment, _url, function(ret) {
            if(ret.ret_cd) {
                location.reload();
            }
        }, showValidateError, addValidate, false, 'alert');
    }

    function addValidate() {
        if ($('#event_comment').val() == '') {
            alert('홍보 URL을 입력해 주세요.');
            return false;
        }

        if (validUrl($('#event_comment').val()) == false) {
            alert('형식에 맞지않는 URL 입니다.');
            return false;
        }
        return true;
    }

    //URL 패턴 검사
    function validUrl(url) {
        var pattern = new RegExp('^(http:\\/\\/www\\.|https:\\/\\/www\\.|http:\\/\\/|https:\\/\\/)?[a-z0-9]+([\\-\\.]{1}[a-z0-9]+)*\\.[a-z]{2,5}(:[0-9]{1,5})?(\\/.*)?$');
        return pattern.test(url);
    }
</script>
@stop