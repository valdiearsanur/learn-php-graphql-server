<?php
namespace Project\Persistance\Doctrine\Db;

use Doctrine\ODM\MongoDB\DocumentManager;
use Project\Persistance\Db\DbConnection;

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
