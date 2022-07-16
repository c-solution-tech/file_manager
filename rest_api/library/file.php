<?php 
	/**
	 * 
	 */
	class File
	{
		
		public static function getSize($entry) {
			return ceil(filesize($entry) / 1024) . " KB";
		}

		public static function getmTime($entry) {
			return date('M d, Y H:i:s a', filemtime($entry));
		}

		public static function getName($entry)
		{
			return (is_dir(ROOT_DIR.'/'.$entry) ? '<i class="bi bi-folder"></i>' : '<i class="bi bi-file"></i>') ." ". $entry;
		}

		public static function getPerms($entry) {
			$perms = fileperms($entry);

			switch ($perms & 0xF000) {
			    case 0xC000: // socket
			        $info = 's';
			        break;
			    case 0xA000: // symbolic link
			        $info = 'l';
			        break;
			    case 0x8000: // regular
			        $info = 'r';
			        break;
			    case 0x6000: // block special
			        $info = 'b';
			        break;
			    case 0x4000: // directory
			        $info = 'd';
			        break;
			    case 0x2000: // character special
			        $info = 'c';
			        break;
			    case 0x1000: // FIFO pipe
			        $info = 'p';
			        break;
			    default: // unknown
			        $info = 'u';
			}

			// Owner
			$info .= (($perms & 0x0100) ? 'r' : '-');
			$info .= (($perms & 0x0080) ? 'w' : '-');
			$info .= (($perms & 0x0040) ?
			            (($perms & 0x0800) ? 's' : 'x' ) :
			            (($perms & 0x0800) ? 'S' : '-'));

			// Group
			$info .= (($perms & 0x0020) ? 'r' : '-');
			$info .= (($perms & 0x0010) ? 'w' : '-');
			$info .= (($perms & 0x0008) ?
			            (($perms & 0x0400) ? 's' : 'x' ) :
			            (($perms & 0x0400) ? 'S' : '-'));

			// World
			$info .= (($perms & 0x0004) ? 'r' : '-');
			$info .= (($perms & 0x0002) ? 'w' : '-');
			$info .= (($perms & 0x0001) ?
			            (($perms & 0x0200) ? 't' : 'x' ) :
			            (($perms & 0x0200) ? 'T' : '-'));

			return $info;
		}

		public function rmdir($entry)
		{
			return rmdir($entry);
		}

		public function rm($entry) 
		{
			return rm($entry);
		}

		public function dirToArray($dir) {
  
		   $result = array();

		   $cdir = scandir($dir);
		   foreach ($cdir as $key => $value)
		   {
		      	if (!in_array($value,array(".","..")))
		      	{
		         	if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
		         	{
		            	$result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value);
		         	}
		         	else
		         	{
		            	$result[] = $value;
		         	}
		      	}
		    }
		  
		    return $result;
		}
	}
 ?>