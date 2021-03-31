@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
    <div id="vodTabs" class="vodTabs p_re">
        <ul class="vodWrap four NGEB">
            <li><a href="/player/Curriculum/?o={{$input['o']}}&p={{$input['p']}}&sp={{$input['sp']}}&l={{$input['l']}}&u={{$input['u']}}&q={{$input['q']}}">강의목록</a></li>
            <li><a href="/player/listBookmark/?o={{$input['o']}}&p={{$input['p']}}&sp={{$input['sp']}}&l={{$input['l']}}&u={{$input['u']}}&q={{$input['q']}}">북마크</a></li>
            @if($lec['IsQnaBoard'] == 'Y')
                <li><a href="/player/qna/?o={{$input['o']}}&p={{$input['p']}}&sp={{$input['sp']}}&l={{$input['l']}}&u={{$input['u']}}&q={{$input['q']}}">학습Q&A</a></li>
            @endif
            <li><a href="/player/comment/?o={{$input['o']}}&p={{$input['p']}}&sp={{$input['sp']}}&l={{$input['l']}}&u={{$input['u']}}&q={{$input['q']}}" class="on">수강후기</a></li>
            {{--
            <li><a href="/player/comment/">수강후기</a></li>
            <li><a href="//{{app_to_env_url($lec['SiteUrl'])}}/professor/show/cate/{{$lec['CateCode']}}/prof-idx/{{$lec['ProfIdx']}}/?subject_idx={{$lec['SubjectIdx']}}&subject_name={{rawurlencode($lec['SubjectName'])}}" target="_blank">수강후기</a></li>
            --}}
        </ul>
    <!--            <div class="linkTabs NGEB"><a href="//{{app_to_env_url($lec['SiteUrl'])}}/professor/show/cate/{{$lec['CateCode']}}/prof-idx/{{$lec['ProfIdx']}}/?subject_idx={{$lec['SubjectIdx']}}&subject_name={{rawurlencode($lec['SubjectName'])}}" target="_blank">수강후기</a></div> -->
        <div class="tabBox vodBox">
            <form id="_ajax_reg_form" name="_ajax_reg_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                <input type="hidden" name="board_idx" value=""/>
                <input type="hidden" name="study_site_code" value="{{$lec['SiteCode']}}"/>
                <input type="hidden" name="study_cate_code" value="{{$lec['CateCode']}}"/>
                <input type="hidden" name="study_prod_code" value="{{$lec['ProdCodeSub']}}"/>
                <input type="hidden" name="study_subject_idx" value="{{$lec['SubjectIdx']}}"/>
                <input type="hidden" name="study_prof_idx" value="{{$lec['ProfIdx']}}"/>
            <div id="review" class="tabContent bookmarkGrid">
                <div class="w-data tx-left">
                    <div class="w-tit NGR">{{$lec['subProdName']}}</div>
                    <div class="faqBox">
                        <ul>
                            <li>
                                <select id="start_count" name="start_count" title="평점" style="width:100%">
                                    <option value="5">★★★★★ 5/5</option>
                                    <option value="4">★★★★☆ 4/5</option>
                                    <option value="3">★★★☆☆ 3/5</option>
                                    <option value="2">★★☆☆☆ 4/5</option>
                                    <option value="1">★☆☆☆☆ 1/5</option>
                                </select>
                            </li>
                            <li>
                                <input type="text" id="study_title" name="study_title" title="제목" maxlength="30" required="required" class="iptTit" placeholder="제목을 작성해주세요." style="width:100%">
                            </li>
                        </ul>
                        <textarea name="study_content" placeholder="내용을 입력해주세요" title="내용" required="required"></textarea>
                    </div>
                </div>
                <div class="buttonBtn cartBtn mb10">
                    <ul>
                        {{--
                        <li>
                            <button type="button" onclick="commentList();" class="btnGray"><span>후기목록</span></button>
                        </li>
                        --}}
                        <li>
                            <button type="button" onclick="commentPost();" class="btnBlue"><span>저장</span></button>
                        </li>
                    </ul>
                </div>
            </div>
            </form>
        </div>
    </div>
    <script src="/public/vendor/validator/multifield.js"></script>
    <script type="text/javascript">
        function commentList()
        {
            var url = "//{{app_to_env_url($lec['SiteUrl'])}}/professor/show/cate/{{$lec['CateCode']}}/prof-idx/{{$lec['ProfIdx']}}/?subject_idx={{$lec['SubjectIdx']}}&subject_name={{rawurlencode($lec['SubjectName'])}}";
            window.open(url, '_blank')
        }

        function commentPost()
        {
            var url = '{{ front_url('/support/studyComment/store') }}';
            ajaxSubmit($('#_ajax_reg_form'), url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                    location.replace('/player/Curriculum/?o={{$input['o']}}&p={{$input['p']}}&sp={{$input['sp']}}&l={{$input['l']}}&u={{$input['u']}}&q={{$input['q']}}');

                }
            }, showValidateError, null, false, 'alert');
        }
    </script>
@stop