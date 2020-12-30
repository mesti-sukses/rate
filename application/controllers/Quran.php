<?php
	/**
	 * Class ini yang akan menangani tafsir per ayat, mulai dari create edit dan deletenya
	 */
	class Quran extends Admin_Controller
	{
		
		function __construct()
		{
			parent::__construct();

			$this->load->model('Quran_m');
			$this->load->model('Surat_m');
			$this->load->model('Tag_m');
		}

		// Method ini akan me list tafsir apa saja yang sudah dimasukkan dalam database
		function index(){
			// Fetch the data
			$this->data['tafsirQuran'] = $this->Quran_m->get();

			// Load the page
			$title = "Tafsir List | R.A.T.E";
			$this->loadPage($title, 'admin/list_tafsir', 'data_table');
		}


		// Method ini untuk mengedit tafsir
		function edit($id = NULL) {
			// Fetch the data
			// Ini untuk combo box list surat yang ada dalam database
			$this->data['listSurat'] = $this->Surat_m->get();
			// Jika variabel id ada berarti edit mode
			if($id)
				$this->data['currentTafsirQuran'] = $this->Quran_m->get($id, TRUE);

			// Get data from form
			$newTafsir = $this->form('Quran_m', array('surat', 'ayat', 'tag', 'content'));

			// Process data from form
			if($newTafsir){
				if($id)
					$newTafsir['id_tafsir'] = $id;

				// Proses tag yang diinput
				$tags = explode(',', $newTafsir['tag']);

				// Masukkan semuanya kedalam database tag
				foreach ($tags as $tag) {
					$newTags = (array)$this->Tag_m->get_by(array('nama' => $tag), TRUE);
					if($newTags == NULL){
						$newTags['nama'] = $tag;
						$newTags['jumlah'] = 1;
						$id_tag = NULL;
					} else {
						$id_tag = $newTags['id_tag'];
						$newTags['jumlah'] += 1;
					}

					$this->Tag_m->save($newTags, $id_tag);
				}

				$this->Quran_m->save($newTafsir, $id);
				redirect('quran');
			}

			// Load the page
			if($id)
				$title = "Tafsir Surat ".$this->data['currentTafsirQuran']->nama." Ayat ".$this->data['currentTafsirQuran']->ayat." | R.A.T.E";
			else 
				$title = "Tafsir Baru | R.A.T.E";
			$this->loadPage($title, 'admin/edit_tafsir', 'editor');
		}
	}
?>