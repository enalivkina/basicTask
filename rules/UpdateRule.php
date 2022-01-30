<?php

namespace app\rules;

use yii\rbac\Rule;

class UpdateRule extends Rule
{
    public $name = 'isUpdate';

    public function execute($user, $item, $params)
    {
        if (isset($params['exec']) && ($params['exec'] != 1)){
            return true;
        }
        else{
            return false;
        }
    }
}

