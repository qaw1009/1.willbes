@extends('willbes.pc.layouts.player_master')

@section('script')
    <script type="text/javascript">
        ratio = {{empty($data['ratio']) == true ? '16' : $data['ratio']}};

        $(document).ready(function (){
            getScreenSize();
            setScreenReSizeVal();
            screenResize();
            fnDefense();

            config = {
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

            media = {
                url: "{{$data['url']}}",
                @if($data['isIntro'] === true)
                intro: "http://hd.willbes.gscdn.com/warning/warning_new_5.mp4",
                @endif
                autoPlay: true,
                startTime: star
            };

            fnStartPlayer();

            realPlayerTime = new Speedplaytime(player);
        });
    </script>
@stop

@section('subframe')
    <div class="vodTabs">
        <ul class="tabWrap vodWrap two NGEB">
            <li><a href="#Info" class="on">강좌정보</a></li>
            <li><a href="#Sbj">강의목차</a></li>
        </ul>
        <div class="tabBox vodBox">
            <div id="Info" class="tabContent infoGrid">
                <div class="w-data tx-left">
                    <div class="w-subtit NG">국어<span class="row-line">|</span>기미진교수님</div>
                    <div class="w-tit NGR">2018 기미진 기특한 국어 이론요약 + 기출문제(1월-3월)</div>
                    <ul class="w-info">
                        <li>· 강좌정보: 문제풀이 ( 진행중<span class="row-line">|</span>2배수 )</li>
                        <li>· 수강기간: <span class="tx-red">50일</span></li>
                        <li>· 강의수: 16강</li>
                    </ul>
                </div>
                <div class="vodcartBox NGR">
                    <ul>
                        <li>
                            <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">
                            <span class="tit">강좌:</span>
                            <span class="txt">80,000원<span class="discount tx-red">↓ 20%</span></span>
                        </li>
                        <li>
                            <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">
                            <span class="tit">교재: </span>
                        </li>
                        <li class="last">
                            <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">
                            <span class="tit">수강생 교재:</span>
                            <span class="txt">2018 기특한 국어 기출 문제집</span><br/><br/>
                            <div class="price">판매중: 80,000원<span class="discount tx-red">↓10%</span></div>
                        </li>
                    </ul>
                </div>
                <div class="buttonBtn cartBtn">
                    <ul>
                        <li>
                            <button type="submit" onclick="" class="btnGray"><span>장바구니</span></button>
                        </li>
                        <li>
                            <button type="submit" onclick="" class="btnBlue"><span>바로결제</span></button>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="Sbj" class="tabContent sbjGrid" style="display: none;">
                <div class="w-data tx-left">
                    <div class="w-subtit NG">국어<span class="row-line">|</span>기미진교수님</div>
                    <div class="w-tit NGR">2018 기미진 기특한 국어 이론요약 + 기출문제(1월-3월)</div>
                    <ul class="w-info">
                        <li>· 강좌정보: 문제풀이 ( 진행중<span class="row-line">|</span>2배수 )</li>
                        <li>· 수강기간: <span class="tx-red">50일</span></li>
                        <li>· 강의수: 16강</li>
                    </ul>
                </div>
                <div class="vodlistBox vodSbjBox">
                    <ul class="top">
                        <li>
                            <div class="tt1">NO</div>
                            <div class="tt2">강의명</div>
                            <div class="tt3">시간</div>
                        </li>
                    </ul>
                    <ul class="list sbj">
                        <li>
                            <div class="tt1">1강</div>
                            <div class="tt2">2018 기미진 기특한 국어 이론요약</div>
                            <div class="tt3">50분</div>
                        </li>
                        <li>
                            <div class="tt1">2강</div>
                            <div class="tt2">2018 기미진 기특한 국어 이론요약</div>
                            <div class="tt3">50분</div>
                        </li>
                        <li>
                            <div class="tt1">3강</div>
                            <div class="tt2">2018 기미진 기특한 국어 이론요약</div>
                            <div class="tt3">50분</div>
                        </li>
                        <li>
                            <div class="tt1">4강</div>
                            <div class="tt2">2018 기미진 기특한 국어 이론요약</div>
                            <div class="tt3">50분</div>
                        </li>
                        <li>
                            <div class="tt1">5강</div>
                            <div class="tt2">2018 기미진 기특한 국어 이론요약</div>
                            <div class="tt3">50분</div>
                        </li>
                        <li>
                            <div class="tt1">6강</div>
                            <div class="tt2">2018 기미진 기특한 국어 이론요약</div>
                            <div class="tt3">50분</div>
                        </li>
                        <li>
                            <div class="tt1">7강</div>
                            <div class="tt2">2018 기미진 기특한 국어 이론요약</div>
                            <div class="tt3">50분</div>
                        </li>
                        <li>
                            <div class="tt1">8강</div>
                            <div class="tt2">2018 기미진 기특한 국어 이론요약</div>
                            <div class="tt3">50분</div>
                        </li>
                        <li>
                            <div class="tt1">9강</div>
                            <div class="tt2">2018 기미진 기특한 국어 이론요약</div>
                            <div class="tt3">50분</div>
                        </li>
                        <li>
                            <div class="tt1">10강</div>
                            <div class="tt2">2018 기미진 기특한 국어 이론요약</div>
                            <div class="tt3">50분</div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    @stop