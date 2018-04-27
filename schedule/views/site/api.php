<?php $url = \yii\helpers\Url::base(true) . '/api/'; ?>

<h4>
    Получить всех преподавателей:<br/>

    <div class="api-block">
        <?= $url ?>schedule.php?cmd=getteacher
    </div>
</h4>

<hr/>

<h4>
    Получить расписание:<br/>

    <div class="api-block">
        <?= $url ?>schedule.php?cmd=schedule&daynum=d&group=g&week=w
    </div>
    <b>d</b> - номер дня(от 1 до 6) <br/>
    <b>g</b> - название группы(например ИСб-25)<br>
    <b>w</b> - четная или нечетная неделя(0 или 1)
</h4>

<hr/>

<h4>
    Получить все расписание для группа:<br/>

    <div class="api-block">
        <?= $url ?>schedule.php?cmd=all_schedule&group=g
    </div>
    <b>g</b> - название группы(например ИСб-25)<br>
</h4>

<hr/>

<h4>
    Получить список групп:<br/>

    <div class="api-block">
        <?= $url ?>schedule.php?cmd=getgroups
    </div>
</h4>

<hr/>

<h4>
    Получить расписание звонков:<br/>

    <div class="api-block">
        <?= $url ?>schedule.php?cmd=getcalls
    </div>
</h4>