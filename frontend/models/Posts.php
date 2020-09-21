<?php

namespace app\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "posts".
 *
 * @property int $id
 * @property int $categoria_id
 * @property int $name
 * @property string $text
 * @property int $img_id
 * @property int $id_author
 *
 * @property Dlike[] $dlikes
 * @property Img $img
 * @property User $author
 * @property Categoria $categoria
 */
class Posts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['categoria_id', 'name', 'text', 'id_author'], 'required'],
            [['categoria_id', 'img_id', 'id_author'], 'integer'],
            [['name','text'], 'string'],
            [['img_id'], 'exist', 'skipOnError' => true, 'targetClass' => Img::className(), 'targetAttribute' => ['img_id' => 'id']],
            [['id_author'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_author' => 'id']],
            [['categoria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['categoria_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'categoria_id' => 'Категории',
            'name' => 'Название',
            'text' => 'Текст поста',
            'img_id' => 'Картинка',
            'id_author' => 'Id Author',
        ];
    }

    /**
     * Gets query for [[Dlikes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDlikes()
    {
        return $this->hasMany(Dlike::className(), ['id_post' => 'id']);
    }

    /**
     * Gets query for [[Img]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImg()
    {
        return $this->hasOne(Img::className(), ['id' => 'img_id']);
    }

    /**
     * Gets query for [[Author]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'id_author']);
    }

    /**
     * Gets query for [[Categoria]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categoria::className(), ['id' => 'categoria_id']);
    }
}
