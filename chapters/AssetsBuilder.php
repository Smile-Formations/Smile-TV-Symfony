<?php

class AssetsBuilder
{
    private string $path = __DIR__;
    private string $destination = __DIR__ . '/' . 'assets';
    private array $dirs;
    private array $excepts = ['.', '..', 'assets'];
    
    public function __construct() 
    {
        $this->dirs = scandir($this->path);
    }
    
    public function build(): void
    {
        
        foreach ($this->dirs as $dir) {
            
            $full = $this->path . '/' . $dir;
            if (!in_array($dir, $this->excepts, true) && is_dir($full)) {
                
                $concurrentDirectory = $this->destination . '/' . $dir;
                
                if (!mkdir($concurrentDirectory) && !is_dir($concurrentDirectory)) {
                    throw new \RuntimeException(sprintf('Directory "%s" was not created', $concurrentDirectory));
                }
                
                echo "- " . $concurrentDirectory . "\n";
                
                $files = scandir($full);
                foreach ($files as $file) {
                    
                    if (!in_array($file, $this->excepts, true) && is_file($full . '/' . $file)) {
                        
                        $concurrentDirectory2 = $this->destination . '/' . $dir . '/' . str_replace('.md', '', $file);
                        if (str_ends_with($file, '.md') && !mkdir($concurrentDirectory2) && !is_dir($concurrentDirectory2)) {
                            throw new \RuntimeException(sprintf('Directory "%s" was not created', $concurrentDirectory2));
                        }
                        
                        fopen($concurrentDirectory2 . "/.gitignore", 'wb');
                        
                        echo "\t" . "-- " . $concurrentDirectory2 . "\n";
                    }
                }
            }
        }

        echo "\nDone !";
    }
}

(new AssetsBuilder)->build();



