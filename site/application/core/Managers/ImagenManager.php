<?php
namespace Managers;

use Doctrine\ORM\Mapping as ORM;
/**
 * Description of ImagenManager
 *
 * @author NASoft
 */

class ImagenManager extends BaseManager{
	private $images_root = null;
	private $images_url = null;
	private $images_thumbs = null;
	private $images_nocrop = null;

    protected function __construct() {
        parent::__construct();
		$this->CI->load->config('images');
		$this->CI->load->library('image_lib');

        $this->images_root = config_item('images_root');
        $this->images_url = config_item('images_url');
        $this->images_thumbs = config_item('images_thumbs');
        $this->images_nocrop = config_item('images_nocrop');

		$this->dataservice = \Dataservices\ImagenDs::getInstance();

    }

	private function _get_size($image){
         $img = getimagesize($image);
         return Array('width'=>$img['0'], 'height'=>$img['1']);
    }
	
	

	public function create($image_path = "", $extension = "jpg", $images_thumbs = null, $images_nocrop = null, $newImagen = null, $conMarca = true){
		
		if (is_null($images_thumbs)) $images_thumbs = $this->images_thumbs;
		if (is_null($images_nocrop)) $images_nocrop = $this->images_nocrop;
		
		if($conMarca){
			$config['wm_overlay_path'] = realpath("")."/assets/images/marcadeagua_daps.png";				
			$config['wm_type'] = 'overlay';
	        $config['wm_vrt_alignment'] = 'middle';
	        $config['wm_hor_alignment'] = 'center';	
		}

		if (file_exists($image_path)){
			if (is_null($newImagen)){
				$newImagen = new \models\Foto();
				//$newImagen ->fecha = new \Datetime('now');
				$newImagen ->temporal = 1;
				//$newImagen ->borrado = 0;
				$newImagen ->extension = $extension;
				$this->save($newImagen);	
				//var_dump($newImagen->id); die();
			//  cambios de resolucion de la imagen
				@mkdir($this->images_root.$newImagen->id);
				
				$newfile = $this->images_root.$newImagen->id."/full.".$extension;
				$tmpfile = $this->images_root.$newImagen->id."/tmp.".$extension;
				
				$this->CI->image_lib->clear();
				$config['source_image'] = $image_path;
				$config['new_image'] = $newfile;
				$config['quality'] = "100%";
				$this->CI->image_lib->initialize($config);
				$this->CI->image_lib->resize();
				$this->CI->image_lib->clear();

				if($conMarca){
					$config['source_image'] = $newfile;
			        $this->CI->image_lib->initialize($config);
					$this->CI->image_lib->watermark();
					$this->CI->image_lib->clear();
				}
				
				$fullSize = $size = $this->_get_size($newfile);
				
			} else {
				$fullSize = $size = $this->_get_size($image_path);
				$newfile = $this->images_root.$newImagen->id."/full.".$extension;
				$tmpfile = $this->images_root.$newImagen->id."/tmp.".$extension;
				
			}
			
			
			foreach ($images_thumbs as $athumb){
				$dimensiones = explode('x',$athumb);
				$xHueco = $dimensiones[0];
				$yHueco = $dimensiones[1];
				
				// recalculamos las nuevas medidas proporcionales considerando
				// horizontal o vertial
				// 1) HORIZONTAL
				$xH = $xHueco;
				$yH = round($fullSize["height"] * $xH / $fullSize["width"]);
				// 2) VERTICAL
				$yV = $yHueco;
				$xV = round($fullSize["width"] * $yV / $fullSize["height"]);
				
				if (($xH >= $xHueco) && ($yH >= $yHueco)){
					$xResize = $xH;
					$yResize = $yH;
				} else {
					$xResize = $xV;
					$yResize = $yV;				
				}
				
				$config['create_thumb'] = TRUE;
				$config['source_image'] = $image_path;
				$config['new_image'] = $tmpfile;
				$config['quality'] = "100%";
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['width'] = $xResize;
				$config['height'] = $yResize;
				$config['thumb_marker'] = "";
				
				$this->CI->image_lib->initialize($config);
				$this->CI->image_lib->resize();
				$this->CI->image_lib->clear();

				if($conMarca){
					$config['source_image'] = $tmpfile;
			        $this->CI->image_lib->initialize($config);
					$this->CI->image_lib->watermark();
					$this->CI->image_lib->clear();
				}

				$config['create_thumb'] = TRUE;
				$config['new_image'] = $newfile;
				$config['source_image'] = $tmpfile;
				$config['quality'] = "100%";
				$config['create_thumb'] = true;
				$config['maintain_ratio'] = false;
				$config['width'] = $xHueco;
				$config['height'] = $yHueco;
				$config['thumb_marker'] = "_".$xHueco."x".$yHueco;

				$config['y_axis'] = round(($yResize - $yHueco) / 2);
				$config['x_axis'] = round(($xResize - $xHueco) / 2);
				
				$this->CI->image_lib->initialize($config);
				$this->CI->image_lib->crop();
				$this->CI->image_lib->clear();
				
			} // end foreach

			// NO CROP IMAGES
			foreach ($images_nocrop as $athumb){
				$dimensiones = explode('x',$athumb);
				$xHueco = $dimensiones[0];
				$yHueco = $dimensiones[1];
				
				// recalculamos las nuevas medidas proporcionales considerando
				// horizontal o vertial
				// 1) HORIZONTAL
				$xH = $xHueco;
				$yH = round($fullSize["height"] * $xH / $fullSize["width"]);
				// 2) VERTICAL
				$yV = $yHueco;
				$xV = round($fullSize["width"] * $yV / $fullSize["height"]);
				
				if (($xH <= $xHueco) && ($yH <= $yHueco)){
					$xResize = $xH;
					$yResize = $yH;
				} else {
					$xResize = $xV;
					$yResize = $yV;				
				}
				
				$config['create_thumb'] = TRUE;
				$config['source_image'] = $image_path;
				$config['new_image'] = $newfile;
				$config['quality'] = "100%";
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['width'] = $xResize;
				$config['height'] = $yResize;
				$config['thumb_marker'] = "_".$xHueco."x".$yHueco;
				
				$this->CI->image_lib->initialize($config);
				$this->CI->image_lib->resize();
				$this->CI->image_lib->clear();

				if($conMarca){
					$config['source_image'] = $newfile;
			        $this->CI->image_lib->initialize($config);
					$this->CI->image_lib->watermark();
					$this->CI->image_lib->clear();
				}
				

			} // end foreach

			return $newImagen;
		} else {
			return false;
		}
		
	}

