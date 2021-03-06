<?php

/**
 * This is the model class for table "facturas".
 *
 * The followings are the available columns in table 'facturas':
 * @property string $id
 * @property string $Usuario_id
 * @property string $Cliente_id
 * @property string $estado
 * @property string $fecha
 * @property string $monto
 * @property string $binaryFile
 * @property string $fileType
 * @property string $fileName
 * @property integer $numero
 */
class Facturas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	  public static $Image="";
	public function tableName()
	{
		return 'facturas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha, monto, binaryFile, numero', 'required'),
			array('numero', 'numerical', 'integerOnly'=>true),
			array('Usuario_id, Cliente_id, estado, monto', 'length', 'max'=>10),
			array('numero','unique', 'message'=>'Ya se encuentra registrado el numero de factura'),
			
			array('fileName', 'length', 'max'=>100),
			array('fileType', 'length', 'max'=>25),
			array('fileType, fileName', 'length', 'max'=>100),
				array('binaryFile', 'file', 
	        	'types'=>'jpg, gif, png, bmp, jpeg',
	            'maxSize'=>1024 * 1024 * 10, // 10MB
	                'tooLarge'=>'La imagen es mayor de 10MB. Por favor, subir una imagen mas pequeña.',
	            'allowEmpty' => true
         	),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, Usuario_id, Cliente_id, estado, fecha, monto, binaryFile, fileType, fileName, numero', 'safe', 'on'=>'search'),
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
		'clientes' => array(self::BELONGS_TO, 'Cliente', 'Cliente_id'), 
		'usuarios' => array(self::BELONGS_TO, 'Usuario', 'Usuario_id'), );

	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'Usuario_id' => 'Usuario',
			'Cliente_id' => 'Cliente',
			'estado' => 'Estado',
			'fecha' => 'Fecha',
			'monto' => 'Monto',
			'binaryFile' => 'Imagen',
			'fileType' => 'Imagen',
			'fileName' => 'Imagen',
			'numero' => 'Numero de Factura',
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
		$criteria->compare('Usuario_id',$this->Usuario_id,true);
		$criteria->compare('Cliente_id',$this->Cliente_id,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('monto',$this->monto,true);
		$criteria->compare('binaryFile',$this->binaryFile,true);
		$criteria->compare('fileType',$this->fileType,true);
		$criteria->compare('fileName',$this->fileName,true);
		$criteria->compare('numero',$this->numero);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Facturas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function getImagen($width = 100){
		return html_entity_decode(CHtml::image(Yii::app()->controller->createUrl('facturas/loadImage', array('id'=>$this->id))
																				,'alt'
																				,array('width'=>$width)
																				));
	}
	public function clienteFactura($id = NULL) {
		$criteria = new CDbCriteria;
		$criteria -> addCondition('Cliente_id=' . $id);
		return new CActiveDataProvider($this, array('criteria' => $criteria, ));
	}
	public function getDocumento(){
		 header("Content-type: ".$this->fileType);
		 header('Content-Disposition: attachment; filename='.$this->fileName);
		 header('Content-Transfer-Encoding: binary');
		 print $this->binaryFile;
	}
	}
