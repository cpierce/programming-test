<?php
/**
 * ColorsController.php Controller
 *
 * @author Chris Pierce 
 */
class ColorsController extends Controller {
			
	/**
	 * Index Method
	 *
	 * @params void
	 * @return void
	 */
	public function index() {
		try {
			$statement = $this->registry->Database->prepare('SELECT id,name,vote_count FROM colors ORDER BY colors.name ASC');
			$statement->execute();
			while($color = $statement->fetch(PDO::FETCH_ASSOC)) {
				$colors[]['Color'] = $color;
			}
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		
		$this->registry->template->colors = $colors;
		$this->registry->template->show('Colors', 'index');
	}
	
	/**
	 * View Method
	 *
	 * Ajax Call for totalling colors from color_id
	 *
	 * @params int $color_id
	 * @return void
	 */
	public function view($color_id = null) {
		if (empty($color_id)) {
			throw new Exception('Invalid Color Id');
		}
		
		try {
			$ajax_query = 'SELECT IFNULL(SUM(number_of_votes), 0) as total FROM votes WHERE color_id = \''.$color_id.'\' LIMIT 1';
			$statement = $this->registry->Database->prepare($ajax_query);
			$statement->execute();
			$number_of_votes = $statement->fetch(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		
		echo json_encode($number_of_votes);
		exit();	
	}

}