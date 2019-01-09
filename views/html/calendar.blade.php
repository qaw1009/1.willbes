@extends('willbes.pc.layouts.master')

@section('content')

<div class="datepicker-days">
    <table cellspacing="0" cellpadding="0" class="table-condensed">
        <thead>
        <tr class="month">
            <th colspan="7" class="datepicker-switch">
                <span class="prev"><a href="#none"><img src="{{ img_url('counsel/calendar_prev.png') }}"></a></span>
                2018년&nbsp;&nbsp;&nbsp;&nbsp;10월
                <span class="next"><a href="#none"><img src="{{ img_url('counsel/calendar_next.png') }}"></a></span>
            </th>
        </tr>
        <tr class="week">
            <th class="dow">일</th>
            <th class="dow">월</th>
            <th class="dow">화</th>
            <th class="dow">수</th>
            <th class="dow">목</th>
            <th class="dow">금</th>
            <th class="dow">토</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="empty">&nbsp;</td>
            <td class="day">1<button type="submit" onclick="" class="end"><span>예약마감</span></button></td>
            <td class="day">2<button type="submit" onclick="" class="end"><span>예약마감</span></button></td>
            <td class="day">3<button type="submit" onclick="" class="end"><span>예약마감</span></button></td>
            <td class="day">4<button type="submit" onclick="" class="end"><span>예약마감</span></button></td>
            <td class="day">5<button type="submit" onclick="" class="end"><span>예약마감</span></button></td>
            <td class="day">6<button type="submit" onclick="" class="end"><span>예약마감</span></button></td>
        </tr>
        <tr>
            <td class="day">7<button type="submit" onclick="" class="end"><span>예약마감</span></button></td>
            <td class="day">8<button type="submit" onclick="" class="end"><span>예약마감</span></button></td>
            <td class="day">9<button type="submit" onclick="" class="end"><span>예약마감</span></button></td>
            <td class="day">10<button type="submit" onclick="" class="end"><span>예약마감</span></button></td>
            <td class="day">11<button type="submit" onclick="" class="end"><span>예약마감</span></button></td>
            <td class="day">12<button type="submit" onclick="" class="end"><span>예약마감</span></button></td>
            <td class="day">13<button type="submit" onclick="" class="end"><span>예약마감</span></button></td>
        </tr>
        <tr>
            <td class="day">14<button type="submit" onclick="" class="end"><span>예약마감</span></button></td>
            <td class="day">15<button type="submit" onclick="" class="end"><span>예약마감</span></button></td>
            <td class="day">16<button type="submit" onclick="" class="end"><span>예약마감</span></button></td>
            <td class="day">17<button type="submit" onclick="" class="end"><span>예약마감</span></button></td>
            <td class="day">18<button type="submit" onclick="" class="end"><span>예약마감</span></button></td>
            <td class="day">19<button type="submit" onclick="" class="end"><span>예약마감</span></button></td>
            <td class="day">20<button type="submit" onclick="" class="end"><span>예약마감</span></button></td>
        </tr>
        <tr>
            <td class="day">21<button type="submit" onclick="" class="end"><span>예약마감</span></button></td>
            <td class="day">22<button type="submit" onclick="" class="end"><span>예약마감</span></button></td>
            <td class="day">23<button type="submit" onclick="" class="end"><span>예약마감</span></button></td>
            <td class="day">24<button type="submit" onclick="" class="ing"><span>예약가능</span></button></td>
            <td class="day">25<button type="submit" onclick="" class="ing"><span>예약가능</span></button></td>
            <td class="day">26<button type="submit" onclick="" class="ing"><span>예약가능</span></button></td>
            <td class="day">27<button type="submit" onclick="" class="ing"><span>예약가능</span></button></td>
        </tr>
        <tr>
            <td class="day">28<button type="submit" onclick="" class="ing"><span>예약가능</span></button></td>
            <td class="day">29<button type="submit" onclick="" class="ing"><span>예약가능</span></button></td>
            <td class="day">30<button type="submit" onclick="" class="ing"><span>예약가능</span></button></td>
            <td class="day">31<button type="submit" onclick="" class="ing"><span>예약가능</span></button></td>
            <td class="empty">&nbsp;</td>
            <td class="empty">&nbsp;</td>
            <td class="empty">&nbsp;</td>
        </tr>
        </tbody>
    </table>
</div>


<br><br><br><br>
<table border="0" cellpadding="0" cellspacing="0" class="aaaaa">

    <tbody><tr>
        <th><a href="//cop.local.willbes.net/consultManagement/index/2018/11">&lt;&lt;</a></th>
        <th colspan="5">12월&nbsp;2018</th>
        <th><a href="//cop.local.willbes.net/consultManagement/index/2019/01">&gt;&gt;</a></th>
    </tr>

    <tr>
        <td>일</td><td>월</td><td>화</td><td>수</td><td>목</td><td>금</td><td>토</td>
    </tr>

    <tr>
        <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>1</td>
    </tr>

    <tr>
        <td><span class="btn-예약마감">2</span></td>
        <td><span class="btn-예약가능">3</span></td>
        <td><span class="btn-예약마감">4</span></td>
        <td><span class="btn-예약마감">5</span></td>
        <td>6</td><td>7</td><td>8</td>
    </tr>

    <tr>
        <td>9</td><td>10</td><td>11</td><td>12</td><td>13</td><td>14</td><td>15</td>
    </tr>

    <tr>
        <td>16</td><td>17</td><td>18</td><td>19</td><td>20</td><td><div class="highlight">21</div></td><td>22</td>
    </tr>

    <tr>
        <td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td>
    </tr>

    <tr>
        <td>30</td><td>31</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
    </tr>

    </tbody></table>

@stop