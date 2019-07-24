@extends('html.m.layouts.master')

@section('content')
<link href="/public/css/willbes/promotion/2002_1332M.css" rel="stylesheet">


<!-- Container -->
<div id="Container" class="Container NG c_both">
    <div class="predictWrap">
        <div class="willbes-Tit"> 
            합격예측 풀서비스 <span class="NGEB">사전예약</span>
        </div>
        <div class="marktxt2">빠르고 간편한 모바일 전용 채점 서비스 입니다.</div>            
    	<div class="tg-note">
    		<div class="tg-tit"> <a href="#none">채점 시 유의사항<img src="{{ img_url('m/mypage/icon_arrow_off_white.png') }}"></a></div>
    		<div class="tg-cont">
    			<ul>
    				<li>
    					성적 신뢰도를 위해 최초채점을 제외하고 2회까지만 재채점을 통해 수정이 가능합니다.
    				</li>
    				<li>
						채점하는 방식은 본인의 상황에 맞게 선택할 수 있습니다.<br />
                        - '일반채점' : 문제창에서 바로 문제를 확인하면서 OMR 정답지에 답을 체크 (PC)<br />
                        - '빠른채점'은 시험지를 다운받아 문제를 풀어본 후, 문항별 선택 번호만 입력 (PC/모바일)<br />
                        - '직접입력'은 별도 채점 없이 본인의 점수를 직접 입력 (PC/모바일)                        
					</li>
    				<li>
    					채점 후 ‘완료’ 버튼을 반드시 눌러야 전형정보 관리에 성적이 반영됩니다.
    				</li>
    				<li>
    					기본정보는 사전예약 기간에만(~8/30) 수정이 가능하며, 본 서비스 오픈 후에는(8/31~) 수정이 불가합니다.
    				</li>
                    <li>
                    	자세한 합격예측 분석 데이터는 PC버전에서 확인 가능합니다.
					</li>
    			</ul>    			
    		</div>
        </div>
        <!-- //tg-note -->

        <div class="markMbtn2">
        	<a href="#none" class="btn2">기본정보입력</a>     	
            <a href="javascript:alert('기본정보를 저장하고 채점해주세요.');" >채점 및 성적확인</a>
        </div>

        <h4 class="markingTit1">결과보기</h4>
        <div class="mt10 mr10 tx-right">* 채점 횟수:  <span class="tx-blue">1회 참여</span> / 총 3회 </div>
        <form name="frm"  id="frm" action="" method="post">
            <div>
                <table cellspacing="0" cellpadding="0" class="table_type table_type2">
                    <col width="25%" />
                    <col width="25%" />
                    <col width="25%" />
                    <col width="*" />
                    <thead>
                        <tr>
                            <th>과목 </th>
                            <th>원점수 </th>
                            <th>조정점수 </th>
                            <th>정오표 </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>공통과목1</th>
                            <td>101점 </td>
                            <td>101점 </td>
                            <td rowspan="5" class="tx-center"><a href="#none" onclick="openWin('mypoint')" class="mypoint">확인</a></td>
                        </tr>
                        <tr>
                            <th>공통과목2</th>
                            <td>101점 </td>
                            <td>101점 </td>
                        </tr>
                        <tr>
                            <th>선택과목1 </th>
                            <td>101점 </td>
                            <td>101점 </td>
                        </tr>
                        <tr>
                            <th>선택과목2 </th>
                            <td>101점 </td>
                            <td>101점 </td>
                        </tr>
                        <tr>
                            <th>선택과목3 </th>
                            <td>101점 </td>
                            <td>101점 </td>
                        </tr>
                    </tbody>
                </table>
                <div class="mt10 tx-center">
                    자세한 합격예측 분석 데이터는 PC버전에서 
                    확인 가능합니다.
                </div>
                <div class="markSbtn1">
                    <a href="#none">재채점하기</a>
                </div>
            </div>           
        </form>       
        
        <div id="mypoint" class="willbes-Layer-marking">
            <a class="closeBtn" href="#none" onclick="closeWin('mypoint')">
                <img src="{{ img_url('prof/close.png') }}">
            </a>
            <div class="Layer-Tit">정오표</div>
            <div class="Layer-Cont">                
                <ul class="markTab markTab2">
                    <li><a href="#tab1">공통과목1</a></li>
                    <li><a href="#tab2">공통과목2</a></li>
                    <li><a href="#tab3">선택과목1</a></li>
                    <li><a href="#tab4">선택과목2</a></li>
                    <li><a href="#tab5">선택과목3</a></li>
                </ul>
                <div id="tab1">
                    <table cellspacing="0" cellpadding="0" class="table_type table_type3">
                        <col />
                        <tr>
                            <th>구분</th>
                            <th>정오</th>
                            <th>정답</th>
                            <th>내답</th>
                            <th>구분</th>
                            <th>정오</th>
                            <th>정답</th>
                            <th>내답</th>
                        </tr>
                        <tr>
                            <th>11</th>
                            <td>○</td>
                            <td>1</td>
                            <td>1</td>
                            <th>1</th>
                            <td>○</td>
                            <td>1</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th>12</th>
                            <td>○</td>
                            <td>2</td>
                            <td>2</td>
                            <th>2</th>
                            <td>○</td>
                            <td>2</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <th>13</th>
                            <td>○</td>
                            <td>3</td>
                            <td>3</td>
                            <th>3</th>
                            <td>○</td>
                            <td>3</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <th>14</th>
                            <td>○</td>
                            <td>4</td>
                            <td>4</td>
                            <th>4</th>
                            <td>○</td>
                            <td>4</td>
                            <td>4</td>
                        </tr>
                        <tr>
                            <th>15</th>
                            <td>○</td>
                            <td>1</td>
                            <td>1</td>
                            <th>5</th>
                            <td>○</td>
                            <td>1</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th>16</th>
                            <td>×</td>
                            <td>2</td>
                            <td>1</td>
                            <th>6</th>
                            <td>×</td>
                            <td>2</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th>17</th>
                            <td>×</td>
                            <td>3</td>
                            <td>1</td>
                            <th>7</th>
                            <td>×</td>
                            <td>3</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th>18</th>
                            <td>×</td>
                            <td>4</td>
                            <td>1</td>
                            <th>8</th>
                            <td>×</td>
                            <td>4</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th>19</th>
                            <td>○</td>
                            <td>1</td>
                            <td>1</td>
                            <th>9</th>
                            <td>○</td>
                            <td>1</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th>20</th>
                            <td>×</td>
                            <td>2</td>
                            <td>1</td>
                            <th>10</th>
                            <td>×</td>
                            <td>2</td>
                            <td>1</td>
                        </tr>
                    </table>
                    <div class="markingPoint"><span>원점수</span> 40</div>
                </div>
                <div id="tab2">
                    <table cellspacing="0" cellpadding="0" class="table_type table_type3">
                        <col />
                        <tr>
                            <th>구분</th>
                            <th>정오</th>
                            <th>정답</th>
                            <th>내답</th>
                            <th>구분</th>
                            <th>정오</th>
                            <th>정답</th>
                            <th>내답</th>
                        </tr>
                        <tr>
                            <th>11</th>
                            <td>○</td>
                            <td>1</td>
                            <td>1</td>
                            <th>1</th>
                            <td>○</td>
                            <td>1</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th>12</th>
                            <td>○</td>
                            <td>2</td>
                            <td>2</td>
                            <th>2</th>
                            <td>○</td>
                            <td>2</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <th>13</th>
                            <td>○</td>
                            <td>3</td>
                            <td>3</td>
                            <th>3</th>
                            <td>○</td>
                            <td>3</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <th>14</th>
                            <td>○</td>
                            <td>4</td>
                            <td>4</td>
                            <th>4</th>
                            <td>○</td>
                            <td>4</td>
                            <td>4</td>
                        </tr>
                        <tr>
                            <th>15</th>
                            <td>○</td>
                            <td>1</td>
                            <td>1</td>
                            <th>5</th>
                            <td>○</td>
                            <td>1</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th>16</th>
                            <td>×</td>
                            <td>2</td>
                            <td>1</td>
                            <th>6</th>
                            <td>×</td>
                            <td>2</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th>17</th>
                            <td>×</td>
                            <td>3</td>
                            <td>1</td>
                            <th>7</th>
                            <td>×</td>
                            <td>3</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th>18</th>
                            <td>×</td>
                            <td>4</td>
                            <td>1</td>
                            <th>8</th>
                            <td>×</td>
                            <td>4</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th>19</th>
                            <td>○</td>
                            <td>1</td>
                            <td>1</td>
                            <th>9</th>
                            <td>○</td>
                            <td>1</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th>20</th>
                            <td>×</td>
                            <td>2</td>
                            <td>1</td>
                            <th>10</th>
                            <td>×</td>
                            <td>2</td>
                            <td>1</td>
                        </tr>
                    </table>
                    <div class="markingPoint"><span>원점수</span> 80</div>
                </div>
                <div id="tab3">
                    <table cellspacing="0" cellpadding="0" class="table_type table_type3">
                        <col />
                        <tr>
                            <th>구분</th>
                            <th>정오</th>
                            <th>정답</th>
                            <th>내답</th>
                            <th>구분</th>
                            <th>정오</th>
                            <th>정답</th>
                            <th>내답</th>
                        </tr>
                        <tr>
                            <th>11</th>
                            <td>○</td>
                            <td>1</td>
                            <td>1</td>
                            <th>1</th>
                            <td>○</td>
                            <td>1</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th>12</th>
                            <td>○</td>
                            <td>2</td>
                            <td>2</td>
                            <th>2</th>
                            <td>○</td>
                            <td>2</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <th>13</th>
                            <td>○</td>
                            <td>3</td>
                            <td>3</td>
                            <th>3</th>
                            <td>○</td>
                            <td>3</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <th>14</th>
                            <td>○</td>
                            <td>4</td>
                            <td>4</td>
                            <th>4</th>
                            <td>○</td>
                            <td>4</td>
                            <td>4</td>
                        </tr>
                        <tr>
                            <th>15</th>
                            <td>○</td>
                            <td>1</td>
                            <td>1</td>
                            <th>5</th>
                            <td>○</td>
                            <td>1</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th>16</th>
                            <td>×</td>
                            <td>2</td>
                            <td>1</td>
                            <th>6</th>
                            <td>×</td>
                            <td>2</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th>17</th>
                            <td>×</td>
                            <td>3</td>
                            <td>1</td>
                            <th>7</th>
                            <td>×</td>
                            <td>3</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th>18</th>
                            <td>×</td>
                            <td>4</td>
                            <td>1</td>
                            <th>8</th>
                            <td>×</td>
                            <td>4</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th>19</th>
                            <td>○</td>
                            <td>1</td>
                            <td>1</td>
                            <th>9</th>
                            <td>○</td>
                            <td>1</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th>20</th>
                            <td>×</td>
                            <td>2</td>
                            <td>1</td>
                            <th>10</th>
                            <td>×</td>
                            <td>2</td>
                            <td>1</td>
                        </tr>
                    </table>
                    <div class="markingPoint"><span>원점수</span> 70</div>
                </div>
                <div id="tab4">
                    <table cellspacing="0" cellpadding="0" class="table_type table_type3">
                        <col />
                        <tr>
                            <th>구분</th>
                            <th>정오</th>
                            <th>정답</th>
                            <th>내답</th>
                            <th>구분</th>
                            <th>정오</th>
                            <th>정답</th>
                            <th>내답</th>
                        </tr>
                        <tr>
                            <th>11</th>
                            <td>○</td>
                            <td>1</td>
                            <td>1</td>
                            <th>1</th>
                            <td>○</td>
                            <td>1</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th>12</th>
                            <td>○</td>
                            <td>2</td>
                            <td>2</td>
                            <th>2</th>
                            <td>○</td>
                            <td>2</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <th>13</th>
                            <td>○</td>
                            <td>3</td>
                            <td>3</td>
                            <th>3</th>
                            <td>○</td>
                            <td>3</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <th>14</th>
                            <td>○</td>
                            <td>4</td>
                            <td>4</td>
                            <th>4</th>
                            <td>○</td>
                            <td>4</td>
                            <td>4</td>
                        </tr>
                        <tr>
                            <th>15</th>
                            <td>○</td>
                            <td>1</td>
                            <td>1</td>
                            <th>5</th>
                            <td>○</td>
                            <td>1</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th>16</th>
                            <td>×</td>
                            <td>2</td>
                            <td>1</td>
                            <th>6</th>
                            <td>×</td>
                            <td>2</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th>17</th>
                            <td>×</td>
                            <td>3</td>
                            <td>1</td>
                            <th>7</th>
                            <td>×</td>
                            <td>3</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th>18</th>
                            <td>×</td>
                            <td>4</td>
                            <td>1</td>
                            <th>8</th>
                            <td>×</td>
                            <td>4</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th>19</th>
                            <td>○</td>
                            <td>1</td>
                            <td>1</td>
                            <th>9</th>
                            <td>○</td>
                            <td>1</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th>20</th>
                            <td>×</td>
                            <td>2</td>
                            <td>1</td>
                            <th>10</th>
                            <td>×</td>
                            <td>2</td>
                            <td>1</td>
                        </tr>
                    </table>
                    <div class="markingPoint"><span>원점수</span> 50</div>
                </div>
                <div id="tab5">
                    <table cellspacing="0" cellpadding="0" class="table_type table_type3">
                        <col />
                        <tr>
                            <th>구분</th>
                            <th>정오</th>
                            <th>정답</th>
                            <th>내답</th>
                            <th>구분</th>
                            <th>정오</th>
                            <th>정답</th>
                            <th>내답</th>
                        </tr>
                        <tr>
                            <th>11</th>
                            <td>○</td>
                            <td>1</td>
                            <td>1</td>
                            <th>1</th>
                            <td>○</td>
                            <td>1</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th>12</th>
                            <td>○</td>
                            <td>2</td>
                            <td>2</td>
                            <th>2</th>
                            <td>○</td>
                            <td>2</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <th>13</th>
                            <td>○</td>
                            <td>3</td>
                            <td>3</td>
                            <th>3</th>
                            <td>○</td>
                            <td>3</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <th>14</th>
                            <td>○</td>
                            <td>4</td>
                            <td>4</td>
                            <th>4</th>
                            <td>○</td>
                            <td>4</td>
                            <td>4</td>
                        </tr>
                        <tr>
                            <th>15</th>
                            <td>○</td>
                            <td>1</td>
                            <td>1</td>
                            <th>5</th>
                            <td>○</td>
                            <td>1</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th>16</th>
                            <td>×</td>
                            <td>2</td>
                            <td>1</td>
                            <th>6</th>
                            <td>×</td>
                            <td>2</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th>17</th>
                            <td>×</td>
                            <td>3</td>
                            <td>1</td>
                            <th>7</th>
                            <td>×</td>
                            <td>3</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th>18</th>
                            <td>×</td>
                            <td>4</td>
                            <td>1</td>
                            <th>8</th>
                            <td>×</td>
                            <td>4</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th>19</th>
                            <td>○</td>
                            <td>1</td>
                            <td>1</td>
                            <th>9</th>
                            <td>○</td>
                            <td>1</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <th>20</th>
                            <td>×</td>
                            <td>2</td>
                            <td>1</td>
                            <th>10</th>
                            <td>×</td>
                            <td>2</td>
                            <td>1</td>
                        </tr>
                    </table>
                    <div class="markingPoint"><span>원점수</span> 60</div>
                </div>
            </div>
        </div>
    </div>  
    <!-- predictWrap //-->
    
    <div class="goTopbtn">
        <a href="javascript:link_go();">
            <img src="{{ img_url('m/main/icon_top.png') }}">
        </a>
    </div>
    <!-- Topbtn -->

</div>
<!-- End Container -->

<script type="text/javascript">
    $(function() {
        $('.tg-tit a').click(function() {
            var $lec_buy_table = $('.tg-cont');

            if ($lec_buy_table.is(':hidden')) {
                $lec_buy_table.show().css('visibility','visible');
                $('.tg-tit a img').attr('src','/public/img/willbes/m/mypage/icon_arrow_off_white.png');
            } else {
                $lec_buy_table.hide().css('visibility','hidden');
                $('.tg-tit a img').attr('src','/public/img/willbes/m/mypage/icon_arrow_on_white.png');
            }
        });
    });

    /*tab*/
    $(document).ready(function(){
        $('.markTab').each(function(){
            var $active, $content, $links = $(this).find('a');
            $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
            $active.addClass('active');
        
            $content = $($active[0].hash);
        
            $links.not($active).each(function () {
            $(this.hash).hide()});
        
            // Bind the click event handler
            $(this).on('click', 'a', function(e){
            $active.removeClass('active');
            $content.hide();
        
            $active = $(this);
            $content = $(this.hash);
        
            $active.addClass('active');
            $content.show();
        
            e.preventDefault()})})}
        ); 

</script>
@stop