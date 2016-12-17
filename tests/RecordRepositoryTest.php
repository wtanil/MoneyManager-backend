<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Request;

use App\Repositories\RecordRepository;

class RecordRepositoryTest extends TestCase {
    
	use DatabaseMigrations;

	// protected static $setUpFlag = false;

	public function setUp() {
        parent::setUp();
        // if (!static::$setUpFlag) {
        	Artisan::call('migrate');
        // 	static::$setUpFlag = true;
        // }
    }

    // public function tearDown() {
    //     // Artisan::call('migrate:reset');
    //     parent::tearDown();
    // }

    /**
     *	@group recordrepository
     * 	@return void
     */
    public function test_get_user_not_found() {
    	$recordRepo = new RecordRepository();
    	$dbUser = $recordRepo->getUser(1);

    	$this->assertNull($dbUser);
    }
    
    /**
     *	@group recordrepository
     * 	@return void
     */
    public function test_get_user_found() {
    	$recordRepo = new RecordRepository();
    	$factoryUser = factory(App\User::class)->create();
    	$dbUser = $recordRepo->getUser($factoryUser->id);

    	$this->assertEquals($factoryUser->id, $dbUser->id);
    }

    /**
     *	@group recordrepository
     * 	@return void
     */
    public function test_all_not_found() {
    	$recordRepo = new RecordRepository();
    	$factoryUser = factory(App\User::class)->create();
    	$dbRecords = $recordRepo->all(1);

    	$this->assertCount(0, $dbRecords);
    }

    /**
     *	@group recordrepository
     * 	@return void
     */
    public function test_all_found() {
    	$recordRepo = new RecordRepository();
    	$factoryUsers = factory(App\User::class, 2)->create();
    	$factoryRecords = factory(App\Record::class, 2)->create([
    		'user_id' => 1]);
    	$factoryRecords = factory(App\Record::class, 5)->create([
    		'user_id' => 2]);
    	$dbRecordsOne = $recordRepo->all(1);
    	$dbRecordsTwo = $recordRepo->all(2);

    	$this->assertCount(2, $dbRecordsOne);
    	$this->assertCount(5, $dbRecordsTwo);
    }

    /**
     *	@group recordrepository
     * 	@return void
     */
    public function test_for_id_not_found() {
    	$recordRepo = new RecordRepository();
    	$factoryUser = factory(App\User::class)->create();
    	$dbRecord = $recordRepo->forId($factoryUser->id, 1);

    	$this->assertNull($dbRecord);
    }

    /**
     *	@group recordrepository
     * 	@return void
     */
    public function test_for_id_found() {
    	$recordRepo = new RecordRepository();
    	$factoryUser = factory(App\User::class)->create();
    	$factoryRecord = factory(App\Record::class)->create([
    		'user_id' => $factoryUser->id]);
    	$dbRecord = $recordRepo->forId($factoryUser->id, $factoryRecord->id);

    	$this->assertEquals($factoryRecord->id, $dbRecord->id);
    }
}
