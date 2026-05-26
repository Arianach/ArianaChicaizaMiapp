<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%Autores}}".
 *
 * @property int $idautores
 * @property string|null $nombre
 * @property string|null $nacionalidad
 *
 * @property Libros[] $libros
 */
class Autores extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%Autores}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'nacionalidad'], 'default', 'value' => null],
            [['nombre', 'nacionalidad'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idautores' => Yii::t('app', 'Idautores'),
            'nombre' => Yii::t('app', 'Nombre'),
            'nacionalidad' => Yii::t('app', 'Nacionalidad'),
        ];
    }

    /**
     * Gets query for [[Libros]].
     *
     * @return \yii\db\ActiveQuery|LibrosQuery
     */
    public function getLibros()
    {
        return $this->hasMany(Libros::class, ['Autores_idautores' => 'idautores']);
    }

    /**
     * {@inheritdoc}
     * @return AutoresQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AutoresQuery(get_called_class());
    }

}
