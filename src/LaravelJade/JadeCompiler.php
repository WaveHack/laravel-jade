<?php

namespace LaravelJade;

use Everzet\Jade\Dumper\PHPDumper;
use Everzet\Jade\Filter\CDATAFilter;
use Everzet\Jade\Filter\CSSFilter;
use Everzet\Jade\Filter\JavaScriptFilter;
use Everzet\Jade\Filter\PHPFilter;
use Everzet\Jade\Jade;
use Everzet\Jade\Lexer\Lexer;
use Everzet\Jade\Parser;
use Everzet\Jade\Visitor\AutotagsVisitor;
use Illuminate\Filesystem\Filesystem;
use Illuminate\View\Compilers\Compiler;
use Illuminate\View\Compilers\CompilerInterface;

class JadeCompiler extends Compiler implements CompilerInterface
{
    /**
     * @var \Everzet\Jade\Jade
     */
    private $jade;

    /**
     * @var \Everzet\Jade\Parser
     */
    private $parser;

    /**
     * @var \Everzet\Jade\Lexer\Lexer
     */
    private $lexer;

    /**
     * @var \Everzet\Jade\Dumper\PHPDumper
     */
    private $dumper;

    /**
     * Create a new JadeCompiler instance.
     *
     * @param \Illuminate\Filesystem\Filesystem $files
     * @param string $cachePath
     */
    public function __construct(Filesystem $files, $cachePath)
    {
        parent::__construct($files, $cachePath);

        $this->dumper = new PHPDumper;
        $this->dumper->registerVisitor('tag', new AutotagsVisitor);
        $this->dumper->registerFilter('javascript', new JavaScriptFilter);
        $this->dumper->registerFilter('cdata', new CDATAFilter);
        $this->dumper->registerFilter('php', new PHPFilter);
        $this->dumper->registerFilter('style', new CSSFilter);

        $this->lexer = new Lexer;
        $this->parser = new Parser($this->lexer);

        $this->jade = new Jade($this->parser, $this->dumper);
    }

    /**
     * Compile the view at the given path.
     *
     * @param  string $path
     * @return void
     */
    public function compile($path)
    {
        $contents = $this->compileString($this->files->get($path));

        if (!is_null($this->cachePath)) {
            $this->files->put($this->getCompiledPath($path), $contents);
        }
    }

    /**
     * Compile the given Jade template contents.
     *
     * @param  string $value
     * @return string
     */
    public function compileString($value)
    {
        return $this->jade->render($value);
    }
}
