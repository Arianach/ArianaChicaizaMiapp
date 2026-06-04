<?php

namespace app\models;

use app\models\User;
use Yii;

/**
 * This is the model class for table "{{%Prestamos}}".
 *
 * @property int $idPrestamos
 * @property string|null $fechaprestamo
 * @property string|null $fechadevolucion
 * @property int $Usuarios_idusuario
 *
 * @property Detalleprestamo[] $detalleprestamos
 * @property Usuarios $usuariosIdusuario
 */
class Prestamos extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%Prestamos}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fechaprestamo', 'fechadevolucion'], 'default', 'value' => null],
            [['Usuarios_idusuario'], 'required'],
            [['Usuarios_idusuario'], 'integer'],
            [['fechaprestamo', 'fechadevolucion'], 'string', 'max' => 45],
            [['Usuarios_idusuario'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['Usuarios_idusuario' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPrestamos' => Yii::t('app', 'Id Prestamos'),
            'fechaprestamo' => Yii::t('app', 'Fechaprestamo'),
            'fechadevolucion' => Yii::t('app', 'Fechadevolucion'),
            'Usuarios_idusuario' => Yii::t('app', 'Usuarios Idusuario'),
        ];
    }

    /**
     * Gets query for [[Detalleprestamos]].
     *
     * @return \yii\db\ActiveQuery|DetalleprestamoQuery
     */
    public function getDetalleprestamos()
    {
        return $this->hasMany(Detalleprestamo::class, ['Prestamos_idPrestamos' => 'idPrestamos']);
    }

    /**
     * Gets query for [[UsuariosIdusuario]].
     *
     * @return \yii\db\ActiveQuery|UsuariosQuery
     */
    public function getUsuariosIdusuario()
    {
        return $this->hasOne(User::class, ['id' => 'Usuarios_idusuario']);
    }

    /**
     * {@inheritdoc}
     * @return PrestamosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PrestamosQuery(get_called_class());
    }

}
