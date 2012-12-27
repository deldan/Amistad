<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

	public $components = array('RequestHandler');

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Pages';

/**
 * Default helper
 *
 * @var array
 */
	public $helpers = array('Html', 'Session', 'Amistad', 'Time', 'Text');

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Image', 'Lesson', 'Historie');

	var $paginate = array( 'limit' => 10, 'order' => array('Lesson.date' => 'desc'));


/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			$this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));
		$this->pageName($path[0]);
		$this->render(implode('/', $path));
	}

	public function index(){
		$this->set('images', $this->Image->find('all', array('conditions' => array('active' => 1))));
		$this->pageName('index');
	}

	private function pageName($path=null){
		$this->set('pageActive',$path );
	}

	public function lessons(){
		$this->set('lessons', $this->paginate('Lesson'));
		$this->pageName('ensenanzas');
	}

	public function rss(){
		$this->layout = 'xml';
        $lessons = $this->Lesson->find('all');
        return $this->set(compact('lessons'));
		$this->set('lessons', $this->Lesson->find('all'));
	}

	public function titles(){
		$result = null;
		$loren = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sit amet velit eget neque tincidunt lacinia. Mauris non libero eros, id ultricies sem. Fusce blandit enim sit amet urna sagittis varius. Cras in risus lacus. Phasellus sit amet justo ut nisi ultrices gravida. Nulla in mi id dui laoreet sodales. Integer dapibus, dolor vitae mattis malesuada, odio libero tempor risus, quis ultrices eros lorem a velit. In hac habitasse platea dictumst. Etiam sodales sodales mauris, eu commodo nunc luctus quis. Fusce diam libero, mollis eget tincidunt eget, aliquam sit amet augue. Nulla gravida accumsan nisl, a ultricies elit posuere elementum. Fusce sodales posuere cursus. In volutpat ornare volutpat. Suspendisse in purus ligula. Donec pretium, ante eget pulvinar pellentesque, metus lacus semper metus, elementum posuere felis leo eu lorem. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>

<p>Cras lorem urna, fringilla ac accumsan vitae, tempus quis felis. Curabitur fermentum mauris eu dui dignissim hendrerit. Phasellus arcu nisl, interdum consectetur interdum sed, faucibus ut nibh. Donec vel mi est, et dignissim erat. Etiam pulvinar, nulla ac sodales interdum, orci ante vulputate eros, id mollis libero metus eget felis. Vestibulum ultricies pretium elementum. Donec ultrices luctus nulla, at luctus orci aliquet eu. Quisque ac auctor tortor. Ut faucibus tortor id odio auctor vehicula imperdiet quam lacinia. Nunc nulla eros, dapibus at consequat sit amet, viverra a elit. In in diam non libero auctor pretium sed vel est. Maecenas venenatis lobortis risus, eget tincidunt urna feugiat eu. Curabitur condimentum, nibh nec sodales porttitor, arcu lorem vestibulum diam, vitae tempus ipsum quam a mi.</p>';
		if($this->RequestHandler->isAjax() || $this->request->ext == 'json') {
			$result[0]['id'] = 1;
			$result[0]['title'] = 'Testimonio 1';
			$result[0]['fecha'] = '20/05/2012';
			$result[0]['text'] = $loren;
			$result[1]['id'] = 2;
			$result[1]['title'] = 'Testimonio 2';
			$result[1]['fecha'] = '25/05/2012';
			$result[1]['text'] = $loren;
			$this->set('result', $result);
			$this->set('_serialize', array('result'));
		}else{
			return $result;
		}
	}

	public function histories(){
		$result = null;
		if($this->RequestHandler->isAjax() || $this->request->ext == 'json') {
			$arr = $this->Historie->find('all', array('order' => array('Historie.date DESC')));
			//$result = processed;
			$processed = array();
			/*foreach($arr as $subarr) {
			   foreach($subarr as $id => $value) {
			      if(!isset($processed[$id])) {
			         $processed[$id] = array();
			      }

			      $processed[$id][] = $value;
			   }
			}*/
			$processed = array_map(function($a) {  return array_pop($a); }, $arr);
			$result = $processed;
			$this->set('result', $result);
			$this->set('_serialize', array('result'));
		}else{
			return $result;
		}
	}


	public function podcast(){
		$result = null;

		if($this->RequestHandler->isAjax() || $this->request->ext == 'json') {
			$arr = $this->Lesson->find('all', array('order' => array('Lesson.date DESC')));
			//$result = processed;
			/*$processed = array();
			foreach($arr as $subarr) {
			   foreach($subarr as $id => $value) {
			      if(!isset($processed[$id])) {
			         $processed[$id] = array();
			      }

			      $processed[$id][] = $value;
			   }
			}*/
			$processed = array_map(function($a) {  return array_pop($a); }, $arr);
			$result = $processed;
			$this->set('result', $result);
			$this->set('_serialize', array('result'));
		}else{
			return $result;
		}
	}

	public function link(){
		$result = null;
		if($this->RequestHandler->isAjax() || $this->request->ext == 'json') {
			$result[0]['id'] = 1;
			$result[0]['title'] = 'el hobiit';
			$result[0]['text'] = 'un gran libro de jr tolkien';
			$this->set('result', $result);
			$this->set('_serialize', array('result'));
		}else{
			return $result;
		}
	}

}

