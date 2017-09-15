<?php
/**
 * Created by IntelliJ IDEA.
 * User: Sayantan
 * Date: 26-05-2017
 * Time: 15:54
 */

class uploader
{
	private $CI;
	private $upconfig;
	public function __construct()
	{
		$this->CI =& get_instance();
		$this->upconfig['encrypt_name'] = TRUE;
		$this->upconfig['file_ext_tolower'] = TRUE;
	}
	public function avatar($name_of_form_field)
	{
		$avatar_width=200;
		$avatar_height=200;
		$thumb_width=70;
		$thumb_height=70;
		$this->upconfig['upload_path'] = './uploads/avatars/';
		$this->upconfig['allowed_types'] = 'jpg|png|gif';
		$this->CI->load->library('upload', $this->upconfig);
		if($this->CI->upload->do_upload($name_of_form_field)){

			$gdconfig['image_library'] = 'gd2';
			$gdconfig['source_image'] = $this->upconfig['upload_path'].$this->CI->upload->data('file_name');
			$gdconfig['new_image'] = $gdconfig['source_image'];
			$gdconfig['maintain_ratio'] = TRUE;
			$gdconfig['width'] = $avatar_width;
			$gdconfig['height'] = $avatar_height;
			$dim = (intval($this->CI->upload->data("image_width")) / intval($this->CI->upload->data("image_height"))) - ($gdconfig['width'] / $gdconfig['height']);
			$gdconfig['master_dim'] = ($dim > 0)? "height" : "width";

			$this->CI->load->library('image_lib', $gdconfig);
			$this->CI->image_lib->resize();

			$this->CI->image_lib->clear();
			$gdconfig['source_image'] = $gdconfig['new_image'];
			$gdconfig['maintain_ratio'] = FALSE;
			$gdconfig['quality'] = "100%";
			$aris = @getimagesize($gdconfig['source_image']);
			$gdconfig['x_axis'] = ($aris['0'] - $gdconfig['width']) / 2;
			$gdconfig['y_axis'] = 0;

			$this->CI->image_lib->initialize($gdconfig);
			$this->CI->image_lib->crop();

			$this->CI->image_lib->clear();
			$gdconfig['source_image'] = $this->upconfig['upload_path'].$this->CI->upload->data('file_name');
			$gdconfig['new_image'] = $this->upconfig['upload_path'].'thumbs/'.$this->CI->upload->data('file_name');
			$gdconfig['maintain_ratio'] = TRUE;
			$gdconfig['width'] = $thumb_width;
			$gdconfig['height'] = $thumb_height;
			$dim = (intval($this->CI->upload->data("image_width")) / intval($this->CI->upload->data("image_height"))) - ($gdconfig['width'] / $gdconfig['height']);
			$gdconfig['master_dim'] = ($dim > 0)? "height" : "width";

			$this->CI->image_lib->initialize($gdconfig);
			$this->CI->image_lib->resize();

			$this->CI->image_lib->clear();
			$gdconfig['source_image'] = $gdconfig['new_image'];
			$gdconfig['maintain_ratio'] = FALSE;
			$gdconfig['quality'] = "100%";
			$aris = @getimagesize($gdconfig['source_image']);
			$gdconfig['x_axis'] = ($aris['0'] - $gdconfig['width']) / 2;
			$gdconfig['y_axis'] = ($aris['1'] - $gdconfig['height']) / 2;

			$this->CI->image_lib->initialize($gdconfig);
			$this->CI->image_lib->crop();
			return $this->CI->upload->data('file_name');
		}else{
			return $this->CI->upload->display_errors('', '');
		}

	}
	public function image($name_of_form_field, $thumb_width1=0, $thumb_height1=0, $thumb_width2=0, $thumb_height2=0, $path)
	{
		$this->upconfig['upload_path'] = './uploads/'.$path.'/';
		$this->upconfig['allowed_types'] = 'jpg|png|gif';
		$this->CI->load->library('upload', $this->upconfig);
		if($this->CI->upload->do_upload($name_of_form_field)){
			if($thumb_width1 && $thumb_height1){
				$gdconfig['image_library'] = 'gd2';
				$gdconfig['source_image'] = $this->upconfig['upload_path'].$this->CI->upload->data('file_name');
				$gdconfig['new_image'] = $this->upconfig['upload_path'].'medium/'.$this->CI->upload->data('file_name');
				$gdconfig['maintain_ratio'] = TRUE;
				$gdconfig['width'] = $thumb_width1;
				$gdconfig['height'] = $thumb_height1;
				$dim = (intval($this->CI->upload->data("image_width")) / intval($this->CI->upload->data("image_height"))) - ($gdconfig['width'] / $gdconfig['height']);
				$gdconfig['master_dim'] = ($dim > 0)? "height" : "width";
				
				$this->CI->load->library('image_lib', $gdconfig);
				$this->CI->image_lib->resize();

				$this->CI->image_lib->clear();
				$gdconfig['source_image'] = $gdconfig['new_image'];
				$gdconfig['maintain_ratio'] = FALSE;
				$gdconfig['quality'] = "80%";
				$aris = @getimagesize($gdconfig['source_image']);
				$gdconfig['x_axis'] = ($aris['0'] - $gdconfig['width']) / 2;
				$gdconfig['y_axis'] = ($aris['1'] - $gdconfig['height']) / 2;

				$this->CI->image_lib->initialize($gdconfig);
				$this->CI->image_lib->crop();
				$this->CI->image_lib->clear();
			}
			
			if($thumb_width2 && $thumb_height2){
				//$gdconfig['image_library'] = 'gd2';
				$gdconfig['source_image'] = $this->upconfig['upload_path'].$this->CI->upload->data('file_name');
				$gdconfig['new_image'] = $this->upconfig['upload_path'].'small/'.$this->CI->upload->data('file_name');
				$gdconfig['maintain_ratio'] = TRUE;
				$gdconfig['width'] = $thumb_width2;
				$gdconfig['height'] = $thumb_height2;
				$dim = (intval($this->CI->upload->data("image_width")) / intval($this->CI->upload->data("image_height"))) - ($gdconfig['width'] / $gdconfig['height']);
				$gdconfig['master_dim'] = ($dim > 0)? "height" : "width";
				
				//$this->CI->load->library('image_lib', $gdconfig);
				$this->CI->image_lib->initialize($gdconfig);
				$this->CI->image_lib->resize();

				$this->CI->image_lib->clear();
				$gdconfig['source_image'] = $gdconfig['new_image'];
				$gdconfig['maintain_ratio'] = FALSE;
				$gdconfig['quality'] = "100%";
				$aris = @getimagesize($gdconfig['source_image']);
				$gdconfig['x_axis'] = ($aris['0'] - $gdconfig['width']) / 2;
				$gdconfig['y_axis'] = ($aris['1'] - $gdconfig['height']) / 2;

				$this->CI->image_lib->initialize($gdconfig);
				$this->CI->image_lib->crop();
				$this->CI->image_lib->clear();
			}
			return $this->CI->upload->data('file_name');
		}else{
			return $this->CI->upload->display_errors('', '');
		}

	}
	public function document($name_of_form_field)
	{
		$this->upconfig['upload_path'] = './uploads/documents/';
		$this->upconfig['allowed_types'] = 'doc|docx|pdf';
		$this->CI->load->library('upload', $this->upconfig);
		if($this->CI->upload->do_upload($name_of_form_field)){
			return TRUE;
		}else{
			return $this->CI->upload->display_errors('', '');
		}
	}
	public function video($name_of_form_field)
	{
		$this->upconfig['upload_path'] = './uploads/videos/';
		$this->upconfig['allowed_types'] = 'mp4';
		$this->CI->load->library('upload', $this->upconfig);
		if($this->CI->upload->do_upload($name_of_form_field)){
			return TRUE;
		}else{
			return $this->CI->upload->display_errors('', '');
		}
	}
}
