<div id="Reply" class="willbes-Layer-ReplyBox" style="display: block">
    <a class="closeBtn" href="#none" onclick="closeWin('{{ $arr_input['ele_id'] }}');"><img src="{{ img_url('prof/close.png') }}"></a>
    <div class="Layer-Tit NG tx-dark-black">수강후기</div>

    <!-- List -->
    <form class="form-horizontal form-label-left" id="_search_form" name="_search_form" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    <div id="AddList" class="Layer-Cont">
        <div class="curriWrap c_both">
            <div class="CurriBox">
                <table cellspacing="0" cellpadding="0" class="curriTable curriTableLayer">
                    <colgroup>
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                        <col width="*">
                    </colgroup>
                    <tbody>
                    <tr>
                        <th class="tx-gray">과목선택</th>
                        <td colspan="8">
                            <ul class="curriSelect">
                                <li><a href="#none">전체</a></li>
                                @foreach($arr_base['subject'] as $idx => $row)
                                    <li><a href="#none" onclick="ajaxProfInfo('{{element('cate_code', $arr_input)}}', '{{$row['SubjectIdx']}}');">{{$row['SubjectName']}}</a></li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <th class="tx-gray">교수선택</th>
                        <td colspan="8" id="default_prof_list" class="tx-blue tx-left">* 과목 선택시 과목별 교수진을 확인하실 수 있습니다. 과목을 먼저 선택해 주세요!</td>
                        <div id="prof_list"></div>
                        <!-- 과목선택 시 해당 과목 교수 출력
                        <td>
                            <a href="#none">정채영</a>
                        </td>
                        <td>
                            <a href="#none">기미진</a>
                        </td>
                        <td>
                            <a href="#none">김세령</a>
                        </td>
                        <td>
                            <a href="#none">오대혁</a>
                        </td>
                        <td>
                            <a href="#none">이현나</a>
                        </td>
                        -->
                    </tr>
                    <tr>
                        <th class="tx-gray">강좌선택</th>
                        <td colspan="8" class="tx-left">
                            <select id="email" name="email" title="강좌를 선택해 주세요." class="seleEmail">
                                <option selected="selected">강좌를 선택해 주세요.</option>
                                <option value="강좌1">강좌1</option>
                                <option value="강좌2">강좌2</option>
                            </select>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- curriWrap -->
        <div class="willbes-Leclist c_both">
            <div class="willbes-LecreplyList tx-gray">
                <dl class="Select-Btn NG">
                    <dt><a class="on" href="#none">BEST순</a></dt>
                    <dt><a href="#none">최신순</a></dt>
                    <dt><a href="#none">평점순</a></dt>
                </dl>
                <div class="search-Btn btnAuto120 h27 f_right">
                    <button type="submit" onclick="closeWin('AddList'); openWin('AddModify')" class="mem-Btn bg-blue bd-dark-blue">
                        <span>수강후기 작성</span>
                    </button>
                </div>
            </div>
            <div class="LeclistTable">
                <table cellspacing="0" cellpadding="0" class="listTable replyTable upper-black upper-gray bdb-gray tx-gray">
                    <colgroup>
                        <col style="width: 75px;">
                        <col style="width: 90px;">
                        <col style="width: 100px;">
                        <col style="width: 120px;">
                        <col style="width: 260px;">
                        <col style="width: 90px;">
                        <col style="width: 100px;">
                    </colgroup>
                    <thead>
                    <tr>
                        <th>No<span class="row-line">|</span></li></th>
                        <th>과목<span class="row-line">|</span></li></th>
                        <th>교수명<span class="row-line">|</span></li></th>
                        <th>평점<span class="row-line">|</span></li></th>
                        <th>제목<span class="row-line">|</span></li></th>
                        <th>작성자<span class="row-line">|</span></li></th>
                        <th>등록일</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="replyList w-replyList">
                        <td class="w-no"><img src="{{ img_url('prof/icon_best_reply.gif') }}"></td>
                        <td class="w-lec">헌법</td>
                        <td class="w-name">정채영</td>
                        <td class="w-star"><img src="{{ img_url('sub/star5.gif') }}"></td>
                        <td class="w-list tx-left pl20">
                            좋은강의입니다.
                            <div class="subTit">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</div>
                        </td>
                        <td class="w-write">장동*</td>
                        <td class="w-date">2018-00-00</td>
                    </tr>
                    <tr class="replyTxt w-replyTxt tx-gray">
                        <td colspan="7">
                            <div class="tx-blue"><a href="#none">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</a></div>
                            Woo ah(우와) Dae Bark(박) 입니다!!! 정채영 교수님 수업을 온/오프라인으로 몇번 들었던 장수생입니다.
                            계속해서 무료 강좌 시리즈를 개설해 주셔서 감사합니다! 강의의 질이나 수준도 결코 유료특강에 떨어지지 않는 수준입니다.
                        </td>
                    </tr>

                    <tr class="replyList w-replyList">
                        <td class="w-no"><img src="{{ img_url('prof/icon_best_reply.gif') }}"></td>
                        <td class="w-lec">공직선거법</td>
                        <td class="w-name">한덕현</td>
                        <td class="w-star"><img src="{{ img_url('sub/star4.gif') }}"></td>
                        <td class="w-list tx-left pl20">
                            쉽게 설명해주시네요
                            <div class="subTit">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</div>
                        </td>
                        <td class="w-write">박형*</td>
                        <td class="w-date">2018-00-00</td>
                    </tr>
                    <tr class="replyTxt w-replyTxt tx-gray">
                        <td colspan="7">
                            <div class="tx-blue"><a href="#none">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</a></div>
                            베스트 댓글2
                        </td>
                    </tr>

                    <tr class="replyList w-replyList">
                        <td class="w-no">8</td>
                        <td class="w-lec">스파르타반</td>
                        <td class="w-name">김쌤</td>
                        <td class="w-star"><img src="{{ img_url('sub/star4.gif') }}"></td>
                        <td class="w-list tx-left pl20">
                            좋네요
                            <div class="subTit">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</div>
                        </td>
                        <td class="w-write">최귀*</td>
                        <td class="w-date">2018-04-22</td>
                    </tr>
                    <tr class="replyTxt w-replyTxt tx-gray">
                        <td colspan="7">
                            <div class="tx-blue"><a href="#none">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</a></div>
                            좋네요 좋네요 좋네요 좋네요 좋네요 좋네요
                        </td>
                    </tr>

                    <tr class="replyList w-replyList">
                        <td class="w-no">7</td>
                        <td class="w-lec">행정법</td>
                        <td class="w-name">최진우</td>
                        <td class="w-star"><img src="{{ img_url('sub/star2.gif') }}"></td>
                        <td class="w-list tx-left pl20">
                            저랑 잘 맞는 강의입니다.
                            <div class="subTit">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</div>
                        </td>
                        <td class="w-write">박형*</td>
                        <td class="w-date">2018-04-22</td>
                    </tr>
                    <tr class="replyTxt w-replyTxt tx-gray">
                        <td colspan="7">
                            <div class="tx-blue"><a href="#none">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</a></div>
                            저랑 잘 맞는 강의입니다. 저랑 잘 맞는 강의입니다. 저랑 잘 맞는 강의입니다.
                        </td>
                    </tr>

                    <tr class="replyList w-replyList">
                        <td class="w-no">6</td>
                        <td class="w-lec">공통</td>
                        <td class="w-name">윤세훈</td>
                        <td class="w-star"><img src="{{ img_url('sub/star2.gif') }}"></td>
                        <td class="w-list tx-left pl20">
                            좋네요
                            <div class="subTit">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</div>
                        </td>
                        <td class="w-write">장동*</td>
                        <td class="w-date">2018-04-22</td>
                    </tr>
                    <tr class="replyTxt w-replyTxt tx-gray">
                        <td colspan="7">
                            <div class="tx-blue"><a href="#none">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</a></div>
                            좋네요 좋네요 좋네요
                        </td>
                    </tr>

                    <tr class="replyList w-replyList">
                        <td class="w-no">5</td>
                        <td class="w-lec">헌법</td>
                        <td class="w-name">정채영</td>
                        <td class="w-star"><img src="{{ img_url('sub/star2.gif') }}"></td>
                        <td class="w-list tx-left pl20">
                            좋은강의입니다.
                            <div class="subTit">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</div>
                        </td>
                        <td class="w-write">최귀*</td>
                        <td class="w-date">2018-04-22</td>
                    </tr>
                    <tr class="replyTxt w-replyTxt tx-gray">
                        <td colspan="7">
                            <div class="tx-blue"><a href="#none">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</a></div>
                            좋은강의입니다. 좋은강의입니다. 좋은강의입니다. 좋은강의입니다. 좋은강의입니다.
                        </td>
                    </tr>

                    <tr class="replyList w-replyList">
                        <td class="w-no">4</td>
                        <td class="w-lec">공직선거법</td>
                        <td class="w-name">한덕현</td>
                        <td class="w-star"><img src="{{ img_url('sub/star3.gif') }}"></td>
                        <td class="w-list tx-left pl20">
                            쉽게 설명해주시네요
                            <div class="subTit">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</div>
                        </td>
                        <td class="w-write">최귀*</td>
                        <td class="w-date">2018-04-22</td>
                    </tr>
                    <tr class="replyTxt w-replyTxt tx-gray">
                        <td colspan="7">
                            <div class="tx-blue"><a href="#none">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</a></div>
                            쉽게 설명해주시네요. 쉽게 설명해주시네요. 쉽게 설명해주시네요.
                        </td>
                    </tr>

                    <tr class="replyList w-replyList">
                        <td class="w-no">3</td>
                        <td class="w-lec">스파르타반</td>
                        <td class="w-name">김쌤</td>
                        <td class="w-star"><img src="{{ img_url('sub/star4.gif') }}"></td>
                        <td class="w-list tx-left pl20">
                            좋네요
                            <div class="subTit">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</div>
                        </td>
                        <td class="w-write">최귀*</td>
                        <td class="w-date">2018-04-22</td>
                    </tr>
                    <tr class="replyTxt w-replyTxt tx-gray">
                        <td colspan="7">
                            <div class="tx-blue"><a href="#none">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</a></div>
                            좋네요 좋네요 좋네요 좋네요 좋네요 좋네요 좋네요
                        </td>
                    </tr>

                    <tr class="replyList w-replyList">
                        <td class="w-no">2</td>
                        <td class="w-lec">행정법</td>
                        <td class="w-name">최진우</td>
                        <td class="w-star"><img src="{{ img_url('sub/star3.gif') }}"></td>
                        <td class="w-list tx-left pl20">
                            좋네요
                            <div class="subTit">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</div>
                        </td>
                        <td class="w-write">최귀*</td>
                        <td class="w-date">2018-04-22</td>
                    </tr>
                    <tr class="replyTxt w-replyTxt tx-gray">
                        <td colspan="7">
                            <div class="tx-blue"><a href="#none">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</a></div>
                            좋네요 좋네요
                        </td>
                    </tr>

                    <tr class="replyList w-replyList">
                        <td class="w-no">1</td>
                        <td class="w-lec">공통</td>
                        <td class="w-name">윤세훈</td>
                        <td class="w-star"><img src="{{ img_url('sub/star1.gif') }}"></td>
                        <td class="w-list tx-left pl20">
                            좋네요
                            <div class="subTit">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</div>
                        </td>
                        <td class="w-write">최귀*</td>
                        <td class="w-date">2018-04-22</td>
                    </tr>
                    <tr class="replyTxt w-replyTxt tx-gray">
                        <td colspan="7">
                            <div class="tx-blue"><a href="#none">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</a></div>
                            좋네요 좋네요 좋네요 좋네요 좋네요 좋네요 좋네요 좋네요 좋네요 좋네요
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="willbes-Lec-Search GM p_re mt30">
                <div class="inputBox">
                    <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="제목 또는 내용을 입력해 주세요" maxlength="30">
                    <button type="submit" onclick="" class="search-Btn">
                        <span>검색</span>
                    </button>
                </div>
            </div>
        </div>
        <!-- willbes-Leclist -->
    </div>
    </form>

    <!-- Write -->
    <div id="AddModify" class="Layer-Cont" style="display: none">
        <ul class="replyInfo tx-gray NG">
            <li>· 수강생에 한해 강좌당 1회 작성이 가능합니다.</li>
            <li>· 수강 종료 강좌는 수강이 종료된 날로부터 30일 이내에만 후기 등록이 가능합니다.</li>
            <li>· 수강후기 작성 시 포인트 500P가 지급됩니다. (월 최대 2,000p 지급가능)</li>
            <li>· 강좌와 무관한 내용, 의미없는 문자 나열, 비방이나 욕설이 있을 시 삭제될 수 있습니다.</li>
        </ul>

        <div class="willbes-Leclist c_both">
            <div class="LecWriteTable">
                <table cellspacing="0" cellpadding="0" class="listTable writeTable upper-gray upper-black bdt-gray bdb-gray fc-bd-none tx-gray">
                    <colgroup>
                        <col style="width: 120px;">
                        <col style="width: 720px;">
                    </colgroup>
                    <tbody>
                    <tr>
                        <td class="w-tit bg-light-white tx-left strong pl30">수강정보<span class="tx-light-blue">(*)</span></td>
                        <td class="w-selected tx-left pl30">
                            <select id="Sbj" name="Sbj" title="Sbj" class="seleSbj" style="width: 150px;">
                                <option selected="selected">과목선택</option>
                                <option value="헌법">헌법</option>
                                <option value="스파르타반">스파르타반</option>
                                <option value="공직선거법">공직선거법</option>
                            </select>
                            <select id="Prof" name="Prof" title="Prof" class="seleProf" style="width: 150px;">
                                <option selected="selected">교수선택</option>
                                <option value="정채영">정채영</option>
                                <option value="한덕현">한덕현</option>
                                <option value="김쌤">김쌤</option>
                            </select>
                            <select id="Lec" name="Lec" title="Lec" class="seleLec" style="width: 360px;">
                                <option selected="selected">강좌선택</option>
                                <option value="기타">기타</option>
                                <option value="강좌내용">강좌내용</option>
                                <option value="학습상담">학습상담</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="w-tit bg-light-white tx-left strong pl30">평점<span class="tx-light-blue">(*)</span></td>
                        <td class="w-selected tx-left pl30">
                            <!-- Rating Stars Box -->
                            <div class="rating-stars text-center GM">
                                <ul id="stars">
                                    <li class="star" title="" data-value='1'>
                                        <i class="fa fa-star fa-fw"></i>
                                    </li>
                                    <li class="star" title="" data-value='2'>
                                        <i class="fa fa-star fa-fw"></i>
                                    </li>
                                    <li class="star" title="" data-value='3'>
                                        <i class="fa fa-star fa-fw"></i>
                                    </li>
                                    <li class="star" title="" data-value='4'>
                                        <i class="fa fa-star fa-fw"></i>
                                    </li>
                                    <li class="star" title="" data-value='5'>
                                        <i class="fa fa-star fa-fw"></i>
                                    </li>
                                </ul>
                                <div class="success-box">
                                    <div class="text-message">0</div>/ 5
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="w-tit bg-light-white tx-left strong pl30">제목<span class="tx-light-blue">(*)</span></td>
                        <td class="w-text tx-left pl30">
                            <input type="text" id="TITLE" name="TITLE" class="iptTitle" maxlength="30">
                        </td>
                    </tr>
                    <tr>
                        <td class="w-tit bg-light-white tx-left strong pl30">내용<span class="tx-light-blue">(*)</span></td>
                        <td class="w-textarea write tx-left pl30">
                            <textarea></textarea>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="search-Btn mt20 h36 p_re">
                    <button type="submit" onclick="closeWin('AddModify'),openWin('AddList')" class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray f_left">
                        <span class="tx-purple-gray">취소</span>
                    </button>
                    <button type="submit" onclick="" class="btnAuto90 h36 mem-Btn bg-purple-gray bd-dark-gray center">
                        <span>저장</span>
                    </button>
                </div>
            </div>
        </div>
        <!-- willbes-Leclist -->
    </div>
