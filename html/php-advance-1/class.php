<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  require_once('../vendor/autoload.php');

  class AdvanceTask1{
    public $client;
    public $page_data;
    public $title;
    public $content;
    public $img;
    public $dataLength;
    public $link;
    
    public function __construct(){
      $this->client = new GuzzleHttp\Client();
      $response = $this->client->request('GET','https://ir-dev-d9.innoraft-sites.com/jsonapi/node/services');
      $result = $response->getBody()->getContents();
      $this->page_data = json_decode($result);
      $this->dataLength = count($this->page_data->data);
    }
    public function getData($i){ 
      if($this->page_data->data[$i]->attributes->field_services != null){
        $this->title = $this->page_data->data[$i]->attributes->title;
        $this->content = $this->page_data->data[$i]->attributes->field_services->processed;
        $this->link = 'https://ir-dev-d9.innoraft-sites.com/' . $this->page_data->data[$i]->attributes->path->alias;
        $this->getImage($this->page_data->data[$i]);
        return true;
      }
      return false;
    }

    public function getImage($img_src){
      $img_response=$this->client->request('GET',$img_src->relationships->field_image->links->related->href);
      $img_data=json_decode($img_response->getBody());
      $this->img = "https://ir-dev-d9.innoraft-sites.com/".$img_data->data->attributes->uri->url;
    }
  }

?>