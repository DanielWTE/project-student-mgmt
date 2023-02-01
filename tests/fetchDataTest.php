<?php

use PHPUnit\Framework\TestCase;

class teacherSearchTest extends TestCase
{
    public function testSearchByUsername()
    {
        $_POST['username'] = 'daniel.wagner';

        ob_start();
        include 'backend/teacher/fetchTeacherData.php';
        $output = ob_get_clean();

        $result = json_decode($output, true);
        
        $this->assertArrayHasKey('username', $result);
        $this->assertArrayHasKey('name', $result);
        $this->assertArrayHasKey('role', $result);

        $this->assertEquals('daniel.wagner', $result['username']);
        $this->assertEquals('Daniel Wagner', $result['name']);
        $this->assertEquals('admin', $result['role']);
    }
}

?>