	public function toArray($data){
		$arrayData = array();
		$arrayData["id"] = $data->id;
		
		return $arrayData;
	}		
	
	public function getUrl($data, $aThumb){
		if (!$data){
			return $this->getNoImage($aThumb);
		}
		
		if (in_array($aThumb, $this->images_thumbs) || in_array($aThumb, $this->images_nocrop)){
			$urlfile = "full_".$aThumb.".".$data->extension;
			$fullpath = $this->images_root.$data->id.'/'."full.".$data->extension;
			
			
			if (!file_exists($this->images_root.$data->id.'/'.$urlfile)){
				// no existe el archivo -- hay que recrearlo
				if (!file_exists($fullpath)){
					return $this->getNoImage($aThumb);
				} else {
					if (in_array($aThumb, $this->images_nocrop)){
						$this->create($fullpath, $data->extension, array(), array($aThumb), $data);
					} else {
						$this->create($fullpath, $data->extension, array($aThumb), array(), $data);
					}
				}
			}
			
		} else {
			$urlfile = "full.".$data->extension;
		}
		
		if (file_exists($this->images_root.$data->id.'/'.$urlfile)){
			return $this->images_url.$data->id.'/'.$urlfile;
		} else {
			return $this->getNoImage($aThumb);
		}
	}
	
	public function getNoImage($aThumb){
		$file = realpath("")."/assets/common/img/no-img-".$aThumb.".jpg";
		
		
		if (file_exists($file)){
			return site_url()."assets/common/img/no-img-".$aThumb.".jpg";
		} 
		
		return site_url()."assets/common/img/no-img.jpg";
		
	}

	public function getUrlAvatar($data, $aThumb){
		if ($this->CI->getActualUser()->avatar){
			return $this->getUrl($data, $aThumb);
		}else{
			return assets_url("img/avatar.jpg");
		}
	}

}


?>