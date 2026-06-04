<?php

namespace app\models;
use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface 
{
    public $password;  // Campo temporal para el formulario
    
    public static function tableName()
    {
        return '{{%user}}';
    }

    public function rules()
    {
        return [
            [['username', 'nombre', 'apellido', 'password', 'auth_key', 'access_token', 'roles'], 'required'],
            [['nombre', 'apellido'], 'string', 'max' => 150],
            [['password_hash', 'username'], 'string', 'max' => 255],
            [['auth_key', 'access_token', 'roles'], 'string', 'max' => 45],
        ];
    }


    /**
     * {@inheritdoc}
     */
   public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($auth_key)
    {
        return $this->auth_key === $auth_key;
    }

    /**
     * Password
     */

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Tokens
     */

    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public function generateAccessToken()
    {
        $this->access_token = Yii::$app->security->generateRandomString();
    }

    /**
     * Hooks
     */

    public function beforeValidate()
    {
        if ($this->isNewRecord) {
            $this->generateAuthKey();
            $this->generateAccessToken();
        }
        return parent::beforeValidate();
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {

            // Si el usuario escribió una contraseña, aplica hash
            if (!empty($this->password)) {
                $this->setPassword($this->password);
            }

            return true;
        }
        return false;
    }
}
