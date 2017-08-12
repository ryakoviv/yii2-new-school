<?php
namespace common\models;

use Yii;
use yii\base\Model;

class UserStatus extends Model
{
    const ADMIN = 1;
    const TEACHER = 2;
    const PARENT = 3;
    const STUDENT = 4;
}