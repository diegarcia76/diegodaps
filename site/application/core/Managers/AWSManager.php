<?php
namespace Managers;

require_once(APPPATH.'third_party/aws/aws-autoloader.php');

use Doctrine\ORM\Mapping as ORM;
/**
 * Description of Mail
 *
 * @author NASoft
 */
class AWSManager extends BaseManager{


    protected function __construct() {
        parent::__construct();
    }
	
	public function test(){
		
		$s3Client = new \Aws\S3\S3Client([
			'version'     => 'latest',
			'region'      => 'us-east-1',
			'credentials' => [
				'key'    => 'AKIAI3NJWSTNBVHOPAIQ',
				'secret' => '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',
			],
			'scheme'  => 'http'
		]);


		$bucket = 'memberplay_uploads_dev';
					
		// Use the high-level iterators (returns ALL of your objects).
		$objects = $s3Client->getIterator('ListObjects', array('Bucket' => $bucket));

		echo "Keys retrieved!\n";
		foreach ($objects as $object) {
			echo $object['Key'] . "\n";
		}

			/*
		// Use the plain API (returns ONLY up to 1000 of your objects).
		$result = $s3Client->listObjects(array('Bucket' => $bucket));

		echo "Keys retrieved!\n";
		foreach ($result['Contents'] as $object) {
			echo $object['Key'] . "\n";
		}
		*/
		
	}

}