</div>
<div id="LayerReply" class="willbes-Layer-Black" style="display: block"></div>

<script src="/public/vendor/validator/multifield.js"></script>
<script type="text/javascript">
    var $search_form = $('#_search_form');

    // star rating Script //
    $(document).ready(function(){
        /* 1. Visualizing things on Hover - See next part for action on click */
        $('#stars li').on('mouseover', function(){
        var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

        // Now highlight all the stars that's not after the current hovered star
        $(this).parent().children('li.star').each(function(e){
            if (e < onStar) {
                $(this).addClass('hover').removeClass('none');
            } else {
                $(this).removeClass('hover').addClass('none');
            }
        });

        }).on('mouseout', function(){
            $(this).parent().children('li.star').each(function(e){
                $(this).removeClass('hover').removeClass('none');
            });
        });

        /* 2. Action to perform on click */
        $('#stars li').on('click', function(){
            var onStar = parseInt($(this).data('value'), 10); // The star currently selected
            var stars = $(this).parent().children('li.star');

            for (i = 0; i < stars.length; i++) {
                $(stars[i]).removeClass('selected');
            }

            for (i = 0; i < onStar; i++) {
                $(stars[i]).addClass('selected');
            }

            // JUST RESPONSE (Not needed)
            var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
            var msg = "";
            if (ratingValue > 1) {
                msg = ratingValue;
            } else {
                msg = ratingValue;
            }
            responseMessage(msg);
        });
    });

    function responseMessage(msg) {
        $('.success-box').fadeIn(200);
        $('.success-box div.text-message').html(msg);
    }

    function ajaxProfInfo(cate_code, subject_idx) {
        var _url = '{{ site_url("support/studyComment/ajaxProfInfo") }}' + getQueryString();
        var data = {
            '{{ csrf_token_name() }}' : $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
            'cate_code' : cate_code,
            'subject_idx' : subject_idx
        };

        sendAjax(_url, data, function(ret) {
            var add_data = '';
            if (ret.ret_cd) {
                console.log(ret.ret_data);
                $('#default_prof_list').remove();

                $.each(ret.ret_data, function(k, v) {
                    /*add_data +=
                    $children.append($('<option>', { 'value' : k, 'text' : v}));*/
                });
            }
        }, showError, false, 'POST');
    }
</script>