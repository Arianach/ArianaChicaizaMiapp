<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%Categorias}}".
 *
 * @property int $idCategoria
 * @property string|null $nombres
 *
 * @property Libros[] $libros
 */
class Categorias extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%Categorias}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombres'], 'default', 'value' => null],
            [['nombres'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idCategoria' => Yii::t('app', 'Id Categoria'),
            'nombres' => Yii::t('app', 'Nombres'),
        ];
    }

    /**
     * Gets query for [[Libros]].
     *
     * @return \yii\db\ActiveQuery|LibrosQuery
     */
    public function getLibros()
    {
        return $this->hasMany(Libros::class, ['Categorias_idCategoria' => 'idCategoria']);
    }

    /**
     * {@inheritdoc}
     * @return CategoriasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategoriasQuery(get_called_class());
    }

}
