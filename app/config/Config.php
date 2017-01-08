<?php
namespace App\Config;

use Illuminate\Config\Repository;
use Symfony\Component\Finder\Finder;
use Dotenv\Dotenv;
//use Test;

class Config extends Repository
{
    public $config;

    protected $paths = [];

   /**
 * Initialize configuration.
 */
    public function __construct()
    {
        $this->setupPaths();
        $this->loadConfigurationFiles(
            $this->paths['config_path'],
            $this->getEnvironment()
        );
    }
    /**
     * Initialize the paths.
     */
    private function setupPaths()
    {
        $this->paths['env_file_path'] = __DIR__ . '/../';
        $this->paths['env_file']      = $this->paths['env_file_path'].'.env';
        $this->paths['config_path'] = __DIR__ . '/../config';
    }

/**
 * Detect the environment. Deaults to `production`.
 *
 * @return string
 */
    private function getEnvironment()
    {
        if (is_file($this->paths['env_file'])) {
            Dotenv::load($this->paths['env_file_path']);
        }

        return getenv('ENVIRONMENT') ?: 'production';
    }

    /**
     * Load the configuration items from all of the files.
     *
     * @param string $path
     * @param string|null $environment
     */
    public function loadConfigurationFiles($path, $environment = null)
    {
        $this->configPath = $path;
        foreach ($this->getConfigurationFiles() as $fileKey => $path) {
            if('App\\Config\\' . basename($path,'.php') !== __CLASS__) {
                $this->set($fileKey, require $path);
            }
        }

        foreach ($this->getConfigurationFiles($environment) as $fileKey => $path) {
            $envConfig = require $path;

            foreach ($envConfig as $envKey => $value) {
                $this->set($fileKey.'.'.$envKey, $value);
            }
        }
    }

    /**
     * Get the configuration files for the selected environment
     *
     * @param string|null $environment
     *
     * @return array
     */
    protected function getConfigurationFiles($environment = null)
    {
        $path = $this->configPath;

        if ($environment) {
            $path .= '/' . $environment;
        }

        if (!is_dir($path)) {
            return [];
        }

        $files = [];
        $phpFiles = Finder::create()->files()->name('*.php')->in($path)->depth(0);

        foreach ($phpFiles as $file) {
            $files[basename($file->getRealPath(), '.php')] = $file->getRealPath();
        }

        return $files;
    }
}