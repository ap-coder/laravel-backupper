<?php

	namespace LaravelBackupper\Classes;

	use Storage;

	class BackupEnviroment{

		public function createIfDontExist($path){
		
			if( !file_exists( $path )){

				if( $this->pathIsAFile($path) ){

					$file = Storage::put($path,'');
					return $file;

				}else{

					$dir = Storage::makeDirectory($path,0777,true);
					return $dir;

				}
			}
		
		}

		public function pathIsAFile($path){
		
			if( strpos($path,'.') !== false ){

				return true;

			}

			return false;
		
		}

	}

?>