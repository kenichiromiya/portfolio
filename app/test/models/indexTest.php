<?php
include_once("app/test/curl.php");
/**
 * Generated by PHPUnit_SkeletonGenerator on 2012-03-15 at 10:49:28.
 */
class indexTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Hello
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {

    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    public function testPost()
    {
	$url = "http://www26145ue.sakura.ne.jp/portfolio/";

$array = array("id"=>"test/","account_id"=>"test","0"=>'@app/test/models/lena256.gif');

//$postfields = http_build_query($array);
$return = curl_post($url,$array);
print_r($return);
	//return $return;
    }

    /**
     * @depends testPost
     */
    public function testGet()
    {
/*
	$_COOKIE['session_id'] = $var['session_id'];
	$var = $this->object->get(array());
	$this->assertEquals("test",$var['session']['account_id']);
*/
        // remove the following lines when you implement this test.
        //$this->marktestincomplete(
        //  'this test has not been implemented yet.'
        //);
	//return $var;
    }
    /**
     * @depends testPOST
     */
    public function testDelete($var)
    {
/*
	$this->object->delete(array("id"=>"test"));
*/
        // remove the following lines when you implement this test.
        //$this->marktestincomplete(
        //  'this test has not been implemented yet.'
        //);
    }
    /**
     * @covers Hello::getMessage
     * @todo   Implement testGetMessage().
     */
    public function testgetmessage()
    {
        // remove the following lines when you implement this test.
        //$this->marktestincomplete(
        //  'this test has not been implemented yet.'
        //);
    }
}
?>
