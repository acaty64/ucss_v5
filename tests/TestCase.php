<?php

namespace Tests;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;
use Tests\TestsHelper;

abstract class TestCase extends BaseTestCase
{
	use  DatabaseTransactions, CreatesApplication, TestsHelper;
}
