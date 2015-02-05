<?php

use LaravelJade\JadeCompiler;
use Mockery as m;

class JadeCompilerTest extends PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        m::close();
    }

    public function testBasicCompile()
    {
        $compiler = new JadeCompiler($files = $this->getFiles(), __DIR__);

        $this->assertEquals('<html></html>', $compiler->compileString('html'));

    }

    protected function getFiles()
    {
        return m::mock('Illuminate\Filesystem\Filesystem');
    }
}
