<?php

/**
 * This is the model class for table "imagenproyecto".
 *
 * The followings are the available columns in table 'imagenproyecto':
 * @property string $id
 * @property string $Proyectos_id
 * @property string $binaryFile
 * @property string $fileType
 * @property string $fileName
 * @property string $tipo
 * @property string $estado
 */
class Imagenproyecto extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'imagenproyecto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Proyectos_id, binaryFile, fileType, fileName', 'required'),
			array('Proyectos_id, tipo, estado', 'length', 'max'=>10),
			array('fileType, fileName', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, Proyectos_id, binaryFile, fileType, fileName, tipo, estado', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'proyecto' => array(self::BELONGS_TO, 'Proyecto', 'Proyecto_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'Proyectos_id' => 'Proyectos',
			'binaryFile' => 'Seleccione un Archivo',
			'fileType' => 'File Type',
			'fileName' => 'File Name',
			'tipo' => 'Tipo',
			'estado' => 'Estado',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('Proyectos_id',$this->Proyectos_id,true);
		$criteria->compare('binaryFile',$this->binaryFile,true);
		$criteria->compare('fileType',$this->fileType,true);
		$criteria->compare('fileName',$this->fileName,true);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('estado',$this->estado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Imagenproyecto the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function getImagen($width = 100){
		return html_entity_decode(CHtml::image(Yii::app()->controller->createUrl('proyecto/loadImage', array('id'=>$this->id))
																				,'alt'
																				,array('width'=>$width)
																				));
	}
	public function getDocumento(){
		
		
		 header("Content-type: ".$this->fileType);
		 header('Content-Disposition: attachment; filename='.$this->fileName);
		 header('Content-Transfer-Encoding: binary');
		 print ($this->binaryFile);
	}
}
