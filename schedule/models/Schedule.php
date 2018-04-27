<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_schedule".
 *
 * @property integer $id
 * @property integer $day
 * @property integer $num
 * @property string $week
 * @property integer $id_subject
 * @property integer $id_teacher
 * @property string $office
 * @property string $stud_group
 * @property integer $stud_subgroup
 */
class Schedule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_schedule';
    }

    public function getTeacher()
    {
        return $this->hasOne(Teacher::className(), ['id' => 'id_teacher']);
    }

    public function getSubject()
    {
        return $this->hasOne(Subject::className(), ['id' => 'id_subject']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['day', 'num', 'week', 'id_subject', 'id_teacher', 'office', 'stud_group', 'stud_subgroup'], 'required'],
            [['day', 'num', 'id_subject', 'id_teacher', 'stud_subgroup'], 'integer'],
            [['week'], 'string'],
            [['office'], 'string', 'max' => 15],
            [['stud_group'], 'string', 'max' => 25]
        ];
    }

    public static function getDayName($num = NULL)
    {
        $names = [
            1 => 'Понедельник',
            2 => 'Вторник',
            3 => 'Среда',
            4 => 'Четверг',
            5 => 'Пятница',
            6 => 'Суббота'
        ];

        return $num == NULL ? $names : $names[$num];
    }

    public static function getWhoCome($num){
        if($num == 3)
            return "Всем";
        else
            return $num;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'day' => 'День недели',
            'num' => 'Номер пары',
            'week' => 'Четная/нечетная неделя',
            'id_subject' => 'Id Subject',
            'id_teacher' => 'Id Teacher',
            'office' => 'Кабинет',
            'stud_group' => 'Группа',
            'stud_subgroup' => 'Подгруппа',
        ];
    }
}
