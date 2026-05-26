<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Detalleprestamo]].
 *
 * @see Detalleprestamo
 */
class DetalleprestamoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Detalleprestamo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Detalleprestamo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
