@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
    <div id="vodTabs" class="vodTabs p_re">
        <ul class="vodWrap four NGEB">
            <li><a href="/player/Curriculum/?o={{$input['o']}}&p={{$input['p']}}&sp={{$input['sp']}}&l={{$input['l']}}&u={{$input['u']}}&q={{$input['q']}}">강의목록</a></li>
            <li><a href="/player/listBookmark/?o={{$input['o']}}&p={{$input['p']}}&sp={{$input['sp']}}&l={{$input['l']}}&u={{$input['u']}}&q={{$input['q']}}">북마크</a></li>
            <li><a href="/player/qna/?o={{$input['o']}}&p={{$input['p']}}&sp={{$input['sp']}}&l={{$input['l']}}&u={{$input['u']}}&q={{$input['q']}}" class="on">학습Q&A</a></li>
            <li><a href="//{{app_to_env_url($lec['SiteUrl'])}}/professor/show/cate/{{$lec['CateCode']}}/prof-idx/{{$lec['ProfIdx']}}/?subject_idx={{$lec['SubjectIdx']}}&subject_name={{rawurlencode($lec['SubjectName'])}}" target="_blank">수강후기</a></li>
        </ul>
    <!--            <div class="linkTabs NGEB"><a href="//{{app_to_env_url($lec['SiteUrl'])}}/professor/show/cate/{{$lec['CateCode']}}/prof-idx/{{$lec['ProfIdx']}}/?subject_idx={{$lec['SubjectIdx']}}&subject_name={{rawurlencode($lec['SubjectName'])}}" target="_blank">수강후기</a></div> -->
        <div class="tabBox vodBox">
            <div id="Faq" class="faqGrid">
                <div class="w-data w-box tx-left">
                    <div class="w-tit tx-center NGR">
                        수강중 궁금한 점은 교수님께 질문하세요.<br/>
                        <span class="tx-sky-blue underline">{{$lec['wProfName']}} 교수님 학습Q&A</span>
                    </div>
                    <form id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate="">
                        {!! csrf_field() !!}
                        <input type="hidden" name="_method" value="POST">
                        <input type="hidden" name="idx" value="">
                        <input type="hidden" name="reg_type" value="0">
                        <input type="hidden" name="s_site_code" value="{{$lec['SiteCode']}}">
                        <input type="hidden" name="s_cate_code" value="{{$lec['CateCode']}}">
                        <input type="hidden" name="s_prof_idx" value="{{$lec['ProfIdx']}}">
                        <input type="hidden" name="s_subject_idx" value="{{$lec['SubjectIdx']}}">
                        <input type="hidden" name="study_prod_code" value="{{$lec['ProdCodeSub']}}" />
                        <div class="faqBox">
                            <ul>
                                <li>
                                    <div class="w-faqtit">질문유형</div>
                                    <select id="s_consult_type" name="s_consult_type" title="question" class="seleQuestion">
                                        <option value="">질문유형을 선택하세요.</option>
                                        @foreach($arr_base['consult_type'] as $key => $val)
                                            <option value="{{$key}}" >{{$val}}</option>
                                        @endforeach
                                    </select>
                                </li>
                                <li>
                                    <div class="w-faqtit">강좌명</div>
                                    <input type="text" id="S-Sbj" name="S-Sbj" class="iptSbj" value="{{$lec['subProdName']}}" readonly>
                                </li>
                                <li>
                                    <div class="w-faqtit">제목</div>
                                    <input type="text" id="board_title" name="board_title" class="iptTit" placeholder="제목이 노출됩니다." maxlength="30">
                                </li>
                            </ul>
                            <textarea id="board_content" name="board_content" placeholder="내용을 입력하세요"></textarea>
                            <ul class="chkBtn">
                                <li>
                                    <div class="w-faqtit">공개여부</div>
                                </li>
                                <li class="radioBtn">
                                    <dl>
                                        <dt>
                                            <input type="radio" id="is_public_y" name="is_public" class="goods_chk" value="N" checked="checked"><label>비공개</label>
                                        </dt>
                                        <dt>
                                            <input type="radio" id="is_public_n" name="is_public" class="goods_chk" value="Y"><label>공개</label>
                                        </dt>
                                    </dl>
                                </li>
                            </ul>
                        </div>
                    </form>
                    <div class="buttonBtn cartBtn">
                        <ul>
                            <li>
                                <button type="submit" id="btn_submit" class="btnBlue"><span>저장</span></button>
                            </li>
                            <li>
                                <button type="reset" class="btnGray"><span>취소</span></button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');

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


            $regi_form.bind('submit', function () {
                $(this).find(':input').prop('disabled', false);
            });

            $('#btn_submit').click(function () {
                var _url = '//{{front_url('/support/profQna/store')}}';
                if (!confirm('저장하시겠습니까?')) { return true; }

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        alert(ret.ret_msg);
                        $regi_form[0].reset();
                    }
                }, showValidateError, addValidate, false, 'alert');
            });

            function addValidate() {
                var is_public = $(":input:radio[name=is_public]:checked").length;

                if ($('#s_consult_type').val() == '') {
                    alert('질문유형을 선택해 주세요.');
                    return false;
                }

                if (is_public < 1) {
                    alert('공개여부를 선택해 주세요.');
                    return false;
                }

                if ($('#board_title').val() == '') {
                    alert('제목을 입력해 주세요.');
                    return false;
                }

                if ($('#board_content').val() == '') {
                    alert('내용을 입력해 주세요.');
                    return false;
                }
                return true;
            }
        });

    </script>
@stop