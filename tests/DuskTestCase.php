<?php

namespace Tests;

use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
//use Laravel\Dusk\Chrome\startChromeDriver;
use Laravel\Dusk\TestCase as BaseTestCase;
//use Symfony\Component\Process\Process;

abstract class DuskTestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Prepare for Dusk test execution.
     *
     * @beforeClass
     * @return void
     */
    public static function prepare()
    {
        //if (env('DUSK_START_CHROMEDRIVER', true)) {
            static::startChromeDriver();
        //}
    }

    /**
     * Create the RemoteWebDriver instance.
     *
     * @return \Facebook\WebDriver\Remote\RemoteWebDriver
     */
    protected function driver()
    {
        $chromeOptions = new ChromeOptions();
        if ($binary = env('DUSK_CHROME_BINARY')) {
            $chromeOptions->setBinary($binary);
        }
        $chromeOptions->addArguments(['no-first-run']);
        $capabilities = DesiredCapabilities::chrome();
        $capabilities->setCapability(ChromeOptions::CAPABILITY, $chromeOptions);
        
        return RemoteWebDriver::create(
            'http://localhost:9515', DesiredCapabilities::chrome(), 60000, 60000
        );
    }
}
