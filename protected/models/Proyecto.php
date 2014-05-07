<?php

/**
 * This is the model class for table "proyectos".
 *
 * The followings are the available columns in table 'proyectos':
 * @property string $id
 * @property string $Usuario_id
 * @property string $Cliente_id
 * @property string $TipoProyecto_id
 * @property string $nombre
 * @property string $estado
 * @property string $porcentaje
 * @property string $descripcion
 * @property string $fecha_inicio
 * @property string $fecha_fin
 */
class Proyecto extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	
	 	public static $estado = array('Pendiente' => 'Pendiente', 'Finalizado' => 'Finalizado','Activo' => 'Activo');
	public function tableName()
	{
		return 'proyectos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Usuario_id, Cliente_id, TipoProyecto_id, nombre, descripcion, fecha_inicio', 'required'),
			array('Usuario_id, Cliente_id, TipoProyecto_id, estado, porcentaje', 'length', 'max'=>10),
			array('nombre', 'length', 'max'=>250),
			array('fecha_fin', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, Usuario_id, Cliente_id, TipoProyecto_id, nombre, estado, porcentaje, descripcion, fecha_inicio, fecha_fin', 'safe', 'on'=>'search'),
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
		'usuarios' => array(self::BELONGS_TO, 'Usuario', 'Usuario_id'),
		'tipoproyectos' => array(self::BELONGS_TO, 'Tipoproyecto', 'TipoProyecto_id'),
		'imagenes' => array(self::HAS_MANY, 'Imagenproyecto', 'Proyectos_id', 'condition'=>'tipo=1'),
		'documentos' => array(self::HAS_MANY, 'Imagenproyecto', 'Proyectos_id', 'condition'=>'tipo=2'),
		
		);
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
			'TipoProyecto_id' => 'Tipo Proyecto',
			'nombre' => 'Nombre',
			'estado' => 'Estado',
			'porcentaje' => 'Progreso (%)',
			'descripcion' => 'Descripcion',
			'fecha_inicio' => 'Fecha Inicio',
			'fecha_fin' => 'Fecha Fin',
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
		$criteria->compare('TipoProyecto_id',$this->TipoProyecto_id,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('porcentaje',$this->porcentaje,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('fecha_inicio',$this->fecha_inicio,true);
		$criteria->compare('fecha_fin',$this->fecha_fin,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Proyecto the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getEstado(){
		if($this->porcentaje==0)
			return "Pendiente";
		if($this->porcentaje==100)
			return "Finalizado";
		if($this->porcentaje>0 &&$this->porcentaje<100 )
			return "Activo";		
	}
	

}
