<?php 
class Techtea_Weblog_IndexController extends Mage_Core_Controller_Front_Action {    
    public function testModelAction() {
        //echo 'Setup!';
        // $blogpost = Mage::getModel('weblog/blogpost');
        // echo get_class($blogpost);
        // Mage::log($blogpost);
	    $params = $this->getRequest()->getParams();
	    $blogpost = Mage::getModel('weblog/blogpost');
	    echo("Loading the blogpost with an ID of ".$params['id']);
	    $blogpost->load($params['id']);        
	    $data = $blogpost->getData();
	    var_dump($data);  
	  
    }
    public function createNewPostAction() {
    $blogpost = Mage::getModel('weblog/blogpost');
    $blogpost->setTitle('Code Post!');
    $blogpost->setPost('This post was created from code!');
    $blogpost->save();
    echo 'post created';
}
	public function editFirstPostAction(){
		$params = $this->getRequest()->getParams();
		$blogpost = Mage::getModel('weblog/blogpost');
		$blogpost->load($params['id']);
		$blogpost->setTitle('The First Post dsdsffd');
		$blogpost->save();
		echo "Post Edited success";
	}
	public function deleteFirstPostAction() {
	$params = $this->getRequest()->getParams();
    $blogpost = Mage::getModel('weblog/blogpost');
    $blogpost->load($params['id']);
    $blogpost->delete();
    echo 'post removed';
}
	public function showAllBlogPostsAction(){
		$posts =  Mage::getModel('weblog/blogpost')->getCollection();
		foreach ($posts as $blog_post) {
			echo "<h3>".$blog_post->getTitle()."</h3>";
			echo nl2br($blog_post->getPost());
		}
	}
}
?>