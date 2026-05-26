<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%Detalleprestamo}}".
 *
 * @property int $idprestamo
 * @property string|null $Detalleprestamocol
 * @property int|null $cantidad
 * @property int $Prestamos_idPrestamos
 * @property int $Libros_idLibros
 *
 * @property Libros $librosIdLibros
 * @property Prestamos $prestamosIdPrestamos
 */
class Detalleprestamo extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%Detalleprestamo}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Detalleprestamocol', 'cantidad'], 'default', 'value' => null],
            [['cantidad', 'Prestamos_idPrestamos', 'Libros_idLibros'], 'integer'],
            [['Prestamos_idPrestamos', 'Libros_idLibros'], 'required'],
            [['Detalleprestamocol'], 'string', 'max' => 45],
            [['Libros_idLibros'], 'exist', 'skipOnError' => true, 'targetClass' => Libros::class, 'targetAttribute' => ['Libros_idLibros' => 'idLibros']],
            [['Prestamos_idPrestamos'], 'exist', 'skipOnError' => true, 'targetClass' => Prestamos::class, 'targetAttribute' => ['Prestamos_idPrestamos' => 'idPrestamos']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idprestamo' => Yii::t('app', 'Idprestamo'),
            'Detalleprestamocol' => Yii::t('app', 'Detalleprestamocol'),
            'cantidad' => Yii::t('app', 'Cantidad'),
            'Prestamos_idPrestamos' => Yii::t('app', 'Prestamos Id Prestamos'),
            'Libros_idLibros' => Yii::t('app', 'Libros Id Libros'),
        ];
    }

    /**
     * Gets query for [[LibrosIdLibros]].
     *
     * @return \yii\db\ActiveQuery|LibrosQuery
     */
    public function getLibrosIdLibros()
    {
        return $this->hasOne(Libros::class, ['idLibros' => 'Libros_idLibros']);
    }

    /**
     * Gets query for [[PrestamosIdPrestamos]].
     *
     * @return \yii\db\ActiveQuery|PrestamosQuery
     */
    public function getPrestamosIdPrestamos()
    {
        return $this->hasOne(Prestamos::class, ['idPrestamos' => 'Prestamos_idPrestamos']);
    }

    /**
     * {@inheritdoc}
     * @return DetalleprestamoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DetalleprestamoQuery(get_called_class());
    }

}
