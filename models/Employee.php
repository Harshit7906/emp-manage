<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string|null $phone
 * @property string $department
 * @property string $position
 * @property float|null $salary
 * @property string $hire_date
 * @property int $status 1=Active, 0=Inactive
 */
class Employee extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    const DEPARTMENT_PHP = 1;
    const DEPARTMENT_FLUTTER = 2;
    const DEPARTMENT_ANDROID = 3;
    const DEPARTMENT_IOS = 4;
    const DEPARTMENT_REACT = 5;
    const DEPARTMENT_HR = 6;
    const DEPARTMENT_MARKETING = 7;

    public static function getDepartmentOptions()
    {
        return [
            self::DEPARTMENT_PHP => 'PHP',
            self::DEPARTMENT_FLUTTER => 'Flutter',
            self::DEPARTMENT_ANDROID => 'Android',
            self::DEPARTMENT_IOS => 'IOS',
            self::DEPARTMENT_REACT => 'React',
            self::DEPARTMENT_HR => 'HR',
            self::DEPARTMENT_MARKETING => 'Marketing'
        ];
    }

    public function getDepartment()
    {
        $list = self::getDepartmentOptions();
        return isset($list[$this->department]) ? $list[$this->department] : 'Not Defined';
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['phone', 'salary'], 'default', 'value' => null],
            [['status'], 'default', 'value' => 1],
            [['first_name', 'last_name', 'email', 'department', 'position', 'hire_date'], 'required'],
            [['salary'], 'number'],
            [['hire_date'], 'safe'],
            [['status'], 'integer'],
            [['first_name', 'last_name', 'department', 'position'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 20],
            [['email'], 'unique'],
            [['email'], 'email'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'department' => 'Department',
            'position' => 'Position',
            'salary' => 'Salary',
            'hire_date' => 'Hire Date',
            'status' => 'Status',
        ];
    }

    public function getStatusText()
    {
        return $this->status ? 'Active' : 'Inactive';
    }
}
