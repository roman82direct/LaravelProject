<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Http\Models;

class GetNewsByIdTest extends TestCase

{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
        /*
         * TODO "Error : Call to a member function connection() on null" Разобраться с этим
         */
    {
        $model = new Models\NewsModel();
        $data = $model->getNewsById(1)->get();
        $this->assertIsArray($data);
        $this->assertNotEmpty($data);
        $this->assertEquals('1', $data['category_id']);
    }
}
