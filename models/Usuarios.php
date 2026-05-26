<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%Usuarios}}".
 *
 * @property int $idusuario
 * @property string|null $email
 * @property string|null $telefono
 * @property string|null $direccion
 * @property string|null $fecharegistro
 * @property string|null $nombre
 *
 * @property Prestamos[] $prestamos
 */
class Usuarios extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%Usuarios}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'telefono', 'direccion', 'fecharegistro', 'nombre'], 'default', 'value' => null],
            [['fecharegistro'], 'safe'],
            [['email', 'telefono', 'direccion', 'nombre'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idusuario' => Yii::t('app', 'Idusuario'),
            'email' => Yii::t('app', 'Email'),
            'telefono' => Yii::t('app', 'Telefono'),
            'direccion' => Yii::t('app', 'Direccion'),
            'fecharegistro' => Yii::t('app', 'Fecharegistro'),
            'nombre' => Yii::t('app', 'Nombre'),
        ];
    }

    /**
     * Gets query for [[Prestamos]].
     *
     * @return \yii\db\ActiveQuery|PrestamosQuery
     */
    public function getPrestamos()
    {
        return $this->hasMany(Prestamos::class, ['Usuarios_idusuario' => 'idusuario']);
    }

    /**
     * {@inheritdoc}
     * @return UsuariosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UsuariosQuery(get_called_class());
    }

}
