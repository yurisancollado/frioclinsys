<?php

/**
 * This is the model class for table "cliente".
 *
 * The followings are the available columns in table 'cliente':
 * @property string $id
 * @property string $razon_social
 * @property string $rif
 * @property string $nit
 * @property string $codigo
 * @property string $direccion
 * @property string $telefono
 * @property string $representante
 * @property string $estado
 * @property string $username
 * @property string $password
 * @property string $created_at
 * @property string $last_login
 */
class Cliente extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	  public static $estado = array('1' => 'Activo', '0' => 'Inactivo');
	public function tableName()
	{
		return 'cliente';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('razon_social, rif, codigo, direccion, representante, password', 'required'),
			array('razon_social, direccion, representante', 'length', 'max'=>250),
			array('rif, nit', 'length', 'max'=>20),
			array('codigo', 'length', 'max'=>50),
			array('telefono', 'length', 'max'=>100),
			array('password', 'length', 'min'=>6,'max'=>50),
			array('username','unique', 'message'=>'Ya se encuentra registrado el Nombre de Usuario'),
			array('rif','unique', 'message'=>'Ya se encuentra registrado el Rif'),
			array('nit','unique', 'message'=>'Ya se encuentra registrado el Nit'),
			array('codigo','unique', 'message'=>'Ya se encuentra registrado el Codigo'),
			
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, razon_social, rif, nit, codigo, direccion, telefono, representante, estado, username, password, created_at, last_login', 'safe', 'on'=>'search'),
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
			'facturas' => array(self::HAS_MANY, 'Facturas', 'cliente_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'razon_social' => 'Razon Social',
			'rif' => 'Rif',
			'nit' => 'Nit',
			'codigo' => 'Codigo',
			'direccion' => 'Direccion',
			'telefono' => 'Telefono',
			'representante' => 'Representante',
			'estado' => 'Estado',
			'username' => 'Usuario',
			'password' => 'Contraseña',
			'created_at' => 'Creado',
			'last_login' => 'Ultimo Login',
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
		$criteria->compare('razon_social',$this->razon_social,true);
		$criteria->compare('rif',$this->rif,true);
		$criteria->compare('nit',$this->nit,true);
		$criteria->compare('codigo',$this->codigo,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('representante',$this->representante,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('last_login',$this->last_login,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cliente the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	/**
	 * @return un boolean si es el password son iguales o no.
	 */
	public function validatePassword($password){
		return $this->hashPassword($password)===$this->password;		
	}
	/**
	 * @return un string con el password con md5.
	 */
	public function hashPassword($password){
		return md5($password);
	}
		public function getEstado() {
		if ($this -> estado == 1)
			return 'Activo';
		elseif ($this -> estado == 0)
			return 'Inactivo';
	}

	public function getListaEstado() {
		return self::$estado;
	}
}
