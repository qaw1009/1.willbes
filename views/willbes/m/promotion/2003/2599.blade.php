@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->

    <style type="text/css">

        .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
        .evtCtnsBox img {width:100%; max-width:720px;}

        .evtCtnsBox .wrap { margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        .check {margin-top:20px; color:#333; font-size:17px;font-weight:bold;}
        .check label {cursor:pointer}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px;}
        .check a.infotxt {display:inline-block; padding:12px 20px 10px 20px;color:#fff; background:#000; margin-left:50px; border-radius:20px}
        .check a.infotxt:hover {background:#FA7C01}

        /* 이용안내 */
        .evtInfo {padding:100px 0; background:#f4f4f4; color:#363636; line-height:1.5}
        .guide_box{ margin:0 auto; padding:0 50px; text-align:left; word-break:keep-all}        .guide_box h2 {font-size:30px; margin-bottom:30px;}
        .guide_box dt{margin-bottom:10px; color:#fff; background:#000; display:inline-block; padding:5px 10px; font-weight:bold; margin-right:10px; font-size:16px;}        
        .guide_box dd{margin-bottom:50px;}
        .guide_box dl{color:#555;font-size:15px;font-weight:bold;}
        .guide_box dd li{margin-bottom:5px; list-style:decimal; margin-left:20px;font-size:14px;}
        .guide_box dd li.none {list-style:none; margin-left:0}
        .guide_box dd:last-child {margin:0}

        @@media only screen and (max-width: 374px)  {
        .check {margin-top:20px; color:#333; font-size:15px;font-weight:bold;}
        .check input {border:2px solid #000;height:20px; width:20px;}
        .check a.infotxt {display:block;width:200px;color:#fff; background:#000; margin-left:50px; border-radius:20px;padding:10px;margin:10px auto;}
        }

        @@media only screen and (min-width: 375px) and (max-width: 640px) {
        .check {margin-top:20px; color:#333; font-size:16px;font-weight:bold;}
        .check input {border:2px solid #000;height:20px; width:20px;}
        .check a.infotxt {display:block;width:200px;color:#fff; background:#000; margin-left:50px; border-radius:20px;padding:10px;margin:10px auto;}
        }

    </style>    
   
    <div id="Container" class="Container NSK c_both">

        <div class="evtCtnsBox evtTop">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2599_mtop.jpg" alt="" />
                <a href="https://pass.willbes.net/m/support/notice/show/cate/3035?board_idx=389692&s_cate_code=3035" target="_blank" style="position: absolute;left: 35.5%;top: 70.38%;width: 29.52%;height: 3.01%;z-index: 2;"></a>
            </div>           
        </div>
        
        <div class="evtCtnsBox evt01">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2599_m01.jpg" alt="" />
                <a href="javascript:go_PassLecture('192749')" style="position: absolute;left: 33.69%;top: 83.58%;width: 31.8%;height: 7.51%;z-index: 2;"></a>
            </div>
            <div class="check" id="chkInfo">   
                <label>
                    <input name="ischk" type="checkbox" value="Y" />
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#ctsInfo" class="infotxt">이용안내확인하기 ↓</a>
            </div>     
        </div>

        <div class="evtCtnsBox">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2599_m_apply.jpg" alt="" />
                <a href="https://pass.willbes.net/promotion/index/cate/3035/code/2357" target="_blank" style="position: absolute;left: 26.5%;top: 84.18%;width: 46.8%;height: 10.51%;z-index: 2;"></a>
            </div>            
        </div>
        
        <div class="evtCtnsBox">            
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2599_m02.jpg" alt="" />                    
        </div>

        <div class="evtCtnsBox">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2599_m04.jpg" alt="" />
                <a href="https://cafe.daum.net/LAW-KDJTEAM/I7Bo" target="_blank" style="position: absolute;left: 33.5%;top: 82.68%;width: 33.8%;height: 6.51%;z-index: 2;"></a>
            </div>            
        </div>

        <div class="evtCtnsBox evtInfo" id="ctsInfo">
            <div class="guide_box">
                <h2 class="NSK-Black">이용안내</h2>
                <dl>
                    <dt>상품구성</dt>
                    <dd>
                        <ol>
                            <li>본 상품은 윌비스김동진법원팀 교수진의 5순환 과정을 배수 제한 없이 무제한 수강 가능합니다.</li>
                            <li>제공 강의 : 민법(김동진), 민사소송법(이덕훈), 형법(문형석), 형사소송법(유안석), 헌법(이국령), 국어(박재현), 영어(박초롱), 한국사(임진석) 교수별 5순환 과정</li>                          
                        </ol>
                    </dd>
                    <dt>수강기간</dt>
                    <dd>
                        <ol>
                            <li>2021년 4월 12일 업로드시부터 (4월 12일 이후 등록 시 등록일부터) 2022년 6월 25일 법원공채시험일까지 제공됩니다.</li> 
                            <li>각 순환별 강의는 순환 일정에 따라 강의가 진행된 후 2~3일(평일 기준) 내로 순차 업로드 되어 제공됩니다.</li>          
                        </ol>
                    </dd>
                    <dt>수강방법 및 제한</dt>
                    <dd>
                        <ol>
                            <li>홈페이지 [내강의실] 메뉴에서 [강좌추가] 메뉴를 통해 강좌를 추가합니다.</li>
                            <li>원하는 과목/교수/강좌를 선택하여 등록하신 후 수강이 가능합니다.</li>
                            <li>수강 시 이용가능한 기기는 ｢PC 2대 or 모바일 2대 or PC&모바일 각 1대｣로 총 2대의 기기로 제한됩니다.</li>
                            <li>PC/모바일 기기 변경 등 단말기 초기화가 필요한 경우, 계정당 최초 1회에 한해 직접 초기화가 가능하며, 추후 단말기 초기화는 고객센터에서 관련 내용 확인 후 최대 2회까지 추가 진행 가능합니다.</li>
                            <li>본 패키지 상품은 구매 후 수강이 가능한 시점부터 바로 수강이 시작되며, 수강기간 조정 및 정지가 불가능합니다.</li>
                        </ol>
                    </dd>
                    <dt>교재관련</dt>
                    <dd>
                        <ol>
                            <li>모든 교재는 별도로 구매하셔야 합니다. 각 강좌별 교재는 [내강의실] 내 [교재구매]를 선택하여 구매 가능합니다.</li>
                            <li>강의자료는 각 강좌별 개별 강의에 첨부파일의 형식으로 제공됩니다. 필요한 자료는 개별 출력하여야 합니다.</li>
                            <li>5법 W지문연습 및 한국사 800제 교재가 필수적으로 필요한 강좌입니다. 전범위 모의고사를 응시한 후 해설 내용은 교재를 통해 확인하고, 강의를 통해 풀이하는 형식으로 진행됩니다.</li>
                            <li>국어, 영어의 경우 별도의 교재 없이 모의고사 문제 및 해설지로 수강이 가능합니다.</li>
                            <li>5순환 모의고사 문제 및 해설지는 택배를 통해 실물로 배송됩니다. 구체적인 방법은 개강 전 별도 고지해드립니다.</li>      
                        </ol>
                    </dd>
                    <dt>환불관련</dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내에 전액환불 가능합니다. 단, 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액환불대상이 됩니다.</li>
                            <li>자료 또는 모바일 강의 다운로드 시에도 이용 및 수강 여부와 무관하게 수강한 것으로 간주됩니다.</li>
                            <li>본 상품은 할인가가 적용된 특별기획상품이므로 부분환불은 정가 대비 사용일수에 따라 차감 후 환불됩니다. 구체적인 환불기준은 환불 시 고객센터로 문의 시 자세히 안내 받으실 수 있습니다.</li>                      
                        </ol>
                    </dd>                 
                    <dt>유의사항</dt>
                    <dd>
                        <ol>
                            <li>본 상품은 특별기획상품으로 쿠폰 할인, 적립금 사용 등 혜택이 적용되지 않습니다.</li>
                            <li>학원 사정에 의해 일부 강사의 강의가 부득이하게 진행되지 않거나 교수가 변경될 수 있습니다.</li>
                            <li>아이디 불법 공유 적발 시 회원자격 박탈 및 환불불가 조치되며, 민.형사상 책임을 질 수 있습니다.</li>                      
                        </ol>
                    </dd>
                </dl>
            </div>
        </div>

    </div>

  <!-- End Container -->
  
    <script type="text/javascript">         
        function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ site_url('/m/package/show/cate/3035/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }
    </script>
@stop