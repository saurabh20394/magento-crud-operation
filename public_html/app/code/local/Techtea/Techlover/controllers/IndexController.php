<?php
	
		class Techtea_Techlover_IndexController extends Mage_Core_Controller_Front_Action
		{
			
			 public function insertjobAction(){
		    	 $this->loadLayout();
    			 $this->renderLayout();
		    }

		    public function showAllJobAction(){
		    		$techjob = Mage::getModel('techlover/techjob')->getCollection();
		    		$data = $techjob->getData();
		    		echo json_encode($data);
		    
		    }
		   
		    function savesDataAction(){
		    	$id = $this->getRequest()->getPost("id");
		    	$name= $this->getRequest()->getPost("name");
			    $job= $this->getRequest()->getPost("job");
			    $flags= $this->getRequest()->getPost("flag");
			    $techjob = Mage::getModel('techlover/techjob');
			    $techAlljob = Mage::getModel('techlover/techjob')->getCollection();
		    	if ($flags==1) {
		    		//$loadid = $techjob->load($id);
		    		$techjob->load($id);
			    	$techjob->setName($name);
			    	$techjob->setJob($job);
			    	$techjob->save();
		    		// $data = $techAlljob->getData();
		    		// echo json_encode($data);
		    	}
		    	elseif($flags==4) {
			    	$techjob->load($id);
		    		$techjob->delete();
		    		// $data = $techAlljob->getData();
		    		// echo json_encode($data);
		    	} 
		    	echo "1";
		    } 
		}
?>