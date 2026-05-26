<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Autores]].
 *
 * @see Autores
 */
class AutoresQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Autores[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Autores|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
