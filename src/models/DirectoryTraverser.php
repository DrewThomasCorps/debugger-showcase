<?php
/**
 * Created by PhpStorm.
 * User: Drew
 * Date: 11/19/20
 * Time: 12:42
 */

class DirectoryTraverser
{
    /**
     * @var DirectoryTraverser[] $directories
     */
    private $directories;
    private $path;
    public $name;

    public function __construct(string $path)
    {
        $this->path = realpath($path);
        $this->name = basename($this->path);
        $this->setSubDirectories();
    }

    public function echoHtml()
    {
        echo "
<ul>
<li>
{$this->name}
";
        array_walk($this->directories, function (DirectoryTraverser $directoryTraverser) {
            $directoryTraverser->echoHtml();
        });
        echo "
</li>
</ul>
";
    }

    private function setSubDirectories()
    {
        $directories = scandir($this->path);
        $directories = array_filter($directories, function (string $name) {
            return is_dir($this->path . "/$name");
        });
        $directories = array_map(function (string $name) {
            return new DirectoryTraverser($this->path . "/$name");
        }, $directories);
        $this->directories = $directories;
    }

}
