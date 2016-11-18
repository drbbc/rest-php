<?php
namespace Lazyphp\Controller;
use \Sokil\Mongo\Client;
class SurverController extends BaseController
{
    /**
     * 默认提示
     * @ApiDescription(section="Demo", description="默认提示")
     * @ApiLazyRoute(uri="/survey/",method="GET")
     * @ApiReturn(type="object", sample="{'code': 0,'message': 'success'}")
     * @ApiParams(name="sid", type="string", nullable=false, description="second", cnname="第二个数")
     */
    public function index($sid)
    {
        $data['title'] = $data['top_title'] = 'Version 4.5';
        
        $coll = $this->client->getDatabase("rest")->getCollection("users")->find();
        if (!empty($sid))
        $data['db'] =  $coll->where("sid",$sid)->findAll();
        return send_result( $data );
    }

   /**
    * 提示
    * @ApiDescription(section="survey",description="提示")
    * @ApiLazyRoute(uri="/survey/add",method="POST")
    * @ApiReturn(type="object", sample="{'code': 0,'message': 'success'}")
    */
    public function add()
    {
        $data['sid'] = json_decode($GLOBALS['HTTP_RAW_POST_DATA']) ;

        return send_result($data);
    }
}