<?php

namespace common\service;

use Symfony\Component\Yaml\Yaml;
use Yii;

class HasAccess
{
    public static function check($class, $property = '')
    {
        $config = Yii::$app->params['accessfile'];
        $canAccess = true;
        $data = Yaml::parseFile($config);
        $groups = \Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId());
        $default = $data['default'];
        $foundClass = null;
        foreach ($data['rules'] as $rule) {
            if ($rule['class'] == $class) {
                $foundClass = $rule;
            }
        }
        $foundClass = $foundClass ?? $default[$class];

        if (isset($foundClass['properties'])) {
            foreach ($foundClass['properties'] as $classProperty) {
                if ($classProperty['name'] == $property) {
                    if (empty($groups)) {
                        $groups = array((object) array('name' => 'other'));
                    }
                    foreach ($groups as $group) {
                        $permission = $classProperty['access'][$group->name];
                        switch ($permission) {
                            case 'o':
                            case 'O':
                                return true;
                                break;
                            case 'n':
                            case 'N':
                                return false;
                        }
                    }
                }
            }
        }

        $class = ucfirst($class);
        if (
            \Yii::$app->user->can('read' . $class) ||
            \Yii::$app->user->can('create' . $class) ||
            \Yii::$app->user->can('delete' . $class) ||
            \Yii::$app->user->can('update' . $class)
        ) {
            $canAccess = true;
        }
        return $canAccess;
    }
}
