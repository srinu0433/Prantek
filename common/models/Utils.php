<?php
namespace common\models;

use frontend\models\Dropdowns;
use frontend\models\Employees;
use common\models\Institutes;
use frontend\models\LookupData;
use yii\helpers\ArrayHelper;

class Utils{
	public static function getAllDropDowns($status=NULL){
		if(is_null($status)){
			$array = Dropdowns::find()->all();
		} else {
			$array = Dropdowns::findAll(['status'=>$status]);
		}
		$list = ArrayHelper::map($array, 'id', 'dropdown_name');
		return $list;
	}
	
	public static function getDropdownName($id){
		$arr = self::getAllDropDowns();
		return $arr[$id];
	}
	
	public static function getAllInstitutes($status=NULL){
		$array = Institutes::find()->all();
		$list = ArrayHelper::map($array, 'id', 'company_name');
		return $list;
	}
	
	public static function getInstituteName($id){
		$arr = self::getAllInstitutes();
		return $arr[$id];
	}
	
	public static function getAllEmployees($status=NULL){
		$array = Employees::find()->all();
		$list = ArrayHelper::map($array, 'id', 'f_name');
		return $list;
	}
	
	public static function getEmployeeName($id){
		$arr = self::getAllDropDowns();
		return $arr[$id];
	}
	
	public static function getStatusArr(){
		return array(1=>'Active',0=>'Inactive');
	}
	
	public static function getStatusVal($id){
		$statusArr = self::getStatusArr();
		return $statusArr[$id];
	}
	
	public static function getLookupdata($status=NULL){
		if(is_null($status)){
			$array = LookupData::find()->all();
		} else {
			$array = LookupData::findAll(['status'=>$status]);
		}
		$list = ArrayHelper::map($array, 'id', 'dd_value');
		return $list;
	}
	
	public static function getLookupdataVal($id){
		$arr = self::getLookupdata();
		return $arr[$id];
	}
	
	public static function getCurrentDateTime(){
		if (function_exists('date_default_timezone_set'))
		{
			date_default_timezone_set('Asia/Kolkata');
		}
		$date = (new \DateTime())->format('Y-m-d H:i:s');
		return $date;
	}
	
	public static function getLogoDisplayArr(){
		return [1=>'Text',2=>'Logo'];
	}
	
	public static function getLogoDisplayVal($id){
		$arr = self::getLogoDisplayArr();
		return $arr[$id];
	}
	
	public static function getGengersList(){
		return ['1'=>'Male','2'=>'Female','3'=>'Others'];
	}
	
	public static function getGender($id){
		$arr = self::getGengersList();
		return $arr[$id];
	}
	
	public static function getBankAccountTypeArr(){
		return ['Savings'=>'Savings','Current'=>'Current','Dmat'=>'Dmat'];
	}
	
	public static function getBankAccountTye($id){
		$arr = self::getBankAccountTypeArr();
		return $arr[$id];
	}
}