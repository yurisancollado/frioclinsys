<?php

class ProductoController extends Controller {
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/column2';
	public $menu2;
	public $bolmenu2 = false;
	public $nombreCliente;

	/**
	 * @return array action filters
	 */
	public function filters() {
		return array('accessControl', // perform access control for CRUD operations
		'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules() {
		return array( array('allow', // allow all users to perform 'index' and 'view' actions
		'actions' => array('index', 'view'), 'users' => array('*'), ), array('allow', // allow authenticated user to perform 'create' and 'update' actions
		'actions' => array('create', 'update', 'imagenes', 'imagenes', 'loadImage', 'loadImageCenter', 'descarga', 'eliminar', 'asociarproducto', 'ajaxupdate', 'listaproducto'), 'users' => array('@'), ), array('allow', // allow admin user to perform 'admin' and 'delete' actions
		'actions' => array('admin', 'delete'), 'users' => array('admin'), ), array('deny', // deny all users
		'users' => array('*'), ), );
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id) {
		$this -> render('view', array('model' => $this -> loadModel($id), ));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate() {
		$model = new Producto;

		// Uncomment the following line if AJAX validation is needed
		$this -> performAjaxValidation($model);

		if (isset($_POST['Producto'])) {
			$model -> attributes = $_POST['Producto'];
			$model -> Usuario_id = Yii::app() -> user -> id;

			if ($model -> save())
				$this -> redirect(array('view', 'id' => $model -> id));
		}

		$this -> render('create', array('model' => $model, ));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id) {
		$model = $this -> loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		$this -> performAjaxValidation($model);

		if (isset($_POST['Producto'])) {
			$model -> attributes = $_POST['Producto'];
			if ($model -> save())
				$this -> redirect(array('view', 'id' => $model -> id));
		}

		$this -> render('update', array('model' => $model, ));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id) {
		$this -> loadModel($id) -> delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if (!isset($_GET['ajax']))
			$this -> redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Producto');
		$this -> render('index', array('dataProvider' => $dataProvider, ));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin() {
		$model = new Producto('search');
		$model -> unsetAttributes();
		// clear any default values
		if (isset($_GET['Producto']))
			$model -> attributes = $_GET['Producto'];

		$this -> render('admin', array('model' => $model, ));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Producto the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id) {
		$model = Producto::model() -> findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Producto $model the model to be validated
	 */
	protected function performAjaxValidation($model) {
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'producto-form') {
			echo CActiveForm::validate($model);
			Yii::app() -> end();
		}
	}

	public function actionImagenes($id) {
		$producto = $this -> loadModel($id);
		$model = new Imagenproducto;
		$model -> Productos_id = $id;
		if (!empty($_FILES['Imagenproducto']['tmp_name']['binaryFile'])) {
			$file = CUploadedFile::getInstance($model, 'binaryFile');
			$model -> fileName = $file -> name;
			$model -> fileType = $file -> type;
			$fp = fopen($file -> tempName, 'r');
			$content = fread($fp, filesize($file -> tempName));
			fclose($fp);
			$model -> binaryFile = $content;
			$model -> tipo = "2";

		}
		if ($model -> save())
			$this -> redirect(array('imagenes', 'id' => $model -> Productos_id));
		$this -> render('imagenes', array('producto' => $producto, 'model' => $model, ));
	}

	public function actionloadImage($id) {
		$model = Imagenproducto::model() -> findByPk($id);
		header('Content-Type: ' . $model -> fileType);
		print $model -> binaryFile;

	}

	public function actionloadImageCenter($id) {
		$model = Imagenproducto::model() -> findByPk($id);
		header('Content-Type: ' . $model -> fileType);
		echo "<div style='margin:auto auto auto auto'>";
		print $model -> binaryFile;
		echo "</div>";

	}

	public function actionDescarga($id) {
		$file = Imagenproducto::model() -> findbyPk($id);
		$file -> documento;
	}

	public function actionEliminar($id, $pag = null) {
		$file = Imagenproducto::model() -> findbyPk($id);
		$productos_id = $file -> Productos_id;
		$file -> delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if (!isset($_GET['ajax'])) {
			if ($pag !== NULL) {
				if ($pag == "doc")
					$this -> redirect(array('documentos', 'id' => $productos_id));
				else
					$this -> redirect(array('imagenes', 'id' => $productos_id));
			} else
				$this -> redirect(array('imagenes', 'id' => $productos_id));
		}
	}

	public function actionAsociarproducto() {
		$model = new Producto('search');
		$model -> unsetAttributes();
		// clear any default values
		if (isset($_GET['Producto']))
			$model -> attributes = $_GET['Producto'];
		$this -> render('asociarproducto', array('model' => $model, ));

	}

	public function actionAjaxupdate() {
		$act = $_GET['act'];
		$id = $_GET['cliente'];

		$autoIdAll = $_POST['autoId'];

		if ($act == 'doDeleteAll') {
			$listmodel = ClienteHasProductos::model() -> findAllByAttributes(array('Cliente_id' => $id));
			foreach ($listmodel as $model) {
				if ($model -> delete())
					echo 'ok';
			}
		} else {
			if (count($autoIdAll) > 0) {
				foreach ($autoIdAll as $autoId) {
					if ($act == 'doAdd') {
						$model2 = ClienteHasProductos::model() -> findByAttributes(array('Cliente_id' => $id, 'Productos_id' => $autoId));
						if (!$model2) {
							$model = new ClienteHasProductos;
							$model -> Cliente_id = $id;
							$model -> Productos_id = $autoId;
							if ($model -> save())
								echo 'ok';
						}
					}
					if ($act == 'doDelete') {
						$model = ClienteHasProductos::model() -> findByAttributes(array('Cliente_id' => $id, 'Productos_id' => $autoId));
						if ($model)
							if ($model -> delete())
								echo 'ok';
							else
								echo 'NO elimina';
						else
							echo 'NO Modelo';
					}
				}
			}
		}
	}

	public function actionListaproducto() {
		$model = new ClienteHasProductos('search');
		$model -> unsetAttributes();
		$this -> render('listaproducto', array('model' => $model ));

	}

}
