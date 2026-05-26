<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%Libros}}".
 *
 * @property int $idLibros
 * @property string|null $titulo
 * @property string|null $añopublicacion
 * @property int $Autores_idautores
 * @property int $Categorias_idCategoria
 *
 * @property Autores $autoresIdautores
 * @property Categorias $categoriasIdCategoria
 * @property Detalleprestamo[] $detalleprestamos
 */
class Libros extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%Libros}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo', 'añopublicacion'], 'default', 'value' => null],
            [['añopublicacion'], 'safe'],
            [['Autores_idautores', 'Categorias_idCategoria'], 'required'],
            [['Autores_idautores', 'Categorias_idCategoria'], 'integer'],
            [['titulo'], 'string', 'max' => 45],
            [['Autores_idautores'], 'exist', 'skipOnError' => true, 'targetClass' => Autores::class, 'targetAttribute' => ['Autores_idautores' => 'idautores']],
            [['Categorias_idCategoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categorias::class, 'targetAttribute' => ['Categorias_idCategoria' => 'idCategoria']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idLibros' => Yii::t('app', 'Id Libros'),
            'titulo' => Yii::t('app', 'Titulo'),
            'añopublicacion' => Yii::t('app', 'Añopublicacion'),
            'Autores_idautores' => Yii::t('app', 'Autores Idautores'),
            'Categorias_idCategoria' => Yii::t('app', 'Categorias Id Categoria'),
        ];
    }

    /**
     * Gets query for [[AutoresIdautores]].
     *
     * @return \yii\db\ActiveQuery|AutoresQuery
     */
    public function getAutoresIdautores()
    {
        return $this->hasOne(Autores::class, ['idautores' => 'Autores_idautores']);
    }

    /**
     * Gets query for [[CategoriasIdCategoria]].
     *
     * @return \yii\db\ActiveQuery|CategoriasQuery
     */
    public function getCategoriasIdCategoria()
    {
        return $this->hasOne(Categorias::class, ['idCategoria' => 'Categorias_idCategoria']);
    }

    /**
     * Gets query for [[Detalleprestamos]].
     *
     * @return \yii\db\ActiveQuery|DetalleprestamoQuery
     */
    public function getDetalleprestamos()
    {
        return $this->hasMany(Detalleprestamo::class, ['Libros_idLibros' => 'idLibros']);
    }

    /**
     * {@inheritdoc}
     * @return LibrosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LibrosQuery(get_called_class());
    }

}
