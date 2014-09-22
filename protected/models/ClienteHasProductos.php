<?php

/**
 * This is the model class for table "cliente_has_productos".
 *
 * The followings are the available columns in table 'cliente_has_productos':
 * @property string $Cliente_id
 * @property string $Productos_id
 */
 
class ClienteHasProductos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cliente_has_productos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Cliente_id, Productos_id', 'required'),
			array('Cliente_id, Productos_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Cliente_id, Productos_id', 'safe', 'on'=>'search'),
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
		 'productos' => array(self::BELONGS_TO, 'Producto', 'Productos_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Cliente_id' => 'Cliente',
			'Productos_id' => 'Productos',
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

		$criteria->compare('Cliente_id',$this->Cliente_id,true);
		$criteria->compare('Productos_id',$this->Productos_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ClienteHasProductos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function clienteProducto($id = NULL) {
		$criteria = new CDbCriteria;
		$criteria -> addCondition('Cliente_id=' . $id);
		return new CActiveDataProvider($this, array('criteria' => $criteria, ));
	}
	public function clienteFactura($id = NULL) {
		$criteria = new CDbCriteria;
		$criteria -> addCondition('Cliente_id=' . $id);
		return new CActiveDataProvider($this, array('criteria' => $criteria, ));
	}
	
}
