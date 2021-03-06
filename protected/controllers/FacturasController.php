<?php

class FacturasController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	public $menu2;
	public $bolmenu2=false;
	public $nombreCliente;


	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','loadImage','listafactura','descarga','mifactura'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		if(Yii::app()->user->getState('tipoUsuario')=="usuario"){	
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
		}else
			$this->render('mifactura_detalle',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Facturas;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Facturas']))
		{
			$model->attributes=$_POST['Facturas'];
			$model->Usuario_id=Yii::app()->user->id; 
			if (!empty($_FILES['Facturas']['tmp_name']['binaryFile'])) {
				$file = CUploadedFile::getInstance($model, 'binaryFile');
				$model -> fileName = $file -> name;
				$model -> fileType = $file -> type;
				$fp = fopen($file -> tempName, 'r');
				$content = fread($fp, filesize($file -> tempName));
				fclose($fp);
				$model -> binaryFile = $content;
			}
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['Facturas']))
		{
			$model->attributes=$_POST['Facturas'];
			if (!empty($_FILES['Facturas']['tmp_name']['binaryFile'])) {
				$file = CUploadedFile::getInstance($model, 'binaryFile');
				$model -> fileName = $file -> name;
				$model -> fileType = $file -> type;
				$fp = fopen($file -> tempName, 'r');
				$content = fread($fp, filesize($file -> tempName));
				fclose($fp);
				$model -> binaryFile = $content;
			}
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Facturas');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Facturas('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Facturas']))
			$model->attributes=$_GET['Facturas'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	public function actionListafactura()
	{
		$model=new Facturas('search');
		$model->unsetAttributes();
		$this->render('listafactura',array(
			'model'=>$model,
		));
	

	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Facturas the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Facturas::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Facturas $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='facturas-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionloadImage($id) {
		$model = $this -> loadModel($id);
		header('Content-Type: ' . $model -> fileType);
		print $model -> binaryFile;

	}
	public function actionDescarga($id){
		$model = $this -> loadModel($id);	
		$model->documento;
	}
	public function actionMifactura()
	{
	
		$dataProvider = Facturas::model() -> clienteFactura(Yii::app()->user->id);
		$this -> render('mifactura',
		array('dataProvider' => $dataProvider, 
		'model' => new Facturas, ));

	}
}
