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
    public $imageFile;


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
            [['imagen'], 'string', 'max' => 255],
            [['Autores_idautores'], 'exist', 'skipOnError' => true, 'targetClass' => Autores::class, 'targetAttribute' => ['Autores_idautores' => 'idautores']],
            [['Categorias_idCategoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categorias::class, 'targetAttribute' => ['Categorias_idCategoria' => 'idCategoria']],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
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
            'imagen' => Yii::t('app', 'imagen'),
        ];
    }
    public function upload()
  {
    if ($this->validate()) {
        // Guardar primero si es un nuevo registro (para obtener id)
        if ($this->isNewRecord) {
            if (!$this->save(false)) {
                return false;
            }
        }

        if ($this->imageFile instanceof \yii\web\UploadedFile) {
            // Nombre único del archivo
            $filename = $this->idLibros . '_libros_' . date('Ymd_His') . '.' . $this->imageFile->extension;

            // Ruta completa donde se guardará (carpeta: imagen)
            $path = Yii::getAlias('@webroot/imagen/') . $filename;

            // Crear carpeta si no existe
            if (!file_exists(dirname($path))) {
                mkdir(dirname($path), 0777, true);
            }

            // Guardar el archivo físico
            if ($this->imageFile->saveAs($path)) {
                // Eliminar imagen anterior si existe y es diferente
                if ($this->imagen && $this->imagen !== 'imagen/' . $filename) {
                    $this->deleteImagen();
                }

                // Guardar ruta en la base de datos
                $this->imagen = 'imagen/' . $filename;
            }
        }

        // Guardar los cambios en la base de datos
        return $this->save(false);
    }

    return false;
 }   
 public function deleteImagen()
{
    $file = Yii::getAlias('@webroot/') . $this->imagen;
    if (file_exists($file)) {
        unlink($file);
    }
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
