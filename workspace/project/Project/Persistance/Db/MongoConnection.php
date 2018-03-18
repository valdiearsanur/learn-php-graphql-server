<?php
namespace Project\Presistance;

use Doctrine\ODM\MongoDB\DocumentManager;

class MongoConnection implements DbConnection
{
	private $dm;

	function __construct(
		DocumentManager $dm
	) {
		$this->dm = $dm;
	}

	public function getConnection()
	{
		return $this->dm;
	}
}
