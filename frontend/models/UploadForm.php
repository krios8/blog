<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $urlimg = [];
            $urlimg['src'] = 'img/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
            $urlimg['name'] = $this->imageFile->baseName;
            $this->imageFile->saveAs($urlimg['src']);
            return $urlimg;
        } else {
            return false;
        }
    }
}
