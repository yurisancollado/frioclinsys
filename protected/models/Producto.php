<?php

/**
 * This is the model class for table "productos".
 *
 * The followings are the available columns in table 'productos':
 * @property string $id
 * @property string $TipoProducto_id
 * @property string $Marca_id
 * @property string $Usuario_id
 * @property string $nombre
 * @property string $modelo
 * @property string $especificacion
 * @property string $costo
 * @property string $estado
 */
class Producto extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	 public $check;
	public function tableName()
	{
		return 'productos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TipoProducto_id, Marca_id, Usuario_id, nombre, modelo, costo', 'required'),
			array('TipoProducto_id, Marca_id, Usuario_id, costo, estado', 'length', 'max'=>10),
			array('nombre', 'length', 'max'=>250),
			array('modelo', 'length', 'max'=>50),
			array('modelo','unique', 'message'=>'Ya se encuentra registrado el Modelo'),
			array('costo', 'numerical'),
			
			array('especificacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, TipoProducto_id, Marca_id, Usuario_id, nombre, modelo, especificacion, costo, estado', 'safe', 'on'=>'search'),
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
			 'marca'    => array(self::BELONGS_TO, 'Marca',    'Marca_id'),
			  'tipo'    => array(self::BELONGS_TO, 'TipoProducto',    'TipoProducto_id'),
			'imagenes' => array(self::HAS_MANY, 'Imagenproducto', 'Productos_Id', 'condition'=>'tipo=2'),
			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'TipoProducto_id' => 'Tipo Producto',
			'Marca_id' => 'Marca',
			'Usuario_id' => 'Usuario',
			'nombre' => 'Nombre',
			'modelo' => 'Modelo',
			'especificacion' => 'Especificacion',
			'costo' => 'Costo (Bs.)',
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
		$criteria->compare('TipoProducto_id',$this->TipoProducto_id,true);
		$criteria->compare('Marca_id',$this->Marca_id,true);
		$criteria->compare('Usuario_id',$this->Usuario_id,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('modelo',$this->modelo,true);
		$criteria->compare('especificacion',$this->especificacion,true);
		$criteria->compare('costo',$this->costo,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('check',$this->check);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Producto the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function getCheck(){
		$model = ClienteHasProductos::model() -> findByAttributes(array('Cliente_id' => $_GET['cliente'], 'Productos_id' => $this->id));
		
		if($model)
		 return 1;
		else 
		 return 0;
	}
	public function getCheck2(){
		$model = ClienteHasProductos::model() -> findByAttributes(array('Cliente_id' => $_GET['cliente'], 'Productos_id' => $this->id));
		
		if($model)
		 return "Si";
		else 
		 return "No";
	}
	public function getCheck3(){
		$model = ClienteHasProductos::model() -> findByAttributes(array('Cliente_id' => $_GET['cliente'], 'Productos_id' => $this->id));
		
		if($model)
		 return "checked";
		else 
		 return false;
	}
}
