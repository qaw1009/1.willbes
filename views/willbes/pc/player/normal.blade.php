@extends('willbes.pc.layouts.player_master')

@section('script')
    <script type="text/javascript">
        ratio = {{empty($data['ratio']) == true ? '16' : $data['ratio']}};
        startPosition = {{empty($data['startPosition']) == true ? '0' : $data['startPosition']}};

        var globalStudiedTime = 0;
        var globalStudiedRealTime = 0;
        var ajaxErrorCount = 0;

        $(document).ready(function (){
            getScreenSize();
            setScreenReSizeVal();
            screenResize();
            //fnDefense();

            var config = {
                userId: "{{$data['memid']}}",
                id: "starplayer",
                videoContainer: "video-container",
                controllerContainer: "controller-container",
                controllerContainerHtml5: "controller-container2",
                controllerUrl: "/public/vendor/starplayer/bin/axissoft3.bin",
                controller64Url: "/public/vendor/starplayer/bin/axissoft3_x64.bin",
                visible: true,
                auto_progressive_download: true,
                dualMonitor: true,
                watermarkText: "{{$data['memid']}}",
                watermarkTextColor: "#308ECE92",
                watermarkTextSize: "2%",
                watermarkHorzAlign: WatermarkAlign.RANDOM,
                watermarkVertAlign: WatermarkAlign.BOTTOM,
                watermarkInterval: "60",
                watermarkShowInterval: "1",
                blockMessenger: false,
                blockVirtualMachine: true
            };

            var media = {
                url: "{{$data['url']}}",
                @if($data['isIntro'] === true)
                intro: "http://hd.willbes.gscdn.com/warning/warning_new_5.mp4",
                @endif
                autoPlay: true,
                startTime: startPosition
            };

            fnStartPlayer(config, media);

            realPlayerTime = new Speedplaytime(player);

            setTimeout(fnSendLog, 10000);
        });


        function fnSendLog()
        {
            if (player.getPlayState() != PlayState.PLAYING) {
                setTimeout(fnSendLog, 1000);
                return;
            }

            var url = "/player/log/";
            var data = "o=&p=&sp=&u=&m=&l=";
            var playedTime = 0;
            var playedRealTime = 0;
            var currentPosition = 0;

            playedTime = Math.floor(realPlayerTime.getTime()); // 2배속으로 1분 수강시 2분
            playedRealTime = Math.floor(player.getPlayTime()); // 2배속으로 1분 수강시 1분
            currentPosition = Math.floor(player.getCurrentPosition());

            data = data + "&st=" + Math.floor(playedRealTime - globalStudiedRealTime);
            data = data + "&srt=" + Math.floor(playedTime - globalStudiedTime);
            data = data + "&pos=" + currentPosition;

            if(ajaxErrorCount > 10){
                player.stop();
                alert("인터넷오류로 강의가 중단되었습니다.");
            }

            $.ajax({
                type: "GET",
                url: url,
                data: data,
                cache: false,
                dataType: "text",
                error: function (request, status, error) {
                    ajaxErrorCount++;
                    setTimeout(fnSendLog, 1000 * 5);
                },
                success: function (response) {
                    if(response == "ERROR") {
                        player.stop();
                        alert("인터넷오류로 강의가 중단되었습니다.");
                    }
                    else if(response == "OK") {
                        globalStudiedTime = playedTime;
                        globalStudiedRealTime = playedRealTime;
                        ajaxErrorCount = 0;
                        setTimeout(fnSendLog, 1000 * 60);
                    }
                    else {
                        ajaxErrorCount++;
                        setTimeout(fnSendLog, 1000 * 5);
                    }
                }
            });
        }

        if (window.attachEvent) {
            /*IE and Opera*/
            window.attachEvent("onunload", function() {
                fnSendLog();
                window.opener.location.reload();
            });
        }
        else if (document.addEventListener) {
            /*Chrome, FireFox*/
            window.onbeforeunload = function() {
                fnSendLog();
                window.opener.location.reload();
            };
            /*IE 6, Mobile Safari, Chrome Mobile*/
            window.addEventListener("unload", function() {
                fnSendLog();
                window.opener.location.reload();
            }, false);
        }
        else {
            /*etc*/
            document.addEventListener("unload", function() {
                fnSendLog();
                window.opener.location.reload();
            }, false);
        }
    </script>
@stop

