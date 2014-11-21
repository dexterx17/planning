<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Establece una cadena al lenguaje global especificado
 *@param string $line Cade de texto
 *@param string $id Si se quiere especificar un ID al label contenedor del texto
 *@return string Label con la cadena de texto 
 **/
 function lang($line, $id = '')
 {
  $CI =& get_instance();
  $line = $CI->lang->line($line);

  $args = func_get_args();

  if(is_array($args)) array_shift($args);

  if(is_array($args) && count($args))
  {
      foreach($args as $arg)
      {
          $line = str_replace_first('%s', $arg, $line);
      }
  }

  if ($id != '')
  {
   $line = '<label for="'.$id.'">'.$line."</label>";
  }

  return $line;
 }

 /**
  * Remplaza una cadena de texto por otra en una determinada cadena
  * @param string $search_for Cadena de texto a buscar
  * @param string $replace_with Cadena por la que se remplazara
  * @param string $in Cadena en la que aplicara la busqueda
  * @return string Nueva cadena de texto
  **/
 function str_replace_first($search_for, $replace_with, $in)
 {
     $pos = strpos($in, $search_for);
     if($pos === false)
     {
         return $in;
     }
     else
     {
         return substr($in, 0, $pos) . $replace_with . substr($in, $pos + strlen($search_for), strlen($in));
     }
 }

/* End of file MY_language_helper.php */
/* Location: ./application/helpers/MY_language_helper */