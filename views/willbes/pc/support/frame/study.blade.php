@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<div class="willbes-Leclist c_both">
    <div class="willbes-Lec-Tit NG tx-black">수강후기</div>
    <div class="ReplylistTable tx-gray">
        <div class="replyBox">
            <div class="w-reply-teaser">
                <ul>
                    <li class="w-tit tx-light-blue">2017 기미진 국어 아침특강(5-6월)</li>
                    <li class="w-name tx-center">홍길동</li>
                    <li class="row-line">|</li>
                    <li class="w-date tx-center">2018-03-24</li>
                </ul>
                <ul>
                    <li class="w-star"><img src="{{ img_url('sub/star4.gif') }}"></li>
                    <li class="w-subtit">강의 잘 들었습니다.</li>
                </ul>
            </div>
            <div class="w-reply">
                군더더기없는 깔끔한 강의입니다 강의시간이나 분량이 부담이 없어서 마음에 들었습니다~~ 군더더기없는 깔끔한 강의입니다 강의시간이나 분량이 부담이
                없어서 마음에 들었습니다~~
            </div>
        </div>
        <div class="replyBox">
            <div class="w-reply-teaser">
                <ul>
                    <li class="w-tit tx-light-blue">2018 신광은 형사소송법 기본이론(3월)</li>
                    <li class="w-name tx-center">홍진경</li>
                    <li class="row-line">|</li>
                    <li class="w-date tx-center">2018-03-24</li>
                </ul>
                <ul>
                    <li class="w-star"><img src="{{ img_url('sub/star5.gif') }}"></li>
                    <li class="w-subtit">역시 신광은교수님 강의 재미있게 잘 들었습니다.</li>
                </ul>
            </div>
            <div class="w-reply">
                체포는 48시간을 초과하면 안된다고 했는데 법관이 48시간 이내에 구속영장을 발부 해주지 않으면 피의자를 석방을 한 상태로 기다려야되는게 맞나요??
            </div>
        </div>
    </div>
</div>
<!-- willbes-Reply -->

<div class="willbes-Leclist c_both">
    <div class="willbes-LecreplyList tx-gray">
        → 해당 강좌 총 수강후기 [ <a class="num tx-light-blue underline" href="#none">2건</a> ]
        <ul>
            <li class="subBtn blue NSK"><a href="#none" class="btn-study" data-write-type="on">수강후기 작성하기 ></a></li>
            <li class="subBtn NSK"><a href="#none" class="btn-study" data-write-type="off">수강후기 전체보기 ></a></li>
        </ul>
    </div>
    <div class="LeclistTable">
        <table cellspacing="0" cellpadding="0" class="listTable upper-black under-gray tx-gray">
            <colgroup>
                <col style="width: 100px;">
                <col style="width: 590px;">
                <col style="width: 120px;">
                <col style="width: 130px;">
            </colgroup>
            <thead>
            <tr>
                <th>No<span class="row-line">|</span></th>
                <th>제목<span class="row-line">|</span></th>
                <th>작성자<span class="row-line">|</span></th>
                <th>등록일</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="w-no">2</td>
                <td class="w-list tx-left pl20">시험에 나올 쟁점들을 꼭꼭 짚어주셔서 좋습니다. 수험생의 눈높이에 맞춰 주셔서 강의를...</td>
                <td class="w-name">홍길동</td>
                <td class="w-date">2018-04-22</td>
            </tr>
            <tr>
                <td class="w-no">1</td>
                <td class="w-list tx-left pl20">서울시 7급, 국가직 7급 합격생입니다.</td>
                <td class="w-name">홍길순</td>
                <td class="w-date">2018-04-22</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<div id="WrapReply"></div>

<script type="text/javascript">
    $(document).ready(function() {
        $('.btn-study').click(function () {
            var ele_id = 'WrapReply';
            var data = {
                'ele_id' : ele_id,
                'show_onoff' : $(this).data('write-type'),
                'cate_code' : '{{element('cate',$arr_input)}}'
            };
            sendAjax('{{ site_url('/support/studyComment/') }}', data, function(ret) {
                $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
                /*$('#' + ele_id, parent.document).html(ret).show().css('display', 'block').trigger('create');*/
            }, showAlertError, false, 'GET', 'html');
        });
    });
</script>
@stop