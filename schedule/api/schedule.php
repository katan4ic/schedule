<?php
header("Access-Control-Allow-Origin: *");

define("APP_VERSION", 0.4);
define("API_VERSION", 0.1);

class Schedule{
	private $_connect;
	private $_teachers = [];
	private $_subjects = [];
	private $_calls = [];
	private $_shedule = [];
	private $_groups = [];

	public $_group, $_daynum;

	private $_cache = false;

	/* Подключемся к базе данных */
	public function __construct(){
		require("db.php");
		$this->_connect = mysqli_connect($host, $username, $password, $database);

		if (!$this->_connect){
		    die(mysqli_connect_error());
		}

		mysqli_set_charset($this->_connect, "utf8");

		if($this->_cache){
			$this->loadAllData();
		}else{
			$this->getAllCalls();
			$this->getAllTeachers();
			$this->getAllSubjects();
			$this->getAllGroup();
		}
	}

	// Загрузка данных из кэша
	public function loadAllData(){
		if(!is_dir('cache')){
			mkdir('cache');
		}

		$calls_file = 'cache/calls.json';

		if(file_exists($calls_file)){
			$this->_calls = json_decode(file_get_contents($calls_file));
		}

		$teacher_file = 'cache/teachers.json';

		if(file_exists($teacher_file)){
			$this->_teachers = json_decode(file_get_contents($teacher_file));
		}

		$subjects_file = 'cache/subjects.json';

		if(file_exists($teacher_file)){
			$this->_subjects = json_decode(file_get_contents($subjects_file));
		}

		$groups_file = 'cache/subjects.json';

		if(file_exists($groups_file)){
			$this->_groups = json_decode(file_get_contents($groups_file));
		}
	}

	/* Заносим в массив всё расписание звонков */
	private function getAllCalls(){
		if ($result = mysqli_query($this->_connect, "SELECT * FROM tb_calls")){ 

		    /* Выборка результатов запроса */ 
		    while($row = mysqli_fetch_assoc($result)){
		        $this->_calls[$row["num"]]["start"] = $row["start"];
		        $this->_calls[$row["num"]]["end"] = $row["end"];
		    }

		    file_put_contents('cache/calls.json', json_encode($this->_calls));

		    /* Освобождаем используемую память */ 
		    mysqli_free_result($result); 
		}
	}

	/* Заносим всех преподавателей в массив */
	private function getAllTeachers(){
		if ($result = mysqli_query($this->_connect, "SELECT * FROM tb_teacher")){

		    /* Выборка результатов запроса */ 
		    while($row = mysqli_fetch_assoc($result)){
		        $this->_teachers[] = $row;
		    }

		    file_put_contents('cache/teachers.json', json_encode($this->_teachers));

		    /* Освобождаем используемую память */ 
		    mysqli_free_result($result); 
		}
	}

	/* Заносим все предметы в массив */
	private function getAllSubjects(){
		if ($result = mysqli_query($this->_connect, "SELECT * FROM tb_subject")){

		    /* Выборка результатов запроса */ 
		    while($row = mysqli_fetch_assoc($result)){
		        $this->_subjects[] = $row;
		    }

		    file_put_contents('cache/subjects.json', json_encode($this->_subjects));

		    /* Освобождаем используемую память */ 
		    mysqli_free_result($result); 
		}
	}

	/* Заносим все группы в массив */
	private function getAllGroup(){
		if ($result = mysqli_query($this->_connect, "SELECT * FROM tb_group")){

		    /* Выборка результатов запроса */ 
		    while($row = mysqli_fetch_assoc($result)){
		        $this->_groups[] = $row;
		    }

		    file_put_contents('cache/groups.json', json_encode($this->_groups));

		    /* Освобождаем используемую память */ 
		    mysqli_free_result($result); 
		}
	}

	/* Получаем все предметы */
	public function getSubjects(){
		return $this->_subjects;
	}

	/* Получаем всех преподавателей */
	public function getTeachers(){
		return $this->_teachers;
	}

	/* Получаем расписание звонков */
	public function getCalls(){
		return $this->_calls;
	}

	/* Получаем все группы */
	public function getGroups(){
		return $this->_groups;
	}

	public function getSubject($id){
		$result = [];

		foreach ($this->_subjects as $key => $value) {
	        if($value["id"] == $id){
	            $result = $value;

	            break;
	        }
    	}

    	return $result;
	}


	public function getTeacher($id){
		$result = NULL;

		foreach ($this->_teachers as $key => $value) {
	        if($value["id"] == $id){
	            $result = $value["name"];
	            break;
	        }
    	}

    	return $result;
	}

	// Получаем версию приложения
	public function getVersion(){
		return APP_VERSION;
	}

	public function buildSchedule($week = null, $all = false){
		$i = 0;

		if($week == 0){
			$week = "even";
		}else{
			$week = "odd";
		}

		if($all){
			$query = mysqli_query($this->_connect, "SELECT * FROM tb_schedule WHERE stud_group = '{$this->_group}' ORDER BY num ASC");
		}else{
			$query = mysqli_query($this->_connect, "SELECT * FROM tb_schedule WHERE stud_group = '{$this->_group}' AND day = {$this->_daynum} AND week = '{$week}' ORDER BY num ASC");
		}

		while($row = mysqli_fetch_assoc($query)){
		    $this->_shedule[$i]['id'] = $row['id'];
		    $this->_shedule[$i]['num'] = $row['num'];
		    $this->_shedule[$i]['day'] = $row['day'];
		    $this->_shedule[$i]['week'] = $row['week'];
		    $this->_shedule[$i]['office'] = $row['office'];
		    $this->_shedule[$i]['teacher'] = $this->getTeacher($row['id_teacher']);
		    $this->_shedule[$i]['stud_subgroup'] = $row['stud_subgroup'];
		    $this->_shedule[$i]['subject'] = $this->getSubject($row['id_subject']);
		    $this->_shedule[$i]["start"] = $this->_calls[$row["num"]]["start"];
	        $this->_shedule[$i]["end"] = $this->_calls[$row["num"]]["end"];

		    $i++;
		}

		return json_encode($this->_shedule);
	}
}

$obj = new Schedule();

//$request = file_get_contents("php://input");
//if($request != NULL){
//	// Если данные берутся с приложения
//    $data = json_decode($request);
//
//    try{
//    	$cmd = trim($data->cmd);
//    	$group = trim($data->group);
//    	$day_num = intval($data->day_num);
//    	$week = $data->week;
//	}catch(Exception $e){
//		dir($e->getMessage());
//	}
//}else{
	// Если данные берутся с браузера
	$cmd = trim($_GET['cmd']);
    $group = trim($_GET['group']);
    $day_num = intval($_GET['daynum']);
    $week = $_GET['week'];
//}

if($cmd == 'schedule'){
	$obj->_group = $group;
	$obj->_daynum = $day_num;
	echo $obj->buildSchedule($week, false);
}else if($cmd == 'all_schedule'){
	$obj->_group = $group;
	echo $obj->buildSchedule(null, true);
}else if($cmd == 'getteacher'){
	echo json_encode($obj->getTeachers());
}else if($cmd == 'getcalls'){
	echo json_encode($obj->getcalls());
}else if($cmd == 'getversion'){
	echo $obj->getVersion();
}else if($cmd == 'getgroups'){
	echo json_encode($obj->getGroups());
}