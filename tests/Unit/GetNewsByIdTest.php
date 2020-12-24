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
         * TODO "RuntimeException : A facade root has not been set." Разобраться с этим при настройке DB
         */
    {
        $model = new Models\NewsModel();
        $data = $model->getNewsById(1);
        $this->assertIsArray($data);
        $this->assertNotEmpty($data);
        $this->assertEquals('1', $data['category_id']);
    }
}
