<?php
/**Contient les tests fonctionnels*/

namespace Tests\Feature;

use Tests\TestCase;

class ProjectTest extends TestCase
{
    public function testBasicTest()
    {
        $response = $this->get('/project');

        $response->assertStatus(200);
    }
}