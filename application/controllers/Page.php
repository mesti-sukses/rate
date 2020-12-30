<?php 
	/**
	 * Class ini akan menangani masalah page yang ada dalam website
	 */
	class Page extends Frontend_Controller
	{
		
		function __construct()
		{
			parent::__construct();

			$this->load->model('Quran_m');
			$this->load->model('Tag_m');
			$this->load->model('Comment_m');
		}

		// Untuk pemrosesan homepage
		function index(){
			// Fetch data
			$this->data['tafsirAyat'] = $this->Quran_m->get();

			// Process data tag
			for ($i=0; $i < count($this->data['tafsirAyat']); $i++) { 
				$this->data['tafsirAyat'][$i] = $this->getComment($this->data['tafsirAyat'][$i]);

				$this->data['tafsirAyat'][$i]->link_tag = $this->processTag($this->data['tafsirAyat'][$i]->tag);
			}

			// Load page
			$title = 'Homepage | R.A.T.E';
			$this->loadPage($title, 'front/index', 'general_page', FALSE, FALSE, TRUE);
		}

		// Untuk melihat tafsir lengkap dari ayat yang ada
		function ayat($id){
			// Fetch data
			$this->data['tafsirAyat'] = $this->getComment($this->Quran_m->get($id, TRUE));

			// Process data tag
			$this->data['tafsirAyat']->link_tag = $this->processTag($this->data['tafsirAyat']->tag);

			// Get form feedback
			$newComment = $this->form('Comment_m', array('nama', 'komentar', 'id_tafsir'));

			if($newComment){

				$this->Comment_m->save($newComment);
				redirect('page/ayat/'.$id, 'refresh');
			}

			// Load page
			$title = "Tafsir Surat ".$this->data['tafsirAyat']->nama." Ayat ".$this->data['tafsirAyat']->ayat." | R.A.T.E";
			$this->loadPage($title, 'front/tafsir', 'general_page', FALSE, FALSE, TRUE);
		}

		// Untuk melihat tafsir per tag
		function tag($name){
			// Fetch data
			$this->data['tafsirAyat'] = $this->Quran_m->get_like('tag', $name);

			// Process data tag
			for ($i=0; $i < count($this->data['tafsirAyat']); $i++) { 
				$this->data['tafsirAyat'][$i]->link_tag = $this->processTag($this->data['tafsirAyat'][$i]->tag);
			}

			// Load page
			$title = 'Tags '.$name.' | R.A.T.E';
			$this->loadPage($title, 'front/index', 'general_page', FALSE, FALSE, TRUE);
		}

		// Untuk pemrosesan tag menjadi array
		private function processTag($tags){
			$res = explode(',', $tags);
			for ($i=0; $i < count($res); $i++) { 
				$res[$i] = "<a href='".base_url('page/tag/'.$res[$i])."'>".$res[$i]."</a>";
			}

			return implode(",", $res);
		}

		// Untuk ambil data comment dengan pemrosesan
		private function getComment($post){
			$comment = $this->Comment_m->get_by(array('id_tafsir' => $post->id_tafsir));
			$post->comment = $comment;
			return $post;
		}
	}
?>