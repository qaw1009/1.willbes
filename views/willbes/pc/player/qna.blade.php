@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
    <div id="vodTabs" class="vodTabs p_re">
        <ul class="vodWrap four NGEB">
            <li><a href="/player/Curriculum/?o={{$input['o']}}&p={{$input['p']}}&sp={{$input['sp']}}&l={{$input['l']}}&u={{$input['u']}}&q={{$input['q']}}">강의목록</a></li>
            <li><a href="/player/listBookmark/?o={{$input['o']}}&p={{$input['p']}}&sp={{$input['sp']}}&l={{$input['l']}}&u={{$input['u']}}&q={{$input['q']}}">북마크</a></li>
            <li><a href="/player/qna/?o={{$input['o']}}&p={{$input['p']}}&sp={{$input['sp']}}&l={{$input['l']}}&u={{$input['u']}}&q={{$input['q']}}" class="on">학습Q&A</a></li>
        </ul>
        <div class="linkTabs NGEB"><a href="{{ site_url('/home/html/profsub') }}" target="_blank">수강후기</a></div>
        <div class="tabBox vodBox">
            <div id="Faq" class="faqGrid">
                <div class="w-data w-box tx-left">
                    <div class="w-tit tx-center NGR">
                        수강중 궁금한 점은 교수님께 질문하세요.<br/>
                        <span class="tx-sky-blue underline">정채영 교수님 학습Q&A</span>
                    </div>
                    <div class="faqBox">
                        <ul>
                            <li>
                                <div class="w-faqtit">질문유형</div>
                                <select id="question" name="question" title="question" class="seleQuestion">
                                    <option selected="selected">질문유형을 선택하세요</option>
                                    <option value="유형1">유형1</option>
                                    <option value="유형2">유형2</option>
                                </select>
                            </li>
                            <li>
                                <div class="w-faqtit">강좌명</div>
                                <input type="text" id="S-Sbj" name="S-Sbj" class="iptSbj" placeholder="강좌명이 노출됩니다." maxlength="30">
                            </li>
                            <li>
                                <div class="w-faqtit">제목</div>
                                <input type="text" id="S-Tit" name="S-Tit" class="iptTit" placeholder="제목이 노출됩니다." maxlength="30">
                            </li>
                        </ul>
                        <textarea placeholder="내용을 입력하세요"></textarea>
                        <ul class="chkBtn">
                            <li>
                                <div class="w-faqtit">공개여부</div>
                            </li>
                            <li class="radioBtn">
                                <dl>
                                    <dt>
                                        <input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"><label>비공개</label>
                                    </dt>
                                    <dt>
                                        <input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"><label>공개</label>
                                    </dt>
                                </dl>
                            </li>
                        </ul>
                    </div>
                    <div class="buttonBtn cartBtn">
                        <ul>
                            <li>
                                <button type="submit" onclick="" class="btnBlue"><span>저장</span></button>
                            </li>
                            <li>
                                <button type="submit" onclick="" class="btnGray"><span>취소</span></button>
                            </li>
                        </ul>
                    </div>
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
    </script>
@stop