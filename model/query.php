<?php
namespace model;

class Query extends \DB\SQL\Mapper {

    public function __construct(\DB\SQL $db, string $table='') {
        parent::__construct($db, $table);
	}

    public function get_all(string $sql = '') {		
       return $this->db->exec($sql);
    }

	public function post_add (\Base $f3, array $filter = [] ) {	
		$this->copyFrom('POST', $filter);
		$this->save();			
		return true;	
	}

	public function put_update($id, array $filter = [] ) {
		$this->load(["id=?, $id"]);
		if(!$this->dry()) {
			$this->copyFrom('POST', $filter);
			$this->update();				
			return true;
		}		
		return false;
	}

	public function findById (\Base $f3, array $filter = [] ) {			
		$mapper = $this->find(["id=?, $id"]);
		if($mapper !=null) {
			$mapper->copyTo('POST');
			return true;			
		}
		return false;
	}

	public function delete ($id ) {			
		$mapper = $this->find(["id=?, $id"]);
		$mapper->delete();
		return true;
	}


	public function get_one($id) {				
		$mapper = $this->find(["id=?, $id"]);
		if($mapper !=null) {
			$mapper->copyTo('POST');
			return true;			
		}
		return false;	
	}

	public function paging() {
         // PAGINATION BEGIN		
		// count total rows
		$total_rows = count($resume);		

		// initialise vars so no divide by zero error occurs
		$page = 1;
		$total_pages = 1;		

		// ORDER BY clause not need to COUNT
		// but before LIMIT
		$sql2 .= "ORDER BY resume.id DESC ";			

		// do we really have result
		if ($total_rows>0) {
			if($f3->exists('GET.page'))
				$page = $f3->get('GET.page');
			// get global config value
			$no_rec_per_pg = $f3->get('LIMIT');
			$offset = ($page-1) * $no_rec_per_pg; 
			$total_pages = ceil($total_rows / $no_rec_per_pg);
			$sql2 .= "LIMIT $offset, $no_rec_per_pg "; 		
		}		
		
		// do the query once again with pagination and ORDER BY
		$resume = $f3->get('db')->exec($sql2);	

		// set page vars
		$f3->set('page', $page);
		$f3->set('total_pages', $total_pages);		
        
        return $data;
    }

}