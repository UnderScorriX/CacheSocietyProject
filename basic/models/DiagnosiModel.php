<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "diagnosi".
 *
 * @property int $id
 * @property string $percorso
 * @property resource $file
 */
class DiagnosiModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'diagnosi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['percorso'], 'required'],
            [['file'], 'string'],
            [['percorso'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'percorso' => 'Percorso',
            'file' => 'File',
        ];
    }

    public function setFile($blob) {
        $this->file = $blob;
        $this->file = UploadedFile::getInstance($this,'file');
    }

    public function setSaveFile($id, $data, $ora) {
        $this->file->saveAs('ArchivioDiagnosi/Diagnosi '.$id. ' - '. $data . $ora .'.docx');
        $this->percorso = 'ArchivioDiagnosi/Diagnosi '.$id. ' - '. $data . $ora .'.docx';
    }
}