@section('subframe')
    <ul class="tabWrap vodWrap four NGEB">
        <li><a href="#Lec" class="on">강의목록</a></li>
        <li><a href="#Bookmark">북마크</a></li>
        <li><a href="#Faq">학습Q&A</a></li>
    </ul>
    <div class="linkTabs NGEB"><a href="{{ site_url('/home/html/profsub') }}" target="_blank">수강후기</a></div>
    <div class="tabBox vodBox">
        <div id="Lec" class="tabContent lecGrid">
            <div class="w-data w-box tx-left">
                <div class="w-tit NGR">2018 기미진 기특한 국어 이론요약 + 기출문제(1월-3월)</div>
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
                    <li>
                        <div class="tt1">1강</div>
                        <div class="tt2">2018 기미진 기특한 국어 이론요약</div>
                        <div class="tt3"><img src="{{ img_url('prof/icon_file.gif') }}"></div>
                    </li>
                    <li>
                        <div class="tt1">2강</div>
                        <div class="tt2">2018 기미진 기특한 국어 이론요약</div>
                        <div class="tt3"><img src="{{ img_url('prof/icon_file.gif') }}"></div>
                    </li>
                    <li>
                        <div class="tt1">3강</div>
                        <div class="tt2">2018 기미진 기특한 국어 이론요약</div>
                        <div class="tt3"><img src="{{ img_url('prof/icon_file.gif') }}"></div>
                    </li>
                    <li>
                        <div class="tt1">4강</div>
                        <div class="tt2">2018 기미진 기특한 국어 이론요약</div>
                        <div class="tt3"><img src="{{ img_url('prof/icon_file.gif') }}"></div>
                    </li>
                    <li>
                        <div class="tt1">5강</div>
                        <div class="tt2">2018 기미진 기특한 국어 이론요약</div>
                        <div class="tt3"><img src="{{ img_url('prof/icon_file.gif') }}"></div>
                    </li>
                    <li>
                        <div class="tt1">6강</div>
                        <div class="tt2">2018 기미진 기특한 국어 이론요약</div>
                        <div class="tt3"><img src="{{ img_url('prof/icon_file.gif') }}"></div>
                    </li>
                    <li>
                        <div class="tt1">7강</div>
                        <div class="tt2">2018 기미진 기특한 국어 이론요약</div>
                        <div class="tt3"><img src="{{ img_url('prof/icon_file.gif') }}"></div>
                    </li>
                    <li>
                        <div class="tt1">8강</div>
                        <div class="tt2">2018 기미진 기특한 국어 이론요약</div>
                        <div class="tt3"><img src="{{ img_url('prof/icon_file.gif') }}"></div>
                    </li>
                    <li>
                        <div class="tt1">9강</div>
                        <div class="tt2">2018 기미진 기특한 국어 이론요약</div>
                        <div class="tt3"><img src="{{ img_url('prof/icon_file.gif') }}"></div>
                    </li>
                    <li>
                        <div class="tt1">10강</div>
                        <div class="tt2">2018 기미진 기특한 국어 이론요약</div>
                        <div class="tt3"><img src="{{ img_url('prof/icon_file.gif') }}"></div>
                    </li>
                </ul>
            </div>
        </div>
        <div id="Bookmark" class="tabContent bookmarkGrid" style="display: none;">
            <div class="w-data w-box tx-left">
                <div class="w-tit NGR">
                    <span class="tx-sky-blue">북마크</span> 클릭시 북마크 시간이 설정되며,<br/>
                    내용 입력 후 <span class="tx-sky-blue">저장</span>시 북마크가 등록됩니다
                </div>
                <div class="buttonBtn bookmarkBox">
                    <ul>
                        <li>
                            <input type="text" id="S-TIME" name="S-TIME" class="iptTime" placeholder="북마크 시간을 설정 하세요." maxlength="30">
                            <button type="submit" onclick="" class="btnGray"><span>북마크</span></button>
                        </li>
                        <li>
                            <input type="text" id="S-TIME" name="S-TIME" class="iptTime" placeholder="내용을 입력하세요." maxlength="30">
                            <button type="submit" onclick="" class="btnBlue"><span>저장</span></button>
                        </li>
                    </ul>
                </div>
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
                    <li>
                        <div class="tt1"><a href="#none">X</a></div>
                        <div class="tt2">00:10:13</div>
                        <div class="tt3">북마크1</div>
                    </li>
                    <li>
                        <div class="tt1"><a href="#none">X</a></div>
                        <div class="tt2">00:10:13</div>
                        <div class="tt3">북마크2</div>
                    </li>
                    <li>
                        <div class="tt1"><a href="#none">X</a></div>
                        <div class="tt2">00:10:13</div>
                        <div class="tt3">북마크3</div>
                    </li>
                    <li>
                        <div class="tt1"><a href="#none">X</a></div>
                        <div class="tt2">00:10:13</div>
                        <div class="tt3">내용이 노출됩니다.</div>
                    </li>
                    <li>
                        <div class="tt1"><a href="#none">X</a></div>
                        <div class="tt2">00:10:13</div>
                        <div class="tt3">&nbsp;</div>
                    </li>
                    <li>
                        <div class="tt1"><a href="#none">X</a></div>
                        <div class="tt2">00:10:13</div>
                        <div class="tt3">북마크1</div>
                    </li>
                    <li>
                        <div class="tt1"><a href="#none">X</a></div>
                        <div class="tt2">00:10:13</div>
                        <div class="tt3">북마크2222222</div>
                    </li>
                </ul>
            </div>
        </div>
        <div id="Faq" class="tabContent faqGrid" style="display: none;">
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
@stop